<?php
use Illuminate\Support\Facades\Http;
namespace App\Http\Controllers;
use \GuzzleHttp\Client;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;


class api extends Controller
{
    
    public function user(Request $request)
    {


if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
	    	

			$users = User::get();
            return Auth::User();
		}
		$errors = 'incorrect credentials or email not verified';
		 return $request;
    }


      public function userr(Request $request)
    {

$request['password']=bcrypt($request->password);
$userr=User::create($request->all());
return User::get();
    }

    public function userd(Request $request)
    {

return Auth::User();

    }



 public function testapi(Request $request)
    {

$client = new Client(['base_uri' => 'http://covid-india-cases.herokuapp.com/']);

$response = $client->request('GET', '/states')->getBody()->getContents();
        
$respon= json_decode($response);

return view('covid')->with('respon',$respon);	
#return $respon;
    }

}
