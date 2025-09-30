<style>
    .content_session {
        flex: 8;
        background: #1e1e1e;
        border-radius: 0 12px 12px 0;
        min-height: 400px;
    }
    iframe {
        width: 100%;
        height: 400px;
        border: none;
        background: #fff;
    }
</style>

<div class="content_session">
    <iframe id="contentFrame" src="files/baitap4/bt4_5/index.php"></iframe>
</div>

<script>
function showPage(url) {
    document.getElementById('contentFrame').src = url;
}
</script>