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
                    <span>News</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">Create New Language</h3>

        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light form-fit bordered">
                    <div class="portlet-body form">

                        <!-- BEGIN FORM-->
                        {!! Form::Open(['route'=>'lang.store','files'=>true , 'id' => 'contact_us'  ,'class' =>'form-horizontal form-bordered'] ) !!}


                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="short_code" id="short_code" value="{{old('short_code')}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Active</label>
                                    <div class="col-md-9">
                                             <input type="radio" value="1"  name="active" checked="checked" > Active <br>
                                             <input type="radio" value="0"  name="active" > Deactivate
                                        </div>
                                    </div>


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                                        <a href="{{url('dashboard/lang')}}" class="btn btn-outline grey-salsa">Cancel</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script>
   if ($("#contact_us").length > 0) {
    $("#contact_us").validate({

    rules: {
      name: {
        required: true,
        maxlength: 50,
        lettersonly: true,
      },

       short_code: {
            required: true,
            digits:true,
            minlength: 10,
            maxlength:12,
        },

    },
    messages: {

      name: {
        required: "Please enter name",
        maxlength: "Name should be 50 characters long.",
        lettersonly: "أكتب اسمك صح يا حيوان"
      },
      short_code: {
        required: "Please enter contact number",
        minlength: "The contact number should be 10 digits",
        digits: "Please enter only numbers",
        maxlength: "The contact number should be 12 digits",
      },

    },
    submitHandler: function(form) {
      var url = form.attr('action')
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: "{{ url('/dashboard/lang')}}" ,
        type: "POST",
        data: $('#contact_us').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');

            document.getElementById("contact_us").reset();
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}
</script>

@endsection
@extends('backend.layouts.app')
