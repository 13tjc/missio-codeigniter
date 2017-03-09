<section class="body_container">
    <div class="wrapper">
        <ul class="breadcrumb">
            <li class="active"><a href="/">Missio</a></li>
            <li>Project Dashboard</li>
        </ul>
        <h1>Project Update Dashboard</h1>
        <h2>Welcome Project Leader!</h2>
        <br>
        <p>Thanks for sharing your good work on Missio!</p>
        <p>This page provides tools to help you connect with those who will support your project on Missio.  Through this page, you can communicate with those who have connected to your project, either by a donation (GIVE), a share on social media (SHARE), or an action of some kind (ACT).  You can also respond to their other posts – perhaps offer a word of encouragement or advice to something they posted on Missio related to your project.</p>
        <p>Some tips during the time your project is seeking support:</p>
        <ul class="lm1em">
            <li>Thank individuals – in the same stream of messages connected to your project – for their support!</li>
            <li>Share photographs from your project – or a video.  Share an event related to your project, or just a photo of something from everyday life where you are.</li>
            <li>Add to the details about your project. For example, if you seek money to build a classroom, talk to donors about the needs of one or two children and the impact a new classroom would have on these students.</li>
            <li>Ask supporters for something – to share your project, to say a prayer for something going on that day or week – and promise to pray in return.</li>
        </ul>
        <br>
        <p>Please contact <a href="mailto:missiohelp@missio.org">missiohelp@missio.org</a> if you need further assistance.</p>
        <p>Click <a href="http://www.propfaith.net/missio/" target="_blank">here </a> to add a new project.</p>
        <p>Welcome to the project update dashboard where you can update everyone following your project. <br>
            Remember to post an update about your active projects every few days! <br>
            To learn more, visit our <a href="/dashboard/projects/faqs">Tips & FAQs</a> page.
        </p>
        <section class="project_state">
            <h2>Project Stats</h2>
            <ul>
                <li><span>$<?= number_format($data['stats']['donation_total']) ?><br>Total Donations</span></li>
                <li><span><?= $data['stats']['share_total'] ?><br>Total Shares</span> </li>
                <li><span><?= $data['stats']['act_total'] ?><br>Total Acts</span> </li>
                <li><span>$<?= number_format($data['stats']['projects_funded']) ?><br>Fully Funded</span> </li>
                <li><span><?= round($data['stats']['success_rate'], 2) ?>%<br>Success Rate</span> </li>
            </ul>
        </section>
        <section class="list_sec" data-list="project">
            <h2>Projects</h2>
            <input name="page" id="page" type="hidden" value="1">
            <input name="order" id="order" type="hidden" value="name-asc">
            <form id="filter_form" name="filter_form">
                <div class="filter_row">
                    <h3>Filters:</h3>
                    <div class="right_box">
                        <div class="col">
                            <label>Project Destination</label>
                            <div class="input_box">
                                <input id="dest_dd" type="text" placeholder="Search">
                                <input name="destination" id="destination" type="hidden">
                            </div>
                        </div>
                        <div class="col">
                            <label>Days Left</label>
                            <div class="select_box" id="remaining_days">
                                <select name="daysremaining">
                                    <option value="">All</option>
                                    <option value="0-5">0-5</option>
                                    <option value="5-10">5-10</option>
                                    <option value="10-20">10-20</option>
                                    <option value="20plus">20+</option>
                                    <option value="cmplt">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>Percent Funded</label>
                            <div class="select_box" id="percent_funded">
                                <select name="percentfunded">
                                    <option value="">All</option>
                                    <option value="0-25">0-25%</option>
                                    <option value="25-50">25%-50%</option>
                                    <option value="50-75">50%-75%</option>
                                    <option value="75-100">75%-100%</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="record_row">
                <span class="record_no"></span>
                <div class="paginator"></div>
            </div>
            <section class="project_chart">
                <table>
                    <thead>
                        <tr id="sorter">
                            <th><span id="name">Project Name</span></th>
                            <th><span id="status">Project Status </span></th>
                            <th><span id="startdate">Start Date </span></th>
                            <th><span id="enddate">End Date </span></th>
                            <th><span id="donated" class="currency">Total Donated </span></th>
                            <th><span id="shares">Shares </span></th>
                            <th><span id="acts">Acts </span></th>
                            <th><span id="country">Project Destination</span></th>
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
    </div>
</section>
<table class="hidden">
    <tbody id="list_item_template">
        <tr>
            <td><a href="/dashboard/project/{id}">{project_name}</a></td>
            <td><a href="/dashboard/project/{id}">{project_status}</a></td>
            <td><a href="/dashboard/project/{id}">{project_start_date}</a></td>
            <td><a href="/dashboard/project/{id}">{project_end_date}</a></td>
            <td><a href="/dashboard/project/{id}" class="currency">${total_contributions}</a></td>
            <td><a href="/dashboard/project/{id}">{share_count}</a></td>
            <td><a href="/dashboard/project/{id}">{act_count}</a></td>
            <td><a href="/dashboard/project/{id}">{country}</a></td>
        </tr>
    </tbody>
</table>