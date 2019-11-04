    @section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Setting Table
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
                                            <a class="btn green" href="{{route('setting.create')}}" >Add New
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
                                    <th> English Title </th>
                                    <th> Arabic Title </th>
                                    <th> Related Icon</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($setting as $key => $setting)
                                    <td class="center">{{$key +1}} </td>
                                    <td class="center">{{substr($setting->title["en"],0,15)}}</td>
                                    <td class="center">{{substr($setting->title["ar"],0,15)}}</td>
                                    <td class="center"> @if($setting->related_icon == 'social') <label class="btn btn-info" >Social Icon</label> @elseif($setting->related_icon == 'main') <label class="btn btn-success" >Main Icon</label> @else <label class="btn btn-warning" >Info Icon</label> @endif</td>

                                    <td>
                                        <a class="btn btn-info " href="{{route('setting.edit',$setting->id)}}"> Edit </a>
                                    </td>
                                    {!! Form::Open(['method' => 'DELETE' , 'route' => ['setting.destroy',$setting->id] ]) !!}
                                      <td>
                                          <button class="btn btn-danger" data-id="{{$setting->id}}" onclick="deletefunction({{$setting->id}},'{{url('/')}}')"> Delete </button>
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
