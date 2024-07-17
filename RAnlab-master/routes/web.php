<?php

// use App\Http\Controllers\Admin\BusinessController as AdminBusinessController;
// use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// use App\Http\Controllers\ClientBusinessController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomDashController;
use App\Http\Controllers\DemographyController;
use App\Http\Controllers\HousingController;
use App\Http\Controllers\HousingReviewController;
use App\Http\Controllers\LabourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionSelectController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [DashboardController::class,'index'])
//     ->middleware(['auth', 'verified'])->name('index');

// Route::get('/dashboard', [DashboardController::class,'index'])
//     ->middleware(['auth', 'verified'])->name('index');

// Route::get('/dashboard/{regionId}', [DashboardController::class,'dashboard'])
//     ->middleware(['auth', 'verified'])->name('dashboard');

// Route::post('/selectRegion/{regionId}', [RegionSelectController::class,'setRegion'])
//     ->middleware(['auth', 'verified'])->name('setRegion');

// Route::resource('demography', DemographyController::class)
//     ->only(['index'])
//     ->middleware(['auth', 'verified']);

// Route::get('/housing', function(){
//         return view('housing');
//     })
//     ->middleware(['auth', 'verified'])->name('housing');

// Route::get('/incomeclass', function(){
//         return view('income-classes');
//     })
//     ->middleware(['auth', 'verified'])->name('incomeclass');

// Route::get('/incomesource', function(){
//         return view('income-sources');
//     })
//     ->middleware(['auth', 'verified'])->name('incomesource');

// Route::get('/spending', function(){
//         return view('consumer-spending');
//     })
//     ->middleware(['auth', 'verified'])->name('spending');

// Route::get('/industries', function(){
//         return view('industries');
//     })
//     ->middleware(['auth', 'verified'])->name('industries');

// Route::resource('business', BusinessController::class)
//     ->only(['index','edit','store','update'])
//     ->middleware(['auth', 'verified']);

// Route::resource('/client/business', ClientBusinessController::class)
//     ->only(['index'])
//     ->middleware(['auth', 'verified']);

// Route::get('laboursuppply', function(){
//         return view('labor-supply');
//     })
//     ->middleware(['auth', 'verified'])->name('laboursuppply');

// Route::get('/labourdemand', function(){
//         return view('labor-demand');
//     })
//     ->middleware(['auth', 'verified'])->name('labourdemand');

// Route::resource('review', ReviewController::class)
//     ->only(['index','edit','store','show','update','destroy'])
//     ->middleware(['auth', 'verified']);
// Route::post('/review/amend/{review}', [ReviewController::class, 'amend'])
//     ->middleware(['auth', 'verified']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', [DashboardController::class,'index', 'upload'])->name('index');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('index');
    

    Route::prefix('dashboard')->group(function () {
        Route::get('/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');
        Route::post('/upload', [DashboardController::class, 'uploadPost'])->name('dashboard.upload.post');
    });

    Route::post('/selectRegion/{regionId}', [RegionSelectController::class,'setRegion']);

    Route::resource('demography', DemographyController::class)
        ->only(['index']);
        
    Route::get('/download-population-csv', [CustomDashController::class, 'downloadCsv'])->name('download-population-csv');
    // Route::get('/housing', function(){
    //         return view('housing');
    //     })->name('housing');

    Route::resource('/housing', HousingController::class)->only(['index']);
    Route::resource('/housing_review', HousingReviewController::class)->only(['index', 'add']);
    Route::post('/housing_review/add', [HousingReviewController::class, 'add']);
    Route::get('housing_review/delete/{id}', [HousingReviewController::class, 'delete']);
    Route::get('housing_review/accept/{id}', [HousingReviewController::class, 'accept']);
    Route::get('housing_review/edit_data/{id}', [HousingReviewController::class, 'edit_data']);
    Route::put('housing_review/update_data/{id}', [HousingReviewController::class, 'update_data']);
    Route::get('/download-housing-csv', [HousingController::class, 'downloadCsv'])->name('download-housing-csv');
    // ->only(['index','edit','store','update'])

    Route::get('/incomeclass', function(){
            return view('income-classes');
        })->name('incomeclass');

    Route::get('/incomesource', function(){
            return view('income-sources');
        })->name('incomesource');

    Route::get('/spending', function(){
            return view('consumer-spending');
        })->name('spending');

    // Route::get('/industries', function(){
    //         return view('industries');
    //     })->name('industries');
    Route::get('/customDashboard', [CustomDashController::class,'index'])->name('customDashboard.index');

    Route::resource('business', BusinessController::class)
        ->only(['index']);
    Route::get('business/food', [BusinessController::class, 'food'])->name('business.food');



    // Route::get('laboursuppply', function(){
    //         return view('labor-supply');
    //     })->name('laboursuppply');

    // Route::get('/labourdemand', function(){
    //         return view('labor-demand');
    //     })->name('labourdemand');
    
    Route::resource('/laboursuppply', LabourController::class)->only(['index']);

    Route::resource('/labourdemand', LabourController::class)->only(['index']);
    Route::get('/download-labour-csv', [LabourController::class, 'downloadCsv'])->name('download-labour-csv');
    
    Route::post('/review/amend/{review}', [ReviewController::class, 'amend']);
    // Route::resource('/review', ReviewController::class)
    //         ->only(['index','edit','store','show','update','destroy']);
    // Route::get('/review_business', [ReviewController::class, 'business'])->name('review.business');
    // Route::get('/review_housing', [ReviewController::class, 'housing'])->name('review.housing');



/////////////////////////  This is the part that I am changing  ////////////////////////////
    Route::get('/review/message', [ReviewController::class, 'message'])->name('review.message');
    Route::post('/add', [ReviewController::class, 'add']);
    
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('/review', ReviewController::class)
            ->only(['index', 'business', 'housing', 'edit','store','show','update','destroy']);
        Route::get('/review_business', [ReviewController::class, 'business'])->name('review.business');
        Route::get('/review_housing', [ReviewController::class, 'housing'])->name('review.housing');
        
        Route::get('/delete/{id}', [ReviewController::class, 'delete']);
        Route::get('/accept/{id}', [ReviewController::class, 'accept']);
        // Route::put('/update_data/{id}', [ReviewController::class, 'update_data'])->name('update_data');
        Route::put('/update_data/{id}', [ReviewController::class, 'update_data']);


        Route::get('/edit_data/{id}', [ReviewController::class, 'edit_data']);
        Route::resource('business', BusinessController::class)
                ->only(['edit', 'store', 'update'])
                ->names([
                    'index' => 'admin.business.index',
                    'edit' => 'admin.business.edit',
                    'store' => 'admin.business.store',
                    'update' => 'admin.business.update',
                ]);
        // Route::prefix('admin')->group(function () {
        //     Route::get('/', [DashboardController::class, 'index']);
    
        //     Route::resource('business', BusinessController::class)
        //         ->only(['index', 'edit', 'store', 'update'])
        //         ->names([
        //             'index' => 'admin.business.index',
        //             'edit' => 'admin.business.edit',
        //             'store' => 'admin.business.store',
        //             'update' => 'admin.business.update',
        //         ]);
        // });
        // Add other admin-specific routes here
    });
});
/////////////////////////  This is the part that I am changing  ////////////////////////////

require __DIR__.'/auth.php';
