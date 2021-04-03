<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::first();
        return view('admin.settings.setting' , compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'site_name' => 'required|min:5|max:50',
            'contact_no' => 'required',
            'contact_email' => 'required',
            'address' => 'required',
       ]);

       
       $setting = Setting::first();
       
       if($request->has('logo')){
           $logo = $request->logo;

           $name = time().$logo->getClientOriginalName();
           $logo->move('images' , $name);
           $setting->logo =  'images/' . $name;
       }

       

       $setting->site_name = $request->site_name;
       $setting->contact_no = $request->contact_no;
       $setting->contact_email = $request->contact_email;
       $setting->address = $request->address;
       $setting->save();
       
    
       return redirect(route('admin.settings'))->with('message' , 'Settings Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
