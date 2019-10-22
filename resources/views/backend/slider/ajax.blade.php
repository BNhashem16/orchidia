<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
    <thead>
    <tr>
        <th> # </th>
        <th> Image </th>
        <th> Category </th>
        <th> Name </th>
        <th> active </th>
        <th> Edit </th>
        <th> Delete </th>
    </tr>
    </thead>
    <tbody>
    @foreach($category as $key => $category)
        <tr>
            <td> {{$key+1}} </td>
            <td><img width="100px" height="100px" src="{{url($category->image)}}"></td>
            <td>    	@if (App\Category::where('id' , $category->category_id)->count())

                    <label class="btn btn-success">{{$category->name}}</label>
                @else
                    <label class="btn btn-danger">Main Category</label>
                @endif
            </td>

            <td class="center">{{$category->name}} </td>
            <td class="center">
                @if($category->active ==1)
                    <label class="btn btn-primary active_change" data-id="{{$category->id}}" data-url='{{url('/')}}' data-active="{{$category->active}}">Active</label>
                @else
                    <label class="btn btn-danger active_change" data-id="{{$category->id}}" data-url='{{url('/')}}' data-active="{{$category->active}}">Inactive</label> @endif
            </td>
            {!! Form::Close() !!}
            <td>
                <a class="edit" href="javascript:;"> Edit </a>
            </td>

            <td>
                <button class="btn btn-danger" data-id="{{$category->id}}" onclick="deletefunction({{$category->id}},'{{url('/')}}')"> Delete </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
