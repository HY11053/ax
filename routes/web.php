<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();
Route::get('/home', 'HomeController@index');
//前台界面
Route::group(['domain' => 'm.anxjm.net'], function () {
    Route::get('/','Mobile\IndexController@Index');
    Route::get('article','Mobile\ArticleCategorizationController@articleIndex');
    Route::get('article/{id}.html','Mobile\ArticleController@NewsArticle')->where('id', '[0-9]+');
    Route::get('/article/{date}-{id}.html','Mobile\ArticleController@NewsArticle')->where(['date'=>'[0-9a-zA-Z]+','id'=>'[0-9]+']);
    Route::get('xiangmu/{id}.html','Mobile\ArticleController@BrandArticle')->where('id', '[0-9]+');
    Route::get('xiangmu/{path}-{id}.html','Mobile\ArticleController@BrandArticle')->where(['path'=>'[a-zA-Z0-9_]+','id'=>'[0-9]+']);
    Route::get('xiangmu','Mobile\XiangmuProjectController@XiangmuLists')->where('path','[a-zA-Z0-9]+')->name('xiangmulist');
    Route::get('about/about','Mobile\StatementController@about');
    Route::get('about/contact','Mobile\StatementController@contact');
    Route::get('about/youshi','Mobile\StatementController@youshi');
    Route::get('about/hezuo','Mobile\StatementController@hezuo');
    Route::get('about/disclaimer','Mobile\StatementController@disclaimer');
    Route::get('about/flgw','Mobile\StatementController@flgw');
    Route::get('about/friend_links','Mobile\StatementController@friendLinks');
    Route::get('about/sitemap','Mobile\StatementController@sitemap');
    Route::any('search','Mobile\SeacrhController@SeacrhBrand');
    Route::get('xiangmu/p{page}','Mobile\XiangmuProjectController@XiangmuLists')->where('path','[a-zA-Z0-9]+')->name('xiangmulist2');
    Route::get('xiangmu/{tid}_{zid?}','Mobile\XiangmuProjectController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists');
    Route::get('xiangmu/{tid}_{zid?}/p{page}','Mobile\XiangmuProjectController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists2');
    Route::get('xiangmu/{path2}/{tid}_{zid?}','Mobile\XiangmuProjectController@CityInverBrandLists')->where(['path'=>'[a-zA-Z]+','path2'=>'[a-zA-Z_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('xmcitypagelist2');
    Route::get('xiangmu/{path2}/{tid}_{zid?}/p{page}','Mobile\XiangmuProjectController@CityInverBrandLists')->where(['path'=>'[a-zA-Z]+','path2'=>'[a-zA-Z_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('xmcitypagelist2');
    Route::get('xiangmu/{path2}','Mobile\XiangmuProjectController@CityBrandLists')->where(['path2'=>'[a-zA-Z_]+'])->name('xmcitypagelist');
    Route::get('xiangmu/{path2}/p{page}','Mobile\XiangmuProjectController@CityBrandLists')->where(['path2'=>'[a-zA-Z_]+'])->name('xmcitypagelist2');
    Route::get('paihang','Mobile\PaihangbangController@IndexPaihangbang');
    Route::get('paihang/all','Mobile\PaihangbangController@PaihangbangAll');
    Route::get('paihang/month','Mobile\PaihangbangController@PaihangbangMonth');
    Route::get('paihang/week','Mobile\PaihangbangController@PaihangbangWeek');
    Route::get('paihang/{path}','Mobile\PaihangbangController@Paihangbang')->where('path', '[a-zA-Z_0-9]+');
    Route::get('{path}','Mobile\ArticleCategorizationController@listNews')->where('path','[a-zA-Z0-9_]+')->name('newslist');
    Route::get('{path}/{tid}_{zid?}','Mobile\ArticleCategorizationController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists');
    Route::get('{path}/{tid}_{zid?}/p{page}','Mobile\ArticleCategorizationController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists2');
    Route::get('{path}/p{page}','Mobile\ArticleCategorizationController@listNews')->where(['path'=>'[a-zA-Z0-9_]+','page'=>'[0-9]+'])->name('newspagelist');
    Route::get('{path}/{path2}','Mobile\ArticleCategorizationController@CityBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+'])->name('citypagelist');
    Route::get('{path}/{path2}/p{page}','Mobile\ArticleCategorizationController@CityBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+'])->name('citypagelist2');
    Route::get('{path}/{path2}/{tid}_{zid?}','Mobile\ArticleCategorizationController@CityInverBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('citypagelist2');
    Route::get('{path}/{path2}/{tid}_{zid?}/p{page}','Mobile\ArticleCategorizationController@CityInverBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('citypagelist2');
});

Route::group(['domain' => 'mip.anxjm.net'], function () {
    Route::get('/','Mip\IndexController@Index');
    Route::get('article','Mip\ArticleCategorizationController@articleIndex');
    Route::get('article/{id}.html','Mip\ArticleController@NewsArticle')->where('id', '[0-9]+');
    Route::get('/article/{date}-{id}.html','Mip\ArticleController@NewsArticle')->where(['date'=>'[0-9A-Za-z]+','id'=>'[0-9]+']);
    Route::get('xiangmu/{id}.html','Mip\ArticleController@BrandArticle')->where('id', '[0-9]+');
    Route::get('xiangmu/{path}-{id}.html','Mip\ArticleController@BrandArticle')->where(['path'=>'[a-zA-Z0-9_]+','id'=>'[0-9]+']);
    Route::get('xiangmu','Mip\XiangmuProjectController@XiangmuLists')->where('path','[a-zA-Z0-9]+')->name('xiangmulist');
    Route::get('about/about','Mip\StatementController@about');
    Route::get('about/contact','Mip\StatementController@contact');
    Route::get('about/youshi','Mip\StatementController@youshi');
    Route::get('about/hezuo','Mip\StatementController@hezuo');
    Route::get('about/disclaimer','Mip\StatementController@disclaimer');
    Route::get('about/flgw','Mip\StatementController@flgw');
    Route::get('about/friend_links','Mip\StatementController@friendLinks');
    Route::get('about/sitemap','Mip\StatementController@sitemap');
    Route::any('search','Mip\SeacrhController@SeacrhBrand');
    Route::get('xiangmu/p{page}','Mip\XiangmuProjectController@XiangmuLists')->where('path','[a-zA-Z0-9]+')->name('xiangmulist2');
    Route::get('xiangmu/{tid}_{zid?}','Mip\XiangmuProjectController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists');
    Route::get('xiangmu/{tid}_{zid?}/p{page}','Mip\XiangmuProjectController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists2');
    Route::get('xiangmu/{path2}/{tid}_{zid?}','Mip\XiangmuProjectController@CityInverBrandLists')->where(['path'=>'[a-zA-Z]+','path2'=>'[a-zA-Z_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('xmcitypagelist2');
    Route::get('xiangmu/{path2}/{tid}_{zid?}/p{page}','Mip\XiangmuProjectController@CityInverBrandLists')->where(['path'=>'[a-zA-Z]+','path2'=>'[a-zA-Z_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('xmcitypagelist2');
    Route::get('xiangmu/{path2}','Mip\XiangmuProjectController@CityBrandLists')->where(['path2'=>'[a-zA-Z_]+'])->name('xmcitypagelist');
    Route::get('xiangmu/{path2}/p{page}','Mip\XiangmuProjectController@CityBrandLists')->where(['path2'=>'[a-zA-Z_]+'])->name('xmcitypagelist2');
    Route::get('paihang','Mip\PaihangbangController@IndexPaihangbang');
    Route::get('paihang/all','Mip\PaihangbangController@PaihangbangAll');
    Route::get('paihang/month','Mip\PaihangbangController@PaihangbangMonth');
    Route::get('paihang/week','Mip\PaihangbangController@PaihangbangWeek');
    Route::get('paihang/{path}','Mip\PaihangbangController@Paihangbang')->where('path', '[a-zA-Z_0-9]+');
    Route::get('{path}','Mip\ArticleCategorizationController@listNews')->where('path','[a-zA-Z0-9_]+')->name('newslist');
    Route::get('{path}/{tid}_{zid?}','Mip\ArticleCategorizationController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists');
    Route::get('{path}/{tid}_{zid?}/p{page}','Mip\ArticleCategorizationController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists2');
    Route::get('{path}/p{page}','Mip\ArticleCategorizationController@listNews')->where(['path'=>'[a-zA-Z0-9_]+','page'=>'[0-9]+'])->name('newspagelist');
    Route::get('{path}/{path2}','Mip\ArticleCategorizationController@CityBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+'])->name('citypagelist');
    Route::get('{path}/{path2}/p{page}','Mip\ArticleCategorizationController@CityBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+'])->name('citypagelist2');
    Route::get('{path}/{path2}/{tid}_{zid?}','Mip\ArticleCategorizationController@CityInverBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('citypagelist2');
    Route::get('{path}/{path2}/{tid}_{zid?}/p{page}','Mip\ArticleCategorizationController@CityInverBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','path2'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('citypagelist2');
});
Route::get('/','Frontend\IndexController@Index');
Route::post('/phonecomplate/','Frontend\PhoneController@phoneComplate');
Route::post('/mipbtphonecomplate/','Frontend\PhoneController@ButtonPhoneComplate');
Route::post('/miptopphonecomplate/','Frontend\PhoneController@TopPhoneComplate');
Route::get('article','Frontend\ArticleCategorizationController@articleIndex');
Route::get('news/{id}.html','Frontend\ArticleController@NewsArticle')->where('id', '[0-9]+');
Route::get('busInfo/{id}.html','Frontend\ArticleController@BrandArticle')->where('id', '[0-9]+');
Route::get('about/about','Frontend\StatementController@about');
Route::get('shantie.html','Frontend\StatementController@shantie');
Route::get('about/guestbook','Frontend\StatementController@guestbook');
Route::get('about/contact','Frontend\StatementController@contact');
Route::get('about/youshi','Frontend\StatementController@youshi');
Route::get('about/hezuo','Frontend\StatementController@hezuo');
Route::get('about/disclaimer','Frontend\StatementController@disclaimer');
Route::get('about/flgw','Frontend\StatementController@flgw');
Route::get('about/friend_links','Frontend\StatementController@friendLinks');
Route::get('about/sitemap','Frontend\StatementController@sitemap');
//Route::any('search','Frontend\SeacrhController@SeacrhBrand');
Route::get('search','Frontend\XiangmuProjectController@XiangmuLists')->where('path','[a-zA-Z0-9]+')->name('xiangmulist');
Route::get('search/{page}','Frontend\XiangmuProjectController@XiangmuLists')->where('page','[0-9]+')->name('xiangmulist2');
Route::get('search/{tid}_{zid}','Frontend\XiangmuProjectController@projectBrandLists')->where(['tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists');
Route::get('search/{tid}_{zid?}/p{page}','Frontend\XiangmuProjectController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists2');
Route::get('newsPage/{path}','Frontend\ArticleCategorizationController@ListNewsLists')->where('path','[a-zA-Z0-9]+')->name('newslist');
Route::get('{path}','Frontend\ArticleCategorizationController@listNews')->where('path','[a-zA-Z0-9]+')->name('newslist');
Route::get('{path}/{page}','Frontend\ArticleCategorizationController@listNews')->where(['path'=>'[a-zA-Z0-9]+','page'=>'[0-9]+'])->name('newspagelist');
Route::get('{path}/{tid}_{zid?}','Frontend\ArticleCategorizationController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists');
Route::get('{path}/{tid}_{zid?}/p{page}','Frontend\ArticleCategorizationController@projectBrandLists')->where(['path'=>'[a-zA-Z0-9_]+','tid'=>'[0-9]+','zid'=>'[0-9]+'])->name('projectlists2');