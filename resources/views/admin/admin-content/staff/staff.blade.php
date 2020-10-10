@extends('admin.layout.main')
@section('content')
@include('validation.messages')
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($staffs) > 0)
              @foreach ($staffs as $staff)
                <tr>
                    <td>{{$staff->firstname}}</td>
                    <td>{{$staff->lastname}}</td>
                    <td>{{$staff->email}}</td>
                    <td>
                        <a href="{{ url('/staffadd') }}/{{ $staff->id }}" class="ibtn btn-icon"> <i class="fas fa-pen" rel="tootltip"  aria-hidden="true" title="Edit"></i> </a>
                        <a href="{{ url('/staffpassword') }}/{{ $staff->id }}" class="ibtn btn-icon"> <i class="fas fa-lock" rel="tootltip"  aria-hidden="true" title="Change Password" style="margin-left: 2vh;"></i> </a>  
                        <a href="{{ url('/staffdelete') }}/{{ $staff->id }}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fas fa-trash" rel="tootltip" title="Delete" style="margin-left: 2vh;"></i> </a>
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