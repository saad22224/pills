<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function addpage(){
        return view('dashboard.add');
    }
    public function invoicesPage(){
        return view('dashboard.invoices');
    }

    public function incomePage(){
        return view('dashboard.income');
    }

}
