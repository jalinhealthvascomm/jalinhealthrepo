<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteContentRequest;
use App\Models\SiteContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ServiceDetailController extends Controller
{
    public $productDetailId = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('id', '=', $this->productDetailId)
            ->with([
                'childs'
            ])
            ->firstOrFail();
        
        $contentSide =$siteContent->childs[0] ?? null;
        $supportServices = $siteContent->childs[1] ?? null;
        $successServices = $siteContent->childs[2] ?? null;


        return view('admin.site-content.product-service.service-detail.index', 
            compact('siteContent',
                'contentSide', 'supportServices',
                'successServices'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('slug', '=', $slug)
            ->with([
                'childs'
            ])
            ->firstOrFail();
        $contentSide =$siteContent->childs[0] ?? null;

        $this->validate($request, [
            'image' => 'nullable',
            'side-content-image' => 'nullable',
        ]);

        $siteContent->title = $request->input('title');
        $siteContent->slug = $request->input('slug');
        $siteContent->excerpt = $request->input('excerpt');
        $siteContent->seo_title = $request->input('seoTitle');
        $siteContent->seo_description = $request->input('seoDescriptions');
        $siteContent->seo_Keywords = $request->input('seoKeywords');
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/product-and-service';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        $contentSide->content = $request->input('side-content-content');
        if($request->hasFile('side-content-image')){
            $oldPath =  $contentSide -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('side-content-image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/product-and-service';
            $file->move($publicPath, $imageName);
            $contentSide -> image = $publicPath .'/'. $imageName;
        }
        $contentSide->update();

        Session::flash('saveSuccess', $siteContent -> title . ' Updated!');
        return redirect()->route('admin.service-detail.index');
    }

}
