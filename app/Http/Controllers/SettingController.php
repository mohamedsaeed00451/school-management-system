<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::all();
        $setting['setting'] = $data->flatMap(function ($data) {
            return [$data->Key => $data->Value];
        });
        return view('pages.Settings.index', $setting);
    }

    public function update(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key => $value) {
                Setting::where('Key', $key)->update(['Value' => $value]);
            }

            if ($request->hasFile('logo')) {
                $fileName = $request->file('logo')->getClientOriginalName();
                $image = Setting::where('Key', 'logo')->pluck('Value');
                foreach ($image as $value) {
                    if (Storage::disk('Attachments')->exists('Logo/' . $value)) {
                        Storage::disk('Attachments')->delete('Logo/' . $value);
                    }
                }
                Setting::where('Key', 'logo')->update(['Value' => $fileName]);
                $request->file('logo')->storeAs('Logo', $fileName, 'Attachments');
            }

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('settings.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
