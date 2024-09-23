<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: login.php');
    exit();
}

$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];
$id = $_GET['id'] ?? null;

if ($id) {
    $product = null;
    foreach ($products as &$p) {
        if ($p['id'] == $id) {
            $product = $p;
            break;
        }
    }

    if (!$product) {
        header('Location: index.php');
        exit();
    }

    // Cập nhật sản phẩm
    if (isset($_POST['editProduct'])) {
        $product['name'] = $_POST['name'] ?? $product['name'];
        $product['price'] = $_POST['price'] ?? $product['price'];
        $product['description'] = $_POST['description'] ?? $product['description'];
        if (!empty($_FILES["image"]["name"])) {
            $product['image'] = 'images/' . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $product['image']);
        }
        $_SESSION['products'][$id - 1] = $product; // Cập nhật mảng
        header('Location: index1.php');
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Sửa sản phẩm</h2>
        <form action="" method="post" enctype="multipart/form-data" class="mb-4">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" name="price" id="price" value="<?php echo htmlspecialchars($product['price']); ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-warning" name="editProduct">Cập nhật sản phẩm</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
