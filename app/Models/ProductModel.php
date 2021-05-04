<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model {

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'quantity', 'price'];


    public function getProduct($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insertProduct($data)
    {            
        return $this->insert($data);
    }

    public function updateProduct($id,$data){
        return $this->update($id,$data);
    }

    public function removeProduct($id = null){
        return $this->delete($id);
    }

    public function searchProductbySubstring($string){
        return $this->like('title',$string)->findAll();
    }

    public function sorting($field,$order){
        return $this->orderBy($field,$order)->findAll();
    }


}

?>