<?php


if (!function_exists('total_recordings')) {

    function total_recordings($id)
    {
        $total_recordings = \App\Models\StudentEnrollment::where('chapter_id',$id)->where('status','Recorded')->count();
        return $total_recordings;
    }
}
if (!function_exists('get_parameters')) {

    function get_parameters()
    {
       $parameters = [
           $client_id = env('LINE_KEY'),
           $line_redirect_url = env('LINE_REDIRECT_URI'),
           $app_key = env('APP_KEY'),
           ];
       return $parameters;
    }
}
