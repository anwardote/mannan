<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Welcome to Priyanka Ghosh Images</title>
        <?php require_once 'common/head.php'; ?>
    </head>
    <body>
        <?php require_once 'common/headerContainer.php'; ?>
        <?php require_once 'common/menu.php'; ?>
        <div class="container">
            <?php require_once 'common/banner.php'; ?>
            <div class="home-page-bodypanel">
                <div class="col-1 fl">
                    <div class="sidebarLeft">	
                        <?php require_once 'common/sidebarLeft.php'; ?>
                    </div>
                    <!-- Main Content Area START -->
                    <div class="col-2 fl">
                        <?php
                        $i = 0;
                        $j = 2;
                        $k = 0;
                        if ($tcategories) {
                            foreach ($tcategories as $t) {
                                $thumb = site_url() . "assets/uploads/tcategory/" . $t['thumbnil_thumb'];
                                $title = $t['title'];
                                $des = $t['description'];

                                $root = "<div class=\"row$j\">";
                                $seperator = "<div class=\"hdng\">&nbsp;</div>";
                                $content = "<div class=\"trip-display\">
                                <div class=\"image-panel\">
                                <a href=\"gallery/trip/1.html\" title=\"$des\">
                                        <img src=\"$thumb\" alt=\"\" />
                                    </a>
                                </div>
                                <div class=\"hdng\"><h1><a href=\"gallery/trip/1.html\" title=\"$des\">$title</a></h1></div>
                            </div>";

                                $rootEnd = " <div class=\"clear\"></div>
                        </div>";

                                if ($i == 0 || ($i % 3) == 0) {
                                    // If it is first time and if third time than it will be output
                                    echo $root;

                                    $j++;
                                    //Never output again. just first time
                                    if ($i == 0) {
                                        echo $seperator;
                                    }
                                }

                                $k++;
                                echo $content;
                                
                                
                                // after completing three loop, closing div will be output
                                if ($k == 3) {
                                    // re-asigning for re-calculate for knowing that it is going to be three.
                                    $k = 0;

                                    echo $rootEnd;
                                }
                                $i++;
                            }

                            /// If all loop are complted than closing will be output
                            echo $rootEnd;
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