@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Master Recordings</title>
@endsection
@section('body')
    <div class="at-masterlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Master Recordings</h2>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Response</th>
                            <th>Chapter</th>
                            <th>Alphabet</th>
                            <th>Audio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($recordings))
                            @forelse($recordings as $key => $recording)
                                <tr id="user-3">
                                    <td data-title="Sr">{{$key+1}}</td>
                                    <td data-title="Response">0</td>
                                    <td data-title="Chapter">{{$recording->chapter ? $recording->chapter->name : 'N/A'}}</td>
                                    <td data-title="Alphabet"><figure><img src="{{$recording->alphabet ? asset('uploads/alphabets/'.$recording->alphabet->alphabet) : 'N/A'}}"></figure></td>
                                    <td data-title="Audio">
                                        <audio controls>
                                            <source src="{{asset('uploads/master-enrollments/'.$recording->audio)}}" type="audio/ogg">
                                        </audio>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
