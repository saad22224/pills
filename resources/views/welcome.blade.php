<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task & Finance Management</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .header {
            background-color: #2d3748;
            color: white;
            padding: 10px 20px;
            text-align: center;
            font-size: 24px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        /* Navigation links at the top */
        .auth-links {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 20;
        }

        .auth-links a {
            color: white;
            background-color: #4caf50;
            padding: 7px 15px;
            margin: 0 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }



        @media (max-width: 929px) {
            .auth-links {
                position: absolute;
                top: 65%;
                right: 39%;
                z-index: 20;
            }
        }


        .auth-links a:hover {
            background-color: #45a049;
        }

        /* Main Content Section */
        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 120px;
            text-align: center;
        }

        .main-content h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .main-content p {
            color: #777;
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .cta-button {
            background-color: #4caf50;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .cta-button:hover {
            background-color: #45a049;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            padding: 6px;
            background-color: #2d3748;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {

            /* Resize header */
            .header {
                font-size: 20px;
            }

            /* Stack the auth links vertically */
            .auth-links {
                position: absolute;
                top: 60%;
                right: 39%;
                z-index: 20;
            }

            .auth-links a {
                margin: 5px 0;

            }

            /* Adjust content for small screens */
            .main-content h2 {
                font-size: 28px;
            }

            .main-content p {
                font-size: 16px;
            }

            /* Adjust button size */
            .cta-button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {

            /* Further adjust content for very small screens */
            .header {
                font-size: 18px;
            }

            .main-content h2 {
                font-size: 24px;
            }

            .main-content p {
                font-size: 14px;
                margin-bottom: 20px;
            }
            .auth-links {
                position: absolute;
                top: 40%;
                right: 30%;
                z-index: 20;
            }
            .cta-button {
                padding: 6px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        Task & Finance Management System
    </div>

    <!-- Auth Links (Login/Register) -->
    <div class="auth-links">
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
        <a href="{{ route('login') }}">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
        @endif
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <h2>Manage Your Tasks and Finances Efficiently</h2>
        <p>Stay organized by managing your daily tasks, tracking expenses, and handling payments all in one place.</p>
        <a href="{{ route('dashboard') }}" class="cta-button">Get Started</a>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2025 Finance Management System developed by Eng: <span style="color: #4caf50;">saad harera</span></p>
    </div>

</body>

</html>
