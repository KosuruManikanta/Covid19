<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apicont extends Controller
{
    public function testapi(Request $request)
    {
    	$response = Http::withBody()->get('https://covid-india-cases.herokuapp.com/states');
    	return $response;
    }

}
