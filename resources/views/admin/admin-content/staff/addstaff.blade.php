@extends('admin.layout.main')
@section('content')
    <div class="container">
        @if($staff->id<=0)
        <h2>Add Staff</h2>
        @else
        <h2>Update Staff Detail </h2>
        @endif
        <form method="POST" action="{{ url('/staffadd')}}">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <input type="hidden" name="staff_id" id="staff_id" value="{{ $staff->id }}">
                    <label for="fname">Firstname:</label>
                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="Enter Your First name" name="fname" value="{{ old('fname')? old('fname'): ($staff->firstname? $staff->firstname: '') }}">
                    @error('fname')
                            <span  class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="lname">Lastname:</label>
                    <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" placeholder="Enter Your Last name" name="lname" value="{{ old('lname')? old('lname'): ($staff->lastname? $staff->lastname: '') }}">
                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email')? old('email'): ($staff->email? $staff->email: '') }}">
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                @if($staff->id<=0)
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Enter Your Password" name="password" autocomplete="off">
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                @endif
                <div class="form-group bi-form-controls">
                    <div class="col-md-9 ">
                        @if($staff->id=='')
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