<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DiscoverItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiscoverItemController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiscoverItem  $discoverItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscoverItem $discoverItem)
    {
        //
        // dd($request);
        $discoverItem->value = $request->input("discoverValue");

        if ($request->input('discoverTarget')) {
            $discoverItem->target = $request->input("discoverTarget");
        }

        $discoverItem->update();
        Session::flash('saveSuccess', 'Discover Item Updated!');
        return redirect()->back();
    }

}
