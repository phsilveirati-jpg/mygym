
# MyGym: Laravel Gym Management System

MyGym is a modern gym management web application built with Laravel and Docker. It enables gym owners and staff to manage classes, bookings, users, and notifications efficiently. The project demonstrates best practices in Laravel development, including authentication, role management, notifications, and containerized deployment.

---

## 🚀 Features
- **User Roles:** Trainer, and Member roles with different permissions.
- **Class Scheduling:** Create, update, and cancel gym classes.
- **Bookings:** Members can book and manage class attendance.
- **Notifications:**  Email and in-app notifications for class updates and reminders.
- **Authentication:** User registration and login via Laravel Breeze.
- **Responsive:** Built with Tailwind CSS and Vite.
- **Testing**: Feature and unit tests included.

---

## 🛠️ Technologies Used
- [Laravel 11](https://laravel.com/)
- [Docker & Docker Compose](https://www.docker.com/)
- [SQLite](default, can be changed to MySQL or PostgreSQL)
- [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#breeze)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vite](https://vitejs.dev/)
- [PHPUnit](https://phpunit.de/)

---

## 📦 Project Structure

```
├── app/                # Application core (Models, Controllers, etc.)
├── bootstrap/          # Laravel bootstrap files
├── config/             # Configuration files
├── database/           # Migrations, seeders, factories
├── public/             # Publicly accessible files
├── resources/          # Views, CSS, JS
├── routes/             # Route definitions
├── storage/            # Logs, cache, file uploads
├── tests/              # Unit and feature tests
├── docker-compose.yml  # Docker configuration
└── ...
```

---

## ⚡ Getting Started

### Prerequisites
- [Docker](https://docs.docker.com/get-docker/) & [Docker Compose](https://docs.docker.com/compose/)
- [Composer](https://getcomposer.org/) (for non-Docker local setup)
- [Node.js & npm](https://nodejs.org/) (for asset compilation)

### Local Setup (with Docker)
1. **Clone the repository:**
   ```sh
   git clone https://github.com/viejopeter/mygym.git
   cd mygym
   ```
2. **Copy environment file:**
   ```sh
   cp .env.example .env
   ```
3. **Start Docker containers:**
   ```sh
   docker-compose up -d
   ```
4. **Install Composer dependencies (inside container):**
   ```sh
   docker-compose exec app composer install
   ```
5. **Generate application key:**
   ```sh
   docker-compose exec app php artisan key:generate
   ```
6. **Run migrations and seeders:**
   ```sh
   docker-compose exec app php artisan migrate --seed
   ```
7. **Install Node dependencies & build assets:**
   ```sh
   docker-compose exec app npm install
   docker-compose exec app npm run build
   ```
8. **Access the app:**
   Visit [http://localhost](http://localhost)

### Local Setup (without Docker)
1. Install PHP, Composer, MySQL, Node.js, and npm on your system.
2. Run steps 2, 4, 5, 6, and 7 above (without `docker-compose exec app`).
3. Start the Laravel server:
   ```sh
   php artisan serve
   ```

---

## 📝 Usage
- Admins: Manage users, class types, and scheduled classes.
- Trainers: View and manage their assigned classes.
- Members: Book, view, and cancel class bookings.
- Notifications: Receive updates for class cancellations and reminders.

---

## 🧪 Running Tests
- **Feature & Unit Tests:**
  ```sh
  # With Docker
  docker-compose exec app php artisan test

  # Without Docker
  php artisan test
  ```

---

## 🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

## 📄 License
This project is open source and available under the [MIT License](LICENSE).

---

## 👤 Author & Contact
- Pedro Quinchanegua
- [GitHub: viejopeter](https://github.com/viejopeter)
  ![Litenotes Logo](public/assets/img/qp-sb.png)
---

## 🌟 Acknowledgements
- Laravel, Docker, and the open-source community.
