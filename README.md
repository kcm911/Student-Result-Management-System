# Student Result Management System

## Overview

The Student Result Management System is a web-based application developed to simplify the management of student records, subjects, examination results, and notices. The system allows administrators to efficiently manage academic information while enabling students to search and view their examination results online.

This project was developed as part of the **COS209** module using PHP, MySQL, HTML, CSS, and JavaScript.

---

## Features

### Administrator
- Secure administrator login
- Add, update, and manage student records
- Add and manage subjects
- Record and update examination results
- Publish notices and announcements
- Change administrator password
- Dashboard for managing the system

### Student
- Search for examination results
- View subject grades
- Access published notices
- Simple and user-friendly interface

---

## Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP (Apache & MySQL)

---

## Project Structure

```
Project/
│
├── addnotice.php
├── addresult.php
├── addstu.php
├── addsub.php
├── dashboard.php
├── studentresultsearch.php
├── sturesult.php
├── notice.php
├── teacherlogin.php
├── dbc.php
├── KCM COS209 DB.sql
├── images/
└── CSS files
```

---

## Installation

### Prerequisites

- XAMPP (or any Apache & MySQL server)
- PHP
- MySQL

### Steps

1. Clone this repository.

```bash
git clone https://github.com/kcm911/student-result-management-system.git
```

2. Move the project folder into the XAMPP `htdocs` directory.

3. Start **Apache** and **MySQL** using XAMPP.

4. Open **phpMyAdmin**.

5. Create a new database.

6. Import the provided SQL file:

```
KCM COS209 DB.sql
```

7. Open your browser and navigate to:

```
http://localhost/Project
```

---

## Screens Included

- Administrator Login
- Dashboard
- Student Management
- Subject Management
- Result Management
- Notice Board
- Student Result Search

---

## Learning Outcomes

Through this project I gained practical experience with:

- Building full-stack web applications
- PHP server-side programming
- MySQL database design and management
- CRUD (Create, Read, Update, Delete) operations
- User authentication
- Database connectivity using PHP
- Form validation
- Organizing a multi-page web application

---

## Future Improvements

- Responsive mobile design
- Password hashing for improved security
- Role-based authentication
- Export results as PDF
- Student login portal
- Email notifications
- Search and filtering improvements
- REST API integration

---

## Author

**Khant Chan Myae**

BSc Computer Systems Engineering

AWS Certified Cloud Practitioner

GitHub: https://github.com/yourusername

---

## License

This project was developed for educational purposes as part of the COS209 coursework.
