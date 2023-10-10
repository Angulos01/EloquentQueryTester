<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class QueryController extends Controller
{
    /*
    public function executeQuery(Request $request)
    {
    $eloquentQuery = $request->input('eloquent_query');
    $message = "Executing Query: $eloquentQuery"; // Create a message with the query

    // Execute the query as entered
    try {
        $results = eval("return $eloquentQuery;");
    } catch (\Throwable $e) {
        // Handle any errors or exceptions that occur during evaluation
        $message2 = "Error: " . $e->getMessage();
        $results = [];
    }

    return view('tester', compact('results', 'message', 'message2'));
    }
    */

    public function executeQuery(Request $request)
{
    // Get the dynamic query part from the user input
    $dynamicQuery = $request->input('eloquent_query');

    // Predefine the User model
    $query = User::query();

    // Add a debugging statement to check the dynamic query
    //dd($query);

    // Execute the dynamic query
    try {
        $results = eval("\$query->$dynamicQuery;");
        $message = "Executing Query: User::$dynamicQuery";
    } catch (\Throwable $e) {
        // Handle any errors or exceptions that occur during evaluation
        $message = "Error: " . $e->getMessage();
        $results = [];
    }

    return view('tester', compact('results', 'message'));
}

}
