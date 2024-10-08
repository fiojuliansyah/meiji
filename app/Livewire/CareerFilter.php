<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Career;
use App\Models\Departement;
use App\Models\Location;
use App\Models\Type;
use App\Models\Level;
use Livewire\WithPagination;

class CareerFilter extends Component
{
    use WithPagination;

    public $search = '';
    public $filterLocation = '';
    public $filterDepartement = [];
    public $filterLevel = [];
    public $filterPlacement = [];
    public $filterType = [];
    public $minSalary;
    public $maxSalary;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function mount()
    {
        // Initial salary range
        $this->minSalary = Career::min('salary');
        $this->maxSalary = Career::max('salary');
    }

    public function updating($field)
    {
        // Reset pagination when any filter changes
        $this->resetPage();
    }

    public function render()
    {
        $careers = Career::query()
            ->when($this->filterLocation, function ($query) {
                return $query->whereHas('location', function ($q) {
                    $q->where('name', $this->filterLocation);
                });
            })
            ->when($this->filterDepartement, function ($query) {
                return $query->whereIn('departement_id', $this->filterDepartement);
            })
            ->when($this->filterLevel, function ($query) {
                return $query->whereIn('level_id', $this->filterLevel);
            })
            ->when($this->filterPlacement, function ($query) {
                return $query->whereIn('placement', $this->filterPlacement);
            })
            ->when($this->filterType, function ($query) {
                return $query->whereIn('type_id', $this->filterType);
            })
            ->whereBetween('salary', [$this->minSalary, $this->maxSalary])
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        // Load filter data
        $departements = Departement::withCount('careers')->get();
        $locations = Location::all();
        $levels = Level::withCount('careers')->get();
        $types = Type::withCount('careers')->get();
        $placements = Career::select('placement')
            ->groupBy('placement')
            ->selectRaw('count(*) as count')
            ->get();

        return view('livewire.career-filter', [
            'careers' => $careers,
            'departements' => $departements,
            'locations' => $locations,
            'levels' => $levels,
            'types' => $types,
            'placements' => $placements,
            'totalCareers' => Career::count(),
            'minSalary' => $this->minSalary,
            'maxSalary' => $this->maxSalary,
        ]);
    }
}
