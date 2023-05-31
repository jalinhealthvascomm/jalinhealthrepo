<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Solution;
use App\Models\SubSolution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index(){
        //
    }

    public function getSolution(Solution $solutions){
        $solution = $solutions;
        $title = $solutions->seo_title ?? '';
        $seoKeyword = $solutions->seo_keywords ?? '';
        $seoDescription = $solutions->seo_description ?? '';
        if ($solution) {
            return view('frontend.solutions.home', compact('title', 'solution', 'seoKeyword', 'seoDescription'));
        }else{
            return abort(404);
        }
       
    }

    public function showdetail(Solution $solutions){
        $solution = $solutions;
        $subSolutions = $solutions->subSolutions;

        $title = $solutions->seo_title ?? '';
        $seoKeyword = $solutions->seo_keywords ?? '';
        $seoDescription = $solutions->seo_description ?? '';

        return view('frontend.solutions.detail-tabs', compact('title', 'seoKeyword', 'seoDescription', 'solution', 'subSolutions'));
    }
}
