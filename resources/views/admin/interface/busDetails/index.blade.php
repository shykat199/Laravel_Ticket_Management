@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Bus Company
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Bus &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}
    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel">Add New Bus</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post.admin.bus_details')}}" method="post">
                        @csrf
                        <label class="form-label" for="validationCustom01">Bus Coach Number</label>
                        <input type="text" name="bus_coach" class="form-control" id="validationCustom01"
                               placeholder="Bus Coach Number....">

                        @error('bus_coach')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Bus Company</label>
                        <div class="form-floating mb-3">
                            <select name="company_id" class="form-control select2" data-toggle="select2">
                                <option selected>Select A Bus Company</option>
                                @foreach($allCompanies as $companies)
                                    <option value="{{$companies->id}}">{{$companies->bus_company}}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('company_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Bus Type</label>
                        <div class="form-floating mb-3">
                            <select name="bus_type" class="form-control select2" data-toggle="select2">
                                <option selected>Select A Bus Type</option>
                                @foreach($values as $value)
                                    <option value="{{$value}}">{{$value}}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('bus_type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>

                        <label class="form-label" for="validationCustom01">Bus Seat Number</label>
                        <input type="number" name="bus_seat" class="form-control" id="validationCustom01"
                               placeholder="Bus Seat....">

                        @error('bus_seat')
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
            <th>Bus Coach</th>
            <th>Bus Seat</th>
            <th>Bus Company</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allBusDetails as $bus)
            <tr>
                <td>{{$idx++}}</td>
                <td class="bus_coach" data-id="{{$bus->id}}">{{$bus->bus_coach}} &nbsp;&nbsp; ( {{$bus->bus_type}} )</td>
                <td class="bus_seat">{{$bus->bus_seat}}</td>
                <td class="company_name">{{$bus->busCompany->bus_company}}</td>
                <td class="company_status">
                    <input id="switch-primary-{{$bus->id}}" value="{{$bus->id}}" type="checkbox"
                           name="toggle" class="toggle-class" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        {{$bus->status === 1 ? 'checked' : ''}}>

                    <label for="switch-primary-{{$bus->id}}"></label>
                </td>
                <td>
                    <a href="{{route('post.admin.bus_details.edit',$bus->id)}}" class="btn btn-warning btnEdit"><i class=" fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('delete.admin.bus_details',$bus->id)}}" class="btn btn-danger"><i class=" fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {

            $(document).ready(function () {
                $('input[name=toggle]').change(function () {
                    let mode = $(this).prop('checked');
                    let id = $(this).val();

                    let productObj = {};
                    productObj.mode = $(this).prop('checked');
                    productObj.bus_id = $(this).val();
                    productObj._token = '{{csrf_token()}}';
                    console.log(1);

                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: "{{ route('update.admin.bus.status') }}",
                        data: productObj,
                        success: function (data) {
                            console.log(1);
                        }
                    });
                });
            })
        })
    </script>
@endsection
