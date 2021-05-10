@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    @role('admin|registrar')
        @include('layouts.headers.cards')
    @else
        @include('layouts.headers.announcement')
    @endrole

@endsection