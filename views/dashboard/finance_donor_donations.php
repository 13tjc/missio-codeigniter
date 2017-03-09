<section class="body_container">
    <div class="wrapper">
        <section class="donor_sec">
            <ul class="breadcrumb">
                <li class="active"><a href="/">Missio</a></li>
                <li class="active"><a href="/dashboard/finance">Finance Dashboard</a></li>
                <li class="active"><a href="/dashboard/finance/donors">Donors</a></li>
                <li><?= $data['donor']['first_name'] ?> <?= $data['donor']['last_name'] ?></li>
            </ul>
            <section class="list_sec" data-list="finance_donor_donation" data-id="<?= $data['donor']['id'] ?>">
                <h1><?= $data['donor']['first_name'] ?> <?= $data['donor']['last_name'] ?></h1>
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
                                <th><span id="project">Project</span></th>
                                <th><span id="category">Category</span></th>
                                <th><span id="country">Created In</span></th>
                                <th><span id="affiliation">Project Affiliation</span></th>
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
            <td>{project}</td>
            <td>{category}</td>
            <td>{country}</td>
            <td>{affiliation}</td>
            <td><span class="currency">${amount}</span></td>
        </tr>
    </tbody>
</table>