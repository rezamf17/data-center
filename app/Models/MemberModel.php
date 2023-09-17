<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class MemberModel extends Model{
    protected $table = 'proyek_member';
    
    protected $allowedFields = [
        'proyek_id',
        'nama_file',
        'keterangan' 
    ];

    public function checkMember($data)
    {
        $query = $this->db->table('proyek_member')
        ->where('id_proyek', $data['id_proyek'])
        ->where('id_user', $data['id_user'])
        ->get();

        return $query->getResultArray();
    }

    public function insertData($data)
    {
            $this->db->table('proyek_member')->insert($data);
            return $this->db->insertID();
    }

   public function getData($username)
   {
        $query = $this->db->table('proyek_member')
        ->select('proyek_member.id, user.nip, user.email, user.role, proyek.pj_proyek, proyek.nama_proyek, user.name')
        ->join('proyek', 'proyek.id = proyek_member.id_proyek')
        ->join('user', 'user.id = proyek_member.id_user')
        ->where('proyek.pj_proyek', $username)
        ->get();

        return $query->getResultArray();
   }

   public function getAllMembers()
   {
    $query = $this->db->table('proyek_member')
    ->select('proyek_member.id, user.nip, user.email, user.role, proyek.pj_proyek, proyek.nama_proyek, user.name')
    ->join('proyek', 'proyek.id = proyek_member.id_proyek')
    ->join('user', 'user.id = proyek_member.id_user')
    ->get();

    return $query->getResultArray();
   }

   public function deleteMember($id)
   {
       $builder = $this->db->table('proyek_member');
       $builder->where('id', $id);
       $builder->delete();
   }

}