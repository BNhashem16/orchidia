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
                                            <a class="btn green" href="{{route('component.create')}}" >Add New
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
                                    <th> Image </th>
                                    <th> Title </th>
                                    <th> Category Component</th>
                                    <th> Small Title </th>
                                    <th> Description </th>
                                    <th> Extra</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($components as  $component)

                                    <td class="center">{{$component->id}} </td>
                                    <td class="center"><img width="100px" height="100px" src="{{url($component->image)}}" >
                                    </td>
                                    <td class="center">{{$component->title['en']}}</td>
                                    <td>{{$component->category_component->title}}</td>
                                    <td class="center">{{$component->sub_title['en']}}</td>
                                    <td class="center">{{$component->description['en']}}</td>
                                    <td class="center">{{$component->extra['en']}}</td>


                                    <td>

                                        <a class="btn btn-info " href="{{route('component.edit',$component->id)}}"> Edit </a>
                                    </td>


                                    <td>
                                        <button class="btn btn-danger" data-id="{{$component->id}}" onclick="deletefunction({{$component->id}},'{{url('/')}}')"> Delete </button>
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
