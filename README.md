# Budget Operations System

## Overview
Budget Operations System is a web-based application designed to help users efficiently manage their yearly budgets. It allows users to add budget details, track expenditures, and monitor sponsor earnings for each year. The system also provides graphical visualizations to easily understand financial data.

## Features
- User Authentication
  - Registration
  - Login
  - Forgot Password functionality
- Profile Management
  - Edit user profile details
- Budget Management
  - Add and update budget allocations for each year
  - Record expenditures against budgets
- Sponsor Management
  - Track sponsor earnings for each year
- Data Visualization
  - Interactive graphs to display budgets, expenditures, and sponsor earnings over time

## Technologies Used
- Backend: Laravel 
- Frontend: Bootstrap, AJAX, jQuery 
- Database: MySQL

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/dhruvam2110/budget-operations-system.git
   
2. Install Dependencies
   composer install
   npm install
   
3. Setup the environment variables
   Copy .env.example to .env
   Configure database credentials and other settings in .env 

4. Run migrations and seeders:
   php artisan migrate --seed

5. Start the development server:
   php artisan serve

## Usage

Register a new user or login with existing credentials.

Add budget details and expenditures for each year.

View sponsor earnings and financial data through graphs.

Edit your profile information anytime.
