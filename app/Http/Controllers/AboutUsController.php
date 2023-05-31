<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siteContent = SiteContent::where('id', '=', '24')
            ->with(['childs', 'contentMetas'])->firstOrFail();
        $title = $siteContent->seo_title ?? '';
        $seoKeyword = $siteContent->seo_keywords ?? '';
        $seoDescription = $siteContent->seo_description ?? '';

        $sectionOverview = $siteContent->childs[0];
        $sectionValue = $siteContent->childs[1];
        $sectionValueContent = $siteContent->childs[2];
        $sectionPartner = $siteContent->childs[3];
        $sectionCta = $siteContent->childs[4];

        return view('frontend.about-us.index', 
            compact(
                'title', 
                'seoKeyword', 
                'seoDescription', 
                'siteContent',
                'sectionOverview',
                'sectionValue',
                'sectionValueContent',
                'sectionPartner',
                'sectionCta'
            )
        );
    }
}
