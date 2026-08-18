# Project Progress

Current Task: TASK-050

Last Completed Task: TASK-049

Status: IN_PROGRESS

## Completed Tasks

- [x] TASK-001 Inspect existing Laravel application
- [x] TASK-002 Create storefront layout
- [x] TASK-003 Add basic storefront routes
- [x] TASK-004 Build home page
- [x] TASK-005 Build About Us page
- [x] TASK-006 Create categories table
- [x] TASK-007 Create Category model
- [x] TASK-008 Create products table
- [x] TASK-009 Create Product model and relationships
- [x] TASK-010 Add ecommerce seed data
- [x] TASK-011 Create shop controller
- [x] TASK-012 Display shop products
- [x] TASK-013 Add product details route
- [x] TASK-014 Build product details page
- [x] TASK-015 Add category filter
- [x] TASK-016 Add product search
- [x] TASK-017 Add customer authentication
- [x] TASK-018 Create customer dashboard
- [x] TASK-019 Implement session cart service
- [x] TASK-020 Add product to cart
- [x] TASK-021 Display shopping cart
- [x] TASK-022 Update cart quantity
- [x] TASK-023 Remove item from cart
- [x] TASK-024 Add cart count to navbar
- [x] TASK-025 Create orders table
- [x] TASK-026 Create order items table
- [x] TASK-027 Create order models
- [x] TASK-028 Build checkout page
- [x] TASK-029 Add checkout validation
- [x] TASK-030 Implement order placement
- [x] TASK-031 Build order confirmation page
- [x] TASK-032 Add customer order list
- [x] TASK-033 Add customer order details
- [x] TASK-034 Add user role
- [x] TASK-035 Add admin middleware
- [x] TASK-036 Create admin layout
- [x] TASK-037 Create admin dashboard
- [x] TASK-038 Show recent admin orders
- [x] TASK-039 Add category listing
- [x] TASK-040 Add category creation
- [x] TASK-041 Add category editing
- [x] TASK-042 Add category deletion
- [x] TASK-043 Add product listing
- [x] TASK-044 Add product creation
- [x] TASK-045 Add product image upload
- [x] TASK-046 Add product editing
- [x] TASK-047 Add product deletion
- [x] TASK-048 Add admin order listing
- [x] TASK-049 Add admin order details

## Remaining Tasks

- [ ] TASK-050 Add order status updates
- [ ] TASK-051 Add customer listing
- [ ] TASK-052 Add customer details
- [ ] TASK-053 Add flash message component
- [ ] TASK-054 Add empty states
- [ ] TASK-055 Improve storefront responsiveness
- [ ] TASK-056 Improve admin responsiveness
- [ ] TASK-057 Review application validation
- [ ] TASK-058 Add custom 404 page
- [ ] TASK-059 Add project README

## Notes

Inspection results (2026-08-16):

- Laravel 13.23.0 skeleton, freshly installed. Only route is `GET /` returning the
  default `welcome` view. No custom controllers, models (besides `User`), or
  ecommerce migrations exist yet.
- Tailwind CSS 4 is already configured via `@tailwindcss/vite` and
  `resources/css/app.css`. No customization has been done yet.
- Migrations present: users, cache, jobs (Laravel defaults only). No categories,
  products, orders, or order_items tables yet.
- No authentication scaffolding (no Breeze/Jetstream/Fortify) is installed;
  TASK-017 will need to add simple Blade-based auth from scratch.
- `node_modules` was not yet installed; Node v25.6.1 / npm v11.9.0 are available
  on the system so `npm install` can be run when frontend asset builds are
  needed.
- Database: the project's `.env` originally pointed at SQLite, but the PHP CLI
  on this machine has no `pdo_sqlite` extension (only `pdo_mysql`). With the
  user's approval, `.env` was updated to use MySQL (`DB_CONNECTION=mysql`,
  database `ecom-nub`) matching the runbook's technology rules. The database
  was created and the default migrations run successfully.
- Git: repository has 2 prior commits (Laravel install, README update). Working
  tree was clean aside from the new `ECOMMERCE_AGENT_RUNBOOK.md`.

TASK-002 (2026-08-16): Added `resources/views/layouts/storefront.blade.php`, a
reusable Blade layout with navbar (Home/Shop/About/Cart), an auth-aware
login/register vs. dashboard area (using `@auth`/`@else`, ready for TASK-017),
a `@yield('content')` main slot, and a footer. Verified with
`php artisan view:cache` (compiles cleanly); no page content or routes were
added yet, per task scope.

TASK-003 (2026-08-16): Added routes for `/` (name `home`), `/shop`, `/about`,
and `/cart` in `routes/web.php`, each with a placeholder Blade view under
`resources/views/storefront/` extending the TASK-002 layout. Ran
`npm install` and `npm run build` (frontend assets had never been built in
this environment, causing a "Vite manifest not found" 500 error) and verified
all four routes return HTTP 200 via `php artisan serve`. The old default
`welcome.blade.php` is no longer routed to but left in place, unused.

TASK-004 (2026-08-16): Built out `resources/views/storefront/home.blade.php`
with a hero section (heading, subtext, Shop Now button linking to `/shop`),
a featured products placeholder grid (4 static cards), a shop-by-category
placeholder grid (4 static tiles), and a promotional banner section. No
database/product data is wired up yet, per task scope. Verified with
`php artisan serve` (HTTP 200 on `/`).

TASK-005 (2026-08-16): Built out `resources/views/storefront/about.blade.php`
with a store introduction, a mission section, and a "why choose us" list.
Verified with `php artisan serve` (HTTP 200 on `/about`).

TASK-006 (2026-08-16): Added `create_categories_table` migration with `name`,
`slug` (unique), `status` (boolean, default true/active), and timestamps.
Ran `php artisan migrate` successfully against the MySQL `ecom-nub` database.

TASK-007 (2026-08-16): Added `app/Models/Category.php` with `name`, `slug`,
`status` fillable (via the `#[Fillable]` attribute, matching the existing
`User` model's style) and a boolean cast for `status`. Verified with
`php artisan tinker` by creating and deleting a test record.

TASK-008 (2026-08-16): Added `create_products_table` migration with
`category_id` (foreign key to `categories`, `restrictOnDelete` so a category
with products can't be deleted at the DB level either, complementing the
app-level check planned for TASK-042), `name`, `slug` (unique), `description`
(nullable text), `price` (decimal 10,2), `stock` (unsigned int), `image`
(nullable string path), `status` (boolean, default active), and timestamps.
Ran `php artisan migrate` successfully.

TASK-009 (2026-08-16): Added `app/Models/Product.php` with fillable fields and
a `category()` belongsTo relationship, and added a `products()` hasMany
relationship on `Category`. Verified both directions with `php artisan
tinker` (created a category + product, read `$product->category->name` and
`$category->products()->count()`, then cleaned up).

TASK-010 (2026-08-16): Added `CategorySeeder` (4 categories: Men's Clothing,
Women's Clothing, Electronics, Home & Living) and `ProductSeeder` (10
realistic dummy products spread across those categories, slugs generated via
`Str::slug`), wired into `DatabaseSeeder`. Verified with
`php artisan migrate:fresh --seed` followed by a tinker check confirming 4
categories, 10 products, and correct category relationships.

TASK-011 (2026-08-16): Added `App\Http\Controllers\ShopController` with an
`index()` method that eager-loads `category` and retrieves active (`status`
= true) products, newest first. Rewired the `/shop` route in `routes/web.php`
to use `ShopController::class, 'index'` instead of the placeholder closure
(the existing `storefront.shop` view still just shows placeholder text for
now; TASK-012 will render the `$products` data). Verified with
`php artisan migrate:fresh --seed` + `php artisan serve` (HTTP 200 on
`/shop`).

TASK-012 (2026-08-16): Updated `resources/views/storefront/shop.blade.php` to
render `$products` in a responsive Tailwind grid (2/3/4 columns), each card
showing an image placeholder (or the stored image via `storage/`), name,
category name, price, and a "View Details" button linking to
`/product/{slug}` (route not wired up until TASK-013, following the same
placeholder-link pattern already used for Login/Register in the layout).
Added an empty-state message for when there are no products. Verified by
requesting `/shop` and confirming all 10 seeded product names and "View
Details" buttons render (HTTP 200).

TASK-013 (2026-08-16): Added `GET /product/{slug}` (name `product.show`)
routed to a new `ShopController::show()` method, which looks up an active
product by slug via `firstOrFail()` (returns 404 for missing/inactive
products). Added a minimal placeholder view
`resources/views/storefront/product-details.blade.php` (heading only, full
layout comes in TASK-014), matching the TASK-003-then-TASK-004 pattern used
for the home page. Updated the shop page's "View Details" links to use the
new named route. Verified: existing slug returns HTTP 200, nonexistent slug
returns HTTP 404.

TASK-014 (2026-08-16): Built out
`resources/views/storefront/product-details.blade.php` with a two-column
layout: image (or placeholder), category, name, price, description, stock
availability message (in stock w/ count, or out-of-stock in red with
disabled controls), a quantity input (`min=1`, `max=$product->stock`), and
an Add to Cart button. The form posts to a plain `/cart/add/{id}` URL (not a
named route, since the cart route doesn't exist until TASK-020) and is not
wired to any handler yet, per task scope. Verified with `php artisan serve`
(HTTP 200, all key elements present in the rendered HTML).

TASK-015 (2026-08-16): Added server-side category filtering to
`ShopController::index()` via `?category=<slug>` (uses `whereHas` against the
`category` relationship, applied only `when($request->filled('category'))`
so the plain listing is unaffected). Added an "All" + per-category filter
pill row to the shop page, highlighting the active filter. Verified:
`/shop` still returns all 10 products, `/shop?category=electronics` returns
only the 3 electronics products, and `/shop?category=does-not-exist` shows
the empty state — all HTTP 200.

TASK-016 (2026-08-16): Added `?search=` support to `ShopController::index()`
(a `where('name', 'like', '%...%')` clause, applied only
`when($request->filled('search'))`, combined with the existing category
`when()` clause so both filters AND together). Added a search box to the
shop page that preserves the active category as a hidden field, and updated
the category filter pills to preserve the active search term via
`array_filter()` on the route params. Verified: `?search=earbuds` returns 1
matching product, `?search=shirt&category=electronics` returns the empty
state (no shirts in Electronics), and `?search=shirt&category=mens-clothing`
returns 1 matching product (the T-Shirt) — all HTTP 200.

TASK-017 (2026-08-16): No auth scaffolding existed (confirmed in TASK-001), so
built simple Blade-based auth by hand rather than pulling in a starter kit.
Added `App\Http\Controllers\Auth\AuthController` (`showRegister`, `register`,
`showLogin`, `login`, `logout`) using Laravel's built-in `Auth`/`Hash`
facades and validation (`unique` email, `min:8` + `confirmed` password on
register). Added `resources/views/auth/register.blade.php` and
`login.blade.php` extending the storefront layout. Added routes: `GET|POST
/register`, `GET|POST /login` (behind the `guest` middleware) and `POST
/logout` (behind `auth`). Updated the layout's navbar to use the new named
routes and added a working logout form/button next to the auth-only
Dashboard link. Verified the full flow manually with `curl` + a cookie jar:
register creates a user and logs them in, login succeeds with correct
credentials and fails with a clear error on wrong credentials, logout clears
the session (navbar reverts to Login/Register), and `/register` redirects
away (302) when already authenticated. Test user cleaned up afterward.

TASK-018 (2026-08-16): Added `App\Http\Controllers\DashboardController` with
an `index()` method passing the authenticated user to a new
`resources/views/storefront/dashboard.blade.php` view (welcome message,
account information card, and a My Orders card linking to the not-yet-built
`/my-orders`, TASK-032). Added `GET /dashboard` (name `dashboard`) inside the
existing `auth` middleware group, and pointed the layout's Dashboard link at
the named route. Verified: guest requests to `/dashboard` get a 302 redirect
(to login), authenticated requests get HTTP 200 with the user's name and
account details rendered.

TASK-019 (2026-08-16): Added `app/Services/CartService.php`, a session-based
cart (no `carts` table). Cart data is stored as a simple `product_id =>
quantity` array under the `cart` session key; product IDs are the source of
truth and `items()` always re-fetches products from the database (so price,
name, and stock reflect current data, not stale cached values) to build
`['product' => Product, 'quantity' => int, 'subtotal' => float]` rows.
Methods: `add()` (increments), `update()` (sets exact quantity),
`remove()`, `clear()`, `items()`, `count()`, `total()`. Not wired to any
controller/route yet, per task scope (TASK-020 connects the Add to Cart
button). Verified via a temporary route exercising add/update/remove/total,
confirmed correct totals and counts, then removed the temporary route before
committing.

TASK-020 (2026-08-16): Added `App\Http\Controllers\CartController@add`
(`POST /cart/add/{product}`, name `cart.add`), which validates `quantity`
(`required|integer|min:1`), checks the product is active and that the
existing cart quantity plus the new request doesn't exceed `stock` (rejecting
with a flashed `error` message if so), then calls `CartService::add()` (which
already increments if the product is present) and flashes a `success`
message. Wired the product-details Add to Cart form to the new named route
and added a `@error('quantity')` message under it. Added a minimal
session-flash `success`/`error` banner to the storefront layout so feedback
is visible now (a fuller reusable flash component is still planned for
TASK-053). Verified via `curl` with a cookie jar and CSRF token: adding
within stock succeeds and shows the success message, requesting more than
available stock is rejected with the exact remaining count, and an invalid
quantity (0) redirects back with the "must be at least 1" validation
message rendered on the page.

TASK-021 (2026-08-16): Added `CartController::index()` (uses
`CartService::items()`/`total()`) and rewired `GET /cart` to it instead of
the placeholder closure. Built out `resources/views/storefront/cart.blade.php`
with a table showing each item's image/placeholder, name, price, a quantity
update form, subtotal, and a remove form, plus a total and Checkout button.
The update/remove forms post to plain `/cart/update/{id}` and
`/cart/remove/{id}` URLs (not named routes yet — TASK-022/023 add those
controller actions) and Checkout links to a plain `/checkout` URL (TASK-028).
Verified: an empty cart shows the empty-state message, and after adding a
product via `/cart/add/{id}`, the cart page (HTTP 200) shows the product
name, Update button, Remove button, and Total.

TASK-022 (2026-08-16): Added `CartController::update()`
(`POST /cart/update/{product}`, name `cart.update`), validating `quantity`
as `required|integer|min:1|max:{stock}` before calling
`CartService::update()`. Wired the cart page's per-item update form to the
new named route. Verified: updating a cart item's quantity to a valid value
(10, within the 60-unit stock) correctly changes the displayed quantity and
recalculates the total (to $499.90), while an out-of-range update (999)
fails validation (302 back) and leaves the quantity unchanged.

TASK-023 (2026-08-16): Added `CartController::remove()`
(`POST /cart/remove/{product}`, name `cart.remove`), calling
`CartService::remove()` and redirecting to the cart page with a flashed
success message. Wired the cart page's per-item remove form to the new named
route. Verified: removing the only item in the cart shows the "was removed
from your cart" message and the empty-cart state, both on the same page load.

TASK-024 (2026-08-16): Added a `View::composer('layouts.storefront', ...)` in
`AppServiceProvider::boot()` that shares a `cartCount` variable (from
`CartService::count()`) with the storefront layout on every request — a
single, reusable point rather than passing it from every controller. Updated
both the desktop and mobile Cart nav links to show a small rounded badge
with the count when it's greater than 0. Verified: badge is absent (0
matches) with an empty cart, and shows "4" in both navs after adding 4 units
of a product.

TASK-025 (2026-08-16): Added `create_orders_table` migration with `user_id`
(FK to `users`, cascade on delete), `order_number` (unique), `customer_name`,
`phone`, `email`, `address` (text), `subtotal` and `total` (decimal 10,2),
an `status` enum (`pending`/`processing`/`completed`/`cancelled`, default
`pending`), and timestamps. Ran `php artisan migrate` successfully.

TASK-026 (2026-08-16): Added `create_order_items_table` migration with
`order_id` (FK to `orders`, cascade on delete), `product_id` (nullable FK to
`products`, `nullOnDelete` — order item history is preserved via the
denormalized `product_name`/`price` columns even if the product is later
deleted, per TASK-047's requirement not to break order history),
`product_name`, `price` (decimal 10,2), `quantity` (unsigned int), `subtotal`
(decimal 10,2), and timestamps. Ran `php artisan migrate` successfully.

TASK-027 (2026-08-16): Added `app/Models/Order.php` (`user()` belongsTo,
`items()` hasMany OrderItem) and `app/Models/OrderItem.php` (`order()`
belongsTo, `product()` belongsTo), each with fillable fields and decimal/int
casts matching their migrations. Added the inverse `orders()` hasMany
relationship on `User`. Verified all five relationships plus the
`order_id` cascade-delete with `php artisan tinker`: created a user's order
with one item, confirmed `$user->orders()->count()`, `$order->user->name`,
`$order->items()->count()`, `$item->order->id`, and `$item->product->name`
all resolve correctly, then deleted the order and confirmed the order item
was cascade-deleted too.

TASK-028 (2026-08-16): Added `App\Http\Controllers\CheckoutController::index()`
and `GET /checkout` (name `checkout`, inside the existing `auth` middleware
group). Built `resources/views/storefront/checkout.blade.php`: a delivery
details form (full name/email pre-filled from the logged-in user, phone,
address, a disabled "Cash on Delivery" radio as the only payment option) next
to an order summary (per-item name/qty/subtotal, subtotal, total) and a
Place Order button. The form posts to a plain `/checkout` URL (no `POST`
route yet — TASK-030 implements order placement) and doesn't create an order,
per task scope. Also updated the cart page's Checkout link and the cart's
Total/Checkout section to use the new named `checkout` route. Verified: guest
requests to `/checkout` get a 302 redirect, an authenticated user with an
empty cart sees the empty-state message (curl), and — after a curl-based CSRF
check turned out to be a cookie-jar/session-replay artifact of the testing
tool rather than a real bug (confirmed by writing a temporary
`RefreshDatabase` feature test against a throwaway `ecom-nub-testing` MySQL
database, since the default in-memory SQLite test config isn't usable here
without `pdo_sqlite`) — a `actingAs()` feature test confirmed an authenticated
user can add a product to the cart and see it correctly rendered on the
checkout page. The temporary test file and test database were removed after
verification; only the checkout controller/view/routes are committed.

TASK-029 (2026-08-16): Added `CheckoutController::store()` and
`POST /checkout` (name `checkout.store`, inside the `auth` group), validating
`customer_name`, `email`, `phone`, and `address` as required fields (email
also validated as a proper email address). On success it currently just
redirects back with a placeholder success message — TASK-030 will replace
that body with real order creation. Wired the checkout form to the new named
route and added `@error` messages under each field. Verified with a
temporary `RefreshDatabase` feature test (same throwaway
`ecom-nub-testing` MySQL database/technique as TASK-028, removed afterward):
submitting empty fields produces validation errors on all four fields, and
submitting valid data passes validation with no errors.

TASK-030 (2026-08-16): Implemented full order placement in
`CheckoutController::store()`. After field validation, checks the cart isn't
empty (redirects to cart with an error if so), then runs everything else
inside a `DB::transaction()`: re-fetches the cart's products with
`lockForUpdate()` (guards against a race with a concurrent purchase of the
same stock), re-validates each is active and has enough stock (throwing a
`RuntimeException` — which rolls back the transaction — with a clear message
if not), computes the subtotal server-side from the locked product prices
(never trusting client-submitted totals), creates the `Order`
(`status: pending`, a unique `ORD-YYYYMMDD-XXXXXX` order number generated by
a small uniqueness-checking loop) and its `OrderItem` rows, and decrements
each product's `stock`. On success, clears the session cart and redirects to
a new `GET /order-confirmation/{order}` route (name `order.confirmation`,
`auth` group) backed by `OrderController::confirmation()`, which 404s if the
order doesn't belong to the current user. Added a minimal placeholder
`storefront.order-confirmation.blade.php` view (full build-out is TASK-031).
Verified with a temporary `RefreshDatabase` feature test suite (same
throwaway `ecom-nub-testing` MySQL database/technique used for TASK-028/029,
removed afterward) covering: successful placement (correct order number
format, status, item count, total, and stock decrement), cart clearing,
rejection when stock is insufficient (no order created, stock untouched),
rejection when the cart is empty, and that another user gets a 404 when
requesting someone else's confirmation page — all 5 tests passed.

TASK-031 (2026-08-16): Built out
`resources/views/storefront/order-confirmation.blade.php` with a success
message/icon, an order details card (order number, customer name, status,
total), a Continue Shopping button (to `/shop`), and a My Orders button (to
the not-yet-built `/my-orders`, TASK-032). Per-user access was already
enforced in TASK-030's `OrderController::confirmation()` (404s if the order
doesn't belong to the requesting user). Verified with a temporary
`RefreshDatabase` feature test (same throwaway test-database technique,
removed afterward): after placing an order, the confirmation page renders
the correct order number, customer name, status, and total, and both
buttons are present.

TASK-032 (2026-08-16): Added `OrderController::index()`
(`$request->user()->orders()->latest()->get()`) and `GET /my-orders` (name
`orders.index`, `auth` group). Built
`resources/views/storefront/orders/index.blade.php`: a table of order
number/date/total/status/View-button rows, plus an empty state ("You
haven't placed any orders yet") with a link to the shop. Updated the
dashboard and order-confirmation pages' "My Orders" links to the new named
route. Verified with a temporary `RefreshDatabase` feature test (removed
afterward): a user only sees their own order number and not another user's,
the empty state renders for a user with no orders, and a guest is redirected
to `/login`.

TASK-033 (2026-08-16): Added `OrderController::show()` (`GET
/my-orders/{order}`, name `orders.show`, `auth` group), extracting the
ownership check from `confirmation()` into a shared private
`authorizeOwner()` helper (both now 404 for non-owners). Built
`resources/views/storefront/orders/show.blade.php`: order number, date,
status, a delivery-information card (name/phone/email/address), an
order-total card (subtotal/total), and a products table (using the
order item's denormalized `product_name`/`price`, not a live relationship
load, so history stays correct even if a product is later edited or
deleted). Updated the My Orders list's View link to the new named route.
Verified with a temporary `RefreshDatabase` feature test (removed
afterward): the order's owner sees the order number, product name, address,
and total on their own order page, while another authenticated user
requesting the same order gets a 404.

TASK-034 (2026-08-16): Added a migration adding an `enum('role', ['customer',
'admin'])` column to `users`, defaulting to `customer`. Deliberately did
*not* add `role` to `User`'s `#[Fillable]` list — it must never be
mass-assignable (e.g. from the registration form), only set directly by
trusted code (an admin action, a seeder) — and added a `User::isAdmin()`
helper for use by the admin middleware in TASK-035. Ran `php artisan
migrate` successfully. Verified via tinker: new/existing users default to
`role = customer`, `isAdmin()` returns the expected boolean when `role` is
set directly on the model, and — confirming the mass-assignment guard works
— calling `$user->update(['role' => 'admin'])` is silently ignored since
`role` isn't fillable.

TASK-035 (2026-08-16): Added `App\Http\Middleware\EnsureUserIsAdmin`, which
aborts with a 403 if there's no authenticated user or
`! $request->user()->isAdmin()`, and registered it as the `admin` middleware
alias in `bootstrap/app.php`. No admin routes exist yet (TASK-036+ build the
admin panel), so nothing currently uses this alias. Verified with a
temporary route (`/_test-admin` behind `['auth', 'admin']`) and a temporary
`RefreshDatabase` feature test, both removed afterward: a plain customer
gets a 403, a user with `role = admin` gets through (200), and a guest is
redirected to `/login` (the `auth` middleware runs first).

TASK-036 (2026-08-16): Added `resources/views/layouts/admin.blade.php`: a
dark sidebar (Dashboard/Products/Categories/Orders/Customers, then a
divider with View Store and a working Logout form) next to a main content
area with a page-title header and the same session success/error banner
pattern used in the storefront layout. Sidebar links to not-yet-built admin
pages use plain `/admin/...` URLs (routes come in TASK-037+); View Store and
Logout use the existing named routes. No page content or admin routes were
added yet, per task scope. Verified with a temporary child view + route
(both removed afterward): the layout compiles and renders all sidebar
items, the page title, and the yielded content correctly.

TASK-037 (2026-08-16): Added `App\Http\Controllers\Admin\DashboardController`
and a new `admin` route group (`Route::middleware(['auth',
'admin'])->prefix('admin')->name('admin.')`) with `GET /admin` (name
`admin.dashboard`) as its first route. Built
`resources/views/admin/dashboard.blade.php` with four stat cards (Total
Products, Categories, Orders, Customers — customers counted as `role =
customer` only, matching TASK-051's admin customer listing scope) on the
admin layout. Updated the admin layout's Dashboard sidebar link to the new
named route. Verified with a temporary `RefreshDatabase` feature test
(removed afterward): an admin sees the correct counts (2 products, 1
category, 0 orders, 2 customers) and a plain customer gets a 403.

TASK-038 (2026-08-16): Added a "Recent Orders" table to the admin dashboard
showing the latest 5 orders (order number, customer, total, status, date).
The controller originally used `Order::latest()->take(5)` (sorts by
`created_at`), but a feature test creating several orders in fast succession
exposed that MySQL's `datetime` columns only have second-level precision —
orders placed within the same second tie and sort unpredictably. Changed to
`Order::latest('id')->take(5)`, since the auto-increment `id` is a strictly
monotonic, unambiguous proxy for insertion order (a real correctness fix,
not just a test workaround — the same tie could occur in production with two
near-simultaneous checkouts). Verified with a temporary `RefreshDatabase`
feature test (removed afterward): with 7 orders created, the dashboard shows
exactly the 5 most recently created and hides the 2 oldest.

TASK-039 (2026-08-16): Added `App\Http\Controllers\Admin\CategoryController::index()`
and `GET /admin/categories` (name `admin.categories.index`). Built
`resources/views/admin/categories/index.blade.php`: a table of
ID/name/slug/status (Active/Inactive badge), Edit link, and Delete button
per row, plus an empty state and an "Add Category" link — Edit/Add link to
not-yet-built `/admin/categories/...` URLs and Delete is a non-functional
placeholder button, per task scope (TASK-040/041/042 wire these up). Updated
the admin layout's Categories sidebar link to the new named route. Verified
with a temporary `RefreshDatabase` feature test (removed afterward): an
admin sees both an active and inactive category with correct badges and the
Edit/Delete controls, and a plain customer gets a 403.

TASK-040 (2026-08-16): Added `CategoryController::create()`/`store()` and
`GET /admin/categories/create` + `POST /admin/categories` (names
`admin.categories.create`/`store`). Validates `name` (required) and `status`
(required boolean); generates the slug automatically via a private
`uniqueSlug()` helper (`Str::slug()`, appending `-1`, `-2`, ... on collision
so two categories can share a name without a duplicate-slug DB error). Built
`resources/views/admin/categories/create.blade.php` (name field, Active/
Inactive select, Save/Cancel). Wired the index page's "Add Category" link to
the new route. Verified with a temporary `RefreshDatabase` feature test
(removed afterward): creating "Sports & Outdoors" produces slug
`sports-outdoors`; creating "Electronics" twice produces `electronics` and
`electronics-1`; a missing `name` fails validation and creates no record;
and a plain customer gets a 403.

TASK-041 (2026-08-16): Added `CategoryController::edit()`/`update()` and
`GET /admin/categories/{category}/edit` + `PUT /admin/categories/{category}`
(names `admin.categories.edit`/`update`). Extended `uniqueSlug()` with an
optional `$ignoreId` so re-saving a category under its own existing slug
doesn't collide with itself; the slug is only regenerated when the
submitted name actually differs from the current one, otherwise it's left
untouched. Built `resources/views/admin/categories/edit.blade.php`
(pre-filled name/status form). Wired the index page's Edit link to the new
route. Verified with a temporary `RefreshDatabase` feature test (removed
afterward): changing the name updates the slug; keeping the name unchanged
(only toggling status) leaves the slug alone; renaming a category to collide
with a different existing category's name correctly produces a
disambiguated slug (`home-1`); a missing `name` fails validation without
touching the record; and a plain customer gets a 403.

TASK-042 (2026-08-16): Added `CategoryController::destroy()` and `DELETE
/admin/categories/{category}` (name `admin.categories.destroy`). Blocks
deletion (flashing a clear error, no exception) if `$category->products()
->exists()`, matching the DB-level `restrictOnDelete()` foreign key from
TASK-008 as a second, more user-friendly layer of protection. Wired the
index page's Delete button into a real form with a confirm-dialog
`onsubmit`, using Blade's `@js()` directive to safely embed the category
name in the JS string (verified it correctly escapes an apostrophe-bearing
name like "O'Brien's Picks" to `'`-encoded sequences rather than
letting the apostrophes break out of the quoted JS literal). Verified with a temporary `RefreshDatabase` feature
test (removed afterward): a category with no products deletes successfully,
a category with a product is rejected with a flashed error and stays in the
database, and a plain customer gets a 403.

TASK-043 (2026-08-16): Added `App\Http\Controllers\Admin\ProductController::index()`
(eager-loads `category`) and `GET /admin/products` (name
`admin.products.index`). Built `resources/views/admin/products/index.blade.php`:
a table of image/name/category/price/stock/status (Active/Inactive badge),
Edit link, and Delete button per row, plus an empty state and an "Add
Product" link — Edit/Add/Delete are placeholders for now (TASK-044/046/047
wire these up), following the same pattern as the category listing. Updated
the admin layout's Products sidebar link to the new named route. Verified
with a temporary `RefreshDatabase` feature test (removed afterward): an
admin sees both an active and inactive product with correct name, category,
price, and status badges, and a plain customer gets a 403.

TASK-044 (2026-08-16): Added `ProductController::create()`/`store()` and
`GET /admin/products/create` + `POST /admin/products` (names
`admin.products.create`/`store`). Validates `category_id` (must exist),
`name`, `description` (nullable), `price` (numeric, min 0), `stock`
(integer, min 0), `status` (boolean); generates a unique slug the same way
as categories (a private `uniqueSlug()` helper on this controller — kept
separate rather than shared, since it's a small, self-contained routine and
sharing it would mean introducing a cross-controller dependency for a few
lines). No image upload yet, per task scope (TASK-045). Built
`resources/views/admin/products/create.blade.php` (category select,
name, description, price/stock, status, Save/Cancel). Wired the index
page's "Add Product" link to the new route. Verified with a temporary
`RefreshDatabase` feature test (removed afterward): creating a product
generates the correct slug and stores all fields correctly; two products
named "Widget" get `widget` and `widget-1`; an invalid category ID plus
negative price/stock all fail validation with zero products created; and a
plain customer gets a 403.

TASK-045 (2026-08-16): Ran `php artisan storage:link` (the
`public/storage` → `storage/app/public` symlink didn't exist yet in this
environment; already correctly gitignored via the default `/public/storage`
entry). Added an `image` field to `ProductController::store()`'s validation
(`nullable|image|mimes:jpg,jpeg,png,webp|max:2048` — 2MB cap) and, when a
file is present, stores it via `$request->file('image')->store('products',
'public')` and saves the returned relative path on the product (the admin
product listing already displays it via `asset('storage/'.$product->image)`
from TASK-043). Added a file input with `enctype="multipart/form-data"` to
the create form. Verified with a temporary `RefreshDatabase` feature test
using `Storage::fake('public')` (removed afterward): a valid JPG upload is
stored and its path both saved on the product and rendered on the listing
page; a `.pdf` upload is rejected by the `mimes` rule; a 3MB image is
rejected by the `max:2048` rule; and submitting the form with no file at
all still creates the product fine with `image` left `null`.

TASK-046 (2026-08-16): Added `ProductController::edit()`/`update()` and
`GET /admin/products/{product}/edit` + `PUT /admin/products/{product}`
(names `admin.products.edit`/`update`). Same validation as creation, plus:
if no new `image` file is submitted, the existing `image` path is left
untouched; if a new file is submitted, the old file is deleted from the
`public` disk before the new one is stored, so replacing an image doesn't
leave orphaned files behind. Slug regeneration reuses the same
change-only-if-name-differs logic as category editing. Built
`resources/views/admin/products/edit.blade.php` (pre-filled fields, current
image preview, a "Replace Image" file input). Wired the index page's Edit
link to the new route. Verified with a temporary `RefreshDatabase` feature
test using `Storage::fake('public')` (removed afterward): editing without a
new image preserves the existing image path and file; uploading a new image
deletes the old file and stores/saves the new one; a missing `name` fails
validation without changing the record; and a plain customer gets a 403.

TASK-047 (2026-08-16): Added `ProductController::destroy()` and `DELETE
/admin/products/{product}` (name `admin.products.destroy`). Deletes the
product's image file from the `public` disk (if any) before deleting the
product row; order history is preserved because `order_items.product_id` is
`nullOnDelete` (TASK-026) and the item's `product_name`/`price` are already
denormalized, so past orders keep displaying correctly even after the
product is gone. Wired the index page's Delete button into a real form with
a `@js()`-escaped confirm dialog, same pattern as category deletion.
Verified with a temporary `RefreshDatabase` feature test using
`Storage::fake('public')` (removed afterward): deleting a product removes
its image file from disk; deleting a product that appears in a placed order
leaves the order item's `product_name`/`price` intact (just nulls
`product_id`) and the customer's order-details page still renders correctly
afterward; and a plain customer gets a 403.

TASK-048 (2026-08-16): Added `App\Http\Controllers\Admin\OrderController::index()`
(`Order::latest('id')->get()`, newest first — using `id` rather than
`created_at` for the same tie-breaking reason established in TASK-038) and
`GET /admin/orders` (name `admin.orders.index`). Built
`resources/views/admin/orders/index.blade.php`: a table of order
number/customer/date/total/status/View-button rows, plus an empty state.
View links to a not-yet-built `/admin/orders/{id}` URL (TASK-049). Updated
the admin layout's Orders sidebar link to the new named route. Verified
with a temporary `RefreshDatabase` feature test (removed afterward): two
orders render with the most recently created one first, and a plain
customer gets a 403.

TASK-049 (2026-08-16): Added `OrderController::show()` (eager-loads `items`
and `user`) and `GET /admin/orders/{order}` (name `admin.orders.show`). Built
`resources/views/admin/orders/show.blade.php`: order number/date/status,
a customer-information card (showing both the linked user account's
name/email and the order's own snapshot name/email/phone — useful since an
order's contact details are captured at checkout time and could differ from
the account's current profile), a delivery-address + totals card, and a
products table. No status-update control yet (TASK-050). Updated the order
listing's View link to the new named route. Verified with a temporary
`RefreshDatabase` feature test (removed afterward): an admin sees the order
number, both the account and order-snapshot customer details, address,
product line, total, and status; a plain customer gets a 403.
