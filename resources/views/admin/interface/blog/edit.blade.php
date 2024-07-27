@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Edit Post
@endsection
@section('admin.content')

    <form action="{{route('blog.update',$blogPost->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" name="post_title" class="form-control" value="{{$blogPost->post_title}}"
                   id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Post Title</label>
        </div>
        @error('post_title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <label class="form-label" for="validationCustom01">Post Category</label>
        <div class="form-floating mb-3">
            <select name="post_category" class="form-control select2" data-toggle="select2">
                <option selected>Select A Category</option>
                @foreach($allCategory as $category)
                    <option
                        value="{{$category->id}}" {{$category->id ===$blogPost->category_id ? 'selected':""}}>{{$category->category_name}}</option>
                @endforeach

            </select>
        </div>
        @error('post_category')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>


        <label class="form-label" for="validationCustom01">Post Description</label>
        <textarea class="ckeditor form-control" name="post_description">
            {{$blogPost->post_description}}"
        </textarea>
        @error('post_description')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="mt-3 mb-2">
            <label for="formFile" class="form-label">Post Image</label>
            <input class="form-control" name="post_image" type="file" id="post_image"
                   onchange="readUrl1(this)">
            <img class="mt-2" id="image" src="{{\Illuminate\Support\Facades\Storage::url($blogPost->post_image)}}"
                 alt="" style="height: 90px; width: 90px;"/>
        </div>
        @error('post_image')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <button type="submit" class="btn btn-success">Create</button>
    </form>

    {{--    <form action="" method="post" name="file" files="true" enctype="multipart/form-data"--}}
    {{--          class="dropzone" id="image-upload">--}}
    {{--        @csrf--}}
    {{--        <div>--}}
    {{--            <h3 class="text-center">Upload Multiple Images</h3>--}}
    {{--        </div>--}}
    {{--    </form>--}}


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

    <script>

        function readUrl1(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
