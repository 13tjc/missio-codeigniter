<style type="text/css">
    .fgotx{
        display: inline-block;
        float: right;
        color: #fff;
        padding-top: 10px;
        cursor: pointer;
    }

 .form-field {
    border: 1px solid #e91414;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    color: #999;
    -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
    -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
    box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
    padding: 8px;
    margin-bottom: 10px;
    width: 370px;
}

div#close-bar1 {
    cursor: pointer;
}



.labelChoose {
    color: #e91414;
    font-family: 'vag_roundedregular', sans-serif;
    width:124px;

}

.sub-sec-title2 {
    text-align: center;
    color: #e91414;
    font-size: 32px;
    padding-top: 50px;
    letter-spacing: 2px;
    font-family: 'vag_roundedbold', sans-serif;
    width: 100%;
    text-align: center;
    padding-left: 180px;
    padding-right: 150px;
    padding-bottom: 25px;
    clear: both;
}

 ul { list-style: none; margin: 0; padding: 0; }
  li { margin: .2em 0; }
  
  #login_forgotpw_form label { 
    float: left; 
    width: 200px; 
    margin-right: 15px; 
    text-align: right; 
        margin-left: 10%;
      
  }
#submitButton {
    background-color: #d6241b;
    width: 200px;
    text-align: center;
    height: 24px;
    font-family: 'vag_roundedbold', sans-serif;
    color: #fff;
    font-size: 13px;
    padding-top: 4px;
    border-radius: 7px;
    letter-spacing: 1.5px;
    cursor: pointer;
    margin: 0 auto;
}

.whiteText {
    background-color: #e2241b;
    color: #fff !important;
}

.submitSpacing{
    padding-left: 41%;
   }

label#email-error.error{
float:  none;  
padding: 8px !important;
    margin: 0 !important;
}

.message-container{
    text-align: center;
    margin-left: 25px;

}

.reg-login {
    display: none;
    background: #fff;
    position: absolute;
    z-index: 9999;
    height: 125px;
    background: blue;
    background: -webkit-linear-gradient(left, #990000 , red);
    background: -o-linear-gradient(right, #990000, red);
    background: -moz-linear-gradient(right, #990000, red);
    background: linear-gradient(to right,#990000 , red);
    width: 100%;
    margin-top: -89px;
}

.registerInputSize{
    width: 268px !important;
    height: 29px;
    border-radius: 3px;
    margin-right: 3px;
    background: #f5cece;
    font-size: 12px;
}

.registerBox{

    margin: 0 auto;
}

#log-submit {
    width: 45px;
    height: 22px;
    font-size: 12px;
    border-color: #fff;
    border-width: 1px;
    border-style: solid;
    border-radius: 3px;
    background-color: red;
    color: #fff !important;
    font-weight: bold;
}

.r-tex3 {
    color: #fff;
    font-size: 13px;
    font-weight: 800 !important;
    font-family: 'vag_roundedregular';
    letter-spacing: .2px;
    line-height: 16.4px;
    cursor: pointer;
}
</style>
<header>
    <input id="token" type="hidden">
    <div class="">
        <div class="blk-1">
            <div class="nav-login">
              <!--   <form id="login_forgotpw_form" action="/wapi/login" novalidate="novalidate"> -->
                    <div class="err-hp"></div>
                    <div class="fgotx">Forgot Password?</div>
                    <div class="nav-log">Login
                        <input id="log-email" id="email" name="email" type="email" placeholder="email">
                        <input id="log-password" id="password" name="password" type="password" placeholder="**********">
                        <input id="log-submit" id="submit"  class="nav-go" type="submit" value="GO">
                        <div id="close-bar"> X </div>
                    </div>
           <!--      </form> -->
               <!--  

<input type="hidden" id="about-email"  name="email" class="form-control" placeholder="Email address" required="" autofocus="">

<input type="hidden" id="about-password"  name="password" class="form-control" placeholder="Password" required=""><br>
<button  id="signon" name="login_submit" type="submit">Sign in</button>
    





               <form id="login_forgotpw_form" action="/wapi/login" novalidate="novalidate">
                    <fieldset>
                        <h2>Log In</h2>
                        <div class="f_row">
                            <label>Email</label>
                            <a id="login_link" class="forgot_link hidden">login</a>
                            <input id="email" name="email" type="email" placeholder="email" aria-required="true" aria-invalid="false" class="valid">
                        </div>
                        <div class="f_row password">
                            <label>Password</label>
                            <a id="forgotpw_link" class="forgot_link">forgot password?</a>
                            <input id="password" name="password" type="password" placeholder="**********">
                        </div>
                        <input id="submit" type="submit" value="Login">
                    </fieldset>
                    <div class="message-container">
                        <div class="message"></div>
                    </div>
                </form> -->

            </div>
            <a href="/" class="logo">
                <img src="/web/images/Logo-missio.png" alt="">
            </a>
            <a href="#" class="toggle_menu"><span></span></a>
            <!-- <div class="us"></div>
            <div class="lower-head">Powered by The Pontifical Mission Societies</div> -->
        </div>
      

            <div class="reg-login" style="display: none;">
              <!--   <form id="login_forgotpw_form" action="/wapi/login" novalidate="novalidate"> -->
                    <div class="err-hp"></div>
                     <div class="registerBox">
                    <div class="reg-log" style="color:#fff; margin-top: 10px; text-align: center;">Please Fill in the Following Fields to Register a New Account<br>  <div id="close-bar1" style="float: right; margin-top: -16px; padding-right: 31px;"> X </div>   <br>  
                        <input id="reg-email" class="form-field registerInputSize" type="email" placeholder="Email Address">
                        <input id="reg-first" class="form-field registerInputSize"  type="text" placeholder="First Name">
                        <input id="reg-last" class="form-field registerInputSize"  type="text" placeholder="Last Name"> <br>   
                        <input id="" class="form-field registerInputSize" type="password" placeholder="Password">
                        <input id="reg-password" class="form-field registerInputSize" type="password" placeholder="Confirm Password">
                        <input id="reg-submit" class="nav-go registerInputSize" type="submit" value="Submit"><br> 
                    </div></div>
        




            </div>  
              <a href="#" class="toggle_menu"><span></span></a>






        <nav>
            <ul class="nav_bar">
                <li>
                    <a href="/explore">Explore and Donate</a>
                    <div class="sub-tab">
                        <a href="/explore">View Projects</a>
                        <a href="/explore">Make a Donation</a>
                    </div>
                </li>
                <li>
                    <a href="/choose">Choose</a>
                     <div class="sub-tab">
                        <a href="/choose">Fundraise for an</a>
                        <a href="/choose">Existing Project</a>
                    </div>
                </li>
                <li>
                    <a href="/create-project">Create a project</a>
                     <div class="sub-tab">
                        <a href="/create-project">Start a New</a>
                        <a href="/create-project">Fundraising Project</a>
                    </div>
                </li>
                <li>
                    <a href="/faqs">FAQs</a>
                      <div class="sub-tab">
                        <a>Learn More about</a>
                        <a href="/faqs">the Process</a>
                    </div>
                </li>
                <li>
                    <a href="/resources">Resources</a>
                      <div class="sub-tab">
                        <a href="/resources">Search for Parish and</a>
                        <a href="/resources">Catechetical Resources</a>
                    </div>
                </li>
               
                
            </ul>
        </nav>

        <div class="right">
            <div class="r-tex"><span><!-- <a href="">Search %</a>  |--> <a href="/contact"> Contact Us</a></span></div>
            

            <div id="login-bar" class="r-tex"><span id="xxvi">Login</span> | 
          
                   <div id="register-bar" class="r-tex3" style="display:inline;"><span> Register</span></div> 
          
        </div>

    </div>
</header>
<input type="hidden" id="cd2pass" >
<input type="hidden" id="firstname" >
<input id="token" type="hidden">
<script type="text/javascript">
$(document).ready(function() {
      
   var  token = $.session.get("token");
   var  fn = $.session.get("firstname");
   var  fun = $.session.get("fundraiser");

  if (token){
    $("#login-bar").html("<span id='xcii'>Hi, "+fn+" ▼</span><div class='dash-log arrow_box' style='display:none'> <ul><li><a><span class='my-fundr'>My Fundraiser</span></a></li><li><a href='/my-dashboard'><span class='my-profile'>My Profile</span></a></li><li><a><div id='logouthp'>Log Out</div></a></li></ul></div>");
  };

  
 // if (fun == null) {
 //    $(".my-fundr").hide();
 //  };
if (fun === 'undefined' || !fun) {
 $(".dash-log li:first-child").hide();
};

$('.fgotx').click(function() {
            var fEmail = $('#log-email').val();

            $.ajax({
                url: "/api/forgot",
                datatype:"json",
                type: "POST",
                headers: {  
                    'Content-Type' : 'application/json',
                    'Access-Token' : 'CWku8OjaTFPWSq0w',
                },
                data: JSON.stringify({

                    email: fEmail,
                   

                    }), 
                    success:function(data){
                        console.log(data);

                         $('.fgotx').html(data.message);

                    if(data.success == false){
                         $( ".fgotx" ).html('Enter email and click here');
                       
                       }

                   }
              });
        });




$('#logouthp').click(function() {

$.session.remove("token");
$.session.remove("hash");
$.session.remove("email");
$.session.remove("firstname");
$.session.remove("fundraiser");                       
  window.location = "";
}); 



$('#log-submit').click(function() {
            var em  = $("#log-email").val();
            var pw = $("#log-password").val();
        
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
                        console.log(data);
                          window.location = "";
                        if(data.success == true){ 

                            $.each(data, function (i, item) {
                           
                                $.session.set("token", item.token);
                                // alert($.session.get("token"));
                                // console.log(item);
                                // console.log(item.user_id);
                                // console.log(item.token);

                                $.session.set("hash", item.hash);
                                $.session.set("email", em);
                                $.session.set("firstname", item.first_name);
                                $.session.set("fundraiser", item.fundraiser);

                                $('#cd2pass').val(item.hash);
                                $('#token').val(item.token);
                                $('#firstname').val(item.first_name);
                              
                             });


                        } else {
                                $('.err-hp').html("error try again!");
                        }
                           

                                            
                }
                });
        }); 
 $('#reg-submit').click(function() {
            var emailReg  = $("#reg-email").val();
            var passwordReg = $("#reg-password").val();
            var firstReg = $("#reg-first").val();
            var lastReg = $("#reg-last").val();
        
            $.ajax({
                url: '/api/register',
                datatype:"json",
                type: "POST",
                headers: {  
                    'Content-Type' : 'application/json',
                    'Access-Token' : 'CWku8OjaTFPWSq0w'
                },
                data: JSON.stringify({
                            email: emailReg,
                            password: passwordReg,
                            firstName: firstReg,
                            lastName: lastReg,
                        }),                                     
                    
                    success:function(data){
                       console.log(data);
                            window.location = "";
                        if(data.success == true){ 

                            $.each(data, function (i, item) {
                           
                                $.session.set("token", item.token);
                                // alert($.session.get("token"));
                                // console.log(item);
                                // console.log(item.user_id);
                                // console.log(item.token);
                                $.session.set("hash", item.hash);
                                $.session.set("email", emailReg);
                                $.session.set("firstname", firstReg);
                                $.session.set("fundraiser", item.fundraiser);

                                //  $.session.set("hash", item.hash);
                                //  $.session.set("email", em);

                                // $('#cd2pass').val(item.hash);
                                // $('#token').val(item.token);
                                window.location = "";

                             });
                      

                        } else {

                                $('.err-hp').html("error try again!");
                        }
                           

                                            
                },
                error: function (error) {  
                 console.log(error);
                 
                }
                });
        }); 
         



    $('#xxvi ').click(function() {
        $(".nav-login").show();
    });
    $('#close-bar').click(function() {
        $(".nav-login").hide();
    });

  $('.r-tex3 span').click(function() {
        $(".reg-login").show();
    });
    $('#close-bar1').click(function() {
        $(".reg-login").hide();
    });

     $('#xcii').click(function() {
        $(".dash-log").toggle();
    });





    $("#login_forgotpw_form").submit(function(a) {
            a.preventDefault()
        }).validate({
            rules: {
                email: {
                    required: !0,
                    email: !0
                },
                password: {
                    required: !0,
                    minlength: 6
                }
            },

            submitHandler: function(a) {

                $.post($(a).attr("action"), $(a).serialize()).done(function(b) {
                    var c = null;
                    b.success && ("/wapi/login" === $(a).attr("action") ? window.location.href = window.location.pathname.indexOf("login") ? "/dashboard/" : window.location.pathname : c = function() {
                        a.reset()
                    }), missio.handleMessage(a, b, c)

                }).fail(function() {
                    missio.handleMessage(a)
                })
            }
        })


$('.my-fundr').click(function() {

    var cd2Email =  $.session.get("email"); //$('#log-email').val();
    var cd2pw =   $.session.get("hash");//$("#cd2pass").val();

      $.ajax({
        url: "https://mcfdapi.cd2learning.com/Access",
        datatype:"json",
        type: "POST",
        headers: {  
            "Content-Type" : "application/json",
            "Authorization-Key" : "hj9lX6393prnRz96s'2wrU$7SoJsd7"
        },
        data: JSON.stringify({

            CD2UserName: cd2Email,

            CD2UserPassword: cd2pw

            }), 
            success:function(data){
                console.log(data);
                
                var url = data.FullLoginURL;
                
                window.open(url, "_self");
            


           }
      });
});

























































});
</script>













