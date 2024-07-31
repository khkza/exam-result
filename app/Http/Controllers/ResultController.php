<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ResultController extends Controller
{
    public function getStudentCounts()
    {
        $totalStudents = Student::count();
        $passedCount = Result::where('myanmar', '>', 39)
                          ->where('english', '>', 39)
                          ->where('mathematics', '>', 39)
                          ->where('chemistry', '>', 39)
                          ->where('physics', '>', 39)
                          ->where('biological', '>', 39)
                          ->count();
         $failedCount = $totalStudents - $passedCount;



                          $passPercentage = ($totalStudents > 0) ? ($passedCount / $totalStudents) * 100 : 0;

                          $failPercentage = ($totalStudents > 0) ? ($failedCount / $totalStudents) * 100 : 0;


        return response()->json([
            'totalStudents' => $totalStudents,
            'passedCount' => $passedCount,
            'failedCount' => $failedCount,
            'passPercentage' => number_format($passPercentage,2),
            'failPercentage' => number_format($failPercentage,2),

        ]);
    }

    public function resultlist(Request $request){

        $keyword = $request->search;

// $result='abcdef';
// // if(Redis::set('$hash','$result')){

// // }
// Redis::set('result', $result, 60);
// $data = Redis::get('result');
// logger($data);
// // if(Redis::get('$result')){

// }
        logger($keyword);
       $results = Result::query()->when($request->search != 'undefined', function($q) use ($keyword){
        // $q->where('student_name', $keyword);
        $q->where('student_name', 'ilike', '%' . $keyword. '%');

    })->get();

       return $results;
    }


}
