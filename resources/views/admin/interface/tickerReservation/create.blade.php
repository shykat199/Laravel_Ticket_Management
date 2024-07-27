@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Bus Destination
@endsection
@section('admin.content')
    <form action="{{route('admin.reservation.step-one')}}" method="post">
        @method('POST')
        @csrf

        <label class="form-label" for="validationCustom01">Bus Company</label>
        <div class="form-floating mb-3">
            <select name="" class="form-control select2" data-toggle="select2" id="bCompany">
                <option selected>Select A Company</option>
                @foreach($allBusCompany as $company)
                    <option value="{{$company->id}}">{{$company->bus_company}}</option>
                @endforeach

            </select>
        </div>

{{--        <label class="form-label" for="validationCustom01">Bus Coach Number</label>--}}
{{--        <div class="form-floating mb-3">--}}
{{--            <select name="bus_details_id" class="form-control select2" id="busCoach" data-toggle="select2">--}}
{{--                <option selected>Select Bus Coach</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        @error('bus_details_id')--}}
{{--        <span class="text-danger">{{$message}}</span>--}}
{{--        @enderror--}}
{{--        <br>--}}

        <label class="form-label" for="validationCustom01">Starting Point</label>
        <div class="form-floating mb-3">
            <select name="starting_point" class="form-control select2" data-toggle="select2" id="bStarting">
                <option selected>Select Arrival Point</option>
                @foreach($allbusStartingPoint as $startingPoint)
                    <option value="{{$startingPoint}}">{{$startingPoint->starting_point}}</option>
                @endforeach

            </select>
        </div>
        @error('starting_point')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <label class="form-label" for="validationCustom01">Destination Point</label>
        <div class="form-floating mb-3">
            <select name="arrival_point" class="form-control select2" data-toggle="select2" id="bDropping">
                <option selected>Select Destination Point</option>
                @foreach($allbusArrivalPoint as $arrivalPoint)
                    <option value="{{$arrivalPoint}}">{{$arrivalPoint->arrival_point}}</option>
                @endforeach

            </select>
        </div>
        @error('arrival_point')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <button type="submit" class="btn btn-success">GoTo Next</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

    </script>



@endsection
