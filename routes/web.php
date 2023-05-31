<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ArchitectureController as ControllersArchitectureController;
use App\Http\Controllers\backend\backendUsersController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DiscoverItemController;
use App\Http\Controllers\backend\FeatureController;
use App\Http\Controllers\backend\OtherFeatureController;
use App\Http\Controllers\backend\RequestDemoController;
use App\Http\Controllers\backend\ResourceController;
use App\Http\Controllers\backend\sitecontent\AboutUsController as SitecontentAboutUsController;
use App\Http\Controllers\backend\sitecontent\ArchitectureController;
use App\Http\Controllers\backend\sitecontent\CardProductServiceController;
use App\Http\Controllers\backend\sitecontent\ContactUsController as SitecontentContactUsController;
use App\Http\Controllers\backend\sitecontent\ContentFeatureController;
use App\Http\Controllers\backend\sitecontent\ContentMetaController;
use App\Http\Controllers\backend\sitecontent\EmptyResourceController;
use App\Http\Controllers\backend\sitecontent\EmptySearchController;
use App\Http\Controllers\backend\sitecontent\PartnerController;
use App\Http\Controllers\backend\sitecontent\ProductDetailController;
use App\Http\Controllers\backend\sitecontent\ProductServiceController;
use App\Http\Controllers\backend\sitecontent\ResourceSettingController;
use App\Http\Controllers\backend\sitecontent\ServiceDetailController;
use App\Http\Controllers\backend\sitecontent\SiteContentController;
use App\Http\Controllers\backend\SolutionController as BackendSolutionController;
use App\Http\Controllers\backend\SubSolutionController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSettingController;
use App\Http\Controllers\ProductAndServiceController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceDetailsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SolutionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

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


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum']], function () {
	Route::get('dashboard', function(){
		return view('dashboard');
	});
	Route::resource('solutions', BackendSolutionController::class);
	Route::resource('sub-solution', SubSolutionController::class);
	Route::post('sub-solution/new/{id}', [BackendSolutionController::class, 'sub_solution_store']);
	Route::get('/solutions/{solution:slug}/sub-solution/{subSolution:slug}', [SubSolutionController::class, 'get']);
	Route::post('sub-solution/update/{id}', [SubSolutionController::class, 'updateSubSolution']);

	Route::post('home-setting/seometa/update', [HomeSettingController::class, 'seoUpdate']);
	Route::post('home-setting/contact-us/update', [HomeSettingController::class, 'contactUpdate']);
	Route::post('home-setting/social-media/update', [HomeSettingController::class, 'socialMediaMpdate']);

	Route::post('feature/new/{id}', [SubSolutionController::class, 'feature_store']);
	Route::get('feature/delete/{id}', [SubSolutionController::class, 'feature_destroy']);
	Route::post('feature/update/{feature}', [FeatureController::class, 'update']);
	Route::resource('feature', FeatureController::class);
	
	Route::post('other-feature/new/{id}', [SubSolutionController::class, 'other_feature_store']);
	Route::get('other-feature/delete/{id}', [SubSolutionController::class, 'other_feature_destroy']);
	Route::post('other-feature/update/{otherFeature}', [OtherFeatureController::class, 'update']);
	Route::resource('other-feature', OtherFeatureController::class);

	Route::post('discover-item/update/{discoverItem}', [DiscoverItemController::class, 'update']);

	
	Route::resource('product-service', ProductServiceController::class);
	Route::get('/product-service-card/{siteContent:slug}', [CardProductServiceController::class, 'edit'])->name('product-service-card');
	Route::post('/product-service-card/update/{siteContent:slug}', [CardProductServiceController::class, 'update'])->name('product-service-card-update');
	
	Route::resource('product-detail', ProductDetailController::class);

	Route::resource('architecture', ArchitectureController::class);
	Route::get('architecture-feature/{SiteContent:slug}', [ContentFeatureController::class, 'features']);
	Route::get('architecture-feature/delete/{ContentFeature:id}', [ContentFeatureController::class, 'delete']);
	Route::post('architecture-feature/new/{SiteContent:id}', [ContentFeatureController::class, 'AddFeature']);
	Route::post('architecture-feature/update/{ContentFeature:id}', [ContentFeatureController::class, 'UpdateFeature']);

	Route::get('content-feature/{SiteContent:slug}', [ContentFeatureController::class, 'features']);
	Route::get('content-feature/delete/{ContentFeature:id}', [ContentFeatureController::class, 'delete']);
	Route::post('content-feature/new/{SiteContent:id}', [ContentFeatureController::class, 'AddFeature']);
	Route::post('content-feature/update/{ContentFeature:id}', [ContentFeatureController::class, 'UpdateFeature']);

	Route::get('content-benefit/{SiteContent:slug}', [ContentFeatureController::class, 'benefits']);
	Route::get('content-benefit/delete/{ContentFeature:id}', [ContentFeatureController::class, 'delete']);
	Route::post('content-benefit/new/{SiteContent:id}', [ContentFeatureController::class, 'AddFeature']);
	Route::post('content-benefit/update/{ContentFeature:id}', [ContentFeatureController::class, 'UpdateFeature']);

	Route::resource('service-detail', ServiceDetailController::class);

	
	Route::post('content-meta/new/{SiteContent:id}', [ContentMetaController::class, 'add']);
	Route::post('content-meta/update/{ContentMeta:id}', [ContentMetaController::class, 'updateMeta']);
	Route::get('content-meta/delete/{ContentMeta:id}', [ContentMetaController::class, 'delete']);

	Route::resource('users-list', backendUsersController::class);
	Route::get('user/delete/{user}', [backendUsersController::class, 'delete_user'])->name('delete-user');
	Route::get('user/administrator', [backendUsersController::class, 'user_admin'])->name('users-list.administrator');
	Route::get('user/membership', [backendUsersController::class, 'user_member'])->name('users-list.membership');

	Route::get('resources/delete/{SiteContent:id}', [ResourceController::class, 'destroy']);
	Route::resource('resources', ResourceController::class);
	Route::resource('resources-settings', ResourceSettingController::class);

	
	Route::post('categories/update/{category:id}', [CategoryController::class, 'update']);
	Route::get('categories/delete/{category:id}', [CategoryController::class, 'destroy']);
	Route::resource('categories', CategoryController::class);

	Route::post('contact-us/add-item/{id}', [SitecontentContactUsController::class, 'selectItemAdd']);
	Route::post('contact-us/update-item/{ContentMeta:id}', [SitecontentContactUsController::class, 'selectItemUpdate']);
	Route::get('contact-us/delete-item/{ContentMeta:id}', [SitecontentContactUsController::class, 'selectItemdelete']);
	Route::resource('contact-us', SitecontentContactUsController::class);

	Route::get('about-us/{slug}/section/edit', [SitecontentAboutUsController::class, 'sections'])->name('about-us-sections');
	Route::post('about-us/{id}/section/update', [SitecontentAboutUsController::class, 'sectionUpdate'])->name('about-us-sections.update');
	Route::post('about-us/value-item/add', [SitecontentAboutUsController::class, 'addValue']);
	Route::post('about-us/value-item/update', [SitecontentAboutUsController::class, 'updateValue']);
	Route::post('about-us/value-item/delete', [SitecontentAboutUsController::class, 'removeValue']);
	Route::resource('about-us', SitecontentAboutUsController::class);
	
	Route::get('partners/delete/{id}', [PartnerController::class, 'destroy']);
	Route::resource('partners', PartnerController::class);
	
	Route::get('request-demo/organization-type', [SitecontentContactUsController::class, 'index']);
	Route::get('request-demo/inquiry-subject', [SitecontentContactUsController::class, 'index']);
	Route::post('request-demo/delete/{id}', [RequestDemoController::class, 'destroy']);
	Route::get('request-demo/active/{id}', [RequestDemoController::class, 'markActive']);
	Route::resource('request-demo', RequestDemoController::class);

	Route::resource('search-setting', EmptySearchController::class);
	Route::resource('resource-setting', EmptyResourceController::class);

	Route::get('/clear/route', function(){
		\Artisan::call('route:clear');
		return redirect('/');

	});
	Route::get('/clear/cache', function(){
		\Artisan::call('cache:clear');
		return redirect('/');

	});
	Route::get('/clear/view', function(){
		\Artisan::call('view:clear');
		return redirect('/');

	});
	Route::get('/clear/config', function(){
		\Artisan::call('config:clear');
		return redirect('/');

	});
	Route::get('/optimize', function(){
		\Artisan::call('optimize');
		return redirect('/');

	});
	Route::get('/clear/compiled', function(){
		\Artisan::call('clear-compiled');
		return redirect('/');
	});
	Route::get('clear/optimize', function(){
		\Artisan::call('optimize:clear');
		return redirect('/');
	});
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard', function () {
		return redirect()->route('home-setting.index');
	})->name('dashboard');

	Route::resource('home-setting', HomeSettingController::class);

    Route::get('/logout', [SessionsController::class, 'destroy']);
});



Route::group(['middleware' => 'web'], function () {
	Route::get('/', [HomeController::class, 'home']);
	Route::get('/solutions', function(){
		return redirect('/#solutions');
	});
	Route::get('/solutions/{solutions:slug}', [SolutionController::class, 'getSolution']);
	Route::get('/solutions/{solutions:slug}/detail', [SolutionController::class, 'showdetail']);
	// Route::get('/solutions/{sub_solution_slug}/{slug}', [SolutionController::class, 'showdetail']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);

	Route::post('/discover', [DiscoverController::class, 'discover']);

	Route::resource('/product-and-service', ProductAndServiceController::class);
	Route::resource('/product-details', ProductDetailsController::class);
	Route::resource('/services-details', ServiceDetailsController::class);
	Route::resource('architecture', ControllersArchitectureController::class);
	
	Route::resource('about-us', AboutUsController::class);
	Route::post('/contact-us/submit', [ContactUsController::class, 'sumbited']);
	Route::resource('contact-us', ContactUsController::class);


	Route::get('/resources', [ResourcesController::class, 'index'])->name('resources');
	Route::get('/resources/category/{slug}', [ResourcesController::class, 'category']);
	Route::get('/resources/{slug}', [ResourcesController::class, 'show'])->name('resource');

});

Route::get('/login', function () {
	if (Auth::user()) {
		return redirect()->route('home-setting.index');
	}
    return view('session/login-session');
})->name('login');

Route::get('/search', function(){
	return redirect('/');
});
Route::post('/search', [SearchController::class, 'search']);

Route::get('create-role', function(){
	$role = Role::create(['name' => 'administrator']);
	$permission = ModelsPermission::create(['name' => 'administrator']);
	$role->givePermissionTo($permission);

	$role = Role::create(['name' => 'membership']);
	$permission = ModelsPermission::create(['name' => 'membership']);
	$role->givePermissionTo($permission);
	return dd($permission);
});


Route::get('set-admin', function(){
	
	$permission = ModelsPermission::findByName('administrator');
	$user = User::where('email', '=', 'admin@softui.com')->firstOrFail();
	$user->givePermissionTo($permission);
	$user->assignRole('administrator');
	
	return dd($user->permissions);
});
