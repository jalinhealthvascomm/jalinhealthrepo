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
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class AboutUsController extends Controller
{
    public $contentID = 24;
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
            ->with(['childs'])
            ->firstOrFail();
        return view('admin.site-content.about-us.index', 
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
            'image' => 'nullable'
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
            $publicPath = 'images/about-us';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        Session::flash('saveSuccess', $siteContent -> title . ' Updated!');
        return redirect()->route('admin.about-us.index');
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

    public function sections($slug){
        $siteContent = SiteContent::where('slug', '=', $slug)
            ->where('parent', '=', $this->contentID)
            ->where('content_type', '=', 'page-element')
            ->firstOrFail();
        if ($siteContent->id == 25) {
            return view('admin.site-content.about-us.sections.content-with-right-image', 
            compact(
                'siteContent'
            ));
        }elseif ($siteContent->id == 26) {
            $gridItems = $siteContent->childs;
            return view('admin.site-content.about-us.sections.content-gird-list', 
            compact(
                'siteContent',
                'gridItems'
            ));
        }elseif ($siteContent->id == 35) {
            return view('admin.site-content.about-us.sections.content-with-left-image', 
            compact(
                'siteContent',
            ));
        }elseif ($siteContent->id == 36) {
            $partnerItem = $siteContent->childs;
            return view('admin.site-content.about-us.sections.content-partner', 
            compact(
                'siteContent',
                'partnerItem'
            ));
        }elseif ($siteContent->id == 40) {
            return view('admin.site-content.about-us.sections.content-cta', 
            compact(
                'siteContent',
            ));
        }
    }

    public function sectionUpdate(Request $request, $id){
        $siteContent = SiteContent::where('id', '=', $id)
            ->firstOrFail();
        $this->validate($request, [
            'image' => 'nullable'
        ]);
        if ($siteContent->id == 36) {
            $siteContent -> excerpt = $request->input('title');
        }else{
            $siteContent -> title = $request->input('title');
            $siteContent -> excerpt = $request->input('excerpt') ?? '';
        }
        
        $siteContent -> content = $request->input('content');
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/about-us';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        Session::flash('saveSuccess', $siteContent -> title . ' Updated!');
        return redirect()->route('admin.about-us-sections', $siteContent -> slug);
    }

    public function addValue(Request $request){
        $this->validate($request, [
            'image' => 'nullable'
        ]);
        $siteContent = new SiteContent();
        $siteContent -> title = $request->input('title');
        $siteContent -> slug = Str::slug($request->input('title'), '-');
        $siteContent -> content_type = 'value-item';
        $siteContent -> parent = $request->input('parent');
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/about-us';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->saveOrFail();

        $parent = SiteContent::where('id', '=', $request->input('parent'))
            ->firstOrFail();

        Session::flash('saveSuccess', 'Feature Item Ceated!');
        return redirect()->route('admin.about-us-sections', $parent -> slug);
    }

    public function updateValue(Request $request){
        $this->validate($request, [
            'image' => 'nullable'
        ]);
        $siteContent = SiteContent::where('id', '=', $request->input('editId'))->firstOrFail();
        $siteContent -> title = $request->input('title');
        $siteContent -> slug = Str::slug($request->input('title'), '-');
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/about-us';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        $parent = SiteContent::where('id', '=', $siteContent->parent)
            ->firstOrFail();

        Session::flash('saveSuccess', 'Feature Item Updated!');
        return redirect()->route('admin.about-us-sections', $parent -> slug);
    }

    public function removeValue(Request $request){
        $siteContent = SiteContent::where('id', '=', $request->input('id'))->firstOrFail();
        $parent = SiteContent::where('id', '=', $siteContent->parent)
            ->firstOrFail();
        $siteContent -> delete();
        Session::flash('saveSuccess', 'Feature Item Deleted!');
        return redirect()->route('admin.about-us-sections', $parent -> slug);
    }

}
