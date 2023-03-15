@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Services
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Service &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Service</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post.admin.service')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label" for="validationCustom01">Service Name</label>
                        <input type="text" name="service_title" class="form-control" id="validationCustom01"
                               placeholder="Service Name....">

                        @error('service_title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Post Description</label>
                        <textarea class="ckeditor form-control" name="service_text"></textarea>
                        @error('service_text')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Service Logo</label>
                        <input type="file" name="service_logo" class="form-control" id="validationCustom01"
                               onchange="readUrl1(this)">
                        <img class="mt-2" id="image" src="#" alt=""/>

                        @error('service_logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--End Add Category Modal--}}

    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>Service Name</th>
            <th>Service Title</th>
            <th>Service Logo</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($services as $service)
            <tr>
                <td>{{$idx++}}</td>
                <td class="service_name" data-id="{{$service->id}}">{{$service->service_title}}</td>
                <td class="service_text" data-iddd="{{$service->service_text}}">{{Str::limit($service->service_text,25,'...')}}</td>
                <td>
                    <img class="service_image" data-idd="{{$service->service_logo}}" src="{{asset('/storage/service/'.$service->service_logo)}}" alt=""
                         style="height: 80px;width: 80px;">
                </td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i
                            class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('delete.admin.service',$service->id)}}" class="btn btn-danger"><i
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
                    <h4 class="modal-title" id="myCenterModalLabel">Update Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update.admin.service')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="s_id" id="s_id">

                        <label class="form-label" for="validationCustom01">Service Name</label>
                        <input type="text" name="service_title" class="form-control" id="title"
                               placeholder="Service Name....">

                        @error('service_title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Post Description</label>
                        <textarea class="ckeditor form-control" id="service_text" name="service_text"></textarea>
                        @error('service_text')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Service Logo</label>
                        <input type="file" name="service_logo" class="form-control" id="validationCustom01">
                        <img class="mt-2" id="image1" src="" alt="" style="height: 100px;width: 100px;"/>


                        @error('service_logo')
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
                let service_title = currentRow.find('.service_name').html(); //service-name
                let service_text = currentRow.find('.service_text').data('iddd'); //service-name
                let service_id = currentRow.find('.service_name').data('id'); //service-id
                let image = currentRow.find('.service_image').data('idd');//image
                //console.log(image);

                $("#title").val(service_title);
                $("#s_id").val(service_id);
                //CKEDITOR.instances.text.setData(service_text);
                //CKEDITOR.instances['#textareaId'].setData(service_text);
                $("#image1").attr("src", '{{asset('storage/service')}}/' + image);
                CKEDITOR.instances['service_text'].setData(service_text);

            })
        })
    </script>
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
