
<header class="site-header">
  <div class="container-fluid"> <a href="#" class="site-logo"> <img class="hidden-md-down" src="img/logo-2.png" alt=""> <img class="hidden-lg-up" src="img/logo-2-mob.png" alt=""> </a>
    <button id="show-hide-sidebar-toggle" class="show-hide-sidebar"> <span>toggle menu</span> </button>
    <button class="hamburger hamburger--htla"> <span>toggle menu</span> </button>
    <div class="site-header-content">
      <div class="site-header-content-in">
        <div class="site-header-shown">
          <!--<div class="dropdown dropdown-notification notif"> <a href="#"

	                           class="header-alarm dropdown-toggle active"

	                           id="dd-notification"

	                           data-toggle="dropdown"

	                           aria-haspopup="true"

	                           aria-expanded="false"> <i class="font-icon-alarm"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
              <div class="dropdown-menu-notif-header"> Notifications <span class="label label-pill label-danger">4</span> </div>
              <div class="dropdown-menu-notif-list">
                <div class="dropdown-menu-notif-item">
                  <div class="photo"> <img src="img/photo-64-1.jpg" alt=""> </div>
                  <div class="dot"></div>
                  <a href="#">Morgan</a> was bothering about something
                  <div class="color-blue-grey-lighter">7 hours ago</div>
                </div>
                <div class="dropdown-menu-notif-item">
                  <div class="photo"> <img src="img/photo-64-2.jpg" alt=""> </div>
                  <div class="dot"></div>
                  <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
                  <div class="color-blue-grey-lighter">7 hours ago</div>
                </div>
                <div class="dropdown-menu-notif-item">
                  <div class="photo"> <img src="img/photo-64-3.jpg" alt=""> </div>
                  <div class="dot"></div>
                  <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
                  <div class="color-blue-grey-lighter">7 hours ago</div>
                </div>
                <div class="dropdown-menu-notif-item">
                  <div class="photo"> <img src="img/photo-64-4.jpg" alt=""> </div>
                  <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
                  <div class="color-blue-grey-lighter">7 hours ago</div>
                </div>
              </div>
              <div class="dropdown-menu-notif-more"> <a href="#">See more</a> </div>
            </div>
          </div>-->
          <?php /*?><div class="dropdown dropdown-notification messages"> <a href="#"

	                           class="header-alarm dropdown-toggle active"

	                           id="dd-messages"

	                           data-toggle="dropdown"

	                           aria-haspopup="true"

	                           aria-expanded="false"> <i class="font-icon-mail"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
              <div class="dropdown-menu-messages-header">
                <ul class="nav" role="tablist">
                  <li class="nav-item"> <a class="nav-link active"

	                                           data-toggle="tab"

	                                           href="#tab-incoming"

	                                           role="tab"> Inbox <span class="label label-pill label-danger">8</span> </a> </li>
                  <li class="nav-item"> <a class="nav-link"

	                                           data-toggle="tab"

	                                           href="#tab-outgoing"

	                                           role="tab">Outbox</a> </li>
                </ul>
                
                <!--<button type="button" class="create">

	                                    <i class="font-icon font-icon-pen-square"></i>

	                                </button>--> 
                
              </div>
              <div class="tab-content">
                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                  <div class="dropdown-menu-messages-list"> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span> <span class="mess-item-name">Tim Collins</span> <span class="mess-item-txt">Morgan was bothering about something!</span> </a> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span> <span class="mess-item-name">Christian Burton</span> <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span> </a> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span> <span class="mess-item-name">Tim Collins</span> <span class="mess-item-txt">Morgan was bothering about something!</span> </a> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span> <span class="mess-item-name">Christian Burton</span> <span class="mess-item-txt">Morgan was bothering about something...</span> </a> </div>
                </div>
                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
                  <div class="dropdown-menu-messages-list"> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span> <span class="mess-item-name">Christian Burton</span> <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span> </a> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span> <span class="mess-item-name">Tim Collins</span> <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span> </a> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span> <span class="mess-item-name">Christian Burtons</span> <span class="mess-item-txt">Morgan was bothering about something!</span> </a> <a href="#" class="mess-item"> <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span> <span class="mess-item-name">Tim Collins</span> <span class="mess-item-txt">Morgan was bothering about something!</span> </a> </div>
                </div>
              </div>
              <div class="dropdown-menu-notif-more"> <a href="#">See more</a> </div>
            </div>
          </div><?php */?>
          <div class="dropdown user-menu">
            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="img/avatar-2-64.png" alt=""> <?php echo $_SESSION['username']?></button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu"> <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a> <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a> <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo SERVER_ROOT."/cm/home/?act=do_logout";?>"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a> </div>
          </div>
          <button type="button" class="burger-right"> <i class="font-icon-menu-addl"></i> </button>
        </div>
        
        <!--.site-header-shown-->
        
        <div class="mobile-menu-right-overlay"></div>
        <div class="site-header-collapsed">
          <div class="site-header-collapsed-in">
            <div class="dropdown dropdown-typical">
              <div class="dropdown-menu" aria-labelledby="dd-header-sales"> <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a> </div>
            </div>
            <!--<div class="dropdown dropdown-typical"> <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="font-icon font-icon-cogwheel"></span> <span class="lbl">Marketing automation</span> </a>
              <div class="dropdown-menu" aria-labelledby="dd-header-marketing"> <a class="dropdown-item" href="#">Current Search</a> <a class="dropdown-item" href="#">Search for Issues</a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-header">Recent issues</div>
                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
                <div class="dropdown-more">
                  <div class="dropdown-more-caption padding">more...</div>
                  <div class="dropdown-more-sub">
                    <div class="dropdown-more-sub-in"> <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a> <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a> </div>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Import Issues from CSV</a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-header">Filters</div>
                <a class="dropdown-item" href="#">My Open Issues</a> <a class="dropdown-item" href="#">Reported by Me</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Manage filters</a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-header">Timesheet</div>
                <a class="dropdown-item" href="#">Subscribtions</a> </div>
            </div>-->
            <!--<div class="help-dropdown">
              <button type="button"> <i class="font-icon font-icon-help"></i> </button>
              <div class="help-dropdown-popup">
                <div class="help-dropdown-popup-side">
                  <ul>
                    <li><a href="#">Getting Started</a></li>
                    <li><a href="#" class="active">Creating a new project</a></li>
                    <li><a href="#">Adding customers</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Importing data</a></li>
                    <li><a href="#">Exporting data</a></li>
                  </ul>
                </div>
                <div class="help-dropdown-popup-cont">
                  <div class="help-dropdown-popup-cont-in">
                    <div class="jscroll"> <a href="#" class="help-dropdown-popup-item"> Lorem Ipsum is simply <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span> </a> <a href="#" class="help-dropdown-popup-item"> Contrary to popular belief <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span> </a> <a href="#" class="help-dropdown-popup-item"> The point of using Lorem Ipsum <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span> </a> <a href="#" class="help-dropdown-popup-item"> Lorem Ipsum <span class="describe">There are many variations of passages of Lorem Ipsum available</span> </a> <a href="#" class="help-dropdown-popup-item"> Lorem Ipsum is simply <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span> </a> <a href="#" class="help-dropdown-popup-item"> Contrary to popular belief <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span> </a> <a href="#" class="help-dropdown-popup-item"> The point of using Lorem Ipsum <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span> </a> <a href="#" class="help-dropdown-popup-item"> Lorem Ipsum <span class="describe">There are many variations of passages of Lorem Ipsum available</span> </a> <a href="#" class="help-dropdown-popup-item"> Lorem Ipsum is simply <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span> </a> <a href="#" class="help-dropdown-popup-item"> Contrary to popular belief <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span> </a> <a href="#" class="help-dropdown-popup-item"> The point of using Lorem Ipsum <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span> </a> <a href="#" class="help-dropdown-popup-item"> Lorem Ipsum <span class="describe">There are many variations of passages of Lorem Ipsum available</span> </a> </div>
                  </div>
                </div>
              </div>
            </div>-->
            
            <!--.help-dropdown-->
            
            <!--<div class="site-header-search-container">
              <form class="site-header-search closed">
                <input type="text" placeholder="Search"/>
                <button type="submit"> <span class="font-icon-search"></span> </button>
                <div class="overlay"></div>
              </form>
            </div>-->
          </div>
          
          <!--.site-header-collapsed-in--> 
          
        </div>
        
        <!--.site-header-collapsed--> 
        
      </div>
      
      <!--site-header-content-in--> 
      
    </div>
    
    <!--.site-header-content--> 
    
  </div>
  
  <!--.container-fluid--> 
  
</header>

<!--.site-header--> 

