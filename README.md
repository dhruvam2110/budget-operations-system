# 💰 Budget Operations System

A web-based Budget Operations System software that helps users manage their annual budgets efficiently. Users can add details of planned budgets and record actual expenditures for each year. It also includes a section for sponsor earnings, all visualized through graphs. The system features user authentication with login, registration, password reset, and profile editing capabilities.

---

## 🚀 Features

- Add budget details for each year.
- Record and update expenditures.
- Track sponsor earnings year-wise.
- View financial data in interactive graphs.
- User registration, login, and password recovery.
- Profile management and edit functionality.

---

## 🛠️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/budget-operations-system.git
cd budget-operations-system
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Set up environment variables

- Copy `.env.example` to `.env`:
  ```bash
  cp .env.example .env
  ```

- Configure your `.env` file with database and other credentials:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=budget
  DB_USERNAME=your_username
  DB_PASSWORD=your_password
  ```

### 4. Generate app key

```bash
php artisan key:generate
```

---

## 📦 Database Setup

### 1. Create a New Database

Create a new MySQL database named `budget`:

```sql
CREATE DATABASE budget;
```

### 2. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

Or, to reset and start fresh with seeding:

```bash
php artisan migrate:fresh --seed
```

---

## ▶️ Running the Application

Start the Laravel development server:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

## 🧪 Usage

- Register a new user or log in with existing credentials.
- Add budget allocations and expenditure records.
- View sponsor earnings year-wise.
- Monitor all data through easy-to-understand graphs.
- Edit profile information as needed.

---

## 🤝 Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your improvements.

---



