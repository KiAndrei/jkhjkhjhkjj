<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = MedicalRecord::with('patient')->get();
        return response()->json($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date',
            'prescription' => 'required|string',
        ]);

        $record = MedicalRecord::create($validated);
        return response()->json($record, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $record)
    {
        return response()->json($record->load('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $record)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date',
            'prescription' => 'required|string',
        ]);

        $record->update($validated);
        return response()->json($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $record)
    {
        $record->delete();
        return response()->json(null, 204);
    }
}
