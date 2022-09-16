<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndController;
use App\Http\Controllers\appointmentController;
use App\Http\Controllers\dietController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\FrontSpaController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Auth;



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

Route::middleware(['auth'])->group(function () {

	Route::prefix('dashboard')->group(function () {

		Route::prefix('serials')->group(function () {
			Route::get('{trix_id}/withdrawn', [EndController::class, 'accountReject'])->name('withdrawn');
			Route::get('{trix_id}/approve', [EndController::class, 'accountApprove'])->name('approve');
			Route::get('{trix_id}/not-found', [EndController::class, 'accountNotFound'])->name('notFound');
			Route::get('{transaction_id}/present', [EndController::class, 'accountPresent'])->name('present');
			Route::get('{transaction_id}/absent', [EndController::class, 'accountAbsent'])->name('absent');
		});

		Route::prefix('gallery')->group(function () {

			Route::delete('{id}/delete', [pageController::class, 'galleryDelete'])
				->name('Dashboard_galleryDelete');
			Route::get('/', [EndController::class, 'gallery'])
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
			Route::get('/chamber_details', [EndController::class, 'chamber_details'])
				->name('Dashboard_chamber_details');
		});
		Route::prefix('social_links')->group(function () {
			Route::get('/social_links', [EndController::class, 'social_links'])
				->name('Dashboard_social_links');
		});
		Route::prefix('events')->group(function () {
			Route::get('/', [pageController::class, 'event'])
				->name('Dashboard_event');
			Route::post('create', [pageController::class, 'createEvent'])
				->name('Dashboard_createEvent');
			Route::get('{id}/edit', [pageController::class, 'editEvent'])
				->name('Dashboard_editEvent');
			Route::post('update', [pageController::class, 'updateEvent'])
				->name('Dashboard_updateEvent');
			Route::get('{id}/delete', [pageController::class, 'deleteEvent'])
				->name('Dashboard_deleteEvent');
		});

		// Diet ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: 
		Route::prefix('diet')->group(function () {
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
			Route::get('/quickform', [dietController::class, 'quickform'])
				->name('Dashboard_quickform');
			Route::get('/create_chart', [dietController::class, 'quickformWithRequest'])
				->name('Dashboard_quickformWithRequest');
			Route::get('premade/{id}', [dietController::class, 'preview_diet']);
			Route::post('update', [dietController::class, 'updateDiet'])
				->name('Dashboard_updateDiet');
			Route::get('/diet_records/search', [dietController::class, 'all_diet_records_search'])
				->name('Dashboard_all_diet_records_search');

			Route::get('{id}/edit', [dietController::class, 'editDiet'])
				->name('Dashboard_diet_drafts');
			Route::get('all_payment_and_transaction_records', [dietController::class, 'all_payment_and_transaction_records'])
				->name('Dashboard_all_payment_and_transaction_records');
			Route::get('diet_requests', [dietController::class, 'diet_requests'])
				->name('Dashboard_diet_requests');
			Route::get('drafts', [dietController::class, 'diet_drafts'])
				->name('Dashboard_diet_drafts');
			Route::get('pre_made_charts', [dietController::class, 'pre_made_diet_charts'])
				->name('Dashboard_pre_made_diet_charts');
			Route::get('records', [dietController::class, 'diet_records'])
				->name('Dashboard_diet_records');
			Route::get('pre_made/records', [dietController::class, 'pre_made_diet_records'])
				->name('Dashboard_pre_made_diet_records');
			Route::get('pre_made_diet_records/search', [dietController::class, 'pre_made_diet_records_search'])
				->name('Dashboard_pre_made_diet_records_search');
			Route::get('pre_made_diet_records/{id}/detach', [dietController::class, 'pre_detach'])
				->name('Dashboard_pre_detach');

			Route::get('create', [dietController::class, 'create_diet'])
				->name('Dashboard_create_diet');
			Route::get('current', [dietController::class, 'view_chart'])
				->name('Dashboard_view_chart');
			Route::get('request_diet', [dietController::class, 'request_diet'])
				->name('Dashboard_request_diet');

			Route::get('{id}/detach', [dietController::class, 'detachDiet'])
				->name('Dashboard_detachDiet');
		});




		// Blog Controller ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::





		Route::prefix('article')->group(function () {
			Route::get('all_blogs', [blogController::class, 'allBlogPost'])
				->name('Dashboard_allBlogPost');
			Route::get('write', [blogController::class, 'write_a_blog'])
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
			Route::get('tags', [blogController::class, 'tags'])
				->name('Dashboard_tags');
			Route::post('tags/insert', [blogController::class, 'tagRequest'])
				->name('Dashboard_tagsRequest');
			Route::get('tags/{id}', [blogController::class, 'tagDelete'])
				->name('Dashboard_tagDelete');
			Route::get('categories', [blogController::class, 'categories'])
				->name('Dashboard_categories');
			Route::post('categories/insert', [blogController::class, 'categoryRequest'])
				->name('Dashboard_categoriesRequest');
			Route::get('categories/{id}', [blogController::class, 'categoryDelete'])
				->name('Dashboard_categoryDelete');

			// 	Route::get('tag={id}/posts', [FrontInterface::class, 'tagRelatedPosts'])
			// 	->name('Dashboard_tagRelatedPosts');
			// Route::get('category={id}/posts', [FrontInterface::class, 'categoryRelatedPost'])
			// 	->name('Dashboard_categoryRelatedPost');
		});



		Route::prefix('/')->group(function () {
			Route::get('/admin', [EndController::class, 'admin_dashboard'])
				->name('Dashboard');

			Route::get('/writer', [EndController::class, 'writer_dashboard'])
				->name('Dashboard_writer_dashboard');


			Route::get('moderator', [EndController::class, 'moderator_dashboard'])
				->name('Dashboard_moderator_dashboard');

			Route::get('/patient', [EndController::class, 'patitient_dashboard'])
				->name('Dashboard_patitient_dashboard');
		});



		Route::get('/all_records/search', [searchController::class, 'all_records_search'])
			->name('Dashboard_all_records_search');










		Route::get('/about', [EndController::class, 'about'])
			->name('Dashboard_about');
		Route::get('/accounts', [EndController::class, 'accounts'])
			->name('Dashboard_accounts');




		Route::get('/create_appointment', [EndController::class, 'appointment'])
			->name('Dashboard_appointment');



		Route::get('/contact', [EndController::class, 'contact'])
			->name('Dashboard_contact');

		Route::get('/developer', [EndController::class, 'developer'])
			->name('Dashboard_developer');

		Route::get('/feedback', [EndController::class, 'feedback'])
			->name('Dashboard_feedback');
		Route::post('/patitient_profile/update', [EndController::class, 'changePass'])
			->name('Dashboard_changePass');



		Route::get('patitient_profile', [EndController::class, 'patitient_profile'])->name('Dashboard_patitient_profile');
		Route::get('payments', [EndController::class, 'payment'])
			->name('Dashboard_payments');
		Route::get('payment_history', [EndController::class, 'payment_history'])
			->name('Dashboard_payment_history');
		Route::get('appointment', [EndController::class, 'appointments_serials'])
			->name('Dashboard_appointments_serials');





		// Route::get('create_serials', [EndController::class, 'createSerials'])
		// 	->name('Dashboard_createSerials');

		Route::delete('accounts/delete={id}', [EndController::class, 'deleteAccount'])
			->name('Dashboard_deleteAccount');
		Route::post('accounts/add', [EndController::class, 'addAccount'])
			->name('Dashboard_addAccount');







		Route::get('accounts/search', [searchController::class, 'user_records_search'])
			->name('Dashboard_user_records_search');
		Route::post('/history', [EndController::class, 'submit_mcq'])
			->name('Dashboard_submit_mcq');
		Route::get('/history', [EndController::class, 'mcq'])
			->name('Dashboard_mcq');




		Route::post('/contact/api/update', [pageController::class, 'apiUpdate'])
			->name('Dashboard_apiUpdate');
		Route::post('/contact/services/update', [pageController::class, 'servicesUpdate'])
			->name('Dashboard_servicesUpdate');
	});



























	// Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::get('/logout', function () {
		Auth::logout();
		return redirect('/');
	})->name('logout');
});
