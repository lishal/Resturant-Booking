@extends('admin.layout.main')
@section('content')
    <div class="container">
        @if($restaurant->restaurant_id<=0)
        <h2>Add Restaurant</h2>
        @else
        <h2>Update Restaurant Detail </h2>
        @endif
        <form method="POST" action="{{ url('/restaurantsave')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->restaurant_id }}">
                    <label for="restaurant_name">Restaurant Name*</label>
                    <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror" id="restaurant_name" placeholder="Enter Restaurant Name" name="restaurant_name"
                    value="{{ old('restaurant_name')? old('restaurant_name'): ($restaurant->restaurant_name? $restaurant->restaurant_name: '') }}" >
                    @error('restaurant_name')
                            <span  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="restaurant_owner">Owner Name*</label>
                        <select class="form-control @error('restaurant_owner') is-invalid @enderror" name="restaurant_owner">
                            <option value="" {{ old('restaurant_owner')==""?'selected':''}} >Please select</option>
                            @foreach($staffs as $staff)
                                @if(old('restaurant_owner'))
                                    <option value="{{$staff->id}}" {{ old('restaurant_owner') == $staff->id? 'selected': ''}} >{{$staff->firstname}}</option>
                                @else
                                    <option value="{{$staff->id}}" {{ $staff->id == $staff->id? 'selected': ''}} >{{$staff->firstname}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('restaurant_owner')
                            <span  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number*</label>
                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" 
                    value="{{ old('phone_number')? old('phone_number'): ($restaurant->phone_number? $restaurant->phone_number: '') }}">
                    @error('phone_number')
                            <span  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location">Location*</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="Restaurant Location" name="location"
                    value="{{ old('location')? old('location'): ($restaurant->location? $restaurant->location: '') }}">
                    @error('location')
                            <span  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group long_description">
                    <label for="description">Short Description*</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Short Description" id="description" name="description" rows="6" >{{ old('description')? old('description'): ($restaurant->description? $restaurant->description: '') }}</textarea>
                        @error('description')
                            <span  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                @if($restaurant->restaurant_id==0)
                <div class="form-group">    
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" id="inpFile" class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label">Choose File </label>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="form-group bi-form-controls">
                    <div class="col-md-9 ">
                        @if($restaurant->restaurant_id=='')
                        <button type="submit" class="btn btn-success"  value="save" name="action">SAVE </button>
                        @else
                        <button type="submit" class="btn btn-success"  value="save" name="action">Update </button>
                        @endif
                    </div>
                </div> 
            </div>   
        </form>
    </div>
  @endsection