<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class UsersController extends Controller
{
    function index(Request $request) {
        $user = User::orderBy('roles', 'asc')->get();
        if($request->ajax()){
            $allData = DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                if ($data->roles == "admin") {
                    return '
                        <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('destroy_pengguna', $data->id) .'`)" disabled>Hapus </button>
                    ';
                } else {
                    return '
                        <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('destroy_pengguna', $data->id) .'`)">Hapus </button>
                    ';
                }
                
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.data_users.index',compact('user'));
    }

    function create() {
        return view('pages.data_users.tambahForm');
    }

    function store(Request $request) {
        $validated = $request->validate([
            'name'  => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required',
        ]);
        $validated['password'] = bcrypt('password');
        
        User::create($validated);
        return redirect('/data-pengguna')->with('success', 'Berhasil tambah pengguna baru.');
    }
    
    function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return response('Data berhasil dihapus.', 200);
    }
}
