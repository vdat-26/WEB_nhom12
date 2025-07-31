// --- Popup thông tin sách ---
const popup = document.createElement('div');
popup.id = 'popup';
popup.style.position = 'fixed';
popup.style.top = 0;
popup.style.left = 0;
popup.style.width = '100%';
popup.style.height = '100%';
popup.style.backgroundColor = 'rgba(0,0,0,0.5)';
popup.style.display = 'none';
popup.style.justifyContent = 'center';
popup.style.alignItems = 'center';
popup.innerHTML = `
    <div style="background:#fff;padding:20px;width:400px;border-radius:8px;position:relative">
        <span id="close-popup" style="position:absolute;top:10px;right:10px;cursor:pointer;font-weight:bold;font-size:20px">&times;</span>
        <img id="popup-img" src="" style="width:100%;border-radius:8px;margin-bottom:15px">
        <h2 id="popup-title"></h2>
        <p id="popup-price" style="color:#e74c3c;font-weight:bold"></p>
        <p id="popup-desc"></p>
        <button id="popup-add" style="margin-top:15px;padding:10px;background:#333;color:#fff;border:none;cursor:pointer;border-radius:5px">Thêm vào giỏ</button>
    </div>
`;
document.body.appendChild(popup);

const closePopup = document.getElementById('close-popup');
const popupImg = document.getElementById('popup-img');
const popupTitle = document.getElementById('popup-title');
const popupPrice = document.getElementById('popup-price');
const popupDesc = document.getElementById('popup-desc');

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-info')) {
        // Lấy dữ liệu từ button
        popupImg.src = e.target.dataset.img;
        popupTitle.textContent = e.target.dataset.name;
        popupPrice.textContent = 'Giá: ' + e.target.dataset.price + 'đ';
        popupDesc.textContent = e.target.dataset.desc;
        popup.style.display = 'flex';
    }
    if (e.target.id === 'close-popup') popup.style.display = 'none';
    if (e.target === popup) popup.style.display = 'none';
});

// --- Thêm vào giỏ (demo) ---
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-add') || e.target.id === 'popup-add') {
        alert('Đã thêm vào giỏ hàng!');
    }
});
