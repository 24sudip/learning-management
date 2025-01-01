<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{SmtpSetting, SiteSetting};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    public function AllSiteSetting() {
        $site_setting = SiteSetting::first();
        return view('admin.backend.site.site-update', compact('site_setting'));
    }

    public function UpdateSite(Request $request, $id) {
        if ($request->file('logo')) {
            @unlink(public_path(SiteSetting::find($id)->logo));

            $manager = new ImageManager(new Driver());
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(140,41);
            $img->toJpeg(80)->save(base_path('public/upload/logo/'. $name_gen));
            $save_url = 'upload/logo/'. $name_gen;

            SiteSetting::find($id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $save_url,
            ]);
            $notification = array(
                'message' => 'Site Setting Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            SiteSetting::find($id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
            ]);
            $notification = array(
                'message' => 'Site Setting Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
