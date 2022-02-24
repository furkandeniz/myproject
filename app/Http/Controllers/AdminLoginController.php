<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    protected $status;
    protected $statusMessage;
    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if($this->hasUser($email)){
            if($this->isMatchUserInfo($email, $password)){
                $this->createSession($email);
                return redirect('admin');
            }else {
                $this->statusMessage = "Kullanıcı adı ya da Şifre Hatalı. Lütfen kontrol ediniz";
                return view('admin/login', [
                   'statusMessage' => $this->statusMessage,
                ]);
            }
        }else {
            $this->statusMessage = "Böyle bir kayıtlı kullanıcı bulunamadı.";
            return view('admin/login', [
                'statusMessage' => $this->statusMessage,
            ]);
        }
    }

    private function hasUser($email) {
        $this->status = false;
        $userInfo = Users::where('email',$email)->first();
        if(isset($userInfo)) {
            $this->status = true;
        }
        return $this->status;
    }

    private function isMatchUserInfo($email, $password) {
        $this->status = false;
        $userInfo = Users::where('email', $email)->first();
        if($userInfo->password == md5($password)) {
            $this->status = true;
        }

        return $this->status;
    }

    private function createSession($email){
        $user = Auth::user();
        Session::put('user',$email);
    }

}
