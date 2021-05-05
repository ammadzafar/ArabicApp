@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Rater List</title>
@endsection
@section('body')
    <div class="at-content at-masters">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.raters')}} <span>({{$raters->count()}})</span></h2>
            </div>
            <div class="at-sectionheadrightarea">
{{--                <a href="javascript:void(0);" class="at-btndelete"><i class="icon-delete"></i></a>--}}
{{--                <form class="at-formtheme at-searchform">--}}
{{--                    <fieldset>--}}
{{--                        <div class="form-group">--}}
{{--                            <a href="javascript:void(0);" class="at-searchicon">--}}
{{--                                <i class="icon-search"></i>--}}
{{--                            </a>--}}
{{--                            <input type="text" name="search" placeholder="Search...">--}}
{{--                        </div>--}}
{{--                    </fieldset>--}}
{{--                </form>--}}
                <a href="javascript: void(0);" class="at-btn at-btncreat" data-toggle="modal" data-target="#registerRater">{{__('thailand.create')}}</a>
            </div>
        </div>
        <div class="at-mastercontent">
            <form class="at-formtheme">
                <fieldset>
                    <div class="form-group">
                        <table class="at-tabletheme at-table">
                            <thead>
                            <tr>
                                <th><span> Sr. </span></th>
                                <th><span> {{__('thailand.name')}} </span></th>
                                <th><span> {{__('thailand.email')}} </span></th>
{{--                                <th><span> ID </span></th>--}}
                                <th><span> {{__('thailand.age')}} </span></th>
                                <th><span> {{__('thailand.gender')}} </span></th>
                                <th><span> {{__('thailand.nationality')}} </span></th>
                                <th><span> {{__('thailand.action')}} </span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($raters as $key => $rater)
                                <tr class="{{$loop->odd ? 'at-bggray' : ''}}" id="rater-{{$rater->id}}">
                                    <td>
                                        <div class="at-checkbox">
{{--                                            <input type="checkbox" id="at-checkbox0">--}}
                                            <label for="at-checkbox0">{{$key+1}}</label>
                                        </div>
                                    </td>
                                    <td>{{$rater->name}}</td>
                                    <td>{{$rater->email}}</td>
{{--                                    <td>{{$rater->logIn_id}}</td>--}}
                                    <td>{{$rater->age}}</td>
                                    <td>{{$rater->gender}}</td>
                                    <td>{{$rater->nationality}}</td>
                                    <td>
                                        <a href="javascript: void(0);" class="at-btnedit editRaterButton" data-id="{{$rater->id}}"><i class="icon-edit"></i></a>
                                        <a href="javascript: void(0);" class="at-btndelete deleteRaterClass" data-id="{{$rater->id}}"><i class="icon-delete"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!--************************************
			Modal Start
	*************************************-->
    <div class="modal fade at-modaltheme at-creatstudentmodal" id="registerRater" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('thailand.create_rater')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-cancel"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="at-modalform">
                        <form class="at-formtheme" method="post" action="{{route('admin_create_rater')}}" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <div class="at-inputwidthfifty">
                                        <label>{{__('thailand.name')}}</label>
                                        <input type="text" name="name" value="{{old('name')}}" required>
                                        @error('name') <div class="text-danger">{{$message}}</div>@enderror

                                    </div>
                                    <div class="at-inputwidthfifty at-floatright">
                                        <label>{{__('thailand.email_address')}}</label>
                                        <input type="email" name="email" value="{{old('email')}}" required>
                                        @error('email') <div class="text-danger">{{$message}}</div>@enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="at-inputwidthfifty">
                                        <label>{{__('thailand.gender')}}</label>
                                        <select class="at-selecttheme" name="gender" required>
                                            <option value="Boy" {{old('gender') == 'Boy' ? 'selected' : ''}}>Boy</option>
                                            <option value="Girl" {{old('gender') == 'Girl' ? 'selected' : ''}}>Girl</option>
                                            <option value="Man" {{old('gender') == 'Man' ? 'selected' : ''}}>Man</option>
                                            <option value="Women" {{old('gender') == 'Women' ? 'selected' : ''}}>Women</option>
                                            <option value="Other" {{old('gender') == 'Other' ? 'selected' : ''}}>Other</option>
                                        </select>
                                        @error('gender') <div class="text-danger">{{$message}}</div>@enderror

                                    </div>
                                    <div class="at-inputwidthfifty at-floatright">
                                        <label>{{__('thailand.age')}}</label>
                                        <div class="at-inputwidthicon">
                                            <i class="icon-calendar"></i>
                                            <input type="number" name="age" value="{{old('age')}}" required>
                                            @error('age') <div class="text-danger">{{$message}}</div>@enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{__('thailand.nationality')}}</label>
                                    <select name="nationality" id="country" class="at-selecttheme" required>
                                        <option value="">{{__('thailand.select_country')}}</option>
                                        <optgroup id="country-optgroup-Asia" label="-select-">
                                            <option value="Bangladesh" {{old('nationality') == 'Bangladesh' ? 'selected' : ''}}>Bangladesh</option>
                                            <option value="Brunei" {{old('nationality') == 'Brunei' ? 'selected' : ''}}>Brunei</option>
                                            <option value="Indonesia" {{old('nationality') == 'Indonesia' ? 'selected' : ''}}>Indonesia</option>
                                            <option value="Malaysia" {{old('nationality') == 'Malaysia' ? 'selected' : ''}}>Malaysia</option>
                                            <option value="Myanmar [Burma]" {{old('nationality') == 'Myanmar [Burma]' ? 'selected' : ''}}>Myanmar [Burma]</option>
                                            <option value="Pakistan" {{old('nationality') == 'Pakistan' ? 'selected' : ''}}>Pakistan</option>
                                            <option value="Thailand" {{old('nationality') == 'Thailand' ? 'selected' : ''}}>Thailand</option>
                                        </optgroup>
                                    </select>
                                    @error('nationality') <div class="text-danger">{{$message}}</div>@enderror

                                </div>
                                <button type="submit" class="at-btn at-btnsave">
                                    {{__('thailand.send_invite')}}
                                </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade at-modaltheme at-creatstudentmodal" id="editRater" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('thailand.edit_rater')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-cancel"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="at-modalform">
                        <form class="at-formtheme" method="post" action="{{route('admin_update_user')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="form-group">
                                    <div class="at-inputwidthfifty">
                                        <label>{{__('thailand.name')}}</label>
                                        <input type="hidden" name="type" value="2">
                                        <input type="hidden" name="edit_id" value="">
                                        <input type="text" name="edit_name" value="" required>
                                        @error('edit_name') <div class="text-danger">{{$message}}</div>@enderror

                                    </div>
                                    <div class="at-inputwidthfifty at-floatright">
                                        <label>{{__('thailand.email_address')}}</label>
                                        <input type="email" name="edit_email" disabled>
                                        @error('edit_email') <div class="text-danger">{{$message}}</div>@enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="at-inputwidthfifty">
                                        <label>{{__('thailand.gender')}}</label>
                                        <select class="at-selecttheme" name="edit_gender" required>
                                            <option value="Boy" >Boy</option>
                                            <option value="Girl">Girl</option>
                                            <option value="Man">Man</option>
                                            <option value="Women">Women</option>
                                            <option value="Other" >Other</option>
                                        </select>
                                        @error('edit_gender') <div class="text-danger">{{$message}}</div>@enderror

                                    </div>
                                    <div class="at-inputwidthfifty at-floatright">
                                        <label>{{__('thailand.age')}}</label>
                                        <div class="at-inputwidthicon">
                                            <i class="icon-calendar"></i>
                                            <input type="number" name="edit_age" value="" required>
                                            @error('edit_age') <div class="text-danger">{{$message}}</div>@enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{__('thailand.nationality')}}</label>
                                    <select name="edit_nationality" id="country" class="at-selecttheme" required>
                                        <option value="">{{__('thailand.select_country')}}</option>
                                        <optgroup id="country-optgroup-Asia" label="-select-">
                                            <option value="Bangladesh" {{old('nationality') == 'Bangladesh' ? 'selected' : ''}}>Bangladesh</option>
                                            <option value="Brunei" {{old('nationality') == 'Brunei' ? 'selected' : ''}}>Brunei</option>
                                            <option value="Indonesia" {{old('nationality') == 'Indonesia' ? 'selected' : ''}}>Indonesia</option>
                                            <option value="Malaysia" {{old('nationality') == 'Malaysia' ? 'selected' : ''}}>Malaysia</option>
                                            <option value="Myanmar [Burma]" {{old('nationality') == 'Myanmar [Burma]' ? 'selected' : ''}}>Myanmar [Burma]</option>
                                            <option value="Pakistan" {{old('nationality') == 'Pakistan' ? 'selected' : ''}}>Pakistan</option>
                                            <option value="Thailand" {{old('nationality') == 'Thailand' ? 'selected' : ''}}>Thailand</option>
                                        </optgroup>
                                    </select>
                                    @error('edit_nationality') <div class="text-danger">{{$message}}</div>@enderror

                                </div>
                                <button type="submit" class="at-btn at-btnsave">
                                    {{__('thailand.update')}}
                                </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade at-modaltheme at-chapterdeletemodal" id="deleteRaterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-cancel"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <figure class="at-erorimage">
                        <img src="{{asset('assets/images/error.png')}}" alt="error image">
                    </figure>
                    <h2>{{__('thailand.sure_delete')}}?</h2>
                    <div class="at- btnholder">
                        <a href="javascript: void(0);" class="at-btn at-btndeleted" data-id="" id="deleteRaterButton">{{__('thailand.delete')}}</a>
                        <a href="javascript:void(0);" class="at-btn at-btncancel" data-dismiss="modal">{{__('thailand.cancel')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--************************************
            Modal End
    *************************************-->
@endsection
@section('scripts')
    <script>
        @if (count($errors) > 0)
        $('#registerRater').modal('show');
        @endif

        $(document).ready(function () {
            $(document).on('click','.deleteRaterClass',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#deleteRaterButton').data('id',id); //setter
                $('#deleteRaterModal').modal('show');
            });
            $(document).on('click','#deleteRaterButton',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let url = '{{route('admin_delete_rater')}}';
                let data = {
                    '_token' : '{{csrf_token()}}',
                    'id' : id,
                };

                $.post(url,data,function (response) {
                    if (response.status === 'success'){
                        $('#deleteRaterModal').modal('hide');
                        toastr.success(response.message, 'success!');
                        $('#rater-'+response.rater).remove();

                    }
                });

            });
            $(document).on('click','.editRaterButton',function (e) {
                let  id = $(this).data('id');
                let url = '{{route('admin_get_rater_detail')}}';
                let data = {
                    'id' : id
                };
                $.get(url,data,function (response) {
                    if(response.status === "success"){
                        $("input[name='edit_id']").val(response.rater.id);
                        $("input[name='edit_name']").val(response.rater.name);
                        $("input[name='edit_email']").val(response.rater.email);
                        $("input[name='edit_age']").val(response.rater.age);
                        let gender = response.rater.gender;
                        let nationality = response.rater.nationality;
                        $('select[name="edit_gender"]').find('option[value="'+gender+'"]').attr("selected",true);
                        $('select[name="edit_nationality"]').find('option[value="'+nationality+'"]').attr("selected",true);

                        // $('select[name='edit_nationality'] option').filter(function() {
                        //     return ($(this).text() == 'Blue'); //To select Blue
                        // }).prop('selected', true);

                        $('#editRater').modal('show');
                    }
                });




            });

        });
    </script>

@endsection
