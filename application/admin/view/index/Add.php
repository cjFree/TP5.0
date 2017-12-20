<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Admin Dashboard - Preferences</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
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
            <li><a href="index.html"><i class="fa fa-home fa-fw"></i>功能列表</a></li>
            <li><a href="data-visualization.html"><i class="fa fa-bar-chart fa-fw"></i>增加功能</a></li>
            <li><a href="data-visualization.html"><i class="fa fa-database fa-fw"></i>Data Visualization</a></li>
            <li><a href="maps.html"><i class="fa fa-map-marker fa-fw"></i>Maps</a></li>
            <li><a href="manage-users.html"><i class="fa fa-users fa-fw"></i>Manage Users</a></li>
            <li><a href="#" class="active"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
            <li><a href="login.html"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Preferences</h2>
            <p>Here goes another form and form controls.</p>
            <form  class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">功能名称</label>
                    <input type="text" name="f_name" class="form-control" id="inputFirstName" placeholder="John">                  
                </div>
              </div>
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputUsername">功能描述</label>
                    <input type="text" name="f_desc" class="form-control" id="inputUsername" placeholder="Admin">                  
                </div>
                 
              </div>
              
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputNewPassword">访问地址</label>
                    <input type="text" name="f_url" class="form-control" id="inputNewPassword">
                </div>
                 
              </div>
              
              <div class="row form-group">
                <div class="col-lg-12 form-group"> 
                    
                    <?php foreach ($function_type as $key=>$val){?>
                    <div class="margin-right-15 templatemo-inline-block">
                        <input type="radio" name="f_type" id="r<?php echo $key;?>" value="<?php echo $key;?>">
                      <label for="r<?php echo $key;?>" class="font-weight-400"><span></span><?php echo $val;?></label>
                    </div>
                    <?php }?>
                </div>
              </div>
              
              <div class="form-group text-right">
                  <button type="submit" id="submit" class="templatemo-blue-button">提交</button>
            
              </div>                           
            </form>
          </div>
          <footer class="text-right">
            <p>Copyright &copy; 2084 Company Name 
            | More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
          </footer>
        </div>
      </div>
    </div>
  
    <!-- JS -->
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>js/templatemo-script.js"></script>        <!-- Templatemo Script -->
    <script>
           $(document).ready(function(){
               $("#submit").click(function(){
                  var name = $("input[name=f_name]").val();
                  var desc = $("input[name=f_desc]").val();
                  var f_url = $("input[name=f_url]").val();
                  var f_type = $("input[name=f_type]:checked").val();
                  $.ajax({
                      url:'http://127.0.0.2/index.php/admin/index/doadd',
                      type:'POST',
                      data:{'name':name,'desc':desc,'url':f_url,'type':f_type},
                      dataType:'json',
                      success:function(e){
                          if (e.type == 'success'){
                              alert(e.msg);
                              window.location.href='http://127.0.0.2/index.php/admin/index/index';
                          }else{
                              alert(e.msg);
                          }
                      }
                      
                  });
               });
           });
    </script>
  </body>
</html>
