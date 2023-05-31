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

class ContactUsController extends Controller
{
    public $contentID = 21;
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
        // dd($siteContent->childs[0]->contentMetas);
        return view('admin.site-content.contact-us.index', 
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
            $publicPath = 'images/contact-us';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        Session::flash('saveSuccess', $siteContent -> title . ' Updated!');
        return redirect()->back();
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

    public function selectItemUpdate(Request $request, $id){
        $this->validate($request, [
            'itemValue' => 'required'
        ]);
        $contentMeta = ContentMeta::where('id', '=', $id)->firstOrFail();
        $contentMeta->value = $request->input('itemValue');
        $contentMeta->update();
        Session::flash('saveSuccess', 'Item Updated!');
        return redirect()->back();
    }

    public function selectItemdelete($id){
        $contentMeta = ContentMeta::where('id', '=', $id)->firstOrFail();
        $deleteLabel = $contentMeta->value;
        $contentMeta->delete();
        Session::flash('saveSuccess', 'Item ' . $deleteLabel . ' Deleted!');
        return redirect()->back();
    }

    public function selectItemAdd(Request $request, $id){
        $this->validate($request, [
            'itemValue' => 'required'
        ]);

        $contentMeta = new ContentMeta();
        $contentMeta->site_content_id = $id;
        $contentMeta->value = $request->input('itemValue');
        $contentMeta->saveOrFail();
        Session::flash('saveSuccess', 'Item ' . $contentMeta->value . ' Saved!');
        return redirect()->back();
    }
}
