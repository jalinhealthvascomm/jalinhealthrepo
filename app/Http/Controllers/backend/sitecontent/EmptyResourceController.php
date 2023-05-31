<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteContentRequest;
use App\Models\ContentMeta;
use App\Models\SiteContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class EmptyResourceController extends Controller
{
    public $contentID = 54;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('id', '=', $this->contentID)
            ->with(['contentMetas'])
            ->firstOrFail();
        
        return view('admin.site-content.empty-resource-setting', 
            compact(
                'siteContent'
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
            ->firstOrFail();
        $this->validate($request, [
            'image' => 'nullable',
            'image2' => 'nullable'
        ]);

        $siteContent->title = $request->input('title');
        $siteContent->slug = $request->input('slug');
        $siteContent->excerpt = $request->input('excerpt');
        $siteContent->content = $request->input('content');
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
            $publicPath = 'images/empty-page';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        if($request->hasFile('image2')){
            $file = $request->file('image2');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/empty-page';
            $file->move($publicPath, $imageName);
          
            $contentMeta = ContentMeta::where('site_content_id' , '=', $siteContent->id)
                ->where('key' , '=', 'icon-image')
                ->firstOrFail();
            $oldPath = $contentMeta -> value;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $contentMeta -> value = $publicPath .'/'. $imageName;
            $contentMeta->update();
        }
        $siteContent->update();

        Session::flash('saveSuccess', $siteContent -> title . ' Updated!');
        return redirect()->route('admin.resource-setting.index');
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
    }
}
