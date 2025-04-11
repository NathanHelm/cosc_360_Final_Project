# cosc_360_Final_Project Project implementations

Website User Objectives
- Browse Without Registering
- Visitors can view the homepage and browse products without creating an account.
- Search for Products Without Registering
- The homepage includes a functional search bar that allows users to find products by keyword without logging in.
- User Registration
- Users can register by providing a username, email address, and profile image.
- User Login
- Registered users can log in using their username and password.
- Post Comments (When Logged In)
- Logged-in users can comment on individual product pages. Each product has its own comment thread stored in the database.
- Edit User Profile
- Users can view and update their profile information, including username, email, and password.
- User State Maintenance
- The logged-in state of users is maintained across all pages using PHP sessions.
- User Images and Profiles Stored in Database
- Each user's profile includes a profile image which is stored in the database.
- Client-Side Form Validation
- JavaScript is used to validate forms on the signup and login pages.
- Hand-Styled Layout with Contextual Menus
- Navigation menus change dynamically based on the user’s state (e.g., sign in/register vs logout/profile). Layout is hand-styled with html/css.
- Responsive Design & Layout Principles
- The website follows a responsive design approach using a 2 or 3-column layout with appropriate UI/UX practices.

Website Administrator Objectives
- Admin credentials:
- username: admin
- password: admin
- Search for Users
- Admins can search for users by their username or email using the admin dashboard.
- Enable/Disable Users
- Admins can activate or deactivate user accounts via toggle controls.
- Edit or Delete Posts
- Admins have the ability to edit or remove user-submitted posts through the admin interface.

Security Features
- Client-Side Security
- User passwords are hashed using password_hash() before being stored in the database.
- Server-Side Security
- Sensitive files like config.php are securely placed in protected directories to prevent direct access.
- Appropriate Security for Data
- SQL injection is mitigated using prepared statements with PDO. Input sanitization is handled on both client and server sides with prepare statments.

Technical Functionality
- Website Hosting
- The live site is hosted at:
  - cosc360.ok.ubc.ca/mmridul/cosc_360_final_project/FrontEnd/HTML/home.php
- Discussion Threads Stored in Database
- All product-specific comments are stored persistently in the MySQL database.
- Asynchronous Comment Updates
- AJAX is used to fetch updated comments every 30 seconds without requiring a page refresh.
- Server-Side Scripting
- PHP is used to handle authentication, database queries, form processing, and admin functionalities.
Database Functionality
- A fully functional MySQL database is implemented with tables for users, products, comments, and admin control.
Error Handling
- The website includes fallback messages for invalid navigation (e.g., missing product ID or unauthorized access).
- Simple Discussion Grouping
- Each product page contains a comment thread (topic) that groups discussion relevant to that product.
File Description
- FrontEnd: Actually contains all the frontend files that are actually shown to the user. 
- CSS - This folder contains all the css for relevant files.
- HTML - This contains HTML and PHP files that are presented to the user. 
- aboutUs.php - About us page
- Admin.php - Admin dashboard
- Cart.html - Cart Page
- Cart.php -  Cart implementation page (still needs implementation).
- Contact.php - Page to contain the host. 
- createProduct.php - Page to create new product. 
- Delete_post.php - PHP process to delete a post.
- Get_comments.php - PHP process to get comments.
- Home.php - Home page.
- Login.php - Login page
- Login_process.php-  PHP process for login. 
- Post_comment.php - PHP process to post comments.
- productDetails.php - Page for each individual product where users can comment.
- Profile.php - User profile page
- Signup.php -  Signup page
- Singup_process.php -  PHP process for signup
- Toggle_user.php - PHP process to enable/disable user
- updateProfile.php - PHP process to update user info. 
- Script - This contains all the JS files used for validation. 
- Tests - Contains tests for JS validation.
- contact.js - Contains tests validation for contactUs page.
- createProduct.js - Contains test for createProduct page.
- signupvalidation.js - Contains test for signup page. 


Site Overview:
The website is essentially an e-commerce platform built on PHP that lets users browse, search for products, register, log in, leave comments on things, and manage their accounts. An admin panel for controlling users and postings is also included. PHP and MySQL are used to build the backend, and HTML, CSS, and JavaScript are used to create the frontend, which has a responsive design and dynamic content loading with AJAX.

Limitations:
Cart functionality is incomplete
No payment integration is implemented
No email verification or password recovery is implemented
The current architecture may not scale well with large user volumes.


