<?php
namespace App\Http\Services;
class CommonService
{
    public $repository;

    function __construct($repository)
    {
        $this->repository = $repository;
    }
    function getCustomerByUserId($user_id)
    {
        return $this->repository->getCustomerByUserId($user_id);
    }

}
