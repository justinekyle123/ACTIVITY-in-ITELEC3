<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
             background-image: url('awad.gif');
            background-position: center;
            height: 100vh;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent navbar */
            color: white;
        }

        .navbar .navbar-brand, .navbar .nav-link {
            color: white !important;
        }

        .navbar .nav-link:hover {
            color: #ff7e5f !important;
        }

        .content-card {
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
            color: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            margin-top: 50px;
        }

        .content-card h1 {
            font-size: 4rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .content-card p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .cta-btn {
            font-size: 1.1rem;
            padding: 12px 25px;
            background: #ff7e5f;
            border: none;
            border-radius: 30px;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cta-btn:hover {
            background: #feb47b;
        }

        .icon-container {
            margin: 20px 0;
        }

        .icon-container i {
            font-size: 2.5rem;
            color: #ff7e5f;
            margin: 0 15px;
            transition: transform 0.3s ease;
        }

        .icon-container i:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="content-card">
            <h1>HELLO!</h1>
            <p>Welcome to my beautiful homepage. Explore and enjoy the design.</p>
            
            <!-- Icon Section -->
            <div class="icon-container">
                <i class="fas fa-home"></i>
                <i class="fas fa-user"></i>
                <i class="fas fa-cogs"></i>
            </div>

            <button class="cta-btn">Get Started</button>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
