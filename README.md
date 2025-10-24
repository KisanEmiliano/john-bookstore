# John Bookstore (Test Project)

## 1. System Requirements

| Tool / Software       | Version / Notes         |
|----------------|--------------------|
| PHP            | PHP ≥ 8.1 (tested on PHP 8.3 via Laravel Herd) |
| Composer       | Latest version |
| MySQL Database | MySQL ≥ 5.7 (using Laragon) |
| Web Server     | php artisan serve (localhost:8000)     |
| Git            | Optional (to clone the repository) |

---

## 2. Clone the Project
```bash
git clone https://github.com/KisanEmiliano/john-bookstore.git
cd john-bookstore
```
## 3. Install Dependencies
```bash
composer install
```
## 4. Configure Environment File
Copy .env.example to .env:
```bash
cp .env.example .env
```
Then open the .env file and adjust your database settings:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=johnbookstore
DB_USERNAME=root
DB_PASSWORD=   
```
## 5. Create Database
1. Open phpMyAdmin / HeidiSQL / MySQL Workbench
2. Create a database manually named:
```bash
johnbookstore
```
## 6. Run Migration (Create Tables)
```bash
php artisan migrate
```
## 7. Run the Application
1. Run Laravel backend
```bash
php artisan serve
```
This starts the application at:
```bash
http://localhost:8000
```
2. Run Frontend (Tailwind CSS + Vite)
In another terminal, run:
```bash
npm install       # only first time
npm run dev
```
This compiles Tailwind CSS and ensures the UI loads correctly.
Without this command, the page will load but styles will not appear properly.

## 8. API Testing (Optional)
| Method         | Endpoint    | Description    |
|----------------|-----------  |--------------- |
| GET            | /api/books  | Get list of books (from highest to lowest average rating)|
| GET            | /api/authors| Get top rated authors  |
| POST           | /api/rating | Submit rating (author, book, rating) |

## 9. Default Folder Structure
```bash
app/
├── Http/Controllers/
│   ├── BookController.php
│   ├── RatingController.php
│   └── UserController.php
├── Models/ (User, Book, Rating)
routes/
├── web.php
database/
├── factories/
├── migrations/
resources/views/
