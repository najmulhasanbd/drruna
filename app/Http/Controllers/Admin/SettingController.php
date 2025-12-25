<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }
    public function store(Request $request)
    {
        $inputs = $request->except('_token');

        foreach ($inputs as $key => $value) {

            if ($request->hasFile($key)) {

                $existingSetting = \App\Models\Setting::where('key', $key)->first();

                if ($existingSetting && $existingSetting->value) {
                    $oldPath = public_path($existingSetting->value);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $file = $request->file($key);
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $directory = 'uploads/settings/';
                $file->move(public_path($directory), $filename);

                $value = $directory . $filename;
            }

            if ($value !== null) {
                \App\Models\Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        $settingsService = app()->make(\App\Services\SettingService::class);
        $settingsService->clearCachedSetting();
        $settingsService->setSetting();

        return response()->json([
            'status' => 'success',
            'message' => 'Settings updated successfully!'
        ]);
    }
}
