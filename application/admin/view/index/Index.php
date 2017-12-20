<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Visual Admin Dashboard - Manage Users</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
<!--    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>-->
    <link href="<?php echo STATIC_PATH;?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo STATIC_PATH;?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo STATIC_PATH;?>css/templatemo-style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>  
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <h1>Visual Admin</h1>
        </header>
        <div class="profile-photo-container">
          <img src="<?php echo STATIC_PATH;?>images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="index.html" class="active"><i class="fa fa-home fa-fw"></i>功能列表</a></li>
            <li><a href="<?php echo DOMAIN_NAME.'admin/index/addFunction'?>"><i class="fa fa-bar-chart fa-fw"></i>增加功能</a></li>
            <li><a href="data-visualization.html"><i class="fa fa-database fa-fw"></i>Data Visualization</a></li>
            <li><a href="maps.html"><i class="fa fa-map-marker fa-fw"></i>Maps</a></li>
            <li><a href="#" ><i class="fa fa-users fa-fw"></i>Manage Users</a></li>
            <li><a href="preferences.html"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
            <li><a href="login.html"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
          
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>
                    <td><a href="" class="white-text templatemo-sort-by">序号<span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">功能名称 <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">功能描述 <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">路径<span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">删除<span class="caret"></span></a></td>
                
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data as $key=>$value){?>  
                  <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $value['function_name']?></td>
                    <td><?php echo $value['function_desc']?></td>
                    <td><a target="_black" href="<?php echo $value['function_url']?>" class="templatemo-edit-btn"><?php echo $value['function_url']?></a></td>
                    <td><a href="" class="templatemo-link">Delete</a></td>
                  </tr>  
                  <?php }?>
                </tbody>
              </table>    
            </div>                          
          </div>          
          
          
                   
                  
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script>
      $(document).ready(function(){
        // Content widget with background image
        var imageUrl = $('img.content-bg-img').attr('src');
        $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
        $('img.content-bg-img').hide();        
      });
    </script>
  </body>
</html>