<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutgoingController;;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Models\User;
use Illuminate\Support\Facades\Route;













//
Route::get("/login", function () {
    return view("login");
})->name("login")->middleware("guest");
Route::get("/register", function () {
    return view("register");
})->name("register")->middleware("guest");
Route::get("/admin/dashboard",function(){
    $users=User::where("isadmin", "0")->count();
    $admins=User::where("isadmin", "1")->count();
    $categories=\App\Models\Category::all()->count();
    $products=\App\Models\Product::all()->count();
    $suppliers=\App\Models\Supplier::all()->count();
    $warehouses=\App\Models\Warehouse::all()->count();
    $brands=\App\Models\Brand::all()->count();
    $sales=\App\Models\Sale::all()->count();
    $customers=\App\Models\Customer::all()->count();
    //
    // $salesData = \App\Models\Sale::selectRaw('DATE(created_at) as date, COUNT(*) as count')
    //     ->groupBy('date')
    //     ->orderBy('date')
    //     ->get()
    //     ->pluck('count', 'date')
    //     ->toArray();
    $salesData = \App\Models\Sale::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->get()
        ->map(function ($item) {
            return [
                'x' => $item->date,
                'y' => $item->total
            ];
        });

    // $totalSales = \App\Models\Sale::all()->count();
    $totalSales = \App\Models\Sale::sum('total_price');
    // $questions=\App\Models\Question::all()->count();
    $pendingIncoming = \App\Models\Incoming::where('status', 0)->count();
    $pendingOutgoing = \App\Models\Outgoing::where('status', 0)->count();
    $data=[
        "users"=>$users,
        "admins"=>$admins,
        "categories"=>$categories,
        "products"=> $products,
        "suppliers"=> $suppliers,
        "warehouses"=> $warehouses,
        "brands"=> $brands,
        "sales"=> $sales,
        "customers"=> $customers,
        "salesData" => $salesData,
        "totalSales" => $totalSales,
        "pendingIncoming" => $pendingIncoming,
        "pendingOutgoing" => $pendingOutgoing
        // "questions"=>$questions
    ];
    // dd($data);

  return view("admin.index", $data);
})->middleware("auth")->name("home");

Route::middleware("auth")->group(function () {
    //
    Route::post("/logout/auth", [Authentication::class, "logout"]);
    Route::post("/auth/changepassword", [Authentication::class, "changepassword"]);
    Route::post("/auth/profilechange", [Authentication::class, "uploadprofilepicture"]);
    //
    Route::post('/admin/invoice', [SaleController::class, 'invoice']);
    Route::get('/admin/sale', [SaleController::class, 'index']);
    Route::get("/admin/sale/create", [SaleController::class, "create"]);
    // 
    Route::get("/admin/category/create", [CategoryController::class, "create"]);
    Route::post("/admin/category/store", [CategoryController::class, "store"]);
    Route::get("/admin/category", [CategoryController::class, "index"]);
    Route::get("/admin/category/{category}", [CategoryController::class, "show"]);
    Route::put("/admin/category/{category}", [CategoryController::class, "update"]);
    Route::delete("/admin/category/{category}", [CategoryController::class, "destroy"]);
    Route::get("/admin/category/{category}/edit", [CategoryController::class, "edit"]);
    //
    Route::get("/admin/brand/create", [BrandController::class, "create"]);
    Route::post("/admin/brand/store", [BrandController::class, "store"]);
    Route::get("/admin/brand", [BrandController::class, "index"]);
    Route::get("/admin/brand/{brand}", [BrandController::class, "show"]);
    Route::put("/admin/brand/{brand}", [BrandController::class, "update"]);
    Route::delete("/admin/brand/{brand}", [BrandController::class, "destroy"]);
    Route::get("/admin/brand/{brand}/edit", [BrandController::class, "edit"]);
    //
    Route::get("/admin/customer/create", [CustomerController::class, "create"]);
    Route::post("/admin/customer/store", [CustomerController::class, "store"]);
    Route::get("/admin/customer", [CustomerController::class, "index"]);
    Route::get("/admin/customer/{customer}", [CustomerController::class, "show"]);
    Route::put("/admin/customer/{customer}", [CustomerController::class, "update"]);
    Route::delete("/admin/customer/{customer}", [CustomerController::class, "destroy"]);
    Route::get("/admin/customer/{customer}/edit", [CustomerController::class, "edit"]);
    //
    Route::get("/admin/supplier/create", [SupplierController::class, "create"]);
    Route::post("/admin/supplier/store", [SupplierController::class, "store"]);
    Route::get("/admin/supplier", [SupplierController::class, "index"]);
    Route::get("/admin/supplier/{supplier}", [SupplierController::class, "show"]);
    Route::put("/admin/supplier/{supplier}", [SupplierController::class, "update"]);
    Route::delete("/admin/supplier/{supplier}", [SupplierController::class, "destroy"]);
    Route::get("/admin/supplier/{supplier}/edit", [SupplierController::class, "edit"]);
    //
 
    Route::get("/admin/warehouse/create", [WarehouseController::class, "create"]);
    Route::post("/admin/warehouse/store", [WarehouseController::class, "store"]);
    Route::get("/admin/warehouse", [WarehouseController::class, "index"]);
    Route::get("/admin/warehouse/{warehouse}", [WarehouseController::class, "show"]);
    Route::put("/admin/warehouse/{warehouse}", [WarehouseController::class, "update"]);
    Route::delete("/admin/warehouse/{warehouse}", [WarehouseController::class, "destroy"]);
    Route::get("/admin/warehouse/{warehouse}/edit", [WarehouseController::class, "edit"]);
    //
    Route::get("/admin/product/create", [ProductController::class, "create"]);
    Route::post("/admin/product/store", [ProductController::class, "store"]);
    Route::get("/admin/product", [ProductController::class, "index"]);
    Route::get("/admin/product/{product}", [ProductController::class, "show"]);
    Route::put("/admin/product/{product}", [ProductController::class, "update"]);
    Route::delete("/admin/product/{product}", [ProductController::class, "destroy"]);
    Route::get("/admin/product/{product}/edit", [ProductController::class, "edit"]);
    //
    Route::get("/admin/incoming/create", [IncomingController::class, "create"]);
    Route::post("/admin/incoming/store", [IncomingController::class, "store"]);
    Route::get("/admin/incoming", [IncomingController::class, "index"]);
    Route::get("/admin/incoming/processGoods", [IncomingController::class, "processGoods"]);
    Route::get("/admin/incoming/{incoming}", [IncomingController::class, "show"]);
    Route::put("/admin/incoming/{incoming}", [IncomingController::class, "update"]);
    Route::delete("/admin/incoming/{incoming}", [IncomingController::class, "destroy"]);
    Route::get("/admin/incoming/{incoming}/edit", [IncomingController::class, "edit"]);
    Route::get("/admin/incoming/{product}/receive/{incoming}", [IncomingController::class, "receiveGoods"]);
    
    //
    Route::get("/admin/outgoing/create", [OutgoingController::class, "create"]);
    Route::post("/admin/outgoing/store", [OutgoingController::class, "store"]);
    Route::get("/admin/outgoing", [OutgoingController::class, "index"]);
    Route::get("/admin/outgoing/revoked_received_goods", [OutgoingController::class, "revoked_received_goods"]);
    Route::get("/admin/outgoing/{outgoing}", [OutgoingController::class, "show"]);
    Route::put("/admin/outgoing/{outgoing}", [OutgoingController::class, "update"]);
    Route::delete("/admin/outgoing/{outgoing}", [OutgoingController::class, "destroy"]);
    Route::get("/admin/outgoing/{outgoing}/edit", [OutgoingController::class, "edit"]);
    Route::get("/admin/outgoing/{product}/receive/{outgoing}", [OutgoingController::class, "receiveGoods"]);
    
    //

    Route::get("/admin/admin/create", [AdminController::class, "create"]);
    Route::post("/admin/admin/store", [AdminController::class, "store"]);
    Route::get("/admin/admin", [AdminController::class, "index"]);
    Route::get("/admin/admin/{admin}", [AdminController::class, "show"]);
    Route::put("/admin/admin/{admin}", [AdminController::class, "update"]);
    Route::delete("/admin/admin/{admin}", [AdminController::class, "destroy"]);
    Route::get("/admin/admin/{admin}/edit", [AdminController::class, "edit"]);
    //
    Route::get("/admin/profile", [ProfileController::class, "profile"]);
    // User Controllers
    Route::get("/user/profile", [ProfileController::class, "profile"]);
    Route::get("/user/event", [ClientController::class, "events"]);
    Route::get("/user/event/{event}", [ClientController::class, "showevent"]);
    Route::get("/user/podcast", [ClientController::class, "podcasts"]);
    Route::get("/user/podcast/{podcast}", [ClientController::class, "showpodcast"]);
    Route::get("/user/post", [ClientController::class, "posts"]);
    Route::get("/user/post/{post}", [ClientController::class, "showpost"]);
    Route::get("/user/resource", [ClientController::class, "resources"]);
    Route::get("/user/resource/{resource}", [ClientController::class, "showresource"]);
    Route::get("/user/quiz", [ClientController::class, "quizzes"]);
    Route::get("/user/quiz/{quiz}", [ClientController::class, "showquiz"]);
    Route::get("/user/service", [ClientController::class, "services"]);
    Route::get("/user/service/{service}", [ClientController::class, "showservice"]);
    Route::get("/user/quiz", [ClientController::class, "showquiz"]);
    Route::get("/user/view-question/{quiz}", [ClientController::class, "showquestions"]);
});


Route::post("/login/auth", [Authentication::class, "login"]);
Route::post("/register/auth", [Authentication::class, "register"]);
//

Route::redirect("/","/login");
//
// Route::get('/', function () {
//     return view("admin.index");
// })->name("home")->middleware("auth");



// template
Route::get('/blank', function () {
    return view("sneat.html.blank");
});
Route::get('/auth-index', function () {
    return view("sneat.html.index");
});
Route::get('/auth-forgot', function () {
    return view("sneat.html.auth-forgot-password-basic");
});

Route::get('/auth-login', function () {
    return view("sneat.html.auth-login-basic");
});
Route::get('/auth-register', function () {
    return view("sneat.html.auth-register-basic");
});
Route::get('/auth-extended-ui-scrollbar', function () {
    return view("sneat.html.extended-ui-perfect-scrollbar");
});
Route::get('/auth-extended-text-divider', function () {
    return view("sneat.html.extended-ui-text-divider");
});
Route::get('/auth-form-layout-horinzontal', function () {
    return view("sneat.html.form-layouts-horizontal");
});
Route::get('/auth-form-layouts-vertical', function () {
    return view("sneat.html.form-layouts-vertical");
});
Route::get('/auth-form-basic-inputs', function () {
    return view("sneat.html.forms-basic-inputs");
});
Route::get('/auth-form-input-groups', function () {
    return view("sneat.html.forms-input-groups");
});
Route::get('/auth-icons-boxicons', function () {
    return view("sneat.html.icons-boxicons");
});
Route::get('/auth-layouts', function () {
    return view("sneat.html.layouts-blank");
});
Route::get('/auth-layouts-container', function () {
    return view("sneat.html.layouts-container");
});
Route::get('/auth-layouts-fluid', function () {
    return view("sneat.html.layouts-fluid");
});
Route::get('/auth-layouts-without-menu', function () {
    return view("sneat.html.layouts-without-menu");
});
Route::get('/auth-layouts-without-navbar', function () {
    return view("sneat.html.layouts-without-navbar");
});
Route::get('/auth-pages-account', function () {
    return view("sneat.html.pages-account-settings-account");
});
Route::get('/auth-pages-connection', function () {
    return view("sneat.html.pages-account-settings-connections");
});
Route::get('/auth-pages-notifications', function () {
    return view("sneat.html.pages-account-settings-notifications");
});
Route::get('/auth-error', function () {
    return view("sneat.html.pages-misc-error");
});
Route::get('/auth-maintenance', function () {
    return view("sneat.html.pages-misc-under-maintenance");
});
Route::get('/auth-cards', function () {
    return view("sneat.html.cards-basic");
});
Route::get('/auth-tables', function () {
    return view("sneat.html.tables-basic");
});
Route::get('/auth-accordion', function () {
    return view("sneat.html.ui-accordion");
});
Route::get('/auth-alerts', function () {
    return view("sneat.html.ui-alerts");
});
Route::get('/auth-badges', function () {
    return view("sneat.html.ui-badges");
});
Route::get('/auth-buttons', function () {
    return view("sneat.html.ui-buttons");
});
Route::get('/auth-carousels', function () {
    return view("sneat.html.ui-carousel");
});
Route::get('/auth-collapse', function () {
    return view("sneat.html.ui-collapse");
});
Route::get('/auth-dropdowns', function () {
    return view("sneat.html.ui-dropdowns");
});
Route::get('/auth-footer', function () {
    return view("sneat.html.ui-footer");
});
Route::get('/auth-list-group', function () {
    return view("sneat.html.ui-list-groups");
});
Route::get('/auth-modals', function () {
    return view("sneat.html.ui-modals");
});
Route::get('/auth-navbar', function () {
    return view("sneat.html.ui-navbar");
});
Route::get('/auth-offcanvas', function () {
    return view("sneat.html.ui-offcanvas");
});
Route::get('/auth-pagination', function () {
    return view("sneat.html.ui-pagination-breadcrumbs");
});
Route::get('/auth-progress', function () {
    return view("sneat.html.ui-progress");
});
Route::get('/auth-spinners', function () {
    return view("sneat.html.ui-spinners");
});
Route::get('/auth-tab-pills', function () {
    return view("sneat.html.ui-tabs-pills");
});
Route::get('/auth-toasts', function () {
    return view("sneat.html.ui-toasts");
});
Route::get('/auth-tooltips', function () {
    return view("sneat.html.ui-tooltips-popovers");
});
Route::get('/auth-typography', function () {
    return view("sneat.html.ui-typography");
});

