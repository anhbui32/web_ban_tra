<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutAdminController extends Controller
{
    public $dataAdmin = array();
    // public function adminHome()
    // {
    //     $this->dataAdmin['title'] = 'Admin Page';
    //     return view('layouts/admin');
    // }
    public function dashboard()
    {
        $this->dataAdmin['title'] = 'Dashboard';
        return view('admin/dashboard', $this->dataAdmin);
    }
    public function allForm()
    {
        $this->dataAdmin['title'] = 'All Form';
        return view('admin/allform', $this->dataAdmin);
    }
    public function widget()
    {
        $this->dataAdmin['title'] = 'Widget';
        return view('admin/widget', $this->dataAdmin);
    }
}
