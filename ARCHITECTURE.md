# Technical Documentation - Architecture & Implementation


## Table of Contents

- [Project Overview](#project-overview)  
- [Front Controller Architecture](#front-controller-architecture)  
- [Routing System (Query-Based Routing)](#Routing-System-(Query-Based-Routing))  
- [Clean URL Support](#clean-url-support)  
- [Layout & Component Rendering](#layout-&-component-rendering)     


## 1. Project Overview

This project is a custom-built PHP web application developed without frameworks, designed to demonstrate backend fundamentals, scalable structure, and real-world admin functionality.

The application includes: 
- Client-facing pages
- An admin dashboard
- Authentication and session handling
- CRUD systems for portfolio and blog content
- Centeralized request handling using a front controller


## 2. Front Controller Architecture

All requests are routed through a single entry point:
`index.php`

This file acts as the **Front Controller**, ensuring:
- Centeralized request handling
- Shared layout components
- Consistent page resolution
- Easier scalability and maintenance

**Flow:**
1. Request enters `index.php`
2. Page parameter is read from the URL
3. Input is sanitized
4. Matching page file is dynamically included
5. Shared UI components are rendered


## 3. Routing System (Query-Based Routing)

Routing is handled using a query-string based system:
```php
$page = $_GET['page'] ?? 'home';
```
The resolved page is mapped to a corresponding file:
```php
$page_file = "pages/$page.php"
```
If the requested page does not exist, a custom **404 page** is served.

This approach:
- Prevents directory transversal via sanitization
- Allows rapid page creationb
- Keeps routing logic centralized

This routing method is intentionally framework-free and mirrors the core behavior of modern PHP frameworks at a foundational level.


## 4. Clean URL Support 

The application supports clean URLs using Apache rewrite rules:
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]
```
This allows URLs such as:

- `/about` → `index.php?page=about`
- `/admin_dashboard` → `index.php?page=admin_dashboard`

Without modifying application logic.


## 5. Layout & Component Rendering
The UI layout is composed using reusable components:
```text
components/
├── header.php
├── navbar.php
└── footer.php
```

These components are included globally by the front controller, ensuring:
- Consistent layout across pages
- Reduced duplication
- Easy global UI updates


## 6. Dynamic Asset Loading (CSS & JavaScript)

The application uses a **dynamic, page-aware asset loading system** implemented within shared layout components (`header.php` and `footer.php`). This approach ensures that only the required CSS and JavaScript files are loaded per page, improving performance and maintainability.



### Global Stylesheets
Core stylesheets are loaded globally in the header component:
```php
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/root.css">
<link rel="stylesheet" href="/assets/css/navbar.css">
<link rel="stylesheet" href="/assets/css/typography.css">
```
Each stylesheet includes cache-busting versioning using file modification timestamps:
```php
?v=<?php echo filemtime('assets/css/style.css'); ?>
```
This ensures:
- Browsers automatically fetch updated assets after deployment
- No manual cache clearing is required
- Safer iteration during development and production updates


### Page Specific CSS Loading
In addition to global styles, the system conditionally loads page-specific CSS files based on the active route:
```php
$pageCssFile = "assets/css/pages/{$page}.css";
if (file_exists($pageCssFile)) {
    echo "<link rel='stylesheet' href='{$pageCssFile}'>";
}
```
This allows:
- Automatic CSS inclusion per page
- Zero configuration when adding new pages
- Cleaner separation of page-level styles
- Reduced unused CSS on unrelated pages

### JavaScript Loading Strategy
JavaScript is loaded primarily at the bottom of the page via the footer component to improve render performance.
```php
<script src="assets/js/navbar.js" defer></script>
<script src="assets/js/main.js" defer></script>
```
These scripts handle shared UI and global interactions.

### Page-Specific JavaScript Loading
Page-level JavaScript files are conditionally loaded using the same routing context:
```php
$pageJsFile = "assets/js/{$page}.js";
if (file_exists($pageJsFile)) {
    echo "<script src='{$pageJsFile}'></script>";
}
```
This enables:
- Automatic script loading tied to the active page
- Reduced JavaScript payload per request
- Cleaner organization of page behavior
- Easier debugging and maintenance

### Design Benefits
This asset-loading approach provides:
- Performance optimization through selective loading
- Scalability without additional configuration
- Centralized asset management
- Framework-like behavior implemented in vanilla PHP

The system mirrors asset pipelines used in modern frameworks while remaining lightweight and fully customizable.
