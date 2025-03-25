@extends('layout.layout')
@php
    $title='Pre-Register';
    $subTitle = 'Pre-register a Visitor';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 justify-center">
                <div class="col-span-12 lg:col-span-10 xl:col-span-8 2xl:col-span-6 2xl:col-start-4">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">
                            <form action="{{ route('savePreRegister') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-5">
                                    <label for="title" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Title <span class="text-danger-600">*</span>
                                    </label>
                                    <select name="title" class="form-control rounded-lg form-select" id="title" required>
                                        <option value="">Select Title</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Chief">Chief</option>
                                        <option value="Hon">Hon</option>
                                        <option value="Sen">Sen</option>
                                        <option value="Prof">Prof</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="first_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">First Name<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" id="first_name" name="first_name" placeholder="Enter First Name">
                                    @error('first_name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="last_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Last Name<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" id="last_name" name="last_name" placeholder="Enter Last Name">
                                    @error('last_name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="email" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Email<span class="text-danger-600">*</span></label>
                                    <input type="email" class="form-control rounded-lg" id="email" name="email" placeholder="Enter Email">
                                    @error('email')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="phone" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Phone<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" id="phone" name="phone" placeholder="Enter Phone">
                                    @error('phone')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Gender <span class="text-danger-600">*</span>
                                    </label>
                                    <div class="flex items-center gap-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="gender" value="male" class="form-radio" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                            <span class="ml-2 p-2">Male</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="gender" value="female" class="form-radio" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <span class="ml-2 p-2">Female</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="company_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Company Name<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" id="company_name" name="company_name" placeholder="Enter Company Name">
                                    @error('company_name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>  
                                <div class="mb-5">
                                    <label for="national_id_no" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">National ID No<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" id="national_id_no" name="national_id_no" placeholder="Enter National ID No">
                                    @error('national_id_no')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div> 
                                <div class="mb-5">
                                    <label for="employee_id" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Employee <span class="text-danger-600">*</span>
                                    </label>
                                    <select name="employee_id" class="form-control rounded-lg form-select" id="employee_id" required>
                                        <option value="">Select Employee</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="purpose" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Purpose</label>
                                    <textarea name="purpose" class="form-control rounded-lg" id="purpose" placeholder="Write purpose..."></textarea>
                                    @error('purpose')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="address" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Address</label>
                                    <textarea name="address" class="form-control rounded-lg" id="address" placeholder="Enter Address..."></textarea>
                                    @error('address')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="image" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Image<span class="text-danger-600">*</span></label>
                                    <input type="file" class="form-control rounded-lg" id="image" name="image">
                                    @error('image')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div> 
                                <div class="mb-5">
                                    <label for="expected_date" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Expected Date<span class="text-danger-600">*</span></label>
                                    <input type="date" class="form-control rounded-lg" id="expected_date" name="expected_date" placeholder="Enter Expected Date">
                                    @error('expected_date')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div> 
                                <div class="mb-5">
                                    <label for="expected_time" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Expected Time<span class="text-danger-600">*</span></label>
                                    <input type="time" class="form-control rounded-lg" id="expected_time" name="expected_time" placeholder="Enter Expected Time">
                                    @error('expected_time')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-center gap-3">
                                <button type="button" onclick="window.location.href='{{ route('preRegistersList') }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-14 py-3 rounded-lg">
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