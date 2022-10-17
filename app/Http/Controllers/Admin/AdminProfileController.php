<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function showProfilePage()
    {
        $authUser = auth()->user();
        
        return view('admin.profile.index', compact('authUser'));
    }


    public function showEditProfilePage()
    {
        $authUser = auth()->user();
        
        return view('admin.profile.profile-edit', compact('authUser'));
    }


    public function submitEditProfilePage(Request $request)
    {
        $user = User::find(auth()->id());
        $user->update($request->all());
        $this->storeUserImage($user);

        return redirect()->route('admin.profile')->with('success', 'Your Profile Updated Successfully');
    }


    public function showEditPasswordPage()
    {
        return view('admin.profile.password-edit');
    }


    public function submitEditPasswordPage(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required|min:8',
            'new_password'     => 'required|min:8',
            'confirm_password' => 'required|min:8|same:new_password'
        ]);

        $currentPassword = auth()->user()->password;

        if( Hash::check($data['current_password'], $currentPassword) ){

            if( !Hash::check($data['new_password'], $currentPassword) ){
                $user = User::find(auth()->id());
                $user->password = Hash::make($data['new_password']);
                $user->save();

                return redirect(url('/logout'))->with('success', 'Your Password Changed Successfully');

            }else{

                return back()->with('error', 'New Password Cannot be Same as Old Password');
            }
            
        }else{

            return back()->with('error', 'Current Password Does Not Match');
            
        }
    }

    
    public function storeUserImage($user)
    {
        if(request()->hasFile('image')){
            $file = request()->file('image');
            $fileName = uniqid(time()) . '_' . $file->getClientOriginalName();
            $savePath = public_path('uploads/user');
            $file->move($savePath, $savePath."/$fileName");
            $user->update([
                'image' => $fileName,
            ]);
        }
    }
}
