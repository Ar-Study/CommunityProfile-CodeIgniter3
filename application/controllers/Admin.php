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
        // Periksa apakah user telah melakukan login
        if (!$this->session->userdata('email')) {
            // Jika belum, redirect kembali ke halaman login
            redirect('admin/signnin');
        }
        $data['berita'] = $this->Madmin->get_data('berita')->result();
        $data['judul'] = "SpyderBit | Admin - Home";

        // Menghitung jumlah baris dalam tabel "berita"
        $this->load->database(); // Load database
        $this->db->from('berita'); // Tentukan tabel yang akan dihitung jumlah barisnya
        $jumlah_baris = $this->db->count_all_results(); // Hitung jumlah baris
        $data['jumlah_berita'] = $jumlah_baris; // Simpan hasil perhitungan pada variabel $data

        $this->db->from('galeri');
        $jumlah_galeri = $this->db->count_all_results();
        $data['jumlah_galeri'] = $jumlah_galeri;

        $this->db->from('kegiatan');
        $jumlah_kegiatan = $this->db->count_all_results();
        $data['jumlah_kegiatan'] = $jumlah_kegiatan;
        
        $this->load->view('./admin/header', $data);
        $this->load->view('./admin/index', $data);
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

        // Menambahkan data percobaan login ke session jika belum ada
        if (!$this->session->userdata('login_attempts')) {
            $this->session->set_userdata('login_attempts', 0);
            $this->session->set_userdata('last_login_attempt', time());
        }

        $login_attempts = $this->session->userdata('login_attempts');
        $last_login_attempt = $this->session->userdata('last_login_attempt');

        // Mencegah percobaan login yang terlalu sering
        if ($login_attempts >= 3 && time() - $last_login_attempt < 900) {
            // Jika sudah tiga kali percobaan login dan masih dalam waktu 15 menit,
            // set flashdata error message dan redirect ke halaman login
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Anda telah mencoba login terlalu sering. Silakan coba lagi dalam 15 menit.</div>');
            redirect('admin/signnin');
        }

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika user ditemukan
        if ($user) {
            // Jika user telah diaktivasi dan memiliki role sebagai admin
            if ($user['is_active'] == 1 && $user['role_id'] == 2) {
                // Cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    // Reset data percobaan login pada session
                    $this->session->unset_userdata('login_attempts');
                    $this->session->unset_userdata('last_login_attempt');

                    // Jika login berhasil, redirect ke halaman admin
                    redirect('./admin/');
                } else {
                    // Jika password salah, increment jumlah percobaan login pada session
                    $login_attempts++;
                    $this->session->set_userdata('login_attempts', $login_attempts);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password salah!</div>');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email belum diaktivasi!</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum terdaftar!</div>');
        }

        // Menyimpan email yang dimasukkan ke session jika belum ada
        if (!$this->session->userdata('signnin_email')) {
            $this->session->set_userdata('signnin_email', $email);
        }

        // Menyimpan data waktu percobaan login terakhir ke session
        $this->session->set_userdata('last_login_attempt', time());

        // Redirect kembali ke halaman login
        redirect('admin/signnin');
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

    public function a_forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Reset Password';
            $this->load->view('admin/forgotpassword', $data);
        } else {
            $email = $this->input->post('email', TRUE);
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->Madmin->getUserInfoByEmail($email);

            if (!$userInfo) {
                $this->session->set_flashdata('error', 'Email address salah, silakan coba lagi.');
                redirect('admin/signnin');
            }

            $token = $this->Madmin->insertToken($userInfo->id);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . '/admin/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';
            $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

            echo $message; //send this through mail  
            exit;
        }
    }


    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->Madmin->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
            redirect(site_url('admin/signnin'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Reset Password ',
            'nama' => $user_info->name,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/reset_password', $data);
        } else {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = password_hash($cleanPost['password'],PASSWORD_DEFAULT) ;
            $cleanPost['password'] = $hashed;
            $cleanPost['id'] = $user_info->id;
            unset($cleanPost['passconf']);
            if (!$this->Madmin->updatePassword($cleanPost)) {
                $this->session->set_flashdata('sukses', 'Update password gagal.');
            } else {
                $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');
            }
            redirect(site_url('admin/signnin'), 'refresh');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    public function logout()
    {
        // Mengecek apakah user telah login sebelumnya
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        
        // Menghapus data user dari session
        $this->session->sess_destroy();

        // Memberikan pesan keberhasilan logout pada user
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda telah berhasil keluar</div>');

        // Redirect ke halaman login
        redirect('admin/signnin');
    }

    public function berita()
    {
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }

        $this->load->view('./admin/header');
        $this->load->view('./admin/berita_add');
        $this->load->view('./admin/footer');
    }
    public function berita_add_act()
    {
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        $this->load->view('./admin/header');
        $this->load->view('./admin/galeri_add');
        $this->load->view('./admin/footer');
    }
    public function galeri_add_act()
    {
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }

        $id = $this->input->post('id');
        $old_filename = $this->input->post('foto_old');
        $old_filecv = $this->input->post('cv_old');
        $new_filename = $_FILES['foto']['name'];
        $new_filecv = $_FILES['cv']['name'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('github', 'Link Github', 'required');

        if ($this->form_validation->run() != false) {
            $where = array('Id_foto' => $id);
            $data = array(
                'Nama_foto' => $this->input->post('nama'),
                'Deskripsi_foto' => $this->input->post('deskripsi'),
                'Portofolio' => $this->input->post('github')
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

            if ($new_filecv != "") {
                $update_filecv = time() . "-" . str_replace(' ', '-', $_FILES['cv']['name']);
                $config = array(
                    'upload_path' => './cv/',
                    'allowed_types' => 'pdf',
                    'max_size' => 2048,
                    'file_name' => $update_filecv
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('cv')) {
                    if (file_exists("./cv/" . $old_filecv)) {
                        unlink("./cv/" . $old_filecv);
                    }
                    $data['CV'] = $update_filecv;
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('./admin/header');
                    $this->load->view('./admin/galeri_edit', $error);
                    $this->load->view('./admin/footer');
                    return;
                }
            } else {
                $data['CV'] = $old_filecv;
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
        if (!$this->session->userdata('email')) {
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
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $data['judul'] = "SpyderBit | Admin - Kegiatan";
        $this->load->view('./admin/header',$data);
        $this->load->view('./admin/kegiatan', $data);
        $this->load->view('./admin/footer');
    }
    public function kegiatan_add()
    {
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        $data['judul'] = "SpyderBit | Admin - Tambah Kegiatan";
        $this->load->view('./admin/header',$data);
        $this->load->view('./admin/kegiatan_add');
        $this->load->view('./admin/footer');
    }
    public function kegiatan_add_act()
    {
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
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
                $jenis = $this->input->post('jenis_kegiatan');
                $waktu = $this->input->post('tanggal_kegiatan');
                $data = array(
                    'nama_kegiatan' => $nama,
                    'logo_kegiatan' => $foto,
                    'isi_kegiatan' => $isi,
                    'jenis_kegiatan' => $jenis,
                    'tanggal_kegiatan' => $waktu
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
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        $data['judul'] = "SpyderBit | Admin - Ubah Data Kegiatan";
        $where = array(
            'id_kegiatan' => $id
        );
        $data['kegiatan'] = $this->Madmin->edit_data($where, 'kegiatan')->result();
        $this->load->view('./admin/header',$data);
        $this->load->view('./admin/kegiatan_edit', $data);
        $this->load->view('./admin/footer');
    }

    public function kegiatan_update()
    {
        if (!$this->session->userdata('email')) {
            redirect('admin/signnin');
        }
        
        $id = $this->input->post('id');
        $old_filename = $this->input->post('foto_old');
        $new_filename = $_FILES['foto']['name'];
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        
        if ($this->form_validation->run() != false) {
            $update_filename = $old_filename;
        
            if ($new_filename != '') {
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
            }
        
            $where = array(
                'id_kegiatan' => $id
            );
        
            $data = array(
                'nama_kegiatan' => $this->input->post('nama'),
                'logo_kegiatan' => $update_filename,
                'isi_kegiatan' => $this->input->post('content'),
                'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
                'lokasi_kegiatan'=> $this->input->post('lokasi')
            );
        
            $this->Madmin->update_data($where, $data, 'kegiatan');
            redirect(base_url() . 'admin/kegiatan');
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
        if (!$this->session->userdata('email')) {
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
