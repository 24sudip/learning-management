<?php

use App\Http\Controllers\{ProfileController, AdminController, InstructorController, UserController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{CategoryController, CourseController, CouponController, SettingController, OrderController};
use App\Http\Controllers\Frontend\{IndexController, WishlistController, CartController};
use App\Http\Controllers\Backend\{QuestionController, ReportController};

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'Index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Wishlist All Route
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/user/wishlist', 'AllWishlist')->name('user.wishlist');
        Route::get('/get-wishlist-course/', 'GetWishlistCourse');
        Route::get('/wishlist-remove/{id}', 'RemoveWishlist');
    });

    // User My Course All Route
    Route::controller(OrderController::class)->group(function () {
        Route::get('/my/course', 'MyCourse')->name('my.course');
        Route::get('/course/view/{course_id}', 'CourseView')->name('course.view');
    });

    // User Question All Route
    Route::controller(QuestionController::class)->group(function () {
        Route::post('/user/question', 'UserQuestion')->name('user.question');
    });
});

// Admin Group Middleware
Route::middleware(['auth','roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    // Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category/{id}', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    // SubCategory All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory/{id}', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');
    });

    // Instructor All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/instructor', 'AllInstructor')->name('all.instructor');
        Route::post('/update/user/status', 'UpdateUserStatus')->name('update.user.status');
    });

    // Admin Courses All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/all/course', 'AdminAllCourse')->name('admin.all.course');
        Route::post('/update/course/status', 'UpdateCourseStatus')->name('update.course.status');
        Route::get('/admin/course/details/{id}', 'AdminCourseDetails')->name('admin.course.details');
    });

    // Admin Coupon All Route
    Route::controller(CouponController::class)->group(function () {
        Route::get('/admin/all/coupon', 'AdminAllCoupon')->name('admin.all.coupon');
        Route::get('/admin/add/coupon', 'AdminAddCoupon')->name('admin.add.coupon');
        Route::post('/admin/store/coupon', 'AdminStoreCoupon')->name('admin.store.coupon');
        Route::get('/admin/edit/coupon/{id}', 'AdminEditCoupon')->name('admin.edit.coupon');
        Route::post('/admin/update/coupon/{id}', 'AdminUpdateCoupon')->name('admin.update.coupon');
        Route::get('/admin/delete/coupon/{id}', 'AdminDeleteCoupon')->name('admin.delete.coupon');
    });

    // Smtp Setting All Route
    Route::controller(SettingController::class)->group(function () {
        Route::get('/smtp/setting', 'SmtpSetting')->name('smtp.setting');
        Route::post('/update/smtp/{id}', 'UpdateSmtp')->name('update.smtp');
    });

    // Admin All Order Route
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending/order', 'AdminPendingOrder')->name('admin.pending.order');
        Route::get('/admin/order/details/{id}', 'AdminOrderDetails')->name('admin.order.details');
        Route::get('/pending/confirm/{id}', 'PendingToConfirm')->name('pending.confirm');
        Route::get('/admin/confirmed/order', 'AdminConfirmedOrder')->name('admin.confirmed.order');
    });

    // Admin Report All Route
    Route::controller(ReportController::class)->group(function () {
        Route::get('/report/view', 'ReportView')->name('report.view');
        Route::post('/search/by/date', 'SearchByDate')->name('search.by.date');
        Route::post('/search/by/month', 'SearchByMonth')->name('search.by.month');
        Route::post('/search/by/year', 'SearchByYear')->name('search.by.year');
    });
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware('guest');
Route::get('/become/instructor', [AdminController::class, 'BecomeInstructor'])->name('become.instructor');
Route::post('/instructor/register', [AdminController::class, 'InstructorRegister'])->name('instructor.register');

// Instructor Group Middleware
Route::middleware(['auth', 'roles:instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'InstructorDashboard'])->name('instructor.dashboard');
    Route::get('/instructor/logout', [InstructorController::class, 'InstructorLogout'])->name('instructor.logout');
    Route::get('/instructor/profile', [InstructorController::class, 'InstructorProfile'])->name('instructor.profile');
    Route::post('/instructor/profile/store', [InstructorController::class, 'InstructorProfileStore'])
    ->name('instructor.profile.store');
    Route::get('/instructor/change/password', [InstructorController::class, 'InstructorChangePassword'])
    ->name('instructor.change.password');
    Route::post('/instructor/password/update', [InstructorController::class, 'InstructorPasswordUpdate'])
    ->name('instructor.password.update');

    Route::controller(CourseController::class)->group(function () {
        Route::get('/all/course', 'AllCourse')->name('all.course');
        Route::get('/add/course', 'AddCourse')->name('add.course');
        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');
        Route::post('/store/course', 'StoreCourse')->name('store.course');
        Route::get('/edit/course/{id}', 'EditCourse')->name('edit.course');
        Route::post('/update/course/{id}', 'UpdateCourse')->name('update.course');
        Route::post('/update/course/image/{id}', 'UpdateCourseImage')->name('update.course.image');
        Route::post('/update/course/video/{id}', 'UpdateCourseVideo')->name('update.course.video');
        Route::post('/update/course/goal/{id}', 'UpdateCourseGoal')->name('update.course.goal');
        Route::get('/delete/course/{id}', 'DeleteCourse')->name('delete.course');
    });

    // Course Section & Lecture All Route
    Route::controller(CourseController::class)->group(function () {
        Route::get('/add/course/lecture/{id}', 'AddCourseLecture')->name('add.course.lecture');
        Route::post('/add/course/section', 'AddCourseSection')->name('add.course.section');
        Route::post('/save-lecture', 'SaveLecture')->name('save-lecture');
        Route::get('/edit/lecture/{id}', 'EditLecture')->name('edit.lecture');
        Route::post('/update/lecture/{id}', 'UpdateLecture')->name('update.lecture');
        Route::get('/delete/lecture/{id}', 'DeleteLecture')->name('delete.lecture');
        Route::post('/delete/section/{id}', 'DeleteSection')->name('delete.section');
    });

    // Instructor All Order Route
    Route::controller(OrderController::class)->group(function () {
        Route::get('/instructor/all/order', 'InstructorAllOrder')->name('instructor.all.order');
        Route::get('/instructor/order/details/{payment_id}', 'InstructorOrderDetails')->name('instructor.order.details');
        Route::get('/instructor/order/invoice/{payment_id}', 'InstructorOrderInvoice')->name('instructor.order.invoice');
    });

    // Question All Route
    Route::controller(QuestionController::class)->group(function () {
        Route::get('/instructor/all/question', 'InstructorAllQuestion')->name('instructor.all.question');
        Route::get('/question/details/{id}', 'QuestionDetails')->name('question.details');
        Route::post('/instructor/reply', 'InstructorReply')->name('instructor.reply');
    });

    // Instructor Coupon All Route
    Route::controller(CouponController::class)->group(function () {
        Route::get('/instructor/all/coupon', 'InstructorAllCoupon')->name('instructor.all.coupon');
        Route::get('/instructor/add/coupon', 'InstructorAddCoupon')->name('instructor.add.coupon');
        Route::post('/instructor/store/coupon', 'InstructorStoreCoupon')->name('instructor.store.coupon');
        Route::get('/instructor/edit/coupon/{id}', 'InstructorEditCoupon')->name('instructor.edit.coupon');
        Route::post('/instructor/update/coupon/{id}', 'InstructorUpdateCoupon')->name('instructor.update.coupon');
        Route::get('/instructor/delete/coupon/{id}', 'InstructorDeleteCoupon')->name('instructor.delete.coupon');
    });
});

// Route Accessable for All
Route::get('/instructor/login', [InstructorController::class, 'InstructorLogin'])->name('instructor.login')->middleware('guest');

Route::get('/course/details/{id}/{slug}', [IndexController::class, 'CourseDetails']);
Route::get('/category/{id}/{slug}', [IndexController::class, 'CategoryCourse']);
Route::get('/sub-category/{id}/{slug}', [IndexController::class, 'SubCategoryCourse']);
Route::get('/instructor/details/{id}', [IndexController::class, 'InstructorDetails'])->name('instructor.details');

Route::post('/add-to-wishlist/{course_id}', [WishlistController::class, 'AddToWishlist']);

Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);
Route::post('/buy/data/store/{id}', [CartController::class, 'BuyToCart']);
Route::get('/cart/data', [CartController::class, 'CartData']);
// Get Data From Minicart
Route::get('/course/mini/cart', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/course/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Cart All Route
Route::controller(CartController::class)->group(function () {
    Route::get('/mycart', 'Mycart')->name('mycart');
    Route::get('/get-cart-course', 'GetCartCourse');
    Route::get('/cart-remove/{rowId}', 'CartRemove');
});

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::post('/instructor-coupon-apply', [CartController::class, 'InstructorCouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Checkout Page Route
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::post('/payment', [CartController::class, 'Payment'])->name('payment');
Route::post('/stripe/order', [CartController::class, 'StripeOrder'])->name('stripe.order');

require __DIR__.'/auth.php';

