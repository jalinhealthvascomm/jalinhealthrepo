<?php

namespace App\Http\Controllers\backend\sitecontent;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteContent  $siteContent
     * @return \Illuminate\Http\Response
     */
    public function show(SiteContent $siteContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteContent  $siteContent
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteContent $siteContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteContent  $siteContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteContent $siteContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteContent  $siteContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteContent $siteContent)
    {
        //
    }

    /**
     * Display the RESOURCE type.
     *
     * @param  \App\Models\SiteContent  $siteContent
     * @return \Illuminate\Http\Response
     */
    public function resources(){
        return view('admin.site-content.resource.index');
    }
}
