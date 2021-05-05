<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\StudentEnrollment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function invite()
    {
        return view('admin.master.invite-master');
    }

    public function list()
    {
        $masters = User::where('role_id',2)->get();

        return view('admin.master.masterlist',compact('masters'));
    }

    public function recordings(Request $request)
    {
        $master = User::where('role_id',2)->where('id',$request->id)->first();
        if ($master !== null){
            $recordings = $master->masterVoice;

            return view('admin.master.recordings',compact('recordings','master'));
        }else{
            return redirect(404);
        }
     }

    public function recordingResponse(Request $request)
    {
        $recordings = StudentEnrollment::where('master_id',$request->master_id)->where('master_voice_id',$request->voice_id)->get();

        return view('admin.master.response',compact('recordings'));
    }
}
