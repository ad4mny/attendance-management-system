<div class="container p-5">
    <div class="row">
        <div class="col">
            <p class="display-4 text-muted">Attend New Class</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4 p-4 bg-white shadow">
            <form class="row g-3" method="post" action="<?php echo base_url(); ?>attendance/submit">
                <div class="col-auto">
                    <input type="text" class="form-control" name="code" placeholder="Enter your class code here." required>
                </div>
                <div class="col-auto">
                    <input type="submit" class=" btn btn-primary text-white" name="submit" value="Submit Attendance">
                </div>
            </form>
        </div>
        <div class="col">
            <h1 class="fw-light border-bottom text-muted">Your Attendance List</h1>
            <div class="bg-white p-3 shadow">
                <table class="table table-hover">
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
                                    <?php echo $row["date"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["time"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["status"]; ?>
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
</div>