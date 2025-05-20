// handle increase and decrease quantity
const decreaseBtns = document.querySelectorAll('.decrease');
const increaseBtns = document.querySelectorAll('.increase');
const increaseBtnProductDetail = document.querySelectorAll('.increase-product-detail');
const quantityInputs = document.querySelectorAll('.quantity-input');
const priceCells = document.querySelectorAll('.cart-item td:nth-child(4)'); // Cột thành tiền
const totalPriceCells = document.querySelectorAll('.cart-item td:nth-child(5)');

function updateTotalPrice(index) {
    const price = parseInt(priceCells[index].previousElementSibling.textContent); // Lấy giá sản phẩm
    const quantity = parseInt(quantityInputs[index].value);
    const totalPrice = price * quantity;
    totalPriceCells[index].textContent = totalPrice.toFixed(0); // Cập nhật thành tiền
}

decreaseBtns.forEach((decreaseBtn, index) => {
    decreaseBtn.addEventListener('click', (event) => {
        event.preventDefault(); // Ngăn chặn hành vi mặc định
        let currentValue = parseInt(quantityInputs[index].value);
        if (currentValue > 1) {
            quantityInputs[index].value = currentValue - 1;
            updateTotalPrice(index); // Cập nhật thành tiền
        }
    });
});

increaseBtns.forEach((increaseBtn, index) => {
    increaseBtn.addEventListener('click', (event) => {
        event.preventDefault(); // Ngăn chặn hành vi mặc định
        let currentValue = parseInt(quantityInputs[index].value);
        quantityInputs[index].value = currentValue + 1;
        updateTotalPrice(index); // Cập nhật thành tiền
    });
});

increaseBtnProductDetail.forEach((increaseBtn, index) => {
    increaseBtn.addEventListener('click', (event) => {
        event.preventDefault(); // Ngăn chặn hành vi mặc định
        let currentValue = parseInt(quantityInputs[index].value);
        const maxValue = parseInt(quantityInputs[index].max); // Lấy giá trị tối đa

        // Kiểm tra nếu giá trị hiện tại nhỏ hơn giá trị tối đa
        if (currentValue < maxValue) {
            quantityInputs[index].value = currentValue + 1;
        }
    });
});