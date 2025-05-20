<?php
    include "../../../config/database.php";

    $category_id = $_POST['category-id'];
    $product_type = $_POST['category-name'];

    if(isset($_POST['add_category'])){
        $stmt = $conn->prepare("INSERT INTO categories(category_id, name) VALUES (?, ?)");
        $stmt->bind_param("ss", $category_id, $product_type);
        $stmt->execute();
        // Kiểm tra kết quả
        if($stmt->affected_rows > 0) {
            header('Location: ../../index_admin.php?action=manage-category&query=add');
        }
        $stmt->close();
    }else if(isset($_POST['update_category'])){
        $stmt = $conn->prepare("UPDATE categories SET name = ? WHERE category_id = ?");
        $stmt->bind_param("ss", $product_type, $_GET['category_id']);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-category&query=add');
    }else{
        $id = $_GET['category_id'];
        $stmt = $conn->prepare("DELETE FROM categories WHERE category_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-category&query=add');
    }
    mysqli_close($conn);
?>