<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\StudentEnrollment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function invite()
    {
        return view('admin.student.invite-student');
    }

    public function list()
    {
        $students = User::where('role_id',3)->get();

        return view('admin.student.studentlist',compact('students'));
    }

    public function recordings(Request $request)
    {
        $student = User::where('role_id',3)->where('id',$request->id)->first();

        if ($student !== null){
            $recordings = $student->studentVoice;
            return view('admin.student.recordings',compact('recordings','student'));
        }else{
            return redirect(404);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $student = User::findOrFail($request->id);

            $student->studentVoice()->delete();

            $student->delete();

            return response()->json([
                'status' => 'success',
                'student' => $request->id,
                'message' => 'Student deleted successfully',
            ]);

        }catch (\Exception $exception){
            return response()->json([
               'status' => 'error',
               'message' => $exception->getMessage(),
            ]);
        }
    }
    public function detail(Request $request)
    {
        try{
            $student = User::findOrFail($request->id);

            return response()->json([
                'status' => 'success',
                'student' => $student,
            ]);

        }catch (\Exception $exception){
            return response()->json([
               'status' => 'error',
               'message' => $exception->getMessage(),
            ]);
        }
    }

}
