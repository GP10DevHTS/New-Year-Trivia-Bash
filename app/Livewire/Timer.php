<?php

namespace App\Livewire;

use Livewire\Component;

class Timer extends Component
{
    public $timeZones = [
        'Africa/Kampala' => 'Kampala (Africa)',
        'Europe/Berlin' => 'Berlin (Germany)',
        'America/New_York' => 'New York (USA - EST)',
        'Asia/Kolkata' => 'Kolkata (India)',
        'America/Los_Angeles' => 'Los Angeles (USA - PST)',
    ];

    public $selectedTimeZone = 'Europe/Berlin'; // Default to Berlin
    public $timeLeft;

    public function mount()
    {
        $this->calculateTimeLeft();
    }

    public function updatedSelectedTimeZone()
    {
        // Recalculate time left when the time zone changes
        $this->calculateTimeLeft();
    }

    public function calculateTimeLeft()
    {
        $newYear = strtotime('January 1st 2025 00:00:00');
        
        // Calculate time difference for the selected time zone
        $timeZoneTime = new \DateTime(null, new \DateTimeZone($this->selectedTimeZone));
        $timeDiff = $newYear - $timeZoneTime->getTimestamp();
        $this->timeLeft = max(0, $timeDiff);
    }

    public function selectTimeZone($timeZone)
    {
        // Set the selected time zone and recalculate the time left
        $this->selectedTimeZone = $timeZone;
        $this->calculateTimeLeft();
    }

    public function render()
    {
        return view('livewire.timer');
    }
}
