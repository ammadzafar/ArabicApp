

{{--{{dd($firstRecordingRules)}}--}}

<div class="particular">
    @foreach($alpha_rules as $rule)
        <div class="at-rule append-rules">
            <span class="at-rulename">{{$rule->name}}</span>
            <div class="at-rulecontent {{$rule->name}}">
                <input type="radio" class="ruleRadio" id="star10-{{$rule->id}}" data-id="{{$rule->id}}" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 5 ? 'checked' : ''}}--}} name="{{$rule->id}}" value="5" /><label class = "full" for="star10-{{$rule->id}}" ></label>
                <input type="radio" class="ruleRadio" id="star9-{{$rule->id}}" data-id="{{$rule->id}}" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 4 ? 'checked' : ''}}--}} name="{{$rule->id}}" value="4" /><label class = "full" for="star9-{{$rule->id}}" ></label>
                <input type="radio" class="ruleRadio" id="star8-{{$rule->id}}" data-id="{{$rule->id}}" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 3 ? 'checked' : ''}}--}} name="{{$rule->id}}" value="3" /><label class = "full" for="star8-{{$rule->id}}" ></label>
                <input type="radio" class="ruleRadio" id="star7-{{$rule->id}}" data-id="{{$rule->id}}" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 2 ? 'checked' : ''}}--}} name="{{$rule->id}}" value="2" /><label class = "full" for="star7-{{$rule->id}}" ></label>
                <input type="radio" class="ruleRadio" id="star6-{{$rule->id}}" data-id="{{$rule->id}}" {{--{{array_key_exists($rule->name,$firstRecordingRules) &&  $firstRecordingRules[$rule->name] == 1 ? 'checked' : ''}}--}} name="{{$rule->id}}" value="1" /><label class = "full" for="star6-{{$rule->id}}" ></label>
            </div>
        </div>
    @endforeach
</div>
<div class="form-group at-selectrule at-rateraddrules">
    <span class="at-addraterrule">Add Rules</span>
    <select class="js-example-basic-multiple multvalues" name="states[]" multiple="multiple">
        @php
            $array=[];
            foreach($alpha_rules as $item){
                $array[]=$item->id;
            }
        @endphp
        @foreach($rules as $rule)
            <option value="{{$rule->id}}" data-value="{{$rule->name}}" data-id="{{$rule->id}}" {{ in_array($rule->id,$array)?'selected':'' }}>{{ $rule->name }}</option>
        @endforeach
    </select>
</div>
<button class="at-btn float-right rt-btnubmitrule rulebtn" type="button">Submit</button>






