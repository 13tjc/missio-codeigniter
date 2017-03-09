<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Missio</title>
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic">
        <link rel="stylesheet" type="text/css" href="/web/css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="/web/js/fancybox/fancybox.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <!--[if IE]>
            <script type="text/javascript" src="/js/html5.js"></script>
            <script type="text/javascript" src="/js/placeholder.js"></script>
            <script type="text/javascript" src="/js/jquery.iframe-transport.js"></script>
        <![endif]-->
        <script type="text/javascript" src="/web/js/fancybox/fancybox.js"></script>
        <script type="text/javascript" src="/web/js/dashboard.js"></script>
    </head>
    <body>
        <?php $this->load->view('dashboard/global/header', compact('data')); ?>
        <div id="main-container">
            <?php $this->load->view($data['template'], compact('data')); ?>
        </div>
        <?php $this->load->view('dashboard/global/footer'); ?>
    </body>
</html>