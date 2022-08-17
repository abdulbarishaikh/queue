<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CustomerJob;

class EmailController extends Controller
{
    public function sendemail()
    {
        dispatch(new CustomerJob())->delay(now()->addMinutes(1));
        dd('Email Has Been Delivered');
    }
}
