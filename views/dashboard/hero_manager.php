<? $user = $data['user'] ?>
<section class="body_container">
    <div class="wrapper">
        <ul id="project_breadcrumb" class="breadcrumb">
            <li class="active"><a href="/">Missio</a></li>
            <li class="active">Hero Manager</li>
        </ul>
        <section class="project_topsec">
            <h1>Hero Manager</h1>
            <p>The Hero Manager allows you to update the banners on the Home page of missio.org. You can drag and drop tiles below to reorder the banners or hide one of the slots.</p>
            <p>Only 5 hero uploads allowed at one time. If all spaces are filled and a new hero is added, the last hero upload will be removed. Only the first 4 hero uploads will appear on the front end site.</p>
        </section>
        <section class="update_sec">
            <h2>Heros</h2>
            <a class="green_btn reorder">Reorder</a>
            <a class="red_btn resetorder">Reset Order</a>
            <a href="#post_popup" class="red_btn fancybox popup_btn">Add a Hero</a>
            <div class="message-container delete-hero">
                <div id="global_editable_list_message" class="message"></div>
            </div>
            <ul id="editable_list" class="heros"></ul>
        </section>
    </div>
</section>
<ul id="editable_list_template" class="heros hidden">
    <li id="{id}">
        <div class="row">
            <div class="control-box">
                <div class="edit-box">
                    <a href="#post_popup" class="edit-hero fancybox popup_btn" data-image="{image}">Edit</a>
                </div>
                <div class="delete-box">
                    <a class="delete-hero">Delete</a>
                    <div class="confirmation hidden">Are you sure?<br>
                        <a class="delete-confirm">Yes</a>
                        <a class="delete-cancel">Cancel</a>
                    </div>
                </div>
            </div>
            <figure><a href="#media_popup" class="fancybox media_btn"><img class="hero" width="160" height="auto" data-src="/carousel/{image}" alt="{title}"></a></figure>
            <strong>Title : <data class="data-title">{title}</data></strong>
            <div><b>Subtitle :</b> <data class="data-subtitle">{subtitle}</data></div>
            <div><b>Link :</b> <a href="{url}"><data class="data-url">{url}</data></a></div>
            <div><b>Order :</b> <data class="data-title">{order}</data></div>
        </div>
    </li>
</ul>
<div class="popup" id="media_popup">
    <a href="#" class="close_btn">X</a>
    <div>
        <img>
    </div>
</div>
<div class="popup" id="post_popup">
    <form id="hero_form" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="file" id="file">
        <input type="hidden" name="MAX_FILE_SIZE" value="104857600" /> 
        <h2>Add/Edit a Hero</h2>
        <a href="#" class="cancel_btn">Cancel</a>
        <p>All images should be 4:3 ratio and in PNG or JPG format.</p>
        <p>Destination URLs are optional, however, if one banner has a destination then all of them should for a
            consistent user experience.</p>
        <div class="post_sec hero_mger">
            <fieldset>
                <div class="filter_row">
                    <div>
                        <label for="title">Title: <span>(42 characters maximum)</span> </label>
                        <input type="text" name="title" id="title" maxlength="42">
                    </div>
                    <div>
                        <label for="subtitle">Subtitle: <span>(30 characters maximum)</span> </label>
                        <input type="text" name="subtitle" id="subtitle" maxlength="30">
                    </div>
                    <div>
                        <label for="url">Link: </label>
                        <input type="text" name="url" id="url">
                    </div>
                </div>
                <div class="btn_row">
                    <input class="red_btn submit_button" type="submit" value="Save">
                    <div class="add_file">
                        <input type="file" name="photo" class="fileupload" data-dir="carousel">
                        <a href="#" class="red_btn gray_btn">Add Photo</a>
                    </div>
                    <input type="text" id="file_name" name="file_name">
                </div>
                <div class="spacer20"></div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="message-container">
                    <div id="popup_message" class="message active"></div>
                </div>
            </fieldset>
        </div>
    </form>
</div>