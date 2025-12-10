# Amber Moon Portfolio - Full-Stack Portfolio with Admin Dashboard

A fully responsive, client-side portfolio website built with PHP, HTML, CSS, and JavaScript. The project features a scalable architecture with a single front controller, an admin dashboard, and full CRUD functionality for portfolio posts.  

## Table of Contents

- [Features](#features)  
- [Technologies](#technologies)  
- [Project Structure](#project-structure)  
- [Installation](#installation)  
- [Access](#access)   
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
├─ database.sql
├─ index.php          # Front controller
└─ README.md          # Project documentation
```

## Installation
Follow these steps to run the Amber Moon Portfolio project locally:

1. **Clone the repository:**
```bash
git clone https://github.com/derick-avv/ambermoon.git
```

2. **Navigate into the project folder:**
```bash
cd ambermoon
```

3. **Set up your local server:**
- Make sure you have a local PHP environment installed (XAMPP, WAMP, or MAMP).
- Place the project folder inside your local server's root directory:
  - XAMPP → `htdocs/`
  - WAMP → `www/`
  - MAMP → `htdocs/`

4. **Import the database:**

- Open `phpMyAdmin` in your browser.

- Create a new database, e.g., `ambermoon_db`.

- Import the provided `database.sql` file containing the tables for the project.

5. **Configure database connection:**

- Open `includes/config.php`.

- Update the database credentials to match your local setup:

```php
if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', '');
if (!defined('DB_NAME')) define('DB_NAME', 'ambermoon');
```
6. **Start your local server**
- Ensure Apache and MySQL are running.
- Open your browser and navigate to:
```bash
http://localhost/ambermoon
```

## Access 
- **Public Portfolio:** http://localhost/ambermoon
- **Admin Dashboard:** http://localhost/ambermoon/admin_dashboard

**Default Credentials:**
- Username: `admin`
- Password: `admin123`

⚠️ **IMPORTANT!** Change these credentials in production.

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).  

You are free to use, modify, and distribute this project for personal or commercial purposes, as long as you include the original copyright and license notice.  

For more details, see the [LICENSE](LICENSE) file included in this repository.
