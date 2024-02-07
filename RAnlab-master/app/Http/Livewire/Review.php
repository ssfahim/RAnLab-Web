<?php

// app/Http/Livewire/SaveNotification.php

// app/Http/Livewire/Review.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class Review extends Component
{
    

    public function saveChanges()
    {
        // Save data to the 'notification' table
        
        // Reset the form or perform any other necessary actions
        $this->resetForm();
    }

    private function resetForm()
    {
        
    }

    public function render()
    {
        return view('livewire.review');
    }
}

