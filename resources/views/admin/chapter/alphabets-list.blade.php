<div class="at-selectchapter">
    <ul class="at-chapters" id="chapterListDiv">
        @forelse($alphabets as $alphabet)
            <li id="div-{{$alphabet->id}}">
                <div class="at-chapterholder">
                    <div class="rt-chapter">
                        <span class="at-checkbox">
                            <input type="checkbox" class="checkboxes" value="{{$alphabet->id}}" id="checkbox-{{$alphabet->id}}">
                            <label for="checkbox-{{$alphabet->id}}"></label>
                        </span>
                        <a href="javascript: void(0);" class="at-btnedit">
                            <i class="icon-edit"></i>
                        </a>
                        <div class="at-chapteredit">
                            <figure>
                                <img src="{{asset('uploads/alphabets/'.$alphabet->alphabet)}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </li>
        @empty
        @endforelse
    </ul>
</div>
