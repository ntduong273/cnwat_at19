<style>
    .content_session {
        flex: 8;
        background: #1e1e1e;
        border-radius: 0 12px 12px 0;
        min-height: 400px;
    }
    iframe {
        width: 100%;
        border: none;
        background: #1e1e1e;
    }
</style>

<div class="content_session">
    <iframe id="content-frame" name="content-frame" src="/nguyentungduong_bai4/index.php" style="border:none;overflow:hidden;"></iframe>
</div>

<script>
    const frame = document.getElementById("content-frame");

    function resizeIframe() {
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
    }

    // Gọi mỗi khi iframe load
    frame.onload = resizeIframe;

    // Nếu trang trong iframe có nội dung động (JS thêm bớt), có thể resize định kỳ
    setInterval(resizeIframe, 500);
</script>
