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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// ADMIN namespace
Route::namespace('Backend')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::prefix(config('app.setting.backend.slug'))->group(function () {
            Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.home');
            Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.home');
            // Route::get('/produk', [App\Http\Controllers\Backend\Product\ProductController::class, 'index'])->name('admin.product');

            Route::resource('/produk/category', '\App\Http\Controllers\Backend\Product\CategoryProductController')->except([
                'show',
                'edit',
                'create',
            ])->names([
                'index' => 'admin.produkcategory.index',
                'store' => 'admin.produkcategory.store',
                'update' => 'admin.produkcategory.update',
                'destroy' => 'admin.produkcategory.delete',
            ]);

            Route::resource('/produk', '\App\Http\Controllers\Backend\Product\ProductController')->except([
                'show',
            ])->names([
                'edit' => 'admin.produk.edit',
                'create' => 'admin.produk.create',
                'index' => 'admin.produk.index',
                'store' => 'admin.produk.store',
                'update' => 'admin.produk.update',
                'destroy' => 'admin.produk.delete',
            ]);
            // Route::get('/settingaccess/user/index', [App\Http\Controllers\Backend\SettingAccess\UserController::class, 'index'])->name('admin.settingaccess.user.index');
            Route::group(['middleware' => ['permission:create_user|read_user|update_user|delete_user']], function(){
                Route::resource('/settingaccess/user', '\App\Http\Controllers\Backend\SettingAccess\UserController')->except([
                    'show',
                ])->names([
                    'index' => 'admin.settingaccess.user.index',
                    'create' => 'admin.settingaccess.user.tambah',
                    'store' => 'admin.settingaccess.user.store',
                    'edit' => 'admin.settingaccess.user.edit',
                    'update' => 'admin.settingaccess.user.update',
                    'destroy' => 'admin.settingaccess.user.delete',
                ]);
            });

            Route::get('/settingaccess/user/changepassword/{id}', [App\Http\Controllers\Backend\SettingAccess\UserController::class, 'changepassword'])->name('admin.settingaccess.user.changepassword');

            Route::group(['middleware' => ['permission:create_role|read_role|update_role|delete_role']], function(){
                Route::resource('/settingaccess/role', '\App\Http\Controllers\Backend\SettingAccess\RoleController')->except([
                    'show'
                ])->names([
                    'index' => 'admin.settingaccess.role.index',
                    'create' => 'admin.settingaccess.role.tambah',
                    'store' => 'admin.settingaccess.role.store',
                    'destroy' => 'admin.settingaccess.role.delete',
                    'update' => 'admin.settingaccess.role.update',
                    'edit' => 'admin.settingaccess.role.edit',
                ]);
            });

            Route::get('/settingaccess/permission', [App\Http\Controllers\Backend\SettingAccess\PermissionController::class, 'index'])->name('admin.setting.permission');
            Route::group(['middleware' => ['permission:create_role|read_role|update_role|delete_role']], function(){
                Route::resource('/settings/menuadmin', '\App\Http\Controllers\Backend\Settings\MenuAdminController')->except([
                        'edit',
                    ])->names([
                        'show' => 'admin.setting.menu.index',
                        'create' => 'admin.setting.menu.create',
                        'store' => 'admin.setting.menu.store',
                        'update' => 'admin.setting.menu.update',
                        'delete' => 'admin.setting.menu.destroy'
                ]);
            });

            /** news */
            Route::resource('/news', '\App\Http\Controllers\Backend\News\NewsController')->except([
                'show',
            ])->names([
                'index' => 'admin.news.index',
                'create' => 'admin.news.create',
                'store' => 'admin.news.store',
                'update' => 'admin.news.update',
                'delete' => 'admin.news.destroy',
                'edit'  => 'admin.news.edit'
            ]);

              /** category news */
              Route::resource('/newscategory', '\App\Http\Controllers\Backend\News\NewsCategoryController')->names([
                'index' => 'admin.newscategory.index',
                'create' => 'admin.newscategory.create',
                // 'detail' => 'admin.newscategory.show',
                'edit' => 'admin.newscategory.edit',
                'store' => 'admin.newscategory.store',
                'update' => 'admin.newscategory.update',
                'destroy' => 'admin.newscategory.destroy',
            ]);

            
            Route::get('/newscategory/detail', [App\Http\Controllers\Backend\News\NewsCategoryController::class, 'show'])->name('admin.newscategory.show');
            Route::post('/newscategory/update-category', [App\Http\Controllers\Backend\News\NewsCategoryController::class, 'updateCategory'])->name('admin.newscategory.update-category');
           

            /** Banner */
            Route::resource('/banner', '\App\Http\Controllers\Backend\Banner\BannerController')->names([
                'index' => 'admin.banner.index',
                'show' => 'admin.banner.show',
                'create' => 'admin.banner.create',
                'store' => 'admin.banner.store',
                'update' => 'admin.banner.update',
                'delete' => 'admin.banner.destroy',
                'edit'  => 'admin.banner.edit'
            ]);

            Route::resource('/pages', '\App\Http\Controllers\Backend\Pages\PagesController')->names([
                'index' => 'admin.page.index',
                'show' => 'admin.page.show',
                'create' => 'admin.page.create',
                'store' => 'admin.page.store',
                'update' => 'admin.page.update',
                'delete' => 'admin.page.destroy',
                'edit'  => 'admin.page.edit'
            ]);

            Route::get('/settings/welcome_setting', [App\Http\Controllers\Backend\Settings\WelcomeMessageController::class, 'index'])->name('admin.setting.welcome.index');
            Route::post('/settings/welcome_setting/store', [App\Http\Controllers\Backend\Settings\WelcomeMessageController::class, 'store'])->name('admin.setting.welcome.store');

            Route::get('/settings/umum/', [App\Http\Controllers\Backend\Settings\SettingController::class, 'index'])->name('admin.setting.common_setting');
          

            Route::get('/settings/emailtemplate', [App\Http\Controllers\Backend\Settings\SettingController::class, 'emailTemplate'])->name('admin.setting.emailtemplate');
            Route::get('/settings/emailtemplate/{id}', [App\Http\Controllers\Backend\Settings\SettingController::class, 'editemailTemplate'])->name('admin.setting.emailtemplate.edit');

            Route::post('/settings/menuadmin/updatemenus', [App\Http\Controllers\Backend\Settings\MenuAdminController::class, 'orderupdate'])->name('admin.setting.menu.orderupdate');
            Route::get('/settings/menupublic', [App\Http\Controllers\Backend\Settings\MenuPublicController::class, 'index'])->name('admin.setting.menupublic.index');
            Route::get('/settings/menupublic?menu={menu}', [App\Http\Controllers\Backend\Settings\MenuPublicController::class, 'index'])->name('admin.setting.menupublic.show');
            
            /** kontak */
            Route::get('/contact', [App\Http\Controllers\Backend\Contact\ContactController::class, 'index'])->name('admin.contact.index');
            Route::get('/contact/unread', [App\Http\Controllers\Backend\Contact\ContactController::class, 'unread'])->name('admin.contact.unread');
            Route::get('/contact/read', [App\Http\Controllers\Backend\Contact\ContactController::class, 'read'])->name('admin.contact.read');

            Route::get('/contact/reply/{id}', [App\Http\Controllers\Backend\Contact\ContactController::class, 'reply'])->name('admin.contact.reply');
            
            Route::put('/contact/reply/{id}', [App\Http\Controllers\Backend\Contact\ContactController::class, 'updatereply'])->name('admin.contact.updatereply');
            
            // Route::post('/settings/menuadmin/', [App\Http\Controllers\Backend\Settings\MenuAdminController::class, 'store'])->name('admin.setting.permission.store');
            // Route::delete('/settings/menuadmin/{id}/delete', [App\Http\Controllers\Backend\Settings\MenuAdminController::class, 'destroy'])->name('admin.setting.permission.destroy');
            // Route::patch('/settings/menuadmin/{id}', [App\Http\Controllers\Backend\Settings\MenuAdminController::class, 'update'])->name('admin.setting.permission.update');
            
            // Route::get('/settings/menu_admin', [App\Http\Controllers\Backend\Settings\MenuAdminController::class, 'index'])->name('admin.setting.menu_admin');
            Route::put('/settingaccess/permission/{role}', [App\Http\Controllers\Backend\SettingAccess\PermissionController::class, 'setRolePermission'])->name('users.setRolePermission');
            Route::post('/dashboard/logout', [App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('admin.logout');
        });
    });
});

// Public namespace
Route::namespace('Frontend')->group(function () {
    Route::get('/', [App\Http\Controllers\Frontend\DashboardController::class, 'index'])->name('public.home');

    Route::get('/desain', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('public.product');
    Route::get('/{page}', [App\Http\Controllers\Frontend\PageController::class, 'index'])->name('public.page');
});