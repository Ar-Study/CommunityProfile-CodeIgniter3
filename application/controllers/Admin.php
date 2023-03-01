<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');
       
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }else {
            # code...
        }
        $data['judul'] = "SpyderBit | Admin - Home";
        $this->load->view('./admin/header',$data);
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
            if ($user['is_active'] == 1 && $user['role_id'] == 2) {
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
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            selamat!,  Anda berhasil keluar</div>');
        redirect('admin/signnin');
    }
    public function berita()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $data['berita'] = $this->Madmin->get_data('berita')->result();
        $data['judul'] = "SpyderBit | Admin - Berita";
        $this->load->view('./admin/header', $data); // tambahkan tanda $ sebelum data
        $this->load->view('./admin/berita', $data);
        $this->load->view('./admin/footer');
    }

    public function berita_add()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }

        $this->load->view('./admin/header');
        $this->load->view('./admin/berita_add');
        $this->load->view('./admin/footer');
    }
    public function berita_add_act()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run() != false) {
            $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['foto']['name']);
            $config['upload_path']          = './img/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $update_filename;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                echo "Gagal Tambah";
            } else {
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $nama = $this->input->post('nama');
                $isi = $this->input->post('content');
                $data = array(
                    'Judul_berita' => $nama,
                    'Foto_berita' => $foto,
                    'Deskripsi_berita' => $isi,
                    'Tanggal_berita' => date("Y-m-j")
                );
                $this->Madmin->insert_data($data, 'berita');
                redirect(base_url() . 'admin/berita');
            }
        } else {
            $this->load->view('./admin/header');
            $this->load->view('./admin/berita_add');
            $this->load->view('./admin/footer');
        }
    }

    public function berita_edit($id)
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $where = array(
            'Id_berita' => $id
        );
        $data['berita'] = $this->Madmin->edit_data($where, 'berita')->result();
        $this->load->view('./admin/header');
        $this->load->view('./admin/berita_edit', $data);
        $this->load->view('./admin/footer');
    }

    public function berita_update()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $id = $this->input->post('id');
        $old_filename = $this->input->post('foto_old');
        $new_filename = $_FILES['foto']['name'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run() != false) {
            $where = array(
                'Id_berita' => $id
            );
            $data = array(
                'Judul_berita' => $this->input->post('nama'),
                'Deskripsi_berita' => $this->input->post('content'),
                'Tanggal_berita' => $this->input->post('tanggal')
            );
            if ($new_filename != "") {
                $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['foto']['name']);
                $config = [
                    'upload_path' => './img/',
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => 2048,
                    'file_name' => $update_filename
                ];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    if (file_exists("./img/" . $old_filename)) {
                        unlink("./img/" . $old_filename);
                    }
                    $data['Foto_berita'] = $update_filename;
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('./admin/header');
                    $this->load->view('./admin/berita_edit', $error);
                    $this->load->view('./admin/footer');
                    return;
                }
            }

            $this->Madmin->update_data($where, $data, 'berita');
            redirect(base_url() . 'admin/berita');
        } else {
            $where = array(
                'Id_berita' => $id
            );
            $data['berita'] = $this->Madmin->edit_data($where, 'berita')->result();
            $this->load->view('./admin/header');
            $this->load->view('./admin/berita_edit', $data);
            $this->load->view('./admin/footer');
        }

    }

    public function berita_hapus()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $id = $this->input->post('id');
        $where = array(
            'Id_berita' => $id
        );

        $old_filename = $this->input->post('foto_old');
        if (file_exists("./img/" . $old_filename)) {
            unlink("./img/" . $old_filename);
        }

        $this->Madmin->delete_data($where, 'berita');
        redirect(base_url() . 'admin/berita');
    }

    public function galeri()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $data['galeri'] = $this->Madmin->get_data('galeri')->result();
        $data['judul'] = "SpyderBit | Admin - Gallery";
        $this->load->view('./admin/header', $data);
        $this->load->view('./admin/galeri', $data);
        $this->load->view('./admin/footer');
    }
    public function galeri_add()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $this->load->view('./admin/header');
        $this->load->view('./admin/galeri_add');
        $this->load->view('./admin/footer');
    }
    public function galeri_add_act()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Diri', 'required');
        if ($this->form_validation->run() != false) {
            $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['foto']['name']);
            $config['upload_path']          = './img/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $update_filename;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                echo "Gagal Tambah";
            } else {
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $nama = $this->input->post('nama');
                $isi = $this->input->post('deskripsi');
                $data = array(
                    'Nama_foto' => $nama,
                    'Deskripsi_foto' => $isi,
                    'Foto' => $foto,
                );
                $this->Madmin->insert_data($data, 'galeri');
                redirect(base_url() . 'admin/galeri');
            }
        } else {
            $this->load->view('./admin/header');
            $this->load->view('./admin/galeri_add');
            $this->load->view('./admin/footer');
        }
    }
    public function galeri_edit($id)
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $where = array(
            'Id_foto' => $id
        );
        $data['galeri'] = $this->Madmin->edit_data($where, 'galeri')->result();
        $this->load->view('./admin/header');
        $this->load->view('./admin/galeri_edit', $data);
        $this->load->view('./admin/footer');
    }
    public function galeri_update()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $id = $this->input->post('id');
        $old_filename = $this->input->post('foto_old');
        $new_filename = $_FILES['foto']['name'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() != false) {
            $where = array('Id_foto' => $id);
            $data = array(
                'Nama_foto' => $this->input->post('nama'),
                'Deskripsi_foto' => $this->input->post('deskripsi')
            );
            if ($new_filename != "") {
                $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['foto']['name']);
                $config = array(
                    'upload_path' => './img/',
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => 2048,
                    'file_name' => $update_filename
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    if (file_exists("./img/" . $old_filename)) {
                        unlink("./img/" . $old_filename);
                    }
                    $data['Foto'] = $update_filename;
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('./admin/header');
                    $this->load->view('./admin/galeri_edit', $error);
                    $this->load->view('./admin/footer');
                    return;
                }
            }

            $this->Madmin->update_data($where, $data, 'galeri');
            redirect(base_url() . 'admin/galeri');
        } else {
            $where = array('Id_foto' => $id);
            $data['galeri'] = $this->Madmin->edit_data($where, 'galeri')->result();
            $this->load->view('./admin/header');
            $this->load->view('./admin/galeri_edit', $data);
            $this->load->view('./admin/footer');
        }

    }
    public function galeri_hapus()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $id = $this->input->post('id');
        $where = array(
            'Id_foto' => $id
        );

        $old_filename = $this->input->post('foto_old');
        if (file_exists("./img/" . $old_filename)) {
            unlink("./img/" . $old_filename);
        }

        $this->Madmin->delete_data($where, 'galeri');
        redirect(base_url() . 'admin/galeri');
    }
    public function kegiatan()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $this->load->view('./admin/header');
        $this->load->view('./admin/kegiatan', $data);
        $this->load->view('./admin/footer');
    }
    public function kegiatan_add()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $this->load->view('./admin/header');
        $this->load->view('./admin/kegiatan_add');
        $this->load->view('./admin/footer');
    }
    public function kegiatan_add_act()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run() != false) {
            $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['foto']['name']);
            $config['upload_path']          = './img/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $update_filename;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                echo "Gagal Tambah";
            } else {
                $foto = $this->upload->data();
                $foto = $foto['file_name'];
                $nama = $this->input->post('nama');
                $isi = $this->input->post('content');
                $data = array(
                    'nama_kegiatan' => $nama,
                    'logo_kegiatan' => $foto,
                    'isi_kegiatan' => $isi
                );
                $this->Madmin->insert_data($data, 'kegiatan');
                redirect(base_url() . 'admin/kegiatan');
            }
        } else {
            $this->load->view('./admin/header');
            $this->load->view('./admin/kegiatan_add');
            $this->load->view('./admin/footer');
        }
    }
    public function kegiatan_edit($id)
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $where = array(
            'id_kegiatan' => $id
        );
        $data['kegiatan'] = $this->Madmin->edit_data($where, 'kegiatan')->result();
        $this->load->view('./admin/header');
        $this->load->view('./admin/kegiatan_edit', $data);
        $this->load->view('./admin/footer');
    }

    public function kegiatan_update()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $id = $this->input->post('id');
        $old_filename = $this->input->post('foto_old');
        $new_filename = $_FILES['foto']['name'];
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run() != false) {
            if ($new_filename == true) {
                $update_filename = time() . "-" . str_replace(' ', '-', $_FILES['foto']['name']);
                $config = [
                    'upload_path' => './img/',
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => 2048,
                    'file_name' => $update_filename
                ];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    if (file_exists("./img/" . $old_filename)) {
                        unlink("./img/" . $old_filename);
                    }
                } else {
                    $update_filename = $old_filename;
                }

                $where = array(
                    'id_kegiatan' => $id
                );

                $data = array(
                    'nama_kegiatan' => $this->input->post('nama'),
                    'logo_kegiatan' => $update_filename,
                    'isi_kegiatan' => $this->input->post('content'),
                );
                $this->Madmin->update_data($where, $data, 'kegiatan');
                redirect(base_url() . 'admin/kegiatan');
            } else {
                redirect(base_url() . 'admin/kegiatan');
            }
        } else {
            $where = array(
                'id_kegiatan' => $id
            );
            $data['kegiatan'] = $this->Madmin->edit_data($where, 'kegiatan')->result();
            $this->load->view('./admin/header');
            $this->load->view('./admin/kegiatan_edit', $data);
            $this->load->view('./admin/footer');
        }
    }
    public function kegiatan_hapus()
    {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/signnin');
        }
        $id = $this->input->post('id');
        $where = array(
            'id_kegiatan' => $id
        );

        $old_filename = $this->input->post('foto_old');
        if (file_exists("./img/" . $old_filename)) {
            unlink("./img/" . $old_filename);
            $this->Madmin->delete_data($where, 'kegiatan');
        }
        redirect(base_url() . 'admin/kegiatan');
    }

}
