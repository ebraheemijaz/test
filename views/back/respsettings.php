<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>/admin"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">SMS Settings</header>
                    <div class="panel-body">
                        <br/>
                        <p>
                            <span style="font-weight: bold">Short Tags:</span>
                            <br/>
                            {name} = placeholder for name
                            {activationLink} = placeholder for activationLink
                            {username} = placeholder for Username
                            {password} = placeholder for Password
                        </p>
                        <?= form_open('admin/update/1/details/respsettings',array("class"=>"form-horizontal")) ?>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Prayer Request Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="p_request" class="form-control" rows="4"><?= $detailsss[0]['p_request'] ?></textarea>
                                <div> <span id="textLe4"><?php if(!empty($detailsss[0]['p_request'])){ echo strlen($detailsss[0]['p_request']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="pRequestCount"><?php if(!empty($detailsss[0]['p_request'])){echo 2 * ceil(strlen($detailsss[0]['p_request']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=p_request]").keyup(function(){
                                var a = $("[name=p_request]").val();
                                // $("[name=p_request]").val(a.substring(0,320));
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe4").html(lenght);
                                $('#pRequestCount').html(2 * parseInt(count));
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Mempacas First Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="mempacasFirst" class="form-control" rows="4"><?= $detailsss[0]['mempacasFirst'] ?></textarea>
                                <div><span id="mempacasLe"><?php if(!empty($detailsss[0]['mempacasFirst'])){ echo strlen($detailsss[0]['mempacasFirst']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="mempacasFirstCount"><?php if(!empty($detailsss[0]['mempacasFirst'])){echo 2 * ceil(strlen($detailsss[0]['mempacasFirst']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                            <script>
                                $("[name=mempacasFirst]").keyup(function() {
                                    var a = $("[name=mempacasFirst]").val();
                                    length = a.length;
                                    count = Math.ceil(length / 160);
                                    $('#mempacasLe').html(length);
                                    $('#mempacasFirstCount').html(2 * parseInt(count));
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Mempacas Second Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="mempacasSecond" class="form-control" rows="4"><?= $detailsss[0]['mempacasSecond'] ?></textarea>
                                <div><span id="mempacasSecLe"><?php if(!empty($detailsss[0]['mempacasSecond'])){ echo strlen($detailsss[0]['mempacasSecond']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="mempacasSecondCount"><?php if(!empty($detailsss[0]['mempacasSecond'])){echo 2 * ceil(strlen($detailsss[0]['mempacasSecond']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                            <script>
                                $("[name=mempacasSecond]").keyup(function() {
                                    var a = $("[name=mempacasSecond]").val();
                                    length = a.length;
                                    count = Math.ceil(length / 160);
                                    $('#mempacasSecLe').html(length);
                                    $('#mempacasSecondCount').html(2 * parseInt(count));
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Attendance First Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="attendanceFirstMsg" class="form-control" rows="4"><?= $detailsss[0]['attendanceFirstMsg'] ?></textarea>
                                <div><span id="attendanceFirstLe"><?php if(!empty($detailsss[0]['attendanceFirstMsg'])){ echo strlen($detailsss[0]['attendanceFirstMsg']); }else{ ?>0<?php } ?></span>/160 </div>
                                <div>SMS Credit : <span id="attendanceFirstCount"><?php if(!empty($detailsss[0]['attendanceFirstMsg'])){ echo 2 * ceil(strlen($detailsss[0]['attendanceFirstMsg']) / 160); }else{ echo '0'; } ?></span></div>
                            </div>
                            <script>
                                $("[name=attendanceFirstMsg]").keyup(function() {
                                    var a = $("[name=attendanceFirstMsg]").val();
                                    length = a.length;
                                    count = Math.ceil(length / 160);
                                    $('#attendanceFirstLe').html(length);
                                    $('#attendanceFirstCount').html(2 * parseInt(count));
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Attendance Second Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="attendanceSecondMsg" class="form-control" rows="4"><?= $detailsss[0]['attendanceSecondMsg'] ?></textarea>
                                <div><span id="attendanceSecondLe"><?php if(!empty($detailsss[0]['attendanceSecondMsg'])){ echo strlen($detailsss[0]['attendanceSecondMsg']); }else{ ?>0<?php } ?></span>/160 </div>
                                <div>SMS Credit : <span id="attendanceSecondCount"><?php if(!empty($detailsss[0]['attendanceSecondMsg'])){ echo 2 * ceil(strlen($detailsss[0]['attendanceSecondMsg']) / 160); }else{ echo '0'; } ?></span></div>
                            </div>
                            <script>
                                $("[name=attendanceSecondMsg]").keyup(function() {
                                    var a = $("[name=attendanceSecondMsg]").val();
                                    length = a.length;
                                    count = Math.ceil(length / 160);
                                    $('#attendanceSecondLe').html(length);
                                    $('#attendanceSecondCount').html(2 * parseInt(count));
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Birthday Greetings</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="b_day" class="form-control" rows="4"><?= $detailsss[0]['b_day'] ?></textarea>
                                <div> <span id="textLe"><?php if(!empty($detailsss[0]['b_day'])){ echo strlen($detailsss[0]['b_day']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="bDayCount"><?php if(!empty($detailsss[0]['b_day'])){echo 2 * ceil(strlen($detailsss[0]['b_day']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=b_day]").keyup(function(){
                                var a = $("[name=b_day]").val();
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe").html(lenght);
                                $('#bDayCount').html(2 * parseInt(count));

                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>First Response SMS to First Timer</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="first_resp" class="form-control" rows="4"><?= $detailsss[0]['first_resp'] ?></textarea>
                                <div> <span id="textLe2"><?php if(!empty($detailsss[0]['first_resp'])){ echo strlen($detailsss[0]['first_resp']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="firstCount"><?php if(!empty($detailsss[0]['first_resp'])){echo 2 * ceil(strlen($detailsss[0]['first_resp']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=first_resp]").keyup(function(){
                                var a = $("[name=first_resp]").val();
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe2").html(lenght);
                                $('#firstCount').html(2 * parseInt(count));
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Second Response SMS to First Timer</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="second_resp" class="form-control" rows="4"><?= $detailsss[0]['second_resp'] ?></textarea>
                                <div> <span id="textLe3"><?php if(!empty($detailsss[0]['second_resp'])){ echo strlen($detailsss[0]['second_resp']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="secondCount"><?php if(!empty($detailsss[0]['second_resp'])){echo 2 * ceil(strlen($detailsss[0]['second_resp']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=second_resp]").keyup(function(){
                                var a = $("[name=second_resp]").val();
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe3").html(lenght);
                                $('#secondCount').html(2 * parseInt(count));
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>First Timer Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="first_timer" class="form-control" rows="4"><?= $detailsss[0]['first_timer'] ?></textarea>
                                <div> <span id="textLe5"><?php if(!empty($detailsss[0]['first_timer'])){ echo strlen($detailsss[0]['first_timer']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="firstTimerCount"><?php if(!empty($detailsss[0]['first_timer'])){echo 2 * ceil(strlen($detailsss[0]['first_timer']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=first_timer]").keyup(function(){
                                var a = $("[name=first_timer]").val();
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe5").html(lenght);
                                $('#firstTimerCount').html(2 * parseInt(count));
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Registration Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="registration_msg" class="form-control" rows="4"><?= $detailsss[0]['registration_msg'] ?></textarea>
                                <div> <span id="textLe5"><?php if(!empty($detailsss[0]['registration_msg'])){ echo strlen($detailsss[0]['registration_msg']); }else{ ?>0<?php } ?></span>/160  </div>
                                <div>SMS Credit : <span id="registrationMsg"><?php if(!empty($detailsss[0]['registration_msg'])){echo 2 * ceil(strlen($detailsss[0]['registration_msg']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=registration_msg]").keyup(function(){
                                var a = $("[name=registration_msg]").val();
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe5").html(lenght);
                                $('#registrationMsg').html(2 * parseInt(count));
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-2">
                                <strong>Add Mempacas Member Message</strong>
                            </div>
                            <div class="col-md-10">
                                <textarea cols="30" name="addMempacasMember_msg" class="form-control" rows="4"><?= $detailsss[0]['addMempacasMember_msg'] ?></textarea>
                                <div><span id="textLe6"><?php if(!empty($detailsss[0]['addMempacasMember_msg'])){ echo strlen($detailsss[0]['addMempacasMember_msg']); }else{ ?>0<?php } ?></span>/160 </div>
                                <div>SMS Credit : <span id="addMempacasMember"><?php if(!empty($detailsss[0]['addMempacasMember_msg'])){ echo 2 * ceil(strlen($detailsss[0]['addMempacasMember_msg']) / 160);}else{ echo '0'; } ?></span></div>
                            </div>
                        </div>
                        <script>
                            $("[name=addMempacasMember_msg]").keyup(function(){
                                var a = $("[name=addMempacasMember_msg]").val();
                                lenght = a.length;
                                count = Math.ceil(lenght/160);
                                $("#textLe6").html(lenght);
                                $('#addMempacasMember').html(2 * parseInt(count));
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2 ">
                                <p>Note: The first and second response sms should be a message which further welcomes your first timers and asking them on how they are settling in well. Please limit your content to 160 characters</p>
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
