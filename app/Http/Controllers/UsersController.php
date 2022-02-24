<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    private $message;
    public function index(){
        $userList = $this->userList();
        return view('admin.users',[
            'userList' => $userList,
        ]);
    }

    private function userList() {
        $userList = Users::where('status', 1)->get();

        return $userList;
    }

    public function update($id) {
        $this->message = Session::get('message');
        $user = Users::find($id);
        return view('admin.user-update', [
            'userInfo' => $user,
            'message' => $this->message
        ]);
    }

    public function updateUser(Request $request) {
        if($request->password == $request->repassword){
            $userInfo = Users::where('id', $request->user_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => md5($request->password)
            ]);
            return redirect(route('users'));
        }else {
            $this->message = "Şifre eşleşmiyor";
            return redirect()->back()->with('message' , $this->message);
        }
    }

    public function delete($id){
        $userInfo = Users::find($id);
        return view('admin.user-delete', [
           'userInfo' => $userInfo,
        ]);
    }

    public function deletePost(Request $request) {
        Users::where('id', $request->user_id)
            ->update([
                'status' => 9
            ]);
        return redirect(route('users'));
    }

    public function add(Request $request){
        if($request->password == $request->repassword) {
            $user = Users::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => md5($request->password),
                'status' =>1
            ]);
            $user->save();
            return redirect(route('users'));
        }
    }
}
