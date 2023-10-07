<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'shop_name' => 'required',
            'logo' => 'image | mimes:jpg,bmp,png',
        ]);

        $file = $request->file('logo');

        if (isset($file)) {
            $imageName = 'logo' . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs(
                'logo',
                $request->file('logo'),
                $imageName
            );
        } else {
            $imageName = $setting->logo;
        }

        $setting->shop_name = $request->shop_name;
        $setting->logo = $imageName;
        $setting->save();

        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
