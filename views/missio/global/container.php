<html>
<html>
    <head>

        <?php
        $project = $data['project'];
         //var_dump($project);
          ?>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $project['description']; ?>">
        <meta property="og:title" content="<?php echo $project['name']; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo $project['image']; ?>" />
        <meta property="og:url" content="<?php echo 'https://missio.org/project/'.$project['id'];?>" />
        <meta property="og:description" content="<?php echo $project['description']; ?>" />
        <meta property="og:site_name" content="Missio">


        <meta name="twitter:card" content="<?php echo $project['name']; ?>" />
        <meta name="twitter:title" content="<?php echo $project['name']; ?>" />
        <meta name="twitter:description" content="<?php echo $project['name']; ?>" />
        <meta name="twitter:image" content="<?php echo $project['image']; ?>" />

        <meta name="twitter:site" content="@1missionfamily"/>
        <!-- <meta name="twitter:image" content="http://jokewiththepope.org/img/cause/homeless.jpg"/>-->
        
        <meta name="apple-itunes-app" content="app-id=606393585, affiliate-data=myAffiliateData, app-argument=">
        
        <title><?php if ($project['name']) { echo  $project['name']; } else { echo "Missio"; } ?></title>

        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic">
        <link rel="stylesheet" href="/web/css/missio.css" type="text/css">
        <link rel="stylesheet" href="/web/css/sliderStyles.css" type="text/css">
        <link rel="stylesheet" href="/web/css/jquery.bxslider.css">
        <link rel="stylesheet" href="/web/css/grids-responsive-min.css">
        <link href="/web/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        

        <link rel="stylesheet" type="text/css" href="/web/js/fancybox/fancybox.css">
       
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--[if IE]>
        <script type="text/javascript" src="/js/html5.js"></script>
        <script type="text/javascript" src="/js/placeholder.js"></script>
        <![endif]-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script ></script>
        <script type="text/javascript" src="/web/js/fancybox/fancybox.js"></script>
        <script type="text/javascript" src="/web/js/dashboard.js"></script>
        <script type="text/javascript" src="/web/js/jquery.session.js"></script>
        <script type="text/javascript" src="/web/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="/web/js/parsley.js"></script>

        <!--   <script type="text/javascript" src="/web/js/missio.js"></script> -->

        <link rel="stylesheet" href="/web/css/pure-min.css">
        <script src="/web/js/socialLinkBuilder.js"></script> 
        <script type="text/javascript" src="/web/js/hideshare.min.js"></script>
         
    </head>
    <body>
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M6BSBL"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push(
                        {'gtm.start': new Date().getTime(), event: 'gtm.js'}
                );
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-M6BSBL');</script>
        <!-- End Google Tag Manager -->
        <?php $this->load->view('/missio/global/header', compact('data')); ?>
        <div id="main-container">
            <?php $this->load->view($data['template'], compact('data')); ?>
            
        </div>
        <?php $this->load->view('/missio/global/footer'); ?>
        <?php if (@$data["deeplink"]) { ?>
            <a id="deeplink-btn" data-app="missio://<?= $data["deeplink"] ?>"
               data-store-android="com.littleiapps.missio" 
               data-store-ios="606393585" >

                <script type="text/javascript" src="/web/js/deep-link.js"></script>

                <script type="text/javascript">
                $('#deeplink-btn').click();
                </script>
            <?php } ?>

        
   
    </body>
</html>