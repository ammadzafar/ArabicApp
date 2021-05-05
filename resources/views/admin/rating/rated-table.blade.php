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
        <tr id="user-3">
            <td data-title="Sr">{{$key+1}} </td>
            <td data-title="Master">{{$recording->master ? $recording->master->name : 'N/A'}}</td>
            <td data-title="Student">{{$recording->student ? $recording->student->name : 'N/A'}}</td>
            <td data-title="Alphabet"><figure><img src="{{$recording->masterVoice && $recording->masterVoice->alphabet ? asset('uploads/alphabets/'.$recording->masterVoice->alphabet->alphabet) : 'N/A'}}"></figure> </td>
            <td data-title="Master Audio">
                <audio controls>
                    <source src="{{$recording->masterVoice ? asset('uploads/master-enrollments/'.$recording->masterVoice->audio) : 'N/A' }}" type="audio/ogg">
                </audio>
            </td>
            <td data-title="Student Audio">
                <audio controls>
                    <source src="{{asset('uploads/student-enrollments/'.$recording->student_voice)}}" type="audio/mpeg">
                </audio>
            </td>
            <td data-title="Rating">
                <div class="at-ratingbox">
                    <fieldset class="rating">
                        <input class="timing-selectinput" type="radio" id="star5-{{$recording->id}}" name="timing-{{$recording->id}}" value="5" {{$recording->rating == 5 ? 'checked' : ''}} />
                        <label class = "full" for="star5-{{$recording->id}}" title="Awesome - 5 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star4half-{{$recording->id}}" name="timing-{{$recording->id}}" value="4.5" {{$recording->rating == 4.5 ? 'checked' : ''}} />
                        <label class="half" for="star4half-{{$recording->id}}" title="Pretty good - 4.5 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star4-{{$recording->id}}" name="timing-{{$recording->id}}" value="4" {{$recording->rating == 4 ? 'checked' : ''}} />
                        <label class = "full" for="star4-{{$recording->id}}" title="Pretty good - 4 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star3half-{{$recording->id}}" name="timing-{{$recording->id}}" value="3.5" {{$recording->rating == 3.5 ? 'checked' : ''}} />
                        <label class="half" for="star3half-{{$recording->id}}" title="Meh - 3.5 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star3-{{$recording->id}}" name="timing-{{$recording->id}}" value="3" {{$recording->rating == 3 ? 'checked' : ''}} />
                        <label class = "full" for="star3-{{$recording->id}}" title="Meh - 3 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star2half-{{$recording->id}}" name="timing-{{$recording->id}}" value="2.5" {{$recording->rating == 2.5 ? 'checked' : ''}} />
                        <label class="half" for="star2half-{{$recording->id}}" title="Kinda bad - 2.5 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star2-{{$recording->id}}" name="timing-{{$recording->id}}" value="2" {{$recording->rating == 2 ? 'checked' : ''}} />
                        <label class = "full" for="star2-{{$recording->id}}" title="Kinda bad - 2 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star1half-{{$recording->id}}" name="timing-{{$recording->id}}" value="1.5" {{$recording->rating == 1.5 ? 'checked' : ''}} />
                        <label class="half" for="star1half-{{$recording->id}}" title="Meh - 1.5 stars"></label>
                        <input class="timing-selectinput" type="radio" id="star1-{{$recording->id}}" name="timing-{{$recording->id}}" value="1" {{$recording->rating == 1 ? 'checked' : ''}} />
                        <label class = "full" for="star1-{{$recording->id}}" title="Sucks big time - 1 star"></label>
                    </fieldset>
                </div>
            </td>
        </tr>
    @empty
    @endforelse
    </tbody>
</table>
