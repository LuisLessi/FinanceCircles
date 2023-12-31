<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstitutionRepository;
use App\Repositories\UserRepository;
use App\Validators\GroupValidator;
use App\Services\GroupService;

/**
 * Class GroupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GroupsController extends Controller
{
    protected $institutionRepository;
    protected $userRepository;
    protected $repository;
    protected $validator;
    protected $service;

    public function __construct(
        GroupRepository $repository,
        GroupValidator $validator,
        GroupService $service,
        InstitutionRepository $institutionRepository,
        UserRepository $userRepository
    ) {
        $this->institutionRepository = $institutionRepository;
        $this->userRepository        = $userRepository;
        $this->repository            = $repository;
        $this->validator             = $validator;
        $this->service               = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group            = $this->repository->all();
        $user_list        = $this->userRepository->selectBoxList();;
        $institution_list = $this->institutionRepository->selectBoxList();

        return view('groups.index', [
            'groups'           => $group,
            'user_list'        => $user_list,
            'institution_list' => $institution_list
        ]);
    }


    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $groups   = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        $user_list = $this->userRepository->selectBoxList();
        $institution_list = $this->institutionRepository->selectBoxList();

        $groups = $this->repository->all();

        return view('groups.index', [
            'groups'           => $groups,
            'user_list'        => $user_list,
            'institution_list' => $institution_list
        ]);
    }


    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($group_id, $request->all());

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);


        return redirect()->route('group.show', $group_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList();

        return view('groups.show', [
            'group' => $group,
            'user_list' => $user_list,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->repository->find($id);
        $user_list        = $this->userRepository->selectBoxList();;
        $institution_list = $this->institutionRepository->selectBoxList();

        return view('groups.edit', [
            'group' => $group,
            'user_list' => $user_list,
            'institution_list' => $institution_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {

        $request = $this->service->update($request->all(), $id);
        $group = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('group.index', ['group' => $group]);
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
        $request = $this->service->delete($id);

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('groups.index');
    }
}
