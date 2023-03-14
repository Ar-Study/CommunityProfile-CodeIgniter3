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
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
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

    public function full_gallery(){
        $data['title'] =  "Komunitas Programmer Millenial | Galeri";
        $data['galeri'] = $this->Madmin->get_data('galeri')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/full_gallery', $data);
        $this->load->view('frontend/auth_footer');
    }

    public function all_gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Galeri Kegiatan Kelompok";
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/all_gallery',$data);
        $this->load->view('frontend/auth_footer');
    }
    public function individu_gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Galeri Kegiatan Individu";
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/individu_gallery',$data);
        $this->load->view('frontend/auth_footer');
    }

    public function activity()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Jenis Kegiatan Kami";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/activity');
        $this->load->view('frontend/auth_footer');
    }

    public function news($page_number = 1)
    {
        $data['title'] =  "Komunitas Programmer Millenial | Berita";
        $berita_per_page = 3;
        $start = ($page_number - 1) * $berita_per_page;
        $data['berita'] = $this->Madmin->get_data('berita', $berita_per_page, $start)->result();
        $total_berita = $this->Madmin->get_data('berita')->num_rows();
        $total_pages = ceil($total_berita / $berita_per_page);
        $data['current_page'] = $page_number;
        $data['total_pages'] = $total_pages;
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/news', $data);
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
