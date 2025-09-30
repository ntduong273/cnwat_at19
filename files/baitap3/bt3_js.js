const buttons = document.querySelectorAll("button");
  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      buttons.forEach(b => b.classList.remove("active")); // bỏ active ở nút cũ
      btn.classList.add("active"); // thêm active cho nút vừa chọn
    });
  });

function loadContent(event, file) {
    event.preventDefault();

    fetch(file)
        .then(response => {
            if (!response.ok) throw new Error("Không thể tải nội dung");
            return response.text();
        })
        .then(data => {
            const mainContent = document.getElementById("main-content");
            mainContent.innerHTML = data;

            // Thực thi lại các script trong nội dung vừa nạp
            const scripts = mainContent.querySelectorAll("script");
            scripts.forEach(oldScript => {
                const newScript = document.createElement("script");
                if (oldScript.src) {
                    newScript.src = oldScript.src;
                } else {
                    newScript.textContent = oldScript.textContent;
                }
                document.body.appendChild(newScript);
                // Xóa script cũ để tránh trùng lặp
                oldScript.remove();
            });
        })
        .catch(error => {
            document.getElementById("main-content").innerHTML =
                `<p style="color:red;">Lỗi tải nội dung: ${error.message}</p>`;
        });
}

document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdownGroup = document.querySelector('.dropdown-group');
    if (dropdownToggle && dropdownGroup) {
        dropdownToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownGroup.classList.toggle('open');
        });
        document.addEventListener('click', function() {
            dropdownGroup.classList.remove('open');
        });
    }
});

// KIEM TRA TRAC NGHIEM




// FORM LOP
function validateLopForm() {
    const f = document.forms['lopForm'];
    const malop = f['malop'].value.trim();
    const tenlop = f['tenlop'].value.trim();
    const khoahoc = f['khoahoc'].value.trim();
    const gvcn = f['gvcn'].value.trim();

    if (malop.length !== 6) {
        alert('Mã lớp phải đúng 6 ký tự!');
        f['malop'].focus();
        return false;
    }
    if (tenlop.length === 0 || tenlop.length > 50) {
        alert('Tên lớp không được rỗng và tối đa 50 ký tự!');
        f['tenlop'].focus();
        return false;
    }
    if (!/^\d+$/.test(khoahoc)) {
        alert('Khóa học phải là số nguyên!');
        f['khoahoc'].focus();
        return false;
    }
    if (gvcn.length === 0 || gvcn.length > 50) {
        alert('GVCN không được rỗng và tối đa 50 ký tự!');
        f['gvcn'].focus();
        return false;
    }
    return true;
}


// FORM HO SO

function validateHosoForm() {
    const f = document.forms['hosoForm'];
    const mahs = f['mahs'].value.trim();
    const hoten = f['hoten'].value.trim();
    const ngaysinh = f['ngaysinh'].value.trim();
    const diachi = f['diachi'].value.trim();
    const lop = f['lop'].value.trim();
    const diemtoan = f['diemtoan'].value.trim();
    const diemly = f['diemly'].value.trim();
    const diemhoa = f['diemhoa'].value.trim();

    if (mahs.length !== 8) {
        alert('Mã học sinh phải đúng 8 ký tự!');
        f['mahs'].focus();
        return false;
    }
    if (hoten.length === 0 || hoten.length > 50) {
        alert('Họ tên không được rỗng và tối đa 50 ký tự!');
        f['hoten'].focus();
        return false;
    }
    if (!ngaysinh) {
        alert('Vui lòng chọn ngày sinh!');
        f['ngaysinh'].focus();
        return false;
    }
    if (diachi.length === 0 || diachi.length > 150) {
        alert('Địa chỉ không được rỗng và tối đa 150 ký tự!');
        f['diachi'].focus();
        return false;
    }
    if (lop.length === 0 || lop.length > 6) {
        alert('Lớp không được rỗng và tối đa 6 ký tự!');
        f['lop'].focus();
        return false;
    }
    if (isNaN(diemtoan) || diemtoan === "" || Number(diemtoan) < 0 || Number(diemtoan) > 10) {
        alert('Điểm toán phải là số từ 0 đến 10!');
        f['diemtoan'].focus();
        return false;
    }
    if (isNaN(diemly) || diemly === "" || Number(diemly) < 0 || Number(diemly) > 10) {
        alert('Điểm lý phải là số từ 0 đến 10!');
        f['diemly'].focus();
        return false;
    }
    if (isNaN(diemhoa) || diemhoa === "" || Number(diemhoa) < 0 || Number(diemhoa) > 10) {
        alert('Điểm hóa phải là số từ 0 đến 10!');
        f['diemhoa'].focus();
        return false;
    }
    return true;
}


// FORM NHAP

// Tự động đặt dấu nháy vào ô nhập họ tên khi form nhập được nạp
document.addEventListener('DOMContentLoaded', function() {
    const mainContent = document.getElementById('main-content');
    if (mainContent) {
        const observer = new MutationObserver(() => {
            const hotenInput = mainContent.querySelector('input[name="hoten"]');
            if (hotenInput) hotenInput.focus();
        });
        observer.observe(mainContent, { childList: true, subtree: true });
    }
});

 document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.focus-next');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        let next = inputs[i + 1];
                        if (next) next.focus();
                    }
                });
            }
        });

document.addEventListener('DOMContentLoaded', function() {
    // Gắn sự kiện submit cho tất cả form trong trang
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert("Chúc mừng bạn đã hoàn thành, điểm của bạn là 10/10!");
        });
    });
});