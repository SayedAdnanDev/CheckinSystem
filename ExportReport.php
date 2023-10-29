<?PHP

require_once 'RecordsController.php';

$RecCon = new RecordsController();

$QueryToCSV = $RecCon->getAllRecords();

if ($QueryToCSV->num_rows > 0) {
    // Output headers so that the file is downloaded rather than displayed

    // Create a file pointer connected to the output stream
    $output = fopen('php://memory', 'w');

    // Output the column headings
    fputcsv($output, array('Employee ID', 'FullName', 'Department', 'Job Title', 'Email', 'Contact Number', 'Check In Time', 'Check Out Time', ), ',');

    // Fetch the data
    while ($row = mysqli_fetch_assoc($QueryToCSV)) {
        fputcsv($output, $row ,',');
    }
    
    fseek($output,0);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    fpassthru($output);
    
} else {
    echo "No records found.";
}
exit;

?>