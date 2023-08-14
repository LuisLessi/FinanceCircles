<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Facade\Ignition\QueryRecorder\Query;
use Nette\Utils\Validators;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService
{   
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function store($data){
        try{
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $user = $this->repository->create($data);
            return [
                'success' => true,
                'messages' => "Registered user",
                'data' => $user,
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
    public function update(){}
    public function delete($user_id)
    {
        try{
            $user = $this->repository->destroy($user_id);
            return [
                'success' => true,
                'messages' => "User removed",
                'data' => $user,
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