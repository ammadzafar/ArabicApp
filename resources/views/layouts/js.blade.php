<script src="{{asset('assets/js/vendor/jquery-library.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.jplayer.min.js')}}"></script>
{{--<script src="{{asset('assets/js/peaks.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/standalone.peaks.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/require.js')}}" data-main="app.js"></script>--}}
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/themefunction.js')}}"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
    toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}", 'Success', {timeOut: 3000});

    @endif

    @if(\Illuminate\Support\Facades\Session::has('error'))
    toastr.error('{{\Illuminate\Support\Facades\Session::get('error')}}', 'error', {timeOut: 3000});
    @endif

</script>


