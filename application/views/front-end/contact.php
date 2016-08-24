<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <style>
            iframe {height:100%;}
            
        </style>
        <title>Welcome to Priyanka Ghosh Images</title>
        <?php require_once 'common/head.php'; ?>
    </head>
    <body>
        <?php require_once 'common/headerContainer.php'; ?>
        <?php require_once 'common/menu.php'; ?>
        <div class="container">
            <?php //require_once 'common/banner.php'; ?>
            <div class="home-page-bodypanel">
                <div class="col-1 fl">
                    <div class="sidebarLeft">	
                        <?php require_once 'common/sidebarLeft.php'; ?>
                    </div>
                    <!-- Main Content Area START -->
                    <div class="col-2 fl">
                        <style>
                            h2 {margin:0}
                        </style>
                        <div class="breadcrumbs"><a href="http://www.dhritimanimages.com/">Home</a> » <span>Contact</span></div>
                        <?php
                        if ($contact) {
                            foreach ($contact as $c) {
                                echo '<div style="width:100%"><div style="width:70%">';

                                if ($c['title'])
                                    echo "<h2>" . $c['title'] . "</h2>";
                                echo $c['description'];
                                echo "</div><div style=\"width:100px\">";
                                echo $c['google_map'];
                                echo "</div></div>";
                            }
                        } // If END
                        ?>
                        








                    </div> <!-- Wrapper END DIV -->
                    <!-- Main Content Area END -->
                    <div class="clear"></div>
                </div>
            </div>

            <!-- footer -->
<?php require_once 'common/footer.php'; ?>
            <!-- // footer -->
        </div>
        <!-- // container -->
    </body>

</html>