<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin tài khoản</title>
    <style>
        .form-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            margin: 0 auto;
            align-items: center;
        }
        .form{
            width: 50%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            width: 100%;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        .form-group button:hover {
            background-color: #45a049;
        }

        .image-profile {
            position: relative;
            display: inline-block; 
            left: 40%;
        }
        .image-profile img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .edit-container {
            position: absolute;
            bottom: 10px;
            left: 100%;
            transform: translateX(-50%); 
        }

        .edit-button {
            background-color: #4CAF50; 
            color: white; 
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
    <div class="form-container p-20 flex flex-column">
        <h2>Cập nhật thông tin tài khoản</h2>
        <form action="app/util/handleAccountDetail.php" enctype="multipart/form-data" method="POST" class="form">
            <div class="image-profile">
                <img src="app/assets/img/Logo/icon_user.png" alt="">
                <div class="edit-container">
                    <button class="edit-button" onclick="document.getElementById('file-input').click();">Edit</button>
                    <input type="file" id="file-input" name="profile-picture" style="display: none;">
                </div>
            </div>
            <div class="form-group">
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="full-name" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính:</label>
                <select id="gender" name="gender" required>
                    <option value="male" {{ gender == 'male' ? 'selected' : '' }}>Nam</option>
                    <option value="female" {{ gender == 'female' ? 'selected' : '' }}>Nữ</option>
                    <option value="other" {{ gender == 'other' ? 'selected' : '' }}>Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Số điện thoại:</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <button name="submit" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
</body>
</html>
