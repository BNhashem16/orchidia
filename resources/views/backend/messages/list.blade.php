    @section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Contact Us Form
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
                                        <!-- <div class="btn-group">
                                            <a class="btn green" href="{{route('form.create')}}" >Add New
                                                <i class="fa fa-plus"></i>
                                          </a>
                                        </div> -->
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
                                    <th> Email</th>
                                    <th> Phone </th>
                                    <th> Subject </th>
                                    <th> Message</th>
                                    <th> Page ID</th>
                                    <!-- <th> Edit </th> -->
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($contact as $key => $contact)
                                    <td class="center">{{$key+1}} </td>
                                    <td class="center">{{$contact->message['name']}}</td>
                                    <td ><label style="color:black;font-weight: Bold; " class="btn btn-warning">{{$contact->message['email']}}</label> </td>
                                    <td class="center">{{$contact->message['phone_number']}}</td>
                                    <td class="center">{{$contact->message['subject']}}</td>
                                    <td class="center">{{$contact->message['message']}}</td>
                                    <td class="center"> {{$contact->page_id}} </td>

                                    {!! Form::Open(['method' => 'DELETE' , 'route' => ['messages.destroy',$contact->id] ]) !!}
                                      <td>
                                          <button class="btn btn-danger" data-id="{{$contact->id}}" onclick="deletefunction({{$contact->id}},'{{url('/')}}')"> Delete </button>
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


    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Apply For Jop Form
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
                                        <a class="btn green" href="{{route('form.create')}}" >Add New
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
                                <th> Name </th>
                                <th> Email</th>
                                <th> Phone </th>
                                <th> Department </th>
                                <th> Date</th>
                                <th> Page ID</th>
                                <!-- <th> Edit </th> -->
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($messages as $key => $message)
                                <td class="center">{{$key+1}} </td>
                                <td class="center">{{$message->message['full_name']}}</td>
                                <td ><label style="color:black;font-weight: Bold; " class="btn btn-warning">{{$message->message['email']}}</label> </td>
                                <td class="center">{{$message->message['phone_number']}}</td>
                                <td class="center">{{$message->message['department']}}</td>
                                <td class="center">{{$message->message['date']}}</td>
                                <td class="center"> {{$message->page_id}} </td>
                                <!-- <td>
                                    <a class="btn btn-info " href="{{route('form.edit',$message->id)}}"> Edit </a>
                                </td> -->
                                {!! Form::Open(['method' => 'DELETE' , 'route' => ['messages.destroy',$message->id] ]) !!}
                                  <td>
                                      <button class="btn btn-danger" data-id="{{$message->id}}" onclick="deletefunction({{$message->id}},'{{url('/')}}')"> Delete </button>
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
