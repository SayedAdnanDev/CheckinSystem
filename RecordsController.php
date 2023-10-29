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

    public function getAllRecordsByID($id){
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

    public function getAllRecords(){

        $query = "SELECT Employees.id , Employees.FullName , Employees.Department, Employees.JobTitle, Employees.Email, Employees.ContactNumber , Attendance.CheckInTime,Attendance.CheckOutTime FROM Attendance inner join Employees ON Attendance.EmployeeID = Employees.Employees.id;";
        $stmt = $this->db->prepare($query);
        //$stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
    
        //make sure the query did not return null
        if ($result->num_rows > 0) {
            return $result;
        }
    }

}


?>