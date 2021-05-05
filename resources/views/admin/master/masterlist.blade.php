@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Master List</title>
@endsection
@section('body')
    <div class="at-masterlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Master List</h2>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>ID</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th>Recordings</th>
                            <th>Resend ID</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($masters as $master)
                            <tr id="user-3">
                                <td data-title="Name">{{$master->name}}</td>
                                <td data-title="Email">{{$master->email}}</td>
                                <td data-title="Id">{{$master->logIn_id}}</td>
                                <td data-title="Id">{{$master->age}}</td>
                                <td data-title="Id">{{$master->gender}}</td>
                                <td data-title="Id">{{$master->nationality}}</td>
                                <td data-title="resendid">
                                    <form action="{{route('admin_check_master_recording')}}" method="get" class="at-formtheme">
                                        <input type="hidden" name="id" value="{{$master->id}}">
                                        <button type="submit" class="at-btn">Recordings</button>
                                    </form>
                                </td>
                                <td data-title="resendid">
                                    <form action="{{route('admin_resend_user_id')}}" method="post" class="at-formtheme">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$master->id}}">
                                        <input type="hidden" name="type" value="2">
                                        <button type="submit" class="at-btn">resend ID</button>
                                    </form>
                                </td>
                                <td data-title="resendid">
                                    <form action="{{route('admin_delete_user')}}" method="post" class="at-formtheme">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{$master->id}}">
                                        <input type="hidden" name="type" value="2">
                                        <button type="submit" class="at-btn">Delete</button>
                                    </form>
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
