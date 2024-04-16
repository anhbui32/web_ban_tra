<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public $data;
    public function __construct()
    {
        $this->data['productInF'] = Products::paginate(6);
        $this->data['category'] = Category::all();
    }
    public function index()
    {
        $this->data['title'] = 'Home';
        return view('clients.home', $this->data);
    }
    public function about()
    {
        $this->data['title'] = 'About';
        return view('clients.about', $this->data);
    }
    public function contact()
    {
        $this->data['title'] = 'Contact Us';
        return view('clients.contact', $this->data);
    }
    public function formLogin()
    {
        Auth::logout();
        $this->data['title'] = 'Site Login';
        return view('layouts.blocks.login', $this->data);
    }
    public function store()
    {
        $this->data['title'] = 'Store';
        return view('clients.store', $this->data);
    }
    public function formRegister()
    {
        $this->data['title'] = 'Site register';
        return view('layouts.blocks.register', $this->data);
    }
    // public function testEmail()
    // {
    //     Mail::send('email.sendNotice', ['mess' => 'Chào mừng quý khách'], function ($email) {
    //         // $email->from('buituananh03022000@gmail.com', 'Tea House Nhà Tuấn Anh'); //vì đã cài đặt bên cấu hình nên ko cần dòng này.
    //         $email->to('anhbtps27044@fpt.edu.vn');
    //         $email->subject('Thông báo email đầu tiên của Tuấn Anh');
    //     });
    // }
}
