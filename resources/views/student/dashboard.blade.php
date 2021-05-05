@extends('layouts.master')
@section('page-title')
    <title>User-dashboard</title>
@endsection
@section('style')
    <style>
        #canvas {
            position: fixed;
            left: 0;
            top: 0;
            width: 200px;
            height: 100px;
        }

        audio {
            position: fixed;
            left: 10px;
            bottom: -80px;
            width: calc(100% - 20px);
            opacity: 0.2;
            transition: all 0.5s;
        }

        .center {
            position: absolute;
            top: calc(50% - 10px);
            left: calc(50% - 20px);
        }

        .mic-cbx {
            transform: translate(0px, 0em);
            user-select: none;
            height: 12px;
        }

        .mic-cbx label {
            transform: translate(0px, -0.15em);
        }
        .at-sound{
            width: 100%;
            float: left;
        }
        .at-soundvawesholder{
            width: 100%;
            float: left;
        }
        .at-soundvawesholder canvas{
            width: 100%;
            float: left;
            height: 100px;
        }
    </style>
@endsection
@section('body')
    <div class="at-content at-masterrecordingholder">
        <div class="at-twocolume">
            <div class="at-recordingcontent">
                <div id="at-recordingslider" class=" at-recordingslider owl-carousel">
                    @if($alphabets)
                        @forelse($alphabets as $key => $alphabet)
                            <div class="item" id="alphabetsDiv">
                                <div class="at-recordinghead">
                                    <a href="javascript:void(0);" class="at-btnmenuvtwo">
                                        <img src="{{asset('assets/images/text-justify.svg')}}" alt="bar icon">`
                                    </a>
                                    <div class="at-userdetail">
                                        <figure class="at-recorderimg">
                                                <img src="{{  auth()->user()->line_image_status == 0   ?    asset('uploads/profile-pictures/'.auth()->user()->avatar) : auth()->user()->avatar}}" alt="user image">
                                        </figure>
                                        <a href="javascript: void(0);" class="at-btnediticons" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <div class="at-username">
                                            <h4>{{auth()->user()->name}}</h4>
                                            <span>{{App\Models\StudentEnrollment::getRecordingTime()}} min</span>
                                            <div class="at-btnheaarticon">
                                                <input type="checkbox" name="heart" id="hearticon" {{!empty(App\Models\StudentEnrollment::getStudentRecording($alphabet->id)) && App\Models\StudentEnrollment::getStudentRecording($alphabet->id)->is_master == 1 ? 'checked' : ''}}>
                                                <label for="hearticon"><i class="fas fa-heart"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="at-recordingheadrightarea">
                                        <div class="at-units">
                                            <span>{{!empty($ch) ? $ch->name : ''}} :</span>
                                            <em id="alphabetCountEm" data-value="{{count($alphabets) ? 1 : 0}}" data-total="{{count($alphabets)}}">{{$key+1}}</em>
                                            <em>/{{count($alphabets)}}</em>
                                        </div>
                                    </div>

                                </div>
                                <div class="at-recordingarea">
                                    <div class="at-recordingcontentvtwo">
                                        <figure id="item">
                                            <img data-id="{{$alphabet->id}}" src="{{asset('uploads/alphabets/'.$alphabet->alphabet)}}" alt="recording image">
                                        </figure>
                                    </div>
                                    <div class="at-ratedstar">
                                        <ul class="at-totalrattings">
                                            <li>
                                                <span class="at-stars" style="width: {{App\Models\Alphabet::checkRating($alphabet->id)}}px">
                                                    <span style="width: {{App\Models\Alphabet::checkRating($alphabet->id)}}px"></span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    @if(App\Models\StudentEnrollment::checkAvailability(auth()->user()->id,$alphabet->id) == "Not Recorded")
                                        <div class="at-notrecordcontent">
                                            <span id="notrecordcontent-{{$alphabet->id}}">{{__('thailand.no_record')}}</span>
                                        </div>
                                    @endif
                                    <div class="at-recordingvoic">
                                        <div class="at-audiosound">
                                            <div class="at-soundwaveimg" id="stableAudioBarDiv-{{$alphabet->id}}" style="display: none">

{{--                                                <img src="{{asset('assets/images/sound-wave.png')}}" alt="">--}}
                                            </div>
                                            <div class="at-sound" id="audioBarDiv-{{$alphabet->id}}" style="display:none;">
                                                {{--                                                <div class='sound-icon disabled'>--}}
                                                {{--                                                    <div class='sound-wave'>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                        <i class='bar'></i>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                                <div id="content" class="at-soundvawesholder">
                                                    <canvas id="canvas-{{$alphabet->id}}"></canvas>
                                                    <audio id="audio-{{$alphabet->id}}" controls></audio>
                                                </div>
                                            </div>
                                            <div class="at-progressbarholder" id="playAudioDiv-{{$alphabet->id}}" style="display:none;">

                                                @if(!empty(App\Models\StudentEnrollment::getStudentRecording($alphabet->id)))
                                                    <audio id="audioBar-{{$alphabet->id}}">
                                                        <source src="{{asset('uploads/student-enrollments/'.App\Models\StudentEnrollment::getStudentRecording($alphabet->id)->student_voice)}}" type="audio/mpeg">
                                                    </audio>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="at-btnrecodedarea">
                                            @if(App\Models\StudentEnrollment::checkAvailability(auth()->user()->id,$alphabet->id) == "Not Recorded")
                                                <span id="buttonId-{{$alphabet->id}}" class="at-btnrecorded at-bgwhite"></span>
                                            @elseif(App\Models\StudentEnrollment::checkAvailability(auth()->user()->id,$alphabet->id) == "Recorded")
                                                <span id="buttonId-{{$alphabet->id}}" class="at-btnrecorded at-bgorange"></span>
                                            @elseif(App\Models\StudentEnrollment::checkAvailability(auth()->user()->id,$alphabet->id) == "Rated")
                                                <span id="buttonId-{{$alphabet->id}}" class="at-btnrecorded at-bggreen"></span>
                                            @endif
                                            <em id="statustab-{{$alphabet->id}}">{{App\Models\StudentEnrollment::checkAvailability(auth()->user()->id,$alphabet->id)}}</em>
                                        </div>
                                    </div>
                                </div>
                                <div class="at-btnholder">
                                    <ul>
                                        <li>
                                            <button class="reloadButton"  id="reloadButton-{{$alphabet->id}}" data-index="{{$key}}" style="display: none">
                                                <img src="{{asset('assets/images/icons/reload.png')}}" alt="">
                                                <span>{{__('thailand.reload')}}</span>
                                            </button>
                                        </li>
                                        <li>

                                            <button class="recordButton" data-id="{{$alphabet->id}}" id="recordButton-{{$alphabet->id}}" {{empty(App\Models\StudentEnrollment::getStudentRecording($alphabet->id)) ? '' : 'disabled'}}>
                                                <img src="{{asset('assets/images/icons/recoding.png')}}" alt="">
                                                <span>{{__('thailand.recording')}}</span>
                                            </button>
                                        </li>
                                        <li>

                                            <button id="stopButton-{{$alphabet->id}}" class="stopButton" data-id="{{$alphabet->id}}" disabled>
                                                <img src="{{asset('assets/images/icons/recorded.png')}}" alt="">
                                                <span>{{__('thailand.stop')}}</span>
                                            </button>
                                        </li>
                                        <li>
                                            <button id="playButton-{{$alphabet->id}}" class="playButton" data-id="{{$alphabet->id}}" {{empty(App\Models\StudentEnrollment::getStudentRecording($alphabet->id)) ? 'disabled' : ''}} style="display: none">
                                                <img src="{{asset('assets/images/icons/play.png')}}" alt="">
                                                <span>{{__('thailand.play')}}</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
                <ol id="recordingsList" class="at-recordingslist" style="display:block;"></ol>

                {{--                <div class="at-btnsubmit">--}}
                {{--                    <a href="{{route('logout')}}" class="at-btn at-btnlogoutstudent">Logout</a>--}}
                {{--                </div>--}}
            </div>

            <div class="at-sidebarwidgetsvtwo">
                <div class="at-circlechartholder">
                    <div class="at-circlechart">
                        <div id="container"></div>
                        <div class="at-series">
                            <ul>
                                <li>
                                    <em class="at-bgwhite"></em>
                                    <span>{{__('thailand.unrecorded')}}</span>
                                </li>
                                <li>
                                    <em class="at-bgyellow"></em>
                                    <span>{{__('thailand.recorded')}}</span>
                                </li>
                                <li>
                                    <em class="at-bggreen"></em>
                                    <span>{{__('thailand.rated')}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="at-recordingstatus">
                    <ul>
                        <li>
{{--                            <a href="{{route('send_message_to_line user')}}">send message</a>--}}
                        </li>
                        @forelse($chapters as $chapter)
                            @php($recording = total_recordings($chapter->id))
                            <li class="{{$ch->id == $chapter->id ? 'at-bglight' : ""}}">
                                <a href="javascript:void(0);" class="chapterDetail" data-id="{{$chapter->id}}">
                                    <div class="at-statustitle">
                                        <div class="at-progressbarholder">
                                            <span>{{$recording.'/'.count($chapter->alphabets)}}</span>
                                            <em>{{$chapter->name}}</em>
                                            <div id="at-progresbarchart-{{$chapter->id}}" class="at-progresbarchart">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <form action="{{route('student_get_chapter_alphabets')}}" method="get" id="changeChapterForm">
                    <input type="hidden" name="chapter_id">
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade at-modaltheme" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="at-usereditprogileform">
                        <form class="at-formtheme at-signinform" action="{{route('student_update_profile')}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <fieldset>
                                <legend>edit your profile</legend>
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="at-inputwidthicon">
                                        <i class="icon-user-age"></i>
                                        <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                        <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="at-inputwidthicons at-uploaduserimg">
                                        <input type="file" name="image" id="at-selectfile" >
                                        <label for="at-selectfile">
                                            <i class="icon-upload"></i>
                                            <span>Drag and drop file here or click</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="at-btnholdervtwo">
                                    <button type="submit" class="at-btn">Submit</button>
                                    <a href="javascript:void(0);" class="at-btn at-btncancel" data-dismiss="modal">Cancel</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/peaks.js/0.21.0/peaks.min.js"
            integrity="sha512-VVtw9mxvrGZ0+bSM/knK9LikN9tfHVqAzEbaLl5D3x9zS10ioZNB4qac01ZsXY10/7w6uv4yIKDnLj9GWsmg5w=="
            crossorigin="anonymous"></script>
    <script>

        let chapters = {!! json_encode($chapterChartData,JSON_HEX_TAG) !!};
        $(document).ready(function(){

            let alphabetId = '{{$alphabets && $alphabets->isNotEmpty() ? $alphabets->first()->id : ''}}';
            let chapterId ;
            if('{{request('chapter_id')}}'){
                chapterId = '{{request('chapter_id')}}';
            }else{
                chapterId = '{{$chapters->isNotEmpty() ? $chapters->first()->id : ''}}';
            }
            console.log(chapterId);
            if(alphabetId !== '' && chapterId !== '') {
                // var owl = $('.owl-carousel').owlCarousel({
                //     loop: true,
                //     margin: 10,
                //     nav: true,
                //     items: 3
                // });
                //
                // owl.on('changed.owl.carousel', function (e) {
                //     var current = e.item.index;
                //     alphabetId = $(e.target).find(".owl-item").eq(current).find("img").data('id');
                // });

                URL = window.URL || window.webkitURL;

                var gumStream; 						//stream from getUserMedia()
                var rec; 							//Recorder.js object
                var input; 							//MediaStreamAudioSourceNode we'll be recording

                // shim for AudioContext w;2hen it's not avb.
                var AudioContext = window.AudioContext || window.webkitAudioContext;
                var audioContext //audio context to help us record

                // var recordButton = document.getElementsByClassName("recordButton");
                // var stopButton = document.getElementsByClassName("stopButton");
                // var pauseButton = document.getElementsByClassName("pauseButton");
                var wave = document.getElementById("audio-wave");
                let canvas = null;
                let audio = null;
                let WIDTH = null;
                let HEIGHT = null;
                let mouseX = 0;
                let mouseY = 0;
                let ctx = null;

                $(document).on('click','.recordButton',function (e) {
                    alphabetId = $(this).data('id');
                    canvas = document.getElementById("canvas-"+alphabetId);
                    audio = document.getElementById("audio-"+alphabetId);
                    WIDTH = (canvas.width = window.innerWidth);
                    HEIGHT = (canvas.height = window.innerHeight);

                    ctx = canvas.getContext("2d");

                    mouseX = 0;
                    mouseY = 0;

                    $("#audioBarDiv-"+alphabetId).css("display", "block");

                    startRecording(e);
                });
                function visualize(source) {
                    var context = new AudioContext();
                    var select = document.querySelector("select#mode");

                    var src = context.createMediaStreamSource(source);

                    console.log(src);
                    var analyser = context.createAnalyser();
                    var listen = context.createGain();

                    src.connect(listen);
                    listen.connect(analyser);

                    analyser.fftSize = 2 ** 12;
                    var frequencyBins = analyser.fftSize / 2;

                    var bufferLength = analyser.frequencyBinCount;
                    console.log(bufferLength);
                    let dataArray = new Uint8Array(bufferLength);
                    var dataHistory = [];

                    renderFrame();

                    function renderFrame() {
                        requestAnimationFrame(renderFrame);

                        analyser.smoothingTimeConstant = 0.5;


                        listen.gain.setValueAtTime(1, context.currentTime);

                        var WIDTH = (canvas.width = window.innerWidth);
                        var HEIGHT = (canvas.height = window.innerHeight);
                        var sliceWidth = WIDTH * 3.0 / bufferLength;

                        var x = 0;
                        var scale = Math.log(frequencyBins - 1) / WIDTH;

                        ctx.fillStyle = "#F8F8F8";
                        ctx.fillRect(0, 0, WIDTH, HEIGHT);

                        ctx.lineWidth = 1;
                        ctx.strokeStyle = "#000";
                        ctx.beginPath();
                        ctx.moveTo(mouseX, 0);
                        ctx.lineTo(mouseX, HEIGHT);
                        ctx.stroke();
                        ctx.closePath();

                        let mouseHz = -10 / Math.log((mouseX / WIDTH)) / (Math.log(441000 / 2 - 1) / WIDTH)


                        analyser.getByteFrequencyData(dataArray);
                        let start = 0 //dataArray.find(a=> Math.max.apply('',dataArray));
                        analyser.getByteTimeDomainData(dataArray);
                        ctx.lineWidth = 5;
                        ctx.strokeStyle = "#000";
                        ctx.beginPath();
                        x = 0;
                        for (var i = start; i < bufferLength; i++) {
                            var v = dataArray[i] / 128.0;
                            var y = v * HEIGHT / 2;

                            if (i === 0) {
                                ctx.moveTo(x, y);
                            } else {
                                ctx.lineTo(x, y);
                            }

                            x = i * sliceWidth //frequencyBins/analyser.sampleRate;
                        }
                        ctx.lineTo(WIDTH, dataArray[0] / 128.0 * HEIGHT / 2);
                        ctx.stroke();

                        ctx.textBaseline = "bottom";
                        ctx.textAlign = "left";
                        ctx.font = "16px Courier";
                        ctx.fillStyle = "white";
                        ctx.fillText(mouseHz + " Hz",
                            mouseX,
                            mouseY
                        );
                    }
                }

                $(document).on('click','.stopButton',function (e) {
                    alphabetId = $(this).data('id');
                    $('#reloadButton-'+alphabetId).css("display","block");
                    $('#playButton-'+alphabetId).css("display","block");
                    $("#stableAudioBarDiv-"+alphabetId).css("display", "block");
                    stopRecording(e);
                });
                $(document).on('click','.pauseButton',function (e) {
                    pauseRecording(e);
                });
                $(document).on('click','.reloadButton',function (e) {
                    let index = $(this).data('index');
                    console.log(index);
                    // var url = document.location.href+'?index='+index;
                    var url = new window.URL(document.location); // fx. http://host.com/endpoint?abc=123
                    url.searchParams.set("index", index);
                    document.location = url;
                });

                var startTime;
                var endTime;
                var time = 0;

                function startRecording(e) {
                    e.preventDefault();

                    // if(mId ==''){
                    //     alert('Please Select Master');
                    //     return false;
                    // }
                    //
                    // if (alphabetId == '') {
                    //     alert('Please Select alphabet');
                    //     return false;
                    // }
                    var time = new Date();
                    startTime = time.getTime();


                    /*
                        Simple constraints object, for more advanced audio features see
                        https://addpipe.com/blog/audio-constraints-getusermedia/
                    */

                    var constraints = {audio: true, video: false};

                    /*
                        Disable the record button until we get a success or fail from getUserMedia()
                    */
                    $('#at-wrapper').addClass('at-show-btns');
                    $('#stopButton-'+alphabetId).prop("disabled", false);
                    $("#audioBarDiv-"+alphabetId).css("display", "block");
                    $('#notrecordcontent-'+alphabetId).text('');

                    // recordButton.disabled = true;
                    // stopButton.disabled = false;


                    /*
                        We're using the standard promise based getUserMedia()
                        https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
                    */

                    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
                        console.log("getUserMedia() success, stream created, initializing Recorder.js ...");
                        visualize(stream);
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
                        rec = new Recorder(input, {numChannels: 1});

                        //start the recording process
                        rec.record();

                    }).catch(function (err) {
                        //enable the record button if getUserMedia() fails
                        // recordButton.disabled = false;
                        // stopButton.disabled = true;

                    });
                }

                //

                function pauseRecording() {
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
                    $('#stopButton-'+alphabetId).prop("disabled", true);
                    $('#recordButton-'+alphabetId).prop("disabled", true);

                    /* wave.style.display= "none"; */
                    $("#audioBarDiv-"+alphabetId).css("display", "none");
                    // recordButton.style.display = "inline-block";
                    // stopButton.style.display="none";
                    endTime = new Date().getTime();
                    time = (endTime - startTime) / 1000;
                    // if(time > 10 && time < 60){

                    //disable the stop button, enable the record too allow for new recordings
                    // stopButton.disabled = true;
                    // recordButton.disabled = false;
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

                $(document).on('click', '.at-sliderbtnnext , .at-sliderbtnprev', function (e) {
                    $('#uploadButton').click();
                    $('#recordingsList').empty();
                });

                function createDownloadLink(blob) {
                    const AudioContext = window.AudioContext || window.webkitAudioContext;
                    const audioContext = new AudioContext();
                    var url = URL.createObjectURL(blob);
                    var au = document.createElement('audio');
                    var li = document.createElement('li');
                    var link = document.createElement('a');

                    //name of .wav file to use during upload and download (without extendion)
                    var filename = new Date().toISOString();
                    var duration = au.duration;

                    //add controls to the <audio> element
                    au.controls = false;
                    au.src = url;
                    au.id = 'audioBar-'+alphabetId;

                    const options = {
                        containers: {
                            overview: document.getElementById('stableAudioBarDiv-'+alphabetId),
                        },
                        mediaElement: au,
                        webAudio: {
                            audioContext: audioContext
                        },
                        keyboard: true,
                        pointMarkerColor: '#006eb0'
                    };
                    peaks.init(options, function (err, peaks) {
                        if (err) {
                            console.error('Failed to initialize Peaks instance: ' + err.message);
                            return;
                        }
                        console.log('working fine');
                    });

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
                    upload.href = "#";
                    upload.innerHTML = "<button type='button' id='uploadButton' class='upload-btn' style='display: none' >Upload</button>";
                    upload.addEventListener("click", function (event) {
                        var xhr = new XMLHttpRequest();
                        xhr.onload = function (e) {
                            if (this.readyState === 4) {
                                if (e.target.responseText == 'success') {
                                    toastr.success("Alphabets Recorded successfully.", 'success!');

                                    $('#buttonId-' + alphabetId).removeClass('at-bgwhite');
                                    $('#notrecordcontent-'+alphabetId).text('');
                                    $('#statustab-'+alphabetId).html('');
                                    $('#statustab-'+alphabetId).html('Recorded');

                                    $('#playAudioDiv-'+alphabetId).append(au);
                                    // window.location.replace('/student/dashboard');
                                }if (e.target.responseText == 'already recorded error') {
                                    toastr.error("You have already recorded this.", 'error!');
                                }
                                console.log("Server returned: ", e.target.responseText);
                            }
                        };
                        console.log('{{csrf_token()}}',chapterId,alphabetId);
                        var fd = new FormData();
                        fd.append("audio_data", blob, filename);
                        fd.append("_token", '{{csrf_token()}}');
                        fd.append("chapter_id", chapterId);
                        fd.append("duration",time);
                        fd.append("alphabet_id", alphabetId);
                        xhr.open("POST", "/student/store/voice-enrollment", true);
                        xhr.send(fd);
                    });
                    li.appendChild(document.createTextNode(" "))//add a space in between
                    li.appendChild(upload)//add the upload link to li

                    //add the li element to the ol
                    recordingsList.appendChild(li);
                    $('#playButton-'+alphabetId).prop("disabled", false);
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

            }
            Highcharts.chart('container', {
                chart: {
                    width: 200,
                    height: 200,
                    backgroundColor: null,
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: '' ,
                    align: 'center',
                    verticalAlign: 'middle',
                    y:20
                },
                tooltip: {
                    pointFormat: '{series.name} <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: 50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: 100,
                        endAngle: 100,
                        center: ['50%', '50%'],
                        size: '100%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: '',
                    innerSize: '50%',
                    data: <?php print_r(json_encode($finalDataPieChart))?>,

                }]
            });

            $.each(chapters, function(index,value) {
                Highcharts.chart('at-progresbarchart-'+index, {
                    chart: {
                        height: 100,
                        type: 'bar'
                    },
                    title: {
                        text: 'Stacked bar chart'
                    },
                    xAxis: {
                        categories: ['']
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Total fruit consumption'
                        }
                    },
                    legend: {
                        reversed: true
                    },
                    plotOptions: {
                        series: {
                            stacking: 'normal'
                        }
                    },
                    series: value
                    //     [{
                    //     data: [3],
                    // }, {
                    //     data: [5]
                    // }, {
                    //     data: [5]
                    // }]
                });
            });

            $(document).on('click','.at-sliderbtnnext',function (e) {

                var num = Number($('#alphabetCountEm').text()) + 1;

                let total = $('#alphabetCountEm').data('total');

                if ( num <= total){
                    $('#alphabetCountEm').text(num);
                }

            });
            $(document).on('click','.at-sliderbtnprev',function (e) {
                var num = Number($('#alphabetCountEm').text()) - 1;

                if ( num > 0){
                    $('#alphabetCountEm').text(num);
                }
            });


            $(document).on('click','.chapterDetail',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('input[name="chapter_id"]').val(id);
                $('#changeChapterForm').submit();
            });
            $(document).on('click','.playButton',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                // $('#playAudioDiv-'+id).css('display','block');

                let audioplayer = document.getElementById('audioBar-'+id);

                // $("#stableAudioBarDiv-"+alphabetId).css("display", "none");
                // $('#audioBarDiv-'+id).css("display", "block");

                if (audioplayer.paused) {
                    audioplayer.play();
                }
                else {
                    audioplayer.pause();
                }
                $("audio").on("ended", function() {
                    $('#audioBarDiv-'+id).css("display", "none");
                    $("#stableAudioBarDiv-"+id).css("display", "block");
                });
            });
            if('{{request('index') && request('index') > 0}}'){
                console.log({{request('index')}});
                $("#at-recordingslider").trigger("to.owl.carousel", ['{{request('index')}}', true]);

            }else{
                $("#at-recordingslider").trigger("to.owl.carousel", ['{{$indexNumb}}', true]);
            }
        });  // Ready

    </script>
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
@endsection
