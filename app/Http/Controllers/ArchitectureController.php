<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Illuminate\Http\Request;

class ArchitectureController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $architecture = SiteContent::where('slug', '=', 'architecture')
            ->with(['childs', 'contentMetas', 'contentFeatures'])->firstOrFail();
        $title = $architecture->seo_title ?? '';
        $seoKeyword = $architecture->seo_keywords ?? '';
        $seoDescription = $architecture->seo_description ?? '';

        return view('frontend.architecture.index', 
            compact(
                'title', 
                'seoKeyword', 
                'seoDescription', 
                'architecture'
            )
        );
    }
}
