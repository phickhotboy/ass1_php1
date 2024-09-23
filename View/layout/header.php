<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 20px;
        text-align: center;
    }

    .product-card img {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<body>
    <header>
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <img src="https://phuongnamvina.com/img_data/images/mau-logo-nha-sach.jpg" alt="" srcset=""
                        width="100px">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item ms-auto">
                    <?php
                    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
                        // Hiển thị logo và nút đăng xuất khi đã đăng nhập
                        echo '<a class="nav-link" href="logout.php">' . htmlspecialchars($_SESSION['username']) . ' <img src="path/to/logo.png" alt="Logo" width="20px" /> Logout</a>';
                    } else {
                        // Hiển thị nút đăng nhập khi chưa đăng nhập
                        echo '<a class="btn btn-warning" href="login.php">Login</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
