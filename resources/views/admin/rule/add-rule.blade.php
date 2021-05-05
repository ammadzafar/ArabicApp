@extends('layouts.master')
@section('page-title')
    <title>Arabic Learning | Add Rule</title>
@endsection
@section('body')
    <div class="at-content at-masters at-admanrating at-addrule">
        <div class="at-sectionhead">
            <div class="at-sectiontitle">
                <h2>{{__('thailand.rules')}}</h2>
            </div>
        </div>
        <div class="at-mastercontent">
            <form class="at-formtheme" action="{{route('admin_store_alphabet_rules')}}" method="post">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <div class="at-findstudenholder">
                            <div class="at-findstudent">
                                <ul class="at-studentdata at-addrulearea">
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.rule_name')}}</label>
                                            <input type="text" name="name" placeholder="{{__('thailand.enter_rule_name')}}">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>{{__('thailand.rule_description')}}</label>
                                            <input type="text" name="description" placeholder="{{__('thailand.enter_rule_description')}}">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label></label>
                                            <button type="submit" class="at-btn at-btnapply">{{__('thailand.apply')}}</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <table class="at-tabletheme at-table">
               <thead>
                   <tr>
                       <th>{{__('thailand.rule_name')}}</th>
                       <th>{{__('thailand.rule_description')}}</th>
                       <th>{{__('thailand.action')}}</th>
                   </tr>
               </thead>
               <tbody id="table-body">
               @foreach($rules as $rule)
                   <tr class="at-bggray" data-id="{{$rule->id}}">
                       <td class="rule-name">{{$rule->name}}</td>
                       <td class="rule-description">{{$rule->description}}</td>
                       <td class="buttons">
                            <button type="button" class="at-btnedit"><i class="icon-edit editbtn"></i></button><button type="button" class="at-btnedit checkbtn" style="display: none"><i class="fas fa-check"></i></button>
                           <form method="post" action="{{route('admin_delete_alphabet_rules',['id'=>$rule->id])}}">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="at-btndelete"><i class="icon-delete"></i></button>
                           </form>
                       </td>
                   </tr>
               @endforeach
               </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
           $(document).on('click','.icon-edit',function (e){
               $(this).hide();
               $(this).closest('td').find('.checkbtn').css({'display':'block'});
               let nameCol = $(this).closest('tr').children('td.rule-name');
               let id = $(this).closest('tr').data('id');
               let descriptionCol = $(this).closest('tr').children('td.rule-description');
               let rule_name = nameCol.text().length > 0 ? nameCol.text() : nameCol.find('input').val();
               let rule_description = descriptionCol.text().length > 0 ? descriptionCol.text() : descriptionCol.find('input').val();
               nameCol.html(' <input class="rt-name" type="text" data-id="'+id+'" name="name" value="'+rule_name+'" placeholder="Enter Your Rule Name">')
               descriptionCol.html(' <input class="rt-description" type="text" name="description" value="'+rule_description+'" placeholder="Enter Your Rule Description">')

               $(document).on('click','.checkbtn',function (){

                   $(this).css({'display':'none'});
                   $(this).closest('td').find('.editbtn').show();
                   let data ={
                       '_token':'{{ csrf_token() }}',
                       'id': $(this).closest('tr').find('.rt-name').data('id'),
                       'name': $(this).closest('tr').find('.rt-name').val(),
                       'description': $(this).closest('tr').find('.rt-description').val()
                   }

                   $(this).closest('tr').find("input").hide();
                   $(this).closest('tr').children('td.rule-name').text($(this).closest('tr').find('.rt-name').val());
                   $(this).closest('tr').children('td.rule-description').text($(this).closest('tr').find('.rt-description').val());

                   let url = "{{url('admin/alphabet/rule/edit')}}";
                   $.post(url,data,function (response){
                       if(response.status == 'success'){
                           toastr.success(response.message, 'Success', {timeOut: 3000});
                       }else{
                           toastr.error(response.message, 'error', {timeOut: 3000});
                       }
                   })
               })
           });
        });
    </script>
@endsection
