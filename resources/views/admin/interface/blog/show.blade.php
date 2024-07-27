@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Show Post
@endsection
@section('admin.content')

    <label class="form-label" for="validationCustom01">Post Author</label>
    <div class="form-floating mb-3">
        <input type="text" readonly name="post_title" value="{{$blogPost->users->name}}"
               class="form-control" id="floatingInput" placeholder="Post Title"/>

    </div>

    <div class="form-floating mb-3">
        <input type="text" readonly name="post_title" value="{{$blogPost->post_title}}" class="form-control"
               id="floatingInput" placeholder="Post Title"/>
        <label for="floatingInput">Post Title</label>
    </div>


    <label class="form-label" for="validationCustom01">Post Category</label>
    <div class="form-floating mb-3">
        <input type="text" readonly name="post_title" value="{{$blogPost->category->category_name}}"
               class="form-control" id="floatingInput" placeholder="Post Title"/>

    </div>


    <label class="form-label" for="validationCustom01">Post Description</label>
    <textarea readonly class="form-control" name="post_description" rows="10">
            {{$blogPost->post_description}}
        </textarea>


    <div class="mt-3 mb-2">
        <label for="formFile" class="form-label">Post Image</label>
        <img class="mt-2" id="image" src="{{\Illuminate\Support\Facades\Storage::url($blogPost->post_image)}}"
             alt="" style="height: 80px;width: 80px"/>
    </div>


    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    {{--    <script type="text/javascript">--}}
    {{--        Dropzone.options.imageUpload = {--}}
    {{--            maxFilesize: 1,--}}
    {{--            acceptedFiles: ".jpeg,.jpg,.png,.gif"--}}
    {{--        };--}}
    {{--    </script>--}}

@endsection
