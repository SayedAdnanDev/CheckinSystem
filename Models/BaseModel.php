<?php

require_once '../DB.php';

class BaseModel {
    /**
     * @var Database
     */
    protected $db;
    protected $table;

    public function __construct($table) {
        $this->db = Database::getInstance();
        $this->table = $table;
    }

    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // This should be overridden by child classes
    public function save($data) {
        throw new Exception('Not implemented');
    }
}
?>