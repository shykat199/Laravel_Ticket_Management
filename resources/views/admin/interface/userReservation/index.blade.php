@extends('admin.interface.layout.master_admin')
@section('admin.title')
    User Reservation
@endsection
@section('admin.content')


    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#Id</th>
            <th>User Name</th>
            <th>Starting Point</th>
            <th>Bus Company</th>
            <th>Bus Coach</th>
            <th>Date Of Journey</th>
            <th>Time</th>
            <th>Payment</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        @php
            $idx=1;
        @endphp
        @foreach($allReservations as $reservation)
            <tr>
                <td>{{$idx++}}</td>
                <td class="member_name">{{$reservation->users->name}}</td>
                <td class="member_name">{{$reservation->destinations->starting_point}}</td>
                <td class="member_name">{{$reservation->destinations->busDetails->busCompany->bus_company}}</td>
                <td class="member_name">{{$reservation->destinations->busDetails->bus_coach}}</td>
                <td class="member_name">{{\Carbon\Carbon::parse($reservation->departure_date)->format('Y-m-d')}}</td>
                <td class="member_name">{{\Carbon\Carbon::parse($reservation->departure_date)->format('g:i a')}}</td>
                <td class="member_name">
                    <h4><span class="badge bg-success">Paid</span></h4>
                </td>

                <td>

                    <a href="{{route('admin.user.reservation.delete',$reservation->id)}}" class="btn btn-danger"><i
                            class=" fa-solid fa-trash"></i></a>
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
