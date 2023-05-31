<?php

namespace App\Http\Controllers;

use App\Models\ContentFeature;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productDetails = SiteContent::where('slug', '=', 'product-details')
            ->with(['childs', 'contentMetas'])->firstOrFail();
        $title = $productDetails->seo_title ?? '';
        $seoKeyword = $productDetails->seo_keywords ?? '';
        $seoDescription = $productDetails->seo_description ?? '';

        $contentFeatures = ContentFeature::where('site_content_id', '=', $productDetails->id)
            ->where('type', '=', 'featured')
            ->get() ?? [];
        $productDetails['contentFeatures'] = $contentFeatures;

        $contentBenefit = ContentFeature::where('site_content_id', '=', $productDetails->id)
            ->where('type', '=', 'other-benefit')
            ->get() ?? [];
        $productDetails['contentBenefit'] = $contentBenefit;
        

        return view('frontend.product-details.index', compact('title', 'seoKeyword', 'seoDescription', 
        'productDetails'
        ));
    }
}
