@extends('layout.layout')
@php
    $title='Visitor Details';
    $subTitle = 'Visitor Details';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 justify-center">
            <!-- First Table -->
            <div class="col-span-1">
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table sm-table mb-0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('storage/'.$visitor->image) }}" alt="Visitor Image" class="w-24 h-24 rounded-lg object-cover"></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td class="font-bold">{{ $visitor->title }} {{ $visitor->first_name }} {{ $visitor->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $visitor->gender }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $visitor->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $visitor->phone }}</td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td>{{ $visitor->company_name }}</td>
                            </tr>
                            <tr>
                                <th>National ID No</th>
                                <td>{{ $visitor->national_id_no }}</td>
                            </tr>
                            <tr>
                                <th>Purpose</th>
                                <td>{{ $visitor->purpose }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $visitor->address }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $visitor->created_at->format('d M Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Second Table -->
            <div class="col-span-1 border border-gray-200 dark:border-gray-600 rounded-lg p-4">
                <div class="flex flex-col gap-3 w-1/2">
                    <!-- Go Back Button -->
                    <button type="button" onclick="window.location.href='{{ route('preRegistersList') }}'" class="btn btn-warning bg-warning-500 text-white dark:bg-warning-600/25 dark:text-warning-400 hover:bg-warning-600 dark:hover:bg-warning-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        Go back
                    </button>

                    <!-- Visitor's Details Button -->
                    <button type="button" onclick="window.location.href='{{ route('editPreRegister', $visitor->id) }}'" class="btn btn-primary border border-primary-600 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Update Visitor
                    </button>

                    <!-- Accept Button -->
                    <button type="button" onclick="window.location.href='{{ route('editVisitor', $visitor->id) }}'" class="btn btn-success bg-success-500 text-white dark:bg-success-600/25 dark:text-success-400 hover:bg-success-600 dark:hover:bg-success-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Accept
                    </button>

                    <!-- Reject Button -->
                    <button type="button" onclick="window.location.href='{{ route('editVisitor', $visitor->id) }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reject
                    </button>
                </div>
           
                <div>
                    <hr class="my-4">
                    <h3 class="text-2xl font-semibold mb-2 text-primary-600 dark:text-primary-400">Visit Status</h3>
                    <p class="text-lg font-semibold mb-2">Check-in: <span class="text-gray-600 dark:text-gray-300">date time</span></p>
                    <p class="text-lg font-semibold mb-2">Check-out: <span class="text-gray-600 dark:text-gray-300">date time</span></p>
                    <p class="text-lg font-semibold mb-2">Approved/Rejected by: <span class="text-gray-600 dark:text-gray-300">blah blah</span></p>
                </div>
            </div>
        </div>
    </div>

@endsection