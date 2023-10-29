<?PHP

require_once 'BaseModel.php';
require_once 'DB.php';

class Employee extends BaseModel {
    public $EmployeeID;
    public $FullName;
    public $Department;
    public $JobTitle;
    public $ContactNumber;
    public $Email;
    public $PasswordHash;

    public function __construct() {
        parent::__construct('Employees');
    }

    public function save($data) {
        if (isset($data['id'])) {
            // Update existing user
            $query = "UPDATE {$this->table} SET FullName = ?, Department = ?, JobTitle = ?, ContactNumber = ?, Email = ?, PasswordHash = ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssssss', $data['FullName'], $data['Department'], $data['JobTitle'], $data['ContactNumber'], $data['Email'], $data['PasswordHash']);
            return $stmt->execute();
        } else {
            // Create new user
            $query = "INSERT INTO {$this->table} (FullName, Department, JobTitle, ContactNumber, Email, PasswordHash) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssssss', $data['FullName'], $data['Department'], $data['JobTitle'], $data['ContactNumber'], $data['Email'], $data['PasswordHash']);
            return $stmt->execute();
        }
    }

    public function GetEmployeeByEmail($Email){
        $query = "SELECT * FROM {$this->table} WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $Email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}
?>