<div class="container p-5">
    <div class="row">
        <div class="col">
            <h1 class="fw-light border-bottom text-muted">Attendance List</h1>
            <div class="bg-white p-4 shadow">
                <table class="table table-hover">
                    <tr>
                        <th> No </th>
                        <th> Student Name </th>
                        <th> Date Attend </th>
                        <th> Time Attend </th>
                        <th> Status </th>
                        <th> </th>
                    </tr>
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
                                    <p class="text-truncate mb-0 text-capitalize"><?php echo $row["firstname"] . ' ' . $row["lastname"]; ?></p>
                                </td>
                                <td class="text-primary">
                                    <?php echo $row["date"]; ?>
                                </td>
                                <td class="text-primary">
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
                                    <?php if ($row["status"] == 'Absent') {
                                        echo ' <a href="' . base_url() . 'lecturer/absent/' . $row["attendance_id"] . '" class="btn btn-outline-primary">View absent</button>';
                                    } else {
                                        echo ' <a href="' . base_url() . 'lecturer/review/' . $row["attendance_id"] . '" class="btn btn-outline-primary">View review</button>';
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="7">No available data.</td></tr>';
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
</div>