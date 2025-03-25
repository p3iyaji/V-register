@extends('layout.layout')

@php
    $title = 'Employees List';
    $subTitle = 'Employees List';
@endphp

@section('content')
    @livewire('employees-list')
@endsection