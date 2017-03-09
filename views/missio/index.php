
<div class="header-unit">
<div id="video-container">

    <div class="hp-main">
            <div class="hp-title">Raise Money for a Cause You Believe In.</div>


            <div class="hp-sub">Choose Your Mission. Change the World.</div>               
            <a href="/learn-more">
                <div class="btn-hp">Learn More</div>
            </a>       
    </div> 
    <a href="/create">
        <div class="hp-main-sub">
           <!--  <div class="hp-main-tx">Create a New Project</div>
            <div class="hp-main-tx-sub">and Become a Fundraiser</div> -->
        </div>
    </a>


    <div class="filter"></div>
    <video autoplay loop class="fillWidth">
    <source src="http://missiocorp.com/web/lntro_NoAudio.mp4" type="video/mp4" />
    Your browser does not support the video tag. I suggest you upgrade your browser.
    </video>

</div><!-- end video-container -->
</div><!-- end .header-unit -->










<section>
    <div class="brake-bar"></div>
</section>
<section class="sub-sec-hp">

<div class="sub-sec-title">What is MISSIO? Launched by Pope Francis in 2013 and explained by Liam Neeson here.</div>

   <!--  <div class="sub-sec-title">
    MISSIO is a digital platform that connects you to a global network of priests, religious and lay leaders half a world away and halfway up the block who are making a difference for communities in need in the Missions.
    </div>
    <div class="sub-sec-text">MISSIO members support education, health care, social outreach and advocacy programs all offering spiritual and pastoral care and compassion to the world's suffering and marginalized. Don't believe us? Let Liam Neeson explain.</div> -->
    
<!-- 
    <div class="sub-video">View Video &#9658;</div> -->
    <div id="fade" class="LB-black-overlay" onclick="if (!is_modal) HideLightBox(); return false;"></div>
    <div id="hp-video" class="LB-white-content">
        <div class="close" onclick="HideLightBox(); return false;">X</div> 
               <iframe src="https://player.vimeo.com/video/140228290" width="100%" height="100%"></iframe>
    </div>
    <div id="OpenLightBox">
        <span id="lightboxspan" class="x-v" onclick="ShowLightBox('hp-video'); return false;"><div class="sub-video">View Video &#9658;</div></span>
    </div>
    <!-- <div class="sub-btn-hp">Find out about Missio</div> -->
</section>
<section class="sub-prod">
    <div class="sub-sec-title">Trending Projects</div>
        <div class="card-row">
            <?php foreach (array_slice($data['query'], 0, 3) as $row) {  ?>

          
             <div class="card">
                 <div class="card-img">
                    <a href="/project/<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['featured_image_url'];?> ">
                    </a>
                </div>
                <div class="card-title">
                       <?php echo $row['project_name']; ?>
                </div>
                <div class="card-desc">
                    <?php
                        $string = strip_tags($row['description']);
                        if (strlen($string) > 200) {
                            $stringCut = substr($string, 0, 150);
                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...'; 
                        }
                        echo $string;                                                  
                     ?>
                </div>
                <a href="/project/<?php echo $row['id']; ?>">
                    <div class="card-link">
                        Read More
                    </div>
                </a>
            </div>
       
            <?php } ?>
        </div>
</section>
<section class="sub-sec-hp">
     <div class="sub-sec-title">Why Should You Choose Missio?</div>
     <div class="sub-sec-ttwo">Missio offers you a place to encounter 
        the Missions whenever and wherever you are.  Launched by Pope 
        Francis, MISSIO offers you a direct connection with his Missions 
        and with those helping our mission family. Missio is an opportunity 
        to choose how to put your faith into action, and a way to answer the
         call to each one of us who are baptized to be missionaries ourselves,
          through prayer and sacrifice, in word and deed.</div>
      <div class="sub-sec-grid">

        <div class="sub-grid-one">

            <div class="sub-grid-title">Direct</div>
            <div class="sub-grid-text">
                Missio offers unfiltered access to those in greatest need – and to those who are making the greatest difference in their lives. 
            </div>

            <div class="sub-grid-title">Reliable</div>
            <div class="sub-grid-text">
                Missio’s existing global network ensures 100% of your support will go directly to the project and the people that you select.
             </div>

            <div class="sub-grid-title">Communal</div>
            <div class="sub-grid-text">
                Missio builds a community of support to maximize success in the missions. Missio members come from all walks of life, and share their efforts with others committed to helping change the world.
            </div> 
        
        </div>
        <div class="sub-grid-two">

            <div class="sub-grid-title">Trusted</div>
            <div class="sub-grid-text">
                The Pope’s mission societies have built up the Church and served the poor for more than 100 years.
            </div>

            <div class="sub-grid-title">Transparent</div>
            <div class="sub-grid-text">
                Missio shares all the necessary information and provides unfiltered access to the project leaders. You can ask questions, learn about what is really going on, and offer support in a variety of ways. 
            </div>

            <div class="sub-grid-title">Effective</div>
            <div class="sub-grid-text">
                While not everyone can travel half a world away, Missio brings us all a little closer so that your involvement can be direct, immediate and impactful.
            </div>
        
        </div> <br><br>
            <!-- <div class="sub-btn-grid"><a href="/explore" style="color:#fff">Make a Donation</a></div>  -->
      </div>
    
      
</section>
<section class="sub-prod-hp">
    <div class="sub-sec-title">Three Great Ways To Change the World!</div>
   <!--  <div class="sub-sec-ttwo">Three Great Ways to Raise Money for a Cause or Charity.</div> -->
    <div id="crbigimg">
        <div class="copyright-wrapper">
            <div class="copyright" data-image="web/images/homepageRolloverPic3.png"
                data-text="Missio offers a direct connection to the priests, religious Sisters and Brothers, and laity leading projects that provide essential social outreach, advocacy, and pastoral service. They address basic human needs, while in every moment offering spiritual comfort and support to the suffering and the marginalized.">Faith & Empowerment
            </div>
            <div class="copyright" data-image="web/images/homepageRolloverPic2.png" 
                data-text="Missio change-makers work on the front lines to ensure that all children, particularly young girls and those with disabilities have access to a quality education because they know that education reduces poverty empowers women and helps prevent disease. By supporting Missio projects, you give hope to future generations and earn an A+ for helping to build stronger, more peaceful and equitable societies.">Hope & Education
            </div>
            <div class="copyright" data-image="web/images/unnamed.jpg"
                data-text="By investing in health initiatives to help children, families, and communities, Missio leaders help build resilience among the most vulnerable and marginalized. Walking with the poor – those who are sick or suffering – is something we do best. As a member of the Missio community, you too can accompany those who are most in need of help.">Love & Service
            </div>
        </div>
        <div class="main-image">
            <img id="copyrightimagecurrent" src="web/images/homepageRolloverPic4.png" alt="Copyright" />
        </div>           
    </div>
    <div class="sub-sec-ttwo grab-txt">
            The Catholic Church, through the Pontifical Mission Societies, supports a global network of people working on the front line of service for the most vulnerable communties.  Missio is your connection to these change-makers.
    </div>
    <div class="sub-hp-expro"><a href="/explore">Explore Projects</a></div>
</section>
<!-- <section>
    <div class="brake-bar"></div>
</section> -->
<section class="app_download">
        <div class="wrapper">
            <h3>The Missio App</h3>
            <a href="https://itunes.apple.com/us/app/missio/id606393585" class="apple_store" target="_blank"><img src="/web/images/app_store.png" alt=""></a> <a class="google_play" href="https://play.google.com/store/apps/details?id=com.littleiapps.missio" target="_blank"><img src="/web/images/google_play2.png" alt=""></a> </div>
    </section>
<section class="">
    <div class="sub-bottom">
        <div class="sub-bottom-tit">
            What we dream  alone remains a dream.
            What we dream together, can become a reality.
        </div>
        <div class="sub-bottom-btn"><a href="/about">Learn More About Missio</a></div>
    </div>
</section>


<script type="text/javascript">
$(document).ready(function() {
    changeImage();

      $('.forgetpw_form').on('submit', function (e) {
        $(this).removeClass('error');
        $('.alert_notmatch').addClass('hide');
        if ($('#pwd').val().length < 1) {
          $(this).addClass('error');
          return false;
        }
        if ($('#pwd').val() !== $('#conf_pwd').val()) {
          $(this).addClass('error');
          $('.alert_notmatch').removeClass('hide');
          return false;
        }
        $('#new_pwd').val($('#pwd').val());
      })
});


var currentImage = $('#copyrightimagecurrent').attr('src');
var mainImage = $('.main-image img');
var currText = $('.grab-txt');
function changeImage(){
    
    $('.copyright').hover(function(){
        
        var el =  $(this);

        imgUrl = el.data('image');
        txt = el.data('text');

        currText.html(txt);
        mainImage.attr('src',imgUrl)
    
    }, function(){
        currText.html(txt);
        mainImage.attr('src',currentImage)
    
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