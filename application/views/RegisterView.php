<div class="container vh-100 d-flex align-items-middle justify-content-center">
    <div class="row m-auto p-5">
        <div class="col-4 offset-4 ">
            <form class="row g-2" method="post" action="<?php echo base_url(); ?>register/submit">
                <div class="col-12 text-center">
                    <h1 class="text-primary fw-light ">Register</h1>
                </div>
                <div class="col-12">
                    <small class="text-muted">Select your identity:</small>
                    <select class="form-select" name="role">
                        <option value="0" selected>Student</option>
                        <option value="1">Lecturer</option>
                    </select>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" name="firstName" placeholder="Enter your first name" required>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" name="lastName" placeholder="Enter your last name" required>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" name="username" placeholder="Enter your Matric/Staff ID" required>
                </div>
                <div class="col-12">
                    <input type="password" class="form-control mb-1" name="password" placeholder="Create Password" required>
                    <input type="password" class="form-control" name="comparePassword" placeholder="Confirm Password" required>
                </div>
                <div class="col-12 text-center py-3">
                    <input type="submit" name="submit" class="btn btn-primary text-white" value="Register">
                </div>
                <div class=" col-12 text-center">
                    <small><a href="<?php echo base_url(); ?>login" class="text-primary"><i class="fas fa-chevron-left"></i> Back</a></small>
                </div>
            </form>
        </div>
    </div>
</div>