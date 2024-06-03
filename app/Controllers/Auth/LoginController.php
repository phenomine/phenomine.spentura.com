<?php

namespace App\Controllers\Auth;

use Phenomine\Support\Hash;
use Phenomine\Support\Http\Request;
use Phenomine\Support\Routing\Get;
use Phenomine\Support\Routing\Post;

class LoginController
{
    #[Get('/login', 'login')]
    public function index()
    {
        return view('pages.auth.login');
    }

    #[Post('/login', 'login.store')]
    public function store(Request $request)
    {
        $password = Hash::make($request->input('password'));
        $check = Hash::check('password', $password);
        dd($request, $password, $check);


    }
}
