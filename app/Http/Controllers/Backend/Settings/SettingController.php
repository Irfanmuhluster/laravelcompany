<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\MailTemplate;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function emailTemplate()
    {
        $emailtemplate = new MailTemplate();
        $dataemailtemplate = $emailtemplate->search()->paginate(config('app.setting.backend.no_of_records'));

        return view('admin::settings.emailtemplate', compact('dataemailtemplate'));
    }

    public function editemailTemplate($id)
    {
        $emailtemplate = new MailTemplate();
        $dataemailtemplate = $emailtemplate->findOrFail($id);

        return view('admin::settings.editemailtemplate', compact('dataemailtemplate'));
    }
}
