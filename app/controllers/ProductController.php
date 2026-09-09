   <?php
   defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

   class ProductController extends Controller
   {
       public function __construct()
       {
           parent::__construct();
           $this->call->database();
           $this->call->model('ProductModel');
       }

       public function index()
       {
           $data['products'] = $this->ProductModel->get_all_products();
           $this->call->view('products/index', $data);
       }

       public function create()
       {
           if ($_POST) {
               $this->ProductModel->create_product([
                    'product_name' => $this->io->post('product_name'),
                    'description'  => $this->io->post('description'),
                    'price'        => $this->io->post('price'),
                    'quantity'     => $this->io->post('quantity'),
               ]);
               redirect('products');
           } else {
               $this->call->view('products/create');
           }
       }

       public function edit()
       {
           $id = $_GET['id'] ?? null;

           if (!$id) {
               redirect('products');
           }

           if ($_POST) {
               $this->ProductModel->update_product($id, [
                    'product_name' => $this->io->post('product_name'),
                    'description'  => $this->io->post('description'),
                    'price'        => $this->io->post('price'),
                    'quantity'     => $this->io->post('quantity'),
               ]);
               redirect('products');
           } else {
               $data['product'] = $this->ProductModel->get_product($id);
               $this->call->view('products/edit', $data);
           }
       }

       public function delete()
       {
           $id = $_GET['id'] ?? null;

           if ($id) {
               $this->ProductModel->delete_product($id);
           }

           redirect('products');
       }
   }