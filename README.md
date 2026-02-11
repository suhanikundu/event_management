# Event Management System

A role-based web application developed using **HTML, CSS, PHP, and MySQL**.  
This system allows Admin, Vendor, and User to perform different operations based on their roles.

---

## Technologies Used

- Frontend: HTML, CSS
- Backend: PHP
- Database: MySQL (phpMyAdmin)
- Server: XAMPP (Apache + MySQL)

---

## Project Overview

The Event Management System is designed to manage:

- Users
- Vendors
- Memberships
- Transactions
- Cart & Orders

The application follows the given **flowchart structure** and includes proper session handling and role-based access control.

---

## 🔐 Login System

- Users log in using Email and Password.
- Password field is hidden (`type="password"`).
- Session variables are created after successful login:
  - `user_id`
  - `role`
  - `name`
- Redirection based on role:
  - Admin → Maintenance Module
  - Vendor → Vendor Dashboard
  - User → User Dashboard

---

##  Admin Module

Admin has access to:

###  Maintenance Menu (Admin Access Only)

- Add / Update Users
- Add / Update Vendors
- Manage Users
- Manage Vendors
- Add Membership for Vendor
- Update Membership for Vendor

---

### Maintain Users

- View all users (except admin)
- Add new user
- Update user
- Delete user

---

### Maintain Vendors

- View vendors
- Add vendor
- Update vendor
- Delete vendor
- Assign membership

---

## Vendor Module

After login as Vendor:

### Main Page Options:

-  Your Item
  - Insert
  - Delete

-  Add New Item
  - Product Status
  - Request Item
  - View Product

-  Transaction
  - User Request

---

##  User Module

User can access:

- Vendor
- Cart
  - Payment
  - Total Amount
  - Cancel
- Guest List
  - Update
  - Delete
- Order Status
  - Check Status

! User cannot access Maintenance Module.

---

##  Database Structure

### `users` Table

| Field         | Description |
|--------------|------------|
| id           | Primary Key |
| name         | User Name |
| email        | Email |
| password     | Password |
| role         | admin / vendor / user |
| category     | Vendor Category |
| membership_id| Membership Reference |
| created_at   | Timestamp |

---

##  Project Folder Structure

```
event_management/
│
├── admin/
│   ├── maintenance.php
│   ├── maintain_user.php
│   ├── maintain_vendor.php
│   ├── add_user.php
│   ├── update_user.php
│   ├── delete_user.php
│
├── user/
│   ├── dashboard.php
│
├── vendor/
│   ├── dashboard.php
│   ├── main_page.php
│
├── css/
│   ├── style.css
│
├── config.php
├── index.php
├── dashboard.php
├── logout.php
```

---

## Session Handling

All protected pages include:

```php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: index.php");
    exit();
}
```

Logout destroys session:

```php
session_destroy();
```

---

##  Features Implemented

-  Role-based login system
-  Admin-only maintenance module
-  Add / Update / Delete operations
-  Session validation
-  Password hidden on login
-  Radio button single selection
-  Form validation
-  Flowchart-based navigation

---

##  Testing

- Login validation tested
- Role-based redirection verified
- Session security checked
- CRUD operations working properly

---

##  Screenshots

(Add your project screenshots here)

- Login Page
  ![Login Page]("https://github.com/user-attachments/assets/5ad4ae87-7c07-4181-97dd-82d6bc5b57e3")
- Admin Dashboard
- Maintain Users
- Maintain Vendors
- Vendor Panel
- User Panel

---


---

##  Developed By

Suhani Kundu

