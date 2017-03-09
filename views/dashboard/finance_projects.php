<section class="body_container">
    <div class="wrapper">
        <section class="donor_sec">
            <ul class="breadcrumb">
                <li class="active"><a href="/">Missio</a></li>
                <li class="active"><a href="/dashboard/finance">Finance Dashboard</a></li>
                <li>Projects</li>
            </ul>
            <section class="list_sec" data-list="finance_project">
                <h1>Donor’s Project Activity</h1>
                <input name="page" id="page" type="hidden" value="1">
                <input name="order" id="order" type="hidden" value="startdate-desc">
                <div class="record_row">
                    <span class="record_no"></span>
                    <div class="paginator"></div>
                </div>
                <section class="project_chart">
                    <table>
                        <thead>
                            <tr id="sorter">
                                <th><span id="project">Project</span></span></th>
                                <th><span id="startdate">Start Date </span></th>
                                <th><span id="enddate">End Date </span></th>
                                <th><span id="goal" class="currency">Goal</span></th>
                                <th><span id="received" class="currency">Total Received</span></th>
                                <? if (!empty($data['user']['nation'])): ?>
                                    <th><span id="regiontotal">Country total</span></th>
                                <? elseif (!empty($data['user']['diocese'])): ?>
                                    <th><span id="regiontotal">Diocese total</span></th>
                                <? else: ?>
                                    <th></th>
                                <? endif; ?>
                                <th><span id="country">Created In</span></th>
                                <th><span id="affiliation">Parish Association</span></th>
                            </tr>
                        </thead>
                        <tbody id="generic_list"></tbody>
                    </table>
                </section>
                <div class="record_row">
                    <span class="record_no"></span>
                    <div class="paginator"></div>
                </div>
            </section>
        </section>
    </div>
</section>
<table class="hidden">
    <tbody id="list_item_template">
        <tr>
            <td><a href="/dashboard/finance/project/{id}">{project}</a></td>
            <td><a href="/dashboard/finance/project/{id}">{start_date}</a></td>
            <td><a href="/dashboard/finance/project/{id}">{end_date}</a></td>
            <td><a href="/dashboard/finance/project/{id}" class="currency">${goal}</a></td>
            <td><a href="/dashboard/finance/project/{id}" class="currency">${received}</a></td>
            <? if (!empty($data['user']['nation']) || !empty($data['user']['diocese'])): ?>
                <td><a href="/dashboard/finance/project/{id}" class="currency">${region_total}</a></td>
            <? else: ?>
                <td></td>
            <? endif; ?>
            <td><a href="/dashboard/finance/project/{id}">{country}</a></td>
            <td><a href="/dashboard/finance/project/{id}">{affiliation}</a></td>
        </tr>
    </tbody>
</table>