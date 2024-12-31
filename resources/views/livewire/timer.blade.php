<div>
    <h1 class="text-2xl font-bold">New Year Countdown</h1>
    <div class="text-4xl my-4">
        {{ gmdate('H:i:s', $timeLeft) }}
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(() => {
                Livewire.emit('updateTimer');
            }, 1000); // Update every second
        });
    </script>
</div>
