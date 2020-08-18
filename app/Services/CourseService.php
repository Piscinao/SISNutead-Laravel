<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Validators\CourseValidator;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Support\MessageBag;
use Exception;
use Illuminate\Database\QueryException;

class CourseService

{
    private $repository;
    private $validator;

    public function __construct(CourseRepository $repository, CourseValidator $validator)

{
    //acesso a propriedade da classe
    //pegando o objeto instanciado dentro d método
    $this->repository = $repository;
    $this->validator = $validator;

}

public function store(array $data)

{
    try
    {

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
        $course = $this->repository->create($data);



        return
        [
            'success' => true,
            'messages' => 'Curso cadastrada',
            'data' => $course,
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

public function destroy($course_id)
    {
        try
        {
            $this->repository->delete($course_id);


            return
            [
                'success' => true,
                'messages' => 'Usuário deletado',
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

public function userStore($course_id, $data)
{
    try
    {
        $course = $this->repository->find($course_id);
        $user_id = $data['user_id'];

        $course->users()->attach($user_id);

        // método users do relacionamento definido no entities




        return
        [
            'success' => true,
            'messages' => 'Usuário relacionado com sucesso',
            'data' => $course,
        ];

    }

    catch(Exception $e)

    {

        dd($e);
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
