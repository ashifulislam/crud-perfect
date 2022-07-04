<?php
namespace App\Http\Repository;
use App\Models\Customer\Customer;
class CustomerRepository extends CommonRepository
{
    public $model;

    function __construct()
    {
        $this->model = new Customer();
        parent::__construct($this->model);
    }
}
