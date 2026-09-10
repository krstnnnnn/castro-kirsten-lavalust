<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primary_key = 'id';

    public function get_all_products()
    {
        return $this->all();
    }

    public function get_product($id)
    {
        return $this->find($id);
    }

    public function create_product($data)
    {
        return $this->insert($data);
    }

    public function update_product($id, $data)
    {
        return $this->update($id, $data);
    }

    public function delete_product($id)
    {
        return $this->delete($id);
    }
}