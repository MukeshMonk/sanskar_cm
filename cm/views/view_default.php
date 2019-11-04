 <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" id="login-in" method="POST">
                
                <div id="signup_response"></div>                
                
                    <div class="sign-avatar">
                        <img src="img/logo.png" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>
                    <div class="form-group">
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="E-Mail or usename"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                <input type="hidden" id="server_root" name="server_root" value="<?php echo SERVER_ROOT;?>/cm/"/>
                <input type="hidden" id="connector" name="connector" value="systemlogin"/>
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded" id="signup_btn">Sign in</button>
                    <!--<p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p>
                    <button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->