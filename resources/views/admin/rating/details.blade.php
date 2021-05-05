
@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Rating Detail</title>
@endsection
@section('body')
    <div class="at-content at-masters at-admanrating">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.rating')}}</h2>
            </div>
        </div>
        <div class="at-mastercontent">
            <form class="at-formtheme" method="get" action="{{route('admin_rating_detail')}}">
                <fieldset>
                    <div class="form-group">
                        <div class="at-findstudenholder">
                            <div class="at-findstudent">
                                <ul class="at-studentdata at-adminsearchstudent">
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.chapter')}}</label>
                                            <select class="at-selecttheme" name="chapter">
                                                <option value="">-{{__('thailand.select')}}-</option>
                                                @forelse($chapters as $chapter)
                                                <option value="{{$chapter->id}}" {{request('chapter') == $chapter->id ? 'selected' : ''}}>{{$chapter->name}}</option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.user')}}</label>
                                            <select class="at-selecttheme" name="user">
                                                <option value="">-{{__('thailand.select')}}-</option>
                                                @forelse($users as $user)
                                                    <option value="{{$user->id}}" {{request('user') == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.rating')}}</label>
                                            <select class="js-example-basic-multiple at-select2 at-selecttheme" name="ratings[]" multiple="multiple">
                                                <option value="1" {{request('ratings') && in_array(1,request('ratings')) ? 'selected' : ''}}>1 Star</option>
                                                <option value="2" {{request('ratings') && in_array(2,request('ratings')) ? 'selected' : ''}}>2 Stars</option>
                                                <option value="3" {{request('ratings') && in_array(3,request('ratings')) ? 'selected' : ''}}>3 Stars</option>
                                                <option value="4" {{request('ratings') && in_array(4,request('ratings')) ? 'selected' : ''}}>4 Stars</option>
                                                <option value="5" {{request('ratings') && in_array(5,request('ratings')) ? 'selected' : ''}}>5 Stars</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.rated_by')}}</label>
                                            <select class="at-selecttheme" name="rated_by">
                                                <option value="">-{{__('thailand.select')}}-</option>
                                                @forelse($raters as $rater)
                                                    <option value="{{$rater->id}}" {{request('rated_by') == $rater->id ? 'selected' : ''}}>{{$rater->name}}</option>
                                                @empty
                                                @endforelse
                                            </select>

                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label></label>
                                            <button type="submit" class="at-btn at-btnapply">{{__('thailand.apply')}}</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <table class="at-tabletheme at-table">
                <thead>
                <tr>
                    <th><span>{{__('thailand.date')}} </span></th>
                    <!-- <th><span> Master </span></th> -->
                    <th><span> {{__('thailand.users')}} </span></th>
                    <th><span> {{__('thailand.alphabets')}} </span></th>
                    <th><span> {{__('thailand.rated_by')}} </span></th>
                    <th><span> {{__('thailand.rating')}} </span></th>
                </tr>
                </thead>
                <tbody>
                @forelse($ratedRecordings as $key => $recording)
                    <tr class="{{$loop->odd ? 'at-bggray' : ''}}">
                        <td>
                            {{\Carbon\Carbon::parse($recording->updated_at)->toDateString()}}
                        </td>
                        <td>{{$recording->student->name}}
                            <div class="at-masterrecordings">
                                <audio id="sound-{{$recording->id}}" src="{{asset('uploads/student-enrollments/'.$recording->student_voice)}}" preload="auto"></audio>

                                <a href="javascript:void(0);" class="at-playicon playAudioButton" data-id="{{$recording->id}}" onclick="document.getElementById('sound-{{$recording->id}}').play();">
                                    <i class="icon-play-button-1"></i>
                                </a>
                                <div class="at-sound" style="display: none">
                                    <div class='sound-icon disabled'>
                                        <div class='sound-wave'>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                            <i class='bar'></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="at-soundnumber">{{$key+1}}</span>
                            </div>
                        </td>
                        <td>
                            <figure class="at-alphabets">
                                <img src="{{asset('uploads/alphabets/'.$recording->alphabet->alphabet)}}" alt="alphabets image">
                            </figure>
                        </td>
                        <td>
                            {{$recording->ratedBy->name}}
                        </td>
                        <td>
                            <ul class="at-tableratingsstar">
                                <li>
                                    <span class="at-stars">
                                        <span style="width: {{($recording->rating/5)*100}}%"></span>
                                    </span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
