<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Solution;
use App\Models\SubSolution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Solutions - Jalinhealt'
        ];

        return view('frontend.solutions.home', $data);
    }

    public function getSolution($slug){
        $solution = Solution::where('slug', '=', $slug)->with(['subSolutions'])->first();
        $title = 'Solutions';
        $description = "Description Solution";
        if ($solution) {
            return view('frontend.solutions.home', compact('title', 'description', 'solution'));
        }else{
            return abort(404);
        }
       
    }

    public function showdetail($sub_solution_slug, $slug){
        $subSolution = SubSolution::where('slug', '=', $slug)->first();
        $title = $subSolution->title;
        $description = "Description Solution";
        $features = $subSolution->features()->get();
        $otherFeatures = $subSolution->otherFeature()->get();
        
        $featured1 =[];
        $featured2 =[];
        for ($i=0; $i < (count($otherFeatures)/2); $i++) { 
            array_push($featured1, ['title' => $otherFeatures[$i]->features]);
        } 

        for ($i= count($otherFeatures)/2; $i < (count($otherFeatures)/2)*2; $i++) { 
            array_push($featured2, ['title' => $otherFeatures[$i]->features]);
        } 


        return view('frontend.solutions.detail-tabs', compact('features', 'otherFeatures', 'subSolution','title', 'description', 'featured1', 'featured2'));
    }
}
