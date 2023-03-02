<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');
    }
    public function index()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Diskusi, Berkarya, Dan Berkontribusi";
        $this->load->view('auth/index', $data);
    }

    public function profile()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Profil";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/profile');
        $this->load->view('frontend/auth_footer');
    }

    public function profile_management()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Profil Kepengurusan";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/profile_management');
        $this->load->view('frontend/auth_footer');
    }

    public function gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Galeri";
        $data['galeri'] = $this->Madmin->get_data('galeri')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/gallery', $data);
        $this->load->view('frontend/auth_footer');
    }

    public function all_gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Semua Galeri";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/all_gallery');
        $this->load->view('frontend/auth_footer');
    }

    public function activity()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Jenis Kegiatan Kami";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/activity');
        $this->load->view('frontend/auth_footer');
    }

    public function news()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Berita";
        $data['berita'] = $this->Madmin->get_data('berita')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/news',$data);
        $this->load->view('frontend/auth_footer');
    }

    public function contact()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Kontak";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/contact');
        $this->load->view('frontend/auth_footer');
    }
}
