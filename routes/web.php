<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HWInventoryController;


 Route::get('/page-login', function () {
        return view('pages.page-login');
    });
// Hardware Inventory
Route::get('/login', [HWInventoryController::class, 'ShowInventory']);
Route::post('/store-inventory', [HWInventoryController::class, 'StoreInventory']);
Route::post('/update-inventory', [HWInventoryController::class, 'updateInventory']);
Route::post('/upload-inventory-file', [HWInventoryController::class, 'uploadInventoryFile']);

