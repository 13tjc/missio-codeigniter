<section class="body_container">
    <div class="wrapper">
        <section class="donor_sec">
            <ul class="breadcrumb">
                <li class="active"><a href="/">Missio</a></li>
                <li class="active"><a href="/dashboard/finance">Finance Dashboard</a></li>
                <li class="active"><a href="/dashboard/finance/projects">Projects</a></li>
                <li><?= $data['project']['name'] ?></li>
            </ul>
            <section class="list_sec project_sec" data-list="finance_project_donation" data-id="<?= $data['project']['id'] ?>">
                <h1><?= $data['project']['name'] ?></h1>
                <div class="filter_row">
                    <h3>Global Total Donations: <span>$<?= $data['project']['received'] ?></span></h3>
                    <? if (!empty($data['user']['nation'])): ?>
                        <h3>Country Total Donations: <span>$<?= $data['project']['region_total'] ?></span></h3>
                    <? elseif (!empty($data['user']['diocese'])): ?>
                        <h3>Diocese Total Donations: <span>$<?= $data['project']['region_total'] ?></span></h3>
                    <? endif; ?>
                </div>
                <input name="page" id="page" type="hidden" value="1">
                <input name="order" id="order" type="hidden" value="date-desc">
                <div class="record_row">
                    <span class="record_no"></span>
                    <div class="paginator"></div>
                </div>
                <section class="project_chart">
                    <table>
                        <thead>
                            <tr id="sorter">
                                <th><span id="date">Date</span></span></th>
                                <th><span id="name">Donor</span></th>
                                <th><span id="country">Country</span></th>
                                <th><span id="catholic">Catholic</span></th>
                                <th><span id="affiliation">Donor Affiliation</span></th>
                                <th><span id="amount" class="currency">Amount</span></th>
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
            <td>{date}</td>
            <td>{name}</td>
            <td>{country}</td>
            <td>{catholic}</td>
            <td>{affiliation}</td>
            <td><span class="currency">${amount}</span></td>
        </tr>
    </tbody>
</table>