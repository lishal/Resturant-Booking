@extends('user.layouts.main')
@section('content')
<iframe src="{{asset('uploads/pdf')}}/{{$menu->menu}}"></iframe>
@endsection