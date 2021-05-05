<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile($id){
        $user = User::findOrFail($id);
        return view('admin.profile',compact('user'));
    }
    public function store($id,Request $request){
        try {
            $user = User::where('id',$id)->first();
            if ($request->hasFile('avatar')){
                $filename = time().$request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->move('uploads/profile-pictures/',$filename);
            }
            $request_all = $request->all();
            $request_all['avatar']=$filename ?? $user->avatar;
            $user->update($request_all);

            if (auth()->user()->isAdmin()){
                return redirect()->route('admin_dashboard')->with('success','Profile Successfully updated!');
            }elseif (auth()->user()->isStudent()){
                return redirect()->route('student_dashboard')->with('success','Profile Successfully updated!');
            }else{
                return redirect()->route('rater_dashboard')->with('success','Profile Successfully updated!');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong!'.$e->getMessage());
        }
    }
}
