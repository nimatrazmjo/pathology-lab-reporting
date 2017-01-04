Pathology Reporting System
===================


Pathology lab reporting system, which can be used to publish medical test reports to patients.

functional specification
-------------

> - Operator users should be able to log in to the system to perform following privileged tasks. Patients cannot access these pages.
> Reports CRUD (Multiple tests and results in each report)
> Patients CRUD (including pass code) 
> - Lab sends a text message to the patient with a pass code to log in (out of scope).
> - Patient user could log in using his name (auto complete field) and pass code sent to him. And then can do the following:
> Display list of his reports.
> Display a report details as a page.
> Export a report as PDF.
> Mail a report as PDF

Prerequisites
-------------
>- Laravel 5
>- MySQL
>- NPM
>- Bower

Prerequisites
-------------
Please run following comment before running application on browser.

Make sure you have configured your database

>- create tables
> **php artisan migrate **
> - run seeders
> **php artisan db:seed**
>- **composer update**
>- **npm install**

Operator user name and password is :
> - **Email**: operator@gmail.com 
> - **Password**: operator123
