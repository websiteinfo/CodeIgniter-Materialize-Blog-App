<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Categories extends CI_Controller{

        public function __construct(){
	        parent::__construct();
	        $this->load->model('category_model');
	        $this->load->model('post_model');
        }

		public function index(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}			
			$data['title'] = 'Categories';

			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header', $data);
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Create a category';

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();

				// Set message
				$this->session->set_flashdata('category_created', 'Category created!');

				redirect('categories');
			}
		}

		public function posts($id){
			$data['title'] = $this->category_model->get_category($id)->name;

			$data['posts'] = $this->post_model->get_posts_by_category($id);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);

			// Set message
			$this->session->set_flashdata('category_deleted', 'Category deleted');

			redirect('categories');
		}
	}