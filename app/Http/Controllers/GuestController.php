<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Departement;
use App\Models\Level;
use App\Models\Location;
use App\Models\Type;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function jobList()
    {
        $careers = Career::all();
        $departements = Departement::withCount('careers')->get();
        $locations = Location::all();
        $levels = Level::withCount('careers')->get();
        $types = Type::withCount('careers')->get();
        $totalCareers = Career::count();
        $minSalary = Career::min('salary');
        $maxSalary = Career::max('salary');
        // Mengambil nilai unik dan menghitung jumlah masing-masing placement
        $placements = Career::select('placement')
            ->groupBy('placement')
            ->selectRaw('count(*) as count') // Menghitung jumlah untuk setiap placement
            ->get();
        return view('jobList', compact('careers', 'departements', 'locations', 'levels', 'types', 'totalCareers', 'minSalary', 'maxSalary', 'placements'));
    }
}
