# Basic E-Commerce Web Application

A basic ecommerce web application developed using Laravel 13, MySQL, Blade, Tailwind CSS, and Alpine.js.

The system allows customers to browse products, manage their shopping cart, place orders, and view their order history. It also includes an admin panel for managing products, categories, inventory, customers, and orders.

## Student Information

* **Name:** Rakib Hossain
* **Student ID:** 41240102110
* **GitHub Repository:** https://github.com/rakib6120/ecommerce-nub

## Project Overview

This project is a basic ecommerce platform designed for academic purposes.

The application contains two primary user roles:

### Customer

Customers can:

* Register and log in
* Browse available products
* Search and filter products
* View product details
* Select product size or color
* Add products to the shopping cart
* Update cart quantities
* Remove products from the cart
* Place orders
* View previous orders
* Manage profile and delivery information

### Administrator

Administrators can:

* Access the admin dashboard
* Manage product categories
* Add, update, and delete products
* Manage product images
* Manage product variants
* Update product stock
* View customer information
* Manage customer orders
* Update order status
* Manage coupons and discounts
* View basic sales information

## Tools and Technologies

### Laravel 13

Laravel is used as the main backend framework.

It handles:

* Application routing
* Authentication
* Authorization
* Business logic
* Form validation
* Database operations
* Cart management
* Order processing
* File uploads
* Email notifications

### MySQL

MySQL is used as the relational database management system.

It stores:

* Users
* Categories
* Products
* Product variants
* Product images
* Shopping carts
* Orders
* Order items
* Payments
* Reviews
* Inventory information

### Blade

Blade is Laravel's server-side templating engine.

It is used to create:

* Main layouts
* Navigation bars
* Product pages
* Cart pages
* Checkout pages
* Customer dashboard
* Admin dashboard

### Tailwind CSS

Tailwind CSS is used for designing and styling the user interface.

It provides:

* Responsive layouts
* Product grids
* Forms
* Buttons
* Tables
* Navigation menus
* Status badges
* Mobile-friendly designs

### Alpine.js

Alpine.js is used to provide lightweight frontend interactivity.

It is used for:

* Dropdown menus
* Mobile navigation
* Product image galleries
* Product quantity controls
* Modal windows
* Cart drawers
* Size and color selection
* Confirmation messages

### Vite

Vite is used to compile and bundle the project's CSS and JavaScript files.

### Git and GitHub

Git is used for version control, while GitHub is used to store and manage the project repository.

## Main Features

### Authentication

* Customer registration
* Customer login
* Customer logout
* Password reset
* Profile management
* Admin authentication

### Product Management

* Product listing
* Product details
* Product categories
* Product images
* Product variants
* Product pricing
* Product stock management
* Featured products
* Active and inactive product status

### Search and Filtering

Customers can search and filter products using:

* Product name
* Category
* Price range
* Size
* Color
* Availability

### Shopping Cart

* Add products to cart
* Update product quantity
* Remove products from cart
* Calculate subtotal
* Calculate delivery charge
* Calculate discount
* Calculate final total

### Checkout

The checkout process includes:

* Customer information
* Phone number
* Email address
* Delivery address
* City and area
* Customer notes
* Delivery charge
* Payment method
* Order confirmation

### Order Management

Available order statuses may include:

* Pending
* Confirmed
* Processing
* Shipped
* Delivered
* Cancelled
* Returned

Available payment statuses may include:

* Unpaid
* Pending
* Paid
* Failed
* Refunded

### Inventory Management

* Track available product stock
* Reduce stock after order placement
* Restore stock after eligible order cancellation
* Prevent customers from ordering unavailable quantities
* Display low-stock products in the admin panel

### Admin Dashboard

The admin dashboard may display:

* Total products
* Total customers
* Total orders
* Pending orders
* Delivered orders
* Total sales
* Recent orders
* Low-stock products

## Project Requirements

Before installing the project, make sure the following software is installed:

* PHP 8.3 or later
* Composer
* MySQL
* Node.js
* NPM
* Git

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/rakib6120/ecommerce-nub.git
```

### 2. Enter the Project Directory

```bash
cd ecommerce-nub
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install Frontend Dependencies

```bash
npm install
```

### 5. Create the Environment File

```bash
cp .env.example .env
```

For Windows Command Prompt:

```bash
copy .env.example .env
```

### 6. Generate the Application Key

```bash
php artisan key:generate
```

### 7. Configure the Database

Open the `.env` file and update the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_nub
DB_USERNAME=root
DB_PASSWORD=
```

Create a MySQL database named:

```text
ecommerce_nub
```

### 8. Run Database Migrations

```bash
php artisan migrate
```

To migrate the database and insert sample data:

```bash
php artisan migrate --seed
```

### 9. Create the Storage Link

```bash
php artisan storage:link
```

This command makes uploaded product images publicly accessible.

### 10. Start the Laravel Development Server

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

### 11. Start the Vite Development Server

Open another terminal and run:

```bash
npm run dev
```

## Production Build

To compile frontend assets for production, run:

```bash
npm run build
```

## Common Development Commands

Run the Laravel application:

```bash
php artisan serve
```

Run frontend development assets:

```bash
npm run dev
```

Run database migrations:

```bash
php artisan migrate
```

Reset and rebuild the database:

```bash
php artisan migrate:fresh --seed
```

Clear application caches:

```bash
php artisan optimize:clear
```

Run all automated tests:

```bash
php artisan test
```

## Suggested Database Tables

The project may contain the following database tables:

```text
users
addresses
categories
brands
products
product_images
product_variants
carts
cart_items
wishlists
coupons
coupon_usages
orders
order_items
payments
shipments
reviews
inventory_movements
settings
banners
```

## Suggested Project Structure

```text
app/
├── Actions/
├── Enums/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   ├── Customer/
│   │   └── Storefront/
│   ├── Middleware/
│   └── Requests/
├── Models/
├── Notifications/
├── Policies/
├── Services/
└── View/
    └── Components/

resources/
├── css/
│   └── app.css
├── js/
│   └── app.js
└── views/
    ├── admin/
    ├── auth/
    ├── cart/
    ├── checkout/
    ├── components/
    ├── layouts/
    ├── orders/
    └── products/
```

## Main Application Workflow

```text
Customer visits the website
        ↓
Customer browses products
        ↓
Customer views product details
        ↓
Customer selects product variant
        ↓
Customer adds product to cart
        ↓
Customer proceeds to checkout
        ↓
System validates product stock
        ↓
System calculates the order total
        ↓
Customer provides delivery information
        ↓
Order is created
        ↓
Product stock is updated
        ↓
Customer receives order confirmation
        ↓
Administrator processes the order
```

## Security Considerations

The project should implement:

* CSRF protection
* Server-side form validation
* Password hashing
* Authentication middleware
* Admin authorization
* Secure file upload validation
* Database transactions
* Rate limiting
* Protection against mass assignment
* Escaping of customer-generated content
* Secure storage of environment credentials

Sensitive information must be stored in the `.env` file and must not be committed to GitHub.

Examples include:

```env
DB_PASSWORD=
MAIL_PASSWORD=
PAYMENT_SECRET_KEY=
```

## Testing

The project should contain tests for:

* Customer registration
* Customer login
* Product listing
* Product search
* Adding products to the cart
* Updating cart quantities
* Preventing orders above available stock
* Checkout validation
* Order creation
* Inventory deduction
* Admin authorization
* Product creation
* Order status updates

Run the tests using:

```bash
php artisan test
```

## Future Improvements

The following features may be added in future versions:

* SSLCommerz payment gateway
* bKash payment integration
* Nagad payment integration
* Courier API integration
* Product reviews and ratings
* Customer wishlist
* Advanced coupon management
* Multiple delivery methods
* Email and SMS notifications
* Sales reports
* Product recommendations
* Multiple warehouse support
* Refund management
* Reward points
* REST API
* Mobile application support

## Repository

Project source code:

https://github.com/rakib6120/ecommerce-nub

## Author

**Rakib Hossain**

Student ID: **41240102110**

## License

This project is developed for academic and educational purposes.
