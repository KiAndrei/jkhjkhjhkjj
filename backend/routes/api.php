<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\MedicalRecordController;

// Test route
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

// Patient routes
Route::apiResource('patients', PatientController::class);

// Medical record routes
Route::apiResource('records', MedicalRecordController::class);
Route::get('patients/{patient}/records', [PatientController::class, 'records']);

Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
}); 