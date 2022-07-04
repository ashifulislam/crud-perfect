<?php
namespace App\Http\Services;
class CommonService
{
    public $repository;

    function __construct($repository)
    {
        $this->repository = $repository;
    }

}
