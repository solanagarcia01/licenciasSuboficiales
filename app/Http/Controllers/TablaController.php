<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TablaController extends Controller
{
    function index()
    {
        try{
            //creamos un cliente que puede crear una petición.
            //$client = new Client (['verify'=> false]);

            //trae info API
            //$request =$client->(url);
            //$responde=json_decode(request->getBody()getContents());
            return view('formLicencias');
        }catch(RequestException $e){
            return null;
        }

    }

    function tabla()
    {
        try{
            return view('TablaLicencias');
        }catch(RequestException $e){
            return null;
        }
    }

}

