<?php
namespace App\Models;
use CodeIgniter\Model;

class biodataModel extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table("biodata");
    }

    public function all()
    {
        $this->builder->select("*");
        $this->builder->orderBy("id","desc");
        
      

        $builder= $this->builder->get();
        //  var_dump($builder);die;
         return $builder;
         $builder->getResult();
    }
    public function byId($id)
    {
        $this->builder->select("*");
        // $this->builder->orderBy("id","desc");
        $this->builder->where('id',$id);
        
      

        $builder= $this->builder->get();
        //  var_dump($builder);die;
         return $builder;
         $builder->getResult();
    }
    public function savebiodata($data)
    {
        return $this->builder->insert($data);
    }
    public function deletebiodata($id)
    {
        $this->builder->where("id",$id);
        $this->builder->delete();
        // return $this->builder;
    }
    protected $table = 'biodata';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','tgl_lahir','alamat','no_telp','tempat_lahir'];
    public function updatebiodataa($id,$data)
    {
        $this->builder->select("*");
        // $this->builder->orderBy("id","desc");
        $this->builder->where('id',$id);
        
      

        $builder= $this->builder->get();

        $this->builder->where("id",$id);
       $this->builder->update($id,$data);
    }
}