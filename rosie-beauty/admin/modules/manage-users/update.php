<?php
    $query = "SELECT * FROM user where user_id = '$_GET[user_id]' LIMIT 1";
    $row_alter_users = mysqli_query($conn, $query);
?>

<style>
        /* Form container */
        .form-container {
            width: 200px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        /* Form title */
        .form-container h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        /* Input, select styling */
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Submit button styling */
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>


<p>Sua thong tin nguoi dung</p>
<table border="1" width = "50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/manage-users/handle.php?user_id=<?php echo $_GET['user_id']; ?>">
    <?php while($row = mysqli_fetch_array($row_alter_users)): ?>
        
        <!-- Username -->
        <label for="user-name">Họ và tên</label>
        <input type="text" id="user-name" name="user-name" value="<?php echo $row['username']; ?>">
        
        <!-- Email -->
        <label for="user-email">Email</label>
        <input type="text" id="user-email" name="user-email" value="<?php echo $row['email']; ?>">
        
        <!-- Password -->
        <label for="user-password">Mật khẩu</label>
        <input type="text" id="user-password" name="user-password" value="<?php echo $row['password']; ?>">
        
        <!-- Role -->
        <label for="user-role">Quyền</label>
        <select id="user-role" name="user-role">
            <option value="0" <?php if ($row['role'] == 0) echo 'selected'; ?>>Admin</option>
            <option value="1" <?php if ($row['role'] == 1) echo 'selected'; ?>>Người dùng</option>
        </select>
        
        <!-- Status -->
        <label for="user-is_active">Trạng thái</label>
        <select id="user-is_active" name="user-is_active">
            <option value="1" <?php if ($row['is_active'] == 1) echo 'selected'; ?>>Đang hoạt động</option>
            <option value="0" <?php if ($row['is_active'] == 0) echo 'selected'; ?>>Ngừng hoạt động</option>
        </select>
        
        <!-- Submit button -->
        <input type="submit" name="update_user" value="Sửa thông tin người dùng">
    
    <?php endwhile; ?>
    </form>
</table>