    @section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Page Table
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="portlet-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a class="btn green" href="{{route('form.create')}}" >Add New
                                                <i class="fa fa-plus"></i>
                                          </a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            @if(Session::has('success'))
                                <p class="alert alert-success" > {{Session::get('success')}}</p>
                            @elseif(Session::has('error'))
                                <p class="alert alert-danger" > {{Session::get('error')}}</p>
                            @endif
                            <div class="table_change">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Title </th>
                                    <th> Input Name</th>
                                    <th> Input Type </th>
                                    <th> Mandatory </th>
                                    <th> Component category</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($forms as  $form)
                                    <td class="center">{{$form->id}} </td>
                                    <td class="center">{{substr($form->title["en"],0,15)}}</td>
                                    <td ><label style="color:black;font-weight: Bold; " class="btn btn-warning">{{substr($form->field['name'],0,15)}}</label> </td>
                                    <td class="center">{{ $form->field['type']}} </td>
                                    <td class="center">@if($form->field['mendatory'] == 0 ) <label class="btn btn-danger" >Optional</label> @else <label class="btn btn-success" >Mandatory</label> @endif </td>
                                    <td class="center"> {{$form->component_category_id}} </td>
                                    <td>
                                        <a class="btn btn-info " href="{{route('form.edit',$form->id)}}"> Edit </a>
                                    </td>
                                    {!! Form::Open(['method' => 'DELETE' , 'route' => ['form.destroy',$form->id] ]) !!}
                                      <td>
                                          <button class="btn btn-danger" data-id="{{$form->id}}" onclick="deletefunction({{$form->id}},'{{url('/')}}')"> Delete </button>
                                      </td>
                                    {!! Form::Close() !!}
                                  </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
@endsection
@section('jsCode')
    <script type="text/javascript">
        $(document).on('click','.active_change',function () {
            var url = $(this).data('url');
            var id = $(this).data('id');
            var active = $(this).data('active');
            $.ajax({
                type: "GET",
                url:url+'/dashboard/lang/change_active/'+id,
                data: {'id':id,'active':active},
                cache: false,
                success: function(result)
                {
                    $('.table_change').html(result);
                }
            });

        });
        function deletefunction(id,url) {

            $.ajax({
                type: "GET",
                url:url+'/dashboard/lang/delete_ajax/'+id,
                data: {'id':id},
                cache: false,
                success: function(result)
                {
                    $('.table_change').html(result);
                }
            });
        }
    </script>
    @endsection
@extends('backend.layouts.app')
