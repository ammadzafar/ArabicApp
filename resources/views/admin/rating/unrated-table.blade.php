<table class="table">
    <thead>
    <tr>
        <th>Sr</th>
        <th>Master</th>
        <th>Student</th>
        <th>Alphabet</th>
        <th>Master Audio</th>
        <th>Student Audio</th>
        <th>Rating</th>
    </tr>
    </thead>
    <tbody>
    @forelse($recordings as $key => $recording)
        <tr id="user{{$recording->id}}">
            <td data-title="Sr">{{$key+1}}</td>
            <td data-title="Master">{{$recording->master ? $recording->master->name : 'N/A'}}</td>
            <td data-title="Student">{{$recording->student ? $recording->student->name : 'N/A'}}</td>
            <td data-title="Alphabet"><figure><img src="{{$recording->masterVoice && $recording->masterVoice->alphabet ? asset('uploads/alphabets/'.$recording->masterVoice->alphabet->alphabet) : 'N/A'}}"></figure></td>
            <td data-title="Master Audio">
                <audio controls>
                    <source src="{{$recording->masterVoice ? asset('uploads/master-enrollments/'.$recording->masterVoice->audio) : 'N/A'}}" type="audio/ogg">
                </audio>
            </td>
            <td data-title="Student Audio">
                <audio controls>
                    <source src="{{asset('uploads/student-enrollments/'.$recording->student_voice)}}" type="audio/mpeg">
                </audio>
            </td>
            <td data-title="Rating">
            <div class="at-ratingbox">
                   <!--  <fieldset class="rating">
                        <input class="timing-selectinput ratingRecording" type="radio" id="star1half" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="1.5"  />
                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star1-{{$recording->id}}" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="1" />
                        <label class = "full" for="star1-{{$recording->id}}" title="poor - 1 star"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star2half" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="2.5"  />
                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star2-{{$recording->id}}" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="2"  />
                        <label class = "full" for="star2-{{$recording->id}}" title="Kinda bad - 2 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star3half" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="3.5"  />
                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star3-{{$recording->id}}" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="3"  />
                        <label class = "full" for="star3-{{$recording->id}}" title="Meh - 3 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star4-{{$recording->id}}" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="4"  />
                        <label class = "full" for="star4-{{$recording->id}}" title="Pretty good - 4 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star5-{{$recording->id}}" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="5"  />
                        <label class = "full" for="star5-{{$recording->id}}" title="Awesome - 5 stars"></label>

                        <input class="timing-selectinput ratingRecording" type="radio" id="star4half" name="ratingRecording-{{$recording->id}}" data-recordingId="{{$recording->id}}" value="4.5"  />
                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

                    </fieldset> -->
                   <!--  <fieldset class="rating">
                        <input class="timing-selectinput ratingRecording" type="radio" id="star5-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="5" />
                        <label class = "full" for="star5-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Awesome - 5 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star4half-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="4.5" />
                        <label class="half" for="star4half-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Pretty good - 4.5 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star4-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="4" />
                        <label class = "full" for="star4-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Pretty good - 4 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star3half-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="3.5" />
                        <label class="half" for="star3half-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Meh - 3.5 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star3-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="3" />
                        <label class = "full" for="star3-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Meh - 3 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star2half-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="2.5" />
                        <label class="half" for="star2half-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Kinda bad - 2.5 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star2-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="2" />
                        <label class = "full" for="star2-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Kinda bad - 2 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star1half-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="1.5" />
                        <label class="half" for="star1half-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Meh - 1.5 stars"></label>
                        <input class="timing-selectinput ratingRecording" type="radio" id="star1-{{$recording->id}}" data-recordingId="{{$recording->id}}" name="timing" value="1" />
                        <label class = "full" for="star1-{{$recording->id}}" data-recordingId="{{$recording->id}}" title="Sucks big time - 1 star"></label>
                    </fieldset> -->
                    <a class="at-btnviews ratingModel"  href="javascript:void(0);" data-toggle="modal" data-target="#at-unratedmodal-{{$recording->id}}"><i class="fa fa-star"></i></a>
                        <div class="at-thememodal at-unratedmodal modal fade" id="at-unratedmodal-{{$recording->id}}" tabindex="-1" role="dialog" aria-labelledby="at-unratedmodal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="icon-cancel-1"></i>
                                        </button>
                                        <form id="{{$recording->id}}" class="at-formtheme at-unratedform" method="post" action="{{route('admin_rating_recording',$recording->id)}}">
                                            @csrf
                                            <fieldset>
                                                <div class="form-group">
                                                    <ul class="at-ratinglist">
                                                        <li>
                                                            <label class="at-ratingtitle">Rating</label>
                                                            <div class="at-ratingbox">
                                                                <fieldset class="rating">
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star15{{$recording->id}}" value="5"><label class="full" for="avg-star15{{$recording->id}}" title="Awesome - 5 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star13half{{$recording->id}}" value="4.5"><label class="half" for="avg-star13half{{$recording->id}}" title="Pretty good - 4.5 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star14{{$recording->id}}" value="4"><label class="full" for="avg-star14{{$recording->id}}" title="Pretty good - 4 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star12half{{$recording->id}}" value="3.5"><label class="half" for="avg-star12half{{$recording->id}}" title="Meh - 3.5 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star13{{$recording->id}}" value="3"><label class="full" for="avg-star13{{$recording->id}}" title="Meh - 3 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star11half{{$recording->id}}" value="2.5"><label class="half" for="avg-star11half{{$recording->id}}" title="Kinda bad - 2.5 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star12{{$recording->id}}" value="2"><label class="full" for="avg-star12{{$recording->id}}" title="Kinda bad - 2 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star10half{{$recording->id}}" value="1.5"><label class="half" for="avg-star10half{{$recording->id}}" title="Meh - 1.5 stars"></label>
                                                                    <input type="radio" class="ratingRadio" name="rating" id="avg-star11{{$recording->id}}" value="1"><label class="full" for="avg-star11{{$recording->id}}" title="Sucks big time - 1 star"></label>
                                                                </fieldset>
                                                                <!-- <label for="" id="average-rating"></label> -->
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <label>Comments:</label>
                                                    <textarea type="text" name="comment" class="form-control" required="required"> </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" data-id="{{$recording->id}}" class="at-btn ratingSubmit"><i class="fa fa-check"></i>Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
<!--************************************
        Unrated Modal Start
*************************************-->
<!--************************************
        Unrated Modal End
*************************************-->
