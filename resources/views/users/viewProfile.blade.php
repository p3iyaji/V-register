@extends('layout.layout')
@php
    $title='View Profile';
    $subTitle = 'View Profile';
    $script ='<script>
                    // ======================== Upload Image Start =====================
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                                $("#imagePreview").hide();
                                $("#imagePreview").fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });
                    // ======================== Upload Image End =====================

                    // ================== Password Show Hide Js Start ==========
                    function initializePasswordToggle(toggleSelector) {
                        $(toggleSelector).on("click", function() {
                            $(this).toggleClass("ri-eye-off-line");
                            var input = $($(this).attr("data-toggle"));
                            if (input.attr("type") === "password") {
                                input.attr("type", "text");
                            } else {
                                input.attr("type", "password");
                            }
                        });
                    }
                    // Call the function
                    initializePasswordToggle(".toggle-password");
                    // ========================= Password Show Hide Js End ===========================
            </script>';
@endphp

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-4">
            <div class="user-grid-card relative border border-neutral-200 dark:border-neutral-600 rounded-2xl overflow-hidden bg-white dark:bg-neutral-700 h-full">
                <div class="pb-6 ms-6 mb-6 me-6 -mt-[100px]">
                    <div class="text-center border-b border-neutral-200 dark:border-neutral-600">
                        <img src="{{ asset('assets/images/user-grid/user-grid-img14.png') }}" alt="" class="border br-white border-width-2-px w-200-px h-[200px] rounded-full object-fit-cover mx-auto">
                        <h6 class="mb-0 mt-4">{{ $user->name }}</h6>
                        <span class="text-secondary-light mb-4">{{ $user->email }}</span>
                    </div>
                    <div class="mt-6">
                        <h6 class="text-xl mb-4">Personal Info</h6>
                        <ul>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200">Full Name</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->name }}</span>
                            </li>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Email</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->email }}</span>
                            </li>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Phone Number</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->phone }}</span>
                            </li>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Department</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->department->name }}</span>
                            </li>
                            
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Role</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->role }}</span>
                            </li>
                            <li class="flex items-center gap-1">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Status</span>
                                <span class="px-6 py-1.5 rounded-lg font-medium text-sm border 
                                    {{ $user->is_active === 1 ? 'bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 border-success-600' : 'bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 border-danger-600' }}">
                                    {{ $user->is_active === 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8">
            <div class="card h-full border-0">
                <div class="card-body p-6">

                    <ul class="tab-style-gradient flex flex-wrap text-sm font-medium text-center mb-5" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="" role="presentation">
                            <button class="py-2.5 px-4 border-t-2 font-semibold text-base inline-flex items-center gap-3 text-neutral-600 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="change-password-tab" data-tabs-target="#change-password" type="button" role="tab" aria-controls="change-password" aria-selected="false">
                                Change Password
                            </button>
                        </li>
                        <li class="" role="presentation">
                            <button class="py-2.5 px-4 border-t-2 font-semibold text-base inline-flex items-center gap-3 text-neutral-600 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="notification-password-tab" data-tabs-target="#notification-password" type="button" role="tab" aria-controls="notification-password" aria-selected="false">
                                Notification Password
                            </button>
                        </li>
                    </ul>

                    <div id="default-tab-content">
                        
                        <div class="hidden" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                        <form action="{{ route('updatePassword', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-5">
                                <label for="password" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">New Password <span class="text-danger-600">*</span></label>
                                <div class="relative">
                                    <input type="password" class="form-control rounded-lg" id="password" name="password" placeholder="Enter New Password*">
                                    <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#password"></span>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="confirm_password" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Confirm Password <span class="text-danger-600">*</span></label>
                                <div class="relative">
                                    <input type="password" class="form-control rounded-lg" id="confirm_password" name="password_confirmation" placeholder="Confirm Password*">
                                    <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#confirm_password"></span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center gap-3">
                                <button type="button" onclick="window.location.href='{{ route('usersList') }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-14 py-3 rounded-lg">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">
                                    Save
                                </button>
                            </div>
                        </form>
                        </div>
                        <div class="hidden" id="notification-password" role="tabpanel" aria-labelledby="notification-password-tab">
                            <div class="form-switch switch-primary py-3 px-4 border rounded-lg relative mb-4">
                                <label for="companzNew" class="absolute w-full h-full start-0 top-0"></label>
                                <div class="flex items-center gap-3 justify-between">
                                    <span class="form-check-label line-height-1 font-medium text-secondary-light">Company News</span>
                                    <input class="form-check-input" type="checkbox" role="switch" id="companzNew">
                                </div>
                            </div>
                            <div class="form-switch switch-primary py-3 px-4 border rounded-lg relative mb-4">
                                <label for="pushNotifcation" class="absolute w-full h-full start-0 top-0"></label>
                                <div class="flex items-center gap-3 justify-between">
                                    <span class="form-check-label line-height-1 font-medium text-secondary-light">Push Notification</span>
                                    <input class="form-check-input" type="checkbox" role="switch" id="pushNotifcation" checked>
                                </div>
                            </div>
                            <div class="form-switch switch-primary py-3 px-4 border rounded-lg relative mb-4">
                                <label for="weeklyLetters" class="absolute w-full h-full start-0 top-0"></label>
                                <div class="flex items-center gap-3 justify-between">
                                    <span class="form-check-label line-height-1 font-medium text-secondary-light">Weekly News Letters</span>
                                    <input class="form-check-input" type="checkbox" role="switch" id="weeklyLetters" checked>
                                </div>
                            </div>
                            <div class="form-switch switch-primary py-3 px-4 border rounded-lg relative mb-4">
                                <label for="meetUp" class="absolute w-full h-full start-0 top-0"></label>
                                <div class="flex items-center gap-3 justify-between">
                                    <span class="form-check-label line-height-1 font-medium text-secondary-light">Meetups Near you</span>
                                    <input class="form-check-input" type="checkbox" role="switch" id="meetUp">
                                </div>
                            </div>
                            <div class="form-switch switch-primary py-3 px-4 border rounded-lg relative mb-4">
                                <label for="orderNotification" class="absolute w-full h-full start-0 top-0"></label>
                                <div class="flex items-center gap-3 justify-between">
                                    <span class="form-check-label line-height-1 font-medium text-secondary-light">Orders Notifications</span>
                                    <input class="form-check-input" type="checkbox" role="switch" id="orderNotification" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection
