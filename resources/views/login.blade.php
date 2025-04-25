@extends('layout/app')

@section('title-content')
    <title> Login | StaffPay</title>
@endsection

@vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
    <div class="h-[100vh] grid lg:grid-cols-2">
        <div class="flex flex-col justify-center items-center ">
            <div
                class="relative bg-[#18ba70] w-16 h-16 text-2xl font-bold text-white flex justify-center items-center p-2 rounded-full shadow-md shadow-neutral-400">
                <span class="text-[36px] -ml-3 shadow-md shadow-gray-200">S</span>
                <span class="absolute top-2 right-3 text-[34px] shadow-md shadow-gray-200">P</span>
            </div>
            <h3 class="mt-6 text-2xl font-semibold">Login in StaffPay</h3>

            <form action="{{ route('login') }}" method="POST"
                class="flex flex-col mt-10 w-[85%] lg:w-[60%] mx-auto gap-3">

                @csrf

                @if ($errors->has('error'))
                    <div class="text-red-600 font-semibold my-0.5">
                        {{ $errors->first('error') }}
                    </div>
                @endif
                
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                    class="h-[2.5rem] py-[0.6rem] px-2 outline-none border border-[#e7e9ed] text-[#5d6778] font-normal text-[16px] rounded-[5px] focus:border-[#86b7fe] duration-300">
                @error('email')
                    <p class="text-[14px] text-red-600 font-semibold my-0.5">{{ $message }}</p>
                @enderror
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"
                    class="h-[2.5rem] py-[0.6rem] px-2 outline-none border border-[#e7e9ed] text-[#5d6778] font-normal text-[16px] rounded-[5px] focus:border-[#86b7fe] duration-300">
                @error('password')
                    <p class="text-[14px] text-red-600 font-semibold my-0.5">{{ $message }}</p>
                @enderror
                <div class="flex items-center justify-between text-[14px] text-gray-500 mt-2">
                    <div>
                        <input type="checkbox" name="" id=""> Remember me
                    </div>
                    <a href="#"> Forgot Password?</a>
                </div>
                <button type="submit"
                    class="mt-8 font-semibold px-4 py-2 text-white rounded bg-[#18ba70] hover:bg-[#30bd7d] duration-400">Login</button>
            </form>
        </div>
        <div class="hidden lg:block h-[100vh]">
            <img src="{{ asset('images/login-bg.jpg') }}" alt="Login Image" class="object-cover h-full w-full">
        </div>
    </div>
</body>

</html>
