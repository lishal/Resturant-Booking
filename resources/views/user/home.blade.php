@extends('user.layouts.main')
@section('content')
@include('validation.messages')
@include('user.layouts.slider')
<h1 style="text-align:center; font-family:Times New Roman, sans-serif;">Available Restaurant</h1> 
<div class="container">
    
    <div class="row">
      {{-- @foreach ($restaurants as $restaurant)
        <div class="col-sm-6" style="height:550; width:600px; ">
            <br>

                <div class="card">
                    <div class="row no-gutters">
                       
                            <img class="card-img-top" src="{{asset('slider/momo.jpg')}}"   >
                   
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title" style=" font-size:30px;">{{$restaurant->restaurant_name}}</h5>
                            <p class="card-text"></p>
                           
                            <a href="{{$restaurant->location}}" style=" font-size:25px; text-decoration:none;" target ="_blank" ><i class='fas fa-map-marker-alt'></i>{{$restaurant->restaurant_name}}</a>
                            <p class="card-text">Discription:<br>{{$restaurant->description}}</p>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            @endforeach --}}
            
            <div class="card-deck">
              @foreach ($restaurants as $restaurant)
              <div class="col-sm-6" style="margin-bottom: 20px;">
              <div class="card">
                @if($restaurant->image=="")
                <img class="card-img-top" src="{{asset('slider/noimage.jpg')}}" alt="{{$restaurant->restaurant_name}}" height="250px;" width="100px;">
                @else
                <img class="card-img-top" src="{{asset('uploads/company_images')}}/{{$restaurant->image}}" alt="{{$restaurant->restaurant_name}}" height="250px;" width="100px;">
                @endif
                <div class="card-body">
                  <h5 class="card-title" style="font-size:25px;text-align: center;"> {{$restaurant->restaurant_name}}</h5>
                  <p class="card-text" style="text-align: justify; font-size:18px;">
                    <a href="{{$restaurant->location}}" style=" font-size:20px; text-decoration:none;" target ="_blank" ><i class='fas fa-map-marker-alt'></i>&nbsp;Location of&nbsp;{{$restaurant->restaurant_name}}</a>
                    {{-- <br>Description:
                    <br>{{$restaurant->description}} --}}
                  </p>
                </div>
                <a href="{{ url('/restaurant') }}/{{ $restaurant->restaurant_id }}" style="text-decoration: none;">
                <div class="card-footer bg-success" style=" text-align:center;">
                  <small class="text-white" style="font-size: 20px;">More Info</small>
                </div>
                </a>
              </div>
            </div>
            @endforeach
            
            </div>
            
    </div>   
</div>
@endsection

