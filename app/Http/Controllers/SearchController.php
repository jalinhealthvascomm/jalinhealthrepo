<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\HomeSetting;
use App\Models\OtherFeature;
use App\Models\SiteContent;
use App\Models\Solution;
use App\Models\SubSolution;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $searchResult = [];

    public function search(Request $request){
        $noDataResult = SiteContent::where('id', '=', 53)
        ->with(['contentMetas'])
        ->firstOrFail();
        $keyword = $request->input('keyword') ?? '';
        // dd($keyword);

        $homeSettingResult = HomeSetting::where('title', 'LIKE', '%' .$keyword. '%')
                    // I need this album if any of its user's name matches the given input
                    ->orWhereHas('page_elements', function($q) use ($keyword) {
                        return $q->where('content', 'LIKE', '%' . $keyword . '%');
                    })
                    ->with(['page_elements' => function($q) use ($keyword) {
                        return $q->where('content', 'LIKE', '%' . $keyword . '%');
                    }])
                    ->get();

        $solutionsResult = Solution::where('title', 'LIKE', '%' .$keyword. '%')
        ->orWhere('description', 'LIKE', '%' .$keyword. '%')
        ->orWhere('detail', 'LIKE', '%' .$keyword. '%')
        ->get();

        if (!empty($solutionsResult)) {
            foreach ($solutionsResult as $key => $value) {
                $data = (object)[
                    'title' => $value->title,
                    'content' => $value->description . ' ' . $value->detail,
                    'url' =>  '/solutions/'.$value->slug
                ];
                array_push($this->searchResult, $data);
            }
        }

        $subSolutionsResult = SubSolution::where('title', 'LIKE', '%' .$keyword. '%')
        ->orWhere('description', 'LIKE', '%' .$keyword. '%')
        ->orWhere('detail', 'LIKE', '%' .$keyword. '%')
        ->get();

        if (!empty($subSolutionsResult)) {
            foreach ($subSolutionsResult as $key => $value) {
                $data = (object)[
                    'title' => $value->solution->title . ' - ' . $value->title,
                    'content' => $value->description . ' ' . $value->detail,
                    'url' =>  '/solutions/' . $value->solution->slug . '/detail#' .$value->slug
                ];
                array_push($this->searchResult, $data);
            }
        }

        $subSolutionsFeaturesResult = Feature::where('features', 'LIKE', '%' .$keyword. '%')
        ->orWhere('description', 'LIKE', '%' .$keyword. '%')
        ->get();

        if (!empty($subSolutionsFeaturesResult)) {
            foreach ($subSolutionsFeaturesResult as $key => $value) {
                $data = (object)[
                    'title' => $value->features,
                    'content' => $value->description,
                    'url' =>  '/solutions/' . $value->sub_solution->solution->slug . '/detail#' .$value->sub_solution->slug
                ];
                array_push($this->searchResult, $data);
            }
        }

        $subSolutionsOtherFeaturesResult = OtherFeature::where('features', 'LIKE', '%' .$keyword. '%')
        ->get();

        if (!empty($subSolutionsOtherFeaturesResult)) {
            foreach ($subSolutionsOtherFeaturesResult as $key => $value) {
                $data = (object)[
                    'title' => $value->sub_solution->title,
                    'content' => $value->features,
                    'url' =>  '/solutions/' . $value->sub_solution->solution->slug . '/detail#' .$value->sub_solution->slug
                ];
                array_push($this->searchResult, $data);
            }
        }

        $siteContents = SiteContent::whereIn('content_type', ['page','page-element'])
            ->where('title', 'LIKE', '%' .$keyword. '%')
            ->where('content_type', '!=', 'resource')
            ->orWhere('content', 'LIKE', '%' .$keyword. '%')
            ->orWhere('excerpt', 'LIKE', '%' .$keyword. '%')
            ->get();

            if (!empty($siteContents)) {
                foreach ($siteContents as $key => $value) {
                    if ($value->parent == 0) {
                        $data = (object)[
                            'title' => $value->title,
                            'content' => $value->content,
                            'url' =>  $value->slug
                        ];
                    }else{
                        $data = (object)[
                            'title' => $value->masterChild->title,
                            'content' => $value->content,
                            'url' =>  $value->masterChild->slug
                        ];
                    }
                    array_push($this->searchResult, $data);
                }
            }

        $results = $this->searchResult;
        return view('frontend.search.index', compact('results', 'keyword', 'noDataResult'));

    }
}
