<script language="javascript" src="<?php echo base_url() ?>assets/front-end/jquery/slide-show-fade/banners.js" type="text/javascript"></script>
<script type="text/javascript">

    var theInt = null;
    var $crosslink, $navthumb;
    var curclicked = 0;

    theInterval = function(cur) {
        clearInterval(theInt);

        if (typeof cur != 'undefined')
            curclicked = cur;

        $crosslink.removeClass("active-thumb");
        $navthumb.eq(curclicked).parent().addClass("active-thumb");
        $(".stripNav ul li a").eq(curclicked).trigger('click');

        theInt = setInterval(function() {
            $crosslink.removeClass("active-thumb");
            $navthumb.eq(curclicked).parent().addClass("active-thumb");
            $(".stripNav ul li a").eq(curclicked).trigger('click');
            curclicked++;
            if (1 == curclicked)
                curclicked = 0;

        }, 4000);
    };

    $(function() {

        $("#main-photo-slider").codaSlider();

        $navthumb = $(".nav-thumb");
        $crosslink = $(".cross-link");

        $navthumb
                .click(function() {
                    var $this = $(this);
                    theInterval($this.parent().attr('href').slice(1) - 1);
                    return false;
                });

        theInterval();
    });

</script> 

<div class="row1">
    <!-- scroll -->
    <script type="text/javascript">

        var mygallery = new fadeSlideShow({
            wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow 
            dimensions: [940, 300], //width/height of gallery in pixels. Should reflect dimensions of largest image
            imagearray: [
                ["http://www.dhritimanimages.com/uploads/home-page-slider/Image__1331669853.jpg"]

            ],
            displaymode: {type: 'auto', pause: 4000, cycles: 0, wraparound: false},
            persist: false, //remember last viewed slide and recall within same session?
            fadeduration: 5000, //transition duration (milliseconds)
            descreveal: "ondemand",
            togglerid: ""
        })
    </script>		
    <div class="scroller">
        <div id="fadeshow1"></div>	
    </div>
    <!-- // scroll -->

</div>