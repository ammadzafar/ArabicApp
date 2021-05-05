@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | User list</title>
@endsection
@section('body')
    <div class="at-content at-masters at-students">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.user')}} <span>({{count($students)}})</span></h2>
            </div>
            <div class="at-sectionheadrightarea">
                <a href="javascript: void(0);" class="at-btn at-btncreat" data-toggle="modal" data-target="#registerUser">{{__('thailand.create')}}</a>
            </div>
        </div>
        <div class="at-mastercontent">
                <fieldset>
                    <div class="form-group">
                        <form class="at-formtheme" method="get" action="{{route('admin_create_user')}}">

                        <div class="at-findstudenholder">
                            <div class="at-findstudent">
                                <ul class="at-studentdata">
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.name')}}</label>
                                            <input type="text" name="name" value="{{request('name')}}" placeholder="{{__('thailand.search')}}">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.gender')}}</label>
                                            <select class="at-selecttheme" name="gender">
                                                <option value=" ">-{{__('thailand.select')}}-</option>
                                                <option value="Boy" {{request('gender') == 'Boy' ? 'selected' : ''}}>Boy</option>
                                                <option value="Girl" {{request('gender') == 'Girl' ? 'selected' : ''}}>Girl</option>
                                                <option value="Man" {{request('gender') == 'Man' ? 'selected' : ''}}>Man</option>
                                                <option value="Women" {{request('gender') == 'Women' ? 'selected' : ''}}>Women</option>
                                                <option value="Other" {{request('gender') == 'Other' ? 'selected' : ''}}>Other</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.age')}}</label>
                                            <div class="at-inputwidthfifty">
                                                <input type="text" name="min_age" value="{{request('min_age')}}" placeholder="{{__('thailand.min')}}">
                                            </div>
                                            <span class="at-doteline">-</span>
                                            <div class="at-inputwidthfifty">
                                                <input type="text" name="max_age" value="{{request('max_age')}}" placeholder="{{__('thailand.max')}}">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.nationality')}}</label>
                                            <select class="at-selecttheme" name="nationality">
                                                <option value="">-{{__('thailand.select')}}-</option>

                                                    <option value="Bangladesh" {{request('nationality') == 'Bangladesh' ? 'selected' : ''}}>Bangladesh</option>
                                                    <option value="Brunei" {{request('nationality') == 'Brunei' ? 'selected' : ''}}>Brunei</option>
                                                    <option value="Indonesia" {{request('nationality') == 'Indonesia' ? 'selected' : ''}}>Indonesia</option>
                                                    <option value="Malaysia" {{request('nationality') == 'Malaysia' ? 'selected' : ''}}>Malaysia</option>
                                                    <option value="Myanmar [Burma]" {{request('nationality') == 'Myanmar [Burma]' ? 'selected' : ''}}>Myanmar [Burma]</option>
                                                    <option value="Pakistan" {{request('nationality') == 'Pakistan' ? 'selected' : ''}}>Pakistan</option>
                                                    <option value="Thailand" {{request('nationality') == 'Thailand' ? 'selected' : ''}}>Thailand</option>

                                            </select>
                                        </div>
                                    </li>
{{--                                    <li>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>ID</label>--}}
{{--                                            <input type="text" name="search" placeholder="Search">--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
                                    <li>
                                        <div class="form-group">
                                            <label></label>
                                            <button type="submit" class="at-btn at-btnapply">{{__('thailand.apply')}}</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </form>
                        <table class="at-tabletheme at-table">
                            <thead>
                            <tr>
                                <th><span> Sr. </span></th>
                                <th><span> {{__('thailand.name')}} </span></th>
                                <th><span> Email </span></th>
{{--                                <th><span> ID </span></th>--}}
                                <th><span> {{__('thailand.age')}} </span></th>
                                <th><span> {{__('thailand.gender')}} </span></th>
                                <th><span> {{__('thailand.nationality')}} </span></th>
{{--                                <th><span> Recording </span></th>--}}
{{--                                <th><span> Resend ID</span></th>--}}
                                <th><span> {{__('thailand.action')}} </span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $key => $student)
                                    <tr class="{{$loop->even ? '' : 'at-bggray'}}" id="student-{{$student->id}}">
                                        <td>
                                            <div class="at-checkbox">
                                                <label for="at-checkbox0">{{$key+1}}</label>
                                            </div>
                                        </td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
{{--                                        <td>{{$student->logIn_id}}</td>--}}
                                        <td>{{$student->age}}</td>
                                        <td>{{$student->gender}}</td>
                                        <td>{{$student->nationality}}</td>
{{--                                        <td><span class="at-masterrecording">Recording</span></td>--}}
{{--                                        <td><span class="at-masterrecording">Resend ID</span></td>--}}
                                        <td>
                                            <a href="javascript: void(0);" class="at-btnedit editStudentButton" data-id="{{$student->id}}"><i class="icon-edit"></i></a>
                                            <a href="javascript: void(0);" class="at-btndelete deleteStudentClass" data-id="{{$student->id}}"><i class="icon-delete"></i></a>
                                        </td>
                                    </tr>

                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </fieldset>

        </div>
    </div>

    <!--************************************
			Modal Start
	*************************************-->
    <div class="modal fade at-modaltheme at-chapterdeletemodal" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="javascript: void(0);" class="at-btn at-btndeleted" data-id="" id="deleteStudentButton">{{__('thailand.delete')}}</a>
                        <a href="javascript:void(0);" class="at-btn at-btncancel" data-dismiss="modal">{{__('thailand.cancel')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade at-modaltheme at-creatstudentmodal" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('thailand.create_user')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-cancel"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="at-modalform">
                        <form class="at-formtheme" method="post" action="{{route('admin_store_user')}}" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <div class="at-inputwidthicons at-uploaduserimg">
                                        <input type="file" name="image" id="at-selectfile" >
                                        <label for="at-selectfile">
                                            <i class="icon-upload"></i>
                                            <span>{{__('thailand.drop_image')}}</span>
                                        </label>
                                    </div>
                                    @error('image') <div class="text-danger">{{$message}}</div>@enderror
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
    <div class="modal fade at-modaltheme at-creatstudentmodal" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
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
                                <div class="form-group">
                                    <div class="at-inputwidthicons at-uploaduserimg">
                                        <input type="file" name="image" id="at-selectfile2">
                                        <label for="at-selectfile2">
                                            <i class="icon-upload"></i>
                                            <span>{{__('thailand.drop_image')}}</span>
                                        </label>
                                    </div>
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
    <!--************************************
            Modal End
    *************************************-->
@endsection
@section('scripts')
    <script>
        @if (count($errors) > 0)
        $('#registerUser').modal('show');
        @endif

        $(document).ready(function () {
            $(document).on('click','.deleteStudentClass',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#deleteStudentButton').data('id',id); //setter
                $('#deleteStudentModal').modal('show');
            });
            $(document).on('click','#deleteStudentButton',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let url = '{{route('admin_delete_student')}}';
                let data = {
                    '_token' : '{{csrf_token()}}',
                    'id' : id,
                };

                $.post(url,data,function (response) {
                    if (response.status === 'success'){
                        $('#deleteStudentModal').modal('hide');
                        toastr.success(response.message, 'success!');
                        $('#student-'+response.student).remove();
                    }
                });

            });
            $(document).on('click','.editStudentButton',function (e) {
                let  id = $(this).data('id');
                let url = '{{route('admin_get_student_detail')}}';
                let data = {
                  'id' : id
                };
                $.get(url,data,function (response) {
                    if(response.status === "success"){
                        $("input[name='edit_id']").val(response.student.id);
                        $("input[name='edit_name']").val(response.student.name);
                        $("input[name='edit_email']").val(response.student.email);
                        $("input[name='edit_age']").val(response.student.age);
                        let gender = response.student.gender;
                        let nationality = response.student.nationality;
                        $('select[name="edit_gender"]').find('option[value="'+gender+'"]').attr("selected",true);
                        $('select[name="edit_nationality"]').find('option[value="'+nationality+'"]').attr("selected",true);

                        // $('select[name='edit_nationality'] option').filter(function() {
                        //     return ($(this).text() == 'Blue'); //To select Blue
                        // }).prop('selected', true);

                        $('#editUser').modal('show');
                    }
                });




            });

        });
    </script>

@endsection
