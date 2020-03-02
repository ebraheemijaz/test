<?php
    class Admin extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('email');
            $this->load->model('Pdf');
            require_once APPPATH.'third_party/PHPExcel.php';
            $this->excel = new PHPExcel();
            $this->load->model('Fetchdata');
            $this->load->library('pagination');
        }
        public function index(){
            $this->view("index");
        }
        
        public function getMempacasResult() {
        $month = $this->input->post('month');
        $groupId = $this->input->post('groupId');
        $modifiedMonth = date('Y-m%', strtotime($month));
        // echo 'SELECT * FROM `mempacasGroupMember` WHERE `lastContactDate` like ("'.$modifiedMonth.'") and groupId = '.$groupId;
        // $data = $this->data->myquery('SELECT * FROM `mempacasGroupMember` WHERE groupId = '.$groupId);
        $data = $this->data->myquery("SELECT membersId FROM `mempacasGroup` WHERE id = {$groupId}");        
        $data = explode(",",$data[0]['membersId']);
        ?>
        <table id="myTableMempacas" class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <!--<th>S/No          </th>-->
                                                        <th>Members Name       </th>
                                                        <th>Members Number </th>
                                                        <th data-step="3" data-intro="Click on watch to be a part of event">Date Posted</th>
                                                        <th data-step="2" data-intro="Status of the event">Members Response</th>
                                                        <th>Special Prayers</th>
                                                        <th>Comments</th>
                                                        <th>Senior Pastor To Follow Up</th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $members = explode(',', $val['membersId']); ?>
                                                    <?php $i = 1; if(isset($data)){foreach($data as $val1){ ?>
                                                        <?php $mempacasGroupMember = $this->data->myquery('SELECT * FROM `mempacasMemerResponse` WHERE `createdAt` like ("'.$modifiedMonth.'") and groupId = '.$groupId.' and memberId = '.$val1.' ORDER BY updatedAt DESC'); ?>
                                                        <?php $membersDetail = $this->data->fetch('member', array('id' => $val1)); ?>
                                                        <?php if(count($membersDetail)==0){continue;} ?>
                                                        <tr>
                                                            <!--<td><?= $i; ?></td>-->
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?= $membersDetail[0]['mobileNo'] ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['createdAt'])){ 
                                                                        echo 'Not Yet Contacted'; 
                                                                    }else{ 
                                                                        echo date('d-m-Y', strtotime($mempacasGroupMember[0]['createdAt'])); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['memberResponse'])){ 
                                                                        echo 'No Response'; 
                                                                    }else{ 
                                                                    ?>
                                                                        <?php if(strlen($mempacasGroupMember[0]['memberResponse']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['memberResponse']),0,50), 20, "<br>\n"); ?> <a href="#" data-target="#memberResponse<?= $mempacasGroupMember[0]['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a> <?php }else{ echo wordwrap($mempacasGroupMember[0]['memberResponse'], 20, "<br/>\n"); } ?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['memberResponse']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['specialPrayerRequest'])){ 
                                                                        echo 'No Prayer Requested'; 
                                                                    }else{
                                                                    ?>
                                                                    <?php if(strlen($mempacasGroupMember[0]['specialPrayerRequest']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['specialPrayerRequest']),0,50), 20, "<br>\n"); ?> <a href="#" data-target="#specialPrayer<?= $mempacasGroupMember[0]['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['specialPrayerRequest'], 20, "<br/>\n"); }?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['specialPrayerRequest']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['comment'])){ 
                                                                        echo 'No Comment'; 
                                                                    }else{ 
                                                                    ?>
                                                                    <?php if(strlen($mempacasGroupMember[0]['comment']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['comment']),0,50), 20, "<br>\n"); ?> <a href="#" data-target="#comment<?= $mempacasGroupMember[0]['id'] ?>" data-toggle="modal">... <span class="btn-primary">View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['comment'], 20, "<br/>\n"); } ?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['comment']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['seniorPastorToFollowUp']) || $mempacasGroupMember[0]['seniorPastorToFollowUp'] == 0){ echo 'No'; }else{ echo 'Yes'; } ?></td>
                                                            <td><a href="#" data-target="#editComment<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                            <!--| <a href="#" data-target="#contactMember<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-user" title="Contact Member"></i></a> -->
                                                            | <a data-target="#assignGroup<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks" title="Reassign Group"></i></a> 
                                                            | <a data-target="#sendSMS<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> 
                                                            | <a data-target="#sendEmail<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>
                                                            | <a onclick="deleteConff('<?= site_url('admin/deleteMemberMempacasGroup/mempacasGroup/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php $i++; }} ?>
                                                    </tbody>
                                                </table>
        <?php
    }
    
        public function getChildAttendance() {
            $month = $this->input->post('month');
            $modifiedMonth = date('Y-m%', strtotime($month));
            $data = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `date` LIKE '".$modifiedMonth."'");
            ?>
            <table id="myTable" class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Children Name</th>
                                                        <th width="15%">Dropped By</th>
                                                        <th>Time In</th>
                                                        <th width="15%">Picked By </th>
                                                        <th>Time Out </th>
                                                        <th width="20%">Teacher Remark</th>
                                                        <th width="20%">Guardian Remark</th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($data)){ ?>
                                                            <?php $i=1; foreach($data as $val12){ if($val12['classId'] == $this->input->post('id')){ ?>
                                                                    <tr style="<?php if($val12['date'] == date('Y-m-d')){ ?>color: red;<?php } ?>">
                                                                        <td><?= date('d-m-Y', strtotime($val12['date'])); ?></td>
                                                                        <td><?php $studentRecord = $this->data->fetch('children', array('id' => $val12['childId']))[0]; echo $studentRecord['fname']." ".$studentRecord['lname']; ?></td>
                                                                        <td><?= $val12['droppedBy']?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['inTime'])); ?></td>
                                                                        <td><?= $val12['pickedBy'] ?></td>
                                                                        <td><?= date('H:i:s', strtotime($val12['outTime'])); ?></td>
                                                                        <td><?= $val12['teacherRemark']; ?></td>
                                                                        <td><?php if(!empty($val12['guardianRemark'])){ echo $val12['guardianRemark']; }else{ echo 'No Remark Yet'; } ?></td>
                                                                        <td>
                                                                            <a href="#" data-target="#contactMember<?= $val12['id'] ?>" data-toggle="modal"><i class="fa fa-pencil" title="Contact Member"></i></a> 
                                                                            | <a href="#" data-target="#reportIncident<?= $val12['id'] ?>" data-toggle="modal"><i class="fa fa-info-circle" title="Report Incident"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php $i++; }} ?>
                                                        <?php } ?>
                                                        </tbody>
                                                </table>
            <?php
        }
        
        public function getChild() {
             // Get search term
             $searchTerm = $_GET['q'];
             $query = $this->data->myquery("SELECT id, fname, lname FROM children WHERE fname LIKE '%".$searchTerm."%' OR lname LIKE '%".$searchTerm."%' ORDER BY lname ASC");
             echo json_encode($query);
        }
    
        public function getChildRegisterResult() {
            $month = $this->input->post('month');
            $classId = $this->input->post('groupId');
            $modifiedMonth = date('Y-m%', strtotime($month));
            // echo $month." ".$classId." ".$modifiedMonth;
            $data = $this->data->myquery('SELECT * FROM `attendanceClass` WHERE id = '.$classId);
            ?>
            <table id="myTableMempacas" class="table table-hover table-striped" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>S/No</th>
                                                        <th>Children Name</th>
                                                        <th>Gender</th>
                                                        <th>Attendance %</th>
                                                        <th>Behaviour </th>
                                                        <th>Performance </th>
                                                        <th>Most Recent Incident</th>
                                                        <th>Most Recent Remark</th>
                                                        <th>Parent Name</th>
                                                        <th>Parent No</th>
                                                        <th width="20%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $totalClassDays = $this->data->myquery("SELECT count(distinct(date)) as totalClassDays from `markAttendance` WHERE date LIKE '".$modifiedMonth."'"); ?>
                                                        <?php $members = explode(',', $data[0]['studentId']); ?>
                                                    <?php $i=1; foreach($members as $val1){ ?>
                                                        <?php $membersDetail = $this->data->fetch('children', array('id' => $val1)); ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= ucfirst($membersDetail[0]['fname']." ".$membersDetail[0]['lname']); ?></td>
                                                            <td><?php if($membersDetail[0]['gender'] == 'male'){ echo 'M'; }else if($membersDetail[0]['gender'] == 'female'){ echo 'F'; } ?></td>
                                                            <td><?php $attendance = $this->data->myquery("SELECT count(*) as totalDays FROM `markAttendance` WHERE date LIKE '".$modifiedMonth."' AND childId = ".$membersDetail[0]['id']); if(empty($attendance[0]['totalDays'])){ 
                                                                        echo '0%'; 
                                                                    }else{ 
                                                                        echo round((($attendance[0]['totalDays'] / $totalClassDays[0]['totalClassDays']) * 100))."%"; 
                                                                    } ?></td>
                                                            <td><?php $attendance1 = $this->data->myquery("SELECT sum(performance) as totalPerformance, count(*) as totalCount FROM `markAttendance` WHERE date LIKE '".$modifiedMonth."' AND childId = ".$membersDetail[0]['id']); if(empty($attendance1[0]['totalPerformance'])){ 
                                                                        echo '0 / 5'; 
                                                                    }else{ 
                                                                        echo round(($attendance1[0]['totalPerformance'] / $totalClassDays[0]['totalClassDays']), 2)." / 5"; 
                                                                    } ?></td>
                                                            <td><?php $attendance1 = $this->data->myquery("SELECT sum(behaviour) as totalPerformance, count(*) as totalCount FROM `markAttendance` WHERE date LIKE '".$modifiedMonth."' AND childId = ".$membersDetail[0]['id']); if(empty($attendance1[0]['totalPerformance'])){
                                                                        echo '0 / 5'; 
                                                                    }else{ 
                                                                        echo round(($attendance1[0]['totalPerformance'] / $attendance1[0]['totalCount']),2)." / 5"; 
                                                                    } ?></td>
                                                            <td><?php $incidentReport = $this->data->myquery('SELECT * FROM incidentReports WHERE childId = '.$membersDetail[0]['id'].' ORDER BY createdAt desc'); if(empty($incidentReport)){ 
                                                                        echo 'No Recent Incident'; 
                                                                    }else{ 
                                                                        echo $incidentReport[0]['anyRecentIncident']; 
                                                                    } ?></td>
                                                            <td><?php $attendanceRemark = $this->data->myquery('SELECT * FROM `markAttendance` WHERE childId = '.$membersDetail[0]['id'].' ORDER BY createdAt desc'); if(empty($attendanceRemark)){ 
                                                                        echo 'Not Remark Yet.'; 
                                                                    }else{ 
                                                                        echo ucfirst($attendanceRemark[0]['teacherRemark']); 
                                                                    } ?></td>
                                                            <td><?php $parentName = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id']))[0]; ?><?= $parentName['fname']." ".$parentName['lname'] ?></td>
                                                            <td><?= $parentName['mobileNo'] ?></td>
                                                            <td>
                                                                <a href="#" data-target="#markAttendance<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i style="color: #1e88e5;" class="material-icons">bookmark</i></a>
                                                                <a href="#" data-target="#contactMember<?= $membersDetail[0]['id'] ?>" data-toggle="modal"><i class="fa fa-pencil" title="Contact Member"></i></a> 
                                                            | <a data-target="#assignGroup<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-tasks" title="Reassign Group"></i></a> 
                                                            <!--| <a data-target="#sendSMS<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-share" title="Send SMS."></i></a> -->
                                                            <!--| <a data-target="#sendEmail<?= $membersDetail[0]['id'] ?>" data-toggle="modal" href="#"><i class="fa fa-envelope-o" title="Send Email"></i></a>-->
                                                            | <a onclick="deleteConff('<?= site_url('admin/deleteChildren/attendanceClass/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php $i++; } ?>
                                                    </tbody>
                                                </table>
            <?php
        }
    
        public function getMonthlyEditComment() {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                // $data1 = $this->input->post();
                $month = $this->input->post('month');
                $groupId = $this->input->post('groupId');
                $memberId = $this->input->post('memberId');
                $modifiedMonth = date('Y-m%', strtotime($month));
                $data = $this->data->myquery('SELECT * FROM `mempacasMemerResponse` WHERE `createdAt` like ("'.$modifiedMonth.'") and groupId = '.$groupId.' and memberId= '.$memberId);
                print_r(json_encode($data));
            }
        }
        
        public function editChildDetail()
        {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data = $this->input->post();
                $incidentReport = $data['incidentReport'];
                $mostRecentRemark = $data['mostRecentRemark'];
                $childId = $data['memberId'];
                $classId = $data['groupId'];
                $incidentId = $data['incidentId'];
                $attendanceId = $data['attendanceId'];
                if(isset($incidentId) && $incidentId != '') {
                    $incidentReports = array(
                        'classId'   =>  $classId,
                        'childId'   =>  $childId,
                        'date'      =>  date('Y-m-d'),
                        'teacherReports'    =>  $incidentReport
                    );
                    $this->data->update(array('id' => $incidentId), 'incidentReports', $incidentReports);
                }else{
                    $incidentReports = array(
                        'classId'   =>  $classId,
                        'childId'   =>  $childId,
                        'date'      =>  date('Y-m-d'),
                        'teacherReports'    =>  $incidentReport
                    );
                    $this->data->insert('incidentReports', $incidentReports);
                }
                $this->data->update(array('id'  =>  $attendanceId), 'markAttendance', array('teacherRemark' =>  $mostRecentRemark));
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }
        }
        
        public function adminCommentIncidentReport() {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data = $this->input->post();
                $adminComment = $data['adminComment'];
                $incidentReportId = $data['incidentReportsId'];
                $this->data->update(array('id' => $incidentReportId), 'incidentReports', array('adminComment' => $adminComment, 'status' => 'Pending'));
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }
        }
        
        public function resolveIncident($id) {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $this->data->update(array('id' => $id), 'incidentReports', array('status' => 'Resolved'));
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }
        }
        
        public function save_pdf_mempacas_month($id, $month){
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup` WHERE id = '.$id);
    	    $data['monthsss'] = $month;
    	    $html = $this->load->view('pdf/pdfMempacas1', $data, true);
    	    $pdfFilePath = "Mempacas-Group-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('fullpage');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	    echo '<script type="text/javascript">';
            echo "window.location.href=".$_SERVER['HTTP_REFERER'];
            echo '</script>';
            // exit;
    	}
    	
    	public function save_pdf_class_month($id, $month) {
    	    $this->load->library('m_pdf');
    	    $data['classDetail'] = $this->data->myquery('SELECT * FROM `attendanceClass` WHERE id = '.$id);
    	    $data['monthsss'] = $month;
    	    $html = $this->load->view('pdf/pdfClass1', $data, true);
    	    $pdfFilePath = "Class-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10
    	    );
    	    $pdf->setDisplayMode('fullpage');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_pdf_class_attendance_month($id, $month) {
    	    $this->load->library('m_pdf');
    	    $data['classDetail'] = $this->data->myquery('SELECT * FROM `attendanceClass` WHERE id = '.$id);
    	    $modifiedMonth = date('Y-m%', strtotime($month));
    	    $data['markAttend'] = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `classId` = ".$id." AND date LIKE '".$modifiedMonth."' ORDER BY date DESC");
    	    $data['monthsss'] = $month;
    	    $html = $this->load->view('pdf/pdfAttendance', $data, true);
    	    $pdfFilePath = "Attendance-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10
    	    );
    	    $pdf->setDisplayMode('fullpage');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
        
        public function addMempacasGroup($id){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data = $this->input->post();
                $groupId = $data['group'];
                $memberDetail = $this->data->fetch('member', array('id' => $id, 'status' => 'active'));
                $this->data->update(array('id' => $id), 'member', array('mempacasGroup' => $groupId));
                $mempacasGroupDetail = $this->data->fetch('mempacasGroup', array('id' => $groupId));
                $membersId = explode(',',$mempacasGroupDetail[0]['membersId']);
                $membersName = explode(',', $mempacasGroupDetail[0]['membersName']);
                array_push($membersId, $id);
                array_push($membersName, $memberDetail[0]['fname']." ".$memberDetail[0]['lname']);
                $membersId = implode(',', $membersId);
                $membersName = implode(',', $membersName);
                $this->data->update(array('id' => $groupId), 'mempacasGroup', array('membersId' => $membersId, 'membersName' => $membersName));
                redirect("admin/view/manage_users","refresh");
            }else{
                redirect('/admin');
            }
        }
        
        public function save_excel($fromDate, $toDate){
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
            $table_columns = array("S/No", "Last Name", "First Name", "Phone Number");
            $column = 0;
            foreach($table_columns as $field)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
            
            $members = $this->data->myquery("SELECT * FROM `member` WHERE status = 'active' and `dOfJoining` BETWEEN '".$fromDate."' AND '".$toDate."' and first_time = 'no' ORDER BY dOfJoining ASC");
            $excel_row = 2;
            $i = 1;
            foreach($members as $row)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $i);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ucfirst($row['lname']));
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, ucfirst($row['fname']));
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['mobileNo']);
               $i++;
               $excel_row++;
            }
            foreach (range('A - D', $object->getActiveSheet()->getHighestDataColumn()) as $col) {
            $object
                    ->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }
            
            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Member.xls"');
            $object_writer->save('php://output');
        }
        
        public function exportExcel()
        {
            $this->load->model('excel_export_model');
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $table_columns = array("S/No", "Last Name", "First Name", "Phone Number");
            $column = 0;
            foreach($table_columns as $field)
            {
               $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
               $column++;
            }
            
            $members = $this->excel_export_model->fetch_data();
            $excel_row = 2;
            $i = 1;
            $joiningDate = "";
            $ageGroup = "";
            $businessGroupName = "";
            foreach($members as $row)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $i);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ucfirst($row['lname']));
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, ucfirst($row['fname']));
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['mobileNo']);
               $i++;
               $excel_row++;
            }
            foreach (range('A - D', $object->getActiveSheet()->getHighestDataColumn()) as $col) {
            $object
                    ->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }
            
            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Member.xls"');
            $object_writer->save('php://output');
        }
        
        public function addGroup() {
            $ids = [7,8,10,15,18,19,20,21,22,29,30,32,34,37,43,44,45,46,47,50,54,58,68,75,82,84,85,127,128,130,137,146,147,150,155,156,157,158,159,160,161,162,163,166,167,168,170,171,177,180,181,183,184,187,188,189,190,191,194,195,196,198,441,442,443,445,446,447,448,449,451,452,454,455,457,458,459,460,461,463,464,465,466,467,468,471,473,475,476,479,480,481,482,484,485,486,487,488,490,491,492,494,496,497,498,501,502,503,504,505,506,508,511,514,516,521,522,524,525,526,527,528,529,530,532,534,536,538,539,540,541,542,543,544,545,546,547,548,549,551,553,554,555,556,557,558,559,560,561,563,565,568,569,571,573,574,575,576,577,579,580,582,584,585,586,587,588,589,590,591,593,594,595,596,597,599,600,601,603,604,605,606,607,611,612,613,614,615,616,617,619,621,622,624,625,626,627,628,629,631,632,636,637,638,640,641,643,644,645,649,653,660,670,671,672,675,677,683,684,685,686];
            $i = 0;
            foreach($ids as $id) {
                $i++;
                $this->data->insert('membgroup', array('user_id' => $id, 'g_id' => 2, 'status' => 'pending'));
            }
            echo $i;
        }
        
        public function sendPush($message, $userId, $url){
            $message = $message;
            $user_id = $userId;
            $content = array(
                "en" => "$message"
            );
            $fields = array(
                'app_id' => "5bd64a70-48b9-456e-ac3e-aef92697dd7a",
                // 'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
                'included_segments' => array(
                    'All'
                ),
                'contents' => $content,
                'ios_badgeType' => 'Increase',
                'ios_badgeCount' => 1,
                'url'   =>  $url
            );
    
            $fields = json_encode($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic OWI1NDU1YjQtYWIwYi00NzVjLWFhNzgtOTlmZjU5YTM2OTE5'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
            $response = curl_exec($ch);
            curl_close($ch);
        }
        
        public function uploadMemberDemo(){
            $file_info = pathinfo($_FILES['excelBulk']['name']);
            $file_directory = "assets_f/bulk/";
            $new_file_name = date("d-m-Y ").rand(000000, 999999).".".$file_info['extension'];
            if(move_uploaded_file($_FILES['excelBulk']['tmp_name'], $file_directory.$new_file_name)) {
                $file_type = PHPExcel_IOFactory::identify($file_directory.$new_file_name);
                $objReader = PHPExcel_IOFactory::createReader($file_type);
                $objPHPExcel = $objReader->load($file_directory.$new_file_name);
                $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                
                $j = 0;
                $birthMonth = '';
                $ageGroup = '';
                
                $bucket = $this->data->fetch('bucket');
                $sms = $this->data->myquery('SELECT SUM(`sentSMSCount`) as qty FROM sms');
                
                $balanceSMS = $bucket[0]['qty'] - (2 * $sms[0]['qty']);
                
                $requireSMS = (count($sheet_data) - 2) * 2;
                
                for($i = 3; $i <= count($sheet_data); $i++) {
                    $j = $i - 3;
                    if($sheet_data[$i][F] != '-' || $sheet_data[$i][G] != '-'){
                        $duplicateData = $this->data->myquery("SELECT * FROM `member` WHERE `mobileNo` = '".$sheet_data[$i][F]."' OR `email` = '".$sheet_data[$i][G]."'");
                        if(!count($duplicateData)){
                        if(isset($sheet_data[$i])){
                        //Check for Title is blank or not
                        if($sheet_data[$i][B] != null || $sheet_data[$i][B] != ''){
                            $title = $sheet_data[$i][B];
                        }else{
                            $title = '-';
                        }
                        //Check for Gender is Blank or not
                        if($sheet_data[$i][C] != null || $sheet_data[$i][C] != ''){
                            $gender = $sheet_data[$i][C];
                        }else{
                            $gender = '-';
                        }
                        //Check for First Name is blank or not
                        if($sheet_data[$i][D] != null || $sheet_data[$i][D] != ''){
                            $fname = $sheet_data[$i][D];
                        }else{
                            $fname = '-';
                        }
                        //Check for Last Name is blank or not
                        if($sheet_data[$i][E] != null || $sheet_data[$i][E] != ''){
                            $lname = $sheet_data[$i][E];
                        }else{
                            $lname = '-';
                        }
                        //Check for Mobile Number is blank or not
                        if($sheet_data[$i][F] != null || $sheet_data[$i][F] != ''){
                            $mobileNo = $sheet_data[$i][F];
                        }else{
                            $mobileNo = '-';
                        }
                        //Check for email is blank or not
                        if($sheet_data[$i][G] != null || $sheet_data[$i][G] != ''){
                            $email = $sheet_data[$i][G];
                        }else{
                            $email = '-';
                        }
                        //Check for Age Group is blank or not
                        if($sheet_data[$i][H] != null || $sheet_data[$i][H] != ''){
                            if($sheet_data[$i][H] == '13-18' || $sheet_data[$i][H] == '13 - 18'){
                                $ageGroup = 18;
                            }else if($sheet_data[$i][H] == '19-29' || $sheet_data[$i][H] == '19 - 29'){
                                $ageGroup = 29;
                            }else if($sheet_data[$i][H] == '30-39' || $sheet_data[$i][H] == '30 - 39'){
                                $ageGroup = 39;
                            }else if($sheet_data[$i][H] == '40-49' || $sheet_data[$i][H] == '40 - 49'){
                                $ageGroup = 49;
                            }else if($sheet_data[$i][H] == '50-69' || $sheet_data[$i][H] == '50 - 69'){
                                $ageGroup = 69;
                            }else if($sheet_data[$i][H] == 'Above 70' || $sheet_data[$i][H] == 'Above70' || $sheet_data[$i][H] == '70+'){
                                $ageGroup = 70;
                            }else if($sheet_data[$i][H] == "" || $sheet_data[$i][H] == " "){
                                $ageGroup = "-";
                            }
                        }else{
                            $ageGroup = 49;
                        }
                        //Check for month of birth is blank or not
                        if($sheet_data[$i][I] != null || $sheet_data[$i][I] != ''){
                            if($sheet_data[$i][I] == 'January' || $sheet_data[$i][I] == 'january' || $sheet_data[$i][I] == 'Jan' || $sheet_data[$i][I] == 'jan'){
                                $birthMonth = 1;
                            }else if($sheet_data[$i][I] == 'February' || $sheet_data[$i][I] == 'february' || $sheet_data[$i][I] == 'Feb' || $sheet_data[$i][I] == 'feb'){
                                $birthMonth = 2;
                            }else if($sheet_data[$i][I] == 'March' || $sheet_data[$i][I] == 'march' || $sheet_data[$i][I] == 'Mar' || $sheet_data[$i][I] == 'mar'){
                                $birthMonth = 3;
                            }else if($sheet_data[$i][I] == 'April' || $sheet_data[$i][I] == 'april' || $sheet_data[$i][I] == 'Apr' || $sheet_data[$i][I] == 'apr'){
                                $birthMonth = 4;
                            }else if($sheet_data[$i][I] == 'May' || $sheet_data[$i][I] == 'may' || $sheet_data[$i][I] == 'May' || $sheet_data[$i][I] == 'may'){
                                $birthMonth = 5;
                            }else if($sheet_data[$i][I] == 'June' || $sheet_data[$i][I] == 'june' || $sheet_data[$i][I] == 'Jun' || $sheet_data[$i][I] == 'jun'){
                                $birthMonth = 6;
                            }else if($sheet_data[$i][I] == 'July' || $sheet_data[$i][I] == 'july' || $sheet_data[$i][I] == 'Jul' || $sheet_data[$i][I] == 'jul'){
                                $birthMonth = 7;
                            }else if($sheet_data[$i][I] == 'August' || $sheet_data[$i][I] == 'august' || $sheet_data[$i][I] == 'Aug' || $sheet_data[$i][I] == 'aug'){
                                $birthMonth = 8;
                            }else if($sheet_data[$i][I] == 'September' || $sheet_data[$i][I] == 'september' || $sheet_data[$i][I] == 'Sep' || $sheet_data[$i][I] == 'sep'){
                                $birthMonth = 9;
                            }else if($sheet_data[$i][I] == 'October' || $sheet_data[$i][I] == 'october' || $sheet_data[$i][I] == 'Oct' || $sheet_data[$i][I] == 'oct'){
                                $birthMonth = 10;
                            }else if($sheet_data[$i][I] == 'November' || $sheet_data[$i][I] == 'november' || $sheet_data[$i][I] == 'Nov' || $sheet_data[$i][I] == 'nov'){
                                $birthMonth = 11;
                            }else if($sheet_data[$i][I] == 'December' || $sheet_data[$i][I] == 'december' || $sheet_data[$i][I] == 'Dec' || $sheet_data[$i][I] == 'dec'){
                                $birthMonth = 12;
                            }
                        }else{
                            $birthMonth = 1;
                        }
                        //Check for day of birth is blank or not
                        if($sheet_data[$i][J] != null || $sheet_data[$i][J] != ''){
                            $birthDate = $sheet_data[$i][J];
                        }else{
                            $birthDate = 1;
                        }
                        //Check for Address is blank or not
                        if($sheet_data[$i][K] != null || $sheet_data[$i][K] != ''){
                            $address = $sheet_data[$i][K];
                        }else{
                            $address = '-';
                        }
                        //Check for Post Code is blank or not
                        if($sheet_data[$i][L] != null || $sheet_data[$i][L] != ''){
                            $poatalCode = $sheet_data[$i][L];
                        }else{
                            $poatalCode = '-';
                        }
                            if($balanceSMS > $requireSMS){
                                $usernameCreate = $this->data->fetch("member", array('fname' => $fname, 'lname' => $lname, 'status' => 'active'));
                                if(count($usernameCreate)){
                                    $username = lcfirst($fname)."".lcfirst($lname)."".count($usernameCreate);
                                }else{
                                    $username = lcfirst($fname)."".lcfirst($lname);
                                }
                                $password = $this->randomPassword();
                                if($gender == 'male' || $gender == 'Male' || $gender == 'MALE'){
                                    $image = "male.jpg";
                                    $gender = 'male';
                                }else{
                                    $image = "female.jpg";
                                    $gender = 'female';
                                }
                                $result = array(
                                    'title' => $title,
                                    'username' => strtolower($username),
                                    'fname' => $fname,
                                    'lname' => $lname,
                                    'gander' => $gender,
                                    'image' => $image,
                                    'mobileNo' => $mobileNo,
                                    'email' => $email,
                                    'password' => $password,
                                    'age_group' => $ageGroup,
                                    'birth_month' => $birthMonth,
                                    'birth_date' => $birthDate,
                                    'member_since_month' => date('m'),
                                    'member_since_year' => date('Y'),
                                    'address' => $address,
                                    'poatalCode' => $poatalCode,
                                    'registrationEmail' => '0'
                                );
                                $this->data->insert('member', $result);
                                $parent_id = $this->db->insert_id();
                                $msg1 = "Dear ".$fname.", you have just been added to RCCGVHL system. See your login details: https://rccgvhl.mmsapp.org Username: ".strtolower($username)." Password: ".$password." Please login to update your details and to enjoy all it’s benefits. Shalom. Pastor Leke.";
                                $this->sendSMS1("RCCGVHL", $mobileNo, $msg1);
                                $sms = array(
                                    'msg' => $msg1,
                                    'to' => $gname." ".$lname,
                                    'toId' => $parent_id,
                                    'sentSMSCount' => 3
                                );
                                $this->data->insert('sms', $sms);
                                
                                //Adding Business Page Details
                                $business = array(
                                    'user_id' => $parent_id,
                                    'title' => $fname." ".$lname." Business Page",
                                    'email' => $email,
                                    'phone' => $mobileNo
                                );
                                
                                $this->data->insert('business', $business);
                                
                                if(isset($sheet_data[$i][M]) || $sheet_data[$i][M] != null || $sheet_data[$i][M] != '' || isset($sheet_data[$i][N]) || $sheet_data[$i][N] != null || $sheet_data[$i][N] != ''){
                                    //Check for 1 Child First Name is blank or not
                                    if($sheet_data[$i][M] != null || $sheet_data[$i][M] != ''){
                                        $firstChildFN = $sheet_data[$i][M];
                                    }else{
                                        $firstChildFN = '-';
                                    }
                                    //Check for 1 Child Last Name is blank or not
                                    if($sheet_data[$i][N] != null || $sheet_data[$i][N] != ''){
                                        $firstChildLN = $sheet_data[$i][N];
                                    }else{
                                        $firstChildLN = '-';
                                    }
                                    //Check for 1 child gender is blank or not
                                    if($sheet_data[$i][O] != null || $sheet_data[$i][O] != ''){
                                        $firstChildGender = $sheet_data[$i][O];
                                    }else{
                                        $firstChildGender = '-';
                                    }
                                    //Check for 1 Child Month of Birth is blank or not
                                    if($sheet_data[$i][P] != null || $sheet_data[$i][P] != ''){
                                        if($sheet_data[$i][P] == 'January' || $sheet_data[$i][P] == 'january' || $sheet_data[$i][P] == 'Jan' || $sheet_data[$i][P] == 'jan'){
                                            $firstChildMOB = 1;
                                        }else if($sheet_data[$i][P] == 'February' || $sheet_data[$i][P] == 'february' || $sheet_data[$i][P] == 'Feb' || $sheet_data[$i][P] == 'feb'){
                                            $firstChildMOB = 2;
                                        }else if($sheet_data[$i][P] == 'March' || $sheet_data[$i][P] == 'march' || $sheet_data[$i][P] == 'Mar' || $sheet_data[$i][P] == 'mar'){
                                            $firstChildMOB = 3;
                                        }else if($sheet_data[$i][P] == 'April' || $sheet_data[$i][P] == 'april' || $sheet_data[$i][P] == 'Apr' || $sheet_data[$i][P] == 'apr'){
                                            $firstChildMOB = 4;
                                        }else if($sheet_data[$i][P] == 'May' || $sheet_data[$i][P] == 'may' || $sheet_data[$i][P] == 'May' || $sheet_data[$i][P] == 'may'){
                                            $firstChildMOB = 5;
                                        }else if($sheet_data[$i][P] == 'June' || $sheet_data[$i][P] == 'june' || $sheet_data[$i][P] == 'Jun' || $sheet_data[$i][P] == 'jun'){
                                            $firstChildMOB = 6;
                                        }else if($sheet_data[$i][P] == 'July' || $sheet_data[$i][P] == 'july' || $sheet_data[$i][P] == 'Jul' || $sheet_data[$i][P] == 'jul'){
                                            $firstChildMOB = 7;
                                        }else if($sheet_data[$i][P] == 'August' || $sheet_data[$i][P] == 'august' || $sheet_data[$i][P] == 'Aug' || $sheet_data[$i][P] == 'aug'){
                                            $firstChildMOB = 8;
                                        }else if($sheet_data[$i][P] == 'September' || $sheet_data[$i][P] == 'september' || $sheet_data[$i][P] == 'Sep' || $sheet_data[$i][P] == 'sep'){
                                            $firstChildMOB = 9;
                                        }else if($sheet_data[$i][P] == 'October' || $sheet_data[$i][P] == 'october' || $sheet_data[$i][P] == 'Oct' || $sheet_data[$i][P] == 'oct'){
                                            $firstChildMOB = 10;
                                        }else if($sheet_data[$i][P] == 'November' || $sheet_data[$i][P] == 'november' || $sheet_data[$i][P] == 'Nov' || $sheet_data[$i][P] == 'nov'){
                                            $firstChildMOB = 11;
                                        }else if($sheet_data[$i][P] == 'December' || $sheet_data[$i][P] == 'december' || $sheet_data[$i][P] == 'Dec' || $sheet_data[$i][P] == 'dec'){
                                            $firstChildMOB = 12;
                                        }
                                    }else{
                                        $firstChildMOB = 1;
                                    }
                                    //Check for 1 child day of birth is blank or not
                                    if($sheet_data[$i][Q] != null || $sheet_data[$i][Q] != ''){
                                        $firstChildDOB = $sheet_data[$i][Q];
                                    }else{
                                        $firstChildDOB = 1;
                                    }
                                    //Check for 1 child age group is blank or not
                                    if($sheet_data[$i][R] != null || $sheet_data[$i][R] != ''){
                                        if($sheet_data[$i][R] == '0-9' || $sheet_data[$i][R] == '0 - 9'){
                                            $firstChildAgeGroup = 9;
                                        }else if($sheet_data[$i][R] == '10-12' || $sheet_data[$i][R] == '10 - 12'){
                                            $firstChildAgeGroup = 12;
                                        }else if($sheet_data[$i][R] == '13-18' || $sheet_data[$i][R] == '13 - 18'){
                                            $firstChildAgeGroup = 18;
                                        }else if($sheet_data[$i][R] == '19-29' || $sheet_data[$i][R] == '19 - 29'){
                                            $firstChildAgeGroup = 29;
                                        }else if($sheet_data[$i][R] == '30-39' || $sheet_data[$i][R] == '30 - 39'){
                                            $firstChildAgeGroup = 39;
                                        }else if($sheet_data[$i][R] == '40-49' || $sheet_data[$i][R] == '40 - 49'){
                                            $firstChildAgeGroup = 49;
                                        }else if($sheet_data[$i][R] == '50-69' || $sheet_data[$i][R] == '50 - 69'){
                                            $firstChildAgeGroup = 69;
                                        }else if($sheet_data[$i][R] == 'Above 70' || $sheet_data[$i][R] == 'Above70' || $sheet_data[$i][R] == '70+'){
                                            $firstChildAgeGroup = 70;
                                        }else if($sheet_data[$i][R] == "" || $sheet_data[$i][R] == " "){
                                            $firstChildAgeGroup = "-";
                                        }
                                    }else{
                                        $firstChildAgeGroup = 9;
                                    }
                                    $child1 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $firstChildFN,
                                        'lname' => $firstChildLN,
                                        'month' => $firstChildMOB,
                                        'day' => $firstChildDOB,
                                        'age_group' => $firstChildAgeGroup,
                                        'gender' => $firstChildGender
                                    );
                                    $this->data->insert('children', $child1);
                                }
                                if(isset($sheet_data[$i][S]) || $sheet_data[$i][S] != null || $sheet_data[$i][S] != '' || isset($sheet_data[$i][T]) || $sheet_data[$i][T] != null || $sheet_data[$i][T] != ''){
                                    //Check for 2 Child First Name is blank or not
                                    if($sheet_data[$i][S] != null || $sheet_data[$i][S] != ''){
                                        $secondChildFN = $sheet_data[$i][S];
                                    }else{
                                        $secondChildFN = '-';
                                    }
                                    //Check for 2 Child Last Name is blank or not
                                    if($sheet_data[$i][T] != null || $sheet_data[$i][T] != ''){
                                        $secondChildLN = $sheet_data[$i][T];
                                    }else{
                                        $secondChildLN = '-';
                                    }
                                    //Check for 2 child gender is blank or not
                                    if($sheet_data[$i][U] != null || $sheet_data[$i][U] != ''){
                                        $secondChildGender = $sheet_data[$i][U];
                                    }else{
                                        $secondChildGender = '-';
                                    }
                                    //Check for 2 Child Month of Birth is blank or not
                                    if($sheet_data[$i][V] != null || $sheet_data[$i][V] != ''){
                                        if($sheet_data[$i][V] == 'January' || $sheet_data[$i][V] == 'january' || $sheet_data[$i][V] == 'Jan' || $sheet_data[$i][V] == 'jan'){
                                            $secondChildMOB = 1;
                                        }else if($sheet_data[$i][V] == 'February' || $sheet_data[$i][V] == 'february' || $sheet_data[$i][V] == 'Feb' || $sheet_data[$i][V] == 'feb'){
                                            $secondChildMOB = 2;
                                        }else if($sheet_data[$i][V] == 'March' || $sheet_data[$i][V] == 'march' || $sheet_data[$i][V] == 'Mar' || $sheet_data[$i][V] == 'mar'){
                                            $secondChildMOB = 3;
                                        }else if($sheet_data[$i][V] == 'April' || $sheet_data[$i][V] == 'april' || $sheet_data[$i][V] == 'Apr' || $sheet_data[$i][V] == 'apr'){
                                            $secondChildMOB = 4;
                                        }else if($sheet_data[$i][V] == 'May' || $sheet_data[$i][V] == 'may' || $sheet_data[$i][V] == 'May' || $sheet_data[$i][V] == 'may'){
                                            $secondChildMOB = 5;
                                        }else if($sheet_data[$i][V] == 'June' || $sheet_data[$i][V] == 'june' || $sheet_data[$i][V] == 'Jun' || $sheet_data[$i][V] == 'jun'){
                                            $secondChildMOB = 6;
                                        }else if($sheet_data[$i][V] == 'July' || $sheet_data[$i][V] == 'july' || $sheet_data[$i][V] == 'Jul' || $sheet_data[$i][V] == 'jul'){
                                            $secondChildMOB = 7;
                                        }else if($sheet_data[$i][V] == 'August' || $sheet_data[$i][V] == 'august' || $sheet_data[$i][V] == 'Aug' || $sheet_data[$i][V] == 'aug'){
                                            $secondChildMOB = 8;
                                        }else if($sheet_data[$i][V] == 'September' || $sheet_data[$i][V] == 'september' || $sheet_data[$i][V] == 'Sep' || $sheet_data[$i][V] == 'sep'){
                                            $secondChildMOB = 9;
                                        }else if($sheet_data[$i][V] == 'October' || $sheet_data[$i][V] == 'october' || $sheet_data[$i][V] == 'Oct' || $sheet_data[$i][V] == 'oct'){
                                            $secondChildMOB = 10;
                                        }else if($sheet_data[$i][V] == 'November' || $sheet_data[$i][V] == 'november' || $sheet_data[$i][V] == 'Nov' || $sheet_data[$i][V] == 'nov'){
                                            $secondChildMOB = 11;
                                        }else if($sheet_data[$i][V] == 'December' || $sheet_data[$i][V] == 'december' || $sheet_data[$i][V] == 'Dec' || $sheet_data[$i][V] == 'dec'){
                                            $secondChildMOB = 12;
                                        }
                                    }else{
                                        $secondChildMOB = 1;
                                    }
                                    //Check for 2 child day of birth is blank or not
                                    if($sheet_data[$i][W] != null || $sheet_data[$i][W] != ''){
                                        $secondChildDOB = $sheet_data[$i][W];
                                    }else{
                                        $secondChildDOB = 1;
                                    }
                                    //Check for 2 child age group is blank or not
                                    if($sheet_data[$i][X] != null || $sheet_data[$i][X] != ''){
                                        if($sheet_data[$i][X] == '0-9' || $sheet_data[$i][X] == '0 - 9'){
                                            $secondChildAgeGroup = 9;
                                        }else if($sheet_data[$i][X] == '10-12' || $sheet_data[$i][X] == '10 - 12'){
                                            $secondChildAgeGroup = 12;
                                        }else if($sheet_data[$i][X] == '13-18' || $sheet_data[$i][X] == '13 - 18'){
                                            $secondChildAgeGroup = 18;
                                        }else if($sheet_data[$i][X] == '19-29' || $sheet_data[$i][X] == '19 - 29'){
                                            $secondChildAgeGroup = 29;
                                        }else if($sheet_data[$i][X] == '30-39' || $sheet_data[$i][X] == '30 - 39'){
                                            $secondChildAgeGroup = 39;
                                        }else if($sheet_data[$i][X] == '40-49' || $sheet_data[$i][X] == '40 - 49'){
                                            $secondChildAgeGroup = 49;
                                        }else if($sheet_data[$i][X] == '50-69' || $sheet_data[$i][X] == '50 - 69'){
                                            $secondChildAgeGroup = 69;
                                        }else if($sheet_data[$i][X] == 'Above 70' || $sheet_data[$i][X] == 'Above70' || $sheet_data[$i][X] == '70+'){
                                            $secondChildAgeGroup = 70;
                                        }else if($sheet_data[$i][X] == "" || $sheet_data[$i][X] == " "){
                                            $secondChildAgeGroup = "-";
                                        }
                                    }else{
                                        $secondChildAgeGroup = 9;
                                    }
                                    $child2 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $secondChildFN,
                                        'lname' => $secondChildLN,
                                        'month' => $secondChildMOB,
                                        'day' => $secondChildDOB,
                                        'age_group' => $secondChildAgeGroup,
                                        'gender' => $secondChildGender
                                    );
                                    $this->data->insert('children', $child2);
                                }
                                if(isset($sheet_data[$i][Y]) || $sheet_data[$i][Y] != null || $sheet_data[$i][Y] != '' || isset($sheet_data[$i][Z]) || $sheet_data[$i][Z] != null || $sheet_data[$i][Z] != ''){
                                    //Check for 3 Child First Name is blank or not
                                    if($sheet_data[$i][Y] != null || $sheet_data[$i][Y] != ''){
                                        $thirdChildFN = $sheet_data[$i][Y];
                                    }else{
                                        $thirdChildFN = '-';
                                    }
                                    //Check for 3 Child Last Name is blank or not
                                    if($sheet_data[$i][Z] != null || $sheet_data[$i][Z] != ''){
                                        $thirdChildLN = $sheet_data[$i][Z];
                                    }else{
                                        $thirdChildLN = '-';
                                    }
                                    //Check for 3 child gender is blank or not
                                    if($sheet_data[$i][AA] != null || $sheet_data[$i][AA] != ''){
                                        $thirdChildGender = $sheet_data[$i][AA];
                                    }else{
                                        $thirdChildGender = '-';
                                    }
                                    //Check for 3 Child Month of Birth is blank or not
                                    if($sheet_data[$i][AB] != null || $sheet_data[$i][AB] != ''){
                                        if($sheet_data[$i][AB] == 'January' || $sheet_data[$i][AB] == 'january' || $sheet_data[$i][AB] == 'Jan' || $sheet_data[$i][AB] == 'jan'){
                                            $thirdChildMOB = 1;
                                        }else if($sheet_data[$i][AB] == 'February' || $sheet_data[$i][AB] == 'february' || $sheet_data[$i][AB] == 'Feb' || $sheet_data[$i][AB] == 'feb'){
                                            $thirdChildMOB = 2;
                                        }else if($sheet_data[$i][AB] == 'March' || $sheet_data[$i][AB] == 'march' || $sheet_data[$i][AB] == 'Mar' || $sheet_data[$i][AB] == 'mar'){
                                            $thirdChildMOB = 3;
                                        }else if($sheet_data[$i][AB] == 'April' || $sheet_data[$i][AB] == 'april' || $sheet_data[$i][AB] == 'Apr' || $sheet_data[$i][AB] == 'apr'){
                                            $thirdChildMOB = 4;
                                        }else if($sheet_data[$i][AB] == 'May' || $sheet_data[$i][AB] == 'may' || $sheet_data[$i][AB] == 'May' || $sheet_data[$i][AB] == 'may'){
                                            $thirdChildMOB = 5;
                                        }else if($sheet_data[$i][AB] == 'June' || $sheet_data[$i][AB] == 'june' || $sheet_data[$i][AB] == 'Jun' || $sheet_data[$i][AB] == 'jun'){
                                            $thirdChildMOB = 6;
                                        }else if($sheet_data[$i][AB] == 'July' || $sheet_data[$i][AB] == 'july' || $sheet_data[$i][AB] == 'Jul' || $sheet_data[$i][AB] == 'jul'){
                                            $thirdChildMOB = 7;
                                        }else if($sheet_data[$i][AB] == 'August' || $sheet_data[$i][AB] == 'august' || $sheet_data[$i][AB] == 'Aug' || $sheet_data[$i][AB] == 'aug'){
                                            $thirdChildMOB = 8;
                                        }else if($sheet_data[$i][AB] == 'September' || $sheet_data[$i][AB] == 'september' || $sheet_data[$i][AB] == 'Sep' || $sheet_data[$i][AB] == 'sep'){
                                            $thirdChildMOB = 9;
                                        }else if($sheet_data[$i][AB] == 'October' || $sheet_data[$i][AB] == 'october' || $sheet_data[$i][AB] == 'Oct' || $sheet_data[$i][AB] == 'oct'){
                                            $thirdChildMOB = 10;
                                        }else if($sheet_data[$i][AB] == 'November' || $sheet_data[$i][AB] == 'november' || $sheet_data[$i][AB] == 'Nov' || $sheet_data[$i][AB] == 'nov'){
                                            $thirdChildMOB = 11;
                                        }else if($sheet_data[$i][AB] == 'December' || $sheet_data[$i][AB] == 'december' || $sheet_data[$i][AB] == 'Dec' || $sheet_data[$i][AB] == 'dec'){
                                            $thirdChildMOB = 12;
                                        }
                                    }else{
                                        $thirdChildMOB = 1;
                                    }
                                    //Check for 3 child day of birth is blank or not
                                    if($sheet_data[$i][AC] != null || $sheet_data[$i][AC] != ''){
                                        $thirdChildDOB = $sheet_data[$i][AC];
                                    }else{
                                        $thirdChildDOB = 1;
                                    }
                                    //Check for 3 child age group is blank or not
                                    if($sheet_data[$i][AD] != null || $sheet_data[$i][AD] != ''){
                                        if($sheet_data[$i][AD] == '0-9' || $sheet_data[$i][AD] == '0 - 9'){
                                            $thirdChildAgeGroup = 9;
                                        }else if($sheet_data[$i][AD] == '10-12' || $sheet_data[$i][AD] == '10 - 12'){
                                            $thirdChildAgeGroup = 12;
                                        }else if($sheet_data[$i][AD] == '13-18' || $sheet_data[$i][AD] == '13 - 18'){
                                            $thirdChildAgeGroup = 18;
                                        }else if($sheet_data[$i][AD] == '19-29' || $sheet_data[$i][AD] == '19 - 29'){
                                            $thirdChildAgeGroup = 29;
                                        }else if($sheet_data[$i][AD] == '30-39' || $sheet_data[$i][AD] == '30 - 39'){
                                            $thirdChildAgeGroup = 39;
                                        }else if($sheet_data[$i][AD] == '40-49' || $sheet_data[$i][AD] == '40 - 49'){
                                            $thirdChildAgeGroup = 49;
                                        }else if($sheet_data[$i][AD] == '50-69' || $sheet_data[$i][AD] == '50 - 69'){
                                            $thirdChildAgeGroup = 69;
                                        }else if($sheet_data[$i][AD] == 'Above 70' || $sheet_data[$i][AD] == 'Above70' || $sheet_data[$i][AD] == '70+'){
                                            $thirdChildAgeGroup = 70;
                                        }else if($sheet_data[$i][AD] == "" || $sheet_data[$i][AD] == " "){
                                            $thirdChildAgeGroup = "-";
                                        }
                                    }else{
                                        $thirdChildAgeGroup = 9;
                                    }
                                    $child3 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $thirdChildFN,
                                        'lname' => $thirdChildLN,
                                        'month' => $thirdChildMOB,
                                        'day' => $thirdChildDOB,
                                        'age_group' => $thirdChildAgeGroup,
                                        'gender' => $thirdChildGender
                                    );
                                    $this->data->insert('children', $child3);
                                }
                                if(isset($sheet_data[$i][AE]) || $sheet_data[$i][AE] != null || $sheet_data[$i][AE] != '' || isset($sheet_data[$i][AF]) || $sheet_data[$i][AF] != null || $sheet_data[$i][AF] != ''){
                                    //Check for 4 Child First Name is blank or not
                                    if($sheet_data[$i][AE] != null || $sheet_data[$i][AF]){
                                        $forthChildFN = $sheet_data[$i][AE];
                                    }else{
                                        $forthChildFN = '-';
                                    }
                                    //Check for 4 Child Last Name is blank or not
                                    if($sheet_data[$i][AF] != null || $sheet_data[$i][AF]){
                                        $forthChildLN = $sheet_data[$i][AF];
                                    }else{
                                        $forthChildLN = '-';
                                    }
                                    //Check for 4 child gender is blank or not
                                    if($sheet_data[$i][AG] != null || $sheet_data[$i][AG] != ''){
                                        $forthChildGender = $sheet_data[$i][AG];
                                    }else{
                                        $forthChildGender = '-';
                                    }
                                    //Check for 4 Child Month of Birth is blank or not
                                    if($sheet_data[$i][AH] != null || $sheet_data[$i][AH] != ''){
                                        if($sheet_data[$i][AH] == 'January' || $sheet_data[$i][AH] == 'january' || $sheet_data[$i][AH] == 'Jan' || $sheet_data[$i][AH] == 'jan'){
                                            $forthChildMOB = 1;
                                        }else if($sheet_data[$i][AH] == 'February' || $sheet_data[$i][AH] == 'february' || $sheet_data[$i][AH] == 'Feb' || $sheet_data[$i][AH] == 'feb'){
                                            $forthChildMOB = 2;
                                        }else if($sheet_data[$i][AH] == 'March' || $sheet_data[$i][AH] == 'march' || $sheet_data[$i][AH] == 'Mar' || $sheet_data[$i][AH] == 'mar'){
                                            $forthChildMOB = 3;
                                        }else if($sheet_data[$i][AH] == 'April' || $sheet_data[$i][AH] == 'april' || $sheet_data[$i][AH] == 'Apr' || $sheet_data[$i][AH] == 'apr'){
                                            $forthChildMOB = 4;
                                        }else if($sheet_data[$i][AH] == 'May' || $sheet_data[$i][AH] == 'may' || $sheet_data[$i][AH] == 'May' || $sheet_data[$i][AH] == 'may'){
                                            $forthChildMOB = 5;
                                        }else if($sheet_data[$i][AH] == 'June' || $sheet_data[$i][AH] == 'june' || $sheet_data[$i][AH] == 'Jun' || $sheet_data[$i][AH] == 'jun'){
                                            $forthChildMOB = 6;
                                        }else if($sheet_data[$i][AH] == 'July' || $sheet_data[$i][AH] == 'july' || $sheet_data[$i][AH] == 'Jul' || $sheet_data[$i][AH] == 'jul'){
                                            $forthChildMOB = 7;
                                        }else if($sheet_data[$i][AH] == 'August' || $sheet_data[$i][AH] == 'august' || $sheet_data[$i][AH] == 'Aug' || $sheet_data[$i][V] == 'aug'){
                                            $forthChildMOB = 8;
                                        }else if($sheet_data[$i][AH] == 'September' || $sheet_data[$i][AH] == 'september' || $sheet_data[$i][AH] == 'Sep' || $sheet_data[$i][AH] == 'sep'){
                                            $forthChildMOB = 9;
                                        }else if($sheet_data[$i][AH] == 'October' || $sheet_data[$i][AH] == 'october' || $sheet_data[$i][AH] == 'Oct' || $sheet_data[$i][AH] == 'oct'){
                                            $forthChildMOB = 10;
                                        }else if($sheet_data[$i][AH] == 'November' || $sheet_data[$i][AH] == 'november' || $sheet_data[$i][AH] == 'Nov' || $sheet_data[$i][AH] == 'nov'){
                                            $forthChildMOB = 11;
                                        }else if($sheet_data[$i][AH] == 'December' || $sheet_data[$i][AH] == 'december' || $sheet_data[$i][AH] == 'Dec' || $sheet_data[$i][AH] == 'dec'){
                                            $forthChildMOB = 12;
                                        }
                                    }else{
                                        $forthChildMOB = 1;
                                    }
                                    //Check for 4 child day of birth is blank or not
                                    if($sheet_data[$i][AI] != null || $sheet_data[$i][AI] != ''){
                                        $forthChildDOB = $sheet_data[$i][AI];
                                    }else{
                                        $forthChildDOB = 1;
                                    }
                                    //Check for 4 child age group is blank or not
                                    if($sheet_data[$i][AJ] != null || $sheet_data[$i][AJ] != ''){
                                        if($sheet_data[$i][AJ] == '0-9' || $sheet_data[$i][AJ] == '0 - 9'){
                                            $forthChildAgeGroup = 9;
                                        }else if($sheet_data[$i][AJ] == '10-12' || $sheet_data[$i][AJ] == '10 - 12'){
                                            $forthChildAgeGroup = 12;
                                        }else if($sheet_data[$i][AJ] == '13-18' || $sheet_data[$i][AJ] == '13 - 18'){
                                            $forthChildAgeGroup = 18;
                                        }else if($sheet_data[$i][AJ] == '19-29' || $sheet_data[$i][AJ] == '19 - 29'){
                                            $forthChildAgeGroup = 29;
                                        }else if($sheet_data[$i][AJ] == '30-39' || $sheet_data[$i][AJ] == '30 - 39'){
                                            $forthChildAgeGroup = 39;
                                        }else if($sheet_data[$i][AJ] == '40-49' || $sheet_data[$i][AJ] == '40 - 49'){
                                            $forthChildAgeGroup = 49;
                                        }else if($sheet_data[$i][AJ] == '50-69' || $sheet_data[$i][AJ] == '50 - 69'){
                                            $forthChildAgeGroup = 69;
                                        }else if($sheet_data[$i][AJ] == 'Above 70' || $sheet_data[$i][AJ] == 'Above70' || $sheet_data[$i][AJ] == '70+'){
                                            $forthChildAgeGroup = 70;
                                        }else if($sheet_data[$i][AJ] == "" || $sheet_data[$i][AJ] == " "){
                                            $forthChildAgeGroup = "-";
                                        }
                                    }else{
                                        $forthChildAgeGroup = 9;
                                    }
                                    $child4 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $forthChildFN,
                                        'lname' => $forthChildLN,
                                        'month' => $forthChildMOB,
                                        'day' => $forthChildDOB,
                                        'age_group' => $forthChildAgeGroup,
                                        'gender' => $forthChildGender
                                    );
                                    $this->data->insert('children', $child4);
                                }
                                if(isset($sheet_data[$i][AK]) || $sheet_data[$i][AK] != null || $sheet_data[$i][AK] != '' || isset($sheet_data[$i][AL]) || $sheet_data[$i][AL] != null || $sheet_data[$i][AL] != ''){
                                    //Check for 5 Child First Name is blank or not
                                    if($sheet_data[$i][AK] != null || $sheet_data[$i][AK] != ''){
                                        $fifthChildFN = $sheet_data[$i][AK];
                                    }else{
                                        $fifthChildFN = '-';
                                    }
                                    //Check for 5 Child Last Name is blank or not
                                    if($sheet_data[$i][AL] != null || $sheet_data[$i][AL] != ''){
                                        $fifthChildLN = $sheet_data[$i][AL];
                                    }else{
                                        $fifthChildLN = '-';
                                    }
                                    //Check for 5 child gender is blank or not
                                    if($sheet_data[$i][AM] != null || $sheet_data[$i][AM] != ''){
                                        $fifthChildGender = $sheet_data[$i][AM];
                                    }else{
                                        $fifthChildGender = '-';
                                    }
                                    //Check for 5 Child Month of Birth is blank or not
                                    if($sheet_data[$i][AN] != null || $sheet_data[$i][AN] != ''){
                                        if($sheet_data[$i][AN] == 'January' || $sheet_data[$i][AN] == 'january' || $sheet_data[$i][AN] == 'Jan' || $sheet_data[$i][AN] == 'jan'){
                                            $fifthChildMOB = 1;
                                        }else if($sheet_data[$i][AN] == 'February' || $sheet_data[$i][AN] == 'february' || $sheet_data[$i][AN] == 'Feb' || $sheet_data[$i][AN] == 'feb'){
                                            $fifthChildMOB = 2;
                                        }else if($sheet_data[$i][AN] == 'March' || $sheet_data[$i][AN] == 'march' || $sheet_data[$i][AN] == 'Mar' || $sheet_data[$i][AN] == 'mar'){
                                            $fifthChildMOB = 3;
                                        }else if($sheet_data[$i][AN] == 'April' || $sheet_data[$i][AN] == 'april' || $sheet_data[$i][AN] == 'Apr' || $sheet_data[$i][AN] == 'apr'){
                                            $fifthChildMOB = 4;
                                        }else if($sheet_data[$i][AN] == 'May' || $sheet_data[$i][AN] == 'may' || $sheet_data[$i][AN] == 'May' || $sheet_data[$i][AN] == 'may'){
                                            $fifthChildMOB = 5;
                                        }else if($sheet_data[$i][AN] == 'June' || $sheet_data[$i][AN] == 'june' || $sheet_data[$i][AN] == 'Jun' || $sheet_data[$i][AN] == 'jun'){
                                            $fifthChildMOB = 6;
                                        }else if($sheet_data[$i][AN] == 'July' || $sheet_data[$i][AN] == 'july' || $sheet_data[$i][AN] == 'Jul' || $sheet_data[$i][AN] == 'jul'){
                                            $fifthChildMOB = 7;
                                        }else if($sheet_data[$i][AN] == 'August' || $sheet_data[$i][AN] == 'august' || $sheet_data[$i][AN] == 'Aug' || $sheet_data[$i][AN] == 'aug'){
                                            $fifthChildMOB = 8;
                                        }else if($sheet_data[$i][AN] == 'September' || $sheet_data[$i][AN] == 'september' || $sheet_data[$i][AN] == 'Sep' || $sheet_data[$i][AN] == 'sep'){
                                            $fifthChildMOB = 9;
                                        }else if($sheet_data[$i][AN] == 'October' || $sheet_data[$i][AN] == 'october' || $sheet_data[$i][AN] == 'Oct' || $sheet_data[$i][AN] == 'oct'){
                                            $fifthChildMOB = 10;
                                        }else if($sheet_data[$i][AN] == 'November' || $sheet_data[$i][AN] == 'november' || $sheet_data[$i][AN] == 'Nov' || $sheet_data[$i][AN] == 'nov'){
                                            $fifthChildMOB = 11;
                                        }else if($sheet_data[$i][AN] == 'December' || $sheet_data[$i][AN] == 'december' || $sheet_data[$i][AN] == 'Dec' || $sheet_data[$i][AN] == 'dec'){
                                            $fifthChildMOB = 12;
                                        }
                                    }else{
                                        $fifthChildMOB = 1;
                                    }
                                    //Check for 5 child day of birth is blank or not
                                    if($sheet_data[$i][AO] != null || $sheet_data[$i][AO] != ''){
                                        $fifthChildDOB = $sheet_data[$i][AO];
                                    }else{
                                        $fifthChildDOB = 1;
                                    }
                                    //Check for 5 child age group is blank or not
                                    if($sheet_data[$i][AP] != null || $sheet_data[$i][AP] != ''){
                                        if($sheet_data[$i][AP] == '0-9' || $sheet_data[$i][AP] == '0 - 9'){
                                            $fifthChildAgeGroup = 9;
                                        }else if($sheet_data[$i][AP] == '10-12' || $sheet_data[$i][AP] == '10 - 12'){
                                            $fifthChildAgeGroup = 12;
                                        }else if($sheet_data[$i][AP] == '13-18' || $sheet_data[$i][AP] == '13 - 18'){
                                            $fifthChildAgeGroup = 18;
                                        }else if($sheet_data[$i][AP] == '19-29' || $sheet_data[$i][AP] == '19 - 29'){
                                            $fifthChildAgeGroup = 29;
                                        }else if($sheet_data[$i][AP] == '30-39' || $sheet_data[$i][AP] == '30 - 39'){
                                            $fifthChildAgeGroup = 39;
                                        }else if($sheet_data[$i][AP] == '40-49' || $sheet_data[$i][AP] == '40 - 49'){
                                            $fifthChildAgeGroup = 49;
                                        }else if($sheet_data[$i][AP] == '50-69' || $sheet_data[$i][AP] == '50 - 69'){
                                            $fifthChildAgeGroup = 69;
                                        }else if($sheet_data[$i][AP] == 'Above 70' || $sheet_data[$i][AP] == 'Above70' || $sheet_data[$i][AP] == '70+'){
                                            $fifthChildAgeGroup = 70;
                                        }else if($sheet_data[$i][AP] == "" || $sheet_data[$i][AP] == " "){
                                            $fifthChildAgeGroup = "-";
                                        }
                                    }else{
                                        $fifthChildAgeGroup = 9;
                                    }
                                    $child5 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $fifthChildFN,
                                        'lname' => $fifthChildLN,
                                        'month' => $fifthChildMOB,
                                        'day' => $fifthChildDOB,
                                        'age_group' => $fifthChildAgeGroup,
                                        'gender' => $fifthChildGender
                                    );
                                    $this->data->insert('children', $child5);
                                }
                            }else{
                                $this->session->set_userdata("msg","Insufficient SMS Credit Please Topup.");
                            }
                        }
                        }else{
                            $this->session->set_userdata('msg', 'Email or Mobile Number is duplicate.');
                        }
                    }else{
                            if($balanceSMS > $requireSMS){
                                $usernameCreate = $this->data->fetch("member", array('fname' => $fname, 'lname' => $lname, 'status' => 'active'));
                                if(count($usernameCreate)){
                                    $username = lcfirst($fname)."".lcfirst($lname)."".count($usernameCreate);
                                }else{
                                    $username = lcfirst($fname)."".lcfirst($lname);
                                }
                                $password = $this->randomPassword();
                                print_r($password."<br/>");
                                if($gender == 'male' || $gender == 'Male' || $gender == 'MALE'){
                                    $image = "male.jpg";
                                    $gender = 'male';
                                }else{
                                    $image = "female.jpg";
                                    $gender = 'female';
                                }
                                $result = array(
                                    'title' => $title,
                                    'username' => strtolower($username),
                                    'fname' => $fname,
                                    'lname' => $lname,
                                    'gander' => $gender,
                                    'image' => $image,
                                    'mobileNo' => $mobileNo,
                                    'email' => $email,
                                    'password' => $password,
                                    'age_group' => $ageGroup,
                                    'birth_month' => $birthMonth,
                                    'birth_date' => $birthDate,
                                    'address' => $address,
                                    'poatalCode' => $poatalCode,
                                    'registrationEmail' => '0'
                                );
                                $this->data->insert('member', $result);
                                $parent_id = $this->db->insert_id();
                                $msg1 = "Dear ".$fname.", you have just been added to RCCGVHL system. See your login details: https://rccgvhl.mmsapp.org Username: ".strtolower($username)." Password: ".$password." Please login to update your details and to enjoy all it’s benefits. Shalom. Pastor Leke.";
                                $this->sendSMS1("RCCGVHL", $mobileNo, $msg1);
                                $sms = array(
                                    'msg' => $msg1,
                                    'to' => $gname." ".$lname,
                                    'toId' => $parent_id,
                                    'sentSMSCount' => 3
                                );
                                $this->data->insert('sms', $sms);
                                
                                //Adding Business Page Details
                                $business = array(
                                    'user_id' => $parent_id,
                                    'title' => $fname." ".$lname." Business Page",
                                    'email' => $email,
                                    'phone' => $mobileNo
                                );
                                
                                $this->data->insert('business', $business);
                                
                                if(isset($sheet_data[$i][M]) || $sheet_data[$i][M] != null || $sheet_data[$i][M] != '' || isset($sheet_data[$i][N]) || $sheet_data[$i][N] != null || $sheet_data[$i][N] != ''){
                                    //Check for 1 Child First Name is blank or not
                                    if($sheet_data[$i][M] != null || $sheet_data[$i][M] != ''){
                                        $firstChildFN = $sheet_data[$i][M];
                                    }else{
                                        $firstChildFN = '-';
                                    }
                                    //Check for 1 Child Last Name is blank or not
                                    if($sheet_data[$i][N] != null || $sheet_data[$i][N] != ''){
                                        $firstChildLN = $sheet_data[$i][N];
                                    }else{
                                        $firstChildLN = '-';
                                    }
                                    //Check for 1 child gender is blank or not
                                    if($sheet_data[$i][O] != null || $sheet_data[$i][O] != ''){
                                        $firstChildGender = $sheet_data[$i][O];
                                    }else{
                                        $firstChildGender = '-';
                                    }
                                    //Check for 1 Child Month of Birth is blank or not
                                    if($sheet_data[$i][P] != null || $sheet_data[$i][P] != ''){
                                        if($sheet_data[$i][P] == 'January' || $sheet_data[$i][P] == 'january' || $sheet_data[$i][P] == 'Jan' || $sheet_data[$i][P] == 'jan'){
                                            $firstChildMOB = 1;
                                        }else if($sheet_data[$i][P] == 'February' || $sheet_data[$i][P] == 'february' || $sheet_data[$i][P] == 'Feb' || $sheet_data[$i][P] == 'feb'){
                                            $firstChildMOB = 2;
                                        }else if($sheet_data[$i][P] == 'March' || $sheet_data[$i][P] == 'march' || $sheet_data[$i][P] == 'Mar' || $sheet_data[$i][P] == 'mar'){
                                            $firstChildMOB = 3;
                                        }else if($sheet_data[$i][P] == 'April' || $sheet_data[$i][P] == 'april' || $sheet_data[$i][P] == 'Apr' || $sheet_data[$i][P] == 'apr'){
                                            $firstChildMOB = 4;
                                        }else if($sheet_data[$i][P] == 'May' || $sheet_data[$i][P] == 'may' || $sheet_data[$i][P] == 'May' || $sheet_data[$i][P] == 'may'){
                                            $firstChildMOB = 5;
                                        }else if($sheet_data[$i][P] == 'June' || $sheet_data[$i][P] == 'june' || $sheet_data[$i][P] == 'Jun' || $sheet_data[$i][P] == 'jun'){
                                            $firstChildMOB = 6;
                                        }else if($sheet_data[$i][P] == 'July' || $sheet_data[$i][P] == 'july' || $sheet_data[$i][P] == 'Jul' || $sheet_data[$i][P] == 'jul'){
                                            $firstChildMOB = 7;
                                        }else if($sheet_data[$i][P] == 'August' || $sheet_data[$i][P] == 'august' || $sheet_data[$i][P] == 'Aug' || $sheet_data[$i][P] == 'aug'){
                                            $firstChildMOB = 8;
                                        }else if($sheet_data[$i][P] == 'September' || $sheet_data[$i][P] == 'september' || $sheet_data[$i][P] == 'Sep' || $sheet_data[$i][P] == 'sep'){
                                            $firstChildMOB = 9;
                                        }else if($sheet_data[$i][P] == 'October' || $sheet_data[$i][P] == 'october' || $sheet_data[$i][P] == 'Oct' || $sheet_data[$i][P] == 'oct'){
                                            $firstChildMOB = 10;
                                        }else if($sheet_data[$i][P] == 'November' || $sheet_data[$i][P] == 'november' || $sheet_data[$i][P] == 'Nov' || $sheet_data[$i][P] == 'nov'){
                                            $firstChildMOB = 11;
                                        }else if($sheet_data[$i][P] == 'December' || $sheet_data[$i][P] == 'december' || $sheet_data[$i][P] == 'Dec' || $sheet_data[$i][P] == 'dec'){
                                            $firstChildMOB = 12;
                                        }
                                    }else{
                                        $firstChildMOB = 1;
                                    }
                                    //Check for 1 child day of birth is blank or not
                                    if($sheet_data[$i][Q] != null || $sheet_data[$i][Q] != ''){
                                        $firstChildDOB = $sheet_data[$i][Q];
                                    }else{
                                        $firstChildDOB = 1;
                                    }
                                    //Check for 1 child age group is blank or not
                                    if($sheet_data[$i][R] != null || $sheet_data[$i][R] != ''){
                                        if($sheet_data[$i][R] == '0-9' || $sheet_data[$i][R] == '0 - 9'){
                                            $firstChildAgeGroup = 9;
                                        }else if($sheet_data[$i][R] == '10-12' || $sheet_data[$i][R] == '10 - 12'){
                                            $firstChildAgeGroup = 12;
                                        }else if($sheet_data[$i][R] == '13-18' || $sheet_data[$i][R] == '13 - 18'){
                                            $firstChildAgeGroup = 18;
                                        }else if($sheet_data[$i][R] == '19-29' || $sheet_data[$i][R] == '19 - 29'){
                                            $firstChildAgeGroup = 29;
                                        }else if($sheet_data[$i][R] == '30-39' || $sheet_data[$i][R] == '30 - 39'){
                                            $firstChildAgeGroup = 39;
                                        }else if($sheet_data[$i][R] == '40-49' || $sheet_data[$i][R] == '40 - 49'){
                                            $firstChildAgeGroup = 49;
                                        }else if($sheet_data[$i][R] == '50-69' || $sheet_data[$i][R] == '50 - 69'){
                                            $firstChildAgeGroup = 69;
                                        }else if($sheet_data[$i][R] == 'Above 70' || $sheet_data[$i][R] == 'Above70' || $sheet_data[$i][R] == '70+'){
                                            $firstChildAgeGroup = 70;
                                        }else if($sheet_data[$i][R] == "" || $sheet_data[$i][R] == " "){
                                            $firstChildAgeGroup = "-";
                                        }
                                    }else{
                                        $firstChildAgeGroup = 9;
                                    }
                                    $child1 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $firstChildFN,
                                        'lname' => $firstChildLN,
                                        'month' => $firstChildMOB,
                                        'day' => $firstChildDOB,
                                        'age_group' => $firstChildAgeGroup,
                                        'gender' => $firstChildGender
                                    );
                                    $this->data->insert('children', $child1);
                                }
                                if(isset($sheet_data[$i][S]) || $sheet_data[$i][S] != null || $sheet_data[$i][S] != '' || isset($sheet_data[$i][T]) || $sheet_data[$i][T] != null || $sheet_data[$i][T] != ''){
                                    //Check for 2 Child First Name is blank or not
                                    if($sheet_data[$i][S] != null || $sheet_data[$i][S] != ''){
                                        $secondChildFN = $sheet_data[$i][S];
                                    }else{
                                        $secondChildFN = '-';
                                    }
                                    //Check for 2 Child Last Name is blank or not
                                    if($sheet_data[$i][T] != null || $sheet_data[$i][T] != ''){
                                        $secondChildLN = $sheet_data[$i][T];
                                    }else{
                                        $secondChildLN = '-';
                                    }
                                    //Check for 2 child gender is blank or not
                                    if($sheet_data[$i][U] != null || $sheet_data[$i][U] != ''){
                                        $secondChildGender = $sheet_data[$i][U];
                                    }else{
                                        $secondChildGender = '-';
                                    }
                                    //Check for 2 Child Month of Birth is blank or not
                                    if($sheet_data[$i][V] != null || $sheet_data[$i][V] != ''){
                                        if($sheet_data[$i][V] == 'January' || $sheet_data[$i][V] == 'january' || $sheet_data[$i][V] == 'Jan' || $sheet_data[$i][V] == 'jan'){
                                            $secondChildMOB = 1;
                                        }else if($sheet_data[$i][V] == 'February' || $sheet_data[$i][V] == 'february' || $sheet_data[$i][V] == 'Feb' || $sheet_data[$i][V] == 'feb'){
                                            $secondChildMOB = 2;
                                        }else if($sheet_data[$i][V] == 'March' || $sheet_data[$i][V] == 'march' || $sheet_data[$i][V] == 'Mar' || $sheet_data[$i][V] == 'mar'){
                                            $secondChildMOB = 3;
                                        }else if($sheet_data[$i][V] == 'April' || $sheet_data[$i][V] == 'april' || $sheet_data[$i][V] == 'Apr' || $sheet_data[$i][V] == 'apr'){
                                            $secondChildMOB = 4;
                                        }else if($sheet_data[$i][V] == 'May' || $sheet_data[$i][V] == 'may' || $sheet_data[$i][V] == 'May' || $sheet_data[$i][V] == 'may'){
                                            $secondChildMOB = 5;
                                        }else if($sheet_data[$i][V] == 'June' || $sheet_data[$i][V] == 'june' || $sheet_data[$i][V] == 'Jun' || $sheet_data[$i][V] == 'jun'){
                                            $secondChildMOB = 6;
                                        }else if($sheet_data[$i][V] == 'July' || $sheet_data[$i][V] == 'july' || $sheet_data[$i][V] == 'Jul' || $sheet_data[$i][V] == 'jul'){
                                            $secondChildMOB = 7;
                                        }else if($sheet_data[$i][V] == 'August' || $sheet_data[$i][V] == 'august' || $sheet_data[$i][V] == 'Aug' || $sheet_data[$i][V] == 'aug'){
                                            $secondChildMOB = 8;
                                        }else if($sheet_data[$i][V] == 'September' || $sheet_data[$i][V] == 'september' || $sheet_data[$i][V] == 'Sep' || $sheet_data[$i][V] == 'sep'){
                                            $secondChildMOB = 9;
                                        }else if($sheet_data[$i][V] == 'October' || $sheet_data[$i][V] == 'october' || $sheet_data[$i][V] == 'Oct' || $sheet_data[$i][V] == 'oct'){
                                            $secondChildMOB = 10;
                                        }else if($sheet_data[$i][V] == 'November' || $sheet_data[$i][V] == 'november' || $sheet_data[$i][V] == 'Nov' || $sheet_data[$i][V] == 'nov'){
                                            $secondChildMOB = 11;
                                        }else if($sheet_data[$i][V] == 'December' || $sheet_data[$i][V] == 'december' || $sheet_data[$i][V] == 'Dec' || $sheet_data[$i][V] == 'dec'){
                                            $secondChildMOB = 12;
                                        }
                                    }else{
                                        $secondChildMOB = 1;
                                    }
                                    //Check for 2 child day of birth is blank or not
                                    if($sheet_data[$i][W] != null || $sheet_data[$i][W] != ''){
                                        $secondChildDOB = $sheet_data[$i][W];
                                    }else{
                                        $secondChildDOB = 1;
                                    }
                                    //Check for 2 child age group is blank or not
                                    if($sheet_data[$i][X] != null || $sheet_data[$i][X] != ''){
                                        if($sheet_data[$i][X] == '0-9' || $sheet_data[$i][X] == '0 - 9'){
                                            $secondChildAgeGroup = 9;
                                        }else if($sheet_data[$i][X] == '10-12' || $sheet_data[$i][X] == '10 - 12'){
                                            $secondChildAgeGroup = 12;
                                        }else if($sheet_data[$i][X] == '13-18' || $sheet_data[$i][X] == '13 - 18'){
                                            $secondChildAgeGroup = 18;
                                        }else if($sheet_data[$i][X] == '19-29' || $sheet_data[$i][X] == '19 - 29'){
                                            $secondChildAgeGroup = 29;
                                        }else if($sheet_data[$i][X] == '30-39' || $sheet_data[$i][X] == '30 - 39'){
                                            $secondChildAgeGroup = 39;
                                        }else if($sheet_data[$i][X] == '40-49' || $sheet_data[$i][X] == '40 - 49'){
                                            $secondChildAgeGroup = 49;
                                        }else if($sheet_data[$i][X] == '50-69' || $sheet_data[$i][X] == '50 - 69'){
                                            $secondChildAgeGroup = 69;
                                        }else if($sheet_data[$i][X] == 'Above 70' || $sheet_data[$i][X] == 'Above70' || $sheet_data[$i][X] == '70+'){
                                            $secondChildAgeGroup = 70;
                                        }else if($sheet_data[$i][X] == "" || $sheet_data[$i][X] == " "){
                                            $secondChildAgeGroup = "-";
                                        }
                                    }else{
                                        $secondChildAgeGroup = 9;
                                    }
                                    $child2 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $secondChildFN,
                                        'lname' => $secondChildLN,
                                        'month' => $secondChildMOB,
                                        'day' => $secondChildDOB,
                                        'age_group' => $secondChildAgeGroup,
                                        'gender' => $secondChildGender
                                    );
                                    $this->data->insert('children', $child2);
                                }
                                if(isset($sheet_data[$i][Y]) || $sheet_data[$i][Y] != null || $sheet_data[$i][Y] != '' || isset($sheet_data[$i][Z]) || $sheet_data[$i][Z] != null || $sheet_data[$i][Z] != ''){
                                    //Check for 3 Child First Name is blank or not
                                    if($sheet_data[$i][Y] != null || $sheet_data[$i][Y] != ''){
                                        $thirdChildFN = $sheet_data[$i][Y];
                                    }else{
                                        $thirdChildFN = '-';
                                    }
                                    //Check for 3 Child Last Name is blank or not
                                    if($sheet_data[$i][Z] != null || $sheet_data[$i][Z] != ''){
                                        $thirdChildLN = $sheet_data[$i][Z];
                                    }else{
                                        $thirdChildLN = '-';
                                    }
                                    //Check for 3 child gender is blank or not
                                    if($sheet_data[$i][AA] != null || $sheet_data[$i][AA] != ''){
                                        $thirdChildGender = $sheet_data[$i][AA];
                                    }else{
                                        $thirdChildGender = '-';
                                    }
                                    //Check for 3 Child Month of Birth is blank or not
                                    if($sheet_data[$i][AB] != null || $sheet_data[$i][AB] != ''){
                                        if($sheet_data[$i][AB] == 'January' || $sheet_data[$i][AB] == 'january' || $sheet_data[$i][AB] == 'Jan' || $sheet_data[$i][AB] == 'jan'){
                                            $thirdChildMOB = 1;
                                        }else if($sheet_data[$i][AB] == 'February' || $sheet_data[$i][AB] == 'february' || $sheet_data[$i][AB] == 'Feb' || $sheet_data[$i][AB] == 'feb'){
                                            $thirdChildMOB = 2;
                                        }else if($sheet_data[$i][AB] == 'March' || $sheet_data[$i][AB] == 'march' || $sheet_data[$i][AB] == 'Mar' || $sheet_data[$i][AB] == 'mar'){
                                            $thirdChildMOB = 3;
                                        }else if($sheet_data[$i][AB] == 'April' || $sheet_data[$i][AB] == 'april' || $sheet_data[$i][AB] == 'Apr' || $sheet_data[$i][AB] == 'apr'){
                                            $thirdChildMOB = 4;
                                        }else if($sheet_data[$i][AB] == 'May' || $sheet_data[$i][AB] == 'may' || $sheet_data[$i][AB] == 'May' || $sheet_data[$i][AB] == 'may'){
                                            $thirdChildMOB = 5;
                                        }else if($sheet_data[$i][AB] == 'June' || $sheet_data[$i][AB] == 'june' || $sheet_data[$i][AB] == 'Jun' || $sheet_data[$i][AB] == 'jun'){
                                            $thirdChildMOB = 6;
                                        }else if($sheet_data[$i][AB] == 'July' || $sheet_data[$i][AB] == 'july' || $sheet_data[$i][AB] == 'Jul' || $sheet_data[$i][AB] == 'jul'){
                                            $thirdChildMOB = 7;
                                        }else if($sheet_data[$i][AB] == 'August' || $sheet_data[$i][AB] == 'august' || $sheet_data[$i][AB] == 'Aug' || $sheet_data[$i][AB] == 'aug'){
                                            $thirdChildMOB = 8;
                                        }else if($sheet_data[$i][AB] == 'September' || $sheet_data[$i][AB] == 'september' || $sheet_data[$i][AB] == 'Sep' || $sheet_data[$i][AB] == 'sep'){
                                            $thirdChildMOB = 9;
                                        }else if($sheet_data[$i][AB] == 'October' || $sheet_data[$i][AB] == 'october' || $sheet_data[$i][AB] == 'Oct' || $sheet_data[$i][AB] == 'oct'){
                                            $thirdChildMOB = 10;
                                        }else if($sheet_data[$i][AB] == 'November' || $sheet_data[$i][AB] == 'november' || $sheet_data[$i][AB] == 'Nov' || $sheet_data[$i][AB] == 'nov'){
                                            $thirdChildMOB = 11;
                                        }else if($sheet_data[$i][AB] == 'December' || $sheet_data[$i][AB] == 'december' || $sheet_data[$i][AB] == 'Dec' || $sheet_data[$i][AB] == 'dec'){
                                            $thirdChildMOB = 12;
                                        }
                                    }else{
                                        $thirdChildMOB = 1;
                                    }
                                    //Check for 3 child day of birth is blank or not
                                    if($sheet_data[$i][AC] != null || $sheet_data[$i][AC] != ''){
                                        $thirdChildDOB = $sheet_data[$i][AC];
                                    }else{
                                        $thirdChildDOB = 1;
                                    }
                                    //Check for 3 child age group is blank or not
                                    if($sheet_data[$i][AD] != null || $sheet_data[$i][AD] != ''){
                                        if($sheet_data[$i][AD] == '0-9' || $sheet_data[$i][AD] == '0 - 9'){
                                            $thirdChildAgeGroup = 9;
                                        }else if($sheet_data[$i][AD] == '10-12' || $sheet_data[$i][AD] == '10 - 12'){
                                            $thirdChildAgeGroup = 12;
                                        }else if($sheet_data[$i][AD] == '13-18' || $sheet_data[$i][AD] == '13 - 18'){
                                            $thirdChildAgeGroup = 18;
                                        }else if($sheet_data[$i][AD] == '19-29' || $sheet_data[$i][AD] == '19 - 29'){
                                            $thirdChildAgeGroup = 29;
                                        }else if($sheet_data[$i][AD] == '30-39' || $sheet_data[$i][AD] == '30 - 39'){
                                            $thirdChildAgeGroup = 39;
                                        }else if($sheet_data[$i][AD] == '40-49' || $sheet_data[$i][AD] == '40 - 49'){
                                            $thirdChildAgeGroup = 49;
                                        }else if($sheet_data[$i][AD] == '50-69' || $sheet_data[$i][AD] == '50 - 69'){
                                            $thirdChildAgeGroup = 69;
                                        }else if($sheet_data[$i][AD] == 'Above 70' || $sheet_data[$i][AD] == 'Above70' || $sheet_data[$i][AD] == '70+'){
                                            $thirdChildAgeGroup = 70;
                                        }else if($sheet_data[$i][AD] == "" || $sheet_data[$i][AD] == " "){
                                            $thirdChildAgeGroup = "-";
                                        }
                                    }else{
                                        $thirdChildAgeGroup = 9;
                                    }
                                    $child3 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $thirdChildFN,
                                        'lname' => $thirdChildLN,
                                        'month' => $thirdChildMOB,
                                        'day' => $thirdChildDOB,
                                        'age_group' => $thirdChildAgeGroup,
                                        'gender' => $thirdChildGender
                                    );
                                    $this->data->insert('children', $child3);
                                }
                                if(isset($sheet_data[$i][AE]) || $sheet_data[$i][AE] != null || $sheet_data[$i][AE] != '' || isset($sheet_data[$i][AF]) || $sheet_data[$i][AF] != null || $sheet_data[$i][AF] != ''){
                                    //Check for 4 Child First Name is blank or not
                                    if($sheet_data[$i][AE] != null || $sheet_data[$i][AF]){
                                        $forthChildFN = $sheet_data[$i][AE];
                                    }else{
                                        $forthChildFN = '-';
                                    }
                                    //Check for 4 Child Last Name is blank or not
                                    if($sheet_data[$i][AF] != null || $sheet_data[$i][AF]){
                                        $forthChildLN = $sheet_data[$i][AF];
                                    }else{
                                        $forthChildLN = '-';
                                    }
                                    //Check for 4 child gender is blank or not
                                    if($sheet_data[$i][AG] != null || $sheet_data[$i][AG] != ''){
                                        $forthChildGender = $sheet_data[$i][AG];
                                    }else{
                                        $forthChildGender = '-';
                                    }
                                    //Check for 4 Child Month of Birth is blank or not
                                    if($sheet_data[$i][AH] != null || $sheet_data[$i][AH] != ''){
                                        if($sheet_data[$i][AH] == 'January' || $sheet_data[$i][AH] == 'january' || $sheet_data[$i][AH] == 'Jan' || $sheet_data[$i][AH] == 'jan'){
                                            $forthChildMOB = 1;
                                        }else if($sheet_data[$i][AH] == 'February' || $sheet_data[$i][AH] == 'february' || $sheet_data[$i][AH] == 'Feb' || $sheet_data[$i][AH] == 'feb'){
                                            $forthChildMOB = 2;
                                        }else if($sheet_data[$i][AH] == 'March' || $sheet_data[$i][AH] == 'march' || $sheet_data[$i][AH] == 'Mar' || $sheet_data[$i][AH] == 'mar'){
                                            $forthChildMOB = 3;
                                        }else if($sheet_data[$i][AH] == 'April' || $sheet_data[$i][AH] == 'april' || $sheet_data[$i][AH] == 'Apr' || $sheet_data[$i][AH] == 'apr'){
                                            $forthChildMOB = 4;
                                        }else if($sheet_data[$i][AH] == 'May' || $sheet_data[$i][AH] == 'may' || $sheet_data[$i][AH] == 'May' || $sheet_data[$i][AH] == 'may'){
                                            $forthChildMOB = 5;
                                        }else if($sheet_data[$i][AH] == 'June' || $sheet_data[$i][AH] == 'june' || $sheet_data[$i][AH] == 'Jun' || $sheet_data[$i][AH] == 'jun'){
                                            $forthChildMOB = 6;
                                        }else if($sheet_data[$i][AH] == 'July' || $sheet_data[$i][AH] == 'july' || $sheet_data[$i][AH] == 'Jul' || $sheet_data[$i][AH] == 'jul'){
                                            $forthChildMOB = 7;
                                        }else if($sheet_data[$i][AH] == 'August' || $sheet_data[$i][AH] == 'august' || $sheet_data[$i][AH] == 'Aug' || $sheet_data[$i][V] == 'aug'){
                                            $forthChildMOB = 8;
                                        }else if($sheet_data[$i][AH] == 'September' || $sheet_data[$i][AH] == 'september' || $sheet_data[$i][AH] == 'Sep' || $sheet_data[$i][AH] == 'sep'){
                                            $forthChildMOB = 9;
                                        }else if($sheet_data[$i][AH] == 'October' || $sheet_data[$i][AH] == 'october' || $sheet_data[$i][AH] == 'Oct' || $sheet_data[$i][AH] == 'oct'){
                                            $forthChildMOB = 10;
                                        }else if($sheet_data[$i][AH] == 'November' || $sheet_data[$i][AH] == 'november' || $sheet_data[$i][AH] == 'Nov' || $sheet_data[$i][AH] == 'nov'){
                                            $forthChildMOB = 11;
                                        }else if($sheet_data[$i][AH] == 'December' || $sheet_data[$i][AH] == 'december' || $sheet_data[$i][AH] == 'Dec' || $sheet_data[$i][AH] == 'dec'){
                                            $forthChildMOB = 12;
                                        }
                                    }else{
                                        $forthChildMOB = 1;
                                    }
                                    //Check for 4 child day of birth is blank or not
                                    if($sheet_data[$i][AI] != null || $sheet_data[$i][AI] != ''){
                                        $forthChildDOB = $sheet_data[$i][AI];
                                    }else{
                                        $forthChildDOB = 1;
                                    }
                                    //Check for 4 child age group is blank or not
                                    if($sheet_data[$i][AJ] != null || $sheet_data[$i][AJ] != ''){
                                        if($sheet_data[$i][AJ] == '0-9' || $sheet_data[$i][AJ] == '0 - 9'){
                                            $forthChildAgeGroup = 9;
                                        }else if($sheet_data[$i][AJ] == '10-12' || $sheet_data[$i][AJ] == '10 - 12'){
                                            $forthChildAgeGroup = 12;
                                        }else if($sheet_data[$i][AJ] == '13-18' || $sheet_data[$i][AJ] == '13 - 18'){
                                            $forthChildAgeGroup = 18;
                                        }else if($sheet_data[$i][AJ] == '19-29' || $sheet_data[$i][AJ] == '19 - 29'){
                                            $forthChildAgeGroup = 29;
                                        }else if($sheet_data[$i][AJ] == '30-39' || $sheet_data[$i][AJ] == '30 - 39'){
                                            $forthChildAgeGroup = 39;
                                        }else if($sheet_data[$i][AJ] == '40-49' || $sheet_data[$i][AJ] == '40 - 49'){
                                            $forthChildAgeGroup = 49;
                                        }else if($sheet_data[$i][AJ] == '50-69' || $sheet_data[$i][AJ] == '50 - 69'){
                                            $forthChildAgeGroup = 69;
                                        }else if($sheet_data[$i][AJ] == 'Above 70' || $sheet_data[$i][AJ] == 'Above70' || $sheet_data[$i][AJ] == '70+'){
                                            $forthChildAgeGroup = 70;
                                        }else if($sheet_data[$i][AJ] == "" || $sheet_data[$i][AJ] == " "){
                                            $forthChildAgeGroup = "-";
                                        }
                                    }else{
                                        $forthChildAgeGroup = 9;
                                    }
                                    $child4 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $forthChildFN,
                                        'lname' => $forthChildLN,
                                        'month' => $forthChildMOB,
                                        'day' => $forthChildDOB,
                                        'age_group' => $forthChildAgeGroup,
                                        'gender' => $forthChildGender
                                    );
                                    $this->data->insert('children', $child4);
                                }
                                if(isset($sheet_data[$i][AK]) || $sheet_data[$i][AK] != null || $sheet_data[$i][AK] != '' || isset($sheet_data[$i][AL]) || $sheet_data[$i][AL] != null || $sheet_data[$i][AL] != ''){
                                    //Check for 5 Child First Name is blank or not
                                    if($sheet_data[$i][AK] != null || $sheet_data[$i][AK] != ''){
                                        $fifthChildFN = $sheet_data[$i][AK];
                                    }else{
                                        $fifthChildFN = '-';
                                    }
                                    //Check for 5 Child Last Name is blank or not
                                    if($sheet_data[$i][AL] != null || $sheet_data[$i][AL] != ''){
                                        $fifthChildLN = $sheet_data[$i][AL];
                                    }else{
                                        $fifthChildLN = '-';
                                    }
                                    //Check for 5 child gender is blank or not
                                    if($sheet_data[$i][AM] != null || $sheet_data[$i][AM] != ''){
                                        $fifthChildGender = $sheet_data[$i][AM];
                                    }else{
                                        $fifthChildGender = '-';
                                    }
                                    //Check for 5 Child Month of Birth is blank or not
                                    if($sheet_data[$i][AN] != null || $sheet_data[$i][AN] != ''){
                                        if($sheet_data[$i][AN] == 'January' || $sheet_data[$i][AN] == 'january' || $sheet_data[$i][AN] == 'Jan' || $sheet_data[$i][AN] == 'jan'){
                                            $fifthChildMOB = 1;
                                        }else if($sheet_data[$i][AN] == 'February' || $sheet_data[$i][AN] == 'february' || $sheet_data[$i][AN] == 'Feb' || $sheet_data[$i][AN] == 'feb'){
                                            $fifthChildMOB = 2;
                                        }else if($sheet_data[$i][AN] == 'March' || $sheet_data[$i][AN] == 'march' || $sheet_data[$i][AN] == 'Mar' || $sheet_data[$i][AN] == 'mar'){
                                            $fifthChildMOB = 3;
                                        }else if($sheet_data[$i][AN] == 'April' || $sheet_data[$i][AN] == 'april' || $sheet_data[$i][AN] == 'Apr' || $sheet_data[$i][AN] == 'apr'){
                                            $fifthChildMOB = 4;
                                        }else if($sheet_data[$i][AN] == 'May' || $sheet_data[$i][AN] == 'may' || $sheet_data[$i][AN] == 'May' || $sheet_data[$i][AN] == 'may'){
                                            $fifthChildMOB = 5;
                                        }else if($sheet_data[$i][AN] == 'June' || $sheet_data[$i][AN] == 'june' || $sheet_data[$i][AN] == 'Jun' || $sheet_data[$i][AN] == 'jun'){
                                            $fifthChildMOB = 6;
                                        }else if($sheet_data[$i][AN] == 'July' || $sheet_data[$i][AN] == 'july' || $sheet_data[$i][AN] == 'Jul' || $sheet_data[$i][AN] == 'jul'){
                                            $fifthChildMOB = 7;
                                        }else if($sheet_data[$i][AN] == 'August' || $sheet_data[$i][AN] == 'august' || $sheet_data[$i][AN] == 'Aug' || $sheet_data[$i][AN] == 'aug'){
                                            $fifthChildMOB = 8;
                                        }else if($sheet_data[$i][AN] == 'September' || $sheet_data[$i][AN] == 'september' || $sheet_data[$i][AN] == 'Sep' || $sheet_data[$i][AN] == 'sep'){
                                            $fifthChildMOB = 9;
                                        }else if($sheet_data[$i][AN] == 'October' || $sheet_data[$i][AN] == 'october' || $sheet_data[$i][AN] == 'Oct' || $sheet_data[$i][AN] == 'oct'){
                                            $fifthChildMOB = 10;
                                        }else if($sheet_data[$i][AN] == 'November' || $sheet_data[$i][AN] == 'november' || $sheet_data[$i][AN] == 'Nov' || $sheet_data[$i][AN] == 'nov'){
                                            $fifthChildMOB = 11;
                                        }else if($sheet_data[$i][AN] == 'December' || $sheet_data[$i][AN] == 'december' || $sheet_data[$i][AN] == 'Dec' || $sheet_data[$i][AN] == 'dec'){
                                            $fifthChildMOB = 12;
                                        }
                                    }else{
                                        $fifthChildMOB = 1;
                                    }
                                    //Check for 5 child day of birth is blank or not
                                    if($sheet_data[$i][AO] != null || $sheet_data[$i][AO] != ''){
                                        $fifthChildDOB = $sheet_data[$i][AO];
                                    }else{
                                        $fifthChildDOB = 1;
                                    }
                                    //Check for 5 child age group is blank or not
                                    if($sheet_data[$i][AP] != null || $sheet_data[$i][AP] != ''){
                                        if($sheet_data[$i][AP] == '0-9' || $sheet_data[$i][AP] == '0 - 9'){
                                            $fifthChildAgeGroup = 9;
                                        }else if($sheet_data[$i][AP] == '10-12' || $sheet_data[$i][AP] == '10 - 12'){
                                            $fifthChildAgeGroup = 12;
                                        }else if($sheet_data[$i][AP] == '13-18' || $sheet_data[$i][AP] == '13 - 18'){
                                            $fifthChildAgeGroup = 18;
                                        }else if($sheet_data[$i][AP] == '19-29' || $sheet_data[$i][AP] == '19 - 29'){
                                            $fifthChildAgeGroup = 29;
                                        }else if($sheet_data[$i][AP] == '30-39' || $sheet_data[$i][AP] == '30 - 39'){
                                            $fifthChildAgeGroup = 39;
                                        }else if($sheet_data[$i][AP] == '40-49' || $sheet_data[$i][AP] == '40 - 49'){
                                            $fifthChildAgeGroup = 49;
                                        }else if($sheet_data[$i][AP] == '50-69' || $sheet_data[$i][AP] == '50 - 69'){
                                            $fifthChildAgeGroup = 69;
                                        }else if($sheet_data[$i][AP] == 'Above 70' || $sheet_data[$i][AP] == 'Above70' || $sheet_data[$i][AP] == '70+'){
                                            $fifthChildAgeGroup = 70;
                                        }else if($sheet_data[$i][AP] == "" || $sheet_data[$i][AP] == " "){
                                            $fifthChildAgeGroup = "-";
                                        }
                                    }else{
                                        $fifthChildAgeGroup = 9;
                                    }
                                    $child5 = array(
                                        'parent_id' => $parent_id,
                                        'fname' => $fifthChildFN,
                                        'lname' => $fifthChildLN,
                                        'month' => $fifthChildMOB,
                                        'day' => $fifthChildDOB,
                                        'age_group' => $fifthChildAgeGroup,
                                        'gender' => $fifthChildGender
                                    );
                                    $this->data->insert('children', $child5);
                                }
                            }else{
                                $this->session->set_userdata("msg","Insufficient SMS Credit Please Topup.");
                            }
                        }
                    $j++;
                    $totalMember = count($sheet_data) - 2;
                    $this->session->set_userdata("msg","The total members account created is {$j} out of {$totalMember}.");
                    
                }
            }else{
                $this->session->set_userdata("msg","Please select a valid excel file to upload.");
            }
            header("Location: view/manage_users");
        }
        
        public function markAttendance() {
                $data = $this->input->post();
                if($data['droppedBy'] == 'others'){
                    $droppedBy = $data['dropeeName'];
                }else{
                    $droppedBy = $data['droppedBy'];
                }
                $attendanceRecord = $this->data->fetch('markAttendance', array('date' => date('Y-m-d', strtotime($data['attendanceDate'])), 'childId' => $data['childId']));
                if(count($attendanceRecord) > 0){
                    echo 'You are already time in to the school.';
                }else{
                    $attendance = array(
                        'childId'   =>  $data['childId'],
                        'date'      =>  date('Y-m-d', strtotime($data['attendanceDate'])),
                        'droppedBy' =>  $droppedBy,
                        'inTime'    =>  date('H:i:s'),
                        'classId'   =>  $data['classId'],
                        'teacherId' =>  $data['teacherId'],
                        // 'teacherRemark' =>  $data['teacherRemark']
                    );
                    $this->data->insert('markAttendance', $attendance);
                    $childDetail = $this->data->fetch('children', array('id' => $data['childId']));
                    $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
                    $msg = "Your child ".$childDetail[0]['fname']." has been dropped by ".$droppedBy." on the".date('d-M-Y')." at ".date('H:i:s');
                    $this->sendSMS1('RCCGVHL', $parentData[0]['mobileNo'], $msg);
                    echo "Timein Successfully.";
                // redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }
        }
        
        public function editContentChild() {
            $data = $this->input->post();
            $attendanceId = $data['attendanceId'];
            $this->data->update(array('id' => $attendanceId), 'markAttendance', array('teacherRemark' => $data['teacherRemark'], 'teacherId' => $data['teacherId']));
            echo "Detail Edited Successfully.";
        }
        
        public function markPerformance() {
            $data = $this->input->post();
            $attendanceId = $data['attendanceId'];
            $this->data->update(array('id' => $attendanceId), 'markAttendance', array('performance' => $data['performance'], 'behaviour' => $data['behaviour']));
            echo 'Performance Saved Successfully.';
        }
        
        public function deleteAttendance($date, $childId, $id) {
            $this->data->delete(array('date' => $date, 'childId' => $childId, 'classId' => $id), 'markAttendance');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        
        public function markAttendanceLogout() {
        $check = $this->session->userdata('userAdmin');
        if(!empty($check)) {
            $data = $this->input->post();
            $childId = $data['childOutId'];
            $date = date('Y-m-d', strtotime($data['attendanceDate']));
            if($data['pickedBy'] == 'others'){
                $pickedBy = $data['pickedName'];
            }else{
                $pickedBy = $data['pickedBy'];
            }
            $attendanceRecord = $this->data->fetch('markAttendance', array('date' => date('Y-m-d', strtotime($date)), 'childId' => $childId));
            if(count($attendanceRecord) > 0){
                $this->data->update(array('id' => $attendanceRecord[0]['id']), 'markAttendance', array('outTime' => date('H:i:s'), 'pickedBy' => $pickedBy));
                $childDetail = $this->data->fetch('children', array('id' => $data['childOutId']));
                $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
                $msg = "Your child ".$childDetail[0]['fname']." has been picked by ".$pickedBy." on the ".date('d-M-Y')." at ".date('H:i:s');
                $this->sendSMS1('RCCGVHL', $parentData[0]['mobileNo'], $msg);
                echo "Timeout Successfully.";
            }else{
                echo 'You have not time in.';
            }
            // redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
        
        public function testemail(){

        $this->load->library('email');
        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'mail.mmsapp.org';
        $config['smtp_user'] = 'no_reply@mmsapp.org';
        $config['smtp_pass'] = 'FemiAdeko01@';
        $config['smtp_port'] = 465;
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from('no_reply@mmsapp.org', 'RCCG Victory House');
        $this->email->to('abhishek.shrivastava1987@gmail.com');
        $this->email->subject('hi waqas');
        $this->email->message('Message');
        if($this->email->send()) {
            //echo 'Sent';
        } else {
            //$this->email->print_debugger();
        }

    }
    
        public function emailTest(){
            $this->load->library('email');

            $config['protocol']    = 'mail';
            
            $config['smtp_host']    = 'mail.mmsapp.org';
            
            $config['smtp_port']    = '465';
            
            $config['smtp_timeout'] = '30';
            
            $config['smtp_user']    = 'no_reply@mmsapp.org';
            
            $config['smtp_pass']    = 'FemiAdeko01@';
            
            $config['charset']    = 'utf-8';
            
            $config['newline']    = "\r\n";
            
            $config['mailtype'] = 'html'; // or html
            
            $config['validation'] = TRUE; // bool whether to validate email or not      
            
            $this->email->initialize($config);
            
            
            $this->email->from('no_reply@mmsapp.org', 'RCCG Victory House');
            $this->email->to('abhishek@praagalbhya.com'); 
            
            
            $this->email->subject('Email Test');
            
            $this->email->message('Testing the email class.');  
            
            $this->email->send();
            
            echo $this->email->print_debugger();
        }
        
        public function emailSub(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data = $this->input->post();
                if($data['emailSub']){
                    $sqlDetails = "UPDATE `details` SET `emailSub`='".$data['emailSub']."'";
                    $this->data->myquery("UPDATE `details` SET `emailSub`='".$data['emailSub']."'");
                    // $this->data->myquery("UPDATE `member` SET `emailSub`='".$data['emailSub']."'");
                }else{
                    $sqlDetails = "UPDATE `details` SET `emailSub`='".$data['emailSub']."'";
                    $this->data->myquery("UPDATE `details` SET `emailSub`='".$data['emailSub']."'");
                    $this->data->myquery("UPDATE `member` SET `emailSub`='".$data['emailSub']."'");
                }
            }
        }
        
        function randomPassword() {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }
        
        public function doRegister() {
            $data = $this->input->post();
            $cemail = $this->data->fetch('member', array('mobileNo' => $data['mobileNo'], 'status' => 'active'));
            if(empty($cemail)) {
                $usernameCreate = $this->data->fetch("member", array('fname' => $data['fname'], 'lname' => $data['lname'], 'status' => 'active'));
                if(count($usernameCreate)){
                    $username = lcfirst($data['fname'])."".lcfirst($data['lname'])."".count($usernameCreate);
                }else{
                    $username = lcfirst($data['fname'])."".lcfirst($data['lname']);
                }
                $data['username'] = preg_replace('/\s+/', '', strtolower($username));
                $data1['child'] = $data['child'];
                $data1['grandChild'] = $data['grandChild'];
                $data['child'] = isset($data['child']) ? json_encode($data['child']) : "";
                $data['grandChild'] = isset($data['grandChild']) ? json_encode($data['grandChild']) : "";
                if(!empty($data['cGroupField'])){
                    $this->data->insert("churchgroup",array("name"=>$data['cGroupField']));
                }
                if(!empty($data['bgroupField'])){
                    $this->data->insert("businessgroup",array('name'=>$data['bgroupField']));
                }
                $groups = $data['groups'];
                unset($data['bgroupField']);
                unset($data['cGroupField']);
                unset($data['employementField']);
                unset($data['groups']);
                $data['image'] = '';
                if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                    $x = $this->do_upload($_FILES);
                    if(isset($x['upload_data'])){
                        $data['image'] = $x['upload_data']['file_name'];
                    }
                }else{
                    if($data['gander'] == 'male'){
                        $data['image'] == 'male.jpg';
                    }else{
                        $data['image'] == 'female.jpg';
                    }
                }
                $password = $this->randomPassword();
                $data['password'] = $password;
                if($data['first_time'] == 'yes') {
                    $data['firstTimerMemberFlag'] = 1;
                    $data['registrationEmail'] = "1";
                }
                $this->data->insert("member",$data);
                $parentId = $this->db->insert_id();
                if(isset($data1['child'])){
                        foreach($data1['child'] as $child){
                            $child['relation'] = "child";
                            $child['parent_id'] = $parentId;
                            $this->data->insert("children",$child);
                        }
                    }
                    if(isset($data1['grandChild'])){
                        foreach($data1['grandChild'] as $child){
                            $child['relation'] = "grand";
                            $child['parent_id'] = $parentId;
                            $this->data->insert("children",$child);
                        }
                    }
                $check = $this->data->fetch("member",array("email"=>$data['email'],'password'=>$data['password'], 'status' => 'active'));
                if(!empty($check)){
                    $x = array();
                    $x['user_id'] = $check[0]['id'];
                    $x['title'] = $data['fname'] . " " . $data['lname'];
                    $x['about'] = $data['biography'];
                    $x['email'] = $data['email'];
                    $x['phone'] = $data['mobileNo'];
                    $this->data->insert("business",$x);
                }
                if($data['first_time'] == 'yes') {
                    $activationLink = site_url()."/admin/activationLink/".$parentId;
                    $msg1 = "Dear ".$data['fname']." , Thank you for visiting our church, may God almighty make you experience great grace. Due to GDPR compliance we would like you to click on this link ".$activationLink." to allow us keep your information, send you church updates, and also grant you access to our app. Shalom, Pastor Leke Sanusi.";
                    $this->sendSMS1("RCCGVHL", $data['mobileNo'], $msg1);
                    $sms = array(
                        'msg' => $msg1,
                        'to' => $data['fname']." ".$data['lname'],
                        'toId' => $parentId,
                        'sentSMSCount' => 3
                    );
                    $this->data->insert('sms', $sms);
                    $this->session->set_userdata("msg","Member Registered");
                }else{
                    $msg1 = "Dear ".$data['fname'].", you have just been added to RCCGVHL system. See your login details: https://rccgvhl.mmsapp.org Username: ".$data['username']." Password: ".$data['password']." Please login to update your details and to enjoy all it’s benefits. Shalom. Pastor Leke.";
                    $this->sendSMS1("RCCGVHL", $data['mobileNo'], $msg1);
                    $sms = array(
                        'msg' => 'SMS Sent for Registration.',
                        'to' => $data['fname']." ".$data['lname'],
                        'toId' => $parentId,
                        'sentSMSCount' => 3
                    );
                    $this->data->insert('sms', $sms);
                    $this->session->set_userdata("msg","Member Registered");
                }
                ?>
                <script>
                 setTimeout(function(){
                        window.location.href = "<?= site_url('admin/view/manage_users') ?>";
                    },50);
             </script>
             <?php
            }else{
                $this->session->set_userdata("msg","Mobile Number Already Registered");
            }
            header("Location: view/manage_users");
        }
        
        public function moveMember($id) {
            $this->data->update(array('id' => $id), 'member', array('first_time' => 'no', 'registrationEmail' => '0'));
            $user = $this->data->fetch('member', array('id' => $id, 'status' => 'active'));
            $mobileNo = $user[0]['mobileNo'];
            $msg1 = "Dear ".$user[0]['fname'].", you have just been added to RCCGVHL system. See your login details: https://rccgvhl.mmsapp.org Username: ".$user[0]['username']." Password: ".$user[0]['password']." Please login to update your details and to enjoy all it’s benefits. Shalom. Pastor Leke.";
            $this->sendSMS1("RCCGVHL", $mobileNo, $msg1);
            $sms = array(
                'msg' => 'SMS Sent for Registration.',
                'to' => $data['fname']." ".$data['lname'],
                'toId' => $id,
                'sentSMSCount' => 3
            );
            $this->data->insert('sms', $sms);
            $this->session->set_userdata("msg","First timer ".$user[0]['fname']." is now member of church.");
            ?>
            <script>
                 setTimeout(function(){
                        window.location.href = "<?= site_url('admin/view/manage_users') ?>";
                    },5);
             </script>
             <?php
        }
        
        public function makeMember1($id, $red = NULL){
            $data = $this->input->post();
            $this->data->update(array('id' => $id), 'member', array('firstTimerMemberFlag' => '0'));
            if(empty($red)){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function makeMember()
        {
            $data = $this->input->post();
            $this->data->update(array('id' => $data['id']), 'member', array('first_time' => $data['first_time'], 'registrationEmail' => $data['registrationEmail']));
            $user = $this->data->fetch('member', array('id' => $data['id'], 'status' => 'active'));
            $mobileNo = $user[0]['mobileNo'];
            $msg1 = "Dear ".$user[0]['fname'].", you have just been added to RCCGVHL system. See your login details: https://rccgvhl.mmsapp.org Username: ".$user[0]['username']." Password: ".$user[0]['password']." Please login to update your details and to enjoy all it’s benefits. Shalom. Pastor Leke.";
            $this->sendSMS1("RCCGVHL", $mobileNo, $msg1);
            $sms = array(
                'msg' => 'SMS Sent for Registration.',
                'to' => $user[0]['fname']." ".$user[0]['lname'],
                'toId' => $user[0]['id'],
                'sentSMSCount' => 3
            );
            $this->data->insert('sms', $sms);
            $this->session->set_userdata("msg","First timer ".$user[0]['fname']." is now member of church.");
            ?>
            <script>
                 setTimeout(function(){
                        window.location.href = "<?= site_url('admin/view/manage_users') ?>";
                    },5);
             </script>
             <?php
        }
        
        public function activationLink($id) {
            $user = $this->data->fetch('member', array('id' => $id, 'status' => 'active'));
            if($user[0]['first_time'] == 'yes'){
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
            <script>
                $(document).ready(function () {
                    setTimeout(function () {
                        swal({
                        //   title: 'Do you want to become member?',
                          text: "Would you like our church to keep your information to get regular update from us?",
                          type: 'info',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes',
                          cancelButtonText: 'No',
                          showCloseButton: true
                        }).then((result) => {
                          if (result.value) {
                              $.ajax({
                                url: "<?= site_url('admin') ?>/makeMember",
                                type: "POST",
                                data: {id: <?= $id ?>, first_time: 'no', registrationEmail: '0'},
                                success: function(e){
                                    swal(
                                      'Congratulations!',
                                      'Shalom, you are now a member of this church.',
                                      'success'
                                    ).then((result) => {
                                        if(result.value){
                                            window.location.href="<?= base_url() ?>home";
                                        }
                                    });
                                }
                            });
                          }else{
                              if(result.dismiss == 'cancel'){
                                  $.ajax({
                                    url: "<?= site_url('admin') ?>/deleteMember1",
                                    type: "POST",
                                    data: {id: <?= $id ?>},
                                    success: function(e){
                                        console.log(e);
                                        swal(
                                              'Cancel',
                                              'Dear <?= $user[0]['fname'] ?>, <br/>We can confirm to you that your information is no longer on our system.<br/>Thank you. <br/>Administrator',
                                              'warning'
                                          ).then((result) => {
                                              if(result.value){
                                                window.location.href="<?= base_url() ?>home";
                                              }
                                          });
                                    }
                                });
                              }else{
                                  swal({
                                        title: 'Cancel',
                                        text: 'Dear <?= $user[0]['fname'] ?>, <br/>We can confirm to you that your information is no longer on our system.<br/>Thank you. <br/>Administrator',
                                        type: 'warning'
                                    }).then((result) => {
                                        if(result.value) {
                                            
                                        }
                                    });
                              }
                          }
                        });
                    }, 100);
                });
            </script>
            <?php
            }else{
            ?>
            <script>
                alert('Link is already used, you can\'t use the same link.');
                window.location.href="<?= base_url() ?>home";
            </script>
            <?php
            }
        }
        
        public function deleteMember1()
        {
            $data = $this->input->post();
            $this->data->update(array("id" => $data['id']), "member", array("status" => "suspend", "permanentDelete" => "1"));
            print_r($this->db->last_query());
        }
        
        public function checkAccess($pageName){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data['userAdmin'] = $check;
                $access = ($check[0]['access'] != NULL) ? json_decode($check[0]['access'],true) : "admin";
                if($pageName == "create_code" OR $pageName == "manage_codes"){
                    return true;
                }else if((($pageName == "manage_ftimer" OR $pageName == "create_users" OR $pageName == 'edit_member' OR $pageName == "manage_users" OR $pageName == "suspend_users" OR $pageName == "delete_users" OR $pageName == 'viewMempacasGroup' OR $pageName == 'urgentAttention') AND isset($access['members']))){
                    return true;
                }else if((($pageName == "manage_donations" OR $pageName == "view_offerings" OR $pageName == "view_tithes") AND isset($access['donations']))){
                    return true;
                }else if((($pageName == "prepare_word" OR $pageName == "view_word") AND isset($access['updates']))){
                    return true;
                }else if((($pageName == "manage_reviews" OR $pageName == "view_reviews") AND isset($access['reviews']))){
                    return true;
                }else if((($pageName == "chat_member") AND isset($access['messages']))){
                    return true;
                }else if((($pageName == "manage_cGroups" OR $pageName == "manage_bGroups" OR $pageName == "add_group") AND isset($access['groups']))){
                    return true;
                }else if((($pageName == "pastors_diary") AND isset($access['pastors']))){
                    return true;
                }else if((($pageName == "settings" OR $pageName == "msgsettings") AND isset($access['settings']))){
                    return true;
                }elseif($pageName == "chat_admin" OR $pageName == "admin_chat"){
                    return true;
                }else if($pageName == "live"){
                    return true;
                }else if($pageName == "view_word" OR $pageName == "prepare_word"){
                    return true;
                }else if($pageName == "create_bulletin" OR $pageName == "view_bulletin"){
                    return true;
                }else if($pageName == "bookstore" OR $pageName == "add_book"){
                    return true;
                }else if($pageName == "view_gave_life" OR $pageName == "add_lgtc"){
                    return true;
                }else if($pageName == 'advert'){
                    return true;
                }else if($pageName == 'attendance' OR $pageName == 'add_attendance'){
                    return true;
                }else if($pageName == 'view_report' AND isset($access['reports'])){
                    return true;
                }else if(isset($access['sendSMS'])){
                    return true;
                }else if(isset($access['sendEmail'])){
                    return true;
                }else if(isset($access['mempacas']) ){
                    return true;
                }
            }
            return false;
        }
        
        //New Function Added By Abhishek Shrivastava
        public function manage_group_activity(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data['userAdmin'] = $check;
                $data['groups'] = $this->data->fetch('churchgroup');
                $this->load->view('back/header', $data);
                $this->load->view('back/manage_group_activity', $data);
                $this->load->view('back/footer');
            }else{
                $this->login();
            }
        }
        
        public function view_members($id){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data['userAdmin'] = $check;
                $data['groupMembers'] = $this->data->fetch('membgroup', array('g_id' => $id));
                $this->load->view('back/header', $data);
                $this->load->view('back/manage_view_members', $data);
                $this->load->view('back/footer');
            }else{
                $this->login();
            }
        }
        
        public function editCalEvent($id){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data['userAdmin']=$check;
                $data['reminderEvent'] = $this->data->fetch('reminders', array('event_id' => $id));
                $data['reminderDesc'] = $this->data->fetch('reminderDescription', array('eventId' => $id));
                $this->load->view('back/header', $data);
                $this->load->view('back/editCalEvent');
                $this->load->view('back/footer');
            }
        }
        
        public function viewCalEvent($id){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data['userAdmin'] = $check;
                $data['reminderEvent'] = $this->data->fetch('reminders', array('event_id' => $id));
                $data['reminderDesc'] = $this->data->fetch('reminderDescription', array('eventId' => $id));
                $this->load->view('back/header', $data);
                $this->load->view('back/viewCalEvent');
                $this->load->view('back/footer');
            }
        }
        
        
        
        public function fetchCalendar(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data['userAdmin']=$check;
                // $data['calendar'] = $this->data->fetch('reminders', array('adminId' => "1"));
                $data['calendar'] = $this->data->myquery("SELECT * FROM `reminders` WHERE adminId = 1");
                $this->load->view('back/header', $data);
                $this->load->view('back/manage_calendar');
                $this->load->view('back/footer');
            }else{
                $this->login();
            }
        }
        
        public function addEvent(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                
            }
        }
        
        public function read_email($id) {
            $check = $this->session->userdata('userAdmin');
            $page_name = "read_email";
            // if(!empty($check)){
                $data['userAdmin'] = $check;
                if(!empty($id)){
                    $data['bulletin'] = $this->data->fetch("email",array('id'=>$id));
                    $x = $this->data->myquery("select * from `email` where `id` = (select min(`id`) from `email` where id > {$id})");
                    $p = $this->data->myquery("select * from `email` where `id` = (select max(`id`) from `email` where id < {$id})");
                    if(empty($data['bulletin'])){
                        $page_name = "index";
                    }else{
                        $data['bulletin'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['bulletin'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                        //var_dump($data['bulletin']);die;
                    }
                }else{
                    $page_name = "index";
                }
                rsort($data['bulletin']);
                $this->load->view('back/header', $data);
                $this->load->view('back/' . $page_name, $data);
                $this->load->view('back/footer');
        }
        
        public function view_mempacas_group($id) {
            $check = $this->session->userdata('userAdmin');
            $page_name = 'viewMempacasGroup';
            if($data['userAdmin'][0]['access'] != "admin"){
                    $x = $this->checkAccess($page_name);
                    if($x == false){
                        $page_name = "index";
                    }
                }
            $data['userAdmin'] = $check;
            if(!empty($id)) {
                $data['mempacasGroup'] = $this->data->fetch('mempacasGroup', array('id' => $id));
                $data['mempacasGroup'][0]['count'] = $this->data->myquery("SELECT count(*) as total FROM `mempacasGroup`");
                $x = $this->data->myquery("select * from `mempacasGroup` where `id` = (select min(`id`) from `mempacasGroup` where id > {$id})");
                $p = $this->data->myquery("select * from `mempacasGroup` where `id` = (select max(`id`) from `mempacasGroup` where id < {$id})");
                if(empty($data['mempacasGroup'])){
                    $page_name = "index";
                }else{
                    $data['mempacasGroup'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                    $data['mempacasGroup'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                        //var_dump($data['bulletin']);die;
                }
            }else{
                $page_name = "index";
            }
            rsort($data['mempacasGroup']);
            $this->load->view('back/header', $data);
            $this->load->view('back/' . $page_name, $data);
            $this->load->view('back/footer');
        }
        
        public function urgentAttention($id) {
            $check = $this->session->userdata('userAdmin');
            $page_name = 'urgentAttention';
            if($data['userAdmin'][0]['access'] != "admin"){
                    $x = $this->checkAccess($page_name);
                    if($x == false){
                        $page_name = "index";
                    }
                }
            $data['userAdmin'] = $check;
            if(!empty($id)) {
                $data['mempacasGroup'] = $this->data->fetch('mempacasGroup', array('id' => $id));
                $data['mempacasGroup'][0]['count'] = $this->data->myquery("SELECT count(*) as total FROM `mempacasGroup`");
                $x = $this->data->myquery("select * from `mempacasGroup` where `id` = (select min(`id`) from `mempacasGroup` where id > {$id})");
                $p = $this->data->myquery("select * from `mempacasGroup` where `id` = (select max(`id`) from `mempacasGroup` where id < {$id})");
                if(empty($data['mempacasGroup'])){
                    $page_name = "index";
                }else{
                    $data['mempacasGroup'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                    $data['mempacasGroup'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                        //var_dump($data['bulletin']);die;
                }
            }else{
                $page_name = "index";
            }
            rsort($data['mempacasGroup']);
            $this->load->view('back/header', $data);
            $this->load->view('back/' . $page_name, $data);
            $this->load->view('back/footer');
        }
        
        public function read_bulletin($id){
            // $check = $this->session->userdata('userAdmin');
            $page_name = "read_bulletin";
            // if(!empty($check)){
                $data['userAdmin'] = $check;
                if(!empty($id)){
                    $data['bulletin'] = $this->data->fetch("bulletin",array('id'=>$id));
                    $x = $this->data->myquery("select * from `bulletin` where `id` = (select min(`id`) from `bulletin` where id > {$id})");
                    $p = $this->data->myquery("select * from `bulletin` where `id` = (select max(`id`) from `bulletin` where id < {$id})");
                    if(empty($data['bulletin'])){
                        $page_name = "index";
                    }else{
                        $data['bulletin'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['bulletin'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                        //var_dump($data['bulletin']);die;
                    }
                }else{
                    $page_name = "index";
                }
                rsort($data['bulletin']);
                $this->load->view('back/header', $data);
                $this->load->view('back/' . $page_name, $data);
                $this->load->view('back/footer');
           
        }
        
        public function saveAdminEvent(){
            $this->load->library('m_pdf');
            $data['adminEvent'] = $this->data->fetch('reminders', array('adminId' => "1"));
            $html = $this->load->view('pdf/pdfAdminEvent', $data, true);
            $html .= $this->load->view('back/footer', true);
            $pdfFilePath = "AdminEvent-".time().".pdf";
            $pdf = $this->m_pdf->load();
            $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
            $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html, 2);
            $pdf->WriteHTML($footer, 4);
            $pdf->Output($pdfFilePath, "D");
            exit();
        }
        
        public function topup($id){
            $smsTopup = $this->data->fetch('smsTopupTable', array('id' => $id));
            $bucket1 = $this->data->fetch('bucket');
            $sms = $this->data->myquery("SELECT SUM(`sentSMSCount`) as count FROM `sms` WHERE 1");
            $bucket = $bucket1[0]['qty'] - $sms[0]['count'];
            $newBal = $bucket1[0]['qty'] + $smsTopup[0]['smsCreditBlock'];
            $price = $smsTopup[0]['totalPrice'];
            $this->load->library('paypal_admin');
            $returnURL = site_url('admin') . '/success'; //payment success url
    		$cancelURL = site_url('admin') . '/cancel'; //payment cancel url
    		$notifyURL = site_url('admin').'/ipn'; //ipn url
    		$this->session->set_userdata("qty", $newBal);
    		$this->session->set_userdata('topupAmount', $smsTopup[0]['totalPrice']);
    		$this->session->set_userdata('smsBlock', $smsTopup[0]['smsCreditBlock']);
    		$this->session->set_userdata('bktid', $bucket1[0]['id']);
    		$userId = $check[0]['id'];
    		$this->paypal_admin->add_field('return', $returnURL);
    		$this->paypal_admin->add_field('cancel_return', $cancelURL);
    		$this->paypal_admin->add_field('notify_url', $notifyURL);
    		$this->paypal_admin->add_field('item_name', 'SMS Topup');
    		$this->paypal_admin->add_field('custom', $userID);
    		$this->paypal_admin->add_field('item_number',  $smsTopup[0]['id']);
    		$this->paypal_admin->add_field('amount',  $price);
    		
    		// Load paypal form
    		$this->paypal_admin->paypal_auto_form();
        }
        
        public function success(){
            $check = $this->session->userdata("userAdmin");
            $amount = $this->session->userdata("qty");
            $bktId = $this->session->userdata('bktid');
            $topupAmount = $this->session->userdata('topupAmount');
            $smsBlock = $this->session->userdata('smsBlock');
            // if (!empty($check)){
                // $a['user_id'] = $check[0]['id'];
                $a['qty'] = $amount;
                $b['topupBy'] = $check[0]['id'];
                $b['topupAmount'] = $topupAmount;
                $b['smsBlock'] = $smsBlock;
                $this->data->insert('topupHistory', $b);
                $this->data->update(array("id" => $bktId), "bucket", $a);
                $this->session->unset_userdata("qty");
                $bktId = $this->session->unset_userdata('bktid');
            // }
            echo "<script>alert('Thank you for your topup.')</script>";
            echo "<script>window.location.href = '".site_url('/admin')."'; </script>";
            //redirect("home/", "refresh");
        }
        
        public function cancel(){
            echo "<script>alert('Purchase Cancelled.')</script>";
            echo "<script>window.location.href = '".site_url('/admin')."'; </script>";
        }
        
        public function saveEventAttendee(){
            $this->load->library('m_pdf');
            $data['attendee'] = $this->data->fetch('eventAttendance', array('adminId' => "1"));
            $data['attending'] = $this->data->fetch('eventAttendance', array('event_id' => $dataR, 'adminId' => "1", 'eventAttending' => "1"));
            $html = $this->load->view('pdf/eventAttendee', $data, true);
            $html .= $this->load->view('back/footer', true);
            $pdfFilePath = "EventAttendee-".time().".pdf";
            $pdf = $this->m_pdf->load();
            $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
            $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html, 2);
            $pdf->WriteHTML($footer, 4);
            $pdf->Output($pdfFilePath, "D");
            exit();
        }
        
        public function save_pdf1(){ 
    		//load mPDF library
    		$this->load->library('m_pdf'); 
    		//now pass the data//
    		$data['memberData'] = $this->Pdf->memberList();
    		$html=$this->load->view('pdf/pdf',$data, true);//load the pdf.php by passing our data and get all data in $html varriable.
    		$html.=$this->load->view('back/footer', true);
    		$pdfFilePath ="member_list-".time().".pdf";		
    		//actually, you can pass mPDF parameter on this load() function
    		$pdf = $this->m_pdf->load();
    		//generate the PDF!
    		$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
    		// apply external css
    		$pdf->WriteHTML($stylesheet,1);
    		$pdf->WriteHTML($html,2);
    		$pdf->WriteHTML($footer,4);
    		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
    		$pdf->Output($pdfFilePath, "D");
    		exit;
    	}
    	
    	public function save_suspend_pdf(){
    	    $this->load->library('m_pdf');
    	    $data['memberData'] = $this->data->fetch('member', array('status' => 'suspend', 'permanentDelete' => '0'));
    	    $data['countMember'] = count($data['memberData']);
    	    $html = $this->load->view('pdf/pdf', $data, true);
    	    $pdfFilePath ="member_list-".time().".pdf";		
        	$pdf = $this->m_pdf->load('c', 'A4');
        	$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        	$pdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
            // $pdf->WriteHTML($stylesheet, 1);
            $pdf->SetDisplayMode('fullpage');
            $pdf->list_indent_first_level = 0;
            $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
            $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit;
    	}
    	
    	public function save_delete_pdf(){
    	    $this->load->library('m_pdf');
    	    $data['memberData'] = $this->data->fetch('member', array('status' => 'suspend', 'permanentDelete' => '1'));
    	    $data['countMember'] = count($data['memberData']);
    	    $html = $this->load->view('pdf/pdf', $data, true);
    	    $pdfFilePath ="member_list-".time().".pdf";		
        	$pdf = $this->m_pdf->load('c', 'A4');
        	$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        	$pdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
            // $pdf->WriteHTML($stylesheet, 1);
            $pdf->SetDisplayMode('fullpage');
            $pdf->list_indent_first_level = 0;
            $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
            $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit;
    	}
    	
    	public function save_pdf(){
    	    $this->load->library('m_pdf');
    	    $data['memberData'] = $this->Pdf->memberList();
    	    $data['countMember'] = count($data['memberData']);
    	    $html = $this->load->view('pdf/pdf', $data, true);
    	    $pdfFilePath ="member_list-".time().".pdf";		
        	$pdf = $this->m_pdf->load('c', 'A4');
        	$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        	$pdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
            // $pdf->WriteHTML($stylesheet, 1);
            $pdf->SetDisplayMode('fullpage');
            $pdf->list_indent_first_level = 0;
            $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
            $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit;
    	}
    	
    	public function save_notification_pdf($module)
    	{
    	    if($module == 'prayerRequest')
    	    {
    	        $this->load->library('m_pdf');
    	        $data['prayerRequest'] = $this->data->myquery("SELECT * FROM `p_request` ORDER BY date DESC");
    	        foreach($data['prayerRequest'] as $k=>$val){
                    $x = $this->data->fetch("member",array("id"=>$val['user_id'], 'status' => 'active'));
                    $data['prayerRequest'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                }
    	        $data['countRequest'] = count($data['prayerRequest']);
    	        $html = $this->load->view('pdf/notification/prayerRequest', $data, true);
    	        $pdfFilePath = "PrayerRequest-".time().".pdf";
    	        $pdf = $this->m_pdf->load('c', 'A4');
    	        $pdf->AddPage('p',
    	            '', '', '', '',
    	            5,
    	            5,
    	            5,
    	            5,
    	            10,
    	            10
    	        );
    	        $pdf->SetDisplayMode('fullpage');
    	        $pdf->list_indent_first_level = 0;
                $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
                $pdf->WriteHTML($stylesheet, 1);
                $pdf->WriteHTML($html);
                $pdf->Output($pdfFilePath, "D");
                exit;
    	    }
    	    
    	    if($module == 'groupActivity')
    	    {
    	        $this->load->library('m_pdf');
    	        $data['groups'] = $this->data->myquery("SELECT * FROM `churchgroup` order by name ASC");
    	        $data['countRequest'] = count($data['groups']);
    	        $html = $this->load->view('pdf/notification/groupsActivity', $data, true);
    	        $pdfFilePath = "GroupActivity-".time().".pdf";
    	        $pdf = $this->m_pdf->load('c', 'A4');
    	        $pdf->AddPage('p',
    	            '', '', '', '',
    	            5,
    	            5,
    	            5,
    	            5,
    	            10,
    	            10
    	        );
    	        $pdf->SetDisplayMode('fullpage');
    	        $pdf->list_indent_first_level = 0;
                $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
                $pdf->WriteHTML($stylesheet, 1);
                $pdf->WriteHTML($html);
                $pdf->Output($pdfFilePath, "D");
                exit;
    	    }
    	    
    	    if($module == 'testimonies')
    	    {
    	        $this->load->library('m_pdf');
    	        $data['testimonies']=$this->data->fetch("testimonies");
                foreach($data['testimonies'] as $k=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['testimonies'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                }
                $data['countRequest'] = count($data['testimonies']);
    	        $html = $this->load->view('pdf/notification/testimonies', $data, true);
    	        $pdfFilePath = "Testimonies-".time().".pdf";
    	        $pdf = $this->m_pdf->load('c', 'A4');
    	        $pdf->AddPage('p',
    	            '', '', '', '',
    	            5,
    	            5,
    	            5,
    	            5,
    	            10,
    	            10
    	        );
    	        $pdf->SetDisplayMode('fullpage');
    	        $pdf->list_indent_first_level = 0;
                $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
                $pdf->WriteHTML($stylesheet, 1);
                $pdf->WriteHTML($html);
                $pdf->Output($pdfFilePath, "D");
                exit;
    	    }
    	}
    	
    	public function save_notification_pdf_basedon_date($module, $fromDate, $toDate)
    	{
    	    if($module == 'prayerRequest')
    	    {
    	        $this->load->library('m_pdf');
    	        $toDate = date('Y-m-d', strtotime($toDate.'+1 day'));
    	        $data['prayerRequest'] = $this->data->myquery("SELECT * FROM `p_request` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
    	        foreach($data['prayerRequest'] as $k=>$val){
                    $x = $this->data->fetch("member",array("id"=>$val['user_id'], 'status' => 'active'));
                    $data['prayerRequest'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                }
    	        $data['countRequest'] = count($data['prayerRequest']);
    	        $html = $this->load->view('pdf/notification/prayerRequest', $data, true);
    	        $pdfFilePath = "PrayerRequest-".time().".pdf";
    	        $pdf = $this->m_pdf->load('c', 'A4');
    	        $pdf->AddPage('p',
    	            '', '', '', '',
    	            5,
    	            5,
    	            5,
    	            5,
    	            10,
    	            10
    	        );
    	        $pdf->SetDisplayMode('fullpage');
    	        $pdf->list_indent_first_level = 0;
                $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
                $pdf->WriteHTML($stylesheet, 1);
                $pdf->WriteHTML($html);
                $pdf->Output($pdfFilePath, "D");
                exit;
    	    }
    	    
    	    if($module == 'testimonies')
    	    {
    	        $this->load->library('m_pdf');
    	        $toDate = date('Y-m-d', strtotime($toDate.'+1 day'));
    	        $data['testimonies'] = $this->data->myquery("SELECT * FROM `testimonies` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
    	        foreach($data['testimonies'] as $k=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['testimonies'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                }
    	        $data['countRequest'] = count($data['prayerRequest']);
    	        $html = $this->load->view('pdf/notification/testimonies', $data, true);
    	        $pdfFilePath = "Testimonies-".time().".pdf";
    	        $pdf = $this->m_pdf->load('c', 'A4');
    	        $pdf->AddPage('p',
    	            '', '', '', '',
    	            5,
    	            5,
    	            5,
    	            5,
    	            10,
    	            10
    	        );
    	        $pdf->SetDisplayMode('fullpage');
    	        $pdf->list_indent_first_level = 0;
                $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
                $pdf->WriteHTML($stylesheet, 1);
                $pdf->WriteHTML($html);
                $pdf->Output($pdfFilePath, "D");
                exit;
    	    }
    	    
    	    if($module == 'groupActivity')
    	    {
    	        $this->load->library('m_pdf');
    	        $toDate = date('Y-m-d', strtotime($toDate.'+1 day'));
    	        $data['groups'] = $this->data->myquery("SELECT * FROM `churchgroup` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `name` ASC");
    	        $data['countRequest'] = count($data['groups']);
    	        $html = $this->load->view('pdf/notification/groupsActivity', $data, true);
    	        $pdfFilePath = "GroupActivity-".time().".pdf";
    	        $pdf = $this->m_pdf->load('c', 'A4');
    	        $pdf->AddPage('p',
    	            '', '', '', '',
    	            5,
    	            5,
    	            5,
    	            5,
    	            10,
    	            10
    	        );
    	        $pdf->SetDisplayMode('fullpage');
    	        $pdf->list_indent_first_level = 0;
                $stylesheet = file_get_contents(base_url().'assets_new/assets/css/detect.css');
                $pdf->WriteHTML($stylesheet, 1);
                $pdf->WriteHTML($html);
                $pdf->Output($pdfFilePath, "D");
                exit;
    	    }
    	}
    	
    	public function save_pdf_light(){
    	    $this->load->library('m_pdf');
    	    $data['lightMember'] = $this->data->myquery("SELECT `fname`, `lname`, `mobileNo` FROM `member` WHERE `status`= 'active' AND `first_time` = 'no' ORDER BY `lname` ASC");
    	    $data['countMember'] = count($data['lightMember']);
    	    $html = $this->load->view('pdf/pdflight', $data, true);
    	    $pdfFilePath = "basic_member-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('P',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('fullpage');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	    echo '<script type="text/javascript">';
            echo "window.location.href=".site_url('admin/view/manage_users');
            echo '</script>';
    	   // exit;
    	}
    	
    	public function save_pdf_mempacas($id){
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup` WHERE id = '.$id);
    	    $html = $this->load->view('pdf/pdfMempacas', $data, true);
    	    $pdfFilePath = "Mempacas-Group-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	   // echo '<script type="text/javascript">';
        //     echo "window.location.href=".$_SERVER['HTTP_REFERER'];
        //     echo '</script>';
            redirect('Location:'.$_SERVER['HTTP_REFERER']);
            // exit;
    	}
    	
    	public function save_pdf_urgent_mempacas($id) {
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup` WHERE id = '.$id);
    	    $html = $this->load->view('pdf/pdfMempacasUrgent', $data, true);
    	    $pdfFilePath = "Mempacas-Urgent-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('fullpage');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_full_pdf_mempacas() {
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup`');
    	    $html = $this->load->view('pdf/pdfMempacas', $data, true);
    	    $pdfFilePath = "Mempacas-Group-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->useFixedNormalLineHeight = true;
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	   // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    	    echo '<script type="Text/javascript">';
    	    echo "window.location.href=".site_url('home/view_mempacas_group/'.$id);
    	    echo '</script>';
    	}
    	
    	public function save_full_pdf_class() {
    	    $this->load->library('m_pdf');
    	    $data['classDetail'] = $this->data->myquery('SELECT * FROM `attendanceClass`');
    	    $html = $this->load->view('pdf/pdfClass', $data, true);
    	    $pdfFilePath = "Class-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->usFixedNormailLineHeight = true;
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10
    	    );
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_full_pdf_class_attendance($month) {
    	    $this->load->library('m_pdf');
    	    $data['classDetail'] = $this->data->myquery('SELECT * FROM `attendanceClass`');
    	    $modifiedMonth = date('Y-m%', strtotime($month));
    	    $data['markAttend'] = $this->data->myquery("SELECT * FROM `markAttendance` WHERE date LIKE '".$modifiedMonth."' ORDER BY date DESC");
    	    $html = $this->load->view('pdf/pdfAttendance', $data, true);
    	    $pdfFilePath = "Attendance-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->usFixedNormailLineHeight = true;
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_full_pdf_class_attendance_full() {
    	    $this->load->library('m_pdf');
    	    $data['classDetail'] = $this->data->myquery('SELECT * FROM `attendanceClass`');
    	   // $modifiedMonth = date('Y-m%', strtotime($month));
    	    $data['markAttend'] = $this->data->myquery("SELECT * FROM `markAttendance` ORDER BY date DESC");
    	    $html = $this->load->view('pdf/pdfAttendance', $data, true);
    	    $pdfFilePath = "Attendance-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->usFixedNormailLineHeight = true;
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_full_incident_pdf_report() {
    	    $this->load->library('m_pdf');
    	    $data['incidentReports'] = $this->data->myquery('SELECT * FROM `incidentReports` ORDER BY date DESC');
    	    $html = $this->load->view('pdf/pdfIncidentReport', $data, true);
    	    $pdfFilePath = "Incident-".time().'.pdf';
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->usFixedNormailLineHeight = true;
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_full_incident_pdf($month) {
    	    $this->load->library('m_pdf');
    	    $modifiedMonth = date('Y-m%', strtotime($month));
    	    $data['incidentReports'] = $this->data->myquery('SELECT * FROM `incidentReports` WHERE date LIKE "'.$modifiedMonth.'" ORDER BY date DESC');
    	    $html = $this->load->view('pdf/pdfIncidentReport', $data, true);
    	    $pdfFilePath = "Incident-".time().'.pdf';
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->usFixedNormailLineHeight = true;
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('default');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	}
    	
    	public function save_full_pdf_urgent_mempacas() {
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup`');
    	    $html = $this->load->view('pdf/pdfMempacasUrgent', $data, true);
    	    $pdfFilePath = "Mempacas-Urgent-".time().".pdf";
    	    $pdf = $this->m_pdf->load('c', 'A4');
    	    $pdf->AddPage('L',
    	    '', '', '', '',
    	    5,
    	    5,
    	    5,
    	    5,
    	    10,
    	    10);
    	    $pdf->setDisplayMode('fullpage');
    	    $pdf->list_indent_first_level = 0;
    	    $pdf->WriteHTML($html);
    	    $pdf->Output($pdfFilePath, "D");
    	    echo '<script type="Text/javascript">';
    	    echo "window.location.href=".site_url('home/view_mempacas_group/'.$id);
    	    echo '</script>';
    	}
    	
    	public function save_pdf_donation($module) {
    	    if($module == 'donations'){
        	    $this->load->library('m_pdf');
        	    $data['donation']=$this->data->myquery("SELECT * FROM `donations` order by date DESC");
                foreach($data['donation'] as $k=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['donation'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Anonymous";
                    $data['donation'][$k]['userId'] = !empty($x) ? $x[0]['id'] : "Undefined";
                    $data['donation'][$k]['mobile'] = !empty($x) ? $x[0]['mobileNo'] : "Undefined";
                    $data['donation'][$k]['giftAid'] = !empty($x) ? $x[0]['giftAid'] : "Undefined";
                }
                $year = date('Y');
                $data['totalAmount'] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year);
                $html = $this->load->view('pdf/pdfDonation', $data, true);
                $pdfFilePath = "donation-".time().".pdf";
                $pdf = $this->m_pdf->load('c', 'A4');
                $pdf->AddPage('P',
        	    '', '', '', '',
        	    5,
        	    5,
        	    5,
        	    5,
        	    10,
        	    10);
        	    $pdf->setDisplayMode('fullpage');
        	    $pdf->list_indent_first_level = 0;
        	    $pdf->WriteHTML($html);
        	    $pdf->Output($pdfFilePath, "D");
        	    exit;
    	    }
    	    if($module == 'offerings'){
    	        $this->load->library('m_pdf');
        	    $data['offerings'] = $this->data->fetch("offerings");
                foreach($data['offerings'] as $k=>$val){
                    $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                    $data['offerings'][$k]['name'] = !empty($x) ? $x[0]['name'] : "Undefined";
                }
                $year = date('Y');
                $data['totalAmount'] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year);
                $html = $this->load->view('pdf/pdfOffering', $data, true);
                $pdfFilePath = "offerings-".time().".pdf";
                $pdf = $this->m_pdf->load('c', 'A4');
                $pdf->AddPage('P',
        	    '', '', '', '',
        	    5,
        	    5,
        	    5,
        	    5,
        	    10,
        	    10);
        	    $pdf->setDisplayMode('fullpage');
        	    $pdf->list_indent_first_level = 0;
        	    $pdf->WriteHTML($html);
        	    $pdf->Output($pdfFilePath, "D");
        	    exit;
    	    }
    	    if($module == 'tithes'){
    	        $this->load->library('m_pdf');
        	    $data['tithes'] = $this->data->fetch("tithes");
                foreach($data['tithes'] as $k=>$val){
                    $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                    $data['tithes'][$k]['name'] = !empty($x) ? $x[0]['name'] : "N/A";
                }
                $year = date('Y');
                $data['totalAmount'] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year);
                $html = $this->load->view('pdf/pdfTithes', $data, true);
                $pdfFilePath = "tithes-".time().".pdf";
                $pdf = $this->m_pdf->load('c', 'A4');
                $pdf->AddPage('P',
        	    '', '', '', '',
        	    5,
        	    5,
        	    5,
        	    5,
        	    10,
        	    10);
        	    $pdf->setDisplayMode('fullpage');
        	    $pdf->list_indent_first_level = 0;
        	    $pdf->WriteHTML($html);
        	    $pdf->Output($pdfFilePath, "D");
        	    exit;
    	    }
    	}
    	
    	public function save_pdf_basedon_date($module, $fromDate, $toDate){
    	    if($module == 'donations'){
    	        $this->load->library('m_pdf');
    	        $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
        	    $data['donation']=$this->data->myquery("SELECT * FROM `donations` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                foreach($data['donation'] as $k=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['donation'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Anonymous";
                    $data['donation'][$k]['userId'] = !empty($x) ? $x[0]['id'] : "Undefined";
                    $data['donation'][$k]['mobile'] = !empty($x) ? $x[0]['mobileNo'] : "Undefined";
                    $data['donation'][$k]['giftAid'] = !empty($x) ? $x[0]['giftAid'] : "Undefined";
                }
                $year = date('Y');
                $data['totalAmount'] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year);
                $html = $this->load->view('pdf/pdfDonation', $data, true);
                $pdfFilePath = "donation-".time().".pdf";
                $pdf = $this->m_pdf->load('c', 'A4');
                $pdf->AddPage('P',
        	    '', '', '', '',
        	    5,
        	    5,
        	    5,
        	    5,
        	    10,
        	    10);
        	    $pdf->setDisplayMode('fullpage');
        	    $pdf->list_indent_first_level = 0;
        	    $pdf->WriteHTML($html);
        	    $pdf->Output($pdfFilePath, "D");
        	    exit;
    	    }
    	    
    	    if($module == 'offerings'){
    	        $this->load->library('m_pdf');
    	        $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
        	    $data['offerings'] = $this->data->myquery("SELECT * FROM `offerings` WHERE `dateCreated` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                foreach($data['offerings'] as $k=>$val){
                    $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                    $data['offerings'][$k]['name'] = !empty($x) ? $x[0]['name'] : "Undefined";
                }
                $year = date('Y');
                $data['totalAmount'] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year);
                $html = $this->load->view('pdf/pdfOffering', $data, true);
                $pdfFilePath = "offerings-".time().".pdf";
                $pdf = $this->m_pdf->load('c', 'A4');
                $pdf->AddPage('P',
        	    '', '', '', '',
        	    5,
        	    5,
        	    5,
        	    5,
        	    10,
        	    10);
        	    $pdf->setDisplayMode('fullpage');
        	    $pdf->list_indent_first_level = 0;
        	    $pdf->WriteHTML($html);
        	    $pdf->Output($pdfFilePath, "D");
        	    exit;
    	    }
    	    
    	    if($module == 'tithes'){
    	        $this->load->library('m_pdf');
    	        $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
        	    $data['tithes'] = $this->data->myquery("SELECT * FROM `tithes` WHERE `dateCreated` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                foreach($data['tithes'] as $k=>$val){
                    $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                    $data['tithes'][$k]['name'] = !empty($x) ? $x[0]['name'] : "N/A";
                }
                $year = date('Y');
                $data['totalAmount'] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year);
                $html = $this->load->view('pdf/pdfTithes', $data, true);
                $pdfFilePath = "tithes-".time().".pdf";
                $pdf = $this->m_pdf->load('c', 'A4');
                $pdf->AddPage('P',
        	    '', '', '', '',
        	    5,
        	    5,
        	    5,
        	    5,
        	    10,
        	    10);
        	    $pdf->setDisplayMode('fullpage');
        	    $pdf->list_indent_first_level = 0;
        	    $pdf->WriteHTML($html);
        	    $pdf->Output($pdfFilePath, "D");
        	    exit;
    	    }
    	}
    	
    	public function save_unused_code(){
    	    $q = $this->input->post('q');
    	    $this->load->library('m_pdf');
    	    $data['unusedCode'] = $this->data->myquery("SELECT * FROM `code` WHERE `status` = 'unused' LIMIT ".$q);
    	    $html = $this->load->view('pdf/pdfCode', $data, true);
    	    $pdfFilePath = "UnUsedCode.pdf";
    	    $pdf = $this->m_pdf->load();
    	    $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
    	    $pdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit;
    	}
    	
    	public function save_calendar(){
    	    $this->load->library('m_pdf');
    	    $data['calendar'] = $this->data->myquery("SELECT * FROM `reminders` WHERE adminId = 1 GROUP BY `desc`");
    	    $html = $this->load->view('pdf/pdfCalendar', $data, true);
    	    $pdfFilePath = "Calendar.pdf";
        	$pdf = $this->m_pdf->load();
        	$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        	$pdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
            // $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit;
    	}
    	
    	public function updateReminder(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $user_id = 0;
                $maxIdReminder = $this->data->myquery("SELECT max(event_id) as maxId FROM `reminders` WHERE `user_id`='$user_id'");
                $id = $maxIdReminder[0]['maxId'];
                $data = $this->input->post();
                $this->data->update(array("event_id" => $id), "reminders", $data);
            }
        }
    	
    	public function save_keepers_network(){
    	    //load mPDF library
    		$this->load->library('m_pdf'); 
    		//now pass the data//
    		$data['keepersNetwork'] = $this->Pdf->keepersNetworkList();
    		$html=$this->load->view('pdf/pdfKeepersNetwork',$data, true);//load the pdf.php by passing our data and get all data in $html varriable.
    		$html.=$this->load->view('back/footer', true);
    		$pdfFilePath ="keepers_network-".time().".pdf";		
    		//actually, you can pass mPDF parameter on this load() function
    		$pdf = $this->m_pdf->load();
    		//generate the PDF!
    		$stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
    		$pdf->AddPage('L', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
    		// apply external css
    		$pdf->WriteHTML($stylesheet,1);
    		$pdf->WriteHTML($html,2);
    		$pdf->WriteHTML($footer,4);
    		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
    		$pdf->Output($pdfFilePath, "D");
    		exit;
    	}
    	
    	public function save_gift_aid($id){
    	    $this->load->library('m_pdf');
    	    $data['adminEvent'] = $this->data->fetch('donations', array('id' => $id));
    	    $data['details'] = $this->data->fetch('details');
    	    $html = $this->load->view('pdf/pdfGiftAid', $data, true);
    	    $pdfFilePath = "Gift Aid Claim".".pdf";
    	    $pdf = $this->m_pdf->load();
    	    $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
    	    $pdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                5, // margin_left
                5, // margin right
                5, // margin top
                5, // margin bottom
                10, // margin header
                10); // margin footer
            // $pdf->WriteHTML($stylesheet, 1);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit;
    	}
    	
    	public function incidentReport() {
                $data = $this->input->post();
                $date = $data['reportDate'];
                $teacherReport = $data['teacherReport'];
                $classId = $data['classId'];
                $childId = $data['childId'];
                $this->data->insert('incidentReports', array('date' => date('Y-m-d', strtotime($date)), 'classId' => $classId, 'childId' => $childId, 'teacherReports' => $teacherReport));
                $childDetail = $this->data->fetch('children', array('id' => $data['childId']));
                $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
                $msg = "Incident Reported text ".$teacherReport." for date ".$date." Go to your MMS parent dashboard area to respond or see Class teacher.";
                $this->sendSMS1('RCCGVHL', $parentData[0]['mobileNo'], $msg);
                echo 'Incident Reported Successfully.';
        }
        
        public function incidentReportDeily() {
            $data = $this->input->post();
            $date = $data['reportDate'];
            $teacherReport = $data['teacherReport'];
            $classId = $data['classId'];
            $childId = $data['childId'];
            $this->data->insert('incidentReports', array('date' => date('Y-m-d', strtotime($date)), 'classId' => $classId, 'childId' => $childId, 'teacherReports' => $teacherReport));
            $childDetail = $this->data->fetch('children', array('id' => $data['childId']));
            $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
            $msg = "Incident Reported text ".$teacherReport." for date ".$date." Go to your MMS parent dashboard area to respond or see Class teacher.";
            $this->sendSMS1('RCCGVHL', $parentData[0]['mobileNo'], $msg);
            echo 'Incident Reported Successfully.';
        }
        
        public function replyPrayerRequest(){
            $check = $this->session->userdata('userAdmin');
            $id = $this->input->get('id');
            $data = $this->input->post();
            if(!empty($id)){
                $this->data->insert('prayerRequestReply', array('prayer_request_id' => $id, 'admin_id' => $data['replyGivenBy'], 'member_id' => $data['requestedBy'], 'reply_text' => $data['reply']));
                $replyId = $this->db->insert_id();
                 $this->data->update(array('id'=>$id),"p_request",array('reply' => $data['reply'], 'replyGivenBy' => $data['replyGivenBy']));
                $prevMsg = $this->data->fetch("p_request",array('id' => $id));
                    $x = file_get_contents(site_url('admin/notifMsgTestReply?id='.$id.'&replyId='.$replyId));
                    $sub = "Membership Management System";
                    $xx = $this->data->fetch("member", array('id' => $data['requestedBy'], 'status' => 'active'));
                    foreach($xx as $xxx){
                        $to = $xxx['email'];
                        if($xxx['emailSub']){
                            $this->email
                                ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                                ->to($to)
                                ->subject($sub)
                                ->message($x);
                            $return = $this->email->send();
                            if(!$return){
                                print_r($this->email->print_debugger());
                            }
                        }
                    }
            }
            redirect("admin/view/prayerRequest");
        }
        
        public function view($page_name,$dataR=null){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->sendBirtdaySMS();
                $data = array();
                $data['msg']=$this->session->userdata('msg');
                $this->session->unset_userdata('msg');
                $data['data'] = $dataR;
                $data['lifeToChrist'] = $this->data->fetch("lifetochrist");
                $data['attendance'] = $this->data->fetch("attendance");
                $data['offerings'] = $this->data->fetch("offerings");
                foreach($data['offerings'] as $k=>$val){
                    $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                    $data['offerings'][$k]['name'] = !empty($x) ? $x[0]['name'] : "Undefined";
                }
                $year = date('Y');
                $data['offeringsYear'][0] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 1");
                $data['offeringsYear'][1] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 2");
                $data['offeringsYear'][2] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 3");
                $data['offeringsYear'][3] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 4");
                $data['offeringsYear'][4] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 5");
                $data['offeringsYear'][5] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 6");
                $data['offeringsYear'][6] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 7");
                $data['offeringsYear'][7] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 8");
                $data['offeringsYear'][8] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 9");
                $data['offeringsYear'][9] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 10");
                $data['offeringsYear'][10] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 11");
                $data['offeringsYear'][11] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 12");
                $data['tithes'] = $this->data->fetch("tithes");
                foreach($data['tithes'] as $k=>$val){
                    $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                    $data['tithes'][$k]['name'] = !empty($x) ? $x[0]['name'] : "N/A";
                }
                $year = date('Y');
                $data['tithesYear'][0] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 1");
                $data['tithesYear'][1] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 2");
                $data['tithesYear'][2] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 3");
                $data['tithesYear'][3] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 4");
                $data['tithesYear'][4] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 5");
                $data['tithesYear'][5] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 6");
                $data['tithesYear'][6] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 7");
                $data['tithesYear'][7] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 8");
                $data['tithesYear'][8] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 9");
                $data['tithesYear'][9] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 10");
                $data['tithesYear'][10] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 11");
                $data['tithesYear'][11] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 12");
                $data['books'] = $this->data->fetch("books");
                $data['page_req'] = $this->data->fetch("business");
                foreach($data['page_req'] as $key=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['page_req'][$key]['name'] = $x[0]['fname'];
                    $data['page_req'][$key]['name'] .= " ";
                    $data['page_req'][$key]['name'] .= $x[0]['lname'];
                }
                $id = $this->uri->segment(4);
                if($page_name == "read_bulletin"){
                    if(!empty($id)){
                        $data['bulletin'] = $this->data->fetch("bulletin",array('id'=>$id));
                        $x = $this->data->myquery("select * from `bulletin` where `id` = (select min(`id`) from `bulletin` where id > {$id})");
                        $p = $this->data->myquery("select * from `bulletin` where `id` = (select max(`id`) from `bulletin` where id < {$id})");
                        if(empty($data['bulletin'])){
                            $page_name = "index";
                        }else{
                            $data['bulletin'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                            $data['bulletin'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                            //var_dump($data['bulletin']);die;
                        }
                    }
                }
                if($page_name == 'suspend_users'){
                    $data['memberSus'] = $this->data->fetch('member', array('status' => 'suspend', 'permanentDelete' => '0'));
                    foreach($data['memberSus'] as $k=>$v){
                        $x = $this->data->fetch("businessgroup",array('id'=>$v['businessGroup']));
                        $data['memberSus'][$k]['businessGroup'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                        $data['memberSus'][$k]['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$v['id']}'");
                    }
                }
                
                if($page_name == 'delete_users'){
                    $data['memberPerDelete'] = $this->data->fetch('member', array('status' => 'suspend', 'permanentDelete' => '1'));
                    foreach($data['memberPerDelete'] as $k=>$v){
                        $x = $this->data->fetch("businessgroup",array('id'=>$v['businessGroup']));
                        $data['memberPerDelete'][$k]['businessGroup'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                        $data['memberPerDelete'][$k]['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$v['id']}'");
                    }
                }
                
                $data['detailsss'] = $this->data->fetch("details");
                
                if($page_name == 'ageGroup') {
                    $data['ageGroup'] = $this->data->myquery("SELECT * FROM `ageGroup` ORDER BY createdAt DESC");
                }
            
                $data['userAdmin']=$check;
                $data['userAdmin'][0]['access'] = ($data['userAdmin'][0]['access'] != NULL) ? json_decode($data['userAdmin'][0]['access'],true) : "admin" ;
                if($data['userAdmin'][0]['access'] != "admin"){
                    $x = $this->checkAccess($page_name);
                    if($x == false){
                        $page_name = "index";
                    }
                }
                $data['advert'] = $this->data->myquery("SELECT * FROM `advert` ORDER BY date DESC");
                foreach($data['advert'] as $key=>$val){
                    $x = $this->data->fetch("member",array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['advert'][$key]['memberEmail'] = !empty($x) ? $x[0]['email'] : "";
                    $data['advert'][$key]['member'] = !empty($x) ? ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) : "";
                }
                $data['countryOrigin'] = $this->data->myquery("SELECT DISTINCT(`nativeCountry`),COUNT(`id`) as `total` FROM `member` GROUP BY `nativeCountry`");
                
                $data['bulletin'] = $this->data->fetch("bulletin");
                $data['gender']['female'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `gander` = 'female' and `first_time` = 'no' and `status` = 'active'");
                $data['gender']['male'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `gander` = 'male' and `first_time` = 'no' and `status` = 'active'");
                $data['c_gender']['female'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `gender` = 'female' and `relation` = 'child'");
                $data['c_gender']['male'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `gender` = 'male' and `relation` = 'child'");
                $data['gc_gender']['female'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `gender` = 'female' and `relation` = 'grand'");
                $data['gc_gender']['male'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `gender` = 'male' and `relation` = 'grand'");
                $data['age_group'][0] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `age_group` = '18' and `first_time` = 'no'");
                $data['age_group'][1] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `age_group` = '29' and `first_time` = 'no'");
                $data['age_group'][2] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `age_group` = '39' and `first_time` = 'no'");
                $data['age_group'][3] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `age_group` = '49' and `first_time` = 'no'");
                $data['age_group'][4] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `age_group` = '69' and `first_time` = 'no'");
                $data['age_group'][5] = $this->data->myquery("SELECT count(`id`) as `total` FROM `member` WHERE `age_group` = '70' and `first_time` = 'no'");
                $data['age_group_child'][0] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '9' and `relation` = 'child'");
                $data['age_group_child'][1] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '12' and `relation` = 'child'");
                $data['age_group_child'][2] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '18' and `relation` = 'child'");
                $data['age_group_child'][3] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '29' and `relation` = 'child'");
                $data['age_group_child'][4] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '39' and `relation` = 'child'");
                $data['age_group_child'][5] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '49' and `relation` = 'child'");
                $data['age_group_child'][6] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '69' and `relation` = 'child'");
                $data['age_group_child'][7] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '70' and `relation` = 'child'");
                $data['age_group_gChild'][0] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '9' and `relation` = 'grand'");
                $data['age_group_gChild'][1] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '12' and `relation` = 'grand'");
                $data['age_group_gChild'][2] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '18' and `relation` = 'grand'");
                $data['age_group_gChild'][3] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '29' and `relation` = 'grand'");
                $data['age_group_gChild'][4] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '39' and `relation` = 'grand'");
                $data['age_group_gChild'][5] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '49' and `relation` = 'grand'");
                $data['age_group_gChild'][6] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '69' and `relation` = 'grand'");
                $data['age_group_gChild'][7] = $this->data->myquery("SELECT count(`id`) as `total` FROM `children` WHERE `age_group` = '70' and `relation` = 'grand'");
                $data['donation1'] = $this->data->myquery("SELECT SUM(amount) as donation FROM donations");
                $data['dMonths'][0]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-01-30' AND `date` >= '2019-01-01' ");
                $data['dMonths'][1]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-02-30' AND `date` >= '2019-02-01' ");
                $data['dMonths'][2]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-03-30' AND `date` >= '2019-03-01' ");
                $data['dMonths'][3]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-04-30' AND `date` >= '2019-04-01' ");
                $data['dMonths'][4]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-05-30' AND `date` >= '2019-05-01' ");
                $data['dMonths'][5]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-06-30' AND `date` >= '2019-06-01' ");
                $data['dMonths'][6]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-07-30' AND `date` >= '2019-07-01' ");
                $data['dMonths'][7]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-08-30' AND `date` >= '2019-08-01' ");
                $data['dMonths'][8]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-09-30' AND `date` >= '2019-09-01' ");
                $data['dMonths'][9]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-10-30' AND `date` >= '2019-10-01' ");
                $data['dMonths'][10]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-11-30' AND `date` >= '2019-11-01' ");
                $data['dMonths'][11]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '2019-12-30' AND `date` >= '2019-12-01' ");


                /**/
                $data['fMonths'][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-01-30' AND `dOfJoining` >= '2019-01-01') AND `first_time` = 'yes' ");
                $data['fMonths'][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-02-30' AND `dOfJoining` >= '2019-02-01') AND `first_time` = 'yes' ");
                $data['fMonths'][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-03-30' AND `dOfJoining` >= '2019-03-01') AND `first_time` = 'yes' ");
                $data['fMonths'][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-04-30' AND `dOfJoining` >= '2019-04-01') AND `first_time` = 'yes' ");
                $data['fMonths'][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-05-30' AND `dOfJoining` >= '2019-05-01') AND `first_time` = 'yes' ");
                $data['fMonths'][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-06-30' AND `dOfJoining` >= '2019-06-01') AND `first_time` = 'yes' ");
                $data['fMonths'][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-07-30' AND `dOfJoining` >= '2019-07-01') AND `first_time` = 'yes' ");
                $data['fMonths'][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-08-30' AND `dOfJoining` >= '2019-08-01') AND `first_time` = 'yes' ");
                $data['fMonths'][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-09-30' AND `dOfJoining` >= '2019-09-01') AND `first_time` = 'yes' ");
                $data['fMonths'][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-10-30' AND `dOfJoining` >= '2019-10-01') AND `first_time` = 'yes' ");
                $data['fMonths'][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-11-30' AND `dOfJoining` >= '2019-11-01') AND `first_time` = 'yes' ");
                $data['fMonths'][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-12-30' AND `dOfJoining` >= '2019-12-01') AND `first_time` = 'yes'");
                /**/

                /**/
                $data['rMonths'][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-01-30' AND `dOfJoining` >= '2019-01-01') AND `first_time` = 'no' ");
                $data['rMonths'][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-02-30' AND `dOfJoining` >= '2019-02-01') AND `first_time` = 'no' ");
                $data['rMonths'][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-03-30' AND `dOfJoining` >= '2019-03-01') AND `first_time` = 'no' ");
                $data['rMonths'][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-04-30' AND `dOfJoining` >= '2019-04-01') AND `first_time` = 'no' ");
                $data['rMonths'][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-05-30' AND `dOfJoining` >= '2019-05-01') AND `first_time` = 'no' ");
                $data['rMonths'][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-06-30' AND `dOfJoining` >= '2019-06-01') AND `first_time` = 'no' ");
                $data['rMonths'][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-07-30' AND `dOfJoining` >= '2019-07-01') AND `first_time` = 'no' ");
                $data['rMonths'][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-08-30' AND `dOfJoining` >= '2019-08-01') AND `first_time` = 'no' ");
                $data['rMonths'][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-09-30' AND `dOfJoining` >= '2019-09-01') AND `first_time` = 'no' ");
                $data['rMonths'][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-10-30' AND `dOfJoining` >= '2019-10-01') AND `first_time` = 'no' ");
                $data['rMonths'][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-11-30' AND `dOfJoining` >= '2019-11-01') AND `first_time` = 'no' ");
                $data['rMonths'][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '2019-12-30' AND `dOfJoining` >= '2019-12-01') AND `first_time` = 'no'");
                /**/
                
                $data['lcountMonths'][0] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 1 AND `year` = ".date('Y').")");
                $data['lcountMonths'][1] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 2 AND `year` = ".date('Y').")");
                $data['lcountMonths'][2] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 3 AND `year` = ".date('Y').")");
                $data['lcountMonths'][3] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 4 AND `year` = ".date('Y').")");
                $data['lcountMonths'][4] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 5 AND `year` = ".date('Y').")");
                $data['lcountMonths'][5] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 6 AND `year` = ".date('Y').")");
                $data['lcountMonths'][6] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 7 AND `year` = ".date('Y').")");
                $data['lcountMonths'][7] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 8 AND `year` = ".date('Y').")");
                $data['lcountMonths'][8] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 9 AND `year` = ".date('Y').")");
                $data['lcountMonths'][9] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 10 AND `year` = ".date('Y').")");
                $data['lcountMonths'][10] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 11 AND `year` = ".date('Y').")");
                $data['lcountMonths'][11] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 12 AND `year` = ".date('Y').")");
                
                /**/
                for($i = 1990; $i<= 2025; $i++){
                    $data['cMonths'][$i]['totalYear'] = $this->data->myquery("SELECT COUNT(`id`) as totalYear FROM `member` WHERE (`member_since_year` = '$i')");
                    $data['cMonths'][$i][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '1' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '2' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '3' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '4' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '5' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '6' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '7' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '8' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '9' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '10' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '11' AND `member_since_year` = '$i')");
                    $data['cMonths'][$i][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`member_since_month` = '12' AND `member_since_year` = '$i')");
                }
                /**/


                /**/
                //lCounts
                $data['rCounts'][0]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-01-30' AND `lasttime` >= '2018-01-01')  ");
                $data['rCounts'][1]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-02-30' AND `lasttime` >= '2018-02-01')  ");
                $data['rCounts'][2]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-03-30' AND `lasttime` >= '2018-03-01')  ");
                $data['rCounts'][3]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-04-30' AND `lasttime` >= '2018-04-01')  ");
                $data['rCounts'][4]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-05-30' AND `lasttime` >= '2018-05-01')  ");
                $data['rCounts'][5]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-06-30' AND `lasttime` >= '2018-06-01')  ");
                $data['rCounts'][6]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-07-30' AND `lasttime` >= '2018-07-01')  ");
                $data['rCounts'][7]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-08-30' AND `lasttime` >= '2018-08-01')  ");
                $data['rCounts'][8]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-09-30' AND `lasttime` >= '2018-09-01')  ");
                $data['rCounts'][9]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-10-30' AND `lasttime` >= '2018-10-01')  ");
                $data['rCounts'][10]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-11-30' AND `lasttime` >= '2018-11-01') ");
                $data['rCounts'][11]=$this->data->myquery("SELECT SUM(`count`) as amount FROM `member` WHERE (`lasttime` <= '2018-12-30' AND `lasttime` >= '2018-12-01') ");
                foreach($data['rCounts'] as $k=>$item){
                    $data['rCounts'][$k][0]['amount'] = ($data['rCounts'][$k][0]['amount'] == '') ? 0 : $data['rCounts'][$k][0]['amount'];
                }
                /**/


                $data['donation']=$this->data->myquery("SELECT * FROM `donations` order by date DESC");
                foreach($data['donation'] as $k=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['donation'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Anonymous";
                    $data['donation'][$k]['userId'] = !empty($x) ? $x[0]['id'] : "Undefined";
                    $data['donation'][$k]['mobile'] = !empty($x) ? $x[0]['mobileNo'] : "Undefined";
                    $data['donation'][$k]['giftAid'] = !empty($x) ? $x[0]['giftAid'] : "Undefined";
                }
                $year = date('Y');
                $data['donationYear'][0] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 1");
                $data['donationYear'][1] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 2");
                $data['donationYear'][2] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 3");
                $data['donationYear'][3] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 4");
                $data['donationYear'][4] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 5");
                $data['donationYear'][5] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 6");
                $data['donationYear'][6] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 7");
                $data['donationYear'][7] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 8");
                $data['donationYear'][8] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 9");
                $data['donationYear'][9] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 10");
                $data['donationYear'][10] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 11");
                $data['donationYear'][11] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 12");
                // print_r($data['donationYear']);
                $data['testimonies']=$this->data->fetch("testimonies");
                foreach($data['testimonies'] as $k=>$val){
                    $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['testimonies'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                }
                
                $data['contactUs'] = $this->data->fetch('contactUs');
                
                //var_dump($data['testimonies']);die;
                $data['businessGroup']=$this->data->myquery("SELECT * FROM `businessgroup` order by name ASC");
                $data['businessGroupnew']=$this->data->fetch("businessgroup",array('status'=>'not'));
                $data['churchgroup']=$this->data->myquery("SELECT * FROM `churchgroup` ORDER BY name ASC");
                $data['churchgroupnew']=$this->data->fetch("churchgroup",array('status'=>'not'));
                $data['admin']=$this->data->myquery("SELECT * FROM `credentials` ORDER BY name DESC");
                //Voice Note Code
                
                if($page_name == 'view_word') {
                    // $config['base_url'] = site_url().'/admin/view/view_word/';
                    // $config['total_rows'] = $this->Fetchdata->countWord();
                    // $config['per_page'] = 10;
                    // $config["uri_segment"] = 4;
                    // $config["num_links"] = 4;
                    // $config["full_tag_open"] = '<ul class="pagination">';
                    // $config["full_tag_close"] = '</ul>';	
                    // $config["first_link"] = "&laquo;";
                    // $config["first_tag_open"] = "<li>";
                    // $config["first_tag_close"] = "</li>";
                    // $config["last_link"] = "&raquo;";
                    // $config["last_tag_open"] = "<li>";
                    // $config["last_tag_close"] = "</li>";
                    // $config['next_link'] = '&gt;';
                    // $config['next_tag_open'] = '<li>';
                    // $config['next_tag_close'] = '<li>';
                    // $config['prev_link'] = '&lt;';
                    // $config['prev_tag_open'] = '<li>';
                    // $config['prev_tag_close'] = '<li>';
                    // $config['cur_tag_open'] = '<li class="active"><a href="#">';
                    // $config['cur_tag_close'] = '</a></li>';
                    // $config['num_tag_open'] = '<li>';
                    // $config['num_tag_close'] = '</li>';
                    // // $data['voiceNote'] = $this->data->myquery("SELECT * FROM `audioNote` ORDER BY dateOfEvent DESC");
                    // $this->pagination->initialize($config);
                    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    $data['words'] = $this->Fetchdata->fetch_word($config['per_page'], 0);
                }
                
                if($page_name == 'viewHOD') {
                    // $config['base_url'] = site_url().'/admin/view/viewHOD/';
                    // $config['total_rows'] = $this->Fetchdata->countHOD();
                    // $config['per_page'] = 10;
                    // $config["uri_segment"] = 4;
                    // $config["num_links"] = 4;
                    // $config["full_tag_open"] = '<ul class="pagination">';
                    // $config["full_tag_close"] = '</ul>';	
                    // $config["first_link"] = "&laquo;";
                    // $config["first_tag_open"] = "<li>";
                    // $config["first_tag_close"] = "</li>";
                    // $config["last_link"] = "&raquo;";
                    // $config["last_tag_open"] = "<li>";
                    // $config["last_tag_close"] = "</li>";
                    // $config['next_link'] = '&gt;';
                    // $config['next_tag_open'] = '<li>';
                    // $config['next_tag_close'] = '<li>';
                    // $config['prev_link'] = '&lt;';
                    // $config['prev_tag_open'] = '<li>';
                    // $config['prev_tag_close'] = '<li>';
                    // $config['cur_tag_open'] = '<li class="active"><a href="#">';
                    // $config['cur_tag_close'] = '</a></li>';
                    // $config['num_tag_open'] = '<li>';
                    // $config['num_tag_close'] = '</li>';
                    // // $data['voiceNote'] = $this->data->myquery("SELECT * FROM `audioNote` ORDER BY dateOfEvent DESC");
                    // $this->pagination->initialize($config);
                    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    $data['hod'] = $this->Fetchdata->fetchHOD($config['per_page'], 0);
                }
                
                if($page_name == 'voiceNote') {
                    // $config['base_url'] = site_url().'/admin/view/voiceNote/';
                    // $config['total_rows'] = $this->Fetchdata->countVoiceNote();
                    // $config['per_page'] = 10;
                    // $config["uri_segment"] = 4;
                    // $config["num_links"] = 4;
                    // $config["full_tag_open"] = '<ul class="pagination">';
                    // $config["full_tag_close"] = '</ul>';	
                    // $config["first_link"] = "&laquo;";
                    // $config["first_tag_open"] = "<li>";
                    // $config["first_tag_close"] = "</li>";
                    // $config["last_link"] = "&raquo;";
                    // $config["last_tag_open"] = "<li>";
                    // $config["last_tag_close"] = "</li>";
                    // $config['next_link'] = '&gt;';
                    // $config['next_tag_open'] = '<li>';
                    // $config['next_tag_close'] = '<li>';
                    // $config['prev_link'] = '&lt;';
                    // $config['prev_tag_open'] = '<li>';
                    // $config['prev_tag_close'] = '<li>';
                    // $config['cur_tag_open'] = '<li class="active"><a href="#">';
                    // $config['cur_tag_close'] = '</a></li>';
                    // $config['num_tag_open'] = '<li>';
                    // $config['num_tag_close'] = '</li>';
                    // // $data['voiceNote'] = $this->data->myquery("SELECT * FROM `audioNote` ORDER BY dateOfEvent DESC");
                    // $this->pagination->initialize($config);
                    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    $data['voiceNote'] = $this->Fetchdata->fetch_voice_note($config['per_page'], 0);
                }
                
                if($page_name == 'live'){
                    // $config['base_url'] = site_url().'/admin/view/live/';
                    // $config['total_rows'] = $this->Fetchdata->countLive();
                    // $config['per_page'] = 20;
                    // $config["uri_segment"] = 4;
                    // $config["num_links"] = 4;
                    // $config["full_tag_open"] = '<ul class="pagination">';
                    // $config["full_tag_close"] = '</ul>';	
                    // $config["first_link"] = "&laquo;";
                    // $config["first_tag_open"] = "<li>";
                    // $config["first_tag_close"] = "</li>";
                    // $config["last_link"] = "&raquo;";
                    // $config["last_tag_open"] = "<li>";
                    // $config["last_tag_close"] = "</li>";
                    // $config['next_link'] = '&gt;';
                    // $config['next_tag_open'] = '<li>';
                    // $config['next_tag_close'] = '<li>';
                    // $config['prev_link'] = '&lt;';
                    // $config['prev_tag_open'] = '<li>';
                    // $config['prev_tag_close'] = '<li>';
                    // $config['cur_tag_open'] = '<li class="active"><a href="#">';
                    // $config['cur_tag_close'] = '</a></li>';
                    // $config['num_tag_open'] = '<li>';
                    // $config['num_tag_close'] = '</li>';
                    // // $data['voiceNote'] = $this->data->myquery("SELECT * FROM `audioNote` ORDER BY dateOfEvent DESC");
                    // $this->pagination->initialize($config);
                    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                    $data['live'] = $this->Fetchdata->fetch_live($config['per_page'], 0);
                    foreach($data['live'] as $k=>$v){
                        if(time() >= strtotime("+".$v['expiryHours']." hours",strtotime($v['date']))){
                            //$this->data->update(array('id'=>$v['id']),"live",array('status'=>'off'));
                        }
                    }
                    $data['live'] = $this->Fetchdata->fetch_live($config['per_page'], $page);
                }
                
                //Manage Users Code
                if($page_name == 'manage_users'){
                $config['base_url'] = site_url().'/admin/view/manage_users/';
                $config['total_rows'] = $this->Fetchdata->record_count();
                $config['per_page'] = 20;
                $config["uri_segment"] = 4;
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
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data["members"] = $this->Fetchdata->fetch_members($config["per_page"], $page);
                $data["links"] = $this->pagination->create_links();
                foreach($data['members'] as $k=>$v){
                    $x = $this->data->fetch("businessgroup",array('id'=>$v['businessGroup']));
                    $data['members'][$k]['businessGroup'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                    $data['members'][$k]['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$v['id']}'");
                }
                //Birthday
                foreach($data['members'] as $k=>$v){
                    $todayMonth = date("m");
                    $todayDate= date("d");
                    //if($todayDate == $v['birth_date'] && $todayMonth == $v["birth_month"]){
                    if($todayMonth == $v["birth_month"]){
                        $data['members'][$k]['birthdayToday'] = "true";
                    }else{
                        $data['members'][$k]['birthdayToday'] = "false";
                    }
                }
                }
                
                if($page_name == 'birthdays') {
                    $data['members'] = $this->data->fetch('member', array('status' => 'active', 'first_time' => 'no'));
                    foreach($data['members'] as $k=>$v){
                        $x = $this->data->fetch("businessgroup",array('id'=>$v['businessGroup']));
                        $data['members'][$k]['businessGroup'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                        $data['members'][$k]['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$v['id']}'");
                    }
                    //Birthday
                    foreach($data['members'] as $k=>$v){
                        $todayMonth = date("m");
                        $todayDate= date("d");
                        //if($todayDate == $v['birth_date'] && $todayMonth == $v["birth_month"]){
                        if($todayMonth == $v["birth_month"]){
                            $data['members'][$k]['birthdayToday'] = "true";
                        }else{
                            $data['members'][$k]['birthdayToday'] = "false";
                        }
                    }
                }
                //var_dump($data['members']);die;
                //Birthday
                $data['fmembers']=$this->data->myquery("SELECT * FROM `member` WHERE status = 'active' AND first_time = 'yes' ORDER BY dOfJoining DESC");
                foreach($data['members'] as $k=>$v){
                    $x = $this->data->myquery("SELECT SUM(`amount`) as `amount` FROM `donations` WHERE `user_id`='{$v['id']}'");
                    $data['members'][$k]['total'] = empty($x) ? 0 : $x[0]['amount'];
                }
                
                $month = date('m');
                
                $data['mfmembers'] = $this->data->myquery("SELECT * FROM `member` WHERE `dOfJoining` LIKE '%".$month."%' AND `firstTimerMemberFlag` = '1' AND status = 'active' ORDER BY dOfJoining DESC");
                // print_r($this->db->last_query());
                
                $data['male']=$this->data->myquery("SELECT count(`id`) as male FROM `member` WHERE `gander` = 'male' and 'status' = 'active';");
                $data['female']=$this->data->myquery("SELECT count(`id`) as female FROM `member` WHERE `gander` = 'female' and 'status' = 'active';");
                $id = $this->uri->segment(4);
                if(($page_name == "upd_member" || $page_name == "edit_member") && $id != ""){
                    $data['members'] = $this->data->fetch("member",array('id'=>$id));
                    $data['membGroup'] = $this->data->fetch("membgroup",array('user_id'=>$id));
                    $a = array();
                    foreach($data['membGroup'] as $k=>$v){
                        $a[] = $v['g_id'];
                        $x = $this->data->fetch('churchgroup',array("id"=>$v['g_id']));
                        $data['membGroup'][$k]['groupname']= (!empty($x)) ? $x[0]['name'] : "" ;
                    }
                    $data['membGroup1'] = $a;
                    $x = $this->data->fetch("children",array('parent_id'=>$data['members'][0]['id'],"relation"=>"child"));
                    $data['members'][0]['child'] = $x;
                    $x = $this->data->fetch("children",array('parent_id'=>$data['members'][0]['id'],"relation"=>"grand"));
                    $data['members'][0]['grandChild'] = $x;

                    $data['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$id}'");
                    $data['rating'] = $this->data->fetch("reviews",array("client_id"=>$id));
                    if(!empty($data['rating'])){
                        foreach($data['rating'] as $k=>$v){
                            $x = $this->data->fetch("member",array("id"=>$v['user_id'], 'status' => 'active'));
                            $data['rating'][$k]['member'] = $x;
                        }
                    }
                }
                if($page_name == "view_reminder" && isset($_GET['date']) && !empty($_GET['date'])){
                    $date = date("Y-m-d",strtotime($_GET['date']));
                    $data['reminder'] = $this->data->fetch("reminders",array("date"=>$date,"user_id"=>0));
                }
                if($page_name == "create_code" && isset($_GET['q']) && !empty($_GET['q']) ){
                    $q = ($_GET['q'] > 0 ) ? $_GET['q'] : 10;
                    $data['codes'] = array();
                    for($i=0;$i<$q;$i++){
                        $data['codesNow'][$i] = "VHL";
                        $data['codesNow'][$i] .= $this->code(6);
                        $this->data->insert("code",array("code"=>$data['codesNow'][$i]));
                    }
                }
                if($page_name == "view_reviews" && !empty($id)){
                    $data['reviews'] = $this->data->fetch('reviews',array('client_id'=>$id));
                    foreach($data['reviews'] as $k=>$v){
                        $x = $this->data->fetch("member",array('id'=>$v['user_id'], 'status' => 'active'));
                        $data['reviews'][$k]['from'] = (!empty($x)) ? $x[0]['fname'] . " " . $x[0]['lname'] : "Undefined" ;
                        $x = $this->data->fetch("member",array('id'=>$v['client_id'], 'status' => 'active'));
                        $data['reviews'][$k]['to'] = (!empty($x)) ? $x[0]['fname'] . " " . $x[0]['lname'] : "Undefined" ;
                    }
                }
                $id = $this->uri->segment(4);
                $table = $this->uri->segment(5);
                if($page_name == "edit_group" AND !empty($id) AND !empty($table)){
                    $data['data'] = $this->data->fetch($table,array('id'=>$id));
                }
                if($page_name == "edit_group" AND empty($id) AND empty($table)){
                    $page_name = 'index';
                }
                
                if($page_name == 'edit_group' AND !empty($id)) {
                    $data['data'] = $this->data->fetch('HOD', array('id' => $id));
                    print_r($data);
                }
                
                if($page_name == 'viewMempacasGroup'){
                    $data['mempacasGroup'] = $this->data->fetch('mempacasGroup', array('id' => $id));
                $data['mempacasGroup'][0]['count'] = $this->data->myquery("SELECT count(*) as total FROM `mempacasGroup`");
                $x = $this->data->myquery("select * from `mempacasGroup` where `id` = (select min(`id`) from `mempacasGroup` where id > {$id})");
                $x1 = $this->data->myquery("select count(*) as count from `mempacasGroup` where `id` < {$id}");
                $p = $this->data->myquery("select * from `mempacasGroup` where `id` = (select max(`id`) from `mempacasGroup` where id < {$id})");
                $p1 = $this->data->myquery("select count(*) as count from `mempacasGroup` where `id` > {$id}");
                if(empty($data['mempacasGroup'])){
                    $page_name = "index";
                }else{
                    $data['mempacasGroup'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                    $data['mempacasGroup'][0]['nextCount'] = $x1[0]['count'];
                    $data['mempacasGroup'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                    $data['mempacasGroup'][0]['prevCount'] = $p1[0]['count'];
                        //var_dump($data['bulletin']);die;
                }
                }
                
                if($page_name == 'viewClasses') {
                    $data['classes'] = $this->data->fetch('attendanceClass', array('id' => $id));
                    $data['classes'][0]['count'] = $this->data->myquery("SELECT count(*) as total FROM `attendanceClass`");
                    $x = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE `id` = (SELECT min(`id`) from `attendanceClass` WHERE id > {$id})");
                    $x1 = $this->data->myquery("SELECT count(*) as count from `attendanceClass` WHERE `id` < {$id}");
                    $p = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE `id` = (SELECT min(`id`) from `attendanceClass` WHERE id < {$id})");
                    $p1 = $this->data->myquery("SELECT count(*) as count from `attendanceClass` WHERE `id` > {$id}");
                    if(empty($data['classes'])) {
                        $page_name = "index";
                    }else{
                        $data['classes'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['classes'][0]['nextCount'] = $x1[0]['count'];
                        $data['classes'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                        $data['classes'][0]['prevCount'] = $p1[0]['count'];
                    }
                }
                
                if($page_name == 'markAttendance') {
                    $data['classes'] = $this->data->fetch('attendanceClass', array('id' => $id));
                    $data['classes'][0]['count'] = $this->data->myquery("SELECT count(*) as total FROM `attendanceClass`");
                    $x = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE `id` = (SELECT min(`id`) from `attendanceClass` WHERE id > {$id})");
                    $x1 = $this->data->myquery("SELECT count(*) as count from `attendanceClass` WHERE `id` < {$id}");
                    $p = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE `id` = (SELECT min(`id`) from `attendanceClass` WHERE id < {$id})");
                    $p1 = $this->data->myquery("SELECT count(*) as count from `attendanceClass` WHERE `id` > {$id}");
                    if(empty($data['classes'])) {
                        $page_name = "index";
                    }else{
                        $data['classes'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['classes'][0]['nextCount'] = $x1[0]['count'];
                        $data['classes'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                        $data['classes'][0]['prevCount'] = $p1[0]['count'];
                    }
                    $data['markAttend'] = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `date` LIKE '".date('Y-m%')."'");
                }
                
                if($page_name == 'urgentAttention'){
                    $data['mempacasGroup'] = $this->data->fetch('mempacasGroup', array('id' => $id));
                $data['mempacasGroup'][0]['count'] = $this->data->myquery("SELECT count(*) as total FROM `mempacasGroup` WHERE `isUrgent` = 1");
                $x = $this->data->myquery("select * from `mempacasGroup` where `isUrgent` = 1 AND `id` = (select min(`id`) from `mempacasGroup` where id > {$id})");
                $x1 = $this->data->myquery("select count(*) as count from `mempacasGroup` where `isUrgent` = 1 AND `id` < {$id}");
                $p = $this->data->myquery("select * from `mempacasGroup` where `isUrgent` = 1 AND `id` = (select max(`id`) from `mempacasGroup` where id < {$id})");
                $p1 = $this->data->myquery("select count(*) as count from `mempacasGroup` where `isUrgent` = 1 AND `id` > {$id}");
                if(empty($data['mempacasGroup'])){
                    $page_name = "index";
                }else{
                    $data['mempacasGroup'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                    $data['mempacasGroup'][0]['nextCount'] = $x1[0]['count'];
                    $data['mempacasGroup'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                    $data['mempacasGroup'][0]['prevCount'] = $p1[0]['count'];
                        //var_dump($data['bulletin']);die;
                }
                }
                $data['sms'] = $this->data->myquery("SELECT * FROM `sms` ORDER BY date DESC");
                $data['totalSent'] = $this->data->myquery("SELECT sum(`sentSMSCount`) as `qty` FROM `sms`");
                $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
                $data['codes'] = $this->data->fetch("code");
                $data['codesused'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `code` WHERE `status`='used'");
                $data['codesunused'] = $this->data->myquery("SELECT count(`id`) as `total` FROM `code` WHERE `status`='unused'");
                //var_dump($data['codes']);die;
                $data['p_request'] = $this->data->fetch("p_request");
                foreach($data['p_request'] as $k=>$val){
                    $x = $this->data->fetch("member",array("id"=>$val['user_id'], 'status' => 'active'));
                    $data['p_request'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                }
                if($page_name == 'new_signups'){
                    $time= date("Y-m-d",strtotime("-1 month"))." 00:00:00";
                    $data['members'] = $this->data->myquery("SELECT * FROM `member` WHERE `dOfJoining` >= '{$time}' and 'status' = 'active'");
                }
                if($page_name == 'keepersNetwork'){
                    $data['keepersNetwork'] = $this->data->fetch('keepersNetwork');
                }
                
                if($page_name == 'editWord') {
                    $data['editWord'] = $this->data->fetch('words', array('id' => $id));
                }
                
                if($page_name == 'edit_sms') {
                    $data['data'] = $this->data->fetch('sms', array('id' => $id));
                }
                
                if($page_name == 'edit_email_history') {
                    $data['email'] = $this->data->fetch('email', array('id' => $id));
                }
                
                if($page_name == 'eventAttendace'){
                    $data['reminders1'] = $this->data->fetch('reminders', array('adminId' => "1"));
                }
                
                if($page_name == 'edit_attendance'){
                    $data['attendance'] = $this->data->fetch('attendance', array('id' => $id));
                }
                
                if($page_name == 'eventAttendee'){
                    $data['attendee'] = $this->data->fetch('eventAttendance', array('event_id' => $dataR, 'adminId' => "1"));
                    $data['attending'] = $this->data->fetch('eventAttendance', array('event_id' => $dataR, 'adminId' => "1", 'eventAttending' => "1"));
                }
                
                if($page_name == 'editLive'){
                    $data['data'] = $this->data->fetch('live', array('id' => $dataR));
                }
                
                if($page_name == 'editAudioNote') {
                    $data['data'] = $this->data->fetch('audioNote', array('id' => $dataR));
                }
                
                if($page_name == 'editAgeGroup') {
                    $data['data'] = $this->data->fetch('ageGroup', array('id' => $dataR));
                }
                
                if($page_name == 'generalsInCharge') {
                    $data['data'] = $this->data->myquery('SELEct m.groupId, GROUP_CONCAT(d.id) dish_ids, GROUP_CONCAT(name) membersName, mg.groupName, d.lasttime, m.totalMembers FROM generalInCharges m JOIN member d ON (m.userId = d.id) JOIN mempacasGroup mg ON mg.id = m.groupId GROUP BY mg.groupName');
                    $data['generals'] = $this->data->myquery('SELECT * FROM `generalInCharges` JOIN member on member.id = generalInCharges.userId');
                    $total_members = $this->data->myquery('SELECT `id`, `membersId` FROM `mempacasGroup`');
                    
                    foreach ($total_members as $each_member){
                        $length_of_string = count(explode(",", $each_member['membersId']));
                        foreach ($data['data'] as &$each_data){
                            if ($each_data['groupId'] == $each_member['id']){
                                $each_data['totalMembers'] = strval($length_of_string);    
                                // print_r(json_encode($each_data));
                            }
                        }
                    }
                    // print_r(json_encode($data['data']));
                    // $data['data'] = $this->data->myquery('SELECT *, SUM(g.totalMembers) as totalMember FROM `generalInCharges` g left join mempacasGroup m on m.id = g.groupId left join member me on me.id = g.userId WHERE 1 GROUP BY g.userId');
                }
                
                if($page_name == 'classTeacher') {
                    $data['data'] = $this->data->myquery('SELECT tic.name as TICNAME, tic.*, ac.*, ag.* FROM `teacherInCharge` tic LEFT JOIN attendanceClass ac on ac.id = tic.classId LEFT JOIN ageGroup ag on ag.id = ac.ageGroup WHERE tic.enabled = 1');
                    $data['teachers'] = $this->data->myquery('SELECT * FROM `teacherInCharge` JOIN member on member.id = teacherInCharge.userId');
                }
                
                $data['offers'] = $this->data->myquery("SELECT * FROM `offers` ORDER BY date desc");
                foreach($data['offers'] as $key => $val){
                    $x = $this->data->fetch("member",array('id'=>$val['user_id'], 'status' => 'active'));
                    $data['offers'][$key]['sentBy'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "";
                    if($val['client_id'] != 0){
                        $x = $this->data->fetch("member",array('id'=>$val['client_id'], 'status' => 'active'));
                        $data['offers'][$key]['sentTo'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "";
                    }else{
                        $data['offers'][$key]['sentTo'] = "Personal";
                    }

                }
                if($page_name == "view_report" AND isset($_GET['from']) AND isset($_GET['to'])){
                    $from = date("Y-m-d",strtotime($_GET['from']))." 00:00:00";
                    $to = date("Y-m-d",strtotime($_GET['to']))." 00:00:00";
                    $data['report']['donations'] = $this->data->myquery("SELECT SUM(`amount`)as `total` FROM `donations` WHERE ( `date` BETWEEN '{$from}' AND '{$to}')");
                    $data['report']['tithes'] = $this->data->myquery("SELECT SUM(`amount`)as `total` FROM `tithes` WHERE ( `date` BETWEEN '{$from}' AND '{$to}')");
                    $data['report']['offerings'] = $this->data->myquery("SELECT SUM(`amount`)as `total` FROM `offerings` WHERE ( `date` BETWEEN '{$from}' AND '{$to}')");
                    $data['report']['lifeToChrist'] = $this->data->myquery("SELECT COUNT(`id`)as `total` FROM `lifetochrist` WHERE ( `date` BETWEEN '{$from}' AND '{$to}')");
                    $data['report']['member'] = $this->data->myquery("SELECT COUNT(`id`)as `total` FROM `member` WHERE ( `dOfJoining` BETWEEN '{$from}' AND '{$to}') and 'status' = 'active'");
                    //var_dump($data['report']);die;
                }
                
                if($page_name == 'email_history'){
                    $data['emailHistory'] = $this->data->myquery("SELECT * FROM `email` ORDER BY createdAt DESC");
                }
                
                if($page_name == 'sms_topup'){
                    $data['smsTop'] = $this->data->fetch('smsTopupTable');
                }
                
                if($page_name == 'topup_history') {
                    $data['topupHistory'] = $this->data->fetch('topupHistory');
                }
                
                if($page_name == 'incidentReports') {
                    $data['incidentReports'] = $this->data->fetch('incidentReports');
                }
                
                $data['reminders'] = $this->data->fetch("reminders");
                foreach($data['reminders'] as $k=>$v){
                    $data['reminders'][$k]['title'] = $data['reminders'][$k]['desc'];unset($data['reminders'][$k]['desc']);
                    $data['reminders'][$k]['timeStart'] = $data['reminders'][$k]['start'];unset($data['reminders'][$k]['start']);
                    $data['reminders'][$k]['timeEnd'] = $data['reminders'][$k]['end'];unset($data['reminders'][$k]['end']);
                }
                $this->load->view('back/header',$data);
                $this->load->view('back/'.$page_name);
                $this->load->view('back/footer');
            }else{
                $this->login();
            }
        }
        
        public function search_word() {
            $words = $this->input->post('search');
            $this->load->library('pagination');
            
            $config['base_url'] = site_url().'/admin/view/view_word/';
            $config['total_rows'] = $this->Fetchdata->countWord();
            $config['per_page'] = 10;
            $config["uri_segment"] = 4;
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
            // $data['voiceNote'] = $this->data->myquery("SELECT * FROM `audioNote` ORDER BY dateOfEvent DESC");
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['words'] = $this->Fetchdata->searchWordLog($words);
            $this->load->view('back/header', $data);
            $this->load->view('back/view_word');
            $this->load->view('back/footer');
        }
        
        public function search_live() {
            $voicenote = $this->input->post('search');
            $this->load->library('pagination');
            
            $config['base_url'] = site_url().'/admin/search_live/';
            $config['total_rows'] = $this->Fetchdata->countLive();
            $config['per_page'] = 10;
            $config["uri_segment"] = 4;
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
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['live'] = $this->Fetchdata->searchLive($voicenote);
            $this->load->view('back/header', $data);
            $this->load->view('back/live');
            $this->load->view('back/footer');
            
        }
        
        public function search_voice_note() {
            $voicenote = $this->input->post('search');
            $this->load->library('pagination');
            
            $config['base_url'] = site_url().'/admin/search_voice_note/';
            $config['total_rows'] = $this->Fetchdata->countVoiceNote();
            $config['per_page'] = 10;
            $config["uri_segment"] = 4;
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
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['voiceNote'] = $this->Fetchdata->searchVoiceNote($voicenote);
            $this->load->view('back/header', $data);
            $this->load->view('back/voiceNote');
            $this->load->view('back/footer');
            
        }
        
        public function search_member() {
            $name = $this->input->post('search');
            $this->load->library('pagination');
    
            $config['base_url'] = site_url().'/admin/search_member/';
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
                foreach($data['members'] as $k=>$v){
                    $x = $this->data->fetch("businessgroup",array('id'=>$v['businessGroup']));
                    $data['members'][$k]['businessGroup'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                    $data['members'][$k]['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$v['id']}'");
                }
                // $data["links"] = $this->pagination->create_links();
                $this->load->view('back/header', $data);
                $this->load->view('back/manage_users');
                $this->load->view('back/footer');
            }else{
                redirect('admin/view/manage_users', 'refresh');
            }
        }
        
        public function edit($id,$table,$page){
            $data['data']=$this->data->fetch($table,array('id'=>$id));
            $this->view($page,$data['data']);
        }
        
        public function editGiftAid($id, $memberId, $giftAid, $red = NULL) {
            $data['donation'] = $this->data->fetch('donations', array('id' => $id));
            $data['member'] = $this->data->fetch('member', array('id' => $memberId));
            if($giftAid){
                $this->data->update(array('id'=>$memberId),'member',array('giftAid' => '0'));
            }else{
                $this->data->update(array('id'=>$memberId),'member',array('giftAid' => '1'));
            }
            if(empty($red)){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function searchResult(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data = $this->input->post();
                $search = $data['search'];
                if($search == 'January' || $search == 'january' || $search == 'jan' || $search == 'Jan' || $search == '01'){
                    $searchKey = '01';
                }else if($search == 'February' || $search == 'february' || $search == 'feb' || $search == 'Feb' || $search == '02'){
                    $searchKey = '02';
                }else if($search == 'March' || $search == 'march' || $search == 'mar' || $search == 'Mar' || $search == '03'){
                    $searchKey = '03';
                }else if($search == 'April' || $search == 'april' || $search == 'apr' || $search == 'Apr' || $search == '04'){
                    $searchKey = '04';
                }else if($search == 'May' || $search == 'may' || $search == '05'){
                    $searchKey = '05';
                }else if($search == 'June' || $search == 'june' || $search == 'jun' || $search == 'Jun' || $search == '06'){
                    $searchKey = '06';
                }else if($search == 'July' || $search == 'july' || $search == 'jul' || $search == 'Jul' || $search == '07'){
                    $searchKey = '07';
                }else if($search == 'August' || $search == 'august' || $search == 'aug' || $search == 'Aug' || $search == '08'){
                    $searchKey = '08';
                }else if($search == 'September' || $search == 'september' || $search == 'sep' || $search == 'Sep' || $search == '09'){
                    $searchKey = '09';
                }else if($search == 'October' || $search == 'october' || $search == 'oct' || $search == 'Oct' || $search == '10'){
                    $searchKey = '10';
                }else if($search == 'November' || $search == 'november' || $search == 'nov' || $search == 'Nov' || $search == '11'){
                    $searchKey = '11';
                }else if($search == 'December' || $search == 'december' || $search == 'dec' || $search == 'Dec' || $search == '12'){
                    $searchKey = '12';
                }
                $mfmembers = $this->data->myquery("SELECT * FROM `member` WHERE `dOfJoining` LIKE '%-".$searchKey."-%' AND `firstTimerMemberFlag` = '1' AND status = 'active' ORDER BY dOfJoining DESC");
                if(!empty($mfmembers)){
                foreach($mfmembers as $val) { $sms = $this->data->myquery("SELECT * FROM `sms` WHERE toId in (".$val['id'].") ORDER BY date DESC");
                ?>
                    <tr>
                                    <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                    <td><?= ucfirst($val['fname'])." ".ucfirst($val['lname']) ?></td>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                    <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <!--<img src="<?= $image ?>" style="width:100px; height : 80px;"  alt=''/>-->
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);"  alt=''/>
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> 
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);"  alt=''/>
                                        <?php  
                                            }else{
                                            ?>
                                            <img src="<?= $image ?>" style="width:100px; height : 80px;"  alt=''/>
                                            <?php
                                            }
                                        ?>
                                    </td>
                                    <td style="width : 5%;"><?= $val['gander'] ?></td>
                                    <td>
                                        <a onclick="viewMessage('<?= $sms[0]['msg'] ?>')">View</a>
                                    </td>
                                    <td><a onclick="sendSMS(<?= $val['id'] ?>)"><i class="fa fa-space-shuttle fa-2x" aria-hidden="true"></i></a></td>
                                    <td><a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>"><i class="fa fa-eye"></i></a> View Profile
                                    <!--<a onclick=moveEvent("<?= site_url('admin/moveMember') ?>/<?= $val['id'] ?>")><i class="fa fa-arrows-alt"></i></a> | -->
                                    <!--<a onclick=deleteConff("<?= site_url('admin/delete/member') ?>/<?= $val['id'] ?>/same")><i class="fa fa-trash"></i></a></td>-->
                                </tr>
                <?php
                }
                }else{
                ?>
                    <tr>
                        <th colspan='7' align="center" style='text-align: center;'>No Monthly First Timer Found.</th>
                    </tr>
                <?php
                }
            }
        }
        
        public function updateKN(){
            $data = $this->input->post();
            $data['firstFollowUp'] = $data['firstFollowUp'];
            $data['firstFollowUpAdmin'] = $data['firstFollowUpAdmin'];
            $data['firstFollowUpTime'] = date('Y-m-d H:i:s');
            $this->data->update(array('keeperId'=> $data['keeperId']),'keepersNetwork',$data);
            if(empty($red)){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function updateKNSecond(){
            $data = $this->input->post();
            $data['secondFollowUp'] = $data['secondFollowUp'];
            $data['secondFollowUpAdmin'] = $data['secondFollowUpAdmin'];
            $data['secondFollowUpTime'] = date('Y-m-d H:i:s');
            $this->data->update(array('keeperId'=> $data['keeperId']),'keepersNetwork',$data);
            if(empty($red)){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function update($id,$table,$red=NULL){
            $check = $this->session->userdata('userAdmin');
            $data = $this->input->post();
            if($table == "credentials"){
                if(isset($data['access'])){
                    $data['access'] = json_encode($data['access']);
                }
                if(isset($x['upload_data'])){
                    $data['picture'] = 'assets_f/img/'.$x['upload_data']['file_name'];
                }
            }
            if($table == "bulletin"){
                if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['image']['name'])){
                    $x=$this->do_upload($_FILES);
                    if(isset($x['upload_data'])){
                        $data['image'] = 'assets_f/img/'.$x['upload_data']['file_name'];
                    }
                }
            }
            
            
            if($table == 'details'){
                    if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload_logo($_FILES);
                        if(isset($x['upload_data'])){
                            $data['logo'] = $x['upload_data']['file_name'];
                        }
                    }
                }
            if($table == "books"){
                $booksOld = $this->data->fetch('books', array('id' => $id));
                if((isset($_FILES['img']) && !empty($_FILES['img']) && !empty($_FILES['img']['name'])) || (isset($_FILES['file']) && !empty($_FILES['file']) && !empty($_FILES['file']['name']))){
                    $x = $this->do_upload1($_FILES);
                    if(isset($x['upload_data'])){
                        if(isset($x['upload_data'][0]) && !empty($x['upload_data'][0]) && !empty($x['upload_data'][0]['file_name'])){
                            $data['image'] = $x['upload_data'][0]['file_name'];
                        }else{
                            $data['image'] = $booksOld[0]['image'];
                        }
                        if(isset($x['upload_data'][1]) && !empty($x['upload_data'][1]) && !empty($x['upload_data'][1]['file_name'])){
                            $data['file'] = $x['upload_data'][1]['file_name'];
                        }else{
                            $data['file'] = $booksOld[0]['file'];
                        }
                    }
                }
            }
            if ($table == "advert"){
                $data['user_id'] = 0;
                $advertOld = $this->data->fetch('advert', array('id' => $id));
                if (isset($_FILES['advert']) && !empty($_FILES['advert']) && !empty($_FILES['advert']['name'])) {
                    $x = $this->do_upload_advert($_FILES);
                    // print_r($x['upload_data']);
                    if(isset($x['upload_data'])){
                        if(isset($x['upload_data'][0]) && !empty($x['upload_data'][0]) && !empty($x['upload_data'][0]['file_name'])){
                            $data['horizontal'] = $x['upload_data'][0]['file_name'];
                        }else{
                            $data['horizontal'] = $advertOld[0]['horizontal'];
                        }
                        if(isset($x['upload_data'][1]) && !empty($x['upload_data'][1]) && !empty($x['upload_data'][1]['file_name'])){
                            $data['vertical'] = $x['upload_data'][1]['file_name'];
                        }else{
                            $data['vertical'] = $advertOld[0]['vertical'];
                        }
                    }
                }
                if($data['payment'] == 'on'){
                    $data['status'] = 'paid';
                }else{
                    $data['status'] = 'unpaid';
                }
                unset($data['payment']);
                if($data['approval'] == 0){
                    $data['approval'] = '0';
                }else if($data['approval'] == 1){
                    $data['approval'] = '1';
                }else if($data['approval'] == 2){
                    $data['approval'] = '2';
                }
            }
            if($table == "keepersNetwork"){
                $data['firstFollowUp'] = $data['firstFollowUp'];
                $data['firstFollowUpAdmin'] = $data['adminId'];
            }
            if($table == 'live'){
                $data['minister'] = $data['minister'];
                $data['dateOfEvent'] = $data['dateOfEvent'];
                $data['title'] = $data['title'];
                $data['link'] = $data['link'];
                $data['expiryHours'];
                $data['expiryMinutes'];
                if($data['linkType'] == 'live'){
                    $data['status'] = "on";
                }else{
                    $data['status'] = "off";
                }
            }
            
            if($table == 'HOD') {
                $data['memberId'] = $data['member'];
                $memberDetail = $this->data->fetch('member', array('id' => $data['member']));
                $data['member'] = $memberDetail[0]['title']." ".$memberDetail[0]['fname']." ".$memberDetail[0]['lname'];
                $data['departmentName'] = $data['departmentName'];
                $data['departmentPosition'] = $data['departmentPosition'];
            }
            
            
            if($table == 'audioNote'){
                $title = $data['title'];
                $data1['minister'] = $data['minister'];
                $data1['dateOfEvent'] = $data['dateOfEvent'];
                $message = "A new voice note ".$data['title']." has been added by Admin.";
                $this->sendPush($message, 123, site_url()."home/view/audioNote");
                $this->data->update(array('id'=>$id),$table,$data1);
            }
            if($table == "donations"){
                $data1['admin_id'] = $check[0]['id'];
                if($data['anonymous']){
                    $data1['user_id'] = 0;
                }else{
                    $data1['user_id'] = $data['member'];
                }
                $data1['purpose'] = $data['purpose'];
                $data1['amount'] = $data['amount'];
                $data1['modeOfPayment'] = $data['modeOfPayment'];
                $data1['detail'] = $data['detail'];
                unset($data['member']);
                unset($data['anonymous']);
                $this->data->update(array('id'=>$id),$table,$data1);
            }
            if($table == 'lifetochrist'){
                $data['date'] = date("Y-m-d",strtotime($data['date']))." 00:00:00";
                $data['contact'] = substr($data['contact'], 1);
                $data['contact'] = str_replace("+", "", $data['contact']);
                if(!empty($data['comment'])){
                    $data['comment'] = $data['comment'];
                }else{
                    $data['comment'] = "Yet to follow up";
                }
                $data['admin_id'] = $check[0]['id'];
                $this->data->update(array('id'=>$id),$table,$data);
                $data1['christConvert_id'] = $id;
                $data1['admin_id'] = $check[0]['id'];
                $data1['reply_text'] = $data['comment'];
                $this->data->insert('christConvertComment', $data1);
            }
            $this->data->update(array('id'=>$id),$table,$data);
            if(empty($red)){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }

        }
        
        public function updateAssigned($id){
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            $details = $this->data->fetch('details', array('id' => 1));
            $sub = "MMS : Prayer Request";
            if(!empty($check)){
                $members = $data['member'];
                $i = 0;
                foreach($members as $v){
                    $xs = file_get_contents(site_url('admin/notifEmailtempForPrayer')."?id=".$id);
                    $member = $this->data->fetch('member', array('id' => $v));
                    if($member[0]['emailSub']){
                        $to = $member[0]['email'];
                        $name1 = $member[0]['fname'];
                        $abc = $member[0]['id'];
                        $xs = str_replace("{name}", $name1, $xs);
                        $xs = str_replace('{facebook}', $details[0]['facebook'], $xs);
                        $xs = str_replace('{twitter}', $details[0]['twitter'], $xs);
                        $xs = str_replace('{youtube}', $details[0]['youtube'], $xs);
                        $xs = str_replace('{instagram}', $details[0]['instagram'], $xs);
                        $xs = str_replace('{mainSite}', $details[0]['mainSite'], $xs);
                        $unsub = site_url()."/admin/unsubscribe?id=".$abc;
                        $xs = str_replace("{unsubscribe}", $unsub, $xs);
                        $this->email
                        ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                        ->to($to)
                        ->subject($sub)
                        ->message($xs)
                        ->send();
                    }
                    $assignedTo[] = $name = $member[0]['fname']." ".$member[0]['lname'];
                    $mobile = $member[0]['mobileNo'];
                    $x = array();
                    $x['msg'] = $details[0]['p_request'];
                    $x['msg'] = str_replace("{name}", $name, $x['msg']);
                    $x['to'] = $name;
                    $x['toId'] = $member[0]['id'];
                    $x['sentSMSCount'] = 2;
                    $this->sendSMS1('RCCGVHL', $mobile, $x['msg']);
                    $this->data->insert("sms",$x);
                    $i++;
                }
                $assignedTo = implode(',', $assignedTo);
                $this->data->update(array('id' => $id), 'p_request', array('assignedTo' => $assignedTo));
                redirect('admin/view/prayerRequest', 'refresh');
            }
        }
        
        public function editMempacasComment() {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data = $this->input->post();
                $mempacasGroupMemberDetail = $this->data->fetch('mempacasGroupMember', array('memberId' => $data['memberId'], 'groupId' => $data['groupId']));
                if($data['seniorPastorToFollowUp'] == 'yes'){
                    $senior = 1;
                }else{
                    $senior = 0;
                }
                $date = date('d H:i:s');
                $finalDate = date('d')."-".$data['genPdf']." ".date('H:i:s');
                // print_r(date('Y-m-d H:i:s', strtotime($finalDate)));
                // exit();
                if(!count($mempacasGroupMemberDetail)){
                    $mempacasGroupMember = array(
                        'memberResponse' => $data['memberResponse'],
                        'specialPrayerRequest' => $data['specialPrayerRequest'],
                        'comment' => $data['comment'],
                        'seniorPastorToFollowUp' => $senior,
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId']
                    );
                    $this->data->insert('mempacasGroupMember', $mempacasGroupMember);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId'],
                        'comment' => $data['comment'],
                        'memberResponse' => $data['memberResponse']
                    );
                    $this->data->insert('generalResponse', $generalResponse);
                    $response = array(
                    'mgmId'             =>  $data['mgmId'],
                    'memberResponse'    =>  $data['memberResponse'],
                    'specialPrayerRequest'  =>  $data['specialPrayerRequest'],
                    'comment'           =>  $data['comment'],
                    'memberId'          =>  $data['memberId'],
                    'groupId'           =>  $data['groupId'],
                    'generalId'         =>  $data['generalId'],
                    'createdAt'         =>  date('Y-m-d H:i:s', strtotime($finalDate))
                );
                $this->data->insert('mempacasMemerResponse', $response);
                }else{
                    $mempacasGroupMember = array(
                        'memberResponse' => $data['memberResponse'],
                        'specialPrayerRequest' => $data['specialPrayerRequest'],
                        'comment' => $data['comment'],
                        'seniorPastorToFollowUp' => $senior,
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId']
                    );
                    $this->data->update(array('id' => $mempacasGroupMemberDetail[0]['id']),'mempacasGroupMember', $mempacasGroupMember);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId'],
                        'comment' => $data['comment'],
                        'memberResponse' => $data['memberResponse']
                    );
                    $this->data->insert('generalResponse', $generalResponse);
                    $response = array(
                    'mgmId'             =>  $data['mgmId'],
                    'memberResponse'    =>  $data['memberResponse'],
                    'specialPrayerRequest'  =>  $data['specialPrayerRequest'],
                    'comment'           =>  $data['comment'],
                    'memberId'          =>  $data['memberId'],
                    'groupId'           =>  $data['groupId'],
                    'generalId'         =>  $data['generalId'],
                    'createdAt'         =>  date('Y-m-d H:i:s', strtotime($finalDate))
                );
                $this->data->insert('mempacasMemerResponse', $response);
                }
                if($senior){
                    $this->data->update(array('id' => $data['groupId']), 'mempacasGroup', array('isUrgent' => 1));
                }else{
                    $this->data->update(array('id' => $data['groupId']), 'mempacasGroup', array('isUrgent' => 0));
                }
                // $this->data->update(array('id' => $data['mgmId']), 'mempacasGroupMember', array('memberResponse' =>  $data['memberResponse'], 'specialPrayerRequest' => $data['specialPrayerRequest'],'comment' => $data['comment']));
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }else{
                
            }
            
        }
        
        public function insertContactMembers()
        {
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $mempacasGroupMemberDetail = $this->data->fetch('mempacasGroupMember', array('memberId' => $data['memberId'], 'groupId' => $data['groupId']));
                if($data['seniorPastorToFollowUp'] == 'yes'){
                    $senior = 1;
                }else{
                    $senior = 0;
                }
                if(!count($mempacasGroupMemberDetail)){
                    $mempacasGroupMember = array(
                        'memberResponse' => $data['memberResponse'],
                        'specialPrayerRequest' => $data['specialPrayerRequest'],
                        'comment' => $data['comment'],
                        'seniorPastorToFollowUp' => $senior,
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId']
                    );
                    $this->data->insert('mempacasGroupMember', $mempacasGroupMember);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId'],
                        'comment' => $data['comment'],
                        'memberResponse' => $data['memberResponse']
                    );
                    $this->data->insert('generalResponse', $generalResponse);
                }else{
                    $mempacasGroupMember = array(
                        'memberResponse' => $data['memberResponse'],
                        'specialPrayerRequest' => $data['specialPrayerRequest'],
                        'comment' => $data['comment'],
                        'seniorPastorToFollowUp' => $senior,
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId']
                    );
                    $this->data->update(array('id' => $mempacasGroupMemberDetail[0]['id']),'mempacasGroupMember', $mempacasGroupMember);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $data['generalId'],
                        'comment' => $data['comment'],
                        'memberResponse' => $data['memberResponse']
                    );
                    $this->data->insert('generalResponse', $generalResponse);
                }
                if($senior){
                    $this->data->update(array('id' => $data['groupId']), 'mempacasGroup', array('isUrgent' => 1));
                }else{
                    $this->data->update(array('id' => $data['groupId']), 'mempacasGroup', array('isUrgent' => 0));
                }
                redirect('admin/view/viewMempacasGroup/'.$data['groupId'], "refresh");
            }else{
                redirect('/admin');
            }
            
        }
        
        public function reassignGeneral() {
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $newGroup = $data['group'];
                $oldGroup = $data['groupId'];
                $generalId = $data['memberId'];
                $members = $this->data->fetch('member', array('id' => $generalId, 'status' => 'active'));
                $oldMemberGroupDetail = $this->data->fetch('mempacasGroup', array('id' => $oldGroup));
                $oldGeneralId = explode(',', $oldMemberGroupDetail[0]['generalInChargeId']);
                $oldGeneralName = explode(',', $oldMemberGroupDetail[0]['generalInCharge']);
                $newMemberGroupDetail = $this->data->fetch('mempacasGroup', array('id' => $newGroup));
                $newGeneralId = explode(',', $newMemberGroupDetail[0]['generalInChargeId']);
                $newGeneralName = explode(',', $newMemberGroupDetail[0]['generalInCharge']);
                
                //Remove from old group
                $posOld = array_search($generalId, $oldGeneralId);
                $posNameOld = array_search($members[0]['title']." ".$members[0]['fname']." ".$members[0]['lname'], $oldGeneralName);
                unset($oldGeneralId[$posOld]);
                unset($oldGeneralName[$posNameOld]);
                $oldGeneralId = implode(',', $oldGeneralId);
                $oldGeneralName = implode(',', $oldGeneralName);
                $this->data->update(array('id' => $oldGroup), 'mempacasGroup', array('generalInCharge' => $oldGeneralName, 'generalInChargeId' => $oldGeneralId));
                
                //Adding to new group
                array_push($newGeneralId, $generalId);
                array_push($newGeneralName, $members[0]['title']." ".$members[0]['fname']." ".$members[0]['lname']);
                $newGeneralId = implode(',', $newGeneralId);
                $newGeneralName = implode(',', $newGeneralName);
                $this->data->update(array('id' => $newGroup), 'mempacasGroup', array('generalInCharge' => $newGeneralName, 'generalInChargeId' => $newGeneralId));
                $this->data->delete(array('userId' => $generalId, 'groupId' => $oldGroup), 'generalInCharges');
                redirect('admin/view/generalsInCharge', "refresh");
            }else{
                redirect('/admin');
            }
        }
        
        public function reassignClass() {
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $newClass = $data['attendanceClass'];
                $oldClass = $data['groupId'];
                $childId = $data['memberId'];
                $children = $this->data->fetch('children', array('id' => $childId));
                $oldClassDetail = $this->data->fetch('attendanceClass', array('id' => $oldClass));
                $oldStudentId = explode(',', $oldClassDetail[0]['studentId']);
                $oldStudentName = explode(',', $oldClassDetail[0]['studentName']);
                $newClassDetail = $this->data->fetch('attendanceClass', array('id' => $newClass));
                $newStudentId = explode(',', $newClassDetail[0]['studentId']);
                $newStudentName = explode(',', $newClassDetail[0]['studentName']);
                
                //Removing from old class
                $posOld = array_search($childId, $oldStudentId);
                $posNameOld = array_search($children[0]['fname']." ".$children[0]['lname'], $oldStudentName);
                unset($oldStudentId[$posOld]);
                unset($oldStudentName[$posNameOld]);
                $oldStudentId = implode(',', $oldStudentId);
                $oldStudentName = implode(',', $oldStudentName);
                
                $this->data->update(array('id' => $oldClass), 'attendanceClass', array('studentId' => $oldStudentId, 'studentName' => $oldStudentName));
                //Add to new class
                array_push($newStudentId, $childId);
                array_push($newStudentName, $children[0]['fname']." ".$children[0]['lname']);
                $newStudentId = implode(',', $newStudentId);
                $newStudentName = implode(',', $newStudentName);
                $this->data->update(array('id' => $newClass), 'attendanceClass', array('studentId' => $newStudentId, 'studentName' => $newStudentName));
                $this->data->update(array('id' => $childId), 'children', array('classId' => $newClass));
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }
        }
        
        public function reassignGroup() {
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $newGroup = $data['mempacasGroup'];
                $oldGroup = $data['groupId'];
                $memberId = $data['memberId'];
                $members = $this->data->fetch('member', array('id' => $memberId, 'status' => 'active'));
                $oldMemberGroupDetail = $this->data->fetch('mempacasGroup', array('id' => $oldGroup));
                $oldMemberId = explode(',', $oldMemberGroupDetail[0]['membersId']);
                $oldMemberName = explode(',', $oldMemberGroupDetail[0]['membersName']);
                $newMemberGroupDetail = $this->data->fetch('mempacasGroup', array('id' => $newGroup));
                $newMemberId = explode(',', $newMemberGroupDetail[0]['membersId']);
                $newMemberName = explode(',', $newMemberGroupDetail[0]['membersName']);
                
                //Removing from old group
                $posOld = array_search($memberId, $oldMemberId);
                $posNameOld = array_search($members[0]['fname']." ".$members[0]['lname'], $oldMemberName);
                unset($oldMemberId[$posOld]);
                unset($oldMemberName[$posNameOld]);
                $oldMemberId = implode(',', $oldMemberId);
                $oldMemberName = implode(',', $oldMemberName);
                $this->data->update(array('id' => $oldGroup), 'mempacasGroup', array('membersId' => $oldMemberId, 'membersName' => $oldMemberName));
                //Adding to new group
                array_push($newMemberId, $memberId);
                array_push($newMemberName, $members[0]['fname']." ".$members[0]['lname']);
                $newMemberId = implode(',', $newMemberId);
                $newMemberName = implode(',', $newMemberName);
                $this->data->update(array('id' => $newGroup), 'mempacasGroup', array('membersId' => $newMemberId, 'membersName' => $newMemberName));
                
                $this->data->update(array('id' => $data['memberId']), 'member', array('mempacasGroup' => $data['mempacasGroup']));
                redirect('admin/view/viewMempacasGroup/'.$data['groupId'], "refresh");
            }else{
                redirect('/admin');
            }
        }
        
        public function deleteMemberMempacasGroup($table, $id, $groupId, $red) {
            $members = $this->data->fetch('member', array('id' => $id));
            $groupDetail = $this->data->fetch('mempacasGroup', array('id' => $groupId));
            $membersId = explode(',', $groupDetail[0]['membersId']);
            $membersName = explode(',', $groupDetail[0]['membersName']);
            $pos = array_search($id, $membersId);
            $posName = array_search($members[0]['fname']." ".$members[0]['lname'], $membersName);
            unset($membersId[$pos]);
            unset($membersName[$posName]);
            $membersId = implode(',', $membersId);
            $membersName = implode(',', $membersName);
            $this->data->myquery("UPDATE `member` SET mempacasGroup = NULL WHERE id=$id");
            $this->data->update(array('id' => $groupId), 'mempacasGroup', array('membersId' => $membersId, 'membersName' => $membersName));
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                //before
                //redirect("admin/view/".$red,"refresh");
                //after
                redirect("admin/view/viewMempacasGroup/".$groupId,"refresh");
            }
        }
        
        public function deleteChildren($table, $id, $groupId, $red) {
            $children = $this->data->fetch('children', array('id' => $id));
            $parentId = $children[0]['parent_id'];
            $classDetail = $this->data->fetch('attendanceClass', array('id' => $groupId));
            $childrenId = explode(',', $classDetail[0]['studentId']);
            $childrenName = explode(',', $classDetail[0]['studentName']);
            $pos = array_search($id, $childrenId);
            $posName = array_search($children[0]['fname']." ".$children[0]['lname'], $childrenName);
            unset($childrenId[$pos]);
            unset($childrenName[$posName]);
            $childrenId = implode(',', $childrenId);
            $childrenName = implode(',', $childrenName);
            $this->data->myquery('UPDATE `children` SET `isAlotted` = 0, `classId` = NULL WHERE id = '.$id);
            $this->data->update(array('id' => $groupId), 'attendanceClass', array('studentName' => $childrenName, 'studentId' => $childrenId));
            $parentStatus = $this->data->myquery('SELECT * FROM `children` WHERE `parent_id` = '.$parentId.' and `isAlotted` = 1');
            if(!count($parentStatus)) {
                $this->data->myquery('UPDATE `member` SET `isParentAlloted` = 0 WHERE id = '.$parentId);
            }
            if($red == 'same') {
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red, 'refresh');
            }
        }
        
        public function deleteTeacher($table, $red = 'same') {
            $id = $this->input->post('userId');
            $classId = $this->input->post('groupId');
            $teacher = $this->data->fetch('member', array('id' => $id));
            $classDetail = $this->data->fetch('attendanceClass', array('id' => $classId));
            $teacherId = explode(',', $classDetail[0]['teacherId']);
            $teacherName = explode(',', $classDetail[0]['teacherName']);
            $pos = array_search($id, $teacherId);
            $posName = array_search($teacher[0]['fname']." ".$teacher[0]['lname'], $teacherName);
            unset($teacherId[$pos]);
            unset($teacherName[$posName]);
            $teacherId = implode(',', $teacherId);
            $teacherName = implode(',', $teacherName);
            $this->data->update(array('id' => $id), 'member', array('isTeacherInCharge' => '0', 'teacherClass' => ''));
            $this->data->update(array('id' => $classId), 'attendanceClass', array('teacherId' => $teacherId, 'teacherName' => $teacherName));
            $this->data->delete(array('userId' => $id, 'classId' => $classId), 'teacherInCharge');
            if($red == 'same') {
                header('Location:'.$_SERVER['HTTP_REFERER']);
            }
        }
        
        public function deleteGeneral($table, $red = 'same') {
            $id = $this->input->post('userId');
            $groupId = $this->input->post('groupId');
            $general = $this->data->fetch('member', array('id' => $id));
            $groupDetail = $this->data->fetch('mempacasGroup', array('id' => $groupId));
            $generalId = explode(',', $groupDetail[0]['generalInChargeId']);
            $generalName = explode(',', $groupDetail[0]['generalInCharge']);
            $pos = array_search($id, $generalId);
            $posName = array_search($general[0]['title']." ".$general[0]['fname']." ".$general[0]['lname'], $generalName);
            unset($generalId[$pos]);
            unset($generalName[$posName]);
            $generalId = implode(',', $generalId);
            $generalName = implode(',', $generalName);
            $this->data->update(array('id' => $id), 'member', array('isGeneralInCharge' => '0'));
            $this->data->update(array('id' => $groupId), 'mempacasGroup', array('generalInChargeId' => $generalId, 'generalInCharge' => $generalName));
            $this->data->delete(array('userId'=>$id, 'groupId' => $groupId),'generalInCharges');
            if($red == "same") {
                
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red, "refresh");
            }
        }
        
        public function liveVideo(){
            $data=$this->input->post();
            $title = $data['title'];
            $link = $data['link'];
            $hours = $data['expiryHours'];
            $minutes = $data['expiryMinutes'];
            $minister = $data['minister'];
            $dateOfEvent = $data['dateOfEvent'];
            $date = date('Y-m-d H:i:s');
            $members = $data['member'];
            $message = "A new live event ".$data['title']." has been added by Admin.";
            $this->sendPush($message, 123, site_url()."home/view/live");
            $members = implode(",", $members);
            if($data['linkType'] == 'live'){
                $status = "on";
            }else{
                $status = "off";
            }
            $schedule = date('Y-m-d H:i:s', strtotime("+".$data['expiryHours']." hours +".$data['expiryMinutes']." minutes",strtotime(date('Y-m-d H:i:s'))));
            $this->data->insert("live",array('date' => $date, 'title' => $title, 'minister' => $minister, 'dateOfEvent' => $dateOfEvent, 'link' => $link, 'schedule' => $schedule, 'status' => $status, 'expiryHours' => $data['expiryHours'], 'expiryMinutes' => $data['expiryMinutes'], 'members' => $members));
            $insert_id = $this->db->insert_id();
            $sub = "Membership Management System";
            redirect("admin/view/live","refresh");
        }
        
        public function createAgeGroup() {
            $data = $this->input->post();
            $name = $data['name'];
            $ageGroup = $data['ageGroup'];
            $this->data->insert('ageGroup', array('name' => $name, 'ageGroup' => $ageGroup));
            $this->session->set_userdata("msg","Age Group Added Successfully.");
            redirect('admin/view/ageGroup', 'refresh');
        }
        
        public function addVoiceNote() {
            $data = $this->input->post();
            $title = $data['title'];
            // print_r($data);
            $x = $this->do_upload_audio($_FILES);
            // print_r($x);
            $link = $x['upload_data'][0]['file_name'];
            $minister = $data['minister'];
            $dateOfEvent = $data['dateOfEvent'];
            $members = $data['member'];
            $message = "A new voice note ".$data['title']." has been added by Admin.";
            $this->sendPush($message, 123, site_url()."home/view/audioNote");
            $members = implode(',', $members);
            $this->data->insert("audioNote", array('dateOfEvent' => date('Y-m-d H:i:s', strtotime($dateOfEvent)), 'members' => $members, 'title' => $title, 'minister' => $minister, 'link' => $link));
            redirect("admin/view/voiceNote", "refresh");
        }
        
        public function sendSMSSchedule() {
            $smsSchedule = $this->data->myquery("SELECT * FROM `sms` WHERE `makeSchedule` = '0'");
            $date = date('Y-m-d H:i');
            
                                    
            foreach($smsSchedule as $smsSch) {
                $schDate = date('Y-m-d', strtotime($smsSch['scheduleDate']));
                $schTime = date('H:i:s', strtotime($smsSch['scheduleTime']));
                $scheduleDate = date('Y-m-d H:i', strtotime($schDate." ".$schTime));
                $member = $smsSch['toId'];
                $member = explode(',', $member);
                if($smsSch['schedule'] == 'bulkonce'){
                    $makeSchedule = '1';
                    $i=0;
                    foreach($member as $v){
                        $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                        $x1 = array();
                        $x1['msg'] = $smsSch['msg'];
                        $x1['rec'] = $a[0]['mobileNo'];
                        // print_r($v);
                        // print_r($this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']));
                        // // return;
                        $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        $this->data->update(array('id' => $smsSch['id']), 'sms', array('makeSchedule' => '1'));
                        sleep(2);
                        // $i=$i+1;
                        // if($i==2){
                        //     break;
                        // }
                    }
                    continue;
                }
                if($date == $scheduleDate) {
                    if($smsSch['schedule'] == 'daily'){
                        $makeSchedule = '0';
                        $scheduleDate = date('Y-m-d', strtotime($scheduleDate. ' + 1 days'));
                    }else if($smsSch['schedule'] == 'weekly'){
                        $makeSchedule = '0';
                        $scheduleDate = date('Y-m-d', strtotime($scheduleDate. ' + 7 days'));
                    }else if($smsSch['schedule'] == 'monthly'){
                        $makeSchedule = '0';
                        $scheduleDate = date('Y-m-d', strtotime($scheduleDate. ' + 30 days'));
                    }else if($smsSch['schedule'] == 'once'){
                        $makeSchedule = '1';
                        $scheduleDate = date('Y-m-d', strtotime($scheduleDate));
                    }
                    foreach($member as $v){
                        $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                        $x1 = array();
                        $x1['msg'] = $smsSch['msg'];
                        $x1['rec'] = $a[0]['mobileNo'];
                        $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        $this->data->update(array('id' => $smsSch['id']), 'sms', array('makeSchedule' => $makeSchedule, 'scheduleDate' => $scheduleDate));
                    }
                }
            }
        }
        
        public function sendMempacas() {
            
            $smsMempacas = $this->data->myquery("SELECT * FROM `mempacasGroup` WHERE `sendFirstSMS` = '0'");
            $details = $this->data->fetch('details', array('id' => 1));
            foreach($smsMempacas as $smsMem) {
                log_message('error', 'sendMempacas');
                $member = $smsMem['generalInChargeId'];
                // $member = explode(',', $member);
                $sql = 'SELECT * FROM `member` WHERE `status` = "active" AND `id` IN ('.$member.')';
                // print_r($sql);
                $memDetails = $this->data->myquery($sql);
                // print_r($memDetails);
                foreach($memDetails as $v) {
                    // $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                    $smsFirst = $details[0]['mempacasFirst'];
                    $smsFirst = str_replace('{title}', $v['title'], $smsFirst);
                    $smsFirst = str_replace('{name}', $v['fname']." ".$v['lname'], $smsFirst);
                    $smsFirst = str_replace('{groupName}', $smsMem['groupName'], $smsFirst);
                    $x1['msg'] = preg_replace("/[\n\r]/","",$smsFirst);
                    // $x1['msg'] = $smsFirst;
                    $x1['rec'] = $v['mobileNo'];
                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                    $smsCount = strlen($smsFirst);
                    // print_r($smsCount);
                    if(round($smsCount / 160) == 0){ $xF['sentSMSCount'] = "1"; }else{ $xF['sentSMSCount'] = round($smsCount / 160); };
                    $xF['msg'] = $x1['msg'];
                    $xF['to'] = $v['fname']." ".$v['lname'];
                    $xF['toId'] = $v['id'];
                    $this->data->insert('sms', $xF);
                    $adminDetail = $this->data->fetch('credentials', array('username' => $v['email']));
                    $x2 = array();
                    $smsSecond = $details[0]['mempacasSecond'];
                    $smsSecond = str_replace('{title}', $v['title'], $smsSecond);
                    $smsSecond = str_replace('{name}', $v['fname']." ".$v['lname'], $smsSecond);
                    $smsSecond = str_replace('{siteUrl}', base_url(), $smsSecond);
                    $smsSecond = str_replace('{username}', $v['email'], $smsSecond);
                    $smsSecond = str_replace('{password}', $v['password'], $smsSecond);
                    // $x2['msg'] = $smsSecond;
                    $x2['msg'] = preg_replace("/[\n\r]/","",$smsSecond);
                    $x2['rec'] = $v['mobileNo'];
                    print_r($x2);
                    $this->sendSMS1('RCCGVHL', $x2['rec'], $x2['msg']);
                    $smsCount1 = strlen($smsSecond);
                    if(round($smsCount1 / 160) == 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount1 / 160); };
                    $xS['msg'] = $x1['msg'];
                    $xS['to'] = $v['fname']." ".$v['lname'];
                    $xS['toId'] = $v['id'];
                    print_r($xS);
                    $this->data->insert('sms', $xS);
                }
                $this->data->update(array('id' => $smsMem['id']), 'mempacasGroup', array('sendFirstSMS' => 1, 'sendSecondSMS' => 1));
            }
        }
        
        public function mempacasEmailSend(){
            $mempacasDetails = $this->data->fetch('mempacasGroup', array('sendEmail' => 0));
            $i = 0;
            $sub = "MMS : Mempacas General Add Email";
            foreach($mempacasDetails as $detail){
                $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$detail['generalInChargeId'].')';
                $xx = $this->data->myquery($sql);
                $socialDetail = $this->data->fetch('details');
                $adminLogin = $this->data->fetch('credentials', array());
                $this->data->update(array('id' => $detail['id']), 'mempacasGroup', array('sendEmail' => '1'));
                foreach($xx as $xs){
                    $adminLogin = $this->data->fetch('credentials', array('username' => $xs['email']));
                    $x = file_get_contents(site_url('admin/notifMempacasEmail'));
                    // print_r($x);
                    if($xs['emailSub']){
                        $to = $xs['email'];
                        $name = $xs['title']." ".$xs['fname'];
                        $x = str_replace("{title}", $xs['title'], $x);
                        $x = str_replace("{name}", $xs['fname']." ".$xs['lname'],$x);
                        $x = str_replace("{groupName}", $detail['groupName'], $x);
                        $x = str_replace("{siteUrl}", base_url()."/admin", $x);
                        $x = str_replace("{username}", $xs['email'], $x);
                        $x = str_replace("{password}", $xs['password'], $x);
                        $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                        $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                        $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                        $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                        $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                        $unsub = site_url()."/admin/unsubscribe?id=".$id;
                        $x = str_replace("{unsubscribe}", $unsub, $x);
                        $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->to($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                    }
                }
            }
        }
        
        public function eventEmailSend() {
            $eventDetails = $this->data->myquery("SELECT * FROM `reminders` WHERE `isEmail` = '0'");
            $i = 0;
            $sub = "MMS : Calendar Event Added";
            foreach($eventDetails as $detail) {
                if($detail['user_id']){
                    $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$detail["user_id"].')';
                    $xx = $this->data->myquery($sql);
                    echo $i;
                    $socialDetail = $this->data->fetch('details');
                    $this->data->update(array('event_id' => $detail['event_id']), 'reminders', array('isEmail' => '1'));
                    foreach($xx as $xs) {
                        $x = file_get_contents(site_url('admin/emailForEvent'));
                        if($xs['emailSub']) {
                            $to = $xs['email'];
                            $name = $xs['fname'];
                            $msg = nl2br("Hi ".$name.", \r\n\r\n");
                            if($detail['adminId'] == 1){
                                $msg .= nl2br("An event has been added by admin.\r\n\r\n");
                            }else{
                                $msg .= nl2br("An event has been added by you.\r\n\r\n"); 
                            }
                            $msg .= nl2br("Title: ".$detail['desc']."\r\n\r\n");
                            $remDesc = $this->data->fetch('reminderDescription', array('eventId' => $detail['event_id']));
                            for($i = 0; $i < count($remDesc); $i++){
                                if($i == 0){
                                    $msg .= nl2br("Date: ".date('d/m/Y', strtotime($remDesc[$i]['date']))."\r\n\r\n");
                                    $msg .= "Time: ".date("H:i", strtotime($remDesc[$i]['startTime']))." - ".date("H:i", strtotime($remDesc[$i]['endTime']));
                                    $msg .= nl2br("\r\n\r\n");
                                }else{
                                    if(($remDesc[$i - 1]['startTime'] == $remDesc[$i]['startTime']) && $remDesc[$i - 1]['endTime'] == $remDesc[$i]['endTime']){
                                            $msg .= nl2br("Date: ".date('d/m/Y', strtotime($remDesc[$i]['date']))."\r\n\r\n");
                                            $msg .= "Time: ".date("H:i", strtotime($remDesc[$i]['startTime']))." - ".date("H:i", strtotime($remDesc[$i]['endTime']));
                                            $msg .= nl2br("\r\n\r\n");
                                    }
                                }
                            }
                            $img = base_url('assets_f/img/business')."/".$detail['image'];
                            $msg .= nl2br("<img src='".$img."' style='width: 100%;'/>\r\n\r\n");
                            $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                            $x = str_replace("{{msg}}", $msg, $x);
                            // $x = str_replace("{msg}", $msg, $x);
                            $x = str_replace("{name}", $name, $x);
                            $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                            $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                            $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                            $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                            $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                            $unsub = site_url()."/admin/unsubscribe?id=".$id;
                            $x = str_replace("{unsubscribe}", $unsub, $x);
                            $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->to($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                        }
                    }
                }
                $i++;
            }
        }
        
        public function voicenoteEmailSend() {
            $voiceDetails = $this->data->fetch('audioNote', array('emailSent' => 0));
            $i = 0;
            $sub = "MMS : Voice Note";
            foreach($voiceDetails as $detail) {
                if($detail['members']) {
                    $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$detail['members'].')';
                    $xx = $this->data->myquery($sql);
                    $socialDetail = $this->data->fetch('details');
                    $this->data->update(array('id' => $detail['id']), 'audioNote', array('emailSent' => '1'));
                    foreach($xx as $xs) {
                        $x = file_get_contents(site_url('admin/notifEmailtempForVoicenote')."?id=".$detail['id']);
                        $to = $xs['email'];
                        $name = $xs['fname'];
                        $ministerName = $detail['minister'];
                        $title = $detail['title'];
                        $id = $xs['id'];
                        $x = str_replace("{name}", $name, $x);
                        $x = str_replace("{ministerName}", $ministerName, $x);
                        $x = str_replace("{title}", $title, $x);
                        $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                        $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                        $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                        $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                        $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                        $unsub = site_url()."/admin/unsubscribe?id=".$id;
                        $x = str_replace("{unsubscribe}", $unsub, $x);
                        $this->email
                        ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                        ->to($to)
                        ->subject($sub)
                        ->message($x)
                        ->send();
                    }
                    $i++;
                }
            }
            echo $i."Voice Notes";
        }
        
        public function liveEmailSend(){
            $liveDetails = $this->data->fetch('live', array('emailSent' => 0));
            $i = 0;
            $sub = "MMS : Live Event";
            foreach($liveDetails as $detail){
                if($detail['members']){
                    $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$detail['members'].')';
                    $xx = $this->data->myquery($sql);
                    $socialDetail = $this->data->fetch('details');
                    $this->data->update(array('id' => $detail['id']), 'live', array('emailSent' => '1'));
                    foreach($xx as $xs){
                        $x = file_get_contents(site_url('admin/notifEmailtempForLive')."?id=".$detail['id']);
                        if($xs['emailSub']){
                            $to = $xs['email'];
                            $name = $xs['fname'];
                            $ministerName = $detail['minister'];
                            $title = $detail['title'];
                            $id = $xs['id'];
                            $x = str_replace("{name}", $name, $x);
                            $x = str_replace("{ministerName}", $ministerName, $x);
                            $x = str_replace("{title}", $title, $x);
                            $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                            $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                            $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                            $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                            $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                            $unsub = site_url()."/admin/unsubscribe?id=".$id;
                            $x = str_replace("{unsubscribe}", $unsub, $x);
                            $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->to($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                        }
                        $i++;
                    }
                }
            }
            echo $i."Live Event";
        }
        
        public function wordEmailSend(){
            $wordDetails = $this->data->fetch('words', array('emailSent' => 0));
            $i = 0;
            $sub = "MMS : Word Log";
            $socialDetail = $this->data->fetch('details');
            foreach($wordDetails as $detail){
                if($detail['members']){
                    $members = $detail['members'];
                    $members = str_replace("[", "", $members);
                    $members = str_replace("\"", "", $members);
                    $members = str_replace("]", "", $members);
                    $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$members.')';
                    $xx = $this->data->myquery($sql);
                    $this->data->update(array('id' => $detail['id']), 'words', array('emailSent' => '1'));
                    foreach($xx as $xs){
                        $x = file_get_contents(site_url('admin/notifEmailtempForWord')."?id=".$detail['id']);
                        if($xs['emailSub']){
                            $to = $xs['email'];
                            $name = $xs['fname'];
                            $preacherName = $detail['preacher_name'];
                            $preachedTopic = $detail['topic'];
                            $id = $xs['id'];
                            $x = str_replace("{name}", $name, $x);
                            $x = str_replace("{preacherName}", $preacherName, $x);
                            $x = str_replace("{preachedTopic}", $preachedTopic, $x);
                            $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                            $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                            $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                            $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                            $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                            $unsub = site_url()."/admin/unsubscribe?id=".$id;
                            $x = str_replace("{unsubscribe}", $unsub, $x);
                            $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->to($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                        }
                    }
                    $i++;
                }
                echo $i;
            }
        }
        
        public function bulletinEmailSend() {
            $bulletinDetails = $this->data->fetch('bulletin', array('emailSent' => 0));
            $i = 0;
            $sub = "MMS : Bulletin and News";
            foreach($bulletinDetails as $details){
                if($details['members']){
                    $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$details['members'].')';
                    $xx = $this->data->myquery($sql);
                    $socialDetail = $this->data->fetch('details');
                    $this->data->update(array('id' => $details['id']), 'bulletin', array('emailSent' => '1'));
                    foreach($xx as $xs){
                        $x = file_get_contents(site_url('admin/notifEmailtempForbulletin')."?id=".$details['id']);
                        if($xs['emailSub']){
                            $to = $xs['email'];
                            $name = $xs['fname'];
                            $title = $details['title'];
                            $id = $xs['id'];
                            $x = str_replace("{name}", $name, $x);
                            $x = str_replace("{title}", $title, $x);
                            $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                            $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                            $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                            $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                            $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                            $unsub = site_url()."/admin/unsubscribe?id=".$id;
                            $x = str_replace("{unsubscribe}", $unsub, $x);
                            print_r($x);
                            $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->to($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                        }
                    }
                    $i++;
                }
                // print_R($this->db->last_query());
                echo $i;
            }
        }
        
        public function sendSecondReminder(){
            $secondReminder = $this->data->fetch('member', array('status' => 'active', 'first_time' => 'yes', 'secondReminder' => '0'));
            foreach($secondReminder as $secRem) {
                $date1=date_create(date('Y-m-d'));
                $date2=date_create(date('Y-m-d', strtotime("+7 days", strtotime($secRem['dOfJoining']))));
                $diff=date_diff($date1,$date2);
                $totalDays = $diff->format('%R%a');
                if($totalDays <= 0){
                    $activationLink = site_url()."/admin/activationLink/".$secRem['id'];
                    $secondRem = "REMINDER MESSAGE! Dear ".$secRem['fname']." , Thank you for visiting our church, may God almighty make you experience great grace. Due to GDPR compliance we would like you to click on this link ".$activationLink." to allow us keep your information, send you church updates, and also grant you access to our app. Shalom, Pastor Leke Sanusi.";
                    $this->sendSMS1('RCCGVHL', $secRem['mobileNo'], $secondRem);
                    $sms = array(
                        'msg' => $secondRem,
                        'to' => $secRem['fname']." ".$secRem['lname'],
                        'toId' => $secRem['id'],
                        'sentSMSCount' => 3
                    );
                    $this->data->insert('sms', $sms);
                    $this->data->update(array('id' => $secRem['id']), 'member', array('secondReminder' => '1'));
                }
            }
        }
        
        
        
        public function customEmailSend() {
            $customEmail = $this->data->fetch('email', array('emailSent' => 0));
            $i = 0;
            $sub = "MMS : Email Notification";
            foreach($customEmail as $details){
                if($details['members']){
                    $sql = 'SELECT * FROM `member` WHERE `id` IN ('.$details['members'].')';
                    $xx = $this->data->myquery($sql);
                    $socialDetail = $this->data->fetch('details');
                    $this->data->update(array('id' => $details['id']), 'email', array('emailSent' => 1, 'sendEmailCount' => $i));
                    foreach($xx as $xs){
                        $x = file_get_contents(site_url('admin/notifyEmail'));
                        $x = str_replace("{message}", $details['msg'], $x);
                        $x = str_replace("{image}", $image, $x);
                        // print_r($xs['fname']);
                        $name = $xs['fname'];
                        $to = $xs['email'];
                        $id = $xs['id'];
                        $x = str_replace("{name}", $name, $x);
                        $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                        $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                        $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                        $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                        $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                        $unsub = site_url()."/admin/unsubscribe?id=".$id;
                        $x = str_replace("{unsubscribe}", $unsub, $x);
                        $this->email->clear();
                        $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->to($to)
                            ->subject($sub)
                            ->message($x);
                        $return = $this->email->send();
                        if(!$return){
                            print_r($this->email->print_debugger());
                        }else{
                            print_r($return);
                        }
                        $i++;
                    }
                }
                echo $i;
            }
        }
        
        public function bookEmailSend() {
            $customEmail = $this->data->fetch('books', array('emailSent' => 0));
            $i = 0;
            $sub = "MMS : E-Books Notification";
            foreach($customEmail as $details){
                    $sql = 'SELECT * FROM `member`';
                    $xx = $this->data->myquery($sql);
                    $socialDetail = $this->data->fetch('details');
                    $this->data->update(array('id' => $details['id']), 'books', array('emailSent' => 1));
                    foreach($xx as $xs){
                        $x = file_get_contents(site_url('admin/notifEmailtemp')."?msg=eBook");
                        if($xs['emailSub']){
                            $x = str_replace("{message}", $details['msg'], $x);
                            $x = str_replace("{image}", $image, $x);
                            $title = $details['title'];
                            $author = $details['author'];
                            // print_r($xs['fname']);
                            $name = $xs['fname'];
                            $to = $xs['email'];
                            $id = $xs['id'];
                            $x = str_replace("{name}", $name, $x);
                            $x = str_replace("{title}", $title, $x);
                            $x = str_replace("{author}", $author, $x);
                            $x = str_replace('{facebook}', $socialDetail[0]['facebook'], $x);
                            $x = str_replace('{youtube}', $socialDetail[0]['youtube'], $x);
                            $x = str_replace('{instagram}', $socialDetail[0]['instagram'], $x);
                            $x = str_replace('{twitter}', $socialDetail[0]['twitter'], $x);
                            $x = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $x);
                            $unsub = site_url()."/admin/unsubscribe?id=".$id;
                            $x = str_replace("{unsubscribe}", $unsub, $x);
                            $this->email->clear();
                            $this->email
                                ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                                ->to($to)
                                ->subject($sub)
                                ->message($x);
                            $return = $this->email->send();
                            if(!$return){
                                print_r($this->email->print_debugger());
                            }
                        }
                        $i++;
                    }
                echo $i;
            }
        }
        
        public function selectMember() {
            $data = $this->input->post();
            $generals = implode(',', $data['generalId']);
            $members = $this->data->myquery("SELECT * FROM `member` where isGeneralInCharge =0 ORDER BY lname ASC");
            $i = 1;
            ?>
            <select name="membersName[]" multiple required class="form-control chosen-select" id="memChosen">
            <?php
            foreach($members as $val){
            ?>
            <option value="<?= $val['id'] ?>"><?= $val['fname'] ?> <?= $val['lname'] ?></option>
            <?php
            $i++;
            }
            ?>
            </select>
            <?php
        }
        
        public function addNewChild() {
            $data = $this->input->post();
            $membersIdOld = explode(',', $data['membersIdOld']);
            $membersNameOld = explode(',', $data['membersNameOld']);
            $members = $data['members'];
            $studentCount = $data['studentCount'];
            $newStudentCount = count(explode(',', $members));
            $totalStudent = count($members) + $studentCount;
            $groupId = $data['groupId'];
            foreach($members as $member) {
                $memberName = $this->data->fetch('children', array('id' => $member));
                $parentId = $memberName[0]['parent_id'];
                $childrenName1[] = $memberName[0]['fname']." ".$memberName[0]['lname'];
                $memberId = $memberName[0]['id'];
                array_push($membersIdOld, $member);
                array_push($membersNameOld, $memberName[0]['fname']." ".$memberName[0]['lname']);
            }
            $membersIdOld = implode(',', $membersIdOld);
            $membersNameOld = implode(',', $membersNameOld);
            $this->data->update(array('id' => $groupId), 'attendanceClass', array('studentId' => $membersIdOld, 'studentName' => $membersNameOld));
            $this->data->update(array('classId' => $groupId), 'teacherInCharge', array('totalStudents' => $totalStudent));
            foreach($members as $mem) {
                $this->data->update(array('id' => $mem), 'children', array('isAlotted' => 1, 'classId' => $groupId));
                $this->data->update(array('id' => $parentId), 'member', array('isParentAlloted' => 1));
            }
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        
        public function addNewMember() {
            $data = $this->input->post();
            $membersIdOld = explode(',', $data['membersIdOld']);
            $membersNameOld = explode(',', $data['membersNameOld']);
            $members = $data['members'];
            $groupId = $data['groupId'];
            foreach($members as $member){
                $memberName = $this->data->fetch('member', array('id' => $member, 'status' => 'active'));
                $memberName1[] = $memberName[0]['fname']." ".$memberName[0]['lname'];
                $memberId[] = $memberName[0]['id'];
                array_push($membersIdOld, $member);
                array_push($membersNameOld, $memberName[0]['fname']." ".$memberName[0]['lname']);
            }
            $membersIdOld = implode(',', $membersIdOld);
            $membersNameOld = implode(',', $membersNameOld);
            $this->data->update(array('id' => $groupId), 'mempacasGroup', array('membersId' => $membersIdOld, 'membersName' => $membersNameOld));
            foreach($members as $mem){
                $this->data->update(array('id' => $mem), 'member', array('mempacasGroup' => $groupId));
            }
            $mempacasGroupDetail = $this->data->fetch('mempacasGroup', array('id' => $groupId));
            $generalInCharge = explode(",", $mempacasGroupDetail[0]['generalInChargeId']);
            // print_r($generalInCharge);
            // $memberGeneral = $this->data->myquery("SELECT * FROM `member` WHERE (FIND_IN_SET(".$generalInCharge.", id) ORDER BY lname");
            $detailMsg = $this->data->fetch('details', array('id' => 1));
            foreach($generalInCharge as $gen){
                $memberGeneral = $this->data->myquery("SELECT * FROM `member` WHERE (FIND_IN_SET(".$gen.", id))");
                $generalName = $memberGeneral[0]['title']." ".$memberGeneral[0]['fname']." ".$memberGeneral[0]['lname'];
                $message = str_replace("{name}",$generalName,$detailMsg[0]['addMempacasMember_msg']);
                $message = str_replace("{groupName}", $mempacasGroupDetail[0]['groupName'], $message);
                // print_r($message);
                // exit();
                $rec = $memberGeneral[0]['mobileNo'];
                $this->sendSMS1('RCCGVHL', $rec, $message);
            }
            redirect("admin/view/viewMempacasGroup/".$groupId,"refresh");
        }
        
        public function addNewGeneral(){
            $data = $this->input->post();
            $generalInChargeIdOld = explode(',', $data['generalInChargeIdOld']);
            $generalInChargeName = explode(',', $data['generalInChargeName']);
            $GICs = $data['generalInChangeId'];
            $groupId = $data['groupId'];
            foreach($GICs as $GIC) {
                $GICName = $this->data->fetch('member', array('id' => $GIC));
                $GICName1[] = $GICName[0]['title']." ".$GICName[0]['fname']." ".$GICName[0]['lname'];
                $GICId[] = $GICName[0]['id'];
                array_push($generalInChargeIdOld, $GIC);
                array_push($generalInChargeName, $GICName[0]['title']." ".$GICName[0]['fname']." ".$GICName[0]['lname']);
            }
            $generalInChargeIdOld = implode(',', $generalInChargeIdOld);
            $generalInChargeName = implode(',', $generalInChargeName);
            foreach($GICs as $GIC) {
                $GICName = $this->data->fetch('member', array('id' => $GIC));
                $generalInCharge['userId'] = $GICName[0]['id'];
                $generalInCharge['groupId'] = $groupId;
                $generalInCharge['name'] = $GICName[0]['title']." ".$GICName[0]['fname']." ".$GICName[0]['lname'];
                $generalInCharge['totalMembers'] = count($members);
                $this->data->insert('generalInCharges', $generalInCharge);
                $password = $this->randomPassword();
                $this->data->update(array('id' => $GIC),'member', array('isGeneralInCharge' => '1', 'generalGroup' => $groupId));
            }
            $this->data->update(array('id' => $groupId), 'mempacasGroup', array('generalInChargeId' => $generalInChargeIdOld, 'generalInCharge' => $generalInChargeName));
            redirect("admin/view/viewMempacasGroup/".$groupId,"refresh");
            
        }
        
        public function addNewTeacher() {
            $data = $this->input->post();
            $teacherInChargeIdOld = explode(',', $data['teacherInChargeIdOld']);
            $teacherInChargeName = explode(',', $data['teacherInChargeName']);
            $TICs = $data['teacherId'];
            $classId = $data['classId'];
            $className = $this->data->fetch('attendanceClass', array('id' => $classId))[0]['className'];
            foreach($TICs as $TIC) {
                $TICName = $this->data->fetch('member', array('id' => $TIC));
                $TICName1[] = $TICName[0]['title']." ".$TICName[0]['fname']." ".$TICName[0]['lname'];
                $TICId[] = $TICName[0]['id'];
                array_push($teacherInChargeIdOld, $TIC);
                array_push($teacherInChargeName, $TICName[0]['title']." ".$TICName[0]['fname']." ".$TICName[0]['lname']);
            }
            $teacherInChargeIdOld = implode(',', $teacherInChargeIdOld);
            $teacherInChargeName = implode(',', $teacherInChargeName);
            foreach($TICs as $TIC) {
                $TICName = $this->data->fetch('member', array('id' => $TIC));
                $teacherInCharge['userId'] = $TICName[0]['id'];
                $teacherInCharge['classId'] = $classId;
                $teacherInCharge['name'] = $TICName[0]['title']." ".$TICName[0]['fname']." ".$TICName[0]['lname'];
                $teacherInCharge['totalStudents'] = $data['studentCount'];
                $this->data->insert('teacherInCharge', $teacherInCharge);
                $password = $this->randomPassword();
                $messageText = $this->data->fetch('details');
                $firstAttendanceTextMessage = "Dear ".$teacherInCharge['name'].", This is a message generated from MMS that a new class “".$className."” has been created for easy attendance marking and you have been assigned one of the class managers. Please log in to your members area to view and add children to your class. Thank you. Pastor Leke Sanusi";
                $smsCount = strlen($firstAttendanceTextMessage);
                if(round($smsCount / 160) == 0){ $sentSMSCount = "1"; }else{ $sentSMSCount = round($smsCount / 160); };
                $smsArray = array(
                    'msg'   =>  $firstAttendanceTextMessage,
                    'to'    =>  $teacherInCharge['name'],
                    'toId'  =>  $TICName[0]['id'],
                    'sentSMSCount' => $sentSMSCount
                );
                $this->data->insert('sms', $smsArray);
                $this->sendSMS1('RCCGVHL', $TICName[0]['mobileNo'], $firstAttendanceTextMessage);
                sleep(5);
                $secondAttendanceTextMessage = "Dear ".$TICName[0]['fname']." ".$TICName[0]['lname'].", This a quick reminder of your login details: https://rccgvhl.mmsapp.org Username: ".$TICName[0]['username']."Password: ".$TICName[0]['password']."Thank you. - MMS Team";
                $smsCount = strlen($secondAttendanceTextMessage);
                if(round($smsCount / 160) == 0){ $sentSMSCount = "1"; }else{ $sentSMSCount = round($smsCount / 160); };
                $sms2Array = array(
                    'msg'   =>  $secondAttendanceTextMessage,
                    'to'    =>  $TICName[0]['fname'],
                    'toId'  =>  $TICName[0]['id'],
                    'sentSMSCount' => $sentSMSCount
                );
                $this->data->insert('sms', $sms2Array);
                $this->sendSMS1('RCCGVHL', $TICName[0]['mobileNo'], $secondAttendanceTextMessage);
                $this->data->update(array('id' => $TIC), 'member', array('isTeacherInCharge' => '1', 'teacherClass' => $classId));
            }
            $this->data->update(array('id' => $classId), 'attendanceClass', array('teacherName' => $teacherInChargeName, 'teacherId' => $teacherInChargeIdOld));
            redirect('admin/view/viewClasses/'.$classId, "refresh");
        }
        
        public function insert($table,$red){
            $check = $this->session->userdata('userAdmin');
            $data=$this->input->post();
            $this->load->library('email');
            $config['protocol']    = 'mail';
            $config['smtp_host']    = 'mail.mmsapp.org';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '30';
            $config['smtp_user']    = 'no_reply@mmsapp.org';
            $config['smtp_pass']    = 'FemiAdeko01@';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      
            $this->email->initialize($config);
            if($table == "group"){
                if($data['type'] == 'c'){
                    $table = "churchgroup";
                    $red = "manage_cGroups";
                    unset($data['type']);
                }else if($data['type'] == 'b'){
                    $table = "businessgroup";
                    $red = "manage_bGroups";
                    unset($data['type']);
                }
                $data['status'] = "verified";
                $this->data->insert($table,$data);
            }
            
            //Attendance Class Code
            if($table == 'attendanceClass') {
                $attendClass['className'] = $data['className'];
                $attendClass['ageGroup'] = $data['ageGroup'];
                $TICs = $data['teacherInCharge'];
                foreach($TICs as $TIC) {
                    $TICName = $this->data->fetch('member', array('id' => $TIC));
                    $TICName1[] = $TICName[0]['title']." ".$TICName[0]['fname']." ".$TICName[0]['lname'];
                    $TICId[] = $TICName[0]['id'];
                }
                
                $childrens = $data['childrens'];
                foreach($childrens as $child) {
                    $children = $this->data->fetch('children', array('id' => $child));
                    $name1[] = $children[0]['fname']." ".$children[0]['lname'];
                    $id[] = $children[0]['id'];
                    $this->data->update(array('id' => $children[0]['parent_id']), 'member', array('isParentAlloted' => 1));
                }
                
                $attendClass['teacherName'] = implode(",", $TICName1);
                $attendClass['teacherId'] = implode(",", $TICId);
                $attendClass['studentName'] = implode(",", $name1);
                $attendClass['studentId'] = implode(",", $id);
                
                $this->data->insert($table, $attendClass);
                $classId = $this->db->insert_id();
                foreach($childrens as $child) {
                    $this->data->update(array('id' => $child), 'children', array('isAlotted' => 1, 'classId' => $classId));
                }
                
                $teacherInCharge['name'] = implode(',', $TICName1);
                $teacherInCharge['userId'] = implode(',', $TICId);
                $teacherInCharge['classId'] = $classId;
                $teacherInCharge['totalStudents'] = count($childrens);
                $this->data->insert('teacherInCharge', $teacherInCharge);
                foreach($TICs as $TIC) {
                    $teacherInCharge = $this->data->fetch('member', array('id' => $TIC));
                    $messageText = $this->data->fetch('details');
                    $firstAttendanceTextMessage = "Dear ".$teacherInCharge[0]['fname']." ".$teacherInCharge[0]['lname'].", This is a message generated from MMS that a new class “".$data['className']."” has been created for easy attendance marking and you have been assigned one of the class managers. Please log in to your members area to view and add children to your class. Thank you. Pastor Leke Sanusi";
                    $smsCount = strlen($firstAttendanceTextMessage);
                    if(round($smsCount / 160) == 0){ $sentSMSCount = "1"; }else{ $sentSMSCount = round($smsCount / 160); };
                    $smsArray = array(
                        'msg'   =>  $firstAttendanceTextMessage,
                        'to'    =>  $teacherInCharge[0]['fname'],
                        'toId'  =>  $teacherInCharge[0]['id'],
                        'sentSMSCount' => $sentSMSCount
                    );
                    $this->data->insert('sms', $smsArray);
                    $this->sendSMS1('RCCGVHL', $teacherInCharge[0]['mobileNo'], $firstAttendanceTextMessage);
                    sleep(5);
                    $secondAttendanceTextMessage = "Dear ".$teacherInCharge[0]['fname']." ".$teacherInCharge[0]['lname'].", This a quick reminder of your login details: https://rccgvhl.mmsapp.org Username: ".$teacherInCharge[0]['username']."Password: ".$teacherInCharge[0]['password']."Thank you. - MMS Team";
                    $smsCount = strlen($secondAttendanceTextMessage);
                    if(round($smsCount / 160) == 0){ $sentSMSCount = "1"; }else{ $sentSMSCount = round($smsCount / 160); };
                    $sms2Array = array(
                        'msg'   =>  $secondAttendanceTextMessage,
                        'to'    =>  $teacherInCharge[0]['fname'],
                        'toId'  =>  $teacherInCharge[0]['id'],
                        'sentSMSCount' => $sentSMSCount
                    );
                    $this->data->insert('sms', $sms2Array);
                    $this->sendSMS1('RCCGVHL', $teacherInCharge[0]['mobileNo'], $secondAttendanceTextMessage);
                    $this->data->update(array('id' => $TIC),'member', array('isTeacherInCharge' => '1', 'teacherClass' => $classId));
                }
                redirect("admin/view/viewClasses/".$classId,"refresh");
            }
            
            //Mempacas Insert Code
            if($table == 'mempacasGroup') {
                $mempacas['groupName'] = $data['groupName'];
                $GICs = $data['generalInCharge'];
                foreach($GICs as $GIC) {
                    $GICName = $this->data->fetch('member', array('id' => $GIC));
                    $GICName1[] = $GICName[0]['title']." ".$GICName[0]['fname']." ".$GICName[0]['lname'];
                    $GICId[] = $GICName[0]['id'];
                }
                
                $members = $data['membersName'];
                foreach($members as $mem) {
                    $member = $this->data->fetch('member', array('id' => $mem));
                    $name1[] = $member[0]['fname']." ".$member[0]['lname'];
                    $id[] = $member[0]['id'];
                }
                
                $mempacas['generalInCharge'] = implode(",", $GICName1);
                $mempacas['generalInChargeId'] = implode(",", $GICId);
                $mempacas['membersId'] = implode(",", $id);
                $mempacas['membersName'] = implode(",", $name1);
                
                $this->data->insert($table, $mempacas);
                $mempacaId = $this->db->insert_id();
                foreach($members as $mem){
                    $this->data->update(array('id' => $mem), 'member', array('mempacasGroup' => $mempacaId));
                }
                
                foreach($GICs as $GIC) {
                    $GICName = $this->data->fetch('member', array('id' => $GIC));
                    $generalInCharge['userId'] = $GICName[0]['id'];
                    $generalInCharge['groupId'] = $mempacaId;
                    $generalInCharge['name'] = $GICName[0]['title']." ".$GICName[0]['fname']." ".$GICName[0]['lname'];
                    $generalInCharge['totalMembers'] = count($members);
                    $this->data->insert('generalInCharges', $generalInCharge);
                    $password = $this->randomPassword();
                    $this->data->update(array('id' => $GIC),'member', array('isGeneralInCharge' => '1', 'generalGroup' => $mempacaId));
                }
                redirect("admin/view/viewMempacasGroup/".$mempacaId,"refresh");
            }
            //Mempacas End
            
            //HOD Insert Code
            if($table == 'HOD'){
                $hod = array();
                $hod['memberId'] = $data['member'];
                $memberDetail = $this->data->fetch('member', array('id' => $data['member']));
                $hod['member'] = $memberDetail[0]['title']." ".$memberDetail[0]['fname']." ".$memberDetail[0]['lname'];
                $hod['departmentName'] = $data['departmentName'];
                $hod['departmentPosition'] = $data['departmentPosition'];
                $this->data->insert('HOD', $hod);
                redirect('admin/view/viewHOD', "refresh");
            }
            //HOD End
            
            if($table == "reminders"){
                $a = array();
                if($data['starting']['date'] < $data['ending']['date']){
                    $starting = strtotime($data['starting']['date']);
                    $ending = strtotime($data['ending']['date']);
                    while($starting < $ending){
                        $starting += 86400;
                        $now = date("Y-m-d",$starting);
                        $a = array();
                        $a['desc'] = $data['desc'];
                        $a['date'] = $now;
                        $a['user_id'] = 0;
                        $this->data->insert($table,$a);
                    }
                }else{
                    $a['desc'] = $data['desc'];
                    $a['date'] = $data['starting']['date'];
                    $a['user_id'] = 0;
                    $this->data->insert($table,$a);
                }
                redirect("admin/view/calender","refresh");
            }
            
            if ($table == "advert"){
                $data['user_id'] = 0;
                $x = $this->do_upload_advert($_FILES);
                if(isset($x['upload_data'])){
                    if(isset($x['upload_data'][0])){
                        $data['horizontal'] = $x['upload_data'][0]['file_name'];
                    }
                    if(isset($x['upload_data'][1])){
                        $data['vertical'] = $x['upload_data'][1]['file_name'];
                    }
                }
                if($data['payment'] == 'on'){
                    $data['status'] = 'paid';
                }else{
                    $data['status'] = 'unpaid';
                }
                unset($data['payment']);
                $data['approval'] = '1';
                $this->data->insert($table, $data);
            }
            
            if ($table == "testimonies") {
                $data['user_id'] = $data['user_id'];
                $data['approval'] = 0;
                $x = $this->do_uploadTesti($_FILES);
                // print_r($x['upload_data']);
                if(isset($x['upload_data'])){
                    if(isset($x['upload_data'][0])){
                        $data['file1'] = $x['upload_data'][0]['file_name'];
                    }
                    if(isset($x['upload_data'][1])){
                        $data['file2'] = $x['upload_data'][1]['file_name'];
                    }
                }
                unset($data['fileTesti']);
                $this->data->insert($table, $data);
            }
            
            if($table == "credentials"){
                if(isset($data['access'])){
                    $data['access'] = json_encode($data['access']);
                }
                if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['name'])){
                    $x=$this->do_upload($_FILES);
                    if(isset($x['upload_data'])){
                        $data['picture'] = 'assets_f/img/'.$x['upload_data']['file_name'];
                    }
                }
                $this->data->insert($table,$data);
            }
            
            if($table == "words"){
                $data['message'] = str_replace("<script>","&lt;script&gt;",$data['message']);
                $data['message'] = str_replace("</script>","&lt;/script&gt;",$data['message']);
                $data['message'];
                $data['members'] = (isset($data['members']) AND !empty($data['members'])) ? json_encode($data['members'],true) : "" ;
                $x = $this->do_wordlog_upload($_FILES);
                if(isset($x['upload_data'])) {
                    $data['uploadFile'] = 'assets_f/wordlog/'.$x['upload_data']['file_name'];
                }
                $this->data->insert($table, $data);
                $this->sendPush("New Wordlog ".$data['title']." have been added by Admin.", 123, site_url()."home/view/view_word");
            }
            
            if($table == "bulletin"){
                $data['text'] = str_replace("<script>","&lt;script&gt;",$data['text']);
                $data['text'] = str_replace("</script>","&lt;/script&gt;",$data['text']);
                if(isset($_FILES) && !empty($_FILES) && !empty($_FILES['image']['name'])){
                    $x=$this->do_upload_bulletin($_FILES);
                    if(isset($x['upload_data'])){
                        $data['image'] = 'assets_f/img/'.$x['upload_data']['file_name'];
                    }
                }
                $members = $data['member'];
                $members = implode(",", $members);
                unset($data['member']);
                $data['members'] = $members;
                $this->data->insert($table,$data);
                $this->sendPush("News and Bulletin ".$data['title']." has been added.", 123, site_url()."home/view/bulletin");
                //Send mail
                $get = $this->data->fetch($table,$data);
                $sub = "Membership Management System";
                redirect("admin/view/".$red,"refresh");
            }
            
            if($table == "books"){
                $x = $this->do_upload1($_FILES);
                $data['image'] = $x['upload_data'][0]['file_name'];
                $data['file'] = $x['upload_data'][1]['file_name'];
                $this->data->insert($table,$data);
                $this->sendPush("Book ".$data['title']." has been added.", 123, site_url()."home/view/bookStore");
                $temp = file_get_contents(site_url('admin/notifEmailtemp')."?msg=Book");
                $sub = "Membership Management System";
                $xx = $this->data->fetch("member", array('status' => 'active'));
                redirect("admin/view/bookstore","refresh");
            }
            
            if($table == "offerings"){
                $data['date'] = date("Y-m-d",strtotime($data['date']))." 00:00:00";
                $this->data->insert($table,$data);
                redirect("admin/view/".$red,"refresh");
            }
            
            if($table == "donations"){
                $data1['admin_id'] = $check[0]['id'];
                if($data['anonymous']){
                    $data1['user_id'] = 0;
                }else{
                    $data1['user_id'] = $data['member'];
                }
                $data1['purpose'] = $data['purpose'];
                $data1['amount'] = $data['amount'];
                $data1['modeOfPayment'] = $data['modeOfPayment'];
                $data1['detail'] = $data['detail'];
                $this->data->insert($table, $data1);
                redirect("admin/view/".$red,"refresh");
            }
            if($table == "lifetochrist"){
                $data['date'] = date("Y-m-d",strtotime($data['date']))." 00:00:00";
                $data['contact'] = substr($data['contact'], 1);
                $data['contact'] = str_replace("+", "", $data['contact']);
                if(!empty($data['comment'])){
                    $data['comment'] = $data['comment'];
                }else{
                    $data['comment'] = "Yet to follow up";
                }
                $data['admin_id'] = $check[0]['id'];
                $this->data->insert($table,$data);
                $data1['christConvert_id'] = $this->db->insert_id();
                $data1['admin_id'] = $check[0]['id'];
                $data1['reply_text'] = $data['comment'];
                $this->data->insert('christConvertComment', $data1);
                redirect("admin/view/".$red,"refresh");
            }
            if($table == "tithes"){
                if(!empty($data['remittance'])){
                    $data['remittance'] = $data['remittance'];
                }else{
                    $data['remittance'] = 10;
                }
                $data['date'] = date("Y-m-d",strtotime($data['date']))." 00:00:00";
                $this->data->insert($table, $data);
                redirect("admin/view/".$red,"refresh");
            }
            if($table == 'bulletin'){
                $get = $this->data->fetch($table,$data);
                $x = file_get_contents(site_url('admin/notifEmailtempForbulletin')."?id=".$get[0]['id']);
                $sub = "Membership Management System";
                $xx = $this->data->fetch("member", array('status' => 'active'));
                foreach($xx as $xs){
                    if(!empty($xs['email'])){
                        if($xs['emailSub']){
                            $to[] = $xs['email'];
                            $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->bcc($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                        }
                    }
                }
                redirect("admin/view/".$red,"refresh");
            }
            if($table == 'attendance'){
                $data['adminUser'] = $check[0]['id'];
                $this->data->insert($table, $data);
            }
            if($table == 'keepersNetwork'){
                $this->data->insert($table, $data);
            }
            redirect("admin/view/".$red,"refresh");
        }
        
        public function unsubscribe(){
            $id = $this->input->get('id');
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
            <script>
                $(document).ready(function () {
                    setTimeout(function () {
                        swal({
                          title: 'Are you sure?',
                          text: "You want to stop receiving email notifications?",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes',
                          cancelButtonText: 'Cancel'
                        }).then((result) => {
                          if (result.value) {
                            <?php $this->data->update(array("id"=>$id),"member",array("emailSub"=>"0")); ?>      
                            swal(
                              'Unsubscribe',
                              'Unsubscribed Successfully. You can subscribe again from you login.',
                              'success'
                            );
                            window.location.href="<?= base_url() ?>home";
                          }else{
                              swal(
                                  'Cancel',
                                  'Unsubscribed Unsuccessfully.',
                                  'warning'
                              );
                              window.location.href="<?= base_url() ?>home";
                          }
                        });
                    }, 1000);
                });
            </script>
            <?php
            // $this->data->update(array("id"=>$id),"member",array("emailSub"=>"0"));
            // echo "Unsubscribed Successfully. You can subscribe again from you login.";
        }
        
        public function delete($table,$id,$red){
            $this->data->delete(array('id'=>$id),$table);
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function deleteSMS($table, $id, $red) {
            $this->data->update(array('id' => $id), $table, array('deleted' => 1, 'deletedAt' => date('Y-m-d H:i:s')));
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function deleteMempacasGroup($table, $id, $red) {
            $this->data->myquery("UPDATE `member` SET isGeneralInCharge = 0 WHERE generalGroup in (".$id.")");
            $this->data->delete(array('groupId' => $id), 'mempacasGroupMember');
            $this->data->delete(array('groupId' => $id), 'generalInCharges');
            $this->data->delete(array('groupId' => $id), 'generalResponse');
            $this->data->delete(array('id' => $id), $table);
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function deleteChildRegistrationGroup($table, $id, $red) {
            $this->data->myquery('Update `member` SET isTeacherInCharge = 0, teacherClass = "", isParentAlloted = 0 WHERE teacherClass in ('.$id.')');
            $this->data->myquery('Update `children` SET isAlotted = 0, classId = NULL WHERE classId in ('.$id.')');
            $this->data->delete(array('childGroupId' => $id), 'childrenGroupMembers');
            $this->data->delete(array('classId' => $id), 'incidentReports');
            $this->data->delete(array('classId' => $id), 'markAttendance');
            $this->data->delete(array('classId' => $id), 'teacherInCharge');
            $this->data->delete(array('classId' => $id), 'teacherResponse');
            $this->data->delete(array('id' => $id), $table);
            if($red == 'same') {
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red, "refresh");
            }
        }
        
        
        public function memberDelete($id, $red){
            $this->data->delete(array('user_id' => $id), 'advert');
            $this->data->delete(array('user_id' => $id), 'birthnotifdesktop');
            $this->data->delete(array('user_id' => $id), 'btrigers');
            $this->data->delete(array('user_id' => $id), 'buddies');
            $this->data->delete(array('user_id' => $id), 'business');
            $this->data->delete(array('user_id' => $id), 'childtriggers');
            $this->data->delete(array('user_id' => $id), 'custom_invoice');
            $this->data->delete(array('user_id' => $id), 'donations');
            $this->data->delete(array('user_id' => $id), 'groupdisc');
            $this->data->delete(array('user_id' => $id), 'membgroup');
            $this->data->delete(array('userId' => $id), 'mybooks');
            $this->data->delete(array('user_id' => $id), 'notifs');
            $this->data->delete(array('parent_id' => $id), 'children');
            $this->data->delete(array('user_id' => $id), 'offers');
            $this->data->delete(array('user_id' => $id), 'page_req');
            $this->data->delete(array('user_id' => $id), 'p_request');
            $this->data->delete(array('user_id' => $id), 'reminders');
            $this->data->delete(array('user_id' => $id), 'reviews');
            $this->data->delete(array('user_id' => $id), 'support');
            $this->data->delete(array('user_id' => $id), 'testimonies');
            $this->data->delete(array('id' => $id), 'member');
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function advertDelete($id, $red) {
            $this->data->delete(array('id' => $id), 'advert');
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function do_upload1($files){
            $config['upload_path'] = 'assets_f/img';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|jpeg|GIF|JPG|PNG|PDF|DOC|DOCX|JPEG';
            $config['encrypt_name'] = TRUE;
            //$config['max_size'] = '100000';
            $this->load->library('upload', $config);
            foreach ($files as $key => $val) {
                if (!$this->upload->do_upload($key)) {
                    $data = $this->upload->display_errors();
                    var_dump($data);die;
                } else {
                    $data['upload_data'][] = $this->upload->data();
                }
            }
            return $data;
        }
        
        public function do_upload_audio($files) {
            $config['upload_path'] = 'assets/voicenote';
            $config['allowed_types'] = 'mp4|wav|ogg|MP4|WAV|OGG|3GP|3gp|m4a|M4A|MP3|mp3';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 1024 * 1024;
            $this->load->library('upload', $config);
            foreach($files as $key => $val) {
                if(!$this->upload->do_upload($key)) {
                    $data = $this->upload->display_errors();
                    var_dump($data); die;
                }else {
                    $data['upload_data'][] = $this->upload->data();
                }
            }
            return $data;
        }
        
        public function do_uploadTesti($files){
            $config['upload_path'] = 'assets_f/img/business';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
            $config['max_size'] = '100000';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $data = array();
            $i = 0;
            for($j = 0; $j < count($files['fileTesti']['name']); $j++){
                $_FILES['fileTesti']['name']= $files['fileTesti']['name'][$j];
                $_FILES['fileTesti']['type']= $files['fileTesti']['type'][$j];
                $_FILES['fileTesti']['tmp_name']= $files['fileTesti']['tmp_name'][$j];
                $_FILES['fileTesti']['error']= $files['fileTesti']['error'][$j];
                $_FILES['fileTesti']['size']= $files['fileTesti']['size'][$j];    
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('fileTesti');
                $data['upload_data'][] = $this->upload->data();
            }
            return $data;
        }
        
        public function do_upload2($files){
        // $config['file_name'] = $newfile_name;
        $config['upload_path'] = 'assets_f/img/business';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '100000';
        $this->load->library('upload', $config);
        $data = array();
        foreach ($files as $key => $val) {
            if (!$this->upload->do_upload($key)) {
                echo $this->upload->display_errors();die;
            } else {
                $data['upload_data'][] = $this->upload->data();
                $fullpath = $data['upload_data'][0]['full_path'];
                $exif = exif_read_data($fullpath);
                if(empty($exif['Orientation'])){
                    $img = $data['upload_data'][0]['file_name'];
                    $config['image_library'] = "ImageMagick";
                    $config['library_path'] = '/usr/bin';
                    $config['source_image'] = 'assets_f/img/business/'.$img;
                    $config['new_image'] = 'assets_f/img/business/';
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = "70%";
                    $config['padding']  = '20';
                    $config['width']    = 800;
                    $config['height']   = 800;
                    $oris = array();
                    // $oris[] = '90';
                    // foreach ($oris as $ori) {
                    //   $config['rotation_angle'] = $ori;
                       
                    // }
                    $this->load->library('image_lib', $config); 
                    if (!$this->image_lib->resize()) {
                        $data['error'] = $this->image_lib->display_errors();
                        return $data;
                    }
                    else
                    {
                        $this->image_lib->rotate();
                        return $data; /*and some code here*/
                    }
                }else{
                    $img=$data['upload_data'][0]['file_name'];
                    $config['image_library'] = 'ImageMagick';
                    $config['library_path'] = '/usr/bin';
                    $config['source_image'] = 'assets_f/img/business/'.$img;
                    $config['new_image'] = 'assets_f/img/business/';
                    $config['maintain_ratio'] = TRUE;
                    $config['rotate_by_exif'] = TRUE;
                    $config['strip_exif']     = TRUE;
                    $config['quality'] = "100%";
                    $config['width']    = 300;
                    $config['height']   = 300;
                    // $config['padding'] = '20';
                    $this->load->library('image_lib');
                    // $this->load->helper('file');
                    $oris = array();
                    $this->image_lib->initialize($config);
                    //$this->image_lib->fit();
                    if (!$this->image_lib->resize()) {
                        $data['error'] = $this->image_lib->display_errors();
                        return $data;
                    }
                    else
                    {
                        $this->image_lib->rotate();
                        return $data; /*and some code here*/
                    }
                }
            }
        }
        $this->image_lib->clear();
        unset($config);
        return $data;
    }
    
        public function do_upload($files){
            $config['upload_path'] = 'assets_f/img/business';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
            $config['max_size'] = '';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            foreach ($files as $key => $val) {
                if (!$this->upload->do_upload($key)) {
                    // $data = $this->upload->display_errors();
                } else {
                    $data['upload_data'] = $this->upload->data();
                }
            }
            return $data;
        }
        
        public function do_wordlog_upload($files) {
            $config['upload_path']  =   'assets_f/wordlog';
            $config['allowed_types'] = 'ppt|pptx|PPT|PPTX|pdf|PDF|xls|XLS|xlsx|XLSX|doc|docx|DOC|DOCX';
            $config['max_size'] = '';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            foreach($files as $key => $val) {
                if(!$this->upload->do_upload($key)) {
                    $data['error'] = $this->upload->display_errors();
                }else{
                    $data['upload_data'] = $this->upload->data();
                }
            }
            return $data;
        }
        
        public function do_upload_logo($files){
            $config['upload_path'] = 'assets_f';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
            $config['max_size'] = '';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            foreach ($files as $key => $val) {
                if (!$this->upload->do_upload($key)) {
                    // $data = $this->upload->display_errors();
                } else {
                    $data['upload_data'] = $this->upload->data();
                }
            }
            return $data;
        }
        
        public function do_upload_advert($files){
        $config['upload_path'] = 'assets_f/img/business';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '100000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $data = array();
        $i = 0;
        for($j = 0; $j < count($files['advert']['name']); $j++){
            $_FILES['advert']['name']= $files['advert']['name'][$j];
            $_FILES['advert']['type']= $files['advert']['type'][$j];
            $_FILES['advert']['tmp_name']= $files['advert']['tmp_name'][$j];
            $_FILES['advert']['error']= $files['advert']['error'][$j];
            $_FILES['advert']['size']= $files['advert']['size'][$j];    
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('advert');
            $data['upload_data'][] = $this->upload->data();
        }
        return $data;
    }
    
    private function set_upload_options()
    {   
        //upload an image options
        $config = array();
        $config['upload_path'] = 'assets_f/img/business';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '100000';
        $config['encrypt_name'] = TRUE;
    
        return $config;
    }
    
        public function do_upload_bulletin($files){
            $config['upload_path'] = 'assets_f/img';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
            $config['max_size'] = '';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            foreach ($files as $key => $val) {
                if (!$this->upload->do_upload($key)) {
                    $data = $this->upload->display_errors();
                } else {
                    $data['upload_data'] = $this->upload->data();
                }
            }
            return $data;
        }
        
        public function logout(){
            $this->session->unset_userdata("userAdmin");
            redirect("admin/",'refresh');
        }
        
        public function login(){
            $data['msg']=$this->session->userdata('msg');
            $this->session->unset_userdata('msg');
            $this->session->unset_userdata("userAdmin");
            $this->session->unset_userdata("userMember");
            $this->load->view('back/login',$data);
        }
        
        public function dologin(){
            $data = $this->input->post();
            $data = $this->data->scrubbing($data);
            $check = $this->data->fetch('credentials',$data);
            if(empty($check)){
                $this->session->set_userdata("msg","Invalid Credentials");
            }else{
                unset($check[0]['password']);
                //var_dump($check);die;
                $this->session->set_userdata("userAdmin",$check);
            }
            redirect('admin/view/index');
        }
        
        public function fullCalendar(){
            $events = array();
            $reminder = $this->data->myquery("SELECT * FROM `reminders` WHERE adminId = 1");
            foreach($reminder as $fetch){
             $e = array();
             $e['id'] = $fetch['event_id'];
             $e['title'] = $fetch['desc'];
             $e['allDay'] = true;
             $e['start'] = date('Y-m-d', strtotime($fetch['date']));
             $e['end'] = date('Y-m-d', strtotime($fetch['endDate'].' +1 days'));
            //  $e['url']  = $fetch['link'];
             $e['eventDesc'] = $fetch['eventDesc'];
             array_push($events, $e);
            }
            echo json_encode($events);
        }
        
        public function getMonthlyGraph() {
            $year = $this->input->post('year');
            /**/
            $data['fMonths'][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-01-30' AND `dOfJoining` >= '{$year}-01-01') AND `first_time` = 'yes' ");
            $data['fMonths'][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-02-30' AND `dOfJoining` >= '{$year}-02-01') AND `first_time` = 'yes' ");
            $data['fMonths'][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-03-30' AND `dOfJoining` >= '{$year}-03-01') AND `first_time` = 'yes' ");
            $data['fMonths'][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-04-30' AND `dOfJoining` >= '{$year}-04-01') AND `first_time` = 'yes' ");
            $data['fMonths'][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-05-30' AND `dOfJoining` >= '{$year}-05-01') AND `first_time` = 'yes' ");
            $data['fMonths'][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-06-30' AND `dOfJoining` >= '{$year}-06-01') AND `first_time` = 'yes' ");
            $data['fMonths'][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-07-30' AND `dOfJoining` >= '{$year}-07-01') AND `first_time` = 'yes' ");
            $data['fMonths'][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-08-30' AND `dOfJoining` >= '{$year}-08-01') AND `first_time` = 'yes' ");
            $data['fMonths'][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-09-30' AND `dOfJoining` >= '{$year}-09-01') AND `first_time` = 'yes' ");
            $data['fMonths'][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-10-30' AND `dOfJoining` >= '{$year}-10-01') AND `first_time` = 'yes' ");
            $data['fMonths'][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-11-30' AND `dOfJoining` >= '{$year}-11-01') AND `first_time` = 'yes' ");
            $data['fMonths'][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-12-30' AND `dOfJoining` >= '{$year}-12-01') AND `first_time` = 'yes'");
            /**/

            /**/
            $data['rMonths'][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-01-30' AND `dOfJoining` >= '{$year}-01-01') AND `first_time` = 'no' ");
            $data['rMonths'][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-02-30' AND `dOfJoining` >= '{$year}-02-01') AND `first_time` = 'no' ");
            $data['rMonths'][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-03-30' AND `dOfJoining` >= '{$year}-03-01') AND `first_time` = 'no' ");
            $data['rMonths'][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-04-30' AND `dOfJoining` >= '{$year}-04-01') AND `first_time` = 'no' ");
            $data['rMonths'][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-05-30' AND `dOfJoining` >= '{$year}-05-01') AND `first_time` = 'no' ");
            $data['rMonths'][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-06-30' AND `dOfJoining` >= '{$year}-06-01') AND `first_time` = 'no' ");
            $data['rMonths'][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-07-30' AND `dOfJoining` >= '{$year}-07-01') AND `first_time` = 'no' ");
            $data['rMonths'][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-08-30' AND `dOfJoining` >= '{$year}-08-01') AND `first_time` = 'no' ");
            $data['rMonths'][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-09-30' AND `dOfJoining` >= '{$year}-09-01') AND `first_time` = 'no' ");
            $data['rMonths'][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-10-30' AND `dOfJoining` >= '{$year}-10-01') AND `first_time` = 'no' ");
            $data['rMonths'][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-11-30' AND `dOfJoining` >= '{$year}-11-01') AND `first_time` = 'no' ");
            $data['rMonths'][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-12-30' AND `dOfJoining` >= '{$year}-12-01') AND `first_time` = 'no'");
            /**/
                
            $data['lcountMonths'][0] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 1 AND `year` = ".$year.")");
            $data['lcountMonths'][1] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 2 AND `year` = ".$year.")");
            $data['lcountMonths'][2] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 3 AND `year` = ".$year.")");
            $data['lcountMonths'][3] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 4 AND `year` = ".$year.")");
            $data['lcountMonths'][4] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 5 AND `year` = ".$year.")");
            $data['lcountMonths'][5] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 6 AND `year` = ".$year.")");
            $data['lcountMonths'][6] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 7 AND `year` = ".$year.")");
            $data['lcountMonths'][7] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 8 AND `year` = ".$year.")");
            $data['lcountMonths'][8] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 9 AND `year` = ".$year.")");
            $data['lcountMonths'][9] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 10 AND `year` = ".$year.")");
            $data['lcountMonths'][10] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 11 AND `year` = ".$year.")");
            $data['lcountMonths'][11] = $this->data->myquery("SELECT count FROM `loginCount` WHERE (`month` = 12 AND `year` = ".$year.")");
            echo json_encode($data);
        }
        
        public function getFTimerGraph() {
            $year = $this->input->post('year');
            $data['fMonths'][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-01-30' AND `dOfJoining` >= '{$year}-01-01') AND `first_time` = 'yes' ");
            $data['fMonths'][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-02-30' AND `dOfJoining` >= '{$year}-02-01') AND `first_time` = 'yes' ");
            $data['fMonths'][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-03-30' AND `dOfJoining` >= '{$year}-03-01') AND `first_time` = 'yes' ");
            $data['fMonths'][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-04-30' AND `dOfJoining` >= '{$year}-04-01') AND `first_time` = 'yes' ");
            $data['fMonths'][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-05-30' AND `dOfJoining` >= '{$year}-05-01') AND `first_time` = 'yes' ");
            $data['fMonths'][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-06-30' AND `dOfJoining` >= '{$year}-06-01') AND `first_time` = 'yes' ");
            $data['fMonths'][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-07-30' AND `dOfJoining` >= '{$year}-07-01') AND `first_time` = 'yes' ");
            $data['fMonths'][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-08-30' AND `dOfJoining` >= '{$year}-08-01') AND `first_time` = 'yes' ");
            $data['fMonths'][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-09-30' AND `dOfJoining` >= '{$year}-09-01') AND `first_time` = 'yes' ");
            $data['fMonths'][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-10-30' AND `dOfJoining` >= '{$year}-10-01') AND `first_time` = 'yes' ");
            $data['fMonths'][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-11-30' AND `dOfJoining` >= '{$year}-11-01') AND `first_time` = 'yes' ");
            $data['fMonths'][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-12-30' AND `dOfJoining` >= '{$year}-12-01') AND `first_time` = 'yes'");
            /**/

            /**/
            $data['rMonths'][0]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-01-30' AND `dOfJoining` >= '{$year}-01-01') AND `first_time` = 'no' ");
            $data['rMonths'][1]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-02-30' AND `dOfJoining` >= '{$year}-02-01') AND `first_time` = 'no' ");
            $data['rMonths'][2]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-03-30' AND `dOfJoining` >= '{$year}-03-01') AND `first_time` = 'no' ");
            $data['rMonths'][3]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-04-30' AND `dOfJoining` >= '{$year}-04-01') AND `first_time` = 'no' ");
            $data['rMonths'][4]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-05-30' AND `dOfJoining` >= '{$year}-05-01') AND `first_time` = 'no' ");
            $data['rMonths'][5]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-06-30' AND `dOfJoining` >= '{$year}-06-01') AND `first_time` = 'no' ");
            $data['rMonths'][6]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-07-30' AND `dOfJoining` >= '{$year}-07-01') AND `first_time` = 'no' ");
            $data['rMonths'][7]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-08-30' AND `dOfJoining` >= '{$year}-08-01') AND `first_time` = 'no' ");
            $data['rMonths'][8]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-09-30' AND `dOfJoining` >= '{$year}-09-01') AND `first_time` = 'no' ");
            $data['rMonths'][9]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-10-30' AND `dOfJoining` >= '{$year}-10-01') AND `first_time` = 'no' ");
            $data['rMonths'][10]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-11-30' AND `dOfJoining` >= '{$year}-11-01') AND `first_time` = 'no' ");
            $data['rMonths'][11]=$this->data->myquery("SELECT COUNT(`id`) as amount FROM `member` WHERE (`dOfJoining` <= '{$year}-12-30' AND `dOfJoining` >= '{$year}-12-01') AND `first_time` = 'no'");
            echo json_encode($data);
            
        }
        
        public function getDonationGraph() {
            $year = $this->input->post('year');
            $data['dMonths'][0]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-01-30' AND `date` >= '{$year}-01-01' ");
            $data['dMonths'][1]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-02-30' AND `date` >= '{$year}-02-01' ");
            $data['dMonths'][2]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-03-30' AND `date` >= '{$year}-03-01' ");
            $data['dMonths'][3]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-04-30' AND `date` >= '{$year}-04-01' ");
            $data['dMonths'][4]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-05-30' AND `date` >= '{$year}-05-01' ");
            $data['dMonths'][5]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-06-30' AND `date` >= '{$year}-06-01' ");
            $data['dMonths'][6]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-07-30' AND `date` >= '{$year}-07-01' ");
            $data['dMonths'][7]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-08-30' AND `date` >= '{$year}-08-01' ");
            $data['dMonths'][8]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-09-30' AND `date` >= '{$year}-09-01' ");
            $data['dMonths'][9]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-10-30' AND `date` >= '{$year}-10-01' ");
            $data['dMonths'][10]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-11-30' AND `date` >= '{$year}-11-01' ");
            $data['dMonths'][11]=$this->data->myquery("SELECT SUM(`amount`) as amount FROM `donations` WHERE `date` <= '{$year}-12-30' AND `date` >= '{$year}-12-01' ");
            echo json_encode($data);
        }
        
        public function addFullCalendar() {
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                if($data['membCheck'] == 'on'){
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $image = $x['upload_data']['file_name'];
                        }
                    }
                    $url = parse_url($data['link']);
                    if($url['scheme'] == 'https' || $url['scheme'] == 'http'){
                        $link = $data['link'];
                    }else{
                        $link = "https://".$data['link'];
                    }
                    // $data1['link'] = $link;
                    $result = array(
                        'date' => date('Y-m-d', strtotime($data['startDate'])),
                        'endDate'   => date('Y-m-d', strtotime($data['endDate'])),
                        'user_id'   => implode(',', $data['member']),
                        'desc'     => $data['title'],
                        'link'      => $link,
                        'image'     => $image,
                        'reminder_event' => $data['reminder_event'],
                        'isReminded' => "1",
                        'adminId' => $check[0]['id'],
                        'isAdmin' => 1,
                        'eventDesc' => $data['desc']
                    );
                    $this->data->insert('reminders', $result);
                    $insert_id = $this->db->insert_id();
                    for($i = 0; $i < count($data['preacher']); $i++){
                        $date = date('Y-m-d', strtotime($data['startDate']. ' + '.($i).' days'));
                        $reminderDesc = array(
                            'eventId' => $insert_id,
                            'date' => $date,
                            'preacherBy' => $data['preacher'][$i],
                            'startTime' => $data['startTime'][$i],
                            'endTime' => $data['endTime'][$i]
                        );
                        $this->data->insert('reminderDescription', $reminderDesc);
                    }
                }
                
                //For Business Group
                if($data['bGroupCheck'] == 'on'){
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $data1['image'] = $x['upload_data']['file_name'];
                        }
                    }
                    $memberBGroup = $this->data->fetch('member', array('businessGroup' => $data['bGroup'], 'status' => 'active'));
                    foreach($memberBGroup as $mem){
                        $member[] .= $mem['id'];
                    }
                    $url = parse_url($data['link']);
                    if($url['scheme'] == 'https' || $url['scheme'] == 'http'){
                        $link = $data['link'];
                    }else{
                        $link = "https://".$data['link'];
                    }
                    $result = array(
                        'date' => date('Y-m-d', strtotime($data['startDate'])),
                        'endDate'   => date('Y-m-d', strtotime($data['endDate'])),
                        'user_id'   => implode(',', $member),
                        'desc'     => $data['title'],
                        'link'      => $link,
                        'image'     => $image,
                        'reminder_event' => $data['reminder_event'],
                        'isReminded' => "1",
                        'adminId' => $check[0]['id'],
                        'isAdmin' => 1,
                        'eventDesc' => $data['desc']
                    );
                    $this->data->insert('reminders', $result);
                    $insert_id = $this->db->insert_id();
                    for($i = 0; $i < count($data['preacher']); $i++){
                        $date = date('Y-m-d', strtotime($data['startDate']. ' + '.($i).' days'));
                        $reminderDesc = array(
                            'eventId' => $insert_id,
                            'date' => $date,
                            'preacherBy' => $data['preacher'][$i],
                            'startTime' => $data['startTime'][$i],
                            'endTime' => $data['endTime'][$i]
                        );
                        $this->data->insert('reminderDescription', $reminderDesc);
                    }
                }
                
                //For Church Group
                if($data['churchCheck'] == 'on'){
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $data1['image'] = $x['upload_data']['file_name'];
                        }
                    }
                    $memberCGroup = $this->data->fetch('membgroup', array('g_id' => $data['church']));
                    foreach($memberCGroup as $mem){
                        $member[] .= $mem['user_id'];
                    }
                    $url = parse_url($data['link']);
                    if($url['scheme'] == 'https' || $url['scheme'] == 'http'){
                        $link = $data['link'];
                    }else{
                        $link = "https://".$data['link'];
                    }
                    $result = array(
                        'date' => date('Y-m-d', strtotime($data['startDate'])),
                        'endDate'   => date('Y-m-d', strtotime($data['endDate'])),
                        'user_id'   => implode(',', $member),
                        'desc'     => $data['title'],
                        'link'      => $link,
                        'image'     => $image,
                        'reminder_event' => $data['reminder_event'],
                        'isReminded' => "1",
                        'adminId' => $check[0]['id'],
                        'isAdmin' => 1,
                        'eventDesc' => $data['desc']
                    );
                    $this->data->insert('reminders', $result);
                    $insert_id = $this->db->insert_id();
                    for($i = 0; $i < count($data['preacher']); $i++){
                        $date = date('Y-m-d', strtotime($data['startDate']. ' + '.($i).' days'));
                        $reminderDesc = array(
                            'eventId' => $insert_id,
                            'date' => $date,
                            'preacherBy' => $data['preacher'][$i],
                            'startTime' => $data['startTime'][$i],
                            'endTime' => $data['endTime'][$i]
                        );
                        $this->data->insert('reminderDescription', $reminderDesc);
                    }
                }
                $redirect .= "/fetchCalendar?received=true";
                redirect('admin' . $redirect, 'refresh');
            }else{
                $this->login();
            }
        }
        
        public function editFullCalendar($eventId) {
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $image = $x['upload_data']['file_name'];
                        }
                    }
                    $result = array(
                        'date' => date('Y-m-d', strtotime($data['startDate'])),
                        'endDate'   => date('Y-m-d', strtotime($data['endDate'])),
                        'desc'     => $data['title'],
                        'link'      => $data['link'],
                        'image'     => $image,
                        'reminder_event' => $data['reminder_event'],
                        'isReminded' => "1",
                        'adminId' => $check[0]['id'],
                        'isAdmin' => 1,
                        'eventDesc' => $data['desc']
                    );
                    $this->data->update(array("event_id" => $eventId), "reminders", $result);
                    for($i = 0; $i < count($data['preacher']); $i++){
                        $date = date('Y-m-d', strtotime($data['startDate']. ' + '.($i).' days'));
                        $reminderDesc = array(
                            'date' => $date,
                            'preacherBy' => $data['preacher'][$i],
                            'startTime' => $data['startTime'][$i],
                            'endTime' => $data['endTime'][$i]
                        );
                        $this->data->update(array("eventId" => $eventId), "reminderDescription", $reminderDesc);
                    }
                $redirect .= "/fetchCalendar?received=true";
                redirect('admin' . $redirect, 'refresh');
            }else{
                $this->login();
            }
        }
        
        public function addFullCalendar1(){
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                if($data['membCheck'] == 'on'){
                    for($i = 0; $i < count($data['member']); $i++){
                        if($data['eventType'] == 'one'){
                            if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                                $x = $this->do_upload($_FILES);
                                if(isset($x['upload_data'])){
                                    $data1['image'] = $x['upload_data']['file_name'];
                                }
                            }
                            $data1['desc'] = $data['title'];
                            $data1['date'] = date('Y-m-d', strtotime($data['eventDate']));
                            $data1['user_id'] = $data['member'][$i];
                            $data1['start'] = $data['starts_at'];
                            $data1['end'] = $data['ends_at'];
                            $data1['link'] = $data['link'];
                            $data1['eventDesc'] = $data['desc'];
                            $data1['reminder_event'] = $data['reminder_event'];
                            $data1['isReminded'] = "1";
                            $data1['adminId'] = 1;
                            $this->data->insert('reminders', $data1);
                            $mem = $this->data->fetch('member', array('id' => $data['member'][$i], 'status' => 'active'));
                            // if($mem[0]['emailSub']){
                            //     $subject = "Event Added By Admin";
                            //     $x = file_get_contents(site_url('admin/emailForEvent'));
                            //     $msg = "Hi ".$mem[0]['fname'].", an event ".$data['title']." has been added by admin.";
                            //     $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                            //     $x = str_replace("{{msg}}", $msg, $x);
                            //     $this->sendMail($x, $subject, $mem[0]['email']);
                            // }
                        }else{
                            if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                                    $x = $this->do_upload($_FILES);
                                    if(isset($x['upload_data'])){
                                        $data2['image'] = $x['upload_data']['file_name'];
                                    }
                                }
                            for($j = 0; $j < count($data['eventDate1']); $j++){
                                $data2['desc'] = $data['title'];
                                $data2['date'] = date('Y-m-d', strtotime($data['eventDate1'][$j]['eventDate']));
                                $data2['user_id'] = $data['member'][$i];
                                $data2['start'] = $data['starts_at1'][$j]['eventStart'];
                                $data2['end'] = $data['ends_at1'][$j]['eventEnd'];
                                $data2['link'] = $data['link'];
                                $data2['eventDesc'] = $data['desc'];
                                $data2['reminder_event'] = $data['reminder_event'];
                                $data2['isReminded'] = "1";
                                $data2['adminId'] = 1;
                                $this->data->insert('reminders', $data2);
                                // $this->sendPush('New event '.$data2['desc'].' have been added by Admin.', 123);
                                $x = file_get_contents(site_url('admin/emailForEvent'));
                                $mem = $this->data->fetch('member', array('id' => $data['member'][$i], 'status' => 'active'));
                                // if($mem[0]['emailSub']){
                                //     $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                                //     $subject = "Event Added By Admin";
                                //     $msg = "Hi ".$mem[0]['fname'].", an event ".$data['title']." has been added by admin.";
                                //     $x = str_replace("{{msg}}", $msg, $x);
                                //     $this->sendMail($x, $subject, $mem[0]['email']);
                                // }
                            }
                        }
                    }
                    $this->sendPush('New event have been added by Admin.', 123, site_url()."home");
                    $this->fetchCalendar();
                }else{
                    for($i = 0; $i < count($data['member']); $i++){
                        if($data['eventType'] == 'one'){
                            if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                                $x = $this->do_upload($_FILES);
                                if(isset($x['upload_data'])){
                                    $data1['image'] = $x['upload_data']['file_name'];
                                }
                            }
                            $data1['desc'] = $data['title'];
                            $data1['date'] = date('Y-m-d', strtotime($data['eventDate']));
                            $data1['user_id'] = $data['member'][$i];
                            $data1['start'] = $data['starts_at'];
                            $data1['end'] = $data['ends_at'];
                            $data1['link'] = $data['link'];
                            $data1['eventDesc'] = $data['desc'];
                            $data1['reminder_event'] = $data['reminder_event'];
                            $data1['isReminded'] = "1";
                            $data1['adminId'] = 1;
                            $this->data->insert('reminders', $data1);
                            $this->sendPush('New event '.$data1['desc'].' have been added by Admin.', 123, site_url()."home");
                            $mem = $this->data->fetch('member', array('id' => $data['member'][$i], 'status' => 'active'));
                            // if($mem[0]['emailSub']){
                            //     $subject = "Event Added By Admin";
                            //     $x = file_get_contents(site_url('admin/emailForEvent'));
                            //     $msg = "Hi ".$mem[0]['fname'].", an event ".$data['title']." has been added by admin.";
                            //     $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                            //     $x = str_replace("{{msg}}", $msg, $x);
                            //     $this->sendMail($x, $subject, $mem[0]['email']);
                            // }
                        }else{
                            if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                                    $x = $this->do_upload($_FILES);
                                    if(isset($x['upload_data'])){
                                        $data2['image'] = $x['upload_data']['file_name'];
                                    }
                                }
                            for($j = 0; $j < count($data['eventDate1']); $j++){
                                $data2['desc'] = $data['title'];
                                $data2['date'] = date('Y-m-d', strtotime($data['eventDate1'][$j]['eventDate']));
                                $data2['user_id'] = $data['member'][$i];
                                $data2['start'] = $data['starts_at1'][$j]['eventStart'];
                                $data2['end'] = $data['ends_at1'][$j]['eventEnd'];
                                $data2['link'] = $data['link'];
                                $data2['eventDesc'] = $data['desc'];
                                $data2['reminder_event'] = $data['reminder_event'];
                                $data2['isReminded'] = "1";
                                $data2['adminId'] = 1;
                                $this->data->insert('reminders', $data2);
                                $this->sendPush('New event '.$data2['desc'].' have been added by Admin.', 123, site_url()."home");
                                $x = file_get_contents(site_url('admin/emailForEvent'));
                                $mem = $this->data->fetch('member', array('id' => $data['member'][$i], 'status' => 'active'));
                                // if($mem[0]['emailSub']){
                                //     $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                                //     $subject = "Event Added By Admin";
                                //     $msg = "Hi ".$mem[0]['fname'].", an event ".$data['title']." has been added by admin.";
                                //     $x = str_replace("{{msg}}", $msg, $x);
                                //     $this->sendMail($x, $subject, $mem[0]['email']);
                                // }
                            }
                        }
                    }
                    $this->fetchCalendar();
                }
                if($data['bGroupCheck'] == 'on'){
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $data1['image'] = $x['upload_data']['file_name'];
                        }
                    }
                    $memberBGroup['member'] = $this->data->fetch('member', array('businessGroup' => $data['bGroup'], 'status' => 'active'));
                    for($i = 0; $i < count($memberBGroup['member']); $i++){
                        $data1['desc'] = $data['title'];
                        $data1['date'] = date('Y-m-d', strtotime($data['eventDate']));
                        $data1['user_id'] = $memberBGroup['member'][$i]['id'];
                        $data1['start'] = $data['starts_at'];
                        $data1['end'] = $data['ends_at'];
                        $data1['link'] = $data['link'];
                        $data1['eventDesc'] = $data['desc'];
                        $data1['reminder_event'] = $data['reminder_event'];
                        $data1['isReminded'] = "1";
                        $data1['adminId'] = 1;
                        $this->data->insert('reminders', $data1);
                        $this->sendPush('New event '.$data1['desc'].' have been added by Admin.', 123, site_url()."home");
                        // print_r($data1);
                        $x = file_get_contents(site_url('admin/emailForEvent'));
                        $mem = $this->data->fetch('member', array('id' => $memberBGroup['member'][$i]['id'], 'status' => 'active'));
                        // if($mem[0]['emailSub']){
                        //     $subject = "Event Added By Admin for your group.";
                        //     $msg = "Hi ".$mem[0]['fname'].", an event ".$data['title']." has been added by admin.";
                        //     $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                        //     $x = str_replace("{{msg}}", $msg, $x);
                        //     $this->sendMail($x, $subject, $mem[0]['email']);
                        // }
                    }
                    $this->fetchCalendar();
                }
                if($data['churchCheck'] == 'on'){
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $data1['image'] = $x['upload_data']['file_name'];
                        }
                    }
                    $memberCGroup['member'] = $this->data->fetch('membgroup', array('g_id' => $data['church']));
                    for($i = 0; $i < count($memberCGroup['member']); $i++){
                        $data1['desc'] = $data['title'];
                        $data1['date'] = date('Y-m-d', strtotime($data['eventDate']));
                        $data1['user_id'] = $memberCGroup['member'][$i]['user_id'];
                        $data1['start'] = $data['starts_at'];
                        $data1['end'] = $data['ends_at'];
                        $data1['link'] = $data['link'];
                        $data1['eventDesc'] = $data['desc'];
                        $data1['reminder_event'] = $data['reminder_event'];
                        $data1['isReminded'] = "1";
                        $data1['adminId'] = 1;
                        // print_r($data1);
                        $this->data->insert('reminders', $data1);
                        $this->sendPush('New event '.$data1['desc'].' have been added by Admin.', 123, site_url()."home");
                        $x = file_get_contents(site_url('admin/emailForEvent'));
                        $mem = $this->data->fetch('member', array('id' => $memberCGroup['member'][$i]['id'], 'status' => 'active'));
                        // if($mem[0]['emailSub']){
                        //     $subject = "Event Added By Admin for your group.";
                        //     $msg = "Hi ".$mem[0]['fname'].", an event ".$data['title']." has been added by admin.";
                        //     $msg .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/calendar')."'><span class='btn-info'>VIEW</span></a></p>";
                        //     $x = str_replace("{{msg}}", $msg, $x);
                        //     $this->sendMail($x, $subject, $mem[0]['email']);
                        // }
                    }
                    $this->fetchCalendar();
                }
            }else{
                $this->login();
            }
        }
        
        public function deleteFullCalendarEvent(){
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->data->delete(array('event_id' => $data['id']), 'reminders');
            }else{
                $this->login();
            }
        }
        
        public function calender($m = NULL){
            $m = ($m == NULL) ? date("m") : $m;
            $first_day_of_month = date('w', strtotime("01-".date("m")."-2016"));
            echo "<table class='table table-bordered'>";
            echo "<tr><th style='text-align: center' colspan='7'>".date("F / Y")."</th></tr>";
            echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thur</th><th>Fri</th><th>Sat</th></tr>";
            echo "<tr>";
            $a = 0;
            for($i=1 ; $i<=$first_day_of_month ; $i++){
                echo "<td></td>";
                $a++;
                if($a == 7){
                    echo "</tr><tr>";
                    $a = 0;
                }
            }
            $number = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
            for($i=1 ; $i<=$number ; $i++){
                $date = date("y-m-d",strtotime(date('Y')."/".date("m")."/".$i));
                $x = $this->data->myquery("SELECT count(`id`) as `total` FROM `reminders` WHERE `date` = '{$date}'");
                //echo "SELECT count(`id`) as `total` FROM `reminders` WHERE `date` = '{$date}'";
                echo "<td ";
                if($i == date("j")){
                    echo " style='background:#BDD8F3' ";
                    echo ">".$i;
                    echo "<span style='float:right;' class='btn btn-warning'>".$x[0]['total']."</span>";
                    echo "<p><a href='". site_url('admin/view')."/prepare_update'>S</a></p>";
                    echo "<p><a href='". site_url('admin/view')."/view_reminder?date=".date("Y-m-d",strtotime(date('Y')."/".date("m")."/".$i))."'>V</a></p>";
                    echo "</td>";
                }elseif($i < date("j")){
                    echo " style='background:#e8e8e8' ";
                    echo ">".$i;
                    echo "<span style='float:right;' class='btn btn-success'>".$x[0]['total']."</span>";
                    echo "<p><a href='". site_url('admin/view')."/view_reminder?date=".date("Y-m-d",strtotime(date('Y')."/".date("m")."/".$i))."'>V</a></p>";
                    echo "</td>";
                }else{
                    echo ">".$i;
                    echo "<span style='float:right;' class='btn btn-info'>".$x[0]['total']."</span>";
                    echo "<p><a href='". site_url('admin/view')."/prepare_update'>S</a></p>";
                    echo "<p><a href='". site_url('admin/view')."/view_reminder?date=".date("Y-m-d",strtotime(date('Y')."/".date("m")."/".$i))."'>V</a></p>";
                    echo "</td>";
                }
                $a++;
                if($a == 7){
                    echo "</tr><tr>";
                    $a = 0;
                }
            }
            echo "</tr>";
            echo "</table>";
        }
        
        public function editProfile($id = ""){
            $check = $this->session->userdata('userAdmin');
            
            if(!empty($check) && !empty($id)){
                $data = $this->input->post();
                if(isset($data['child'])){
                    $this->data->delete(array('parent_id'=>$id,"relation"=>"child"),"children");
                    foreach($data['child'] as $child){
                        $child['relation'] = "child";
                        $child['parent_id'] = $id;
                        $this->data->insert("children",$child);
                    }
                }
                if(isset($data['grandChild'])){
                    $this->data->delete(array('parent_id'=>$id,"relation"=>"grand"),"children");
                    foreach($data['grandChild'] as $child){
                        $child['relation'] = "grand";
                        $child['parent_id'] = $id;
                        $this->data->insert("children",$child);
                    }
                }
                if(isset($data['groups'])){
                $this->data->delete(array('user_id'=>$id),'membgroup');
                foreach($data['groups'] as $val){
                    if($val > 0){
                        $this->data->insert("membgroup",array("user_id"=>$id,"g_id"=>$val));
                    }
                }
                unset($data['groups']);
            }


                $data['grandChild'] = (isset($data['grandChild'])) ? json_encode($data['grandChild']) : "";
                $data['child'] = (isset($data['child'])) ? json_encode($data['child']) : "";
                
                if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                    $x = $this->do_upload($_FILES);
                    if(isset($x['upload_data'])){
                        $data['image'] = $x['upload_data']['file_name'];
                    }
                }else{
                    if($data['gander'] == 'male'){
                        $data['image'] == 'male.jpg';
                    }else{
                        $data['image'] == 'female.jpg';
                    }
                }

                $this->data->update(array("id"=>$id),"member",$data);
                redirect("admin/view/edit_member/".$id,"refresh");
            }else{
                $this->login();
            }
        }
        
        public function ajax($id){
            $data = $this->input->post();
            if($id == "getUsers"){
                // $members = $this->data->fetch("member", array('status' => 'active'));
                $members = $this->data->myquery("SELECT * FROM `member` WHERE status = 'active' AND lasttime > CURRENT_DATE() - INTERVAL 6 MONTH order by lasttime DESC");
                ?><?php foreach($members as $val){ ?>
                    <tr>
                        <td><?= ucfirst(strtolower($val['fname']))." ".ucfirst(strtolower($val['lname'])) ?></td>
                        <!--<td><?= $val['ip_address'] ?></td>-->
                        <td><?= ucfirst($val['geo_country'])?></td>
                        <td>
                            <?php if( (strtotime(date("Y-m-d h:i a")) >= ( strtotime(date("Y-m-d h:i a",strtotime($val['lasttime']))) - 20 )) AND ( strtotime(date("Y-m-d h:i a")) <= ( strtotime(date("Y-m-d h:i a",strtotime($val['lasttime']))) + 20 ) ) ){ ?>
                            <?php //if((time() >= (strtotime($val['lasttime']) - 20)) AND (time() <= (strtotime($val['lasttime']) + 20))){ ?>
                                <span style="color:green">Online</span>
                                <?php $this->data->update(array('id' => $val['id']), 'member', array('visiblity' => 'online')); ?>
                            <?php }else{ ?>
                                <span style="color:grey">Offline</span>
                                <?php $this->data->update(array('id' => $val['id']), 'member', array('visiblity' => 'offline')); ?>
                            <?php } ?>
                        </td>

                        <td>

                            <?php
                            $to_time = strtotime(date("Y-m-d h:i a"));
                            $from_time = time();
                            if( (strtotime(date("Y-m-d h:i a")) >= ( strtotime(date("Y-m-d h:i a",strtotime($val['lasttime']))) - 20 )) AND ( strtotime(date("Y-m-d h:i a")) <= ( strtotime(date("Y-m-d h:i a",strtotime($val['lasttime']))) + 20 ) ) ){
                                echo date("d-M-Y h:i a",$to_time);
                                //echo " Just Now";
                            }else{
                                echo date("d-M-Y h:i a",strtotime($val['lasttime']));
                            }
                            ?>
                        </td>
                    </tr>
                <?php }
            }
            elseif($id == 'getSMSchurchCount'){
                $x = $this->data->fetch('membgroup',array('g_id'=>$data['id']));
                echo count($x);
            }
            elseif($id == "getSMSbusinessCount"){
                $x = $this->data->fetch('member',array('businessGroup'=>$data['id'], 'status' => 'active'));
                echo count($x);
            }
        }
        
        //New Code Added
        public function notificationNew($module)
        {
            $check = $this->session->userdata('userAdmin');
            $data = $this->input->post();
            if(!empty($check))
            {
                $this->data->update(array('id' => $data['pId']), 'p_request', array('read' => 1));
            }else{
                redirect("admin/");
            }
        }
        //End
        
        //New Code Added
        public function notification($module)
        {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check))
            {
                $data1 = $this->input->post();
                if($module == "prayerRequest")
                {
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['prayerRequest'] = $this->data->myquery("SELECT * FROM `p_request` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                    if(count($data['prayerRequest']))
                    {
                    ?>
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Date</td>
                                <td>Member</td>
                                <td width="35%">Description</td>
                                <td>Priority</td>
                                <td>Remark</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($data['prayerRequest'] as $val){ ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/view/edit_member') ?>/<?= $val['user_id'] ?>">
                                            <?= $val['member'] ?>
                                        </a>
                                    </td>
                                    <!--                                    <td style="word-break: break-all">--><?//= $val['desc'] ?><!--</td>-->

                                    <td>
                                        <?= substr(strip_tags($val['desc']),0,100); ?><a data-toggle="modal" data-target="#myReplyModal<?= $val['id'] ?>">Read More</a>
                                        <!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myReplyModal<?= $val['id'] ?>">Read More</button>-->
                                        <!-- Modal -->
                                        <div id="myModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $val['desc'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myReplyModal<?= $val['id'] ?>">Reply</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="myReplyModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                            <?= form_open("admin/replyPrayerRequest?id=".$val['id'],array('class'=>"form-horizontal","onSubmit"=>"document.getElementById('submit').disabled=true;")) ?>
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= $val['desc']; ?></p>
                                                            <div class="md-card-content padding-reset">
                                                                <div class="chat_box_wrapper">
                                                                    <div class="chat_box touchscroll chat_box_colors_a" style="height: 300px" id="chat">
                                                                        <div class="chat_message_wrapper">
                                                                            <p style="text-align:center;font-size:20px;">
                                                                                <?php 
                                                                                    $replyRequest = $this->data->fetch('prayerRequestReply', array('prayer_request_id' => $val['id']));
                                                                                    if(empty($replyRequest)){
                                                                                        echo "Give reply to prayer request";
                                                                                    }else{
                                                                                        foreach($replyRequest as $row){
                                                                                    ?>
                                                                                        <div class="chat_message_wrapper chat_message_right">
                                                                                            <div class="chat_user_avatar">
                                                                                                <img class="md-user-image" src="https://demo.mmsonline.website/assets_f/img/business/avatar.jpg" alt="">
                                                                                            </div>
                                                                                            <ul class="chat_message">
                                                                                                <li>
                                                                                                    <p><?= $row['reply_text']; ?></p>
                                                                                                    <span class="chat_message_time"><?= $this->data->fetch('credentials', array('id' => $row['admin_id']))[0]['name']; ?></span>
                                                                                                    <span class="chat_message_time"><?= $row['createdAt']; ?></span>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chat_submit_box" style="display:block;" id="chat_submit_box">
                                                                        <div class="uk-input-group">
                                                                            <input type="text" class="md-input" name="reply" id="reply" placeholder="Reply To request">
                                                                            <span id="textLe1">0</span>/500
                                                                            <span class="uk-input-group-addon">
                                                                                <button type="submit">
                                                                                    <i class="material-icons md-24">&#xE163;</i>
                                                                                </button>
                                                                            </span>
                                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--<textarea class="form-control" cols="85" rows="5" name="reply"></textarea>-->
                                                            <!--<input type="text" name="reply" id="reply" />-->
                                                            <input type="hidden" name="replyGivenBy" value="<?php echo $userAdmin[0]['id']; ?>"/>
                                                            <input type="hidden" name="requestedBy" value="<?= $val['user_id'] ?>" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!--<button type="submit" class="btn btn-info">Reply</button>-->
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
    
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <?php if($val['priority'] == 'urgent'){$style = 'red';}else{$style = 'black';}?>
                                    <td style="color: <?php echo $style; ?>"><?= ucfirst($val['priority']) ?></td>
                                    <td>
                                        <?php if(empty($val['reply'])){ echo 'No Reply Given.';}else{ echo ucfirst($val['reply']); } ?>
                                    </td>
                                    <td><a onclick="deleteConff('<?= site_url('admin/delete/p_request/'.$val['id']."/same") ?>')" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    <?php
                    }else
                    {
                        $data['error'] = "No Record Found.";
                    }
                }
                
                if($module == "groupActivity")
                {
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['groups'] = $this->data->myquery("SELECT * FROM `churchgroup` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                    //print_r("SELECT * FROM `churchgroup` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");                    if(count($data['groups']))
                    {
                    ?>
                    <table id="myTableCGroup" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($data['groups'] as $val){ ?>
                                <tr>
                                    <td><?= ucfirst($val['name']) ?></td>
                                    <?php $status = ($val['status'] == 'verified') ? "not verified" : "verified"; ?>
                                    <td><a href="<?= site_url("admin/statusGroup1/".$val['id']."/".$status) ?>"><?= ucfirst($val['status']) ?></a></td>
                                    <td><a data-toggle="modal" href="<?= site_url('admin/view_members') ?>/<?= $val['id'] ?>">Check for Admittance</a><?php if($userAdmin[0]['id'] == 3){ ?> | <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    
                }
                
                if($module == 'pageVerification')
                {
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . '+1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['page_req'] = $this->data->myquery("SELECT * FROM `business` WHERE `dOfJoining` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `dOfJoining` DESC");
                    foreach($data['page_req'] as $key=>$val){
                        $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                        $data['page_req'][$key]['name'] = $x[0]['fname'];
                        $data['page_req'][$key]['name'] .= " ";
                        $data['page_req'][$key]['name'] .= $x[0]['lname'];
                    }
                    ?>
                    <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Recent Activity Date</td>
                                    <td>Member</td>
                                    <td>Business Page</td>
                                    <td>Report</td>
                                    <td>Status</td>
                                    <td>Remark</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x=1; foreach($data['page_req'] as $val){ ?>
                                    <tr>
                                        <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                        <td><a href="<?= site_url('admin/view/edit_member/'.$val['user_id']) ?>"><?= $val['name'] ?></a></td>
                                        <td><a href="<?= site_url('business/'.$val['user_id']) ?>" target="_blank"><span class="btn btn-info">Go To Page</span></a></td>
                                        <td><a onclick="report('<?= $val['id'] ?>')">Report</a></td>
                                        <td>
                                            <?php if($val['status'] == 'active'){ ?>
                                                <span class="btn btn-success">Active</span>
                                            <?php } ?>
                                            <?php if($val['status'] == 'suspend'){ ?>
                                                <span class="btn btn-danger">Suspend</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php $smsPage = $this->data->myquery('SELECT * FROM `smsPage` WHERE `to` = '.$val["user_id"].' ORDER BY `id` DESC');
                                                if(count($smsPage)){
                                                    echo $smsPage[0]['msg'];
                                                }else{
                                                    echo 'No SMS Send.';
                                                }
                                            ?>
                                        </td>
                                        <td><a onclick="sendSMS(<?= $val['id'] ?>)"><i class="fa fa-space-shuttle fa-2x" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php $x++; } ?>
                            </tbody>
                        </table>
                    <?php
                }
                
                if($module == 'birthdays')
                {
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . '+1 day'));
                    $fromDate = $data1['fromDate'];
                }
                
                if($module == "testimonies")
                {
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['testimonies'] = $this->data->myquery("SELECT * FROM `testimonies` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                    if(count($data['testimonies']))
                    {
                    ?>
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <td>Date</td>
                                <td>Subject</td>
                                <td width="20%">Description</td>
                                <td>Member</td>
                                <td>Anonymous</td>
                                <td>Approval</td>
                                <td>File 1</td>
                                <td>File 2</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($data['testimonies'] as $val){ ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($val['date'])); ?></td>
                                    <td><?= $val['subject'] ?></td>
                                    <td style="word-wrap: break-word;"><?= substr(strip_tags($val['msg']),0,100); ?><a data-toggle="modal" data-target="#myModal<?= $val['id'] ?>">Read More</a>
                                    <div id="myModal<?= $val['id'] ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><?= $val['title'] ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $val['msg'] ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div></td>
                                    <td><?php echo $val['username']; ?></td>
                                    <td><?php if($val['anon'] == "true"){ echo "Anonymous"; }else{ echo $val['username']; } ?></td>
                                    <?php $status = ($val['approval'] == 0) ? 1 : 0; ?>
                                    <td><a href="<?= site_url("admin/statusTestimonies/".$val['id']."/".$status) ?>"><?php if($val['approval'] == 0){ echo "<span style='color:red'>Need to Approve</span>"; }else{echo "<span style='color:blue'>Approved</span>";}?></a></td>
                                    <?php $image = ($val['file1'] != "") ? base_url('assets_f/img/business')."/".$val['file1'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['file1']  ?>
                                    <?php if(empty($val['file1'])){ $image = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; } ?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        </td>
                                        <?php $image = ($val['file2'] != "") ? base_url('assets_f/img/business')."/".$val['file2'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                    <?php $image = base_url('assets_f/img/business')."/".$val['file2']  ?>
                                    <?php if(empty($val['file2'])){ $image = 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; }?>
                                    <td>
                                        <?php
                                            $exif = exif_read_data($image);
                                            // print_r($exif['Orientation']);
                                        ?>
                                        <img src="<?= $image ?>" style="width:100px; height : 80px;" 
                                        <?php 
                                            if($exif['Orientation'] == 6){
                                        ?>class="detect"
                                        <?php 
                                            }else if($exif['Orientation'] == 8){
                                        ?> class="detect8" 
                                        <?php  
                                            }
                                        ?> alt=""/>
                                        </td>
                                    <td><a href="" title="Edit Testimony"><i class="fa fa-pencil"></i></a> | <a onclick="deleteConff('<?= site_url('admin/delete/testimonies/'.$val['id']."/same") ?>')" title="Delete Testimony"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    <?php
                    }
                }
            }else
            {
                redirect("admin/");
            }
        }
        
        public function searchByDate($module)
        {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data1 = $this->input->post();
                if($module == "donations"){
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['donation']=$this->data->myquery("SELECT * FROM `donations` WHERE `date` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                    if(count($data['donation'])){
                        foreach($data['donation'] as $k=>$val){
                            $x = $this->data->fetch('member',array('id'=>$val['user_id'], 'status' => 'active'));
                            $data['donation'][$k]['username'] = !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Anonymous";
                            $data['donation'][$k]['userId'] = !empty($x) ? $x[0]['id'] : "Undefined";
                            $data['donation'][$k]['mobile'] = !empty($x) ? $x[0]['mobileNo'] : "Undefined";
                            $data['donation'][$k]['giftAid'] = !empty($x) ? $x[0]['giftAid'] : "Undefined";
                            if($val['admin_id'] == 0){
                                $data['donation'][$k]['adminName'] = 'N/A';
                            }else{
                                $admin = $this->data->fetch('credentials', array('id' => $val['admin_id']));
                                $data['donation'][$k]['adminName'] = $admin[0]['name'];
                            }
                        }
                    }else{
                        $data['error'] = "No Record Found.";
                    }
                    print_r(json_encode($data));
                }
                
                if($module == "offerings"){
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['offerings'] = $this->data->myquery("SELECT * FROM `offerings` WHERE `dateCreated` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                    if(count($data['offerings'])){
                        foreach($data['offerings'] as $k=>$val){
                            $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                            $data['offerings'][$k]['name'] = !empty($x) ? $x[0]['name'] : "N/A";
                        }
                    }else{
                        $data['error'] = "No Record Found.";
                    }
                    print_r(json_encode($data));
                }
                
                if($module == "tithes"){
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['tithes'] = $this->data->myquery("SELECT * FROM `tithes` WHERE `dateCreated` BETWEEN '".$fromDate."' AND '".$toDate."' ORDER BY `date` DESC");
                    if(count($data['tithes'])){
                        foreach($data['tithes'] as $k=>$val){
                            $x = $this->data->fetch('credentials',array('id'=>$val['admin_id']));
                            $data['tithes'][$k]['name'] = !empty($x) ? $x[0]['name'] : "N/A";
                        }
                    }else{
                        $data['error'] = "No Record Found.";
                    }
                    print_r(json_encode($data));
                }
                
                if($module == "member") {
                    $toDate = $data1['toDate'];
                    $toDate = date('Y-m-d', strtotime($toDate . ' +1 day'));
                    $fromDate = $data1['fromDate'];
                    $data['members']=$this->data->myquery("SELECT * FROM `member` WHERE status = 'active' and `dOfJoining` BETWEEN '".$fromDate."' AND '".$toDate."' and first_time = 'no' ORDER BY dOfJoining ASC");
                    if(count($data['members'])){
                        foreach($data['members'] as $k=>$v){
                            $x = $this->data->fetch("businessgroup",array('id'=>$v['businessGroup']));
                            $data['members'][$k]['businessGroup'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                            $data['members'][$k]['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$v['id']}'");
                        }
                        foreach($data['members'] as $k=>$v){
                            $x = $this->data->myquery("SELECT SUM(`amount`) as `amount` FROM `donations` WHERE `user_id`='{$v['id']}'");
                            $data['members'][$k]['total'] = empty($x) ? 0 : $x[0]['amount'];
                        }
                        //Birthday
                        foreach($data['members'] as $k=>$v){
                            $todayMonth = date("m");
                            $todayDate= date("d");
                            //if($todayDate == $v['birth_date'] && $todayMonth == $v["birth_month"]){
                            if($todayMonth == $v["birth_month"]){
                                $data['members'][$k]['birthdayToday'] = "true";
                            }else{
                                $data['members'][$k]['birthdayToday'] = "false";
                            }
                        }
                        // print_r($data['members']);
                    ?>
                    <table id="myTableUser" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>Member Created Date</td>
                                        <td>Member Name</td>
                                        <td>Total Login</td>
                                        <td>Profile Picture</td>
                                        <td style="display:none;">Age</td>
                                        <td style="display:none;">Marital Status</td>
                                        <td style="display:none;">Job Status</td>
                                        <td style="display:none;">Native Country</td>
                                        <td style="display:none;">Hobbies</td>
                                        <td style="display:none;">Postal Code</td>
                                        <td>Profession</td>
                                        <td>Date Joined</td>
                                        <td>Country Of Origin</td>
                                        <td>Total Donations</td>
                                        <td>Status</td>
                                        <td>Details</td>
                                    </tr>
                                    </thead>
                                    <tbody id="ajaxReplace">
                                    <?php $i=1; foreach($data['members'] as $val){ ?>
                                        <tr <?php if($val['firstTimerMemberFlag']){ ?> style="background-color: #42f4bf;" <?php } ?>>
                                            <td><?= date("d-M-Y",strtotime($val['dOfJoining'])); ?></td>
                                            <td><?= ucfirst($val['fname'])." ".ucfirst($val['lname']) ?></td>
                                            <td><?= $val['count'] ?></td>
                                            <?php $image = ($val['image'] != "") ? base_url('assets_f/img/business')."/".$val['image'] : base_url('assets_f/img/business')."/avatar.jpg"; ?>
                                            <?php $image = base_url('assets_f/img/business')."/".$val['image']  ?>
                                            <?php if(empty($val['image']) AND $val['gander'] == 'male'){ $image = base_url('assets_f/male.jpg'); }elseif(empty($val['image']) AND $val['gander'] == 'female'){ $image = base_url('assets_f/female.jpg'); } ?>
                                            <td>
                                                
                                                <?php
                                                    $exif = exif_read_data($image);
                                                    // print_r($exif['Orientation']);
                                                ?>
                                                <?php
                                                if($exif['Orientation'] == 6){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '6');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(90deg);" /></a>
                                                <?php
                                                }else if($exif['Orientation'] == 8){
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '8');" data-uk-lightbox="{group:'user-photos1'}"><img  class="detect8" src="<?= $image ?>" style="width:100px; height : 80px;transform: rotate(-90deg);" /></a>
                                                <?php
                                                }else{
                                                ?>
                                                <a onclick="bigImg('<?= $image ?>', '0');" data-uk-lightbox="{group:'user-photos1'}"><img src="<?= $image ?>" style="width:100px; height : 80px;" /></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <!--<td><?= ucfirst($val['gander']); ?></td>-->
                                            <td style="display : none;"><?= $val['age_group'] ?></td>
                                            <td style="display : none;"><?= $val['maritalStatus'] ?></td>
                                            <td style="display : none;"><?= $val['employement'] ?></td>
                                            <td style="display : none;"><?= $val['nativeCountry'] ?></td>
                                            <td style="display : none;"><?= $val['hobbies']; ?></td>
                                            <td style="display : none;"><?= $val['poatalCode'] ?></td>
                                            <td><?= ucfirst($val['businessGroup']) ?></td>
                                            <td><?php
                                            if($val['member_since_month'] == 1){
                                                echo 'Jan'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 2){
                                                echo 'Feb'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 3){
                                                echo 'Mar'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 4){
                                                echo 'Apr'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 5){
                                                echo 'May'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 6){
                                                echo 'Jun'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 7){
                                                echo 'Jul'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 8){
                                                echo 'Aug'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 9){
                                                echo 'Sept'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 10){
                                                echo 'Oct'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 11){
                                                echo 'Nov'." ".$val['member_since_year'];
                                            }
                                            elseif($val['member_since_month'] == 12){
                                                echo 'Dec'." ".$val['member_since_year'];
                                            }
                                            ?></td>
                                            <td><?= $val['nativeCountry'] ?></td>
                                            <td><?= $val['total'] ?></td>
                                            <?php $status = ($val['status'] == 'active') ? "suspend" : "active"; ?>
                                            <td><a onclick="statusChange('<?= site_url("admin/statusMember/".$val['id']."/".$status) ?>')"><?= ucfirst($val['status']) ?></a></td>
                                            <td><a data-toggle="modal" href="<?= site_url('admin/view/edit_member') ?>/<?= $val['id'] ?>">View</a>
                                                <?php if($userAdmin[0]['id'] == 3){ ?> | 
                                                <a onclick="deleteConff('<?= site_url('admin/memberDelete/'.$val['id']."/same") ?>')"><i class="fa fa-trash"></i></a><?php } ?>
                                                <?php if($val['firstTimerMemberFlag']){ ?>
                                                | <a onclick="makeMember('<?= site_url('admin/makeMember1/'.$val['id']) ?>')">Make Member</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                    <?php
                    }else{
                        $data['error'] = "No Record Found.";
                    }
                }
            }
        }
        
        public function fullYearDonation($module){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data1 = $this->input->post();
                if($module == 'donations'){
                    $year = $data1['year'];
                    // print_r($year);
                    $data['donationYear'][0] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 1");
                    $data['donationYear'][1] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 2");
                    $data['donationYear'][2] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 3");
                    $data['donationYear'][3] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 4");
                    $data['donationYear'][4] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 5");
                    $data['donationYear'][5] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 6");
                    $data['donationYear'][6] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 7");
                    $data['donationYear'][7] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 8");
                    $data['donationYear'][8] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 9");
                    $data['donationYear'][9] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 10");
                    $data['donationYear'][10] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 11");
                    $data['donationYear'][11] = $this->data->myquery("SELECT SUM(`amount`) as total from donations where YEAR(`date`)=".$year." AND MONTH(`date`) = 12");
                    print_r(json_encode($data));
                }
                
                if($module == 'offerings'){
                    $year = $data1['year'];
                    // print_R($year);
                    $data['offeringsYear'][0] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 1");
                    $data['offeringsYear'][1] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 2");
                    $data['offeringsYear'][2] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 3");
                    $data['offeringsYear'][3] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 4");
                    $data['offeringsYear'][4] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 5");
                    $data['offeringsYear'][5] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 6");
                    $data['offeringsYear'][6] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 7");
                    $data['offeringsYear'][7] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 8");
                    $data['offeringsYear'][8] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 9");
                    $data['offeringsYear'][9] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 10");
                    $data['offeringsYear'][10] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 11");
                    $data['offeringsYear'][11] = $this->data->myquery("SELECT SUM(`amount`) as total from offerings where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 12");
                    print_r(json_encode($data));
                }
                
                if($module == 'tithes'){
                    $year = $data1['year'];
                    $data['tithesYear'][0] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 1");
                    $data['tithesYear'][1] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 2");
                    $data['tithesYear'][2] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 3");
                    $data['tithesYear'][3] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 4");
                    $data['tithesYear'][4] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 5");
                    $data['tithesYear'][5] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 6");
                    $data['tithesYear'][6] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 7");
                    $data['tithesYear'][7] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 8");
                    $data['tithesYear'][8] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 9");
                    $data['tithesYear'][9] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 10");
                    $data['tithesYear'][10] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 11");
                    $data['tithesYear'][11] = $this->data->myquery("SELECT SUM(`amount`) as total from tithes where YEAR(`dateCreated`)=".$year." AND MONTH(`dateCreated`) = 12");
                    print_r(json_encode($data));
                }
            }
        }
        
        public function code($q = 6){
            $abc = range("a","z");
            $numb = range(0,9);
            $merge = array_merge($abc,$numb);
            $code='';
            for($i=0;$i<$q;$i++){
                $code .= $merge[rand(0,(count($merge)-1))];
            }
            return $code;
        }
        
        public function test(){
            ?>
            <script>
                var data = JSON.stringify({
                    "from": "InfoSMS",
                    "to": "447930949312",
                    "text": "Test SMS."
                });
                //data = null;
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = false;

                xhr.addEventListener("readystatechange", function () {
                    if (this.readyState === this.DONE) {
                        console.log(this.responseText);
                    }
                });

                xhr.open("POST", "https://api.infobip.com/sms/1/text/single");
                xhr.setRequestHeader("authorization", "Basic QmV6YWxlZWw6cDdtVkw4d2U=");
                xhr.setRequestHeader("content-type", "application/json");
                xhr.setRequestHeader("accept", "application/json");
                xhr.send(data);

            </script>
        <?php
        }
        
        public function member_chat_admin($id){
            $check = $this->session->userdata("userAdmin");
            if(!empty($check)){
                $data = $this->input->post();
                if($id == "getRecepients"){
                    $messages = $this->data->myquery("SELECT `from`,`to` FROM `a_a_chat` WHERE `to`='{$check[0]['id']}' OR `from` = '{$check[0]['id']}' ORDER BY `id` DESC ");
                    $filter = array();
                    foreach($messages as $val){
                        $val['to'] = ($val['to'] == $check[0]['id']) ? $val['from'] : $val['to'];
                        $x = $this->data->fetch('credentials',array('id'=>$val['to']));
                        if(!in_array($x[0]['id'],$filter)){
                            ?>
                            <li style="cursor:pointer">
                                <a onclick='openMsg(<?= $val['to'] ?> )'>
                                    <i class='fa fa-circle text-success'></i>
                                    <span><?php echo !empty($x) ? $x[0]['name'] : "Undefined" ?></span>
                                </a>
                            </li>
                        <?php
                        }
                        $filter[]=$x[0]['id'];
                    }
                }
                if($id == 'sendMessage'){
                    if($data['id'] == 'all'){
                        $a = $this->data->fetch('credentials');
                        $x['messages'] = htmlspecialchars($data['msg']);
                        $x['from'] = $check[0]['id'];
                        foreach($a as $v){
                            $x['to'] = $v['id'];
                            $this->data->insert("a_a_chat",$x);
                        }
                    }else{
                        $x['messages'] = htmlspecialchars($data['msg']);
                        $x['to'] = $data['id'];
                        $x['from'] = $check[0]['id'];
                        $this->data->insert("a_a_chat",$x);
                    }

                }
                if($id == 'member_message_detail'){
                    $id = $data['id'];
                    $messages = $this->data->myquery("SELECT * FROM `a_a_chat` WHERE (`to`='{$id}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$id}' AND `to` = '{$check[0]['id']}') ORDER BY `id` ASC ");
                    if(!empty($messages)){
                        foreach($messages as $k=>$val){
                            $x = $this->data->fetch("credentials",array('id'=>$id));
                            $messages[$k]['to'] = $x[0]['name'];
                            $name = ($val['from'] == $check[0]['id']) ? "Me" : $x[0]['name'];
                            ?>
                            <div class="group-rom">
                                <div class="first-part odd"><?= $name ?></div>
                                <div class="second-part" style="word-break: break-all">
                                    <?= $val['messages'] ?>
                                </div>
                                <div class="third-part"><?= date("d-M-Y h:i:s",strtotime($val['date'])) ?></div>
                            </div>
                        <?php
                        }
                    }
                }
            }
        }
        
        public function sendPrivateMsg_admin(){
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $x['messages'] = htmlspecialchars($data['msg']);
                $x['to'] = $data['id'];
                $x['from'] = $check[0]['id'];
                $this->data->insert("a_a_chat",$x);
                redirect("admin/view/admin_chat#".$data['id']);
            }else{
                redirect("admin/");
            }
        }
        
        public function member_chat($id){
            $check = $this->session->userdata("userAdmin");
            if(!empty($check)){
                $data = $this->input->post();
                if($id == "getRecepients"){
                    $messages = $this->data->myquery("SELECT `from`,`to` FROM `a_m_chat` WHERE `admin`='{$check[0]['id']}' ORDER BY `id` DESC ");
                    $filter = array();
                    foreach($messages as $val){
                        $val['to'] = ($val['to'] == $check[0]['id']) ? $val['from'] : $val['to'];
                        $x = $this->data->fetch('member',array('id'=>$val['to'], 'status' => 'active'));
                        if(!in_array($x[0]['id'],$filter)){
                            ?>
                            <li style="cursor:pointer">
                                <a onclick='openMsg(<?= $val['to'] ?> )'>
                                    <i class='fa fa-circle text-success'></i>
                                    <span><?php echo !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined" ?></span>
                                </a>
                            </li>
                        <?php
                        }
                        $filter[]=$x[0]['id'];
                    }
                }
                if($id == 'sendMessage'){
                    $x['admin'] = $check[0]['id'];
                    if($data['id'] == 'all'){
                        $a = $this->data->fetch('member', array('status' => 'active'));
                        $x['messages'] = htmlspecialchars($data['msg']);
                        $x['from'] = $check[0]['id'];
                        foreach($a as $v){
                            $x['to'] = $v['id'];
                            $this->data->insert("a_m_chat",$x);
                        }
                    }else{
                        $x['messages'] = htmlspecialchars($data['msg']);
                        $x['to'] = $data['id'];
                        $x['from'] = $check[0]['id'];
                        $purana = $this->data->myquery("SELECT * FROM `a_m_chat` WHERE (`to` = '{$data['id']}' AND `from` = '{$x['from']}') OR (`from` = '{$data['id']}' AND `to` = '{$x['from']}')");
                        $x['admin'] = (!empty($purana)) ? $purana[0]['admin'] : $check[0]['id'];
                        if(empty($purana)){
                            echo "First";
                        }else{
                            echo 'Second';
                        }
                        $this->data->insert("a_m_chat",$x);
                    }

                }
                if($id == "deleteConversation"){
                    // $data = $this->input->post();
                    // print_r($data['id']);
                    $purana = $this->data->myquery("SELECT * FROM `a_m_chat` WHERE (`to` = '{$data['id']}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$data['id']}' AND `to` = '{$check[0]['id']}')");
                    print_r($purana);
                    if(!empty($purana)){
                        if($purana[0]['admin'] == '1'){
                            $purana = $this->data->myquery("UPDATE `a_m_chat` SET `user1` =  'true' WHERE (`to` = '{$data['id']}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$data['id']}' AND `to` = '{$check[0]['id']}')");
                        }else{
                            $purana = $this->data->myquery("UPDATE `a_m_chat` SET `user2` =  'true' WHERE (`to` = '{$data['id']}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$data['id']}' AND `to` = '{$check[0]['id']}')");
                        }
                    }
                }
                if($id == "deleteAllConversation"){
                    $purana = $this->data->myquery("SELECT * FROM `a_m_chat` WHERE (`from` = '{$check[0]['id']}') OR (`to` = '{$check[0]['id']}')");
                    if(!empty($purana)){
                        if($purana[0]['admin'] == '1'){
                            $purana = $this->data->myquery("UPDATE `a_m_chat` SET `user1` =  'true' WHERE (`from` = '{$check[0]['id']}') OR (`to` = '{$check[0]['id']}')");
                        }{
                            $purana = $this->data->myquery("UPDATE `a_m_chat` SET `user2` =  'true' WHERE (`from` = '{$check[0]['id']}') OR (`to` = '{$check[0]['id']}')");
                        }
                    }
                }
                if($id == 'member_message_detail'){
                    $id = $data['id'];
                    $messages = $this->data->myquery("SELECT * FROM `a_m_chat` WHERE (`to`='{$id}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$id}' AND `to` = '{$check[0]['id']}') ORDER BY `id` ASC ");
                    if(!empty($messages)){
                        foreach($messages as $k=>$val){
                            $x = $this->data->fetch("member",array('id'=>$id, 'status' => 'active'));
                            $messages[$k]['to'] = $x[0]['fname']. " " . $x[0]['lname'];
                            $name = ($val['from'] == $check[0]['id']) ? "Me" : $x[0]['fname'];
                            if($val['admin'] == '1' AND $val['user1'] == 'false'){
                            ?>
                            <div class="group-rom">
                                <div class="first-part odd"><?= $name ?></div>
                                <div class="second-part" style="word-break: break-all">
                                    <?= $val['messages'] ?>
                                </div>
                                <div class="third-part"><?= date("d-M-Y h:i:s",strtotime($val['date'])) ?></div>
                            </div>
                        <?php
                            }else if($val['admin'] == '0' AND $val['user2'] == 'false'){
                            ?>
                            <div class="group-rom">
                                <div class="first-part odd"><?= $name ?></div>
                                <div class="second-part" style="word-break: break-all">
                                    <?= $val['messages'] ?>
                                </div>
                                <div class="third-part"><?= date("d-M-Y h:i:s",strtotime($val['date'])) ?></div>
                            </div>
                            <?php
                            }
                        }
                    }
                }
            }
        }
        
        public function sendPrivateMsg(){
            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $x['messages'] = htmlspecialchars($data['msg']);
                $x['to'] = $data['id'];
                $x['from'] = $check[0]['id'];
                $x['admin'] = $check[0]['id'];
                $this->data->insert("a_m_chat",$x);
                redirect("admin/view/chat#".$data['id']);
            }else{
                redirect("admin/");
            }
        }
        
        public function accSettings(){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data = $this->input->post();
                $check = $this->data->fetch("credentials",array('id'=>$check[0]['id']));
                if($data['c_pwd'] == $check[0]['password']){
                    if($data['new_pwd'] == $data['cf_pwd']){
                        $this->data->update(array("id"=>$check[0]['id']),"credentials",array("password"=>$data['new_pwd']));
                        $msg = "Password Changed Successfully";
                    }else{
                        $msg = "Passwords Mismatch";
                    }
                }else{
                    $msg = "Current Password Incorrect";
                }
                $this->session->set_userdata("msg",$msg);
                redirect("admin/view/acc_settings");
            }else{
                $this->login();
            }
        }
        
        public function emailPage($data){
            $data['email'] = $this->data->fetch("details");
            $this->load->view("email",$data);
        }
        
        public function emailForEvent(){
            $this->load->view('emailForEvent');
        }
        
        public function sendMail($msg,$sub,$to){
            $this->load->library('email');
            $config['protocol']    = 'mail';
            $config['smtp_host']    = 'mail.mmsapp.org';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '30';
            $config['smtp_user']    = 'no_reply@mmsapp.org';
            $config['smtp_pass']    = 'FemiAdeko01@';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      
            $this->email->initialize($config);

        $this->email->from('no_reply@mmsapp.org', $this->config->item('companyName'));
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        if($this->email->send()){
            // print_r($this->email->print_debugger());
        }else{
            
            print_r($this->email->print_debugger());
        }
        
        }
        
        public function forgotPwd(){
            $data = $this->input->post();
            $check = $this->data->fetch("credentials",array('username'=>$data['email']));
            if(!empty($check)){
                $ccode = true;
                while($ccode){
                    $code = $this->code(40);
                    $checkCode = $this->data->fetch("fa_code",array("code"=>$code));
                    if(empty($checkCode)){ $ccode = false; }
                }
                //new_pwd
                $x = array(
                    "for"=>$check[0]['id'],
                    "code"=>$code,
                    "status"=>"not used"
                );
                $this->data->insert("fa_code",$x);
                $url = site_url('admin/changePwd')."/".$code;
                $msg = "";
                $msg .= "Please click on this link to reset your password ";
                $msg .= $url;
                $x = file_get_contents(site_url('admin/emailPage2')."?msg=".$code);
                $sub = "Membership Management System";
                //echo site_url('admin/emailPage2')."?msg=".$code;
                $to = $data['email'];
                $this->sendMail($x,$sub,$to);
                $this->forgot_password();
            }
        }
        
        public function changePwd($code){
            $check = $this->data->fetch("fa_code",array('code'=>$code,"status"=>"not used"));
            if(!empty($check)){
                $data['msg'] = $this->session->userdata("msg");
                $this->session->set_userdata("code",$code);
                $this->load->view('back/new_pwd',$data);
            }else{
                $this->session->set_userdata("msg","Invalid Link");
                $this->login();
            }
        }
        
        public function forgot_password(){
            $data['msg'] = "<p style='text-align:center'>An email has been sent to you</p>";
            $this->load->view('back/emailReg',$data);
        }
        
        public function emailPage2(){
            $data['email'][0]['msg'] = $_GET['msg'];
            $this->load->view("emailforgotpassword",$data);
        }
        
        public function changePassword(){
            $data = $this->input->post();
            $code = $this->session->userdata("code");
            $this->session->unset_userdata("code");
            $check = $this->data->fetch("fa_code",array('code'=>$code,"status"=>"not used"));
            if(!empty($check)){
                if($data['password1'] == $data['password2']){
                    $this->data->update(array('id'=>$check[0]['for']),"credentials",array('password'=>$data['password1']));
                    $this->data->update(array('id'=>$check[0]['id']),"fa_code",array('status'=>"used"));
                    $this->session->set_userdata("msg","Password Changed Successfully");
                    $this->login();
                }else{
                    $this->session->set_userdata("msg","Passwords do not match");
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_userdata("msg","Password Changed Successfully");
                $this->login();
            }
        }
        
        public function sendSMS1($senderID, $number, $msgTxt){    
            log_message('error', 'sendSMS1 ');
            log_message('error', $msgTxt);
            log_message('error', 'sendSMS1 ');
            $senderName= "RCCGVHL";
            $msgTxt = trim(preg_replace('/\s+/', ' ', $msgTxt));
            // echo $msgTxt;
            
            $msg = "{\n    \"message\": \"$msgTxt\",\n    \"to\": \"+$number\",\n    \"sender_id\": \"$senderName\"\n}";
            // print_r($msg);
            // return;
            // ///////////////////////
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.sms.to/sms/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS =>$msg,
              CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Accept: application/json",
                  "Authorization: Bearer B8ApuD5xXMIkbFAPC73Be6SSu1pjdSRG"
                ),
            ));
            
            $response = curl_exec($curl);

            // print_r(curl_getinfo($curl));
            curl_close($curl);
            // print_r ($response);
            // ///////////////////////
            
            
            // $msgTxt = str_replace(" ","%20",$msgTxt);
            // $url = "http://dstr.connectbind.com:8080/sendsms?username=BSL1-RCCGVHL1&password=rccgvhl1&type=0&dlr=1&destination=".$number."&source=".$senderName."&message=".$msgTxt;
            // // print_r($url);
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => $url,
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => "",
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 30,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => "GET",
            // ));
            
            // $response = curl_exec($curl);
            // $err = curl_error($curl);
            
            // curl_close($curl);
            
            // if ($err) {
            //   echo "cURL Error #:" . $err;
            // } else {
            //   echo $response;
            // //   print_r($response);
            // }
            // // return $response;
        }
        
        public function sendEmail($type = "member"){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data = $this->input->post();
                if($type == 'gender') {
                    $to = $data['gender'];
                        foreach($to as $a) {
                            $name = $this->data->fetch('member', array('gander' => $a));
                            foreach($name as $mem) {
                                $name1[] = $mem['fname']." ".$mem['lname'];
                                $id[] = $mem['id'];
                            }
                        }
                        $x = array();
                        $x['members'] = implode(',', $id);
                        $x['member'] = implode(',', $name1);
                        if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        // $x['emailSent'] = '1';
                        unset($data['scheduleCheck']);
                        $this->data->insert('email', $x);
                        $sub = "Membership Management System";
                        // $data['sendEmailCount'] = $i;
                        $this->session->set_userdata("msg","Sent Successfully");
                }
                if($type == 'member'){
                    $i = 0;
                    $members = $data['member'];
                    $to = $data['member'];
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $x['members'] = implode(',', $members);
                    foreach($to as $a){
                        $name = $this->data->fetch('member', array('id' => $a));
                        $name1[] = $name[0]['fname']." ".$name[0]['lname'];
                    }
                    if($data['selectAll'] == 'on'){
                        $x['member'] = "All Members";
                    }else{
                        $x['member'] = implode(',', $name1);
                    }
                    unset($data['selectAll']);
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            // print_r($x['upload_data']);
                            $data['image'] = $x['upload_data']['file_name'];
                        }
                    }
                    $image = base_url()."assets_f/img/".$data['image'];
                    if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        // print_r($x);
                        // unset($x['scheduleCheck']);
                    $this->data->insert('email', $x);
                    $sub = "Membership Management System";
                    // $data['sendEmailCount'] = $i;
                    $this->session->set_userdata("msg","Email Sent Successfully");
                }
                if($type == 'church'){
                    $i = 0;
                    $to = $this->data->fetch('membgroup', array('g_id' => $data['to']));
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $sub = "Membership Management System";
                    foreach($to as $uid){
                        $uidAll[] = $uid['user_id'];
                    }
                    foreach($uidAll as $a){
                        $name = $this->data->fetch('member', array('id' => $a));
                        $name1[] = $name[0]['fname']." ".$name[0]['lname'];
                    }
                    $x['member'] = implode(',', $name1);
                    $x['members'] = implode(',', $uidAll);
                    $x['churchGroup'] = $data['to'];
                    if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        unset($data['scheduleCheck']);
                    $this->data->insert("email", $x);
                    if(!empty($uidAll)){
                        $this->session->set_userdata("msg","Sent Successfully");
                    }
                }
                if($type == 'business'){
                    $i = 0;
                    $to = $this->data->fetch("member",array('businessGroup'=>$data['to'], 'status' => 'active'));
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $sub = "Membership Management System";
                    foreach($to as $uid){
                        $uidAll[] = $uid['id'];
                    }
                    foreach($uidAll as $a){
                        $name = $this->data->fetch('member', array('id' => $a));
                        $name1[] = $name[0]['fname']." ".$name[0]['lname'];
                    }
                    $x['member'] = implode(',', $name1);
                    $x['members'] = implode(',', $uidAll);
                    $x['businessGroup'] = $data['to'];
                    if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        unset($data['scheduleCheck']);
                    $this->data->insert("email", $x);
                    if(!empty($uidAll)){
                        $this->session->set_userdata("msg","Sent Successfully");
                    }
                }
                if($type == 'mempacasGroupMemberEmail'){
                    $i = 0;
                    $to = $this->data->fetch('member', array('id' => $data['memberId'], 'status' => 'active'));
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $sub = "Member Management System";
                    $x['members'] = $to[0]['id'];
                    $x['member'] = $to[0]['fname']." ".$to[0]['lname'];
                    $x['sendEmailCount'] = 1;
                    $this->data->insert('email', $x);
                    $this->session->set_userdata("msg","Sent Successfully");
                }
            }
            header("Location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
        
        public function editSendEmail($type = "member", $emailId){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $data = $this->input->post();
                if($type == 'gender') {
                    $to = $data['gender'];
                        foreach($to as $a) {
                            $name = $this->data->fetch('member', array('gander' => $a));
                            foreach($name as $mem) {
                                $name1[] = $mem['fname']." ".$mem['lname'];
                                $id[] = $mem['id'];
                            }
                        }
                        $x = array();
                        $x['members'] = implode(',', $id);
                        $x['member'] = implode(',', $name1);
                        $x['emailSent'] = '0';
                        if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        // $x['emailSent'] = '1';
                        unset($data['scheduleCheck']);
                        $this->data->update(array('id' => $emailId),'email', $x);
                        $sub = "Membership Management System";
                        // $data['sendEmailCount'] = $i;
                        $this->session->set_userdata("msg","Sent Successfully");
                }
                if($type == 'member'){
                    $i = 0;
                    $members = $data['member'];
                    $to = $data['member'];
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $x['members'] = implode(',', $members);
                    foreach($to as $a){
                        $name = $this->data->fetch('member', array('id' => $a));
                        $name1[] = $name[0]['fname']." ".$name[0]['lname'];
                    }
                    if($data['selectAll'] == 'on'){
                        $x['member'] = "All Members";
                    }else{
                        $x['member'] = implode(',', $name1);
                    }
                    $x['emailSent'] = '0';
                    unset($data['selectAll']);
                    if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            // print_r($x['upload_data']);
                            $data['image'] = $x['upload_data']['file_name'];
                        }
                    }
                    $image = base_url()."assets_f/img/".$data['image'];
                    if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        // print_r($x);
                        // unset($x['scheduleCheck']);
                    $this->data->update(array('id' => $emailId), 'email', $x);
                    $sub = "Membership Management System";
                    // $data['sendEmailCount'] = $i;
                    $this->session->set_userdata("msg","Sent Successfully");
                }
                if($type == 'church'){
                    $i = 0;
                    $to = $this->data->fetch('membgroup', array('g_id' => $data['to']));
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $x['emailSent'] = '0';
                    $sub = "Membership Management System";
                    foreach($to as $uid){
                        $uidAll[] = $uid['user_id'];
                    }
                    foreach($uidAll as $a){
                        $name = $this->data->fetch('member', array('id' => $a));
                        $name1[] = $name[0]['fname']." ".$name[0]['lname'];
                    }
                    $x['member'] = implode(',', $name1);
                    $x['members'] = implode(',', $uidAll);
                    $x['churchGroup'] = $data['to'];
                    if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        unset($data['scheduleCheck']);
                    $this->data->update(array('id' => $emailId), "email", $x);
                    if(!empty($uidAll)){
                        $this->session->set_userdata("msg","Sent Successfully");
                    }
                }
                if($type == 'business'){
                    $i = 0;
                    $to = $this->data->fetch("member",array('businessGroup'=>$data['to'], 'status' => 'active'));
                    $x = array();
                    $x['msg'] = $data['msg'];
                    $x['emailSent'] = '0';
                    $sub = "Membership Management System";
                    foreach($to as $uid){
                        $uidAll[] = $uid['id'];
                    }
                    foreach($uidAll as $a){
                        $name = $this->data->fetch('member', array('id' => $a));
                        $name1[] = $name[0]['fname']." ".$name[0]['lname'];
                    }
                    $x['member'] = implode(',', $name1);
                    $x['members'] = implode(',', $uidAll);
                    $x['businessGroup'] = $data['to'];
                    if($data['scheduleCheck']){
                            if($data['schedule'] == 'once'){
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }else{
                                $x['scheduleDate'] = $data['scheduleStartDate'];
                                $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                $x['schedule'] = $data['schedule'];
                                $x['makeSchedule'] = 0;
                            }
                        }else{
                            unset($data['scheduleCheck']);
                            unset($data['scheduleStartDate']);
                            unset($data['scheduleEndDate']);
                            unset($data['schedule']);
                            // $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                        }
                        unset($data['scheduleCheck']);
                    $this->data->update(array('id' => $emailId), "email", $x);
                    if(!empty($uidAll)){
                        $this->session->set_userdata("msg","Sent Successfully");
                    }
                }
            }
            header("Location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
        
        public function sendSMSAllHOD() {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data1 = $this->input->post();
                $users = $this->data->myquery('SELECT * FROM `HOD` WHERE isEnabled = 1');
                if(!empty($users)){
                    foreach($users as $user) {
                        $memberUser = $this->data->fetch('member', array('id' => $user['memberId']));
                        $data['totalSent'] = $this->data->myquery("SELECT COUNT(`id`) as `qty` FROM `sms`");
                        $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
                        $cBalance = $data['bucket'][0]['qty'] - 2 * $data['totalSent'][0]['qty'];
                        $data =null;
                        if($cBalance >= (2 * count($memberUser))) {
                            $a = $this->data->fetch('member', array('id' => $memberUser[0]['id'], 'status' => 'active'));
                            $x1 = array();
                            $x1['msg'] = $data1['msg'];
                            $x1['to'] = $a[0]['fname']." ".$a[0]['lname'];
                            $x1['toId'] = $a[0]['id'];
                            $x1['rec'] = $a[0]['mobileNo'];
                            $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                            unset($x1['rec']);
                            $i++;
                            $x1['sentSMSCount'] = $i;
                            $this->data->insert("sms",$x1);
                            $this->session->set_userdata("msg","Group SMS Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                        header("Location:".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                }else{
                    $this->session->set_userdata("msg","No user found.");
                    header("Location:".$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }else{
                
            }
        }
        
        public function sendSMSAll() {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data = $this->input->post();
                $month = $data['month'];
                $users = $this->data->myquery("SELECT * FROM `member` WHERE `dOfJoining` LIKE '%-".$month."-%' AND `firstTimerMemberFlag` = '1' AND status = 'active' ORDER BY dOfJoining DESC");
                if(!empty($users)){
                    foreach($users as $a){
                        $name1[] = $a['fname'];
                        $toId[] = $a['id'];
                    }
                    $x = array();
                    $x['to'] = implode(',', $name1);
                    $x['toId'] = implode(',', $toId);
                    $x['msg'] = $data['msg'];
                    $data['totalSent'] = $this->data->myquery("SELECT COUNT(`id`) as `qty` FROM `sms`");
                    $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
                    $cBalance = $data['bucket'][0]['qty'] - 2 * $data['totalSent'][0]['qty'];
                    $data =null;
                    if($cBalance >= (2 * count($to))){
                        $i = 0;
                        foreach($to as $k=>$v){
                            $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                            $x1 = array();
                            $x1['msg'] = $data['msg'];
                            $x1['rec'] = $a[0]['mobileNo'];
                            $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                            $i++;
                        }
                        $x['sentSMSCount'] = $i;
                        $this->data->insert("sms",$x);
                        $this->session->set_userdata("msg","Sent Successfully");
                    }else{
                        $this->session->set_userdata("msg","Not Enough Balance");
                    }
                    header("Location:".$_SERVER['HTTP_REFERER']);
                    exit();
                }else{
                    $this->session->set_userdata("msg","No user found.");
                    header("Location:".$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
        
        public function sendSMS($type = "number"){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data['totalSent'] = $this->data->myquery("SELECT COUNT(`id`) as `qty` FROM `sms`");
                $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
                $cBalance = $data['bucket'][0]['qty'] - 2 * $data['totalSent'][0]['qty'];
                $data =null;
                if($cBalance > 0){
                    $data = $this->input->post();
                    if($type == "number"){
                        $to = explode(",",$data['to']);
                        //var_dump($to);
                        //count($to);
                        if($cBalance >= count($to)){
                            foreach($to as $k=>$v){
                                $x = array();
                                $x['msg'] = $data['msg'];
                                $x['to'] = $v;
                                $this->sendSMS1('RCCGVHL', $x['to'], $x['msg']);
                                $this->data->insert("sms",$x);
                            }
                            $this->session->set_userdata("msg","SMS Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == 'gender'){
                        $to = $data['gender'];
                        foreach($to as $a) {
                            $name = $this->data->fetch('member', array('gander' => $a));
                            foreach($name as $mem) {
                                $name1[] = $mem['fname'];
                                $id[] = $mem['id'];
                            }
                        }
                        $x = array();
                        $x['to'] = implode(',', $name1);
                        $x['toId'] = implode(',', $id);
                        $x['msg'] = $data['msg'];
                        if($cBalance >= (2* count($id))) {
                            $i = 0;
                            foreach($id as $k => $v){
                                $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                                $x1 = array();
                                $x1['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                                $x1['rec'] = $a[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                }
                                // $this->data->insert("sms",$x);
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->insert("sms",$x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }
                    }
                    if($type == 'christconvert'){
                        $x['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                        $x['to'] = $data['fname'];
                        $smsCount = strlen($data['msg']);
                        if(round($smsCount / 160) == 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount / 160); };
                        $x1['rec'] = $data['contact'];
                        $this->sendSMS1('RCCGVHL', $x1['rec'], $x['msg']);
                        $this->data->insert("sms",$x);
                        $this->session->set_userdata("msg","SMS Sent Successfully.");
                    }
                    if($type == "member"){
                        $to = $data['member'];
                        foreach($to as $a){
                            $name = $this->data->fetch('member', array('id' => $a));
                            $name1[] = $name[0]['fname'];
                            $id[] = $name[0]['id'];
                        }
                        $x = array();
                        if($data['selectAll'] == 'on'){
                            $x['to'] = "All Members";
                            $x['toId'] = implode(',', $id);
                            $x['schedule'] = 'bulkonce';
                        }else{
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                        }
                        $x['msg'] = $data['msg'];
                        if($cBalance >= (2 * count($to))){
                            $i = 0;
                            foreach($to as $k=>$v){
                                $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                                $x1 = array();
                                $x1['msg'] = preg_replace("/[\n\r]/","",$data['msg']); 
                                $x1['rec'] = $a[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    if($data['selectAll'] != 'on'){
                                        $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                    }
                                }
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $x['makeSchedule'] = 0;
                            $this->data->insert("sms",$x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "businessPage"){
                        $to = $data['pageId'];
                        $pageDetail = $this->data->fetch('business', array('id' => $to));
                        foreach($pageDetail as $a){
                            $name = $this->data->fetch('member', array('id' => $a['user_id']));
                            $name1[] = $name[0]['fname'];
                            $id[] = $name[0]['id'];
                        }
                        $x = array();
                        if($data['selectAll'] == 'on'){
                            $x['to'] = "All Members";
                            $x['toId'] = implode(',', $id);
                        }else{
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                        }
                        $x['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                        
                        if($cBalance >= (2 * count($to))){
                            $i = 0;
                            foreach($id as $k=>$v){
                                $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                                $x1 = array();
                                $x1['msg'] = $data['msg'];
                                $x1['rec'] = $a[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                }
                                // $this->data->insert("sms",$x);
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->insert("sms",$x);
                            $smsPage = array(
                                'msg' => $data['msg'],
                                'to' => $a[0]['id']
                            );
                            $this->data->insert('smsPage', $smsPage);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "church"){
                        if($cBalance >= (2*count($to))){
                            $i = 0;
                            // $to = $this->data->fetch("membgroup",array('g_id'=>$data['to']));
                            $to = $this->data->fetch("member",array('businessGroup'=>$data['to']));
                            $x = array();
                            $x['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                            // print_r($to[0]['id']);
                            // return;
                            foreach($to as $uid){
                                $uidAll[] = $uid['id'];
                            }
                            foreach($uidAll as $a){
                                $name = $this->data->fetch('member', array('id' => $a));
                                $name1[] = $name[0]['fname'];
                                $id[] = $name[0]['id'];
                            }
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                            $x['churchGroup'] = $data['to'];
                            foreach($uidAll as $k){
                                $v = $this->data->fetch("member", array("id" => $k));
                                $x1 = array();
                                $x1['msg'] = $data['msg'];
                                $x1['to'] = $v[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['to'], $x1['msg']);
                                    
                                    // print_r($data['to']);
                                    // print_r("///");
                                    // print_r($x1['to']);
                                    // return ;
                                }
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->insert("sms", $x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "business"){
                        if($cBalance >= (2*count($to))){
                            $i = 0;
                            $to = $this->data->fetch("member",array('businessGroup'=>$data['to'], 'status' => 'active'));
                            foreach($to as $uid){
                                $uidAll[] = $uid['id'];
                            }
                            foreach($uidAll as $a){
                                $name = $this->data->fetch('member', array('id' => $a));
                                $name1[] = $name[0]['fname'];
                                $id[] = $name[0]['id'];
                            }
                            $x = array();
                            $x['msg'] = $data['msg'];
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                            $x['businessGroup'] = $data['to'];
                            foreach($to as $k=>$v){
                                $x1 = array();
                                $x1['msg'] = $data['msg'];
                                $x1['to'] = $v['mobileNo'];
                                $this->sendSMS1('RCCGVHL', $x1['to'], $x1['msg']);
                                $i++;
                                // $this->data->insert("sms",$x);
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->insert("sms", $x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "mempacasGroupMemberSMS"){
                        $to = $data['memberId'];
                        if($cBalance >= (2*count($to))){
                            $i = 1;
                            $a = $this->data->fetch('member', array('id' => $to, 'status' => 'active'));
                            $x1 = array();
                            $x1['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                            $smsCount = strlen($x1['msg']);
                            if(round($smsCount / 160) <= 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount / 160); };
                            $x1['rec'] = $a[0]['mobileNo'];
                            $x['msg'] = $x1['msg'];
                            $x['to'] = $a[0]['fname']." ".$a[0]['lname'];
                            $x['toId'] = $to;
                            $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                            $this->data->insert("sms",$x);
                            $this->session->set_userdata("msg","Contact SMS sent.");
                        }
                    }
                }else{
                    $this->session->set_userdata("msg","Not Enough Balance");
                }
            }
            //  print_r($_SERVER['HTTP_REFERER']);
            // redirect("admin");
            header("Location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
        
        public function editSendSMS($type = "number", $smsId){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)) {
                $data['totalSent'] = $this->data->myquery("SELECT COUNT(`id`) as `qty` FROM `sms`");
                $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
                $cBalance = $data['bucket'][0]['qty'] - 2 * $data['totalSent'][0]['qty'];
                $data =null;
                if($cBalance > 0){
                    $data = $this->input->post();
                    if($type == "number"){
                        $to = explode(",",$data['to']);
                        //var_dump($to);
                        //count($to);
                        if($cBalance >= count($to)){
                            foreach($to as $k=>$v){
                                $x = array();
                                $x['msg'] = $data['msg'];
                                $x['to'] = $v;
                                $this->sendSMS1('RCCGVHL', $x['to'], $x['msg']);
                                $this->data->insert("sms",$x);
                            }
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == 'gender'){
                        $to = $data['gender'];
                        foreach($to as $a) {
                            $name = $this->data->fetch('member', array('gander' => $a));
                            foreach($name as $mem) {
                                $name1[] = $mem['fname'];
                                $id[] = $mem['id'];
                            }
                        }
                        $x = array();
                        $x['to'] = implode(',', $name1);
                        $x['toId'] = implode(',', $id);
                        $x['msg'] = $data['msg'];
                        if($cBalance >= (2* count($id))) {
                            $i = 0;
                            foreach($id as $k => $v){
                                $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                                $x1 = array();
                                $x1['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                                $x1['rec'] = $a[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                }
                                // $this->data->insert("sms",$x);
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->update(array('id' => $smsId),"sms",$x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }
                    }
                    if($type == 'christconvert'){
                        $x['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                        $x['to'] = $data['fname'];
                        $smsCount = strlen($data['msg']);
                        if(round($smsCount / 160) == 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount / 160); };
                        $x1['rec'] = $data['contact'];
                        $this->sendSMS1('RCCGVHL', $x1['rec'], $x['msg']);
                        $this->data->update(array('id' => $smsId),"sms",$x);
                        $this->session->set_userdata("msg","SMS Sent Successfully.");
                    }
                    if($type == "member"){
                        $to = $data['member'];
                        foreach($to as $a){
                            $name = $this->data->fetch('member', array('id' => $a));
                            $name1[] = $name[0]['fname'];
                            $id[] = $name[0]['id'];
                        }
                        $x = array();
                        if($data['selectAll'] == 'on'){
                            $x['to'] = "All Members";
                            $x['toId'] = implode(',', $id);
                        }else{
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                        }
                        $x['msg'] = $data['msg'];
                        if($cBalance >= (2 * count($to))){
                            $i = 0;
                            foreach($to as $k=>$v){
                                $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                                $x1 = array();
                                $x1['msg'] = preg_replace("/[\n\r]/","",$data['msg']); 
                                $x1['rec'] = $a[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                }
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->update(array('id' => $smsId),"sms",$x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "businessPage"){
                        $to = $data['pageId'];
                        $pageDetail = $this->data->fetch('business', array('id' => $to));
                        foreach($pageDetail as $a){
                            $name = $this->data->fetch('member', array('id' => $a['user_id']));
                            $name1[] = $name[0]['fname'];
                            $id[] = $name[0]['id'];
                        }
                        $x = array();
                        if($data['selectAll'] == 'on'){
                            $x['to'] = "All Members";
                            $x['toId'] = implode(',', $id);
                        }else{
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                        }
                        $x['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                        
                        if($cBalance >= (2 * count($to))){
                            $i = 0;
                            foreach($id as $k=>$v){
                                $a = $this->data->fetch("member",array('id'=>$v, 'status' => 'active'));
                                $x1 = array();
                                $x1['msg'] = $data['msg'];
                                $x1['rec'] = $a[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                }
                                // $this->data->insert("sms",$x);
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->update(array('id' => $smsId),"sms",$x);
                            $smsPage = array(
                                'msg' => $data['msg'],
                                'to' => $a[0]['id']
                            );
                            $this->data->insert('smsPage', $smsPage);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "church"){
                        if($cBalance >= (2*count($to))){
                            $i = 0;
                            $to = $this->data->fetch("membgroup",array('g_id'=>$data['to']));
                            $x = array();
                            $x['msg'] = preg_replace("/[\n\r]/","",$data['msg']);
                            foreach($to as $uid){
                                $uidAll[] = $uid['user_id'];
                            }
                            foreach($uidAll as $a){
                                $name = $this->data->fetch('member', array('id' => $a));
                                $name1[] = $name[0]['fname'];
                                $id[] = $name[0]['id'];
                            }
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                            $x['churchGroup'] = $data['to'];
                            foreach($uidAll as $k){
                                $v = $this->data->fetch("member", array("id" => $k));
                                $x1 = array();
                                $x1['msg'] = $data['msg'];
                                $x1['to'] = $v[0]['mobileNo'];
                                if($data['scheduleCheck']){
                                    if($data['schedule'] == 'once'){
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleStartDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }else{
                                        $x['scheduleDate'] = $data['scheduleStartDate'];
                                        $x['scheduleEndDate'] = $data['scheduleEndDate'];
                                        $x['scheduleTime'] = date('H:i:s', strtotime($data['scheduleTime']));
                                        $x['schedule'] = $data['schedule'];
                                        $x['makeSchedule'] = 0;
                                    }
                                }else{
                                    unset($data['scheduleCheck']);
                                    unset($data['scheduleStartDate']);
                                    unset($data['scheduleEndDate']);
                                    unset($data['schedule']);
                                    $this->sendSMS1('RCCGVHL', $x1['rec'], $x1['msg']);
                                }
                                $i++;
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->update(array('id' => $smsId),"sms",$x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                    if($type == "business"){
                        if($cBalance >= (2*count($to))){
                            $i = 0;
                            $to = $this->data->fetch("member",array('businessGroup'=>$data['to'], 'status' => 'active'));
                            foreach($to as $uid){
                                $uidAll[] = $uid['id'];
                            }
                            foreach($uidAll as $a){
                                $name = $this->data->fetch('member', array('id' => $a));
                                $name1[] = $name[0]['fname'];
                                $id[] = $name[0]['id'];
                            }
                            $x = array();
                            $x['msg'] = $data['msg'];
                            $x['to'] = implode(',', $name1);
                            $x['toId'] = implode(',', $id);
                            $x['businessGroup'] = $data['to'];
                            foreach($to as $k=>$v){
                                $x1 = array();
                                $x1['msg'] = $data['msg'];
                                $x1['to'] = $v['mobileNo'];
                                $this->sendSMS1('RCCGVHL', $x1['to'], $x1['msg']);
                                $i++;
                                // $this->data->insert("sms",$x);
                            }
                            $x['sentSMSCount'] = $i;
                            $this->data->insert("sms", $x);
                            $this->session->set_userdata("msg","Sent Successfully");
                        }else{
                            $this->session->set_userdata("msg","Not Enough Balance");
                        }
                    }
                }else{
                    $this->session->set_userdata("msg","Not Enough Balance");
                }
            }
            //  print_r($_SERVER['HTTP_REFERER']);
            // redirect("admin");
            header("Location:".$_SERVER['HTTP_REFERER']);
            exit();
        }
        
        public function statusMember($id,$status){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->data->update(array("id"=>$id),"member",array("status"=>$status));
            }
            redirect("admin/view/manage_users");
        }
        
        public function statusGroup1($id,$status){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->data->update(array("id"=>$id),"churchgroup",array("status"=>$status));
            }
            redirect("admin/manage_group_activity");
        }
        
        public function statusAdvert($id, $status) {
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->data->update(array("id"=>$id),"advert",array("approval"=>$status));
            }
            redirect("admin/view/advert");
        }
        
        public function deleteMember($id, $status){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->data->delete(array('id' => $id), 'member');
            }
            redirect("admin/view/delete_users");
        }
        
        public function statusGroupApproval($id, $status,$reg){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $member = $this->data->fetch('membgroup', array('id' => $id));
                $this->data->update(array("id" => $id), 'membgroup', array("status" => $status));
                if($status == 'approved'){
                    $x = file_get_contents(site_url('admin/notifyMsgGrouptemp/'.$member[0]['g_id'].'?id='.$member[0]['user_id']));
                    $sub = "Membership Management System Group Approval";
                    $to = $this->data->fetch('member', array('id' => $member[0]['user_id'], 'status' => 'active'))[0]['email'];
                    $emailSub = $this->data->fetch('member', array('id' => $member[0]['user_id'], 'status' => 'active'))[0]['emailSub'];
                    if($emailSub){
                        $this->email
                                ->from('no_reply@mmsapp.org', $this->config->item('companyName'))
                                ->to($to)
                                ->subject($sub)
                                ->message($x)
                                ->send();
                    }
                }
            }else{
                $this->login();
            }
            redirect("admin/view_members/".$reg);
        }
        
        public function statusTestimonies($id,$status){
            $check = $this->session->userdata('userAdmin');
            $data = array('id' => $id);
            if(!empty($check)){
                $this->data->update(array("id"=>$id),"testimonies",array("approval"=>$status));
                if($status == 1){
                    $prevMsg = $this->data->fetch("testimonies",$data);
                    $x = file_get_contents(site_url('admin/notifMsgTesttemp?id='.$prevMsg[0]['id']));
                    $sub = "Membership Management System";
                    $xx = $this->data->fetch("member", array('status' => 'active'));
                    foreach($xx as $xxx){
                        $to = $xxx['email'];
                        if($xxx['emailSub']){
                        $this->email
                            ->from('no_reply@mmsapp.org', $this->config->item('companyName'))   // Optional, an account where a human being reads.
                            ->bcc($to)
                            ->subject($sub)
                            ->message($x)
                            ->send();
                        }
                    }
                }
            }
            redirect("admin/view/testimonies");
        }
        
        public function notifyMsgGrouptemp($groupId){
            $x['to'] = $this->data->fetch('member', array("id" => $_GET['id'], 'status' => 'active'));
            $groupName = $this->data->Fetch('churchgroup', array("id" => $groupId))[0]['name'];
            $name = $x['to'][0]['fname']." ".$x['to'][0]['lname'];
            $x['msg'] = "Thanks for joining the <strong>".$groupName."</strong> group,your admittance has been confirmed by Admin,you can now start chatting with other members of the group.";
            $data['email'][0]['msg'] = "<p> Dear ".$name." <br/></p>";
            $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']."</p>";
            $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/view/groupChat#'.$groupId)."'><span class='btn-info'>VIEW</span></a></p>";
            $this->load->view("email",$data);
        }
        
        public function notifyEmail(){
            $data['email'][0]['msg'] = "<p style='font-size: 17pt;'>Dear {name},</p><br/>";
            $data['email'][0]['msg'] .= "<p>{message}</p><br/>";
            $url = site_url()."/PRIVACY POLICY.pdf";
            $this->load->view('email', $data);
        }
        
        public function notifMsgTesttemp(){
            $a = $this->data->fetch("testimonies", array('id'=>$_GET['id']));
            $x['to'] = $this->data->fetch("member",array("id"=>$a[0]['user_id'], 'status' => 'active'));
            $x['msg'] = urldecode($a[0]['msg']);
            $x['to'][0]['name'] = ($a[0]['anon'] == 'true') ? "Anonymous Member" : $x['to'][0]['fname']." ".$x['to'][0]['lname'];
            $name = $x['to'][0]['fname']." ".$x['to'][0]['lname'];
            $data['email'][0]['msg'] = "<p> Dear User, <br/><br/> <strong>". $x['to'][0]['name'] .",</strong>  shared a testimony:</p>";
            $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']."</p>";
            $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/view/testimonies')."'><span class='btn-info'>VIEW</span></a></p>";
            $this->load->view("email",$data);
        }
        
        public function notifMsgTestReply(){
            $a = $this->data->fetch("p_request", array('id'=>$_GET['id']));
            $x['to'] = $this->data->fetch("member",array("id"=>$a[0]['user_id'], 'status' => 'active'));
            $rply = $this->data->fetch("prayerRequestReply", array("id" => $_GET['replyId']));
            $x['msg'] = urldecode($rply[0]['reply_text']);
            $x['to'][0]['name'] = ($a[0]['anon'] == 'true') ? "Anonymous Member" : $x['to'][0]['fname']." ".$x['to'][0]['lname'];
            $data['email'][0]['msg'] = "<p> <strong>". $x['to'][0]['name'] .",</strong> Admin Replied your prayer request:</p>";
            $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']."</p>";
            $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/view/prayerRequest')."'><span class='btn-info'>VIEW</span></a></p>";
            $this->load->view("email",$data);
        }
        
        public function statusgroup($id,$status,$table,$red){
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $this->data->update(array("id"=>$id),$table,array("status"=>$status));
            }
            redirect("admin/view/".$red);
        }
        
        public function notifEmailtemp(){
            $_GET['msg'] = urldecode($_GET['msg']);
            $extraDetail = "";
            if($_GET['msg'] == 'word'){
                $x = $this->data->fetch('words',array('id'=>$_GET['id']));
            }
            $detail = "<p>Dear {name},</p><br/>";
            $detail .= "<p>Admin just updated a ".$_GET['msg']."</p><br/>";
            $detail .= "Title: <strong> {title} </strong><br/>";
            $detail .= "Author: <strong> {author} </strong><br/>";
            $data['email'][0]['msg'] = "<p>".$detail."<br/> Click on the link below to view in your member’s area </p>";
            $data['email'][0]['msg'] .= "<p><a href='".site_url()."'>Click Here</a></p>";
            $this->load->view("email",$data);
        }
        
        public function notifEmailtempForbulletin(){
            $x = $this->data->fetch('bulletin',array('id'=>$_GET['id']));
            $news = $this->data->fetch('details', array('id' => 1));
            // $detail = "<p>Dear {name},</p><br/>";
            // $detail .= "<p>The admin just updated  the News & Bulletin area in your member’s portal. </p><br/>";
            // $detail .= "Title: <strong> ".$x[0]['title']." </strong><br/>";
            $detail = $news[0]['newsMsg'];
            $data['email'][0]['msg'] = "<p>".$detail."<br/> Click on the link below to  </p>";
            $data['email'][0]['msg'] .= "<p><a href='".site_url('home/view/read_bulletin/'.$x[0]['id'])."'>Read More</a></p><br/>";
            $url = site_url()."/PRIVACY POLICY.pdf";
            $this->load->view("email",$data);
        }
        
        public function notifEmailtempForLive(){
            $x = $this->data->fetch('live',array('id'=>$_GET['id']));
            $live = $this->data->fetch('details', array('id' => 1));
            // $detail = "<p>Dear {name},</p><br/>";
            // $detail .= "<p>The admin has just uploaded a NEW Video into your Live Event section in your member’s portal. </p><br/>";
            // $detail .= "Minister Name: <strong>".$x[0]['minister']."</strong><br/>";
            // $detail .= "Title: <strong> ".$x[0]['title']." </strong><br/>";
            $detail = $live[0]['liveMsg'];
            $data['email'][0]['msg'] = "<p>".$detail."<br/> Click on the link below to </p>";
            $data['email'][0]['msg'] .= "<p><a href='".site_url('home/view/live')."'><b>Watch</b></a></p><br/>";
            $url = site_url()."/PRIVACY POLICY.pdf";
            // $data['email'][0]['msg'] .= "<span style='text-align: center;font-size: 8px;LINE-HEIGHT:0.5px;'>To manage your email preferences or unsubscribe from the Membership Management System emails please <a href='{unsubscribe}' target='__blank'><strong>click here</strong></a>. We won't pass on your email address to anyone else: see our <a href='".$url."'>privacy policy</a>. Reproduced from an email sent by the Membership Management System, on behalf of RCCG VICTORY HOUSE LONDON, 5 CONGREVE STREET, SE17 1TJ. TEL: +44 207 252 7522.</span><br/>";
            $this->load->view("email",$data);
        }
        
        public function notifEmailtempForVoicenote() {
            $x = $this->data->fetch('audioNote', array('id' => $_GET['id']));
            $audioNote = $this->data->fetch('details', array('id' => 1));
            $detail = $audioNote[0]['voiceNote'];
            $data['email'][0]['msg'] = "<p>".$detail."<br/> Click on the link below to </p>";
            $data['email'][0]['msg'] .= "<p><a href='".site_url('home/view/audioNote')."'><b>Listen</b></a></p><br/>";
            $url = site_url()."/PRIVACY POLICY.pdf";
            $this->load->view('email', $data);
        }
        
        public function notifMempacasEmail()
        {
            $mempacas = $this->data->fetch('details', array('id' => 1));
            $detail = $mempacas[0]['mempacasEmail'];
            $data['email'][0]['msg'] = "<p>".$detail;
            $url = site_url()."/PRIVACY POLICY.pdf";
            $this->load->view('email', $data);
        }
        
        public function notifEmailtempForWord(){
            $x = $this->data->fetch('words',array('id'=>$_GET['id']));
            // $detail = "<p>Dear {name},</p>";
            // $detail .= "<p>The admin has just uploaded a sermon into your Word Log menu in your member’s portal. </p><br/>";
            // $detail .= "<p>Preacher Name: <strong> ".$x[0]['preacher_name']." </strong></p><br/>";
            // $detail .= "<p>Preached Topic: <strong> ".$x[0]['topic']." </strong></p></br>";
            $word = $this->data->fetch('details', array('id' => 1));
            $detail = $word[0]['wordMsg'];
            $data['email'][0]['msg'] = "<p>".$detail." Click on the link below to </p>";
            $data['email'][0]['msg'] .= "<p><a href='".site_url('home/view/word_detailed?id='.$x[0]['id'])."'>Read More</a></p><br/>";
            $url = site_url()."/PRIVACY POLICY.pdf";
            // $data['email'][0]['msg'] .= "<span style='text-align: center;font-size: 8px;LINE-HEIGHT:0.5px;'>To manage your email preferences or unsubscribe from the Membership Management System emails please <a href='{unsubscribe}' target='__blank'><strong>click here</strong></a>. We won't pass on your email address to anyone else: see our <a href='".$url."'>privacy policy</a>. Reproduced from an email sent by the Membership Management System, on behalf of RCCG VICTORY HOUSE LONDON, 5 CONGREVE STREET, SE17 1TJ. TEL: +44 207 252 7522.</span><br/>";
            $this->load->view("email",$data);
        }
        
        public function notifEmailtempForPrayer(){
            $x = $this->data->fetch('p_request',array('id'=>$_GET['id']));
            $name = $this->data->fetch('member', array('id' => $x[0]['user_id'], 'status' => 'active'));
            $detail = "<p>Dear {name},</p>";
            $detail .= "<p>Shalom, the admin on behalf of the pastor have just assigned you with a prayer request to follow up.</p><br/>";
            $detail .= "<p><strong>Prayer Request:  </strong>".$x[0]['desc']."</p><br/>";
            $detail .= "<p><strong>Prayer Request From: </strong>".ucfirst($name[0]['title'])." ".ucfirst($name[0]['fname'])." ".ucfirst($name[0]['lname'])."</p></br>";
            $detail .= "<p> Phone No. : ".ucfirst($name[0]['mobileNo'])."</p></br>";
            $detail .= "<p>Email : ".$name[0]['email']."</p></br>";
            $detail .= "<p><strong>Prayer Request Priority:  </strong>".ucfirst($x[0]['priority'])."</p></br>";
            // $data['email'][0]['msg'] = "<p>".$detail." Click on the link below to </p>";
            // $data['email'][0]['msg'] .= "<p><a href='".site_url('home/view/prayerRequest?id='.$x[0]['id'])."'>Read More</a></p><br/>";
            $data['email'][0]['msg'] = $detail;
            $url = site_url()."/PRIVACY POLICY.pdf";
            // $data['email'][0]['msg'] .= "<span style='text-align: center;font-size: 8px;LINE-HEIGHT:0.5px;'>To manage your email preferences or unsubscribe from the Membership Management System emails please <a href='{unsubscribe}' target='__blank'><strong>click here</strong></a>. We won't pass on your email address to anyone else: see our <a href='".$url."'>privacy policy</a>. Reproduced from an email sent by the Membership Management System, on behalf of RCCG VICTORY HOUSE LONDON, 5 CONGREVE STREET, SE17 1TJ. TEL: +44 207 252 7522.</span><br/>";
            $this->load->view("email",$data);
        }
        
        public function sendBirthdayMsg(){

            $data = $this->input->post();
            $check = $this->session->userdata('userAdmin');
            if(!empty($check)){
                $smsCount = strlen($data['msg']);
                if(round($smsCount / 160) == 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount / 160); };
                $this->sendSMS1('RCCGVHL', $data['mobile'], $data['msg']);
                $sms = array(
                        'msg' => 'Birthday SMS Send.',
                        'to' => $data['mobile'],
                        'sentSMSCount' => $x['sentSMSCount']
                    );
                    $this->data->insert('sms', $sms);
                $this->session->seT_userdata('msg', 'Message sent successfully.');
                redirect("admin/view/birthdays");
            }else{
                redirect("admin/");
            }
        }
        
        public function sendBirtdaySMS(){
            $date = date("j");
            $month = date("n");
            $data['members'] = $this->data->fetch('member',array('birth_date'=>$date,'birth_month'=>$month, 'status' => 'active'));
            // foreach($data['members'] as $k=>$v){
            foreach($data['members'] as $v){
                $details = $this->data->fetch('details');
                $check = $this->data->fetch('btrigers',array("user_id"=>$v['id'],'year'=>date('Y')));
                $msg = $details[0]['b_day'];
                $name = $v['title'] . " " . $v['fname'];
                $msg = str_replace("{name}",$name,$msg);
                if(empty($check)){
                    // $url = 'http://api.infobip.com/sms/1/text/single';
                    // $data = array("from" => "RCCGVHL","to"=> $v['mobileNo'],"text"=>$msg);
                    try {
                        // print_r($v['mobileNo']);
                        // print_r($msg);
                        // return;
                        $this->sendSMS1('RCCGVHL', $v['mobileNo'], $msg);
                        // $ch = curl_init($url);
                        // $data_string = json_encode($data);
                        // if (FALSE === $ch)
                        //     throw new Exception('failed to initialize');
                        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        // curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Authorization: Basic QmV6YWxlZWw6cDdtVkw4d2U='));
                        // curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        // $output = curl_exec($ch);
                        // if (FALSE === $output)
                        //     throw new Exception(curl_error($ch), curl_errno($ch));
                    } catch(Exception $e) {
                        trigger_error(sprintf(
                            'Curl failed with error #%d: %s',
                            $e->getCode(), $e->getMessage()),
                            E_USER_ERROR);
                    }
                    $this->data->insert('btrigers',array("user_id"=>$v['id'],'year'=>date('Y')));
                    $smsCount = strlen($msg);
                    if(round($smsCount / 160) == 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount / 160); };
                    $sms = array(
                        'msg' => 'Birthday SMS.',
                        'bMsg' => $msg,
                        'to' => $v['fname']." ".$v['lname'],
                        'toId' => $v['id'],
                        'sentSMSCount' => $x['sentSMSCount']
                    );
                    $this->data->insert('sms', $sms);
                }
            }
            $this->sendChildBirtdaySMS();
        }
        
        public function sendChildBirtdaySMS(){
            $date = date("j");
            $month = date("n");
            $data['members'] = $this->data->fetch('children',array('day'=>$date,'month'=>$month));
            foreach($data['members'] as $k=>$v){
                $details = $this->data->fetch('details');
                $check = $this->data->fetch('childtriggers',array("user_id"=>$v['id'],'year'=>date('Y')));
                $msg = $details[0]['b_day'];
                $name = $v['title'] . " " . $v['fname'];
                $msg = str_replace("{name}",$name,$msg);
                if(empty($check)){
                    $this->data->insert('childtriggers',array("user_id"=>$v['id'],'year'=>date('Y')));

                    $parent = $this->data->fetch('member',array('id'=>$v['parent_id'], 'status' => 'active'));
                    if(!empty($parent)){
                        $relation = ($v['relation'] == 'grand') ? "Grandchild" : "Child";
                        $parentMsg = "Dear ".$parent[0]['fname'].", Today is your ".$relation."'s birthday, Happy Birthday to ".$v['fname']." and as your Pastor I celebrate your ".$relation." and the entire RCCG VICTORY HOUSE celebrates with you. I pray ".$v['fname']." receives the grace to flourish beyond your imagination. From your pastor,  Leke Sanusi.";
                        $url = 'http://api.infobip.com/sms/1/text/single';
                        $data = array("from" => "RCCGVHL","to"=> $parent[0]['mobileNo'],"text"=>$parentMsg);
                        try {
                            $this->sendSMS1('CMC', $parent[0]['mobileNo'], $parentMsg);
                            // $ch = curl_init($url);
                            // $data_string = json_encode($data);
                            // if (FALSE === $ch)
                            //     throw new Exception('failed to initialize');
                            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                            // curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Authorization: Basic QmV6YWxlZWw6cDdtVkw4d2U='));
                            // curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                            // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                            // $output = curl_exec($ch);
                            $sms = array(
                                'msg' => 'Child Birthday SMS.',
                                'to' => $parent[0]['fname']." ".$parent[0]['lname'],
                                'sentSMSCount' => 1
                            );
                            $this->data->insert('sms', $sms);
                            // if (FALSE === $output)
                            //     throw new Exception(curl_error($ch), curl_errno($ch));
                        } catch(Exception $e) {
                            trigger_error(sprintf(
                                                        'Curl failed with error #%d: %s',
                                                        $e->getCode(), $e->getMessage()),
                                E_USER_ERROR);
                        }
                    }
                }
            }
        }
    }

/**
<!--<script>
var data = JSON.stringify({
"from": "Membership Management System",
"to": "<?= $v['mobileNo'] ?>",
"text": "<?= $msg ?>"
});
var xhr = new XMLHttpRequest();
xhr.withCredentials = false;
xhr.addEventListener("readystatechange", function () {
if (this.readyState === this.DONE) {
console.log(this.responseText);
}
});
xhr.open("POST", "http://api.infobip.com/sms/1/text/single");
xhr.setRequestHeader("authorization", "Basic QmV6YWxlZWw6cDdtVkw4d2U=");
xhr.setRequestHeader("content-type", "application/json");
xhr.setRequestHeader("accept", "application/json");
xhr.send(data);
console.log(data);
</script>
*/
/**
 *
 * Have a look on my portfolio:
Ongoing & Completed Projects With my Team:

 *
www.devlabx.com/cullen_mahony
www.devlabx.com/SSUET
www.devlabx.com/konakava_new
www.ice-worldnewzealand.co.nz
www.totalfarm.com.au
www.hronline.com.au
www.jpspastry.com

http://devlabx.com/ariella_update2/                         ->   online chef booking platform
http://devlabx.com/theanimatica.com/demo/                   ->   portfolio
http://jetnetix.com/                                        ->   portfolio
http://telmeconsulting.com/                                 ->   portfolio
http://devlabx.com/thealbaneseteam/front/                   ->   portfolio
http://www.devlabx.com/western-chemical                     ->   portfolio
http://devlabx.com/ezrolling/                               ->   Pocket rolling wraps
http://devlabx.com/rhenTravels/                             ->   Holiday Trips Booking Website
http://www.devlabx.com/universalmedicaltourism              ->   Trips Booking Website
http://devlabx.com/avago/                                   ->   Low deposit mortgage and commercial equipment finance
http://devlabx.com/communitymoversllc.com/
http://thebricksmedia.com                                   ->
http://trainings.jetnetix.com                               ->   institute
http://lumenaam.com
http://www.transfersrumours.com/                            ->   Sports News
http://www.devlabx.com/demo1                                ->   ecommerce
http://www.spurtask.com/                                    ->   Content Writing
http://autowalay.com/                                       ->   Online Ride Hiring
http://devlabx.com/andrewwstoll/                            ->   Property Rent Purchase
http://www.7thstreetsuites.com/                             ->   Property Rent Purchase
http://devlabx.com/miami-prime-living/                      ->   Property Rent Purchase
http://devlabx.com/fastfolge/                               ->   Online Match Making Website
http://devlabx.com/blizecare/                               ->   Healthcare company's CRM
http://devlabx.com/ekattor-school-management-system-pro/    ->   School Management System
http://devlabx.com/Erwin-final/                             ->   Management System
http://www.learnwithryan.com/                               ->   Learning Institute
https://www.freshsales.io/                                  ->   Contact Management Software
http://tutormanager.co.uk/                                  ->   Tutor Management System
http://demo.mmsonline.website                               ->   Church Management System | john@gmail.com 1234 |
http://mmsonline.website                                    ->   Church Management System



 * PS: devlabx is our server name
 */