<?php

namespace App\Livewire\Dashboard;

use App\Models\Appointment;
use Livewire\Component;

class PatientDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.patient-dashboard',[
            'appointments' => Appointment::where('patient_id',auth()->user()->patient->id)->get(),
        ]);
    }
}
