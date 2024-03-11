<?php

$router->get('/', "controllers/index.php");
$router->get('/hotels', "controllers/hotel/hotels.php");
$router->get('/recommend', "controllers/recommend.php");
$router->get('/top', "controllers/topten.php");
$router->post('/hotel', "controllers/hotel/hotel.php");
$router->get('/hotel', "controllers/hotel/hotel.php");
$router->get('/user', "controllers/user/user.php");
$router->get('/place', "controllers/place/place.php");
$router->get('/register', "controllers/register.php");
$router->post('/update', "controllers/update.php");
$router->post('/booking', "controllers/booking.php");
$router->get('/search', "controllers/search.php");
$router->post('/search', "controllers/search.php");
$router->get('/login', "controllers/login.php");
$router->post('/login', "controllers/login.php");
$router->post('/logout', "controllers/logout.php");
//---------------- adim --------------
$router->get('/et_admin', "controllers/admin/index.php");
$router->get('/loginAsAdmin', "controllers/admin/login.php");
$router->get('/admin-profile', "controllers/admin/Profile.php");
//----------- places------------------
$router->get('/createPlace', "controllers/admin/Place/create.php");
$router->get('/placeTable', "controllers/admin/Place/table.php");
$router->get('/placeProfile', "controllers/admin/Place/profile.php");
$router->get('/editPlace', "controllers/admin/Place/edit.php");

//--------------   hotels ------------
$router->get('/editHotel', "controllers/admin/hotel/edit.php");
$router->get('/hotelProfile', "controllers/admin/hotel/profile.php");
$router->get('/hotelTable', "controllers/admin/hotel/table.php");
$router->get('/createHotel', "controllers/admin/hotel/create.php");

//------------------ user ----------------
$router->get('/userTable', "controllers/admin/user/table.php");
$router->get('/userprofile', "controllers/admin/user/profile.php");
$router->get('/search_admin', "controllers/admin/search_admin.php");
$router->post('/search_admin', "controllers/admin/search_admin.php");
$router->get('/delete', "views/admin/delete.php");

//-----------  hotels admin -----------

$router->get('/hotelAdmin', "controllers/hotel/admin/index.php");
$router->get('/hotelAdmin_Table', "controllers/hotel/admin/table.php");
$router->get('/hotelAdmin_Edit', "controllers/hotel/admin/edit.php");
$router->get('/hotelAdmin_Profile', "controllers/hotel/admin/profile.php");
$router->get('/hotelAdmin_search', "controllers/hotel/admin/search.php");
$router->get('/hotelAdmin_createHotel', "controllers/hotel/admin/create.php");
