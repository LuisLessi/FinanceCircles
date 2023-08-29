<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;

class GroupService
{
    private $repository;
    private $validator;

    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function store(array $data){
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $institution = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => "Registered institution",
                'data' => $institution,
            ];
        }catch(Exception $e){
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidationException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => $e->getMessage()];
            }
            return [
                'success' => false,
                'messages' => "Error registering user",
                'data' => $e->getMessage(),
            ];
        }
    }

    public function userStore($group_id, $data)
    {
        try{
            $group   = $this->repository->find($group_id);
            $user_id = $data['user_id'];

            $group->users()->attach($user_id);

            return [
                'success' => true,
                'messages' => "Registered user in group",
                'data' => null,
            ];
        }catch(Exception $e){
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidationException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => $e->getMessage()];
            }
            return [
                'success' => false,
                'messages' => "Error registering user",
                'data' => $e->getMessage(),
            ];
        }
    }

    public function update($data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $group = $this->repository->update($data, $id);
            return [
                'success' => true,
                'messages' => "Updated group",
                'data' => $group,
            ];
        } catch (Exception $e) {
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidationException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => $e->getMessage()];
            }
            return [
                'success' => false,
                'messages' => "Error registering user",
                'data' => $e->getMessage(),
            ];
        }
    }

    public function delete($group_id)
    {
        try{
            $group_id = $this->repository->destroy($group_id);
            return [
                'success' => true,
                'messages' => "Group id removed",
                'data' => $group_id,
            ];
        }catch(Exception $e){
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidationException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => $e->getMessage()];
            }
        }
    }
}