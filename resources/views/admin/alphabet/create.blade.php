@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Create Alphabet</title>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/keyboard.css')}}">
@endsection
@section('body')
    <div class="at-invitemaster at-addalphabet">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Create Alphabet</h2>
            </div>
            <form action="{{route('admin_store_alphabet')}}" method="post" class="at-formtheme at-invitemasterform" enctype="multipart/form-data">
                <fieldset>
                    @csrf
                    <div class="at-inputholder">
                        <div class="form-group">
                            <span class="at-select">
                                <select name="chapter_id" required>
                                    <option value="" >Select Chapter</option>
                                    @forelse($chapters as $chapter)
                                        <option value="{{$chapter->id}}">{{$chapter->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="file" name="images[]" value="" id="input-file-now" class="dropify" multiple/>
                        </div>
{{--                            <input type="text" class="form-control" value="{{old('alphabet')}}" name="alphabet" placeholder="Enter Alphabet " required>--}}
                            <!-- <div class="at-inputiconholder">
                                <input type="text" name="alphabet" class="form-control keyboardInput" id="word" dir="rtl" placeholder="Enter Alphabet" required>
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn at-btn">Create</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript" src="{{asset('assets/js/keyboard.js')}}"></script>
    <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>

@endsection
