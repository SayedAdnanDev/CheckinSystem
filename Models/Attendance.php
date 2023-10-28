<?PHP


require_once 'BaseModel.php';
require_once 'DB.php';

class Attendance extends BaseModel {
    public $AttendanceID;
    public $EmployeeID;
    public $CheckInTime;
    public $CheckOutTime;


    public function __construct() {
        parent::__construct('Attendance');
    }

    public function save($data) {
        if (isset($data['id'])) {
            // Update existing user
            $query = "UPDATE {$this->table} SET EmployeeID = ?, CheckOutTime = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isi',  $data['EmployeeID'], $data['CheckOutTime'], $data['id']);
            return $stmt->execute();
        } else {
            // Create new user
            $query = "INSERT INTO {$this->table} (EmployeeID, CheckInTime) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('is', $data['EmployeeID'], $data['CheckInTime']);
            return $stmt->execute();
        }
    }

}

?>