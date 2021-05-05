@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Alphabet List</title>
@endsection
@section('body')
    <div class="at-masterlist at-alphabetlist">
        <div class="at-contentbox">
            <div class="at-themetitle">
                <h2>Alphabet List</h2>
                <form id="chapterFilter" class="at-formtheme at-filtersform" method="get" action="{{route('admin_alphabet_list')}}">
                    <fieldset>
                        <div class="form-group">
                            <span class="at-select">
                                <select name="chapter_filter">
                                    <option value="">All</option>
                                    @forelse($chapters as $chapter)
                                        <option value="{{$chapter->id}}"{{request('chapter_filter') == $chapter->id ? 'selected' : ''}}>{{$chapter->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </span>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="at-themetablebox at-tableresponsive at-masterlisttable">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Chapter Name</th>
                            <th>Alphabet</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($alphabets as $key => $alphabet)
                            <tr id="user-3">
                                <td data-title="Sr">{{$key+1}}</td>
                                <td data-title="Chapter Name">{{$alphabet->chapter->name}}</td>
                                <td data-title="Alphabet"><figure><img src="{{asset('uploads/alphabets/'.$alphabet->alphabet)}}"></figure></td>
                                <td data-title="Action">
                                    <form action="{{route('admin_edit_alphabet',$alphabet->id)}}" method="get" class="at-editform">
                                        <button type="submit" class="at-btn">Edit</button>
                                    </form>
                                    <form action="{{route('admin_delete_alphabet')}}" method="post" class="at-deleteform">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{$alphabet->id}}">
                                        <button type="submit" class="at-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('select[name=chapter_filter]').on('change',function (e) {
                $('#chapterFilter').submit();
            });
        });
    </script>
@endsection
