<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContentMeta;
use App\Models\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resources = Resource::where('content_type', '=', 'resource')
            ->orderBy('created_at','desc')
            ->with('contentMetas')
            ->get();
        
        
        return view('admin.site-content.resource.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all() ?? [];
        return view('admin.site-content.resource.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // dd($request);
        
        

        $this->validate($request, [
            'image' => 'nullable',
            'title' => 'required'
        ]);


        $siteContent = new Resource();
        $siteContent->title = $request->input('title');
        if (!empty($request->input('slug'))) {
            $siteContent->slug = $request->input('slug');
        }
        $siteContent->content_type = 'resource';
        $siteContent->content = $request->input('content') ?? '';
        $siteContent->status = 'publish';
        $siteContent->seo_title = $request->input('seoTitle') ?? '';
        $siteContent->seo_description = $request->input('seoDescriptions') ?? '';
        $siteContent->seo_Keywords = $request->input('seoKeywords') ?? '';

        $oldPath = '';

        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/resources';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }

        $siteContent->save();

        if ($oldPath !== '' && File::exists($oldPath)) {
            File::delete($oldPath);
        }

        if (!empty($siteContent->id)) {
            ContentMeta::create(
                [
                    'site_content_id' => $siteContent->id,
                    'key' => 'resource-category',
                    'value' => $request->input('category') ?? 1
                ]
            );
            ContentMeta::create(
                [
                    'site_content_id' => $siteContent->id,
                    'key' => 'tag-relate',
                    'value' => $request->input('tagRelate') ?? 'resource'
                ]
            );
        }
        
        Session::flash('saveSuccess', 'Resource Saved!');
        return redirect()->route('admin.resources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit($resource)
    {
        //
        $resource = Resource::where('slug', '=', $resource)->with('contentMetas')->firstOrFail();
        $categories = Category::all() ?? [];
        

        return view('admin.site-content.resource.edit', compact('resource','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $resource)
    {
        $siteContent = Resource::where('slug', '=', $resource)->with('contentMetas')->firstOrFail();
        $siteContent->title = $request->input('title');
        if (!empty($request->input('slug'))) {
            $siteContent->slug = $request->input('slug');
        }
        $siteContent->content_type = 'resource';
        $siteContent->content = $request->input('content');
        $siteContent->status = 'publish';
        $siteContent->seo_title = $request->input('seoTitle');
        $siteContent->seo_description = $request->input('seoDescriptions');
        $siteContent->seo_Keywords = $request->input('seoKeywords');

        $this->validate($request, [
            'image' => 'nullable',
        ]);
        $oldPath = '';
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/resources';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }

        $siteContent->update();

        if($oldPath !== '' && File::exists($oldPath)) {
            File::delete($oldPath);
        }
        
        $metaCategory = ContentMeta::where('site_content_id', '=', $siteContent->id)->where('key', '=', 'resource-category')->firstOrFail();
        $metaCategory->value = $request->input('category') ?? 1;
        $metaCategory->update();

        $metaTagRelate = ContentMeta::where('site_content_id', '=', $siteContent->id)->where('key', '=', 'tag-relate')->firstOrFail();
        $metaTagRelate->value = $request->input('tagRelate') ?? 'resource';
        $metaTagRelate->update();
                
        Session::flash('saveSuccess', 'Resource Saved!');
        return redirect()->route('admin.resources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resource::where('id', '=', $id)->firstOrFail();
        $resource->delete();
        $resource->contentMetas()->delete();
        Session::flash('saveSuccess', 'Resource Deleted!');
        return redirect()->route('admin.resources.index');
    }
}
