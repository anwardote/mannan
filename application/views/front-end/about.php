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
                        <div class="breadcrumbs"><a href="http://www.dhritimanimages.com/">Home</a> » <span>About</span></div>
                        <?php
                        if ($about) {
                            foreach ($about as $a) {
                                echo "<div style=\"margin:20px 0;\">";
                                if($a['photo']){
                                   // $photo=site_url() . "assets/uploads/about/" . $a['photo'];
                                }
                              //  echo "<img src=\"$photo\" align=\"left\" style=\"margin:0 20px 20px 0\">";
                                echo $a['description'];
                                echo "</div>";
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