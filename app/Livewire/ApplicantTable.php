<?php

namespace App\Livewire;

use App\Models\Applicant;
use App\Models\Departement;
use App\Models\User;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicantTable extends Component
{
    use WithPagination;

    public $departement; // Filter by Departement
    public $status = [];      // Filter by Status
    public $selectedApplicantId;
    public $sortBy = 'newest'; // Sort By (default to newest)
    public $perPage = 5;
    public $search;     // Number of items per page

    protected $paginationTheme = 'bootstrap'; // Use Bootstrap for pagination

    // Update the query when the filter changes
    public function updating($field)
    {
        $this->resetPage(); // Reset pagination to page 1 when filter or sort changes
    }

    // Reset all filters
    public function resetFilters()
    {
        $this->reset(['departement', 'status', 'sortBy', 'search']);
    }

    public function updateStatus($id, $selectedStatus)
    {
        $applicant = Applicant::find($id);
        $applicant->status = $selectedStatus;
        $applicant->save();
    }

    public function render()
    {

        // Query applicants based on filters and search
        $applicants = Applicant::query()
            ->when($this->departement, function ($query) {
                $query->whereHas('career.departement', function ($q) {
                    $q->where('id', $this->departement);
                });
            })
            ->when($this->status, function ($query) {
                $query->whereIn('status', $this->status);
            })
            ->when($this->sortBy, function ($query) {
                if ($this->sortBy === 'newest') {
                    $query->orderBy('created_at', 'desc');
                } elseif ($this->sortBy === 'oldest') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->when($this->search, function ($query) {
                $query->whereHas('career', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhereHas('departement', function ($subQ) {
                            $subQ->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->paginate($this->perPage);


        $departements = Departement::all();
        $users =User::all();
        $statuses =Status::all();
        return view('livewire.applicant-table', [
            'applicants' => $applicants,
            'departements' => $departements,
            'users' => $users,
            'statuses' => $statuses,
        ]);
    }
}
