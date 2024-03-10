# Laravel Authentication System

This Laravel project provides a robust authentication system to secure your web application. It leverages Laravel's built-in features to handle user registration, login, and password reset functionalities.

## Features

- User Registration: Allow users to sign up with a unique email address and password.
- User Login: Provide a secure login mechanism for registered users.
- Password Reset: Enable users to reset their passwords in case they forget them.
- Middleware Protection: Utilize Laravel middleware to protect routes and ensure authenticated access.
- User Profile Management: Allow users to update their profile information.

## Requirements

- PHP >= 8.3.3
- Composer
- Laravel >= 10.x
- xampp 8.2.12

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/PeterWachira01/laravel-authentication.git
    ```

2. Navigate to the project directory:

    ```bash
    cd authsystem-app
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Configure your database connection details in the `.env` file.

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Serve your application:

    ```bash
    php artisan serve
    ```

9. Access your application at `http://localhost:8000` in your web browser.

## Usage

1. Register a new account.

2. Log in with your registered credentials.

3. Explore the authenticated features of the application.

## Security

- This authentication system follows best practices for securing user data.
- Laravel's built-in features, such as hashed passwords, CSRF protection, and middleware, are employed to enhance security.

## Contributing

If you find any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.

## License

This Laravel Authentication System is open-source software licensed under the [MIT license](LICENSE).

---
