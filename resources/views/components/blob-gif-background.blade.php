@props(['gifs'])

<div class="absolute inset-0 overflow-hidden blur-lg select-none">
    @foreach ($gifs as $index => $gif)
        <img src="{{ $gif }}" class="blob-gif absolute opacity-70 filter animation-{{ $index % 5 }}" alt="Moving Blob" />
    @endforeach
</div>

<style>
    .blob-gif {
        width: 325px; /* Adjust size as needed */
        height: 325px; /* Adjust size as needed */
        animation-duration: {{ rand(10, 30) }}s; /* Overall duration for each blob's animation */
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    /* Animation for blob 1 */
    @keyframes moveBlob1 {
        0% {
            transform: translate(0, 0) scale(1.2);
        }
        20% {
            transform: translate(120px, -100px) scale(1.6);
        }
        40% {
            transform: translate(-100px, 120px) scale(2.0);
        }
        60% {
            transform: translate(140px, 80px) scale(1.8);
        }
        80% {
            transform: translate(-120px, -140px) scale(1.4);
        }
        100% {
            transform: translate(0, 0) scale(1.2);
        }
    }

    /* Animation for blob 2 */
    @keyframes moveBlob2 {
        0% {
            transform: translate(0, 0) scale(1.2);
        }
        20% {
            transform: translate(-120px, 90px) scale(1.4);
        }
        40% {
            transform: translate(90px, -110px) scale(1.6);
        }
        60% {
            transform: translate(-80px, 120px) scale(1.8);
        }
        80% {
            transform: translate(120px, 0) scale(1.4);
        }
        100% {
            transform: translate(0, 0) scale(1.2);
        }
    }

    /* Animation for blob 3 */
    @keyframes moveBlob3 {
        0% {
            transform: translate(0, 0) scale(1.5);
        }
        20% {
            transform: translate(100px, -100px) scale(1.7);
        }
        40% {
            transform: translate(-120px, 90px) scale(1.9);
        }
        60% {
            transform: translate(130px, -90px) scale(1.6);
        }
        80% {
            transform: translate(-100px, 120px) scale(1.4);
        }
        100% {
            transform: translate(0, 0) scale(1.5);
        }
    }

    /* Animation for blob 4 */
    @keyframes moveBlob4 {
        0% {
            transform: translate(0, 0) scale(1.5);
        }
        20% {
            transform: translate(20px, -20px) scale(1.7);
        }
        40% {
            transform: translate(-50px, 30px) scale(1.9);
        }
        60% {
            transform: translate(60px, -20px) scale(1.6);
        }
        80% {
            transform: translate(-30px, 50px) scale(1.4);
        }
        100% {
            transform: translate(0, 0) scale(1.5);
        }
    }

    /* Animation for blob 5 */
    @keyframes moveBlob5 {
        0% {
            transform: translate(0, 0) scale(1.5);
        }
        20% {
            transform: translate(20px, -20px) scale(1.7);
        }
        40% {
            transform: translate(-50px, 30px) scale(1.9);
        }
        60% {
            transform: translate(60px, -20px) scale(1.6);
        }
        80% {
            transform: translate(-30px, 50px) scale(1.4);
        }
        100% {
            transform: translate(0, 0) scale(1.5);
        }
    }

    /* Assign the animations to the blobs */
    .animation-0 {
        animation-name: moveBlob1;
    }

    .animation-1 {
        animation-name: moveBlob2;
    }

    .animation-2 {
        animation-name: moveBlob3;
    }

    .animation-3 {
        animation-name: moveBlob4;
    }

    .animation-4 {
        animation-name: moveBlob5;
    }
</style>
