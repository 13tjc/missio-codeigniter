<script type="text/javascript">
    missio.FILTER_LIST = <?php echo json_encode($data['filters'], false) ?>;
</script>
<section class="body_container">
    <div class="wrapper">
        <ul id="project_breadcrumb" class="breadcrumb">
            <li class="active"><a href="/">Missio</a></li>
            <li class="active">Resource Manager</li>
        </ul>
        <section class="project_topsec">
            <h1>Resource Manager</h1>
            <p>The Resource Manager allows you to update the resources on the Resource page of missio.org.</p>
        </section>
        <input name="page" id="page" type="hidden" value="1">
        <input name="order" id="order" type="hidden" value="date-desc">
        <form id="filter_form" name="filter_form">
            <div class="filter_row">
                <div class="right_box">
                    <div class="col">
                        <label>Sort By:</label>
                        <div class="input_box">
                            <select id="order_dd" onchange="$('#order').val($(this).val());missio.setQuery();">
                                <option value="date-desc" selected>Newest First</option>
                                <option value="date-asc">Oldest First</option>
                                <option value="title-asc">Title A-Z</option>
                                <option value="title-desc">Title Z-A</option>
                            </select>
                        </div>
                        <label>Search:</label>
                        <div class="input_box">
                            <input name="kw" id="kw" type="text" value="" placeholder="Title or Description">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="record_row">
            <span class="record_no"></span>
            <div class="paginator"></div>
        </div>
        <section class="update_sec resources">
            <h2>Resources</h2>
            <a href="#post_popup" class="red_btn fancybox popup_btn">Add a Resource</a>
            <div class="message-container delete-resource">
                <div id="global_editable_list_message" class="message"></div>
            </div>
            <ul class="list_sec" data-list="resources"></ul>
        </section>
    </div>
</section>
<ul id="editable_list_template" class="resources hidden">
    <li id="{id}">
        <div class="row">
            <div class="content">
                <div class="control-box">
                    <div class="edit-box">
                        <a href="#post_popup" class="edit-resource fancybox popup_btn" data-image="{image}" data-file="{file}" data-filters="{filters}">Edit</a>
                    </div>
                    <div class="delete-box">
                        <a class="delete-resource">Delete</a>
                        <div class="confirmation hidden">Are you sure?<br>
                            <a class="delete-confirm">Yes</a>
                            <a class="delete-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
                <figure><a href="#media_popup" class="fancybox media_btn"><img class="resource" width="auto" height="120" data-src="/resources/{image}" alt="{title}"></a></figure>
                <strong>Title : <data class="data-title">{title}</data></strong>
                <a href="/resources/{file}" target="_blank" class="file-link">View PDF</a>
                <div><b>Description :</b> <data class="data-description">{description}</data></div>
            </div>
            <ul class="filter_list"></ul>
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
    <form id="resource_form" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="file" id="file">
        <input type="hidden" name="file_pdf" id="file_pdf">
        <input type="hidden" name="MAX_FILE_SIZE" value="104857600" /> 
        <h2>Add/Edit a Resource</h2>
        <a href="#" class="cancel_btn">Cancel</a>
        <p>All images should be 4:3 ratio and in PNG or JPG format.</p>
        <div class="post_sec resource_mger">
            <fieldset>
                <div class="filter_row">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" maxlength="100">
                    </div>
                    <div>
                        <label for="subtitle">Description:</label>
                        <textarea name="description" id="description" ></textarea>
                    </div>
                    <div>
                        <label for="title">Filters:</label>
                        <input type="text" id="filter" name="filter">
                        <ul id="filter_list"></ul>
                    </div>
                </div>
                <div class="btn_row">
                    <input class="red_btn submit_button" type="submit" value="Save">
                    <div class="add_file_container">
                        <div class="add_file">
                            <input type="file" name="photo" class="fileupload" data-dir="resources">
                            <a href="#" class="red_btn gray_btn">Add Photo</a>
                        </div>
                        <input type="text" id="file_name" name="file_name">
                    </div>
                    <div class="add_file_container">
                        <div class="add_file">
                            <input type="file" name="document" class="fileupload" data-dir="resources">
                            <a href="#" class="red_btn gray_btn pdf">Add PDF</a>
                        </div>
                        <input type="text" id="file_name_pdf" name="file_name_pdf">
                    </div>
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