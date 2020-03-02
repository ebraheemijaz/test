<?php
class Super extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->view("index");
    }
    public function view($page_name){
        $check = $this->session->userdata('superAdmin');
        if(!empty($check)){
            $data['errors'] = $this->session->userdata("error");
            $this->session->unset_userdata("error");
            $data['clients']=$this->data->fetch('clients');
            $data['a'] = $this->uri->segment(4);
            $data['superAdmin'] = $check;
            $data['admin']=$this->data->fetch("admins");
            $data['msg'] = $this->session->userdata('msg');
            $data['notice']=$this->data->fetch('notice_board');
            $data['jobs']=$this->data->fetch('jobs');
            if(isset($_GET['q']) && !empty($_GET['q']) && $page_name == 'jobs.php'){
                if(isset($_GET['type'])){
                    if($_GET['type'] == 'name'){
                        $data['jobs']=$this->data->myquery("SELECT * FROM `jobs` WHERE `id` = '{$_GET['q']}'");
                    }
                    if($_GET['type'] == 'postal'){
                        $data['jobs']=$this->data->myquery("SELECT * FROM `jobs` WHERE `postal` = '{$_GET['q']}'");
                    }
                    if($_GET['type'] == 'subject'){
                        $data['jobs']=$this->data->myquery("SELECT * FROM `jobs` WHERE `subjects` LIKE '%{$_GET['q']}%'");
                    }
                    if($_GET['type'] == 'student'){
                        $data['jobs']=$this->data->myquery("SELECT * FROM `jobs` WHERE `student` LIKE '%{$_GET['q']}%'");
                    }
                }
            }
            if(!empty($data['jobs'])){
                foreach($data['jobs'] as $k=>$val){
                    $x = $this->data->fetch('tutors',array('id'=>$val['tutor']));
                    $data['jobs'][$k]['tutor_name']='';
                    $data['jobs'][$k]['tutor_email']='';
                    if(!empty($x)){
                        $data['jobs'][$k]['tutor_name']=$x[0]['name'];
                        $data['jobs'][$k]['tutor_email']=$x[0]['email'];
                    }
                }
            }
            $data['tutors']=$this->data->fetch('tutors');
            if(isset($_GET['q']) && !empty($_GET['q']) && $page_name == 'tutors.php'){
                if(isset($_GET['type'])){
                    if($_GET['type'] == 'name'){
                        $data['tutors']=$this->data->myquery("SELECT * FROM `tutors` WHERE `name` LIKE '%{$_GET['q']}%'");
                    }
                    if($_GET['type'] == 'postal'){
                        $data['tutors']=$this->data->myquery("SELECT * FROM `tutors` WHERE `postal` = '{$_GET['q']}'");
                    }
                    if($_GET['type'] == 'subject'){
                        $data['tutors']=$this->data->myquery("SELECT * FROM `tutors` WHERE `subjects` LIKE '%{$_GET['q']}%'");
                    }
                    if($_GET['type'] == 'city'){
                        $data['tutors']=$this->data->myquery("SELECT * FROM `tutors` WHERE `city` = '{$_GET['q']}'");
                    }
                }
            }

            $this->session->unset_userdata('msg');
            $this->load->view('super/header',$data);
            $this->load->view('super/'.$page_name);
            $this->load->view('super/footer');
        }else{
            redirect('home/superlogin','refresh');
        }
    }
    public function tutor($id){
        $check = $this->session->userdata('superAdmin');
        if(!empty($check)){
            $data['superAdmin']=$check;
            $data['tutors']=$this->data->fetch('tutors',array('id'=>$id));
            $a=$this->data->fetch('notice_board',array('admin_id'=>''));
            $b=$this->data->fetch('notice_board',array('admin_id'=>$check[0]['id']));
            $data['notice'] = array_merge($a,$b);
            $this->load->view('super/header',$data);
            $this->load->view('front/tutor_profile');
            $this->load->view('front/footer');
        }else{
            $this->login();
        }
    }
    public function logout(){
        $this->session->unset_userdata("superAdmin");
        redirect("super/",'refresh');
    }
    public function insert($table,$redirect){
        $data=$this->input->post();
        if($table == 'admins'){
            if(empty($data['name']) OR empty($data['email']) OR empty($data['password'])){
                $this->session->set_userdata('msg',"Missing Information");
                redirect('super/view/create_admin_user');
                exit();
            }else{
                $data['name']=htmlspecialchars($data['name']);
                $data['email']=htmlspecialchars($data['email']);
                $data['password']=htmlspecialchars($data['password']);
                $this->session->set_userdata('msg',"Registered Successfully");
            }
        }
        if($table == 'tutors'){
            if(isset($data['sector']) && !empty($data['sector'])){
                $data['type'] = implode(",",$data['sector']);
                unset($data['sector']);
            }
            if(isset($data['tutor_expertise']) && !empty($data['tutor_expertise'])){
                $data['tutor_expertise'] = implode(",",$data['tutor_expertise']);
            }
            if(isset($_FILES['profile_pic']) && isset($_FILES['profile_pic']['name']) && !empty($_FILES['profile_pic']['name'])){
                $x = $this->do_upload1('profile_pic');
                if(isset($x['upload_data'])){
                    $data['profile_pic'] = "assets_f/img/".$x['upload_data']['file_name'];
                }
            }
            if(isset($_FILES['dbs_file']) && isset($_FILES['dbs_file']['name']) && !empty($_FILES['dbs_file']['name'])){
                $x = $this->do_upload1('dbs_file');
                if(isset($x['upload_data'])){
                    $data['dbs_file'] = "assets_f/img/".$x['upload_data']['file_name'];
                }
            }
        }
        if($table == "jobs"){
            $check = $this->data->fetch("clients",array("name"=>$data['client']['name'],'email'=>$data['client']['email']));
            if(empty($check)){
                $this->data->insert("clients",$data['client']);
                $check = $this->data->fetch("clients",array("name"=>$data['client']['name'],'email'=>$data['client']['email']));
            }
            $data['client'] = !empty($check) ? $check[0]['id'] : "undefined" ;
        }
        $this->data->insert($table,$data);
        redirect("super/view/".$redirect,"refresh");
    }
    public function delete($id){
        $this->data->delete(array('id'=>$id),'notice_board');
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function status($i,$s){
        $this->data->update(array("id"=>$i),'tutors',array('status'=>$s));
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    public function ajax($id){
        $check = $this->session->userdata("superAdmin");
        if(!empty($check)){
            if($id == "getRecepients"){
                $x = $this->data->fetch("messages",array("to"=>"0"));
                $y = $this->data->fetch("messages",array("from"=>"0"));
                $messages = array_merge($y,$x);
                $abc = $this->data->fetch("admins",array('id'=>3));
                ?>
                <tr class="unread">
                    <td class="inbox-small-cells">
                        <input type="checkbox" class="mail-checkbox">
                    </td>
                    <td class="view-message dont-show"><?= $abc[0]['name'] ?> <?= $abc[0]['lname'] ?></td>
                    <td class="view-message"><a href="<?= site_url('home/view') ?>/message_detail"><?= $messages[(count($messages)-1)]['message'] ?></a></td>
                    <td class="view-message inbox-small-cells"></td>
                    <td class="view-message text-right"><?= date("d-M-Y h:i:s",strtotime($messages[(count($messages)-1)]['date'])) ?></td>
                </tr>
            <?php
            }
            if($id == "getMessage"){
                $x = $this->data->fetch("messages",array("to"=>'0'));
                $y = $this->data->fetch("messages",array("from"=>'0'));
                $messages = array_merge($y,$x);
                foreach($messages as $val){
                    if($val['from'] == '0') { $val['from'] = "SuperAdmin"; }
                    else{ $x = $this->data->fetch('admins',array('id'=>$val['from'])); if(!empty($x)) $val['from'] = $x[0]['name']; }
                    ?>
                    <div class="group-rom">
                        <div class="first-part odd"><?= $val['from'] ?></div>
                        <div class="second-part"><?= $val['message'] ?></div>
                        <div class="third-part"><?= date("d-M-Y h:i:s",strtotime($val['date'])) ?></div>
                    </div>
                <?php
                }
            }
            if($id == 'sendMessage'){
                $data = $this->input->post();
                $x['message'] = htmlspecialchars($data['msg']);
                $x['to'] = 3;
                $x['from'] = 0;
                $this->data->insert("messages",$x);
            }
        }
    }
    public function update(){
        $check = $this->session->userdata('superAdmin');
        if(!empty($check)){
            $data = $this->input->post();
            $data = $this->data->scrubbing($data);
            $this->data->update(array("id"=>$check[0]['id']),"credentials",$data);
            $again = $this->data->fetch("credentials",array("id"=>$check[0]['id']));
            $this->session->set_userdata("superAdmin",$again);
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
            redirect("home/login");
        }
    }
    public function updatepwd(){
        $check = $this->session->userdata('userAdmin');
        if(!empty($check)){
            $data = $this->input->post();
            $data = $this->data->scrubbing($data);
            if($data['old_pwd'] == $check[0]['password']){
                if($data['new_pwd1'] == $data['new_pwd2']){
                    $this->data->update(array("id"=>$check[0]['id']),"credentials",array('password'=>$data['new_pwd2']));
                }else{
                    $this->session->set_userdata("error","Passwords do not match");
                }
            }else{
                $this->session->set_userdata("error","Invalid Old Password");
            }
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
            redirect("home/login");
        }
    }
    public function update_profile(){
        $check = $this->session->userdata('superAdmin');
        if(!empty($check)){
            if(isset($_FILES['img']) && !empty($_FILES['img']['name'])){
                $x = $this->do_upload($_FILES);
                if(isset($x['upload_data'])){
                    $a['profile_pic'] = "assets_f/img/".$x['upload_data']['file_name'];
                    $this->data->update(array("id"=>$check[0]['id']),"credentials",$a);
                    $agaian = $this->data->fetch("credentials",array("id"=>$check[0]['id']));
                    $this->session->set_userdata("superAdmin",$agaian);
                }
            }
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
            redirect("home/login");
        }
    }
    public function do_upload($files)
    {
        $config['upload_path'] = 'assets_f/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $this->load->library('upload', $config);
        foreach ($files as $key => $val) {
            if (!$this->upload->do_upload($key)) {
                //                $data = $this->upload->display_error();
            } else {
                $data['upload_data'] = $this->upload->data();
            }
        }
        return $data;
    }
    public function changeStatusAdmins($id = null,$change = "active"){
        $check = $this->session->userdata('superAdmin');
        if($id != null && !empty($check)){
            $this->data->update(array("id"=>$id),"admins",array("status"=>$change));
        }
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}