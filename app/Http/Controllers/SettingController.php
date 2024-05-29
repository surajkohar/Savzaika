<?php

namespace App\Http\Controllers;
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\MailNotify;
use App\Mail\MailTesting;
use App\Mail\WelcomeEmail;

class SettingController extends Controller
{
    public function addSMTPAddress(Request $request) {
        $mailSettings = Setting::whereIn('key', [
            'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION','MAIL_FROM_ADDRESS'
        ])->pluck('value', 'key')->toArray();

        return view('admin.setting.mail-setting', compact('mailSettings'));
        // return view('admin.setting.mail-setting');
    }
    public function showSetting()
    {
        $mailSettings = Setting::whereIn('key', [
            'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION',
        ])->pluck('value', 'key')->toArray();

        return view('admin.setting.mail-setting', compact('mailSettings'));
    }

    public function configureSMTP(Request $request)
    {
        $request->validate([
            'MAIL_HOST' => 'required',
            'MAIL_PORT' => 'required|numeric',
            'MAIL_USERNAME' => 'required',
            'MAIL_PASSWORD' => 'required',
            'MAIL_ENCRYPTION' => 'required',
            'MAIL_FROM_ADDRESS' => 'required',
        ]);

        foreach ($request->only(['MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION','MAIL_FROM_ADDRESS']) as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        $mailSettings = Setting::whereIn('key', ['MAIL_HOST', 'MAIL_PORsT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION', 'MAIL_FROM_ADDRESS'])->get();
// dd($mailSettings[0]);

        // foreach ($mailSettings as $setting) {
        //     Config::set('mail.mailers.smtp.' . str_replace('mail_', '', strtolower($setting->key)));
        // }
        foreach ($mailSettings as $setting) {
            $configKey = 'mail.mailers.smtp.' . str_replace('mail_', '', strtolower($setting->key));
            $configValue = $setting->value;
    
            Config::set($configKey, $configValue);
        }

        Toast::success('Mail settings updated successfully.')->autoDismiss(5);
        // Mail::to('rnzaj60@gmail.com')->send(new MailTesting());
        // Mail::to('rnzaj60@gmail.com')->send(new MailNotify($user));
        // Mail::to('rnzaj60@gmail.com')->send(new WelcomeEmail());
        return back();
    }
}
