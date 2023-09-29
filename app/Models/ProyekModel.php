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
        'created',
        'ended',
        'pj_proyek',
        'industri',
        'deskripsi'
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

    public function dataMemberProyek($username)
    {
        $query = $this->db->table('proyek_member')
            ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri, user.name')
            ->join('proyek', 'proyek.id = proyek_member.id_proyek')
            ->join('user', 'user.id = proyek_member.id_user')
            ->where('user.name', $username)
            ->get();

        return $query->getResultArray();
    }

    public function dataProyekMember($username)
    {
        $query = $this->db->table('proyek_member')
        ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.pj_proyek, proyek.industri, user.name')
        ->join('proyek', 'proyek.id = proyek_member.id_proyek')
        ->join('user', 'user.id = proyek_member.id_user')
        ->where('user.name', $username)
        ->get();

    return $query->getResultArray();
    }

    public function dataProyekPJ($username)
    {
        $query = $this->db->table('proyek_member')
        ->distinct('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.nama_proyek, proyek.pj_proyek, proyek.industri, user.name')
        ->join('proyek', 'proyek.id = proyek_member.id_proyek')
        ->join('user', 'user.id = proyek_member.id_user')
        ->where('proyek.pj_proyek', $username)
        ->get();

    return $query->getResultArray();
    }

    public function dataPJProyek($username)
    {
        $query = $this->db->table('proyek');
        $query->where('pj_proyek', $username);
        return $query->get()->getResultArray();
    }

    public function getSearch($nama_proyek = null, $document_title = null, $kategori_document = null, $departmen = null, $start_date = null, $end_date = null, $industri = null)
    {
        // Membuat array dengan kolom yang akan digunakan dalam pencarian
        $searchData = [];
            
        if ($nama_proyek !== "") {
            $searchData['nama_proyek'] = $nama_proyek;
        }

        if ($document_title !== "") {
            $searchData['document_title'] = $document_title;
        }

        if ($kategori_document !== "") {
            $searchData['kategori_document'] = $kategori_document;
        }

        if ($industri !== "") {
            $searchData['industri'] = $industri;
        }

        if ($departmen !== "") {
            $searchData['deparment'] = $departmen;
        }

        // Melakukan pencarian berdasarkan data yang sesuai
        $session = session();
        $username = $session->get('name');
            if ($session->get('role') == 'PJ') {
                $query = $this->db->table('proyek'); 
                $query->where('pj_proyek', $username);
                $query->like($searchData);
                if ($start_date !== "" && $end_date !== "") {
                    $query->where("created >=", $start_date);
                    $query->where("created <=", $end_date);
                }
        
                // print_r($query->getCompiledSelect());exit();
        
                // Eksekusi query dan mengembalikan hasilnya
                return $query->get()->getResultArray();
            }elseif($session->get('role') == 'Member'){
                $query = $this->db->table('proyek_member')
                ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri, user.name')
                ->join('proyek', 'proyek.id = proyek_member.id_proyek')
                ->join('user', 'user.id = proyek_member.id_user')
                ->where('user.name', $username)
                ;
                $query->like($searchData);
                if ($start_date !== "" && $end_date !== "") {
                    $query->where("created >=", $start_date);
                    $query->where("created <=", $end_date);
                }
        
                // print_r($query->getCompiledSelect());exit();
        
                // Eksekusi query dan mengembalikan hasilnya
                return $query->get()->getResultArray();
            }else{
                $query = $this->db->table('proyek');
                $query->like($searchData);
                if ($start_date !== "" && $end_date !== "") {
                    $query->where("created >=", $start_date);
                    $query->where("created <=", $end_date);
                }
        
                // print_r($query->getCompiledSelect());exit();
        
                // Eksekusi query dan mengembalikan hasilnya
                return $query->get()->getResultArray();
            }
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

    public function totalProyek()
    {
        $session = session();
        if ($session->get('role') == "PJ") {
            $builder = $this->db->table('proyek');
            $builder->where('pj_proyek', $session->get('name'));
            return $builder->countAllResults();
        }elseif($session->get('role') == "Member"){
            $builder = $this->db->table('proyek_member')
            ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri, user.name')
            ->join('proyek', 'proyek.id = proyek_member.id_proyek')
            ->join('user', 'user.id = proyek_member.id_user')
            ->where('user.name', $session->get('name'));
            return $builder->countAllResults();
        }else{
            $builder = $this->db->table('proyek');
            return $builder->countAllResults();
        }
    }
    public function totalProyekOnGoing()
    {
        $session = session();
        if ($session->get('role') == "PJ") {
            $builder = $this->db->table('proyek');
            $builder->where('pj_proyek', $session->get('name'))
            ->where('kategori_document', 'On-Going');
            return $builder->countAllResults();
        }elseif($session->get('role') == "Member"){
            $builder = $this->db->table('proyek_member')
            ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri, user.name')
            ->join('proyek', 'proyek.id = proyek_member.id_proyek')
            ->join('user', 'user.id = proyek_member.id_user')
            ->where('user.name', $session->get('name'))
            ->where('proyek.kategori_document', 'On-Going');
            return $builder->countAllResults();
        }else{
            $builder = $this->db->table('proyek');
            $builder->where('kategori_document', 'On-Going');
            return $builder->countAllResults();
        }
    }
    public function totalProyekHold()
    {
        $session = session();
        if ($session->get('role') == "PJ") {
            $builder = $this->db->table('proyek');
            $builder->where('pj_proyek', $session->get('name'))
            ->where('kategori_document', 'Hold');
            return $builder->countAllResults();
        }elseif($session->get('role') == "Member"){
            $builder = $this->db->table('proyek_member')
            ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri, user.name')
            ->join('proyek', 'proyek.id = proyek_member.id_proyek')
            ->join('user', 'user.id = proyek_member.id_user')
            ->where('user.name', $session->get('name'))
            ->where('proyek.kategori_document', 'Hold');
            return $builder->countAllResults();
        }else{
            $builder = $this->db->table('proyek');
            $builder->where('kategori_document', 'Hold');
            return $builder->countAllResults();
        }
    }
    public function totalProyekFinish()
    {
        $session = session();
        if ($session->get('role') == "PJ") {
            $builder = $this->db->table('proyek');
            $builder->where('pj_proyek', $session->get('name'))
            ->where('kategori_document', 'Finish');
            return $builder->countAllResults();
        }elseif($session->get('role') == "Member"){
            $builder = $this->db->table('proyek_member')
            ->select('proyek_member.id, proyek_member.id_proyek, proyek_member.id_user, proyek.nama_proyek, proyek.document_title, proyek.kategori_document, proyek.deparment, proyek.created, proyek.ended, proyek.pj_proyek, proyek.industri, user.name')
            ->join('proyek', 'proyek.id = proyek_member.id_proyek')
            ->join('user', 'user.id = proyek_member.id_user')
            ->where('user.name', $session->get('name'))
            ->where('proyek.kategori_document', 'Finish');
            return $builder->countAllResults();
        }else{
            $builder = $this->db->table('proyek');
            $builder->where('kategori_document', 'Finish');
            return $builder->countAllResults();
        }
    }
}