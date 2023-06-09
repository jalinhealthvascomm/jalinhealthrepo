<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
    public function edit(Feature $feature){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.features.feature-edit', compact('feature'));
    }

    public function update(FeatureRequest $request, Feature $feature){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $feature->features = $request->input('features');
        $feature->description = $request->input('feature-description');
        $subSolution = $feature->sub_solution()->get();
        $feature->update();
        Session::flash('saveSuccess', 'feature Updated!');
        return redirect('/admin/solutions/' . $subSolution[0]->solution->slug . '/sub-solution/' . $subSolution[0]->slug .'#inpFeatures');
    }
}
