<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolutionsRequest;
use App\Http\Requests\SubSolutionRequest;
use App\Models\Solution;
use App\Models\SubSolution;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class SolutionController extends Controller
{
    //
    public function index(){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $solutions = Solution::get();
        return view('admin.solutions.solutions-index', compact('solutions'));
    }

    public function create(){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.solutions.solutions-create');
    }

    public function store(SolutionsRequest $request, Solution $solution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'nullable',
            'icon' => 'nullable|mimes:svg',
        ]);

        $file = $request->file('image');
        $currentTime = Carbon::now()->toDateTimeString();
        $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
        $publicPath = 'images/solutions';
        $file->move($publicPath, $imageName);

        $icon = $request->file('icon');
        $currentTime = Carbon::now()->toDateTimeString();
        $iconName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $icon->getClientOriginalName());
        $publicPath = 'images/solutions';
        $icon->move($publicPath, $iconName);

        $solution = new Solution();
        $solution -> title = $request->input('title');
        $solution -> icon = $publicPath .'/'. $iconName;
        $solution -> image = $publicPath .'/'. $imageName;
        $solution -> description = $request->input('description');
        $solution -> detail = $request->input('detail');
        $solution->save();

        return redirect()->back();
    }

    public function edit(Solution $solution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subSolutions = $solution->subSolutions()->get();
        return view('admin.solutions.solutions-edit', compact('solution', 'subSolutions'));
    }

    public function update(SolutionsRequest $request, Solution $solution){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'nullable',
            'icon' => 'nullable|mimes:svg',
        ]);

        $solution -> title = $request->input('title');
        $solution -> description = $request->input('description');
        $solution -> detail = $request->input('detail');
        $solution -> slug = $request->input('slug');
        $solution -> seo_title = $request->input('seoTitle');
        $solution -> seo_description = $request->input('seoDescriptions');
        $solution -> seo_Keywords = $request->input('seoKeywords');

        if($request->hasFile('image')){
            $oldPath =  $solution -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/solutions';
            $file->move($publicPath, $imageName);
            $solution -> image = $publicPath .'/'. $imageName;
        }
        if($request->hasFile('icon')){
            $oldPath =  $solution -> icon;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $icon = $request->file('icon');
            $currentTime = Carbon::now()->toDateTimeString();
            $iconName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $icon->getClientOriginalName());
            $publicPath = 'images/solutions';
            $icon->move($publicPath, $iconName);
            $solution -> icon = $publicPath .'/'. $iconName;
        }
        
        $solution->update();

        Session::flash('saveSuccess', 'Solution ' .  $solution -> title . ' Updated!');
        
        return redirect()->route('admin.solutions.edit', $solution);

        // return redirect()->back();
    }

    public function sub_solution_store(SubSolutionRequest $request, $id){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'required',
            'icon' => 'required',
        ]);

        $file = $request->file('image');
        $currentTime = Carbon::now()->toDateTimeString();
        $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
        $publicPath = 'images/sub-solutions';
        $file->move($publicPath, $id .'-'. $imageName);

        $icon = $request->file('icon');
        $currentTime = Carbon::now()->toDateTimeString();
        $iconName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $icon->getClientOriginalName());
        $publicPath = 'images/sub-solutions';
        $icon->move($publicPath, $id .'-'. $iconName);

        $subSolution = new SubSolution();
        $subSolution -> solution_id = $id;
        $subSolution -> title = $request->input('title');
        $subSolution -> icon = $publicPath .'/'. $id .'-'. $iconName;
        $subSolution -> image = $publicPath .'/'.$id .'-'. $imageName;
        $subSolution -> description = $request->input('description');
        $subSolution -> detail = $request->input('detail');
        $subSolution->save();

        return redirect()->back();
    }
}
