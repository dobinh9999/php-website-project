<?php
    include "../../../config/database.php";
// $birthday = date('Y-m-d', strtotime($_POST["birthday"])); // Đảm bảo định dạng là YYYY-MM-DD
        
    $promotion_name = $_POST["promotion-name"];
    $discount_type = $_POST["discount-type"];
    $discount_value = $_POST["discount-value"];
    $start_date = $_POST["start-date"];
    $end_date = $_POST["end-date"];

    echo $promotion_name . " " . $discount_type . " " . $discount_value . " " . $start_date . " " . $end_date;

    if(isset($_POST['add_promotion']) && ($_POST['add_promotion'])){
        $start_date = date('Y-m-d', strtotime($_POST["start-date"])); 
        $end_date = date('Y-m-d', strtotime($_POST["end-date"])); 
        $stmt = $conn->prepare("INSERT INTO promotion (name, discount_type, value, start_date, end_date) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("ssdss", $promotion_name, $discount_type, $discount_value, $start_date, $end_date);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-promotion&query=list");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else if(isset($_POST['update_promotion'])){
        $stmt = $conn->prepare("UPDATE promotion SET name = ?, discount_type = ?, value = ?, start_date = ?, end_date = ? WHERE promotion_id = ?");

        $stmt->bind_param("sssii", $promotion_name, $discount_type, $discount_value, $start_date, $end_date, $_GET['promotion_id']);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-promotion&query=list");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else{
        $id = $_GET['promotion_id'];
        $stmt = $conn->prepare("DELETE FROM promotion WHERE promotion_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-promotion&query=list');
    }
    mysqli_close($conn);
?>