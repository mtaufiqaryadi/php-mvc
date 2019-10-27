<?php
class Mahasiswa_model
{

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;   
    }

    public function getAllMhs()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMhsById($id){
        $this->db->query('SELECT * FROM ' . $this->table. ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();

    }

    public function tambahDataMhs($data){
        $query = "INSERT INTO mahasiswa Values ('', :nama, :asal)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('asal', $data['asal']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusMhsById($id){
        $query = "DELETE FROM " . $this->table ." WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMhs($data){
        $query = "UPDATE "  . $this->table .  " SET nama = :nama, asal = :asal WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('asal', $data['asal']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMhs(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama Like :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }




    
}
