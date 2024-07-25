<?php

use App\Enums\Gender;
use App\Enums\Status;
use App\Http\Resources\HoldingLocationResource;
use App\Http\Resources\SecurityOrganResource;
use App\Http\Resources\VictimResource;
use App\Models\HoldingLocation;
use App\Models\SecurityOrgan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/victims', function (Request $request) {
    return VictimResource::collection(App\Models\Victim::paginate());
});

Route::get('/gender', function (Request $request) {

    return response()->json(["data" => Gender::cases()]);
});

Route::get('/status', function (Request $request) {
    return response()->json(["data" => Status::cases()]);
});

Route::get('/security-organs', function (Request $request) {
    return SecurityOrganResource::collection(SecurityOrgan::all());
});

Route::get('/holding-locations', function (Request $request) {
    return HoldingLocationResource::collection(HoldingLocation::all());
});
