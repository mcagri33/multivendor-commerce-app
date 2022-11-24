<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CastleSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $data = Setting::first();
        if ($data === null) {
            $data = new Setting();
            $data->title = 'Global';
            $data->save();
            $data = Setting::first();
        }
        return view('castle.setting.edit', ['data' => $data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $info = Setting::findOrFail($request->id);
        $old_img = $request->old_image;
        $files = [];
        if ($request->file('logo'))
            $files[] = $request->file('logo');
        if ($request->file('favicon'))
            $files[] = $request->file('favicon');

        foreach ($files as $file) {
            if (!empty($file)) {
                $filenames[] = $file->getClientOriginalName();
                $file->move(base_path() . '/public/assets/castle/upload/', end($filenames));
            }
        }
        if (file_exists($old_img)) {
            unlink($old_img);
        }

        if ($request->file('logo') || $request->file('favicon')) {
            $info->title = $request->title;
            $info->logo = '/assets/castle/upload/' . $filenames[0];
            $info->favicon = '/assets/castle/upload/' . $filenames[1];
            $info->keywords = $request->keywords;
            $info->description = $request->description;
            $info->company = $request->company;
            $info->address = $request->address;
            $info->phone = $request->phone;
            $info->fax = $request->fax;
            $info->gsm = $request->gsm;
            $info->email = $request->email;
            $info->smtp_server = $request->smtp_server;
            $info->smtp_email = $request->smtp_email;
            $info->smtp_password = $request->smtp_password;
            $info->smtp_port = $request->smtp_port;
            $info->facebook = $request->facebook;
            $info->instagram = $request->instagram;
            $info->linkedin = $request->linkedin;
            $info->twitter = $request->twitter;
            $info->pintrest = $request->pintrest;
            $info->youtube = $request->youtube;
            $info->update();
        } else {
            $info->title = $request->title;
            $info->keywords = $request->keywords;
            $info->description = $request->description;
            $info->company = $request->company;
            $info->address = $request->address;
            $info->phone = $request->phone;
            $info->fax = $request->fax;
            $info->gsm = $request->gsm;
            $info->email = $request->email;
            $info->smtp_server = $request->smtp_server;
            $info->smtp_email = $request->smtp_email;
            $info->smtp_password = $request->smtp_password;
            $info->smtp_port = $request->smtp_port;
            $info->facebook = $request->facebook;
            $info->instagram = $request->instagram;
            $info->linkedin = $request->linkedin;
            $info->twitter = $request->twitter;
            $info->pintrest = $request->pintrest;
            $info->youtube = $request->youtube;
            $info->update();
        }
        return redirect()->back()->with('success', 'Success Created!');
    }


}
