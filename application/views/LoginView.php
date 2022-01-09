<div class="container vh-100 d-flex align-items-middle justify-content-center">
    <div class="row m-auto">
        <div class="col-4 offset-4">
            <form class="row g-2" method="post" action="<?php echo base_url(); ?>login/submit">
                <div class="col-12 text-center">
                    <h1 class="text-primary fw-light ">Login</h1>
                </div>
                <div class="col-12">
                    <small class="text-muted">Username:</small>
                    <input type="text" class="form-control" name="username" placeholder="Matric/Staff ID" required>
                </div>
                <div class="col-12">
                    <small class="text-muted">Password:</small>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="col-12 text-center py-3">
                    <input type="submit" name="submit" class="btn btn-primary text-white" value="Login">
                </div>
                <div class="col-12 text-center">
                    <small class="text-muted"><a href="<?php echo base_url(); ?>register" class="text-primary">Register</a> for a new account.</small><br>
                </div>
            </form>
        </div>
    </div>
</div>