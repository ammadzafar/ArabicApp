@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Unrated Recording</title>
@endsection
@section('body')
    <div class="at-masterlist at-unratedrecording">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Unrated Recording</h2>

                <form method="get" action="{{route('admin_unRated_recording')}}" id="masterFilterForm" class="at-formtheme at-selectallform">
                    <fieldset>
                        <span class="at-select">
                            <select class="fselect" name="masterFilter" required id="masterFilter" >
                                <option value="" >All Masters</option>

                                @if($masters)
                                    @forelse($masters as $master)
                                        <option value="{{$master->id}}" {{request()->masterFilter == $master->id ? 'selected' : ''}}>{{$master->name}}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                        </span>
                        <span class="at-select">
                            <select class="fselect" name="studentFilter" required id="studentFilter" >
                                <option value=" ">All Students</option>
                                @if($students)
                                    @forelse($students as $student)
                                        <option value="{{$student->id}}" {{request()->studentFilter == $student->id ? 'selected' : ''}}>{{$student->name}}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                        </span>
                    </fieldset>
                </form>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive" id="unRatedTable">
                    @include('admin.rating.unrated-table')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let rating = '';
        $(document).ready(function () {
            {{--if("{{\Illuminate\Support\Facades\Session::has('ratingError')}}") {--}}
            {{--    let id = "{{\Illuminate\Support\Facades\Session::get('ratingError')}}";--}}
            {{--        $('#at-unratedmodal-'+id).modal('show');--}}
            {{--}--}}

            // function isEmpty(val){
            //     return (val === undefined || val == null || val.length <= 0) ? false : true  ;
            // }

            $(document).on('click','.ratingSubmit',function(e){
                e.preventDefault();
                let id = $(this).attr('data-id');
                 let form = $('#'+id);

                 let rate = $("#"+id+' .ratingRadio:checked').val();
                 let comment = form.find('textarea[name="comment"]').val();

                let url = '{{route('admin_rating_recording','id')}}';
                url = url.replace('id',id);
                let data = {
                    '_token' : "{{csrf_token()}}",
                    'rating' : rate,
                    'comment' : comment,

                };

                $.post(url,data,function (response) {
                    if(response.status == 'success'){
                        location.reload();
                        toastr.success(response.message, 'Success!');

                    }else{
                        toastr.error(response.message, 'error!');
                    }
                })

            });

            $("select[name=masterFilter]").on('change',function(){
                $("#masterFilterForm").submit();
            });

            $("select[name=studentFilter]").on('change',function(){
                let studentId  = $(this).val();
                $("#masterFilterForm").submit();
            });
        });
    </script>
@endsection
