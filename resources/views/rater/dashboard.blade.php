@extends('layouts.master')
@section('page-title')
    <title>Rater-dashboard</title>
@endsection
@section('body')
    <div class="at-content at-chapter at-rater at-masterrecordingholder">
        <!-- <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>Rater</h2>
            </div>
            <div class="at-sectionheadrightarea">
                <div class="at-profilearea">
                    <figure class="at-userimage">
                        <img src="images/profile-imgjpg.jpg" alt="">
                    </figure>
                    <div class="at-userprofile">
                        <h3>Suleman Ahmed</h3>
                        <a href="profile.html">View Profile</a>
                    </div>
                </div>
                <form class="at-formtheme at-searchform">
                    <fieldset>
                        <div class="form-group">
                            <a href="javascript:void(0);" class="at-searchicon">
                                <i class="icon-search"></i>
                            </a>
                            <input type="text" name="search" placeholder="Search...">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div> -->
        <div class="at-twocolumes">
            <div class="at-voiceandratings">
                <div class="at-sectionheadvtwo">
                    <div class="at-sectiontitlevtwo">
                        @if(!empty($record))

                            <h2 id="voiceNumberTag">Voice No. {{App\Models\StudentEnrollment::getRecordingNumber($record)['voiceNumber']}} /{{App\Models\StudentEnrollment::getRecordingNumber($record)['total']}}</h2>
                        @endif
                    </div>
                    <!-- <div class="at-btnsubmit">
                        <a href="{{route('logout')}}" class="at-btn at-btnlogoutstudent">Logout</a>
                    </div> -->
                    <div class="at-userrecording" id="checkRecordingDiv">
{{--                        @if($recordings)--}}
                        @if($recordings && $recordings->count() > 0)
                            <div class="at-userdetail">
                                <figure class="at-recorderimg">
                                    <img src="{{asset('assets/images/3.jpg')}}" alt="user image">
                                </figure>
                                <div class="at-username">
                                    <input type="hidden" name="recording_id" value="{{$recordings->first()->id}}">
                                    <h4>{{$recordings->first()->student->name}}</h4>
                                    <span>{{round($recordings->first()->duration)}} Sec</span>
                                    <a href="javascript:void(0);" class="at-btntoggle">
                                        <span class="at-btnrecorded statusCircle-{{$recordings->first()->id}} {{$recordings->first()->status == 'Rated' ? 'at-bggreen' : ''}}"></span>
                                    </a>

                                    <audio id="sound-{{$recordings->first()->id}}" src="{{asset('uploads/student-enrollments/'.$recordings->first()->student_voice)}}" preload="auto"></audio>
                                    <a href="javascript:void(0);" data-id="{{$recordings->first()->id}}" onclick="document.getElementById('sound-{{$recordings->first()->id}}').play();" class="at-btnplay playAudioButton">
                                        <i class="icon-play-button-1"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="at-sound" id="equalizerBarDiv-{{$recordings->first()->id}}" style="display: none">
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
                        @endif
                    </div>
                </div>
                <div class="at-ratingsanduservoice">
                    <div class="at-voicequiz">
                        <div class="at-sectionheadvtwo">
                            <div class="at-sectiontitlevtwo">
                                <h2>{{__('thailand.voices_list')}}</h2>
                            </div>
                        </div>
                        <ul id="recorderList">
                            @forelse($recordings as $record)
                                <li class="at-bglight">
                                    <a href="javascript:void(0);" class="at-userrecordlistholder getUserRecording" data-id="{{$record->id}}">
                                        <div class="at-userdetail">
                                            <figure class="at-recorderimg">
                                                <img src="{{asset('assets/images/3.jpg')}}" alt="user image">
                                            </figure>
                                            <div class="at-username">
                                                <h4>{{$record->student->name}}</h4>
                                                <span>{{round($record->duration)}} Sec</span>
                                                <em>
                                                    <span class="at-btnrecorded statusCircle-{{$record->id}} {{$record->status == 'Rated' ? 'at-bggreen' : ''}}"></span>
                                                </em>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="at-authorizedmaster">
                        <div class="at-sectionheadvtwo">
                            <div class="at-sectiontitlevtwo">
                                <h2>{{__('thailand.manual_score')}}</h2>
                            </div>
                        </div>
{{--                        <button type="button" class="btn btn-danger">Danger</button>--}}
                        <form class="at-formtheme at-ratingform">
                            <fieldset>
                                <div class="at-ratingstarsarea">
                                    <div class="at-btnheaarticon">
                                        <input type="checkbox" name="heart" id="hearticon" value="1" {{$recordRate && $recordRate->is_master == 1 ? 'checked' : ''}}>
                                        <label for="hearticon"><i class="fas fa-heart"></i></label>
                                        <!-- <a href="javascript:void(0);" class="at-btnheart"><i class="fas fa-heart"></i></a>
                                        <span>MASTER</span> -->
                                    </div>
                                    <div class="at-starsarea">
                                        <div class="at-ratingbox">
                                            <div class="rating">
                                                <input type="radio" id="star5" name="rating" value="5" {{$recordRate && $recordRate->rating == 5 ? 'checked' : ''}} /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                {{--                                                <input type="radio" id="star4half" name="rating" value="4.5" {{$recordRate && $recordRate->rating == 4.5 ? 'checked' : ''}} /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>--}}
                                                <input type="radio" id="star4" name="rating" value="4" {{$recordRate && $recordRate->rating == 4 ? 'checked' : ''}} /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                {{--                                                <input type="radio" id="star3half" name="rating" value="3.5" {{$recordRate && $recordRate->rating == 3.5 ? 'checked' : ''}} /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>--}}
                                                <input type="radio" id="star3" name="rating" value="3" {{$recordRate && $recordRate->rating == 3 ? 'checked' : ''}} /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                {{--                                                <input type="radio" id="star2half" name="rating" value="2.5" {{$recordRate && $recordRate->rating == 2.5 ? 'checked' : ''}} /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>--}}
                                                <input type="radio" id="star2" name="rating" value="2" {{$recordRate && $recordRate->rating == 2 ? 'checked' : ''}} /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                {{--                                                <input type="radio" id="star1half" name="rating" value="1.5" {{$recordRate && $recordRate->rating == 1.5 ? 'checked' : ''}} /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>--}}
                                                <input type="radio" id="star1" name="rating" value="1" {{$recordRate && $recordRate->rating == 1 ? 'checked' : ''}} /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                {{--                                                <input type="radio" id="starhalf" name="rating" value="0.5" {{$recordRate && $recordRate->rating == 0.5 ? 'checked' : ''}} /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="at-btnsubmateholder">
                                        <a href="javascript:void(0);" class="at-btn at-btnsubmited" id="submitButton">{{__('thailand.submit')}}</a>
                                    </div>
                                </div>
                                <div class="at-rules" id="rater_alphabets">
                                    @if($alphabets)
                                        @foreach($rules->take(5) as $rule)
                                            <div class="at-rule">
                                                <span class="at-rulename">{{$rule->name}}</span>
                                                <div class="at-rulecontent">
                                                    <input type="radio" class="ruleRadio" id="star10-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 5 ? 'checked' : ''}} name="" value="5" /><label class = "full" for="star10-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star9-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 4 ? 'checked' : ''}} name="" value="4" /><label class = "full" for="star9-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star8-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 3 ? 'checked' : ''}} name="" value="3" /><label class = "full" for="star8-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star7-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 2 ? 'checked' : ''}} name="" value="2" /><label class = "full" for="star7-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star6-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 1 ? 'checked' : ''}} name="" value="1" /><label class = "full" for="star6-" ></label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($alphabets[0]->rules->take(5) as $rule)
                                            <div class="at-rule">
                                                <span class="at-rulename">{{$rule->name}}</span>
                                                <div class="at-rulecontent">
                                                    <input type="radio" class="ruleRadio" id="star10-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 5 ? 'checked' : ''}} name="" value="5" /><label class = "full" for="star10-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star9-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 4 ? 'checked' : ''}} name="" value="4" /><label class = "full" for="star9-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star8-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 3 ? 'checked' : ''}} name="" value="3" /><label class = "full" for="star8-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star7-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 2 ? 'checked' : ''}} name="" value="2" /><label class = "full" for="star7-" ></label>
                                                    <input type="radio" class="ruleRadio" id="star6-" data-id="" {{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 1 ? 'checked' : ''}} name="" value="1" /><label class = "full" for="star6-" ></label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="at-sidebarwidgetvtwo">

                <div class="at-widgethead">
                    <div id="at-alhphbatslider" class="at-alhphbatslider owl-carousel">
                        @php $previousValue = null; $counter = 1 ;@endphp
                        @forelse($alphabets as $key => $alphabet)
                            @php
                                $current = $alphabet;
                                if ($key > 0){
                                    $previousValue = $alphabets[$key-1];
                                    if ($previousValue !== null && $previousValue->chapter_id !== $current->chapter_id){
                                    $counter = 1;
                                     }else{
                                     $counter = $counter+1;
                                     }
                                    }
                            @endphp
                            <div class="item">
                                <div class="at-sectionheadvtwo">
                                    <div class="at-sectiontitlevtwo">
                                        <h2 class="getAlpha" data-id="{{$alphabet->id}}">{{$alphabet->chapter->name}}  :  {{$counter}}/{{count($alphabet->chapter->alphabets)}} </h2>
                                    </div>
                                </div>
                                <div class="at-widgetcontent">
                                    <figure class="rscimage" data-id="{{$alphabet->id}}">
                                        <img  data-id="{{$alphabet->id}}" src="{{asset('uploads/alphabets/'.$alphabet->alphabet)}}" alt="alhphbat image">
                                    </figure>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="at-ratingpoints">
                    <div class="at-sectionheadvtwo">
                        <div class="at-sectiontitlevtwo">
                            <h2>{{__('thailand.quiz_list')}}</h2>
                        </div>
                    </div>
                    <ul>
                        @php $previousValue = null; $counter = 1 ;@endphp
                        @forelse($alphabets as $key => $alphabet)
                            @php
                                $current = $alphabet;
                                if ($key > 0){
                                    $previousValue = $alphabets[$key-1];
                                    if ($previousValue !== null && $previousValue->chapter_id !== $current->chapter_id){
                                    $counter = 1;
                                     }else{
                                     $counter = $counter+1;
                                     }
                                    }
                            @endphp

                            <li class="{{ round(($alphabet->recordings->count()/App\Models\User::where('role_id',3)->count())*100,2)  < 100 ? 'at-coloryellow' : '' }} {{$key == 0 ? 'at-bgbluevtwo' : ''}} alphabetsListClass">
                                <a href="javascript:void(0);" class="clickOnAlphabet" id="clickOnAlphabet-{{$alphabet->id}}" data-index="{{$key}}" data-id="{{$alphabet->id}}">
                                    <div class="at-ratingname">
                                            <span>
                                                {{$alphabet->chapter->name}}  :
                                            </span>
                                        <span>
                                                {{$counter}}/{{count($alphabet->chapter->alphabets)}}
                                            </span>
                                    </div>
                                    <span class="at-raterpersantage">
                                    {{ round(($alphabet->recordings->count()/App\Models\User::where('role_id',3)->count())*100,2) }}%
                                        </span>
                                    <div class="at-raterpoints">
                                        <span>{{$alphabet->recordings->count()}}/</span>
                                        <span>{{ App\Models\User::where('role_id',3)->count() }}</span>
                                    </div>
                                </a>
                            </li>
                        @empty
                        @endforelse

                    </ul>
                    <!-- <div class="scrollbar" id="style-4">
                        <div class="force-overflow">

                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

            {{--let url = '{{route('rules_against_alphabet')}}'--}}
            {{--let data = {--}}
            {{--    '_token': '{{csrf_token()}}',--}}
            {{--    'alphabet_id':  $('.getAlpha').data('id'),--}}
            {{--};--}}
            {{--$.post(url,data,function(response){--}}

            {{--    $("#rater_alphabets").html(response)--}}
            {{--    $('.js-example-basic-multiple').select2({--}}
            {{--        closeOnSelect : false,--}}
            {{--        placeholder : "Select Rules",--}}
            {{--        // allowHtml: true,--}}
            {{--        allowClear: true,--}}
            {{--        tags: true // создает новые опции на лету--}}
            {{--    });--}}
            {{--})--}}

            let alphabetId = '';
            var owl = $('.owl-carousel').owlCarousel({
                loop: true,
                nav: true,
            });


        /*=====================================================   Particular alphabet rules   ========================================================*/

                let rated_alphabet = null;
                owl.on('changed.owl.carousel', function (e) {
                    var current = e.item.index;
                    rated_alphabet = $(e.target).find(".owl-item").eq(current).find("img").data('id');
                    let url = '{{route('rules_against_alphabet')}}'
                    let data = {
                      '_token': '{{csrf_token()}}',
                      'alphabet_id':  rated_alphabet,
                    };

                    $.post(url,data,function(response){
                          $("#rater_alphabets").html(response)

                         $('.js-example-basic-multiple').select2({
                            closeOnSelect : false,
                            placeholder : "Select Rules",
                            // allowHtml: true,
                            allowClear: true,
                            tags: true // создает новые опции на лету
                        });
                    })
                });

            {{--$(document).on('click','.at-croseicon',function(){--}}

            {{--    $(this).parents('.at-rule').hide();--}}
            {{--    let rule_id = $(this).data('id');--}}
            {{--    let url = '{{route('delete_particular_alphabet_rule')}}'--}}
            {{--    let data = {--}}
            {{--      '_token':'{{csrf_token()}}',--}}
            {{--      'alphabet_id':  rated_alphabet,--}}
            {{--      'rule_id':  rule_id,--}}
            {{--    };--}}
            {{--    $.post(url,data,function (response){--}}
            {{--        if(response.status == 'success'){--}}
            {{--            // location.reload();--}}
            {{--        }--}}
            {{--    })--}}
            {{--});--}}

            $(document).on('click','.rulebtn',function(){

                let previous = $(this).prev();
                let values = $(this).prev().find('.multvalues');
                let url = '{{route('add_new_alphabet_rules')}}'
                let data = {
                    '_token':'{{csrf_token()}}',
                    'alphabet_id': rated_alphabet,
                    'values':values.select2('val'),
                }
                $.post(url,data,function (response){
                    if (response.status == 'success'){
                        toastr.success(response.message, 'success!');
                    }if (response.status == 'error'){
                        location.reload();
                        toastr.error(response.message, 'error!');

                    }
                });
            });

            $(document).on('change','.multvalues',function (){
                let previous = $(this).parent().prev();
                previous.children().hide();

                let rules_id = $(this).select2('val');
                let rules = [];
                $(".multvalues option:selected").each(function (index) {
                     rules.push({
                         name: $(this).data('value'),
                         id: rules_id[index]
                });
                });

                let childrens = null;
                $.each(rules,function (key,value){
                     childrens = ' <div class="at-rule append-rules">\n' +
                        '            <span class="at-rulename">'+value.name+'</span>\n' +
                        '            <div class="at-rulecontent '+value.name+'">\n' +
                        '                <input type="radio" class="ruleRadio" id="star10-'+value.id+'" data-id="'+value.id+'" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 5 ? \'checked\' : \'\'}}--}} name="'+value.id+'" value="5" /><label class = "full" for="star10-'+value.id+'" ></label>\n' +
                        '                <input type="radio" class="ruleRadio" id="star9-'+value.id+'" data-id="'+value.id+'" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 4 ? \'checked\' : \'\'}}--}} name="'+value.id+'" value="4" /><label class = "full" for="star9-'+value.id+'" ></label>\n' +
                        '                <input type="radio" class="ruleRadio" id="star8-'+value.id+'" data-id="'+value.id+'" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 3 ? \'checked\' : \'\'}}--}} name="'+value.id+'" value="3" /><label class = "full" for="star8-'+value.id+'" ></label>\n' +
                        '                <input type="radio" class="ruleRadio" id="star7-'+value.id+'" data-id="'+value.id+'" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 2 ? \'checked\' : \'\'}}--}} name="'+value.id+'" value="2" /><label class = "full" for="star7-'+value.id+'" ></label>\n' +
                        '                <input type="radio" class="ruleRadio" id="star6-'+value.id+'" data-id="'+value.id+'" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 1 ? \'checked\' : \'\'}}--}} name="'+value.id+'" value="1" /><label class = "full" for="star6-'+value.id+'" ></label>\n' +
                        '            </div>\n' +
                        '        </div>';
                    previous.append(childrens);
                });
            });

            /*=====================================================   Particular alphabet rules end  ========================================================*/

            function getRecordings(url){
                $.get(url,function (response) {
                    if(response.status === 'success'){
                        $('#recorderList').empty();
                        $('#checkRecordingDiv').empty();
                        $('#voiceNumberTag').text(" ");
                        let tag = 'Voice No. '+response.voiceNumber+ ' /'+response.total;
                        $('#voiceNumberTag').text(tag);
                        $.each(response.recordings, function(index,value) {
                            let status = value.status == 'Rated' ? 'at-bggreen' : '';
                            let check = index == 0 ? 'at-bglight' : '';
                            if(index == 0){
                                console.log(value.rating,value.rating !== null);

                                if(value.rating !== null){
                                    $('input[name=rating][value="' + value.rating + '"]')
                                        .prop('checked', true);
                                    $('.at-croseicon').addClass('d-none')
                                }else{
                                    $('.at-croseicon').removeClass('d-none')
                                }
                                if(value.is_master === 1){
                                    $('input[name=heart]').prop('checked', true);
                                }else{
                                    $('input[name=heart]').prop('checked', false);
                                }
                                $.each(value.rule_ratings,function (key,ruleRating) {
                                    $('input[name="' + ruleRating.rule_id + '"][value="' + ruleRating.rating + '"]')
                                        .prop('checked', true);
                                });
                                let recordingdiv =
                                    ' <div class="at-userdetail">\n' +
                                    '                                <figure class="at-recorderimg">\n' +
                                    '                                    <img src="{{asset('assets/images/3.jpg')}}" alt="user image">\n' +
                                    '                                </figure>\n' +
                                    '\n' +
                                    '                                    <input type="hidden" name="recording_id" value="'+value.id+'">'+
                                    '                                <div class="at-username">\n' +
                                    '                                    <h4>'+value.student.name+'</h4>\n' +
                                    '                                    <span>'+value.duration+' Sec</span>\n' +
                                    '                                    <a href="javascript:void(0);" class="at-btntoggle">\n' +
                                    '                                        <span class="at-btnrecorded statusCircle-'+value.id+' '+status+' "></span>\n' +
                                    '                                    </a>\n' +
                                    '\n' +
                                    '                                    <audio id="sound-'+value.id+'" src="{{asset('uploads/student-enrollments/').'/'}}'+value.student_voice+'" preload="auto"></audio>\n' +
                                    '                                    <a href="javascript:void(0);" data-id="'+value.id+'" onclick=document.getElementById("sound-'+value.id+'").play(); class="at-btnplay playAudioButton">\n' +
                                    '                                        <i class="icon-play-button-1"></i>\n' +
                                    '                                    </a>\n' +
                                    '                                </div>' +
                                    '                            </div>\n' +
                                    '                            <div class="at-sound" id="equalizerBarDiv-'+value.id+'" style="display: none">\n' +
                                    '                                <div class=\'sound-icon disabled\'>\n' +
                                    '                                    <div class=\'sound-wave\'>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                        <i class=\'bar\'></i>\n' +
                                    '                                    </div>\n' +
                                    '                                </div>\n' +
                                    '                            </div>'

                                $('#checkRecordingDiv').append(recordingdiv);

                            }
                            let li =   ' <li class="'+check+'">\n' +
                                '                                    <a href="javascript:void(0);" class="at-userrecordlistholder getUserRecording" data-id="'+value.id+'">\n' +
                                '                                        <div class="at-userdetail">\n' +
                                '                                            <figure class="at-recorderimg">\n' +
                                '                                                <img src="{{asset('assets/images/3.jpg')}}" alt="user image">\n' +
                                '                                            </figure>\n' +
                                '                                            <div class="at-username">\n' +
                                '                                                <h4>'+value.student.name+'</h4>\n' +
                                '                                                 <span>'+value.duration+' Sec</span>\n' +
                                '                                                <em>\n' +
                                '                                                    <span class="at-btnrecorded statusCircle-'+value.id+' '+status+'"></span>\n' +
                                '                                                </em>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </a>\n' +
                                '                                </li>'



                            $('#recorderList').append(li);
                        });

                    }
                });
            }
            owl.on('changed.owl.carousel', function (e) {
                var current = e.item.index;
                alphabetId = $(e.target).find(".owl-item").eq(current).find("img").data('id');
                $('.alphabetsListClass').removeClass('at-bgbluevtwo');
                $('#clickOnAlphabet-'+alphabetId).parent().addClass('at-bgbluevtwo');
                let url = '{{route('get_voice_list_of_alphabet','id')}}';
                url = url.replace('id',alphabetId);
                $('input[name=rating]').prop('checked', false);
                $('input[name=heart]').prop('checked', false);
                $('input:radio[class=ruleRadio]').prop('checked', false);
                getRecordings(url);
            });



            $(document).on('click','input[name=rating]',function (e) {
                let value = $(this).val();
                console.log(value);
                $("input[type=radio].ruleRadio").each(function() {
                    $(this).attr('checked',false);
                });
                $("input[type=radio].ruleRadio").each(function() {
                    console.log($(this).val());
                    // $(this).attr('checked',false);
                    if ($(this).val() === value){
                        let rate = $(this).attr('checked',true);
                    }

                });
            });
            $(document).on('click','.clickOnAlphabet',function (e) {
                $('.alphabetsListClass').removeClass('at-bgbluevtwo');
                $(this).parent().addClass('at-bgbluevtwo');
                let carouselIndex = $(this).data('index');
                $("#at-alhphbatslider").trigger("to.owl.carousel", [carouselIndex, true]);
                let id = $(this).data('id');
                let url = '{{route('get_voice_list_of_alphabet','id')}}';
                url = url.replace('id',id);
                $('input[name=rating]').prop('checked', false);
                $('input[name=heart]').prop('checked', false);
                $('input:radio[class=ruleRadio]').prop('checked', false);
                getRecordings(url);
            });
            $(document).on('click','.playAudioButton',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#equalizerBarDiv-'+id).css("display", "block");
                $("audio").on("ended", function() {
                    $('#equalizerBarDiv-'+id).css("display", "none");
                });
            });
            $(document).on('click','.getUserRecording',function (e) {
                e.preventDefault();

                let id = $(this).data('id');
                let url = '{{route('rater_get_recording','id')}}';
                url = url.replace('id',id);
                $('input[name=rating]').prop('checked', false);
                $('input:radio[class=ruleRadio]').prop('checked', false);
                $.get(url,function (response) {
                    if(response.status === 'success'){
                        $('#voiceNumberTag').text(" ");
                        let tag = 'Voice No. '+response.voiceNumber+ ' /'+response.total;
                        $('#voiceNumberTag').text(tag);
                        let status = response.recording.status === 'Rated' ? 'at-bggreen' : '';
                        if(response.recording.rating !== null){
                            $('input[name=rating][value="' + response.recording.rating + '"]')
                                .prop('checked', true);
                        }
                        if(response.recording.is_master === 1){
                            $('input[name=heart]').prop('checked', true);
                        }else{
                            $('input[name=heart]').prop('checked', false);
                        }
                        $.each(response.recording.rule_ratings,function (key,ruleRating) {
                            $('input[name="' + ruleRating.rule_id + '"][value="' + ruleRating.rating + '"]')
                                .prop('checked', true);
                        });
                        $('#checkRecordingDiv').empty();
                        let recordingdiv =
                            ' <div class="at-userdetail">\n' +
                            '                                <figure class="at-recorderimg">\n' +
                            '                                    <img src="{{asset('assets/images/3.jpg')}}" alt="user image">\n' +
                            '                                </figure>\n' +
                            '\n' +
                            '                                    <input type="hidden" name="recording_id" value="'+response.recording.id+'">'+
                            '                                <div class="at-username">\n' +
                            '                                    <h4>'+response.recording.student.name+'</h4>\n' +
                            '                                    <span>'+response.recording.duration+' Sec</span>\n' +
                            '                                    <a href="javascript:void(0);" class="at-btntoggle">\n' +
                            '                                        <span class="at-btnrecorded statusCircle-'+response.recording.id+' '+status+' "></span>\n' +
                            '                                    </a>\n' +
                            '\n' +
                            '                                    <audio id="sound-'+response.recording.id+'" src="{{asset('uploads/student-enrollments/').'/'}}'+response.recording.student_voice+'" preload="auto"></audio>\n' +
                            '                                    <a href="javascript:void(0);" data-id="'+response.recording.id+'" onclick=document.getElementById("sound-'+response.recording.id+'").play(); class="at-btnplay playAudioButton">\n' +
                            '                                        <i class="icon-play-button-1"></i>\n' +
                            '                                    </a>\n' +
                            '                                </div>' +
                            '                            </div>\n' +
                            '                            <div class="at-sound" id="equalizerBarDiv-'+response.recording.id+'" style="display: none">\n' +
                            '                                <div class=\'sound-icon disabled\'>\n' +
                            '                                    <div class=\'sound-wave\'>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                        <i class=\'bar\'></i>\n' +
                            '                                    </div>\n' +
                            '                                </div>\n' +
                            '                            </div>'

                        $('#checkRecordingDiv').append(recordingdiv);
                    }
                });
            });
            $(document).on('click','#submitButton',function (e) {
                e.preventDefault();
                let id = $('input[name="recording_id"]').val();
                let rating = $('input[name="rating"]:checked').val();
                let heart = 0;
                heart = $('input[name="heart"]:checked').val();
                console.log(heart);
                let rules = $('.ruleRadio');
                let ruleArray = {};
                $("input[type=radio].ruleRadio:checked").each(function() {
                    let rate = $(this).val();
                    let name = $(this).attr('name');
                    ruleArray[name] = rate;
                });

                let url = '{{route('rater_submit_rating')}}';
                let data = {
                    '_token' : '{{csrf_token()}}',
                    'id' : id,
                    'rating' : rating,
                    'heart' : heart,
                    'ruleRatings' :  ruleArray,
                };
                if(rating === undefined){
                    toastr.error("Please Select Rating First.", 'error!');
                }
                if(id === undefined){
                    toastr.error("Please Select User Recording First.", 'error!');
                }
                if (rating !== undefined && id !== undefined){
                    $.post(url,data,function (response) {
                        // console.log(response);
                        if(response.status == 'success'){
                            toastr.success("Recording Rated successfully.", 'success!');
                            $('.statusCircle-'+response.recording.id).addClass('at-bggreen');
                        }
                        if(response.status == 'error'){
                            toastr.error(response.message, 'error!');
                        }
                    });
                }
            });
        });

    </script>
@endsection
