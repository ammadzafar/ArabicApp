@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Edit Chapter</title>
@endsection
@section('body')
    <div class="at-invitemaster at-editchapter">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Edit Chapter</h2>
            </div>
            <form action="{{route('admin_update_chapter',$chapter->id)}}" method="post" class="at-formtheme at-invitemasterform">
                <fieldset>
                    @csrf
                    @method('PUT')
                    <div class="at-inputholder">
                        <span>Edit Chapter</span>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$chapter->name}}" name="name" placeholder="Enter Chapter Name" required>
                            <button type="submit" class="btn at-btn">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
