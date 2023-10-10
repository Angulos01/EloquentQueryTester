<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function testConnection()
    {
        try {
            DB::connection()->getPdo();
            $connected = true;
        } catch (\Exception $e) {
            $connected = false;
        }

        return view('database_connection', ['connected' => $connected]);
    }
}
