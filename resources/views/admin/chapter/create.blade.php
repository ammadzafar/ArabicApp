@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Create Chapter</title>
@endsection
@section('body')

    <div class="at-content at-chapter">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.chapters')}}</h2>
            </div>
            <div class="at-sectionheadrightarea">
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
                <a href="javascript: void(0);" class="at-btn at-btncreat" data-toggle="modal" data-target="#exampleModalCenter">{{__('thailand.create')}}</a>
            </div>
        </div>
        <div class="at-chaptercontent">
            <form class="at-formtheme">
                <fieldset>
                    <div class="at-sectionheadvtwo">
                        <div class="at-sectiontitlevtwo">
                            <h2 id="chapterName">{{$chapters->count() > 0 ? $chapters->first()->name : ''}}</h2>
                            <span id="chapterAlphabetsCount">{{$chapters->count() > 0 ? (count($chapters->first()->alphabets)) : ''}}</span>
                        </div>
                        <div class="at-rightarea">
                            <a href="javascript:void(0);" class="at-btndelete" data-toggle="modal" data-target="#deleteAlphabets">
                                <i class="icon-delete"></i>
                            </a>
                            <div class="at-selectform">
                                <div class="form-group">
											<span class="at-checkbox">
												<input type="checkbox" id="checkall">
												<label for="checkall">{{__('thailand.select_all')}}</label>
											</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.chapter.alphabets-list')
                </fieldset>
            </form>
        </div>
        <div class="at-chaptersidebarwidget">
            <div class="at-sectiontitlevtwo">
                <h2>{{__('thailand.chapters')}}</h2>
            </div>
            <ul class="at-chapterwidgets">
                @forelse($chapters as $key => $chapter)
                    <li id="chapterLi-{{$chapter->id}}">
                        <a href="javascript:void(0);" class="at-widgetlistholder chapterList" data-id="{{$chapter->id}}">
                            <div class="at-chapterwidget at-bglist">
                                <span class="at-number">{{$chapter->sr_no}}</span>
                                <span class="at-chaptername">{{$chapter->name}}</span>
                                <ul>
                                    <li>
                                        <a href="javascript: void(0);" class="at-iconedit editChapterButton" data-id="{{$chapter->id}}" data-name="{{$chapter->name}}" data-no="{{$chapter->sr_no}}">
                                            <i class="icon-edit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="at-icondelete deleteChapterClass" data-id="{{$chapter->id}}" >
                                            <i class="icon-delete"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>

    {{--    <div class="at-invitemaster at-createchapter">--}}
    {{--        <div class="at-contentbox">--}}
    {{--            <div class="at-themetitle">--}}
    {{--                <h2>Create Chapter</h2>--}}
    {{--            </div>--}}
    {{--            <form action="{{route('admin_store_chapter')}}" method="post" class="at-formtheme at-invitemasterform">--}}
    {{--                <fieldset>--}}
    {{--                    @csrf--}}
    {{--                    <div class="at-inputholder">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Enter Chapter Name" required>--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <button type="submit" class="btn at-btn">Create</button>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </fieldset>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!--************************************
			Modal Start
	*************************************-->
    <div class="modal fade at-modaltheme" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('thailand.create_chapter')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-cancel"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="at-modalform">
                        <form class="at-formtheme" id="myForm" method="post"  enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group" id="createNewChapter" style="display: none">
                                    <label>{{__('thailand.chapter_name')}}</label>
                                    <div class="at-creatcaptername">
                                        <input class="form-cantrol" type="text" name="chapter_name" placeholder="{{__('thailand.create_chapter')}}">
                                    </div>
                                    <a href="javascript:void(0);" class="at-btnadd" id="createChapterButton"><i class="icon-add"></i></a>
                                </div>
                                <div class="form-group">
                                    <label>{{__('thailand.select_chapter')}}</label>
                                    <select class="at-selecttheme" name="chapter_id">
                                        <option value=" ">{{__('thailand.select_chapter')}}</option>
                                        <option value="create">{{__('thailand.create_chapter')}}</option>
                                        @forelse($chapters as $chapter)
                                            <option value="{{$chapter->id}}">{{$chapter->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{__('thailand.alphabets')}}</label>
                                    <div class="at-inputwidthicons">
                                        <input type="file" name="files[]" id="at-selectfile" multiple="multiple">
                                        <label for="at-selectfile">
                                            <i class="icon-upload"></i>
                                            <span>{{__('thailand.drop_image')}}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <ul class="at-addchapers" id="fileUl">

                                    </ul>
                                </div>
                                <button type="submit" class="at-btn at-btnsave">{{__('thailand.save')}}</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade at-modaltheme" id="editChapterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('thailand.edit_chapter')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icon-cancel"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="at-modalform">
                        <form class="at-formtheme" id="myForm" method="post" action="{{route('admin_update_chapter')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <input type="hidden" name="edit_chapter_id">
                                <div class="form-group" >
                                    <label>{{__('thailand.chapter_name')}}</label>
                                    <div class="at-creatcaptername">
                                        <input class="form-cantrol" type="text" name="edit_chapter_name" placeholder="{{__('thailand.create_chapter')}}" required>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label>{{__('thailand.chapter_no')}}</label>
                                    <div class="at-creatcaptername">
                                        <input class="form-cantrol" type="number" min="1" name="edit_chapter_no" placeholder="Chapter No" required>
                                    </div>
                                </div>
                                <button type="submit" class="at-btn at-btnsave">
                                    {{__('thailand.save')}}
                                </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade at-modaltheme at-chapterdeletemodal" id="deleteAlphabets" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <h2>Are you sure to delete?</h2>
                    <div class="at- btnholder">
                        <a href="javascript: void(0);" class="at-btn at-btndeleted" id="deleteAlphabetsButton">Delete</a>
                        <a href="javascript:void(0);" class="at-btn at-btncancel" data-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade at-modaltheme at-chapterdeletemodal" id="deleteChapterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="javascript: void(0);" class="at-btn at-btndeleted" data-id="" id="deleteChButton">{{__('thailand.delete')}}</a>
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

        $(document).ready(function() {
            $("#checkall").change(function() {
                if (this.checked) {
                    $(".checkboxes").each(function() {
                        this.checked=true;
                    });
                } else {
                    $(".checkboxes").each(function() {
                        this.checked=false;
                    });
                }
            });

            $(".checkboxes").click(function () {
                if ($(this).is(":checked")) {
                    var isAllChecked = 0;

                    $(".checkboxes").each(function() {
                        if (!this.checked)
                            isAllChecked = 1;
                    });

                    if (isAllChecked == 0) {
                        $("#checkall").prop("checked", true);
                    }
                }
                else {
                    $("#checkall").prop("checked", false);
                }
            });

            $("#myForm").on("submit", handleForm);
            var storedFiles = [];
            if (window.File && window.FileList && window.FileReader) {
                $("#at-selectfile").on("change", function(e) {
                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var device = $(e.target).data("device");
                    filesArr.forEach(function(f) {
                        if (!f.type.match("image.*")) {
                            return;
                        }
                        storedFiles.push(f);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            let li = '<li class="pip">\n' +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                                '<a href="javascript:void(0);" data-file="'+f.name+'" class="icon-cancel at-iconcancel selFile"></a>\n' +
                                '                                        </li>';
                            $('#fileUl').append(li);
                        }
                        reader.readAsDataURL(f);
                    });
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
            $("body").on("click", ".selFile", removeFile);
            function removeFile(e) {
                var file = $(this).data("file");

                for (var i = 0; i < storedFiles.length; i++) {
                    if (storedFiles[i].name === file) {
                        storedFiles.splice(i, 1);
                        break;
                    }
                }
                $(this).parent(".pip").remove();
            }
            function handleForm(e) {
                e.preventDefault();
                var data = new FormData();
                for (var i = 0, len = storedFiles.length; i < len; i++) {
                    data.append('files[]', storedFiles[i]);
                }
                let chapterId = $('select[name="chapter_id"]').val();
                data.append('chapter_id',chapterId);
                let token = "{{csrf_token()}}";
                let url = '{{route('admin_store_chapter')}}';
                if (chapterId !== ' ' && chapterId !== 'create'){
                    if (storedFiles.length > 0){
                        $.ajax({
                            url : url,
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            cache : false,
                            processData: false,
                            contentType: false,
                        }).done(function(response) {
                            if (response.status === 'success'){
                                toastr.success("Alphabets added successfully.", 'success!');
                                setInterval(function(){ window.location.reload() }, 3000);
                            }
                        });
                    }else{
                        toastr.error("Please select at least one image.", 'error!');
                    }
                }else{
                    toastr.error("Please select the chapter first.", 'error!');
                }
            }
            $(document).on('change','select[name="chapter_id"]',function (e) {
                e.preventDefault();
                let val = $(this).val();
                console.log(val);
                if (val === 'create'){
                    $("#createNewChapter").css("display", "block");
                }else{
                    $("#createNewChapter").css("display", "none");
                }
            });
            $(document).on('click','#createChapterButton',function (e) {
                e.preventDefault();
                let name = $('input[name="chapter_name"]').val();
                let data = {
                    '_token' : "{{csrf_token()}}",
                    'name' : name
                };
                let url = '{{route('admin_store_chapter_name')}}';

                $.post(url,data,function (response) {
                    if(response.status == 'success'){
                        let option = '<option value="'+response.chapter.id+'">'+response.chapter.name+'</option>\n';
                        $('select[name="chapter_id"]').append(option);
                        $('input[name="chapter_name"]').val('');
                    }
                });
            });
            $(document).on('click','#deleteAlphabetsButton',function (e) {
                e.preventDefault();
                var arr = [];
                $('input.checkboxes:checkbox:checked').each(function () {
                    arr.push($(this).val());
                });
                let url = '{{route('admin_delete_alphabets')}}';
                let data = {
                    '_token' : '{{csrf_token()}}',
                    'alphabets' : arr,
                };

                $.post(url,data,function (response) {
                    console.log(response);
                    if(response.status == 'success'){
                        $.each(response.alphabets,function (index,value) {
                            console.log(value,'#div-'+value)
                            $('#div-'+value).remove();
                        });
                        $('#deleteAlphabets').modal('hide');
                        toastr.success(response.message, 'success!');
                    }else {
                        toastr.error("Something went wrong", 'error!');
                    }
                });

            });
            $(document).on('click','.deleteChapterClass',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                $('#deleteChButton').data('id',id); //setter
                $('#deleteChapterModal').modal('show');
            });
            $(document).on('click','#deleteChButton',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let url = '{{route('admin_delete_chapter')}}';
                let data = {
                    '_token' : '{{csrf_token()}}',
                    'id' : id,
                };

                $.post(url,data,function (response) {
                    if (response.status === 'success'){
                        $('#deleteChapterModal').modal('hide');

                        toastr.success(response.message, 'success!');
                        setInterval(function(){ window.location.reload(); }, 2000);
                    }
                });

            });
            $(document).on('click','.editChapterButton',function (e) {
                let  id = $(this).data('id');
                let name = $(this).data('name');
                let no = $(this).data('no');
                $("input[name='edit_chapter_id']").val(id);
                $("input[name='edit_chapter_name']").val(name);
                $("input[name='edit_chapter_no']").val(no);

                $('#editChapterModal').modal('show');

            });
            $(document).on('click','.chapterList',function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let url = '{{route('admin_get_chapter_alphabets','id')}}';
                url = url.replace('id',id);

                $.get(url,function (response) {
                    console.log(response.chapterName,response.alphabetCount)
                    if(response.status == 'success'){
                        $('#chapterListDiv').empty();

                        $("#chapterName").text(response.chapterName);
                        $("#chapterAlphabetsCount").text('('+response.alphabetCount+')');
                        $.each(response.alphabets,function (index,value) {
                            let li = '            <li id="div-'+value.id+'">\n' +
                                '                <div class="at-chapterholder">\n' +
                                '                    <div class="rt-chapter">\n' +
                                '                        <span class="at-checkbox">\n' +
                                '                            <input type="checkbox" class="checkboxes" value="'+value.id+'" id="checkbox-'+value.id+'">\n' +
                                '                            <label for="checkbox-'+value.id+'"></label>\n' +
                                '                        </span>\n' +
                                '                        <a href="javascript: void(0);" class="at-btnedit">\n' +
                                '                            <i class="icon-edit"></i>\n' +
                                '                        </a>\n' +
                                '                        <div class="at-chapteredit">\n' +
                                '                            <figure>\n' +
                                '                                <img src="{{asset('uploads/alphabets/').'/'}}'+value.alphabet+'" alt="">\n' +
                                '                            </figure>\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '            </li>\n'

                            $('#chapterListDiv').append(li);

                        });
                    }
                });
            });
        });
    </script>
@endsection
