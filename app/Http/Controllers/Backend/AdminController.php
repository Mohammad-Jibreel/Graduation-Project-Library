<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $Admins=Admin::all();



        return view('backend.pages.admins.index',compact('Admins'));
    }
    public function create(Request $request){
        session()->flash('status', 'You are now registered !! Please confirm your email address !!');

        return  Admin::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'name' => $request['name'],
            'phone_no' => $request['phone_no'],
            'status' => 0,
            'password' => Hash::make($request['password']),
        ]);
    }
// 'password' => Hash::make($request['password']),



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'username'=>'required|max:50',
            'email' => 'required|nullable',
            'phone_no' => 'required|size:10'],

            ['phone_no.size'=>' The phone number must be 10 digits only and start with 078 or 079 or 077']

        );
        Admin::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'name' => $request['name'],
            'phone_no' => $request['phone_no'],

            'password' => Hash::make($request['password']),
        ]);

        // $Admin = new Admin();
        // $Admin->name = $request->name;
        // $Admin->username=$request->username;
        // $Admin->email = $request->email;
        // $Admin->password = $request->password;
        // $Admin->phone_no= $request->phone_no;
        // $Admin->save();

        session()->flash('success', 'Admin has been created !!');
        return back();
    }



    public function destroy($id) {
        $Admin = Admin::find($id);
        $Admin->delete();

        session()->flash('success', 'Admin has been deleted !!');
        return back();

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'username'=>'required|max:50',
            'email' => 'required|nullable',
            'phone_no' => 'required|max:10:min:10'],
            ['phone_no.min'=>' The phone number must be 10 digits only and start with 078 or 079 or 077',
            'phone_no.max'=>' The phone number must be 10 digits only and start with 078 or 079 or 077']

        );

        $Admin = Admin::find($id);
        $Admin->name = $request->name;
        $Admin->username=$request->username;

        $Admin->email = $request->email;
        $Admin->phone_no= $request->phone_no;

        $Admin->save();

        session()->flash('success', 'Admin has been updated !!');
        return back();
    }


    public function updateStatus($Admin_id,$status_code) {
       try{
    $update_Admin= Admin::whereId($Admin_id)->update([
     'status'=>$status_code

     ]);
     if($update_Admin){
         return redirect()->route('admin.UserAdmin.index')->with('success','Admin status updated successfully');

     }
     return redirect()->route('admin.UserAdmin.index')->with('error','fail to upate Admin status');

       }
       catch(\Throwable $th){
          throw $th;
       }






    }
}
