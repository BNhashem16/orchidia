@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> News Database
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
                                            {!! Form::Open(['route' => 'news.store' , 'files' => true]) !!}
                                            <a class="btn green" href="{{url('dashboard/news/create')}}" > Add New
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
                                    <th> Paragraph</th>
                                    <th> active </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($new as $key => $new)
                                <tr>
                                    <td> {{$key+1}} </td>
                                    <td><img width="100px" height="100px" src="{{url($new->image)}}"></td>
                                    <td class="center">{{$new->title}} </td>
                                    <td class="center">{{substr($new->description,0,30)}}</td>
                                    <td class="center">
                                        @if($new->active ==1)
                                            <label class="btn btn-primary active_change" data-id="{{$new->id}}" data-url='{{url('/')}}' data-active="{{$new->active}}">Active</label>
                                        @else
                                            <label class="btn btn-danger active_change" data-id="{{$new->id}}" data-url='{{url('/')}}' data-active="{{$new->active}}">Inactive</label> @endif
                                    </td>
                                    {!! Form::Close() !!}
                                    <td>

                                        <a class="btn btn-info edit" href="javascript:;"> Edit </a>
                                    </td>

                                    <td>
                                        <button class="btn btn-danger" data-id="{{$new->id}}" onclick="deletefunction({{$new->id}},'{{url('/')}}')"> Delete </button>
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
                url:url+'/dashboard/news/change_active/'+id,
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
                url:url+'/dashboard/news/delete_ajax/'+id,
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
