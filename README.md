# Kanye Quotes App

This is a simple Laravel 9 application that interacts with the [Kanye REST API](https://api.kanye.rest/) to display random Kanye West quotes on a web page and provides an API to fetch multiple random quotes in JSON format.

## Features

- Displays 5 random Kanye West quotes on a web page.
- Allows users to refresh the quotes.
- Requires user authentication to access the quotes page.
- Provides an API endpoint to fetch a specified number of random quotes in JSON format.
- API routes are secured with token-based authentication using Laravel Sanctum.
- A cron job can be set up to periodically fetch and store quotes with a retry mechanism in case of failure.

## Requirements

- PHP 8.0 or higher
- Composer
- Node.js and NPM
- Laravel 9.x
- MySQL or another supported database

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/kanye-quotes-app.git
    cd kanye-quotes-app
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Environment setup:**

    Copy the `.env.example` file to `.env` and update the environment variables with your database and other necessary configurations.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Run migrations:**
    ```bash
    php artisan migrate
    ```

5. **Install Laravel Breeze (for authentication):**
    ```bash
    php artisan breeze:install
    npm install && npm run dev
    php artisan migrate
    ```

6. **Install and configure Laravel Sanctum (for API authentication):**
    ```bash
    composer require laravel/sanctum
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    php artisan migrate
    ```

7. **Serve the application:**
    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000`.

## Usage

### Web Interface

- Visit `http://localhost:8000/quotes` to view 5 random Kanye West quotes.
- You must be logged in to access this page.
- Use the "Refresh Quotes" button to get a new set of quotes.

### API

- **Get X random quotes (JSON):**
  - Endpoint: `/api/quotes/{count}`
  - Method: `GET`
  - Authentication: Requires a valid Sanctum API token.

  Example request:
  ```bash
  curl -H "Authorization: Bearer YOUR_TOKEN" http://localhost:8000/api/quotes/5
