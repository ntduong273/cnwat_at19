<style>
    .menu-tabs {
            display: flex;
            background: #eee;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            overflow: hidden;
            border-bottom: 2px solid #888;
            margin-bottom: 0;
        }
        .menu-tabs button {
            flex: 1;
            text-align: center;
            padding: 14px 0;
            background: #eaf6fb;
            color: #222;
            text-decoration: none;
            font-size: 18px;
            border: 1px solid #ccc;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
            margin-right: 4px;
            box-shadow: 0 2px 6px #ccc inset;
            transition: background 0.2s;
        }
        .menu-tabs button:last-child {
            margin-right: 0;
        }
        .menu-tabs button:hover, .menu-tabs button.active {
            background: #fff;
            color: #0074d9;
            font-weight: bold;
        }
</style>

<div class="menu-tabs">
    <button onclick="loadPage('pages/home.php')">Home</button>
    <button onclick="loadPage('pages/list.php')">List</button>
    <button onclick="loadPage('pages/add.php')">Add</button>
</div>


<iframe id="content-frame" name="content-frame" src="" width="100%" style="border:none;overflow:hidden;"></iframe>

<script>
    function loadPage(url) {
        const frame = document.getElementById("content-frame");
        frame.src = url;

        // Sau khi iframe load thì điều chỉnh chiều cao
        frame.onload = function() {
            try {
                const body = frame.contentWindow.document.body;
                const html = frame.contentWindow.document.documentElement;
                const height = Math.max(
                    body.scrollHeight,
                    body.offsetHeight,
                    html.clientHeight,
                    html.scrollHeight,
                    html.offsetHeight
                );
                frame.style.height = height + "px";
            } catch (e) {
                console.error("Không thể truy cập nội dung iframe (khác domain?)", e);
            }
        };
    }
</script>