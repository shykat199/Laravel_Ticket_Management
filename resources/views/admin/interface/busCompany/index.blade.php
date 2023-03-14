@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Bus Company
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Company &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Company</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post.admin.company')}}" method="post">
                        @csrf
                        <label class="form-label" for="validationCustom01">Company Name</label>
                        <input type="text" name="bus_company" class="form-control" id="validationCustom01"
                               placeholder="Company Name....">

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
            <th>Company Name</th>
            <th>Coach Count</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allCompanies as $company)
            <tr>
                <td>{{$idx++}}</td>
                <td class="company_name" data-id="{{$company->id}}">{{$company->bus_company}}</td>
                <td class="coach_count">{{$company->total}}</td>
                <td class="company_status">
                    <input id="switch-primary-{{$company->id}}" value="{{$company->id}}" type="checkbox"
                           name="toggle" class="toggle-class" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        {{$company->status === 1 ? 'checked' : ''}}>
                </td>
                <td>
                    <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#centermodal1"><i class=" fa-solid fa-pen-to-square"></i></button>
                    <a href="{{route('delete.admin.company',$company->id)}}" class="btn btn-danger"><i class=" fa-solid fa-trash"></i></a>
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
                    <h4 class="modal-title" id="myCenterModalLabel">Update Company Name</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update.admin.company')}}" method="post">
                        @csrf

                        <input type="hidden" name="company_id" id="c_id">

                        <label class="form-label" for="validationCustom01">Company Name</label>
                        <input type="text" name="bus_company"  class="form-control" id="c_name"
                               placeholder="Company Name....">

                        @error('company_name')
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
                let company_name=currentRow.find('.company_name').html();
                let company_id=currentRow.find('.company_name').data('id');

                $("#c_name").val(company_name);
                $("#c_id").val(company_id);
            })
        })
    </script>

    <script>
        $(document).ready(function () {

            $('input[name=toggle]').change(function () {
                let mode = $(this).prop('checked');
                let id = $(this).val();

                let productObj = {};
                productObj.mode = $(this).prop('checked');
                productObj.company_id = $(this).val();
                productObj._token = '{{csrf_token()}}';

                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ route('update.admin.company.status') }}",
                    data: productObj,
                    success: function (data) {
                    }
                });
            });
        })
    </script>
@endsection
