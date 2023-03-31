@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Add New Sight Setting
@endsection
@section('admin.content')

    <form action="{{route('post.admin.setting')}}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf


        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Facebook</label>
            <input name="facebook" type="text" class="form-control" id="facebook"
                   value="{{(isset($settings['facebook']))? $settings['facebook'] : ''}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">About us</label>
            <textarea class="ckeditor form-control" name="aboutus"
                      value="{{(isset($settings['aboutus']))? $settings['aboutus'] : ''}}">{{(isset($settings['aboutus']))? $settings['aboutus'] : ''}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Address</label>
            <textarea class="ckeditor form-control" name="address"
                      value="{{(isset($settings['address']))? $settings['address'] : ''}}">{{(isset($settings['address']))? $settings['address'] : ''}}</textarea>
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Youtube</label>
            <input name="youtube" type="text" class="form-control" id="youtube"
                   value="{{(isset($settings['youtube']))? $settings['youtube'] : ''}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Skype</label>
            <input name="skype" type="text" class="form-control" id="skype"
                   value="{{(isset($settings['skype']))? $settings['skype'] : ''}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Phones</label>
            <input name="phone" type="text" class="form-control" id="freephones"
                   value="{{(isset($settings['phone']))? $settings['phone'] : ''}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">E-mail</label>
            <input name="email" type="email" class="form-control" id="email"
                   value="{{(isset($settings['email']))? $settings['email'] : ''}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Linkedin</label>
            <input name="linkedin" type="text" class="form-control" id="linkedin"
                   value="{{(isset($settings['linkedin']))? $settings['linkedin'] : ''}}">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Twitter</label>
            <input name="twitter" type="text" class="form-control" id="twitter"
                   value="{{(isset($settings['twitter']))? $settings['twitter'] : ''}}">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Sight Logo</label>
            <input name="logo" type="file" class="form-control" id="logo" value="{{(isset($settings['logo']))? $settings['logo'] : ''}}" onchange="readUrl1(this)">
{{--            @dd($settings['logo'])--}}
        </div>
        <img class="mt-1" id="image" src="#" alt=""/>
        <br>

        <button type="submit" class="btn btn-success mt-2">Create</button>
    </form>


    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

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




