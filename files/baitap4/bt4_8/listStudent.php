<?php
$filename = "student.txt";
$students = [];
if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    for ($i = 0; $i < count($lines); $i += 3) {
        if (isset($lines[$i+2])) {
            $students[] = [
                'name' => $lines[$i],
                'address' => $lines[$i+1],
                'age' => $lines[$i+2]
            ];
        }
    }
}
?>
<style>
    table {
        color: #fff;
    }
</style>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>STT</th>
        <th>Ten</th>
        <th>Dia chi</th>
        <th>Tuoi</th>
    </tr>
    <?php foreach ($students as $index => $student): ?>
    <tr>
        <td><?= $index + 1 ?></td>
        <td><?= htmlspecialchars($student['name']) ?></td>
        <td><?= htmlspecialchars($student['address']) ?></td>
        <td><?= htmlspecialchars($student['age']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>