<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\CreateUserRequest;
use App\Mail\LoginMailToUsers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use function GuzzleHttp\json_decode;

class UserController extends Controller
{

    public function create(Request $request)
    {
        $q = \App\Models\User::query();
        $q->where('role_id',3);
        if ($request->has('name') && $request->name !== null){
           $q->where('name','LIKE', '%' .$request->name. '%');
        }
        if ($request->has('gender') && $request->gender !== null){
            $q->where('gender',$request->gender);
        }
        if ($request->min_age !== null || $request->max_age !== null){
                 $q->whereBetween('age',[$request->min_age,$request->max_age]);
        }
        if ($request->has('nationality') && $request->nationality !== null){
             $q->where('nationality',$request->nationality);
        }

        $students = $q->get();

        return view('admin.student.studentlist',compact('students'));
    }

    public function store(CreateUserRequest $request)
    {
        try{
            $logInId = str_random(10);

            $name = 'default.png';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/profile-pictures');
                $image->move($destinationPath, $name);
            }

            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $name,
                'role_id' => 3,
                'logIn_id' => $logInId,
                'age' => $request->age ? $request->age : null,
                'gender' => $request->gender ? $request->gender : null,
                'nationality' => $request->nationality ? $request->nationality : null,
                'password' => bcrypt($logInId),
            ]);

            Mail::to($user->email)->send(new LoginMailToUsers($user));
            if ($request->type == 2){
                return redirect(route('admin_master_list'))->with('success','invite sent successfully');
            }else{
                return redirect(route('admin_student_list'))->with('succbilal testess','invite sent successfully');
            }

        }catch (\Exception $exception){
            return back()->with('error',$exception->getMessage());
        }
    }
    public function update(Request $request)
    {
        try{
            $user = \App\Models\User::findOrFail($request->edit_id);

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


            $user->update([
                'name' => $request->edit_name,
                'avatar' => $name,
                'age' => $request->edit_age,
                'gender' => $request->edit_gender,
                'nationality' => $request->edit_nationality
            ]);

            if ($request->type == 2){
                return redirect(route('admin_rater_list'))->with('success','Rater Updated Successfully');
            }else{
                return redirect(route('admin_student_list'))->with('success','Student Updated Successfully');
            }

        }catch (\Exception $exception){
            return back()->with('error',$exception->getMessage());
        }
    }

    public function resendId(Request $request)
    {
        $user = \App\Models\User::findOrFail($request->id);
        Mail::to($user->email)->send(new LoginMailToUsers($user));

        return redirect(route('admin_create_user'))->with('success','invite sent successfully');
    }

    public function masterLogIn()
    {
        return view('admin.master.master-login');
    }

    public function studentLogIn()
    {
        return view('admin.student.student-login');
    }

    public function logIn(Request $request)
    {
       $user = \App\Models\User::where('role_id',$request->id)->where('logIn_id',$request->logIn_id)->first();

       if ($user != null){
           Auth::login($user);

           if (\auth()->user()->isMaster()){
               return redirect(route('master_create_voice_enrollment'));
           }
           if (\auth()->user()->isStudent()){
               return redirect(route('student_create_voice_enrollment'));
           }

       }else{
           return back()->with('error','invalid credential');
       }

    }

    public function destroy(Request $request)
    {
        $user = \App\Models\User::where('id',$request->id)->where("role_id",$request->type)->first();
        if ($request->type == 2){
           $masterResponses = $user->masterResponses()->delete();
           $masterRecordings = $user->masterVoice()->delete();
           $user->delete();

            return back()->with('success','Master Deleted Successfully');
        }else{
            $user->studentVoice()->delete();
            $user->delete();


            return back()->with('success','Student Deleted Successfully');
        }

    }
    public function redirectToProvider()
    {
        return Socialite::driver('line')->redirect();
    }
    public function curl($code){

        $client_id = env('LINE_KEY');
        $client_secret = env('LINE_SECRET');
//        $line_redirect_url = env('LINE_REDIRECT_URI');
        $line_code = $code;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/oauth2/v2.1/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "grant_type=authorization_code&code=$line_code&redirect_uri=http%3A%2F%2F127.0.0.1%3A8000%2Fcallback&client_id=$client_id&client_secret=$client_secret",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result = \GuzzleHttp\json_decode($response);
        return $result;
    }
    public function curlResponse($result){
        $client_id = env('LINE_KEY');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.line.me/oauth2/v2.1/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "id_token=$result->id_token&client_id=$client_id",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $user_info = \GuzzleHttp\json_decode($response);
        return $user_info;
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('line')->stateless();

           if(!$request->session()->token()){
               return redirect('register/user');
           }
        $result = $this->curl($request->code);
        $user_info = $this->curlResponse($result);

        $alreadyUser = User::where('line_id',$request->session()->token())->first();

        if ($alreadyUser){
            \auth()->login($alreadyUser);
            return redirect('student/dashboard');
        }else{
            $new_user = new User();
            $new_user->name = $user_info->name;
            $new_user->email = $user_info->email;

            $new_user->avatar = $user_info->picture;
            $new_user->line_id = $request->session()->token();
            $new_user->role_id = 3;
            $new_user->line_image_status = 1;
            $new_user->save();
            \auth()->login($new_user);
            return redirect('student/dashboard');
        }
    }
}
