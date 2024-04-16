<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\User\CreateRequests;
use App\Models\Users;

class UserController extends Controller
{
    protected $users = [];
    public function __construct()
    {
        $this->users = new Users();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->users['allUsers'] = DB::table('users')->paginate(5);
        // dd($this->users['allUsers']);
        $this->users['title'] = 'Admin-Users List';
        return view('admin.userList', $this->users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->users['title'] = 'Admin-User Create';
        return view('admin.userCreate', $this->users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequests $request)
    {
        if (request()->has('file_media')) {
            $file = request()->file('file_media');
            $file_name = $file->getClientOriginalName();
            $destinationPath = "uploads";
            $file->move($destinationPath, $file_name);
            $request->merge(['hinhanh' => $file_name]);
        }
        $password = Hash::make($request->password);
        $user = request()->except('image', 'password');
        $user['password'] = $password;
        $user['image'] = $file_name;
        Users::create($user);
        return redirect()->route('users.index')->with('mess', 'Đã thêm mới thành viên');
        // return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id = null)
    {
        $userIn = $this->users->getUersById($id);
        $title = $this->users = 'Admin-Edit User';
        return view('admin.userEditForm', compact('title', 'userIn'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate(
            [
                'file_media' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => 'required|email|unique:users,email,' . $id, //Auth::user()->$id,
                'phone_number' => ['required', 'regex:/^(0|\+84)(\d{9,10})$/'],
                'user_name' => 'required',
                'address' => 'required',
                'role' => ['required', 'in:0, 1,2,3'],
            ],
            [
                'role.in' => 'Bạn chỉ được nhập số 0, 1, 2 hoặc 3 thôi nhé!',
            ]
        );
        if ($request->has('file_media')) {
            $file = $request->file('file_media');
            $file_name = $file->getClientOriginalName();
            $destinationPath = "uploads";
            $file->move($destinationPath, $file_name);
        }
        // $request->merge(['image' => $file_name]);
        if (empty($file_name)) {
            DB::table('users')->where('id', $id)->update([
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role_id' => $request->role,
                'address' => $request->address,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            DB::table('users')->where('id', $id)->update([
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role_id' => $request->role,
                'address' => $request->address,
                'updated_at' => date('Y-m-d H:i:s'),
                'image' => $file_name,
            ]);
        }

        return redirect()->route('users.index')->with('notice', 'Đã cập nhập thành công!');
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id = null)
    // {
    //     $this->users->deleteUser($id);
    //     return redirect()->back()->with('notice', 'Xóa thành công!');
    // }
    public function destroy(Users $users, $id = null)
    {
        Users::find($id)->delete();
        return redirect()->back()->with('notice', 'Xóa thành công!');
    }
}
