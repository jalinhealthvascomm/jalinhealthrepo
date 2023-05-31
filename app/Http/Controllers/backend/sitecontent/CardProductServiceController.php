<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class CardProductServiceController extends Controller
{
        /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $child
     * @return \Illuminate\Http\Response
     */
    public function edit($child)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $siteContent = SiteContent::where('slug', '=', $child)
        ->with(['contentMetas'])
        ->firstOrFail();
        return view('admin.site-content.product-service.card-setting', compact('siteContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'image' => 'nullable|mimes:svg',
        ]);
        $siteContent = SiteContent::where('slug', '=', $slug)
        ->with(['contentMetas'])
        ->firstOrFail();

        $siteContent->title = $request->input('title');
        $siteContent->content = $request->input('content');
        if($request->hasFile('image')){
            $oldPath = $siteContent -> image;
            if(File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('image');
            $currentTime = Carbon::now()->toDateTimeString();
            $imageName = date('YmdHis', strtotime($currentTime)).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $publicPath = 'images/product-and-service';
            $file->move($publicPath, $imageName);
            $siteContent -> image = $publicPath .'/'. $imageName;
        }
        $siteContent->update();

        Session::flash('saveSuccess', $siteContent -> title . ' Card Updated!');
        return redirect()->route('admin.product-service-card', $siteContent);
    }
}
