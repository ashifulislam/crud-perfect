<?php

namespace App\Http\Repository;

class CommonRepository
{
    public $model;

    function __construct($model)
    {
        $this->model = $model;
    }
    function create($data)
    {
        return $this->model->create($data);
    }

    function update($where,$data)
    {
        return $this->model->where($where)->update($data);
    }

    public function getCustomerByUserId($user_id)
    {
        return $this->model->where('user_id', $user_id)->first();

    }


}
