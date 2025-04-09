@extends('layout.layout')
@php
    $title='Dashboard';
    $subTitle = 'Visitor\'s Register';

@endphp

@section('content')

        <div class="grid grid-cols-1 3xl:grid-cols-12 gap-6">
            <div class="col-span-12 3xl:col-span-9">
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 2xl:col-span-3">
                        <div class="card border-0 p-4 shadow-[0_0.25rem_1.875rem_rgba(46,45,116,0.05)] rounded-lg h-full bg-gradient-to-l from-cyan-600/10 to-bg-white">
                            <div class="card-body p-0">
                                <div class="flex flex-wrap items-center justify-between gap-1 mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-12 h-12 bg-cyan-600/25 text-cyan-600 dark:text-cyan-600 flex-shrink-0 flex justify-center items-center rounded-full h6 mb-0">
                                            <i class="ri-group-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="font-semibold mb-0.5">{{ $totalTodayVisitors }}</h6>
                                            <span class="font-medium text-gray-600 text-sm">Total Visitors Today</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm mb-0 text-gray-600"><span class="text-cyan-600 dark:text-cyan-600">{{ $totalVisitors }}</span> Total Visitors</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 2xl:col-span-3">
                        <div class="card border-0 p-4 shadow-[0_0.25rem_1.875rem_rgba(46,45,116,0.05)] rounded-lg h-full bg-gradient-to-l from-lilac-600/10 to-bg-white">
                            <div class="card-body p-0">
                                <div class="flex flex-wrap items-center justify-between gap-1 mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-12 h-12 bg-lilac-600/25 text-lilac-600 dark:text-lilac-600 flex-shrink-0 flex justify-center items-center rounded-full h6 mb-0">
                                            <i class="ri-award-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="font-semibold mb-0.5">{{ $totalTodayPreRegistered }}</h6>
                                            <span class="font-medium text-gray-600 text-sm">Total Pre-Registers Today</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm mb-0 text-gray-600"><span class="text-lilac-600 dark:text-lilac-600">{{ $totalPreRegistered }}</span> Total Pre-Registered Visitors</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 2xl:col-span-3">
                        <div class="card border-0 p-4 shadow-[0_0.25rem_1.875rem_rgba(46,45,116,0.05)] rounded-lg h-full bg-gradient-to-l from-primary-600/10 to-bg-white">
                            <div class="card-body p-0">
                                <div class="flex flex-wrap items-center justify-between gap-1 mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-12 h-12 bg-primary-600/25 text-primary-600 dark:text-primary-600 flex-shrink-0 flex justify-center items-center rounded-full h6 mb-0">
                                            <i class="ri-group-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="font-semibold mb-0.5">{{ $totalCheckedIn }}</h6>
                                            <span class="font-medium text-gray-600 text-sm">Checked In Today</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 2xl:col-span-3">
                        <div class="card border-0 p-4 shadow-[0_0.25rem_1.875rem_rgba(46,45,116,0.05)] rounded-lg h-full bg-gradient-to-l from-success-600/10 to-bg-white">
                            <div class="card-body p-0">
                                <div class="flex flex-wrap items-center justify-between gap-1 mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="w-12 h-12 bg-success-600/25 text-success-600 dark:text-success-600 flex-shrink-0 flex justify-center items-center rounded-full h6 mb-0">
                                            <i class="ri-wallet-3-fill"></i>
                                        </span>
                                        <div>
                                            <h6 class="font-semibold mb-0.5">{{ $totalCheckedOut }}</h6>
                                            <span class="font-medium text-gray-600 text-sm">Checked Out Today</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @livewire('visitor-type-selector')

                    @if (auth()->user()->role == 'admin')
                    <!-- Earning Statistic -->
                    <div class="col-span-12 2xl:col-span-12">
                        <div class="card border-0 h-full">
                            <div class="card-header">
                                <!-- <div class="flex items-center gap-2 justify-between">
                                    <h6 class="mb-0 font-bold text-lg">Visitor's Statistic</h6>
                                    <select class="form-select form-select-sm w-auto bg-base border border-neutral-600/25 text-gray-600 dark:text-white dark:bg-gray-800 !pe-7">
                                        <option>This Month</option>
                                        <option>This Week</option>
                                        <option>This Year</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="card-body p-1.5">
                                <ul class="flex flex-wrap items-center justify-center my-3 gap-3">
                                    <li class="flex items-center gap-2">
                                        <span class="w-3 h-2 rounded-[50rem] bg-primary-600"></span>
                                        <span class="text-gray-600 text-sm font-semibold">
                                            Pre-Register Visitor's:
                                            <span class="text-gray-900 font-bold">{{ $totalPreRegistered }}</span>
                                        </span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <span class="w-3 h-2 rounded-[50rem] bg-warning-600"></span>
                                        <span class="text-gray-600 text-sm font-semibold">
                                            Walk-in Visitor's:
                                            <span class="text-gray-900 font-bold">{{ $totalWalkIn }}</span>
                                        </span>
                                    </li>
                                </ul>
                                <div id="visitorTypeChart" class="apexcharts-tooltip-style-1 apexcharts-yaxis"></div>
                            </div>
                        </div>
                    </div>
              
                    @endif
                </div>
            </div>

        </div>

@endsection

