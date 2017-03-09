<section class="body_container">
    <div class="wrapper">
        <section class="donation_flow">
            <ul class="breadcrumb">
                <li class="active"><a href="/">Missio</a></li>
                <li class="active"><a href="/dashboard/finance">Finance Dashboard</a></li>
                <li class="active"><a href="/dashboard/finance/donation-flow">Donation Flow</a></li>
                <li class="active"><a href="/dashboard/finance/donation-flow/us">US</a></li>
                <li><?= $data['state_name'] ?></li>
            </ul>
            <section class="list_sec" data-list="finance_donation_flow_state" data-id="us/<?= $data['state'] ?>">
                <input name="page" id="page" type="hidden" value="1">
                <input name="order" id="order" type="hidden" value="diocese-asc">
                <h1>Donation Flow</h1>
                <form id="filter_form" name="filter_form">
                    <div class="filter_row">
                        <h3>Filters:</h3>
                        <div class="right_box">
                            <div class="col">
                                <label>Filter By Date</label>
                                <div class="input_box">
                                    <input id="daterange" type="text">
                                    <input name="start" id="start" type="hidden">
                                    <input name="end" id="end" type="hidden">
                                </div>
                            </div>
                        </div>
                </form>
                <div class="clear-both spacer20"></div>
                <? $this->load->view('dashboard/_region_totals'); ?>
                <div class="clear-both"></div>
                <div id="us_map"></div>
                <div class="spacer20"></div>
                <div class="record_row">
                    <span class="record_no"></span>
                    <div class="paginator"></div>
                </div>
                <section class="project_chart">
                    <table>
                        <thead>
                            <tr id="sorter">
                                <th><span id="diocese">Diocese</span></span></th>
                                <th><span id="donated" class="currency">Donations Given</span></th>
                                <th class="vertical-divider"><span id="donateddonor" class="currency">Total Donors</span></th>
                                <th><span id="received" class="currency">Donations Received</span></th>
                                <th><span id="receiveddonor" class="currency">Total Donors</span></th>
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
            <td><span>{diocese}</span></td>
            <td><a class="currency">${donated}</span></td>
            <td class="vertical-divider"><span class="currency">{donated_donor}</span></td>
            <td><span class="currency">${received}</span></td>
            <td><span class="currency">{received_donor}</span></td>
        </tr>
    </tbody>
</table>