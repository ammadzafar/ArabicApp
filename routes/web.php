<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('admin.landing-page');
})->name('user.landing.page');



Route::get('/login', function () {
    return redirect('/login');
});

Route::get('change/{language}', 'LocalizationController@changeLanguage')->name('change.language');



Route::get('register/user', 'Auth\RegisterController@showRegistrationForm')->name('register_user');
Route::post('/store/user', 'Auth\RegisterController@register')->name('register_new_user');

Route::group(['Reset Password'], function (){
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Auth::routes();
Route::get('master/login', 'Admin\User\UserController@masterLogIn')->name('master_login');
Route::get('student/login', 'Admin\User\UserController@studentLogIn')->name('student_login');
Route::post('user/login', 'Admin\User\UserController@logIn')->name('user_login');

Route::get('redirect', 'Admin\User\UserController@redirectToProvider')->name('redirect');
Route::get('callback', 'Admin\User\UserController@handleProviderCallback')->name('callback');


Route::group(['middleware' => 'auth'],function () {
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin'],'prefix' => 'admin','namespace' => 'Admin'],function (){
    Route::get('/dashboard','DashboardController@index')->name('admin_dashboard');

    Route::group(['prefix' => 'rater','namespace' => 'Rater'],function (){
        Route::post('create-rater','RaterController@store')->name('admin_create_rater');
        Route::get('rater/detail','RaterController@detail')->name('admin_get_rater_detail');
        Route::get('detail','RaterController@list')->name('admin_rater_list');
        Route::get('recordings','MasterController@recordings')->name('admin_check_master_recording');
        Route::get('recording/response','MasterController@recordingResponse')->name('admin_check_master_recording_response');
        Route::post('delete/rater','RaterController@destroy')->name('admin_delete_rater');

    });

    Route::group(['prefix' => 'student','namespace' => 'Student'],function (){
        Route::get('student-master','StudentController@invite')->name('admin_invite_student');
        Route::get('detail','StudentController@list')->name('admin_student_list');
        Route::get('recordings','StudentController@recordings')->name('admin_check_student_recording');
        Route::post('delete/student','StudentController@destroy')->name('admin_delete_student');
        Route::get('student/detail','StudentController@detail')->name('admin_get_student_detail');
    });

    Route::group(['prefix' => 'rating','namespace' => 'Rating'],function (){
        Route::get('/detail','RatingController@detail')->name('admin_rating_detail');
        Route::post('rating-recording/{id}','RatingController@rating')->name('admin_rating_recording');
        Route::get('unrated-recording','RatingController@unRated')->name('admin_unRated_recording');
    });

    Route::group(['prefix' => 'user','namespace' => 'User'],function (){

        Route::get('detail','UserController@create')->name('admin_create_user');
        Route::post('/store-user','UserController@store')->name('admin_store_user');
        Route::post('/resend-user-id','UserController@resendId')->name('admin_resend_user_id');
//        Route::get('/detail','UserController@userList')->name('admin_user_list');
        Route::get('/edit/user/{id}','UserController@edit')->name('admin_edit_user');
        Route::put('/update','UserController@update')->name('admin_update_user');
        Route::delete('/delete-user','UserController@destroy')->name('admin_delete_user');
    });

    Route::group(['prefix' => 'chapter','namespace' => 'Chapter'],function (){
        Route::get('detail','ChapterController@create')->name('admin_create_chapter');
        Route::post('/store-chapter','ChapterController@store')->name('admin_store_chapter');
        Route::post('/store-chapter-name','ChapterController@storeName')->name('admin_store_chapter_name');
        Route::get('/chapter-list','ChapterController@index')->name('admin_chapter_list');
        Route::get('/edit/chapter/{id}','ChapterController@edit')->name('admin_edit_chapter');
        Route::get('/get/alphabets/{id}','ChapterController@getAlphabets')->name('admin_get_chapter_alphabets');
        Route::put('/chapter-list','ChapterController@update')->name('admin_update_chapter');
        Route::post('/delete-chapter','ChapterController@destroy')->name('admin_delete_chapter');
    });

    Route::group(['prefix' => 'alphabet','namespace' => 'Alphabet'],function (){
        Route::get('add-alphabet','AlphabetController@create')->name('admin_create_alphabet');
        Route::post('/store-alphabet','AlphabetController@store')->name('admin_store_alphabet');
        Route::get('/alphabet-list','AlphabetController@index')->name('admin_alphabet_list');
        Route::get('/edit/alphabet/{id}','AlphabetController@edit')->name('admin_edit_alphabet');
        Route::put('/alphabet-list/{id}','AlphabetController@update')->name('admin_update_alphabet');
        Route::post('/delete-alphabets','AlphabetController@destroy')->name('admin_delete_alphabets');
    });

    Route::group(['prefix' => 'alphabet','namespace' => 'AlphabetRules'],function (){
        Route::get('/all-rules','AlphabetRuleController@allRules')->name('admin_all_alphabet_rules');
        Route::get('/add-rule','AlphabetRuleController@index')->name('admin_index_alphabet_rules');
        Route::post('/alphabet-rules','AlphabetRuleController@alphabetRules')->name('store_alphabet_rules');
        Route::post('/rule/store','AlphabetRuleController@store')->name('admin_store_alphabet_rules');
        Route::post('/rule/edit','AlphabetRuleController@edit')->name('admin_edit_alphabet_rules');
        Route::delete('/rule/delete/{id}','AlphabetRuleController@delete')->name('admin_delete_alphabet_rules');
    });

});

Route::group(['middleware' => ['auth','rater'],'prefix' => 'rater','namespace' => 'Rater'],function (){
    Route::get('/dashboard','RaterController@dashboard')->name('rater_dashboard');
    Route::get('/get/voice-list/{id}','RaterController@getVoiceList')->name('get_voice_list_of_alphabet');
    Route::get('/get/recording/{id}','RaterController@getRecording')->name('rater_get_recording');
    Route::post('/submit-rating','RaterController@submitRating')->name('rater_submit_rating');
    Route::post('/delete/particular/alphabet/rule','RaterController@deleteRules')->name('delete_particular_alphabet_rule');
    Route::post('/get/alphabet-rules','RaterController@alphabetRules')->name('rules_against_alphabet');
    Route::post('/add/new-alphabet-rules','RaterController@addrules')->name('add_new_alphabet_rules');
});

Route::group(['middleware' => ['auth','student'],'prefix' => 'student','namespace' => 'Student'],function (){
    Route::get('/dashboard','StudentController@dashboard')->name('student_dashboard');
    Route::get('/create/voice-enrollment','StudentController@index')->name('student_create_voice_enrollment');
    Route::get('/all/voice-enrollment','StudentController@enrollments')->name('student_all_voice_enrollment');
    Route::get('/get-master/voice-enrollment','StudentController@masterEnrollments')->name('student_get_master_voice_enrollment');
    Route::get('/get-master/voice-message','StudentController@masterVoiceMessage')->name('student_get_master_voice');
    Route::get('/get/chapter/alphabets','StudentController@dashboard')->name('student_get_chapter_alphabets');
    Route::put('update/profile','StudentController@updateProfile')->name('student_update_profile');

});

Route::post('master/store/voice-enrollment','Master\MasterController@store')->name('master_store_voice_enrollment');
Route::post('student/store/voice-enrollment','Student\StudentController@store')->name('student_store_voice_enrollment');
Route::post('send/message/to/line','Student\StudentController@sendMessage')->name('send_message_to_line user');
Route::post('send/webhook/request','Student\StudentController@sendWebhook')->name('send_webhook_request');
Route::get('user/profile/{id}','Profile\ProfileController@profile')->name('user_profile');
Route::post('user/profile/update/{id}','Profile\ProfileController@store')->name('user_profile_update');
