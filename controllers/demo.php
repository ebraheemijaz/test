<?php
class Demo extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Fetchdata');
    }
    public function index(){
        $this->load->library('pagination');

        $config['base_url'] = site_url().'/demo/index/';
        $config['total_rows'] = $this->Fetchdata->record_count();
        $config['per_page'] = 20;
        $config["uri_segment"] = 3;
        $config["num_links"] = 4;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';	
        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["members"] = $this->Fetchdata->fetch_members($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        // print_r($data);
        // echo $this->pagination->create_links();
        $this->load->view('back/header', $data);
        $this->load->view('paginationFetch');
        $this->load->view('back/footer');
    }
    
    public function search_member() {
        $name = $this->input->post('search');
        $this->load->library('pagination');

        $config['base_url'] = site_url().'/demo/search_member/';
        $config['total_rows'] = $this->Fetchdata->record_count();
        $config['per_page'] = 20;
        $config["uri_segment"] = 3;
        $config["num_links"] = 4;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';	
        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        // print_r($name);
        if(isset($name) and !empty($name)) {
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['members'] = $this->Fetchdata->searchData($name);
            // $data["links"] = $this->pagination->create_links();
            $this->load->view('back/header', $data);
            $this->load->view('paginationFetch');
            $this->load->view('back/footer');
        }else{
            redirect($this->index());
        }
    }
}
?>