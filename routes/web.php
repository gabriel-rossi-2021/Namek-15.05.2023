<?php

use Illuminate\Support\Facades\Route;

/* REDIRECTION SUR LA VIEW HOME */
Route::get('/', "App\\Http\\Controllers\\shop\\MainController@index")->name('home');


// REDIRECTION SUR LA VIEW PRODUIT ALL
Route::get('produit', "App\\Http\\Controllers\\shop\\MainController@productAll");
// REDIRECTION SUR LA VIEW DETAILS DU PRODUIT
Route::get('details/{id}', "App\\Http\\Controllers\\shop\\MainController@detailsProduit")->name('detail_produit');
// REDIRECTION SUR LA VIEW DES PRODUITS FILTRER PAR CATEGORIES
Route::get('/category/{id}', "App\\Http\\Controllers\\shop\\MainController@product")->name('voir_products_par_cat');
// CREATION OPINION SUR UN PRODUIT
Route::post('/details/{id}', "App\\Http\\Controllers\\shop\\MainController@AjoutComment")->name('creation_comment');


// REDIRECTION SUR LA VIEW DASHBOARD (SI IL EST PAS CONNECTE -> RENVOIE DIRECTION LA VIEW LOGIN)
Route::get('dashboard', "App\\Http\\Controllers\\shop\\DashboardController@AfficheDashboard")->name('dashboard')->middleware('auth');
Route::post('/dashboard/{id}', "App\\Http\\Controllers\\shop\\DashboardController@update")->name('dashboard.update');
Route::post('/dashboard/{id}/update-password', "App\Http\Controllers\shop\DashboardController@updatePassword")->name('dashboard.update.mdp');
Route::post('/dashboard/{id}/update-address', "App\Http\Controllers\shop\DashboardController@updateAddress")->name('dashboard.update.address');



/* REDIRECTION SUR LA VIEW CONTACt */
Route::get('/contact', "App\\Http\\Controllers\\shop\\ContactController@AfficheContactView")->name('contact.affiche');
Route::post('/contact/envoie', "App\\Http\\Controllers\\shop\\ContactController@EnvoieContactForm")->name('contact.envoyer');


// Redirection vers la vue de connexion
Route::get('/login', "App\\Http\\Controllers\\shop\\MainController@showLoginForm")->name('login.form')->middleware(['guest']);
// Validation des données de connexion
Route::post('/login', "App\\Http\\Controllers\\shop\\MainController@login")->name('login');
// DECONNEXION DE L'UTILISATEUR
Route::get('/logout', "App\\Http\\Controllers\\shop\\MainController@logout")->name('logout');

/* REDIRECTION SUR LA VIEW SIGNUP*/
Route::get('/signup', "App\\Http\\Controllers\\shop\\MainController@inscription")->middleware(['guest']);;
Route::post('/signup', "App\\Http\\Controllers\\shop\\MainController@register")->name('register.send');

/* REDIRECTION SUR LA VUE RESETPASSWORD */
Route::get('/reset', "App\\Http\\Controllers\\shop\\ResetPassword@index")->name('index.reset');
Route::post('/rest', "App\\Http\\Controllers\\shop\\ResetPassword@sendEmail")->name('send.email');


/* REDIRECTION SUR LA VIEW Panier*/
Route::get('/panier', "App\\Http\\Controllers\\shop\\Panier@showPanier")->name('panier_show');
Route::post('/panier/add/{id}', "App\\Http\\Controllers\\shop\\Panier@add")->name('panier_add');
Route::delete('/panier/{id}', "App\\Http\\Controllers\\shop\\Panier@suppProduit")->name('panier_supp');

/* REDIRECTION SUR LA VUE CHECKOUT */
Route::get('/checkout', "App\\Http\\Controllers\\shop\\CheckoutController@showCheckout")->name('checkout_show')->middleware('auth'); /*middleware permet de renvoyer sur connexion si il est pas co */

Route::get('/search', "App\\Http\\Controllers\\shop\\MainController@search")->name('search');

/* REDIRECTION SUR LA VUE DASHBOARD ADMIN */
Route::get('admin', "App\\Http\\Controllers\\shop\\AdminController@AfficheAdmin")->name('admin')->middleware('auth', 'admin');
Route::post('admin', "App\\Http\\Controllers\\shop\\AdminController@AddProduct")->name('add_product');

/* REDIRECTION SUR LA VUE DASHBOARD Gerer Admin */
Route::get('gerer', "App\\Http\\Controllers\\shop\\AdminGererController@index")->name('adminGerer');
Route::delete('/gerer/user/{id}', "App\\Http\\Controllers\\shop\\AdminGererController@removeUser")->name('remove_user'); // SUPRESSION UTILISATEUR
Route::delete('/gerer/product/{id}', "App\\Http\\Controllers\\shop\\AdminGererController@removeProduit")->name('remove_produit'); // SUPRESSION PRODUIT
Route::delete('/gerer/comment/{id}', "App\\Http\\Controllers\\shop\\AdminGererController@removeComment")->name('remove_comment'); // SUPRESSION COMMENTAIRE
Route::delete('/gerer/order/{id}', "App\\Http\\Controllers\\shop\\AdminGererController@removeOrder")->name('remove_order'); // SUPRESSION COMMANDES

/* REDIRECTION SUR LA VUE Facture*/
Route::get('/confirmation-paiement', "App\\Http\\Controllers\\shop\\CommandeController@AfficheFacture")->name('generation_facture');

/* FLUX RSS */
Route::get('/rss', "App\\Http\\Controllers\\shop\\RssController@index")->name('flux_rss');

