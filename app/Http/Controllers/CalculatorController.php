<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CalculatorController extends Controller
{
    function show()
    {
       $result="";

        return view('index', compact('result'));
    }

    function Calculator(Request $request)
    {

        $number_one = $request->number_one;
        $number_two = $request->number_two;
        if (isset($_POST['addition'])) {
            $result = $number_one + $number_two;
            return view('index', compact('result'));
        }
        if (isset($_POST['subtraction'])) {
            $result = $number_one - $number_two;
            return view('index', compact('result'));
        }
        if (isset($_POST['multiplication'])) {
            $result = $number_one * $number_two;
            return view('index', compact('result'));
        }
        if (isset($_POST['division'])) {
            try {
                $result = $number_one / $number_two;
                return view('index', compact('result'));
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }
    }
}