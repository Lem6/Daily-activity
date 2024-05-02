<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\plan\ColorsController;
use App\Http\Controllers\plan\CalandersController;
use App\Http\Controllers\plan\ActivitiesController;
use App\Http\Controllers\plan\PlanTasksController;
use App\Http\Controllers\plan\MotivationsController;
use App\Http\Controllers\plan\AdditionalTimesController;
use App\Http\Controllers\plan\OrganizationController;
use App\Http\Controllers\plan\pdfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

Route::post('/generate-pdf',[pdfController::class,'generatePDF']);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('change_password', [UserController::class, 'change_password'])->name('change_password');
    Route::post('set_new_password', [UserController::class, 'set_new_password'])->name('change.password');
    Route::get('/active/{id}', [UserController::class, 'activate']);
    Route::get('/deactive/{id}', [UserController::class, 'deactivate']);
    Route::get('/user_delete/{id}',[UserController::class, 'destroy'])
    ->name('users.destroy');
   
    Route::get('/role_delete/{id}',[RoleController::class, 'destroy'])
    ->name('roles.destroy');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    
});

Route::group([
    'prefix' => 'colors',
], function () {
    // Route::get('/', 'plan\ColorsController@index')
    //      ->name('colors.color.index');
    Route::get('/', [ColorsController::class, 'index']) ->name('colors.color.index');

    Route::get('/create', [ColorsController::class, 'create'])
         ->name('colors.color.create');
    Route::get('/show/{color}',[ColorsController::class, 'show'])
         ->name('colors.color.show')->where('id', '[0-9]+');
    Route::get('/{color}/edit',[ColorsController::class, 'edit'])
         ->name('colors.color.edit')->where('id', '[0-9]+');
    Route::post('/', [ColorsController::class, 'store'])
         ->name('colors.color.store');
    Route::put('color/{color}', [ColorsController::class, 'update'])
         ->name('colors.color.update')->where('id', '[0-9]+');
    Route::delete('/color/{color}',[ColorsController::class, 'destroy'])
         ->name('colors.color.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'calanders',
], function () {
    Route::get('/', [CalandersController::class,'index'])
         ->name('calanders.calander.index');
    Route::get('/create', [CalandersController::class,'create'])
         ->name('calanders.calander.create');
    Route::get('/show/{calander}', [CalandersController::class,'show'])
         ->name('calanders.calander.show')->where('id', '[0-9]+');
    Route::get('/{calander}/edit', [CalandersController::class,'edit'])
         ->name('calanders.calander.edit')->where('id', '[0-9]+');
    Route::post('/',  [CalandersController::class,'store'])
         ->name('calanders.calander.store');
    Route::put('calander_update}',  [CalandersController::class,'update'])
         ->name('calanders.calander.update')->where('id', '[0-9]+');
    Route::delete('/calander_delete', [CalandersController::class,'destroy'])
         ->name('calanders.calander.destroy');
});


Route::group([
    'prefix' => 'activities',
], function () {
    Route::get('/view_activity',[ActivitiesController::class,'view_activity'])
         ->name('view_activity');
Route::get('/daterange/fetch_data', [ActivitiesController::class,'fetch_data'])->name('daterange.fetch_view');

Route::get('/perviousPlan', [ActivitiesController::class,'index2'])->name('activities.perviousPlan');
Route::post('/daterange/fetch_data1', [ActivitiesController::class,'fetch_data'])->name('daterange.fetch_data');
Route::get('/experts/{id}', [ActivitiesController::class,'viewteamleader'])->name('daterange.teamleader');
Route::get('/director', [ActivitiesController::class,'viewDirector'])->name('daterange.expertlist');
Route::get('/expertView/{id}/{did}', [ActivitiesController::class,'ExpertDetail'])->name('daterange.expertview');
Route::get('/interval', [ActivitiesController::class,'fetch_date'])->name('daterange.fetch_date');
Route::get('/viewExpert/{id}/', [ActivitiesController::class,'viewExperts'])->name('daterange.view_expert');
Route::get('/expert_profile/{id}/', [ActivitiesController::class,'expert_profile'])->name('expert.profile');
Route::get('/viewTeam/{id}', [ActivitiesController::class,'viewTeam'])->name('daterange.view_team');

Route::get('', [ActivitiesController::class,'teamDashbored'])
    ->name('expert.Dashbored');

Route::get('/d', [ActivitiesController::class,'directorDashbored'])->name('daterange.view_director');
Route::get('/dasboredDirector', [ActivitiesController::class,'directorDashboredupdate'])->name('daterange.dashbored_director');


Route::get('/dg', [ActivitiesController::class,'generalDirectorDashbored'])->name('daterange.view_director_g');
Route::get('/dasboredDirectorDirector', [ActivitiesController::class,'generalDirectorDashboredupdate'])->name('daterange.dashbored_director_g');
});


Route::group([
    'prefix' => 'plan__tasks',
], function () {
    Route::get('/', [PlanTasksController::class,'index'])
         ->name('plan__tasks.plan__task.index');
    Route::get('/create',[PlanTasksController::class,'create'])
         ->name('plan__tasks.plan__task.create');
    Route::get('/show/{planTask}',[PlanTasksController::class,'show'])
         ->name('plan__tasks.plan__task.show')->where('id', '[0-9]+');
         
    Route::get('/{planTask}/edit',[PlanTasksController::class,'edit'])
         ->name('plan__tasks.plan__task.edit')->where('id', '[0-9]+');
    Route::post('/', [PlanTasksController::class,'store'])
         ->name('plan__tasks.plan__task.store');
    Route::put('plan__task/{planTask}', [PlanTasksController::class,'update'])
         ->name('plan__tasks.plan__task.update')->where('id', '[0-9]+');
    Route::delete('/plan__task/{planTask}',[PlanTasksController::class,'destroy'])
         ->name('plan__tasks.plan__task.destroy')->where('id', '[0-9]+');

     Route::get('/completed/{planTask}',[PlanTasksController::class,'completed'])
     ->name('plan__tasks.plan__task.completed')->where('id', '[0-9]+');
     Route::get('/ongoing/{planTask}',[PlanTasksController::class,'ongoing'])
     ->name('plan__tasks.plan__task.ongoing')->where('id', '[0-9]+');

     Route::post('/outplan', [PlanTasksController::class,'outplan'])
     ->name('plan__tasks.plan__task.outplan');

     Route::POST('/inprogress/{planTask}',[PlanTasksController::class,'inprogress'])
     ->name('plan__tasks.plan__task.inprogress')->where('id', '[0-9]+');

     Route::get('/approve',[PlanTasksController::class,'approve'])
     ->name('plan__task.approve.index');
     
     // Route::get('/reject_task/{id}',[PlanTasksController::class,'reject_task')
     // ->name('plan__tasks.plan__task.reject')->where('id', '[0-9]+');
     Route::post('/approve_reject',[PlanTasksController::class,'approve_reject'])
     ->name('plan__task.approve.approve');




});
Route::get('/dashboard',[PlanTasksController::class,'dashboard']);


Route::group([
     'prefix' => 'additional__times',
 ], function () {
     Route::get('/', [AdditionalTimesController::class,'index'])
          ->name('additional__times.additional__time.index');
     Route::get('/create',[AdditionalTimesController::class,'create'])
          ->name('additional__times.additional__time.create');
     Route::get('/show/{additionalTime}',[AdditionalTimesController::class,'show'])
          ->name('additional__times.additional__time.show')->where('id', '[0-9]+');
     Route::get('/{additionalTime}/edit',[AdditionalTimesController::class,'edit'])
          ->name('additional__times.additional__time.edit')->where('id', '[0-9]+');
     Route::post('/', [AdditionalTimesController::class,'store'])
          ->name('additional__times.additional__time.store');
     Route::put('additional__time/{additionalTime}', [AdditionalTimesController::class,'update'])
          ->name('additional__times.additional__time.update')->where('id', '[0-9]+');
     Route::delete('/additional__time/{additionalTime}',[AdditionalTimesController::class,'destroy'])
          ->name('additional__times.additional__time.destroy')->where('id', '[0-9]+');
     Route::get('/view_assigned_permission',[AdditionalTimesController::class,'view_assigned_permission'])
          ->name('additional__times.additional__time.view');
 });
Route::group([
     'prefix' => 'motivations',
 ], function () {
     Route::get('/', [MotivationsController::class,'index'])
          ->name('motivations.motivation.index');
     Route::get('/create',[MotivationsController::class,'create'])
          ->name('motivations.motivation.create');
     Route::get('/show/{motivation}',[MotivationsController::class,'show'])
          ->name('motivations.motivation.show')->where('id', '[0-9]+');
     Route::get('/{motivation}/edit',[MotivationsController::class,'edit'])
          ->name('motivations.motivation.edit')->where('id', '[0-9]+');
     Route::post('/', [MotivationsController::class,'store'])
          ->name('motivations.motivation.store');
     Route::put('motivation/{motivation}', [MotivationsController::class,'update'])
          ->name('motivations.motivation.update')->where('id', '[0-9]+');
     Route::get('/motivation/{motivation}',[MotivationsController::class,'destroy'])
          ->name('motivations.motivation.destroy')->where('id', '[0-9]+');
 });

 Route::get('/change_logo', [UserController::class, 'view_logo']) ->name('logo.index');
 Route::post('/update_logo', [UserController::class, 'update_logo']) ->name('logo.update');

Route::resource('organizations', OrganizationController::class);

// Route::get('/dashboard', function () {
//     return view('welcome');
// });

Route::get('/org', [PlanTasksController::class,'org']);

});
