# Amber Moon Portfolio - Full-Stack Portfolio with Admin Dashboard

A fully responsive, client-side portfolio website built with PHP, HTML, CSS, and JavaScript. The project features a scalable architecture with a single front controller, an admin dashboard, and full CRUD functionality for portfolio posts.  

## Table of Contents

- [Features](#features)  
- [Technologies](#technologies)  
- [Project Structure](#project-structure)  
- [Installation](#installation)  
- [Usage](#usage)  
- [Admin Dashboard](#admin-dashboard)  
- [License](#license)  

## Features

- ✅ **Fully Responsive Design** – Works seamlessly on desktop, tablet, and mobile devices.  
- ✅ **Front Controller** – Single `index.php` controller for dynamic page routing.  
- ✅ **Admin Dashboard** – Secure login with session management.  
- ✅ **CRUD Functionality** – Create, Read, Update, Delete portfolio posts.  
- ✅ **Pages**: Home, About, Portfolio, Contact, Admin Login, Admin Dashboard.  
- ✅ **Session Management** – Admin login, logout, and session handling.  
- ✅ **Scalable Architecture** – Easy to expand with new pages and features.  

## Technologies

- **PHP** – Server-side scripting and front controller logic.  
- **HTML5 & CSS3** – Markup and styling.  
- **JavaScript** – Client-side interactions.  
- **MySQL** – Database for storing portfolio posts and admin credentials.  

## Project Structure

```bash
ambermoon/
├─ assets/
│   ├─ css/
│   │   ├─ pages/
│   │   │   ├─ about.css
│   │   │   ├─ admin_dashboard.css
│   │   │   ├─ admin_login.css
│   │   │   ├─ admin_manage_posts.css
│   │   │   ├─ contact.css
│   │   │   ├─ home.css
│   │   │   └─ portfolio.css
│   │   ├─ navbar.css
│   │   ├─ root.css
│   │   ├─ style.css
│   │   └─ typography.css
│   ├─ images/        # Static Images
│   └─ js/
│       ├─ home.js
│       ├─ main.js
│       ├─ navbar.js
│       └─ portfolio.js
├─ components/
│   ├─ admin_header.php
│   ├─ admin_sidebar.php
│   ├─ footer.php
│   ├─ header.php
│   └─ navbar.php
├─ includes/
│   └─ config.php
├─ pages/
│   ├─ 404.php
│   ├─ about.php
│   ├─ admin_create_post.php
│   ├─ admin_dashboard.php
│   ├─ admin_edit_post.php
│   ├─ admin_login.php
│   ├─ admin_manage_posts.php
│   ├─ contact.php
│   ├─ fetch_posts.php
│   ├─ home.php
│   ├─ logout.php
│   └─ portfolio.php
├─ uploads/           # Uploaded files
├─ .gitignore
├─ .htaccess
├─ index.php          # Front controller
└─ README.md          # Project documentation
```