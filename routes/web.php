<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/userlist','ApiUser@index');

Route::get('/discount/{id}', 'MNGHomeController@discount')->name('MNGdiscount'); //MANAGER ROUTE
//Route::get('/discount/{id}','MNGHomeController@discount')->name('MNGdiscount'); //MANAGER ROUTE
Route::get('/contentpublish/{id}','MNGContentindex@publish')->name('MNGpublish'); //MANAGER ROUTE
Route::get('/contentdecline/{id}','MNGContentindex@decline')->name('MNGdecline'); //MANAGER ROUTE

//Route::get('/contentpublish','MNGContentindex@publish'); //MANAGER ROUTE

Route::get('/payment','MNGpaymentController@paymentview'); //MANAGER ROUTE

Route::get('/contentmanage','MNGHomeController@contentmanageview'); //MANAGER ROUTE
Route::get('/orderapprove','MNGHomeController@orderapproveview');//MANAGER ROUTE
Route::get('/creatorprofile','MNGHomeController@creatorprofileview');//MANAGER ROUTE
Route::get('/userprofile','MNGHomeController@userprofileview');//MANAGER ROUTE
Route::get('/paymentmanage','MNGHomeController@paymentmanageview');//MANAGER ROUTE
Route::get('/allcontent','MNGHomeController@allcontentview');//MANAGER ROUTE
Route::get('/editprofile','MNGHomeController@editprofileview');//MANAGER ROUTE
Route::post('/editprofile','MNGHomeController@update');//MANAGER ROUTE
});
Route::get('/login', 'LoginController@login');
Route::post('/register', 'creatorregcontroller@store55');
Route::get('/register', 'creatorregcontroller@register');
Route::post('/login', 'loginController@verify');

Route::get('/login', 'LoginController@login');
Route::post('/register', 'registercontroller@store');
Route::get('/register', 'registercontroller@register');
Route::get('/creator', 'admincontroller@creatordashboard');
//Route::get('/manager', 'admincontroller@managerdashboard');
Route::get('/adminforgotpass', 'registercontroller@forgotpass');
Route::get('/orderstatus', 'admincontroller@orderstatusdashboard');
Route::get('/search','AdminController@search');
Route::post('/login', 'loginController@verify');
 Route::get('/login', ['as'=>'login.login', 'uses'=>'LoginController@login']);
 Route::get('/register', ['as'=>'login.register', 'uses'=>'registercontroller@register']);
 Route::post('/managershow', ['as'=>'index.addmanager', 'uses'=>'managercontroller@verify']);

 Route::group(['middleware'=>['sess']] , function(){
    Route::get('/logout', 'Adminlogoutcontroller@index');
    Route::get('/index', 'admincontroller@index')->middleware('sees');
   
   Route::post ('/adminshow', 'registercontroller@store');
    Route::post ('/adminshow', 'registercontroller@getdata');
    Route::get ('/index', 'registercontroller@display');
    Route::get ('/content', 'registercontroller@displays');
   Route::get ('/orderstatusshow', 'registercontroller@display22');
    Route::get ('/creatorshow', 'registercontroller@display33');
  Route::get('/editprofile/{id}', 'registercontroller@edit');
  Route::post('/editprofile/{id}', 'registercontroller@update');
  Route::get('/delete/{id}', 'registercontroller@delete');
  Route::get('/deletemanager/{id}', 'registercontroller@delete11');
  Route::get('/deletecreator/{id}', 'registercontroller@delete22');
  Route::get('/adduser', 'registercontroller@managerstatus');
  Route::post('/adduser', 'registercontroller@createuser');
 Route::post('/manageradd', 'registercontroller@store11');
 Route::get ('/managershow', 'registercontroller@display11');
Route::get('/view/{id}','registercontroller@view');
Route::get('/noticeboard', 'registercontroller@noticestatus');
Route::post('/noticeboard', 'registercontroller@noticeshow');
Route::get('/allnotice', 'registercontroller@displays55');
Route::get('/deletenote/{id}', 'registercontroller@deletenotice');

});

Route::group(['middleware'=>['sess']], function(){
  
    Route::get('/logout', 'Adminlogoutcontroller@index')->name('Admin.logout');

    Route::get('/dashboard', 'AdminController@index');

    Route::get ('/myprofile', 'creatorregcontroller@display');


     Route::get('/editprofile/{id}', 'creatorregcontroller@edit');
    Route::post('/editprofile/{id}', 'creatorregcontroller@update');
    // .............

    Route::get ('/dashboard', 'photocontroller@displays');



    Route::get ('/photo', 'contentcontroller@photo');
    Route::get ('/book', 'contentcontroller@book');
    Route::get ('/video', 'contentcontroller@video');
   
    
    Route::get ('/dashboard', 'photocontroller@displays');
    
    
    
    Route::get ('/videoshow', 'contentcontroller@creatorvidshow');
    Route::get ('/pdfshow', 'contentcontroller@creatorpdfshow');
    
    
    Route::get ('/book', 'photocontroller@displays22');
    Route::get ('/video', 'photocontroller@displays11');
    Route::get ('/orderstatus', 'photocontroller@displays33');
    
    
    Route::post ('/jpgshow', 'photocontroller@store');
    Route::get ('/jpgshow', 'contentcontroller@creatorimgshow')->name('image.validation');
    

    
    Route::get ('/photo', 'photocontroller@display');
    
    Route::get('/editimage/{id}', 'photocontroller@edit'); 
    Route::post('/editimage/{id}', 'photocontroller@update');
    Route::get('/delete/{id}', 'photocontroller@delete');
    Route::get('/view/{id}','photocontroller@view');
    Route::get('/viewvideo/{id}','photocontroller@view11');
    Route::get('/viewpdf/{id}','photocontroller@view22');
    Route::get('/download/{image}', 'photocontroller@download');
    Route::post ('/videoshow', 'videocontroller@store');
    
    
    Route::get ('/videoformshow', 'photocontroller@videoshow');
    Route::post ('/videoformshow', 'photocontroller@store11');
    
    Route::get ('/pdfformshow', 'photocontroller@pdfshow');
    Route::post ('/pdfformshow', 'photocontroller@store22');
    
    
   
 });
 
 
Route::get('/login', 'userlogincontroller@index')->name('user.login');
Route::post('/login', 'userlogincontroller@verify');
Route::group(['middleware'=>['sess']], function(){
	Route::group(['middleware'=>['type']], function(){
		Route::get('/user/dashboard', 'userdashboardcontroller@index')->name('user.dashboard');
		Route::get('/user/content/details/{id}', 'userdashboardcontroller@details')->name('user.dashboarddetails');
		Route::post('/user/content/details/{id}', 'userdashboardcontroller@edit')->name('user.dashboardedit');
		//Route::get('/user/content/download/{id}', 'userdashboarddownload@download');
		Route::get('/logout', 'userlogoutcontroller@index')->name('user.logout');
		Route::get('/user/order', 'userordercontroller@index')->name('user.order');
		Route::post('/user/order', 'userordercontroller@add')->name('user.orderadd');
		Route::get('/user/order/details', 'userordercontroller@details')->name('user.orderdetails');
		Route::get('/user/order/edit/{id}', 'userordercontroller@edit')->name('user.orderedit');
		Route::post('/user/order/edit/{id}', 'userordercontroller@update')->name('user.orderupdate');
		Route::get('/user/order/delete/{id}', 'userordercontroller@del')->name('user.orderdelete');
		Route::get('/user/order/destroy/{id}', 'userordercontroller@des')->name('user.orderdestroy');
		Route::get('/user/content/invoice/{id}', 'userdashboardcontroller@invoice')->name('user.dashboardinvoice');
		Route::get('/user/content/print/{id}', 'userdashboardcontroller@print')->name('user.dashboardprint');
		Route::get('/user/information', 'userinformationcontroller@user')->name('user.information');
		Route::get('/user/myinformation', 'userinformationcontroller@myuser')->name('user.myinformation');
		Route::get('/user/myinformationedit/{id}', 'userinformationcontroller@edit')->name('user.myinformationedit');
		Route::post('/user/myinformationedit/{id}', 'userinformationcontroller@update')->name('user.myinformationupdate');
		Route::get('/user/order/check', 'userordercontroller@check')->name('user.ordercheck');
		Route::get('/user/order/wishlist', 'userordercontroller@wishlist')->name('user.orderwishlist');
		Route::get('/user/content/wishlist/{id}', 'userdashboardcontroller@wishlist')->name('user.dashboardinvoicewishlist');
		Route::get('/user/order/wishlist/delete', 'userordercontroller@wishlistdelete')->name('user.wishlistdelete');
	});	
});
