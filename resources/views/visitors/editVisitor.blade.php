@extends('layout.layout')
@php
    $title='Edit Visitor';
    $subTitle = 'Edit Visitor';
@endphp

@section('content')

    <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
        <div class="card-body p-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 justify-center">
                <div class="col-span-12 lg:col-span-10 xl:col-span-8 2xl:col-span-6 2xl:col-start-4">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">
                        <form action="{{ route('updateVisitor', $visitor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-5">
                                    <label for="title" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Title <span class="text-danger-600">*</span>
                                    </label>
                                    <select name="title" class="form-control rounded-lg form-select" id="title" required>
                                        <option value="">Select Title</option>
                                        <option value="Mr" {{ old('title', $visitor->title) == 'Mr' ? 'selected' : '' }}>Mr</option>
                                        <option value="Mrs" {{ old('title', $visitor->title) == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                        <option value="Miss" {{ old('title', $visitor->title) == 'Miss' ? 'selected' : '' }}>Miss</option>
                                        <option value="Ms" {{ old('title', $visitor->title) == 'Ms' ? 'selected' : '' }}>Ms</option>
                                        <option value="Dr" {{ old('title', $visitor->title) == 'Dr' ? 'selected' : '' }}>Dr</option>
                                        <option value="Chief" {{ old('title', $visitor->title) == 'Chief' ? 'selected' : '' }}>Chief</option>
                                        <option value="Hon" {{ old('title', $visitor->title) == 'Hon' ? 'selected' : '' }}>Hon</option>
                                        <option value="Sen" {{ old('title', $visitor->title) == 'Sen' ? 'selected' : '' }}>Sen</option>
                                        <option value="Prof" {{ old('title', $visitor->title) == 'Prof' ? 'selected' : '' }}>Prof</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="first_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">First Name<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" value="{{ old('first_name', $visitor->first_name) }}" id="first_name" name="first_name" placeholder="Enter First Name">
                                    @error('first_name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="last_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Last Name<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" value="{{ old('last_name', $visitor->last_name) }}" id="last_name" name="last_name" placeholder="Enter Last Name">
                                    @error('last_name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="email" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Email<span class="text-danger-600">*</span></label>
                                    <input type="email" class="form-control rounded-lg" value="{{ old('email', $visitor->email) }}" id="email" name="email" placeholder="Enter Email">
                                    @error('email')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="phone" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Phone<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" value="{{ old('phone', $visitor->phone) }}" id="phone" name="phone" placeholder="Enter Phone">
                                    @error('phone')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <div class="flex items-center gap-4">
                                    <label class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Gender <span class="text-danger-600">*</span>
                                    </label>
                                    <div class="flex items-center gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="male" class="form-radio" 
                                            {{ old('gender', $visitor->gender) == 'male' ? 'checked' : '' }}>
                                        <span class="ml-2 p-2">Male</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="female" class="form-radio" 
                                            {{ old('gender', $visitor->gender) == 'female' ? 'checked' : '' }}>
                                        <span class="ml-2 p-2">Female</span>
                                    </label>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="company_name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Company Name<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" value="{{ old('company_name', $visitor->company_name) }}" id="company_name" name="company_name" placeholder="Enter Company Name">
                                    @error('company_name')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>  
                                <div class="mb-5">
                                    <label for="national_id_no" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">National ID No<span class="text-danger-600">*</span></label>
                                    <input type="text" class="form-control rounded-lg" value="{{ old('national_id_no', $visitor->national_id_no) }}" id="national_id_no" name="national_id_no" placeholder="Enter National ID No">
                                    @error('national_id_no')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div> 
                                <div class="mb-5">
                                    <label for="employee_id" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Employee <span class="text-danger-600">*</span>
                                    </label>
                                    <select name="employee_id" class="form-control rounded-lg form-select" id="employee_id" required>
                                        <option value="{{ old('employee_id', $visitor->employee_id) }}">{{ old('employee_id', $visitor->user->name) }}</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="purpose" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Purpose</label>
                                    <textarea name="purpose" class="form-control rounded-lg" id="purpose" placeholder="Write purpose...">{{ old('purpose', $visitor->purpose) }}</textarea>
                                    @error('purpose')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="address" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Purpose</label>
                                    <textarea name="address" class="form-control rounded-lg" id="address" placeholder="Write purpose...">{{ old('address', $visitor->address) }}</textarea>
                                    @error('address')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                 <!-- Image Field -->
                                 <div class="mb-5">
                                    <label for="image" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                        Image <span class="text-danger-600">*</span>
                                    </label>
                                    
                                     <!-- Display the old image if it exists -->
                                     @if ($visitor->image)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/'.$visitor->image) }}" alt="Visitor Image" class="w-24 h-24 rounded-lg object-cover">
                                        </div>
                                    @endif
                                    
                                    <!-- Hidden file input -->
                                    <input type="file" class="hidden" id="image" name="image" accept="image/*" capture="user">
                                    
                                    <!-- Camera preview and controls -->
                                    <div class="flex flex-col items-center gap-4">
                                        <video id="video" width="320" height="240" autoplay class="border rounded-lg hidden"></video>
                                        <canvas id="canvas" width="320" height="240" class="border rounded-lg hidden"></canvas>
                                        
                                        <div class="flex gap-3">
                                            <button type="button" id="startCamera" class="btn btn-primary py-2 px-4">
                                                <i class="fas fa-camera mr-2"></i> Start Camera
                                            </button>
                                            <button type="button" id="takePhoto" class="btn btn-success py-2 px-4 hidden">
                                                <i class="fas fa-camera-retro mr-2"></i> Take Photo
                                            </button>
                                            <button type="button" id="retakePhoto" class="btn btn-warning py-2 px-4 hidden">
                                                <i class="fas fa-redo mr-2"></i> Retake
                                            </button>
                                        </div>
                                        
                                        <div id="photoPreview" class="hidden">
                                            <p class="text-sm text-neutral-500">Your photo will be attached to the form</p>
                                        </div>
                                    </div>
                                    
                                    @error('image')
                                        <span class="text-danger-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-center gap-3">
                                <button type="button" onclick="window.location.href='{{ route('visitorsList') }}'" class="btn btn-danger bg-danger-500 text-white dark:bg-danger-600/25 dark:text-danger-400 hover:bg-danger-600 dark:hover:bg-danger-700 text-base px-14 py-3 rounded-lg">
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

      <style>
        #video, #canvas {
            max-width: 100%;
            background: #f0f0f0;
            margin-bottom: 10px;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .hidden {
            display: none;
        }
    </style>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const startCamera = document.getElementById('startCamera');
            const takePhoto = document.getElementById('takePhoto');
            const retakePhoto = document.getElementById('retakePhoto');
            const photoPreview = document.getElementById('photoPreview');
            const fileInput = document.getElementById('image');
            let stream = null;

            // Start camera
            startCamera.addEventListener('click', async function() {
                try {
                    stream = await navigator.mediaDevices.getUserMedia({ 
                        video: { 
                            width: 320, 
                            height: 240,
                            facingMode: 'user' // Front camera
                        }, 
                        audio: false 
                    });
                    video.srcObject = stream;
                    video.classList.remove('hidden');
                    startCamera.classList.add('hidden');
                    takePhoto.classList.remove('hidden');
                } catch (err) {
                    console.error("Error accessing camera:", err);
                    alert("Could not access the camera. Please ensure you've granted camera permissions.");
                }
            });

            // Take photo
            takePhoto.addEventListener('click', function() {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                
                // Stop camera stream
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                }
                
                video.classList.add('hidden');
                canvas.classList.remove('hidden');
                takePhoto.classList.add('hidden');
                retakePhoto.classList.remove('hidden');
                photoPreview.classList.remove('hidden');
                
                // Convert canvas to blob and set as file input
                canvas.toBlob(function(blob) {
                    const file = new File([blob], 'visitor-photo.png', { type: 'image/png' });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;
                }, 'image/png');
            });

            // Retake photo
            retakePhoto.addEventListener('click', function() {
                canvas.classList.add('hidden');
                photoPreview.classList.add('hidden');
                retakePhoto.classList.add('hidden');
                startCamera.click(); // Restart camera
            });
        });
    </script>  
@endsection