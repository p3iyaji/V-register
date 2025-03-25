@extends('layout.layout')

@php
    $title = 'Departments List';
    $subTitle = 'Departments List';
@endphp

@section('content')
    @livewire('department-list')
@endsection