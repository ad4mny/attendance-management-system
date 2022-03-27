<div class="container p-5">
    <div class="row">
        <div class="col">
            <h1 class="fw-light border-bottom text-muted">Absent Review</h1>
            <div class="bg-white p-4 shadow">
                <?php
                if (
                    isset($absents) &&
                    is_array($absents) &&
                    !empty($absents) &&
                    $absents !== false
                ) {
                ?>
                    <div class="form-group">
                        <label>
                            Student Name
                        </label>
                        <p class="text-capitalize">
                            <?php echo $absents['firstname'] . ' ' . $absents['lastname']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            Why are you absent for the class?
                        </label>
                        <p>
                            <?php echo $absents['absent_type']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            Explain your reason.
                        </label>
                        <p>
                            <?php echo $absents['absent_reason']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            Upload any supporting documents.
                        </label><br>
                        <img src="<?php echo base_url() . 'upload/document/' . $absents['id'] . '/' . $absents['absent_file']; ?>" class="img-fluid" width="300">
                    </div>
                <?php
                } else {
                    echo '<tr><td colspan="7">No available data.</td></tr>';
                }
                ?>
            </div>
        </div>
    </div>
</div>