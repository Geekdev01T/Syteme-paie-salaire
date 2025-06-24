@extends('layout/app')

@section('title-content')
    <title> Employe - Initialize | StaffPay</title>
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
            <h3 class="mt-6 text-2xl font-semibold">Initialize in StaffPay</h3>

            <form action="#" method="POST" class="flex flex-col mt-10 w-[85%] lg:w-[60%] mx-auto gap-3">

                @csrf

                @if (session('error'))
                    <div class="text-red-600 font-semibold my-0.5">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="text-green-600 font-semibold my-0.5">
                        {{ session('success') }}
                    </div>
                @endif

                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                    class="input">
                @error('email')
                    <p class="error-input">{{ $message }}</p>
                @enderror
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"
                    class="input">
                @error('password')
                    <p class="error-input">{{ $message }}</p>
                @enderror
                <input type="password" placeholder="Password Confirm" name="password_confirm" value="{{ old('password_confirm') }}"
                    class="input">
                @error('password_confirm')
                    <p class="error-input">{{ $message }}</p>
                @enderror

                {{-- <h2 class="font-normal text-gray-500">Scanner votre visage</h2>
                <button id="take-photo-btn" form="photo-input"
                    class="bg-blue-500 hover:bg-blue-700 duration-300 text-white font-bold py-2 px-4 rounded">
                    Prendre une photo
                </button> --}}


                <button type="submit" class="btn">Save</button>
                <div class="flex items-center justify-between text-[14px] text-gray-500 mt-2">
                    <a href="{{ route('login.employe') }}" class="link"> Already have a password?</a>
                </div>
            </form>



            {{--
            <button id="open-camera-btn">Ouvrir l'appareil photo</button>
            <video id="video" width="640" height="480"></video>
            <button id="take-photo-btn">Prendre une photo</button>
            <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
            <img id="photo" src="" alt="Photo prise">

            <script>
                const video = document.getElementById('video');
                const button = document.getElementById('open-camera-btn');
                const takePhotoButton = document.getElementById('take-photo-btn');
                const canvas = document.getElementById('canvas');
                const photo = document.getElementById('photo');
                let stream;

                button.addEventListener('click', async () => {
                    try {
                        stream = await navigator.mediaDevices.getUserMedia({
                            video: true
                        });
                        video.srcObject = stream;
                        video.play();
                    } catch (error) {
                        console.error('Erreur lors de l\'ouverture de la caméra :', error);
                    }
                });

                takePhotoButton.addEventListener('click', () => {
                    const context = canvas.getContext('2d');
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                    const dataURL = canvas.toDataURL('image/png');
                    photo.src = dataURL;
                    photo.style.display = 'block';
                });
            </script> --}}




        </div>
        <div class="hidden lg:block h-[100vh]">
            <img src="{{ asset('images/initialize-bg.jpg') }}" alt="Login Image" class="object-cover h-full w-full">
        </div>
    </div>
</body>

</html>
