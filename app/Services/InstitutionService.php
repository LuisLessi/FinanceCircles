<?php

namespace App\Services;

use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;
use Exception;
use Prettus\Validator\Contracts\ValidatorInterface;

class InstitutionService
{
    private $repository;
    private $validator;

    public function __construct(InstitutionRepository $repository, InstitutionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function store(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $institution = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => "Registered institution",
                'data' => $institution,
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

    public function update($data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $institution = $this->repository->update($data, $id);
            return [
                'success' => true,
                'messages' => "Updated institution",
                'data' => $institution,
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

    public function delete($institution_id)
    {
        try {
            $institution_id = $this->repository->destroy($institution_id);
            return [
                'success' => true,
                'messages' => "Institution_id removed",
                'data' => $institution_id,
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
        }
    }
}
