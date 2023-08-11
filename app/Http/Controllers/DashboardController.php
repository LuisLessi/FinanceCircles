<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        echo "dashboard";
    }   

    public function auth(Request $request)
    {
        $data = [
            'email'    => $request->get('username'),
            'password' => $request->get('password')
        ];

        try {
            if (Auth::attempt($data, false)) {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('user.login');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
