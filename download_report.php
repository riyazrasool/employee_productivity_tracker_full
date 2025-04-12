<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $summary = $_POST['summary'];
    $date = $_POST['date'];
    $hours = $_POST['hours'];

    $filename = "report_" . $date . ".txt";

    header('Content-Type: text/plain');
    header("Content-Disposition: attachment; filename=\"$filename\"");

    echo "Date: $date\n";
    echo "Hours Worked: $hours\n";
    echo "Summary:\n$summary\n";
}
?>
