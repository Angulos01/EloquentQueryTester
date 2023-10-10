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
        // Recupera la consulta de Eloquent enviada como parámetro
        $consultaEloquent = $request->input('consulta');

        // Verifica si la consulta es un string o una instancia de Illuminate\Database\Query\Expression
        if (is_string($consultaEloquent)) {
            $query = $consultaEloquent;
            echo $query;
            $result = eval("return \App\\Models\\$query;");
            dd($result);
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
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}