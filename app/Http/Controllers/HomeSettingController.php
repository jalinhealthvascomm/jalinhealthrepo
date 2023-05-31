<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeSettingRequest;
use App\Models\ContentMeta;
use App\Models\HomeSetting;
use App\Models\PageElement;
use App\Models\SiteContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class HomeSettingController extends Controller
{
    //
    public function index(){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metaTitle = HomeSetting::where('name', '=', 'seo-title')->first() ?? 'Jalin Health';
        $metaDesc = HomeSetting::where('name', '=', 'seo-descriptions')->first() ?? 'Jalin Health';
        $metaKeywords = HomeSetting::where('name', '=', 'seo-keywords')->first() ?? 'Jalin Health';

        $contactUs = SiteContent::where('id', '=', '21')->with(['contentMetas'])->firstOrFail();
        $sosmed = ContentMeta::where('key', 'LIKE', 'sosmed-%')
            ->where('site_content_id', '=', '21')
            ->get();

        return view('admin.homepaged.home-setting', compact('metaTitle', 'metaDesc', 'metaKeywords', 'contactUs', 'sosmed'));
    }

    public function store(HomeSettingRequest $request, HomeSetting $homeSetting){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $homeSetting = new HomeSetting();
        $homeSetting->name = $request->input('name');
        $homeSetting->type = $request->input('type');
        $content = $request->input('content');
        $image_path = $request->file('image')->store('image', 'public');

        $homeSetting->save();
        session()->flash('success', 'Image Upload successfully');

    }

    public function edit(HomeSetting $homeSetting){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($homeSetting->type == 'hero') {
            $heroContentHeadline = $homeSetting->elements()->where('type', '=', 'content-headline')->first()->content ?? '';
            $heroContent = $homeSetting->elements()->where('type', '=', 'content')->first()->content ?? '';
            $heroImage = $homeSetting->elements()->where('type', '=', 'cover-image')->first()->content ?? '';
            return view('admin.homepaged.hero-setting', compact('homeSetting', 'heroContent', 'heroImage', 'heroContentHeadline' ));
         }elseif($homeSetting->type == 'card-list'){
            $content = $homeSetting->elements()->where('type', '=', 'section-title')->first()->content ?? '';
            $contentHeadline = $homeSetting->elements()->where('type', '=', 'content-headline')->first()->content ?? '';
            $solutionCardItem1 = $homeSetting->elements()->where('type', '=', 'solution-card-item-1')->first();
            $solutionCardItem2 = $homeSetting->elements()->where('type', '=', 'solution-card-item-2')->first();
            $solutionCardItem3 = $homeSetting->elements()->where('type', '=', 'solution-card-item-3')->first();
            
            return view('admin.homepaged.card-list-setting', compact('homeSetting', 'content', 'contentHeadline',
                'solutionCardItem1',
                'solutionCardItem2',
                'solutionCardItem3' )
            );
         }elseif($homeSetting->type == 'content-side'){
            $content = $homeSetting->elements()->where('type', '=', 'content')->first()->content ?? '';
            $image = $homeSetting->elements()->where('type', '=', 'image')->first()->content ?? '';
            $setting = $homeSetting->elements()->where('type', '=', 'setting')->first()->content ?? '';
            $video = $homeSetting->elements()->where('type', '=', 'video')->first()->content ?? '';
            return view('admin.homepaged.content-side-setting', compact('homeSetting', 'content', 'image', 'setting', 'video'));
         }elseif($homeSetting->type == 'cta'){
            $ctaTitle = $homeSetting->elements()->where('type', '=', 'cta-title')->first()->content ?? '';
            $ctaDescription = $homeSetting->elements()->where('type', '=', 'cta-description')->first()->content ?? '';
            $ctaPrimaryButtonLabel = $homeSetting->elements()->where('type', '=', 'cta-p-button-label')->first()->content ?? '';
            $ctaPrimaryButtonUrl = $homeSetting->elements()->where('type', '=', 'cta-p-button-url')->first()->content ?? '';
            $ctaSecondaryButtonLabel = $homeSetting->elements()->where('type', '=', 'cta-s-button-label')->first()->content ?? '';
            $ctaSecondaryButtonUrl = $homeSetting->elements()->where('type', '=', 'cta-s-button-url')->first()->content ?? '';
            return view('admin.homepaged.cta-setting', 
                compact('homeSetting', 'ctaTitle', 'ctaDescription', 
                    'ctaPrimaryButtonLabel', 'ctaPrimaryButtonUrl', 
                    'ctaSecondaryButtonLabel', 'ctaSecondaryButtonUrl',)
            );
         }
         elseif($homeSetting->type == 'discover'){
            $discovers = HomeSetting::where('type', '=', 'discover-item')->with('discoverItems')->get();
            return view('admin.homepaged.discover-setting', 
                compact('homeSetting', 'discovers', )
            );
         }
    }

    public function update(HomeSettingRequest $request, HomeSetting $homeSetting)
    {
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $homeSetting->title = $request->input('title');
        $homeSetting->name = $request->input('name');
        $homeSetting->save();

        if ($homeSetting->type == 'hero') {
            if($request->hasFile('image')){
                $this->validate($request, [
                    'image' => 'nullable|mimes:jpeg,png,webp',
                ]);

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content-headline')->first();
                $element->content = $request->input('heroContentHeadline');
                $element->save();

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content')->first();
                $element->content = $request->input('content');
                $element->save();

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cover-image')->first();
                $oldPath = $element->content;

                $file = $request->file('image');
                $currentTime = Carbon::now()->toDateTimeString();
                $imageName = date('YmdHis', strtotime($currentTime)).'-'.$file->getClientOriginalName();
                $publicPath = 'images/landingpage';
	            $file->move($publicPath, $imageName);
                $element->content = $publicPath.'/'.$imageName;
                $element->save();

                
                if(File::exists($oldPath)) {
                    File::delete($oldPath);
                }
                
            }else{
                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content-headline')->first();
                $element->content = $request->input('heroContentHeadline');
                $element->save();
                $elementContent = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content')->first();
                $elementContent->content = $request->input('content');
                $elementContent->save();
            }
        }elseif($homeSetting->type == 'content-side'){
            if($request->hasFile('image')){
                $this->validate($request, [
                    'image' => 'nullable',
                ]);

                $file = $request->file('image');
                $currentTime = Carbon::now()->toDateTimeString();
                $imageName = date('YmdHis', strtotime($currentTime)).'-'.$file->getClientOriginalName();
                $publicPath = 'images/landingpage';
	            $file->move($publicPath, $imageName);

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content')->first();
                $element->content = $request->input('content');
                $element->save();

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'setting')->first();
                $element->content = $request->input('media-setting');
                $element->save();

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'video')->first();
                $element->content = $request->input('youtubeiframe');
                $element->save();

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'image')->first();
                
                $oldPath = $element->content;

                $element->content = $publicPath.'/'.$imageName;
                $element->save();
                if(File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }else{

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'setting')->first();
                $element->content = $request->input('media-setting');
                $element->save();

                $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'video')->first();
                $element->content = $request->input('youtubeiframe');
                $element->save();

                $elementContent = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content')->first();
                $elementContent->content = $request->input('content');
                $elementContent->save();
            }
        }elseif($homeSetting->type == 'cta'){
            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cta-title')->first();
            $element->content = $request->input('cta-title');
            $element->save();

            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cta-description')->first();
            $element->content = $request->input('cta-description');
            $element->save();

            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cta-p-button-label')->first();
            $element->content = $request->input('cta-p-button-label');
            $element->save();

            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cta-p-button-url')->first();
            $element->content = $request->input('cta-p-button-url');
            $element->save();

            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cta-s-button-label')->first();
            $element->content = $request->input('cta-s-button-label');
            $element->save();

            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'cta-s-button-url')->first();
            $element->content = $request->input('cta-s-button-url');
            $element->save();
        }elseif($homeSetting->type == 'card-list'){
            
            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'content-headline')->first();
            $element->content = $request->input('section-headline');
            $element->save();

            $element = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'section-title')->first();
            $element->content = $request->input('section-title');
            $element->save();
                    
            $elementItem1 = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'solution-card-item-1')->first();
            
            $elementItem1->content = $request->input('solutionCardItem1')['content'];
            $elementItem1->url = $request->input('solutionCardItem1')['url'];
            if($request->hasFile('solutionCardItem1Icon')){
                $this->validate($request, [
                    'solutionCardItem1Icon' => 'nullable|mimes:svg',
                ]);
                
                $file = $request->file('solutionCardItem1Icon');
                $currentTime = Carbon::now()->toDateTimeString();
                $imageName = date('YmdHis', strtotime($currentTime)).'-'.$file->getClientOriginalName();
                $publicPath = 'images/icon';
	            $file->move($publicPath, $imageName);
                $elementItem1 -> icon = $publicPath .'/'. $imageName;
            }
            $elementItem1->save();

            $elementItem2 = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'solution-card-item-2')->first();
            $elementItem2->content = $request->input('solutionCardItem2')['content'];
            $elementItem2->url = $request->input('solutionCardItem2')['url'];
            if($request->hasFile('solutionCardItem2Icon')){
                $this->validate($request, [
                    'solutionCardItem2Icon' => 'nullable|mimes:svg',
                ]);
                
                $file = $request->file('solutionCardItem2Icon');
                $currentTime = Carbon::now()->toDateTimeString();
                $imageName = date('YmdHis', strtotime($currentTime)).'-'.$file->getClientOriginalName();
                $publicPath = 'images/icon';
	            $file->move($publicPath, $imageName);
                $elementItem2 -> icon = $publicPath .'/'. $imageName;
            }
            $elementItem2->save();

            $elementItem3 = PageElement::where('home_setting_id', '=', $homeSetting->id)
                    ->where('type', '=', 'solution-card-item-3')->first();
            $elementItem3->content = $request->input('solutionCardItem3')['content'];
            $elementItem3->url = $request->input('solutionCardItem3')['url'];
            if($request->hasFile('solutionCardItem3Icon')){
                $this->validate($request, [
                    'solutionCardItem3Icon' => 'nullable|mimes:svg',
                ]);
               
                $file = $request->file('solutionCardItem3Icon');
                $currentTime = Carbon::now()->toDateTimeString();
                $imageName = date('YmdHis', strtotime($currentTime)).'-'.$file->getClientOriginalName();
                $publicPath = 'images/icon';
	            $file->move($publicPath, $imageName);
                $elementItem3 -> icon = $publicPath .'/'. $imageName;
            }
            $elementItem3->save();
        }

        Session::flash('saveSuccess', 'Data Updated!');
        return redirect(route('home-setting.edit', $homeSetting));
    }

    function pageElement(HomeSetting $homeSetting, $type, $data){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new PageElement(array('name' => $homeSetting->name . '-' . $homeSetting->type,
                'type' => $type,
                'content' => $data
        ));
    }

    function seoUpdate(Request $request){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'seoTitle' => 'required',
            'seoDescriptions' => 'required',
            'seoKeywords' => 'required',
        ]);

        $metaTitle = HomeSetting::where('id', '=', $request->input('seoTitleId'))->first();
        $metaTitle->title = $request->input('seoTitle');
        $metaTitle->update();

        $metaDesc = HomeSetting::where('id', '=', $request->input('seoDescriptionsId'))->first();
        $metaDesc->title = $request->input('seoDescriptions');
        $metaDesc->update();

        $metaKeywords = HomeSetting::where('id', '=', $request->input('seoKeywordsId'))->first();
        $metaKeywords->title = $request->input('seoKeywords');
        $metaKeywords->update();

        Session::flash('saveSuccess', 'Seo Meta Updated!');

        return redirect()->route('home-setting.index');
    }

    function contactUpdate(Request $request){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'contact_email' => 'required',
            'email' => 'required',
            'contact_phone' => 'required',
            'phone' => 'required',
            'contact_address' => 'required',
            'address' => 'required',
            'contact_map' => 'required',
            'map' => 'required',
        ]);

        $email = ContentMeta::where('id', '=', $request->input('contact_email'))->firstOrFail();
        $email->value = $request->input('email');
        $email->update();

        $phone = ContentMeta::where('id', '=', $request->input('contact_phone'))->firstOrFail();
        $phone->value = $request->input('phone');
        $phone->update();

        $address = ContentMeta::where('id', '=', $request->input('contact_address'))->firstOrFail();
        $address->value = $request->input('address');
        $address->update();

        $map = ContentMeta::where('id', '=', $request->input('contact_map'))->firstOrFail();
        $map->value = $request->input('map');
        $map->update();

        Session::flash('saveSuccess', 'Contact Updated!');

        return redirect()->route('home-setting.index');
    }

    function socialMediaMpdate(Request $request){
        abort_if(Gate::denies('administrator'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'sosmed-facebook' => 'required',
            'sosmed-twitter' => 'required',
            'sosmed-instagram' => 'required',
            'sosmed-youtube' => 'required',
        ]);

        $fb = ContentMeta::where('id', '=', $request->input('sosmed-facebook-id'))->firstOrFail();
        $fb->value = $request->input('sosmed-facebook');
        $fb->update();

        $twitter = ContentMeta::where('id', '=', $request->input('sosmed-twitter-id'))->firstOrFail();
        $twitter->value = $request->input('sosmed-twitter');
        $twitter->update();

        $instagram = ContentMeta::where('id', '=', $request->input('sosmed-instagram-id'))->firstOrFail();
        $instagram->value = $request->input('sosmed-instagram');
        $instagram->update();

        $youtube = ContentMeta::where('id', '=', $request->input('sosmed-youtube-id'))->firstOrFail();
        $youtube->value = $request->input('sosmed-youtube');
        $youtube->update();

        Session::flash('saveSuccess', 'Social Media Updated!');
        return redirect()->route('home-setting.index');
    }
}

