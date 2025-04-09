@extends('layout.layout')
@php
    $title='Edit User';
    $subTitle = 'Edit User';
    $script = '<script>
                    // ================== Image Upload Js Start ===========================
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
                    // ================== Image Upload Js End ===========================
             </script>';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 justify-center">
                <div class="col-span-12 lg:col-span-10 xl:col-span-8 2xl:col-span-6 2xl:col-start-4">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">
                            <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4">Profile Image</h6>

                            <form action="{{ route('updateUser', $user->id) }}" method="POST">
                                @csrf <!-- CSRF token for security -->
                                @method('PUT')
                                <!-- Name Field -->
                                <div class="mb-5">
                                    <label for="name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Full Name <span class="text-danger-600">*</span>
                                    </label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control rounded-lg" id="name" placeholder="Enter Full Name" required>
                                </div>

                                <!-- Email Field -->
                                <div class="mb-5">
                                    <label for="email" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Email <span class="text-danger-600">*</span>
                                    </label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control rounded-lg" id="email" placeholder="Enter email address" required>
                                </div>

                                <!-- Phone Field -->
                                <div class="mb-5">
                                    <label for="phone" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Phone
                                    </label>
                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control rounded-lg" id="phone" placeholder="Enter phone number">
                                </div>

                                <!-- Department Field -->
                                <div class="mb-5">
                                    <label for="department_id" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Department <span class="text-danger-600">*</span>
                                    </label>
                                    <select name="department_id" class="form-control rounded-lg form-select" id="department_id" required>
                                        <option value="{{ $user->department_id }}">@if($user->department){{ $user->department->name }}@endif</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- User Role Field -->
                                <div class="mb-5">
                                    <label class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        User Role <span class="text-danger-600">*</span>
                                    </label>
                                    <div class="flex items-center gap-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="role" value="admin" class="form-radio" 
                                                {{ old('role', $user->role) == 'admin' ? 'checked' : '' }}>
                                            <span class="ml-2 p-2">Admin</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="role" value="employee" class="form-radio" 
                                                {{ old('role', $user->role) == 'employee' ? 'checked' : '' }}>
                                            <span class="ml-2 p-2">Employee</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="role" value="user" class="form-radio" 
                                                {{ old('role', $user->role) == 'user' ? 'checked' : '' }}>
                                            <span class="ml-2 p-2">User</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Active Status Field -->
                                <div class="mb-5">
                                    <label class="inline-flex items-center">
                                        <!-- Hidden input to ensure a value is always submitted -->
                                        <input type="hidden" name="is_active" value="0">
                                        <!-- Checkbox input -->
                                        <input type="checkbox" name="is_active" class="form-checkbox rounded" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <span class="ml-2 p-2 font-semibold text-neutral-600 dark:text-neutral-200 text-sm">Active</span>
                                    </label>
                                </div>

                                <!-- Form Buttons -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection