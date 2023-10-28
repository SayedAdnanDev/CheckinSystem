<?PHP

require_once 'Partials/header.php';
require_once 'Models/Attendance.php';

class RecordsController
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllRecords($id){
        $query = "SELECT * FROM Attendance WHERE EmployeeID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
    
        //make sure the query did not return null
        if ($result->num_rows > 0) {
            return $result;
        }
    }

}


?>