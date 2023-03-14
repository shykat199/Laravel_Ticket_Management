@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Update Bus Details
@endsection
@section('admin.content')

    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centermodal">Add New
            Bus &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></button>
    </div>

    {{--Start Add Category Center Modal--}}

    <form action="{{route('update.admin.bus_details',$bus->id)}}" method="post">
        @csrf
        <label class="form-label" for="validationCustom01">Bus Coach Number</label>
        <input type="text" name="bus_coach" value="{{$bus->bus_coach}}" class="form-control" id="validationCustom01"
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
                    <option value="{{$companies->id}}" {{$companies->id===$bus->company_id ? 'selected':''}}>{{$companies->bus_company}}</option>
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
                    <option value="{{$value}}" {{$value===$bus->bus_type ? 'selected': ''}}>{{$value}}</option>
                @endforeach

            </select>
        </div>
        @error('bus_type')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <label class="form-label" for="validationCustom01">Bus Seat Number</label>
        <input type="number" name="bus_seat" value="{{$bus->bus_seat}}" class="form-control" id="validationCustom01"
               placeholder="Bus Seat....">

        @error('bus_seat')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    {{--End Add Category Modal--}}

@endsection
