<?php

namespace App\Http\Controllers\Student;

use App\Models\Alphabet;
use App\Models\Chapter;
use App\Models\MasterEnrollment;
use App\Models\StudentEnrollment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $masters = User::where("role_id",2)->get();
        $alphabets = null;
        $chapters = null;
        if ($request->masterId){
            $master = User::findOrFail($request->masterId);
            $masterChapters = MasterEnrollment::where('master_id',$master->id)->distinct()->pluck('chapter_id');
            $chapters = Chapter::find($masterChapters);
        }
        if ($request->chapter_id){
            $masterEnrollments = MasterEnrollment::where('master_id',$request->masterId)->where('chapter_id',$request->chapter_id)->distinct()->pluck('alphabet_id');
            $alphabets = Alphabet::find($masterEnrollments);
        }

        return view('student.recording.voice-enrollment',compact('masters','alphabets','chapters'));
    }

    public function masterEnrollments(Request $request)
    {
        $master = User::findOrFail($request->masterId);
        $masterChapters = MasterEnrollment::where('master_id',$master->id)->distinct()->pluck('chapter_id');
        $chapters = Chapter::find($masterChapters);

        return response()->json([
            'status' => 'success',
            'chapters' => $chapters,
        ]);
    }

    public function masterVoiceMessage(Request $request)
    {
        $voice = MasterEnrollment::where('master_id',$request->masterId)->where('chapter_id',$request->chapterId)
            ->where('alphabet_id',$request->alphabetId)->first();

        return response()->json([
            'status' => 'success',
            'voice' => $voice,
        ]);
    }

    public function store(Request $request)
    {
        $checkRecording = StudentEnrollment::where('student_id',Auth::user()->id)
            ->where('alphabet_id',$request->alphabet_id)
            ->where('chapter_id',$request->chapter_id)->first();
        if (!empty($checkRecording)){
            if ($checkRecording->status == 'Rated'){
                return 'already recorded error';
            }else{
                $checkRecording->delete();
            }
        }
        $recording = new StudentEnrollment();
        $response = [];
        $file = $request->file('audio_data');
        $date = Carbon::now();
        $time = str_replace(':','-',$date);
        $date_time = str_replace(' ','_',$time);
        $name = $date_time.'.wav';
        $file->move('uploads/student-enrollments',$name);

        $recording->student_id = auth()->user()->id;
        $recording->alphabet_id = $request->alphabet_id;
        $recording->chapter_id = $request->chapter_id;
        $recording->duration = $request->duration;
        $recording->student_voice = $name;
        $recording->save();

        return 'success';
    }

    public function enrollments()
    {
        $recordings = StudentEnrollment::where('student_id',auth()->user()->id)->get();

        return view('student.recording.list',compact('recordings'));
    }

    public function getAlphabets($id)
    {
        try{
            $chapter = Chapter::findOrFail($id);
            $alphabets = $chapter->alphabets;

            return response()->json([
                'status' => 'success',
                'alphabets' => $alphabets,
            ]);

        }catch (\Exception $exception){

            return response()->json([
                'status' => 'error',
                'alphabets' => $exception->getMessage(),
            ]);
        }
    }

    public function dashboard(Request $request)
    {
        try{
            $chapters = Chapter::all();
            $recAndRatedCount = 0;
            $alphabets =[];
            $ch = null;
            if ($chapters->isNotEmpty()){
                if ($request->chapter_id){
                    $ch = Chapter::findOrFail($request->chapter_id);
                    $alphabets = $ch->alphabets;
                }else{
                    $ch = $chapters->first();
                    $alphabets = $ch->alphabets;
                }
                $recAndRatedCount = StudentEnrollment::where('chapter_id',$ch->id)->where('student_id',auth()->user()->id)->whereIn('status',['Recorded','Rated'])->count();
            }


            $finalDataPieChart=[];
            $totalAlphabets = Alphabet::count();
            $recorded = StudentEnrollment::where('student_id',auth()->user()->id)->where('status','Recorded')->count();
            $rated = StudentEnrollment::where('student_id',auth()->user()->id)->where('status','Rated')->count();
            $pending = $totalAlphabets-($recorded+$rated);

            $statusArr = ['Rated' => $rated,'Recorded' => $recorded, 'pending' => $pending];

            if ($totalAlphabets > 0){
                foreach ($statusArr as $key => $status){

                    if ($totalAlphabets !== 0){
                        $finalVal = round(($status/$totalAlphabets)*100,2);
                    }else{
                        $finalVal = 0;
                    }
                    $statusChart = [
                        'y' =>  $finalVal,
                        'name' => $key
                    ];

                    array_push($finalDataPieChart,$statusChart);
                }
            }
            $chapterChartData = [];
            if ($chapters->isNotEmpty()){
                $chapterChartData = $this->chapterChartData($chapters);
            }

            $indexNumb = 0;
            foreach ($alphabets as $key => $alphabet){
               $check = StudentEnrollment::checkAvailability(\auth()->user()->id,$alphabet->id);
               if ($check == 'Not Recorded'){
                   $indexNumb = $key;
                   break;
               }
            }

            return view('student.dashboard',compact('chapters','indexNumb','ch','alphabets','finalDataPieChart',
                'recAndRatedCount','chapterChartData'));

        }catch (\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }

    }

    public function chapterChartData($chapters)
    {
        $finalData = [];
        foreach ($chapters as $chapter){
            $data = [];
            $totalAlphabets = $chapter->alphabets->count();
            $recorded = StudentEnrollment::where('chapter_id',$chapter->id)->where('student_id',auth()->user()->id)->where('status','Recorded')->count();
            $rated = StudentEnrollment::where('chapter_id',$chapter->id)->where('student_id',auth()->user()->id)->where('status','Rated')->count();
            $pending = $totalAlphabets-($recorded+$rated);

            $statusArr = ['pending' => $pending,'Recorded' => $recorded,'Rated' => $rated];

            foreach ($statusArr as $key => $status){
                if ($totalAlphabets !== 0){
                    $finalVal = round(($status/$totalAlphabets)*100,2);
                }else{
                    $finalVal = 0;
                }
                $statusChart = [
                    $finalVal,
                ];
                $data[] = ['data' => $statusChart];
//                array_push($data,$statusChart);
            }
//            array_push($finalData,$data);
            $finalData[$chapter->id] = $data;

        }
        return $finalData;
    }

    public function updateProfile(Request $request)
    {
        try{
            $user = User::findOrFail($request->id);
            $name = $user->avatar;
            if ($request->hasFile('image') && $name !== 'default.png'){
                $path = public_path('uploads/profile-pictures/'.$name);
                unlink($path);
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/profile-pictures');
                $image->move($destinationPath, $name);
            }
            if (!empty($user)){
                $user->update([
                   'name' => $request->name,
                   'avatar' => $name,
                ]);
            }
            return back()->with('success','Profile Updated Successfully');
        }catch (\Exception $exception){
            return back()->with('error',$exception->getMessage());
        }
    }
    public function sendMessage(Request $request)
    {
//        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('5CPaFQFbzWDl5qaFlsaShmxgndam5VTIULGGkODYAbXK6rX3vwzuZ2Qgew/9OV+krwJka1/O2p2W7SqMPmZFcXR0VQxfXBz7Nvj0JHCqzHs0bgnxeoPJo0Y2wdMady0YDWyz9umpWa1tUnmU1xTrBAdB04t89/1O/w1cDnyilFU=');
//        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'c7430bec648727552dc0ef4bcad5f760']);
//
//        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
//
//        $response = $bot->pushMessage('', $textMessageBuilder);
//
//
//        return back()->with('error',$response);


//$response = Curl::to('https://api.line.me/v2/bot/message/push')
//    ->post();
//
//dd($response);
    }

    public function sendWebhook(Request $request)
    {
//        Log::info([$request->all(),12312312312312]);

    }
}
