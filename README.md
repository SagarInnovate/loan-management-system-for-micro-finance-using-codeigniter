# Loan Management System for Microfinance Companies

A comprehensive web-based application built with CodeIgniter 3, HTML, CSS, JavaScript, and Bootstrap to streamline the loan management process for microfinance companies.

## Introduction

The Loan Management System is designed to help microfinance companies manage loans efficiently. It provides functionalities for loan application processing, approval, disbursement, repayment tracking, and reporting. This system aims to improve productivity and reduce manual paperwork, ensuring smooth operations and better service delivery.

## Features

- User-friendly interface for managing loans
- Role-based access control (Admin, Loan Officer, Customer)
- Loan application and approval process
- Automated loan repayment schedule generation
- Detailed loan and repayment reports
- Email,SMS notifications for loan status updates
- Secure login and data protection

## Installation Requirements


To set up and run this project, you need the following installed on your system:

- PHP 7.2 or higher
- MySQL 5.7 or higher
- Apache or Nginx server
- Composer

## Installation Steps

1. **Clone the repository**
   ```sh
   https://github.com/SagarInnovate/loan-management-system-for-micro-finance-using-codeigniter.git
   cd loan-management-system-for-micro-finance-using-codeigniter

2. **Install dependencies**
   ```sh
   composer install
   
4.  **Setup the database**
   Create a new database in MySQL.
   Import the provided SQL file (database/loan_management_system.sql) into your database.

6. **Configure the environment**
   Copy application/config/database.php.example to application/config/database.php and fill in your database details.
   ```sh
   cd application/config/database.php.example application/config/database.php
   
7. **Adjust Base URL**
   Edit application/config/config.php and set the base URL for your project.
   ```sh
   $config['base_url'] = 'http://localhost/loan-management-system/';
   
8. **Set up .htaccess**
   Ensure your .htaccess file is configured correctly for URL rewriting.
   
10. **Run the application**
    Start your Apache server and navigate to your base URL.

## Screenshots

- Add screenshots here showing different parts of your application.

## Demo Video

- Watch a full demo of the Loan Management System on YouTube.

## Contribution Guidelines
 We welcome contributions from the community. If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (git checkout -b feature-branch).
3. Make your changes and commit them (git commit -am 'Add new feature').
4. Push to the branch (git push origin feature-branch).
5. Create a new Pull Request.

## Conclusion
The Loan Management System is a robust solution tailored for microfinance companies to manage their loan portfolios efficiently. By automating various aspects of loan management, it helps in reducing errors, saving time, and improving overall operational efficiency.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

##Contact
For any questions or suggestions, please feel free to reach out:

- Email: sagarinnovate@gmail.com
- LinkedIn:[LinkedIn Profile](https://www.linkedin.com/in/sagarinnovate/)
- GitHub:  [GitHub Profile](https://github.com/sagarinnovate)
- Website: [Visit Now ](https://sagarinnovate.growmediax.com/)

Thank you for checking out the Loan Management System! We hope it helps you streamline your microfinance operations.

---

Feel free to edit the sections to match your project's specifics. Once you have your screenshots and video ready, you can add them to the appropriate sections in the README file.







