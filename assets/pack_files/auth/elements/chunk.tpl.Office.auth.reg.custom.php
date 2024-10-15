<div class="section popup popup_reg" id="popup_reg" style="display:none">
    <ul class="tabs">
        <li data-tab="1" class="current">[[%office_auth_login]]</li>
        <li data-tab="2">[[%office_auth_register]]</li>
    </ul>
    <div class="box visible auth_box" id="office-auth-form">
        <div class="office-auth-login-wrapper">
            <form method="post" class="form-horizontal" id="office-auth-login">
                <div class="form-group">
                    <div class="left">
                        <div class="line_row">
                            <label  class="control-label">[[%office_auth_login_email]]&nbsp;<span class="red">*</span></label>
                            <div class="row_input">
                                <input type="text" name="username" placeholder="" class="form-control" id="office-auth-login-username" value="" />
                            </div>
                        </div>
                        <div class="line_row">
                            <label  class="control-label">[[%office_auth_login_password]]</label>
                            <div class="row_input ">
                                <input type="password" name="password" placeholder="" class="form-control" id="office-login-form-password" value="" />

                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="row_input">
                            <button type="submit" class="btn_default btn-all">Войти[[-%office_auth_login_btn]]</button>
                            <p class="help-block"><small>[[%office_auth_login_password_desc]]</small></p>
                        </div>
                    </div>
                    <div class="modal-soc">[[+providers]]</div>
                    <input type="hidden" name="action" value="auth/formLogin" />
                    <input type="hidden" name="return" value="" />
                </div>
            </form>
        </div>
    </div>

    <div class="box auth_box" id="autoriz">
        <div  id="office-auth-form2">
            <div class="">
                <form method="post" id="office-auth-register">
                    <div class="form-group">
                        <div class="left">
                            <div class="line_row">
                                <label  class="control-label">[[%office_auth_register_email]]&nbsp;<span class="red">*</span></label>
                                <div class="row_input">
                                    <input type="email" name="email" placeholder="" class="form-control" id="office-auth-register-email" value="" />
                                </div>
                            </div>
                            <div class="line_row">
                                <label  class="control-label">[[%office_auth_register_password]]</label>
                                <div class="row_input">
                                    <input type="password" name="password" placeholder="" class="form-control" id="office-register-form-password" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="line_row">
                                <p class="help-block"><small>[[%office_auth_register_email_desc]]</small></p>
                            </div>
                            <div class="line_row">
                                <p class="help-block"><small>[[%office_auth_register_password_desc]]</small></p>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <input type="hidden" name="action" value="auth/formRegister" />
                        <div class="row_input">
                            <button type="submit" class="btn_default btn_regist btn-all">[[%office_auth_register_btn]]</button>
                        </div>
                        [[-!HybridAuth?
                        &providers=`Odnoklassniki,Twitter,Facebook,Vkontakte`
                        &groups=`Users`
                        &loginResourceId=`1`
                        ]]
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        Office.Auth.initialize('#office-auth-form2 form');
    });
</script>