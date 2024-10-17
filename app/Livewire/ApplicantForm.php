<?php

namespace App\Livewire;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // Import Cloudinary

class ApplicantForm extends Component
{
    use WithFileUploads;
    public $document;


    public $careerId; 
    public $fullname;
    public $email;
    public $phone;
    public $user; 

   
    public function submit()
    {
        
        
    }

    public function render()
    {
        return view('livewire.applicant-form');
    }
}
