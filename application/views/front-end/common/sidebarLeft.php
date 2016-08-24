<div id="categories">
    <h3>Categories</h3>
    <div class="contentBlock">	
        <ul class="category">
            <?php
            foreach ($pcategories as $p) {
                ?>
                <li>
                    <a href="gallery/pictures/11.html" title="<?php echo $p['title']; ?>"><img height="50" width="50" class="woo-image thumbnail" alt="Molestie innonummy Libero" src="<?php echo site_url(); ?>assets/uploads/pcategory/<?php echo $p['thumbnil_thumb']; ?>" /></a>  
                    <div class="content">
                        <h4><a href="gallery/pictures/11.html"><?php echo $p['title']; ?></a></h4>
                    </div>
                    <div style="clear: both;"></div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>



</div>
<!-- // sidebar -->

<!--comment-->
<div id="comment-panel">
    <h3>Latest Comments </h3>
    <div><img src="<?php echo base_url() ?>assets/front-end/themes/default/images/coment-top.png" alt="" /></div>
    <div class="comment-panel-mid">

        <div class="contentBlock">

            <p class="comments"> <a href="comment.html"> Hello Sir ,<br />
                    Your Amazing Photographs & Great.. </a> </p>
            <p class="name">- kaushal deshpande</p>

            <p class="comments"> <a href="comment.html"> Hello sir,it is a pleasure to see your photographs.. </a> </p>
            <p class="name">- Suchindra</p>

            <p class="comments"> <a href="comment.html"> Your photographs are class apart!It also shows the.. </a> </p>
            <p class="name">- Indranil Paul</p>
        </div>
    </div>
    <div><img src="<?php echo base_url() ?>assets/front-end/themes/default/images/coment-bottom.png" alt="" /></div>
</div>
<div class="buttonwrapper">
    <a class="ovalbutton" href="comment.html"><span>POST A COMMENT</span></a>
</div>
<!-- // comment-->	