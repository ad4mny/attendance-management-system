<div class="container p-5">
    <div class="row">
        <div class="col">
            <p class="display-4 text-muted">Attend New Class</p>
        </div>
    </div>
    <div class="row p-2 bg-white rounded-3 border">
        <div class="col">
            <form class="row g-3" method="post" action="<?php echo base_url(); ?>attendance/submit">
                <div class="col-auto">
                    <input type="text" class="form-control" name="code" placeholder="Enter your class code here." required>
                </div>
                <div class="col-auto">
                    <input type="submit" class=" btn btn-primary text-white" name="submit" value="Submit Attendance">
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <h5 class="fw-light text-muted">Your Attendance List</h5>
        </div>
    </div>
    <div class="row mt-2 p-2 bg-white rounded-3 border">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <th> No </th>
                    <th> Class </th>
                    <th> Section </th>
                    <th> Date/Time </th>
                    <th> Status </th>
                    <th> </th>
                </thead>
                <?php
                $num = 0;
                if (
                    isset($attendances) &&
                    is_array($attendances) &&
                    !empty($attendances) &&
                    $attendances !== false
                ) {
                    foreach ($attendances as $row) {
                ?>
                        <tr>
                            <td><?php echo ++$num; ?></td>
                            <td>
                                <?php echo $row["name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["section"]; ?>
                            </td>
                            <td>
                                <?php echo $row["date"]; ?><br>
                                <?php echo $row["time"]; ?>
                            </td>
                            <td>
                                <?php
                                switch ($row["status"]) {
                                    case 'Ontime':
                                        $label = 'primary';
                                        break;
                                    case 'Absent':
                                        $label = 'danger';
                                        break;
                                    case 'Late':
                                        $label = 'warning';
                                        break;
                                    default:
                                        $label = 'light';
                                        break;
                                }
                                ?>
                                <div class="badge bg-<?php echo $label; ?>">
                                    <?php echo $row["status"]; ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                if ($row["chapter_learn"] != NULL) {
                                    echo '<p class="text-muted mb-0 fst-italic">Reviewed</p>';
                                } else if ($row["absent_type"] != NULL) {
                                    echo '<p class="text-muted mb-0 fst-italic">Absent Notified</p>';
                                } else if ($row["status"] != 'Absent') {
                                    echo '<button class="btn btn-outline-primary" id="review-btn" value="' . $row["attendance_id"] . '" data-bs-toggle="modal" data-bs-target="#classReview">Add class review</button>';
                                } else {
                                    echo '<button class="btn btn-outline-primary" id="absent-btn" value="' . $row["attendance_id"] . '" data-bs-toggle="modal" data-bs-target="#absent">Add absent reason</button>';
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="6">No available data.</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal Review -->
<div class="modal fade" id="classReview" tabindex="-1" aria-labelledby="classReviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="classReviewLabel">Class Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-4" method="post" action="<?php echo base_url(); ?>attendance/review/submit">
                    <div class="form-group">
                        <label>
                            What chapter you learn in this class?
                        </label>
                        <input type="text" class="form-control" name="chapter" placeholder="Chapter 1" required>
                    </div>
                    <div class="form-group">
                        <label>
                            What you have learn in this class?
                        </label>
                        <textarea type="text" class="form-control" name="learn" max="500" rows="5" placeholder="Max 500 characters." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Rate your understanding.
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="understanding" id="flexRadioDefault1" value="1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="understanding" id="flexRadioDefault2" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="understanding" id="flexRadioDefault1" value="3">
                            <label class="form-check-label" for="flexRadioDefault1">
                                3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="understanding" id="flexRadioDefault2" value="4">
                            <label class="form-check-label" for="flexRadioDefault2">
                                4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="understanding" id="flexRadioDefault1" value="5">
                            <label class="form-check-label" for="flexRadioDefault1">
                                5
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Do you have any questions?
                        </label>
                        <textarea type="text" class="form-control" name="question" max="500" rows="5" placeholder="Max 500 characters." required></textarea>
                    </div>
                    <div class="form-group text-end">
                        <input type="hidden" name="attendance_id" id="attendance_id">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Absent -->
<div class="modal fade" id="absent" tabindex="-1" aria-labelledby="absentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absentLabel">Absent Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-4" method="post" action="<?php echo base_url(); ?>attendance/absent/submit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>
                            Why are you absent for the class?
                        </label>
                        <select class="form-select" name="type" required>
                            <option value="sick">Sick</option>
                            <option value="medical leave">Medical Leave</option>
                            <option value="self study">Self Study</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            Explain your reason.
                        </label>
                        <textarea type="text" class="form-control" name="reason" max="500" rows="5" placeholder="Max 500 characters." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            Upload any supporting documents.
                        </label>
                        <input type="file" class="form-control" name="file" required>
                        <small class="text-muted fst-italic">*Only accept .jpg, .png and .jpeg file format.</small>
                    </div>
                    <div class="form-group text-end">
                        <input type="hidden" name="absent_attendance_id" id="absent_attendance_id">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var review_attendance_id = $(' #review-btn').val();
        $('#review_attendance_id').val(review_attendance_id);

        var absent_attendance_id = $(' #absent-btn').val();
        $('#absent_attendance_id').val(absent_attendance_id);
    })
</script>