<kbd>[<img title="Serbian" alt="Serbian" src="https://cdn.staticaly.com/gh/hjnilsson/country-flags/master/svg/rs.svg" width="22">](../README.md)</kbd>
<kbd>[<img title="Italian" alt="Italian" src="https://cdn.staticaly.com/gh/hjnilsson/country-flags/master/svg/it.svg" width="22">](README.ita.md)</kbd>

## Online library | Web application & API | Laravel 9  <img height="25" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />
### What is "Online library"?
>The online library is a project of the ICT Cortex Academy intended for high school students in order to better and more efficiently prepare for all the future challenges that await them. More info is below...

![dahboard-page](https://i.postimg.cc/VLj9MD8R/dashboard.png)
![book](https://i.postimg.cc/gJHd8Cgp/knjiga.png)
![crop](https://i.postimg.cc/qv6Tjh1j/image-crop.png)

## Required
* PHP >= v.8.0 
* Composer >= v.2.4
* We suggest you visit Laravel's official website

#### GD - PHP extension for photo manipulation
In this project are used packages for dynamically manipulating the attached photos, so it is possible that an error may appear if your "php.ini" file is not configured correctly. By default, this file disables certain extensions and these packages (dependencies) that we used in the project. All you need is:
<br>
->  Open your "php.ini" file as a text document (using Notepad or other similar software)
<br>
->  Find the line `;extension=gd` and change it to `extension=gd`
<br>
->  Restart your apache server
> If you don't know how to find the "php.ini" file... the most common path is `C:\php`. You can also type the command: `php --ini' in the command prompt to get more information

#### Possible error: 
-> "Unsupported cipher or incorrect key length. Supported ciphers are..."
<br>
It is a wrong generated APP_KEY ie. an application encryption key. Open the ".env" file located at the root of the project. Delete the entered value and run the command:
> php artisan key:generate

-> "SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it"
<br>
You may not have started your local server. Depending on which software you are using as a server package, start it as well as the Apache server and try again. Known softwares: WAMP, XAMPP, ampss, and so on.

## Installation
* Clone this repository using this command:
```shell
git clone https://github.com-tim4-22/library.git
 ```
* Enter the root folder if you are not already there

* Install/update composer packages:
```shell
composer install | composer update
```
* Copy .env.example file to the .env file and configure the variables according to your environment
* You can do this with the following command:
```shell
cp .env.example .env
```
* Since this application uses Algolia for searching, you will need to ask the administrator for the keys of the following variables:
```shell
SCOUT_DRIVER | SCOUT_QUEUE | ALGOLIA_APP_ID | ALGOLIA_SECRET
```
* Also, since this app uses Laravel Socialite for registration/log in using a third-party app/platform like Google, GitHub, etc. you will need to ask the administrator for the keys of the following variants:
```shell
GITHUB_CLIENT_ID | GITHUB_CLIENT_SECRET | GITHUB_REDIRECT_URL
```

* If you want to integrate the newsletter, you can define your own values ​​for the specified variables:
```shell
MAILCHIMP_APIKEY | MAILCHIMP_LIST_ID
```
We use a newsletter mail service: Mailchimp

* If you want to visit your local database in a fast, efficient, and modern way, you can easily do it with the admin that we have integrated together with the application. You can visit the Admin UI by going to:
```shell
{{base_url}}/adminer
```
We use the theme: Hydra Dark

* Generate encryption key:
```shell
php artisan key:generate
``` 
* Run migrations:
```shell
php artisan migrate 
```
* If your database is already filled use this command:
```shell
php artisan migrate:fresh
```     
* For testing purposes, you can use Laravel's already built-in server with the command:
```shell
php artisan serve
```

After executing all the above commands, you should run the application and see it at http::/localhost of your domain depending on your configuration.

> Note 1.1: If you want to write/execute already existing tests, be sure to change the env variable: APP_ENV=local -> APP_ENV=testing

> Note 1.2: If you want to back up your database, do so using the integrated package command:
```shell
php artisan backup:run
```

## Project organization
> All progress is tracked on the following project management platform:
- Trello
- monday.com
- Asana
#### All boards are synchronized.
> for links contact the administrator

## Credentials
* You can log in with the following credentials:
    * Email address: admin@gmail.com
    * Password: nekalozinka
    
* Project Workflow
    - When starting the application, you will be shown a "welcome" page with additional information
    - When you log in, you will be redirected to the "dashboard" page where you can see more things like the latest activities (same day), latest book bookings, book statistics, and so on
    - On this page you can go to other pages using the side menu (sidebar), enter your profile, log out, and more
    - Click on the image in the upper right corner to enter your profile or log out
    - Each user can delete his account, with a previously confirmed (dialog box) after which the application redirects him to a special "Goodbye" page
    
* There are three roles: 
- `administrator`, `librarian` and `student`

## Roles

### Administrator
* The administrator has access to everything on the application

### Librarian
* Ability to create, modify and delete:
- student
- book
- author
- category, genre, publisher, binding, format, letter
* Available **operations**:
- To issue a copy of the book
- To write off a copy of the book
- To return a copy of the book
- To reserve a copy of the book

### Student
* Available **operations**:
- To issue a copy of the book and **just one in the moment**
* If the student has:
- an active reservation or a pending reservation, a book reservation request cannot be sent
- if you have a rejected or expired reservation, you can send a request for a book reservation

## Tabular view:

| Functionality     | Administrator        | Librarian      | Student  |
| ------------- |:-------------:|:-------------:| -----:|
| Shutting down the application | ✔️ | ❌ | ❌ |
| Application activation        | ✔️ | ❌ | ❌ |
| Database management - CSV     | ✔️ | ❌ | ❌ |
| Alteration of meta information| ✔️ | ❌ | ❌ |
| Changing global variables     | ✔️ | ❌ | ❌ |
| CRUD over admins              | ✔️ | ❌ | ❌ |
| CRUD over librarians          | ✔️ | ✔️ | ❌ |
| CRUD over students            | ✔️ | ✔️ | ❌ |
| CRUD over books               | ✔️ | ✔️ | ❌ |
| CRUD over authors             | ✔️ | ✔️ | ❌ |
| CRUD over settings            | ✔️ | ✔️ | ❌ |
| Editing your profile          | ✔️ | ✔️ | ✔️ |
| Display of available books    | ✔️ | ✔️ | ✔️ |
| Rented books                  | ✔️ | ✔️ | ❌ |
| Returned books                | ✔️ | ✔️ | ❌ |
| Overdue books                 | ✔️ | ✔️ | ❌ |
| Active book reservations      | ✔️ | ✔️ | ✔️ |
| Archived book reservations    | ✔️ | ✔️ | ✔️ |
| Book reservations             | ✔️ | ✔️ | ✔️ |

## Note:
> If the reservation is made by a librarian, it immediately gets the status "Accepted", and if it is made by a student, it gets the status "Pending" until the librarian accepts it.

## Returning the book
> Action - the book return operation is available only if the book has been issued

## Writing off the book
> Action - the book write-off operation is available only if the book is overdrawn

## Reservations - statuses
> Reservations have 5 statuses:
- Accepted
- Rejected
- On hold
- Archived
- Expired
## Sessions - flash messages - statuses
- Info
- Successfully
- Failed

## Protection and security
- Middleware protection on all routes (web and API)
- CSRF token - protection
- Used policies
- Password hashing - bcrypt
- Protection on three levels.. by roles -> administrator, librarian, and student
- Honeypot 
- XSS protection

## Cron jobs - scheduled tasks
> There are 3 tasks:
- The first task that is executed on a daily basis and that automatically archives active expired reservations
- Another task that is executed on a monthly basis and automatically deletes users who have not logged in for more than 365 days
- The third task is executed twice a day and automatically changes the status of the library in terms of work. When the library is closed, the status is '0', and when it is open, it is '1'. With defined working hours, start and end in hours, this task executes in those times and changes the status

## Shutdown mode
> The administrator can "send" the application to the so-called "shutdown" mode. Laravel has a built-in "php artisan down" command that "shuts down" the application.
Our application work using the web route "/shutdown" which is protected.

### Steps:
1. When you want to shut down the application -> Go to URL "{{base_url}}/shutdown" ! note: you must be logged in and be an "administrator"
2. When you want to start the application -> Go to the URL "{{base_url}}/live.php" after which a "redirect" page will appear

## Additional
* Auto deployment - cPanel
* Cron jobs
* Ajax requests
* Detailed flash-session messages 
* Users, categories and genres have standard (default) photo
* Dynamic statistics on the "dashboard" page
* Implemented Tailwind pagination with a dropdown list
* Laravel Events & Listeners (last login at, login count)
* Laravel Accessors
* Laravel Task Scheduling
* Laravel Eloquent / Query Builder
* Custom Laravel Validation rules
* Laravel components
* Pagination policy
* Organized routes by folders
* Notification count 
* Password indicator - functionality
* Full text search | Algolia | Laravel Scout
* Multiple delete
* Autocomplete fields for email, username - functionality
* Added CKEditor as "rich" text editor
* Compressing and resizing (automatically fitting width) uploaded photos
* Image cropping
* Maintenance mode and page for it
* Optimal performance(242ms) GTmetrix Grade
* "Not found" page
* "Not allowed" page
* Appropriate title and meta tags
* Individual information during the selection
* API Token expire -> 1h -> 3600s
* API Token revoke after password change
* API Resources and Collections
* Validation of email address (school email)
* Preloader - animation
* User genders
* Password eye - functionality
* PDF attachment for books
* Word Matching (1 copy, 4 copies)
* Custom web routes for log in and register
* CSV manual
* 3 login attempts allowed
* Multi filters
* Standard (default) data during migrations
* Scroll indicator - functionality
* Scroll to top - functionality
* Structured code, routes and folders
* Correct HTTP status codes
* Full screen - functionality
* Sorting in both directions (asc,desc) - functionality
* SEO optimized routes
* Minified code
* Load more - animation
* Customized validation messages
* Image preview - Lightbox - functionality
* Form validation

## RESTful API - Passport

[Documentation - Postman](https://tinyurl.com/bdz4jar6)

[Documentation - Swagger](https://tinyurl.com/44yz58v2)

This API contains:

77 requests, of which:

* 46 GET requests
* 11 POST requests
* 10 PUT requests
* 10 DELETE requests

Each request must be prefixed with "v1" -> version 1.0.
### Possible errors

error-0001 -> Not found, 404

error-0002 -> Incorrect request, 400

error-0003 -> Validation error, 422

error-0004 -> Wrong role, 406

error-0005 -> The book has no author, category, or genre, 406

Found a bug?
-------------
[Send issue](https://github.com/ca-tim4-22/library/issues) (requires GitHub account)

## Contribute to the project
[CONTRIBUTING.md](/CONTRIBUTING.md)

## 🚀 Used technologies

* PHP v.8.1.
* Laravel v.9.32 / Laravel Blade
* MySQL
* Ajax
* HTML v.5 / CSS v.3 / Tailwind CSS v.3
* JavaScript / JQuery v.3.6
* cdnjs
* Tippy.js
* Sweet Alert v.2
* Popper.js
* Font Awesome v.5.15
* Flowbite

## 🚀 Additional tools and packages
* Mailtrap
* Algolia
* Laravel UI
* Laravel Sluggable
* Laravel Debugbar
* Laravel Telescope
* Laravel Socialite
* Laravel Backup
* Laravel IDE helper
* CKEditor 
* Composer
* Tinker
* Enlightn
* Git/GitHub
* Swift Mailer
* Heroku
* Laravel Scout
* GitHub Actions / FTP Deploy
* HTML Laravel Collective v.6
* FakerPHP
* Guzzle
* Intervention Image
* ijaboCrop Tool
* Passport authentication
* Query detector
* Postman
* Swagger
* Insomnia
* GTmetrix
* Visual Studio Code
* phpMyAdmin
* Git/GitHub
* Adminer
* HeidiSQL
* XAMPP
* Honeypot
* Mailchimp integration
* reCAPTCHA

## 🚀 GitHub actions
* GitHub pages
* Auto deployment on hosting
* Image Compressing
* Enlightn checks
* Dependabot
* First interaction

> team nullable()
<div>
<a href="https://perisicnikola37.github.io/nullable" target="_blank"><img src="https://i.postimg.cc/LXgdny5s/nullable.jpg" width="35"></a>
<a href="https://ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/CMHZTdSJ/cortex.jpg" width="35"></a>
<a href="https://academy.ictcortex.me/" target="_blank"><img src="https://i.postimg.cc/h46syRT4/cortex-academy-logo.png" width="35"></a>
<a href="https://www.elektropg.online/" target="_blank"><img src="https://i.postimg.cc/cHNTcVzk/elektro-logo.png" width="35"></a>
<a href="https://cg.cobiss.net/" target="_blank"><img src="https://i.postimg.cc/152Vp9xP/cobiss-logo.png" width="35"></a>
<a href="https://coinis.com/" target="_blank"><img src="https://i.postimg.cc/ZnhJsPWZ/coinis.jpg" width="35"></a>
</div>





