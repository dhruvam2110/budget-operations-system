# 💰 Budget Operations System

The **Budget Operations System** is a web-based financial planning tool designed to help companies efficiently manage and track annual budgets. Users can define the **total annual budget**, allocate funds to various **departments**, log **department-wise planned expenditures**, and manage **sponsor income** to optimize budget allocation. The system maintains records across financial years and provides **real-time graphical insights** for informed financial decisions.

---

## 🚀 Features

- Define and manage the total annual budget for each financial year.
- Allocate budgets to different departments from the total pool.
- Departments can enter their planned expenditures.
- Monitor how the budget is distributed and utilized.
- Add and track sponsor contributions (planned income).
- View real-time dashboards with insightful financial graphs.
- Retain historical data across years for comparison and analysis.
- Full user authentication (login, registration, password reset).
- User profile view and editing functionality.

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


- Register or log in to your account.
- Set the total budget for a new financial year.
- Allocate portions of the budget to different departments.
- Departments enter their planned expenditures.
- Add sponsor income for better budget planning.
- Monitor financial health and balance with real-time charts.
- View and manage historical data year-over-year.
- Update your profile as needed.

---

## 🤝 Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your improvements.

---



