<?php
class Home extends CI_Controller{
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
    
    public function editChildDetailEdit()
        {
            $check = $this->session->userdata('userMember');
            if(!empty($check)) {
                $data = $this->input->post();
                $performance = $data['performance'];
                $behaviour = $data['behaviour'];
                $teacherRemark = $data['mostRecentRemark'];
                $childId = $data['childId'];
                $classId = $data['classId'];
                $attendanceId = $data['attendanceId'];
                $this->data->update(array('id' => $attendanceId), 'markAttendance', array('performance' => $performance, 'behaviour' => $behaviour, 'teacherRemark' => $teacherRemark));
                echo 'Details updated Successfully.';
            }
        }
    
    public function editChildDetail()
    {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data = $this->input->post();
            $incidentReport = $data['incidentReport'];
            $mostRecentRemark = $data['mostRecentRemark'];
            $incidentId = $data['incidentId'];
            $attendanceId = $data['attendanceId'];
            $this->data->update(array('id' => $incidentId), 'incidentReports', array('anyRecentIncident' => $incidentReport));
            $this->data->update(array('id' => $attendanceId), 'markAttendance', array('teacherRemark' => $mostRecentRemark));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }
    
    public function getMempacasResult() {
        $month = $this->input->post('month');
        $groupId = $this->input->post('groupId');
        $modifiedMonth = date('Y-m%', strtotime($month));
        // echo 'SELECT * FROM `mempacasGroupMember` WHERE `lastContactDate` like ("'.$modifiedMonth.'") and groupId = '.$groupId;
        // $data = $this->data->myquery('SELECT distinct(`memberId`) FROM `mempacasGroupMember` WHERE groupId = '.$groupId);
        $data = $this->data->myquery("SELECT membersId FROM `mempacasGroup` WHERE id = {$groupId}");        
        $data = explode(",",$data[0]['membersId']);
        // print_r();
        // return;
        ?>
        <table id="dt_default" class="uk-table uk-table-divider" cellspacing="0" width="100%">
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
                                                        <th width="15%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($data)){foreach($data as $val1){ ?>
                                                        <?php  $mempacasGroupMember = $this->data->myquery('SELECT * FROM `mempacasMemerResponse` WHERE `createdAt` like ("'.$modifiedMonth.'") and groupId = '.$groupId.' and memberId = '.$val1.' ORDER BY updatedAt DESC'); ?>
                                                        <?php $membersDetail = $this->data->fetch('member', array('id' => $val1)); ?>
                                                        <tr>
                                                            <!--<td><?= $val1; ?></td>-->
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
                                                                        <!--<?php if(strlen($mempacasGroupMember[0]['memberResponse']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['memberResponse']),0,50), 20, "<br>\n"); ?> <a href="#memberResponse<?= $membersDetail[0]['id'] ?>" data-uk-modal>... <span class="btn-primary">View More</span></a> <?php }else{ echo wordwrap($mempacasGroupMember[0]['memberResponse'], 20, "<br/>\n"); } ?> -->
                                                                        <?php if(strlen($mempacasGroupMember[0]['memberResponse']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['memberResponse']),0,50), 20, "<br>\n"); ?> <a href="#memberResponse<?= $membersDetail[0]['id'] ?>" data-uk-modal>... <span class="btn-primary" onclick="view_more(`<?= $mempacasGroupMember[0]['memberResponse'] ?>`, `memberResponse<?= $membersDetail[0]['id'] ?>`)" >View More</span></a> <?php }else{ echo wordwrap($mempacasGroupMember[0]['memberResponse'], 20, "<br/>\n"); } ?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['memberResponse']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['specialPrayerRequest'])){ 
                                                                        echo 'No Prayer Requested'; 
                                                                    }else{
                                                                    ?>
                                                                    <!--<?php if(strlen($mempacasGroupMember[0]['specialPrayerRequest']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['specialPrayerRequest']),0,50), 20, "<br>\n"); ?> <a href="#specialPrayer<?= $membersDetail[0]['id'] ?>" data-uk-modal>... <span class="btn-primary">View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['specialPrayerRequest'], 20, "<br/>\n"); }?> -->
                                                                    <?php if(strlen($mempacasGroupMember[0]['specialPrayerRequest']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['specialPrayerRequest']),0,50), 20, "<br>\n"); ?> <a href="#specialPrayer<?= $membersDetail[0]['id'] ?>" data-uk-modal>... <span class="btn-primary" onclick="view_more(`<?= $mempacasGroupMember[0]['specialPrayerRequest'] ?>`, `specialPrayer<?= $membersDetail[0]['id'] ?>`)" >View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['specialPrayerRequest'], 20, "<br/>\n"); }?> 
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['specialPrayerRequest']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['comment'])){ 
                                                                        echo 'No Comment'; 
                                                                    }else{ 
                                                                    ?>
                                                                    <!--<?php if(strlen($mempacasGroupMember[0]['comment']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['comment']),0,50), 20, "<br>\n"); ?> <a href="#comment<?= $membersDetail[0]['id'] ?>" data-uk-modal>... <span class="btn-primary">View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['comment'], 20, "<br/>\n"); } ?>-->
                                                                    <?php if(strlen($mempacasGroupMember[0]['comment']) >= 50){ echo wordwrap(substr(strip_tags($mempacasGroupMember[0]['comment']),0,50), 20, "<br>\n"); ?> <a href="#comment<?= $membersDetail[0]['id'] ?>" data-uk-modal>... <span class="btn-primary" onclick="view_more(`<?= $mempacasGroupMember[0]['comment'] ?>`, `comment<?= $membersDetail[0]['id'] ?>`)" >View More</span></a><?php }else{ echo wordwrap($mempacasGroupMember[0]['comment'], 20, "<br/>\n"); } ?>
                                                                    <?php
                                                                        // echo ucfirst($mempacasGroupMember[0]['comment']); 
                                                                    } ?></td>
                                                            <td><?php if(empty($mempacasGroupMember[0]['seniorPastorToFollowUp']) || $mempacasGroupMember[0]['seniorPastorToFollowUp'] == 0){ echo 'No'; }else{ echo 'Yes'; } ?></td>
                                                            <td><a href="#editComment<?= $membersDetail[0]['id'] ?>" data-uk-modal title="edit"><i class="material-icons">edit</i></a>
                                                            <!--| <a href="#contactMember<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Contact Member"><i class="material-icons">group</i></a> -->
                                                            <!--| <a href="#assignGroup<?= $membersDetail[0]['id'] ?>" data-uk-modal><i class="material-icons">drafts</i></a> -->
                                                            | <a href="#sendSMS<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Send SMS"><i class="material-icons">inbox</i></a> 
                                                            | <a href="#sendEmail<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Send Email"><i class="material-icons">mail</i></a>
                                                            <!--| <a onclick="deleteC('<?= site_url('home/deleteMemberMempacasGroup/mempacasGroupMember/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')" title="Clear Information"><i class="material-icons">perm_device_information</i></a></td>-->
                                                        </tr>
                                                        <?php $i++; }}else{ ?>
                                                        <tr>
                                                            <td colspan="9"><center>No Record Found.</center></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
        <?php
    }
    
    public function getChildResult() {
        $month = $this->input->post('month');
        $classId = $this->input->post('groupId');
        $modifiedMonth = date('Y-m%', strtotime($month));
        $data = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE id = ".$classId);
        ?>
        <table id="dt_default" class="uk-table uk-table-divider" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>S/No</th>
                                                        <th>Children Name</th>
                                                        <th>Gender</th>
                                                        <th>Attendance %</th>
                                                        <th>Behaviour %</th>
                                                        <th>Performance %</th>
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
                                                    <?php $i=1; if(isset($data[0]['studentId'])){ foreach($members as $val1){ ?>
                                                        <?php $mempacasGroupMember = $this->data->fetch('mempacasGroupMember', array('memberId' => $val1)); ?>
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
                                                            <td><?php $incidentReport = $this->data->myquery('SELECT * FROM incidentReports WHERE childId = '.$membersDetail[0]['id'].' AND `createdAt` = "'.$modifiedMonth.'" ORDER BY createdAt desc'); if(empty($incidentReport)){ 
                                                                        echo 'No Recent Incident'; 
                                                                    }else{ 
                                                                        echo $incidentReport[0]['anyRecentIncident']; 
                                                                    } ?></td>
                                                            <td><?php $attendanceRemark = $this->data->myquery('SELECT * FROM `markAttendance` WHERE childId = '.$membersDetail[0]['id'].' AND `createdAt` = "'.$modifiedMonth.'" ORDER BY createdAt desc'); if(empty($attendanceRemark)){ 
                                                                        echo 'Not Remark Yet.'; 
                                                                    }else{ 
                                                                        echo ucfirst($attendanceRemark[0]['teacherRemark']); 
                                                                    } ?></td>
                                                            <td><?php $parentName = $this->data->fetch('member', array('id' => $membersDetail[0]['parent_id']))[0]; ?><?= $parentName['fname']." ".$parentName['lname'] ?></td>
                                                            <td><?= $parentName['mobileNo'] ?></td>
                                                            <td><a href="#markAttendance<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Mark Attendance"><i class="material-icons">bookmark</i></a>
                                                            | <a href="#editComment<?= $membersDetail[0]['id'] ?>" data-uk-modal title="edit"><i class="material-icons">edit</i></a>
                                                            | <a href="#sendSMS<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Send SMS"><i class="material-icons">inbox</i></a> 
                                                            | <a href="#sendEmail<?= $membersDetail[0]['id'] ?>" data-uk-modal title="Send Email"><i class="material-icons">mail</i></a>
                                                            <!--| <a onclick="deleteC('<?= site_url('home/deleteMemberMempacasGroup/mempacasGroupMember/'.$membersDetail[0]['id']."/".$val['id']."/same") ?>')" title="Clear Information"><i class="material-icons">perm_device_information</i></a></td>-->
                                                            </td>
                                                        </tr>
                                                        <?php $i++; }}else{ ?>
                                                        <tr>
                                                            <td colspan="11"><center>No Record Found.</center></td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                    </tbody>
                                                </table>
        <?php
    }
    
    public function getMonthlyEditComment() {
            $check = $this->session->userdata('userMember');
            if(!empty($check)){
                // $data1 = $this->input->post();
                $month = $this->input->post('month');
                $groupId = $this->input->post('groupId');
                $memberId = $this->input->post('memberId');
                $modifiedMonth = date('Y-m%', strtotime($month));
                // echo 'SELECT * FROM `mempacasMemerResponse` WHERE `createdAt` like ("'.$modifiedMonth.'") and groupId = '.$groupId.' and memberId= '.$memberId.' ORDER BY id DESC';
                $data = $this->data->myquery('SELECT * FROM `mempacasMemerResponse` WHERE `createdAt` like ("'.$modifiedMonth.'") and groupId = '.$groupId.' and memberId= '.$memberId.' ORDER BY id DESC');
                print_r(json_encode($data));
            }
        }
        
    public function getMonthlyChildEditComment()
    {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $month = $this->input->post('month');
            $classId = $this->input->post('groupId');
            $childId = $this->input->post('memberId');
            $modifiedMonth = date('Y-m%', strtotime($month));
            $data['incidentReport'] = $this->data->myquery('SELECT * FROM `incidentReports` WHERE `childId` = '.$childId.' AND `createdAt` LIKE ("'.$modifiedMonth.'") ORDER BY createdAt desc');
            $data['attendanceRemark'] = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `childId` = $childId AND `createdAt` LIKE ('".$modifiedMonth."') ORDER BY createdAt desc");
            print_r(json_encode($data));
        }
    }
        
    public function incidentReport() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data = $this->input->post();
            $teacherReports = $data['teacherReport'];
            $classId = $data['groupId'];
            $childId = $data['memberId'];
            $this->data->insert('incidentReports', array('classId' => $classId, 'childId' => $childId, 'teacherReports' => $teacherReports));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }else{
            $this->login();
        }
    }
    
    public function incidentReportAjax() {
                $data = $this->input->post();
                $date = $data['reportDate'];
                $teacherReport = $data['teacherReport'];
                $classId = $data['classId'];
                $childId = $data['childId'];
                $this->data->insert('incidentReports', array('date' => date('Y-m-d', strtotime($date)), 'classId' => $classId, 'childId' => $childId, 'teacherReports' => $teacherReport));
                $childDetail = $this->data->fetch('children', array('id' => $data['childId']));
                $childName = $childDetail[0]['fname']." ".$childDetail[0]['lname'];
                $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
                $msg = "INCIDENT REPORT ALERT FOR ".$childName." Dated ".$date." at ".date('H:i')." ".$teacherReport." please see the class teacher or view your MMS parent portal area to respond accordingly.";
                $msg1 = preg_replace("/[\n\r]/", "", $msg);
                $smsCount = strlen($msg1);
                if(round($smsCount / 160) <= 0){ $sentSMSCount = "1"; }else{ $sentSMSCount = round($smsCount / 160); }
                $this->data->insert('sms', array('msg'  =>  $msg1, 'to' =>  $parentData[0]['fname']." ".$parentData[0]['lname'], 'toId' =>  $parentData[0]['id'], 'sentSMSCount'    =>  $sentSMSCount));
                $this->sendSMS('RCCGVHL', $parentData[0]['mobileNo'], $msg1);
                echo 'Incident Reported Successfully.';
        }
        
    public function markGuardianRemark() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data = $this->input->post();
            $guardianRemark = $data['guardianRemark'];
            $id = $data['markAttendanceId'];
            $this->data->update(array('id' => $id), 'markAttendance', array('guardianRemark' => $guardianRemark));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }else{
            $this->login();
        }
    }
    
    public function markIncidentComment() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data = $this->input->post();
            $parentComments = $data['guardianComment'];
            $id = $data['incidentReportId'];
            $this->data->update(array('id' => $id), 'incidentReports', array('parentComments' => $parentComments));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }else{
            $this->login();
        }
    }
        
    public function autoLogoutAttendance() {
        $attendanceRecord = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `inTime` != '00:00:00' AND `date` = '".date('Y-m-d')."'");
        foreach($attendanceRecord as $att){
            $this->data->update(array('id' => $att['id']), 'markAttendance', array('outTime' => date('H:i:s')));
        }
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
                    'teacherId' =>  $data['teacherId']
                );
                $this->data->insert('markAttendance', $attendance);
                $childDetail = $this->data->fetch('children', array('id' => $data['childId']));
                $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
                $msg = "Your child ".$childDetail[0]['fname']." has been dropped by ".$droppedBy." on the ".date('d-M-Y')." at ".date('H:i:s');
                $this->sendSMS('RCCGVHL', $parentData[0]['mobileNo'], $msg);
                echo "Timein Successfully.";
            }
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
    
    public function markAttendanceLogout() {
            $data = $this->input->post();
            $date = $data['attendanceDate'];
            $childId = $data['childOutId'];
            if($data['droppedBy'] == 'others'){
                $droppedBy = $data['pickedName'];
            }else{
                $droppedBy = $data['pickedBy'];
            }
            $attendanceRecord = $this->data->fetch('markAttendance', array('date' => date('Y-m-d', strtotime($date)), 'childId' => $childId));
            if(count($attendanceRecord) > 0){
                $this->data->update(array('id' => $attendanceRecord[0]['id']), 'markAttendance', array('outTime' => date('H:i:s'), 'pickedBy' => $droppedBy));
                $childDetail = $this->data->fetch('children', array('id' => $data['childOutId']));
                $parentData = $this->data->fetch('member', array('id' => $childDetail[0]['parent_id']));
                $msg = "Your child ".$childDetail[0]['fname']." has been picked by ".$droppedBy." on the ".date('d-M-Y')." at ".date('H:i:s');
                $this->sendSMS('RCCGVHL', $parentData[0]['mobileNo'], $msg);
                echo "Timeout Successfully.";
            }else{
                echo "You have not time in.";
            }
    }
    
    public function businessWebsite($fieldName) {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            
            if($fieldName == 'themeSelect'){
                $data = $this->input->post();
                $userId = $check[0]['id'];
                $selectedTheme = $data['selectedTheme'];
                $this->data->update(array('user_id' => $userId), 'business', array('selectedTheme' => $selectedTheme));
                echo 0;
            }
            
            if($fieldName == 'businessName'){
                $data = $this->input->post();
                $userId = $check[0]['id'];
                $businessName = $data['businessName'];
                // print_r($data);
                $this->data->update(array('user_id' => $userId),'business', array('title' => $businessName));
                $business = $this->data->fetch('business', array('user_id' => $userId));
                echo $business[0]['title'];
            }
            
            if($fieldName == 'businessLogo') {
                $x = $this->do_upload($_FILES);
                $data['logo'] = $x['upload_data'][0]['file_name'];
                $data['services'] = $this->input->post('aboutUs');
                $data['logoType'] = $this->input->post('logoType');
                $userId = $check[0]['id'];
                $this->data->update(array('user_id' => $userId), 'business', $data);
                $business = $this->data->fetch('business', array('user_id' => $userId));
                echo $business[0]['logo'];
            }
            
            if($fieldName == 'whoWeAre') {
                $data['about'] = $this->input->post('whoWeAre');
                $userId = $check[0]['id'];
                $this->data->update(array('user_id' => $userId), 'business', $data);
                $business = $this->data->fetch('business', array('user_id' => $userId));
                echo $business[0]['about'];
            }
            
            if($fieldName == 'currency1') {
                $data['sellingTag'] = $this->input->post('sellingTag');
                $data['currency'] = $this->input->post('currency');
                $userId = $check[0]['id'];
                $this->data->update(array('user_id' => $userId), 'business', $data);
                $business = $this->data->fetch('business', array('user_id' => $userId));
                // print_r($business);
                $data1['sellingTag'] = $business[0]['sellingTag'];
                $data1['currency'] = $business[0]['currency'];
                // print_r($data1);
                echo json_encode($data1);
            }
            
            if($fieldName == 'bannerImages') {
                $data['banner'] = $this->input->post('bannerImage');
                $userId = $check[0]['id'];
                $this->data->update(array('user_id' => $userId), 'business', $data);
                echo 0;
            }
            
            if($fieldName == 'otherFormData') {
                $data['email'] = $this->input->post('businessEmail');
                $data['phone'] = $this->input->post('contactNumber');
                $datra['address'] = $this->input->post('address1');
                $data['addressLine2'] = $this->input->post('address2');
                $data['town'] = $this->input->post('town');
                $data['postcode'] = $this->input->post('postcode');
                $data['country'] = $this->input->post('country');
                $data['selectedTheme'] = $this->input->post('theme');
                $userId = $check[0]['id'];
                $this->data->update(array('user_id' => $userId), 'business', $data);
                echo 0;
            }
        }
    }
    
    public function redirect($userId, $themeId) {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            if (!empty($userId)) {
                $data['business'] = $business = $this->data->fetch("business", array('user_id' => $userId));
            }
            $this->load->view('new/themes/'.$themeId.'/index', $data);
        }
    }
    
    public function otherPage() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data['userAdmin'] = $check;
            $data['buddyNotif'] = $this->data->fetch('buddies', array('user_id' => $check[0]['id'], 'user_seen' => 0));
            foreach($data['buddyNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['friend_id'], 'status' => 'active'));
                $data['buddyNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['buddyNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            
            $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
            foreach($data['messageNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
                $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $x = array();
            foreach($data['messageNotif'] as $k=>$v){
                $x[$v['from']][] = $v;
                //echo $v['from'];
            }
            $data['messageNotif'] = $x;
            

            //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
            $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
            foreach($data['adminmessageNotif'] as $k=>$v){
                $x = $this->data->fetch("credentials",array("id"=>$v['from']));
                $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            }
            $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ");
            $data['wordCountOnNotif'] = 0;
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            foreach($data['words'] as $k=>$v){
                $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
                $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
                if(!empty($x)){
                    $data['words'][$k]['notifStatus'] = "read";
                }else{
                    $data['wordCountOnNotif'] += 1;
                    $data['words'][$k]['notifStatus'] = "unread";
                }
            }
            $data['reminderLog'] = $this->data->myquery("SELECT * FROM reminders WHERE (FIND_IN_SET(".$check[0]['id'].", user_id) OR user_id = 0) AND adminId = '1' AND reminded = '0' AND date >= '".$today."'");
            // $data['reminderLog'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and reminded = '1' and date >= '".$today."'");
            $data['adminEvent'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and adminId = 1 and isRead = 0");
            $data['calendar'] = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$check[0]['id'].', user_id) ORDER BY `date` DESC');
            $data['products'] = $this->data->fetch("productservices", array("parent_id" => $check[0]['id']));
            $data['gallery'] = $this->data->fetch("businessGallery", array('parent_id' => $check[0]['id']));
            $this->load->view('new/header', $data);
            $this->load->view('new/businessPage', $data);
            $this->load->view('new/footer');
        }else{
            $this->login();
        }
    }
    
    public function view_mempacas_group($id) {
            $check = $this->session->userdata('userMember');
            $page_name = 'view_mempacas_group';
            $data['userAdmin'] = $check;
            $data['buddyNotif'] = $this->data->fetch('buddies', array('user_id' => $check[0]['id'], 'user_seen' => 0));
            foreach($data['buddyNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['friend_id'], 'status' => 'active'));
                $data['buddyNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['buddyNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            
            $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
            foreach($data['messageNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
                $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $x = array();
            foreach($data['messageNotif'] as $k=>$v){
                $x[$v['from']][] = $v;
                //echo $v['from'];
            }
            $data['messageNotif'] = $x;
            

            //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
            $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
            foreach($data['adminmessageNotif'] as $k=>$v){
                $x = $this->data->fetch("credentials",array("id"=>$v['from']));
                $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            }
            $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ");
            $data['wordCountOnNotif'] = 0;
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            foreach($data['words'] as $k=>$v){
                $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
                $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
                if(!empty($x)){
                    $data['words'][$k]['notifStatus'] = "read";
                }else{
                    $data['wordCountOnNotif'] += 1;
                    $data['words'][$k]['notifStatus'] = "unread";
                }
            }
            $data['reminderLog'] = $this->data->myquery("SELECT * FROM reminders WHERE (FIND_IN_SET(".$check[0]['id'].", user_id) OR user_id = 0) AND adminId = '1' AND reminded = '0' AND date >= '".$today."'");
            // $data['reminderLog'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and reminded = '1' and date >= '".$today."'");
            $data['adminEvent'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and adminId = 1 and isRead = 0");
            $data['calendar'] = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$check[0]['id'].', user_id) ORDER BY `date` DESC');
            if(!empty($id)) {
                $data['mempacasGroup'] = $this->data->myquery("SELECT * FROM `mempacasGroup` WHERE id = {$id} AND FIND_IN_SET (".$check[0]['id'].", generalInChargeId)");
                $x = $this->data->myquery("select * from `mempacasGroup` where `id` = (select min(`id`) from `mempacasGroup` where id > {$id} AND FIND_IN_SET (".$check[0]['id'].",generalInChargeId))");
                $p = $this->data->myquery("select * from `mempacasGroup` where `id` = (select max(`id`) from `mempacasGroup` where id < {$id} AND FIND_IN_SET (".$check[0]['id'].",generalInChargeId))");
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
            $this->load->view('new/header', $data);
            $this->load->view('new/' . $page_name, $data);
            $this->load->view('new/footer');
        }
        
        public function save_pdf_class($id) {
            $this->load->library('m_pdf');
            $data['classDetail'] = $this->data->myquery('SELECT * FROM `attendanceClass` WHERE id = '.$id);
            $html = $this->load->view('pdf/pdfClass', $data, true);
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
    	
    	public function save_pdf_urgent_mempacas($id) {
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup` WHERE id = '.$id);
    	    $html = $this->load->view('pdf/pdfMempacasUrgent', $data, true);
    	    $pdfFilePath = "Mempacas-Urgent-".time().".pdf";
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
    	}
    	
    	public function save_full_pdf_mempacas() {
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup`');
    	    $html = $this->load->view('pdf/pdfMempacas', $data, true);
    	    $pdfFilePath = "Mempacas-Group-".time().".pdf";
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
    	    echo '<script type="Text/javascript">';
    	    echo "window.location.href=".site_url('home/view_mempacas_group/'.$id);
    	    echo '</script>';
    	}
    	
    	public function save_full_pdf_urgent_mempacas() {
    	    $this->load->library('m_pdf');
    	    $data['mempacasGroup'] = $this->data->myquery('SELECT * FROM `mempacasGroup`');
    	    $html = $this->load->view('pdf/pdfMempacasUrgent', $data, true);
    	    $pdfFilePath = "Mempacas-Urgent-".time().".pdf";
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
    	    echo '<script type="Text/javascript">';
    	    echo "window.location.href=".site_url('home/view_mempacas_group/'.$id);
    	    echo '</script>';
    	}
        
        public function deleteMemberMempacasGroup($table, $id, $groupId, $red) {
            $check = $this->session->userdata('userMember');
            $redirect .= "?received=true";
            $generalId = $check[0]['id'];
            // $members = $this->data->fetch('member', array('id' => $id));
            $this->data->myquery("DELETE FROM `mempacasGroupMember` WHERE memberId = {$id} and groupId = {$groupId} and generalId = {$generalId}");
            if($red == "same"){
                header("Location:".$_SERVER['HTTP_REFERER'].$redirect);
            }else{
                redirect("admin/view/".$red,"refresh");
            }
        }
        
        public function editMempacasComment() {
            $check = $this->session->userdata('userMember');
            if(!empty($check)){
                $data = $this->input->post();
                $finalDate = date('d')."-".$data['genPdf']." ".date('H:i:s');
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
                        'generalId' => $check[0]['id']
                    );
                    $this->data->update(array('id' => $mempacasGroupMemberDetail[0]['id']),'mempacasGroupMember', $mempacasGroupMember);
                    $mempacasGroupMember1 = array(
                        'memberResponse' => $data['memberResponse'],
                        'specialPrayerRequest' => $data['specialPrayerRequest'],
                        'comment' => $data['comment'],
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $check[0]['id']
                    );
                    $this->data->insert('mempacasMemerResponse', $mempacasGroupMember1);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $check[0]['id'],
                        'comment' => $data['comment'],
                        'memberResponse' => $data['memberResponse']
                    );
                    $this->data->insert('generalResponse', $generalResponse);
                    $response = array(
                    'mgmId'             =>  $data['mempacasId'],
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
                        'generalId' => $check[0]['id']
                    );
                    // $this->data->insert('mempacasGroupMember', $mempacasGroupMember);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $check[0]['id'],
                        'comment' => $data['comment'],
                        'memberResponse' => $data['memberResponse']
                    );
                    $this->data->insert('generalResponse', $generalResponse);
                    $response = array(
                    'mgmId'             =>  $data['mempacasId'],
                    'memberResponse'    =>  $data['memberResponse'],
                    'specialPrayerRequest'  =>  $data['specialPrayerRequest'],
                    'seniorPastorToFollowUp'    =>  $senior,
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
                $this->data->update(array('id' => $data['mempacasId']), 'mempacasGroupMember', array('memberResponse' =>  $data['memberResponse'], 'specialPrayerRequest' => $data['specialPrayerRequest'],'comment' => $data['comment']));
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            }else{
                
            }
            
        }
    
    public function insertContactMembers()
        {
            $data = $this->input->post();
            $check = $this->session->userdata('userMember');
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
                        'generalId' => $check[0]['id']
                    );
                    $this->data->insert('mempacasGroupMember', $mempacasGroupMember);
                    $mempacasGroupMember1 = array(
                        'memberResponse' => $data['memberResponse'],
                        'specialPrayerRequest' => $data['specialPrayerRequest'],
                        'comment' => $data['comment'],
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $check[0]['id']
                    );
                    $this->data->insert('mempacasMemerResponse', $mempacasGroupMember1);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $check[0]['id'],
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
                        'generalId' => $check[0]['id']
                    );
                    $this->data->update(array('id' => $mempacasGroupMemberDetail[0]['id']),'mempacasGroupMember', $mempacasGroupMember);
                    $generalResponse = array(
                        'memberId' => $data['memberId'],
                        'groupId' => $data['groupId'],
                        'generalId' => $check[0]['id'],
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
                redirect('home/view_mempacas_group/'.$data['groupId'], "refresh");
            }else{
                redirect('/home');
            }
            
        }
        
    public function reassignGroup() {
            $data = $this->input->post();
            $check = $this->session->userdata('userMember');
            if(!empty($check)) {
                $this->data->update(array('id' => $data['memberId']), 'member', array('mempacasGroup' => $data['mempacasGroup']));
                redirect('home/view_mempacas_group/'.$data['groupId'], "refresh");
            }else{
                redirect('/home');
            }
        } 
        
    public function sendChildRegisterSMS() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data['totalSent'] = $this->data->myquery("SELECT COUNT(`id`) as `qty` FROM `sms`");
            $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
            $cBalance = $data['bucket'][0]['qty'] - 2 * $data['totalSent'][0]['qty'];
            if($cBalance > 0) {
                $data = $this->input->post();
                $to = $data['memberId'];
                if($cBalance >= (2*count($to))) {
                    $i = 1;
                    $a = $this->data->fetch('member', array('id' => $to, 'status' => 'active'));
                    $x1 = array();
                    $x1['msg'] = preg_replace("/[\n\r]/", "", $data['msg']);
                    $smsCount = strlen($x1['msg']);
                    if(round($smsCount / 160) <= 0){ $x['sentSMSCount'] = "1"; }else{ $x['sentSMSCount'] = round($smsCount / 160); }
                    $x1['rec'] = $a[0]['mobileNo'];
                    $x['msg'] = $x1['msg'];
                    $x['to'] = $a[0]['fname']." ".$a[0]['lname'];
                    $x['toId'] = $to;
                    $this->sendSMS('RCCGVHL', $x1['rec'], $x1['msg']);
                    $this->data->insert('sms', $x);
                    $this->session->set_userdata('msg', 'Contact SMS sent.');
                    header("Location:".$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }else{
            redirect('/home');
        }
    }
        
    public function sendMempacasSMS() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data['totalSent'] = $this->data->myquery("SELECT COUNT(`id`) as `qty` FROM `sms`");
            $data['bucket'] = $this->data->myquery("SELECT SUM(`qty`) as `qty` FROM `bucket`");
            $cBalance = $data['bucket'][0]['qty'] - 2 * $data['totalSent'][0]['qty'];
            if($cBalance > 0){
                $data = $this->input->post();
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
                    $this->sendSMS('RCCGVHL', $x1['rec'], $x1['msg']);
                    $this->data->insert("sms",$x);
                    $this->session->set_userdata("msg","Contact SMS sent.");
                    header("Location:".$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }else{
                
            }
        }else{
            redirect('/home');
        }
    }
    
    public function sendChildRegisterEmail() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data = $this->input->post();
            $i = 1;
            $to = $this->data->fetch('member', array('id' => $data['memberId'], 'status' => 'active'));
            $x = array();
            $x['msg'] = $data['msg'];
            $sub = "Membership Management System";
            $x['members'] = $to[0]['id'];
            $x['member'] = $to[0]['fname']." ".$to[0]['lname'];
            $x['sendEmailCount'] = 1;
            $this->data->insert('email', $x);
            $this->session->set_userdata('msg', 'Email Sent Successfully.');
        }else{
            redirect('/home');
        }
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit();
    }
    
    public function sendMempacasEmail() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data = $this->input->post();
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
        }else{
            redirect('/home');
        }
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit();
    }
    
    public function sendRegisterEmail(){
        $users = $this->data->fetch('member');
        $i = 0;
        $socialDetail = $this->data->fetch('details');
        foreach($users as $user){
            if($user['registrationEmail'] != 1){
                $to = $user['email'];
                $msg = file_get_contents(site_url('home/emailPage'));
                $msg = str_replace("{username}", $user['username'], $msg);
                $msg = str_replace("{password}", $user['password'], $msg);
                $msg = str_replace("{name}", ucfirst($user['fname']), $msg);
                $msg = str_replace('{facebook}', $socialDetail[0]['facebook'], $msg);
                $msg = str_replace('{youtube}', $socialDetail[0]['youtube'], $msg);
                $msg = str_replace('{instagram}', $socialDetail[0]['instagram'], $msg);
                $msg = str_replace('{twitter}', $socialDetail[0]['twitter'], $msg);
                $msg = str_replace('{mainSite}', $socialDetail[0]['mainSite'], $msg);
                $sub = "Membership Management System";
                $this->sendMail($msg, $sub, $to);
                
                $this->data->update(array('id' => $user['id']), 'member', array('registrationEmail' => '1'));
                $i++;
            }
        }
        echo 'Hello'.$i;
    }
    
    public function sendPush($message, $userId, $url){
        $message = $message;
        $user_id = $userId;
        $content = array(
            "en" => "$message"
        );

        $fields = array(
            'app_id' => "5bd64a70-48b9-456e-ac3e-aef92697dd7a",
            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
            'contents' => $content,
            'ios_badgeType' => 'Increase',
            'ios_badgeCount' => 1,
            'url'   =>  $url
        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

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
        return $response;
    }
    
    public function save_offer_sent($type, $id){
        $check = $this->session->userdata('userMember');
        $this->load->library('m_pdf');
    	if ($type == "sent") {
            $data['offers'] = $this->data->myquery("SELECT * FROM `offers` WHERE `id` = '{$id}' AND `user_id` = '{$check[0]['id']}' AND `client_id` > 0 order by id desc");
            foreach($data['offers'] as $key=>$val){
                $x = $this->data->fetch('member',array("id"=>$val['client_id'], 'status' => 'active'));
                $data['offers'][$key]['client'] = $x;

                $rating = $this->data->fetch("reviews", array("invoice_id" => $val['id']));
                $data['offers'][$key]['rating'] = $rating;

            }
        } else if ($type == "received") {
            $data['offers'] = $this->data->myquery("SELECT * FROM `offers` WHERE `id` = '{$id}' AND `client_id` = '{$check[0]['id']}' order by id desc");
            foreach($data['offers'] as $key=>$val){
                $x = $this->data->fetch('member',array("id"=>$val['user_id'], 'status' => 'active'));
                $data['offers'][$key]['client'] = $x;
            }
        }
        foreach($data['offers'] as $k=>$v){
                    //$invoiceDetails = $this->data->fetch("offers", array("id" => $v['id']));
            if (!empty($v) && ($v['user_id'] == $check[0]['id'] || $v['client_id'] == $check[0]['id'])) {
                $x = $this->data->fetch("member", array("id" => $v['client_id'], 'status' => 'active'));
                $data['offers'][$k]['client_data'] = $x;
            } else {
                $page_name = "index";
            }
            if ($v['user_id'] != $check[0]['id']) {
                $data['business'] = $this->data->fetch("business", array('user_id' => $v['user_id']));
            }else{
                $data['business'] = $this->data->fetch("business", array('user_id' => $check[0]['id']));
            }
        }
    	$html = $this->load->view('pdf/pdfSend', $data, true);
    	$pdfFilePath = $type." Offer".".pdf";
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
    
    public function save_custom_invoice($id) {
        $check = $this->session->userdata('userMember');
        $this->load->library('m_pdf');
    	$data['offers'] = $this->data->fetch("custom_invoice", array("id" => $id));
        $data['business'] = $this->data->fetch("business", array("user_id" => $check[0]['id']));
    	$html = $this->load->view('pdf/pdfCustomInvoice', $data, true);
    	$pdfFilePath = "Invoice".".pdf";
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
    
    public function save_event_calendar($id) {
        $check = $this->session->userdata('userMember');
        $this->load->library('m_pdf');
        $data['calendar'] = $this->data->fetch('reminders', array('event_id' => $id));
        $data['remDesc'] = $this->data->fetch('reminderDescription', array('eventId' => $id));
        $html = $this->load->view('pdf/pdfEvent', $data, true);
        $pdfFilePath = "Event".".pdf";
        $pdf = $this->m_pdf->load();
        $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        $pdf->AddPage('P',
            '', '', '', '',
            5,
            5,
            5,
            5,
            10,
            10);
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
            exit();
    }
    
    public function __construct(){
        parent::__construct();
        $this->load->library('merchant');
        // $this->load->library('mobileDetect/Mobile_Detect');
        $this->merchant->load('paypal_express');
        $settings = array(
            // 'username' => 'sandbo_1215254764_biz_api1.angelleye.com',
            // 'password' => '1215254774',
            // 'signature' => 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAb6E3l6my.pY9br1z2qxKx96W18v',
            // 'test_mode' => true
            'username' => 'fa_api1.bezaleelsolutions.com',
            'password' => 'RCGDD9VLU5JZYRAC',
            'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AlgQszdFJV-J27Ot6UQ9SGbVjn1I'
        );
        $this->merchant->initialize($settings);
        //echo 1;
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
    }
    
    public function index(){
        $this->view("index");
    }
    
    public function setExpressCheckout(){
        // $this->config->load('paypal');
        $this->load->library('myPayPal');
        // $this->load->library('functions');
        $this->load->helper(
            array('paypal', 'functions')
        );
            if(_GET('paypal')=='checkout'){
    		
    		$products = [];
    		
    		
    		
    		// set an item via POST request
    		
    		$products[0]['ItemName'] = 'Testing';//_POST('itemname'); //Item Name
    		$products[0]['ItemPrice'] = 10;//_POST('itemprice'); //Item Price
    		$products[0]['ItemNumber'] = 'xxx1';//_POST('itemnumber'); //Item Number
    		$products[0]['ItemDesc'] = 'good item';//_POST('itemdesc'); //Item Number
    		$products[0]['ItemQty']	= 1;//_POST('itemQty'); // Item Quantity
    		
    		
    		//-------------------- prepare charges -------------------------
    		
    		$charges = [];
    		
    		//Other important variables like tax, shipping cost
    		$charges['TotalTaxAmount'] = 0;  //Sum of tax for all items in this order. 
    		$charges['HandalingCost'] = 0;  //Handling cost for this order.
    		$charges['InsuranceCost'] = 0;  //shipping insurance cost for this order.
    		$charges['ShippinDiscount'] = 0; //Shipping discount for this order. Specify this as negative number.
    		$charges['ShippinCost'] = 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
    		
    		//------------------SetExpressCheckOut-------------------
    		
    		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
    		$this->mypaypal->SetExpressCheckOut($products, $charges);		
    	}
    	elseif(_GET('token')!=''&&_GET('PayerID')!=''){
    		
    		//------------------DoExpressCheckoutPayment-------------------		
    		
    		//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
    		//we will be using these two variables to execute the "DoExpressCheckoutPayment"
    		//Note: we haven't received any payment yet.
    		
    		$this->mypaypal->DoExpressCheckoutPayment();
    	}
    	else{
    		
    		//order form
    		
    	}
    }
    
    public function edit($id,$table,$page){
            $check = $this->session->userdata('userMember');
            $data['data'] = $dataR;
            $data['userAdmin'] = $check;
            $data['buddyNotif'] = $this->data->fetch('buddies', array('user_id' => $check[0]['id'], 'user_seen' => 0));
            foreach($data['buddyNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['friend_id'], 'status' => 'active'));
                $data['buddyNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['buddyNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            
            $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
            foreach($data['messageNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
                $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $x = array();
            foreach($data['messageNotif'] as $k=>$v){
                $x[$v['from']][] = $v;
                //echo $v['from'];
            }
            $data['messageNotif'] = $x;
            

            //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
            $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
            foreach($data['adminmessageNotif'] as $k=>$v){
                $x = $this->data->fetch("credentials",array("id"=>$v['from']));
                $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            }
            $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ");
            $data['wordCountOnNotif'] = 0;
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            foreach($data['words'] as $k=>$v){
                $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
                $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
                if(!empty($x)){
                    $data['words'][$k]['notifStatus'] = "read";
                }else{
                    $data['wordCountOnNotif'] += 1;
                    $data['words'][$k]['notifStatus'] = "unread";
                }
            }
            $data['reminderLog'] = $this->data->myquery("SELECT * FROM reminders WHERE (FIND_IN_SET(".$check[0]['id'].", user_id) OR user_id = 0) AND adminId = '1' AND reminded = '0' AND date >= '".$today."'");
            // $data['reminderLog'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and reminded = '1' and date >= '".$today."'");
            $data['adminEvent'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and adminId = 1 and isRead = 0");
            $data['calendar'] = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$check[0]['id'].', user_id) ORDER BY `date` DESC');
            $data['data']=$this->data->fetch($table,array('id'=>$id));
            $this->load->view('new/header', $data);
            $this->load->view('new/' . $page, $data);
            $this->load->view('new/footer');
        }
    
    public function editProduct($id){
        $check = $this->session->userdata('userMember');
        $data = $this->input->post();
        if(!empty($check)){
            $x = $this->do_upload($_FILES);
            $data['img'] = $x['upload_data'][0]['file_name'];
            $this->data->update(array('id' => $id), "productservices", array("desc"=>$data['desc'],"img"=>$data['img']));
        }
        redirect("business/".$check[0]['id']);
    }
    
    public function statusMember($id,$status){
            $check = $this->session->userdata('userMember');
            if(!empty($check)){
                $this->data->update(array("id"=>$id),"member",array("status"=>"suspend"));
            }
            redirect("home/logout2");
        }
    
    public function permanentDelete($id){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $this->data->update(array("id" => $id), "member", array("status" => "suspend", "permanentDelete" => "1"));
        }
        redirect("home/logout2");
    }  
    
    public function emailSub(){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data = $this->input->post();
            $this->data->update(array("id" => $data['id']), "member", array("emailSub" => $data['emailSub']));
        }
    }
    
    public function giftAid() {
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data = $this->input->post();
            $this->data->update(array("id" => $data['id']), "member", array("giftAid" => $data['giftAid']));
        }
    }
    
    public function deleteEvent($title){
        $reminder = $this->data->delete(array('event_id' => $title), 'reminders');
        $this->index();
    }
    
    public function calendar(){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data['userAdmin'] = $check;
            $data['buddyNotif'] = $this->data->fetch('buddies', array('user_id' => $check[0]['id'], 'user_seen' => 0));
            foreach($data['buddyNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['friend_id'], 'status' => 'active'));
                $data['buddyNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['buddyNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            
            $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
            foreach($data['messageNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
                $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $x = array();
            foreach($data['messageNotif'] as $k=>$v){
                $x[$v['from']][] = $v;
                //echo $v['from'];
            }
            $data['messageNotif'] = $x;
            

            //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
            $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
            foreach($data['adminmessageNotif'] as $k=>$v){
                $x = $this->data->fetch("credentials",array("id"=>$v['from']));
                $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            }
            $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ");
            $data['wordCountOnNotif'] = 0;
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            foreach($data['words'] as $k=>$v){
                $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
                $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
                if(!empty($x)){
                    $data['words'][$k]['notifStatus'] = "read";
                }else{
                    $data['wordCountOnNotif'] += 1;
                    $data['words'][$k]['notifStatus'] = "unread";
                }
            }
            $data['reminderLog'] = $this->data->myquery("SELECT * FROM reminders WHERE (FIND_IN_SET(".$check[0]['id'].", user_id) OR user_id = 0) AND adminId = '1' AND reminded = '0' AND date >= '".$today."'");
            // $data['reminderLog'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and reminded = '1' and date >= '".$today."'");
            $data['adminEvent'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and adminId = 1 and isRead = 0");
            $data['calendar'] = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$check[0]['id'].', user_id) ORDER BY `date` DESC');
            $this->load->view('new/header', $data);
            $this->load->view('new/manage_calendar', $data);
            $this->load->view('new/footer');
        }else{
            $this->login();
        }
    }
    
    public function view($page_name, $dataR = null){
        $check = $this->session->userdata("userMember");
        if (!empty($check)) {
            $data = array();
            $data['data'] = $dataR;
            $data['userAdmin'] = $check;
            if(isset($_GET['action']) AND $_GET['action'] == 'age'){
                $data['birthnotifdesktop'] = $this->data->fetch("birthnotifdesktop", array("user_id" => $check[0]['id'],'year'=>date('Y')));
                if(empty($data['birthnotifdesktop'])){
                    $this->data->insert("birthnotifdesktop", array("user_id" => $check[0]['id'],'year'=>date('Y')));
                }
            }
            $data['birthnotifdesktop'] = $this->data->fetch("birthnotifdesktop", array("user_id" => $check[0]['id'],'year'=>date('Y')));
            $x = $this->data->fetch("children",array('parent_id'=>$check[0]['id'],"relation"=>"child"));
            $data['userAdmin'][0]['child1'] = $x;
            $x = $this->data->fetch("children",array('parent_id'=>$check[0]['id'],"relation"=>"grand"));
            $data['userAdmin'][0]['grandChild1'] = $x;


            $data['msg'] = $this->session->userdata('msg');
            $this->session->unset_userdata('msg');
            $data['friends'] = array();
            $id = '"';
            $id .= $check[0]['id'];
            $id .= '"';
            $data['businessGroup'] = $this->data->myquery("SELECT * FROM `businessgroup` WHERE `status`='verified' ORDER BY `name`");
            $data['chrchgrps'] = $this->data->myquery("SELECT * FROM `churchgroup` WHERE `status`='verified' ORDER BY `name`");
            //$data['chrchgrps'] = $this->data->fetch("churchgroup");

            $data['sentOffers'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `offers` WHERE `user_id`='{$check[0]['id']}' AND `client_id` > 0");
            $data['receivedOffers'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `offers` WHERE `client_id`='{$check[0]['id']}' ");
            $data['acceptedOffers'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `offers` WHERE `client_id`='{$check[0]['id']}' AND `status`='accepted'");
            $data['sentOffers'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `offers` WHERE `user_id`='{$check[0]['id']}' AND `status`='accepted'");
            $data['sentActionOffers'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `offers` WHERE `user_id`='{$check[0]['id']}' AND `status`='not accepted'");
            $data['unacceptedOffers'] = $this->data->myquery("SELECT COUNT(`id`) as `total` FROM `offers` WHERE `client_id`='{$check[0]['id']}' AND `status`='not accepted'");
            $data['revenue'] = $this->data->myquery("SELECT * FROM `offers` WHERE `client_id`='{$check[0]['id']}' AND `status`='accepted'");
            $data['sentRevenue'] = $this->data->myquery("SELECT * FROM `offers` WHERE `user_id`='{$check[0]['id']}' AND `status`='accepted'");
            $data['upcomingrevenue'] = $this->data->myquery("SELECT * FROM `offers` WHERE `client_id`='{$check[0]['id']}' AND `status`='not accepted'");
            $data['sentUpcomingrevenue'] = $this->data->myquery("SELECT * FROM `offers` WHERE `user_id`='{$check[0]['id']}' AND `status`='not accepted'");
            $data['totalRevenue'] = $this->data->myquery("SELECT * FROM `offers` WHERE `client_id`='{$check[0]['id']}' AND `status` = 'accepted'");
            $data['sentTotalRevenue'] = $this->data->myquery("SELECT * FROM `offers` WHERE `user_id`='{$check[0]['id']}' AND `status` = 'accepted'");
            $data['sumRevenue'] = $this->data->myquery("SELECT sum('amount') FROM `offers` WHERE `client_id` = '{$check[0]['id']}' AND `status` = 'accepted'");
            $data['sumTotal'] = $this->data->myquery("SELECT sum('amount') FROM `offers` WHERE `client_id` = '{$check[0]['id']}'");
            $friends = $this->data->fetch("buddies", array("user_id" => $check[0]['id']));
            foreach ($friends as $k => $val) {
                $x = $this->data->fetch("member", array("id" => $val['friend_id'], 'status' => 'active'));
                if (!empty($x)) {
                    $data['friends'][$k] = $x[0];
                    $a = $this->data->fetch("businessgroup",array("id"=>$x[0]['businessGroup']));
                    $data['friends'][$k]['bgrop'] = (!empty($a)) ? $a[0]['name'] : "";
                    $a = $this->data->fetch("churchgroup",array("id"=>$x[0]['churchGroup']));
                    $data['friends'][$k]['cgrop'] = (!empty($a)) ? $a[0]['name'] : "";
                }

            }
            ////////////////////////////////////////////////////////////////////
            $data['myBooks'] = $this->data->fetch("mybooks",array('userId'=>$check[0]['id']));
            foreach($data['myBooks'] as $k=>$v){
                $x = $this->data->fetch("books",array('id'=>$v['book_id']));
                if(!empty($x)){
                    $data['myBooks'][$k]['title'] = $x[0]['title'];
                    $data['myBooks'][$k]['desc'] = $x[0]['desc'];
                    $data['myBooks'][$k]['image'] = $x[0]['image'];
                    $data['myBooks'][$k]['file'] = $x[0]['file'];
                }
            }
            $data['books'] = $this->data->fetch("books");
            $data['remindersNotif'] = $this->data->fetch("reminders",array('user_id'=>$check[0]['id'],'date'=>date("Y-m-d")));

            $data['membGroup'] = $this->data->fetch("membgroup",array('user_id'=>$check[0]['id']));
            $a = array();
            foreach($data['membGroup'] as $k=>$v){
                $a[] = $v['g_id'];
                $x = $this->data->fetch('churchgroup',array("id"=>$v['g_id']));
                $data['membGroup'][$k]['groupname']= (!empty($x)) ? $x[0]['name'] : "" ;
            }
            $data['membGroup1'] = $a;
            //var_dump($data['membGroup1']);die;
            $data['buddyNotif'] = $this->data->fetch('buddies', array('user_id' => $check[0]['id'], 'user_seen' => 0));
            foreach($data['buddyNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['friend_id'], 'status' => 'active'));
                $data['buddyNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['buddyNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $data['offersNotif'] = $this->data->fetch('offers', array('client_id' => $check[0]['id'], 'status' => 'not accepted'));
            $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
            foreach($data['messageNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
                $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $x = array();
            foreach($data['messageNotif'] as $k=>$v){
                $x[$v['from']][] = $v;
                //echo $v['from'];
            }
            $data['messageNotif'] = $x;


            //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
            $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
            foreach($data['adminmessageNotif'] as $k=>$v){
                $x = $this->data->fetch("credentials",array("id"=>$v['from']));
                $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            }
            ////////////////////////////////////////////////////////////////////
            $data['live'] = $this->data->myquery("SELECT * FROM `live` ORDER BY dateOfEvent DESC");;
            foreach($data['live'] as $k=>$v){
                $checkDate = strtotime($v['schedule']);
                $currentDate = strtotime(date('Y-m-d H:i:s'));
                if($checkDate <= $currentDate){
                    $this->data->update(array('id'=>$v['id']),"live",array('status'=>'off'));
                }
            }
            $data['live'] = $this->data->myquery("SELECT * FROM `live` ORDER BY dateOfEvent DESC");
            $data['audioNote'] = $this->data->myquery("SELECT * FROM `audioNote` ORDER BY dateOfEvent DESC");

            $data['members'] = $this->data->fetch("member", array('status' => 'active'));
            foreach($data['members'] as $k=>$v){
                $x = $this->data->fetch("businessgroup",array("id"=>$v['businessGroup']));
                $data['members'][$k]['bgrop'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
                $x = $this->data->fetch("churchgroup",array("id"=>$v['churchGroup']));
                $data['members'][$k]['cgrop'] = (!empty($x)) ? $x[0]['name'] : "";

            }
            $data['bulletin'] = $this->data->fetch("bulletin");
            foreach($data['bulletin'] as $k=>$v){
                $id = (isset($data['bulletin'][($k+1)])) ? $data['bulletin'][($k+1)]['id'] : 0;
                $x = $this->data->fetch('bulletin',array('id'=>$id));
                $data['bulletin'][$k]['next'] = (!empty($x)) ? $x[0]['id'] : 0;

                $id = (isset($data['bulletin'][($k-1)])) ? $data['bulletin'][($k-1)]['id'] : 0;
                $x = $this->data->fetch('bulletin',array('id'=>($id)));
                $data['bulletin'][$k]['prev'] = (!empty($x)) ? $x[0]['id'] : 0;
            }
            //var_dump($data['bulletin']);die;
            $data['advert'] = $this->data->fetch("advert", array('user_id' => $check[0]['id']));
            $data['business'] = $this->data->fetch("business", array('user_id' => $check[0]['id']));
            $data['donations'] = $this->data->fetch("donations", array('user_id' => $check[0]['id']));
            if (empty($data['business'])) {
                $this->data->insert("business", array('user_id' => $check[0]['id']));
                $data['business'] = $this->data->fetch("business", array('user_id' => $check[0]['id']));
            }
            $data['male'] = $this->data->myquery("SELECT count(`id`) as male FROM `member` WHERE `gander` = 'male' and `status` = 'active';");
            $data['female'] = $this->data->myquery("SELECT count(`id`) as female FROM `member` WHERE `gander` = 'female' and `status` = 'active';");
            if ($page_name == "members" && isset($_GET['type']) && !empty($_GET['type'])) {
                if ($_GET['type'] == 'church') {
                    $data['results'] = $this->data->fetch("member", array("churchGroup" => $check[0]['churchGroup'], 'status' => 'active'));
                    $data['type'] = "Church Group";
                    $data['list'] = $this->data->fetch("churchgroup");
                } else if ($_GET['type'] == 'business') {
                    if (isset($_GET['q']) && !empty($_GET['q'])) {
                        $data['results'] = $this->data->fetch("member", array("businessGroup" => $_GET['q'], 'status' => 'active'));
                    }
                    $data['type'] = "Business Group";
                    $data['list'] = $this->data->fetch("businessgroup");

                } elseif ($_GET['type'] == 'name') {
                    if (isset($_GET['q']) && !empty($_GET['q'])) {
                        $data['results'] = $this->data->myquery("SELECT * FROM `member` WHERE CONCAT(`fname`,' ',`lname`) LIKE '%{$_GET['q']}%' OR `email` = '{$_GET['q']}' and `status` = 'active'");
                    }
                    $data['type'] = "name";
                } else {
                    redirect("home/", "refresh");
                }
            }
            if (($page_name == "manage_offers" || $page_name == "receipt") && isset($_GET['type']) && ($_GET['type'] == 'received' || $_GET['type'] == 'sent')) {
                if ($_GET['type'] == "sent") {
                    $data['offers'] = $this->data->myquery("SELECT * FROM `offers` WHERE `user_id` = '{$check[0]['id']}' AND `client_id` > 0 order by id desc");
                    foreach($data['offers'] as $key=>$val){
                        $x = $this->data->fetch('member',array("id"=>$val['client_id'], 'status' => 'active'));
                        $data['offers'][$key]['client'] = $x;

                        $rating = $this->data->fetch("reviews", array("invoice_id" => $val['id']));
                        $data['offers'][$key]['rating'] = $rating;

                    }
                } else if ($_GET['type'] == "received") {
                    $data['offers'] = $this->data->myquery("SELECT * FROM `offers` WHERE `client_id` = '{$check[0]['id']}' order by id desc");
                    foreach($data['offers'] as $key=>$val){
                        $x = $this->data->fetch('member',array("id"=>$val['user_id'], 'status' => 'active'));
                        $data['offers'][$key]['client'] = $x;
                    }
                }
                foreach($data['offers'] as $k=>$v){
                    //$invoiceDetails = $this->data->fetch("offers", array("id" => $v['id']));
                    if (!empty($v) && ($v['user_id'] == $check[0]['id'] || $v['client_id'] == $check[0]['id'])) {
                        $x = $this->data->fetch("member", array("id" => $v['client_id'], 'status' => 'active'));
                        $data['offers'][$k]['client_data'] = $x;
                    } else {
                        $page_name = "index";
                    }
                    if ($v['user_id'] != $check[0]['id']) {
                        $data['business'] = $this->data->fetch("business", array('user_id' => $v['user_id']));
                    }
                }
                //echo json_encode($data['offers']);die;

            }
            if ($page_name == "view_invoices") {
                $data['offers'] = $this->data->myquery("SELECT * FROM `custom_invoice` WHERE `user_id` = {$check[0]['id']} ORDER BY date DESC");
                // $data['offers'] = $this->data->fetch("custom_invoice", array("user_id" => $check[0]['id']));
                $data['business'] = $this->data->fetch("business", array("user_id" => $check[0]['id']));

            }
            
            if($page_name == 'viewRegisterClass') {
                $id = $dataR;
                if(!empty($id)) {
                    $data['registeredClass'] = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE id = {$id} AND FIND_IN_SET (".$check[0]['id'].", teacherId)");
                    $x = $this->data->myquery("select * from `attendanceClass` where `id` = (select min(`id`) from `attendanceClass` where id > {$id} AND FIND_IN_SET (".$check[0]['id'].",teacherId))");
                    $p = $this->data->myquery("select * from `attendanceClass` where `id` = (select max(`id`) from `attendanceClass` where id < {$id} AND FIND_IN_SET (".$check[0]['id'].",teacherId))");
                    if(empty($data['registeredClass'])){
                        $page_name = "index";
                    }else{
                        $data['registeredClass'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['registeredClass'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                            //var_dump($data['bulletin']);die;
                    }
                }else{
                    $page_name = "index";
                }
            }
            
            if($page_name == 'markAttendance') {
                $id = $dataR;
                if(!empty($id)) {
                    $data['registeredClass'] = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE id = {$id} AND FIND_IN_SET (".$check[0]['id'].", teacherId)");
                    $x = $this->data->myquery("select * from `attendanceClass` where `id` = (select min(`id`) from `attendanceClass` where id > {$id} AND FIND_IN_SET (".$check[0]['id'].",teacherId))");
                    $p = $this->data->myquery("select * from `attendanceClass` where `id` = (select max(`id`) from `attendanceClass` where id < {$id} AND FIND_IN_SET (".$check[0]['id'].",teacherId))");
                    if(empty($data['registeredClass'])){
                        $page_name = "index";
                    }else{
                        $data['registeredClass'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['registeredClass'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                            //var_dump($data['bulletin']);die;
                    }
                    $data['markAttend'] = $this->data->myquery("SELECT * FROM `markAttendance` WHERE `date` LIKE '".date('Y-m%')."'");
                }else{
                    $page_name = "index";
                }
            }
            
            if($page_name == 'reportIncident') {
                $id = $dataR;
                if(!empty($id)) {
                    $data['registeredClass'] = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE id = {$id} AND FIND_IN_SET (".$check[0]['id'].", teacherId)");
                    $x = $this->data->myquery("select * from `attendanceClass` where `id` = (select min(`id`) from `attendanceClass` where id > {$id} AND FIND_IN_SET (".$check[0]['id'].",teacherId))");
                    $p = $this->data->myquery("select * from `attendanceClass` where `id` = (select max(`id`) from `attendanceClass` where id < {$id} AND FIND_IN_SET (".$check[0]['id'].",teacherId))");
                    if(empty($data['registeredClass'])){
                        $page_name = "index";
                    }else{
                        $data['registeredClass'][0]['next'] = (!empty($x)) ? $x[0]['id'] : 0;
                        $data['registeredClass'][0]['prev'] = (!empty($p)) ? $p[0]['id'] : 0;
                            //var_dump($data['bulletin']);die;
                    }
                }else{
                    $page_name = "index";
                }
            }
            
            if($page_name == 'studentRecord') {
                $id = $dataR;
                if(!empty($id)) {
                    $data['registeredClass'] = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE FIND_IN_SET(".$id.", studentId)");
                    $data['childId'] = $id;
                    if(empty($data['registeredClass'])){
                        $page_name = "index";
                    }
                }else{
                    $page_name = 'index';
                }
            }
            
            if($page_name == 'addChild') {
                $id = $dataR;
                $data['teacherClass'] = $this->data->myquery("SELECT * FROM `attendanceClass` WHERE FIND_IN_SET(".$check[0]['id'].", teacherId)");
                $data['childrens'] = $this->data->myquery("SELECT * FROM `children` WHERE NULLIF(fname, '') IS NOT NULL AND NULLIF(lname, '') IS NOT NULL AND classId IS NULL AND isAlotted = 0");
            }
            
            if($page_name == "edit_advert"){
                $data['data'] = $dataR;
            }
            if ($page_name == "word_detailed" AND isset($_GET['id']) AND !empty($_GET['id'])) {
                $id = $_GET['id'];
                $data['wordsdetails'] = $this->data->fetch("words", array('id' => $id));
                $updNotif = $this->data->fetch('notifs',array("user_id"=>$check[0]['id'],"post_id"=>$id,"post_type"=>"word"));
                if(empty($updNotif)){
                    $this->data->insert('notifs',array("user_id"=>$check[0]['id'],"post_id"=>$id,"post_type"=>"word"));
                }
                if (empty($data['wordsdetails'])) {
                    redirect('home/', "refresh");
                }
            }
            if ($page_name == "view_reminder" && isset($_GET['date']) && !empty($_GET['date'])) {
                $date = date("Y-m-d", strtotime($_GET['date']));
                $data['reminder'] = $this->data->fetch("reminders", array("date" => $date, "user_id" => $check[0]['id']));
            }
            $id = $this->uri->segment(4);
            if ($page_name == "view_invoice" && !empty($id)) {
                $data['invoiceDetails'] = $this->data->fetch("offers", array("id" => $id));
                if (!empty($data['invoiceDetails']) && ($data['invoiceDetails'][0]['user_id'] == $check[0]['id'] || $data['invoiceDetails'][0]['client_id'] == $check[0]['id'])) {
                    $x = $this->data->fetch("member", array("id" => $data['invoiceDetails'][0]['client_id'], 'status' => 'active'));
                    $data['invoiceDetails'][0]['client_data'] = $x;
                } else {
                    $page_name = "index";
                }
                if ($data['invoiceDetails'][0]['user_id'] != $check[0]['id']) {
                    $data['business'] = $this->data->fetch("business", array('user_id' => $data['invoiceDetails'][0]['user_id']));
                }
            }
            if ($page_name == "progress" && !empty($id)) {
                $data['invoice'] = $this->data->fetch("offers", array("id" => $id));
                $data['progress'] = $this->data->fetch("deliveries", array("invoice_id" => $id));
            }
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
                }else{
                    $page_name = "index";
                }
            }
            if($page_name == "keepersNetwork"){
                $data['keepersNetwork'] = $this->data->fetch('keepersNetwork', array('senderId' => "user#".$check[0]['id']));
                
            }
            if($page_name == 'bulletin' AND isset($_GET['to']) AND !empty($_GET['to']) AND isset($_GET['from']) AND !empty($_GET['from'])){
                $data['bulletin'] = $this->data->myquery("SELECT * FROM `bulletin` WHERE `date`");
                $to = date("Y-m-d i:i:s",strtotime($_GET['to']));
                $from = date("Y-m-d i:i:s",strtotime($_GET['from']));
                //echo "SELECT * FROM `bulletin` WHERE (`date` BETWEEN '{$from}' AND '{$to}')";die;
                $data['bulletin'] = $this->data->myquery("SELECT * FROM `bulletin` WHERE (`date` BETWEEN '{$from}' AND '{$to}')");
            }
            $data['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$check[0]['id']}'");
            $data['rating'] = $this->data->fetch("reviews", array("client_id" => $check[0]['id']));
            if (!empty($data['rating'])) {
                foreach ($data['rating'] as $k => $v) {
                    $x = $this->data->fetch("member", array("id" => $v['user_id'], 'status' => 'active'));
                    $data['rating'][$k]['member'] = $x;
                }
            }
            $data['page_req'] = $this->data->fetch("page_req", array("user_id" => $check[0]['id']));
            $data['testimonies'] = $this->data->fetch("testimonies");
            $data['notifstest'] = $this->data->fetch("notifs",array("user_id"=>$check[0]['id'],"post_type"=>"testimonies"));

            foreach($data['testimonies'] as $k=>$v){
                $x = $this->data->fetch('member',array('id'=>$v['user_id'], 'status' => 'active'));
                if($v['anon'] == 'true'){
                    $data['testimonies'][$k]['name'] = "Anonymous";
                }else{
                    if(empty($x)){
                        $data['testimonies'][$k]['name'] = "Undefined";
                    }else{
                        $data['testimonies'][$k]['name'] = $x[0]['fname']." ".$x[0]['lname'];
                    }
                }

                $x = $this->data->fetch("notifs",array("user_id"=>$check[0]['id'],"post_type"=>"testimonies","post_id"=>$v['id']));
//                if(!empty($x)){
                    $data['testimonies'][$k]['status'] = (empty($x)) ? "read" : "unread";
//                }
            }
            //var_dump($data['testimonies']);die;
            //$data['testimonies'] = $this->data->fetch("testimonies", array("user_id" => $check[0]['id']));
            $data['p_request'] = $this->data->fetch("p_request", array("user_id" => $check[0]['id']));
            foreach($data['p_request'] as $k=>$v){
                $x = $this->data->fetch("notifs",array("user_id"=>$check[0]['id'],"post_type"=>"p_request","post_id"=>$v['id']));
                $data['p_request'][$k]['statusss'] = (empty($x)) ? "read" : "unread";
            }
            $x = $this->data->fetch('churchgroup',array('id'=>$data['userAdmin'][0]['churchGroup']));
            $data['userAdmin'][0]['groupName'] = (!empty($x)) ? $x[0]['name'] : "Undefined";


            // $data['reminders'] = $this->data->fetch("reminders",array("user_id" => $check[0]['id']));
            $data['reminders'] = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$check[0]['id'].', user_id) OR user_id = 0');
            foreach($data['reminders'] as $k=>$v){
                $data['reminders'][$k]['id']   = $data['reminders'][$k]['id'];unset($data['reminders'][$k]['id']);
                $data['reminders'][$k]['title'] = $data['reminders'][$k]['desc'];unset($data['reminders'][$k]['desc']);
                $data['reminders'][$k]['timeStart'] = $data['reminders'][$k]['start'];unset($data['reminders'][$k]['start']);
                $data['reminders'][$k]['timeEnd'] = $data['reminders'][$k]['end'];unset($data['reminders'][$k]['end']);
            }
            $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ORDER BY date_preached DESC");
            $data['wordCountOnNotif'] = 0;
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            $data['reminderLog'] = $this->data->myquery("SELECT * FROM reminders WHERE (FIND_IN_SET(".$check[0]['id'].", user_id) OR user_id = 0) AND adminId = '1' AND reminded = '0' AND date >= '".$today."'");
            $data['offersNotif'] = $this->data->fetch('offers', array('client_id' => $check[0]['id'], 'status' => 'not accepted'));
            $data['adminEvent'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and adminId = 1 and isRead = 0");
            // echo $this->db->last_query();
            foreach($data['words'] as $k=>$v){
                $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
                $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
                if(!empty($x)){
                    $data['words'][$k]['notifStatus'] = "read";
                }else{
                    $data['wordCountOnNotif'] += 1;
                    $data['words'][$k]['notifStatus'] = "unread";
                }
            }


            $friends = $this->data->fetch("buddies", array("user_id" => $check[0]['id']));
            $data['friends'] = array();
            foreach ($friends as $k => $val) {
                $users = $this->data->fetch("member", array("id" => $val['friend_id'], 'status' => 'active'));
                $data['friends'][] = $users[0]['id']; //$val['friend_id'];
            }
            
            $data['friends1'] = array();
            foreach ($friends as $k => $val) {
                $users = $this->data->fetch("member", array("id" => $val['friend_id'], 'status' => 'active'));
                $data['friends1'][] = $users; //$val['friend_id'];
            }
            
            //print_r(json_encode($data['friends']));die;
            rsort($data['bulletin']);
            //rsort($data['live']);
            // rsort($data['words']);
            $this->load->view('new/header', $data);
            $this->load->view('new/' . $page_name, $data);
            $this->load->view('new/footer');
        } else {
            $this->login();
            //echo $_SERVER['REQUEST_URI'];
            //redirect("home/login");
        }
    }
    
    public function readBuddy($id){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $buddies = $this->data->fetch('buddies', array('id' => $id));
            if($buddies[0]['user_id'] == $check[0]['id']) {
                $this->data->update(array('id' => $id), 'buddies', array('user_seen' => 1));
                redirect('home/view/buddies');
            }
        }else{
            $this->login();
        }
    }
    
    public function bugReport()
    {
        $data = $this->input->post();
        $pageId = $data['pageId'];
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $reason = $data['reason'];
        $bugReport = $this->data->fetch('bugReport', array('pageId' => $pageId, 'email' => $email, 'phoneNo' => $phone));
        if(!count($bugReport)){
            $pageDetails = $this->data->fetch('business', array('id' => $pageId));
            $reportCount = $pageDetails[0]['reportCount'];
            $bugReport = array(
                'pageId' => $pageId,
                'name' => $name,
                'phoneNo' => $phone,
                'email' => $email,
                'reason' => $reason
            );
            $this->data->insert('bugReport', $bugReport);
            if($reportCount < 5){
                $reportCount += 1;
                $this->data->update(array('id'=>$pageId),"business",array('reportCount'=>$reportCount));
            }else{
                $reportCount += 1;
                $this->data->update(array('id'=>$pageId),"business",array('reportCount'=>$reportCount, 'status' => 'suspend'));
            }
            redirect('business/'.$pageDetails[0]['user_id']);
        }else{
            
        }
    }
    
    public function business($id){
        $check = $this->session->userdata('userMember');
        $data['userAdmin'] = $check;
        if (!empty($id)) {
            $data['business'] = $business = $this->data->fetch("business", array('user_id' => $id));
        }
        $page_name = $this->uri->segment(3);
        $themeId = $business[0]['selectedTheme'];
        if(empty($page_name) OR $page_name == "index"){
            $page_name = "business_page";
        }
        if($page_name == "images"){
            $page_name = "business_image";
        }
        if($page_name == "contactUs"){
            $page_name = "business_contact";
        }
        if($page_name == "edit"){
            $page_name = "business_page_edit";
        }

        $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ORDER BY date_preached DESC");
        $data['wordCountOnNotif'] = 0;
        foreach($data['words'] as $k=>$v){
            $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
            $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
            if(!empty($x)){
                $data['words'][$k]['notifStatus'] = "read";
            }else{
                $data['wordCountOnNotif'] += 1;
                $data['words'][$k]['notifStatus'] = "unread";
            }
        }
        $data['remindersNotif'] = $this->data->fetch("reminders",array('user_id'=>$check[0]['id'],'date'=>date("Y-m-d")));
        //var_dump($data['remindersNotif']);die;
        $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
        foreach($data['messageNotif'] as $k=>$v){
            $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
            $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
            $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
        }
        $x = array();
        foreach($data['messageNotif'] as $k=>$v){
            $x[$v['from']][] = $v;
            //echo $v['from'];
        }
        $data['messageNotif'] = $x;

        //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
        $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
        foreach($data['adminmessageNotif'] as $k=>$v){
            $x = $this->data->fetch("credentials",array("id"=>$v['from']));
            $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
        }
        $data['page_req'] = $this->data->fetch("page_req", array("user_id" => $id));
        $data['products'] = $this->data->fetch("productservices", array("parent_id" => $id));
        if($check[0]['id'] == $id){
            $this->load->view('new/header', $data);
            $this->load->view('new/'.$page_name);
            $this->load->view('new/footer');
        }else{
            $this->load->view('new/themes/'.$themeId.'/index', $data);
        }
    }
    
    public function member($id = null){
        if ($id != null) {
            $check = $this->session->userdata('userMember');
            $data = array();
            $friends = $this->data->fetch("buddies", array("user_id" => $check[0]['id']));
            $data['friends'] = array();
            foreach ($friends as $k => $val) {
                $data['friends'][] = $val['friend_id'];
            }
            $data['advert'] = $this->data->fetch("advert", array('user_id' => $check[0]['id']));
            $data['live'] = $this->data->myquery("SELECT * FROM `live` ORDER BY dateOfEvent DESC");
            foreach($data['live'] as $k=>$v){
                if(time() >= strtotime("+".$v['expiry']." hours",strtotime($v['date']))){
                    $this->data->update(array('id'=>$v['id']),"live",array('status'=>'off'));
                }
            }

            $data['words'] = $this->data->myquery("SELECT * FROM `words` WHERE `members` LIKE '%{$id}%' OR `members`='' ");
            $data['wordCountOnNotif'] = 0;
            foreach($data['words'] as $k=>$v){
                $x = $this->data->fetch('notifs',array('user_id'=>$check[0]['id'],"post_type"=>"word","post_id"=>$v['id']));
                $data['words'][$k]['notifStatus'] = (!empty($x)) ? "read" : "unread";
                if(!empty($x)){
                    $data['words'][$k]['notifStatus'] = "read";
                }else{
                    $data['wordCountOnNotif'] += 1;
                    $data['words'][$k]['notifStatus'] = "unread";
                }
            }
            $data['live'] = $this->data->myquery("SELECT * FROM `live` ORDER BY dateOfEvent DESC");
            $data['userAdmin'] = (!empty($check)) ? $check : array();
            $data['members'] = $this->data->fetch("member", array('id' => $id, 'status' => 'active'));
            $x = $this->data->fetch('businessgroup',array('id'=>$data['members'][0]['businessGroup']));
            $data['members'][0]['career'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            $x = $this->data->fetch("children",array('parent_id'=>$check[0]['id'],"relation"=>"child"));
            $data['members'][0]['child'] = $x;
            $x = $this->data->fetch("children",array('parent_id'=>$check[0]['id'],"relation"=>"grand"));
                $data['members'][0]['grandChild'] = $x;


            $data['ratingAvg'] = $this->data->myquery("SELECT ROUND(AVG(rating)) as rating FROM `reviews` WHERE `client_id` = '{$id}'");
            $data['rating'] = $this->data->fetch("reviews", array("client_id" => $id));
            if (!empty($data['rating'])) {
                foreach ($data['rating'] as $k => $v) {
                    $x = $this->data->fetch("member", array("id" => $v['user_id'], 'status' => 'active'));
                    $data['rating'][$k]['member'] = $x;
                }
            }
            $data['remindersNotif'] = $this->data->fetch("reminders",array('user_id'=>$check[0]['id'],'date'=>date("Y-m-d")));
            $data['offersNotif'] = $this->data->fetch('offers', array('client_id' => $check[0]['id'], 'status' => 'not accepted'));
            $data['buddyNotif'] = $this->data->fetch('buddies', array('user_id' => $check[0]['id'], 'user_seen' => 0));
            foreach($data['buddyNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['friend_id'], 'status' => 'active'));
                $data['buddyNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['buddyNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $data['messageNotif'] = $this->data->fetch("message",array("to"=>$check[0]['id'],"notification"=>"unread"));
            foreach($data['messageNotif'] as $k=>$v){
                $x = $this->data->fetch("member",array("id"=>$v['from'], 'status' => 'active'));
                $data['messageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined";
                $data['messageNotif'][$k]['pic'] = (!empty($x)) ? $x[0]['image'] : "male.jpg";
            }
            $x = array();
            foreach($data['messageNotif'] as $k=>$v){
                $x[$v['from']][] = $v;
                //echo $v['from'];
            }
            $data['messageNotif'] = $x;

            //$data['adminmessageNotif'] = $this->data->fetch("a_m_chat",array("to"=>$check[0]['id'],"notification"=>"unread"));
            $data['adminmessageNotif'] = $this->data->myquery("SELECT DISTINCT(`from`) FROM `a_m_chat` WHERE `to` = '{$check[0]['id']}' AND `notification` = 'unread'");
            foreach($data['adminmessageNotif'] as $k=>$v){
                $x = $this->data->fetch("credentials",array("id"=>$v['from']));
                $data['adminmessageNotif'][$k]['member'] = (!empty($x)) ? $x[0]['name'] : "Undefined";
            }
            $data['reminderLog'] = $this->data->myquery("SELECT * FROM reminders WHERE (FIND_IN_SET(".$check[0]['id'].", user_id) OR user_id = 0) AND adminId = '1' AND reminded = '0' AND date >= '".$today."'");
            // $data['reminderLog'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and reminded = '1' and date >= '".$today."' and start >= '".$currentTime."'");
            $data['adminEvent'] = $this->data->myquery("SELECT * FROM `reminders` WHERE user_id = '".$check[0]['id']."' and adminId = 1 and isRead = 0");
            //var_dump($data['members']);die;
            $this->load->view('new/header', $data);
            $this->load->view('new/search_member_profile');
//            $this->load->view('new/profile_new');
            $this->load->view('new/footer');
        } else {
            redirect('home/', 'refresh');
        }
    }
    
    public function viewCalendar($id){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data['userAdmin'] = (!empty($check)) ? $check : array();
            $data['calendar'] = $this->data->fetch('reminders', array('event_id' => $id));
            $data['remDesc'] = $this->data->fetch('reminderDescription', array('eventId' => $id));
            $this->load->view('new/header', $data);
            $this->load->view('new/viewCalendar');
            $this->load->view('new/footer');
        }else{
            $this->login();
        }
    }
    
    public function editbusiness(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            //var_dump($data);die;
            if (isset($_FILES['logo']) && !empty($_FILES['logo']) && !empty($_FILES['logo']['name'])) {
                $x = $this->do_upload($_FILES);
                if (isset($x['upload_data'])) {
                    $data['logo'] = $x['upload_data'][0]['file_name'];
                }
            }
            if (isset($_FILES['banner']) && !empty($_FILES['banner']) && !empty($_FILES['banner']['name'])) {
                $x = $this->do_upload($_FILES);
                if (isset($x['upload_data'])) {
                    $data['banner'] = $x['upload_data'][0]['file_name'];
                }
            }
            $this->data->update(array("user_id" => $check[0]['id']), "business", $data);
            redirect("home/view/business_page", "refresh");
        } else {
            $this->login();
        }
    }
    
    public function updateReminder(){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $user_id = $check[0]['id'];
            $maxIdReminder = $this->data->myquery("SELECT max(event_id) as maxId FROM `reminders` WHERE `user_id`='$user_id'");
            $id = $maxIdReminder[0]['maxId'];
            $data = $this->input->post();
            unset($data['event_id']);
            $this->data->update(array("event_id" => $id), "reminders", $data);
        }
    }
    
    public function editCalEvent($id){
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data['userAdmin'] = $check;
            $data['calendar'] = $this->data->fetch('reminders', array('event_id' => $id));
            $data['remDesc'] = $this->data->fetch('reminderDescription', array('eventId' => $id));
            $this->load->view('new/header', $data);
            $this->load->view('new/editCalendar');
            $this->load->view('new/footer');
        }else{
            $this->login();
        }
    }
    
    public function editCalendar($id){
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $data['userAdmin'] = $check;
            $data = $this->input->post();
            if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                $x = $this->do_upload($_FILES);
                if(isset($x['upload_data'])){
                    $data1['image'] = $x['upload_data'][0]['file_name'];
                }
            }else{
                $data1['image'] = '';
            }
            $result = array(
                'date' => $data['date'],
                'endDate' => $data['endDate'],
                'desc' => $data['desc'],
                'eventDesc' => $data['eventDesc'],
                'link' => $data['link'],
                'image' => $data1['image']
            );
            $this->data->update(array("event_id" => $id), "reminders", $result);
            
            $this->session->set_userdata("msg", "Event Updated Successfully.");
            redirect("home/editCalEvent/{$id}", "refresh");
        }
    }
    
    public function editProfile(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $username = lcfirst($data['fname'])."".lcfirst($data['lname']);
            $data['username'] = str_replace(' ', '', $username);
            //var_dump($data);die;
            if(isset($data['child'])){
                $this->data->delete(array('parent_id'=>$check[0]['id'],"relation"=>"child"),"children");
                foreach($data['child'] as $child){
                    $child['relation'] = "child";
                    $child['parent_id'] = $check[0]['id'];
                    $this->data->insert("children",$child);
                }
            }
            if($data['businessGroup'] != 0){
                $data['businessGroup'] = $data['businessGroup'];
                unset($data['oGroup']);
            }else{
                $newGroupName = $data['oGroup'];
                $this->data->insert('businessgroup', array('name' => $newGroupName));
                $data['businessGroup'] = $this->db->insert_id();
                unset($data['oGroup']);
            }
            if(isset($data['grandChild'])){
                $this->data->delete(array('parent_id'=>$check[0]['id'],"relation"=>"grand"),"children");
                foreach($data['grandChild'] as $child){
                    $child['relation'] = "grand";
                    $child['parent_id'] = $check[0]['id'];
                    $this->data->insert("children",$child);
                }
            }
            if(isset($data['birth_date']) OR isset($data['birth_month'])){
                if($data['birth_month'] != $check[0]['birth_month'] OR $data['birth_date'] != $check[0]['birth_date']){
                    $data['brest'] = $check[0]['brest'] + 1;
                }
            }
            $data['visiblity'] = (isset($data['visiblity'])) ? $data['visiblity'] : "offline";
            if(isset($data['groups'])){
                $this->data->delete(array('user_id'=>$check[0]['id']),'membgroup');
                foreach($data['groups'] as $k => $val){
                    // print_r($k);
                    // print_r($data['oCGroup']);
                    if($val > 0){
                        $this->data->insert("membgroup",array("user_id"=>$check[0]['id'],"g_id"=>$val));
                        // unset($data['oCGroup'][$k]);
                    }
                }
                unset($data['groups']);
            }
            if (isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $x = $this->do_upload($_FILES);
                if (isset($x['upload_data'])) {
                    $data['image'] = $x['upload_data'][0]['file_name'];
                }
            }

            $data['grandChild'] = (isset($data['grandChild'])) ? json_encode($data['grandChild']) : "";
            $data['child'] = (isset($data['child'])) ? json_encode($data['child']) : "";
            $this->data->update(array("id" => $check[0]['id']), "member", $data);
            $x = $this->data->fetch("member", array("id" => $check[0]['id'], 'status' => 'active'));
            $this->session->set_userdata("userMember", $x);
            $this->session->set_userdata("msg", "Profile Updated Successfully.");
            //die;
            redirect("home/view/index", "refresh");
        } else {
            $this->login();
        }
    }
    
    public function register(){
        $data['businessGroup'] = $this->data->myquery("SELECT * FROM `businessgroup` WHERE `status`='verified' ORDER BY `name`");
        //$data['businessGroup'] = $this->data->fetch('businessgroup',array('status'=>'verified'));
        $data['churchgroup'] = $this->data->fetch('churchgroup', array('status' => 'verified'));
        $data['msg'] = $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        $this->load->view('new/register', $data);
    }
    
    public function doRegister(){
        error_reporting(0);
        $data = $this->input->post();
        // print_r($data);
        // die();
        $data['ip_address'] = $this->input->ip_address();
        $data['mobileNo'] = substr($data['mobileNo'], 1);
        $data['mobileNo'] = str_replace("+", "", $data['mobileNo']);
        $check = $this->data->fetch("code", array("code" => $data['code'], "status" => "unused"));
        if (!empty($check)) {
            // $this->benchmark->mark('code_start');
            $cemail = $this->data->fetch("member", array('email' => $data['email'], 'status' => 'active'));
            if (empty($cemail)) {
                $usernameCreate = $this->data->fetch("member", array('fname' => $data['fname'], 'lname' => $data['lname'], 'status' => 'active'));
                if(count($usernameCreate)){
                    $username = lcfirst($data['fname'])."".lcfirst($data['lname'])."".count($usernameCreate);
                }else{
                    $username = lcfirst($data['fname'])."".lcfirst($data['lname']);
                }
                $data['username'] = strtolower(str_replace(' ', '', $username));
                if($data['gander'] == "female"){
                    $data['image'] = "female.jpg";
                }else{
                    $data['image'] = "male.jpg";
                }
                if(isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_FILES['image']['name'])){
                    $x = $this->do_upload($_FILES);
                    if(isset($x['upload_data'])){
                        $data['image'] = $x['upload_data'][0]['file_name'];
                    }
                }
                $usedDate = date('Y-m-d H:i:s');
                $this->data->update(array("code" => $data['code']), "code", array("status" => "used", "used" => $usedDate));
                if (!empty($data['employementField'])) {
                }
                if($data['first_time'] == 'yes'){
                    $data['first_time'] = 'no';
                    $data['firstTimerMemberFlag'] = 1;
                }
                $data1['child'] = $data['child'];
                $data1['grandChild'] = $data['grandChild'];
                $data['grandChild'] = (isset($data['grandChild'])) ? json_encode($data['grandChild']) : "";
                $data['child'] = (isset($data['child'])) ? json_encode($data['child']) : "";
                $this->data->insert("member", $data);
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
                $check = $this->data->fetch("member", array("email" => $data['email'], 'password' => $data['password'], 'status' => 'active'));
                if (!empty($check)) {
                    $x = array();
                    $x['user_id'] = $check[0]['id'];
                    $x['title'] = $data['fname'] . " " . $data['lname'] . " Business Page";
                    //$x['about'] = $data['biography'];
                    $x['email'] = "";
                    $x['phone'] = "";
                    $this->data->insert("business", $x);
                }
                $to = $data['email'];
                $this->session->set_userdata('userMember',$check);
                if($data['first_time']){
                    $msg = "Dear ". $data['fname']." , Thanks for joining the church, may the good Lord be with you. From your Pastor, Leke Sanusi";
                    $this->sendSMS("RCCGVHL", $data['mobileNo'], $msg);
                    
                    $msg1 = "Dear ".$data['fname'] .", Thanks for signing up. See your login details: https://rccgvhl.mmsapp.org Username: ". $data['email']." Password: ". $data['password'];
                    $this->sendSMS("RCCGVHL", $data['mobileNo'], $msg1);
                    //SMS Table Entry
                    $sms = array(
                        'msg' => 'SMS Sent for Registration.',
                        'to' => $data['fname']." ".$data['lname'],
                        'sentSMSCount' => 3
                    );
                    $this->data->insert('sms', $sms);
                    redirect("home/view/edit_profile", "refresh");
                ?>
                <?php
                }else{
                    $msg2 = "Dear ".$data['fname'] .", Thanks for signing up. See your login details: https://rccgvhl.mmsapp.org Username: ". $data['email']." Password: ". $data['password'];
                    $this->sendSMS("RCCGVHL", $data['mobileNo'], $msg2);
                    //SMS Table Entry
                    $sms = array(
                        'msg' => 'SMS Sent for Registration.',
                        'to' => $data['fname']." ".$data['lname'],
                        'sentSMSCount' => 2
                    );
                    $this->data->insert('sms', $sms);
                    redirect("home/view/edit_profile", "refresh");
                }
            } else {
                $this->session->set_userdata("msg", "Email Already Registered");
                redirect("home/login", "refresh");
            }
        } else {
            $this->session->set_userdata("msg", "Invalid Code");
            redirect('home/login', 'refresh');
        }
    }
    
    public function contactUs(){
        $x = "<table border='1'>";
        $data = $this->input->post();
        $this->data->insert('contactUs', $data);
        $redirect .= "?received=true";
        foreach($data as $key=>$val){
            $x .= "<tr>";
            $x .= "<th>".$key."<th>";
            $x .= "<td>".$val."<td>";
            $x .= "</tr>";
        }
        $x .= "</table>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@mmsonline.website\r\n";
        // $headers .= "BCC: info@bezaleelsolutions.com\r\n";
        // $headers .= "BCC: fa@bezaleelsolutions.com\r\n";
        // $headers .= "BCC: support@mmsonline.website\r\n";
        $headers .= "BCC: abhishek.shrivastava1987@gmail.com\r\n";
        $to = "info@mmsonline.website";
        // $to = "abhishek.shrivastava1987@gmail.com";
        $subject = "MMSONLINE Support Message";
        mail($to,$subject,$x,$headers);
        redirect('home' . $redirect, 'refresh');
    }
    
    public function insert($table, $redirect = ""){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            //$data = $this->data->scrubbing($data);
            if ($table == "business_imgs") {

                $x = $this->do_upload($_FILES);
                $data['parent_id'] = $check[0]['id'];
                $data['img'] = $x['upload_data'][0]['file_name'];
                $this->data->insert('productservices',$data);
                header("Location:".$_SERVER['HTTP_REFERER']);
                die;
            }
            
            if($table == 'addChild'){
                $classId = $data['className'];
                $studentId = $data['childName'];
                // print_r($studentId);
                $classDetail = $this->data->fetch('attendanceClass', array('id' => $classId));
                $oldStudentName = explode(',', $classDetail[0]['studentName']);
                $oldStudentId = explode(',', $classDetail[0]['studentId']);
                foreach($studentId as $student) {
                    // print_r($student);
                    $GICName = $this->data->fetch('children', array('id' => $student));
                    $GICName1[] = $GICName[0]['fname']." ".$GICName[0]['lname'];
                    $GICId[] = $GICName[0]['id'];
                    array_push($oldStudentId, $GICName[0]['id']);
                    array_push($oldStudentName, $GICName[0]['fname']." ".$GICName[0]['lname']);
                    $this->data->update(array('id' => $student), 'children', array('isAlotted' => 1, 'classId' => $classId));
                    $this->data->update(array('id' => $GICName[0]['parent_id']), 'member', array('isParentAlloted' => 1));
                }
                $oldStudentId = implode(',', $oldStudentId);
                $oldStudentName = implode(',', $oldStudentName);
                $this->data->update(array('id' => $classId), 'attendanceClass', array('studentId' => $oldStudentId, 'studentName' => $oldStudentName));
                redirect("home/view/addChild/","refresh");
            }
            
            if($table == "businessGallery") {
                $x = $this->do_upload($_FILES);
                $data['parent_id'] = $check[0]['id'];
                $data['img'] = $x['upload_data'][0]['file_name'];
                $this->data->insert('businessGallery', $data);
                header("Location:".$_SERVER['HTTP_REFERER']);
                die;
            }
            if ($table == "p_request") {
                $data['user_id'] = $check[0]['id'];
                $redirect .= "?received=true";
                $this->data->insert($table, $data);
            }
            if($table == "keepersNetwork"){
                $data['senderId'] = "user#".$check[0]['id'];
                $redirect .= "?received=true";
                $this->data->insert($table, $data);
            }
            if ($table == "reminders") {
                    $data['user_id'] = $check[0]['id'];
                    $data1['desc'] = $data['clndr_event_title_control'];
                    $data1['date'] = date('Y-m-d', strtotime($data['clndr_start_date_control']));
                    $data1['endDate'] = date('Y-m-d', strtotime($data['clndr_end_date_control']));
                    $data1['user_id'] = $check[0]['id'];
                    $url = parse_url($data['clndr_event_link_control']);
                    if($url['scheme'] == 'https' || $url['scheme'] == 'http'){
                        $link = $data['clndr_event_link_control'];
                    }else{
                        $link = "https://".$data['clndr_event_link_control'];
                    }
                    $data1['link'] = $link;
                    if(isset($_FILES['clndr_event_image_control']) && !empty($_FILES['clndr_event_image_control']) && !empty($_FILES['clndr_event_image_control']['name'])){
                        $x = $this->do_upload($_FILES);
                        if(isset($x['upload_data'])){
                            $data1['image'] = $x['upload_data'][0]['file_name'];
                        }
                    }else{
                        $data1['image'] = '';
                    }
                    $data1['eventDesc'] = $data['clndr_event_desc_control'];
                    $data1['reminder_event'] = $data['clndr_event_remind_control'];
                    $data1['isReminded'] = "1";
                    $this->data->insert($table, $data1);
                    $insert_id = $this->db->insert_id();
                    for($i = 0; $i < count($data['startTime']); $i++){
                        $date = date('Y-m-d', strtotime($data['clndr_start_date_control']. ' + '.($i).' days'));
                        $reminderDesc = array(
                            'eventId' => $insert_id,
                            'date' => $date,
                            'startTime' => $data['startTime'][$i],
                            'endTime' => $data['endTime'][$i]
                        );
                        $this->data->insert('reminderDescription', $reminderDesc);
                    }
                    $mem = $this->data->fetch('member', array('id' => $check[0]['id'], 'status' => 'active'));
                $redirect .= "?received=true";
                redirect('home' . $redirect, 'refresh');
            }
            if ($table == "support") {
                $data['user_id'] = $check[0]['id'];
                $this->data->insert($table, $data);
            }
            if ($table == "deliveries") {
                $x = $this->do_upload($_FILES);
                $data['work'] = '';
                $data['work'] = (isset($x['upload_data'])) ? $x['upload_data'][0]['file_name'] : "nothing";
                $this->data->insert($table, $data);
            }
            if ($table == "testimonies") {
                $data['user_id'] = $check[0]['id'];
                $data['approval'] = 0;
                if(isset($_FILES['file1']) || isset($_FILES['file2'])){
                $x = $this->do_upload1($_FILES);
                // $x1 = $this->do_upload1($_FILES['file2']);
                if(isset($x['upload_data'])){
                    if(isset($x['upload_data'][0])){
                        $data['file1'] = $x['upload_data'][0]['file_name'];
                    }
                    if(isset($x['upload_data'][0])){
                        $data['file2'] = $x['upload_data'][1]['file_name'];
                    }
                }
                }
                $this->data->insert($table, $data);
                $redirect .= "?received=true";
                redirect('home/view/' . $redirect, 'refresh');
            }
            if ($table == "advert"){
                $data['user_id'] = $check[0]['id'];
                $x = $this->do_upload_advert($_FILES);
                if(isset($x['upload_data'])){
                    if(isset($x['upload_data'][0])){
                        $data['horizontal'] = $x['upload_data'][0]['file_name'];
                    }
                    if(isset($x['upload_data'][1])){
                        $data['vertical'] = $x['upload_data'][1]['file_name'];
                    }
                }
                $this->data->insert($table, $data);
            }
        }
        if (!empty($redirect)) {
            redirect('home/view/' . $redirect, 'refresh');
        } elseif (empty($redirect) AND !isset($_SERVER['HTTP_REFERER'])) {
            redirect('home/', 'refresh');
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    
    public function logout2(){
        $check = $this->session->userdata('userMember');
        setcookie("mmsOnline1231", "", time() - 3600);
        setcookie("mmsOnline1232", "", time() - 3600);
        $this->data->update(array('id' => $check[0]['id']), 'member', array('visiblity' => 'offline'));
        $this->session->unset_userdata("userMember");
        redirect("home/", 'refresh');
    }
    
    public function logout(){
        //$this->session->unset_userdata("userMember");
        redirect("home/", 'refresh');
    }
    
    public function login(){
        $data['msg'] = $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        $this->session->unset_userdata('userAdmin');
        $this->session->unset_userdata('userMember');

        $this->load->view('new/login', $data);
    }
    
    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
    
    public function dologin(){
        $x = $this->session->userdata("userMember");
        $data = $this->input->post();
        $remember = isset($data['remember']) ? $data['remember'] : 0;
        if(isset($data['remember'])){
            unset($data['remember']);
        }
        $data = $this->data->scrubbing($data);
        $data['status'] = 'active';
        $check = $this->data->myquery("SELECT * FROM `member` WHERE ( `username` = '".$data['email']."' OR `email` = '".$data['email']."') AND password = '".$data['password']."'");//$this->data->fetch('member', $data);
        if (empty($check)) {
            $this->session->set_userdata("msg", "Invalid Credentials");
        } else {
            if ($check[0]['status'] == "active") {
                // $ipAddress = $this->input->ip_address();
                // $geo_country = $this->ip_info($ipAddress, "Country"); // United States
                // $country_code = $this->ip_info($ipAddress, "City"); // US
                $ipAddress = $data['ipAddress'];
                $geo_country = $data['geo_country']; // United States
                $country_code = $data['country_code']; // US
                $this->data->update(array('id' => $check[0]['id']), "member", array("visiblity" => "online", "ip_address" => $ipAddress, "geo_country" => $geo_country, "country_code" => $country_code, "count" => $check[0]['count'] + 1));
                $month = date('m');
                $year = date('Y');
                $loginCount = $this->data->myquery("SELECT * FROM loginCount WHERE month = {$month} and year = {$year}");
                $this->data->update(array('id' => $loginCount[0]['id']), 'loginCount', array('count' => ($loginCount[0]['count'] + 1)));
                $this->session->unset_userdata("userMember");
                $this->session->set_userdata("userMember", $check);
                if($remember != 0){
                    $hour = time() + (86400 * 30);
                    setcookie('mmsOnline1231', $check[0]['email'], $hour);
                    setcookie('mmsOnline1232', $check[0]['password'], $hour);
               }
            } else {
                $this->session->set_userdata("msg", "Account Suspended");
            }
        }
        header("Location:".$_SERVER['HTTP_REFERER']."?userId=".$check[0]['id']);
        //redirect('home/view/index',"refresh");
    }
    public function updateAdvert($id, $table, $red = null){
        $data = $this->input->post();
        $check = $this->session->userdata("userMember");
        if(!empty($check)){
        if ($table == "advert"){
                $data['user_id'] = $check[0]['id'];
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
            }
            $this->data->update(array('id'=>$id),$table,$data);
            if(empty($red)){
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                redirect("home/view/".$red,"refresh");
            }
        }else{
            redirect("home/login");
        }
    }
    public function update(){
        $check = $this->session->userdata('userAdmin');
        if (!empty($check)) {
            $data = $this->input->post();
            $data = $this->data->scrubbing($data);
            $this->data->update(array("id" => $check[0]['id']), "admins", $data);
            $again = $this->data->fetch("admins", array("id" => $check[0]['id']));
            $this->session->set_userdata("userAdmin", $again);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            redirect("home/login");
        }
    }
    
    public function do_upload_advert($files){
        $config['upload_path'] = 'assets_f/img/business';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        // $config['max_size'] = '100000';
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

    public function do_upload($files){
        $config['upload_path'] = 'assets_f/img/business';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '100000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $data = array();
        foreach ($files as $key => $val) {
            if (!$this->upload->do_upload($key)) {
                //echo $this->upload->display_errors();die;
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
    
     public function do_upload1($files){
         if($files['file1']['tmp_name'] != "" || $files['file2']['tmp_name'] != ""){
        $config['upload_path'] = 'assets_f/img/business';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '100000';
        $this->load->library('upload', $config);
        $data = array();
        foreach ($files as $key => $val) {
            if (!$this->upload->do_upload($key)) {
                //echo $this->upload->display_errors();die;
            } else {
                $data['upload_data'][] = $this->upload->data();
            }
        }
        for($i=0;$i<count($data['upload_data']);$i++){
            $fullpath = $data['upload_data'][$i]['full_path'];
                $exif = exif_read_data($fullpath);
                if(empty($exif['Orientation'])){
                    $img = $data['upload_data'][$i]['file_name'];
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
                        // return $data;
                    }
                    else
                    {
                        $this->image_lib->rotate();
                        // return $data; /*and some code here*/
                    }
                }else{
                    $img=$data['upload_data'][$i]['file_name'];
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
                        // return $data;
                    }
                    else
                    {
                        $this->image_lib->rotate();
                        // return $data; /*and some code here*/
                    }
                }
        }
        $this->image_lib->clear();
        unset($config);
        return $data;
         }else{
         }
    }
    
    public function sendToTutor($id = null){
        $check = $this->session->userdata("userMember");
        if (!empty($check)) {
            $data['userAdmin'] = $check;
            $a = $this->data->fetch('notice_board', array('admin_id' => ''));
            $b = $this->data->fetch('notice_board', array('admin_id' => $check[0]['id']));
            $data['notification_count'] = $this->data->myquery("SELECT * FROM `notice_board` WHERE (`admin_id` = '' AND `seen`='false') OR (`admin_id` = '{$check[0]['id']}' AND `seen`='false') ");

            $data['notice'] = array_merge($a, $b);
            //$data['tutor'] = $this->data->fetch('tutors',array('id'=>$id));
            $this->load->view('new/header', $data);
            $this->load->view('new/sendToTutor');
            $this->load->view('new/footer');
        }
    }
    
    public function sendOffer(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $data['user_id'] = $check[0]['id'];
            $data['status'] = "not accepted";
            $this->data->insert("offers", $data);
            if ($data['client_id'] != 0) {
                $x['from'] = $check[0]['id'];
                $x['to'] = $data['client_id'];
                $x['messages'] = "<strong>Offer Exhanged</strong>";
                $this->data->insert("message", $x);
            }
        } else {

        }
    }
    
    public function sendOffer2(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $data['user_id'] = $check[0]['id'];
            $this->data->insert("custom_invoice", $data);
        } else {

        }
    }
    
    public function ajax($id){
        $data = $this->input->post();
        if ($id == "online") {
            $check = $this->session->userdata('userMember');
            if (!empty($check)) {
                //echo "UPDATE `member` SET `lasttime` = '".date("Y-m-d h:i:s")."' WHERE `id`='{$data['id']}'";
                //echo date("Y-m-d i:h:s");
                $this->data->update(array("id" => $data['id']), "member", array("lasttime" => date("Y-m-d H:i:s")));
            }
        }elseif($id == "checkOnline"){
            $memberDetail = $this->data->fetch('member', array('id' => $data['id']));
            if(count($memberDetail)){
                echo 'Present';
            }else{
                echo 'Absent';
            }
        }elseif($id == 'deleteImage'){
            $memberDetail = $this->data->fetch('member', array('id' => $data['id']));
            if($memberDetail[0]['gander'] == 'male'){
                $image = "male.jpg";
            }else{
                $image = "female.jpg";
            }
            $action = $this->data->update(array('id' => $data['id']), 'member', array('image' => $image));
            $x = $this->data->fetch("member", array("id" => $data['id'], 'status' => 'active'));
            $this->session->set_userdata("userMember", $x);
        }elseif($id == 'updateIsDeleted'){
            // $reminders = $this->data->fetch('reminders', array('user_id' => $data['id']));
            $reminders = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$data['id'].', user_id)');
            $today = date('Y-m-d');
            $currentTime = date('H:i:s');
            foreach($reminders as $val){
                print_r($currentTime." ".date('H:i:s', strtotime($val['start'])));
                if($today >= date('Y-m-d',strtotime($val['date'])) && $currentTime >= date('H:i:s',strtotime($val['start']))){
                    echo 'hello'.$val['event_id'];
                    
                    $this->data->update(array('event_id' => $val['event_id']), 'reminders', array('isDeleted' => "1"));
                    print_r($this->db->last_query());
                }
            }
        }elseif($id == "reminder"){
            $check = $this->session->userdata('userMember');
            $reminder = $this->data->myquery('SELECT * FROM reminders WHERE user_id = '.$data['id'].' or adminId = 1 order by event_id desc limit 1');
            if(!empty($reminder)){
            // $reminder = $this->data->fetch('reminders', array('user_id' => $data['id']));
                $startDate = $reminder[0]['date'];
                $startTime = $reminder[0]['start'];
                $compDate = date('Y-m-d H:i:s', strtotime($startDate." ".$startTime));
                // print_r($compDate);
                $reminderTime = strtotime($compDate) - ($reminder[0]['reminder_event'] * 60);
                // print_r($reminderTime." ");
                $now = strtotime(date('Y-m-d H:i:s'));
                // print_r($now." ");
                if($reminderTime == $now){
                    $reminderId = $reminder[0]['event_id'];
                    $reminded = "1";
                    $this->data->update(array('event_id' => $reminderId, 'user_id' => $data['id']), 'reminders', array('reminded' => $reminded));
                    echo "You have reminder set for ".$reminder[0]['desc']." in ".$reminder[0]['reminder_event']." mins of time.";
                }else{
                    echo "Time";
                }
            }else{
                echo "Time";
            }
            // if(date())
        }
        elseif ($id == "validCode") {
            //echo 1;die;
            $check = $this->data->fetch("code", array("code" => $data['code'], "status" => "unused"));
            if (!empty($check)) {
                $data['msg'] = $this->session->userdata('msg');
                $this->session->unset_userdata('msg');
//                $this->load->view("new/regFields", $data);
            } else {
                echo "Invalid";
            }
        }
        elseif($id == "validateMobile"){
            $str = ltrim($data['mobile'], '+');
            $check = $this->data->fetch("member", array("mobileNo" => $str, 'status' => 'active'));
            if(empty($check)) {
               echo "Invalid"; 
            }else{
                echo "Valid";
            }
        }
        
        elseif($id == "validateEmail"){
            $check = $this->data->fetch("member", array("email" => $data['email'], 'status' => 'active'));
            if(empty($check)) {
                echo "Invalid";
            }else {
                echo "Valid";
            }
        }
        
        elseif($id == "checkUsername"){
            $check = $this->data->myquery('SELECT * FROM `member` WHERE username="'.$data['username'].'" OR email="'.$data['username'].'"');
            if(empty($check)) {
                echo "Invalid";
            }else{
                echo "Valid";
            }
        }
        
        elseif ($id == "addToBuddies") {
            $check = $this->session->userdata('userMember');

            if (!empty($check)) {
                $a['user_id'] = $check[0]['id'];
                $a['friend_id'] = $data['id'];
                //print_r($a);die();
                /////////////////////////////////////
                $b['friend_id'] = $check[0]['id']; //
                $b['user_id'] = $data['id'];       //
                $budyCheck = $this->data->fetch("buddies", $a);
                if(empty($budyCheck)){
                    $this->data->insert("buddies", $a);//
                    $this->data->insert("buddies", $b);//
                }

                $abc = $this->data->fetch("member",array("id"=>$data['id'], 'status' => 'active'));
                if($abc[0]['emailSub']){
                    $url = site_url("home/adToBudiesEmail/".$check[0]['id'] ."/".$abc[0]['id']."/me");
                    $x = file_get_contents($url);
                    $sub = "Membership Management System";
                    $to = $check[0]['email'];
                    $this->sendMail($x,$sub,$to);
                }
                $message = "You have added ".$abc[0]['fname']." as buddy.";
                $this->sendPush($message, $check[0]['id'], site_url()."home/view/buddies");
                $abc = $this->data->fetch("member",array("id"=>$data['id'], 'status' => 'active'));
                if($abc[0]['emailSub']){
                    $url = site_url("home/adToBudiesEmail/".$abc[0]['id'] ."/".$check[0]['id']."/notme");
                    $x = file_get_contents($url);
                    $sub = "Membership Management System";
                    $to = $abc[0]['email'];
                    $this->sendMail($x,$sub,$to);
                }
                $message = "You have added as buddy by ".$check[0]['fname'];
                $this->sendPush($message, $data['id'], site_url()."home/view/buddies");
                echo "a";
            } else {
                echo "b";
            }
        }
        elseif ($id == "deleteFromBuddies"){
            $check = $this->session->userdata('userMember');
            if (!empty($check)) {
                $a['user_id'] = $check[0]['id'];
                $a['friend_id'] = $data['id'];
                /////////////////////////////////////
                $b['friend_id'] = $check[0]['id']; //
                $b['user_id'] = $data['id'];       //
                $this->data->delete($a,"buddies");//
                $this->data->delete($b,"buddies");//

                $abc = $this->data->fetch("member",array("id"=>$data['id'], 'status' => 'active'));
                if($abc[0]['emailSub']){
                    $x = file_get_contents(site_url("home/DeleteToBudiesEmail/".$check[0]['id'] ."/".$abc[0]['id']."/me"));
                    echo site_url("home/DeleteToBudiesEmail/".$check[0]['id'] ."/".$abc[0]['id']);
                    $sub = "Membership Management System";
                    $to = $check[0]['email'];
                    $this->sendMail($x,$sub,$to);
                }

                $abc = $this->data->fetch("member",array("id"=>$data['id'], 'status' => 'active'));
                if($abc[0]['emailSub']){
                    $x = file_get_contents(site_url("home/DeleteToBudiesEmail/".$abc[0]['id'] ."/".$check[0]['id']."/notme"));
                    $sub = "Membership Management System";
                    $to = $abc[0]['email'];
                    $this->sendMail($x,$sub,$to);
                }
                echo "a";
            } else {
                echo "b";
            }
        }
        elseif ($id == "accceptOffer") {
            $check = $this->session->userdata('userMember');
            if (!empty($check)) {
                $validate = $this->data->fetch("offers", array("id" => $data['id']));
                if (!empty($validate) && ($validate[0]['client_id'] == $check[0]['id'])) {
                    $this->data->update(array("id" => $data['id']), "offers", array("status" => $data['status']));
                    echo "a";
                } else {
                    echo "b";
                }
            }
        }
        elseif ($id == "advertCharges") {
            $x = $this->data->fetch("details");
            $charges = 0;
            $charges = $x[0]['per_week'] * $data['week'];
            echo $charges . ".00";
        }
        elseif($id == "getReminderss"){
            $check = $this->session->userdata('userMember');
            if (!empty($check)) {
                // $data['reminders'] = $this->data->fetch("reminders",array("user_id" => $check[0]['id']));
                $data['reminders'] = $this->data->myquery('SELECT * FROM reminders WHERE FIND_IN_SET('.$check[0]['id'].', user_id)');
                print_r($data['reminders']);
                foreach($data['reminders'] as $k=>$v){
                    $data['reminders'][$k]['id']   = $data['reminders'][$k]['id'];unset($data['reminders'][$k]['id']);
                    $data['reminders'][$k]['title'] = $data['reminders'][$k]['desc'];unset($data['reminders'][$k]['desc']);
                    $data['reminders'][$k]['timeStart'] = $data['reminders'][$k]['start'];unset($data['reminders'][$k]['start']);
                    $data['reminders'][$k]['timeEnd'] = $data['reminders'][$k]['end'];unset($data['reminders'][$k]['end']);
                }
                //echo json_encode($data['reminders']);
            }
        }
        elseif($id == "visiblity"){
            $memberDetail = $this->data->fetch('member', array('id' => $data['id']));
            if($memberDetail[0]['visiblity'] == "online"){
                echo 'Online';
            }else{
                echo 'Offline';
                $this->data->update(array("id" => $data['id']), "member", array("lasttime" => date("Y-m-d H:i:s"), 'count' => ($memberDetail[0]['count'] + 1), 'visiblity' => 'online'));
                $month = date('m');
                $year = date('Y');
                $loginCount = $this->data->myquery("SELECT * FROM loginCount WHERE month = {$month} and year = {$year}");
                $this->data->update(array('id' => $loginCount[0]['id']), 'loginCount', array('count' => ($loginCount[0]['count'] + 1)));
                
            }
        }
    }
    
    public function paypalDonate(){
        $this->load->library('paypal_lib');
        $returnURL = site_url('home/') . '/success'; //payment success url
		$cancelURL = site_url('home/') . '/cancel'; //payment cancel url
		$notifyURL = site_url('home/').'/ipn'; //ipn url
		$input = $this->input->post();
		$check = $this->session->userdata("userMember");
		$this->session->set_userdata("amount", $input['amount']);
        $this->session->set_userdata("purpose", $input['purpose']." MMS");
        $this->session->set_userdata("detail", $input['detail']);
		$userId = $check[0]['id'];
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $input['detail']." MMS");
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $input['id']);
		$this->paypal_lib->add_field('amount',  $input['amount']);
		
		// Load paypal form
		$this->paypal_lib->paypal_auto_form();
    }
    
    function ipn(){
		// Paypal return transaction details array
		$paypalInfo = $this->input->post();
		
		if(!empty($paypalInfo)){
			$data['user_id'] 	= $paypalInfo['custom'];
			$data['product_id']	= $paypalInfo["item_number"];
			$data['txn_id']	= $paypalInfo["txn_id"];
			$data['payment_gross'] = $paypalInfo["mc_gross"];
			$data['currency_code'] = $paypalInfo["mc_currency"];
			$data['payer_email'] = $paypalInfo["payer_email"];
			$data['payment_status']	= $paypalInfo["payment_status"];
	
			$paypalURL = $this->paypal_lib->paypal_url;
			$result	 = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
			
			// Check whether the payment is verified
			if(preg_match("/VERIFIED/i",$result)){
				// Insert the transaction data into the database
				$this->product->insertTransaction($data);
			}
		}
    }
    
    public function success(){
        // var_dump($_REQUEST);die;
        $response = $this->merchant->_express_checkout_return('Sale', $_REQUEST);
        // print_r($response);
        // print_r('hello');
        // die;
        $check = $this->session->userdata("userMember");
        $amount = $this->session->userdata("amount");
        $purpose = $this->session->userdata("purpose");
        $detail = $this->session->userdata("detail");
        if (!empty($check)){
            $a['user_id'] = $check[0]['id'];
            $a['amount'] = $amount;
            $a['purpose'] = $purpose;
            $a['detail'] = $detail;
            $a['admin_id'] = 0;
            $a['modeOfPayment'] = 'Card';
            $this->data->insert("donations", $a);
            $this->session->unset_userdata("amount");
            $this->session->unset_userdata("purpose");
            $this->session->unset_userdata("detail");
        }
        echo "<script>alert('Thank you for your contributions.')</script>";
        echo "<script>window.location.href = '".site_url()."'; </script>";
        //redirect("home/", "refresh");
    }
    
    public function cancel(){
        echo "Purchased Canceled";
    }
    
    public function sendPrivateMsg(){
        $data = $this->input->post();
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $x['messages'] = htmlspecialchars($data['msg']);
            $x['to'] = $data['id'];
            $x['from'] = $check[0]['id'];
            $this->data->insert("message", $x);
            redirect("home/view/chat#" . $data['id']);
        } else {
            redirect("home/");
        }
    }
    
    public function reqPageVerify(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $x['questions'] = json_encode($data);
            $x['user_id'] = $check[0]['id'];
            $this->data->insert("page_req", $x);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    
    public function visiblity(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $status = "online";
            $a = $this->data->fetch("member", array("id" => $check[0]['id']));
            if ($a[0]['visiblity'] == "online") {
                $status = "offline";
                $count = $a[0]['count'];
            } else {
                $status = "online";
                $count = $a[0]['count'] + 1;
            }
            $this->data->update(array("id" => $check[0]['id']), "member", array('visiblity' => $status, 'count' => $count));
            $a = $this->data->fetch("member", array("id" => $check[0]['id'], 'status' => 'active'));
            $this->session->set_userdata("userMember", $a);
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    
    public function sendMail($msg, $sub, $to){
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
            
        }else{
            
            // print_r($this->email->print_debugger());
        }
        

    }
    
    public function calender($m = NULL){
        $check = $this->session->userdata('userMember');
        $m = ($m == NULL) ? date("m") : $m;
        $first_day_of_month = date('w', strtotime("01-" . date("m") . "-" . date("Y")));
        echo "<table class='table table-bordered'>";
        echo "<tr><th style='text-align: center' colspan='7'>" . date("F / Y") . "</th></tr>";
        echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thur</th><th>Fri</th><th>Sat</th></tr>";
        echo "<tr>";
        $a = 0;
        for ($i = 1; $i <= $first_day_of_month; $i++) {
            echo "<td></td>";
            $a++;
            if ($a == 7) {
                echo "</tr><tr>";
                $a = 0;
            }
        }
        $number = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
        for ($i = 1; $i <= $number; $i++) {
            $date = date("y-m-d", strtotime(date('Y') . "/" . date("m") . "/" . $i));
            $x = $this->data->myquery("SELECT count(`id`) as `total` FROM `reminders` WHERE `date` = '{$date}' AND `user_id`='{$check[0]['id']}'");
            echo "<td ";
            if ($i == date("j")) {
                echo " style='background:#BDD8F3' ";
                echo ">" . $i;
                echo "<span style='float:right;' class='btn btn-warning'>" . $x[0]['total'] . "</span>";
                echo "<p><a href='" . site_url('home/view') . "/view_reminder?date=" . date("Y-m-d", strtotime(date('Y') . "/" . date("m") . "/" . $i)) . "'>V</a></p>";
                echo "</td>";
            } elseif ($i < date("j")) {
                echo " style='background:#e8e8e8' ";
                echo ">" . $i;
                echo "<span style='float:right;' class='btn btn-success'>" . $x[0]['total'] . "</span>";
                echo "<p><a href='" . site_url('home/view') . "/view_reminder?date=" . date("Y-m-d", strtotime(date('Y') . "/" . date("m") . "/" . $i)) . "'>V</a></p>";
                echo "</td>";
            } else {
                echo ">" . $i;
                echo "<span style='float:right;' class='btn btn-info'>" . $x[0]['total'] . "</span>";
                echo "<p><a href='" . site_url('home/view') . "/view_reminder?date=" . date("Y-m-d", strtotime(date('Y') . "/" . date("m") . "/" . $i)) . "'>V</a></p>";
                echo "</td>";
            }
            $a++;
            if ($a == 7) {
                echo "</tr><tr>";
                $a = 0;
            }
        }
        echo "</tr>";
        echo "</table>";
    }
    
    public function delete($id, $red){
        $this->data->delete(array('id' => $id), "p_request");
        if ($red == "same") {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            redirect("home/view/" . $red, "refresh");
        }
    }
    
    public function deleteAdvert($id, $red){
        $this->data->delete(array('id' => $id), "advert");
        if ($red == "same") {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            redirect("home/view/" . $red, "refresh");
        }
    }
    
    public function deleteKN($id, $red){
        $this->data->delete(array('keeperId' => $id), "keepersNetwork");
        if($red == "same"){
            header("Location:". $_SERVER['HTTP_REFERER']);
        }else{
            redirect("home/view/". $red, "referesh");
        }
    }
    
    public function deleteEventNew($id, $red){
        $this->data->delete(array('event_id' => $id, 'adminId' => 0), 'reminders');
        if($red == "same"){
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
            redirect("home/view/".$red, "refresh");
        }
    }
    
    public function deleteEventNewAdmin($id, $red){
        $this->data->delete(array('event_id' => $id, 'adminId' => 1), 'reminders');
        if($red == "same"){
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
            redirect("home/view/".$red, "refresh");
        }
    }
    
    public function reject(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->data->fetch("deliveries", array("id" => $data['id']));
            if (!empty($x)) {
                $a = $this->data->fetch("offers", array("id" => $x[0]['invoice_id']));
                if ($a[0]['user_id'] == $check[0]['id']) {
                    $this->data->update(array("id" => $x[0]['id']), "deliveries", array("id" => $data['id'], "status" => "rejected", "comments" => $data['comments']));
                }
            }
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    
    public function accept(){
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $x = $this->data->fetch("offers", array("id" => $data['id']));
            if (!empty($x)) {
                $a = $x;
                if ($a[0]['user_id'] == $check[0]['id']) {
                    //$this->data->update(array("id" => $x[0]['id']), "deliveries", array("status" => "accepted"));
                    $this->data->update(array("id" => $x[0]['id']), "offers", array("status" => "accepted"));
                    $new = array();
                    $new['user_id'] = $check[0]['id'];
                    $new['client_id'] = $a[0]['client_id'];
                    $new['rating'] = $data['rating'];
                    $new['review'] = $data['review'];
                    $new['invoice_id'] = $x[0]['id'];
                    $this->data->insert("reviews", $new);
                }
            }
        }
        redirect("home/","refresh");
        //header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    
    public function contactUsBusiness($id = null){
        if ($id != null) {
            $x = $this->data->fetch("member", array("id" => $id, 'status' => 'active'));
            if (!empty($x)) {
                $data = $this->input->post();
                $msg = "<p>Hey!</p><p>You received a message</p><p><strong>Name</strong>" . $data['name'] . "</p><p><strong>Email</strong>" . $data['email'] . "</p><p><strong>Message</strong>" . $data['msg'] . "</p>";
                $this->sendMail($msg, "Membership Management System : Message from your business page", $x[0]['email']);
            }
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    
    public function emailPage($data = null){
        $data['email'] = $this->data->fetch("details");
        $this->load->view("email", $data);
    }
    
    public function admin_chat($id){
        $check = $this->session->userdata("userMember");
        if(!empty($check)){
            $data = $this->input->post();
            if($id == "getRecepients"){
                $messages = $this->data->myquery("SELECT `from`,`to` FROM `a_m_chat` WHERE (`to`='{$check[0]['id']}' OR `from` = '{$check[0]['id']}') AND (`admin` != '{$check[0]['id']}') ORDER BY `id` DESC ");
                $filter = array();
                if(!empty($messages)){
                    foreach ($messages as $val) {
                        $val['to'] = ($val['to'] == $check[0]['id']) ? $val['from'] : $val['to'];
                        $x = $this->data->fetch('credentials', array('id' => $val['to']));
                        if(!in_array($x[0]['id'], $filter)){ ?>
                            <li onclick='openMsg(<?= $val['to'] ?> )' style="cursor:pointer;">
                                <div class='md-list-addon-element'>
                                    <span class='element-status element-status-'></span>
                                    <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                    <?php $image = base_url('assets_f/img/business/avatar.jpg'); ?>
                                    <img class='md-user-image md-list-addon-avatar' src='<?= $image ?>' alt=''/>
                                </div>
                                <div class='md-list-content'>
                                    <div class='md-list-action-placeholder'></div>
                                    <span class='md-list-heading'><?php echo !empty($x) ? $x[0]['name'] : "Undefined" ?></span>
                                </div>
                            </li>
                            <?php
                        }
                        $filter[] = $x[0]['id'];
                    }
                }else{
                    echo '<script>alert("Go to feedback area to start conversation with admin");</script>';
                }
            }
            if ($id == 'sendMessage') {
                if ($data['id'] == 'all') {
                    $a = $this->data->fetch('member', array('status' => 'active'));
                    $x['messages'] = htmlspecialchars($data['msg']);
                    $x['from'] = $check[0]['id'];
                    foreach ($a as $v) {
                        $x['to'] = $v['id'];
                        $this->data->insert("a_m_chat", $x);
                    }
                    $message = "New Message Received.".$data['msg'];
                    $this->sendPush($message, $data['id'],site_url()."home/view/chat");
                } else {
                    $x['messages'] = htmlspecialchars($data['msg']);
                    $x['to'] = $data['id'];
                    $x['from'] = $check[0]['id'];
                    $x['attachment'] = $data['att'];
                    $this->data->insert("a_m_chat", $x);
                    $message = "New Message Received.".$data['msg'];
                    $this->sendPush($message, $data['id'], site_url()."home/view/chat");
                }

            }
            if ($id == 'member_message_detail') {
                $id = $data['id'];
                $messages = $this->data->myquery("SELECT * FROM `a_m_chat` WHERE (`to`='{$id}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$id}' AND `to` = '{$check[0]['id']}') ORDER BY `id` ASC ");
                if (!empty($messages)) {
                    foreach ($messages as $k => $val) {
                        $x = $this->data->fetch("credentials", array('id' => $id));
                        $messages[$k]['to'] = $x[0]['name'];
                        $name = ($val['from'] == $check[0]['id']) ? "Me" : $x[0]['name'];
                        ?>
                        <span id="message-data-name" style="display:none"><?= $messages[$k]['to'] ?></span>
                        <?php if($name == "Me"){ ?>
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <?php $image = (empty($check[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$check[0]['image'] ; ?>
                                    <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    <!--<img class="md-user-image" src="<?= $image ?>" alt="">-->
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            <?= $val['messages'] ?>
                                        </p>
                                        <?php if(isset($val['attachment']) AND !empty($val['attachment'])){ ?>
                                            <?php $attachments = json_decode($val['attachment'],true); ?>
                                            <?php foreach($attachments as $v){ ?>
                                                <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                            <?php } ?>
                                        <?php } ?>
                                        <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                        <span class="chat_message_time"><?= date("d-M-Y h:i:s", strtotime($val['date'])) ?></span>
                                    </li>
                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                    <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            <?= $val['messages'] ?>
                                        </p>
                                        <?php if(isset($val['attachment']) AND !empty($val['attachment'])){ ?>
                                            <?php $attachments = json_decode($val['attachment'],true); ?>
                                            <?php foreach($attachments as $v){ ?>
                                                <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to view</a></p>
                                            <?php } ?>
                                        <?php } ?>
                                        <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                        <span class="chat_message_time"><?= date("d-M-Y h:i:s", strtotime($val['date'])) ?></span>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    <?php
                    }
                }
            }
        }
    }
    
    public function member_chat($id){
        $check = $this->session->userdata("userMember");
        if (!empty($check)) {
            $data = $this->input->post();
            if($id == "getGroupsRecepients"){
                $groups = $this->data->fetch('membgroup',array("user_id"=>$check[0]['id']));
                //echo $data['active'];die;
                foreach ($groups as $val) {
                    $x = $this->data->fetch('churchgroup', array('id' => $val['g_id']));
                    ?>
                    <li <?php if($data['active'] == $val['g_id']){ ?> class="activeChat" <?php } ?> id="group<?= $val['g_id'] ?>" onclick="openMsg(<?= $val['g_id'] ?>)" style="cursor:pointer;">
                        <div class="md-list-addon-element">
                            <span class="element-status element-status-"></span>
                            <?php $image = (empty($x[0]['image'])) ? "http://www.gingercreek.org/wp-content/uploads/2014/03/small-groups-icon.png" : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                            <div style="background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;"></div>
                        </div>
                        <div class="md-list-content">
                            <div class="md-list-action-placeholder"></div>
                            <span class="md-list-heading"><?php echo !empty($x) ? $x[0]['name'] : "Undefined" ?></span>
                        </div>
                    </li>
                    <?php
                    $filter[] = $x[0]['id'];
                }
            }
            if($id == "getRecepients"){
                $messages = $this->data->myquery("SELECT `from`,`to` FROM `message` WHERE `to`='{$check[0]['id']}' OR `from` = '{$check[0]['id']}' ORDER BY `id` DESC ");
                $filter = array();
                foreach ($messages as $val) {
                    $val['to'] = ($val['to'] == $check[0]['id']) ? $val['from'] : $val['to'];
                    $x = $this->data->fetch('member', array('id' => $val['to'], 'status' => 'active'));
                    if (!in_array($x[0]['id'], $filter)) {
                        ?>
                        <li onclick="openMsg(<?= $val['to'] ?> )" style="cursor:pointer;">
                            <div class="md-list-addon-element">
                                <span class="element-status element-status-"></span>
                                <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                <?php
                                            $exif = exif_read_data($image);
                                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                                            <div style="
                                    background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;
                                    transform : rotate(90deg);
                                    " class="detect">
                                            <?php
                                            }else if($exif['Orientation'] == 8){
                                                // $class = "md-card-head-avatar";
                                            ?>
                                            <div style="
                                    background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;
                                    transform : rotate(90deg);
                                    " class="detect8">
                                            <?php
                                            }else{
                                            ?>
                                            <div style="
                                    background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;
                                    ">
                                            <?php
                                            }
                                        ?>

                                </div>
                                <!--<img class='md-user-image md-list-addon-avatar'src='<?= $image ?>' alt=''/>-->
                            </div>
                            <div class="md-list-content">
                                <div class="md-list-action-placeholder"></div>
                                <span class="md-list-heading"><?php echo !empty($x) ? $x[0]['fname'] . " " . $x[0]['lname'] : "Undefined" ?></span>
                            </div>
                        </li>
                    <?php
                    }
                    $filter[] = $x[0]['id'];
                }
            }
            if($id == 'sendMessage'){
                if ($data['id'] == 'all') {
                    $a = $this->data->fetch('member', array('status' => 'active'));
                    $x['messages'] = htmlspecialchars($data['msg']);
                    $x['from'] = $check[0]['id'];
                    foreach ($a as $v) {
                        $x['to'] = $v['id'];
                        $this->data->insert("message", $x);
                    }
                    $message = "New Message Received.".$data['msg'];
                    $this->sendPush($message, $data['id'], site_url()."home/view/chat");
                } else {
                    $x['attachments'] = $data['att'];
                    $x['messages'] = htmlspecialchars($data['msg']);
                    $x['to'] = $data['id'];
                    $x['from'] = $check[0]['id'];
                    $purana = $this->data->myquery("SELECT * FROM `message` WHERE (`to` = '{$data['id']}' AND `from` = '{$x['from']}') OR (`from` = '{$data['id']}' AND `to` = '{$x['from']}')");
                    $x['u1'] = (!empty($purana)) ? $purana[0]['u1'] : $check[0]['id'];
                    if(empty($purana)){
                        echo "First";
                    }else{
                        echo 'Second';
                    }
                    $this->data->insert("message", $x);
                    $message = "New Message Received.".$data['msg'];
                    $this->sendPush($message, $data['id'], site_url()."home/view/chat");
                }
                $prevMsg = $this->data->fetch("message", $x);

                $x = file_get_contents(site_url('home/notifMsgEmailtemp?id='.$prevMsg[0]['id']));
                $sub = "Membership Management System";
                $xx = $this->data->fetch("member",array("id"=>$data['id'], 'status' => 'active'));
                $to = $xx[0]['email'];
                $this->sendMail($x,$sub,$to);

            }
            if($id == 'member_message_detail'){
                $id = $data['id'];
                $nameOfTheRecepient = $this->data->fetch("member",array("id"=>$id, 'status' => 'active'));
                $nameOfTheRecepient = (!empty($nameOfTheRecepient)) ? $nameOfTheRecepient[0]['fname'] : "Undefined";
                ?>
                <span id="message-data-name" style="display:none;"><?= $nameOfTheRecepient ?></span>
                <?php
                $this->data->update(array("to"=>$check[0]['id'],"from"=>$id),"message",array('notification'=>"read"));
                $messages = $this->data->myquery("SELECT * FROM `message` WHERE (`to`='{$id}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$id}' AND `to` = '{$check[0]['id']}') ORDER BY `id` ASC ");
                
                if (!empty($messages) && count($messages) > 1) {
                    
                    foreach ($messages as $k => $val) {

                        $x = $this->data->fetch("member", array('id' => $id, 'status' => 'active'));
                        $image = $this->data->fetch('member', array('id' => $check[0]['id']));
                        $messages[$k]['to'] = $x[0]['fname'] . " " . $x[0]['lname'];
                        $name = ($val['from'] == $check[0]['id']) ? "Me" : $messages[$k]['to'];
                        if($val['u1'] == $check[0]['id'] AND $val['user1'] == 'false'){ ?>
                            <?php if($name == "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($image[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$image[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    //print_r($exif['Orientation']);
                                                    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect" style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"  style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=sent')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <!--<span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>-->
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    // print_r($exif['Orientation']);
                                                    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"  style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8" style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=received')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <!--<span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>-->
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php }elseif($val['u1'] != $check[0]['id'] AND $val['user2'] == 'false'){ ?>
                            <?php if($name == "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($image[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$image[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect" style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8" style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=sent')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <!--<span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>-->
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"  style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8" style="transform: rotate(90deg);"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false){
                                                        if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                        <?php
                                                        }else if($exif['Orientation'] == 8){
                                                            // $class = "md-card-head-avatar";
                                                        ?>
                                                        <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=received')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <!--<span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>-->
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php } ?>


                    <?php
                    }
                }else if(count($messages) == 1){
                    if($messages[0]['u1'] != $check[0]['id']){
                ?>
                <script>
                    $('#submit_message').attr('disabled', true);
                    swal({
                      title: 'Are you sure?',
                      text: "“You have a request to join on Messenger”",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, Accept It!',
                      cancelButtonText: 'Reject, Request!'
                    }).then((result) => {
                      if (result.value) {
                          $('#submit_message').attr('disabled', false);
                          $('#submit_message').focus();
                        swal(
                          'Accepted!',
                          'Enjoy your friendship.',
                          'success'
                        )
                      }else{
                          swal(
                              'Rejected!',
                              'You will not be the part of this chat any more.',
                              'warning'
                          )
                          window.location.href="<?= base_url() ?>home/view/buddies";
                      }
                    });
                    <?php $message = "Your chat request is accepted.";
                    $this->sendPush($message, $check[0]['id'], site_url()."home/view/chat"); ?>
                </script>
                <?php
                foreach ($messages as $k => $val) {

                        $x = $this->data->fetch("member", array('id' => $id, 'status' => 'active'));
                        $messages[$k]['to'] = $x[0]['fname'] . " " . $x[0]['lname'];
                        $name = ($val['from'] == $check[0]['id']) ? "Me" : $messages[$k]['to'];

                        if($val['u1'] == $check[0]['id'] AND $val['user1'] == 'false'){ ?>
                            <?php if($name == "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($check[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$check[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=sent')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=received')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php }elseif($val['u1'] != $check[0]['id'] AND $val['user2'] == 'false'){ ?>
                            <?php if($name == "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($check[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$check[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=sent')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?php if($val['messages'] == "<strong>Offer Exhanged</strong>"){ echo "<a href='".site_url('home/view/manage_offers?type=received')."'>".$val['messages']."</a>"; }else{ echo $val['messages']; }?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php } ?>


                    <?php
                    }
                }else{
                    foreach ($messages as $k => $val) {

                        $x = $this->data->fetch("member", array('id' => $id, 'status' => 'active'));
                        $messages[$k]['to'] = $x[0]['fname'] . " " . $x[0]['lname'];
                        $name = ($val['from'] == $check[0]['id']) ? "Me" : $messages[$k]['to'];

                        if($val['u1'] == $check[0]['id'] AND $val['user1'] == 'false'){ ?>
                            <?php if($name == "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($check[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$check[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?= $val['messages'] ?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?= $val['messages'] ?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php }elseif($val['u1'] != $check[0]['id'] AND $val['user2'] == 'false'){ ?>
                            <?php if($name == "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($check[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$check[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?= $val['messages'] ?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <?php
                                                    $exif = exif_read_data($image);
                                                    if($exif['Orientation'] == 6){
                                                        // $class = "md-card-head-avatar detect";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="user avatar" class="md-user-image detect"/>
                                                    <?php
                                                    }else if($exif['Orientation'] == 8){
                                                        // $class = "md-card-head-avatar";
                                                    ?>
                                                    <img src="<?= $image ?>" alt="" class="md-user-image detect8"/>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <img class="md-user-image" src="<?= $image ?>" alt=""/>
                                                    <?php
                                                    }
                                                ?>
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?= $val['messages'] ?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s a", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        <?php } ?>


                    <?php
                    }
                }
                }
            }
            if($id == "group_message_detail"){
                $id = $data['id'];
                $churchgroup = $this->data->fetch("churchgroup",array('id'=>$id));
                $checking = $this->data->fetch("membgroup",array('g_id'=>$id,'user_id'=>$check[0]['id']));
                $messages = $this->data->fetch("groupdisc",array('group'=>$id));
                ?><?php if(!empty($checking) AND $checking[0]['status'] == 'pending'){ ?><script id="runscript">alert("Thanks for joining the <?= $churchgroup[0]['name'] ?> group but your admittance is subject to confirmation by the admin");</script><?php } ?>
                <?php
                if (!empty($messages)) {
                    foreach ($messages as $k => $val) {

                        $x = $this->data->fetch("member", array('id' => $val['user_id'], 'status' => 'active'));
                        $image = $this->data->fetch('member', array('id' => $check[0]['id']));
                        $name = ($val['user_id'] == $check[0]['id']) ? "Me" : ucfirst($x[0]['fname']);

                        $msgToDisplay = $val['falseusers'];
                        $msgToDisplay = json_decode($msgToDisplay,true);
                        $msgToDisplay = (is_array($msgToDisplay)) ? $msgToDisplay : array() ;
                        if(!in_array($check[0]['id'],$msgToDisplay)){
                            ?>
                            <span id="message-data-name" style="display:none"><?= $messages[$k]['to'] ?></span>
                            <?php if($name != "Me"){ ?>
                                <div class="chat_message_wrapper">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($image[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$image[0]['image'] ; ?>
                                        <img class="md-user-image" src="<?= $image ?>" alt="">
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?= $val['desc'] ?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="chat_message_wrapper chat_message_right">
                                    <div class="chat_user_avatar">
                                        <?php $image = (empty($x[0]['image'])) ? base_url('assets_f/img/business/avatar.jpg') : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                                        <img class="md-user-image" src="<?= $image ?>" alt="">
                                    </div>
                                    <ul class="chat_message">
                                        <li>
                                            <p>
                                                <?= $val['desc'] ?>
                                            </p>
                                            <?php if(isset($val['attachments']) AND !empty($val['attachments'])){ ?>
                                                <?php $attachments = json_decode($val['attachments'],true); ?>
                                                <?php foreach($attachments as $v){ ?>
                                                    <p><a target="_blank" href="<?= base_url() ?><?= $v ?>">Click to View</a></p>
                                                <?php } ?>
                                            <?php } ?>
                                            <span class="chat_message_time"><?= ucfirst($x[0]['fname'])." ".ucfirst($x[0]['lname']) ?></span>
                                            <span class="chat_message_time"><?= date("d-M-Y h:i:s", strtotime($val['date'])) ?></span>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php
                        }
                    }
                }
            }
            if($id == "sendMessagetoGroup"){
                $checking = $this->data->fetch("membgroup",array('g_id'=>$data['id'],'user_id'=>$check[0]['id']));
                if(!empty($checking) AND $checking[0]['status'] != 'pending'){
                    $purana = $this->data->fetch("groupdisc",array('group'=>$data['id']));
                    $x['falseusers'] = (!empty($purana)) ? $purana[0]['falseusers'] : "";
                    $x['attachments'] = $data['att'];
                    $x['desc'] = htmlspecialchars($data['msg']);
                    $x['user_id'] = $check[0]['id'];
                    $x['group'] = $data['id'];
                    $this->data->insert("groupdisc", $x);
                    $a = array();
                    $a = $this->data->fetch("membgroup", array("g_id"=>$x['group']));
                    foreach($a as $as){
                        $x = array();
                        $lastMsg = $this->data->fetch("groupdisc", $x);
                        if($check[0]['id'] != $as['user_id']){
                            $x = $this->data->fetch("member",array('id'=>$as['user_id'], 'status' => 'active'));
                            if(!empty($x)){
                                $msg = file_get_contents(site_url('home/notifgroupMsgEmailtemp?me='.$check[0]['id']."&to=".$x[0]['id']."&group=".$data['id']."&msg=".$lastMsg[0]['id']));
                                $sub = "Membership Management System";
                                $xx = $this->data->fetch("member",array("id"=>$data['id'], 'status' => 'active'));
                                if($xx[0]['emailSub']){
                                    $to = $x[0]['email'];
                                    $this->sendMail($msg,$sub,$to);
                                }
                            }
                        }
                    }
                }
            }
            if($id == "deleteConversation"){
                //$data = $this->input->get();
                $purana = $this->data->myquery("SELECT * FROM `message` WHERE (`to` = '{$data['id']}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$data['id']}' AND `to` = '{$check[0]['id']}')");
                if(!empty($purana)){
                    if($purana[0]['u1'] == $check[0]['id']){
                        $purana = $this->data->myquery("UPDATE `message` SET `user1` =  'true' WHERE (`to` = '{$data['id']}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$data['id']}' AND `to` = '{$check[0]['id']}')");
                    }else{
                        $purana = $this->data->myquery("UPDATE `message` SET `user2` =  'true' WHERE (`to` = '{$data['id']}' AND `from` = '{$check[0]['id']}') OR (`from` = '{$data['id']}' AND `to` = '{$check[0]['id']}')");
                    }
                }
            }
            if($id == "deleteAllConversation"){
                $purana = $this->data->myquery("SELECT * FROM `message` WHERE (`from` = '{$check[0]['id']}') OR (`to` = '{$check[0]['id']}')");
                if(!empty($purana)){
                    if($purana[0]['u1'] == $check[0]['id']){
                        $purana = $this->data->myquery("UPDATE `message` SET `user1` =  'true' WHERE (`from` = '{$check[0]['id']}') OR (`to` = '{$check[0]['id']}')");
                    }{
                        $purana = $this->data->myquery("UPDATE `message` SET `user2` =  'true' WHERE (`from` = '{$check[0]['id']}') OR (`to` = '{$check[0]['id']}')");
                    }
                }
            }
            if($id == 'deleteGrpConversation'){
                $toFind = '"'.$check[0]['id'].'"';
                $purana = $this->data->myquery("SELECT * FROM `groupdisc` WHERE `group` = '{$data['id']}' AND `falseusers` LIKE '%{$toFind}%'");
                if(empty($purana)){
                    $x[0] = $check[0]['id'];
                    $x = json_encode($x,true);
                    $this->data->update(array("group"=>$data['id']),"groupdisc",array("falseusers"=>$x));
                }
            }
            if($id == 'getMembRecepients'){
                $groups = $this->data->fetch('membgroup',array("g_id"=>$data['active'], "status" => "approved"));
                // echo $data['active'];die;
                foreach ($groups as $val) {
                    $x = $this->data->fetch('member', array('id' => $val['user_id'], 'status' => 'active'));
                    ?>
                    <li <?php if($check[0]['id'] == $val['user_id']){ ?> class="activeChat" <?php } ?> id="group<?= $val['g_id'] ?>" onclick="openMsg(<?= $val['g_id'] ?>)" style="cursor:pointer;">
                        <div class="md-list-addon-element">
                            <span class="element-status element-status-"></span>
                            <?php $image = (empty($x[0]['image1'])) ? "http://www.gingercreek.org/wp-content/uploads/2014/03/small-groups-icon.png" : base_url('assets_f/img/business')."/".$x[0]['image'] ; ?>
                            <?php $exif = exif_read_data($image); 
                            if($exif['Orientation'] == 6){
                                                // $class = "md-card-head-avatar detect";
                                            ?>
                            <div style="background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;" class="detectChat"></div>
                            <?php }else if($exif['Orientation'] == 8){ ?>
                            <div style="background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;" class="detect8"></div>
                            <?php }else{ ?>
                            <div style="background-image: url('<?= $image ?>');
                                    width: 35px;
                                    height: 35px;
                                    background-size: 100% auto;
                                    background-repeat: no-repeat;" class="detectChat"></div>
                            <?php } ?>
                        </div>
                        <div class="md-list-content">
                            <div class="md-list-action-placeholder"></div>
                            <span class="md-list-heading"><?php echo !empty($x) ? $x[0]['fname']." ".$x[0]['lname'] : "Undefined" ?></span>
                        </div>
                    </li>
                    <?php
                    $filter[] = $x[0]['id'];
                }
            }
        }
    }
    
    public function code($q = 6){
        $abc = range("a", "z");
        $numb = range(0, 9);
        $merge = array_merge($abc, $numb);
        $code = '';
        for ($i = 0; $i < $q; $i++) {
            $code .= $merge[rand(0, (count($merge) - 1))];
        }
        return $code;
    }
    
    public function setEvent(){
        $data = $this->input->post();
        $data1 = $data; 
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $data1['user_id'] = $check[0]['id'];
            $data['isRead'] = 1;
            $data['adminId'] = 1;
            $this->data->update(array("event_id" => $data['event_id']), "reminders", array("isRead" => $data['isRead']));
            $this->data->insert('eventAttendance', $data1);
        }
    }
    
    public function setRead(){
        $data = $this->input->post();
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $this->data->update(array("event_id" => $data['event_id']), "reminders", array("isRead" => $data['isRead']));
        }
    }
    
    public function forgotPwd1(){
        $data = $this->input->post();
        $check = $this->data->fetch("member", array('email' => $data['email'], 'status' => 'active'));
        if(!empty($check)){
            $ccode = true;
            while ($ccode){
                $code = $this->code(40);
                $checkCode = $this->data->fetch("fm_code", array("code" => $code));
                if(empty($checkCode)){
                    $ccode = false;
                }
            }
            $x = array(
                "for" => $check[0]['id'],
                "code" => $code,
                "status" => "not used"
            );
            $this->data->insert("fm_code", $x);
            $url = site_url('home/changePwd') . "/" . $code;
            $msg = "";
            $msg .= "<p>Dear <strong>".$check[0]['fname'].",</strong></p>";
            $msg .= "<p>You recently requested to reset your password for your <strong>MMS ONLINE</strong> account.</p>";
            $msg .= "<p>Please click on link below to reset your password</p>";
            $msg .= "<a href='".$url."'>Reset Password</a>";
            $msg .= "If the link doesn't work, copy and paste the following link on a browser then click enter. </br> <pre>".$url."</pre> Thank You";

            $x = file_get_contents(site_url('home/emailPage2') . "?msg=" . $code);
            $sub = "Password Recovery For MMS";
            $to = $data['email'];
            $this->sendMail($x, $sub, $to);
            $this->forgot_password();
            echo "sent";
        }else{
            echo "error";
        }
    }
    
    public function forgotPwd(){
        $data = $this->input->post();
        $check = $this->data->fetch("member", array('email' => $data['email'], 'status' => 'active'));
        if(!empty($check)){
            $ccode = true;
            while ($ccode){
                $code = $this->code(40);
                $checkCode = $this->data->fetch("fm_code", array("code" => $code));
                if(empty($checkCode)){
                    $ccode = false;
                }
            }
            $x = array(
                "for" => $check[0]['id'],
                "code" => $code,
                "status" => "not used"
            );
            $this->data->insert("fm_code", $x);
            $url = site_url('home/changePwd') . "/" . $code;
            $details = $this->data->fetch('details', array('id' => 1));
            $msg = $details[0]['forgotPassword'];
            $msg = str_replace("{name}", $check[0]['fname'], $msg);
            $smg = str_replace("{url}", $url, $msg);
            // $msg = "";
            // $msg .= "<p>Dear <strong>".$check[0]['fname'].",</strong></p>";
            // $msg .= "<p>You recently requested to reset your password for your <strong>MMS ONLINE</strong> account.</p>";
            // $msg .= "<p>Please click on link below to reset your password</p>";
            // $msg .= "<a href='".$url."'>Reset Password</a>";
            // $msg .= "If the link doesn't work, copy and paste the following link on a browser then click enter. </br> <pre>".$url."</pre> Thank You";

            $x = file_get_contents(site_url('home/emailPage2') . "?msg=" . $code);
            $sub = "Password Recovery For MMS";
            $to = $data['email'];
            echo "sent";
            $this->sendMail($x, $sub, $to);
            // $this->forgot_password();
        }else{
            echo "error";
        }
    }
    
    public function changePwd($code){
        $check = $this->data->fetch("fm_code", array('code' => $code, "status" => "not used"));
        if (!empty($check)) {
            $data['msg'] = $this->session->userdata("msg");
            $this->session->set_userdata("code", $code);
            $this->load->view('new/new_pwd', $data);
        } else {
            $this->session->set_userdata("msg", "Invalid Link");
            $this->login();
        }
    }
    
    public function emailPage2(){
        $data['email'][0]['msg'] = $_GET['msg'];
        $code = $_GET['msg'];
        $check = $this->data->fetch("fm_code", array("code" => $_GET['msg']));
        $check = $this->data->fetch("member", array("id" => $check[0]['for'], 'status' => 'active'));
        //var_dump($check);die;
        $url = site_url('home/changePwd') . "/" . $code;
        $msg = "";
        $msg .= "<p>Dear <strong>".$check[0]['fname'].",</strong></p>";
        $msg .= "<p>You recently requested to reset your password for your <strong>MMS ONLINE</strong> account.</p>";
        $msg .= "<p>Please click on link below to reset your password</p>";
        $msg .= "<a href='".$url."'>Reset Password</a>";
        $msg .= "<br/>If the link doesn't work, copy and paste the following link on a browser then click enter. </br> <pre>".$url."</pre> Thank You";
        $data['msg'] = $msg;
        $this->load->view("emailforgotpasswordmember", $data);

    }
    
    public function changePassword()
    {
        $data = $this->input->post();
        $code = $this->session->userdata("code");
        $this->session->unset_userdata("code");
        $check = $this->data->fetch("fm_code", array('code' => $code, "status" => "not used"));
        if (!empty($check)) {
            if ($data['password1'] == $data['password2']) {
                $this->data->update(array('id' => $check[0]['for']), "member", array('password' => $data['password1']));
                $this->data->update(array('id' => $check[0]['id']), "fm_code", array('status' => "used"));
                $this->session->set_userdata("msg", "Password Changed Successfully");
                // $this->login();
                header("Location:" . site_url('home'));
            } else {
                $this->session->set_userdata("msg", "Passwords do not match");
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_userdata("msg", "Password Changed Successfully");
            // $this->login();
            header("Location:" . site_url('home'));
        }
    }
    
    public function accSettings()
    {
        $check = $this->session->userdata('userMember');
        if (!empty($check)) {
            $data = $this->input->post();
            $check = $this->data->fetch("member", array('id' => $check[0]['id'], 'status' => 'active'));
            if ($data['c_pwd'] == $check[0]['password']) {
                if ($data['new_pwd'] == $data['cf_pwd']) {
                    $this->data->update(array("id" => $check[0]['id']), "member", array("password" => $data['new_pwd']));
                    $msg = "Password Changed Successfully";

                    $x = file_get_contents(site_url("home/notifpwdChangeEmailtemp?id=".$check[0]['id']));

                    $sub = "Membership Management System";
                    $to = $check[0]['email'];
                    $this->sendMail($x,$sub,$to);


                } else {
                    $msg = "Passwords Mismatch";
                }
            } else {
                $msg = "Current Password Incorrect";
            }
            $this->session->set_userdata("msg", $msg);
            redirect("home/view/edit_password");
        } else {
            $this->login();
        }
    }
    
    public function activateAdv($id = 0,$for = ""){
        if($for == "success"){
            $this->data->update(array("id"=>$id),"advert",array("status"=>"paid","starting"=>date("Y-m-d")));
            redirect('home/view/advert');
        }elseif($for == ""){
            $check = $this->session->userdata('userMember');
            if (!empty($check)) {
                $checl = $this->data->fetch("advert",array("id"=>$id,"user_id"=>$check[0]['id']));
                if(!empty($checl)){
                    $details = $this->data->fetch("details");
                    if(!empty($details)){
                        $params = array(
                            'amount' => $details[0]['per_week'] * $checl[0]['week'],
                            'currency' => 'USD',
                            'return_url' => site_url('home/activateAdv/'.$id) . '/success',
                            'cancel_url' => site_url('home/activateAdv/'.$id) . '/cancel',
                            'LOGOIMG' => 'https://git-scm.com/images/logos/downloads/Git-Logo-Black.png'
                        );
                        $this->load->library('merchant');
                        $this->merchant->load('paypal_express');
                        $settings = array(
                            'username' => 'sandbo_1215254764_biz_api1.angelleye.com',
                            'password' => '1215254774',
                            'signature' => 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAb6E3l6my.pY9br1z2qxKx96W18v',
                            'test_mode' => true
                        );
                        $this->merchant->initialize($settings);
                        $response = $this->merchant->purchase($params);
                        print"<pre>";
                        var_dump($response);
                        die;
                    }
                }
            }
        }
    }
    
    public function getAttachments(){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $x =  $_FILES;
            if($x['size'] <= 5000000){
                $_FILES=array();
                for($i=0;$i<count($x['photos']['name']);$i++){
                    $_FILES['abc'.$i]['name'] = $x['photos']['name'][$i];
                    $_FILES['abc'.$i]['tmp_name'] = $x['photos']['tmp_name'][$i];
                    $_FILES['abc'.$i]['type'] = $x['photos']['type'][$i];
                    $_FILES['abc'.$i]['size'] = $x['photos']['size'][$i];
                    $_FILES['abc'.$i]['error'] = $x['photos']['error'][$i];
                }
                $config['upload_path'] = 'assets_f/img/';
                $config['allowed_types'] ="*";
                $config['max_size'] = '0';
                $this->load->library('upload', $config);
                foreach ($_FILES as $key => $val) {
                    if (!$this->upload->do_upload($key)) {
                        $data['error'] = $this->upload->display_errors();
                    } else {
                        $data['upload_data'][] = $this->upload->data();
                    }
                }
                $x=array();
                if(isset($data['upload_data'])){
                    foreach($data['upload_data'] as $v){
                        $x[] =  "assets_f/img/".$v['file_name'];
                    }
                }
                echo json_encode($x);
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    
    public function getBook($id=0){
        $check = $this->session->userdata('userMember');
        if(!empty($check)){
            $x = $this->data->fetch("mybooks",array("userId"=>$check[0]['id'],'book_id'=>$id));
            if(empty($x)){

                $bookDetail = $this->data->fetch("books",array('id'=>$id));

                if($bookDetail[0]['price'] > 0 AND !isset($_GET['status'])){
                    $this->load->library('paypal_lib');
                    $returnURL = site_url('home/') . '/getBook/'.$id."?status=succ"; //payment success url
            		$cancelURL = site_url('home/') . '/cancel'; //payment cancel url
            		$notifyURL = site_url('home/').'/ipn'; //ipn url
            		$input = $this->input->post();
            // 		$check = $this->session->userdata("userMember");
            		$this->session->set_userdata("amount", $input['amount']);
                    $this->session->set_userdata("purpose", $input['purpose']);
                    $this->session->set_userdata("detail", $input['detail']);
            		$userId = $check[0]['id'];
            		$this->paypal_lib->add_field('return', $returnURL);
            		$this->paypal_lib->add_field('cancel_return', $cancelURL);
            		$this->paypal_lib->add_field('notify_url', $notifyURL);
            		$this->paypal_lib->add_field('item_name', $bookDetail[0]['title']);
            		$this->paypal_lib->add_field('custom', $userID);
            		$this->paypal_lib->add_field('item_number',  $bookDetail[0]['id']);
            		$this->paypal_lib->add_field('amount',  $bookDetail[0]['price']);
            		
            		// Load paypal form
            		$this->paypal_lib->paypal_auto_form();
                }else{

                }
                $this->data->insert("mybooks",array("userId"=>$check[0]['id'],'book_id'=>$id));
            }
            redirect("home/view/myBooks");
        }
    }
    
    public function fbAuth(){
        $this->load->library('facebook');
        $this->load->library('facebook', array(
            'appId' => '1451990008166435',
            'secret' => '901e659e817b7ab4c54f000bdd6947e4',
        ));
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,name,email');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {

        }
        if ($user) {
            $data['logout_url'] = site_url('welcome/logout');
            // $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => "http://demo.mmsonline.website/home/fbAuth",
                'scope' => array("email") // permissions here
            ));
            header("Location:".$data['login_url']);
            //echo "<a href=".$data['login_url'].">Click Here</a>";
        }
        var_dump($data);
    }
    
    public function ajaxLogin(){
        $data = $this->input->post();
        $data = $this->data->scrubbing($data);
        $data['password'] = 123123123;
        $data['status'] = 'active';
        $check = $this->data->fetch('member', $data);
        if (empty($check)) {
            $this->session->set_userdata("msg", "Invalid Credentials");
            echo "Invalid Credentials";
        } else {
            if ($check[0]['status'] == "active") {
                $this->data->update($data, "member", array("count" => $check[0]['count'] + 1));
                $this->session->unset_userdata("userMember", $check);
                $this->session->set_userdata("userMember", $check);
                echo "True";
            } else {
                $this->session->set_userdata("msg", "Account Suspended");
                echo "Account Suspended";
            }
        }
    }
    
    public function ajaxRegister(){

        $data = $this->input->post();
        $data['lname'] = "";
        $data['password'] = 123123123;
        $check = $this->data->fetch("code", array("code" => $data['code'], "status" => "unused"));
        if (!empty($check)) {
            $cemail = $this->data->fetch("member", array('email' => $data['email'], 'status' => 'active'));
            if (empty($cemail)) {
                $this->data->update(array("code" => $data['code']), "code", array("status" => "used", "used" => date("Y-m-d i:h:s")));
                if (!empty($data['employementField'])) {
                }
                $data['image'] = 'male.jpg';

                $this->data->insert("member", $data);
                $check = $this->data->fetch("member", array("email" => $data['email'], 'password' => $data['password'], 'status' => 'active'));
                if (!empty($check)) {
                    $x = array();
                    $x['user_id'] = $check[0]['id'];
                    $x['title'] = $data['fname'] . " " . $data['lname'];
                    $x['about'] = $data['biography'];
                    $x['email'] = $data['email'];
                    $x['phone'] = $data['mobileNo'];
                    $this->data->insert("business", $x);
                }
                $to = $data['email'];
                $msg = file_get_contents(site_url('home/emailPage'));
                $msg = str_replace("{username}", $data['email'], $msg);
                $msg = str_replace("{password}", $data['password'], $msg);
                $msg = str_replace("{name}", ucfirst($data['fname']), $msg);
                $sub = "Membership Management System";
                $this->sendMail($msg, $sub, $to);
                ?>
                <script>
                    var data = JSON.stringify({
                        "from": "RCCGVHL",
                        "to": "<?= $data['mobileNo'] ?>",
                        "text": "Dear <?= $data['fname'] ?>, Thanks for signing up. See your login details: rccgvhl.mmsapp.org Username: <?= $data['email'] ?> Password: <?= $data['password'] ?>"
                    });
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "http://dstr.connectbind.com:8080/sendsms?username=BSL1-RCCGVHL1&password=rccgvhl1&type=0&dlr=1&destination="<?= $data['mobileNo'] ?>"&source=RCCGVHL&message=Dear <?= $data['fname'] ?>, Thanks for signing up. See your login details: cmc.mmsapp.org Username: <?= $data['email'] ?> Password: <?= $data['password'] ?>");
                    // xhr.withCredentials = false;
                    // xhr.addEventListener("readystatechange", function () {
                    //     if (this.readyState === this.DONE) {
                    //         console.log(this.responseText);
                    //     }
                    // });
                    // xhr.open("POST", "http://api.infobip.com/sms/1/text/single");
                    // xhr.setRequestHeader("authorization", "Basic QmV6YWxlZWw6cDdtVkw4d2U=");
                    // xhr.setRequestHeader("content-type", "application/json");
                    // xhr.setRequestHeader("accept", "application/json");
                    xhr.send(data);
                </script>
                <?php
                $this->session->set_userdata('userMember',$check);
                //redirect("home/");
                echo "True";
            } else {
                $this->session->set_userdata("msg", "Email Already Registered");
                echo "Email Already Registered";
            }
        } else {
            $this->session->set_userdata("msg", "Invalid Code");
            echo "Invalid Code";
        }
    }
    
    public function ajaxSupport(){
        $check = $this->session->userdata("userMember");
        if (!empty($check)) {
            $a=array();
            $a['user_id'] = $check[0]['id'];
            $a['msg'] = $_POST['description'];
            $a['subject'] = $_POST['subject'];
            $this->data->insert("support",$a);
            $redirect .= "?received=true";
            $x = "<table>";
            $_POST['name'] = $check[0]['fname']." ".$check[0]['lname'];
            if($check[0]['email'] != '-'){
                $_POST['email'] = $check[0]['email'];
            }
            $_POST['mobileNo'] = $check[0]['mobileNo'];
            $_POST['Mail Send From Domain : '] = base_url();
            foreach($_POST as $key=>$val){
                $x .= "<tr>";
                $x .= "<th>".$key."<th>";
                $x .= "<td>".$val."<td>";
                $x .= "</tr>";
            }
            $x .= "</table>";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: noreply@mmsonline.website\r\n";
            $headers .= "BCC: info@bezaleelsolutions.com\r\n";
            $headers .= "BCC: fa@bezaleelsolutions.com\r\n";
            $headers .= "BCC: support@mmsonline.website\r\n";
            $headers .= "BCC: abhishek.shrivastava1987@gmail.com\r\n";
            $to = "info@mmsonline.website";
            // $to = "abhishek.shrivastava1987@gmail.com";
            $subject = "MMSONLINE Support Message";
            mail($to,$subject,$x,$headers);
            redirect('home/view/support' . $redirect, 'refresh');
        }
    }
    
    public function ajaxSearch(){
        //var_dump($_REQUEST['param']);die;
//        $x = $this->data->fetch("member");
        $x = $this->data->myquery("SELECT * FROM `member` WHERE (`fname` LIKE '%{$_REQUEST['search']}%') and 'status' = 'active'");
        $l = count($x) - 1;
        echo "[";
        foreach($x as $xk=>$xs){
            echo "{";
            echo "'value': '".$xs['fname'] . " " . $xs['lname'] ."',";
            echo "'title': '".$xs['fname'] . " " . $xs['lname'] ."',";
            echo "'url': 'restricted.home.member.5',";
            echo "'text': 'Profile'";
            echo "}";
            if($xk < $l){
                echo ",";
            }
        }
        echo "]";
    }
    
    public function notifMsgTesttemp(){
        $a = $this->data->fetch("testimonies", array('id'=>$_GET['id']));
        $x['to'] = $this->data->fetch("member",array("id"=>$a[0]['user_id'], 'status' => 'active'));
        $x['msg'] = urldecode($a[0]['msg']);
        $x['to'][0]['name'] = ($a[0]['anon'] == 'true') ? "Anonymous Member" : $x['to'][0]['fname']." ".$x['to'][0]['lname'];
        $data['email'][0]['msg'] = "<p> <strong>". $x['to'][0]['name'] .",</strong>  shared a testimony:</p>";
        $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']."</p>";
        $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/view/testimonies')."'><span class='btn-info'>VIEW</span></a></p>";
        $this->load->view("email",$data);
    }
    
    public function notifMsgCaltemp(){
        $a = $this->data->fetch("reminders", array('id'=>$_GET['id']));
        $x['to'] = $this->data->fetch("member",array("id"=>$a[0]['user_id'], 'status' => 'active'));
        $x['msg'] = urldecode($a[0]['desc']);
        $x['to'][0]['name'] = ($a[0]['anon'] == 'true') ? "Anonymous Member" : $x['to'][0]['fname']." ".$x['to'][0]['lname'];
        $data['email'][0]['msg'] = "<p> <strong>". $x['to'][0]['name'] .",</strong>  Reminder Update:</p>";
        $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']." saved successfully.</p>";
        $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url()."'><span class='btn-info'>VIEW</span></a></p>";
        $this->load->view("email",$data);
    }
    
    public function adToBudiesEmail($one,$two,$me){
        $check = $this->session->userdata("userMember");

        $a = $this->data->fetch('member',array("id"=>$one, 'status' => 'active'));
        $one = $a[0]['fname'] . " " . $a[0]['lname'];

        $b = $this->data->fetch('member',array("id"=>$two, 'status' => 'active'));
        $two = $b[0]['fname'] . " " . $b[0]['lname'];

        if($me == "me"){
            $data['email'][0]['msg'] = "<p> Dear <strong>". $one .",</strong> </p>";
            $data['email'][0]['msg'] .= "<p>You added <strong>". $two ."</strong> as a buddy. </p>";
        }else{
            $data['email'][0]['msg'] = "<p> Dear <strong>". $one .",</strong> </p>";
            $data['email'][0]['msg'] .= "<p><strong>". $two ."</strong> Added you as a buddy. </p>";
        }
        $this->load->view("email",$data);
    }

    public function DeleteToBudiesEmail($one,$two,$me){
        $check = $this->session->userdata("userMember");
        $a = $this->data->fetch('member',array("id"=>$one, 'status' => 'active'));
        $one = $a[0]['fname'] . " " . $a[0]['lname'];
        $b = $this->data->fetch('member',array("id"=>$two, 'status' => 'active'));
        $two = $b[0]['fname'] . " " . $b[0]['lname'];

        if($me == 'me'){
            $data['email'][0]['msg'] = "<p> Dear <strong>". $one .",</strong> </p>";
            $data['email'][0]['msg'] .= "<p>You deleted <strong>". $two ."</strong> from buddy list. </p>";
        }else{
            $data['email'][0]['msg'] = "<p> Dear <strong>". $one .",</strong> </p>";
            $data['email'][0]['msg'] .= "<p><strong>". $two ."</strong> deleted you from buddy list. </p>";
        }
        $this->load->view("email",$data);
    }
    
    public function notifgroupMsgEmailtemp(){
        $x['group'] = $this->data->fetch("churchgroup", array('id'=>$_GET['group']));
        $x['from'] = $this->data->fetch("member", array('id'=>$_GET['me'], 'status' => 'active'));
        $x['to'] = $this->data->fetch("member", array('id'=>$_GET['to'], 'status' => 'active'));
        $x['msg'] = $this->data->fetch("groupdisc", array('id'=>$_GET['msg']));
        $x['msg'] = urldecode($x['msg'][0]['desc']);
        $data['email'][0]['msg'] = "<p>Dear <strong>".$x['to'][0]['fname'] ." ". $x['to'][0]['lname'] .",</strong> <br/> <strong>". $x['from'][0]['fname'] . " " . $x['from'][0]['lname'] ."</strong> left you a message in <strong>".$x['group'][0]['name']."</strong> group:</p>";
        $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']."</p>";
        $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/view/groupChat#'.$_GET['group'])."'><span class='btn-info'>VIEW AND REPLY</span></a></p>";
        $this->load->view("email",$data);
    }
    
    public function notifMsgEmailtemp(){
        $a = $this->data->fetch("message", array('id'=>$_GET['id']));
        $x['to'] = $this->data->fetch("member",array("id"=>$a[0]['to'], 'status' => 'active'));
        $x['from'] = $this->data->fetch("member",array("id"=>$a[0]['from'], 'status' => 'active'));
        $x['msg'] = urldecode($a[0]['messages']);
        $data['email'][0]['msg'] = "<p>Dear <strong>".$x['to'][0]['fname'] ." ". $x['to'][0]['lname'] .",</strong> <br/> <strong>". $x['from'][0]['fname'] . " " . $x['from'][0]['lname'] ."</strong> left you a message:</p>";
        $data['email'][0]['msg'] .= "<p style='background: #f5f5f2;padding: 11px;border-radius: 7px;font-style:italic;'>".$x['msg']."</p>";
        $data['email'][0]['msg'] .= "<br/><p style='text-align:center;'><a style='text-decoration:none;' href='".site_url('home/view/chat#'.$a[0]['to'])."'><span class='btn-info'>VIEW AND REPLY</span></a></p>";
        $this->load->view("email",$data);
    }
    
    public function notifpwdChangeEmailtemp(){
        $x = $this->data->fetch("member",array("id"=>$_GET['id'], 'status' => 'active'));
        $data['email'][0]['msg'] = "<p>Dear <strong>".$x[0]['fname'] ." ". $x[0]['lname'] .",</strong> <br/> Your Password has been changed.</p>";
        $this->load->view("email",$data);
    }
    
    public function testt(){

        $sourceimage = "assets_f/img/business/IMG_2365.JPG";
        $resize_settings['image_library'] = 'gd2';
        $resize_settings['source_image'] = $sourceimage;
        $resize_settings['create_thumb'] = FALSE;
        $resize_settings['maintain_ratio'] = TRUE;
        $resize_settings['quality'] = '10%';
        $original_size = getimagesize($sourceimage);
        $resize_settings['width'] = $original_size[0];
        $resize_settings['height'] = $original_size[1];

        $resize_settings['new_image'] = "assets_f/img/business/something.jpg";
        $this->load->library('image_lib', $resize_settings);
        $this->image_lib->resize();
        echo $this->image_lib->display_errors();

    }
    
    public function deletet($id, $red){
        $check = $this->session->userdata("userMember");
        if(!empty($check)){
            $x = $this->data->fetch("testimonies",array('id' => $id));
            if($x[0]['user_id'] == $check[0]['id']){
                $this->data->delete(array('id' => $id), "testimonies");
            }
            if ($red = "same") {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                redirect("home/view/" . $red, "refresh");
            }
        }
    }
    
    public function deleteinvoiceCustom($id, $red){
        $check = $this->session->userdata("userMember");
        if(!empty($check)){
            $x = $this->data->fetch("custom_invoice",array('id' => $id));
            if($x[0]['user_id'] == $check[0]['id']){
                $this->data->delete(array('id' => $id), "custom_invoice");
            }
            if ($red = "same") {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                redirect("home/view/" . $red, "refresh");
            }
        }
    }
    
    public function deleteOffers($id, $red) {
        $check = $this->session->userdata('userMember');
        if(!empty($check)) {
            $x = $this->data->fetch('offers', array('id' => $id));
            if($x[0]['user_id'] == $check[0]['id']) {
                $this->data->delete(array('id' => $id), "offers");
            }
            if($red == "same") {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }else{
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    
    public function deleteimages($id){
        $check = $this->session->userdata("userMember");
        if(!empty($check)){
            $this->data->delete(array('id'=>$id),"productservices");
            if ($red = "same") {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            } else {
                redirect("home/view/" . $red, "refresh");
            }
        }
    }
    
    public function seenUpdate(){
        $check = $this->session->userdata("userMember");
        $data = $this->input->post();
        if(!empty($check)){
            $this->data->update(array('id' => $data['id']), 'prayerRequestReply', array('seen' => '1'));
        }
    }
    
    public function changeNotifsS(){

        $check = $this->session->userdata("userMember");
        if(!empty($check)){
            $data = $this->input->post();
            $x = array(
                "post_id"=>$data['id'],
                "user_id"=>$check[0]['id'],
                "post_type"=>$data['table']
            );
            $a = $this->data->fetch("notifs",$x);
            if(empty($a)){

                $this->data->insert("notifs",$x);
            }else{
                $this->data->delete($x,"notifs");
            }
        }
    }
    
    public function deleteChatEntire($id){
        $check = $this->session->userdata("userMember");
        if(!empty($check)){

        }
    }
    
    public function deleteChildFromProfile($id){
        $check = $this->session->userdata("userMember");
        if(!empty($check)){
            $x = $this->data->fetch("children",array('id' => $id,'parent_id'=>$check[0]['id']));
            if(!empty($x)){
                $this->data->delete(array('id' => $id), "children");
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    
    public function sendEmailForBusinessPage(){
        $data = $this->input->post();
        $email = $this->data->fetch("business",array('id'=>$data['id']));
        unset($data['id']);
        $x = file_get_contents(site_url('home/emailforB'));
        $msg = "<p>You received a query from your business page</p>";
        foreach($data as $k=>$v){
            $msg .= "<p><strong>".$k.":</strong>".$v."</p>";
        }
        $x = str_replace("{{msg}}",$msg,$x);
        echo $x;

        $sub = "Membership Management System";
        $to = $email[0]['email'];
        $this->sendMail($x,$sub,$to);
    }
    
    public function emailforB(){
        $this->load->view('emailforB');
    }
    
    public function emailForEvent(){
        $this->load->view('emailForEvent');
    }
    
    public function acceptOffer($id){
        $check = $this->session->userdata('userMember');
        $status = $this->uri->segment(5);
        if (!empty($check)) {
            $again = $this->data->fetch('offers',array('id'=>$id,'client_id'=>$check[0]['id']));
            if(!empty($again)){
                if($status == "accepted"){
                    $this->data->update(array('id'=>$id,'client_id'=>$check[0]['id']),'offers',array('status'=>$status, 'acceptedDate' => date('Y-m-d H:i:s')));
                }else{
                    $this->data->update(array('id'=>$id,'client_id'=>$check[0]['id']),'offers',array('status'=>$status));
                }
            }
            if($status == 'rejected'){
                $email = $this->data->fetch('member', array('id' => $again[0]['user_id'], 'status' => 'active'));
                $otherParty = $this->data->fetch('member', array('id' => $check[0]['id'], 'status' => 'active'));
                $sub = "Membership Management System";
                $x = file_get_contents(site_url('home/emailforB'));
                $msg = "Your offer has been rejected by ".$otherParty[0]['fname'].".";
                $x = str_replace("{{msg}}", $msg, $x);
                //echo $x;
                if($email[0]['emailSub']){
                    $to = $email[0]['email'];
                    $this->sendMail($x, $sub, $to);
                }
                $this->data->insert('message', array('from' => $check[0]['id'], 'to' => $again[0]['user_id'], 'messages' => 'Offer '.$again[0]['desc'].' is Rejected.'));
            }else if($status == "accepted"){
                $email = $this->data->fetch('member', array('id' => $again[0]['user_id'], 'status' => 'active'));
                $otherParty = $this->data->fetch('member', array('id' => $check[0]['id'], 'status' => 'active'));
                $sub = "Membership Management System";
                $x = file_get_contents(site_url('home/emailforB'));
                $msg = "Your offer has been accepted by ".$otherParty[0]['fname'].".";
                $x = str_replace("{{msg}}", $msg, $x);
                //echo $x;
                if($email[0]['emailSub']){
                    $to = $email[0]['email'];
                    $this->sendMail($x, $sub, $to);
                }
                $this->data->insert('message', array('from' => $check[0]['id'], 'to' => $again[0]['user_id'], 'messages' => 'Offer '.$again[0]['desc'].' is Accepted.'));
            }
        }
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    
    public function sendSMS($senderID, $number, $msgTxt){
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
        curl_close($curl);

        // print_r(curl_getinfo($curl));
        // $senderName= "RCCGVHL";
        // $msgTxt = str_replace(" ","%20",$msgTxt);
        // $url = "http://dstr.connectbind.com:8080/sendsms?username=BSL1-RCCGVHL1&password=rccgvhl1&type=0&dlr=1&destination=".$number."&source=".$senderName."&message=".$msgTxt;
            
        // $curl = curl_init();
        //     curl_setopt_array($curl, array(
        //       CURLOPT_URL => $url,
        //       CURLOPT_RETURNTRANSFER => true,
        //       CURLOPT_ENCODING => "",
        //       CURLOPT_MAXREDIRS => 10,
        //       CURLOPT_TIMEOUT => 30,
        //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //       CURLOPT_CUSTOMREQUEST => "GET",
        //     ));
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        
        // curl_close($curl);
        
        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
          
        // }
    }
}

/**
 * Hello Instagram.
 * My application for tutormanager.co.uk will use the instagram API to create
 * tutormanager.co.uk usability more friendly and attractive. My app allows
 * people to login with Instagram and share their own content so other members
 * can see and interact within my platform which is TutorManager.co.uk.
 * Moreover the members can also search for oither users or search for tags
 * from instagram within Tutormanager.co.uk
 *
 * Just like any social media website 'TutorManager' is an online platform bringing
 * users closer. At 'TutorManager' we focused on Mentors and Mentee specifically.
 * The website is like a mixture of "social media" and "Online Teaching".
 * At TutorManager a Mentee can interact with other Tutors and like or comment their posts.
 * Moreover they can get advises, trainings and counselling by other Tutors.
 *
 *
 * Integrating Instagram into TutorManager can benefits its users by login directly form Instagram
 * By integrating Instagram 'TutorManager' can also take benefits by accessing public content and manage right audience
 *
 *
 * To Compare your share of voice to the competition’s.
 * To use social data to analyze my campaign success
 * To Track how the conversation around my brand is shifting over time.
 * Who is talking about my brand and what are they saying
 * How do people feel about a brand, and how do they talk about it on social media?
 *
 */

/**

  ALTER TABLE `groupdisc` ADD `falseusers` TEXT NOT NULL AFTER `attachments`;

  ALTER TABLE `a_m_chat` ADD `attachment` VARCHAR(535) NOT NULL AFTER `notification`;

*/

