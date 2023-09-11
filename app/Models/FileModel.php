<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class FileModel extends Model{
    protected $table = 'file';
    
    protected $allowedFields = [
        'proyek_id',
        'nama_file',
        'keterangan' 
    ];

    public function insertData($data)
    {
    $this->db->table('file')->insert($data);
    return $this->db->insertID();
    }

    public function viewDoc($proyekId)
    {
        $db = \Config\Database::connect();
        $query = $db->table('file');
        $query->where('proyek_id', $proyekId);
        
        $results = $query->get()->getResult();
        return $results;
    }

    public function viewDocMember($idProyek)
    {
        $query = $this->db->table('file');
        $query->where('proyek_id', $idProyek);
        return $query->get()->getResultArray();
    }
    public function changeDocument1($id, $data)
    {
        $this->where('id', $id)->set($data)->update();
    }

    // public function updateUser($id, $data)
    // {
    //     $this->where('id', $id)->set($data)->update();
    // }

    // public function deleteUser($id)
    // {
    //     $builder = $this->db->table('user');
    //     $builder->where('id', $id);
    //     $builder->delete();
    // }
}