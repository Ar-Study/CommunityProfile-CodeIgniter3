<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('./admin/header');
        $this->load->view('./admin/index');
        $this->load->view('./admin/footer');
    }

    public function signnin()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign In Administrator';
            $this->load->view('backend/admin_header', $data);
            $this->load->view('admin/signnin');
            $this->load->view('backend/admin_footer');
        } else {
            // sukses validasinya
            $this->_signnin();
        }
    }

    private function _signnin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('./admin/');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            password salah!</div>');
                    redirect('admin/signnin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum diaktivasi!</div>');
                redirect('admin/signnin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!</div>');
            redirect('admin/signnin');
        }
    }


    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has alrady register!'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'matches' => 'password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Admin';
            $this->load->view('backend/admin_header', $data);
            $this->load->view('admin/registration');
            $this->load->view('backend/admin_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            selamat!,  Anda berhasil membuat akun</div>');
            redirect('admin/signnin');
        }
    }

    public function forgotpassword()
    {
        $this->load->view('backend/admin_header');
        $this->load->view('admin/forgotpassword');
        $this->load->view('backend/admin_footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            selamat!,  Anda berhasil keluar</div>');
        redirect('admin/signnin');
    }
}
