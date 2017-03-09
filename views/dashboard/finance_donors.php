<section class="body_container">
    <div class="wrapper">
        <section class="donor_sec">
            <ul class="breadcrumb">
                <li class="active"><a href="/">Missio</a></li>
                <li class="active"><a href="/dashboard/finance">Finance Dashboard</a></li>
                <li>Donors</li>
            </ul>
            <section class="list_sec" data-list="finance_donor">
                <h1>Donors</h1>
                <input name="page" id="page" type="hidden" value="1">
                <input name="order" id="order" type="hidden" value="lname-asc">
                <div class="record_row">
                    <span class="record_no"></span>
                    <div class="paginator"></div>
                </div>
                <section class="project_chart">
                    <table>
                        <thead>
                            <tr id="sorter">
                                <th><span id="lname">Last Name</span></span></th>
                                <th><span id="fname">First Name</span></th>
                                <th><span id="email">Email Address</span></th>
                                <th><span id="catholic">Catholic</span></th>
                                <th><span id="affiliation">Donor Affiliation</span></th>
                                <th><span id="donated" class="currency">Total Donated</span></th>
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
            <td><a href="/dashboard/finance/donor/{id}">{last_name}</a></td>
            <td><a href="/dashboard/finance/donor/{id}">{first_name}</a></td>
            <td><a href="/dashboard/finance/donor/{id}">{email}</a></td>
            <td><a href="/dashboard/finance/donor/{id}">{catholic}</a></td>
            <td><a href="/dashboard/finance/donor/{id}">{affiliation}</a></td>
            <td><a class="currency" href="/dashboard/finance/donor/{id}">${donated}</a></td>
        </tr>
    </tbody>
</table>