<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ProyekModel extends Model{
    protected $table = 'proyek';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_proyek',
        'document_title', 
        'kategori_document', 
        'deparment',
        'tipe',
        'industri',
    ];

    public function insertData($data)
    {
    $this->db->table('proyek')->insert($data);
    return $this->db->insertID();
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function updateProyek($id, $data)
    {
        $this->where('id', $id)->set($data)->update();
    }

    public function deleteProyek($id)
    {
        $builder = $this->db->table('proyek');
        $builder->where('id', $id);
        $builder->delete();
    }
}