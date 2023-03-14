@extends('admin.interface.layout.master_admin')
@section('admin.title')
    All Bus Destination
@endsection
@section('admin.content')

    <div class="mb-2">
        <a href="{{route('admin.bus_destination.create')}}" class="btn btn-primary">Add New
            Destination &nbsp; &nbsp; <i class="fa-solid fa-circle-plus"></i></a>
    </div>


    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>Company Name</th>
            <th>Coach Name</th>
            <th>Seat Price</th>
            <th>From</th>
            <th>To</th>
            <th>Starting Time</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allBusDestination as $destination)
            <tr>
                <td>{{$idx++}}</td>
                <td>{{$destination->busDetails->busCompany->bus_company}}</td>
                <td>{{$destination->busDetails->bus_coach}}</td>
                <td>{{$destination->ticket_price}}</td>
                <td>{{$destination->starting_point}}</td>
                <td>{{$destination->arrival_point}}</td>
                <td>{{$destination->departure_time}}</td>

                <td>
                    <a href="{{route('blog.show',$destination->id)}}" class="btn btn-warning "><i
                            class="fa-solid fa-eye"></i></a>
                    <a href="{{route('blog.edit',$destination->id)}}" class="btn btn-primary "><i
                            class=" fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('admin.blog.delete',$destination->id)}}" class="btn btn-danger"><i
                            class=" fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
