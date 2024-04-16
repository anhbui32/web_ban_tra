<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Phalcon\Http\Request;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'id',
        'user_name',
        'token',
        'email',
        'email_verified_at',
        'password',
        'address',
        'remember_token',
        'created_at',
        'updated_at',
        'phone_number',
        'deleted',
        'status',
        'image',
        'role_id',
        'gender',
        'birth_day',
    ];
    public function getAllUsers()
    {
        return DB::table('users')->get();
    }
    public function addUser(...$user)
    {
        DB::table('users')->insert([
            'user_name' => $user[0],
            'password' => $user[1],
            'email' => $user[2],
            'created_at' => $user[3],
        ]);
        // DB::insert('INSERT INTO users (user_name, password, email)
        // VALUES (?,?,?)', $data);
    }
    //Cách khác: sử dụng Eloquent ORM để thêm user.
    // public function addU(Request $request)
    // {
    //     return $this->table::create($request->all());
    // }
    public function getUersById($id)
    {
        return DB::table('users')->where('id', '=', $id)->first();
    }
    public function updateUser($id, ...$user)
    {
        return DB::table('users')->where('id', $id)->update([
            'user_name' => $user[0],
            'email' => $user[1],
            'phone_number' => $user[2],
            'role_id' => $user[3],
            'address' => $user[4],
            'updated_at' => $user[5],
            // 'image' => $user[5],
            // 'password' => $user[2],
        ]);
    }
    // public function deleteUser($id)
    // {
    //     return DB::table('users')->where('id', $id)->delete();
    // }
}
