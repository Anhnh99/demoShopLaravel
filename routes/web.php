<?php

use Illuminate\Support\Facades\Route;

// ------------Route Front-end------------

Route::get('/','IndexController@newProduct')->name('front-home'); // Trang chủ

// product route

Route::get('list-product','ListProductController@index')->name('front-product'); //danh sách sản phẩm front-end
Route::get('list-product/{id}','ListProductController@cate')->name('front-product-cate'); //danh sách sản phẩm theo danh mục
Route::get('productDetail/{id}','DetailProductController@index')->name('front-productDetail'); //chi tiết sản phẩm

// contact route
// Route::get('contact','ContactController@index')->name('front-contact');
Route::match(['get','post'],'contact/sendMail','ContactController@sendMail')->name('front-contact');


// blog route
Route::get('/front-end/blog',function(){return view('./front_end.blog');
})->name('front-blog');
Route::get('/front-end/blogDetail',function(){return view('./front_end.blog_detail');
})->name('front-blogDetail');


// ------------Route phần Đăng nhâp + Đăng Ký - Front_end------------
Route::match(['get','post'],'/login','AuthController@Login')->name('Auth-Login'); // Đăng nhập
Route::match(['get','post'],'/register','AuthController@register')->name('Auth-register'); //Đăng ký 

//=========== middleware//===========
//=========== middleware//===========
//=========== middleware//===========
Route::middleware(['auth'])->group(function () {
    
// ------------Route phần Đăng xuất - Front_end------------
Route::get('/logout','AuthController@Logout')->name('Auth-Logout'); //Đăng xuất

// ------------Route phần Giỏ hàng - Front_end------------
Route::post('update-cart-quantity','CartController@update_cart')->name('front-update-cart-quantity'); //update cty pro
Route::post('save-cart','CartController@save_cart')->name('front-save-cart'); //lưu cart
Route::get('show-cart','CartController@show_cart')->name('front-show-cart'); //show cart
Route::get('delete-cart/{rowId}','CartController@delete_cart')->name('front-delete-cart'); //xóa sp cart

// ------------Route phần Thanh Toán - Front_end------------
Route::match(['get','post'],'/front-end/checkout','CheckoutController@create')->name('front-checkout');


// ------------Route phần Bình luận - Front_end------------
Route::post('commentProduct/{id}','DetailProductController@comment')->name('front-commentProduct'); //Bình luận
Route::post('deleteComment/{id}','DetailProductController@deleteComment')->name('front-deleteComment'); //Bình luận

 
// ------------Route Back-end------------//
// ------------Route phần Danh mục sản phẩm - Back_end------------
Route::get('/category','CategoryController@index')->name('back-category'); //hthi danh sách category
Route::match(['get','post'],'/add-category','CategoryController@create')->name('back-add-category');// thêm category
Route::match(['get','post'],'/edit-category/{id}','CategoryController@edit') //sửa category
    ->where(['id'=>'[0-9]+'])
    ->name('back-edit-category');
Route::get('/delete-category/{id}','CategoryController@destroy')->name('back-delete-category');//xóa category
// ------------Route phần Sản Phẩm - back_end------------
Route::get('/product','ProductController@index')->name('back-product'); //show danh sách Pro
Route::match(['get','post'],'/add-product','ProductController@create')->name('back-add-product');// Thêm Pro
Route::match(['get','post'],'/edit-product/{id}','ProductController@edit') //Sửa Pro
    ->where(['id'=>'[0-9]+'])
    ->name('back-edit-product');
Route::get('/delete-product/{id}','ProductController@destroy')->name('back-delete-product'); //Xóa Pro

// ------------Route phần Tìm kiếm Sản Phẩm - back_end------------
Route::post('search-product','ProductController@search')->name('search-product');

// ------------Route phần Tài khoản - back_end---------------
Route::get('/user','UserController@index')->name('back-user'); //show danh sách tài khoản
Route::match(['get','post'],'/add-user','UserController@create')->name('back-add-user'); //Thêm tài khoản
Route::get('/delete-user/{id}','UserController@destroy')->name('back-delete-user');//Xóa tài khoản
Route::match(['get','post'],'/edit-user/{id}','UserController@edit') // Sửa tài khoản
    ->where(['id'=>'[0-9]+'])
    ->name('back-edit-user');
// ------------Route phần quản trị Bình luận - Back_end------------
Route::get('/comment','CommentController@index')->name('back-comment'); 
Route::get('/delete-comment/{id}','CommentController@destroy')->name('back-delete-comment');//Xóa tài khoản

// ------------Route Slider-------------
Route::get('/slider','SliderController@index')->name('back-slider');

// ------------Route phần Quản lý Đơn hàng - Back_end---------------
Route::get('/order','OrderController@index')->name('back-order');
Route::get('/order-detail/{id}','OrderController@detail')->name('back-order-detail');


});

