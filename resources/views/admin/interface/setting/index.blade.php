@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Sight Setting
@endsection
@section('admin.content')

    <div class="mb-2">
        <a href="{{route('admin.setting.create')}}" class="btn btn-primary">Add New
            Setting &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></a>
    </div>


    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>Key</th>
            <th>Value</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allSettings as $setting)
            <tr>
                <td>{{$idx++}}</td>
                <td class="setting_key" data-id="{{$setting->id}}">{{$setting->key}}</td>
                <td class="setting_value" data-idd="{{$setting->value}}">{{Str::limit($setting->value,50,'....')}}</td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i
                            class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('delete.admin.setting',$setting->id)}}" class="btn btn-danger"><i
                            class=" fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--Start Edit Category Center Modal--}}
    <div class="modal fade" id="centermodal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Update Sight Setting</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update.admin.setting')}}" method="post">
                        @csrf

                        <input type="hidden" name="setting_id" id="setting_id">

                        <label class="form-label" for="validationCustom01">Sight Key</label>
                        <input type="text" name="key" class="form-control" id="setting_key"
                               placeholder="Member Name....">

                        @error('key')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Name Value</label>
                        <textarea class="ckeditor form-control" id="setting_value" name="value"></textarea>
                        @error('value')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--End Edit Category Modal--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('.btnEdit').on('click', function () {
                let currentRow = $(this).closest('tr');
                let setting_key = currentRow.find('.setting_key').html(); //name
                let setting_value = currentRow.find('.setting_value').data('idd'); //value
                let setting_id = currentRow.find('.setting_key').data('id'); //id


                 console.log(setting_id);
                 console.log(setting_key);
                 console.log(setting_value);

                $("#setting_key").val(setting_key);
                $("#setting_id").val(setting_id);

                CKEDITOR.instances['setting_value'].setData(setting_value);

            })
        })
    </script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
