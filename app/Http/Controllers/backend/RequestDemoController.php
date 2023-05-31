<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ScheduleDemo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class RequestDemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $scheduleDemos = ScheduleDemo::orderBy('created_at','desc')->get();
        return view('admin.request-demo.index', compact('scheduleDemos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $scheduleDemo = ScheduleDemo::where('id', '=', $id)->firstOrFail();
        $scheduleDemo->delete();

        Session::flash('saveSuccess', 'Schedule Demo Deleted!');
        return redirect()->route('admin.request-demo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function markActive($id)
    {
        //
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $scheduleDemo = ScheduleDemo::where('id', '=', $id)->firstOrFail();
        $scheduleDemo->read = 1;
        $scheduleDemo->update();

        Session::flash('saveSuccess', 'Schedule Demo from ' . $scheduleDemo->name . 'Is Read!');
        return redirect()->route('admin.request-demo.index');
    }
}
