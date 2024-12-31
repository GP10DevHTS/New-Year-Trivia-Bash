<?php

namespace App\Livewire;

use Livewire\Component;

class Timer extends Component
{
    public $timeLeft;

    protected $listeners = ['updateTimer'];

    public function mount()
    {
        // Set the target time (e.g., New Year countdown)
        
    }

    public function updateTimer()
    {
        $newYear = strtotime('January 1st 2025 00:00:00');

        $this->timeLeft = $newYear - time();
        $this->timeLeft = max(0, $this->timeLeft - 1);
    }

    public function render()
    {

        $this->updateTimer();

        return view('livewire.timer');
    }
}
