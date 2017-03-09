<?php  $project = $data['project']; ?>
<?php  $user    = $data['user'];    ?>


<section class="body_container">
    <div class="wrapper">
        <ul id="project_breadcrumb" class="breadcrumb">
            <li class="active"><a href="/">Missio</a></li>
            <li class="active"><a href="/dashboard/projects">Project Dashboard</a></li>
            <li><?php echo $project['name']; ?></li>
        </ul>
        <section id="project_details" class="project_topsec">
            <a href="#post_popup" class="red_btn fancybox">Add An Update</a>
            <h1><?php echo $project['name'] ?></h1>
            <figure class="pic">
                <img width="400" src="<?php echo $project['image'] ?>"  alt="<?php echo $project['name'] ?>">
                <span class="ribbon"> <?php echo $project['days_remaining'] ?><small>days left</small></span>
                <?php if($user['admin']): ?>
                <div class="spacer20"></div>
                <input type="checkbox" name="complete" id="complete" <?php if($project['complete']): ?> checked <?php endif; ?>> 
                <label for="complete">&nbsp;&nbsp;This project has been carried out and completed</label>
                <div class="message-container ">
                    <div id="project_complete_message" class="message"></div>
                </div>
                <?php endif; ?>
            </figure>
            <section class="description_sec">
                <h2><?php echo $project['name'] ?></h2>
                <article>
                    <div class="row">
                        <figure>
                            <img src="/web/images/follow_icon.png" alt=""> <small><?php echo $project['follows'] ?></small>
                        </figure>
                        <span><?php echo $project['city'] ?>, <?php echo $project['country'] ?><br><?php echo $project['subcategory'] ?>
                        </span>
                    </div>
                    <p><?php echo $project['description'] ?></p>
                </article>
                <?php $this->load->view('dashboard/_project_detail_stats', compact('project')); ?>
            </section>
        </section>
        <section class="organization_sec">
            <?php if ($project['organization_name']): ?>
            <h2>Organization Affiliations</h2>
            <div class="slider_sec">
                <ul>
                    <li><a href="#"><img src="/web/images/pin_icon.png"  alt=""></a>
                        <strong><a href="#"><?php echo $project['organization_name'] ?></a></strong>
                        <span><?php echo $project['organization_city'] ?>, <?php echo $project['organization_state'] ?>, <?php echo strtoupper($project['organization_country']) ?></span> 
                    </li>
                </ul>
            </div>
            <?php endif; ?>
        </section>
        <div class="record_row">
            <input name="page" id="page" type="hidden" value="1">
            <span class="record_no"></span>
            <div class="paginator"></div>
        </div>
        <section class="update_sec">
            <h2>Updates</h2>
            <a href="#post_popup" class="red_btn fancybox popup_btn">Add An Update</a>
            <div class="message-container delete-update">
                <div id="delete_update_message" class="message"></div>
            </div>
            <ul id="update_list"></ul>
        </section>
        <div class="record_row">
            <span class="record_no"></span>
            <div class="paginator"></div>
        </div>
    </div>
</section>
<ul id="update_list_template" class="hidden">
    <li id="{id}">
        <div class="row">
            <div class="control-box">
                <div class="delete-box">
                    <a class="delete-update">Delete</a>
                    <div class="confirmation hidden">Are you sure?<br>
                        <a class="delete-confirm">Yes</a>
                        <a class="delete-cancel">Cancel</a>
                    </div>
                </div>
            </div>
            <figure><img class="avatar" width="50" height="auto" data-src="{user_image}" alt="{user_fullname}"></figure>
            <strong>{user_fullname}</strong><span>{updated}</span>
        </div>
        <p>{message}</p>
    </li>
</ul>
<div class="popup" id="media_popup">
    <a href="#" class="close_btn">X</a>
    <div>
        <img>
        <div class="video"></div>
    </div>
</div>
<div class="popup" id="post_popup">
    <form id="add_update_form" enctype="multipart/form-data">
        <input type="text" name="user_id" value="<?php echo $user['id'] ?>">
        <input type="TEXT" name="project_id" id="project_id" value="<?php echo $project['id'] ?>">
        <input type="hidden" name="file" id="file">
        <input type="hidden" name="type" id="type">
        <input type="hidden" name="MAX_FILE_SIZE" value="104857600" /> 
        <h2>Post An Update</h2>
        <a href="#" class="cancel_btn">Cancel</a>
        <div class="post_sec">
            <figure><img width="50" height="auto" src="<?php echo $user['image'] ?>"  alt="<?php echo $user['fullName'] ?>"></figure>
            <div class="right_box">
                <div class="rg_box_lb">
                    <textarea name="message" maxlength="500"></textarea>
                    <span>(500 characters maximum)</span>
                </div>
                <div class="btn_row">
                    <input class="red_btn submit_button" type="submit" value="Post Update">
                    <div class="add_file">
                        <input type="file" name="photo" class="fileupload" data-dir="media">
                        <a href="#" class="gray_btn">Add Photo</a>
                    </div>
                    <div class="add_file">
                        <input type="file" name="video" class="fileupload" data-dir="media">
                        <a href="#" class="gray_btn video">Add Video</a>
                    </div>
                    <input type="text" id="file_name">
                </div>
                <div class="spacer20"></div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="message-container">
                    <div id="popup_message" class="message active"></div>
                </div>
            </div>
        </div>
    </form>
</div>