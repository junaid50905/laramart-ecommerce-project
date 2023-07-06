<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Http\Controllers\Controller;

class WebsiteSettingController extends Controller
{
    //create
    public function create()
    {
        $website_info = WebsiteSetting::first();
        return view('admin.settings.website.create', compact('website_info'));
    }
    //store
    public function store(Request $request, $id)
    {
        $data = [
            'currency' => $request->currency,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'main_mail' => $request->main_mail,
            'support_mail' => $request->support_mail,
            'address' => $request->address,
            'facebook_link' => $request->facebook_link,
            'instragram_link' => $request->instragram_link,
            'twitter_link' => $request->twitter_link,
            'youtube_link' => $request->youtube_link,
        ];

        //logo
        if ($request->hasFile('logo')) {
            $logo = $this->uploadLogo($request->logo);
            $data['logo'] = $logo;
        }
        //favicon
        if ($request->hasFile('favicon')) {
            $favicon = $this->uploadFavicon($request->favicon);
            $data['favicon'] = $favicon;
        }

        WebsiteSetting::where('id', $id)->update($data);
        return redirect()->route('settings.website.create')->with('success', 'website settings has been saved');

    }
    //upload logo function
    public function uploadLogo($file)
    {
        $logo = uniqid() . '.' . $file->getClientOriginalExtension();

        $pathToUpload = storage_path() . '/app/public/files/website_settings_images/';

        if (!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0755, true);
        }
        Image::make($file)->resize(180, 120)->save($pathToUpload . $logo);
        return $logo;
    }
    //upload favicon function
    public function uploadFavicon($file)
    {
        $favicon = uniqid() . '.' . $file->getClientOriginalExtension();

        $pathToUpload = storage_path() . '/app/public/files/website_settings_images/';

        if (!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0755, true);
        }
        Image::make($file)->resize(32, 16)->save($pathToUpload . $favicon);
        return $favicon;
    }
}
