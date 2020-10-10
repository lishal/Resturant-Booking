@extends('user.layouts.main')
@section('content')
<div class="container">

    <h1>Contact Us </h1>


        <div class="row">
            <div class="col-md-6">
            @if (Session:: has('flash_message'))
                <div class="alter alter-success">{{Session::get('flash_message')}}</div>
            @endif
                <form method="post" action="#">
                    {{csrf_field() }}
                <div class="form-group">
                    <label>Full Name: </label>
                    <input type="text" class="form-control" name="name">
                    @if ($errors->has('name'))
                        <small class="form-text invalide-feedback">{{$errors->first('name') }}</small>
                    @endif    
                </div>

                <div class="form-group">
                    <label>Email Address: </label>
                    <input type="text" class="form-control" name="email">
                    @if ($errors->has('email'))
                        <small class="form-text invalide-feedback">{{$errors->first('email') }}</small>
                    @endif 
                </div>

                <div class="form-group">
                    <label>Message: </label>
                    <textarea type="Message" class="form-control"></textarea>
                    @if ($errors->has('message'))
                        <small class="form-text invalide-feedback">{{$errors->first('message') }}</small>
                    @endif 
                </div>

                <button class="btn btn-primary">Submit</button>
            </div>   
        </div> 
         
</div>
@endsection