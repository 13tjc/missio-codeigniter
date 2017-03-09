<section class="choose-bg">
</section>
<style>
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
    margin-bottom: 20px;
    width: 370px;
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
</style>



<h1 class="sub-sec-title2">Register</h1>

<div class="reg-bg">
<section class="body_container">
    <div class="wrapper">
        <section class="login_sec">      
            <aside class="login_form">
            <center>
            <form class="pure-form pure-form-stacked">
                <fieldset>
                    <legend>Join the Missio community.</legend>

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
            </aside>
            </center>
        </section>
    </div>
</section>
</div>






<script type="text/javascript">
                                
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
                       console.log(data);
                       alert("You are now part of the missio community Please Login");
                       window.location = "/";
                }
                });
    });

</script>