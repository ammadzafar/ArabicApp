<?php

namespace App\Http\Controllers\Admin\Rating;

use App\Models\Chapter;
use App\Models\StudentEnrollment;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function rated(Request $request)
    {
        $query = StudentEnrollment::query();

        $query->where('is_rated',1);
        if ($request->masterFilter && $request->masterFilter !== null){
            $query->where('master_id',$request->masterFilter);
        }if ($request->studentFilter && $request->studentFilter !== null){
        $query->where('student_id',$request->studentFilter);
    }

        $recordings = $query->get();

        $masters = User::where('role_id',2)->get();
        $students = User::where('role_id',3)->get();

        return view('admin.rating.rated',compact('recordings','masters','students'));
    }

    public function unRated(Request $request)
    {
        $query = StudentEnrollment::query();

        $query->where('is_rated',0);
        if ($request->masterFilter && $request->masterFilter !== null){
            $query->where('master_id',$request->masterFilter);
        }if ($request->studentFilter && $request->studentFilter !== null){

        $query->where('student_id',$request->studentFilter);
    }

        $recordings = $query->get();

        $masters = User::where('role_id',2)->get();
        $students = User::where('role_id',3)->get();

        return view('admin.rating.unrated',compact('recordings','masters','students'));
    }

    public function rating(Request $request,$id)
    {
        if ($request->has('rating') && $request->comment !== null){
            $recording = StudentEnrollment::findOrFail($id);

            $recording->update([
                'is_rated' => 1,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'rated_by' => auth()->user()->id,
            ]);

            return \response()->json([
                'status' => 'success',
                'message' => 'Rated successfully',
                'id' => $id,
            ]);

        }else{
            return \response()->json([
                'status' => 'error',
                'message' => 'please select star and write comment',
                'id' => $id,
            ]);
        }
    }

    public function detail(Request $request)
    {
        $q = StudentEnrollment::query();
        $q->where('status','Rated')->where('is_rated',1);
        if ($request->has('chapter') && $request->chapter !== null){
            $q->where('chapter_id',$request->chapter);
        }
        if ($request->has('ratings') && count($request->ratings) > 0){
            $q->whereIn('rating',$request->ratings);
        }
        if ($request->has('user') && $request->user !== null){
            $q->where('student_id',$request->user);
        }
        if ($request->has('rated_by') && $request->rated_by !== null){
            $q->where('rated_by',$request->rated_by);
        }
        $ratedRecordings = $q->get();
        $chapters = Chapter::all();
        $users = User::where('role_id',3)->get();
        $raters = User::where('role_id',2)->get();

        return view('admin.rating.details',compact('ratedRecordings','chapters','users','raters'));
    }
}
