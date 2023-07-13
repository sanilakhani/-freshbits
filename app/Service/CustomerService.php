<?php

namespace App\Service;

use Carbon\Carbon;
use App\Models\Customer;

class CustomerService
{
        
    /**
     * Method getAll
     *
     * @return Customer
     */
    public function getAll()
    {
        return Customer::get();
    }

    public function getAllStatus()
    {
        return [
            "prospect" => "Prospect",
            "lead" => "Lead",
            "customer" => "Customer",
        ];
    }

    public function save(array $attribues)
    {
        $customer = new Customer();
        $customer->name = $attribues['name'];
        $customer->email = $attribues['email'];
        $customer->phone = $attribues['phone'];
        // $customer->dob = Carbon::parse($attribues['dob'])->format('Y-m-d');
        $customer->dob = $attribues['dob'];
        $customer->status = $attribues['status'];
        $customer->save();
        
        return $customer;
    }
    public function update(object $customer,array $attribues)
    {
        $customer->name = $attribues['name'];
        $customer->email = $attribues['email'];
        $customer->phone = $attribues['phone'];
        // $customer->dob = Carbon::parse($attribues['dob'])->format('Y-m-d');
        $customer->dob = $attribues['dob'];
        $customer->status = $attribues['status'];
        $customer->save();
        
        return $customer;
    }
}
