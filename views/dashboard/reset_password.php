<section class="body_container">
    <div class="wrapper" id="resetpw_container">
        <section class="login_sec">
            <h1>Administrative Log In</h1>
            <aside class="login_form">
                <form id="resetpw_form">
                    <fieldset>
                        <h2>Reset Your Password</h2>
                        <div class="f_row password">
                            <label>Enter New Password</label>
                            <input name="code" type="hidden" value="<?= $data['code'] ?>">
                            <input id="password"  name="password" type="password" placeholder="**********">
                        </div>
                        <div class="f_row password">
                            <label>Confirm New Password</label>
                            <input id="password_confirm" name="password_confirm" type="password" placeholder="**********">
                        </div>
                        <input id="submit" type="submit" value="Reset">
                    </fieldset>
                    <div class="message-container">
                        <div class="message"></div>
                    </div>
                </form>
            </aside>
        </section>
    </div>
</section>