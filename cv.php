<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Resume Project</title>
        <link rel="stylesheet" href="css/style.css"/>
        <style>
            .headeroption{
      background: #444;
      color: #fff;
      text-align: center;
      padding: 10px;
    }
        </style>
    </head>
    <body>

        <?php
include_once('link.php');
require_once('connection.php');
        session_start();
        if(!isset($_SESSION['email']))
        {
                header("location: index.php");
        }
        $name=$_SESSION['email'];
        ?>

        <div class="headeroption">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="dashboard.php" class="navbar-brand"><h2>Back to Home</h2></a>
      <center>
    <marquee> <h1>Update Your Information</h1></marquee>
  </center>
    </div>
    <div class="dropdown navbar-right" id="right">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $name;?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="account.php">Account</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
  </div>
</div>

<?php
include_once('link.php');
require_once('connection.php');

$fname = $lname = $email = $gender =$phone = '';
$sql = "SELECT * FROM tbluser where Email = '$name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $fname = $row["Firstname"];
    $lname = $row["Lastname"];
    $email = $row["Email"];
    $gender = $row["Gender"];
    $phone = $row["Phone"];
    $designation1 = 'Software Engineering';
    $address = 'Dhaka';
  }
}

   $sql = "SELECT * FROM experience";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
  {
   $id = $row['ex_id'];
  $cname = $row["company_name"];
  $designation = $row["designation"];
  $syear =  $row["start_year"];
  $eyear =  $row["end_year"];
}
}
?>




        <div class="maincontent">
            <div class="left_content">
                <div class="surname">
                    <div class="propic">
                        <img src="img/Myimage90.jpg" alt="" class="profilepicture" >
                    </div>
                    <div class="names">
                        <h1><?php echo $fname." ".$lname; ?></h1>
                        <h2><?php echo $lname; ?></h2>
                        <P><?php echo  $designation; ?></P>
                    </div>
                </div>
                <div class="profile">
                    <div class="fullicon">
                        <img src="img/profile.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>PROFILE</h1>
                    </div>
                    <div class="profile_line">
                        <img src="img/line.png" alt="" class="pline">
                    </div>
                    <div class="pdes">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu <span>pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                            
                        </span>  </p>
                    </div>
                </div>
                <div class="contact">
                    <div class="fullicon">
                        <img src="img/contact.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>CONTACT</h1>
                    </div>
                    <div class="contact_line">
                        <img src="img/line.png" alt="" class="cline">
                    </div>
                    <div class="Cdes">
                        <div class="c_left">
                            <p>ADDRESS</p>
                            <p>E-MAIL</p>
                            <p>PHONE</p>
                            <p>WEBSITE</p>
                        </div>
                        <div class="c_right">
                            <p><?php echo $address; ?></p>
                            <p><?php echo $email; ?></p>
                            <p><?php echo $phone; ?></p>
                            <p>ak.com</p>
                        </div>
                    </div>
                </div>
                <div class="skills">
                    <div class="fullicon">
                        <img src="img/skills.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>SKILLS</h1>
                    </div>
                    <div class="skills_line">
                        <img src="img/line.png" alt="" class="sline">
                    </div>
                    <div class="s_des">
                        <p>CREATIVE</p>
                        <div class="skills_dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                        </div>
                        <p>TEAMWORK</p>
                        <div class="skills_dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                        </div>
                        <p>INNOVATE</p>
                        <div class="skills_dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                        </div>
                        <p>COMMUNICATION</p>
                        <div class="skills_dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/blue-dot.png" alt="" class="dots">
                            <img src="img/ash-dot.png" alt="" class="dots">
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_content">
                <div class="education">
                    <div class="fullicon">
                        <img src="img/education.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>EDUCATION</h1>
                    </div>
                    <div class="edu_line">
                        <img src="img/line.png" alt="" class="Eline">
                    </div>
                    <div class="edu_des">
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="Enames">
                            <h1>MASTER DEGREE <span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>UNIVERSITY NAME</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="Enames">
                            <h1>MASTER DEGREE <span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>UNIVERSITY NAME</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="Enames">
                            <h1>MASTER DEGREE <span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>UNIVERSITY NAME</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="Enames">
                            <h1>MASTER DEGREE <span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>UNIVERSITY NAME</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                    </div>
                </div>
                <div class="experience">
                    <div class="fullicon">
                        <img src="img/experiance.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>EXPERIENCE</h1>
                    </div>
                    <div class="ex_line">
                        <img src="img/line.png" alt="" class="Eline">
                    </div>
                    <div class="edu_des">
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="EXnames">
                            <h1>COMPANY NAME<span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>YOUR JOB HERE</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="EXnames">
                            <h1>COMPANY NAME<span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>YOUR JOB HERE</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                        <div class="right_blackdots">
                            <img src="img/black-dot.png" alt="" class="blackdots">
                        </div>
                        <div class="EXnames">
                            <h1>COMPANY NAME<span>// Feb 2011 - Jun 2014</span></h1>
                            <h1>YOUR JOB HERE</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque.</p>
                        </div>
                    </div>
                </div>
                <div class="software">
                    <div class="fullicon">
                        <img src="img/software.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>SOFTWARE</h1>
                    </div>
                    <div class="software_line">
                        <img src="img/line.png" alt="" class="Eline">
                    </div>
                    <div class="softdes">
                        <div class="soft_left">
                            <p class="softnames">PHOTOSHOP</p>
                            <img src="img/PHOTOSHOP-rate.png" alt="" class="skillbar">
                            <p class="softnames">ILLUSTRATOR</p>
                            <img src="img/illus-rate.png" alt="" class="skillbar">
                            <p class="softnames">INDESIGN</p>
                            <img src="img/indesign.png" alt="" class="skillbar">
                        </div>
                        <div class="soft_right">
                            <p class="softnames">DREAMWAVER</p>
                            <img src="img/dream-weaver.png" alt="" class="skillbar">
                            <p class="softnames">AFTER EFFECT</p>
                            <img src="img/after-effect.png" alt="" class="skillbar">
                            <p class="softnames">HTML &amp; CSS</p>
                            <img src="img/htmlcss.png" alt="" class="skillbar">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>