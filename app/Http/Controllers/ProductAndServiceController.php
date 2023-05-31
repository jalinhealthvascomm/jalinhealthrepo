<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Illuminate\Http\Request;

class ProductAndServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productAndService = SiteContent::where('slug', '=', 'product-and-service')
            ->with(['childs', 'contentMetas', 'contentFeatures'])->firstOrFail();
        $title = $productAndService->seo_title ?? '';
        $seoKeyword = $productAndService->seo_keywords ?? '';
        $seoDescription = $productAndService->seo_description ?? '';
        return view('frontend.product-and-service.index', compact('title', 'seoKeyword', 'seoDescription', 
        'productAndService'
        ));
    }
}
