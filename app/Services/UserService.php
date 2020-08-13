<?php


namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Support\MessageBag;
use Exception;
use Illuminate\Database\QueryException;

class UserService

{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;



    }

    public function store($data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $usuario = $this->repository->create($data);


            return
            [
                'success' => true,
                'message' => 'Usuário cadastrado',
                'data' => $usuario,
            ];



        }

        catch(Exception $e)
        {
            switch(get_class ($e))
            {
                case QueryException::class : return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class : return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class :  return ['success' => false, 'messages' => $e->getMessage()];
                default :  return $e->getMessage();
            }


        }
    }

    public function update(){}

    public function delete(){}

}


