
                        <?php
                        $i = 0;
                        $j = 2;
                        $k = 0;
                        foreach ($tcategories as $t) {
                            $thumb = site_url() . "assets/uploads/tcategory/" . $t['thumbnil_thumb'];

                            $root = "<div class=\"row$j\">";
                            $seperator = "<div class=\"hdng\">&nbsp;</div>";
                            $content = "<div class=\"trip-display\">
                                <div class=\"image-panel\">
                                <a href=\"gallery/trip/1.html\" title=\"\">
                                        <img src=\"$thumb\" alt=\"\" />
                                    </a>
                                </div>
                                <div class=\"hdng\"><h1><a href=\"gallery/trip/1.html\" title=\"\">Madagascar</a></h1></div>
                            </div>";

                            $rootEnd = " <div class=\"clear\"></div>
                        </div>";

                            if ($i == 0 || ($i % 3) == 0) {
                                echo $root;

                                $j++;
                                if ($i == 0) {
                                    echo $seperator;
                                }
                            }
                            $k++;
                            echo $content;

                            if ($k == 3) {
                                $k=0;

                                echo $rootEnd;
                            }
                            $i++;
                        }
                        ?>