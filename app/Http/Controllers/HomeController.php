<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $heroSection = HomeSetting::where('type', '=', 'hero')->first();


        $sections = [];
        foreach (HomeSetting::all() as $key => $value) {
            $elements = [];
            foreach ($value->elements()->get() as $key => $element) {
                $elements[$element->type] = $element; 
            }
            $sections[$value->type] = [
                'section' => [
                    'name' => $value->name,
                    'title' => $value->title,
                ],
                'elements' =>  $elements
            ];
        }

        $title = $metaTitle = HomeSetting::where('name', '=', 'seo-title')->first()->title ?? "";
        $seoDescription = $metaTitle = HomeSetting::where('name', '=', 'seo-descriptions')->first()->title ?? "";
        $seoKeyword = $metaTitle = HomeSetting::where('name', '=', 'seo-descriptions')->first()->title ?? "";
        $hero = $sections['hero'] ?? null;
        $cardList = $sections['card-list'] ?? null;
        $contentSide = $sections['content-side'] ?? null;
        $cta = $sections['cta'] ?? null;

        $discoverItemsOne = HomeSetting::where('name', '=', 'discover-1')->with('discoverItems')->first()->discoverItems ?? [];
        $discoverItemsTwo = HomeSetting::where('name', '=', 'discover-2')->with('discoverItems')->first()->discoverItems ?? [];
        $discoverItemsThree = HomeSetting::where('name', '=', 'discover-3-with-target')->with('discoverItems')->first()->discoverItems ?? [];
        


        return view('frontend.welcome', 
            compact(
                'title', 'hero', 'cardList', 'contentSide', 'cta', 'discoverItemsOne', 'discoverItemsTwo', 'discoverItemsThree', 'seoDescription',
                'seoKeyword'
            )
        );
    }
}
