@extends('layout.layout')

@php
    $title = 'Visitors List';
    $subTitle = 'Visitors List';
@endphp

@section('content')
    @livewire('visitors-list')
@endsection