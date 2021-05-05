@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Rated Recording</title>
@endsection
@section('body')
    <div class="at-masterlist at-masterrating">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Rated Recording</h2>
                <form method="get" action="{{route('admin_rated_recording')}}" id="masterFilterForm" class="at-formtheme at-selectallform">
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
                <div class="table-responsive" id="ratedTable">
                    @include('admin.rating.rated-table')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

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
