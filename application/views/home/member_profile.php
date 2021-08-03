        <?php foreach ($profile as $key): ?>
        <div class="cover--header pt--80 text-center" data-bg-img="<?php echo base_url('assets/');?>img/profile_banner.jpg" data-overlay="0.6" data-overlay-color="white">
            <div class="container">
                <div class="cover--avatar <?php if($key->status='active'):echo 'online';else:echo 'offline';endif;?>" data-overlay="0.3" data-overlay-color="primary">
                    <img src="<?php if(!empty($key->photo)):echo base_url().$key->photo;else:echo base_url('assets/img/cover-header-img/avatar-01.jpg');endif;?>" alt="Profile Picture">
                </div>

                <div class="cover--user-name">
                    <h2 class="h3 fw--600"><?php echo $key->name; ?><a href="<?php echo base_url('home/edit_profile/'.$key->id);?>" title="Update Profile"><i class="ml--10 text-primary fa fa-edit"></i></a></h2>
                </div>

                <div class="cover--user-activity">
                    <p><i class="fa mr--8 fa-clock-o"></i><?php echo $key->status; ?></p>
                </div>

                <div class="cover--user-desc fw--400 fs--18 fstyle--i text-darkest">
                    <p><?php if(!empty($key->short_bio)):echo $key->short_bio;else:echo 'Short bio not updated yet';endif; ?></p>
                </div>
                <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success" style="padding:10px!important;"><?php echo $this->session->flashdata('msg');?></div>
                <?php endif;?>
            </div>
        </div>
        <section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8 pb--60" data-trigger="stickyScroll">
                        <div class="main--content-inner drop--shadow">
                            <!-- Content Nav Start -->
                            <div class="content--nav pb--30">
                                <ul class="nav ff--primary fs--14 fw--500 bg-lighter">
                                    <li><a href="member-activity-personal.html">Activity</a></li>
                                    <li class="active"><a href="member-profile.html">Profile</a></li>
                                    <li><a href="member-friends.html">Friends</a></li>
                                    <li><a href="member-groups.html">Groups</a></li>
                                    <li><a href="member-forum-topics.html">Forum</a></li>
                                    <li><a href="member-media-all.html">Media</a></li>
                                </ul>
                            </div>
                            <div class="profile--details fs--14">
                                <!-- Profile Item Start -->
                                <div class="profile--item">
                                    <div class="profile--heading">
                                        <h3 class="h4 fw--700">
                                            <span class="mr--4">About Me</span>
                                            <i class="ml--10 text-primary fa fa-caret-right"></i>
                                        </h3>
                                    </div>

                                    <div class="profile--info">
                                        <table class="table">
                                            <tr>
                                                <th class="fw--700 text-darkest">Full Name</th>
                                                <td><a href="#" class="btn-link"><?php echo $key->name; ?></a></td>
                                            </tr>
                                            <tr>
                                                <th class="fw--700 text-darkest">Skill</th>
                                                <td><?php if(!empty($key->skills)):echo $key->skills;else:echo "Skills not updated yet";endif; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="fw--700 text-darkest">Date of Birth</th>
                                                <td><?php if(!empty($key->dob)):echo $key->dob;else:echo "Date of Birth not updated yet.";endif; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="profile--item">
                                    <div class="profile--heading">
                                        <h3 class="h4 fw--700">
                                            <span class="mr--4">Biography</span>
                                            <i class="ml--10 text-primary fa fa-caret-right"></i>
                                        </h3>
                                    </div>

                                    <div class="profile--info">
                                        <p><?php if(!empty($key->long_bio)):echo $key->long_bio;else:echo "Biography not updated yet.";endif; ?></p>
                                    </div>
                                </div>
                                <!-- <div class="profile--item">
                                    <div class="profile--heading">
                                        <h3 class="h4 fw--700">
                                            <span class="mr--4">Work Experience</span>
                                            <i class="ml--10 text-primary fa fa-caret-right"></i>
                                        </h3>
                                    </div>

                                    <div class="profile--info">
                                        <dl>
                                            <dt>
                                                <p class="h6 fw--700 text-darkest">Graphic Designer 2010 - 2012</p>
                                                <p><small class="fw--400 fs--12 text-darker">Graphicriver.net at Sydney</small></p>
                                            </dt>
                                            <dd>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour which don't look even slightly believable.</p>
                                            </dd>

                                            <dt>
                                                <p class="h6 fw--700 text-darkest">Font-End Developer 2012 - 2014</p>
                                                <p><small class="fw--400 fs--12 text-darker">Themeforest.net at Australia</small></p>
                                            </dt>
                                            <dd>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour which don't look even slightly believable.</p>
                                            </dd>

                                            <dt>
                                                <p class="h6 fw--700 text-darkest">Web Developer 2014 - Still Now</p>
                                                <p><small class="fw--400 fs--12 text-darker">Codecanyon.net at Sydney</small></p>
                                            </dt>
                                            <dd>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour which don't look even slightly believable.</p>
                                            </dd>
                                        </dl>
                                    </div>
                                </div> -->
                                <div class="profile--item">
                                    <div class="profile--heading">
                                        <h3 class="h4 fw--700">
                                            <span class="mr--4">Contact</span>
                                            <i class="ml--10 text-primary fa fa-caret-right"></i>
                                        </h3>
                                    </div>

                                    <div class="profile--info">
                                        <table class="table">
                                            <tr>
                                                <th class="fw--700 text-darkest">Phone</th>
                                                <td><a href="tel:<?php echo $key->mobno; ?>"><?php echo $key->mobno; ?></a></td>
                                            </tr>
                                            <tr>
                                                <th class="fw--700 text-darkest">E-mail</th>
                                                <td><a href="mailto:<?php echo $key->email; ?>"><span class="__cf_email__"><?php echo $key->email; ?></span></a></td>
                                            </tr>
                                            <!-- <tr>
                                                <th class="fw--700 text-darkest">Website</th>
                                                <td><a href="#">example.com</a></td>
                                            </tr> -->
                                            <tr>
                                                <th class="fw--700 text-darkest">Address</th>
                                                <td><?php echo $key->address; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main--sidebar col-md-4 pb--60" data-trigger="stickyScroll">
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Find A Buddy</h2>
                            <div class="buddy-finder--widget">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">I Am</span>

                                                    <select name="gender" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Looking For</span>

                                                    <select name="lookingfor" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="female">Female</option>
                                                        <option value="male">Male</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Age</span>

                                                    <select name="age" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="18to25">18 to 25</option>
                                                        <option value="25to30">25 to 30</option>
                                                        <option value="30to35">30 to 35</option>
                                                        <option value="35to40">35 to 40</option>
                                                        <option value="40plus">40+</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">City</span>

                                                    <select name="city" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="newyork">New York</option>
                                                        <option value="California">California</option>
                                                        <option value="Atlanta">Atlanta</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Filter Country</span>

                                                    <select name="city" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="unitedstates">United States</option>
                                                        <option value="australia">Australia</option>
                                                        <option value="turkey">Turkey</option>
                                                        <option value="vietnam">Vietnam</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Notice</h2>
                            <div class="text--widget">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some  look even slightly believable.</p>
                            </div>
                        </div>
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Forums</h2>
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="sub-forums.html">User Interface Design<span>(12)</span></a></li>
                                    <li><a href="sub-forums.html">Front-End Engineering<span>(07)</span></a></li>
                                    <li><a href="sub-forums.html">Web Development<span>(37)</span></a></li>
                                    <li><a href="sub-forums.html">Social Media Marketing<span>(13)</span></a></li>
                                    <li><a href="sub-forums.html">Content Marketing<span>(28)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Archives</h2>
                            <div class="nav--widget">
                                <ul class="nav">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="text">Jan - July 2017</span>
                                            <span class="count">(86)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="text">Jan - Dce 2016</span>
                                            <span class="count">(328)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="text">Jan - Dec 2015</span>
                                            <span class="count">(427)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Advertisements</h2>
                            <div class="ad--widget">
                                <a href="#">
                                    <img src="img/widgets-img/ad.jpg" alt="" class="center-block">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endforeach ?>