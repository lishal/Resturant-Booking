@extends('admin.layout.main')
@section('content')
@if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger"  id="error">
                {{$error}}
                <script>
                    setTimeout(function() {
                        $('#error').fadeOut("slow","swing")
                        
                    }, 3000);
                </script>
            </div>
            
        @endforeach
    @endif
    <div class="container">
        <h2>Update Staff Password</h2>
         <form method="POST" action="{{ url('/changepassword')}}/{{$staff->id}}">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <input type="hidden" name="staff_id" id="staff_id" value="{{ $staff->id }}">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Enter Your Password" name="password">
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password:</label>
                        <input type="password" class="form-control @error('confirmpassword') is-invalid @enderror" id="pwd" placeholder="Confirm Your Password" name="confirmpassword">
                        @error('confirmpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group bi-form-controls">
                        <div class="col-md-9 ">
                            <button type="submit" class="btn btn-success"  value="save" name="action">Update </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>>
@endsection