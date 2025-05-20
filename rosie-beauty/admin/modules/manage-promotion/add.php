<form action="modules/manage-promotion/handle.php" method="POST" enctype="multipart/form-data">
    <h3 style="text-align: center;">Thêm khuyến mãi</h3>

    <div class="form-group">
        <label for="promotion-name">Tiêu đề</label>
        <input type="text" id="promotion-name" name="promotion-name" placeholder="Nhập tiêu đề...">
    </div>

    <div class="form-group">
        <label for="discount-type">Loại khuyến mãi</label>
        <select name="discount-type" id="discount-type">
            <option value="fixed_amount">Tiền mặt</option>
            <option value="percentage">Phần trăm</option>
        </select>
    </div>

    <div class="form-group">
        <label for="discount-value">Giá trị</label>
        <input type="text" id="discount-value" name="discount-value" placeholder="Nhập giá trị...">
        <span id="percentage-symbol" style="display: none;">%</span>
    </div>

    <div class="form-group">
        <label for="start-date">Ngày bắt đầu</label>
        <input type="date" id="start-date" name="start-date">
    </div>

    <div class="form-group">
        <label for="end-date">Ngày kết thúc</label>
        <input type="date" id="end-date" name="end-date">
    </div>

    <div class="form-group">
        <input type="submit" name="add_promotion" value="Thêm">
    </div>
</form>

<script>
    // Lấy các phần tử
    const discountType = document.getElementById('discount-type');
    const discountValue = document.getElementById('discount-value');
    const percentageSymbol = document.getElementById('percentage-symbol');

    // Thêm sự kiện khi chọn loại khuyến mãi
    discountType.addEventListener('change', function() {
        if (this.value === 'percentage') {
            discountValue.type = 'number'; // Thiết lập input là số
            discountValue.min = 1;
            discountValue.max = 100;
            discountValue.placeholder = 'Nhập giá trị (1 - 100)';
            percentageSymbol.style.display = 'inline'; // Hiển thị dấu %
            discountValue.value = ''; // Đặt lại giá trị
        } else {
            discountValue.type = 'text'; // Trở về input thông thường
            discountValue.removeAttribute('min');
            discountValue.removeAttribute('max');
            discountValue.placeholder = 'Nhập giá trị...';
            percentageSymbol.style.display = 'none'; // Ẩn dấu %
            discountValue.value = ''; // Đặt lại giá trị
        }
    });

    // Kiểm tra giá trị nhập vào cho trường discount-value
    discountValue.addEventListener('input', function() {
        if (discountType.value === 'percentage') {
            // Nếu giá trị vượt quá 100, đặt lại về 100 hoặc thông báo lỗi
            if (this.value > 100) {
                alert('Giá trị không được vượt quá 100%');
                this.value = 100; // Đặt lại giá trị về 100
            } else if (this.value < 0) {
                alert('Giá trị không được nhỏ hơn 1%');
                this.value = 1; // Đặt lại giá trị về 1
            }
        }
    });
</script>
