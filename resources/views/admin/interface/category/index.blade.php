@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Categories
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Category &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post.admin.category')}}" method="post">
                        @csrf
                        <label class="form-label" for="validationCustom01">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="validationCustom01"
                               placeholder="Category Name....">

                        @error('category_name')
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

    {{--End Add Category Modal--}}

    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>Category Name</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allCategory as $category)
            <tr>
                <td>{{$idx++}}</td>
                <td class="category_name" data-id="{{$category->id}}">{{$category->category_name}}</td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('delete.admin.category',$category->id)}}" class="btn btn-danger"><i class=" fa-solid fa-trash"></i></a>
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
                    <form action="{{route('update.admin.category')}}" method="post">
                        @csrf

                        <input type="hidden" name="category_id" id="cat_id">

                        <label class="form-label" for="validationCustom01">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="cat_name"
                               placeholder="Category Name....">

                        @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function (){
            $('.btnEdit').on('click',function (){
                let currentRow=$(this).closest('tr');
                let col1=currentRow.find('.category_name').html();
                let category_id=currentRow.find('.category_name').data('id');

                $("#cat_id").val(category_id);
                $("#cat_name").val(col1);
            })
        })
    </script>
@endsection
