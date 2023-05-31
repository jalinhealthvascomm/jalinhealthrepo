<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Models\ContentFeature;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ContentFeatureController extends Controller
{
    public function addFeature(Request $request, $id)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contentFeature = ContentFeature::where('id', '=', $id)->firstOrFail();
        $contentFeature = new ContentFeature();
        $contentFeature->site_content_id = $id;
        $contentFeature->type = 'featured';

        if ($request->input('type')) {
            $contentFeature->type = $request->input('type');
        }

        if ($request->input('features')) {
            $contentFeature->features = $request->input('features');
        }
        $contentFeature->description = $request->input('description');
        $contentFeature->save();
        Session::flash('saveSuccess', 'Feature Saved!');
        return redirect()->back();
    }

    public function updateFeature(Request $request, $id)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contentFeature = ContentFeature::where('id', '=', $id)->firstOrFail();
        if ($request->input('features')) {
            $contentFeature->features = $request->input('features');
        }
        $contentFeature->description = $request->input('description');
        $contentFeature->update();
        Session::flash('saveSuccess', 'Feature Updated!');
        return redirect()->back();
    }

    public function delete($id)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contentFeature = ContentFeature::where('id', '=', $id)->firstOrFail();
        $contentFeature->delete();
        Session::flash('saveSuccess', 'Feature Deleted!');
        return redirect()->back();
    }

    public function features($slug){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('slug', '=', $slug)
            ->with([
                'contentFeatures'
            ])
            ->firstOrFail();
        
        $contentFeatures = ContentFeature::where('site_content_id', '=', $siteContent->id)
            ->where('type', '=', 'featured')
            ->get() ?? [];
        $siteContent['contentFeatures'] = $contentFeatures;
            
        if ($siteContent->slug == 'product-details') {
            return view('admin.site-content.product-service.product-detail.features', compact('siteContent'));
        }elseif ($siteContent->slug == 'services-details'){
            return view('admin.site-content.product-service.service-detail.features', compact('siteContent'));
        }elseif ($siteContent->slug == 'architecture'){
            return view('admin.site-content.product-service.architecture.features', compact('siteContent'));
        }else{
            return abort(404);
        }
    }
    
    public function benefits($slug){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('slug', '=', $slug)
            ->with([
                'contentFeatures'
            ])
            ->firstOrFail();

        $contentFeatures = ContentFeature::where('site_content_id', '=', $siteContent->id)
            ->where('type', '=', 'other-benefit')
            ->get() ?? [];
        $siteContent['contentFeatures'] = $contentFeatures;

            if ($siteContent->slug == 'product-details') {
                return view('admin.site-content.product-service.product-detail.benefits', compact('siteContent'));
            }else{
                return abort(404);
            }
    }
}
