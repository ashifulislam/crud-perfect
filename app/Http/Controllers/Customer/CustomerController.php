<?php

namespace App\Http\Controllers\Customer;

use App\Http\Repository\CustomerRepository;
use App\Http\Repository\UserRepository;
use App\Http\Services\CustomerService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public $service;
    function __construct()
    {
        $this->service = new CustomerService();
    }
    //viewing all customer
    public function customerList()
    {
        $data['customer'] = $this->service->customerList();
        return view('customer.customerList',$data);
    }
    public function customerAdd()
    {
        $data['buttonTitle'] = __('Add Customer');
        return view('customer.customerAddEdit',$data);
    }
    public function customerAddProcess(CustomerRequest $request)
    {
        try {
            if($request->id)
            {
                $response = $this->service->updateCustomer($request->except('_token'));
                if($response['status'])
                {
                    return redirect()->route('customer.customerList')->with(['success' => $request['message']]);
                }
            }
            else
            {
                $response = $this->service->createCustomer($request->except('_token'));
                if($response['status'])
                {
                    return redirect()->route('customer.customerList')->with(['success' => $response['message']]);
                }
            }
        }
        catch(\Exception $exception)
        {

        }
    }
    public function customerEdit($id)
    {
        try{
        $data['customer'] = $this->service->getCustomerByUserId(decrypt($id));
            if(empty($data))
            {
                return redirect()->back()->with(['error'=> __('Customer not found')]);
            }
            $data['buttonTitle'] = "Update Customer";
            return view('customer.customerAddEdit',$data);
        }catch(\Exception $e)
        {

        }
    }
    public function customerDelete($id)
    {
        try{
            $id = decrypt($id);
            $deleteCustomer = $this->service->deleteCustomer($id);
            if ($deleteCustomer['status']) {
                return redirect()->back()->with(['success' => $deleteCustomer['message']]);
            }
        }catch(\Exception $e)
        {

        }
    }
}
