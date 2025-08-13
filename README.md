This is a PHP-based social media web application with MySQL database integration, designed as a simple but functional social networking platform. Here's what the project includes:

🏗️ Architecture & Technology Stack
Backend: PHP with MySQL database
Frontend: HTML, CSS with responsive design
Database: MySQL with 4 main tables (users, posts, likes, comments)
Server: Designed to run on XAMPP/WAMP local server environment

📊 Database Structure
The application uses a well-structured MySQL database (social_media_app.sql) with:

Users Table: Stores user accounts with username, email, hashed passwords, and profile pictures
Posts Table: Contains user posts with content, optional images, and timestamps
Likes Table: Tracks post likes with user and post relationships
Comments Table: Stores comments on posts with user attribution

🔧 Core Features
User Authentication
Registration (register.php): New user signup with username, email, and password
Login (login.php): Secure authentication with password verification and session management
Social Media Functionality
Profile Page (profile.php): User dashboard showing personal posts and posting interface
Post Creation (post.php): Users can create text posts with optional image uploads
Like System (like.php): Users can like posts
Comment System (comment.php): Users can comment on posts

🎨 User Interface
The application features a clean, modern design (style.css) with:

Responsive layout that works on mobile and desktop
Modern color scheme with blue primary colors (#1d72b8)
Clean forms with rounded corners and hover effects
Card-based design for posts and comments
Professional typography using Segoe UI font family

🔒 Security Features
Password hashing using PHP's password_hash() function
Prepared statements to prevent SQL injection
Session management for user authentication
Input validation and sanitization
