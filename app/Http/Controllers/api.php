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

$client1 = new Client(['base_uri' => 'https://api.covid19india.org/']);

$response1 = $client1->request('GET', '/state_district_wise.json')->getBody()->getContents();
        
$respon1= json_decode($response1,true);
        
$respon= json_decode($response);

return view('covid')->with('respon1',$respon1)->with('respon',$respon);	
#return $respon;
    }
  
    public function distapi(Request $request)
    {

$client = new Client(['base_uri' => 'https://api.covid19india.org/']);

$response = $client->request('GET', '/state_district_wise.json')->getBody()->getContents();
        
$respon= json_decode($response,true);

$tt=array();
$j=array();
$state=array();
foreach($respon as $item=>$k) {

$state[] = $item;
	if ($item == "Andhra Pradesh") {
		# code...
	
    foreach ($k as $StateName => $StateData) {
              foreach ((array)$StateData as $key => $val) {

$tt[]=$val;
$j[]=$key;

#$tt = $val['deceased'];

    #       if($key == "Ballari")
#{
          # return [$key,$item,$val['deceased']];
 #}        
    	#$id[] = $key;
      #  return $key; 
         
    }


    	
    }
}
}
$val=json_decode(json_encode($tt),true);
$key=json_decode(json_encode($j),true);
return [$state,$key,$val['5']['delta']];
#return view('covid')->with('respon',$respon);	

#return var_dump($respon[]);
#    $arr = json_decode($response, true);
#$ids = array();
#$this->get_ids($arr);
#return $ids;
    }

public function get_ids($arr){
    global $ids;
    foreach($arr as $key => $value){
        if($key == 'Bihar')
            $ids[] = $value['id'];
        #return $value['id'];
        if(is_array($value))
            $this->get_ids($value);    
    }
}


}
