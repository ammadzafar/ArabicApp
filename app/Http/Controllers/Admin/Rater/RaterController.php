<?php

namespace App\Http\Controllers\Admin\Rater;

use App\Http\Requests\CreateUserRequest;
use App\Mail\LoginMailToUsers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RaterController extends Controller
{
    public function list()
    {
        $raters = User::where('role_id',2)->get();

        return view('admin.rater.rater-list',compact('raters'));
    }
    public function store(CreateUserRequest $request)
    {
        try{
            $logInId = str_random(10);

            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => 2,
                'logIn_id' => $logInId,
                'age' => $request->age ? $request->age : null,
                'gender' => $request->gender ? $request->gender : null,
                'nationality' => $request->nationality ? $request->nationality : null,
            ]);

            Mail::to($user->email)->send(new LoginMailToUsers($user));

            return redirect(route('admin_rater_list'))->with('success','invite sent successfully');

        }catch (\Exception $exception){
            return back()->with('error',$exception->getMessage());
        }
    }

    public function detail(Request $request)
    {
        try{
            $rater = User::findOrFail($request->id);

            return response()->json([
                'status' => 'success',
                'rater' => $rater,
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $rater = User::findOrFail($request->id);

            $ratings = $rater->RaterRatings;
            if ($ratings->count() > 0){
                $admin = User::where('role_id',1)->first();
                foreach ($ratings as $rating){
                    $rating->update([
                        'rated_by' => $admin->id
                    ]);
                }
            }

            $rater->delete();

            return response()->json([
                'status' => 'success',
                'rater' => $request->id,
                'message' => 'Rater deleted successfully',
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }


}
