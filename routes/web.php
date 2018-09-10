<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'FiltersController@filterAll')->name('filter.all');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/filters', 'PagesController@filters')->name('filters');
Route::get('/filter-all', 'FiltersController@filterAll')->name('filter.all');
Route::get('/filter-all-variables', 'FiltersController@filterVariablesAll')->name('filterVariables.all');
Route::get('/filter-by-year', 'FiltersController@filterByYear')->name('filter.year');
Route::get('/search', 'FiltersController@filterAll')->name('filter.all');

// download links for full tables
Route::get('/all-study-descriptors-csv', 'DownloadsController@downloadStudys')->name('studydescriptors.download');
Route::get('/all-dietary-ingredients-csv', 'DownloadsController@downloadIngredients')->name('dietaryingredients.download');
Route::get('/all-dietary-nutrients-csv', 'DownloadsController@downloadNutrients')->name('dietarynutrients.download');
Route::get('/all-subjects-csv', 'DownloadsController@downloadSubjects')->name('subjects.download');
Route::get('/all-performance-data-csv', 'DownloadsController@downloadPerformances')->name('performancedata.download');
Route::get('/all-infusions-data-csv', 'DownloadsController@downloadInfusions')->name('infusiondata.download');
Route::get('/all-in-vitro-data-csv', 'DownloadsController@downloadInvitro')->name('invitrodata.download');
Route::get('/all-genome-transcripts-csv', 'DownloadsController@downloadGenomes')->name('genome.download');

// download links for filtered tables
Route::get('/filtered-study-descriptors-csv/{query}', 'DownloadsController@downloadFilteredStudies')->name('download.filteredStudies');
Route::get('/filtered-dietary-ingredients-csv/{query}', 'DownloadsController@downloadFilteredIngredients')->name('download.filteredIngredients');
Route::get('/filtered-dietary-nutrients-csv/{query}', 'DownloadsController@downloadFilteredNutrients')->name('download.filteredNutrients');
Route::get('/filtered-subjects-csv/{query}', 'DownloadsController@downloadFilteredSubjects')->name('download.filteredSubjects');
Route::get('/filtered-performances-csv/{query}', 'DownloadsController@downloadFilteredPerformances')->name('download.filteredPerformances');
Route::get('/filtered-infusions-csv/{query}', 'DownloadsController@downloadFilteredInfusions')->name('download.filteredInfusions');
Route::get('/filtered-in-vitros-csv/{query}', 'DownloadsController@downloadFilteredInVitroDatas')->name('download.filteredInVitroDatas');
Route::get('/filtered-genomes/{query}', 'DownloadsController@downloadFilteredGenomes')->name('download.filteredGenomes');
Route::get('/filtered-all-csv/{query}', 'DownloadsController@downloadFilteredAll')->name('download.filteredAll');


// download link for full database
Route::get('/download-database', 'DownloadsController@downloadDatabase')->name('data.download');


// import links
Route::get('/import-studies', 'ImportController@importStudyDescriptors')->name('upload.bodyweight');
Route::get('/test-join', 'PagesController@testJoin');

//administrators dashboard
// Admin Interface Routes
Route::group(['middleware' => 'auth'], function() {
    Route::get('/administrators-dashboard', 'AdministratorsController@dashboard')->name('admin.dashboard');
    Route::get('/administrators-dashboard/file-manager', 'AdministratorsController@filemanager')->name('admin.filemanager');
    Route::get('/administrators-dashboard/study-descriptors', 'AdministratorsController@studies')->name('admin.studies');
    Route::get('/administrators-dashboard/dietary-ingredients', 'AdministratorsController@ingredients')->name('admin.ingredients');
    Route::post('/import-files', 'AdministratorsController@importFile')->name('import.files');
    Route::post('/import-workbook', 'AdministratorsController@importWorkbook')->name('import.workbook');
    Route::get('/import-count', 'AdministratorsController@countSheets');

    //Study Descriptors
    Route::get('/administrators-dashboard/study-descriptors/create', 'StudyDescriptorsController@create')->name('study.create');
    Route::post('/administrators-dashboard/study-descriptors/store', 'StudyDescriptorsController@store')->name('study.store');
    Route::get('/administrators-dashboard/study-descriptors/edit/{ref}', 'StudyDescriptorsController@edit')->name('study.edit');
    Route::post('/administrators-dashboard/study-descriptors/update/{ref}', 'StudyDescriptorsController@update')->name('study.update');
    Route::get('/administrators-dashboard/study-descriptors/remove/{ref}', 'StudyDescriptorsController@destroy')->name('study.destroy');

    //Dietary Ingredients
    Route::get('/administrators-dashboard/dietary-ingredients/create', 'DietaryIngredientsController@create')->name('ingredient.create');
    Route::post('/administrators-dashboard/dietary-ingredients/store', 'DietaryIngredientsController@store')->name('ingredient.store');
    Route::get('/administrators-dashboard/dietary-ingredients/edit/{ref}', 'DietaryIngredientsController@edit')->name('ingredient.edit');
    Route::post('/administrators-dashboard/dietary-ingredients/update/{ref}', 'DietaryIngredientsController@update')->name('ingredient.update');
    Route::get('/administrators-dashboard/dietary-ingredients/remove/{ref}', 'DietaryIngredientsController@destroy')->name('ingredient.destroy');
});