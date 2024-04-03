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
        try {
            $client = new Client(['verify' => false]);
            $request = $client->get('http://localhost:5800/');
            $response = json_decode($request->getBody()->getContents(), true); // Decodificar como arreglo asociativo
    
            // Pasar los datos a la vista en el formato que espera el script jQuery
            return view('TablaLicencias', ['licencias' => ['licencias' => $response['licencias']]]);
        } catch (RequestException $e) {
            return null;
        }
    }
    
    // function procesarForm(Request $request)
    // {
    //     info('Datos del formulario recibidos:', $request->all());

    //     function procesarForm(Request $request){
    //         $dni = Request::input('dni');
    //         $id = Request::input('id');
    //         $fechaInicio = Request:: input('fechaInicio');
    //         $fechaFin = Request:: input('fechaFin');
    //         $provincia = Request:: input('provincia');
    //         $direccion = Request:: input('direccion');
    //         $localidad = Request:: input('localidad');
    //         $ordenDia = Request:: input('ordenDia');
    //         $tipo = Request:: input('tipo');
    
    //         try{
    //             $client  = new Client(['verify' => false]);
    //             $request = $client -> get('http://localhost:5800/insert/');
    //             $response = json_decode($request->getBody()->getContents(), true);
    //             return json_encode($response);
    //         }catch(RequestException $e){
    //             return $e->getMessage();
    //         }
    //     }
    // }

}

