<?php

// AddBusinessDialog.php

namespace App\Http\Livewire;

use Livewire\Component;

class AddBusinessDialog extends Component
{
    public $showDialog = false;
    public $regions;
    public $industry;

    public function showAddBusinessDialog()
    {
        $this->regions = [
            "Baie Verte",
            "Bird Cove",
            "Bishop's Falls",
            "Botwood",
        ];

        $this->industry = [
            "Sporting goods, hobby, book and music stores",
            "Personal care services and other personal services",
            "Building material and garden equipment and supplies dealers",
            "Food and beverage stores",
            "Furniture and home furnishings stores",
            "Electronics and appliance stores",
            "Traveller accommodation",
            "Construction",
            "Motor vehicle and parts dealers",
            "Food services and drinking places"
        ];

        $this->resetFormFields(); // Reset form fields when showing the dialog
        $this->showDialog = true;
        $this->emit('openAddBusinessDialog');
    }

    public function closeAddBusinessDialog()
    {
        $this->showDialog = false;
    }

    public function submitForm()
    {
        // Implement your form submission logic here
        $this->emit('closeAddBusinessDialog'); // Close the dialog after submission
    }

    private function resetFormFields()
    {
        // Reset form fields to their initial values
        $this->region = null;
        $this->year = null;
        $this->selectedIndustry = null;
        $this->businessName = null;
        $this->employment = null;
        $this->location = null;
    }

    public function render()
    {
        return view('livewire.add-business-dialog');
    }
}
