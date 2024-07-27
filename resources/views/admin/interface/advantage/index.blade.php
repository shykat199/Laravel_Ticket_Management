@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Sight Advantage
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Advantage &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Advantage</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.advantage.post')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label" for="validationCustom01">Advantage Name</label>
                        <textarea class="ckeditor form-control" id="text" name="advantage_text"></textarea>


                        @error('advantage_text')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>


                        <label for="formFile" class="form-label">Advantage Logo</label>
                        <input class="form-control" name="advantage_logo" type="file" id="post_image"
                               onchange="readUrl1(this)">
                        <img class="mt-2" id="image" src="#" alt=""/>

                        @error('advantage_logo')
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
            <th>Sight Advantage</th>
            <th>Logo</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allAdvantages as $advantage)
            <tr>
                <td>{{$idx++}}</td>
                <td class="advantage_text"
                    data-id="{{$advantage->id}}"
                    data-text="{{$advantage->advantage_text}}">{{Str::limit($advantage->advantage_text,50,'....')}}</td>
                <td>
                    <img class="advantage_logo" data-idd="{{$advantage->advantage_logo}}"
                         src="{{asset('storage/advantage/'.$advantage->advantage_logo)}}" alt=""
                         style="height: 80px;width: 80px">
                </td>
                <td class="member_role">

                    <input id="switch-primary-{{$advantage->id}}" value="{{$advantage->id}}" type="checkbox"
                           name="toggle" class="toggle-class" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        {{$advantage->status === 1 ? 'checked' : ''}}>

                    <label for="switch-primary-{{$advantage->id}}"></label>
                </td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i
                            class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('delete.admin.advantage',$advantage->id)}}" class="btn btn-danger"><i
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
                    <h4 class="modal-title" id="myCenterModalLabel">Update Member</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update.admin.advantage')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="advantage_id" id="advantage_id">

                        <label class="form-label" for="validationCustom01">Advantage Name</label>
                        <textarea class="ckeditor form-control" id="text" name="advantage_text"></textarea>

                        @error('advantage_text')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>


                        <label for="formFile" class="form-label">Advantage Logo</label>
                        <input class="form-control" name="advantage_logo" type="file" id="post_image"
                               onchange="readUrl(this)">
                        <img class="mt-2" id="image1" src="#" alt="" style="height: 100px; width: 100px;"/>

                        @error('advantage_logo')
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
    {{--End Edit Category Modal--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('.btnEdit').on('click', function () {
                let currentRow = $(this).closest('tr');
                let col1 = currentRow.find('.advantage_text').data('text'); //name
                let advantage_id = currentRow.find('.advantage_text').data('id'); //id
                let advantage_logo = currentRow.find('.advantage_logo').data('idd');//image

                //console.log(col1);

                //$("#name").val(col1);
                CKEDITOR.instances.text.setData(col1);
                $("#advantage_id").val(advantage_id);
                $("#image1").attr("src", '{{asset('storage/advantage')}}/' + advantage_logo);

            })
        })
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

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('input[name=toggle]').change(function () {
                let mode = $(this).prop('checked');
                let id = $(this).val();

                let productObj = {};
                productObj.mode = $(this).prop('checked');
                productObj.advantage_id = $(this).val();
                productObj._token = '{{csrf_token()}}';

                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ route('update.admin.advantage.status') }}",
                    data: productObj,
                    success: function (data) {
                    }
                });
            });
        })
    </script>

@endsection
