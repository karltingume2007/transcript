<!DOCTYPE html>
<html ng-app="transcript">
    <head>
    <title>Student Manager</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="transcript generation">
    <meta name="description" content="">
    <meta name="Fomic" content="fomicgroup.cm">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/main.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>">
    
    <script type="text/javascript" src="<?php echo base_url('resources/js/jquery-1.12.3.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resources/js/angular.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>
	
</head>
<!-- php code to change the school name and logo -->
<?php
    mysqli_next_result($this->db->conn_id);
    $query = $this->db->get('system_settings');
    $result = array();
    if ($query->num_rows() === 1) {
        $result = $query->result();
    }

?>
<!-- end of php code changing school name and logo -->

<body bgcolor="#ccc">
    <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top" id="main-navbar">
                <div class="container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                      data-target = ".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <!-- inserting the school name and logo -->
                    <?php foreach($result as $settings):?>
                        
                    <a class="navbar-brand" href="<?php echo site_url() ?>" style="margin-top:-2%">
                        <span><img src="<?php echo base_url() . $settings->schoolLogo;?>" width="90px" height="80px"></span>
                        <?php echo $settings->schoolName;?>
                    </a>
                    <?php endforeach;?>
                    <!-- end inserting the school name and logo -->

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">                            
                            <?php
                                echo "<li>" . anchor(site_url('school_settings'), "School Configuration") . "</li>";
                                echo "<li>" . anchor(site_url('enrolments'), "Enrolments") . "</li>";
                                echo "<li>" . anchor(site_url('transcript'), "Transcript") . "</li>";
                                echo "<li>" . anchor(site_url('setting'), "Settings") . "</li>";
                                
                            ?>
                           
                            <?php
                            
//                                $language = current_user()->language;
//
//                                if($language == 'en-GB')
//                                {
//                                    $language_link = 'Français';
//                                    $short_link = 'fr-FR';
//                                }
//                                if($language == 'fr-FR')
//                                {
//                                    $language_link = 'English';
//                                    $short_link = 'en-GB';
//                                }

                                if(current_user()->user_id)
                                {
                                    echo '
                                        <li class="">' .anchor(site_url('authentication/logout'), 'Logout') . '</li>
                                            
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                                ' . current_user()->full_name .
                                                '<b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">                                   
                                                <li class="">' .anchor(site_url('authentication/logout'), 'Logout') . '</li>
                                            </ul>
                                        </li> ';
                                }
                                
                            
                            ?>
                            
                                                      
                           
                            
                        </ul>
                    </div>
                </div>
            </nav>
        <br/><br/><br/>
