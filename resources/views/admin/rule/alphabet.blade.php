@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Alphabet Rule</title>
@endsection
@section('body')
    <div class="at-content at-masters at-admanrating at-alphabetrule">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.alphabet_rule')}}</h2>
            </div>
        </div>
        <div class="at-mastercontent">
            <table class="at-tabletheme at-table">
               <thead>
                   <tr>
                       <th>Sr.</th>
                       <th>{{__('thailand.alphabet')}}</th>
                       <th>{{__('thailand.select_rule')}}</th>
                   </tr>
               </thead>
               <tbody class="tab-parent">
               @foreach($alphabets as $key => $alphabet)
                   <tr class="at-bggray" data-id="{{$alphabet->id}}">
                       <td>{{ $key+1+(($alphabets->currentPage()-1)*$alphabets->perPage())}}</td>
                       <td class="alphabet-img" data-id="{{$alphabet->id}}">
                            <figure class="at-alphabets">
                                <img src="{{asset('uploads/alphabets/'.$alphabet->alphabet)}}" alt="alphabets image">
                            </figure>
                        </td>
                       <td>
                           <div class="form-group at-selectrule">
                               <select  class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                   @php
                                   $array=[];
                                   foreach($alphabet->rules as $item){
                                       $array[]=$item->id;
                                   }
                                   @endphp
                                   @foreach($rules as $rule)
                                       <option value="{{$rule->id}}" {{ in_array($rule->id,$array)?'selected':'' }}>{{ $rule->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                       </td>
                       <td>
                           <button class="at-btn subbtn">{{__('thailand.submit')}}</button>
                       </td>
                   </tr>
                   @endforeach
               {{ $alphabets->links() }}
               </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
       $(document).ready(function (){
           $(document).on('click','.subbtn',function (){
               let id = $(this).parent().parent().data('id');
               let select2 = $(this).parent().parent().find('.js-example-basic-multiple').val();
               console.log(select2);

               let url = '{{route('store_alphabet_rules')}}';
               let data = {
                   '_token': '{{csrf_token()}}',
                   'alphabet_id':id,
                   'rules':select2,
               }
               $.post(url,data,function (response){
                   console.log(response);
                   if(response.status == 'success'){
                       toastr.success(response.message, 'success!');
                   }
               });
           });
       });
    </script>
    @endsection
