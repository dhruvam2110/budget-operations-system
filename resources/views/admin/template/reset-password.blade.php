<div class="login">
    <div class="login-body">
        <div class="login-form">
                <div class="form-group">
                	<h3 class="login-heading">Hello,</h3>
                </div>
                <div class="form-group">
                    <h4 class="login-heading">You are receiving this email because we received a password reset request for your account.</h4>
                </div>
                <a href="{{route('admin.auth.password.reset', $token) }}"><button class="btn btn-primary btn-block" type="submit">Reset Password</button></a>
                <div class="form-group">
                    <h4 class="login-heading">This password reset link will expire in 60 minutes.</h4>
                </div>
                <div class="form-group">
                    <h4 class="login-heading">If you did not request a password reset, no further action is required.</h4>
                </div>
                <div class="form-group">
                    <h4 class="login-heading">Regards,<br>
                                                Veeda</h4>
                </div>
        </div>
    </div>
</div>