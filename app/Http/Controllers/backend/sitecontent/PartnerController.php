<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnersRequest;
use App\Http\Requests\SiteContentRequest;
use App\Models\SiteContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    public $parentID = 36;
    public $content_type = 'partner-item';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $partners = SiteContent::where('parent', '=', $this->parentID)
            ->where('content_type', '=', $this->content_type)
            ->get() ?? [];
        
        return view('admin.site-content.partners.index', 
            compact(
                'partners'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnersRequest $request)
    {
        // dd($request);
        $this->validate($request, [
            'image' => 'nullable'
        ]);

        $siteContent = new SiteContent();
        $siteContent->title = $request->input('title');
        $siteContent->content = $request->input('content');
        $siteContent->excerpt = $request->input('excerpt');
        $siteContent->parent = $request->input('parent');
        $siteContent->content_type = 'partner-item';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/partners';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }

        $siteContent->saveOrFail();
        Session::flash('saveSuccess', 'Partner ' .$siteContent -> title . ' Created!');
        return redirect()->route('admin.partners.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnersRequest $request, $id)
    {
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('id', '=', $id)
            ->firstOrFail();
        $this->validate($request, [
            'image' => 'nullable'
        ]);

        $siteContent->title = $request->input('title');
        $siteContent->excerpt = $request->input('excerpt');
        $siteContent->content = $request->input('content');
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/partners';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        Session::flash('saveSuccess', 'Partner ' . $siteContent -> title . ' Updated!');
        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('id', '=', $id)
            ->firstOrFail();

        $oldTitle = $siteContent->title;

        $siteContent->delete();
        Session::flash('saveSuccess', 'Partner ' . $oldTitle . ' Deleted!');
        return redirect()->route('admin.partners.index');
    }

}
