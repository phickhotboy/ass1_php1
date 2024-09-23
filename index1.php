<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: login.php');
    exit();
}

// Mảng sản phẩm mẫu
$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

// Xóa sản phẩm
if (isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];
    foreach ($products as $key => $product) {
        if ($product['id'] == $id) {
            unset($products[$key]);
            break;
        }
    }
    $_SESSION['products'] = array_values($products); // Cập nhật lại mảng
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <?php
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            echo '<div class="d-flex justify-content-between align-items-center mb-4">';
            echo '<span>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</span>';
            echo '<a href="logout.php" class="btn btn-success">Logout</a>';
            echo '</div>';
        }
        ?>
        <h2 class="text-center">Quản lý sản phẩm</h2>
        <a href="addProduct.php" class="btn btn-primary">Thêm sản phẩm</a>

        <h3>Danh sách sản phẩm</h3>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>"
                            alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid">
                        <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p><?php echo htmlspecialchars($product['price']); ?> VND</p>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <a href="editProduct.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">Sửa</a>
                            <button type="submit" class="btn btn-danger" name="deleteProduct">Xóa</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>