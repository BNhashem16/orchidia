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
                    <span>Component Category</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Edit Component Category</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        {!! Form::model($component_category,['route' => ['category.update',$component_category->id], 'method' => 'PATCH' , 'class' =>'form-horizontal form-bordered'] ) !!}
                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$component_category->title}}" name="title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Type</label>
                                    <div class="col-md-9">
                                      <select name="type" >
                                        <option class="form-control" value="component" @if($component_category->type == 'component') selected @endif >Component</option>
                                        <option class="form-control" value="form" @if($component_category->type == 'form') selected @endif >Form</option>
                                      <select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="Submit" class="btn green">
                                                <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{url('dashboard/component/category')}}" class="btn btn-outline grey-salsa">Cancel</a>
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
@extends('backend.layouts.app')
