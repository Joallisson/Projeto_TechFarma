<?php

namespace App\Http\Controllers;

use App\Admin as AppAdmin;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $user = false;

    private $admin = true;

    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['fazerLogin', 'fazerCadastro']]);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function telaLogin()
    {
        return view('auth.admin.login');
    }

    public function fazendoLogin(Request $request)
    {
        {
            try {
                $admin = DB::table('admins')->where('email', $request->email)->first();

                if (Hash::check($request->password, $admin->password)) {
                    Auth::login();
                    $admin = true;
                    return redirect()->intended('admin/index');
                }else {
                    return "A senha não confere";
                }

            } catch (\Throwable $th) {
                return "O E-mail não confere";
            }
        }

    }

    public function fazerCadastro()
    {
        return view('auth.admin.cadastro');
    }

    public function logout()
    {
        $admin = false;
        Auth::logout();
        return redirect()->route('login');
    }


}
