const productCheckboxes = document.querySelectorAll('.product-checkbox');
const selectAllCheckbox = document.getElementById('select-all');
const checkoutButton = document.querySelector('.checkout-btn');
const totalPrice = document.querySelector('.total-price');

function toggleSelectAll() {
    const isChecked = selectAllCheckbox.checked;
    productCheckboxes.forEach(checkbox => {
        checkbox.checked = isChecked;
    });
    toggleCheckoutButton();
    calculateTotalPrice(); // Cập nhật tổng tiền khi chọn tất cả
}

function toggleCheckoutButton() {
    const anyChecked = Array.from(productCheckboxes).some(checkbox => checkbox.checked);
    checkoutButton.disabled = !anyChecked;
}

function updateTotalPriceInSession() {
    const total = parseFloat(totalPrice.textContent.replace(' đ', '').replace(',', '.'));
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '?action=cart', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Total price updated in session');
            } else {
                console.error('Error updating total price in session');
            }
        }
    };
    
    xhr.send('total_price=' + total);
}

function calculateTotalPrice() {
    let total = 0;
    // const selectedOrderIds = [];
    productCheckboxes.forEach((checkbox, index) => {
        if (checkbox.checked) {
            const priceCell = checkbox.closest('tr').querySelector('.cart-item td:nth-child(5)'); // Lấy ô giá
            const price = parseFloat(priceCell.textContent);
            total += price; 
            // selectedOrderIds.push(checkbox.value);
        }
    });
    totalPrice.textContent = total.toFixed(0) + ' đ'; // Cập nhật tổng tiền
    totalPrice.style.marginRight = '30px';

    updateTotalPriceInSession(); // Gửi tổng tiền lên server

    // if (selectedOrderIds.length > 0) {
    //     const xhr = new XMLHttpRequest();
    //     xhr.open('POST', '?action=cart', true);
    //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //     xhr.send('order_ids=' + selectedOrderIds.join(','));
    // }
}

productCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        if (!checkbox.checked) {
            selectAllCheckbox.checked = false;
        } else if (Array.from(productCheckboxes).every(checkbox => checkbox.checked)) {
            selectAllCheckbox.checked = true;
        }
        toggleCheckoutButton();
        calculateTotalPrice(); // Cập nhật tổng tiền khi thay đổi checkbox
    });
});