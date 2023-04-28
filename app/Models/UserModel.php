<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'user';
    
    protected $allowedFields = [
        'nip',
        'name',
        'email',
        'password',
        'role',
        'status',
    ];
}