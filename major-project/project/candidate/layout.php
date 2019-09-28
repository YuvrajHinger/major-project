<?php
    function head(){                                    ?>
        <script type="application/x-javascript"> 
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
            function hideURLbar(){ window.scrollTo(0,1); } 
        </script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/jquery-ui.css"> 
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/morris.css" type="text/css"/>
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<script src="js/jquery-2.1.4.min.js"></script>
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' /> <?php
    }                                                                        
    function sidebar(){                         ?>
        <div class="sidebar-menu">
			<header class="logo1">
				<a onclick="toggleSideBar()" class="sidebar-icon"> 
                    <span class="fa fa-bars"></span> 
                </a> 
			</header>
			<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
            <div class="menu">
                <ul id="menu" >
                    <li>
                        <a href="index.php">
                            <i class="fa fa-tachometer"></i> 
                            <span>Dashboard</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>																		                     
                    <li id="menu-academico" >
                        <a onclick="alert('working soon')">
                            <i class="fa fa-th-list" aria-hidden="true"></i>
                            <span> Examination</span>                             
                            <div class="clearfix"></div>
                        </a>					    
					</li>										 				    
					<li>
                        <a onclick="alert('working soon')">
                            <i class="fa fa-asterisk"></i>  
                            <span>Exam Results</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>									
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i>  
                            <span>Log-Out</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>									
				</ul>
		    </div>		
		    <div class="clearfix"></div>		
		</div>          <?php
    }
    function script(){  ?>
        <script>
            window.onload = function() {
		        history.replaceState("", "", "");
	        }   	
            var toggle = true;										
            function toggleSideBar(){
                if (toggle){
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position":"absolute"});
                }
                else{
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function() {
                        $("#menu span").css({"position":"relative"});
                    }, 400);
                }								
                toggle = !toggle;
            }                        
        </script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/bootstrap.min.js"></script>  <?php
    }   