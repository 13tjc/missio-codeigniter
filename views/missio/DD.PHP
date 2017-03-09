[
{
project_no: 1759,
project_name: "Phase One",
description: " Phase One is a build-out of the"
},
{
project_no: 1189,
project_name: "College Level",
description: "The education system" 
},
{
project_no: 1756,
project_name: "name of project 3K",
description: "learn are The education system in The education system in"
}
]


<div class="cho-card-row">
		    <?php foreach ($prodlist as $row) {  ?>       
		    <div class="cho-card">
		        <div class="cho-card-img"> 
		            <!-- <img src="<?php echo $row['featured_image_url'];?> "> -->
		        </div>
		        <div class="cho-card-title">
		            <?php echo $row['project_name']; ?>
		        </div>
		        <div class="cho-card-desc">
		            <?php
		                $string = strip_tags($row['description']);
		                if (strlen($string) > 100) {
		                    $stringCut = substr($string, 0, 100);
		                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...'; 
		                }
		                echo $string;                                                  
		            ?>
		        </div>             
					<div id="fade" class="LB-black-overlay" onclick="if (!is_modal) HideLightBox(); return false;"></div>
					<div id="<?php echo $row['project_no']; ?>" class="LB-white-content">
					  <div class="close" onclick="HideLightBox(); return false;">X</div> 
						 <div class="prodpop">
						  <!-- 	<div class="img-pop">
						  		 <img src="<?php echo $row['featured_image_url'];?> ">
						  	</div>
						  	<div class="map-pop">
						  		 <img src="<?php echo $row['featured_image_url'];?> ">
						  	</div> 
						  	-->
						</div>
						<div class="prodside">
						  	<div class="title-pop">
						  		<?php echo $row['project_name']; ?>
						  	</div>
						  	<div class="desc-pop">
						  		<?php echo $row['description']; ?>
						  	</div>
						</div>
						<div class="prodinfo">
							<div class="left-info">
								<img src="https://missio.org/_media/8529386424254d82bdbc18e51035d3f1.jpg">
								<div class="name-info"><?php echo $row['project_leader_name']; ?></div>
								<div class=""><?php echo $row['institution_name']; ?></div>
								<div class=""><?php echo $row['diocese_name']; ?></div>
							</div>
							<div class="right-info">
								<div class="">$<?php echo $row['project_cost']; ?> Goal!</div>
								<div class="">help us get there!<br>Select you gift amopunt below.</div>
							</div>				
						</div>
					</div>
					<div id="OpenLightBox">
						<span id="lightboxspan" onclick="ShowLightBox('<?php echo $row['project_no'];?>'); return false;">Read more</span>
					</div>
			        <div class="select-card">
			        	Select
			        </div>          
		    </div>      
		    <?php  } ?>