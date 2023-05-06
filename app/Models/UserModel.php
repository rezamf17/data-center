<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'user';
    
    protected $allowedFields = [
        'nip',
        'name',
        'email',
        'nomor_hp',
        'password',
        'role',
        'status',
    ];

    public function insertData($data)
    {
    $this->db->table('user')->insert($data);
    return $this->db->insertID();
    }

    public function getAll()
    {
        return $this->findAll();
    }
}