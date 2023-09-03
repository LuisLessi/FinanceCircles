<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    /**
     *Methos to user login View
     */
    public function login()
    {
        return view('user.login');
        echo "login";
    }

}
