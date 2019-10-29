@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Component Category Table
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
                                            <a class="btn green" href="{{route('category.create')}}" >Add New
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
                                    <th> Type </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($component_category as $key => $component_category)
                                    <td class="center">{{$key+1}} </td>
                                    <td class="center">{{$component_category->title}}</td>
                                    <td class="center"> <label class="btn btn-warning" style="color:black;font-weight: bold" > {{$component_category->type}} </label></td>
                                    <td>

                                        <a class="btn btn-info " href="{{route('category.edit',$component_category->id)}}"> Edit </a>
                                    </td>

                                    {!! Form::Open(['method' => 'DELETE' , 'route' => ['category.destroy',$component_category->id]]) !!}
                                    <td>
                                        <button class="btn btn-danger" data-id="{{$component_category->id}}" onclick="deletefunction({{$component_category->id}},'{{url('/')}}')"> Delete </button>
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
                function deletefunction(id,url) {

$.ajax({
    type: "GET",
    url:url+'dashboard/component/category/delete_ajax/'+id,
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
