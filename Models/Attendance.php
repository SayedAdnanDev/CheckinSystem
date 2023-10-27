<?PHP


require_once 'BaseModel.php';
require_once 'DB.php';

class Attendance extends BaseModel {
    public $AttendanceID;
    public $EmployeeID;
    public $CheckInTime;
    public $CheckOutTime;


    public function __construct() {
        parent::__construct('Attandance');
    }

    public function save($data) {
        if (isset($data['id'])) {
            // Update existing user
            $query = "UPDATE {$this->table} SET EmployeeID = ?, CheckInTime = ?, CheckOutTime = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iss', $data['EmployeeID'], $data['CheckInTime'], $data['CheckOutTime']);
            return $stmt->execute();
        } else {
            // Create new user
            $query = "INSERT INTO {$this->table} (EmployeeID, CheckInTime, CheckOutTime) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iss', $data['EmployeeID'], $data['CheckInTime'], $data['CheckOutTime']);
            return $stmt->execute();
        }
    }

}

?>