@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Student Recordings</title>
@endsection
@section('body')
    <div class="at-masterlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Student Recordings</h2>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Master</th>
                            <th>Alphabet</th>
                            <th>Master Audio</th>
                            <th>Student Audio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($recordings as $key => $recording)
                            <tr id="user-3">
                                <td data-title="Sr">{{$key+1}}</td>
                                <td data-title="Master">{{$recording->master ? $recording->master->name : 'N/A'}}</td>
                                <td data-title="Alphabet"><figure><img src="{{$recording->masterVoice && $recording->masterVoice->alphabet ? asset('uploads/alphabets/'.$recording->masterVoice->alphabet->alphabet) : 'N/A'}}"></figure></td>
                                <td data-title="Master Audio">
                                    <audio controls>
                                        <source src="{{asset( $recording->masterVoice ? 'uploads/master-enrollments/'.$recording->masterVoice->audio : 'N/A')}}" type="audio/ogg">
                                    </audio>
                                </td>
                                <td data-title="Student Audio">
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
