<?php

namespace App\Http\Services;

use App\Http\Repository\CustomerRepository;
use App\Http\Repository\UserRepository;
use App\Models\Customer\Customer;
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
    public function customerList()
    {
        $customers = Customer::with('user')->get();
        return $customers;
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
    public function updateCustomer($data)
    {
        DB::beginTransaction();
        try{
            $customerRepo = new CustomerRepository();
            $customerRepo->update(['user_id'=>$data['id']], [
                'nid' => $data['nid'],
                'gender'=>$data['gender'],
            ]);

            $userRepo = new UserRepository();
            $userRepo->update(['id'=>$data['id']], [
                    'username'=>$data['username'],
                    'email'=>$data['email'],
                    'password'=>Hash::make($data['password'])
                ]);
            DB::commit();
            return [
                'status' => true,
                'message' =>__('Customer has been updated successfully')
            ];
        }catch(\Exception $e)
        {
            DB::rollBack();
            return[
                'status'=>false,
                'message' =>__('Something went wrong').$e->getMessage()
            ];
        }
    }
    public function deleteCustomer($id)
    {
        DB::beginTransaction();
        try{
            $userRepo = new UserRepository();
            $customerRepo = new CustomerRepository();
            $userRepo->deleteCustomer($id);
            $customerRepo->deleteCustomer($id);
            DB::commit();
            return[
                'status' => true,
                'message' => __('Customer has been deleted successfully')
            ];
        }catch(\Exception $e)
        {
            DB::rollback();
            return[
                'status' => false,
                'message' => __('Something went wrong man'). $e->getMessage()
            ];
        }
    }

}
