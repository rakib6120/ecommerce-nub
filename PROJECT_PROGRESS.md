# Project Progress

Current Task: TASK-024

Last Completed Task: TASK-023

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

## Remaining Tasks

- [ ] TASK-024 Add cart count to navbar
- [ ] TASK-025 Create orders table
- [ ] TASK-026 Create order items table
- [ ] TASK-027 Create order models
- [ ] TASK-028 Build checkout page
- [ ] TASK-029 Add checkout validation
- [ ] TASK-030 Implement order placement
- [ ] TASK-031 Build order confirmation page
- [ ] TASK-032 Add customer order list
- [ ] TASK-033 Add customer order details
- [ ] TASK-034 Add user role
- [ ] TASK-035 Add admin middleware
- [ ] TASK-036 Create admin layout
- [ ] TASK-037 Create admin dashboard
- [ ] TASK-038 Show recent admin orders
- [ ] TASK-039 Add category listing
- [ ] TASK-040 Add category creation
- [ ] TASK-041 Add category editing
- [ ] TASK-042 Add category deletion
- [ ] TASK-043 Add product listing
- [ ] TASK-044 Add product creation
- [ ] TASK-045 Add product image upload
- [ ] TASK-046 Add product editing
- [ ] TASK-047 Add product deletion
- [ ] TASK-048 Add admin order listing
- [ ] TASK-049 Add admin order details
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
