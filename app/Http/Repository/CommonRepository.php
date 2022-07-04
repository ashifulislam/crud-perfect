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

}
