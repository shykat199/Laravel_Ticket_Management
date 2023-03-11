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
                    <img src="{{\Illuminate\Support\Facades\Storage::url($post->post_image)}}" alt="" style="height: 80px;width: 80px;">
                </td>
                <td>
                    <a href="{{route('blog.show',$post->id)}}" class="btn btn-warning "><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('blog.edit',$post->id)}}" class="btn btn-primary "><i class=" fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('admin.blog.delete',$post->id)}}" class="btn btn-danger"><i
                            class=" fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
