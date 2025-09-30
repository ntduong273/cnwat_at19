<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Upload - Admin</title>
        <link rel="icon" type="image/x-icon" href="/AT190115/image/favicon.ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" media="all">
    </head>
    <body>
        <style>
        body {
            margin: 0;                                 /* Loại bỏ khoảng trắng */   
            background-color: #0f0f0f;               /* Set màu nền */
            font-family: 'Montserrat', sans-serif;     /* Set font chữ */
            color: white;                            /* Set màu chữ */
        }

        .profile-container {
            display: flex;          /* Hiển thị dưới dạng flexbox 2:8 */
            gap: 15px;              /* Khoảng cách giữa các phần tử */
            padding: 10px;          /* Tạo khoảng đệm của thành phần */
            background: #222;     /* Set màu nền */
            border-radius: 12px;    /* Bo tròn 4 góc của thành phần */
        }

            .profile-info {
                flex: 2;
                display: flex;
                align-items: center;
                padding: 10px;
                background-color: #3a3a3a; /* Màu nền của phần thông tin */
                border-radius: 12px;
            }

                .avatar img {
                    width: 100px;
                    height: 100px;
                    border-radius: 10%;
                }

                .info {
                    flex: 1;
                    padding: 10px;
                }
                
                    .info h1 {
                        margin: 0;
                        font-size: 1.3em;
                    }

                    .info p {
                        color: #aaa;
                        margin: 0;
                    }
            

            .profile-banner img {
                flex: 8;
                width: 970px;
                height: 148px;
                border-radius: 12px; /* Bo góc đều */
                background-size: cover;
                background-position: center; 
            }

            .content-container {
                display:flex;
                gap: 15px;
                padding: 10px;
                background: #222;
                border-radius: 12px;
                align-items: stretch;
                margin-top: 20px;
            }
                .content {
                    flex: 8;
                    background: #1e1e1e;
                    padding: 20px;
                    border-radius: 0 12px 12px 0;
                    color: white;
                }
        </style>

        <!-------------------- PROFILE ---------------------->

        <div class="profile-container">
            <div class="profile-info">
                <div class="avatar">
                    <img src="/cookie/images/avatar.jpg" alt="Avatar">
                </div>
                <div class="info">
                    <h1>NGUYỄN TÙNG DƯƠNG</h1>
                    <p>Mã SV: AT190115</p>
                </div>
            </div>
            <div class="profile-banner">
                <img src="/cookie/images/banner.jpg" alt="Banner">
            </div>
        </div>

        <div class="content-container">
            <div class="content" id="main-content">    
                <p>Upload files</p>
                <form method="post" action="bt4_index.php?page=uploadprocess" enctype="multipart/form-data">
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "File $i: <input type='file' name='files[]'><br>";
                    }
                    ?>
                    <input type="reset" value="Reset">
                    <input type="submit" name="submit" value="Upload">
                </form>
            </div>
        </div>
    </div>
</body>
</html>