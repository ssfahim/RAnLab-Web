<?php

// use App\Http\Controllers\Admin\BusinessController as AdminBusinessController;
// use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
// use App\Http\Controllers\ClientBusinessController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemographyController;
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


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Route::get('/', [DashboardController::class,'index'])->name('index');

    Route::get('/', function () {
        return redirect()->route('index', ['city' => "St. John's"]);
    });

    Route::get('/dashboard', [DashboardController::class,'index'])->name('index');

    // Route::get('/dashboard/{city}', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route::post('/fetch-city-data', [DashboardController::class, 'fetchCityData'])->name('fetchCityData');

    // Route::get('/get-city-data', function (Request $request) {
    //     $city = $request->query('city');
    //     $cityData = Dashboard::where('city', $city)->first(); // Assuming 'city' is the column name in your Dashboard model
    
    //     return response()->json($cityData);
    // });
    



    Route::post('/selectRegion/{regionId}', [RegionSelectController::class,'setRegion']);

    Route::resource('demography', DemographyController::class)
        ->only(['index']);

    Route::get('/housing', function(){
            return view('housing')->name('housing');
        });

    Route::get('/incomeclass', function(){
            return view('income-classes');
        });

    Route::get('/incomesource', function(){
            return view('income-sources');
        });

    Route::get('/spending', function(){
            return view('consumer-spending');
        });

    Route::get('/industries', function(){
            return view('industries');
        });

    Route::resource('business', BusinessController::class)
        ->only(['index']);


    Route::get('laboursuppply', function(){
            return view('labor-supply');
        });

    Route::get('/labourdemand', function(){
            return view('labor-demand');
        });

    
    Route::post('/review/amend/{review}', [ReviewController::class, 'amend']);


/////////////////////////  This is the part that I am changing  ////////////////////////////

    Route::post('/add', [ReviewController::class, 'add']);
    

    
    Route::middleware(['is_admin'])->group(function () {
        Route::resource('review', ReviewController::class)
            ->only(['index', 'edit','store','show','update','destroy']);
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
