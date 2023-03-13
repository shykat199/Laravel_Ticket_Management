@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Add New Sight Setting
@endsection
@section('admin.content')

    <form action="{{route('post.admin.setting')}}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" name="key" class="form-control" id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput"> Setting Name</label>
        </div>
        @error('key')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <label class="form-label" for="validationCustom01">Name Value</label>
        <textarea class="ckeditor form-control" name="value"></textarea>
        @error('value')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>


        <button type="submit" class="btn btn-success">Create</button>
    </form>


    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
