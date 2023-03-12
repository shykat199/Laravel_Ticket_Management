@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Inactive Feedback Or Testimonials
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Feedback &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Feedback Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Feedback</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.testimonial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label" for="validationCustom01">Feedback Text</label>
                        <textarea class="ckeditor form-control" name="feedback_text"></textarea>

                        @error('feedback_text')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label for="formFile" class="form-label">Post Image</label>
                        <input class="form-control" name="image" type="file" id="post_image"
                               onchange="readUrl1(this)">
                        <img class="mt-2" id="image" src="#" alt=""/>

                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--End Add Feedback Modal--}}

    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>User Name</th>
            <th>User Role</th>
            <th>Feedback</th>

            <th>Image</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>

        @php
            $idx=1;
        @endphp
        @foreach($allTestimonialsUser as $userTestimonial)
            <tr>
                <td>{{$idx++}}</td>
                <td class="testimonial_name" data-id="{{$userTestimonial->id}}">{{$userTestimonial->users->name}}</td>
                <td class="testimonial_name"
                    data-id="{{$userTestimonial->id}}">{{strtoupper($userTestimonial->users->user_role)}}</td>

                <td class="testimonial_text"
                    data-iddd="{{$userTestimonial->feedback_text}}">{{\Illuminate\Support\Str::limit($userTestimonial->feedback_text,30,'....')}}</td>
                {{--                <td class="category_name">{{$userTestimonial->category_name}}</td>--}}
                <td class="">
                    <img class="testimonial_image" src="{{asset('storage/image/'.$userTestimonial->image)}}"
                         data-idd="{{$userTestimonial->image}}" alt="" style="height: 80px; width: 80px">
                </td>
                <td class="testimonial_name"><h4><span class="badge bg-danger">InActive</span></h4></td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i
                            class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('admin.testimonial.delete',$userTestimonial->id)}}" class="btn btn-danger"><i
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
                    <h4 class="modal-title" id="myCenterModalLabel">Update Feedback</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.testimonial.toactive')}}" method="post">
                        @csrf
                        <div class="float-left mb-1">
                            <input type="hidden" name="testimonial_id" id="testimonial_id">
                            <button type="submit" class="btn btn-success">Active Testimonial</button>
                        </div>
                    </form>


                    <form action="{{route('admin.testimonial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="testimonial_id" id="testimonial_id">

                        <label class="form-label" for="validationCustom01">Feedback Text</label>
                        <textarea class="ckeditor form-control" id="text" name="feedback_text">

                        </textarea>

                        @error('feedback_text')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label for="formFile" class="form-label">Post Image</label>
                        <input class="form-control" name="image" type="file" id="post_image"
                               onchange="readUrl(this)">
                        <img class="mt-2" id="image1" src="" alt="" style="height: 80px; width: 80px;"/>

                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                let col1 = currentRow.find('.testimonial_name').html(); //user
                let testimonial_id = currentRow.find('.testimonial_name').data('id');  //id
                let testimonial_text = currentRow.find('.testimonial_text').data('iddd'); //text
                let testimonial_image = currentRow.find('.testimonial_image').data('idd'); //image
                //console.log(testimonial_text);

                $("#testimonial_id").val(testimonial_id);
                //$("#text").val(testimonial_text);
                CKEDITOR.instances.text.setData(testimonial_text);
                $("#image1").attr("src", '{{asset('storage/image')}}/' + testimonial_image);

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


        function readUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#image1')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
