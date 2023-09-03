<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
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

    public function updateUser($id, $data)
    {
        $this->where('id', $id)->set($data)->update();
    }

    public function deleteUser($id)
    {
        $builder = $this->db->table('user');
        $builder->where('id', $id);
        $builder->delete();
    }

    public function totalAkun()
    {
        $builder = $this->db->table('user');
        $builder->where('role !=', 'SU');
        return $builder->countAllResults();
    }
    public function totalAkunAdmin()
    {
        $builder = $this->db->table('user');
        $builder->where('role', 'Admin');
        return $builder->countAllResults();
    }
    public function totalAkunPegawai()
    {
        $builder = $this->db->table('user');
        $builder->where('role', 'Pegawai');
        return $builder->countAllResults();
    }
    public function totalAkunPJProyek()
    {
        $builder = $this->db->table('user');
        $builder->where('role', 'PJ');
        return $builder->countAllResults();
    }
    public function totalAkunMemberProyek()
    {
        $builder = $this->db->table('user');
        $builder->where('role', 'Member');
        return $builder->countAllResults();
    }
}
