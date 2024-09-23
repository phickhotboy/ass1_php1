<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: login.php');
    exit();
}

$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

// Thêm sản phẩm
if (isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = 'images/' . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);

    $new_product = [
        'id' => count($products) + 1,
        'name' => $name,
        'price' => $price,
        'description' => $description,
        'image' => $image,
    ];
    $products[] = $new_product;
    $_SESSION['products'] = $products; // Cập nhật lại mảng
    header('Location: index1.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Thêm sản phẩm</h2>
        <form action="" method="post" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm ...">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm ...">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Nhập mô tả sản phẩm ..."></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>
            <button type="submit" class="btn btn-primary" name="addProduct">Thêm sản phẩm</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
