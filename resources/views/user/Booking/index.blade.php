@extends('user.layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="card text-white bg-info mb-3" style="max-width: 100rem; width:100%; margin-top:5%; ">
            <div class="card-header">Book Your Seat Restaurant</div>
            <div class="card-body">
                
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/bookrestaurant') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->restaurant_id }}">
                    <input type="hidden" name="customer_id" id="customer_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">

                        <label for="seat">Seat *</label>
                        
                                <select class="form-control" name="seat">
                                <option value="{{ old('seat')==""?'selected':''}} ">Please select</option>
                                @foreach($tableSeat as $tableSeat)
                                    
                                    @if($tableSeat->status ==0)
                                        <option value="{{$tableSeat->id}}" {{ $tableSeat->restaurant_id ? 'selected': ''}} >{{$tableSeat->seat_name}} ({{$tableSeat->seat_type}})</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('seat')
                                <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="arrival_time">Arrival Time *</label>
                        <input class="form-control" type="time" id="arrival_time" name="arrival_time">
                        @error('arrival_time')
                            <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group bi-form-controls">
                        <div class="col-md-9 ">
                            <button type="submit" class="btn btn-success"  value="save" name="action">Book Now </button>
                        </div>
                    </div>  
                </form>
            </div>
          </div>
    </div>
</div>


@endsection
