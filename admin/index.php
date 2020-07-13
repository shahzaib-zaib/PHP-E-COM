<?php

    define( 'ROOT', dirname(__FILE__) );

    $page_name = isset( $_GET['page'] ) ? $_GET['page'] : 'home';
    $page = ROOT . '/pages/' . $page_name . '.php';

    if( $page_name == 'home' ) {
        $header = 'header.php';
        $footer = 'footer.php';
    } else {
        $header = ( isset($_GET['header'] ) && $_GET['header'] == 'dark' ) ? 'header-2.php' : 'header.php' ;
        $footer = ( isset( $_GET['footer'] ) && $_GET['footer'] == '1' ) ? 'footer-2.php' : 'footer.php' ;
    }

    $header = ROOT . '/parts/' . $header;
    $footer = ROOT . '/parts/' . $footer;

    $pages = array(
        'about'             => 'About Us',
        'adult-services'    => 'Adult Services',
        'blog'              => 'Blog',
        'child-refuses'     => 'Child Refuses',
        'child-services'    => 'child Services',
        'consultation'      => 'consultation',
        'contact'           => 'Contact',
        'corporate-services'=> 'Corporate Services',
        'family-and-friend' => 'Family and Friend',
        'family-services'   => 'Family Services',
        'faqs'              => 'FAQs',
        'home'              => 'Home',
        'medico-legal'      => 'Medico Legal',
        'save-data'         => 'Save Data',
        'index'             => 'index',

    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body id="reportsPage">
    <div class="" id="home">
        
        <?php if($page_name == 'home'): ?>
            
        <?php endif; ?>

        <?php
            if (isset ($_GET['parts'] ) ) {
                require ROOT . '/parts/' . $_GET['parts'] ;
            } else {
                require $header;
                require $page;
                require $footer;
            }
        ?>
        
    </div><!-- /.wrapper -->
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>
</html>