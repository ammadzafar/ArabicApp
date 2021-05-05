<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentEnrollment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',3)->get();
        $recordings = StudentEnrollment::all();

        $chartData = $this->chartData();
        $ratingData = $this->getRating();
        $ratings = $ratingData['data'];
        $rated = $ratingData['rated'];
        $recorded = $ratingData['recorded'];
        $top5Recordings = $this->top5Recording();
        $averageRating = $this->averageRating();

        return view('admin.dashboard',compact('users','rated','recorded','recordings','chartData','ratings','averageRating','top5Recordings'));
    }

    public function averageRating()
    {
        $sum = StudentEnrollment::where('is_rated',1)->where('status','Rated')->sum('rating');
        $total = StudentEnrollment::where('is_rated',1)->where('status','Rated')->count();

        $average =  0;
        if ($total > 0){
            $average = round($sum/$total,2);
        }

        return $average;
    }
    public function chartData()
    {
        $finalData = [];

        $weekdays = [];
        for ($i=0; $i <7 ; $i++) {
            $weekdays[] = Carbon::now()->startOfWeek()->addDay($i)->toDateString();
        }

        $types = ['Recorded','Rated'];
        foreach ($types as $type){
            $dataCount=[];
            foreach ($weekdays as $day){
                $count = StudentEnrollment::where('status',$type)->whereDate('updated_at',$day)->count();

                array_push($dataCount,$count);
            }
            $data = [
                'name' => $type,
                'data' => $dataCount,
            ];
            array_push($finalData,$data);
        }

        return $finalData;
    }

    public function getRating()
    {
        $total = StudentEnrollment::count();
        $stars = [
            'firstStar' => 1,
            'secondStar' => 2,
            'thirdStar' => 3,
            'fourthStar' => 4,
            'fifthStar' => 5,
        ];
        $data =[];
        foreach ($stars as $key => $star){
            $count = StudentEnrollment::where('rating',$star)->where('is_rated',1)->where('status','Rated')->count();
            $average = 0;
            if ($total !== 0){
                $average = round(($count/$total)*100,2);
            }
            $data[$key]=$average;
        }
        $unRatedCount = StudentEnrollment::where('is_rated',0)->where('status','Recorded')->count();
        $av = 0;
        if ($total !== 0){
            $av = round(($unRatedCount/$total)*100,2);
        }
        $data['unrated']=$av;

        $rated = StudentEnrollment::where('is_rated',1)->where('status','Rated')->count();
        $return =[
            'data' => $data,
            'rated' => $rated,
            'recorded' => $total,
        ];
        return $return;
    }

    public function top5Recording()
    {
        $topRecordings = StudentEnrollment::where('is_rated',1)->where('status','Rated')
            ->orderBy('rating', 'desc')->take(5)->get()->unique('alphabet_id');

        return $topRecordings;
    }
}
