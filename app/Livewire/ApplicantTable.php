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
    public $status = []; // Filter by Status
    public $selectedApplicantId;
    public $sortBy = 'desc'; // Sort By (default to newest)
    public $perPage = 10;
    public $search; // Number of items per page

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
        $applicant->status_id = $selectedStatus;
        $applicant->save();
    }

    public function render()
    {
       
        $applicants = Applicant::query()
            ->when($this->departement, function ($query) {
                return $query->whereHas('career.departement', function ($q) {
                    $q->where('id', $this->departement);
                });
            })
            ->when($this->status, function ($query) {
                return $query->whereIn('status_id', $this->status);
            })
            
            ->orderBy('created_at', $this->sortBy)
            ->paginate($this->perPage);

        $departements = Departement::all();
        $users = User::all();
        $statuses = Status::all();

        return view('livewire.applicant-table', [
            'applicants' => $applicants,
            'departements' => $departements,
            'users' => $users,
            'statuses' => $statuses,
        ]);
    }
}
