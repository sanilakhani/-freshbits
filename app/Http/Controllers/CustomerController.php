<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
// use App\Enums\StatusEnum;
use App\Service\CustomerService;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
         $this->customerService = $customerService;
         $allStatus = $this->customerService->getAllStatus();
         view()->share('allStatus',$allStatus);
    }   

    public function index()
    {
        $customers = Customer::orderBy('id','desc')->paginate(5);
        return view('customer.index',compact('customers'));
    }
    
    public function create()
    {
        
        return view('customer.create');
    }

    public function store(CustomerRequest $request)
    {

        $attribute = $request->all();
        try {
            $customer = $this->customerService->save($attribute);
            return redirect()->route('customer.index')->with('success','Customer Add Successfully');

        } catch (\Throwable $th) {
            Log::error("[".$th->getMessage()."]");
        }
        
        return redirect('customer')->with('error','Something went wrong please try after sometime');
    }

    public function edit(Customer $customer)
    {
        if(empty($customer)){
            return redirect('customer')->with('error','Customer Not Found');
        }
        return view('customer.edit',compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {

        $attribute = $request->all();
        try {
            $customer = $this->customerService->update($customer,$attribute);
            return redirect()->route('customer.index')->with('success','Customer Updated Successfully');

        } catch (\Throwable $th) {
            Log::error("[".$th->getMessage()."]");
        }
        
        return redirect('customer')->with('error','Something went wrong please try after sometime');
    }

    public function destroy(Customer $customer)
    {
        try {
            // $customer = Customer::findOrFail($customer->id);
            $customer->delete();
            return redirect()->route('customer.index')->with('success','Record Deleted Successfully');

        } catch (\Throwable $th) {
            Log::error("[".$th->getMessage()."]");
        }
        
        return redirect('customer')->with('error','Something went wrong please try after sometime');
    }
}
