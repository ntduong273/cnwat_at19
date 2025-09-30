  <style>
    body {  
        background: #1e1e1e;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    a.home-link, a.list-link, a.add-link {
        display: inline-block;
        padding: 10px 28px;
        background: #3498db;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1em;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(52,152,219,0.08);
        margin-right: 8px;
    }
    a.home-link:hover, a.list-link:hover, a.add-link:hover {
        background: #217dbb;
        box-shadow: 0 4px 16px rgba(52,152,219,0.18);
    }

    iframe {
        width: 100%;
        height: 500px;
        border-radius: 6px;
        margin-top: 20px;
        background: #1e1e1e;
    }
  </style>

  <!-- Menu -->
  <a class="home-link" href="files/baitap4/bt4_8/home.php" target="mainFrame">Home</a>
  <a class="list-link" href="files/baitap4/bt4_8/listStudent.php" target="mainFrame">listStudent</a>
  <a class="add-link" href="files/baitap4/bt4_8/addStudent.php" target="mainFrame">addStudent</a>

  <!-- Iframe hiển thị nội dung -->
  <iframe name="mainFrame" src=""></iframe>
