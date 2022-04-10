<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();

/* Dashboard */
Route::get('/', [HomeController::class, "index"]) -> name("dashboard");
Route::post("/change-password", [HomeController::class, "ChangePassword"]) -> name("change_password");
/* End Dashboard */

/* Order Detail */
Route::get("/order-detail", [OrderDetailController::class, "OrderDetailHome"]) -> name("order_detail_home");
Route::get("/view-order-detail/{id}", [OrderDetailController::class, "View"]) -> name("view_order_detail");
Route::post("/order-detail", [OrderDetailController::class, "Create"]) -> name("create_order_detail");
Route::get("/edit-order-detail/{id}", [OrderDetailController::class, "Edit"]) -> name("edit_order_detail");
Route::post("/update-order-detail", [OrderDetailController::class, "Update"]) -> name("update_order_detail");
Route::get("/remove-order-detail/{id}", [OrderDetailController::class, "Remove"]) -> name("remove_order_detail");
Route::post("/delete-order-detail", [OrderDetailController::class, "Delete"]) -> name("delete_order_detail");
Route::get("/search-order-detail", [OrderDetailController::class, "OrderDetailHome"]) -> name("search_order_detail");
/* End Order Detail */

/* Order */
Route::get("/order", [OrderController::class, "OrderHome"]) -> name("order_home");
Route::get("/view-order/{id}", [OrderController::class, "View"]) -> name("view_order");
Route::post("/order", [OrderController::class, "Create"]) -> name("create_order");
Route::get("/edit-order/{id}", [OrderController::class, "Edit"]) -> name("edit_order");
Route::post("/update-order", [OrderController::class, "Update"]) -> name("update_order");
Route::get("/remove-order/{id}", [OrderController::class, "Remove"]) -> name("remove_order");
Route::post("/delete-order", [OrderController::class, "Delete"]) -> name("delete_order");
Route::get("/search-order", [OrderController::class, "OrderHome"]) -> name("search_order");
/* End Order */

/* Item */
Route::get("/item", [ItemController::class, "ItemHome"]) -> name("item_home");
Route::get("/view-item/{id}", [ItemController::class, "View"]) -> name("view_item");
Route::post("/item", [ItemController::class, "Create"]) -> name("create_item");
Route::get("/edit-item/{id}", [ItemController::class, "Edit"]) -> name("edit_item");
Route::post("/update-item", [ItemController::class, "Update"]) -> name("update_item");
Route::get("/remove-item/{id}", [ItemController::class, "Remove"]) -> name("remove_item");
Route::post("/delete-item", [ItemController::class, "Delete"]) -> name("delete_item");
Route::get("/search-item", [ItemController::class, "ItemHome"]) -> name("search_item");
/* End Item */

/* Table */
Route::get("/table", [TableController::class, "TableHome"]) -> name("table_home");
Route::get("/view-table/{id}", [TableController::class, "View"]) -> name("view_table");
Route::post("/table", [TableController::class, "Create"]) -> name("create_table");
Route::get("/edit-table/{id}", [TableController::class, "Edit"]) -> name("edit_table");
Route::post("/update-table", [TableController::class, "Update"]) -> name("update_table");
Route::get("/remove-table/{id}", [TableController::class, "Remove"]) -> name("remove_table");
Route::post("/delete-table", [TableController::class, "Delete"]) -> name("delete_table");
Route::get("/search-table", [TableController::class, "TableHome"]) -> name("search_table");
/* End Table */

//Category
Route::get("/category", [CategoryController::class, "CategoryHome"]) -> name("category_home");
Route::get("/view-category/{id}", [CategoryController::class, "View"]) -> name("view_category");
Route::post("/category", [CategoryController::class, "Create"]) -> name("create_category");
Route::get("/edit-category/{id}", [CategoryController::class, "Edit"]) -> name("edit_category");
Route::post("/update-category", [CategoryController::class, "Update"]) -> name("update_category");
Route::get("/remove-category/{id}", [CategoryController::class, "Remove"]) -> name("remove_category");
Route::post("/delete-category", [CategoryController::class, "Delete"]) -> name("delete_category");
Route::get("/search-category", [CategoryController::class, "CategoryHome"]) -> name("search_category");
//End Category

//Employee
Route::get("/employee", [EmployeeController::class, "EmployeeHome"]) -> name("employee_home");
Route::get("/view-employee/{id}", [EmployeeController::class, "View"]) -> name("view_employee");
Route::post("/employee", [EmployeeController::class, "Create"]) -> name("create_employee");
Route::post("/user", [UserController::class, "Create"]) -> name("create_employee_without_admin");
Route::get("/edit-employee/{id}", [EmployeeController::class, "Edit"]) -> name("edit_employee");
Route::post("/update-employee", [EmployeeController::class, "Update"]) -> name("update_employee");
Route::get("/remove-employee/{id}", [EmployeeController::class, "Remove"]) -> name("remove_employee");
Route::post("/delete-employee", [EmployeeController::class, "Delete"]) -> name("delete_employee");
Route::get("/search-employee", [EmployeeController::class, "EmployeeHome"]) -> name("search_employee");
//End Employee