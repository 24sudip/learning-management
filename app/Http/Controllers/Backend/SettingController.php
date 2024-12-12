<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;

class SettingController extends Controller
{
    public function SmtpSetting() {
        $smtp_setting = SmtpSetting::first();
        return view('admin.backend.setting.smtp-update', compact('smtp_setting'));
    }

    public function UpdateSmtp(Request $request, $id) {
        SmtpSetting::find($id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address
        ]);
        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
