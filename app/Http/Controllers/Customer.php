<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAndRegister\RegisterRequest;
use Mail;


class Customer extends Controller
{
    public $dataUser = [];
    public function __construct()
    {
        $this->dataUser = new Users();
    }
    public function checkLogin(Request $request)
    {
        $request->validate(
            [
                'mailIn' => 'required|email:rfc,filter,filter_unicode,strict',
                'passwordIn' => 'required',
            ]
        );
        // $data = $request->only('email', 'password');
        if (Auth::attempt(
            ['email' => $request->input('mailIn'), 'password' => $request->input('passwordIn'), 'role_id' => 1]
        )) {
            return redirect()->route('admin.dashboard')->with('name', [$request->input('user_name')]);
        } elseif ((Auth::attempt(
            ['email' => $request->input('mailIn'), 'password' => $request->input('passwordIn'), 'role_id' => [0, 2, 3]]
        ))) {
            return redirect()->route('home');
        }
        return back();
    }
    public function addUser(RegisterRequest $request)
    {
        // //cách 1:
        // $user = request()->except('password');
        // $user['password'] = Hash::make($request->password);
        // Users::create($user);

        // // cách 2:
        // $password = Hash::make($request->password);
        // $insertUser = [
        //     $request->user_name,
        //     $password,
        //     $request->email,
        // ];
        // if ($request->password == $request->password_confirmation) {
        // $this->dataUser->addUser($insertUser);
        // $this->dataUser->addUser($request->user_name, $password, $request->email, date('Y-m-d H:i:s'));
        // }

        // // cách 3:
        // $costomer = $request->only('user_name','email','password');

        // // cách 4:
        $request->merge(['password' => Hash::make($request->password)]);
        // dd($request);
        if ($addCostermer = Users::create($request->all())) {
            Mail::to($addCostermer->email)->send(new VerifyAccount($addCostermer));
            return redirect()->route('nguoidung.formLogin')
                ->with('mess', 'Bạn đã đăng ký thành công.');
        }
        return redirect()->back()->with('mess', 'Hãy kiểm tra lại các trường đã nhập.');
    }
    public function verifyMail($email)
    {
        Users::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        Users::where('email', $email)->update([
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('nguoidung.formLogin');
    }
}
