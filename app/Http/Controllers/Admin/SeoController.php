<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    //create
    public function create()
    {
        $meta_info = Seo::first();
        return view('admin.settings.seo.create', compact('meta_info'));
    }
    //store
    public function store(Request $request, $id)
    {
        Seo::where('id', $id)->update([
                'meta_title'=> $request->meta_title,
                'meta_author'=> $request->meta_author,
                'meta_description'=> $request->meta_description,
                'meta_tags'=> $request->meta_tags,
                'meta_keyword'=> $request->meta_keyword,
                'google_varification'=> $request->google_varification,
                'google_analytics'=> $request->google_analytics,
                'google_adsense'=> $request->google_adsense,
                'alexa_varification'=> $request->alexa_varification,
        ]);
        return redirect()->route('settings.seo.create')->with('success', 'seo settings has been saved');
    }

}
