@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Student voice enrollment</title>
@endsection
@section('body')

    <div class="page-content d-table m-auto h-100 at-studentvoiceenrollment">
        <section class="section_login">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="at_form_holder">
                            <form class="at-formtheme" id="studentChapterForm" action="{{route('student_create_voice_enrollment')}}" method="get" >
                                <div class="at_fromhead">
                                    <h2>Student Voice Enrollment</h2>
                                </div>

                                <div class="form-group">
                                    <label for="selectWord">Select Master</label>
                                    <span class="at-select">
                                        <select id="selectWord" name="masterId">
                                            <option value="">Select Master</option>
                                            @forelse($masters as $master)
                                                <option value="{{$master->id}}" {{request('masterId') == $master->id ? 'selected' : ''}}>{{$master->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group" id="chapterDiv"  >
                                    <label for="selectWord">Select Chapter</label>
                                    <span class="at-select">
                                        <select id="selectWord" name="chapter_id">
                                             <option value="">Select Chapter</option>
                                             @if($chapters)
                                                @forelse($chapters as $key => $chapter)
                                                    <option value="{{$chapter->id}}" {{request('chapter_id') == $chapter->id ? 'selected' : ''}}>{{$chapter->name}}</option>
                                                @empty
                                                @endforelse
                                            @endif
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div id="at-ratedimageslider" class="at-ratedimageslider owl-carousel">

                                        @if($alphabets)
                                            @forelse($alphabets as $key => $alphabet)
                                                <div class="at-ratedimagebox item">
                                                    <figure class="at-ratedimg">
                                                        <a href="javascript:void(0);" class="alphaImage" data-id="{{$alphabet->id}}">
                                                            <svg class="at-checkicon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="at-checkicon-circle" cx="26" cy="26" r="25" fill="none"/>
                                                                <path class="at-checkicon-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                            </svg>
                                                            <img src="{{asset('uploads/alphabets/'.$alphabet->alphabet)}}" alt="">
                                                        </a>
                                                    </figure>
                                                </div>
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="masterVoice">Record Student Voice</label>
                                    <ul class="at-recordingbox">
                                        <li>
                                            <a href="javascript:void(0);" class="play-btn at_w_30 startRec"  id="recordButton">
                                                <img src="{{asset('assets/images/mic.svg')}}" alt="">
                                            </a>
                                        </li>
                                        <li class="at_hide_btn">
                                            <a href="javascript:void(0);" id="pauseButton" class="play-btn stop-record ">
                                                <img src="{{asset('assets/images/pause.svg')}}" alt="">
                                            </a>
                                        </li>
                                        <li class="at_hide_btn">
                                            <a href="javascript:void(0);" id="stopButton" class="play-btn stop-record">
                                                <img src="{{asset('assets/images/stop.svg')}}" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Put Microphone Wave Here -->
                                    <div id="listening" class="listening">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76 26">
                                            <defs>
                                                <style>.wave {fill: #0084ff;}</style>
                                            </defs>
                                            <g id="audio-wave" data-name="audio-wave">
                                                <rect id="wave-5" class="wave" x="32" y="7" width="4" height="12" rx="2" ry="2"/>
                                                <rect id="wave-4" class="wave" x="24" y="2" width="4" height="22" rx="2" ry="2"/>
                                                <rect id="wave-3" class="wave" x="16" width="4" height="26" rx="2" ry="2"/>
                                                <rect id="wave-2" class="wave" x="8" y="5" width="4" height="16" rx="2" ry="2"/>
                                                <rect id="wave-1" class="wave" y="9" width="4" height="8" rx="2" ry="2"/>
                                                <rect id="wave-5-2" data-name="wave-4" class="wave" x="72" y="7" width="4" height="12" rx="2" ry="2"/>
                                                <rect id="wave-4-2" data-name="wave-5" class="wave" x="64" y="2" width="4" height="22" rx="2" ry="2"/>
                                                <rect id="wave-3-2" data-name="wave-3" class="wave" x="56" width="4" height="26" rx="2" ry="2"/>
                                                <rect id="wave-2-2" data-name="wave-2" class="wave" x="48" y="5" width="4" height="16" rx="2" ry="2"/>
                                                <rect id="wave-1-2" data-name="wave-1" class="wave" x="40" y="9" width="4" height="8" rx="2" ry="2"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <ol id="recordingsList" class="at-recordingslist"></ol>
                                </div>
                                <div class="form-group" id="voice">


                                </div>
                                <div class="form-group utterance_id_group">
                                    <label>Your Utterance ID</label>
                                    <h4 class="utterance_id">110-882-MCYU-099</h4>
                                    <p>copy to clipboard</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('scripts')
    <script>
        let mId = '{{request('masterId')}}';
        let vId = '';
        let alphabetId = '';
        let chapterId = '{{request('chapter_id')}}';
        $(document).ready(function () {
            $('select[name="masterId"]').change(function(e) {
                $('#studentChapterForm').submit();


                {{--$('#chapterDiv').css('display','block');--}}
                {{--$('select[name="chapter_id"]').empty();--}}
                {{--$('#voice').empty();--}}
                let masterId = $(this).val();
                $('input[name=master_id]').val(masterId);
                mId = masterId;
                {{--if (masterId !== ''){--}}
                {{--    let url = '{{route('student_get_master_voice_enrollment')}}';--}}
                {{--    let data = {--}}
                {{--        '_token' : '{{csrf_token()}}',--}}
                {{--        'masterId' : masterId,--}}
                {{--    };--}}

                {{--    $.get(url,data,function (response) {--}}
                {{--        if (response.status == "success"){--}}
                {{--            let firstOption =  '<option value="">Select Chapter</option>';--}}
                {{--            $('select[name="chapter_id"]').append(firstOption);--}}
                {{--            $.each(response.chapters , function(index, value) {--}}
                {{--                let text = value.name;--}}
                {{--                let id = value.id;--}}
                {{--                var option = $('<option></option>').attr("value", id).text(text);--}}
                {{--                $('select[name="chapter_id"]').append(option);--}}
                {{--            });--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}
            });

            $('select[name=chapter_id]').on('change',function (e) {
                $('#studentChapterForm').submit();

                chapterId = $(this).val();

                {{--let url = '{{route('student_get_chapter_alphabets','id')}}';--}}
                {{--url = url.replace('id',chapterId);--}}

                {{--$.get(url,function (response) {--}}
                {{--    if(response.status === 'success'){--}}
                {{--        $('#alphabetsDiv').empty();--}}
                {{--        let length = response.alphabets.length;--}}
                {{--        if (length > 0){--}}
                {{--            $.each(response.alphabets, function( index, value ) {--}}
                {{--                let radio =     '                                                    <li class="">\n' +--}}
                {{--                    '                                                        <div class="at-radio add_service"  style="border-radius: 15px">\n' +--}}
                {{--                    '                                                            <input type="radio" value="'+value.id+'" name="serviceRadio" id="playarea'+value.id+'">\n' +--}}
                {{--                    '                                                            <label for="playarea'+value.id+'">\n' +--}}
                {{--                    '                                                        <span class="at-serviceicon">\n' +--}}
                {{--                    '                                                            <span class="at-servicename">ِ' + value.alphabet + ' </span>\n' +--}}
                {{--                    '                                                        </span>\n' +--}}
                {{--                    '                                                            </label>\n' +--}}
                {{--                    '                                                        </div>\n' +--}}
                {{--                    '                                                    </li>\n'--}}

                {{--                $('#alphabetsDiv').append(radio);--}}
                {{--            });--}}
                {{--        }--}}
                {{--    }--}}
                // });
            });

            $(document).on('click','.alphaImage',function () {
                $('#recordingsList').empty();
                $('#voice').empty();
                $('.add_service').removeClass('radioBackground');
                alphabetId = $(this).attr('data-id');
                $(this).parent().toggleClass('radioBackground');
                if (alphabetId !== '') {
                    let url = '{{route('student_get_master_voice')}}';
                    let data = {
                        '_token': '{{csrf_token()}}',
                        'alphabetId': alphabetId,
                        'chapterId': '{{request('chapter_id')}}',
                        'masterId': '{{request('masterId')}}',
                    };

                    $.get(url, data, function (response) {
                        if (response.status == "success") {
                            if(response.voice !== null){
                                vId = response.voice.id;
                                let audio = $(
                                    '<label>Play Master Voice</label><audio controls ><source src="{{asset('uploads/master-enrollments').'/'}}' + response.voice.audio + '" type="audio/ogg"></audio>');
                                $('#voice').empty().append(
                                    audio
                                );
                            }
                        }
                    });
                }
            });
            $('select[name="master_text"]').change(function(e) {
                let voiceId = $(this).val();
                $('#voice').empty();
                if (voiceId !== ''){
                    let url = '{{route('student_get_master_voice')}}';
                    let data = {
                        '_token' : '{{csrf_token()}}',
                        'voiceId' : voiceId,
                    };

                    $.get(url,data,function (response) {
                        if (response.status == "success"){
                            if(response.voice.length > 0){
                                vId = response.voice.id;
                                let audio = $(
                                    '<label>Play Master Voice</label><audio controls ><source src="{{asset('uploads/master-enrollments').'/'}}'+response.voice.audio+'" type="audio/ogg"></audio>');
                                $('#voice').empty().append(
                                    audio
                                );
                            }
                        }
                    });
                }
            });
        });

        URL = window.URL || window.webkitURL;

        var gumStream; 						//stream from getUserMedia()
        var rec; 							//Recorder.js object
        var input; 							//MediaStreamAudioSourceNode we'll be recording

        // shim for AudioContext w;2hen it's not avb.
        var AudioContext = window.AudioContext || window.webkitAudioContext;
        var audioContext //audio context to help us record

        var recordButton = document.getElementById("recordButton");
        var stopButton = document.getElementById("stopButton");
        var pauseButton = document.getElementById("pauseButton");
        var wave = document.getElementById("audio-wave");

        //add events to those 2 buttons
        recordButton.addEventListener("click", startRecording);
        stopButton.addEventListener("click", stopRecording);
        pauseButton.addEventListener("click", pauseRecording);



        var startTime;
        var endTime;

        function startRecording(e) {
            e.preventDefault();

            if(mId ==''){
                alert('Please Select Master');
                return false;
            }

            if (alphabetId == '') {
                alert('Please Select alphabet');
                return false;
            }
            var time = new Date();
            startTime = time.getTime();

            console.log("recordButton clicked");

            /*
                Simple constraints object, for more advanced audio features see
                https://addpipe.com/blog/audio-constraints-getusermedia/
            */

            var constraints = { audio: true, video:false }

            /*
                Disable the record button until we get a success or fail from getUserMedia()
            */
            $('#at-wrapper').addClass('at-show-btns');
            $('#stopButton').removeClass("disabled");
            recordButton.disabled = true;
            stopButton.disabled = false;


            /*
                We're using the standard promise based getUserMedia()
                https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
            */

            navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
                console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

                /*
                    create an audio context after getUserMedia is called
                    sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
                    the sampleRate defaults to the one set in your OS for your playback device

                */
                audioContext = new AudioContext();

                //update the format
                // document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz"

                /*  assign to gumStream for later use  */
                gumStream = stream;

                /* use the stream */
                input = audioContext.createMediaStreamSource(stream);

                /*
                    Create the Recorder object and configure to record mono sound (1 channel)
                    Recording 2 channels  will double the file size
                */
                rec = new Recorder(input,{numChannels:1});

                //start the recording process
                rec.record();
                console.log("Recording started");

            }).catch(function(err) {
                //enable the record button if getUserMedia() fails
                recordButton.disabled = false;
                stopButton.disabled = true;

            });
        }
        //

        function pauseRecording() {
            console.log("pauseButton clicked rec.recording=", rec.recording);
            if (rec.recording) {
                //pause
                rec.stop();
                $('#at-wrapper').removeClass('at-show-btns');
                pauseButton.innerHTML = "Resume";
            } else {
                //resume
                rec.record();
                $('#at-wrapper').addClass('at-show-btns');
                pauseButton.innerHTML = "Pause";
            }
        }
        function stopRecording() {
            event.preventDefault();
            $('#at-wrapper').removeClass('at-show-btns');
            $('#stopButton').addClass("disabled");
            /* wave.style.display= "none"; */
            recordButton.style.display="inline-block";
            // stopButton.style.display="none";
            endTime = new Date().getTime();
            time = (endTime - startTime) / 1000;
            // if(time > 10 && time < 60){
            console.log("stopButton clicked");

            //disable the stop button, enable the record too allow for new recordings
            stopButton.disabled = true;
            recordButton.disabled = false;
            //reset button just in case the recording is stopped while paused


            //tell the recorder to stop the recording
            rec.stop();

            //stop microphone access
            gumStream.getAudioTracks()[0].stop();

            //create the wav blob and pass it on to createDownloadLink
            rec.exportWAV(createDownloadLink);
            // }
            // else {
            //     alert ("Duration Of Recording Must Be In 10 to 60 Seconds. ");
            //
            //     //tell the recorder to stop the recording
            //     rec.stop();
            //
            //     //stop microphone access
            //     gumStream.getAudioTracks()[0].stop();
            //     recordButton.disabled=false;
            //     event.preventDefault();
            //
            //
            // }

        }

        function createDownloadLink(blob) {

            var url = URL.createObjectURL(blob);
            var au = document.createElement('audio');
            var li = document.createElement('li');
            var link = document.createElement('a');

            //name of .wav file to use during upload and download (without extendion)
            var filename = new Date().toISOString();

            //add controls to the <audio> element
            au.controls = true;
            au.src = url;

            //save to disk link
            link.href = url;
            // link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
            // link.innerHTML = "Save to disk";

            //add the new audio element to li
            li.appendChild(au);

            //add the filename to the li
            // li.appendChild(document.createTextNode(filename+".wav "))

            //add the save to disk link to li
            li.appendChild(link);
            var token = $('meta[name=csrf-token]').attr("content");
            //upload link
            var upload = document.createElement('a');
            upload.href="#";
            upload.innerHTML ="<button type='button' class='upload-btn'  >Upload</button>";
            upload.addEventListener("click", function(event){
                var xhr=new XMLHttpRequest();
                xhr.onload=function(e) {
                    if(this.readyState === 4) {
                        if (e.target.responseText == 'success'){
                            window.location.replace('/student/all/voice-enrollment');
                        }
                        console.log("Server returned: ",e.target.responseText);
                    }
                };
                console.log('{{csrf_token()}}');
                var fd=new FormData();
                fd.append("audio_data",blob, filename);
                fd.append("_token",'{{csrf_token()}}');
                fd.append("master_id",mId);
                fd.append("voice_id",vId);
                fd.append("chapter_id",chapterId);
                fd.append("alphabet_id",alphabetId);
                xhr.open("POST","/student/store/voice-enrollment",true);
                xhr.send(fd);
            })
            li.appendChild(document.createTextNode (" "))//add a space in between
            li.appendChild(upload)//add the upload link to li

            //add the li element to the ol
            recordingsList.appendChild(li);
        }

        if (jQuery('#record-btn').length > 0) {
            jQuery('#record-btn').on('click', function () {
                jQuery('.wrapper').addClass('at-show-btns');
            })
        }

         if (jQuery('.stop-record').length > 0) {
            jQuery('.stop-record').on('click', function () {
                jQuery('.wrapper').removeClass('at-show-btns');
            })
        }
        var _at_ratedimageslider = jQuery('#at-ratedimageslider');
        if(_at_ratedimageslider.hasClass('at-ratedimageslider')){
            _at_ratedimageslider.owlCarousel({
                items: 2,
                nav:false,
                loop:true,
                margin: 20,
                center:true,
                dots: false,
                autoplay: false,
                responsiveClass:false,
                /* responsive:{
                    0:{
                        items:1,
                    },
                    568:{
                        items:1,
                    },
                    767:{
                        items:2,
                        margin: 30,

                    },
                    1000:{
                        items:3,
                        margin: 30,
                    },
                    1024:{
                        margin: 30,
                        items:2,
                    },
                    1280:{
                        margin: 30,
                        items:3,
                    },
                } */
            });
        }
    </script>
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>

@endsection
