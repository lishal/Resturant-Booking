@extends('staff.layout.main')
@section('content')
@include('validation.messages')
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Available Customer</h3></div>
        <div class="panel-body">  
            <div class="table-responsive">
                <table class="table">
                    <thead >
                        <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Arrival Time</th>
                        <th scope="col">Table Number</th>
                        <th scope="col">Table Type</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($customers) > 0)
                        @foreach ($customers as $customer)
                        @if($customer->status==1)
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->phonenumber}}</td>
                                <td>{{$customer->arrival_time}}</td>
                                <td>{{$customer->seat_name}}</td>
                                <td>{{$customer->seat_type}}</td>
                                
                                <td>
                                    <a href="{{ url('/customerStatus') }}/{{$customer->id}}" onclick="return confirmCustomer()" class="ibtn btn-icon"> <i class='fas fa-sync-alt' title="Customer Left?"></i> </a>
                                </td>

                            </tr>
                        @endif

                        @endforeach
                        @else
                            <tr>
                            <td>No Record Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection