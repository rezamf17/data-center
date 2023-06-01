<?php namespace App\Database\Seeds;
  
class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nip'  => '111',
                'name'  => '111reza',
                'email'  => '111@gmail.com',
                'nomor_hp'  => '08939483488',
                'password'  =>  password_hash('123456', PASSWORD_DEFAULT),
                'role'  => 'Admin',
                'status'  => 'Active',
            ],
        ];
        $this->db->table('user')->insertBatch($data);
        // $this->db->table('proyek')->insertBatch($dataProyek);
    }
} 