<section class="body_container">
    <div class="wrapper">
        <ul id="project_breadcrumb" class="breadcrumb">
            <li class="active"><a href="/">Missio</a></li>
            <li class="active"><a href="/dashboard/resource-manager">Resource Manager</a></li>
            <li class="active">Filters</li>
        </ul>
        <section class="project_topsec">
            <h1>Filter Manager</h1>
            <p>The Filter Manager allows you to update the filters.</p>
        </section>
        <input name="page" id="page" type="hidden" value="1">
        <input name="order" id="order" type="hidden" value="group-asc">
        <div class="record_row">
            <span class="record_no"></span>
            <div class="paginator"></div>
        </div>
        <section class="update_sec filters">
            <h2>Filters</h2>
            <a href="#post_popup" class="red_btn fancybox popup_btn">Add a Filter</a>
            <div class="message-container delete-filter">
                <div id="global_editable_list_message" class="message"></div>
            </div>
            <ul class="list_sec filter_list" data-list="filters"></ul>
        </section>
    </div>
</section>
<ul id="editable_list_template" class="filters hidden">
    <li id="{id}">
        <div class="row">
            <div class="content">
                <div class="control-box">
                    <div class="edit-box in-bl">
                        <a href="#post_popup" class="edit-filter fancybox popup_btn" data-filters="{filters}">Edit</a>
                    </div>
                    <div class="delete-box in-bl">
                        <a class="delete-filter">Delete</a>
                        <div class="confirmation hidden">Are you sure?<br>
                            <a class="delete-confirm">Yes</a>
                            <a class="delete-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
                <strong class="in-bl filter_title"><data class="data-title">{title}</data></strong><div class="in-bl"><data class="data-group">{group}</data></div>
            </div>
            <ul class="filter_list"></ul>
        </div>
    </li>
</ul>
<div class="popup filter_popup" id="post_popup">
    <form id="rfilter_form">
        <input type="hidden" name="id" id="id">
        <h2>Add/Edit a Filter</h2>
        <a href="#" class="cancel_btn">Cancel</a>
        <div class="post_sec">
            <fieldset>
                <div class="filter_row">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" maxlength="100">
                    </div>
                    <div>
                        <label for="group">Group:</label>
                        <select type="text" name="group" id="group">
                            <? foreach ($data['filter_groups'] as $g): ?>
                                <option value="<?= $g ?>"><?= $g ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="btn_row">
                    <input class="red_btn submit_button" type="submit" value="Save">
                    <div class="message-container">
                        <div id="popup_message" class="message active"></div>
                    </div>
            </fieldset>
        </div>
    </form>
</div>