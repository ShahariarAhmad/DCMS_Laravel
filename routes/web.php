<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontInterface;
use App\Http\Controllers\EndInterface;
use App\Http\Controllers\appointmentController;
use App\Http\Controllers\dietController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\FrontSpaController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\DB;

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

Route::get('q',function(){
	
	if (PHP_OS === 'WINNT')
	{
		exec(sprintf("rd /s /q %s", escapeshellarg(public_path('/assets/frontend/images'))));
	}
	else
	{
		exec(sprintf("rm -rf %s", escapeshellarg(public_path('/assets/frontend/images'))));
	}

	$zip = new ZipArchive;
	if ($zip->open( resource_path('seeder/images.zip')) === TRUE) {
		// return 'echooo';
		$zip->extractTo( public_path('/assets/frontend'));
		$zip->close();
	}
});

Route::get('/setup', function(){
    DB::table('roles')->insert([
		[
			'id' => 1,
			'name' => 'admin',
			'permission' => 'CRUD',
		],
		[
			'id' => 2,
			'name' => 'moderator',
			'permission' => 'CRU',
		],
		[
			'id' => 3,
			'name' => 'patient',
			'permission' => 'N\A',
		],
		[
			'id' => 4,
			'name' => 'writer',
			'permission' => 'N\A',
		]
	]);

})->name('index');


Route::get('/dashhub', function () {

	if (auth()->user()->id === 1) {
		return redirect()->route('Dashboard');
	} elseif (auth()->user()->id === 2) {
		return redirect()->route('Dashboard_moderator_dashboard');
	} elseif (auth()->user()->id === 3) {
		return redirect()->route('Dashboard_patitient_dashboard');
	} elseif (auth()->user()->id === 4) {
		return redirect()->route('Dashboard_writer_dashboard');
	}


	return redirect()->route('Dashboard_patitient_dashboard');
});




Route::get('/', [FrontSpaController::class, 'index'])->name('index');
Route::get('/blog', [FrontSpaController::class, 'blogCount']);
Route::get('/blog/{id}', [FrontSpaController::class, 'fullArticle']);
Route::get('/blog/{from}/{to}', [FrontSpaController::class, 'blog'])->name('blog');
Route::get('/gallery', [FrontSpaController::class, 'galleryCount']);
Route::get('/gallery/{from}/{to}', [FrontSpaController::class, 'gallery'])->name('blog');
Route::get('/dashboard/appointment/store', [appointmentController::class, 'store'])
	->name('appointment_store');
Auth::routes();
Route::middleware(['auth'])->group(function () {
	Route::post('/dashboard/request_diet/sent/', [dietController::class, 'request_diet_form'])
		->name('Dashboard_request_diet_form');
	Route::get("/dashboard/diet_requests/create_chart", [dietController::class, 'create_chart'])
		->name('Dashboard_create_chart');
	Route::get('/dashboard/diet_requests/payment_confirmed', [dietController::class, 'payment_confirmed'])
		->name('Dashboard_payment_confirmed');
	Route::get('/dashboard/diet_requests/trix_notFound', [dietController::class, 'trix_notFound'])
		->name('Dashboard_trix_notFound');
	Route::post('/dashboard/create_chart/upload', [dietController::class, 'create_chart_post'])
		->name('Dashboard_create_chart_post');
	Route::post('/dashboard/pre_made_diet_charts/send', [dietController::class, 'sendPremade'])
		->name('Dashboard_sendPremade');
	Route::get('/dashboard/create_serials/tid={trix_id}/action=withdrawn', [EndInterface::class, 'accountReject'])->name('withdrawn');
	Route::get('dashboard/create_serials/tid={trix_id}/action=approve', [EndInterface::class, 'accountApprove']);
	Route::get('/dashboard/create_serials/tid={trix_id}/action=notFound', [EndInterface::class, 'accountNotFound']);
	Route::get('dashboard/create_serials/tid={transaction_id}/action=present', [EndInterface::class, 'accountPresent']);
	Route::get('dashboard/create_serials/tid={transaction_id}/action=absent', [EndInterface::class, 'accountAbsent']);
	Route::get('/dashboard/pre_made_diet_charts/premade/{id}', [dietController::class, 'preview_diet']);
	Route::post('/dashboard/diet/update', [dietController::class, 'updateDiet'])
		->name('Dashboard_updateDiet');
	Route::get('/dashboard/all_records/search', [searchController::class, 'all_records_search'])
		->name('Dashboard_all_records_search');
	Route::get('/dashboard/diet_records/search', [searchController::class, 'all_diet_records_search'])
		->name('Dashboard_all_diet_records_search');
	Route::get('/dashboard', [EndInterface::class, 'admin_dashboard'])
		->name('Dashboard');
	Route::get('/dashboard/quickform', [EndInterface::class, 'quickform'])
		->name('Dashboard_quickform');
	Route::get('/dashboard/create_chart', [EndInterface::class, 'quickformWithRequest'])
		->name('Dashboard_quickformWithRequest');
	Route::get('/dashboard/about', [EndInterface::class, 'about'])
		->name('Dashboard_about');
	Route::get('/dashboard/accounts', [EndInterface::class, 'accounts'])
		->name('Dashboard_accounts');
	Route::get('/dashboard/admin_dashboard', [EndInterface::class, 'admin_dashboard'])
		->name('Dashboard_admin_dashboard');
	Route::get('/dashboard/appointment', [EndInterface::class, 'appointment'])
		->name('Dashboard_appointment');
	Route::get('/dashboard/chamber_details', [EndInterface::class, 'chamber_details'])
		->name('Dashboard_chamber_details');
	Route::get('/dashboard/contact', [EndInterface::class, 'contact'])
		->name('Dashboard_contact');
	Route::get('/dashboard/create_diet', [EndInterface::class, 'create_diet'])
		->name('Dashboard_create_diet');
	Route::get('/dashboard/developer', [EndInterface::class, 'developer'])
		->name('Dashboard_developer');
	Route::get('/dashboard/current_diet_chart', [EndInterface::class, 'view_chart'])
		->name('Dashboard_view_chart');
	Route::get('/dashboard/request_diet', [EndInterface::class, 'request_diet'])
		->name('Dashboard_request_diet');
	Route::get('/dashboard/feedback', [EndInterface::class, 'feedback'])
		->name('Dashboard_feedback');
	Route::post('/dashboard/patitient_profile/update', [EndInterface::class, 'changePass'])
		->name('Dashboard_changePass');
	Route::get('/dashboard/gallery', [EndInterface::class, 'gallery'])
		->name('Dashboard_gallery');
	Route::get('/moderator_dashboard', [EndInterface::class, 'moderator_dashboard'])
		->name('Dashboard_moderator_dashboard');
	Route::get('/patient_dashboard', [EndInterface::class, 'patitient_dashboard'])
		->name('Dashboard_patitient_dashboard');
	Route::get('/dashboard/patitient_profile', [EndInterface::class, 'patitient_profile'])->name('Dashboard_patitient_profile');
	Route::get('/dashboard/payments', [EndInterface::class, 'payment'])
		->name('Dashboard_payments');
	Route::get('/dashboard/payment_history', [EndInterface::class, 'payment_history'])
		->name('Dashboard_payment_history');
	Route::get('/dashboard/create_serials', [EndInterface::class, 'appointments_serials'])
		->name('Dashboard_appointments_serials');
	Route::get('/dashboard/social_links', [EndInterface::class, 'social_links'])
		->name('Dashboard_social_links');
	Route::get('/dashboard/writer_dashboard', [EndInterface::class, 'writer_dashboard'])
		->name('Dashboard_writer_dashboard');
	Route::get('/dashboard/write_a_blog', [EndInterface::class, 'write_a_blog'])
		->name('Dashboard_write_a_blog');
	Route::get('/dashboard/blog/all_blogs', [blogController::class, 'allBlogPost'])
		->name('Dashboard_allBlogPost');
	Route::post('/dashboard/write_a_blog/post', [blogController::class, 'uploadBlogPost'])
		->name('Dashboard_uploadBlogPost');
	Route::get('/dashboard/blog/delete={delete}', [blogController::class, 'deleteBlogPost'])
		->name('Dashboard_deleteBlogPost');
	Route::get('/dashboard/blog/edit={edit}', [blogController::class, 'editBlogPost'])
		->name('Dashboard_editBlogPost');
	Route::post('/dashboard/blog/update', [blogController::class, 'updateBlogPost'])
		->name('Dashboard_updateBlogPost');
	Route::get('/dashboard/blog/attach={id}', [blogController::class, 'attachFeaturedBlogPost'])
		->name('Dashboard_attachFeaturedBlogPost');
	Route::get('/dashboard/blog/detach={id}', [blogController::class, 'detachFeaturedBlogPost'])
		->name('Dashboard_detachFeaturedBlogPost');
	Route::get('/blog/tag={id}/posts', [FrontInterface::class, 'tagRelatedPosts'])
		->name('Dashboard_tagRelatedPosts');
	Route::get('/blog/category={id}/posts', [FrontInterface::class, 'categoryRelatedPost'])
		->name('Dashboard_categoryRelatedPost');
	Route::get('/create_serials', [EndInterface::class, 'createSerials'])
		->name('Dashboard_createSerials');
	Route::get('/dashboard/event/', [pageController::class, 'event'])
		->name('Dashboard_event');
	Route::post('/dashboard/event/create', [pageController::class, 'createEvent'])
		->name('Dashboard_createEvent');
	Route::get('/dashboard/event/edit={id}', [pageController::class, 'editEvent'])
		->name('Dashboard_editEvent');
	Route::post('/dashboard/event/update', [pageController::class, 'updateEvent'])
		->name('Dashboard_updateEvent');
	Route::get('/dashboard/event/delete={id}', [pageController::class, 'deleteEvent'])
		->name('Dashboard_deleteEvent');
	Route::get('/dashboard/accounts/delete={id}', [EndInterface::class, 'deleteAccount'])
		->name('Dashboard_deleteAccount');
	Route::post('/dashboard/accounts/add', [EndInterface::class, 'addAccount'])
		->name('Dashboard_addAccount');
	Route::get('/admin_dashboard/article/edit={edit}', [blogController::class, 'editBlogPost'])
		->name('Dashboard_editBlogPost');
	Route::get('/admin_dashboard/inbox/delete={id}', [blogController::class, 'deleteInboxMsg'])
		->name('deleteInboxMsg');
	Route::get('/dashboard/edit_diet/{id}', [dietController::class, 'editDiet'])
		->name('Dashboard_diet_drafts');
	Route::get('/dashboard/all_payment_and_transaction_records', [EndInterface::class, 'all_payment_and_transaction_records'])
		->name('Dashboard_all_payment_and_transaction_records');
	Route::get('/dashboard/diet_requests', [EndInterface::class, 'diet_requests'])
		->name('Dashboard_diet_requests');
	Route::get('/dashboard/diet_drafts', [EndInterface::class, 'diet_drafts'])
		->name('Dashboard_diet_drafts');
	Route::get('/dashboard/pre_made_diet_charts', [EndInterface::class, 'pre_made_diet_charts'])
		->name('Dashboard_pre_made_diet_charts');
	Route::get('/dashboard/diet_records', [EndInterface::class, 'diet_records'])
		->name('Dashboard_diet_records');
	Route::get('/dashboard/pre_made_diet_records', [EndInterface::class, 'pre_made_diet_records'])
		->name('Dashboard_pre_made_diet_records');
	Route::get('/dashboard/pre_made_diet_records/search', [searchController::class, 'pre_made_diet_records_search'])
		->name('Dashboard_pre_made_diet_records_search');
	Route::get('/dashboard/pre_made_diet_records/{id}/detach', [EndInterface::class, 'pre_detach'])
		->name('Dashboard_pre_detach');
	Route::get('/dashboard/accounts/search', [searchController::class, 'user_records_search'])
		->name('Dashboard_user_records_search');
	Route::post('/dashboard/history/submit', [EndInterface::class, 'submit_mcq'])
		->name('Dashboard_submit_mcq');
	Route::get('/dashboard/history', [EndInterface::class, 'mcq'])
		->name('Dashboard_mcq');
	Route::get('/dashboard/tags', [blogController::class, 'tags'])
		->name('Dashboard_tags');
	Route::post('/dashboard/tags/insert', [blogController::class, 'tagRequest'])
		->name('Dashboard_tagsRequest');
	Route::get('/dashboard/tags/{id}', [blogController::class, 'tagDelete'])
		->name('Dashboard_tagDelete');
	Route::get('/dashboard/categories', [blogController::class, 'categories'])
		->name('Dashboard_categories');
	Route::get('/dashboard/diet_records/diet/id={id}/detach', [dietController::class, 'detachDiet'])
		->name('Dashboard_detachDiet');
	Route::post('/dashboard/categories/insert', [blogController::class, 'categoryRequest'])
		->name('Dashboard_categoriesRequest');
	Route::get('/dashboard/categories/{id}', [blogController::class, 'categoryDelete'])
		->name('Dashboard_categoryDelete');
	Route::get('/dashboard/gallery/{id}/delete', [pageController::class, 'galleryDelete'])
		->name('Dashboard_galleryDelete');
	Route::post('/dashboard/gallery/upload', [pageController::class, 'galleryUpload'])
		->name('Dashboard_galleryUpload');
	Route::post('/dashboard/contact/api/update', [pageController::class, 'apiUpdate'])
		->name('Dashboard_apiUpdate');
	Route::post('/dashboard/contact/services/update', [pageController::class, 'servicesUpdate'])
		->name('Dashboard_servicesUpdate');
	Route::post('/dashboard/about/update', [pageController::class, 'aboutUpdate'])
		->name('Dashboard_aboutUpdate');
	Route::post('/dashboard/about/aboutServicesUpdate', [pageController::class, 'aboutServicesUpdate'])
		->name('Dashboard_aboutServicesUpdate');
	Route::post('/dashboard/about/bannerAboutO', [pageController::class, 'bannerAboutO'])
		->name('Dashboard_bannerAboutO');
	Route::post('/dashboard/about/bannerAboutT', [pageController::class, 'bannerAboutT'])
		->name('Dashboard_bannerAboutT');
	Route::post('/dashboard/chamber_details/update', [pageController::class, 'chamberDetailsUpdate'])
		->name('Dashboard_chamberDetailsUpdate');
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/logout', function () {
		Auth::logout();
		return redirect('/');
	})->name('logout');
});
