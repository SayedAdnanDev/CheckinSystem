<?PHP

require_once 'Models/Attendance.php';
require_once 'Partials/header.php';

class CheckinController
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function DidCheckinToday($id)
    {
        //query the user
        $query = "SELECT * FROM Attendance WHERE EmployeeID = ? ORDER BY id DESC LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        //make sure the query did not return null
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            //set date for comparison
            $date = $row['CheckInTime'];
            $mysql_date = date("Y-m-d", strtotime($date));
            $current_date = date("Y-m-d");

            if ($mysql_date < $current_date) {
                return false;
            } else if ($mysql_date == $current_date) {
                if (isset($row['CheckOutTime'])){
                    return false;
                }else{
                    return $row;
                }
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function CheckIn()
    {
        if (!$this->DidCheckinToday($_SESSION["EmployeeID"])) {

            $data = array(
                'EmployeeID' => $_SESSION["EmployeeID"],
                'CheckInTime' => date("Y-m-d H:i:s"),
            );

            $att = new Attendance();
            $att->save($data);
        }
    }

    public function CheckOut()
    {
        $row = $this->DidCheckinToday($_SESSION["EmployeeID"]);

        if ($row) {
            $data = array(
                'id' => $row['id'],
                'EmployeeID' => $_SESSION["EmployeeID"],
                'CheckOutTime' => date("Y-m-d H:i:s"),
            );

            $att = new Attendance();
            $att->save($data);
        }
    }
}


?>