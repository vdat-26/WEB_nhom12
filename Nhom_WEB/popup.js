document.querySelectorAll('.btn-info').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.closest('.book').getAttribute('data-id');
        fetch('laythongtinsach.php?id=' + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById('popup-title').innerText = data.ten_sach;
                document.getElementById('popup-img').src = 'uploads/' + data.anh_bia;
                document.getElementById('popup-desc').innerText = data.mo_ta;
                document.getElementById('popup-price').innerText = 'Giá: ' + data.gia + 'đ';
                document.getElementById('popup').style.display = 'block';
            });
    });
});

document.getElementById('close-popup').addEventListener('click', function(){
    document.getElementById('popup').style.display = 'none';
});
