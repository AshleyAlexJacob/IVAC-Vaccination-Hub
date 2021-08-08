<div class="modal fade" id="employeemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mC" id="exampleModalLabel">Employee Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-fluid img-container">
                    <img src="assets/avatar2_big@2x.png" style="width: 30%">
                </div>
                <form role="form" method="post" action="index.php">
                    <div class="container login-form">

                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="uname" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" name="loginBtn1" class="btn mB tc hBtn">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mC" id="exampleModalLabel">Admin Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-fluid img-container">
                    <img src="assets/Employee-Avatar-PNG-Image-with-Transparent-Background.png" style="width: 30%">
                </div>
                <form role="form" method="post" action="index.php">
                    <div class="container login-form">

                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" name="loginBtn" class="btn mB tc hBtn">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>