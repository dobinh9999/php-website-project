<link rel="stylesheet" href="../assets/css/account.css">
<link rel="stylesheet" href="app/assets/css/account.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<title>Rosie Beauty - Đăng ký/Đăng nhập</title>
<body>
    <div class="container border-radius-10" id="container">
        <div class="form-container sign-up-container">
            <form action="app/util/handleAccount.php" method="POST" class="flex flex-center flex-column">
                <h1 class="f-wt-bold">Tạo tài khoản</h1>
                <input type="text" name="name-account" placeholder="Tên tài khoản" required/>
                <input type="text" name="username" placeholder="Tên đăng nhập" required/>
                <input type="email" name="email" placeholder="Email" required/>
                <input type="text" name="phone" placeholder="Số điện thoại" required/>
                <input type="text" name="address" placeholder="Địa chỉ" required/>
                <input type="password" name="password" placeholder="Mật khẩu" required/>
                <input type="password" name="confirm-password" placeholder="Nhập lại mật khẩu" required/>
                <button type="submit" name="register">Đăng ký</button>
                <?php if (isset($_GET['error'])): ?>
                    <p class="error-message" id="error-message" style="color: red;font-size: 0.9em;"><?= $_GET['error']; ?></p>
                <?php endif; ?>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="app/util/handleAccount.php" method="POST">
                <h1 class="f-wt-bold">Đăng nhập</h1>
                <input type="text" name="usernameLogin" placeholder="Tên đăng nhập" required/>
                <input type="password" name="passwordLogin" placeholder="Mật khẩu" required/>
                <a class="forgot-password" href="#">Quên mật khẩu?</a>
                <button name="login">Đăng nhập</button>
                <?php if (isset($_GET['error-login'])): ?>
                    <p class="error-message" id="error-message" style="color: red;font-size: 0.9em;"><?= $_GET['error-login']; ?></p>
                <?php endif; ?>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="f-wt-bold">Chào mừng tới Rosie Beauty</h1>
                    <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="f-wt-bold">Xin chào !</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="app/assets/js/account.js"></script>