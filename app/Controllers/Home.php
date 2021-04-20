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
		echo view('form_view',$data);
		echo view('common/footnote');
	}

	public function register_product(){
		echo view('common/header');
		echo view('form_register');
		echo view('common/footnote');
	}

	public function delete_product($id=NULL){
		if ($id==null){
			return redirect()->to('/');
		}
		$productModel = new ProductModel();
		$productModel->removeProduct($id);
		return redirect()->to('/');

	}

	public function edit_product_view($id=null){
		$productModel = new ProductModel();
		$data_to_be_updated = $productModel->getProduct($id);
		echo view('common/header');
		echo view('form_edit',$data_to_be_updated);
		echo view('common/footnote');
		
	}

	public function update_product($id=null){
		$productModel = new ProductModel();
		
		$data = array(

			
			'title' => $this->request->getVar('FormControlInputTitle'),
			
			'description' => $this->request->getVar('FormControlInputDescription'),

			'quantity' => $this->request->getVar('FormControlInputQuantity'),

			'price' => $this->request->getVar('FormControlInputPrice')

			

		);
		//print_r($data);
		$productModel->updateProduct($id,$data);
		$this->session->setFlashdata('messageRegisterOk',' Product updated successful.' );
		return redirect()->to('/');

	}

	public function store_product(){

		$productModel = new ProductModel();
		
		$data = array(


			'title' => $this->request->getVar('FormControlInputTitle'),
			
			'description' => $this->request->getVar('FormControlInputDescription'),

			'quantity' => $this->request->getVar('FormControlInputQuantity'),

			'price' => $this->request->getVar('FormControlInputPrice')

			

		);
		// temporary
		$productModel->insertProduct($data);
		$this->session->setFlashdata('messageRegisterOk',' Product registered successful.' );
		return redirect()->to('/');

	}



	
}
