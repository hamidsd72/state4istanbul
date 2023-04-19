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

use App\Http\Controllers\Panel\AgentController;
use App\Http\Controllers\Panel\ArticleController;
use App\Http\Controllers\Panel\CityController;
use App\Http\Controllers\Panel\ContactController;
use App\Http\Controllers\Panel\ContractController;
use App\Http\Controllers\Panel\LocationController;
use App\Http\Controllers\Panel\MetaController;
use App\Http\Controllers\Panel\MeterageController;
use App\Http\Controllers\Panel\CountryController;
use App\Http\Controllers\Panel\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\PostCategoryController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\ProjectCategoryController;
use App\Http\Controllers\Panel\PropertyController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\VillaCategoryController;

Route::get('fake/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect('panel');
});

Auth::routes(['register' => false]);
Route::get('lang/{locale}', function ($locale) {
    \Illuminate\Support\Facades\App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang_set');


Route::post('filemanager/upload',function (Request $request ){
    if(isset($_FILES['upload']['name'])) {
        $file=$_FILES['upload']['name'];
        $filetmp=$_FILES['upload']['tmp_name'];
        $file_pas=explode('.',$file);
        $file_n='check_editor_'.time().'_'.$file_pas[0].'.'.end($file_pas);
        $photo=move_uploaded_file($filetmp,'assets/uploads/editor/'.$file_n);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = url('assets/uploads/editor/'.$file_n);
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;
    }
})->name('filemanager_upload');
Route::get('filemanager',function (Request $request ){
    $paths=glob('assets/uploads/editor/*');
    $fileNames=array();
    foreach ($paths as $path)
    {
        array_push($fileNames,basename($path));
    }
    $data=array(
        'fileNames'=>$fileNames
    );
    return view('file_manager')->with($data);
})->name('filemanager');




Route::post('request_expert', 'Auth\RegisterController@request_expert')->name('request_expert');

Route::group(['prefix' => 'panel', 'namespace' => 'Panel', 'middleware' => ['auth']], function () {

    // index
    Route::get('/', [PanelController::class,'index'])->name('index');
    Route::get('arz-list', [PanelController::class,'arz'])->name('arz-list');
    Route::post('arz-update/{slug}', [PanelController::class,'arz_u'])->name('arz-update');
    Route::get('/dashboard', [PanelController::class,'dashboard'])->name('dashboard');
    Route::get('city/{id}', [PanelController::class,'city'])->name('city');
    Route::get('properties/{id}', [PanelController::class,'properties'])->name('properties');

    // re
    // Route::get('re/list', 'ReController@list')->name('re-list');

    // upload file
    // Route::any('/uploads/{folder}/{waterMark}/{height}/{width}', 'PanelController@upload')->name('index-upload');
    // Route::post('/uploads/file/delete', 'PanelController@deleteUpload')->name('index-files-delete');

    // //share
    // Route::get('share/list', 'ShareController@index')->name('share-list');
    // Route::get('share/edit/{id}', 'ShareController@edit')->name('share-edit');
    // Route::patch('share/update', 'ShareController@update')->name('share-update');

    // upload-list
    // Route::get('upload/list', 'ReController@upload')->name('upload-list');
    // Route::post('upload/store', 'ReController@upload_store')->name('upload-store');

    // slider
    Route::get('slider-create', [SliderController::class,'create'])->name('slider-create');
    Route::put('slider-store', [SliderController::class,'store'])->name('slider-store');
    Route::get('slider-list', [SliderController::class,'index'])->name('slider-list');
    Route::delete('slider-destroy/{id}', [SliderController::class,'destroy'])->name('slider-destroy');
    Route::get('slider-edit/{id}', [SliderController::class,'edit'])->name('slider-edit');
    Route::patch('slider-update', [SliderController::class,'update'])->name('slider-update');

  
     // categories
     Route::get('post-category-create/', [PostCategoryController::class,'create'])->name('post-category-create');
     Route::put('post-category-store', [PostCategoryController::class,'store'])->name('post-category-store');
     Route::get('post-category-list/', [PostCategoryController::class,'index'])->name('post-category-list');
     Route::get('post-category-edit/{id}', [PostCategoryController::class,'edit'])->name('post-category-edit');
     Route::patch('post-category-update/{id}', [PostCategoryController::class,'update'])->name('post-category-update');
     Route::delete('post-category-destroy/{id}', [PostCategoryController::class,'destroy'])->name('post-category-destroy');
     Route::post('post-category-sort', [PostCategoryController::class,'sort_item'])->name('post-category-sort');
 
     // posts
 
 
     // Article
     Route::get('post-create', [ArticleController::class,'create'])->name('article-create');
     Route::put('post-store', [ArticleController::class,'store'])->name('article-store');
     Route::get('post-list', [ArticleController::class,'index'])->name('article-list');
     Route::get('post-show/{id}', [ArticleController::class,'show'])->name('article-show');
     Route::get('post-edit/{id}', [ArticleController::class,'edit'])->name('article-edit');
     Route::patch('post-update/{id}', [ArticleController::class,'update'])->name('article-update');
     Route::delete('post-destroy/{id}', [ArticleController::class,'destroy'])->name('article-destroy');
     Route::post('post-list', [ArticleController::class,'search'])->name('article-search');
 


 

    // profile
    Route::get('profile-show/{id}', [ProfileController::class,'show'])->name('profile-show');
    Route::get('profile-edit/{id}', [ProfileController::class,'edit'])->name('profile-edit');
    Route::get('profile-password-change/{id}', [ProfileController::class,'password'])->name('profile-password');
    Route::get('profile-info/{id}', [ProfileController::class,'info'])->name('profile-info');
    Route::patch('profile-update/{id}', [ProfileController::class,'update'])->name('profile-update');
    Route::patch('profile-password-update/{id}', [ProfileController::class,'password_update'])->name('profile-password-update');
    Route::patch('profile-info-update/{id}', [ProfileController::class,'info_update'])->name('profile-info-update');

    // users
    Route::get('user-create', 'UserController@create')->name('user-create');
    Route::put('user-store', 'UserController@store')->name('user-store');
    Route::post('user-store', 'UserController@store')->name('user-store-save');
    Route::post('user-reagent-description-store', 'UserController@reagent_description_store')->name('user-reagent-description-store');
    Route::get('user-list', 'UserController@index')->name('user-list');
    Route::get('customersByUserId-list/{id}/{from?}/{to?}', 'UserController@customersByUserId')->name('customersByUserId-list');
    Route::get('subsetsByUserId-list/{id}/{from?}/{to?}', 'UserController@subsetsByUserId')->name('subsetsByUserId-list');
    Route::get('user-questionnaire/{id}', 'UserController@questionnaire')->name('user-questionnaire');
    Route::post('user-questionnaire-store', 'UserController@questionnaire_store')->name('user_questionnaire_store');
    Route::get('user-questionnaire-list', 'UserController@questionnaire_list')->name('user_questionnaire_list');
    Route::post('user-refer', 'UserController@refer')->name('user-refer');
    Route::get('user-refer-list', 'UserController@refer_list')->name('user-refer-list');
    Route::get('user-refer-report-list', 'UserController@refer_report_list')->name('user-refer-report-list');
    Route::get('user-sign-in/{id}', 'UserController@sign_in')->name('user-sign-in');
    Route::get('user-sign-in-back/{id}', 'UserController@sign_in_back')->name('user-sign-in-back');
    Route::post('user-refer-deny', 'UserController@refer_deny')->name('user-refer-deny');
    Route::post('user-refer-report', 'UserController@refer_report')->name('user-refer-report');
    Route::get('user-show/{id}', 'UserController@show')->name('user-show');
    Route::get('customer-show/{id}', 'UserController@customer_show')->name('customer-show');
    Route::get('user-edit/{id}', 'UserController@edit')->name('user-edit');
    Route::get('user-report', 'UserController@report_index')->name('user-report');
    Route::get('user-report-search', 'UserController@report_search')->name('user-report-search');
    Route::get('raise_hand/{id}', 'UserController@raise_hand')->name('raise_hand');
    Route::get('raisedUsers/{id}', 'UserController@raisedUsers')->name('raisedUsers');
    Route::get('user-permissions/{id}', 'UserController@permissions')->name('user-permissions');
    Route::post('user-permissions-update/{id}', 'UserController@permissions_update')->name('user-permissions-update');
    Route::patch('user-update/{id}', 'UserController@update')->name('user-update');
    Route::put('user-update/{id}', 'UserController@update')->name('user-update-save');
    Route::delete('user-destroy/{id}', 'UserController@destroy')->name('user-destroy');
    Route::post('user-remove', 'UserController@remove')->name('user-remove');
    Route::post('user-status-update/{id}', 'UserController@status_update')->name('user-status-update');
    Route::post('user-block/{id}', 'UserController@block')->name('user-block');
    Route::post('user-list', 'UserController@search')->name('user-search');

    // Contract
    Route::post('contract-store', [ContractController::class,'store'])->name('contract-store');
    Route::post('contract-reserve-store', [ContractController::class,'reserve_store'])->name('contract-reserve-store');
    Route::get('contract-list', [ContractController::class,'index'])->name('contract-list');
    Route::get('contract-customers/{id}', [ContractController::class,'customers'])->name('contract-customers');
    Route::get('contract-canceled-list', [ContractController::class,'canceled_index'])->name('contract-canceled-list');
    Route::get('contract-deny', [ContractController::class,'deny'])->name('contract-deny');
    Route::post('contract-cancel', [ContractController::class,'cancel'])->name('contract-cancel');
    Route::get('contract-show/{id}', [ContractController::class,'show'])->name('contract-show');

    // user properties
    // Route::get('user-property-create', 'UserPropertyController@create')->name('user-property-create');
    // Route::put('user-property-store', 'UserPropertyController@store')->name('user-property-store');
    // Route::get('user-property-list', 'UserPropertyController@index')->name('user-property-list');
    // Route::get('user-property-pending-list', 'UserPropertyController@pending')->name('user-pending-list');
    // Route::get('user-property-rejected-list', 'UserPropertyController@rejected')->name('user-rejected-list');
    // Route::get('user-property-show/{id}', 'UserPropertyController@show')->name('user-property-show');
    // Route::get('user-property-edit/{id}', 'UserPropertyController@edit')->name('user-property-edit');
    // Route::patch('user-property-update/{id}', 'UserPropertyController@update')->name('user-property-update');
    // Route::post('user-property-block/{id}', 'UserPropertyController@block')->name('user-property-block');
    // Route::post('user-property-list', 'UserPropertyController@search')->name('user-property-search');

   
    // Complain
   
    Route::get('passports', 'PassportController@index')->name('passports.index');
    Route::get('passports/{passport}', 'PassportController@show')->name('passports.show');

   
    // newsletters
    // Route::get('newsletter-list-home', 'NewsletterController@home')->name('newsletter-list-home');
    // Route::get('newsletter-list-location', 'NewsletterController@location')->name('newsletter-list-location');
    // Route::get('newsletter-list-villa', 'NewsletterController@villa')->name('newsletter-list-villa');
    // Route::get('newsletter-list-blog', 'NewsletterController@blog')->name('newsletter-list-blog');
    // Route::delete('newsletter-destroy/{id}', 'NewsletterController@destroy')->name('newsletter-destroy');

    // contacts
    Route::get('contacts-list', [ContactController::class,'index'])->name('contacts-list');
    Route::delete('contacts-destroy/{id}', [ContactController::class,'destroy'])->name('contacts-destroy');
    // consulting
    Route::get('consulting-list', [ContactController::class,'index1'])->name('consulting-list');

    // question
    // Route::get('question-list', 'QuestionController@index')->name('question-list');
    // Route::delete('question-destroy/{id}', 'QuestionController@destroy')->name('question-destroy');

    // categories
    Route::get('villa-category-create', [VillaCategoryController::class,'create'])->name('villa-category-create');
    Route::post('villa-category-store', [VillaCategoryController::class,'store'])->name('villa-category-store');
    Route::get('villa-category-list', [VillaCategoryController::class,'index'])->name('villa-category-list');
    Route::get('villa-category-edit/{id}', [VillaCategoryController::class,'edit'])->name('villa-category-edit');
    Route::patch('villa-category-update/{id}', [VillaCategoryController::class,'update'])->name('villa-category-update');
    Route::delete('villa-category-destroy/{id}', [VillaCategoryController::class,'destroy'])->name('villa-category-destroy');
    Route::post('villa-category-sort', [VillaCategoryController::class,'sort_item'])->name('villa-category-sort');
    Route::post('villa-category-update-count/{id}', [VillaCategoryController::class,'update_count'])->name('villa-category-update-count');
    Route::get('villa-category-photo-destroy/{id}', [VillaCategoryController::class,'photo_destroy'])->name('villa-category-photo-destroy');
    Route::get('villa-category-active/{id}/{type}', [VillaCategoryController::class,'active'])->name('villa-category-active');


    Route::get('villa-meterage/{id}', [MeterageController::class,'index'])->name('meterage.index');
    Route::get('villa-meterage/create/{id}', [MeterageController::class,'create'])->name('meterage.create');
    Route::post('villa-meterage/{id}', [MeterageController::class,'store'])->name('meterage.store');
    Route::get('villa-meterage/edit/{project}/{id}', [MeterageController::class,'edit'])->name('meterage.edit');
    Route::put('villa-meterage/edit/{project}/{id}', [MeterageController::class,'update'])->name('meterage.update');
    Route::delete('villa-meterage/{id}', [MeterageController::class,'update'])->name('meterage.destroy');






    // properties
    Route::get('property-create', [PropertyController::class,'create'])->name('property-create');
    Route::put('property-store', [PropertyController::class,'store'])->name('property-store');
    Route::get('property-list', [PropertyController::class,'index'])->name('property-list');
    Route::get('property-edit/{id}', [PropertyController::class,'edit'])->name('property-edit');
    Route::patch('property-update/{id}', [PropertyController::class,'update'])->name('property-update');
    Route::delete('property-destroy/{id}', [PropertyController::class,'destroy'])->name('property-destroy');
    Route::post('property-list', [PropertyController::class,'search'])->name('property-search');

    // project-category
    Route::get('project-category-list', [ProjectCategoryController::class,'index'])->name('project-category-list');
    Route::get('project-category-create', [ProjectCategoryController::class,'create'])->name('project-category-create');
    Route::post('project-category-save', [ProjectCategoryController::class,'store'])->name('project-category-save');
    Route::get('project-category-edit/{id}', [ProjectCategoryController::class,'edit'])->name('project-category-edit');
    Route::get('project-category-show/{id}', [ProjectCategoryController::class,'show'])->name('project-category-show');
    Route::post('project-category-update/{id}', [ProjectCategoryController::class,'update'])->name('project-category-update');
    Route::delete('project-category-delete/{id}', [ProjectCategoryController::class,'destroy'])->name('project-category-delete');


    Route::get('agent', [AgentController::class,'index'])->name('agent.index');
    Route::get('agent/create', [AgentController::class,'create'])->name('agent.create');
    Route::post('agent/create', [AgentController::class,'store'])->name('agent.store');
    Route::get('agent/edit/{id}', [AgentController::class,'edit'])->name('agent.edit');
    Route::put('agent/edit/{id}', [AgentController::class,'update'])->name('agent.update');
    Route::delete('agent/{id}', [AgentController::class,'destroy'])->name('agent.destroy');


  // Cities
    Route::get('city-list', [CityController::class,'index'])->name('city-list');
    Route::get('city-create', [CityController::class,'create'])->name('city-create');
    Route::post('city-save', [CityController::class,'store'])->name('city-save');
    Route::get('city-edit/{id}', [CityController::class,'create'])->name('city-edit');
    Route::post('city-update', [CityController::class,'update'])->name('city-update');
    Route::get('city-delete/{id}', [CityController::class,'destory'])->name('city-delete');
    Route::get('city/{id}', [PanelController::class,'city'])->name('city');

    // locations
    Route::get('location-list/{id?}', [LocationController::class,'index'])->name('location-list');
    Route::get('location-create/{id?}', [LocationController::class,'create'])->name('location-create');
    Route::post('location-store/{id}', [LocationController::class,'store'])->name('location-store');
    Route::get('location-edit/{id}', [LocationController::class,'edit'])->name('location-edit');
    Route::patch('location-update/{id}', [LocationController::class,'update'])->name('location-update');
    Route::get('location-active/{id}/{type}', [LocationController::class,'active'])->name('location-active');
    Route::get('location-pupular/{id}/', [LocationController::class,'pupular'])->name('location-pupular');

    Route::get('country',[CountryController::class,'index'])->name('country.index');
    Route::get('country/create',[CountryController::class,'create'])->name('country.create');
    Route::post('country/create',[CountryController::class,'store'])->name('country.store');
    Route::get('country/edit/{id}',[CountryController::class,'edit'])->name('country.edit');
    Route::put('country/edit/{id}',[CountryController::class,'update'])->name('country.update');
    Route::delete('country/{id}',[CountryController::class,'destroy'])->name('country.destroy');

    // galleries
    // Route::get('gallery-create', 'GalleryController@create')->name('gallery-create');
    // Route::put('gallery-store', 'GalleryController@store')->name('gallery-store');
    // Route::get('gallery-list', 'GalleryController@index')->name('gallery-list');
    // Route::get('gallery-show/{id}', 'GalleryController@show')->name('gallery-show');
    // Route::put('gallery-photo-store', 'GalleryController@photo_store')->name('gallery-photo-store');
    // Route::get('gallery-edit/{id}', 'GalleryController@edit')->name('gallery-edit');
    // Route::patch('gallery-update/{id}', 'GalleryController@update')->name('gallery-update');
    // Route::delete('gallery-destroy/{id}', 'GalleryController@destroy')->name('gallery-destroy');
    // Route::delete('gallery-photo-destroy/{id}', 'GalleryController@photo_destroy')->name('gallery-photo-destroy');
    // Route::post('gallery-list-search', 'GalleryController@search')->name('gallery-search');

    // Route::get('/set-photo-sort', 'PanelController@setPhotoSort')->name('set-photo-sort');
    // Route::get('/set-photo-delete', 'PanelController@setPhotoDelete')->name('set-photo-delete');

    // locations galleries
    // Route::get('location-gallery-create', 'LocationGalleryController@create')->name('location-gallery-create');
    // Route::put('location-gallery-store', 'LocationGalleryController@store')->name('location-gallery-store');
    // Route::get('location-gallery-list', 'LocationGalleryController@index')->name('location-gallery-list');
    // Route::get('location-gallery-show/{id}', 'LocationGalleryController@show')->name('location-gallery-show');
    // Route::put('location-gallery-photo-store', 'LocationGalleryController@photo_store')->name('location-gallery-photo-store');
    // Route::get('location-gallery-edit/{id}', 'LocationGalleryController@edit')->name('location-gallery-edit');
    // Route::patch('location-gallery-update/{id}', 'LocationGalleryController@update')->name('location-gallery-update');
    // Route::delete('location-gallery-destroy/{id}', 'LocationGalleryController@destroy')->name('location-gallery-destroy');
    // Route::delete('location-gallery-photo-destroy/{id}', 'LocationGalleryController@photo_destroy')->name('location-gallery-photo-destroy');
    // Route::post('location-gallery-list', 'LocationGalleryController@search')->name('location-gallery-search');

    // visitlog
    // Route::get('visitlogs', 'VisitlogController@index')->name('visitlogs');

    // comments
    // Route::get('comment-list', 'CommentController@index')->name('comment-list');
    // Route::get('comment-show/{id}', 'CommentController@show')->name('comment-show');
    // Route::get('comment-edit/{id}', 'CommentController@edit')->name('comment-edit');
    // Route::patch('comment-update/{id}', 'CommentController@update')->name('comment-update');
    // Route::delete('comment-destroy/{id}', 'CommentController@destroy')->name('comment-destroy');
    // Route::patch('comment-status/{id}', 'CommentController@status')->name('comment-status');
    // Route::get('comment-status2/{id}', 'CommentController@status2')->name('comment-status2');




   
    // contact list
    Route::get('contact-list', [ContactController::class,'index'])->name('contact-list');
    Route::delete('contact-destroy', [ContactController::class,'destroy'])->name('contact-destroy');

    // contact info
    Route::get('contact-info-list', 'ContactInfoController@index')->name('contact-info-list');
    Route::get('contact-info-create', 'ContactInfoController@create')->name('contact-info-create');
    Route::post('contact-info-store', 'ContactInfoController@store')->name('contact-info-store');
    Route::get('contact-info-edit/{id}', 'ContactInfoController@edit')->name('contact-info-edit');
    Route::post('contact-info-update/{id}', 'ContactInfoController@update')->name('contact-info-update');
    Route::get('contact-info-destroy/{id}', 'ContactInfoController@destroy')->name('contact-info-destroy');
    Route::get('contact-info-active/{id}/{type}/{item_type}', 'ContactInfoController@active')->name('contact-info-active');

    // meta
    Route::get('meta-list',[MetaController::class,'index'])->name('meta-list');
    Route::get('meta-create', [MetaController::class,'create'])->name('meta-create');
    Route::post('meta-store', [MetaController::class,'store'])->name('meta-store');
    Route::get('meta-edit/{id}', [MetaController::class,'edit'])->name('meta-edit');
    Route::post('meta-update/{id}', [MetaController::class,'update'])->name('meta-update');
    Route::get('meta-destroy/{id}', [MetaController::class,'destroy'])->name('meta-destroy');
    Route::get('meta-active/{id}/{type}', [MetaController::class,'active'])->name('meta-active');


    Route::get('settings',[SettingController::class,'index'])->name('settings.index');
    Route::get('settings/create',[SettingController::class,'create'])->name('settings.create');
    Route::post('settings/create',[SettingController::class,'store'])->name('settings.store');
    Route::get('settings/edit/{id}',[SettingController::class,'edit'])->name('settings.edit');
    Route::put('settings/edit/{id}',[SettingController::class,'update'])->name('settings.update');
    Route::delete('settings/{id}',[SettingController::class,'destroy'])->name('settings.destroy');

    


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
