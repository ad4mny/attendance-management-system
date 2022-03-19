<div class="container p-5">
    <div class="row display-4">
        <div class="col">
            <p class="text-muted">Create New Class</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <form class="row g-3 bg-white p-4 shadow" method="post" action="<?php echo base_url(); ?>lecturer/class/submit">
                <div class="col-12">
                    <small>Select course:</small>
                    <select class="form-control" name="course">
                        <?php
                        $file = fopen(base_url() . "assets/subjects.csv", "r");

                        if ($file !== FALSE) {

                            while (($data = fgetcsv($file)) !== FALSE) {
                                echo '<option>' . $data[0] . ' - ' .  $data[1] . '</option>';
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <small>Select section:</small>
                    <div class="input-group">
                        <select class="form-select" name="section">
                            <option value="01" selected>01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>
                        <select class="form-select" name="group">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="G">G</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-primary text-white" name="submit" value="Generate Class Code">
                </div>
            </form>
        </div>
        <div class="col-8">
            <h1 class="fw-light border-bottom text-muted">Class List</h1>
            <div class="bg-white p-4 shadow">
                <table class="table table-hover w-50">
                    <tr>
                        <th> No </th>
                        <th> Class </th>
                        <th> Code </th>
                        <th> Action </th>
                    </tr>
                    <?php
                    $num = 0;
                    if (
                        isset($classes) &&
                        is_array($classes) &&
                        !empty($classes) &&
                        $classes !== false
                    ) {
                        foreach ($classes as $row) {
                    ?>
                            <tr>
                                <td><?php echo ++$num; ?></td>
                                <td>
                                    <p class="text-truncate mb-0"><?php echo $row["name"]; ?></p>
                                    <small class="text-muted">SECTION</small>
                                    <small><?php echo $row["section"]; ?></small><br>
                                    <small class="text-muted">DATETIME</small>
                                    <small><?php echo $row["date"] . ' ' . $row["time"]; ?></small>
                                    
                                </td>
                                <td class="font-italic text-primary">
                                    <?php echo $row["code"]; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="text-decoration-none dropdown-toggle btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo base_url() . 'lecturer/class/view/' . $row["class_id"]; ?>" class="dropdown-item">
                                                    View
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url() . 'lecturer/class/delete/' . $row["class_id"]; ?>" class="dropdown-item">
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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