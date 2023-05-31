<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherFeatureRequest;
use App\Models\OtherFeature;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class OtherFeatureController extends Controller
{
    public function edit(OtherFeature $otherFeature){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.other-features.other-feature-edit', compact('otherFeature'));
    }

    public function update(OtherFeatureRequest $request, OtherFeature $otherFeature){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $otherFeature->features = $request->input('features');
        $subSolution = $otherFeature->sub_solution()->get();
        $otherFeature->update();
        Session::flash('saveSuccess', 'other feature / benefit Updated!');
        return redirect('/admin/solutions/' . $subSolution[0]->solution->slug . '/sub-solution/' . $subSolution[0]->slug .'#otherfeaturewrapper');
    }
}
