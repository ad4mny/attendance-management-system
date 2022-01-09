<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.ico" type="image/x-icon" />
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="w-auto position-absolute start-50 translate-middle mt-5">
        <?php
        if ($this->session->tempdata('notice') != NULL) {
            echo '<div class="alert alert-light shadow-sm alert-dismissible fade show" role="alert">';
            echo '<p class="mb-0 text-success"><i class="fas fa-info-circle fa-fw fa-sm me-1"></i> ' . $this->session->tempdata('notice') . '</p>';
            echo '</div>';
        }
        if ($this->session->tempdata('error') != NULL) {
            echo '<div class="alert alert-light shadow-sm alert-dismissible fade show" role="alert">';
            echo '<p class="mb-0 text-danger"><i class="fas fa-exclamation-circle fa-fw fa-sm me-1"></i> ' . $this->session->tempdata('error') . '</p>';
            echo '</div>';
        }
        ?>
    </div>