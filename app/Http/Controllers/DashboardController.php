<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $repository;
    private $validator;
    protected $service;


    public function __construct(UserRepository $repository, UserValidator $validator, UserService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service    = $service;
    }

    public function index()
    {
        return view('user.dashboard');
    }

    public function auth(Request $request)
    {
        $data = [
            'email'    => $request->get('username'),
            'password' => $request->get('password')
        ];
    
        try {
            if (env('PASSWORD_HASH')) {
                Auth::attempt($data, false);
            } else {
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
    
                if (!$user) {
                    throw new Exception("email invalid");
                }
    
                if ($user->password != $request->get('password')) {
                    throw new Exception("password invalid");
                }
    
                Auth::login($user);
                return redirect()->route('user.index');
            }
        } catch (Exception $e) {
            // Define a mensagem de erro usando o flash
            session()->flash('error', $e->getMessage());
            return redirect()->back(); // Redireciona de volta para a página de login
        }
    }

    public function registerUser(Request $request)
    {
        $request = $this->service->store($request->all());
        $user = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        $users = $this->repository->all();

        if ($request['success']) {
        return view('user.login', ['users' => $users, 'user' => $user]);
    } else {
        session()->flash('error', 'Error registering, please try again');
        return view('user.register', ['users' => $users, 'user' => $user]);
    }
}

}
