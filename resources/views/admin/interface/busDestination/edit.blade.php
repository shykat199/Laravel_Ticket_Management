@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Update Bus Destination
@endsection
@section('admin.content')
    <form action="{{route('update.admin.bus_destination',$busDestination->id)}}" method="post">
        @method('POST')
        @csrf

        <label class="form-label" for="validationCustom01">Bus Company</label>
        <div class="form-floating mb-3">
            <select name="" class="form-control select2" data-toggle="select2" id="busCompanyy">
                <option selected>Select A Company</option>
                @foreach($allBusCompany as $company)
                    <option value="{{$company->id}}"
                        {{$company->id===$busDestination->busDetails->busCompany->id ? 'selected':''}}>
                        {{$company->bus_company}}
                    </option>
                @endforeach

            </select>
        </div>
        <label class="form-label" for="validationCustom01">Bus Coach Number</label>
        <div class="form-floating mb-3">

            <select name="bus_details_id" class="form-control select2" data-toggle="select2" id="busCoach">
                {!! getBusCoach($busDestination->busDetails->company_id,$busDestination->busDetails->id) !!}
            </select>
        </div>
        @error('bus_details_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="form-floating mb-3">
            <input type="text" value="{{$busDestination->starting_point}}" name="starting_point" class="form-control"
                   id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Starting Point</label>
        </div>
        @error('starting_point')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
        <div class="form-floating mb-3">
            <input type="text" value="{{$busDestination->arrival_point}}" name="arrival_point" class="form-control"
                   id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Arrival Point</label>
        </div>
        @error('arrival_point')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="form-floating mb-3">
            <input type="time" value="{{$busDestination->departure_time}}" name="departure_time" class="form-control"
                   id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Departure time</label>
        </div>
        @error('departure_time')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <div class="form-floating mb-3">
            <input type="number" value="{{$busDestination->arrival_time}}" name="arrival_time" class="form-control"
                   id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Arrival time (Hours)</label>
        </div>
        @error('arrival_time')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>


        <div class="form-floating mb-3">
            <input type="number" value="{{$busDestination->ticket_price}}" name="ticket_price" class="form-control"
                   id="floatingInput" placeholder="Post Title"/>
            <label for="floatingInput">Per Seat Price</label>
        </div>
        @error('ticket_price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

    </script>
@endsection
