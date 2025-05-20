const form = document.getElementById('multiStepForm');
const steps = Array.from(document.querySelectorAll('.form-step'));
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');
let currentStep = 0;

nextBtn.addEventListener('click', () => {
    // Get all required inputs within the current step
    const requiredInputs = steps[currentStep].querySelectorAll('[required]');
    let allValid = true;

    // Loop through required inputs to check if any are empty
    for (let input of requiredInputs) {
        // Remove any existing error messages
        let errorMessage = input.nextElementSibling;
        if (errorMessage && errorMessage.classList.contains('error-message')) {
            errorMessage.remove();
        }

        // Check if input is empty
        if (!input.value.trim()) {
            // Create an error message if input is invalid
            const error = document.createElement('span');
            error.classList.add('error-message');
            error.textContent = 'Vui lòng nhập thông tin bắt buộc';
            error.style.color = 'red';
            error.style.fontSize = '12px';

            // Append the error message after the input
            input.parentElement.appendChild(error);
            
            input.focus(); // Focus on the first invalid input
            allValid = false;
            break; // Stop checking further once we find an invalid input
        }
    }

    if (allValid) {
        steps[currentStep].classList.remove('active');
        currentStep++;
        steps[currentStep].classList.add('active');
    }
});


prevBtn.addEventListener('click', () => {
    steps[currentStep].classList.remove('active');
    currentStep--;
    steps[currentStep].classList.add('active');
});

// Function to fetch data from the API
async function fetchData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Fetch error:', error);
    }
}

// Populate provinces
async function populateProvinces() {
    const provinces = await fetchData('https://provinces.open-api.vn/api/p/');
    const provinceSelect = document.getElementById('province');
    provinceSelect.innerHTML = '<option value="">Chọn tỉnh/thành phố</option>'; // Reset options

    provinces.forEach(province => {
        const option = document.createElement('option');
        // option.value = province.code; 
        option.value = JSON.stringify({ code: province.code, name: province.name }); // Lưu cả code và name
        option.textContent = province.name;
        provinceSelect.appendChild(option);
    });

    provinceSelect.addEventListener('change', () => {
        // const selectedProvinceCode = provinceSelect.value; 
        // populateDistricts(selectedProvinceCode); 
        // updateShippingFee(provinceSelect.selectedIndex); 
        const selectedProvince = JSON.parse(provinceSelect.value); 
        console.log(selectedProvince);
        populateDistricts(selectedProvince.code);
        updateShippingFee(selectedProvince.name); 
        console.log(selectedProvince.name);
    });
}

// Populate districts based on selected province
async function populateDistricts(provinceCode) {
    const provinceData = await fetchData(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`);
    const districtSelect = document.getElementById('district');
    districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>'; // Reset options

    provinceData.districts.forEach(district => {
        const option = document.createElement('option');
        // option.value = district.code; 
        option.value = JSON.stringify({ code: district.code, name: district.name }); // Lưu cả code và name
        option.textContent = district.name;
        districtSelect.appendChild(option);
    });

    districtSelect.addEventListener('change', () => {
        // const selectedDistrictCode = districtSelect.value; 
        // populateCommunes(selectedDistrictCode); 
        const selectedDistrict = JSON.parse(districtSelect.value); 
        populateCommunes(selectedDistrict.code);
    });
}

// Populate communes based on selected district
async function populateCommunes(districtCode) {
    const districtData = await fetchData(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`);
    const communeSelect = document.getElementById('commune');
    communeSelect.innerHTML = '<option value="">Chọn xã/phường</option>'; 

    districtData.wards.forEach(commune => {
        const option = document.createElement('option');
        // option.value = commune.code; 
        option.value = JSON.stringify({ code: commune.code, name: commune.name }); // Lưu cả code và name
        option.textContent = commune.name;
        communeSelect.appendChild(option);
    });
}

// Calculate shipping fee and update total
function updateShippingFee(provinceName) {
    const shipFeeInput = document.getElementById('ship_fee');

    // Example: Free shipping if the first province is selected (Hà Nội)
    if (provinceName === "Thành phố Hà Nội") {
        shipFeeInput.value = 0; // Free shipping
    } else {
        shipFeeInput.value = 10000; // 10,000 VND shipping fee for other provinces
    }
    calculateTotal(); 
}

function calculateTotal() {
    const tempTotal = parseFloat(document.getElementById('temp_total').value) || 0;
    const shipFee = parseFloat(document.getElementById('ship_fee').value) || 0;

    const total = tempTotal + shipFee;
    document.getElementById('total').value = total.toFixed(0); // Update total field
}

populateProvinces();
