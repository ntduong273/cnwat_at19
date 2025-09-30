<style>
    body {
        background: #1e1e1e; 
    }
    p {
        color: white;
    }
</style>
  
<p style="font-weight: bold;">Cookies:</p>
    <p>- Cookie là 1 đoạn dữ liệu được ghi trong máy Client do trình duyệt quản lý. Nó được trình duyệt gửi ngược lên lại server mỗi khi browser tải 1 trang web từ server.
    <br>- Không dùng cookies để lưu những thông tin quan trọng vì không đảm bảo.
    <br>- Thường dùng ghi nhớ (username, password, thời điểm login cuối, danh sách nhạc ưu thích)...
    </p>
<p style="font-weight: bold;">Tạo cookie:</p>
    <p>- setcookie("TenCookie", giá trị, [Thời điểm quá hạn tính theo s]); Ví dụ:
    <br> setcookie("TenUser", "Pham Minh", time()+60*60*24*30); 
    <br> setcookie("lasttime", time(), time()+60*60*24*30); 
    <br>- Nếu không chỉ định thời gian thì cookie sẽ lưu trong bộ nhớ. Và sử mất khi user đóng browser.
    <br>- Nếu thời điểm quá hạn là 1 thời điểm trong quá khứ thì browser sẽ xóa cookie
</p>
<p style="font-weight: bold;">Sử dụng cookie:</p><p> $_COOKIE["Ten"];</p>