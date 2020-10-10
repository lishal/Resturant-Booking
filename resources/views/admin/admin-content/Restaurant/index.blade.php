@extends('admin.layout.main')
@section('content')
@include('validation.messages')
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Restaurant Name</th>
              <th scope="col">Restaurant Owner</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Location</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($restaurant_details) > 0)
              @foreach ($restaurant_details as $restaurant_detail)
                <tr>
                    <td>{{$restaurant_detail->restaurant_name}}</td>
                    <td>{{$restaurant_detail->firstname}}&nbsp;{{$restaurant_detail->lastname}}</td>
                    <td>{{$restaurant_detail->phone_number}}</td>
                    <td>{{$restaurant_detail->location}}</td>
                    <td>
                        <a href="{{ url('/addrestaurant') }}/{{$restaurant_detail->restaurant_id}}" class="ibtn btn-icon"> <i class="fas fa-pen" rel="tootltip"  aria-hidden="true" title="Edit"></i> </a>
                      <a href="{{ url('/restaurantdelete') }}/{{$restaurant_detail->restaurant_id}}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fas fa-trash" rel="tootltip" title="Delete" style="margin-left: 2vh;"></i> </a>
                    </td>

                </tr>
              @endforeach
            @else
                <tr>
                  <td>No Record Found!</td>
                </tr>
            @endif
          </tbody>
    </table>
  </div>

@endsection