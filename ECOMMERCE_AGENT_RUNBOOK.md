# University E-commerce Project — AI Agent Runbook

## Purpose

This file is the main instruction file for any AI coding agent working on this university e-commerce project.

The project is already initialized with:

- Laravel
- Tailwind CSS

The agent must **not recreate the Laravel project** and must **not reinstall Tailwind CSS unless it is broken or explicitly required**.

The goal is to build a **basic e-commerce application** with many small, meaningful Git commits so the development history clearly shows gradual progress.

The agent should be able to:

1. Read this file.
2. Inspect the existing project.
3. Find the next unfinished task.
4. Implement only that task.
5. Test the change.
6. Commit it with the specified commit message.
7. Update progress.
8. Continue automatically to the next task.
9. Stop safely whenever the user interrupts.
10. Resume later without repeating completed work.

---

# 1. Core Rules for the AI Agent

## 1.1 Never rebuild the project

The Laravel application already exists.

Before changing anything:

- Inspect the repository.
- Read existing code.
- Check current Git status.
- Check completed tasks in `PROJECT_PROGRESS.md`.
- Never overwrite working code unnecessarily.

---

## 1.2 Work in small commits

Each task below should normally produce **one Git commit**.

Do not combine multiple major features into one commit.

Good example:

```bash
git commit -m "Create categories database table"
```

Bad example:

```bash
git commit -m "Build complete ecommerce system"
```

---

## 1.3 One task at a time

For every task:

1. Read the task.
2. Inspect relevant existing files.
3. Implement only the requested functionality.
4. Run appropriate validation/tests.
5. Fix errors caused by the task.
6. Commit.
7. Mark the task completed in `PROJECT_PROGRESS.md`.
8. Continue to the next task.

Do not prematurely implement future tasks unless required to make the current task function.

---

## 1.4 Do not create fake commits

Every commit must contain a meaningful code or project change.

Do not:

- change whitespace only,
- rename variables only for commit count,
- edit comments only,
- create meaningless files,
- split a single trivial change into several fake commits.

---

## 1.5 Preserve user code

Before editing:

- inspect the current implementation,
- reuse existing components where practical,
- do not delete unrelated features,
- do not reset the repository,
- do not use destructive Git commands.

Never run:

```bash
git reset --hard
git clean -fd
git checkout -- .
```

unless the user explicitly instructs you to do so.

---

# 2. Technology Rules

Use:

- Laravel
- Blade
- Tailwind CSS
- MySQL
- Laravel authentication
- Laravel sessions for cart
- Laravel validation
- Eloquent ORM

Avoid unnecessary complexity.

Do not introduce unless explicitly requested:

- React
- Vue
- Angular
- Livewire
- Inertia
- Redis
- Elasticsearch
- microservices
- payment gateway
- Docker
- external admin templates
- complex architecture patterns

This is a university project, so keep the architecture understandable and presentable.

---

# 3. Application Scope

## Customer Store

The frontend should contain:

- Home page
- Shop page
- Product details page
- About Us page
- Cart page
- Checkout page
- Order confirmation page
- Login
- Registration
- Customer dashboard
- Customer order list
- Customer order details

---

## Admin Panel

The admin panel should contain:

- Dashboard
- Product management
- Category management
- Order management
- Customer management

---

# 4. UI Guidelines

Use Tailwind CSS.

The UI should be:

- simple,
- clean,
- responsive,
- easy to explain during a university presentation.

Do not spend excessive time creating a professional commercial design.

Prefer reusable Blade components where they make the code cleaner.

Suggested visual direction:

- light background,
- simple navbar,
- clean cards,
- clear buttons,
- readable tables,
- basic responsive layouts.

---

# 5. Progress Tracking

Create this file if it does not already exist:

```text
PROJECT_PROGRESS.md
```

It must contain:

```md
# Project Progress

Current Task: TASK_ID

Last Completed Task: TASK_ID

Status: IN_PROGRESS | PAUSED | COMPLETED

## Completed Tasks

- [x] TASK-001 Example

## Remaining Tasks

- [ ] TASK-002 Example

## Notes

Any important implementation decisions or issues.
```

After every successful task:

1. mark the task complete,
2. update `Last Completed Task`,
3. set `Current Task` to the next task,
4. commit the progress update together with that task.

Do **not** make a separate commit only for progress tracking unless required.

---

# 6. Pause and Resume Protocol

## When interrupted or asked to stop

Before stopping, if possible:

1. finish the current safe atomic change,
2. run validation,
3. commit if the task is complete,
4. update `PROJECT_PROGRESS.md`,
5. set:

```text
Status: PAUSED
```

If the current task is incomplete:

- do not create a misleading completed commit,
- leave a clear note under `Notes`,
- describe what remains.

---

## When resuming

When the user says something like:

- continue,
- resume,
- keep working,
- start again,
- continue from where you stopped,

the agent must:

1. inspect `git status`,
2. inspect recent commits:

```bash
git log --oneline -10
```

3. read `PROJECT_PROGRESS.md`,
4. inspect any uncommitted work,
5. continue from the first unfinished task.

Never restart from TASK-001 unless the progress file shows nothing was completed.

---

# 7. Testing Rules

After every task, run the smallest relevant validation.

Examples:

```bash
php artisan route:list
```

```bash
php artisan test
```

```bash
php artisan migrate
```

```bash
php artisan migrate:fresh --seed
```

Only use `migrate:fresh` when it is safe for the local university development database.

Also check for:

- Blade syntax errors,
- PHP syntax errors,
- missing routes,
- missing imports,
- invalid relationships,
- form validation errors,
- broken redirects.

If frontend assets changed, run the appropriate frontend build command when necessary.

Example:

```bash
npm run build
```

Do not commit known broken code.

---

# 8. Git Rules

Before starting:

```bash
git status
```

Before committing:

```bash
git diff
git status
```

Commit only relevant files.

Preferred pattern:

```bash
git add <relevant-files>
git commit -m "Commit message"
```

Do not automatically push unless the user explicitly instructs the agent to push.

---

# 9. Task Queue

---

## TASK-001 — Inspect existing Laravel application

### Goal

Understand the current project before making feature changes.

### Agent Prompt

Inspect the existing Laravel project.

Confirm:

- Laravel is already installed.
- Tailwind CSS is already configured.
- current routes,
- existing models,
- existing migrations,
- existing Blade views,
- authentication status,
- Git status.

Create `PROJECT_PROGRESS.md` using the format defined in this runbook.

Do not add ecommerce functionality yet.

### Commit

```text
Add project progress tracking
```

---

## TASK-002 — Create storefront layout

### Agent Prompt

Create a reusable Blade storefront layout using the existing Tailwind CSS setup.

Include:

- site name/logo placeholder,
- navbar,
- Home link,
- Shop link,
- About link,
- Cart link,
- Login/Register area,
- main content slot,
- footer.

Keep it simple and responsive.

Do not build full page content yet.

### Commit

```text
Create storefront master layout
```

---

## TASK-003 — Add basic storefront routes

### Agent Prompt

Create routes and simple Blade pages for:

- `/`
- `/shop`
- `/about`
- `/cart`

Use the existing storefront layout.

Each page can initially contain only a heading and short placeholder content.

### Commit

```text
Add basic storefront routes
```

---

## TASK-004 — Build home page

### Agent Prompt

Build the basic ecommerce home page using Tailwind CSS.

Include:

- hero section,
- shop now button,
- featured products placeholder,
- category section placeholder,
- small promotional section.

Do not connect products to the database yet.

### Commit

```text
Create ecommerce home page
```

---

## TASK-005 — Build About Us page

### Agent Prompt

Create a simple About Us page.

Include:

- short store introduction,
- mission,
- why choose us section.

Use the existing Tailwind storefront design.

### Commit

```text
Create about us page
```

---

# CATEGORY MODULE

## TASK-006 — Create categories table

### Agent Prompt

Create a Laravel migration for a `categories` table.

Fields:

- id
- name
- slug
- status
- timestamps

Use a simple boolean or small status field appropriate for Laravel.

Do not build CRUD yet.

### Commit

```text
Create categories database table
```

---

## TASK-007 — Create Category model

### Agent Prompt

Create the Category model.

Add appropriate fillable fields:

- name
- slug
- status

Do not implement admin CRUD yet.

### Commit

```text
Add Category model
```

---

# PRODUCT MODULE

## TASK-008 — Create products table

### Agent Prompt

Create a products migration.

Fields:

- id
- category_id
- name
- slug
- description
- price
- stock
- image
- status
- timestamps

Add an appropriate foreign key to categories.

### Commit

```text
Create products database table
```

---

## TASK-009 — Create Product model and relationships

### Agent Prompt

Create the Product model.

Add appropriate fillable properties.

Relationships:

- Product belongsTo Category
- Category hasMany Products

Do not build product CRUD yet.

### Commit

```text
Add product category relationships
```

---

## TASK-010 — Add ecommerce seed data

### Agent Prompt

Create simple seeders for development.

Add approximately:

- 4 categories,
- 10 products.

Use realistic dummy ecommerce products.

Do not depend on external APIs.

### Commit

```text
Add sample ecommerce data
```

---

# SHOP MODULE

## TASK-011 — Create shop controller

### Agent Prompt

Create a ShopController.

Add an index method that retrieves active products with their categories.

Return the data to the shop page.

Do not add filtering or search yet.

### Commit

```text
Add shop product controller
```

---

## TASK-012 — Display shop products

### Agent Prompt

Update the shop page to display database products.

Each product card should show:

- image or placeholder,
- product name,
- category,
- price,
- View Details button.

Use a responsive Tailwind grid.

### Commit

```text
Display products on shop page
```

---

## TASK-013 — Add product details route

### Agent Prompt

Create a product details route using the product slug.

Suggested URL:

```text
/product/{slug}
```

Add a controller method to retrieve an active product.

Return 404 when appropriate.

### Commit

```text
Add product details route
```

---

## TASK-014 — Build product details page

### Agent Prompt

Create the product details Blade page.

Display:

- product image,
- product name,
- category,
- price,
- description,
- stock availability,
- quantity field,
- Add to Cart button.

Do not implement cart submission yet.

### Commit

```text
Create product details page
```

---

## TASK-015 — Add category filter

### Agent Prompt

Add server-side category filtering to the shop page.

Use a GET query parameter such as:

```text
/shop?category=shirts
```

Ensure normal shop listing still works without the parameter.

### Commit

```text
Add shop category filtering
```

---

## TASK-016 — Add product search

### Agent Prompt

Add a simple product name search to the shop page.

Use:

```text
?search=
```

Make it work together with the existing category filter.

Use server-side Laravel queries only.

### Commit

```text
Add product search
```

---

# AUTHENTICATION

## TASK-017 — Add customer authentication

### Agent Prompt

Inspect whether authentication already exists.

If it exists, reuse it.

If it does not exist, add simple Laravel authentication with Blade and the current Tailwind setup.

Required:

- register,
- login,
- logout.

Avoid adding a heavy frontend framework.

### Commit

```text
Add customer authentication
```

---

## TASK-018 — Create customer dashboard

### Agent Prompt

Create an authenticated customer dashboard.

Suggested route:

```text
/dashboard
```

Display:

- welcome message,
- customer name,
- My Orders link,
- account information section.

Protect it with authentication middleware.

### Commit

```text
Create customer dashboard
```

---

# CART MODULE

## TASK-019 — Implement session cart service

### Agent Prompt

Implement a simple session-based cart.

Do not create a carts database table.

Each cart item should contain enough information to calculate the cart and render it safely.

Use product IDs as the source of truth where appropriate.

### Commit

```text
Add session shopping cart
```

---

## TASK-020 — Add product to cart

### Agent Prompt

Connect the Add to Cart button on the product details page.

Requirements:

- validate quantity,
- ensure product exists,
- ensure requested quantity does not exceed stock,
- add item to session cart,
- increase quantity when product already exists,
- show success feedback.

### Commit

```text
Implement add to cart
```

---

## TASK-021 — Display shopping cart

### Agent Prompt

Build the cart page using the session cart.

Display:

- product image,
- name,
- price,
- quantity,
- subtotal,
- total,
- update action,
- remove action,
- checkout button.

### Commit

```text
Display shopping cart
```

---

## TASK-022 — Update cart quantity

### Agent Prompt

Implement cart quantity updates.

Validation:

- quantity must be at least 1,
- quantity cannot exceed current stock.

Recalculate totals after update.

### Commit

```text
Add cart quantity update
```

---

## TASK-023 — Remove item from cart

### Agent Prompt

Implement removing a single item from the session cart.

Redirect back to the cart and display feedback.

### Commit

```text
Add remove from cart
```

---

## TASK-024 — Add cart count to navbar

### Agent Prompt

Display the current cart item count beside the Cart navigation link.

Keep the solution simple and reusable across storefront pages.

### Commit

```text
Show cart count in navbar
```

---

# ORDER DATABASE

## TASK-025 — Create orders table

### Agent Prompt

Create the orders migration.

Fields:

- id
- user_id
- order_number
- customer_name
- phone
- email
- address
- subtotal
- total
- status
- timestamps

Supported statuses:

- pending
- processing
- completed
- cancelled

### Commit

```text
Create orders database table
```

---

## TASK-026 — Create order items table

### Agent Prompt

Create the order_items migration.

Fields:

- id
- order_id
- product_id
- product_name
- price
- quantity
- subtotal
- timestamps.

Add suitable foreign keys.

### Commit

```text
Create order items database table
```

---

## TASK-027 — Create order models

### Agent Prompt

Create Order and OrderItem models.

Add relationships:

- User hasMany Orders
- Order belongsTo User
- Order hasMany OrderItems
- OrderItem belongsTo Order
- OrderItem belongsTo Product

Add appropriate fillable fields.

### Commit

```text
Add order models and relationships
```

---

# CHECKOUT

## TASK-028 — Build checkout page

### Agent Prompt

Create an authenticated checkout page.

Display fields:

- full name,
- email,
- phone,
- address.

Also display:

- cart items,
- subtotal,
- total,
- Cash on Delivery,
- Place Order button.

Do not create the order yet.

### Commit

```text
Create checkout page
```

---

## TASK-029 — Add checkout validation

### Agent Prompt

Add Laravel validation for:

- customer name,
- email,
- phone,
- address.

Display validation messages clearly.

Do not place the order yet.

### Commit

```text
Add checkout validation
```

---

## TASK-030 — Implement order placement

### Agent Prompt

Implement order placement.

Process:

1. validate request,
2. verify authenticated user,
3. verify cart is not empty,
4. re-fetch products where needed,
5. validate stock,
6. calculate totals server-side,
7. create order,
8. generate unique order number,
9. create order items,
10. decrease stock,
11. clear cart,
12. redirect to confirmation page.

Use a database transaction.

### Commit

```text
Implement order placement
```

---

## TASK-031 — Build order confirmation page

### Agent Prompt

Create an order confirmation page.

Display:

- successful order message,
- order number,
- customer name,
- total,
- status,
- Continue Shopping button,
- My Orders button.

Make sure the customer can only access confirmation for their own order where applicable.

### Commit

```text
Create order confirmation page
```

---

# CUSTOMER ORDER HISTORY

## TASK-032 — Add customer order list

### Agent Prompt

Create a My Orders page for authenticated customers.

Suggested route:

```text
/my-orders
```

Show:

- order number,
- date,
- total,
- status,
- View button.

Only display the authenticated user's orders.

### Commit

```text
Add customer order history
```

---

## TASK-033 — Add customer order details

### Agent Prompt

Create a customer order details page.

Display:

- order number,
- date,
- status,
- delivery information,
- ordered products,
- quantity,
- price,
- subtotal,
- total.

Prevent users from viewing another customer's orders.

### Commit

```text
Add customer order details
```

---

# ADMIN ACCESS

## TASK-034 — Add user role

### Agent Prompt

Add a simple role field to users.

Supported roles:

- customer
- admin

Default role:

```text
customer
```

Update the User model if needed.

### Commit

```text
Add user role support
```

---

## TASK-035 — Add admin middleware

### Agent Prompt

Create admin authorization middleware.

Only authenticated users with role `admin` may access admin routes.

Return an appropriate response or redirect for unauthorized users.

### Commit

```text
Add admin access middleware
```

---

## TASK-036 — Create admin layout

### Agent Prompt

Create a simple Tailwind admin layout.

Sidebar/navigation:

- Dashboard
- Products
- Categories
- Orders
- Customers
- View Store
- Logout

Keep the design simple and responsive.

### Commit

```text
Create admin panel layout
```

---

# ADMIN DASHBOARD

## TASK-037 — Create admin dashboard

### Agent Prompt

Create the admin dashboard.

Display database statistics for:

- total products,
- total categories,
- total orders,
- total customers.

Use simple Tailwind statistic cards.

### Commit

```text
Create admin dashboard
```

---

## TASK-038 — Show recent admin orders

### Agent Prompt

Add a Recent Orders section to the admin dashboard.

Display the latest 5 orders:

- order number,
- customer,
- total,
- status,
- date.

### Commit

```text
Show recent orders on admin dashboard
```

---

# ADMIN CATEGORY MANAGEMENT

## TASK-039 — Add category listing

### Agent Prompt

Create the admin category index page.

Display:

- ID,
- name,
- slug,
- status,
- Edit button,
- Delete button.

Do not implement create/edit/delete actions yet.

### Commit

```text
Add admin category listing
```

---

## TASK-040 — Add category creation

### Agent Prompt

Implement category creation.

Fields:

- name,
- status.

Generate the slug automatically.

Add Laravel validation.

### Commit

```text
Add category creation
```

---

## TASK-041 — Add category editing

### Agent Prompt

Implement category editing.

Allow changing:

- name,
- status.

Update slug when name changes.

Add validation.

### Commit

```text
Add category editing
```

---

## TASK-042 — Add category deletion

### Agent Prompt

Implement category deletion.

Do not allow a category to be deleted if products still belong to it.

Display useful feedback.

### Commit

```text
Add category deletion
```

---

# ADMIN PRODUCT MANAGEMENT

## TASK-043 — Add product listing

### Agent Prompt

Create the admin products index page.

Display:

- product image,
- name,
- category,
- price,
- stock,
- status,
- Edit button,
- Delete button.

### Commit

```text
Add admin product listing
```

---

## TASK-044 — Add product creation

### Agent Prompt

Implement product creation.

Fields:

- category,
- name,
- description,
- price,
- stock,
- status.

Automatically generate product slug.

Add Laravel validation.

Do not add image upload yet.

### Commit

```text
Add product creation
```

---

## TASK-045 — Add product image upload

### Agent Prompt

Add product image upload to the existing product form.

Requirements:

- jpg,
- jpeg,
- png,
- webp,
- sensible file size validation,
- Laravel storage,
- save image path,
- display uploaded image.

### Commit

```text
Add product image upload
```

---

## TASK-046 — Add product editing

### Agent Prompt

Implement product editing.

Allow editing:

- category,
- name,
- description,
- price,
- stock,
- status,
- image.

If a new image is not provided, preserve the existing image.

### Commit

```text
Add product editing
```

---

## TASK-047 — Add product deletion

### Agent Prompt

Implement product deletion.

Delete the related local product image when appropriate.

Do not break existing order item history.

Display confirmation before deletion.

### Commit

```text
Add product deletion
```

---

# ADMIN ORDER MANAGEMENT

## TASK-048 — Add admin order listing

### Agent Prompt

Create admin order management listing.

Display:

- order number,
- customer,
- date,
- total,
- status,
- View button.

Newest orders first.

### Commit

```text
Add admin order listing
```

---

## TASK-049 — Add admin order details

### Agent Prompt

Create the admin order details page.

Display:

- order information,
- customer information,
- delivery address,
- products,
- quantities,
- prices,
- total,
- current status.

### Commit

```text
Add admin order details
```

---

## TASK-050 — Add order status updates

### Agent Prompt

Allow admins to update order status.

Supported values:

- pending,
- processing,
- completed,
- cancelled.

Validate the submitted status.

### Commit

```text
Add order status management
```

---

# ADMIN CUSTOMER MANAGEMENT

## TASK-051 — Add customer listing

### Agent Prompt

Create an admin customer listing.

Only show users whose role is customer.

Display:

- ID,
- name,
- email,
- registration date,
- total orders,
- View button.

### Commit

```text
Add admin customer listing
```

---

## TASK-052 — Add customer details

### Agent Prompt

Create the admin customer details page.

Display:

- customer name,
- email,
- registration date,
- total orders,
- total amount spent,
- recent orders.

### Commit

```text
Add admin customer details
```

---

# POLISHING

## TASK-053 — Add flash message component

### Agent Prompt

Create reusable Tailwind flash messages for:

- success,
- error,
- warning.

Integrate them into common storefront and admin layouts.

### Commit

```text
Add reusable flash messages
```

---

## TASK-054 — Add empty states

### Agent Prompt

Add clean empty-state messages where appropriate.

Examples:

- no products,
- empty cart,
- no orders,
- no categories,
- no customers.

### Commit

```text
Add application empty states
```

---

## TASK-055 — Improve storefront responsiveness

### Agent Prompt

Review only the storefront UI.

Improve responsiveness for:

- navbar,
- home,
- shop,
- product details,
- cart,
- checkout,
- customer dashboard.

Do not change backend behavior.

### Commit

```text
Improve storefront responsive design
```

---

## TASK-056 — Improve admin responsiveness

### Agent Prompt

Review the admin panel UI.

Improve:

- sidebar,
- cards,
- forms,
- tables,
- mobile layouts.

Do not change backend functionality.

### Commit

```text
Improve admin responsive design
```

---

## TASK-057 — Review application validation

### Agent Prompt

Review application validation.

Check:

- registration,
- products,
- categories,
- cart quantity,
- checkout,
- order status.

Only fix missing or weak validation.

Do not add new features.

### Commit

```text
Improve application validation
```

---

## TASK-058 — Add custom 404 page

### Agent Prompt

Create a custom Laravel 404 page matching the storefront.

Include:

- Page Not Found message,
- Home button,
- Shop button.

### Commit

```text
Add custom 404 page
```

---

## TASK-059 — Add project README

### Agent Prompt

Create or improve `README.md`.

Include:

- project overview,
- main features,
- technology stack,
- installation,
- `.env` setup,
- database setup,
- migrations,
- seeders,
- running the app,
- customer features,
- admin features.

Keep it suitable for university submission.

### Commit

```text
Add project documentation
```

---

# 10. Continuous Agent Execution Prompt

Use the following prompt when starting an AI coding agent.

```text
Read the file `ECOMMERCE_AGENT_RUNBOOK.md` completely before making changes.

You are responsible for developing this Laravel university ecommerce project incrementally.

Important rules:

1. Laravel and Tailwind CSS are already installed.
2. Inspect the repository before making changes.
3. Read `PROJECT_PROGRESS.md` to determine the next unfinished task.
4. Work through the task queue in `ECOMMERCE_AGENT_RUNBOOK.md` in order.
5. Complete only one task at a time.
6. After each task, test the relevant functionality.
7. Do not commit broken code.
8. Make one meaningful Git commit using the exact commit message defined for that task.
9. Update `PROJECT_PROGRESS.md` in the same commit.
10. After committing successfully, automatically continue to the next unfinished task.
11. Do not ask me for confirmation between normal tasks.
12. Do not push to a remote repository unless I explicitly tell you to push.
13. Preserve existing working code.
14. Never use destructive Git commands.
15. If something already exists, inspect it and adapt the task rather than blindly recreating it.
16. If you encounter a blocker you cannot safely resolve, document it in `PROJECT_PROGRESS.md` and stop.
17. If I interrupt you, stop safely according to the pause protocol.
18. When restarted later, resume using Git history and `PROJECT_PROGRESS.md`; do not repeat completed work.

Start from the first unfinished task now.
```

---

# 11. Resume Prompt

Use this after stopping the agent and starting a new session.

```text
Resume work on this project.

First read:

1. `ECOMMERCE_AGENT_RUNBOOK.md`
2. `PROJECT_PROGRESS.md`

Then inspect:

- `git status`
- `git log --oneline -10`
- any uncommitted changes

Continue from the first unfinished task.

Do not repeat completed tasks.
Do not recreate existing functionality.
Continue making one small meaningful commit per task.
Test before each commit.
Automatically continue through the remaining tasks until I stop you or a genuine blocker occurs.
```

---

# 12. Pause Prompt

Use this when you want the agent to stop cleanly.

```text
Pause development now.

Finish only the current safe atomic change if appropriate.

If the current task is complete:
- test it,
- commit it,
- update `PROJECT_PROGRESS.md`.

If it is incomplete:
- do not mark it completed,
- document exactly what is unfinished in `PROJECT_PROGRESS.md`.

Set project status to PAUSED.

Do not start another task.
Do not push anything.
```

---

# 13. Continue for a Limited Number of Commits

If you do not want the agent running through the entire project, use:

```text
Read `ECOMMERCE_AGENT_RUNBOOK.md` and `PROJECT_PROGRESS.md`.

Resume from the next unfinished task.

Complete exactly the next 5 tasks.

For each task:
- implement,
- test,
- commit using the specified commit message,
- update progress.

After 5 successful task commits, set Status to PAUSED and stop.
```

Change `5` to any number you want.

---

# 14. Recovery Prompt

Use this if an AI agent stops unexpectedly or leaves uncommitted changes.

```text
Recover the current project state safely.

Read:

- `ECOMMERCE_AGENT_RUNBOOK.md`
- `PROJECT_PROGRESS.md`

Inspect:

- `git status`
- `git diff`
- `git diff --staged`
- `git log --oneline -10`

Determine whether the uncommitted changes belong to the current task.

Do not discard working code.

If the current task can be completed safely:
- finish it,
- test it,
- commit it,
- update progress.

If the changes are incomplete or unclear:
- keep them,
- document the exact state in `PROJECT_PROGRESS.md`,
- stop without creating a misleading commit.
```

---

# 15. Final Completion Rules

When every task is complete:

1. run the full available test suite,
2. run relevant migrations/seeding checks,
3. verify major customer routes,
4. verify major admin routes,
5. verify authentication and authorization,
6. verify checkout manually or through tests,
7. verify no obvious broken Blade pages,
8. update progress:

```text
Status: COMPLETED
```

Do not create extra fake commits after the project is complete.

---

# 16. What the Agent Must Not Do

The agent must never:

- rebuild Laravel from scratch,
- replace Tailwind with another CSS framework,
- create a complete feature bundle in one commit,
- push automatically,
- force push,
- rewrite Git history,
- delete user changes without permission,
- mark unfinished tasks as complete,
- skip testing because a commit is small,
- introduce unnecessary enterprise architecture,
- add a payment gateway,
- expose secrets or commit `.env`,
- commit vendor or node_modules folders,
- create meaningless commits solely to increase commit count.

---

# 17. Recommended Workflow Summary

The autonomous loop is:

```text
READ RUNBOOK
    ↓
READ PROJECT_PROGRESS
    ↓
CHECK GIT STATUS
    ↓
SELECT NEXT TASK
    ↓
IMPLEMENT
    ↓
TEST
    ↓
REVIEW DIFF
    ↓
UPDATE PROJECT_PROGRESS
    ↓
COMMIT
    ↓
NEXT TASK
```

The agent repeats this loop until:

- all tasks are complete,
- the user pauses it,
- a genuine blocker occurs.
