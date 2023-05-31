<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscoverController extends Controller
{

    public function discover(Request $request){
        // $this->validate($request, [
        //     'discoveriam' => 'required|not_in:Select',
		// 	'discoverwork' => 'required|not_in:Select',
		// 	'discoverfor' => 'required|not_in:Select',
		// 	'discovertarget' => 'required|not_in:Select',
        // ]);

		$validator = Validator::make($request->all(),[
            'discoveriam' => 'required|not_in:Select',
			'discoverwork' => 'required|not_in:Select',
			'discoverfor' => 'required|not_in:Select',
			'discovertarget' => 'required|not_in:Select',
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() .'#discoverform')
                    ->withErrors($validator)
                    ->withInput();
        }

        $discoveriam = $request->input('discoveriam');
		$discoverwork = $request->input('discoverwork');
		$discoverfor = $request->input('discoverfor');
		$discovertarget = $request->input('discovertarget');

		if (!empty($discovertarget)) {
			return redirect($discovertarget);
		}
        return abort(404);
    }
}
