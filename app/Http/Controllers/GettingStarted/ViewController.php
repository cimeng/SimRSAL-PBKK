<?php

namespace App\Http\Controllers\GettingStarted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    	public function profesi()
    	{   		
    		return view('getting-started.profesi');
    	}
    	
    	public function avatar()
    	{   		
    		return view('getting-started.avatar');
    	}
}
