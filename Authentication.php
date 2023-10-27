<?PHP

require_once 'Models/Employee.php';
class Authentication {
    private $db;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function login($Email, $Password) {
        //query the user
        $query = "SELECT * FROM Employees WHERE Email = ?";
        
        //prepare and pass the query then recive the data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $Email);
        $stmt->execute();
        $result = $stmt->get_result();

        //make sure the query did not return null
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if(password_verify($Password, $row['PasswordHash'])) {
                $_SESSION['EmployeeName'] = $row['FullName'];
                $_SESSION['EmployeeID'] = $row['id'];
            }else{
                return false;
            }
        }
        return true;
    }

}


?>