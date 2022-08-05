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

Route::get('/dashhub', function () {

	if (auth()->user()->role_id == 1) {
		return redirect()->route('Dashboard');
	}

	if (auth()->user()->role_id == 2) {
		return redirect(route('Dashboard_moderator_dashboard'));
	}
	if (auth()->user()->role_id == 3) {
		return redirect(route('Dashboard_patitient_dashboard'));
	}
	if (auth()->user()->role_id == 4) {
		return redirect(route('Dashboard_writer_dashboard'));
	}
});




Route::get('/', [FrontSpaController::class, 'index'])->name('index');
Route::get('/blog', [FrontSpaController::class, 'blogCount']);
Route::get('/blog/{id}', [FrontSpaController::class, 'fullArticle']);
Route::get('/blog/{from}/{to}', [FrontSpaController::class, 'blog'])->name('blog');
Route::get('/gallery', [FrontSpaController::class, 'galleryCount']);
Route::get('/gallery/{from}/{to}', [FrontSpaController::class, 'gallery'])->name('blog');
Route::get('/appointment/store', [appointmentController::class, 'store'])
	->name('appointment_store');

Auth::routes();



// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {

//     });
// });




Route::middleware(['auth'])->group(function () {




	Route::prefix('dashboard')->group(function () {
		Route::post('/request_diet/sent/', [dietController::class, 'request_diet_form'])
			->name('Dashboard_request_diet_form');
		Route::get("/dashboard/diet_requests/{id}/{trix}/create", [dietController::class, 'create_chart'])
			->name('Dashboard_create_chart');
		Route::get('/diet_requests/{id}/confirmed', [dietController::class, 'payment_confirmed'])
			->name('Dashboard_payment_confirmed');
		Route::get('/diet_requests/{id}/notFound', [dietController::class, 'trix_notFound'])
			->name('Dashboard_trix_notFound');
		Route::post('/create_chart/upload', [dietController::class, 'create_chart_post'])
			->name('Dashboard_create_chart_post');
		Route::post('/pre_made_diet_charts/send', [dietController::class, 'sendPremade'])
			->name('Dashboard_sendPremade');
		Route::prefix('serials')->group(function () {
			Route::get('{trix_id}/withdrawn', [EndInterface::class, 'accountReject'])->name('withdrawn');
			Route::get('{trix_id}/approve', [EndInterface::class, 'accountApprove'])->name('approve');
			Route::get('{trix_id}/not-found', [EndInterface::class, 'accountNotFound'])->name('notFound');
			Route::get('{transaction_id}/present', [EndInterface::class, 'accountPresent'])->name('present');
			Route::get('{transaction_id}/absent', [EndInterface::class, 'accountAbsent'])->name('absent');
		});







		Route::prefix('gallery')->group(function () {

			Route::delete('{id}/delete', [pageController::class, 'galleryDelete'])
				->name('Dashboard_galleryDelete');
			Route::get('/', [EndInterface::class, 'gallery'])
				->name('Dashboard_gallery');
			Route::post('upload', [pageController::class, 'galleryUpload'])
				->name('Dashboard_galleryUpload');
		});

		Route::prefix('about')->group(function () {
			Route::post('/about/update', [pageController::class, 'aboutUpdate'])
				->name('Dashboard_aboutUpdate');
			Route::post('/about/aboutServicesUpdate', [pageController::class, 'aboutServicesUpdate'])
				->name('Dashboard_aboutServicesUpdate');
			Route::post('/about/bannerAboutO', [pageController::class, 'bannerAboutO'])
				->name('Dashboard_bannerAboutO');
			Route::post('/about/bannerAboutT', [pageController::class, 'bannerAboutT'])
				->name('Dashboard_bannerAboutT');
		});
		Route::prefix('chambers')->group(function () {
			Route::post('/chamber_details/update', [pageController::class, 'chamberDetailsUpdate'])
				->name('Dashboard_chamberDetailsUpdate');
			Route::get('/chamber_details', [EndInterface::class, 'chamber_details'])
				->name('Dashboard_chamber_details');
		});
		Route::prefix('social_links')->group(function () {
			Route::get('/social_links', [EndInterface::class, 'social_links'])
				->name('Dashboard_social_links');
		});
		Route::prefix('events')->group(function () {
			Route::get('/', [pageController::class, 'event'])
				->name('Dashboard_event');
			Route::post('/event/create', [pageController::class, 'createEvent'])
				->name('Dashboard_createEvent');
			Route::get('/event/{id}/edit', [pageController::class, 'editEvent'])
				->name('Dashboard_editEvent');
			Route::post('/event/update', [pageController::class, 'updateEvent'])
				->name('Dashboard_updateEvent');
			Route::get('/event/{id}/delete', [pageController::class, 'deleteEvent'])
				->name('Dashboard_deleteEvent');
		});


		Route::prefix('diet')->group(function () {
			Route::get('/quickform', [EndInterface::class, 'quickform'])
			->name('Dashboard_quickform');
		Route::get('/create_chart', [EndInterface::class, 'quickformWithRequest'])
			->name('Dashboard_quickformWithRequest');
			Route::get('premade/{id}', [dietController::class, 'preview_diet']);
			Route::post('update', [dietController::class, 'updateDiet'])
				->name('Dashboard_updateDiet');
			Route::get('/diet_records/search', [searchController::class, 'all_diet_records_search'])
				->name('Dashboard_all_diet_records_search');

			Route::get('{id}/edit', [dietController::class, 'editDiet'])
				->name('Dashboard_diet_drafts');
			Route::get('all_payment_and_transaction_records', [EndInterface::class, 'all_payment_and_transaction_records'])
				->name('Dashboard_all_payment_and_transaction_records');
			Route::get('diet_requests', [EndInterface::class, 'diet_requests'])
				->name('Dashboard_diet_requests');
			Route::get('drafts', [EndInterface::class, 'diet_drafts'])
				->name('Dashboard_diet_drafts');
			Route::get('pre_made_charts', [EndInterface::class, 'pre_made_diet_charts'])
				->name('Dashboard_pre_made_diet_charts');
			Route::get('records', [EndInterface::class, 'diet_records'])
				->name('Dashboard_diet_records');
			Route::get('pre_made/records', [EndInterface::class, 'pre_made_diet_records'])
				->name('Dashboard_pre_made_diet_records');
			Route::get('pre_made_diet_records/search', [searchController::class, 'pre_made_diet_records_search'])
				->name('Dashboard_pre_made_diet_records_search');
			Route::get('pre_made_diet_records/{id}/detach', [EndInterface::class, 'pre_detach'])
				->name('Dashboard_pre_detach');

			Route::get('create', [EndInterface::class, 'create_diet'])
				->name('Dashboard_create_diet');
			Route::get('current', [EndInterface::class, 'view_chart'])
				->name('Dashboard_view_chart');
			Route::get('request_diet', [EndInterface::class, 'request_diet'])
				->name('Dashboard_request_diet');

			Route::get('{id}/detach', [dietController::class, 'detachDiet'])
				->name('Dashboard_detachDiet');
		});

		Route::prefix('article')->group(function () {
			Route::get('all_blogs', [blogController::class, 'allBlogPost'])
				->name('Dashboard_allBlogPost');
				Route::get('/write', [EndInterface::class, 'write_a_blog'])
			->name('Dashboard_write_a_blog');
			Route::post('write', [blogController::class, 'uploadBlogPost'])
				->name('Dashboard_uploadBlogPost');
			Route::delete('{id}/delete', [blogController::class, 'deleteBlogPost'])
				->name('Dashboard_deleteBlogPost');
			Route::get('{edit}/edit', [blogController::class, 'editBlogPost'])
				->name('Dashboard_editBlogPost');
			Route::post('update', [blogController::class, 'updateBlogPost'])
				->name('Dashboard_updateBlogPost');
			Route::get('{id}/attach', [blogController::class, 'attachFeaturedBlogPost'])
				->name('Dashboard_attachFeaturedBlogPost');
			Route::get('{id}/detach', [blogController::class, 'detachFeaturedBlogPost'])
				->name('Dashboard_detachFeaturedBlogPost');

			Route::get('{edit}/edit', [blogController::class, 'editBlogPost'])
				->name('Dashboard_editBlogPost');
			Route::delete('{id}/delete', [blogController::class, 'deleteInboxMsg'])
				->name('deleteInboxMsg');
			Route::get('/tags', [blogController::class, 'tags'])
				->name('Dashboard_tags');
			Route::post('/tags/insert', [blogController::class, 'tagRequest'])
				->name('Dashboard_tagsRequest');
			Route::get('/tags/{id}', [blogController::class, 'tagDelete'])
				->name('Dashboard_tagDelete');
			Route::get('/categories', [blogController::class, 'categories'])
				->name('Dashboard_categories');
			Route::post('/categories/insert', [blogController::class, 'categoryRequest'])
				->name('Dashboard_categoriesRequest');
			Route::get('/categories/{id}', [blogController::class, 'categoryDelete'])
				->name('Dashboard_categoryDelete');

			// 	Route::get('tag={id}/posts', [FrontInterface::class, 'tagRelatedPosts'])
			// 	->name('Dashboard_tagRelatedPosts');
			// Route::get('category={id}/posts', [FrontInterface::class, 'categoryRelatedPost'])
			// 	->name('Dashboard_categoryRelatedPost');
		});



		Route::prefix('dashboard')->group(function () {
			// Route::get('/', [EndInterface::class, 'admin_dashboard'])
			// ->name('Dashboard');

			Route::get('/writer', [EndInterface::class, 'writer_dashboard'])
			->name('Dashboard_writer_dashboard');
			Route::get('admin', [EndInterface::class, 'admin_dashboard'])
				->name('Dashboard_admin_dashboard');

			Route::get('moderator', [EndInterface::class, 'moderator_dashboard'])
				->name('Dashboard_moderator_dashboard');

			Route::get('/patient', [EndInterface::class, 'patitient_dashboard'])
				->name('Dashboard_patitient_dashboard');
		});



		Route::get('/all_records/search', [searchController::class, 'all_records_search'])
			->name('Dashboard_all_records_search');









	
		Route::get('/about', [EndInterface::class, 'about'])
			->name('Dashboard_about');
		Route::get('/accounts', [EndInterface::class, 'accounts'])
			->name('Dashboard_accounts');




		Route::get('/create_appointment', [EndInterface::class, 'appointment'])
			->name('Dashboard_appointment');



		Route::get('/contact', [EndInterface::class, 'contact'])
			->name('Dashboard_contact');

		Route::get('/developer', [EndInterface::class, 'developer'])
			->name('Dashboard_developer');

		Route::get('/feedback', [EndInterface::class, 'feedback'])
			->name('Dashboard_feedback');
		Route::post('/patitient_profile/update', [EndInterface::class, 'changePass'])
			->name('Dashboard_changePass');



		Route::get('/patitient_profile', [EndInterface::class, 'patitient_profile'])->name('Dashboard_patitient_profile');
		Route::get('/payments', [EndInterface::class, 'payment'])
			->name('Dashboard_payments');
		Route::get('/payment_history', [EndInterface::class, 'payment_history'])
			->name('Dashboard_payment_history');
		Route::get('/appointment', [EndInterface::class, 'appointments_serials'])
			->name('Dashboard_appointments_serials');

		



		Route::get('/create_serials', [EndInterface::class, 'createSerials'])
			->name('Dashboard_createSerials');

		Route::delete('accounts/delete={id}', [EndInterface::class, 'deleteAccount'])
			->name('Dashboard_deleteAccount');
		Route::post('accounts/add', [EndInterface::class, 'addAccount'])
			->name('Dashboard_addAccount');







		Route::get('/accounts/search', [searchController::class, 'user_records_search'])
			->name('Dashboard_user_records_search');
		Route::post('/history', [EndInterface::class, 'submit_mcq'])
			->name('Dashboard_submit_mcq');
		Route::get('/history', [EndInterface::class, 'mcq'])
			->name('Dashboard_mcq');




		Route::post('/contact/api/update', [pageController::class, 'apiUpdate'])
			->name('Dashboard_apiUpdate');
		Route::post('/contact/services/update', [pageController::class, 'servicesUpdate'])
			->name('Dashboard_servicesUpdate');
	});



























	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/logout', function () {
		Auth::logout();
		return redirect('/');
	})->name('logout');
});
