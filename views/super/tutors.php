<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#">Tutors</a></li>
                </ul>
            </div>
        </div>
        <section class="panel">
            <header class="panel-heading">
                Search Tutors
            </header>
            <div class="panel-body">
                <form class="form-horizontal search-result">
                    <div class="form-group">
                        <label class="col-lg-1 col-sm-1 control-label">Search</label>
                        <div class="col-lg-6 col-sm-6">
                            <input type="text" name="q" class="form-control input-xxlarge">
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <select name="type" id="" class="form-control">
                                <option value="name">Name</option>
                                <option value="postal">Postal</option>
                                <option value="subject">Subject</option>
                                <option value="city">Tutor City</option>
                                <option value="job">Job No</option>
                                <option value="email">Email</option>
                                <option value="number">Telephone Number</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn" type="submit">SEARCH</button>
                        </div>
                    </div>
                </form>
                <a href="create_tutor.php"><span class="btn btn-info">Add Tutor</span></a>
            </div>
        </section>
        <div class="directory-info-row">
            <div class="row">
                <?php if(empty($tutors)){ ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="media">
                                    <h1>No Data Found</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <?php foreach($tutors as $k=>$v){ ?>
                        <div class="col-md-6 col-sm-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="media">
                                        <a class="pull-left" href="<?= site_url('super/tutor')."/".$v['id'] ?>">
                                            <?php $image = (empty($v['profile_pic'])) ? base_url('assets_f/img/tutor.png') : base_url().$v['profile_pic'] ; ?>
                                            <img style="width:175px;" class="thumb media-object" src="<?= $image; ?>" alt="">
                                        </a>
                                        <div class="media-body">
                                            <a href="<?= site_url('super/tutor')."/".$v['id'] ?>">
                                                <h4><?= $v['name'] ?>
                                                    <span class="text-muted small"> - Tutor</span>
                                                </h4>
                                            </a>
                                            <div class="dropdown pull-right">
                                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1<?= $v['id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <?php $s = ($v['status'] == 'active') ? "suspend" : 'active' ; ?>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1<?= $v['id'] ?>">
                                                    <li><a href="<?= site_url('super/status').'/'.$v['id'].'/'.$s; ?>"><?= ucfirst($s) ?></a></li>
                                                    <li class="divider"></li>
                                                    <li><a onclick="deleteTutorSuper(<?= $v['id'] ?>)">Delete</a></li>
                                                </ul>
                                            </div>
                                            <table>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td><?= $v['contacts'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?= $v['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Expertise Area</th>
                                                    <td><?= $v['tutor_expertise'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Subject Covered</th>
                                                    <td><?= $v['subjects'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td><?= $v['status'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
</section>
<div id="deleteTutor"></div>