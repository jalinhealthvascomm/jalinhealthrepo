<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Http\Requests\OtherFeatureRequest;
use App\Http\Requests\SubSolutionRequest;
use App\Models\Feature;
use App\Models\OtherFeature;
use App\Models\Solution;
use App\Models\SubSolution;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class SubSolutionController extends Controller
{
    //
    public function index(){
        // return view('admin.solutions.solutions-index', compact('subSolutions'));
    }

    public function store(SubSolutionRequest $request, SubSolution $subSolution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'nullable',
            'icon' => 'nullable',
        ]);

        $subSolution = new SubSolution();
        $subSolution -> title = $request->input('title');
        $subSolution -> description = $request->input('description');
        $subSolution -> detail = $request->input('detail');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/solutions';
            $file->move($publicPath, $imageName); 
            $subSolution -> image = $publicPath .'/'. $imageName;
        }
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $currentTime = Carbon::now()->toDateTimeString();
            $iconName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $icon->getClientOriginalName());
            $publicPath = 'images/solutions';
            $icon->move($publicPath, $iconName);
            $subSolution -> icon = $publicPath .'/'. $iconName;
        }
        
        $subSolution->save();
        Session::flash('saveSuccess',  $subSolution -> title . ' Saved!');

        return redirect()->back();
    }

    public function update(SubSolutionRequest $request, SubSolution $subSolution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'nullable',
            'icon' => 'nullable|mimes:svg',
        ]);

        $subSolution -> title = $request->input('title');
        $subSolution -> description = $request->input('description');
        $subSolution -> detail = $request->input('detail');
        $subSolution -> slug = $request->input('slug');
        $subSolution -> seo_title = $request->input('seoTitle');
        $subSolution -> seo_description = $request->input('seoDescriptions');
        $subSolution -> seo_Keywords = $request->input('seoKeywords');
        if($request->hasFile('image')){
            $oldPath = $subSolution -> image;

            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/solutions';
            $file->move($publicPath, $imageName); 
            $subSolution -> image = $publicPath .'/'. $imageName;
        }
        if($request->hasFile('icon')){
            $oldPath = $subSolution -> icon;

            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $icon = $request->file('icon');
            $currentTime = Carbon::now()->toDateTimeString();
            $iconName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $icon->getClientOriginalName());
            $publicPath = 'images/solutions';
            $icon->move($publicPath, $iconName);
            $subSolution -> icon = $publicPath .'/'. $iconName;
        }
        
        $subSolution->update();
        Session::flash('saveSuccess', 'Solution ' .  $subSolution -> title . ' Updated!');
        return redirect('/admin/solutions/'. $subSolution->solution->slug . '/sub-solution/' . $subSolution->slug);
    }


    public function updateSubSolution(SubSolutionRequest $request, SubSolution $subSolution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'nullable',
            'icon' => 'nullable|mimes:svg',
        ]);

        $subSolution -> title = $request->input('title');
        $subSolution -> description = $request->input('description');
        $subSolution -> detail = $request->input('detail');
        $subSolution -> slug = $request->input('slug');
        $subSolution -> seo_title = $request->input('seoTitle');
        $subSolution -> seo_description = $request->input('seoDescriptions');
        $subSolution -> seo_Keywords = $request->input('seoKeywords');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/solutions';
            $file->move($publicPath, $imageName); 
            $subSolution -> image = $publicPath .'/'. $imageName;
        }
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $currentTime = Carbon::now()->toDateTimeString();
            $iconName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $icon->getClientOriginalName());
            $publicPath = 'images/solutions';
            $icon->move($publicPath, $iconName);
            $subSolution -> icon = $publicPath .'/'. $iconName;
        }
         
        $subSolution->update();
        Session::flash('saveSuccess', 'Solution ' .  $subSolution -> title . ' Updated!');
        return redirect('/admin/solutions/'. $subSolution->solution->slug . '/sub-solution/' . $subSolution->slug);
    }

    public function get(Solution $solution, SubSolution $subSolution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $features = $subSolution->features;
        $otherFeatures = $subSolution->otherFeature;
        return view('admin.sub-solutions.sub-solutions-edit', compact('subSolution', 'features', 'otherFeatures'));
    }

    public function other_feature_store(OtherFeatureRequest $request, $id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $otherFeature = new OtherFeature();
        $otherFeature->sub_solution_id = $id;
        $otherFeature->features=$request->input('features');
        $otherFeature->save();

        
        Session::flash('saveSuccess',  'Feature Saved!');
        return redirect(redirect()->back()->getTargetUrl() . '#inpOtherFeatures'); 
    }

    public function feature_store(FeatureRequest $request, $id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $otherFeature = new Feature();
        $otherFeature->sub_solution_id = $id;
        $otherFeature->features=$request->input('features');
        $otherFeature->description=$request->input('description');
        $otherFeature->save();

        Session::flash('saveSuccess',  'Feature Saved!');
        return redirect(redirect()->back()->getTargetUrl() . '#inpFeatures');
    }

    public function feature_update(FeatureRequest $request, $id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $otherFeature = new Feature();
        $otherFeature->sub_solution_id = $id;
        $otherFeature->features=$request->input('features');
        $otherFeature->description=$request->input('description');
        $otherFeature->update();

        Session::flash('saveSuccess',  'Feature Updated!');
        return redirect()->back();
    }

    public function feature_destroy($id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Feature::find($id)->delete();
        Session::flash('saveSuccess', 'Feature deleted!');
        return redirect()->back();
    }

    public function other_feature_update(OtherFeatureRequest $request, $id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $otherFeature = OtherFeature::find($id);
        $otherFeature->features=$request->input('features');
        $otherFeature->update();
        Session::flash('saveSuccess', 'Other Feature Updated!');
        return redirect()->back();
    }
    public function other_feature_destroy($id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $otherFeature = OtherFeature::find($id)->delete();

        Session::flash('saveSuccess', 'Other Feature deleted!');
        return redirect()->back();
    }
}
