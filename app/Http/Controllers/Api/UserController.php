<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function store(Request $request)
    {
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);
        return response()->json($user, 201);
    }

    public function show(UserModel $user)
    {
        return UserModel::find($user);
    }

    public function update(Request $request, UserModel $user)
    {
        // Inisialisasi array untuk data yang akan diperbarui
        $updateData = $request->all();

        // Periksa apakah permintaan menyertakan data password
        if ($request->has('password')) {
            // Enkripsi password baru jika disertakan dalam permintaan
            $updateData['password'] = bcrypt($request->password);
        }

        // Lakukan pembaruan data pengguna
        $user->update($updateData);
        return UserModel::find($user);
    }

    public function destroy(UserModel $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus'
        ]);
    }
}
