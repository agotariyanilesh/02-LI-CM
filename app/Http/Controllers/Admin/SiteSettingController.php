<?php

namespace App\Http\Controllers\Admin;

use App\Model\Site_setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Lang;

class SiteSettingController extends Controller
{
    private $data = array(
        'route' => 'admin.site_setting.',
        'title' => 'Site Setting',
        'menu' => 'siteSetting',
        'submenu' => '',
    );
    public function __construct()
    {
        // $this->middleware('auth');
    }
    private function _validate($request, $id = null)
    {
        if($request->site_logo){
            $this->validate($request,[
                'site_logo' => 'required|image:jpg,png,jpeg|max:5000'
                ]);
        } elseif ($request->site_favicon) {
            $this->validate($request,[
                'site_favicon' => 'required|image:jpg,png,jpeg|max:5000'
                ]);
        } 
        else {
            $this->validate($request, [
                'site_name' => 'required|max:255', 
            ]);
        }
        
    }

    public function edit()
    {
        $this->data['record'] = Site_setting::firstOrFail();
        return view('admin.site_setting.index',$this->data);
    }

    public function info(Request $request)
    {
        $this->_validate($request);
        $site_logo ='';
        if(!empty($request->file('site_logo'))){
            /* Image Upload code */
            $source_name = $request->file('site_logo')->getClientOriginalName();
            $imageName = 'site_logo';
            $ext = pathinfo($source_name,PATHINFO_EXTENSION);
            $request->file('site_logo')->move(
                base_path() . '/public/uploads/admin/logo', $imageName . "." . $ext
            );
            $site_logo = $imageName.".".$ext;
        }

        $site_favicon ='';
        if(!empty($request->file('site_favicon'))){
            /* Image Upload code */
            $source_name = $request->file('site_favicon')->getClientOriginalName();
            $imageName = 'site_favicon';
            $ext = pathinfo($source_name,PATHINFO_EXTENSION);
            $request->file('site_favicon')->move(
                base_path() . '/public/uploads/admin/logo', $imageName . "." . $ext
            );
            $site_favicon = $imageName.".".$ext;
        }
        $record = Site_setting::firstOrFail();
        
        $input = array(
            'site_name' => $request->site_name,
            'site_logo' => ($site_logo!='') ? $site_logo : $record->site_logo,
            'site_favicon' => ($site_favicon!='') ? $site_favicon : $record->site_favicon,
            'fb_url' => $request->fb_url,
            'tw_url' => $request->tw_url,
            'li_url' => $request->li_url,
            'contact_email' => $request->contact_email,
            'contact_num' => $request->contact_num,
            'paypal_user' => $request->paypal_user,
            'paypal_pwd' => $request->paypal_pwd,
            'paypal_secret' => $request->paypal_secret,
            'smtp_user' => $request->smtp_user,
            'smtp_pwd' => $request->smtp_pwd
        );
        $record->update($input);

        $notification = array(
            'message' => Lang::get('messages.success.sitesettigs.updated'), 
            'alert-type' => 'info'
        );
        return redirect('admin/siteSetting')->with($notification);
    }
}