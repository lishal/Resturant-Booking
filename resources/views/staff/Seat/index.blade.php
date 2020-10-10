@extends('staff.layout.main')
@section('content')
@include('validation.messages')
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Seat</h3></div>
        <div class="panel-body">
            <a href="{{url('/addSeat')}}/{{{Auth::user()->id }}}" class="btn btn-primary" style="margin-bottom: 10px;">Add Seat</a>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Seat Name</th>
                        <th scope="col">Seat Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tableSeat) > 0)
                        @foreach ($tableSeat as $tableSeat)
                            <tr>
                                <td>{{$tableSeat->seat_name}}</td>
                                <td>{{$tableSeat->seat_type}}</td>
                                @if($tableSeat->status == 0)
                                <td class="text-success">Available</td>
                                @else
                                <td class="text-danger">Not Available</td>
                                @endif
                                <td>
                                    
                                    <a href="{{ url('/changestatus') }}/{{$tableSeat->id}}" class="ibtn btn-icon"> <i class='fas fa-sync-alt' title="Change Status"></i> </a>
                                    {{-- <a href="{{ url('/addrestaurant') }}/{{$tableSeat->id}}" class="ibtn btn-icon"> <i class="fas fa-pen" rel="tootltip"  aria-hidden="true" title="Edit"style="margin-left: 2vh;"></i> </a> --}}
                                    <a href="{{ url('/deleteseat') }}/{{$tableSeat->id}}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fas fa-trash" rel="tootltip" title="Delete" style="margin-left: 2vh;"></i> </a>
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

        </div>
    </div>
@endsection