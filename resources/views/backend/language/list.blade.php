@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Language Table
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
                                            <a class="btn green" href="{{route('lang.create')}}" >Add New
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
                            <div class="ajax">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Code </th>
                                    <th> Status</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lang as $key => $lang)
                                <tr class="id{{$lang->id}}" >
                                    <td class="center">{{$key+1}} </td>
                                    <td class="center">{{$lang->name}}</td>
                                    <td class="center">{{$lang->short_code}}</td>
                                    <td class="center">
                                        @if($lang->active ==1)
                                            <label class="btn btn-primary active_change" data-id="{{$lang->id}}" data-url='{{url('/dashboard/lang')}}' data-active="{{$lang->active}}">Active</label>
                                        @else
                                            <label class="btn btn-danger active_change" data-id="{{$lang->id}}" data-url='{{url('/dashboard/lang')}}' data-active="{{$lang->active}}">Inactive</label> @endif
                                    </td>


                                    <td>

                                        <a class="btn btn-info " href="{{route('lang.edit',$lang->id)}}"> Edit </a>
                                    </td>


                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button class="deleteRecord btn btn-danger" data-id="{{$lang->id}}" > Delete </button>
                                    </td>
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
                    $('tbody tr.id'+id).html(result);
                }
            });

        });

    $(".deleteRecord").click(function(){
      var id = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url: "/dashboard/lang/"+id,
        type: 'DELETE',
        data: { "id": id, "_token": token },
        success: function (data){
            $('tbody tr.id'+id).remove();
        }});
    });


    </script>
    @endsection
@extends('backend.layouts.app')
