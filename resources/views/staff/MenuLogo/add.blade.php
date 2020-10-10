@extends('staff.layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Menu/Logo</h3></div>
        <div class="panel-body">
            <form action="{{ url('/addmenu')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->restaurant_id }}">
                <div class="form-group">    
                    <div class="input-group">
                        <div class="custom-file">
                            <label class="custom-file-label">Choose Your Logo </label>
                            <input type="file" name="logo" id="inpFile" class="custom-file-input @error('logo') is-invalid @enderror">
                            
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">    
                    <div class="input-group">
                        <div class="custom-file">
                            <label class="custom-file-label">Choose Your Menu (PDF) </label>
                            <input type="file" name="pdf" id="inpFile" class="custom-file-input @error('pdf') is-invalid @enderror">
                            
                            @error('pdf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group bi-form-controls">
                    <div class="col-md-9 ">
                        <button type="submit" class="btn btn-success"  value="save" name="action">SAVE </button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
@endsection