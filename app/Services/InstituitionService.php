<?php

namespace App\Services;

use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Support\MessageBag;
use Exception;
use Illuminate\Database\QueryException;

class InstituitionService

{
    private $repository;
    private $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator)

{
    //acesso a propriedade da classe
    //pegando o objeto instanciado dentro d método
    $this->repository = $repository;
    $this->validator = $validator;

}

public function destroy($instituition_id)
    {
        try
        {
            $this->repository->delete($instituition_id);


            return
            [
                'success' => true,
                'messages' => 'Instituição deletada',
                'data' => null,
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

public function store(array $data)

{
    try
    {

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
        $instituition = $this->repository->create($data);



        return
        [
            'success' => true,
            'messages' => 'Instituição cadastrada',
            'data' => $instituition,
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


}
