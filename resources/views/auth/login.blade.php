<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<x-head/>

<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">

    <section class="bg-white dark:bg-dark-2 flex min-h-screen">
    <div class="lg:w-1/2 lg:block hidden relative"> <!-- Added relative -->
        <div class="absolute inset-0 overflow-hidden"> <!-- Full cover container -->
            <img 
                src="{{ asset('assets/images/auth/keyandmouse.jpg') }}" 
                alt="Login background"
                class="w-full h-full object-cover" <!-- Full cover styling -->
            >
        </div>
    </div>
        <div class="lg:w-1/2 py-8 px-6 flex flex-col justify-center items-center">
            <div class="lg:max-w-[464px] mx-auto w-full">
                <div>
                    <div class="flex justify-center">
                    <img src="{{ asset('assets/images/naltf-logo.png') }}" alt="naltf-logo" height="220px" width="220px">
                    </div>
            
                    <h4 class="mb-3 text-center">Visitor's Register</h4>
                    <p class="mb-8 text-secondary-light text-lg text-center">Welcome back! please enter your detail</p>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-4 relative">
                        <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl" placeholder="Email" name="email" id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="relative mb-5">
                        <div class="icon-field">
                            <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl" id="password" placeholder="Password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#password"></span>

                    </div>
                    <div class="mt-7">
                        <div class="flex justify-between gap-2">
                            <div class="flex items-center">
                                <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remember" name="remember"
                                value="{{ old('remember') ? 'checked' : '' }}">
                                <label class="ps-2" for="remember">Remember me </label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-primary-600 font-medium hover:underline">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl mt-8"> Sign In</button>

                    <div class="mt-8 center-border-horizontal text-center relative before:absolute before:w-full before:h-[1px] before:top-1/2 before:-translate-y-1/2 before:bg-neutral-300 before:start-0">
                        <span class="bg-white dark:bg-dark-2 z-[2] relative px-4"></span>
                    </div>
                    <div class="mt-8 flex items-center gap-3 mb-8">
                        
                    </div>
                    <div class="mt-8 text-center text-sm mb-8">
                    </div>

                </form>
            </div>
        </div>
    </section>

                    
    <x-script />

</body>
</html>
