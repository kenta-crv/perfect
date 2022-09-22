<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController as StoreCustomerHomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Store\DistributionSiteController;
use App\Http\Controllers\Store\StoreSettingsController;
use App\Http\Controllers\Store\ContractBillingController;
use App\Http\Controllers\Store\MyPageController;
use App\Http\Controllers\Store\NewsController;
use App\Http\Controllers\Store\CompanyController;
use App\Http\Controllers\Store\PlanSettingsController;
use App\Http\Controllers\Store\FavoriteController;
use App\Http\Controllers\Store\FrequentlyAskQuestionController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\ManagerController;
use App\Http\Controllers\Store\Auth\RegisterController;
use App\Http\Controllers\Robore\TermsController;
use App\Http\Controllers\Robore\PrivacyPolicyController;
use App\Http\Controllers\Admin\AccountManagementController;
use App\Http\Controllers\PDF\BillingPDFController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Store\Auth\RegisterForSalesController;


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
Route::get('send-mail', [MailController::class, 'index']);
Route::get('/download/{file}', 'DownloadController@download')->name('download');

 //New URL Register Company
Route::group([
    'namespace' => 'Robore',
],function(){
    Route::get('/billingpdf', [BillingPDFController::class, 'billingpdf'])->name('billingpdf');
    Route::group([
        'prefix' => 'requestinformation',
        'as' => 'requestinformation.',
    ], function(){
        Route::get('/', [RegisterController::class, 'registerCompany'])->name('create');

        Route::match(['get', 'post'],'confirm', [RegisterController::class, 'confirmRequestInformation'])->name('confirm');
        Route::post('save', [RegisterController::class, 'saveRequestInformation'])->name('save');

    });
    Auth::routes(['verify' => true]);
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/terms', [TermsController::class, 'index'])->name('index');
    Route::get('/privacy', [PrivacyPolicyController::class, 'index'])->name('index');
    Route::get('/termsandservice', [TermsController::class, 'index'])->name('terms.index');
    Route::get('/policy', [PrivacyPolicyController::class, 'index'])->name('privacy.index');
    Route::get('/company', 'CompanyController@index')->name('company.index');
    Route::post('/no_license', 'HomeController@no_license')->name('no_license');

    Route::match(['get', 'post'],'/saveInquiry', 'HomeController@saveInquiry')->name('saveInquiry');
    Route::post('/confirmInquiry', 'HomeController@confirmInquiry')->name('confirmInquiry');



    Route::group([
        'namespace' => 'Auth',
        'prefix' => '',
    ], function () {
        // ログイン
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // 新規会員登録

        Route::get('/forget', 'ForgotPasswordController@showLinkRequestForm')->name('forget');
        Route::post('/forget', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('/complete', 'ForgotPasswordController@complete')->name('password.complete');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

        Route::group([
            'prefix' => 'register',
            'as' => 'register.',
        ], function () {
            Route::get('/', 'RegisterController@register')->name('register');
            Route::post('/confirmation', 'RegisterController@confirmationRegister')->name('confirmationRegister');/**register database**/
            Route::post('/confirm', 'RegisterController@confirm')->name('confirm');/**headquarter database**/
            Route::match(['get', 'post'],'/registerHeadquarter/confirmation', 'RegisterController@confirmRegisterHeadquarter')->name('head.confirm');/**headquarter confirmation**/
            Route::get('/registerHeadquarter/success', 'RegisterController@registerHeadquarterSuccess')->name('head.success');/**headquarter success**/
            // Route::match(['get', 'post'],'Registerconfirm', 'RegisterController@Registerconfirm')->name('Registerconfirm');
            Route::get('create', 'RegisterController@register')->name('create');
            Route::get('complete', 'RegisterController@complete')->name('content.edit');
            Route::get('/registerCredit', 'RegisterController@registerCredit')->name('registerCredit');
            Route::get('/registerDebit', 'RegisterController@registerDebit')->name('registerDebit');
            Route::get('/success', 'RegisterController@registerSuccess')->name('register.success');/**register success**/
            Route::match(['get', 'post'],'/registerConfirmation', 'RegisterController@confirmRegister')->name('confirmRegister');;/**register display input data**/

            Route::get('/registerHeadquarter', 'RegisterController@registerHeadquarter')->name('registerregisterHeadquarter');
            Route::get('/registerSales', 'RegisterController@registerSales')->name('registerregisterSales');
            Route::post('/debitSuccessRegister', 'RegisterController@debitSuccessRegister')->name('debitSuccessRegister');

        });
        Route::group([
            'prefix' => 'registerforsales',
            'as' => 'registerforsales.',
        ], function () {
            Route::get('/', [RegisterForSalesController::class, 'index'])->name('index');
        });
    });

});
// Route::resources([
//     'accounts' => AccountManagementController::class,
// ]);
Route::resource('accounts', AccountManagementController::class);
