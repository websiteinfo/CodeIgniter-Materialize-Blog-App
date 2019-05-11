<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Posts extends CI_Controller{

        public function __construct(){
	        parent::__construct();
	        $this->load->model('post_model');
        }

		public function index($offset = 0){
			$config['base_url'] = base_url() . 'posts/index';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 4;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');
			
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '';
			$config['prev_tag_open'] = '';
			$config['prev_tag_close'] = '';
			$config['next_link'] = '';
			$config['next_tag_open'] = '';
			$config['next_tag_close'] = '';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Last post';

			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

			$sitebar_data['sitebar_posts'] = $this->post_model->get_posts();

			$data['sitebar'] = $this->load->view('templates/sitebar', $sitebar_data, true);

			$this->load->view('templates/header', $data);
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$sitebar_data['sitebar_posts'] = $this->post_model->get_posts();

			$data['sitebar'] = $this->load->view('templates/sitebar', $sitebar_data, true);

			$this->load->view('templates/header', $data);
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'New post';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Text', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '1048';
				$config['max_width'] = '1000';
				$config['max_height'] = '1000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
                    $post_image = '';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);

				// Set message
				$this->session->set_flashdata('post_created', '<h4 class="center green-text shadow-text">Post created!</h4>');

                redirect(base_url());
			}
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->delete_post($id);

			// Set message
			$this->session->set_flashdata('post_deleted', '<h4 class="center red-text shadow-text">Post deleted!</h4>');

			redirect(base_url());
		}

		public function edit($slug){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit post';

			$this->load->view('templates/header', $data);
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1048';
			$config['max_width'] = '1000';
			$config['max_height'] = '1000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = '';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}


			$this->post_model->update_post($post_image);

			// Set message
			$this->session->set_flashdata('post_updated', '<h4 class="center green-text shadow-text">Post updated!</h4>');

            redirect(base_url());
		}
	}