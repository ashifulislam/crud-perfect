<?php

namespace App\Http\Repository;
use App\User;
class UserRepository extends CommonRepository
{
    public $model;

    function __construct()
    {
        $this->model = new User();
        parent::__construct($this->model);
    }
    function deleteCustomer($id)
    {
        return $this->model->where('id',$id)->delete();
    }
}
