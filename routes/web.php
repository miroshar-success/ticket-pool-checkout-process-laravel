<?php

use App\Http\Controllers\EmailTemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AppUserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\NotificationTemplateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WalletController;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Artisan;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/admin/home');
    }
    return view('auth.login');
})->name('login');


Route::post('/admin/login', [LicenseController::class, 'adminLogin']);
Route::get('/logout', [LicenseController::class, 'adminLogout'])->name('logout123');
Route::post('/saveEnvData', [LicenseController::class, 'saveEnvData']);
Route::post('/saveAdminData', [LicenseController::class, 'saveAdminData']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/order-invoice-print/{id}', [OrderController::class, 'orderInvoicePrint']);
Route::get('/change-language/{lang}', [UserController::class, 'changeLanguage']);
Route::get('/maintain', [SettingController::class, 'maintain']);
Route::get('/send-mail/{id}', [OrderController::class, 'sendMail']);

// You can uncomment the following route to block installer route after site goes live
//Route::any('installer', function (){abort(404);})->name('installer');
// You can comment the following route to block installer route after site goes live
Route::any('installer', [LicenseController::class, 'installer'])->name('installer');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin/home', [UserController::class, 'adminDashboard']);
    Route::get('/organization/home', [UserController::class, 'organizationDashboard']);
    Route::get('/{id}/{name}/tickets', [TicketController::class, 'index']);
    Route::get('/book-ticket', [UserController::class, 'bookTicket']);
    Route::get('/organizer/{id}/{name}', [UserController::class, 'organizerEventDetails']);
    Route::get('/organizerCheckout/{id}', [UserController::class, 'organizerCheckout']);
    Route::post('/organizerCreateOrder', [UserController::class, 'organizerCreateOrder']);
    Route::delete('/deleteTickets/{id}', [TicketController::class, 'deleteTickets']);
    Route::get('/{id}/ticket/create', [TicketController::class, 'create']);
    Route::post('/ticket/create', [TicketController::class, 'store']);
    Route::get('/ticket/edit/{id}', [TicketController::class, 'edit']);
    Route::post('/ticket/update/{id}', [TicketController::class, 'update']);
    Route::get('/block-user/{id}', [AppUserController::class, 'blockUser']);
    Route::get('/user_delete/{id}', [AppUserController::class, 'user_delete']);
    Route::get('/main_user_block/{id}', [UserController::class, 'main_user_block']);
    Route::get('/block-scanner/{id}', [UserController::class, 'blockScanner']);
    Route::get('/admin-setting', [SettingController::class, 'index']);
    Route::get('/license-setting', [LicenseController::class, 'licenseSetting']);
    Route::post('/save-license-setting', [LicenseController::class, 'saveLicenseSetting']);
    Route::post('/save-general-setting', [SettingController::class, 'store']);
    Route::post('/maintenance-setting', [SettingController::class, 'maintenanceMode']);
    Route::post('/save-mail-setting', [SettingController::class, 'saveMailSetting']);
    Route::post('/save-verification-setting', [SettingController::class, 'saveVerificationSetting']);
    Route::post('/save-organization-setting', [SettingController::class, 'saveOrganizationSetting']);
    Route::post('/save-payment-information-setting', [SettingController::class, 'savePaymentInformationSetting']);
    Route::post('/save-pushNotification-setting', [SettingController::class, 'saveOnesignalSetting']);
    Route::post('/save-sms-setting', [SettingController::class, 'saveSmsSetting']);
    Route::post('/additional-setting', [SettingController::class, 'additionalSetting']);
    Route::post('/support-setting', [SettingController::class, 'supportSetting']);
    Route::post('/save-payment-setting', [SettingController::class, 'savePaymentSetting']);
    Route::post('/socialmedialinks', [SettingController::class, 'socialmedialinks']);
    Route::post('/appuser-privacy-policy', [SettingController::class, 'appuserPrivacyPolicy']);
    Route::get('/profile', [UserController::class, 'viewProfile']);
    Route::post('/edit-profile', [UserController::class, 'editProfile']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order_id}/{id}', [OrderController::class, 'show']);
    Route::get('/order-invoice/{id}', [OrderController::class, 'orderInvoice']);
    Route::post('/order/changestatus', [OrderController::class, 'changeStatus']);
    Route::post('/order/changepaymentstatus', [OrderController::class, 'changePaymentStatus']);
    Route::get('/user-review', [OrderController::class, 'userReview']);
    Route::get('/event-review', [OrderController::class, 'eventReports']);
    Route::get('/event-reports', [OrderController::class, 'eventReports']);
    Route::get('/change-review-status/{id}', [OrderController::class, 'changeReviewStatus']);
    Route::get('/delete-review/{id}', [OrderController::class, 'deleteReview']);
    Route::post('/get-month-event', [EventController::class, 'getMonthEvent']);
    Route::get('/event-gallery/{id}', [EventController::class, 'eventGallery']);
    Route::post('/add-event-gallery', [EventController::class, 'addEventGallery']);
    Route::get('/remove-image/{image}/{id}', [EventController::class, 'removeEventImage']);
    Route::get('/scanner', [UserController::class, 'scanner']);
    Route::get('/scanner/create', [UserController::class, 'scannerCreate']);
    Route::post('/scanner', [UserController::class, 'addScanner']);
    Route::get('/getScanner/{id}', [UserController::class, 'getScanner']);
    Route::get('/organization-report/customer', [OrderController::class, 'customerReport']);
    Route::post('/organization-report/customer', [OrderController::class, 'customerReport']);
    Route::get('/organization-report/orders', [OrderController::class, 'ordersReport']);
    Route::post('/organization-report/orders', [OrderController::class, 'ordersReport']);
    Route::get('/organization-report/revenue', [OrderController::class, 'orgRevenueReport']);
    Route::post('/organization-report/revenue', [OrderController::class, 'orgRevenueReport']);
    Route::get('/admin-report/customer', [OrderController::class, 'adminCustomerReport']);
    Route::post('/admin-report/customer', [OrderController::class, 'adminCustomerReport']);
    Route::get('/admin-report/organization', [OrderController::class, 'adminOrgReport']);
    Route::post('/admin-report/organization', [OrderController::class, 'adminOrgReport']);
    Route::get('/admin-report/revenue', [OrderController::class, 'adminRevenueReport']);
    Route::post('/admin-report/revenue', [OrderController::class, 'adminRevenueReport']);
    Route::get('/getStatistics/{month}', [OrderController::class, 'getStatistics']);
    Route::get('/admin-report/settlement', [OrderController::class, 'settlementReport'])->name('settlementReport');
    Route::get('/view-user/{id}', [AppUserController::class, 'userDetail']);
    Route::post('/pay-to-org', [OrderController::class, 'payToUser']);
    Route::post('/pay-to-organization', [OrderController::class, 'payToOrganization']);
    Route::post('admin-report/org-key',[UserController::class,'orgKey'])->name('orgKey');
    Route::any('organization/stripe/create-session', [UserController::class, 'checkoutSession'])->name('orgStripe.checkoutSession');
    Route::get('org/stripe/success', [UserController::class, 'stripeSuccess'])->name('orgStripe.success');
    Route::get('/view-settlement/{id}', [OrderController::class, 'viewSettlement']);
    Route::get('get-code/{code}', [OrderController::class, 'getQrCode']);
    Route::get('/language/download_sample_file', [LanguageController::class, 'download_sample_file']);
    Route::get('/check-email', [UserController::class, 'check_email']);
    Route::post('/about_us', [SettingController::class, 'aboutUs']);
    Route::get('/event/create', [EventController::class, 'create']);
    Route::get('/app_users_edit/{id}', [UserController::class, 'editAppUser']);
    Route::post('/update_appuser', [UserController::class, 'updateAppUser']);
    Route::get('/organization/income', [UserController::class, 'orgincome']);
    Route::get('/organizer-setting', [SettingController::class, 'payment_setting']);
    Route::post('/payment-save', [SettingController::class, 'organizer_payment_save']);
    Route::get('/wallet-transactions', [WalletController::class, 'allTransactions'])->name('allTransactions');
    Route::resources([

        'roles' => RoleController::class,
        'tax' => TaxController::class,
        'faq' => FaqController::class,
        'banner' => BannerController::class,
        'app-user' => AppUserController::class,
        'users' =>  UserController::class,
        'blog' =>  BlogController::class,
        'feedback' =>  FeedbackController::class,
        'coupon' =>  CouponController::class,
        'category' =>  CategoryController::class,
        // 'location' =>  LocationController::class,
        'events' =>  EventController::class,
        'email' =>  EmailTemplateController::class,
        'notification-template' =>  NotificationTemplateController::class,
        'language' => LanguageController::class,
        'module' => ModuleController::class,

    ]);
});

Route::get('/notification', [NotificationTemplateController::class, 'notification']);
Route::get('/markAllAsRead', [NotificationTemplateController::class, 'markAllAsRead']);
Route::get('/get-notification', [NotificationTemplateController::class, 'getNotification']);
Route::post('/send-notification', [NotificationTemplateController::class, 'sendNotification']);
Route::get('/delete-notification/{id}', [NotificationTemplateController::class, 'deleteNotification']);


Route::get('/create-payment/{id}', [UserController::class, 'makePayment']);
Route::any('/payment/{id}', [UserController::class, 'initialize'])->name('pay');
Route::get('/rave/callback/{id}', [UserController::class, 'callback'])->name('callback');

Route::get('FlutterWavepayment/{id}', [UserController::class, 'FlutterWavepayment']);
Route::get('transction_verify/{id}', [UserController::class, 'transction_verify']);
Route::post('/email/{id}/resend', [EmailTemplateController::class, 'resendEmail'])->name('email.resend');

Route::get('testing-email',[EmailTemplateController::class,'testEmail']);