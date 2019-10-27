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
                    <span>Pages</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Create New Page</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        {!! Form::model($component_category,['route' => ['component.update',$component->id], 'method' => 'PATCH' ,'class' =>'form-horizontal form-bordered'] ) !!}
                            <div class="form-body">

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Category</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="component_category_id">
                                                    @foreach($component_category as $key => $component_category)
                                                        <option value="{{$component_category->id}}" >{{$component_category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                @foreach($langs as $lang)
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Title {{$lang->name}}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="title[{{$lang->short_code}}]" value="{{old('title.'.$lang->short_code)}}">
                                        </div>
                                    </div>
                                @endforeach
                                @foreach($langs as $lang)
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Small Title {{$lang->name}}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="sub_title[{{$lang->short_code}}]" value="{{old('title.'.$lang->short_code)}}">
                                        </div>
                                    </div>
                                @endforeach
                                @foreach($langs as $key => $lang)
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description {{$lang->name}}</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="editor{{$key}}"name="description[{{$lang->short_code}}]"></textarea>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach($langs as $lang)
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Extra {{$lang->name}} (optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="extra[{{$lang->short_code}}]" value="{{old('title.'.$lang->short_code)}}">
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Link </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="link">
                                        </div>
                                    </div>

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Upload Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img id="preview"  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                                        <a href="{{url('dashboard/pages')}}" class="btn btn-outline grey-salsa">Cancel</a>
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
<?php $langs_count = count($langs); ?>
<!-- END CONTENT -->
@endsection
@section('jsCode')
    <script>
    // $(document).ready(function() {
    //     for (var i = 0; i < {{$langs_count}}; i++) {
    //       CKEDITOR.replace( 'editor'+i );
    //     }
    // });
      for (var i = 0; i < {{$langs_count}}; i++) {
        CKEDITOR.replace( 'editor'+i );
      }
    </script>

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
