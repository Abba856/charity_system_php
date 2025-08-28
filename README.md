# Charity Donation System - MSSN SOT CHAPTER

## Overview
This is a charity donation management system for MSSN SOT CHAPTER that allows users to register, login, and make donations. Admin users can manage other users and view all donations.

## Features
- User registration and authentication
- Donation management
- Admin panel for user management
- Donation statistics dashboard
- Responsive design

## Improvements Made

### Security Enhancements
- Fixed SQL injection vulnerabilities by using prepared statements
- Added proper session management
- Implemented XSS protection with `htmlspecialchars()`
- Improved password hashing

### UI/UX Improvements
- Created a modern, responsive design using CSS Grid and Flexbox
- Added a consistent color scheme and typography
- Improved form layouts and user feedback
- Enhanced dashboard with donation statistics
- Added proper error and success messages

### Code Quality
- Fixed HTML structure and semantic markup
- Corrected PHP syntax errors
- Improved code organization and readability
- Added proper error handling

## File Structure
```
charity_system/
├── alldonors.php       # View all donors (admin only)
├── dashboad.php        # Admin dashboard
├── db_Connect.php      # Database connection
├── donates.php         # Donation form
├── donor.php           # Donor management
├── index.php           # Login page
├── logout.php          # Logout functionality
├── register.php        # User registration
├── user.php            # User management (admin)
├── welcome.php         # User dashboard
├── assets/             # Images and media
├── css/
│   ├── bootstrap.min.css
│   └── modern-style.css  # New modern styles
└── db/
    └── fund_riser.sql    # Database schema
```

## Database
The system uses a MySQL database with two main tables:
1. `user` - Stores user information
2. `donor` - Stores donation records

## Installation
1. Import the database schema from `db/fund_riser.sql`
2. Update database credentials in `db_Connect.php` if needed
3. Ensure the web server has proper permissions

## Usage
1. Admin login: username: `abba856`, password: 1234
2. Users can register and make donations
3. Admins can manage users and view all donations

## Security Notes
- All database queries use prepared statements
- Passwords are hashed using PHP's `password_hash()` function
- Session management is properly implemented
- Input validation and sanitization is applied throughout

## Technologies Used
- PHP 7+
- MySQL
- HTML5
- CSS3 (with Flexbox and Grid)
- Bootstrap (minimal)
