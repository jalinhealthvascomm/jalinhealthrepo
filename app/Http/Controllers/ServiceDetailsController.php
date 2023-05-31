<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Illuminate\Http\Request;

class ServiceDetailsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicesDetails = SiteContent::where('slug', '=', 'services-details')
            ->with(['childs', 'contentMetas', 'contentFeatures'])->firstOrFail();
        $title = $servicesDetails->seo_title ?? '';
        $seoKeyword = $servicesDetails->seo_keywords ?? '';
        $seoDescription = $servicesDetails->seo_description ?? '';

        $servicesCards= [];
        for ($i=1; $i < count($servicesDetails->childs); $i++) { 
            array_push($servicesCards, $servicesDetails->childs[$i]);
        }
        // dd($servicesCards[0]->contentMetas);
        

        return view('frontend.service-details.index', compact('title', 'seoKeyword', 'seoDescription', 
        'servicesDetails', 'servicesCards'
        ));
    }
}
