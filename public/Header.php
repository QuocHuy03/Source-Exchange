<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta property="og:type" content="Website">
    <meta property="og:url" content="<?= BASE_URL('') ?>">
    <meta property="og:site_name" content="<?= $LQH->site('title'); ?>">
    <meta property="article:section" content="<?= $LQH->site('title'); ?>">
    <meta property="article:tag" content="<?= $LQH->site('keywords'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $LQH->site('description'); ?>">
    <meta name="keywords" content="<?= $LQH->site('keywords'); ?>">
    <meta name="author" content="<?= $LQH->site('author'); ?>">
    <link href="<?= BASE_URL('') ?>/template/images/logo.svg" rel="shortcut icon">
    <link href="<?= BASE_URL('') ?>/template/cute/cute-alert.css" rel="stylesheet">
    <script src="<?= BASE_URL('') ?>/template/cute/cute-alert.js"></script>
    <script src="<?= BASE_URL(''); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL(''); ?>/template/dist/css/app.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL(''); ?>/template/css/huydev.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL(''); ?>/template/dist/js/toastr.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="<?= BASE_URL('') ?>/template/dist/js/loadingoverlay.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap');

    body {
        text-transform: capitalize;
    }

    .dark .main {
        font-family: 'Roboto Condensed', sans-serif;

    }
</style>