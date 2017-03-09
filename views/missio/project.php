<?php  $project = $data['project']; ?>
<?php  $user    = $data['user']; 
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id_project = substr($url, strrpos($url, '/') + 1);

$authToken = 'CWku8OjaTFPWSq0w';
$single_context = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'header' => "Access-Token: {$authToken}\r\n"
    )
));
$single_response = file_get_contents("https://missio.org/api/projects/". $project['id'], FALSE, $single_context);

$pro_detail = json_decode($single_response, TRUE);
//var_dump($pro_detail);



    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);


    // echo $prodject_url = end($link_array);

if (!$project['id']) {

   
    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $prodject_url = end($link_array);

} else {

    $prodject_url = $project['id'];
}

$sin_response = file_get_contents("http://api.missioapp.org/portal/v1/projects/". $prodject_url ."?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93", FALSE);

$proje_sin = json_decode($sin_response, TRUE);
//var_dump($proje_sin);
//echo $project['id'];
?>
<section class="choose-bg">

</section>
<style type="text/css">

.img-detail {
  width:  460px;
  height: 260px;
  border-radius: 20px;
  padding-right: 20px;
  float: none;
  margin: 0 auto;   
}

.box{
    width: 400px;
    height: 100px;
    border: 2px solid #ccc;
    display: none;
    margin: 0 auto;
}

.boxInfo li{
    list-style-type: none;
        padding: 3px;
    /* margin: auto 0; */
    text-align: center;
}
.detailBox {
    width:100%;
    border:none;
    margin:50px;
        margin-top: 0px;
}

.commentList li > div {
    display:table-cell;
    padding-left: 20px;
}
.commentRed{
    color: #e2241b;
    font-family: 'vag_roundedbold', sans-serif;
}

.sub-video {
    margin: 0 auto;
    width: 200px;
    padding-bottom: 0px;
    padding-top: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    color: #101010;
}

.social img{
    padding: 5px;
    width:50px;
}

.img-leader2 {
    float: right;
    text-align: right;
 }

.img-leader2 img {
    width: 150px;
    height: 150px;
    border-radius: 80px;
    
}

.title-leader2 {
    color: #e2241b;
    font-size: 20px;
    font-family: 'vag_roundedbold', sans-serif;
    padding-top: 20px;
}

.backgroundImagethumb{
        background-image: url(/web/images/gray_thumb.jpg);
    background-repeat: no-repeat;
}



</style>

<?php 


if (  $proje_sin['challenge_info'] == Null) { ?>


    <section class="project-main">
    <div class="detail-main">
        <div class="return-detail"> 
            <a href="/explore">
                
            </a>    
        </div>
        <div class="title-detail"><?php echo $proje_sin['project_name']; ?></div>
        <div class="desc-detail"><?php echo $proje_sin['description']; ?></div>
        <div class="info-detail">
            <div class="fund-detail">Fundraising Goal<div class="pd">$<?php echo number_format($proje_sin['project_cost']); ?></div></div>
            <div class="rasied-detail">Amount Raised<div class="red-pd"><?php echo $pro_detail['data']['total_contributions_string']; ?></div></div>
            <!-- <div class="days-detail">Days to go<div class="pd">15</div></div> -->
        </div>
        <div id="OpenLightBox">
    <span id="lightboxspan" class="x-v" onclick="ShowLightBox('hp-video'); return false;"><div class="sub-video"><div class="donate-det">Donate to this project</div></div></span>
</div>

        
        <!-- <div class="fund-det">Fundraise for this Project</div> -->
    </div>
</section>

<?php } else { ?>

<section class="project-main backgroundImagethumb" >
    <div class="detail-main">
        <div class="return-detail"> 
            <a href="/explore">
                
            </a>    
        </div>
<div id="left" style="float: left; width: 25%; padding-bottom: 10px; padding-right: 60px;border-right: 2px solid #e42526;">

    <span class="amount-help" style="float:right;">Project Fundraised By: </span>
    <br>
        <div class="img-leader2" id="fund-i">
            <img src=""><br>
               
            <div class="title-leader2" id="fund-name"></div> 
           <span style="font-weight: bold;" id="fund-group">
                
               
            </span>
            <div style="font-weight: bold;" id="fund-loc"></div>
        </div>
</div>

     <div id="right" style="float: left; width: 75%;padding-left: 33px;">
  
        <div class="title-detail"><?php echo $proje_sin['project_name']; ?></div>
        <div class="desc-detail"><?php echo $proje_sin['description']; ?></div>
        <div class="info-detail">
            <div class="fund-detail">Fundraising Goal<div class="pd">$<?php echo number_format($proje_sin['project_cost']); ?></div></div>
            <div class="rasied-detail">Amount Raised<div class="red-pd"><?php echo $pro_detail['data']['total_contributions_string']; ?></div></div>
            <!-- <div class="days-detail">Days to go<div class="pd">15</div></div> -->
        </div>
     </div>   
        <div id="OpenLightBox">
    <span id="lightboxspan" style="clear:both;" class="x-v" onclick="ShowLightBox('hp-video'); return false;"><div class="sub-video"><div class="donate-det">Donate to this project</div></div></span>
</div>

        
        <!-- <div class="fund-det">Fundraise for this Project</div> -->
    </div>
</section>



 <?php   } ?>












<section class="project-sub">
	<div class="detail-sub">
        <div class="img-detail" >
                <ul class="bxslider">
                     <?php foreach ($proje_sin['project_images_url'] as $key=>$v ) { ?>
                      <li><img src="<?php echo $v; ?>" /></li>
                    <?php  } ?>               
                </ul>
       </div>  <br><br><br><br>
		<!-- <div class="img-detail">
        <img src="<?php echo $project['image']; ?>">
        </div> -->
		<!-- <div class="map-detail"><div id="map"></div></div> -->
		<div class="info-contaner">		
			<div class="leader-detail">
				<div class="img-leader">
                     <?php   if ($pro_detail['data']['leader']['image']) { ?>
                                <img src="<?php echo $pro_detail['data']['leader']['image']; ?>">
                            <?php }else{ ?>
                                <img src="https://missio.org/media/8529386424254d82bdbc18e51035d3f1.jpg"> 
                            <?php } ?>  
                  
                </div>
				<div class="type-leader">Project Leader:</div>
				<div class="title-leader"><?php echo  $proje_sin['project_leader_name'];  ?></div>
				<div class="dio-leader"><?php echo  $proje_sin['diocese_name']; ?></div>
                <div class="desc-leader"></div>
			</div>
			<div class="help-detail">
				<div class="head-help">What Your Donation Can Do!</div>
                <?php  foreach ($proje_sin['donations'] as $key_amount=>$val_amount) { ?>  
    				<div class="amount-help"><span>$<?php echo  number_format($val_amount['amount']); ?></span> <?php echo $val_amount['description']; ?>  </div>
                <?php } ?>
			</div>
		</div>
	</div><br><br><br>
    <div class="project-social">
        <ul>
            <li>
            
                    <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=&amp;su=<?php echo $proje_sin['project_name'];  ?>&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email gmail">gmail</a>
            
            </li>
            <li>
            
                    <a href="http://compose.mail.yahoo.com/?to=&amp;subj=<?php echo $proje_sin['project_name']; ?>&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email yahoo">yahoo mail</a>
            
            </li>
            <li>
            
                    <a href="https://mail.live.com/default.aspx?rru=compose&amp;to=&amp;subject=<?php echo $proje_sin['project_name'];  ?>&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email msmail">hotmail, outlook, live mail</a>
            
            </li>
            <li>
                
                    <a href="http://mail.aol.com/mail/compose-message.aspx?to=&amp;subject=canopy%2016x26%20ft%20with%20walls%20and%20windows%20enclosed&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email aol">aol mail</a>
             
            </li>
        </ul>
        <p style="display:none;"> Check out this #Missio project! @1missionfamily</p>
         
    </div>
    <div class="social"> </div>
</section>
<section id="project_details" class="project_topsec">
</section>
<section class="body_container">
<div class="wrapper">
<?php
$up_project = file_get_contents("https://missio.org/api/projects/1088/updates");
$up_obj = json_decode($up_project, true);

//print_r($up_project);
foreach ( $up_project->data as $key ){ 

    print_r($key);

?>
    <li>
        <img width="40" src="<?php
        if ($key['user']['image'] != null ) { echo $key['user']['image']; } else { echo 'https://missio.org/media/8529386424254d82bdbc18e51035d3f1.jpg';} ?>">
        <div>
            <strong>
                <?php if ( $key['mediaUrl'] != null ) { ?>
                   <img class="update-img" src="<?php echo $key['mediaUrl']; ?>">
                <?php }else{ ?>
                   <?php echo $key['message']; ?>
                <?php } ?>  
            </strong>
            <span>
                <?php
                    $time = strtotime( $key['createdAt'] );
                    echo dayspassed($time) ." ago";
                ?>
            </span>
        </div>
    </li>


<?php } ?>




<br><br>





<div class="head-help">Project Updates</div>


<?php 
    $up_project = file_get_contents("https://missio.org/api/projects/". $project['id'] ."/updates?limit=limit&offset=offset");
    $up_obj = json_decode($up_project, true);
    //print_r($up_obj);
?>

<div class="detailBox">
  <!--  <form class="form-inline" role="form"> -->
            <div class="form-group">
                <input id="inp-com" class="form-control" type="text" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button  id="btn-com" class="btn btn-default">Add</button>
            </div>
   <!--      </form> -->

    <div class="actionBox">    
        <ul class="commentList">
            <?php  foreach ($up_obj['data'] as $key ) { ?>
                <li>
                    <div class="commenterImage">       

                            <?php   if ($key['user']['image']) { ?>
                                <img src="<?php echo $key['user']['image']; ?>" />
                            <?php }else{ ?>
                                <img src="https://missio.org/media/8529386424254d82bdbc18e51035d3f1.jpg"> 
                            <?php } ?>  
                    </div>
                    <div class="commentText">
                        <p class="commentRed"><?php echo $key['user']['firstName']; ?>  <?php echo $key['user']['lastName']; ?></p>
                        <p ><?php echo $key['message']; ?></p>
                        <span class="date sub-text">on  <?php echo date('F jS, Y', strtotime($key["createdAt"]));?></span>

                    </div>
                </li>                        
            <?php } ?>
        </ul>
    </div>
</div>






</div>



<div class="element"></div>

</section>


<div id="fade" class="LB-black-overlay" onclick="if (!is_modal) HideLightBox(); return false;"></div>
    <div id="hp-video" class="LB-white-content">
        <div class="close" onclick="HideLightBox(); return false;">X</div> 
       
<div id="fund1" class="targetPage live">
    <center>
            <div class="page-header">
                <h2>We're<strong> <?php echo $pro_detail['data']['total_contributions_string']; ?> </strong> to our Goal of <strong> $<?php echo number_format($project['goal']); ?> </strong></h2>
            </div><br><br>

            <form class="pure-form">
                <fieldset>
                    <legend>Please sign in to donate</legend>
                    <div class="err-hp"></div>
                    <input id="log-e" type="email" placeholder="Email">
                    <input id="log-p" type="password" placeholder="Password">

                    <label for="remember">
                        <input id="remember" type="checkbox"> Remember me
                    </label>

                    <div id="log-sub" class="pure-button pure-button-primary">Sign in</div>
                    <div id="nxt" class="showSingle" target="2" style="display:none;">next</div>                 
                </fieldset>
            </form>
            <form class="pure-form pure-form-stacked">
                <fieldset>
                    <legend>Or join the Missio community to donate.</legend>

                    <div class="pure-g">
                        <div class="pure-u-1 pure-u-md-1-3">
                           <!--  <label for="first-name">First Name</label> -->
                            <input id="reg-f" class="pure-input-1-3" type="text"  placeholder="First Name" required>
                        </div>
                        <div class="pure-u-1 pure-u-md-1-3">
                         <!--    <label for="last-name">Last Name</label> -->
                            <input id="reg-l" class="pure-input-1-3" type="text" placeholder="Last Name"  required>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                          <!--   <label for="email">E-Mail</label> -->
                            <input id="reg-e" class="pure-input-1-3" type="email" placeholder="Email" required>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <!-- <label for="password">Password</label> -->
                            <input id="password" class="pure-input-1-3" type="password"  placeholder="Password"  required>
                        </div> 
                         <div class="pure-u-1 pure-u-md-1-3">
                         <!--    <label for="password">ReEnter Password</label> -->
                            <input id="reg-p" class="pure-input-1-3" type="password" placeholder="Re Enter Password"  required>
                        </div>                    
                    </div>

                    <div id="log-reg" type="submit" class="pure-button pure-button-primary">Submit</div>
                </fieldset>
            </form>

          </center>      
        <div id="nxttwo" class="showSingle" target="2" style="display:none;">next</div>    
          <div id="nxtone" class="showSingle" target="1" style="display:none;">next</div>      
</div>
<div id="fund2" class="targetPage">
    <center>
            <div class="page-header">
                <h2>We're<strong> <?php echo $pro_detail['data']['total_contributions_string']; ?> </strong> to our Goal of <strong> $<?php echo number_format($project['goal']); ?> </strong></h2>
            </div><br><br>

                                <div class="pure-form pure-form-aligned">
                                    <fieldset>
                                        <legend>How much would you like to donate ?</legend>

                                    <?php foreach ($pro_detail['data']['donations'] as $key_amount=>$val_amount) { ?> 
                                  
                                        <div class="pure-control-group">                               
                                            <div class="pure-button pure-button-active amount-num" data-value="<?php echo  $val_amount['amount']; ?>">$<?php echo  number_format($val_amount['amount']); ?></div>
                                            <label><?php echo $val_amount['description']; ?></label>    
                                        </div>    

                                    <?php } ?>
                                     <div class="pure-control-group">                               
                                            <input  class="custom-num" data-value="">
                                            <label>Custom Amount</label>    
                                        </div> 


                                        <div class="pure-controls">
                                           
                                            <div id="send-am" class="pure-button pure-button-primary">Submit</div>

                                        </div>
                                    </fieldset>
                                </div>

                                <div id="nxthree" class="showSingle" target="3" style="display:none;">next</div>  
                                <div id="nxtfour" class="showSingle" target="4" style="display:none;">next</div>  

                      <!--           pick amount
                            <div class="showSingle" target="2">back</div><br>
                            <div class="showSingle" target="4">next</div> -->
    </center>
</div>
<div id="fund3" class="targetPage">
    <center>
            <div class="page-header">
                <h2>We're<strong> <?php echo $pro_detail['data']['total_contributions_string']; ?> </strong> to our Goal of <strong> $<?php echo number_format($project['goal']); ?> </strong></h2>
            </div><br><br>
     <form class="pure-form pure-form-stacked">
        <fieldset>
            <legend>Billing Info</legend>

            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-f" class="pure-u-1-3" type="text" placeholder="First Name">
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-l" class="pure-u-1-3" type="text" placeholder="Last Name">
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-a" class="pure-u-1-3" type="text" placeholder="Address" required>
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-c" class="pure-u-1-3" type="text" placeholder="City">
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-s" class="pure-u-1-3" type="text" placeholder="State">
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-z" class="pure-u-1-3" type="text" placeholder="Zip">
                </div>


                <div  class="pure-u-1 pure-u-md-1-3" >
                    <label>Country</label>
                    <select id="country" class="pure-input-1-2">
                        <option value="US">United States</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AX">Åland Islands</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia, Plurinational State of</option>
                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Côte d'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curaçao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>          
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands, British</option>
                        <option value="VI">Virgin Islands, U.S.</option>
                        <option value="WF">Wallis and Futuna</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option></select>
                </div>
                 </fieldset> 
                 <fieldset>
                 <legend>Card Info</legend>
                <div  class="pure-u-1 pure-u-md-1-3" >
                  <label>CardType</label>
                   <div class="fc-xx">
                        <select  class="form-control" name="bill_cardtype" id="ctype">
                            <option value="001">Visa</option>
                            <option value="002">MasterCard</option>
                            <option value="003">American Express</option>
                            <option value="004">Discover</option>        
                        </select>
                    </div>
                </div><img src="/web/images/creditCards.png" >
                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-cn" class="pure-u-1-3" type="text" placeholder="Card Number">
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-xe" class="pure-u-1-3" type="text" placeholder="Card Expiry Date ex. 12-2022">
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <input id="cc-cv" class="pure-u-1-3" type="text" placeholder="Cvn">
                </div>

                 


           <br><br><div class="cc-er"></div><br>

            <div id="cc-submit" type="submit" class="pure-button pure-button-primary" >Submit</div>

        </fieldset>
    </form>


          <div id="nxtsel" class="showSingle" target="2" style="display:none;">next</div>  

    </center>
</div>
<div id="fund4" class="targetPage">
<center>
 <legend> <div class="title-detail">Donation Total</div></legend>
   <h2>You will be charged!</h2>
    <h2><div class="title-detail" id="amt">$</div> </h2>

    <table class="pure-table pure-table-horizontal">
        <tbody>
            <tr>            
                <td>Project Donation</td>
                <td></td>
                <td><div id="amtt"></div></td>
            </tr>
          <!--   <tr>
                <td>Missio General Fund</td>
                <td></td>
                <td>$0.00</td>
            </tr> -->
            <tr>           
                <td> 
                <div id="container"> 
                <div class="a">Administration Fee </div>
                <div class="b">By adding a contribution of 5% to cover 
                                            administrative cost, you will ensure that
                                             100% of your donation goes to your project.
                </div>
                </div>
                   
                </td>
                <td>
                    
                </td>
                <td><div id="amtr"></div></td>
            </tr>
        </tbody>
    </table><br><br>

   <div id="sub-donation" type="submit" class="pure-button pure-button-primary">Confirm</div>
   <div id="nxtfive" class="showSingle" target="5" style="display:none;">next</div>  

</center>
</div>

<div id="fund5" class="targetPage">

       <div class="page-header">
       <center>
                <h2>We are closer to our Goal of <strong> $<?php echo number_format($project['goal']); ?> </strong></h2>
                </center>
         </div>
            <br><br>
            <center>
                 <div class="title-detail">Thank you!</div><br>

                  <div class="title-detail">Share this Project!</div>
                 <div class="project-social">
                    <ul>
                        <li>                    
                            <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=&amp;su=<?php echo $project['name'];  ?>&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email gmail">gmail</a>
                        </li>
                        <li>                    
                            <a href="http://compose.mail.yahoo.com/?to=&amp;subj=<?php echo $project['name'];  ?>&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email yahoo">yahoo mail</a>                       
                        </li>
                        <li>
                            <a href="https://mail.live.com/default.aspx?rru=compose&amp;to=&amp;subject=<?php echo $project['name'];  ?>&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email msmail">hotmail, outlook, live mail</a>                    
                        </li>
                        <li>
                          <a href="http://mail.aol.com/mail/compose-message.aspx?to=&amp;subject=canopy%2016x26%20ft%20with%20walls%20and%20windows%20enclosed&amp;body=<?php echo $project['description']; ?>%0D%0A%0D%0Ahttps://missio.org/project/<?php echo $project['id']; ?>" target="_blank" class="reply-email aol">aol mail</a>
                        </li>
                    </ul>
                    <p style="display:none;"> Check out this #Missio project! @1missionfamily</p>
                     
                </div>
                <div class="social"> </div>

            </center>
          

</div>

          
</div>

<input id="amount-id" type="hidden">
<input id="cuser" type="hidden">
<input id="bill" type="text">
<script>
$(document).ready(function() {

$("td .floatbar").hover(function(){
    $(this).find(".popup").stop().fadeIn("slow");
}, function(){
    $(this).find(".popup").stop().fadeOut("fast");
});





$('div.pure-control-group').each(function() {
      var $select = $(this);
      $(".pure-button", $select).click(function(e) {
      
        $(".pure-button" , $select).css({"background-color": "transparent", "border-width" : "1px", "border-style" : "solid", "border-color" : "red"});
      
      });
    });


$('.bxslider').bxSlider({
 auto: true,
 autoControls: true,
 slideWidth: 550
});


$('.social').socialLinkBuilder({print: {
            isUsed: true
        },
        email: {
            isUsed: true,
            mailto: 'example@example.com'
        },
         gplus: {
            isUsed: false
        },
         linkedin: {
            isUsed: false
        },
         print: {
            isUsed: false
        },
        tel: {
            isUsed: false,
            tel: '0123456789'
        }});

$('.project-social').hide();
$(".emailx svg").click(function(){
    $('.project-social').toggle();
});

$('.showSingle').click(function(){
    jQuery('.targetPage').slideUp();
    jQuery('.targetPage').hide();

    jQuery('#fund'+$(this).attr('target')).slideToggle();


});



$(".donate-det").click(function(){
    if ( $.session.get("token") == undefined) {

        $( "#nxtone" ).trigger( "click" );

    } else {

        $( "#nxttwo" ).trigger( "click" );

    }
});


$('#send-am').click(function() {
    var amount = $("#amount-id").val();
    var amt = "$" + amount;
    var amresult = "$" + (5 / 100) * amount;
    $("#amt").text(amt);
    $("#amtt").text(amt);
    $("#amtr").text(amresult);
    $.ajax({
        url: "/api/users/me/billing",
        datatype:"json",
        type: "GET",
          headers: {  
            'Content-Type' : 'application/json',
            'Access-Token' : 'CWku8OjaTFPWSq0w',
            'Authorization' : 'Bearer $.session.get("token")'
        },
        success:function(data){   
            $.each(data, function (i, item) {            
                if (item.userId != null) {
                    $( "#nxtfour" ).trigger( "click" );
                } else {
                    $( "#nxthree" ).trigger( "click" );     
                }

            });
        },
        error: function(crs) {
                console.log(crs);
        },
    });
});


$('#log-sub').click(function() {

            var em  = $("#log-e").val();
            var pw = $("#log-p").val();
            var cuserid = $("#cuser").val();
               
            $.ajax({
                url: '/api/login',
                datatype:"json",
                type: "POST",
                headers: {  
                    'Content-Type' : 'application/json',
                    'Access-Token' : 'CWku8OjaTFPWSq0w'
                },
                data: JSON.stringify({
                            email: em,
                            password: pw,
                }),                                     
                    success:function(data){               
                        if (data.success == true) { 
                            $.each(data, function (i, item) {

                                $.session.set("token", item.token);
                                $.session.set("hash", item.hash);
                                $.session.set("email", em);
                                $.session.set("firstname", item.first_name);
                                $.session.set("fundraiser", item.fundraiser);
                                $('#token').val(item.token);
                                $('#cuser').val(item.user_id); 



                                //console.log($.session.get("token"));  
                                $( "#nxttwo" ).trigger( "click" );

                             });
                       

                        } else {

                            $('.err-hp').html("error try again!");

                        }                                          
                    }
                });


  });
 
                            
$('#log-reg').click(function() {
            var ema  = $("#reg-e").val();
            var pwo = $("#reg-p").val();
            var firstn = $("#reg-f").val();
            var lastn = $("#reg-l").val();
           
            $.ajax({
                url: '/api/register',
                datatype:"json",
                type: "POST",
                headers: {  
                    'Content-Type' : 'application/json',
                    'Access-Token' : 'CWku8OjaTFPWSq0w'
                },
                data: JSON.stringify({
                            email: ema,
                            password: pwo,
                            lastName: lastn,
                            firstName: firstn,

                        }),                                     
                    
                    success:function(data){
                        if(data.success == true){ 
                            $.each(data, function (i, item) {                      
                                $.session.set("token", item.token);
                                $.session.set("hash", item.hash);
                                $.session.set("email", ema);
                                $.session.set("firstname", firstn);
                                $.session.set("fundraiser", item.fundraiser);

                                $('#token').val(item.token); 
                                $('#cuser').val(item.user_id);     
                            });
                            $( "#nxttwo" ).trigger( "click" );
                        } else {
                             $('.err-hp').html("error try again!");
                        }
                   
                }
                });
    }); 






 
$('.amount-num').click(function() {
   var an = $(this).attr('data-value');
   //alert(an);
    $('#amount-id').val(an);

  });

$('.custom-num').keyup(function(){
        $('#amount-id').val($('.custom-num').val());

});

$('#sub-donation').click(function() {
    var amount = $("#amount-id").val();
  
                    $.ajax({
                        url: '/api/projects/<?= $project['id'] ?>/give',
                        datatype:"json",
                        type: "POST",
                        headers: {  
                            'Content-Type' : 'application/json',
                            'Access-Token' : 'CWku8OjaTFPWSq0w',
                            'Authorization': 'Bearer $.session.get("token")'

                        },
                        data: JSON.stringify({

                                amount : amount,
                                generalFund : false, 
                                   
                        }),
                       
                        success:function(donateData){
                                    console.log('error');
                                    console.log(donateData); 

                                    $.each(donateData, function (i, item) {

                                    var tid = item.transactionId;

                                    $.ajax({
                                            url: '/api/projects/<?= $project['id'] ?>/give/' + tid,
                                            datatype:"json",
                                            type: "POST",
                                            headers: {  
                                                
                                                'Access-Token' : 'CWku8OjaTFPWSq0w',
                                                'Authorization': 'Bearer $.session.get("token")'

                                            },
                                          
                                            success:function(data){
                                              
                                                console.log(data);
                                                  $( "#nxtfive" ).trigger( "click" );


                                                                                                                                   
                                            },
                                            error: function(cr) {
                                                console.log(cr);
                                                //$( "#three" ).trigger( "click" );

                                              },
                                           

                                        });
                                    })
                                                                                     
                        },

                        error: function(e) {
                            console.log(e);
                        },

                    });
});




$('#cc-submit').click(function() {
            var first  = $("#cc-f").val();
            var last   = $("#cc-l").val();
            var add    = $("#cc-a").val();
            var city   = $("#cc-c").val();
            var state  = $("#cc-s").val();
            var zip    = $("#cc-z").val();
            var coun   = $("#country").val();
            var ct     = $("#ctype").val();
            var cn     = $("#cc-cn").val();
            var ce     = $("#cc-xe").val();
            var cv     = $("#cc-cv").val();
           
            $.ajax({
                url: '/api/users/me/billing',
                datatype:"json",
                type: "POST",
                headers: {  
                    'Content-Type' : 'application/json',
                    'Access-Token' : 'CWku8OjaTFPWSq0w',
                    'Authorization': 'Bearer $.session.get("token")'
                },
                data: JSON.stringify({
                        firstName: first,
                        lastName: last,
                        address1: add,
                        city: city,
                        state: state,
                        zip: zip,
                        country: coun,
                        cardType: ct,
                        cardNumber: cn,
                        cardExpiryDate: ce,
                        cardCvn: cv

                        }),                                     
                    
                    success:function(data){
                       console.log(data);

                       if(data.success == true){
                         $( "#nxtfour" ).trigger( "click" );
                       } else {
                        console.log(data.message);
                         $('.cc-er').html(data.message);
                       }

                    


                   
                },
                 error: function(e) {
                            console.log(e);
                    },

                });
    }); 








// alert($.session.get("token"));


 $('#btn-com').click(function() {
    var msg = $('#inp-com').val();

        $.ajax({
            url: "/api/projects/<?= $project['id'] ?>/updates",
            datatype:"json",
            type: "POST",
            headers: {  
                'Content-Type' : 'application/json',
                'Access-Token' : 'CWku8OjaTFPWSq0w',
                'Authorization': 'Bearer {$.session.get("token")}'

            },
            data: JSON.stringify({
                        message: msg,
                       
                    }), 
            success:function(data){
                        console.log(data);
                          window.location = "";                    
                                             
            }

          });
 });




$.ajax({
    url: "/api/projects/<?= $project['id'] ?>/updates",
    datatype:"json",
    type: "GET",
        success:function(responce){
               // console.log(responce);
       }
});







  
    $.ajax({
        url: "https://www.propfaith.net/missioapi/v1/projects/<?= $id_project  ?>?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93",
        datatype:"json",
        type: "GET",
        //   headers: {  
        //     'Content-Type' : 'application/json',
        //     'Access-Token' : 'CWku8OjaTFPWSq0w',
         
        // },
        success:function(datafun){   
            console.log(datafun);

 console.log(datafun.challenge_info.fundraiser_ref_no);

 

                     //   $.each(datafun.challenge_info, function (i, item) {
                        var fundUrl = '/api/users/'+ datafun.challenge_info.fundraiser_ref_no;
                        console.log(fundUrl);
                        $('#fund-group').html( datafun.challenge_info.fundraiser_group_name);


                                    $.ajax({
                                            url:  fundUrl,
                                            datatype:"json",
                                            type: "GET",
                                            headers: {  
                                                
                                              "Content-Type" : "application/json",
                                              "Access-Token" : "CWku8OjaTFPWSq0w"
                                                

                                            },
                                          
                                            success:function(data){
                                              
                                                console.log(data);

                                                  $.each(data['data'], function (i, item) {
                                                    console.log(item.fullName);

                                                    $('#fund-name').html(item.fullName);
                                                    $('#fund-loc').html(item.city);
                                                   
                                                    $("#fund-i img").attr("src", item.image);


                                                });
                                                                                                                                   
                                            },
                                            error: function(cr) {
                                                console.log(cr);
                                            
                                              },
                                           

                                        });
                                 //   })
 

          
        },
        error: function(crs) {
                console.log(crs);
        },
    });

















});






  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
  }

var curr_lb_div;
var is_modal = false;

function ShowLightBox(lb_div, isModal) {
document.getElementById(lb_div).style.display='block';
document.getElementById('fade').style.display='block';
curr_lb_div = lb_div;
 if (isModal)
     is_modal = true;
 else is_modal = false;
 
 setCenter(lb_div, isModal);
 //setDimensions(lb_div);
}

function HideLightBox() {
    if (document.getElementById(curr_lb_div)) {
          document.getElementById(curr_lb_div).style.display='none';
          document.getElementById('fade').style.display='none';
          curr_lb_div = '';
     }
}

function setCenter(lb_div, isModal) {
var div = document.getElementById(lb_div);

var newX = div.offsetWidth / 2;
var newY = div.offsetHeight / 2;

div.style.marginLeft = '-'+newX+'px';
div.style.marginTop = '-'+newY+'px';

}





</script>

