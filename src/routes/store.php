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
use App\Http\Controllers\Store\ettingsController;
use App\Http\Controllers\Store\FavoriteController;
use App\Http\Controllers\Store\FrequentlyAskQuestionController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\ManagerController;
use App\Http\Controllers\Store\Auth\RegisterController;
use App\Http\Controllers\Store\AccountSuccess;
use App\Http\Controllers\Store\PlanSettingsController;
use App\Http\Controllers\Store\CreditCardController;
use App\Http\Controllers\Store\PaymentMethodController;
use App\Http\Controllers\Admin\ManualController;

Route::group([
    'as' => 'storeAdmin.',
    'namespace' => 'Store',
    'prefix' => 'store'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/instead/{id}', 'HomeController@instead')->name('instead');
    Route::get('/success', 'AccountSuccess@accounts_success')->name('accounts_success');
    Route::get('/default', 'HomeController@default')->name('default');
    // Route::get('/result', [HomeController::class, 'result'])->name('result');
    // Route::post('/result', 'HomeController@result')->name('result');
    Route::get('/registration', [RegisterController::class, 'registerStore'])->name('registration');
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite');
    Route::get('/faq', [FrequentlyAskQuestionController::class, 'index'])->name('faq');
    Route::get('/station', 'HomeController@station')->name('station');
    Route::get('/company', 'HomeController@company')->name('company');
    Route::group([
        'prefix' =>  'creditCard',
        'as' =>  'creditCard.',
    ], function(){
        // Route::get('/register', [CreditCardController::class, 'index'])->name('index');

        // Route::get('/changeComplete', [CreditCardController::class, 'changecomplete'])->name('changeComplete');
        Route::get('/list', [CreditCardController::class, 'list'])->name('list');
        //Route::get('/registerComplete', [CreditCardController::class, 'registercomplete'])->name('registerComplete');
        Route::get('/change', [CreditCardController::class, 'change'])->name('change');
    });



    Route::group([
        'prefix' => 'distribution',
        'as' => 'distribution.',
    ],function(){
        Route::get('/', [DistributionSiteController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'manual',
        'as' => 'manual.',
    ],function(){
        Route::get('/manual', [ManualController::class, 'index'])->name('manual');
    });

    Route::group([
        'namespace' => 'Auth',
    ],function(){
        Route::get('/login', 'LoginController@showStoreLoginForm')->name('index');
        Route::post('/signIn', 'LoginController@signIn')->name('signIn');
        Route::get('logout', 'LoginController@logout')->name('logout');
        Route::get('/reset', 'LoginController@showResetForm')->name('reset');
        Route::post('/reset', 'LoginController@sendResetLink')->name('reset.password.link');
        Route::get('/reset/{token}','LoginController@showForgotForm')->name('reset.password.form');
        Route::post('/resetpassword', 'LoginController@resetPassword')->name('password.reset');
    });

    Route::group([
        'prefix' => 'loginSettings',
        'as' => 'loginSettings.',
    ],function(){
        Route::get('/', 'LoginSettingsController@index')->name('index');
    });

    Route::group([
        'prefix' => 'contractBilling',
        'as' => 'contractBilling.',
    ],function(){
        Route::get('/', [ContractBillingController::class, 'billingInformation'])->name('index');
        Route::get('/pdf', [ContractBillingController::class, 'pdf'])->name('pdf');
    });

    Route::group([
        'prefix' => 'mypage',
        'as' => 'mypage.',
    ],function(){
        Route::get('/', [MyPageController::class, 'index'])->name('index');
        Route::post('/updateData', [MyPageController::class, 'updateData'])->name('updateData');
        Route::post('/changepassword', [MyPageController::class, 'changepassword'])->name('changepassword');
    });

    Route::group([
        'prefix' => 'manager',
        'as' => 'manager.',
    ],function(){
        Route::get('/', [ManagerController::class, 'index'])->name('index');
        Route::get('/mypage', [ManagerController::class, 'mypage'])->name('mypage');
        Route::get('/settings', [ManagerController::class, 'settings'])->name('settings');
        Route::post('/settings/register', [ManagerController::class, 'settingsAccountUpdate'])->name('update');
        Route::post('/settings/unregister', [ManagerController::class, 'settingsAccountUnregister'])->name('unregister');
        Route::get('/registration', [ManagerController::class, 'registration'])->name('registration');
        Route::get('/mypage/edit/{id}', [ManagerController::class, 'edit']);
        Route::get('/mypage/delete/{id}', [ManagerController::class, 'delete'])->name('delete');
        Route::put('/mypage/update/{id}', [ManagerController::class, 'update'])->name('mypage.update');
        Route::post('/mypage/register', [ManagerController::class, 'register'])->name('mypage.create');
        Route::post('/mypage/accountUpdate', [ManagerController::class, 'myPageUpdate'])->name('account.update');
        Route::post('/updatepassword', [ManagerController::class, 'updatepassword'])->name('updatepassword');
    });

    Route::group([
        'prefix' => 'contractBillingHeadquarter',
        'as' => 'contractBillingHeadquarter.',
    ],function(){
        Route::get('/', [ContractBillingController::class, 'payingBilling'])->name('contractBillingHeadquarter');
    });

    // Route::group([
    //     'prefix' => 'creditCardRegister',
    //     'as' => 'creditCardRegister.',
    // ],function(){
    //     Route::get('/', [CreditCardController::class, 'index'])->name('index');
    // });



    Route::group([
        'prefix' => 'news',
        'as' => 'news.',
    ], function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{news_id}', [NewsController::class, 'show'])->name('show');
    });

    Route::group([
        'prefix' => 'search',
        'as' => 'search.',
    ],function(){
        Route::get('/', 'HomeController@index')->name('index');
        // Route::get('list', 'HomeController@new_list')->name('list');
        // Route::post('list', 'HomeController@new_list')->name('list');
        Route::get('list', 'HomeController@ajaxSearch')->name('list');
        Route::get('pagination', 'HomeController@pagination')->name('pagination');
        Route::post('list', 'HomeController@ajaxSearch')->name('list');
        Route::post('tempResults', 'HomeController@tempResults')->name('tempResults');
        Route::post('favorites', 'HomeController@favorites')->name('favorites');
        // Test API Start
        Route::post('submitAjax', 'HomeController@submitAjax')->name('submitAjax');
        Route::post('firstTenResults', 'HomeController@firstTenResults')->name('firstTenResults');
        Route::post('getTotalCount', 'HomeController@getTotalCount')->name('getTotalCount');
        // Test API End
        Route::get('details/{id}', [CompanyController::class, 'details'])->name('details');
        Route::get('profile', [CompanyController::class, 'profile'])->name('profile');
        // Route::get('list', [CompanyController::class, 'index'])->name('list');
        Route::get('/mocklist', 'HomeController@mockSearchList')->name('mocklist');

        Route::post('saveSearch', 'HomeController@saveSearch')->name('saveSearch');
        Route::post('homeSearch', 'HomeController@saveHomeSearch')->name('homeSearch');

    });

    Route::group([
        'prefix' => 'setting',
        'as' => 'setting.',
    ],function(){
        Route::get('distributionInformation', [DistributionSiteController::class, 'informationSetting'])->name('distributionInformation');
        Route::get('create', [DistributionSiteController::class, 'create'])->name('create');
        Route::post('createsite', [DistributionSiteController::class, 'createsite'])->name('createsite');
        Route::get('distribution', [DistributionSiteController::class, 'setting'])->name('distribution');
        Route::get('/plans', [PlanSettingsController::class, 'index'])->name('plans');
        Route::post('/updatePlan','PlanSettingsController@updatePlan')->name('updatePlan');
        Route::get('/user', [StoreSettingsController::class, 'index'])->name('user');
        Route::get('/user/delete/{id}', [StoreSettingsController::class, 'delete']);
        Route::get('/user/edit/{id}', [StoreSettingsController::class, 'edit']);
        Route::put('/user/update/{id}', [StoreSettingsController::class, 'update'])->name('user.update');
        Route::get('/cancel', [MyPageController::class, 'cancel'])->name('cancel');
        Route::get('/cancelConfirm', [MyPageController::class, 'cancelConfirm'])->name('cancelConfirm');
        Route::get('/cancelComplete', [MyPageController::class, 'cancelComplete'])->name('cancelComplete');
        Route::get('/restarting', [MyPageController::class, 'resume'])->name('restarting');
        Route::get('/restartingConfirm', [MyPageController::class, 'resumeConfirm'])->name('restartingConfirm');
        Route::get('/restartingComplete', [MyPageController::class, 'resumeComplete'])->name('restartingComplete');
        Route::get('/dormant', [MyPageController::class, 'dormant'])->name('dormant');
        Route::get('/dormantConfirm', [MyPageController::class, 'dormantConfirm'])->name('dormantConfirm');
        Route::post('/dormantComplete', [MyPageController::class, 'dormantComplete'])->name('dormantComplete');
        Route::post('/create/user', [StoreSettingsController::class, 'create'])->name('create.user');
        //post method
        Route::post('/createScraping', [DistributionSiteController::class, 'createScraping'])->name('createScraping');
        Route::post('/editScraping', [DistributionSiteController::class, 'editScraping'])->name('editScraping');

        //paymentmethod
        Route::group([
            'prefix' => 'paymentMethod',
            'as' => 'paymentMethod.',
        ],function(){

            Route::get('/credit', 'PaymentMethodController@credit')->name('credit');
            Route::post('/addCredit', 'CreditCardController@insertCredit')->name('insertCredit');
            Route::get('/decrypt/{id}', 'CreditCardController@testDecrypt')->name('decrypt');
            Route::get('/creditComplete', 'PaymentMethodController@creditComplete')->name('creditComplete');
            Route::get('/creditRegistration', 'PaymentMethodController@index')->name('index');
            Route::get('/debit', 'PaymentMethodController@debit')->name('debit');
            Route::post('/debit/success', 'PaymentMethodController@debitSuccess')->name('debitSuccess');
        });


    });



});

//TOP,show,setting
Route::view('/show', 'store.home.show')->name('store.show');
Route::view('/setting', 'store.home.setting')->name('store.setting');
//login
// Route::view('/login', 'store.login.index')->name('store.index');
Route::view('/login/complete', 'store.login.complete')->name('store.index');
Route::view('/login/resetting', 'store.login.resetting')->name('store.index');

Route::group([
    'as' => 'customer.',
    'namespace' => 'customer',
    'prefix' => 'customer'
],function(){
    Route::get('/', 'HomeController@index')->name('index');
});
