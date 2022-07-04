<?php

namespace App\Http\Services;

use App\Http\Repository\CustomerRepository;
use App\Http\Repository\UserRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerService extends CommonService
{
    public $repository;

    function __construct()
    {
        $this->repository = new CustomerRepository();
        parent::__construct($this->repository);
    }
    public function createCustomer($data)
    {
        DB::beginTransaction();
        try{
            $userRepo = new UserRepository();

            $user = $userRepo->create([
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
            ]);

            $customerRepo = new CustomerRepository();

            $customerRepo->create([
                'user_id'=>$user->id,
                'password_text'=>$data['password'],
                'gender'=>$data['gender'],
                'nid'=>$data['nid'],
            ]);
            DB::commit();
            return [
                'status'=>true,
                'message'=>__('Customer has been added successfully')
            ];

        }
        catch(\Exception $exception)
        {
            DB::rollBack();
            return[
                'status'=>false,
                'message'=> __('Something went wrong'.$exception->getMessage())
            ];
        }
    }

}
