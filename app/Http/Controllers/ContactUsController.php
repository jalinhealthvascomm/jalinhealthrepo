<?php

namespace App\Http\Controllers;

use App\Models\ScheduleDemo;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siteContent = SiteContent::where('id', '=', '21')
            ->with(['childs', 'contentMetas'])->firstOrFail();
        $title = $siteContent->seo_title ?? '';
        $seoKeyword = $siteContent->seo_keywords ?? '';
        $seoDescription = $siteContent->seo_description ?? '';

        $organizationType = $siteContent->childs[0] ?? [];
        $inquirySubject = $siteContent->childs[1] ?? [];

        return view('frontend.contact-us.index', 
            compact(
                'title', 
                'seoKeyword', 
                'seoDescription', 
                'siteContent',
                'organizationType',
                'inquirySubject'
            )
        );
    }

    public function sumbited(Request $request){
        // $this->validate($request, [
        //     'fullName' => 'required',
        //     'phone' => 'required|numeric',
        //     'email' => 'required|email',
        //     'message' => 'required',
        //     'organizationType' => 'required',
        //     'inquerySubject' => 'required',
        // ]);

        $validator = Validator::make($request->all(),[
            'fullName' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required',
            'organizationType' => 'required',
            'inquerySubject' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect(url()->previous() .'#schedule-demo')
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $scheduleDemo = new ScheduleDemo(); 
        $scheduleDemo->name = $request->input('fullName');
        $scheduleDemo->phone = $request->input('phone');
        $scheduleDemo->email = $request->input('email');
        $scheduleDemo->organization = $request->input('organizationType');
        $scheduleDemo->inquiry = $request->input('inquerySubject');
        $scheduleDemo->message = $request->input('message');
        $scheduleDemo->saveOrFail();

        Session::flash('saveSuccess', 'Schedule Demo Has Been Submitted!');
        
        return redirect('/contact-us');
    }
}
