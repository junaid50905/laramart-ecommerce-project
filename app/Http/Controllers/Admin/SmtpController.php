<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Smtp;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    //create
    public function create()
    {
        $smtp_info = Smtp::first();
        return view('admin.settings.smtp.create', compact('smtp_info'));
    }
    //store
    public function store(Request $request, $id)
    {
        Smtp::where('id', $id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect()->route('settings.smtp.create')->with('success', 'SMTP settings has been saved');
    }
}
