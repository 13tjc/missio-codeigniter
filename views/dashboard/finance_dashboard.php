<script type="text/javascript">
    missio.FINANCE_CHARTS = <?= json_encode($data['stats'], false) ?>;
    <?php
    //$this->load->model('project','Projects');

    ?>
</script>
<section id="body_container" class="body_container corechart">
    <div class="wrapper">
        <section class="landing_sec">
            <ul class="breadcrumb">
                <li class="active"><a href="/">Missio</a></li>
                <li>Finance Dashboard</li>
            </ul>
            <h1>Missio Finance Dashboard</h1>
            <section class="donation_details">
                <h2>Donations <span>(<a href="/dashboard/finance/donation-flow">See Details</a>)</span> </h2>
                <div class="stats-period"> <strong>View:</strong>
                    <select class="period">
                        <option value="week">Week</option>
                        <option value="month">Month</option>
                    </select>
                </div>
                <section class="donate_sec">
                    <div class="col" id="donation_past">
                        <figure class="total">
                            <donutchart></donutchart>
                            <span>$<donation></donation> <strong><period></period></strong></span>
                        </figure>
                        <ul>
                            <li class="affiliated"><strong>Affiliated:</strong> $<donation></donation> from <donor></donor> donors</li>
                            <li class="unaffiliated"><span>Unaffiliated:</span> $<donation></donation> from <donor></donor> donors</li>
                            <li class="total"><strong>Total Donated:</strong> $<donation></donation> from <donor></donor> donors</li>
                        </ul>
                    </div>
                    <div class="col" id="donation_current">
                        <figure class="total">
                            <donutchart></donutchart>
                            <span>$<donation></donation> <strong><period></period></strong></span>
                        </figure>
                        <ul>
                            <li class="affiliated"><strong>Affiliated:</strong> $<donation></donation> from <donor></donor> donors</li>
                            <li class="unaffiliated"><span>Unaffiliated:</span> $<donation></donation> from <donor></donor> donors</li>
                            <li class="total"><strong>Total Donated:</strong> $<donation></donation> from <donor></donor> donors</li>
                        </ul>
                    </div>
                </section>
            </section>
            <section class="active_project" id="most_active_projects">
                <h2>Most Active Projects <span>(<a href="/dashboard/finance/projects">See All Projects</a>)</span> </h2>
                <div class="stats-period">
                    <strong>View:</strong>
                    <select class="period">
                        <option value="week">Week</option>
                        <option value="month">Month</option>
                    </select>
                </div>
                <linechart></linechart>
            </section>
            <section class="top_donor">
                <h2>Top Donors <span>(<a href="/dashboard/finance/donors">See All Donors</a>)</span> </h2>
                <div class="stats-period"> <strong>View:</strong>
                    <select class="period">
                        <option value="week">Week</option>
                        <option value="month">Month</option>
                    </select>
                </div>
                <section id="top_donors" class="box_details"></section>
            </section>
            <section class="sensitive_project">
                <h2>Time Sensitive Projects <span>(<a href="/dashboard/finance/projects">See All Projects</a>)</span> </h2>
                <section class="box_details">
                    
                </section>
            </section>
        </section>
    </div>
</section>
<div id="topdonor" class="hidden">
    <div class="col">
        <div class="details">
            <a>
                <figure><div class="image"></div>
                    <span class="donate_price">
                        <small>$<donated></donated><br>Donated</small>
                    </span> 
                </figure>
            </a>
        </div>
        <a>
            <h3><name></name></h3>
        </a>
        <p><affiliation></affiliation><br>
        Across <projects></projects><br>
        Member Since <since></since>
        </p>
    </div>
</div>