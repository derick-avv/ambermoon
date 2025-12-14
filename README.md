# Amber Moon Portfolio - Full-Stack Portfolio with Admin Dashboard

This project is a fully custom, framework-free PHP web application built to demonstrate real-world backend fundamentals, scalable architecture, and production-minded development practices.

The application uses a Front Controller architecture to centrally handle routing, layout rendering, asset loading, and request processing. It features a complete admin dashboard with authentication, session management, and CRUD systems that allow non-technical users to manage site content without modifying code.

Rather than relying on frameworks, the project intentionally implements core concepts manually, including routing logic, dynamic asset loading, access control, and page-level request handling. This approach highlights a strong understanding of how modern PHP frameworks operate under the hood, while maintaining full control over performance, structure, and extensibility.

The codebase is organized for clarity and scalability, with reusable layout components, page-aware CSS and JavaScript loading, cache-busting for static assets, and clean separation between public pages and protected admin functionality.

This project is well-suited as a foundation for:

- Content-driven websites
- Portfolio and personal brand platforms
- Admin-managed marketing sites
- Future migration to MVC or framework-based architectures

For a detailed breakdown of the system architecture, routing strategy, asset loading, and security considerations, see [ARCHITECTURE.md](ARCHITECTURE.md)

## Table of Contents

- [Features](#features)  
- [Technologies](#technologies)  
- [Project Structure](#project-structure)  
- [Installation](#installation)  
- [Access](#access)   
- [Technical Documentation](#technical-documentation)
- [Future Updates](#future-updates)
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
├─ admin/
│   ├─ .htaccess
│   ├─ admin_create_post.php
│   ├─ admin_dashboard.php
│   ├─ admin_edit_post.php
│   ├─ admin_login.php
│   ├─ admin_manage_posts.php
│   └─ logout.php
├─ assets/
│   ├─ css/
│   │   ├─ admin/
│   │   │   ├─ admin_dashboard.css
│   │   │   ├─ admin_login.css
│   │   │   ├─ admin_manage_posts.css
│   │   │   └─ admin_sidebar.css
│   │   ├─ pages/
│   │   │   ├─ about.css
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
│   ├─ admin/
│   │   ├─ admin_header.php
│   │   ├─ admin_sidebar.php
│   │   ├─ footer.php
│   │   ├─ header_auth.php
│   │   └─ header.php
│   ├─ footer.php
│   ├─ header.php
│   └─ navbar.php
├─ includes/
│   └─ config.php
├─ pages/
│   ├─ 404.php
│   ├─ about.php
│   ├─ contact.php
│   ├─ fetch_posts.php
│   ├─ home.php
│   └─ portfolio.php
├─ uploads/           # Uploaded files
├─ .gitignore
├─ .htaccess
├─ ARCHITECTURE.md    # Project documentation
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

## Technical Documentation
For a detailed breakdown of the project architecture, routing system, and backend implementation, see [ARCHITECTURE.md](ARCHITECTURE.md).

## Future Updates

Planned enhancements and upcoming additions to improve the Amber Moon Portfolio website:

- **Homepage Blog Section**:
  Add a dynamic blog preview on the homepage displaying the latest posts.

- **Full Blog Page**:
  Introduce a dedicated blog page where visitors can browse all articles.

- **Blog CRUD for Admin**:
  Expand the admin dashboard to include full Create, Read, Update, Delete function for blog posts.

- **Likes & Comments System**:
  Allow users to like and comment on blog posts, increasing engagement and interaction.

- **User Authentication System**:
  Implement a public user sign-up and login system (seperate from the admin login).

- **Admin Front Controller**:
  Refactor current admin files to flow through a single front controller for dynamic display.

## License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).  

You are free to use, modify, and distribute this project for personal or commercial purposes, as long as you include the original copyright and license notice.  

For more details, see the [LICENSE](LICENSE) file included in this repository.
