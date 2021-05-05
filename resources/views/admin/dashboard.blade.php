@extends('layouts.master')
@section('page-title')
    <title>admin-dashboard</title>
@endsection
@section('body')
    <div class="at-content at-dashboard">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.dashboard')}}</h2>
            </div>
        </div>
{{--        {{dd(app()->getLocale())}}--}}
        <div class="at-dashboardcontent">
            <div class="at-statsholder">
                <ul class="at-stats">
                    <li>
								<span class="at-stat">
									<em class="at-bglightblue">
										<i class="icon-master"></i>
									</em>
									<div class="at-statcontent">
										<h3>{{$recordings->count()}}</h3>
                                        <span class="eng-lang">{{__('thailand.user_recordings')}}</span>
									</div>
								</span>
                    </li>
                    <li>
								<span class="at-stat">
									<em class="at-bgblue">
										<i class="icon-student"></i>
									</em>
									<div class="at-statcontent">
										<h3>{{$users->count()}}</h3>
										<span class="eng-lang">{{__('thailand.user')}}</span>
									</div>
								</span>
                    </li>
                    <li>
								<span class="at-stat">
									<em class="at-bggreen">
										<i class="icon-master"></i>
									</em>
									<div class="at-statcontent">
										<h3>{{$averageRating}}</h3>
                                        <span class="eng-lang">{{__('thailand.average_rating')}}</span>
									</div>
								</span>
                    </li>
                    <li>
								<span class="at-stat">
									<em class="at-bgprange">
										<i class="icon-student"></i>
									</em>
									<div class="at-statcontent">
										<h3>{{$users->count()}}</h3>
                                        <span class="eng-lang">{{__('thailand.active_user')}}</span>
									</div>
								</span>
                    </li>
                </ul>
            </div>
            <div class="at-overviewchartholder">
                <div class="at-sectiontitlevtwo">
                    <h2 class="eng-lang">{{__('thailand.recording_overview')}}</h2>
                </div>
                {{--                <div class="at-dropdowntheme">--}}
                {{--                    <div class="dropdown show">--}}
                {{--                        <a class=" at-btndropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--                            <i class="icon-calendar-1"></i>	<span>Weekly</span> <i class="icon-down-arrow at-arrowicon"></i>--}}
                {{--                        </a>--}}
                {{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                {{--                            <a class="dropdown-item" href="#">Action</a>--}}
                {{--                            <a class="dropdown-item" href="#">Another action</a>--}}
                {{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="at-overviewchart">
                    <div id="container" class="at-conatiner"></div>
                </div>
            </div>
        </div>
        <div class="at-sidebarwidgets">
            <div class="at-sidebarwidget at-ratings">
                <div class="at-sectiontitlevtwo">
                    <h2>{{__('thailand.total_rating')}}<span>{{$rated}}/{{$recorded}}</span></h2>
                </div>
                <ul class="at-totalrattings">
                    <li>
								<span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
                                </span>
                        <div class="at-progress">
                            <div class="at-progressholder" style="width: {{$ratings['fifthStar']}}%"></div>
                        </div>
                        <em class="at-ratingparcentage">{{$ratings['fifthStar']}}%</em>
                    </li>
                    <li>
								<span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-colorgray">
									<i class="icon-star"></i>
                                </span>
                        <div class="at-progress">
                            <div class="at-progressholder" style="width: {{$ratings['fourthStar']}}%"></div>
                        </div>
                        <em class="at-ratingparcentage">{{$ratings['fourthStar']}}%</em>
                    </li>
                    <li>
								<span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
                                </span>
                         <div class="at-progress">
                            <div class="at-progressholder" style="width: {{$ratings['thirdStar']}}%"></div>
                        </div>
                        <em class="at-ratingparcentage">{{$ratings['thirdStar']}}%</em>
                    </li>
                    <li>
								<span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
                                </span>
                        <div class="at-progress">
                            <div class="at-progressholder" style="width: {{$ratings['secondStar']}}%"></div>
                        </div>
                        <em class="at-ratingparcentage">{{$ratings['secondStar']}}%</em>
                    </li>
                    <li>
								<span class="at-coloryellow">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
								</span>
                        <span  class="at-colorgray">
									<i class="icon-star"></i>
                                </span>
                        <div class="at-progress">
                            <div class="at-progressholder" style="width: {{$ratings['firstStar']}}%"></div>
                        </div>
                        <em class="at-ratingparcentage">{{$ratings['firstStar']}}%</em>
                    </li>
                    <li>
                        <span class="at-unrate eng-lang">{{__('thailand.unrated')}}</span>
                        <div class="at-progress">
                            <div class="at-progressholder" style="width: {{$ratings['unrated']}}%"></div>
                        </div>
                        <em class="at-ratingparcentage at-unrated">{{$ratings['unrated']}}%</em>
                    </li>
                </ul>
            </div>
            <div class="at-sidebarwidget at-toprecordingsholder">
                <div class="at-sectiontitlevtwo">
                    <h2>{{__('thailand.top_recording')}}</h2>
                </div>
                <ul class="at-toprecordings">
                    @forelse($top5Recordings as $recording)
                        <li>
                            <span class="at-recorder">{{$recording->student->name}} {{__('thailand.recording')}}</span>
                            <em><img src="{{asset('uploads/alphabets/'.$recording->alphabet->alphabet)}}" alt="alphabets image"></em>
                            <span class="at-recorderpercantage at-colorgreen">{{$recording->rating}}</span>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                xAxis: {
                    categories: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN']
                },

                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        grouping: true,
                        borderRadiusTopLeft: 20,
                        borderRadiusTopRight: 20
                    }
                },
                series: <?php print_r(json_encode($chartData)) ?>
            });
        });
    </script>
@endsection
