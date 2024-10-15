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

    // Define the form fields
    public $careerId; // This will be passed dynamically from the parent
    public $fullname;
    public $email;
    public $phone;
    public $user; // Assuming $user is the authenticated user model instance

    // Form submission method
    public function submit()
    {
        // Handle the document upload to Cloudinary (optional field)
        if ($this->document) {

            // Upload the file to Cloudinary
            $uploadedFile = $this->document->storeOnCloudinary('documents/' . $this->user->name); // Folder 'documents'
            dd($uploadedFile);
        }

        // Save the application to the database (you can customize this part as per your DB structure)
        Applicant::create([
            'career_id' => $this->careerId,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $uploadedFile ?? null, // Store URL from Cloudinary, or null if not uploaded
        ]);

        // Reset the form fields
        $this->reset(['fullname', 'email', 'phone', 'document']);

        // Flash message for successful submission
        session()->flash('message', 'Your application has been submitted successfully!');

        // Optionally: You can send a confirmation email to the user or admin here
        // Mail::to($this->email)->send(new JobApplicationSubmitted());
    }

    public function render()
    {
        return view('livewire.applicant-form');
    }
}
