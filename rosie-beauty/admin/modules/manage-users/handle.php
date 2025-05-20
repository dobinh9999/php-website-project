<?php
    include "../../../config/database.php";

    $user_name = $_POST["user-name"];
    $user_email = $_POST["user-email"];
    $user_password = $_POST["user-password"];
    $user_role = $_POST["user-role"];
    $user_is_active = $_POST["user-is_active"];

    if(isset($_POST['update_user'])){
        $user_role = intval($_POST["user-role"]);
        $user_is_active = intval($_POST["user-is_active"]);
        $stmt = $conn->prepare("UPDATE user SET username = ?, email = ?, password = ?, role = ?, is_active = ? WHERE user_id = ?");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("sssiii", $user_name, $user_email, $user_password, $user_role, $user_is_active, $_GET['user_id']);

        if ($stmt->execute()) {
            header("Location: ../../index_admin.php?action=manage-users&query=add");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }else{
        $id = $_GET['user_id'];
        $stmt = $conn->prepare("DELETE FROM user WHERE user_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: ../../index_admin.php?action=manage-users&query=add');
    }
    mysqli_close($conn);
?>