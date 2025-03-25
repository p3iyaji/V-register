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
                                <div class="item-center justify-center mb-2">
                                    <img src="{{ asset('storage/'.$visitor->image) }}" alt="Visitor Image" class="w-24 h-24 rounded-lg">
                                </div>
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
                    <button type="button" onclick="window.location.href='{{ route('visitorsList') }}'" class="btn btn-warning bg-warning-500 text-white dark:bg-warning-600/25 dark:text-warning-400 hover:bg-warning-600 dark:hover:bg-warning-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        Go back
                    </button>

                    <!-- Visitor's Details Button -->
                    <button type="button" onclick="window.location.href='{{ route('editVisitor', $visitor->id) }}'" class="btn btn-primary border border-primary-600 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Update Visitor
                    </button>

                    <!-- Accept Button -->
                    @if($visitor->status == 'pending')
                    <button type="button" onclick="window.location.href='{{ route('acceptVisitor', $visitor->id) }}'" class="btn btn-success bg-success-500 text-white dark:bg-success-600/25 dark:text-success-400 hover:bg-success-600 dark:hover:bg-success-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Accept
                    </button>
                    <!-- Reject Button -->
                    <button type="button" onclick="window.location.href='{{ route('rejectVisitor', $visitor->id) }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reject
                    </button>
                    @elseif($visitor->status == 'rejected')
                    <button type="button" onclick="window.location.href='{{ route('acceptVisitor', $visitor->id) }}'" class="btn btn-success bg-success-500 text-white dark:bg-success-600/25 dark:text-success-400 hover:bg-success-600 dark:hover:bg-success-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                        Accept
                    </button>
                    @elseif($visitor->status == 'accepted')
                    <button type="button" onclick="window.location.href='{{ route('rejectVisitor', $visitor->id) }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Reject
                    </button>
                    @endif
                </div>
           
                <div>
                    <hr class="my-4">
                    <h3 class="text-2xl font-semibold mb-2 text-gray-600 dark:text-gray-400 text-center">Visit Status</h3>
                    @if($visitor->status == 'accepted')
                    <p class="text-lg font-semibold mb-2">Check-in: 
                        <span class="text-success-600 dark:text-success-300">
                            {{ $visitor->check_in ? $visitor->check_in : 'Not checked in' }}
                        </span>
                    </p>
                    @elseif($visitor->status == 'rejected')
                    <p class="text-lg font-semibold mb-2">Check-in: 
                    <span class="text-success-600 dark:text-success-300 line-through">
                            {{ $visitor->check_in ? $visitor->check_in : 'Not checked in' }}
                        </span>
                    </p>
                    @endif

                    <p class="text-lg font-semibold mb-2">Check-out: 
                        <span class="text-danger-600 dark:text-danger-300">
                            {{ $visitor->check_out ? $visitor->check_out : 'Not checked out' }}
                        </span>
                    </p>
                    <p class="text-lg font-semibold mb-2">Approved/Rejected by: <span class="text-gray-600 dark:text-gray-300">{{ $visitor->approved_by }}</span></p>
                    @if($visitor->status == 'accepted')
                        <button type="button" onclick="openVisitorCardModal('{{ route('generateVisitorCard', $visitor->id) }}')" 
                            class="btn btn-primary bg-primary-500 text-white dark:bg-primary-600/25 dark:text-primary-400 hover:bg-primary-600 dark:hover:bg-primary-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>
                            Generate Visitor Card
                        </button>
                    @elseif($visitor->status == 'pending')
                        <button type="button" class="btn btn-warning bg-warning-500 text-white dark:bg-warning-600/25 dark:text-warning-400 hover:bg-warning-600 dark:hover:bg-warning-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Pending
                        </button>
                    @elseif($visitor->status == 'rejected')
                        <button type="button" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-4 py-3 rounded-lg w-full flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Rejected
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div id="visitorCardModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                Visitor ID Card
                            </h3>
                            <div id="cardContent" class="bg-white p-4 rounded-lg shadow-md">
                                <!-- Card will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="printVisitorCard()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Print Card
                    </button>
                    <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openVisitorCardModal(url) {
            // Show loading state
            document.getElementById('cardContent').innerHTML = `
                <div class="flex justify-center items-center h-64">
                    <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            `;
            
            // Show modal
            document.getElementById('visitorCardModal').classList.remove('hidden');
            
            // Load card content via AJAX
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('cardContent').innerHTML = html;
                })
                .catch(error => {
                    document.getElementById('cardContent').innerHTML = `
                        <div class="text-red-500 p-4">Error loading visitor card: ${error.message}</div>
                    `;
                });
        }

        function closeModal() {
            document.getElementById('visitorCardModal').classList.add('hidden');
        }

        function printVisitorCard() {
            const printContent = document.getElementById('cardContent').innerHTML;
            const originalContent = document.body.innerHTML;
            
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            
            // Re-attach event listeners if needed
            window.location.reload();
        }

        // Close modal when clicking outside
        document.getElementById('visitorCardModal').addEventListener('click', function(e) {
            if (e.target.id === 'visitorCardModal') {
                closeModal();
            }
        });
    </script>
@endsection