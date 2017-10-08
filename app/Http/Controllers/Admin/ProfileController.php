<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lang;

class ProfileController extends Controller
{
    private $data = array(
        'controller' => 'Admin\ProfileController',
        'route' => 'admin.',
        'title' => 'Profile',
        'menu' => '',
        'submenu' => '',
    );
    
    public function index()
    {
        $this->data['record'] = Auth::guard('admin')->user();
        return view('admin.profile',$this->data);
    }

    public function info(Request $request)
    {
        
        if($request->profile_img){
            $this->validate($request,[
                'profile_img' => 'required|image:jpg,png,jpeg|max:5000'
                ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email'
            ]);    
        }

        $profile_img ='';
        if(!empty($request->file('profile_img'))){
            /* Image Upload code */
            $source_name = $request->file('profile_img')->getClientOriginalName();
            // $imageName = md5_file($request->file('profile_img'));
            
            $imageName = 'admin_logo';
            
            $ext = pathinfo($source_name,PATHINFO_EXTENSION);

            $request->file('profile_img')->move(
                base_path() . '/public/uploads/admin/', $imageName . "." . $ext
            );
            $profile_img = $imageName.".".$ext;
        }

        
        $record = Auth::guard('admin')->user();

        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'profile_img' => ($profile_img!='') ? $profile_img : $record->profile_img
        );
        
        $record->update($input);
        
        $notification = array(
            'message' => Lang::get('Profile info has been updated.'), 
            'alert-type' => 'info'
        );

        return redirect('/admin/profile')->with($notification);
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $record = Auth::guard('admin')->user();
        
        $request['password'] = bcrypt($request['password']);
        $record->update($request->all());
        
        //Session::flash('info','Password changed successfully.');
        
        return Redirect('admin/profile');
    }
}
