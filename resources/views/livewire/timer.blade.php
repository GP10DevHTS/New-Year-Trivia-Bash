<div wire:poll class="flex items-center justify-center min-h-screen bg-gradient-to-r from-purple-500 to-pink-500 text-white">
    <div class="text-center">
        <h1 class="text-4xl font-extrabold mb-6 tracking-wider uppercase">
            🎉 New Year Countdown 🎉
        </h1>
        <div class="text-6xl font-mono font-bold bg-white text-purple-700 rounded-lg px-8 py-4 shadow-lg inline-block">
            {{ gmdate('H:i:s', $timeLeft) }}
        </div>
        <p class="mt-6 text-lg font-light">
            Counting down to <strong>January 1, 2025</strong>!
        </p>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(() => {
                Livewire.emit('updateTimer');
            }, 1000); // Update every second
        });
    </script>
</div>
