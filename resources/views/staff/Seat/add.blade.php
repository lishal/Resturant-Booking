@extends('staff.layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Seat</h3></div>
        <div class="panel-body">
            <form action="{{ url('/addseatsave')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->restaurant_id }}"  >
                <div class="form-group">
                    
                    <label for="seat">Seat Name*</label>
                    <input type="text" class="form-control @error('seat') is-invalid @enderror" placeholder="Seat Name" name="seat">
                    {{-- value="{{ old('seat')? old('location'): ($restaurant->location? $restaurant->location: '') }}"> 
                    
                    --}}
                    @error('seat')
                            <span style="color: #BE3636 ;"  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="seat_type">Seat_type *</label>
                    
                            <select class="form-control" name="seat_type">
                            {{-- <option value="{{ old('movie_id')==""?'selected':''}} ">Please select</option> --}}
                            {{-- @foreach($movies as $movie)
                                    <option value="{{$movie->id}}" {{ $movie->id == $showtime->movie_id? 'selected': ''}} >{{$movie->movie_name}}</option>
                            @endforeach --}}
                            <option value="{{ old('seat_type')==""?'selected':''}} ">Please select</option>
                            <option value="Couple Seat" {{ 'Couple Seat'? 'selected': ''}} >Couple Seat</option>
                            <option value="Family Seat" {{ 'Family Seat'? 'selected': ''}} >Family Seat</option>
                            <option value="Big Family Seat" {{ 'Big Family Seat'? 'selected': ''}} >Big Family Seat</option>
                        </select>
                        @error('seat_type')
                            <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                </div>
                <div class="form-group bi-form-controls">
                    <div class="col-md-9 ">
                        {{-- @if($restaurant->restaurant_id=='') --}}
                        <button type="submit" class="btn btn-success"  value="save" name="action">SAVE </button>
                        {{-- @else --}}
                        {{-- <button type="submit" class="btn btn-success"  value="save" name="action">Update </button>
                        @endif --}}
                    </div>
                </div>         
       
            </form>
        </div>
    </div>
@endsection