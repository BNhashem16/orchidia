@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Slider</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Create New Slider</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        {!! Form::model($slider,['route'=>['slider.update',$slider->id], 'method' => 'PATCH'] , ['files'=>true  ,'class' =>'form-horizontal form-bordered'] ) !!}
                            <div class="form-body">
                                @foreach($langs as $lang)
                                <div class="form-group">
                                <label class="control-label col-md-3">Main Header {{$lang->name}}</label>
                                    <div class="col-md-9">
                                    <textarea class="form-control" name="big_header[{{$lang->short_code}}]" >{{$slider->big_header[$lang->short_code]?$slider->big_header[$lang->short_code]:old('big_header.'.$lang->short_code)}}</textarea>
                                    </div>
                                </div>
                                @endforeach

                                @foreach($langs as $lang)
                                <div class="form-group">
                                <label class="control-label col-md-3">Title {{$lang->name}}</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title[{{$lang->short_code}}]" value="{{$slider->title[$lang->short_code]?$slider->title[$lang->short_code]:old('title.'.$lang->short_code)}}">
                                    </div>
                                </div>
                                @endforeach

                                @foreach($langs as $lang)
                                <div class="form-group">
                                <label class="control-label col-md-3">Small Header {{$lang->name}}</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="small_header[{{$lang->short_code}}]">{{$slider->small_header[$lang->short_code]?$slider->small_header[$lang->short_code]:old('small_header.'.$lang->short_code)}}</textarea>
                                    </div>
                                </div>
                                @endforeach

                                @foreach($langs as $lang)
                                <div class="form-group">
                                <label class="control-label col-md-3">Paragraph {{$lang->name}}</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="paragraph[{{$lang->short_code}}]">{{$slider->paragraph[$lang->short_code]?$slider->paragraph[$lang->short_code]:old('paragraph.'.$lang->short_code)}}</textarea>
                                    </div>
                                </div>
                                @endforeach

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Upload Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img id="preview"  src="{{url($slider->image)}}" alt=""/> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <input id="img" type="file" name="image"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn green">
                                                <i class="fa fa-check"></i> Submit</button>

                                        <a href="javascript:;" class="btn btn-outline grey-salsa">Cancel</a>
                                    </div>
                                </div>
                            </div>
{!! Form::Close() !!}
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection
@section('jsCode')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img").change(function() {
            readURL(this);
        });
    </script>
@endsection
@extends('backend.layouts.app')
