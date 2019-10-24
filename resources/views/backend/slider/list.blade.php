@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Editable Datatables
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
                                                {!! Form::Open(['route' => 'slider.store' , 'files' => true]) !!}
                                                <a class="btn green" href="{{url('dashboard/slider/create')}}" > Add New
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
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Image </th>
                                        <th> Main Header </th>
                                        <th> Title </th>
                                        {{-- <th> Small Header </th> --}}
                                        <th> Paragraph </th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $key => $slider)
                                        <tr>
                                            <td> {{$key+1}} </td>
                                            <td><img width="100px" height="100px" src="{{url($slider->image)}}"></td>
                                            <td>{{$slider->title['en']}}</td>
                                            <td>{{$slider->sub_title['en']}}</td>
                                            {{-- <td class="center">{{$slider->small_header['en']}}</td> --}}
                                            <td>{{substr($slider->description['en'],0,30)}}</td>
                                            {!! Form::Close() !!}
                                            <td>
                                                    <a class="btn btn-info " href="{{route('slider.edit',$slider->id)}}"> Edit </a>
                                            </td>
                                            {!! Form::Open(['method' => 'DELETE' , 'route' => ['slider.destroy',$slider->id]]) !!}
                                            <td>
                                                <button class="btn btn-danger" data-id="{{$slider->id}}"> Delete </button>
                                            </td>
                                            {!! Form::Close() !!}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                url:url+'/dashboard/slider/delete_ajax/'+id,
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
