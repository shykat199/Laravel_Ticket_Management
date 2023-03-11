@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Team Member
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Member &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Member</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.team.update')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label" for="validationCustom01">Member Name</label>
                        <input type="text" name="member_name" class="form-control" id="member_name"
                               placeholder="Member Name....">

                        @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        @php
                            $roles=['S.E.O','Top Manager','PR-Manager']
                        @endphp

                        <label class="form-label" for="validationCustom01">Member Role</label>
                        <select name="member_role" class="form-control select2" data-toggle="select2">
                            <option selected>Select Member Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role}}">{{$role}}</option>
                            @endforeach
                        </select>

                        @error('member_role')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label for="formFile" class="form-label">Member Image</label>
                        <input class="form-control" name="member_image" type="file" id="post_image"
                               onchange="readUrl1(this)">
                        <img class="mt-2" id="image" src="#" alt=""/>

                        @error('member_image')
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
            <th>Member Name</th>
            <th>Member Role</th>
            <th>Member Image</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allTeams as $team)
            <tr>
                <td>{{$idx++}}</td>
                <td class="member_name" data-id="{{$team->id}}">{{$team->member_name}}</td>
                <td class="member_role">{{$team->member_role}}</td>
                <td>
                    <img class="member_image" data-idd="{{$team->member_image}}"
                         src="{{asset('storage/image/'.$team->member_image)}}" alt="" style="height: 80px;width: 80px">
                </td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i
                            class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('admin.team.delete',$team->id)}}" class="btn btn-danger"><i
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
                    <form action="{{route('admin.team.update')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="team_id" id="team_id">

                        <label class="form-label" for="validationCustom01">Member Name</label>
                        <input type="text" name="member_name" class="form-control" id="name"
                               placeholder="Member Name....">

                        @php
                            $roles=['S.E.O','Top Manager','PR-Manager']
                        @endphp

                        <label class="form-label" for="validationCustom01">Member Role</label>
                        <select id="select_role" name="member_role" class="form-control select2" data-toggle="select2">
                            <option selected>Select Member Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role}}">{{$role}}</option>
                            @endforeach
                        </select>

                        <label for="formFile" class="form-label">Member Image</label>
                        <input class="form-control" name="member_image" type="file" id="post_image"
                               onchange="readUrl1(this)">
                        <img class="mt-2" id="image1" src="" alt="" style="height: 80px; width: 80px;"/>

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
                let col1 = currentRow.find('.member_name').html(); //name
                let member_id = currentRow.find('.member_name').data('id'); //id
                let role = currentRow.find('.member_role').html();//role
                let image = currentRow.find('.member_image').data('idd');//image

               // console.log(col1);

                $("#name").val(col1);
                $("#team_id").val(member_id);
                $("#image1").attr("src", '{{asset('storage/image')}}/' + image);
                $("#select_role").val(role).change();
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
    </script>
@endsection
