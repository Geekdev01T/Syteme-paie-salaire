@extends('layout/app')

@section('title-content')
    <title> Employe - Verify | StaffPay</title>
@endsection

@vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
    <div class="h-[100vh] grid lg:grid-cols-2">
        @if (session('success'))
            <div class="text-green-600 font-semibold my-0.5">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex flex-col justify-center items-center" style="padding: 4px; max-height: 100vh; overflow-y: auto;">
            <div
                class="relative bg-[#18ba70] w-16 h-16 text-2xl font-bold text-white flex justify-center items-center p-2 rounded-full shadow-md shadow-neutral-400">
                <span class="text-[36px] -ml-3 shadow-md shadow-gray-200">S</span>
                <span class="absolute top-2 right-3 text-[34px] shadow-md shadow-gray-200">P</span>
            </div>
            <h3 class="my-6 text-2xl font-semibold">Verification for {{session('employe')->name}} in StaffPay</h3>

            <div class="flex flex-col justify-center items-center gap-4" style="margin-top: 1.5em">
                <video id="video" width="350" height="240" autoplay class="rounded shadow" style="border: 1px solid rgba(128, 128, 128, 0.589)"></video>
                <button id="snap" class="bg-blue-500 hover:bg-blue-700 duration-300 text-white font-semiBold py-2 px-4 rounded mt-4"> Veuillez prendre une photo</button>
                <img id="preview" src="" alt="Aperçu de la photo"
                    style="display:none; margin-top:10px; max-width:350px;" class="rounded shadow" style="border: 1px solid rgba(128, 128, 128, 0.589)">
                <canvas id="canvas" width="350" height="240" style="display:none"></canvas>
            </div>


            <form action="#" method="POST" class="flex flex-col mt-10 w-[85%] lg:w-[60%] mx-auto gap-3">
                @csrf

                @if (session('error'))
                    <div class="text-red-600 font-semibold my-0.5">
                        {{ session('error') }}
                    </div>
                @endif
                <input type="hidden" name="face_image" id="face_image">
                <button type="submit" class="btn">Verify</button>

            </form>
        </div>
        <div class="hidden lg:block h-[100vh]">
            <img src="{{ asset('images/verify-bg.jpg') }}" alt="Login Image" class="object-cover h-full w-full">
        </div>
    </div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('snap');
        const faceImageInput = document.getElementById('face_image');
        const preview = document.getElementById('preview');

        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(stream => {
                video.srcObject = stream;
            });

        snap.addEventListener("click", function() {
            canvas.getContext('2d').drawImage(video, 0, 0, 350, 240);
            const dataUrl = canvas.toDataURL('image/png');
            faceImageInput.value = dataUrl;
            preview.src = dataUrl;
            preview.style.display = 'block';
        });
    </script>
</body>

</html>
