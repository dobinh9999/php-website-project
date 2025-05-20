<?php
    include "../../config/database.php";
    session_start();

    $nameAccount = $_POST["name-account"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirm-password"]);

    if(isset($_POST['register'])){
        // Check if the fields are empty
        if (empty($nameAccount) || empty($username) || empty($phone) || empty($address) || empty($email) || empty($password) || empty($confirmPassword)) {
            header("Location: ../../?action=account&error=Vui lòng điền đầy đủ thông tin");
            exit();
        }

        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../../?action=account&error=Email không hợp lệ");
            exit();
        }

        // Check the length of the username and password
        if (strlen($username) < 3 || strlen($password) < 6) {
            header("Location: ../../?action=account&error=Tên người dùng phải có ít nhất 3 ký tự và mật khẩu ít nhất 6 ký tự");
            exit();
        }

        // Check if the phone number is valid (only allows 10 digits)
        if (!preg_match('/^\d{10}$/', $phone)) {
            header("Location: ../../?action=account&error=Số điện thoại không hợp lệ");
            exit();
        }

        // Check for duplicate username or email
        $checkStmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
        if ($checkStmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $checkStmt->bind_param("ss", $username, $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $user = $checkResult->fetch_assoc();
            if ($user['username'] === $username) {
                header("Location: ../../?action=account&error=Tên người dùng đã tồn tại");
                exit();
            } elseif ($user['email'] === $email) {
                header("Location: ../../?action=account&error=Email đã được sử dụng");
                exit();
            }
        }else{
            if($password !== $confirmPassword){
                header("Location: ../../?action=account&error=Mật khẩu không khớp");
                exit();
            }else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
                if ($stmt === false) {
                    die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
                }

                $stmt->bind_param("sss", $username, $email, $password);
                $stmt->execute();
                $user_id = $conn->insert_id;
                $stmt2 = $conn->prepare("INSERT INTO user_detail (user_id, full_name, profile_picture_url, birthday, gender, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
                if ($stmt2 === false) {
                    die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
                }
                $profile_picture_url = null;
                $birthday = null;
                $gender = null;
                $stmt2->bind_param("isssss", $user_id, $nameAccount, $profile_picture_url, $birthday, $gender, $phone);
                if ($stmt2->execute()) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $user_id;
                    header("Location: ../../");
                    exit();
                } else {
                    echo "Lỗi khi insert dữ liệu 1: " . $stmt2->error;
                }

                $checkStmt->close();
                $stmt->close();
                $stmt2->close();
            }
        }
    } else if (isset($_POST['login'])) {
        $usernameLogin = $_POST["usernameLogin"];
        $passwordLogin = trim($_POST["passwordLogin"]);
        echo $passwordLogin;

        $stmt = $conn->prepare("SELECT user_id, role, password FROM user WHERE username = ?");
        $stmt->bind_param("s", $usernameLogin); 

        if($stmt->execute()){
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if(password_verify($passwordLogin, $user['password'])){ 
                $_SESSION['username'] = $usernameLogin;
                $_SESSION['user_id'] = $user['user_id']; 
                $_SESSION['role'] = $user['role']; 
                if ($user['role'] == 1) {
                    header("Location: ../../admin/index_admin.php"); 
                    exit();
                } else {
                    header("Location: ../../"); 
                    exit();
                }
            }else{
                header("Location: ../../?action=account&error-login=Tên đăng nhập hoặc mật khẩu không đúng");
            }
            $stmt->close();
        }else{
            echo "Lỗi khi execute: " . $stmt->error;
        }
    }
    $conn->close();
?>