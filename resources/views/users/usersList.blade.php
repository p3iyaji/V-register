@extends('layout.layout')

@php
    $title = 'Users List';
    $subTitle = 'Users List';
@endphp

@section('content')
    @livewire('user-list')
@endsection