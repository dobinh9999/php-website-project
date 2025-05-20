<?php
    include "../../config/database.php";
    session_start();

    $full_name = $_POST["full-name"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];
    $user_id = $_SESSION["user_id"];
    function handleFileUpload(){
        $upload_dir = '../../admin/uploads/user/';
        if (!is_dir($upload_dir)) {
            echo "Không tồn tại thư mục uploads/user";
            exit();
        }else{
            if (isset($_FILES['profile-picture'])) {
                $tmp_file = $_FILES['profile-picture']['tmp_name'];
                $new_filename = basename($_FILES['profile-picture']['name']);
                $upload_file = $upload_dir . $new_filename;
    
                if (move_uploaded_file($tmp_file, $upload_file)) {
                    echo "File đã được upload thành công!";
                } else {
                    echo "Có lỗi xảy ra khi upload file!";
                    exit();
                }

                return $upload_file;
            } else {
                echo "Không có file nào được upload.";
                exit(); 
            }
        }
    }

    if(isset($_POST['submit'])){
        $birthday = date('Y-m-d', strtotime($_POST["birthday"])); // Đảm bảo định dạng là YYYY-MM-DD
        
        $upload_file = handleFileUpload();
        
        $stmt = $conn->prepare("INSERT INTO user_detail (user_id, full_name, profile_picture_url, birthday, gender, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $stmt->bind_param("isssss", $user_id, $full_name, $upload_file, $birthday, $gender, $phone_number);

        if ($stmt->execute()) {
            header("Location: ../../Home.php");
            exit();
        } else {
            echo "Lỗi khi insert dữ liệu: " . $stmt->error;
        }

        $stmt->close();
    }
    mysqli_close($conn);
?>