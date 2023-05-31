<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentMeta;
use App\Models\Resource;
use App\Models\SiteContent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ResourcesController extends Controller
{
    //
 
    public function index(){
        $noResultData = SiteContent::where('id', '=', 54)
        ->with(['contentMetas'])
        ->firstOrFail();
        $siteContent = SiteContent::where('id', '=', '20')
            ->with(['childs', 'contentMetas'])
            ->firstOrFail();
        $resources = Resource::where('content_type', '=', 'resource')
            ->orderBy('created_at','desc')
            ->paginate(8);
        $categories = Category::all();
        $title = $siteContent->seo_title ?? '';
        $seoKeyword = $siteContent->seo_keywords ?? '';
        $seoDescription = $siteContent->seo_description ?? '';
        
        return view('frontend.resource.index', compact('resources', 'categories', 'siteContent', 'title', 'seoKeyword', 'seoDescription', 'noResultData'));
    }

    public function category($slug){
        $noResultData = SiteContent::where('id', '=', 54)
        ->with(['contentMetas'])
        ->firstOrFail();
        $siteContent = SiteContent::where('id', '=', '20')
            ->with(['childs', 'contentMetas'])
            ->firstOrFail();

        $category = Category::where('slug', '=', $slug)->first();
        $resources = Resource::where('content_type', '=', 'resource')
            ->whereHas('content_metas', function($q) {
                return $q->where('key', '=', 'resource-category');
            })
            ->whereHas('content_metas', function($q) use ($category) {
                return $q->where('value', '=', $category->id ?? 99999);
            })
            ->paginate(8);
    
        $categories = Category::all();
        $title = $siteContent->seo_title ?? '';
        $seoKeyword = $siteContent->seo_keywords ?? '';
        $seoDescription = $siteContent->seo_description ?? '';
        
        return view('frontend.resource.index', compact('noResultData', 'resources', 'categories', 'siteContent', 'title', 'seoKeyword', 'seoDescription'));
    }

    public function show($slug){
        try {
            $resources = Resource::where('slug', '=', $slug)->firstOrFail();
        
            $relateResources = ContentMeta::where('key', '=', 'tag-relate')
                ->where('value', 'LIKE', "%{$resources->relateTag->value}%")
                ->where('site_content_id', '!=', $resources->id)
                ->with(['SiteContent'])
                ->paginate(4);


            log_error('get relate error by tag');

            if (count($relateResources) > 0 && count($relateResources) < 4) {
                $relateResources = ContentMeta::where('key', '=', 'resource-category')
                ->where('value', '=', $resources->resourceCategory->id)
                ->where('site_content_id', '!=', $resources->id)
                ->with(['SiteContent'])
                ->paginate(4-count($relateResources));
            }else{
                $relateResources = ContentMeta::where('key', '=', 'resource-category')
                ->where('value', '=', $resources->resourceCategory->id)
                ->where('site_content_id', '!=', $resources->id)
                ->with(['SiteContent'])
                ->paginate(4);
            }

            log_error('get relate error by category');
            
            $shareTo = \Share::page(URL::current(), $resources->title)
                ->twitter()
                ->facebook()
                ->linkedin($resources->seo_description)
                ->getRawLinks();

            log_error('get relate error share sosial media');
    
            return view('frontend.resource.show', compact(
                'resources', 
                'relateResources', 
                'shareTo'
            ));
        } catch (Exception $ex) {
            log_error($ex->getMessage());
        }
    }

    public function get_by_category($slug){
        $category = Category::where('slug', '=', $slug)->first();
        $resources = Resource::where('content_type', '=', 'resource')
            ->whereHas('content_metas', function($q) {
                return $q->where('key', '=', 'resource-category');
            })
            ->whereHas('content_metas', function($q) use ($category) {
                return $q->where('value', '=', $category->id ?? 99999);
            })
            ->paginate(8);
        
        return $resources;
    }

    public function all_resources(){
        $resources = Resource::where('content_type', '=', 'resource')
            ->orderBy('created_at','desc')
            ->paginate(8);
        
        return $resources;
    }

    public function get_categories(){
        $categories = Category::all();
        return $categories;
    }
    public function no_data(){
        $noResultData = SiteContent::where('id', '=', 54)
        ->with(['contentMetas'])
        ->firstOrFail();

        return $noResultData;
    }
}
