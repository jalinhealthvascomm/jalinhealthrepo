<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Models\ContentMeta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ContentMetaController extends Controller
{
    public function add(Request $request, $id)
    {
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contentMeta = new ContentMeta();
        $contentMeta->site_content_id = $id;
        $contentMeta->key = $request->input('key');
        $contentMeta->value = $request->input('value');
        $contentMeta->save();
        Session::flash('saveSuccess', 'Meta Data Saved!');
        return redirect()->back();
    }

    public function delete( $id)
    {
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contentMeta = ContentMeta::where('id', '=', $id)->firstOrFail();
        $contentMeta->delete();
        Session::flash('saveSuccess', 'Meta Data Deleted!');
        return redirect()->back();
    }

    public function updateMeta(Request $request, $id)
    {
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $contentMeta = ContentMeta::where('id', '=', $id)->firstOrFail();
        $contentMeta->value = $request->input('value');
        $contentMeta->update();
        Session::flash('saveSuccess', 'Meta Data Saved!');
        return redirect()->back();
    }
}
