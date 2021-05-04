<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{


	public function index()
	{
		 
		$productModel = new ProductModel();
		$data['productList'] = $productModel->getProduct();
		echo view('common/header');
		echo view('form_view', $data);
		echo view('common/footnote');
	}

	public function searchQueryHeader(){

		$searchQuery = $this->request->getVar('SearchQuery');
		$productModel = new ProductModel();
		
		$data['productList'] = $productModel->searchProductbySubstring($searchQuery);
		echo view('common/header');
		echo view('form_view', $data);
		echo view('common/footnote');
	}

	public function register_product()
	{
		echo view('common/header');
		echo view('form_register');
		echo view('common/footnote');
	}

	public function delete_product($id = NULL)
	{
		if ($id == null) {
			return redirect()->to('/');
		}
		$productModel = new ProductModel();
		$productModel->removeProduct($id);
		return redirect()->to('/');
	}

	public function edit_product_view($id = null)
	{
		$productModel = new ProductModel();
		$data_to_be_updated = $productModel->getProduct($id);
		echo view('common/header');
		echo view('form_edit', $data_to_be_updated);
		echo view('common/footnote');
	}


	private function validateForm()
	{

		$validation =  \Config\Services::validation();

		$validation->setRules([
			'FormControlInputTitle' => ['label' => 'Title', 'rules' => 'required|min_length[3]'],
			'FormControlInputQuantity' => ['label' => 'Quantity', 'rules' => 'required|integer'],
			'FormControlInputPrice' => ['label' => 'Price', 'rules' => 'required|integer']

		]);
		return $validation;
	}


	public function update_product($id = null)
	{
		$productModel = new ProductModel();

		$validation = $this->validateForm();

		if ($validation->withRequest($this->request)->run()) {


			$data = array(


				'title' => $this->request->getVar('FormControlInputTitle'),

				'description' => $this->request->getVar('FormControlInputDescription'),

				'quantity' => $this->request->getVar('FormControlInputQuantity'),

				'price' => $this->request->getVar('FormControlInputPrice')



			);
			//print_r($data);
			$productModel->updateProduct($id, $data);
			$this->session->setFlashdata('messageRegisterOk', ' Product updated successful.');
			return redirect()->to('/');
		} else {
			$this->edit_product_view($id);
			
		}
	}

	public function sortingTitle(){
		$productModel = new ProductModel();
		$data['productList'] = $productModel->sorting('title','asc');
		echo view('common/header');
		echo view('form_view', $data);
		echo view('common/footnote');

	}



	public function store_product()
	{

		$productModel = new ProductModel();

		$validation = $this->validateForm();

		if ($validation->withRequest($this->request)->run()) {

			$data = array(
				'title' => $this->request->getVar('FormControlInputTitle'),
				'description' => $this->request->getVar('FormControlInputDescription'),
				'quantity' => $this->request->getVar('FormControlInputQuantity'),
				'price' => $this->request->getVar('FormControlInputPrice')
			);

			$productModel->insertProduct($data);
			$this->session->setFlashdata('messageRegisterOk', ' Product registered successful.');
			return redirect()->to('/');
		} else {
			$this->register_product();
		}
	}
}
