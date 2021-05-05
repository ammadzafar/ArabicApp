<?php

namespace App\Http\Controllers\Api;

use App\Models\StudentEnrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordingController extends Controller
{
    public function getMasterRecording(Request $request)
    {
        if ($request->audio && $request->audio !== null){
            $file_name = $request->audio ;
            $file_path = public_path('uploads/master-enrollments/'.$file_name);
            if (file_exists( $file_path)) {
                return response()->download($file_path);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sorry file not found',
                ]);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Audio name is required',
            ]);
        }
    }

    public function getStudentRecording(Request $request)
    {
        if ($request->audio && $request->audio !== null){
            $file_name = $request->audio ;
            $file_path = public_path('uploads/student-enrollments/'.$file_name);
            if (file_exists( $file_path)) {
                return response()->download($file_path);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sorry file not found',
                ]);
            }

        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Audio name is required',
            ]);
        }
    }

    public function getStudentRecordingData()
    {
        try{
            $studentsEnrollments = StudentEnrollment::all();
            $finalData = [];
            if ($studentsEnrollments){
                foreach ($studentsEnrollments as $enrollment){
                    $data['student_id'] = $enrollment->student_id;
                    $data['master_id'] = $enrollment->master_id;
                    $data['chapter_name'] = $enrollment->chapter->name;
                    $data['alphabet_name'] = $enrollment->alphabet->alphabet;
                    $data['student_filename'] = $enrollment->student_voice;
                    $data['master_filename'] = $enrollment->masterVoice->audio;

                    array_push($finalData ,$data);
                }
            }

            return response()->json([
                'status' => 'success',
                'status_code' => '200',
                '$studentsEnrollments' => $finalData,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
