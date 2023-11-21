<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Carbon\Carbon;


class Controlador extends Controller
{
    public function testEloquent(Request $request)
    {
        try {
            $consultaEloquent = $request->input('consulta');
            if (is_string($consultaEloquent)) {
                $pos1 = strpos($consultaEloquent, '##');
                if ($pos1 !== false) {
                    $pos2 = strpos($consultaEloquent, '##', $pos1 + 1);
                    if ($pos2 !== false) {
                        try {
                            $query = $consultaEloquent;
                            $queryFirst = substr($query, 2); // Remove the first 2 characters
                            $queryLast = substr($queryFirst, 0, -2); // Remove the last 2 characters
                            //echo $queryLast;

                            $result = eval("return \App\\Models\\$queryLast;");
                            //dd($result);
                            ($result);
                            return view('eloquent-form', compact('result'));

                        } catch (\Throwable $th) {
                            return " Chiiiiiiiiiispas";
                        }
                    } else{
                        echo "No es del sistema 2";
                    }
                } else {
                    echo "No es del sistema 1";
                }
            } else {
                $query = $consultaEloquent->getValue();
            }
            return $query;
        } catch (\Exception $e) {
            return "Trikitrakatelas";
        }
    }
    
    public function testEloquent2(Request $request){
    try {
        // Recupera la consulta de Eloquent enviada como parámetro
        $consultaEloquent = $request->input('consulta');

        // Verifica si la consulta es un string o una instancia de Illuminate\Database\Query\Expression
        if (is_string($consultaEloquent)) {
            $pos1 = strpos($consultaEloquent, '##');
            if ($pos1 !== false) {
                $pos2 = strpos($consultaEloquent, '##', $pos1 + 1);
                if ($pos2 !== false) {
                    $query = substr($consultaEloquent, $pos1 + 2, $pos2 - $pos1 - 2);
                    $queryParts = explode('::', $query);
                    $modelClass = 'App\Models\\' . trim($queryParts[0]);
                    $queryExpression = trim($queryParts[1]);
                    echo gettype($queryExpression);
                    $securityService = new SecurityService($query);
                    print($securityService);             
                    // //$result = $modelClass::$result;
                    // $result = $modelClass::where('title','ILIKE','%Salsa%')->orderBy('id','asc')->get();
                    // dd($result);
                } else{
                    echo "No es del sistema 2";
                }
            } else {
                echo "No es del sistema 1";
            }


            // echo $query;
            // $result = eval("return \App\\Models\\$query;");
            // // foreach ($result as $key => $value) {
            // //     echo $key." ".$value."<br>";
            // // }
            // dd($result);
        } elseif ($consultaEloquent instanceof \Illuminate\Database\Query\Expression) {
            // Si es una instancia de Illuminate\Database\Query\Expression, obtiene el valor de la consulta
            $query = $consultaEloquent->getValue(); // No need to pass arguments
            // Ejecuta la consulta
            return $query;
        } else {
            // Handle the case where $consultaEloquent is not a valid type
            throw new \Exception("Invalid consulta parameter.");
        }
    } catch (\Exception $e) {
        return response()->json(['Holis']);
    }
}

    public function buttonView()
    {
        return view('button');
    }

    public function buttonSend(Request $request)
    {
        $data = $request->all();
        $jsonData = [
            'message' => 'Holis',
        ];
        return response()->json($jsonData);
    }

}

class SecurityService{
}
