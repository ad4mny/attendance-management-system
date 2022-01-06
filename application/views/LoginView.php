<div class="row m-auto p-5">
    <div class="col-4 offset-4 p-5 ">
        <form class="row g-2" method="post" action="<?php echo base_url(); ?>login/submit">
            <div class="col-12 text-center">
                <h1 class="text-primary fw-light ">AMS:<br><small> Attendance Management System</small></h1>
            </div>
            <div class="col-12">
                <small class="text-muted">Username:</small>
                <input type="text" class="form-control" name="username" placeholder="Matric/Staff ID" required>
            </div>
            <div class="col-12">
                <small class="text-muted">Password:</small>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="col-12 text-center pt-3">
                <input type="submit" name="submit" class="btn btn-primary text-white" value="Login">
            </div>
        </form>
        <div class="col-12 text-center pt-3">
            <small class="text-muted"><a href="<?php echo base_url(); ?>register" class="text-primary">Register</a> for a new account.</small><br>
        </div>
    </div>
</div>