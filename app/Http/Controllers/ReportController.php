<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Department;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;


class ReportController extends Controller
{
    public function index()
    {
        /*
        $reportsUT=Report::whereHas('users',function($query){$query->where('fullname','ILIKE','%a%');})->whereDate('created_at',Carbon::today())->get();
        $reportsUW=Report::whereHas('users',function($query){$query->where('fullname','ILIKE','%a%');})->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $reportsUM=Report::whereHas('users',function($query){$query->where('fullname','ILIKE','%a%');})->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->get();
        $reportsUD=Report::whereHas('users',function($query){$query->where('fullname','ILIKE','%a%');})->whereDate('created_at','2023-03-20')->get();
        $reportsU=Report::whereHas('users',function($query){$query->where('fullname','ILIKE','%a%');})->get();

        $query = Report::whereHas('users', function ($query) {
            $query->where('fullname', 'ILIKE', '%a%');
        });
        
        $sql = $query->toSql();
        */
        
        $reportsCT=Report::whereHas('company',function($query){$query->where('name','ILIKE','%Jerde%');})->whereDate('created_at',Carbon::today())->get();
        $reportsCW=Report::whereHas('company',function($query){$query->where('name','ILIKE','%Jerde%');})->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $reportsCM=Report::whereHas('company',function($query){$query->where('name','ILIKE','%Jerde%');})->whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->get();
        $reportsCD=Report::whereHas('company',function($query){$query->where('name','ILIKE','%Jerde%');})->whereDate('created_at','2023-03-20')->get();
        $reportsC=Report::whereHas('company',function($query){$query->where('name','ILIKE','%Jerde%');})->get();

        $reportsTT=Report::where('title','ILIKE','%Sa%')->whereDate('created_at',Carbon::today())->get();
        $reportsTW=Report::where('title','ILIKE','%Sa%')->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();
        $reportsTM=Report::where('title','ILIKE','%Sa%')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->get();
        $reportsTD=Report::where('title','ILIKE','%O%')->whereDate('created_at','2023-03-20')->get();
        $reportsT=Report::where('title','ILIKE','%Sa%')->get();

        $reportsAT=Report::whereDate('created_at',Carbon::today())->get();
        $reportsAW=Report::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();
        $reportsAM=Report::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->get();
        $reportsAD=Report::whereDate('created_at','2023-03-20')->get();
        $reports=Report::all();

        return view('test', compact('reports','reportsAT','reportsAW','reportsAM','reportsAD','reportsCT','reportsCW','reportsCM','reportsCD','reportsC','reportsTT','reportsTW','reportsTM','reportsTD','reportsT',
        /*'reportsUT','reportsUW','reportsUM','reportsUD','reportsU','sql'*/
        ));
    }

    public function replacer()
    {
        $all = Report::all();
        //$Rnames=Report::pluck('title');
        //($Rnames);

        $tableNameRep = 'reports'; // Replace with your actual table name
        if (Schema::hasTable($tableNameRep)) {
            $columnsRep = Schema::getColumnListing($tableNameRep);
            ($columnsRep);
            // $columns will contain an array of column names for the specified table
        } else {
            $columnsRep = "Ps no funciono esta shit lmao";
            ($columnsRep);
        }


        $Cnames=Company::pluck('name');
        ($Cnames);

        $Dnames=Department::pluck('name');
        ($Dnames);

        return view('eloquent', compact('Cnames','columnsRep','Dnames'));
    }

    public function index2()
    {
        $users=User::orderBy('id')->get();
        ($users); // Check if this returns results

        return view('test2', compact('users'));
    }

    public function index3(){
        $companies = Company::all();
        return view('test3', compact('companies'));
    }

    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $date = $request->input('date');

        $query = Report::query();

        if ($fullname) {
            $query->whereHas('users', function ($subQuery) use ($fullname) {
                $subQuery->where('fullname', 'LIKE', '%' . $fullname . '%');
            });
        }

        if ($date) {
            $query->whereDate('timestamp_creation', $date);
        }

        $reports = $query->get();

        return view('reports.index', compact('reports'));
    }



    //

    public function ReportsUserToday(){
        $reportsUT=Report::whereHas('users',function($query){$query->where('fullname','Ova Johnston');})->whereDate('created_at',Carbon::today())->get();
        return view('test', compact('reports'));
    }

    public function ReportsCompanyToday(){
        $reports=Report::whereHas('company',function($query){$query->where('name','Jerde and Sons');})->whereDate('created_at',Carbon::today())->get();
        return view('test', compact('reports'));
    }

    public function executeQuery(Request $request)
    {
        // Get the user input from the search bar
        $userInput = $request->input('query');

        // Execute the query (for testing purposes)
        $result = DB::select(DB::raw($userInput));

        // Return the result to the view
        return view('query-result', ['result' => $result]);
    }

    public function getSuggestedData(Request $request)
    {
        $keywords = $request->input('keywords');
        $suggestedData = [];

        if (in_array('NOMBRE', explode(', ', $keywords))) {
            // Perform a query to retrieve titles from the reports table
            $reportTitles = Report::pluck('title')->toArray();
            $suggestedData['report_titles'] = $reportTitles;

            // Perform a query to retrieve names from the companies table
            $companyNames = Company::pluck('name')->toArray();
            $suggestedData['company_names'] = $companyNames;
        }

        return response()->json($suggestedData);
    }

    public function connection(Request $request)
    {
        $uff = $request->all();
        try {
        // Recupera la consulta de Eloquent enviada como parámetro
        $consultaEloquent = $uff['completions'];
        // Verifica si la consulta es un string o una instancia de Illuminate\Database\Query\Expression
        if (is_string($consultaEloquent)) {
            $query = $consultaEloquent;
            $result = eval("return \App\\Models\\$query;");
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
        return response()->json(['message' => "Your query is WRONG"], 200);
    }
        return response()->json(['message' => "Your query is OK"], 200);
    }
}