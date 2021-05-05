@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Master Recordings</title>
@endsection
@section('body')
    <div class="at-masterlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Recording Response</h2>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Master</th>
                            <th>Student</th>
                            <th>Alphabet</th>
                            <th>Master Audio</th>
                            <th>Student Audio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($recordings as $key => $recording)
                            <tr id="user-3">
                                <td data-title="Name">{{$key+1}}</td>
                                <td data-title="Email">{{$recording->master ? $recording->master->name : 'N/A'}}</td>
                                <td data-title="Email">{{$recording->student ? $recording->student->name : 'N/A'}}</td>
                                <td data-title="Id"><figure><img src="{{$recording->masterVoice && $recording->masterVoice->alphabet ? asset('uploads/alphabets/'.$recording->masterVoice->alphabet->alphabet) : ''}}"></figure></td>
                                <td data-title="Id">
                                    <audio controls>
                                        <source src="{{asset('uploads/master-enrollments/'.$recording->masterVoice->audio)}}" type="audio/ogg">
                                    </audio>
                                </td>
                                <td data-title="Id">
                                    <audio controls>
                                        <source src="{{asset('uploads/student-enrollments/'.$recording->student_voice)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
