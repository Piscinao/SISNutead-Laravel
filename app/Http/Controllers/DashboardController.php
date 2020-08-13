<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


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
        return view ('user.dashboard');
    }

    public function auth(Request $request)
    {
        $data = [
            'email' => $request->get('username'),
            'password' => $request->get('password')
        ];

        try
        {
            if(env('PASSWORD_HASH'))
            {
                Auth::attempt($data, false);
            }

            else
            {
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();

                if(!$user)

                    throw new Exception("Email informado é inválido");



                if($user->password == $request->get('password'))

                    throw new Exception("Senha informado é inválido");

                //autenticacao a partir de um objeto
                Auth::login($user);


            }


            return redirect()->route('user.dashboard');

        }


        catch (Exception $e)
        {
            return $e->getMessage();
        }






    }
    //
}
