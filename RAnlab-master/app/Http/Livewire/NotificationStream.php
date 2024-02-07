<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationStream extends Component
{
    public $recentNotifications = ["First one", "Second one", "Third one"];

    public function render()
    {
        return view('livewire.notification-stream');
    }

    public function updateNotifications()
    {
        $this->recentNotifications = ["Updated One", "Updated Two", "Updated Three"];
        return $this->recentNotifications;
    }
}
