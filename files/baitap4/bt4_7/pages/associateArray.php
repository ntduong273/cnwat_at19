<style>
    body { 
        background: #1e1e1e;               
    }

    a.home-link, a.ar1chieu-link, a.matrix-link, a.associateArr-link {
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
    }
    a.home-link:hover, a.ar1chieu-link:hover, a.matrix-link:hover, a.associateArr-link:hover {
        background: #217dbb;
        box-shadow: 0 4px 16px rgba(52,152,219,0.18);
    }

    .content {
        flex: 8;
        background: #1e1e1e;
        padding: 20px;
        border-radius: 0 12px 12px 0;
        color: white;
    }

    .matrix-form {
        margin-top: 20px;
        background: #222;
        padding: 18px 20px 10px 20px;
        border-radius: 10px;
        width: fit-content;
    }
    .matrix-table {
        border-collapse: collapse;
        margin-bottom: 10px;
    }
    .matrix-table td {
        padding: 2px 4px;
    }
    .matrix-table input[type="text"] {
        width: 40px;
        padding: 4px;
        background: #f9f9d1;
        border: 1px solid #ccc;
        border-radius: 3px;
        text-align: center;
        color: #222;
        font-size: 1em;
    }
    .matrix-form button {
        padding: 5px 18px;
        margin-left: 8px;
        font-size: 1em;
        border-radius: 4px;
        border: 1px solid #aaa;
        background: #eee;
        color: #222;
        cursor: pointer;
        transition: background 0.2s;
    }
    .matrix-form button:hover {
        background: #ddd;
    }
    .matrix-result {
        margin-top: 18px;
        background: #181818;
        padding: 14px 18px;
        border-radius: 8px;
        color: #fff;
        font-size: 1.1em;
        width: fit-content;
    }
    .matrix-label {
        color: #ffd700;
        font-weight: bold;
    }
    .matrix-title {
        font-weight: bold;
        margin-bottom: 4px;
    }
    .matrix-output {
        font-family: monospace;
        white-space: pre;
        margin-bottom: 10px;
    }
</style>
    
    <a class="home-link" href="home.php">Home</a>
    <a class="ar1chieu-link" href="ar1Chieu.php">Ar1Chieu</a>
    <a class="matrix-link" href="matrix.php">Matrix</a>
    <a class="associateArr-link" href="associateArray.php">AssociateArr</a>
    <br><br>
    <div style="color: white;">
        <span class="matrix-label">Associate array</span>
    </div>
    