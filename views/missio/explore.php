<section class="choose-bg">
</section>
<section class="explore-main">
<div class="filters-main">
 <div class="fil-title"></div>
  <!-- <div class="fil-type">Project Status</div>
    <div class="fil-type">Project Category</div>
    <div class="fil-type">Geographic Region</div>
    <div class="fil-type">Project Type</div>-->

<style>
.cd-accordion-menu a {
    color: #6b6b6b;
    }

.cd-accordion-menu input[type=checkbox] {
    /* hide native checkbox */
    position: absolute;
    opacity: 0;
}
.cd-accordion-menu label, .cd-accordion-menu a {
    position: relative;
    display: block;
   
}
.cd-accordion-menu li {
    list-style-type: none;
    color: #6b6b6b;
    font-size: 15px;
    padding-bottom: 8px;
}


.cd-accordion-menu ul {
    /* by default hide all sub menus */
    display: none;
}
 
.cd-accordion-menu input[type=checkbox]:checked + label + ul,
.cd-accordion-menu input[type=checkbox]:checked + label:nth-of-type(n) + ul {
    /* use label:nth-of-type(n) to fix a bug on safari (<= 8.0.8) with multiple adjacent-sibling selectors*/
    /* show children when item is checked */
    display: block;
}


.subMenu{
margin: 12px 0 0 0;
}
.subMenu2{
margin: 14px 0 10px 45px;
}

.accordian-button{
    text-align: center;
    font-weight: 600;
    width: 209px;
    height: 24px;
    border-radius: 5px;
    padding-top: 4px;
    font-size: 13px !important;

}
.accordian-whiteButton{
    background-color: #fff;
    border-style: solid;
    border-color: #6b6b6b;
    border-width: 1px;
}

.accordian-redButton{
  /*  background-color: #e2241b;*/
    color: #000;
    text-align: left;
}

a.hoverLink {
    color:#6b6b6b;
   
 
    cursor: pointer;

}

a.hoverLink:hover {
      cursor: pointer;
    color:#ffc60b;
}

</style>

<ul id="exloreMenu" class="cd-accordion-menu fil-type">

    
    <li class="has-children">
        <input type="checkbox" name="group-1" id="group-1" checked="">
        <label for="group-1">Project Category</label>
 
        <ul>
            <li class="has-children">
                <input type="checkbox" name="sub-group-1" id="sub-group-1">
                <label id="fe-filter" for="sub-group-1" class="subMenu accordian-button accordian-redButton">Faith &amp; Empowerment</label>
                
                <ul id="f-one">

                    <!-- <li class="subMenu2"><a href="#0" class="hoverLink">Orphanage</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Homes for Children</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Homes for Elderly or Chronically Ill</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Homes for Children / Adults with Special Needs</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Advocacy (Human Trafficking/ Child Labor <br> / Child Soldiers / Child Brides)</a></li> -->
                </ul>
            

            </li><li class="has-children">
                <input type="checkbox" name="sub-group-2" id="sub-group-2">
                <label id="he-filter" for="sub-group-2" class="unselected-subMenu accordian-button accordian-redButton">Hope &amp; Education</label>
                 <ul id="f-two">

                   <!--  <li class="subMenu2"><a href="#0" class="hoverLink">Infant (nursery)</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Primary Secondary (HS)</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">University</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Vocational</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Seminary</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Novitiate</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Catechist</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Training</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Other</a></li> -->
                </ul>
        </li>

             <li class="has-children">
                <input type="checkbox" name="sub-group-3" id="sub-group-3">
                <label id="ls-filter" for="sub-group-3" class="unselected-subMenu accordian-button accordian-redButton">Love &amp; Service</label>
                 <ul id="f-three">

                  <!--   <li class="subMenu2"><a href="#0" class="hoverLink">Clinics</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Dispensaries</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Hospitals</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Infectious Disease (AIDS/Ebola)</a></li>
                    <li class="subMenu2"><a href="#0" class="hoverLink">Nutrition</a></li> -->

                </ul>
        </li>
 </ul>
            </li><li class="has-children">
                <input type="checkbox" name="sub-group-4" id="sub-group-4">
                <label for="sub-group-4" class="">Geographic Region</label>
                 <ul>
                    <li id="af-filter" class="subMenu2"><a class="hoverLink">Africa</a></li>
                    <li id="as-filter" class="subMenu2"><a class="hoverLink">Asia</a></li>
                    <li id="la-filter" class="subMenu2"><a class="hoverLink">Latin America</a></li>
                    <li id="oc-filter" class="subMenu2"><a class="hoverLink">Oceania</a></li>
                    <li id="eu-filter" class="subMenu2"><a class="hoverLink">Europe</a></li>
                </ul></li>

    
    <li class="has-children">
                <input type="checkbox" name="sub-group-5" id="sub-group-5">
                <label for="sub-group-5" class="">Fundraising Goal </label>
                 <ul>
                    <li id="5-filter" class="subMenu2"><a href="#0" class="hoverLink">500-1500</a></li>
                    <li id="15-filter" class="subMenu2"><a href="#0" class="hoverLink">1500-2500</a></li>
                    <li id="25-filter" class="subMenu2"><a href="#0" class="hoverLink">2500-3500</a></li>
                    <li id="35-filter" class="subMenu2"><a href="#0" class="hoverLink">3500-4500</a></li>
                    <li id="45-filter" class="subMenu2"><a href="#0" class="hoverLink">4500-5000</a></li>
                    <li id="50-filter" class="subMenu2"><a href="#0" class="hoverLink">5000+</a></li>
                   
                </ul></li>

    
</ul> <!-- cd-accordion-menu <div id="cat"></div>-->


</div>

    <div class="proj-main">
        <div class="active-filters"></div>
       
        <div class="proj-list-a"></div>
        
        <?php /* foreach (array_slice($data['proj'], 0, 10) as $roww) {  ?>
           

                    <div class="proj-img">
                     <a href="/project/'+item.project_no+'">
                        <img src="'+item.featured_image_url+'">
                     </a>
                    </div>
                    <div class="proj-det">
                        <div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div>
                        <a href="/project/'+item.project_no+'">
                         <div class="proj-title">'+ item.project_name +'</div>
                        </a>

                        <div class="proj-desc">' + item.description.substr(0, 170) + ' </div>
                        <div class="proj-info">
                            <div class="proj-goal">Fundraising Goal:<div class="pg-g">$'+ item.project_cost +'</div></div>
                            <div class="proj-amount">Amount Raised:<div class="pg-g">$'+ item.ns_total_donation +'</div></div>
                            <div class="proj-days">How Many Benefit<div class="pg-g">'+itemhowmanybenefit+'</div></div>
                        </div>
                        <a href="/project/'+item.project_no+'">
                            <div class="see-proj">See Project</div>
                        </a>
                        <!-- <div class="don-proj">Donate</div> -->
                    </div>


        <?php } */?>

       
           
    </div>
</section>

<script type="text/javascript">

$(document).ready(function() {

$.ajax({
    type:"GET",
    url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102",
    dataType: "json",
    success: function (response) {
        console.log(response);
            var trHTML = '';
            $.each(response, function (i, item) {

            
            trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   




            });           

                $('div.proj-list-a').html(trHTML);



        
     }
});



$.ajax({
    type:"GET",
    url:"https://www.propfaith.net/missioapi/v1/projectcategories?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93",
    dataType: "json",
    success: function (response) {
              var one = '';
              var two = '';
              var three = '';
            $.each(response, function (i, item) {
                 console.log(item);
                 if (item.category_no == 102) {
                        $.each(item.sub_categories, function (t, items) {

                                 one +=    '<li class="subMenu2" data-value="'+items.sub_category_no+'" class="hoverLink"><a data-value="'+items.description+'"  class="hoverLink">'+items.description+'</a></li>';                  
                                   

                        }); 
                };
                  if (item.category_no == 100) {
                        $.each(item.sub_categories, function (t, items) {

                                 two +=    '<li class="subMenu2" data-value="'+items.sub_category_no+'" class="hoverLink"><a  data-value="'+items.description+'" class="hoverLink">'+items.description+'</a></li>';                  
                                  

                        }); 
                };
                  if (item.category_no == 101) {
                        $.each(item.sub_categories, function (t, items) {

                                 three +=    '<li class="subMenu2" data-value="'+items.sub_category_no+'" class="hoverLink"><a  class="hoverLink">'+items.description+'</a></li>';                  
                                

                        }); 
                };

            });           

            $('#f-one').html(one);
            $('#f-two').html(two);
            $('#f-three').html(three);



            $('#f-two').on('click', '.subMenu2', function () {
                    var d = $(this).data('value');      
                    //alert(d);  
                    $('#cat').html(d);

                    var urltwo = "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100&project_subcategory="+d;
                      // alert(urltwo);

                    $.ajax({
                        type:"GET",
                        url: urltwo,
                         dataType: "json",
                        success: function (response) {

                            console.log(response);
                                var trHTML = '';

                                $.each(response, function (i, item) {


                                trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                                });
                                $('div.proj-list-a').html(trHTML);

                        
                         }
                   });
                  


                 
            } );
            $('#f-one').on('click', '.subMenu2', function () {
                    var d = $(this).data('value');      
                    //alert(d);  
                    $('#cat').html(d);

                    var urltwo = "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=102&project_subcategory="+d;
                      // alert(urltwo);

                    $.ajax({
                        type:"GET",
                        url: urltwo,
                         dataType: "json",
                        success: function (response) {

                            console.log(response);
                                var trHTML = '';

                                $.each(response, function (i, item) {


                                trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                                });
                                $('div.proj-list-a').html(trHTML);

                        
                         }
                   });
                  


                 
            } );
             $('#f-three').on('click', '.subMenu2', function () {
                    var d = $(this).data('value');      
                    //alert(d);  
                    $('#cat').html(d);

                    var urltwo = "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=101&project_subcategory="+d;
                      // alert(urltwo);

                    $.ajax({
                        type:"GET",
                        url: urltwo,
                         dataType: "json",
                        success: function (response) {

                            console.log(response);
                                var trHTML = '';

                                $.each(response, function (i, item) {


                                trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                                });
                                $('div.proj-list-a').html(trHTML);

                        
                         }
                   });
                  


                 
            } );
            
     }


});



//------------------------------------------------------------------------------

    $('#fe-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=102",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

//------------------------------------------------------------------------------

//------------------------------------------------------------------------------

    $('#he-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

//------------------------------------------------------------------------------


//------------------------------------------------------------------------------

    $('#ls-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=101",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

//------------------------------------------------------------------------------



  $('#oc-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102&continent=oceania",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });
//------------------------------------------------------------------------------



  $('#af-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102&continent=africa",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

//------------------------------------------------------------------------------



  $('#as-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102&continent=asia",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

//------------------------------------------------------------------------------



  $('#la-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102&continent=latin america",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });
//------------------------------------------------------------------------------



  $('#oc-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102&continent=oceania",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });
//------------------------------------------------------------------------------



  $('#eu-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_category=100|101|102&continent=europe",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });


//------------------------------------------------------------------------------



  $('#5-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_cost=500-1500",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });



  $('#15-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_cost=1501-2500",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });
  $('#25-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_cost=2501-3500",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

  $('#35-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_cost=3501-4500",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

    $('#45-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_cost=4501-5000",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });

    $('#50-filter').click(function() {
            $.ajax({
                type:"GET",
                url: "https://www.propfaith.net/missioapi/v1/projects?auth_token=4b393c61-f9ec-4c5f-9133-0ff01fb86a93&project_cost=5001-50000",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                        var trHTML = '';

                        $.each(response, function (i, item) {


                             trHTML += '<div class="proj-list"><div class="proj-img"><a href="/project/'+item.project_no+'"><img src="'+item.featured_image_url+'"></a></div><div class="proj-det"><div class="proj-cat">'+ item.type_description + ' | ' + item.country + ' | ' + item.category_description + '</div><a href="/project/'+item.project_no+'"><div class="proj-title">'+ item.project_name +'</div></a><div class="proj-desc">' + item.description.substr(0, 170) + ' </div><div class="proj-info"><div class="proj-goal">Fundraising Goal:<div class="pg-g">$' + item.project_cost + '</div></div><div class="proj-amount">Amount Raised:<div class="pg-g">$' + item.ns_total_donation + '</div></div></div><a href="/project/'+item.project_no+'"><div class="see-proj">Read More | Donate</div></a></div></div>';   


                        });
                        $('div.proj-list-a').html(trHTML);

                
                 }
           });

    });










});
</script>






