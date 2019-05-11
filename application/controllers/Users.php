<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->model('user_model');
        }

		public function register(){
			$data['title'] = 'REGISTRATION';

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = hash("sha512", $this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('You are registered!', 'You are registered and you can log in');

                redirect(base_url());
			}
		}

		public function login(){
			$data['title'] = 'LOGIN PANEL';

			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				$username = $this->input->post('username');
				$password = hash("sha512", $this->input->post('password'));

				$user_id = $this->user_model->login($username, $password);

				if($user_id){

					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', '<h4 class="center green-text shadow-text">You are correctly logged in, you can now edit / delete posts.</h4>');

                    redirect(base_url());
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', '<h4 class="center red-text shadow-text"><strong>Attention! </strong>Login / Password incorrect!</h4>');

                    redirect(base_url());
				}		
			}
		}


		public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			

			$this->session->set_flashdata('user_loggedout', '<h5 class="center green-text shadow-text">You have been logged out correctly.</h5>');
            redirect(base_url());
			$this->session->sess_destroy();
		}

		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Username exists');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Email exists, choose another one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

}