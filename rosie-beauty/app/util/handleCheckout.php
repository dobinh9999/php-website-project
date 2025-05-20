<?php
    include "../../config/database.php";
    session_start();

    $provinceData = json_decode($_POST['province'], true);
    $districtData = json_decode($_POST['district'], true);
    $communeData = json_decode($_POST['commune'], true);

    $provinceName = $provinceData['name']; 
    $districtName = $districtData['name']; 
    $communeName = $communeData['name']; 

    if (isset($_POST['btnAdd'])) {
        $selected_products = $_SESSION['selected_products'];
        $json_selected_products = json_encode($selected_products);
        $query = "SELECT order_id FROM orders WHERE user_id = " . $_SESSION['user_id'];
        $row_order = mysqli_query($conn, $query);
        $order_id = mysqli_fetch_assoc($row_order)['order_id'];
        $username = $_POST['username'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $province = $provinceName;
        $district = $districtName;
        $commune = $communeName;
        $note = $_POST['note'];
        $payment_method = $_POST['payment_method'];
        $coupon_code = $_POST['coupon_code'];
        $temp_total = floatval($_POST['temp_total']);
        $ship_fee = floatval($_POST['ship_fee']);
        $total = floatval($_POST['total']);

        $stmt = $conn->prepare("INSERT INTO checkout (order_id, product_ids, username, phone_number, Address, province, district, commune, note, payment_method, coupon_code, temp_total, ship_fee, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Lỗi chuẩn bị câu lệnh 1: " . $conn->error);
        }

        $stmt->bind_param("issssssssssddd", $order_id, $json_selected_products, $username, $phone_number, $address, $province, $district, $commune, $note, $payment_method, $coupon_code, $temp_total, $ship_fee, $total);
        if ($stmt->execute()) {
            // cập nhật số lượng sản phẩm trong bảng product_detail
            foreach ($selected_products as $product_id) {
                $query = "SELECT quantity FROM order_detail WHERE order_id = $order_id AND product_id = $product_id";
                $result = mysqli_query($conn, $query);
                $quantity = mysqli_fetch_assoc($result)['quantity'] ?? 0;
            
                if ($quantity > 0) {
                    // Cập nhật bảng product_detail
                    $stmt = $conn->prepare("UPDATE product_detail SET stock_quantity = stock_quantity - ? WHERE product_id = ?");
                    $stmt->bind_param("ii", $quantity, $product_id);
                    $stmt->execute();
            
                    // Cập nhật bảng products
                    $stmt = $conn->prepare("UPDATE product_detail SET sold = sold + ? WHERE product_id = ?");
                    $stmt->bind_param("ii", $quantity, $product_id);
                    $stmt->execute();
                }
            }

            // sau khi thêm thành công thì xóa các bản ghi có order_id và product_ids vừa chèn ở trong bảng order_detail
            // Chuyển đổi mảng thành chuỗi cho câu lệnh SQL
            $placeholders = implode(',', array_fill(0, count($selected_products), '?'));

            // Câu lệnh DELETE với placeholders
            $stmt = $conn->prepare("DELETE FROM order_detail WHERE order_id = ? AND product_id IN ($placeholders)");

            // Kết hợp order_id và các product_id vào mảng tham số
            $params = array_merge([$order_id], $selected_products);

            // Gán tham số cho câu lệnh
            $stmt->bind_param(str_repeat('i', count($params)), ...$params); // 'i' cho từng product_id

            if (!$stmt->execute()) {
                echo "Lỗi khi xóa chi tiết đơn hàng: " . $stmt->error;
            } else {
                header("Location: ../../?action=cart");
            }
        } else {
            echo $stmt->error;
        }

        $stmt->close();
    }else {
        echo "Lỗi khi thêm đơn hàng";
    }
?>