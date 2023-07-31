<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function showIndex(){
        return view('admin.index');
    }

    public function showProfile(){
        return view('admin.profile');
    }
    public function updateProfile(Request $request,User $user){
        $formFields = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'password'=>['min:0','confirmed'],

        ]);
        if($formFields['password']==""){
            $formFields['password'] = $user->password;
        }else{
            // Hash the password
         $formFields['password'] = Hash::make($formFields['password']);
        }


        $user->update($formFields);

        return back()->with('message',"Profile Updated Successfully");
    }
    public function showUsers(){
        return view('admin.userLists',[
            'users'=>User::latest()->filter(request(['search']))->paginate(5)
        ]);
    }

    public function addUserForm(){
        return view('admin.addUser');
    }
    public function addUserAction(Request $request){
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email'],
            'password'=>['required','min:8','confirmed'],
            'role'=>['required']
        ]);

        $formFields['password'] = Hash::make($formFields['password']);
        User::create($formFields);

        return redirect('/admin/userLists')->with('message','User created successfully');
    }

    public function editUserForm(User $user){
        return view("admin.editUser",['user'=>$user]);
    }

    public function editUserAction(Request $request, User $user){
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email'],
            'role'=>['required'],
            'password'=>['min:0']

        ]);

        if($formFields['password']==""){
            $formFields['password'] = $user->password;
        }else{
            $formFields['password'] = Hash::make($formFields['password']);
        }


        $user->update($formFields);

        return redirect('/admin/userLists')->with('message','User updated successfully');

    }

    public function deleteUserAction(User $user){
        $user->delete();

        return redirect('/admin/userLists')->with('message',"User deleted Successfully");
    }

    public function manageAllJobs(){


        return view('admin.jobLists',
    [
        'jobs'=>Jobs::latest()->filter(request(['search']))->paginate(5)
    ]);
    }
}