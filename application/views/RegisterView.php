<div class="row m-auto p-5">
    <div class="col-4 offset-4 ">
        <form class="row g-2" method="post" action="<?php echo base_url(); ?>register/submit">
            <div class="col-12 text-center">
                <h1 class="text-primary fw-light ">AMS:<br><small> Attendance Management System</small></h1>
            </div>
            <div class="col-12">
                <small class="text-muted">Select your identity:</small>
                <select class="form-select" name="type">
                    <option value="0" selected>Student</option>
                    <option value="1">Lecturer</option>
                </select>
            </div>
            <div class="col-12">
                <small class="text-muted">Enter your Matric ID</small>
                <input type="text" class="form-control" name="username" placeholder="CB20019" required>
            </div>
            <div class="col-12">
                <small class="">Create a pasword:</small>
                <input type="password" class="form-control mb-1" name="password" placeholder="Create Password" required>
                <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required>
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