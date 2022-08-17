<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Email_Sent;
use App\Jobs\CustomerJob;

class AdminController extends Controller
{
    public function regiter_user(Request $request)
    {
        $emp = new Employee();
        $emp->FirstName = $request->first_name;
        $emp->LastName = $request->lastName;
        $emp->email = $request->email;
        $emp->mobile_number = $request->txtEmpPhone;
        if($emp->save())
        {
            if(dispatch(new CustomerJob())->delay(now()->addMinutes(0.30)))
            {
                return redirect('thank-you');
            }
        }
        else
        {
            return abort(404);
        }
    }
}
