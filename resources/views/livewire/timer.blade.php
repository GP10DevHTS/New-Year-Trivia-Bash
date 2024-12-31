<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-purple-500 to-pink-500 text-white">
    <h1 class="text-4xl font-extrabold mb-6 tracking-wider uppercase">
        🎉 New Year Countdown by Timezone 🎉
    </h1>

    <!-- Main Clock for Default Time Zone (Berlin) -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-semibold mb-4">
            Countdown in {{ $timeZones[$selectedTimeZone] }}
        </h2>
        <div class="text-6xl font-mono font-bold bg-white text-purple-700 rounded-lg px-8 py-4 shadow-lg inline-block">
            {{ gmdate('H:i:s', $timeLeft) }}
        </div>
        <p class="mt-2 text-lg font-light">
            Counting down to <strong>January 1, 2025</strong>.
        </p>
    </div>

    <!-- Time Zone Selection Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach($timeZones as $zone => $zoneName)
            <div wire:click="selectTimeZone('{{ $zone }}')" 
                 class="cursor-pointer text-center p-6 bg-white text-purple-700 rounded-lg shadow-md hover:bg-purple-100 transition duration-300 ease-in-out 
                 {{ $selectedTimeZone === $zone ? 'border-4 border-purple-700' : '' }}">
                <h3 class="font-bold text-xl">{{ $zoneName }}</h3>
                <p class="text-sm">Click to select</p>
            </div>
        @endforeach
    </div>

    <!-- Poll to update countdown every second -->
    <div wire:poll="calculateTimeLeft"></div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.emit('calculateTimeLeft');
        });
    </script>
</div>
