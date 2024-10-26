<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::all();
        return view('status',compact('statuses'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'required|string|unique:statuses,status',
            ]);
            $status = new Status();
            $status->status = $validatedData['status'];
            $status->color = $request->color;
            $status->is_dpass = $request->is_dpass;
            $status->save();

            // Berhasil simpan
            return redirect()->back()->with('success', 'Status created successfully!');
        } catch (\Exception $e) {
            // Tangkap error lainnya saat menyimpan
            return redirect()
                ->back()
                ->with('error', 'Failed to create status. Error: ' . $e->getMessage());
        }
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'required|string|unique:statuses,status,' . $id,
            ]);

            $status = Status::findOrFail($id);
            $status->status = $validatedData['status'];
            $status->color = $request->color;
            $status->is_dpass = $request->is_dpass;
            $status->save();

            return redirect()->back()->with('success', 'Status updated successfully!');
        
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to update status. Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $type = Status::findOrFail($id);
            $type->delete();

            return redirect()->back()->with('success', 'type deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete type: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function statusBulkDelete(Request $request)
    {
             try {
            $ids = $request->status_ids;

            $types = Status::whereIn('id', $ids)->get();

            foreach ($types as $type) {

                $type->delete();
            }

            return redirect()->back()->with('success', 'types Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete types: ' . $e->getMessage());
        }
    }

    
    
}
