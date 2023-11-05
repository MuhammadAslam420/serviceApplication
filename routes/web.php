<?php

use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\Blog\AddBlogComponent;
use App\Livewire\Admin\Blog\AllBlogsComponent;
use App\Livewire\Admin\Blog\EditBlogComponent;
use App\Livewire\Admin\Bookings\AdminBookingDetailComponent;
use App\Livewire\Admin\Bookings\AdminBookkingsComponent;
use App\Livewire\Admin\Bookings\AdminDeletedBookkingsComponent;
use App\Livewire\Admin\Categories\AdminAddCategoryComponent;
use App\Livewire\Admin\Categories\AdminCategoriesComponent;
use App\Livewire\Admin\Categories\AdminDeletedCategoryComponent;
use App\Livewire\Admin\Categories\AdminEditCategoryComponent;
use App\Livewire\Admin\Chat\ContactMessagesComponent;
use App\Livewire\Admin\Chats\AdminChatWithProviderComponent;
use App\Livewire\Admin\Chats\AllChatsComponent;
use App\Livewire\Admin\Customer\CustomersComponent;
use App\Livewire\Admin\Customer\ProvidersComponent as CustomerProvidersComponent;
use App\Livewire\Admin\Pages\AdminAboutComponent;
use App\Livewire\Admin\Pages\AdminContactComponent;
use App\Livewire\Admin\Pages\AdminQuestionComponent;
use App\Livewire\Admin\Pages\PagesComponent;
use App\Livewire\Admin\Payments\Method\PaymentsMethodsComponent;
use App\Livewire\Admin\Reports\Abuse\AbuseReportsComponent;
use App\Livewire\Admin\Reviews\AdminReviewsComponent;
use App\Livewire\Admin\Rolesandpermissions\RolesComponent;
use App\Livewire\Admin\Rolesandpermissions\RolesPermissionsComponent;
use App\Livewire\Admin\Sales\Coupons\AllCouponsComponent;
use App\Livewire\Admin\Sales\Coupons\CouponDetailComponent;
use App\Livewire\Admin\Services\Additional\AdditionalServicesComponent;
use App\Livewire\Admin\Services\DeletedServicesComponent;
use App\Livewire\Admin\Services\EditServiceComponent;
use App\Livewire\Admin\Services\Seo\ServicesSeoComponent;
use App\Livewire\Admin\Services\ServicesComponent as ServicesServicesComponent;
use App\Livewire\Admin\Setting\Home\AdminAddBannersComponent;
use App\Livewire\Admin\Setting\Home\AdminBannersComponent;
use App\Livewire\Admin\Setting\Home\AdminEditBannersComponent;
use App\Livewire\Admin\Setting\Home\Offers\AdminOfferComponent;
use App\Livewire\Admin\Setting\Home\Packages\AddPackageComponent;
use App\Livewire\Admin\Setting\Home\Packages\AllPackagesComponent;
use App\Livewire\Admin\Setting\Home\Packages\EditPackageComponent;
use App\Livewire\Admin\Setting\SettingComponent;
use App\Livewire\Admin\Subcategories\AdminAddSubCategoryComponent;
use App\Livewire\Admin\Subcategories\AdminDeletedSubCategoriesComponent;
use App\Livewire\Admin\Subcategories\AdminSubCategoriesComponent;
use App\Livewire\Provider\ProviderDashboardComponent;
use App\Livewire\Provider\RegistrationComponent;
use App\Livewire\Reports\Abuse\ReplyMessageComponent;
use App\Livewire\User\UserBookingComponent;
use App\Livewire\User\UserChatComponent;
use App\Livewire\User\UserReviewsComponent;
use App\Livewire\User\UserWalletComponent;
use App\Livewire\Web\AboutComponent;
use App\Livewire\Web\BlogDetailComponent;
use App\Livewire\Web\BlogsComponent;
use App\Livewire\Web\CartComponent;
use App\Livewire\Web\CategoriesComponent;
use App\Livewire\Web\CategoryComponent;
use App\Livewire\Web\CheckoutComponent;
use App\Livewire\Web\ContactComponent;
use App\Livewire\Web\CreateServiceComponent;
use App\Livewire\Web\ErrorComponent;
use App\Livewire\Web\HomeComponent;
use App\Livewire\Web\LocationComponent;
use App\Livewire\Web\PrivacyComponent;
use App\Livewire\Web\ProviderByComponent;
use App\Livewire\Web\ProvidersComponent;
use App\Livewire\Web\SearchComponent;
use App\Livewire\Web\ServiceByTypeComponent;
use App\Livewire\Web\ServiceDetailComponent;
use App\Livewire\Web\ServicesComponent;
use App\Livewire\Web\TermsComponent;
use App\Livewire\Web\ThankYouComponent;
use App\Livewire\Web\VipComponent;
use App\Livewire\User\WishlistComponent;
use App\Livewire\Web\ChooseSignUpComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeComponent::class)->name('home');
Route::get('/services',ServicesComponent::class)->name('services');
Route::get('/service-detail/{slug}',ServiceDetailComponent::class)->name('service_detail');
Route::get('/categories',CategoriesComponent::class)->name('categories');
Route::get('/category/{slug}/{subCategorySlug?}', CategoryComponent::class)->name('category');
Route::get('/about',AboutComponent::class)->name('about');
Route::get('/contact-us',ContactComponent::class)->name('contact');
Route::get('/cart',CartComponent::class)->name('cart');

Route::get('/search',SearchComponent::class)->name('search');
Route::get('/privacy',PrivacyComponent::class)->name('privacy');
Route::get('/terms-conditions',TermsComponent::class)->name('terms');
Route::get('/thanks',ThankYouComponent::class)->name('thanks');
Route::get('/vip',VipComponent::class)->name('vips');
Route::get('/blogs',BlogsComponent::class)->name('blogs');
Route::get('/blog-detail/{id}',BlogDetailComponent::class)->name('blog-detail');
Route::get('/location/{city}',LocationComponent::class)->name('location');
Route::get('/error',ErrorComponent::class)->name('error');
Route::get('/service-provider/{username}',ProviderByComponent::class)->name('service-provider');
Route::get('/services-by-type/{type}',ServiceByTypeComponent::class)->name('service-by-type');
Route::get('/providers',ProvidersComponent::class)->name('providers');
Route::get('/sign-up',ChooseSignUpComponent::class)->name('sign-up');
Route::get('/provider-register',RegistrationComponent::class)->name('provider-register');



Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),'verified',])->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/checkout',CheckoutComponent::class)->name('checkout');
    Route::get('/Favorites',WishlistComponent::class)->name('user.wishlist');
    Route::get('/my-bookings',UserBookingComponent::class)->name('my-bookings');
    Route::get('/wallet',UserWalletComponent::class)->name('user.wallet');
    Route::get('/my_reviews',UserReviewsComponent::class)->name('user.reviews');
    Route::get('/user-chat',UserChatComponent::class)->name('user.chat');
   
});

Route::middleware('admin')->prefix('admin')->group(function () {
   Route::get('/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
   Route::prefix('services')->group(function(){
    Route::get('/',ServicesServicesComponent::class)->name('admin.services');
    Route::get('/edit/{id}',EditServiceComponent::class)->name('admin.edit_service');
    Route::get('/deleted',DeletedServicesComponent::class)->name('admin.deleted_services');
    Route::get('/additional',AdditionalServicesComponent::class)->name('admin.additional_services');
    Route::get('/seo',ServicesSeoComponent::class)->name('admin.services_seo');
   });
   Route::get('/categories',AdminCategoriesComponent::class)->name('admin.categories');
   Route::get('/edit/category/{id}',AdminEditCategoryComponent::class)->name('admin.edit_category');
   Route::get('/create/category',AdminAddCategoryComponent::class)->name('admin.add_category');
   Route::get('/deleted/categories',AdminDeletedCategoryComponent::class)->name('admin.deleted_categories');
   Route::get('/sub-categories',AdminSubCategoriesComponent::class)->name('admin.sub_categories');
   Route::get('/create/sub-category',AdminAddSubCategoryComponent::class)->name('admin.add_subcategory');
   Route::get('/deleted/sub-categories',AdminDeletedSubCategoriesComponent::class)->name('admin.deleted_subcategories');
   Route::get('/reviews',AdminReviewsComponent::class)->name('admin.reviews');
   Route::get('/bookings',AdminBookkingsComponent::class)->name('admin.bookings');
   Route::get('/booking/{id}/detail',AdminBookingDetailComponent::class)->name('admin.booking_detail');
   Route::get('/deleted-bookings',AdminDeletedBookkingsComponent::class)->name('admin.deleted_bookings');
   Route::get('/pages',PagesComponent::class)->name('admin.pages');
   Route::get('/pages/about',AdminAboutComponent::class)->name('admin.pages.about');
   Route::get('/pages/contact-us',AdminContactComponent::class)->name('admin.pages.contact-us');
   Route::get('/pages/about/questions',AdminQuestionComponent::class)->name('admin.pages.about.questions');
   Route::get('/customers',CustomersComponent::class)->name('admin.customers');
   Route::get('/providers',CustomerProvidersComponent::class)->name('admin.providers');
   Route::get('/roles',RolesComponent::class)->name('admin.roles_permission');
   Route::get('/role/{id}',RolesPermissionsComponent::class)->name('admin.permissions_roles');

   Route::prefix('web')->group(function(){
       Route::get('/setting',SettingComponent::class)->name('admin.settings');
       Route::get('/contact/messages',ContactMessagesComponent::class)->name('admin.messages');
   });
   Route::prefix('payments')->group(function(){
     Route::get('/modules',PaymentsMethodsComponent::class)->name('admin.payments_modules');
   });
   Route::prefix('reports')->group(function(){
     Route::get('/abuse',AbuseReportsComponent::class)->name('admin.abuse_reports');
     Route::get('/reply/{id}',ReplyMessageComponent::class)->name('admin.reply_message');
   });
   Route::prefix('chats')->group(function(){
     Route::get('/all',AllChatsComponent::class)->name('admin.see_all_chats');
     Route::get('/with/providers',AdminChatWithProviderComponent::class)->name('admin.chat_with_providers');
   });
   Route::prefix('Sales')->group(function(){
    Route::get('/coupons',AllCouponsComponent::class)->name('admin.sales.coupons');
    Route::get('/coupon/{id}',CouponDetailComponent::class)->name('admin.coupon_detail');
    Route::get('/packages',AllPackagesComponent::class)->name('admin.all_packages');
    Route::get('/edit/package/{id}',EditPackageComponent::class)->name('admin.edit_package');
    Route::get('/add/package',AddPackageComponent::class)->name('admin.add_package');
   });
   Route::prefix('blogs')->group(function(){
    Route::get('/all',AllBlogsComponent::class)->name('admin.blogs');
    Route::get('/add',AddBlogComponent::class)->name('admin.add_blog');
    Route::get('/edit/{id}',EditBlogComponent::class)->name('admin.edit_blog');
   });
   Route::prefix('home')->group(function(){
    Route::get('/banners',AdminBannersComponent::class)->name('admin.home_banners');
    Route::get('/add/banner',AdminAddBannersComponent::class)->name('admin.home_add_banners');
    Route::get('/banner/{id}',AdminEditBannersComponent::class)->name('admin.home_edit_banners');
    Route::get('/offer',AdminOfferComponent::class)->name('admin.home_offer');
    
   });
});

Route::middleware('provider')->prefix('provider')->group(function () {
    Route::get('/dashboard',ProviderDashboardComponent::class)->name('provider.dashboard');
    Route::get('/create-service',CreateServiceComponent::class)->name('create-service');
});
