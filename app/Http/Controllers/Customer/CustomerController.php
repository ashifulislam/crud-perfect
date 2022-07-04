<?php

namespace App\Http\Controllers\Customer;

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
}
