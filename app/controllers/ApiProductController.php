<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
        $this->call->database();
        $this->call->model('ProductModel');
    }

    public function index()
    {
        $this->api->require_jwt();
        $products = $this->ProductModel->get_all_products();
        $this->api->respond(['products' => $products]);
    }

    public function show($id)
    {
        $this->api->require_jwt();
        $product = $this->ProductModel->get_product($id);

        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->api->respond(['product' => $product]);
    }

    public function create()
    {
        $this->api->require_jwt();
        $this->api->require_method('POST');

        $data = $this->api->body();

        if (empty($data['product_name']) || !isset($data['price'])) {
            $this->api->respond_error('product_name and price are required.', 422);
        }

        $id = $this->ProductModel->create_product([
            'product_name' => $data['product_name'],
            'description'  => $data['description'] ?? '',
            'price'        => $data['price'],
            'quantity'     => $data['quantity'] ?? 0,
        ]);

        $this->api->respond(['message' => 'Product created.', 'id' => $id], 201);
    }

    public function update($id)
    {
        $this->api->require_jwt();
        $this->api->require_method('PUT');

        $data = $this->api->body();

        if (!$this->ProductModel->get_product($id)) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->ProductModel->update_product($id, $data);
        $this->api->respond(['message' => 'Product updated.']);
    }

    public function delete($id)
    {
        $this->api->require_jwt();
        $this->api->require_method('DELETE');

        if (!$this->ProductModel->get_product($id)) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->ProductModel->delete_product($id);
        $this->api->respond(['message' => 'Product deleted.']);
    }
}