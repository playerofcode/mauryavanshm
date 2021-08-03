<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mauryavanshm</title>
    <meta name="author" content="ThemeLooks">
    <meta name="description" content="Multipurpose Social Network HTML5 Template">
    <meta name="keywords" content="social media, social network, forum, shop, bootstrap, html5, css3, template, responsive, retina ready">
    <link rel="icon" href="<?php echo base_url('assets/img/');?>favicon.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/plugins.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/');?>style.css">
    <link rel="stylesheet" href="css/responsive-style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/colors/color-1.css" id="changeColorScheme">
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/custom.css">
</head>
<body>
    <div id="preloader">
        <div class="preloader--inner"></div>
    </div>
    <div class="wrapper">
        <header class="header--section style--3">
            <div class="header--topbar bg-dark">
                <div class="container">
                    <ul class="header--topbar-links nav ff--primary no--stripes float--left">
                        <li><a href="<?php echo base_url('home/blog'); ?>">Blog</a></li>
                        <li><a href="<?php echo base_url('home/faq'); ?>">FAQ</a></li>
                        <li><a href="<?php echo base_url('home/contact'); ?>">Contact</a></li>
                    </ul>
                    <ul class="header--topbar-links nav ff--primary float--right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span>En</span>
                                <i class="fa fa-caret-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="active"><a href="#">En</a></li>
                                <li><a href="#">Bn</a></li>
                                <li><a href="#">In</a></li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="cart.html" title="Cart" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="badge">3</span>
                            </a>
                        </li> -->
                        <?php if($this->session->userdata('email')): ?>
                        <li>
                            <a href="<?php echo base_url('home/member_profile');?>" class="btn-link" >
                                <i class="fa fa-user-o"></i> &nbsp;&nbsp;My Account
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('home/logout');?>" class="btn-link" >
                                Logout
                            </a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#" class="btn-link" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Sign Up/Login
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="header--navbar navbar bg-default" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle style--3 collapsed" data-toggle="collapse" data-target="#headerNav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header--navbar-logo navbar-brand">
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url('assets/');?>img/logo-black.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="header--search style--2 float--right" data-form="validate">
                        <form action="#">
                            <input type="text" name="search" placeholder="I’m looking for..." class="form-control" required>
                            <button type="submit" class="btn-link"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <ul class="header--nav-links style--3 nav ff--primary">
                            <li><a href="<?php echo base_url();?>"><span>Home</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Community</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('home/activity');?>"><span>Activity</span></a></li>
                                    <li><a href="<?php echo base_url('home/members');?>"><span>Members</span></a></li>
                                    <li><a href="<?php echo base_url('home/groups');?>"><span>Groups</span></a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>BBPress</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('home/forums');?>">Forums</a></li>
                                    <li><a href="<?php echo base_url('home/sub_forums');?>">Sub Forums</a></li>
                                    <li><a href="<?php echo base_url('home/topics');?>">Topics</a></li>
                                    <li><a href="<?php echo base_url('home/topic_replies');?>">Topic Replies</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('home/blog');?>"><span>Blog</span></a></li>
                            <li><a href="<?php echo base_url('home/contact');?>"><span>Contact</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">User Register</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('home/auth');?>" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  id="email" name="email" placeholder="Enter Email" class="form-control" />
            </div>  
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" />
            </div>
        
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('home/register');?>" style="float: left;">Don't have an account</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
