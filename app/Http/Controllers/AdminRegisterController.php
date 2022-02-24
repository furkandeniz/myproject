<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class AdminRegisterController extends Controller
{
    protected $status;
    protected $statusMessage;

    public function create(Request $request) {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $password = $request->password;
        $repassword = $request->repassword;
        if($this->isMatchPassword($password, $repassword)){
            if($this->hasUser($email) == false) {
                Users::create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'password' => md5($password),
                    'status' => 1,
                    'role' => 'Admin'
                ]);
            }else {
                $statusMessage = "Mevcutta olan bi e-posta girdiniz. Lütfen e-posta adresini kontrol ediniz.";
                return view('admin.register',[
                    'statusMessage' => $statusMessage
                ]);
            }
        }else {
            $statusMessage =  "Girmiş olduğunuz şifreler Eşleşmemektedir. Lütfen şifrenizi tekrar giriniz";
            return view('admin.register',[
                'statusMessage' => $statusMessage
            ]);
        }
        return redirect('admin');
    }

    private function isMatchPassword($password, $repassword) {
        $this->status = false;
        if($password == $repassword){
            $this->status = true;
        }
        return $this->status;
    }

    private function hasUser($email) {
        $this->status = false;
        $userInfo = Users::where('email', $email)->first();
        if(isset($userInfo->email)) {
            $this->status = true;
        }
        return $this->status;
    }
}
