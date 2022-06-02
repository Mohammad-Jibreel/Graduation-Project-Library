<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=User::all();



        return view('backend.pages.users.index',compact('users'));
    }
    public function create(Request $request){
        session()->flash('status', 'You are now registered !! Please confirm your email address !!');

        $request->validate([
            'name' => 'required|max:50',
            'username'=>'required|max:50',
            'email' => 'required',
            'password' => 'required',
            'phone_no' => 'required|max:10:min:10',


        ],
        ['phone_no.min'=>' The phone number must be 10 digits only and start with 078 or 079 or 077',
        'phone_no.max'=>' The phone number must be 10 digits only and start with 078 or 079 or 077']


);
        return  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'phone_no' => $request['phone_no'],
            'status' => 0,
            'password' => Hash::make($request['password']),
        ]);
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'username'=>'required|max:50','unique:users,username',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone_no' => 'required|max:10:min:10|unique:users',


        ],
        ['phone_no.min'=>' The phone number must be 10 digits only and start with 078 or 079 or 077',
        'phone_no.max'=>' The phone number must be 10 digits only and start with 078 or 079 or 077',

        ]


);

        // $User = new User();
        // $User->name = $request->name;
        // $User->username=$request->username;
        // $User->email = $request->email;
        // $User->password = $request->password;
        // $User->phone_no= $request->phone_no;
        // $User->save();


        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'phone_no' => $request['phone_no'],
            'status' => 0,
            'password' => Hash::make($request['password']),
        ]);

        session()->flash('success', 'User has been created !!');
        return back();
    }



    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        session()->flash('success', 'user has been deleted !!');
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

        $User = User::find($id);
        $User->name = $request->name;
        $User->username=$request->username;

        $User->email = $request->email;
        $User->phone_no= $request->phone_no;

        $User->save();

        session()->flash('success', 'user has been updated !!');
        return back();
    }


    public function updateStatus($user_id,$status_code) {
       try{
    $update_user= User::whereId($user_id)->update([
     'status'=>$status_code

     ]);
     if($update_user){
         return redirect()->route('admin.user.index')->with('success','user status updated successfully');

     }
     return redirect()->route('admin.user.index')->with('error','fail to upate user status');

       }
       catch(\Throwable $th){
          throw $th;
       }






    }
}
