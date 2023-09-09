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

    public function getSearch($role = null)
    {
        // Membuat array dengan kolom yang akan digunakan dalam pencarian
        $searchData = [];
            
        if ($role !== "") {
            $searchData['role'] = $role;
        }

        // Melakukan pencarian berdasarkan data yang sesuai
        $query = $this->db->table('user'); // Ganti 'nama_tabel_anda' dengan nama tabel Anda
        $query->like($searchData);
        // if ($start_date !== "" && $end_date !== "") {
        //     $query->where("created >=", $start_date);
        //     $query->where("created <=", $end_date);
        // }

        // print_r($query->getCompiledSelect());exit();

        // Eksekusi query dan mengembalikan hasilnya
        return $query->get()->getResultArray();
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

    public function getPJProyek()
    {
        $builder = $this->db->table('user');
        $builder->where('role', 'PJ');
        return $builder->get()->getResultArray();
    }
}
