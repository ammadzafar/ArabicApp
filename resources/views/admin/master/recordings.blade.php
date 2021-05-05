@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Master Recordings</title>
@endsection
@section('body')
    <div class="at-masterlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>{{$master->name}} Recordings</h2>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Check Response</th>
                            <th>Alphabet</th>
                            <th>Audio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($recordings as $key => $recording)

                            <tr id="user-3">
                                <td data-title="Name">{{$key+1}}</td>
                                <td data-title="resendid">
                                    <form action="{{route('admin_check_master_recording_response')}}" method="get" class="at-formtheme">
                                        <input type="hidden" name="voice_id" value="{{$recording->id}}">
                                        <input type="hidden" name="master_id" value="{{$master->id}}">
                                        <button type="submit" class="at-btn">Check response</button>
                                    </form>
                                </td>
                                <td data-title="Id"><figure><img src="{{asset('uploads/alphabets/'.$recording->alphabet->alphabet)}}"></figure></td>
                                <td data-title="Id">
                                    <audio controls>
                                        <source src="{{asset('uploads/master-enrollments/'.$recording->audio)}}" type="audio/ogg">
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
