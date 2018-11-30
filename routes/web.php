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

//ajax abbreviation search
Route::post('/searching', 'PagesController@searchAbbreviations');
Route::get('/live_search/action', 'PagesController@action')->name('live_search.action');
Route::get('/find', 'PagesController@find')->name('typeahead.search');
Route::get('/find2', 'PagesController@find2')->name('typeahead.search2');
Route::get('/find3', 'PagesController@find3')->name('typeahead.search3');



// download link for full database
Route::get('/download-database', 'DownloadsController@downloadDatabase')->name('data.download');
Route::get('/download-zip-csv/{query}', 'DownloadsController@downloadZipCSV')->name('zip.download');


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
    Route::get('/administrators-dashboard/dietary-nutrients', 'AdministratorsController@nutrients')->name('admin.nutrients');
    Route::get('/administrators-dashboard/subjects', 'AdministratorsController@subjects')->name('admin.subjects');
    Route::get('/administrators-dashboard/performance-data', 'AdministratorsController@performances')->name('admin.performances');
    Route::get('/administrators-dashboard/invitros', 'AdministratorsController@invitros')->name('admin.invitros');
    Route::get('/administrators-dashboard/infusions', 'AdministratorsController@infusions')->name('admin.infusions');
    Route::get('/administrators-dashboard/genome-transcripts', 'AdministratorsController@genomes')->name('admin.genomes');
    Route::post('/import-files', 'AdministratorsController@importFile')->name('import.files');
    Route::post('/import-workbook', 'AdministratorsController@importWorkbook')->name('import.workbook');
    Route::get('/import-count', 'AdministratorsController@countSheets');

    //Study Descriptors
    Route::get('/administrators-dashboard/study-descriptors/create', 'StudyDescriptorsController@create')->name('study.create');
    Route::post('/administrators-dashboard/study-descriptors/store', 'StudyDescriptorsController@store')->name('study.store');
    Route::get('/administrators-dashboard/study-descriptors/edit/{id}', 'StudyDescriptorsController@edit')->name('study.edit');
    Route::post('/administrators-dashboard/study-descriptors/update/{id}', 'StudyDescriptorsController@update')->name('study.update');
    Route::get('/administrators-dashboard/study-descriptors/remove/{id}', 'StudyDescriptorsController@destroy')->name('study.destroy');

    //Dietary Ingredients
    Route::get('/administrators-dashboard/dietary-ingredients/create', 'DietaryIngredientsController@create')->name('ingredient.create');
    Route::post('/administrators-dashboard/dietary-ingredients/store', 'DietaryIngredientsController@store')->name('ingredient.store');
    Route::get('/administrators-dashboard/dietary-ingredients/edit/{id}', 'DietaryIngredientsController@edit')->name('ingredient.edit');
    Route::post('/administrators-dashboard/dietary-ingredients/update/{id}', 'DietaryIngredientsController@update')->name('ingredient.update');
    Route::get('/administrators-dashboard/dietary-ingredients/remove/{id}', 'DietaryIngredientsController@destroy')->name('ingredient.destroy');

    //Dietary Nutrients
    Route::get('/administrators-dashboard/dietary-nutrients/create', 'DietaryNutrientsController@create')->name('nutrient.create');
    Route::post('/administrators-dashboard/dietary-nutrients/store', 'DietaryNutrientsController@store')->name('nutrient.store');
    Route::get('/administrators-dashboard/dietary-nutrients/edit/{id}', 'DietaryNutrientsController@edit')->name('nutrient.edit');
    Route::post('/administrators-dashboard/dietary-nutrients/update/{id}', 'DietaryNutrientsController@update')->name('nutrient.update');
    Route::get('/administrators-dashboard/dietary-nutrients/remove/{id}', 'DietaryNutrientsController@destroy')->name('nutrient.destroy');

    //Subjects
    Route::get('/administrators-dashboard/subjects/create', 'SubjectsController@create')->name('subject.create');
    Route::post('/administrators-dashboard/subjects/store', 'SubjectsController@store')->name('subject.store');
    Route::get('/administrators-dashboard/subjects/edit/{id}', 'SubjectsController@edit')->name('subject.edit');
    Route::post('/administrators-dashboard/subjects/update/{id}', 'SubjectsController@update')->name('subject.update');
    Route::get('/administrators-dashboard/subjects/remove/{id}', 'SubjectsController@destroy')->name('subject.destroy');

    //Performance Data
    Route::get('/administrators-dashboard/performance-data/create', 'PerformanceDataController@create')->name('performance.create');
    Route::post('/administrators-dashboard/performance-data/store', 'PerformanceDataController@store')->name('performance.store');
    Route::get('/administrators-dashboard/performance-data/edit/{id}', 'PerformanceDataController@edit')->name('performance.edit');
    Route::post('/administrators-dashboard/performance-data/update/{id}', 'PerformanceDataController@update')->name('performance.update');
    Route::get('/administrators-dashboard/performance-data/remove/{id}', 'PerformanceDataController@destroy')->name('performance.destroy');

    //Invitros Data
    Route::get('/administrators-dashboard/invitros/create', 'InVitroDataController@create')->name('invitros.create');
    Route::post('/administrators-dashboard/invitros/store', 'InVitroDataController@store')->name('invitros.store');
    Route::get('/administrators-dashboard/invitros/edit/{id}', 'InVitroDataController@edit')->name('invitros.edit');
    Route::post('/administrators-dashboard/invitros/update/{id}', 'InVitroDataController@update')->name('invitros.update');
    Route::get('/administrators-dashboard/invitros/remove/{id}', 'InVitroDataController@destroy')->name('invitros.destroy');

    //Infusions
    Route::get('/administrators-dashboard/infusions/create', 'InfusionsController@create')->name('infusions.create');
    Route::post('/administrators-dashboard/infusions/store', 'InfusionsController@store')->name('infusions.store');
    Route::get('/administrators-dashboard/infusions/edit/{id}', 'InfusionsController@edit')->name('infusions.edit');
    Route::post('/administrators-dashboard/infusions/update/{id}', 'InfusionsController@update')->name('infusions.update');
    Route::get('/administrators-dashboard/infusions/remove/{id}', 'InfusionsController@destroy')->name('infusions.destroy');

    //Genome Transcripts
    Route::get('/administrators-dashboard/genomes/create', 'GenomeTranscriptsController@create')->name('genomes.create');
    Route::post('/administrators-dashboard/genomes/store', 'GenomeTranscriptsController@store')->name('genomes.store');
    Route::get('/administrators-dashboard/genomes/edit/{id}', 'GenomeTranscriptsController@edit')->name('genomes.edit');
    Route::post('/administrators-dashboard/genomes/update/{id}', 'GenomeTranscriptsController@update')->name('genomes.update');
    Route::get('/administrators-dashboard/genomes/remove/{id}', 'GenomeTranscriptsController@destroy')->name('genomes.destroy');

});