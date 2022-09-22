<?php
use Illuminate\Support\Facades\Route;

//Admin login routes
Route::group([
    'namespace' => 'Admin\Auth',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    // ログイン
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});


Route::group([
    'as' => 'admin.',
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::get('/', 'HomeController@index')->name('index');

    Route::group([
        'prefix' => 'search',
        'as' => 'search.',
    ],function(){
        Route::get('/detail', 'PaymentIndicationController@index')->name('detail');
    });
    Route::group([
        'prefix' => 'discount',
        'as' => 'discount.',
    ], function () {
        Route::get('/', 'DiscountSettingController@index')->name('index');
    });

    Route::group([
        'prefix' => 'limited',
        'as' => 'limited.',
    ], function () {
        Route::get('/', 'LimitedController@index')->name('index');
    });

    Route::group([
        'prefix' => 'notification',
        'as' => 'notification.',
    ], function () {
        Route::get('/', 'NotificationController@index')->name('index');
        Route::get('informationDetails/{id}', 'NotificationController@informationDetails')->name('informationDetails');
        Route::get('new', 'NotificationController@new')->name('new');
        Route::post('newNotice', 'NotificationController@newNotif')->name('newNotice');

        Route::get('/getTargetCompany', 'NotificationController@getTargetCompany')->name('getTargetCompany');
    });

    Route::group([
        'prefix' => 'store/search',
        'as' => 'store.search.',
    ],function () {
        Route::get('/', 'StoreController@searchAccount')->name('index');
        Route::get('detail/{id}', 'StoreController@detail')->name('detail');
        // Route::get('searchData', 'StoreController@searchAccount')->name('searchData');
        Route::get('limitSearch', 'StoreController@selectBox')->name('limitSearch');
        Route::get('accountsData', 'StoreController@getAccounts')->name('accountsData');
        Route::post('insertStore', 'StoreController@insertStore')->name('insertStore');
    });
    Route::group([
        'prefix' => 'alert',
        'as' => 'alert.',
    ],function () {
        Route::get('/', 'AlertController@index')->name('index');
        Route::get('/alertAdd', 'AlertController@addAlert')->name('alertAdd');
        Route::post('/alertcreate', 'AlertController@createAlert')->name('alertcreate');
        Route::get('/edit/{id}', 'AlertController@edit')->name('alertEdit');
        Route::post('/update', 'AlertController@update')->name('alertUpdate');
    });
    Route::group([
        'prefix' => 'account',
        'as' => 'account.',
    ],function () {
        Route::get('/', 'AccountManagementController@index')->name('index');
        Route::get('/edit/{id}', 'AccountManagementController@edit')->name('edit');
        Route::get('/create', 'AccountManagementController@create')->name('create');
        Route::post('/update', 'AccountManagementController@update')->name('update');
        Route::post('/delete', 'AccountManagementController@delete')->name('delete');
        Route::post('/insert', 'AccountManagementController@createAccount')->name('insert');
    });
    Route::group([
        'prefix' => 'mypage',
        'as' => 'mypage.',
    ],function () {
        Route::get('/', 'MyPageController@index')->name('index');
        Route::get('/edit/{id}', 'MyPageController@edit')->name('edit');
        Route::post('/update', 'MyPageController@update')->name('update');
    });
    Route::group([
        'prefix' => 'dormant',
        'as' => 'dormant.',
    ],function () {
        Route::get('/', 'MyPageController@dormant')->name('index');
    });
    Route::group([
        'prefix' => 'restarting',
        'as' => 'restarting.',
    ],function () {
        Route::get('/', 'MyPageController@restarting')->name('index');
        Route::get('/restartAdminConfirm/{id}', 'StoreController@restartingAdminConfirm')->name('restartingAdminConfirm');
        Route::get('/restartAdminComplete/{id}', 'StoreController@restartingAdminComplete')->name('restartingAdminComplete');
    });
    Route::group([
        'prefix' => 'dormant',
        'as' => 'dormant.',
    ],function () {
        Route::get('/{id}', 'MyPageController@dormant')->name('index');
    });
    Route::group([
        'prefix' => 'cancel',
        'as' => 'cancel.',
    ],function () {
        Route::get('/{id}', 'MyPageController@cancel')->name('index');
    });
    Route::group([
        'prefix' => 'creditRent',
        'as' => 'creditRent.',
    ],function () {
        Route::get('/', 'CreditCardPaymentManagementController@index')->name('index');
    });
    Route::group([
        'prefix' => 'inquiry',
        'as' => 'inquiry.',
    ],function () {
        Route::get('/', 'InquiryResponseController@index')->name('index');
    });
    Route::group([
        'prefix' => 'requestInformations',
        'as' => 'requestInformations.',
    ],function () {
        Route::get('/', 'RequestInformationsController@index')->name('index');
    });

    Route::group([
        'prefix' => 'help',
        'as' => 'help.',
    ],function () {
        Route::get('/', 'HelpController@index')->name('index');
    });
    Route::group([
        'prefix' => 'credit',
        'as' => 'credit.',
    ],function () {
        Route::get('/', 'CreditController@index')->name('index');
        Route::get('/confirm', 'CreditController@confirm')->name('confirm');
    });
    Route::group([
        'as' => 'auth.',
        'namespace' => 'Auth',
        'prefix' => 'auth',
    ], function () {
        // ログイン
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/signIn', 'LoginController@signIn')->name('signIn');
        Route::get('/logout', 'LoginController@logout')->name('logout');

        Route::get('/forget', 'ForgotPasswordController@showLinkRequestForm')->name('forget');

    });

    Route::group([
        'as' => 'guide.',
        'prefix' => 'guide',
    ], function () {

        Route::get('/', 'GuideController@index')->name('index');
        Route::get('/addform', 'GuideController@addForm')->name('addform');
        Route::post('/insertGuide', 'GuideController@insertGuide')->name('insertGuide');
        Route::get('/editGuide/{id}', 'GuideController@editGuide')->name('editGuide');
        Route::post('/updateGuide', 'GuideController@updateGuide')->name('updateGuide');
        Route::post('/addGuideFile', 'GuideController@uploadImageGuide')->name('uploadImageGuide');

    });
});


