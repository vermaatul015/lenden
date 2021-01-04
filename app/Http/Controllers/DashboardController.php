<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class DashboardController extends Controller
{
    public function index(){
    	$data['page'] = __('setup.dashboard');
		return view('dashboard')->with('data',$data);
    }

    
}
