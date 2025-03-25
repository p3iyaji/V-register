@extends('layout.layout')
@php
    $title='Add Department';
    $subTitle = 'Add Department';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 justify-center">
                <div class="col-span-12 lg:col-span-10 xl:col-span-8 2xl:col-span-6 2xl:col-start-4">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">
                            <form action="{{ route('saveDepartment') }}" method="POST" >
                                @csrf
                                <div class="mb-5">
                                    <label for="name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Name of Department<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" id="name" name="name" placeholder="Enter Name of Department">
                                    @error('name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="description" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Description</label>
                                    <textarea name="description" class="form-control rounded-lg" id="description" placeholder="Write description..."></textarea>
                                </div>
                                
                                <div class="flex items-center justify-center gap-3">
                                <button type="button" onclick="window.location.href='{{ route('departmentsList') }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-14 py-3 rounded-lg">
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