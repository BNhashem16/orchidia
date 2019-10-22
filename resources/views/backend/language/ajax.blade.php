<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
    <thead>
    <tr>
        <th> # </th>
        <th> Name </th>
        <th> Code </th>
        <th> Status </th>
        <th> Edit </th>
        <th> Delete </th>
    </tr>
    </thead>
    <tbody>
    @foreach($lang as $key => $lang)
        <tr>
            <td> {{$key+1}} </td>
            <td><img width="100px" height="100px" src="{{url($lang->image)}}"></td>
            <td>    	@if (App\Language::where('id' , $lang->id)->count())

                    <label class="btn btn-success">{{$lang->name}}</label>
                @else
                    <label class="btn btn-danger">Main Category</label>
                @endif
            </td>

            <td class="center">{{$lang->name}} </td>
            <td class="center">
                @if($lang->active ==1)
                    <label class="btn btn-primary active_change" data-id="{{$lang->id}}" data-url="{{url('/')}}" data-active="{{$lang->active}}">Active</label>
                @else
                    <label class="btn btn-danger active_change" data-id="{{$lang->id}}" data-url="{{url('/')}}" data-active="{{$lang->active}}">Inactive</label> @endif
            </td>
            {!! Form::Close() !!}
            <td>
                <a class="edit" href="javascript:;"> Edit </a>
            </td>

            <td>
                <button data-id="{{$lang->id}}" onclick="deletefunction({{$lang->id}},'{{url('/')}}')"> Delete </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
