<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Repositories\CourseRepository;
use App\Repositories\UserRepository;
use App\Repositories\InstituitionRepository;
use App\Services\CourseService;
use App\Services\InstituitionService;
use App\Validators\CourseValidator;


class CoursesController extends Controller
{
    protected $instituitionRepository;
    protected $repository;
    protected $validator;
    protected $service;


    public function __construct(CourseRepository $repository, CourseValidator $validator, InstituitionRepository $instituitionRepository, UserRepository $userRepository, CourseService $service)
    {
        //atribui dentro do construtor do escopo pro metodo para o da classe e chama no use
        $this->instituitionRepository = $instituitionRepository;
        $this->userRepository = $userRepository;
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
    }


    public function index()
    {

        //chamada tipo json
        //$user_list = \App\Entities\User::all();
        //$user_list         = \App\Entities\User::pluck('name', 'id')->all();
        $courses = $this->repository->all();
        $user_list = $this->userRepository->selectBoxList();
        $instituition_list = $this->instituitionRepository->selectBoxList();



        return view('courses.index', [
            'courses' => $courses,
            'user_list' => $user_list,
            'instituition_list' => $instituition_list,
        ]);
    }


    public function store(CourseCreateRequest $request)
    {
        $request = $this->service->store($request->all());

        $instituitions = $request['success'] ? $request['data'] : null;

        // dd($request);

        //mandar a sessão uma vez atraves da view

        session()->flash('success', [
            'success' => $request['success'],
             'messages' => $request['messages'],
        ]);


        return redirect()->route('course.index');
    }

    public function userStore(Request $request, $course_id)
    {

        $request = $this->service->userStore($course_id, $request->all());


        session()->flash('success', [
            'success' => $request['success'],
             'messages' => $request['messages']
        ]);


        return redirect()->route('course.show', [$course_id]);

    }


    public function show($id)
    {
        $course = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList();

        return view('courses.show', [
            'course'    => $course,
            'user_list' => $user_list
        ]);
    }




    public function edit($id)
    {
        $course = $this->repository->find($id);

        return view('courses.edit', compact('course'));
    }


    public function update(CourseUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $course = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Course updated.',
                'data'    => $course->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = $this->service->destroy($id);


        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);



        return redirect()->route('course.index');
    }
}
