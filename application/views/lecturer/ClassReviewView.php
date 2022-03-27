<div class="container p-5">
    <div class="row">
        <div class="col">
            <h1 class="fw-light border-bottom text-muted">Class Review</h1>
            <div class="bg-white p-4 shadow">
                <?php
                if (
                    isset($reviews) &&
                    is_array($reviews) &&
                    !empty($reviews) &&
                    $reviews !== false
                ) {
                ?>
                    <div class="form-group">
                        <label>
                            Student Name
                        </label>
                        <p class="text-capitalize">
                            <?php echo $reviews['firstname'] . ' ' . $reviews['lastname']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            What chapter you learn in this class?
                        </label>
                        <p>
                            <?php echo $reviews['chapter_learn']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            What you have learn in this class?
                        </label>
                        <p>
                            <?php echo $reviews['what_have_learn']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            Rate your understanding.
                        </label>
                        <p>
                            <?php echo $reviews['understanding_rate']; ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            Do you have any questions?
                        </label>
                        <p>
                            <?php echo $reviews['question']; ?>
                        </p>
                    </div>
                    <div class="form-group">

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