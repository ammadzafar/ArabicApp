@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Chapter List</title>
@endsection
@section('body')
    <div class="at-masterlist at-chapterlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Chapter List</h2>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($chapters as $key => $chapter)
                            <tr id="user-3">
                                <td data-title="Name">{{$key+1}}</td>
                                <td data-title="Email">{{$chapter->name}}</td>
                                <td data-title="resendid">
                                    <form action="{{route('admin_edit_chapter',$chapter->id)}}" method="get" class="at-editform">
                                        <button type="submit" class="at-btn">Edit</button>
                                    </form>
                                    <form action="{{route('admin_delete_chapter')}}" method="post" class="at-deleteform">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{$chapter->id}}">
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
