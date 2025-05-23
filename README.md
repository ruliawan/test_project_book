# 📚 Laravel 10 Book Rating App

A Laravel 10 application that allows users to rate books, with features including:

- Bootstrap 5 for responsive styling  
- jQuery & Tom Select for enhanced UI interactions  
- Yajra DataTables for server-side processing  
- AJAX-powered dynamic select fields  
- SweetAlert2 for elegant alert dialogs  

---

## 🚀 Requirements

- PHP >= 8.1  
- Composer  
- Node.js and npm  
- A database (MySQL)

---

## 🛠️ Setup Instructions

1. **Clone the repository**

   - git clone https://github.com/ruliawan/test_project_book.git<br>
   - cd test_project_bbok

2. **Install PHP dependencies**

   - composer install
   
3. **Install Node.js dependencies and build assets**

   - npm install<br>
   - npm run build

4. **Set up environment configuration**

   - cp .env.example .env<br>
   - php artisan key:generate<br>
      * Edit the .env file and update the database and other environment settings.

5  **Run database migrations and seeders**

   - php artisan migrate --seed
   
6. **Serve the application**

   php artisan serve<br>
   
      *Visit the app at http://localhost:8000 or http://127.0.0.1:8000

7. **Open Page**

   - List of books with filter<br>
      *http://localhost:8000/book or http://127.0.0.1:8000/book

   - Top 10 most famous author<br>
     *http://localhost:8000/author or http://127.0.0.1:8000/author

   - Input rating<br>
     *http://localhost:8000/rating or http://127.0.0.1:8000/rating