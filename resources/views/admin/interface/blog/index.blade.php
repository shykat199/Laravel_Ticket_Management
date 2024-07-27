@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Posts
@endsection
@section('admin.content')

    <div class="mb-2">
        <a href="{{route('blog.create')}}" class="btn btn-primary">Add New
            Post &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></a>
    </div>


    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>Post Title</th>
            <th>Post Category</th>
            <th>Post Description</th>
            <th>Post Image</th>
            <th>Post Status</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allPost as $post)
            <tr>
                <td>{{$idx++}}</td>
                <td class="category_name">{{\Illuminate\Support\Str::limit($post->post_title,20,'....')}}</td>
                <td class="category_name">{{$post->category->category_name}}</td>
                <td class="category_name">{{\Illuminate\Support\Str::limit($post->post_description,50,'....')}}</td>
                <td class="category_name">
                    <img src="{{\Illuminate\Support\Facades\Storage::url($post->post_image)}}" alt=""
                         style="height: 80px;width: 80px;">
                </td>
                <td>
                    <input id="switch-primary-{{$post->id}}" value="{{$post->id}}" type="checkbox"
                           name="toggle" class="toggle-class" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        {{$post->status === 1 ? 'checked' : ''}}>

                    <label for="switch-primary-{{$post->id}}"></label>
                </td>
                <td>
                    <a href="{{route('blog.show',$post->id)}}" class="btn btn-warning "><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('blog.edit',$post->id)}}" class="btn btn-primary "><i
                            class=" fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('admin.blog.delete',$post->id)}}" class="btn btn-danger"><i
                            class=" fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $(document).on('change', '.toggle-class', function (e) {

            e.preventDefault();
            let mode = $(this).prop('checked');
            let id = $(this).val();
            // console.log(mode);
            //  console.log(id);
            //let url={{route('admin.blog.update.status')}};
            $.post('http://127.0.0.1:8000/admin/dashboard/blog/update/status',
                {
                    mode: mode,
                    id: id,
                    '_token': '{{csrf_token()}}'
                },
            function (response,status){
                console.log(status,'status');
                console.log(response,'data');
            })
        });

    </script>
@endsection
