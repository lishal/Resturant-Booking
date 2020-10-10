@extends('staff.layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading"><h3>Menu/Logo</h3></div>
        <div class="panel-body">
            <a href="{{url('/addMenuLogo')}}/{{{Auth::user()->id }}}" class="btn btn-primary" style="margin-bottom: 10px;"> Add Menu/Logo</a>
            <div class="table-responsive">
                <table class="table">
                    <thead >
                        <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">LOGO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($menu) > 0)
                        @foreach ($menu as $menu)
                            <tr>
                                <td>
                                    <a href="{{asset('uploads/pdf')}}/{{$menu->menu}}"  class="ibtn btn-icon" target="_blank"> <i class="fas fa-eye" rel="tootltip" title="View Menu" style="height: 100px; width:100px;"></i> </a>
                                </td>
                                
                                <td><img src="{{asset('uploads/logo')}}/{{$menu->logo}}" height="100px;" width="100px;"></td>
                                
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