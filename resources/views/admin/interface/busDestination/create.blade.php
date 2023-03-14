@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Bus Destination
@endsection
@section('admin.content')
    <form action="{{route('post.admin.bus_destination')}}" method="post">
        @method('POST')
        @csrf

        <label class="form-label" for="validationCustom01">Bus Company</label>
        <div class="form-floating mb-3">
            <select name="" class="form-control select2" data-toggle="select2" id="busCompanyy">
                <option selected>Select A Company</option>
                @foreach($allBusCompany as $company)
                    <option value="{{$company->id}}">{{$company->bus_company}}</option>
                @endforeach

            </select>
        </div>


        <label class="form-label" for="validationCustom01">Bus Coach Number</label>
        <div class="form-floating mb-3">
            <select name="bus_details_id" class="form-control select2" id="busCoach" data-toggle="select2">
                <option selected>Select Bus Coach</option>
            </select>
        </div>
        @error('bus_details_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="form-floating mb-3">
            <input type="text" name="starting_point" class="form-control" id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Starting Point</label>
        </div>
        @error('starting_point')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-floating mb-3">
            <input type="text" name="arrival_point" class="form-control" id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Arrival Point</label>
        </div>
        @error('arrival_point')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="form-floating mb-3">
            <input type="time" name="departure_time" class="form-control" id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Departure time</label>
        </div>
        @error('departure_time')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="form-floating mb-3">
            <input type="time" name="arrival_time" class="form-control" id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Arrival time</label>
        </div>
        @error('arrival_time')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>


        <div class="form-floating mb-3">
            <input type="number" name="ticket_price" class="form-control" id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Per Seat Price</label>
        </div>
        @error('ticket_price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <button type="submit" class="btn btn-success">Create</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

    </script>
@endsection
