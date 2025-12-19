<style>
    /* Jewelry Product Display Styling */
    .column-layer {
        background-size: cover !important;
        background-position: center !important;
    }
    
    /* Slider jewelry images - Square format for hero display */
    .tp-caption.tp-resizeme img {
        width: 450px !important;
        height: 450px !important;
        object-fit: contain;
        object-position: center;
        background: #f8f8f8;
        padding: 20px;
        border-radius: 8px;
    }
    
    /* Category images - Landscape for category banners */
    .category-image {
        position: relative;
        overflow: hidden;
        padding-bottom: 75%; /* 4:3 aspect ratio */
        background: #f8f8f8;
    }
    
    .category-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
    }
    
    .category-box:hover .category-image img {
        transform: scale(1.05);
    }
    
    /* Product listing images - Portrait for jewelry showcase */
    .shop-image {
        position: relative;
        overflow: hidden;
        padding-bottom: 125%; /* 4:5 aspect ratio - ideal for jewelry */
        background: #ffffff;
    }
    
    .shop-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
        padding: 15px;
        transition: transform 0.3s ease;
    }
    
    .shop-box:hover .shop-image img {
        transform: scale(1.08);
    }
    
    /* Ensure product cards have consistent height */
    .shop-box {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .shop-footer {
        margin-top: auto;
    }
    
    /* Responsive adjustments for jewelry display */
    @media (max-width: 991px) {
        .tp-caption.tp-resizeme img {
            width: 350px !important;
            height: 350px !important;
            padding: 15px;
        }
        
        .category-image {
            padding-bottom: 80%;
        }
        
        .shop-image {
            padding-bottom: 130%;
        }
        
        .shop-image img {
            padding: 12px;
        }
    }
    
    @media (max-width: 575px) {
        .tp-caption.tp-resizeme img {
            width: 270px !important;
            height: 270px !important;
            padding: 10px;
        }
        
        .category-image {
            padding-bottom: 85%;
        }
        
        .shop-image {
            padding-bottom: 135%;
        }
        
        .shop-image img {
            padding: 10px;
        }
    }
</style>

<div data-mobile-nav-style="classic">
    <section class="p-0 top-space-margin">
        <article class="content">
            <div id="jewellery-store-slider_wrapper" class="rev_slider_wrapper fullscreen-container">
                <!-- the ID here will be used in the JavaScript below to initialize the slider -->
                <div id="jewellery-store-slider" class="rev_slider fullscreenbanner" data-version="5.4.5">
                    <!-- begin slides list -->
                    <ul>
                        <!-- minimum slide structure -->
                        <li data-index="rs-01" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="01" data-description="">
                            <!-- slide's main background image -->
                            <img src="images/rev-trans-tile.png" alt="dummy" class="rev-slidebg" data-bgcolor='#ffddc6'>
                            <!-- start bubble layer -->
                            <div class="tp-caption tp-no-events tp-shape tp-shapewrapper tp-bubblemorph "
                                id="slide-1-layer-01"
                                data-x="['right','right','right','right']" data-hoffset="['-100','-200','-150','-150']"
                                data-y="['middle','top','middle','middle']" data-voffset="['-150','-100','100','100']"
                                data-width="['600','500','500','400']"
                                data-height="['600','550','500','400']"
                                data-whitespace="nowrap"
                                data-type="shape"
                                data-bubblesbg="transparent"
                                data-numbubbles="6|6|6|6"
                                data-bubblesbufferx="100|50|70|50"
                                data-bubblesbuffery="100|50|70|50"
                                data-bubblesspeedx="0.25|0.25|0.25|0.25"
                                data-bubblesspeedy="0.25|0.25|0.25|0.25"
                                data-bubblesbordercolor="#eebaa3|#eebaa3|#eebaa3|#eebaa3"
                                data-bubblesbordersize="1|1|1|1"
                                data-basealign="slide"
                                data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"opacity:0;fb:30px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                data-blendmode="multiply"
                                style="z-index: 0;pointer-events:none;">
                            </div>
                            <!-- end bubble layer -->
                            <!-- start bubble layer -->
                            <div class="tp-caption  tp-no-events tp-shape tp-shapewrapper tp-bubblemorph "
                                id="slide-1-layer-02"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','-200','-100']"
                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-150','-100','0','0']"
                                data-width="['600','500','500','400']"
                                data-height="['600','550','300','400']"
                                data-whitespace="nowrap"

                                data-type="shape"
                                data-bubblesbg="transparent"
                                data-numbubbles="6|6|6|6"
                                data-bubblesbufferx="100|50|100|20"
                                data-bubblesbuffery="100|50|100|20"
                                data-bubblesspeedx="0.25|0.25|0.25|0.25"
                                data-bubblesspeedy="0.25|0.25|0.25|0.25"
                                data-bubblesbordercolor="#eebaa3|#eebaa3|#eebaa3|#eebaa3"

                                data-bubblesbordersize="1|1|1|1"
                                data-basealign="slide"
                                data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"opacity:0;fb:30px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                data-blendmode="multiply"
                                style="z-index: 0;pointer-events:none;">
                            </div>
                            <!-- end bubble layer -->
                            <!-- start row zone layer -->
                            <div id="rrzm_638" class="rev_row_zone rev_row_zone_middle">
                                <!-- start row layer -->
                                <div class="tp-caption content-row"
                                    id="slide-1-layer-03"
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                    data-width="auto"
                                    data-height="full"
                                    data-whitespace="nowrap"
                                    data-basealign="slide"
                                    data-type="row"
                                    data-columnbreak="2"
                                    data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]">
                                    <!-- start column layer -->
                                    <div class="tp-caption d-flex justify-content-center flex-column column-layer"
                                        id="slide-1-layer-04"
                                        data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','top','middle']" data-voffset="['0','0','0','0']"
                                        data-width="100%"
                                        data-height="['full','full','50%','50%']"
                                        data-whitespace="nowrap"
                                        data-basealign="slide"
                                        data-type="column"
                                        data-responsive_offset="on"
                                        data-responsive="off"
                                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-columnwidth="['50%','50%','50%','50%']"
                                        data-columnheight="['none','none','50%','50%']"
                                        data-verticalalign="middle"
                                        data-margintop="[0,0,0,0]"
                                        data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,0,0]"
                                        data-marginleft="[0,0,0,0]"
                                        data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        style=" background-image: url('https://placehold.co/2000x2000'); background-size: cover; background-position: top;">
                                        <!-- start extra layer -->
                                        <div class="wrapper-text">
                                            <!-- start text layer -->
                                            <div class="tp-caption alt-font text-uppercase title-text"
                                                id="slide-1-layer-05"
                                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['140','100','100','80']"
                                                data-lineheight="['150','90','90','80']"
                                                data-fontweight="['600','600','600','600']"
                                                data-letterspacing="['-2','-2','-2','-2']"
                                                data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                                data-width="100%"
                                                data-height="100%"
                                                data-whitespace="normal"

                                                data-basealign="slide"
                                                data-type="text"
                                                data-responsive_offset="on"
                                                data-verticalalign="middle"
                                                data-responsive="on"
                                                data-frames='[{"delay":"800","split":"chars","splitdelay":0.03,"speed":1000,"split_direction":"middletoedge","frame":"0","from":"x:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;fb:0;","ease":"Power4.easeOut"}]'
                                                data-margintop="[0,0,0,0]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[50,0,100,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[50,0,100,0]"
                                                style="word-break: inherit;">
                                                New arrival
                                            </div>
                                            <!-- end text layer -->
                                        </div>
                                        <!-- end extra layer -->
                                    </div>
                                    <!-- end column layer -->
                                    <!-- start column layer -->
                                    <div class="tp-caption justify-content-center flex-column column-layer"
                                        id="slide-1-layer-06"
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','top','middle']" data-voffset="['0','0','0','0']"
                                        data-width="none"
                                        data-height="['none','none','50%','50%']"
                                        data-whitespace="nowrap"
                                        data-basealign="slide"
                                        data-type="column"
                                        data-responsive_offset="on"
                                        data-responsive="off"
                                        data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-columnwidth="['50%','50%','50%','50%']"
                                        data-columnheight="['none','none','50%','50%']"
                                        data-verticalalign="middle"
                                        data-margintop="[0,0,50,50]"
                                        data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,50,50]"
                                        data-marginleft="[0,0,0,0]"
                                        data-textAlign="['center','center','center','center']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]">
                                        <!-- start extra layer -->
                                        <div class="wrapper">
                                            <!-- start text layer -->
                                            <div class="tp-caption text-uppercase"
                                                id="slide-1-layer-07"
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['20','18','18','18']"
                                                data-lineheight="['30','30','30','30']"
                                                data-fontweight="['600','600','600','600']"
                                                data-letterspacing="['13','13','13','13']"
                                                data-color="['#16202c','#16202c','#16202c','#16202c']"
                                                data-width="auto"
                                                data-height="auto"
                                                data-whitespace="normal"
                                                data-basealign="slide"
                                                data-type="text"
                                                data-responsive_offset="off"
                                                data-responsive="on"
                                                data-frames='[{"delay":"1200","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                                data-margintop="[0,0,0,0]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]">
                                                classic jewellery
                                            </div>
                                            <!-- end text layer -->
                                            <!-- start image layer -->
                                            <div class="tp-caption tp-resizeme"
                                                id="slide-1-layer-08"
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-width="none"
                                                data-height="none"
                                                data-whitespace="nowrap"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:50px;rX:-5deg;opacity:0;fg:0;","to":"o:1;fg:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fg:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Power2.easeInOut","to":"o:1;sX:0.98;sY:0.98;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]"
                                                data-margintop="[50,30,20,10]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]">
                                                <img src="https://placehold.co/2000x2000" alt="" data-ww="['100%','100%','350','270']" data-hh="['100%','100%','350','270']" width="450" height="450">
                                            </div>
                                            <!-- end image layer -->
                                            <!-- start button layer -->
                                            <a class="tp-caption btn rev-btn d-inline-block text-uppercase bg-white shop-btn"
                                                href="demo-jewellery-store-shop.html"
                                                id="slide-1-layer-09"
                                                data-x="['center','left','left','left']" data-hoffset="['0','0','0','0']"
                                                data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['15','15','13','13']"
                                                data-lineheight="['60','60','50','50']"
                                                data-width="['280','280','250','250']"
                                                data-height="none"
                                                data-whitespace="normal"
                                                data-fontweight="['500','500','500','500']"
                                                data-letterspacing="['2','2','2','2']"
                                                data-color="['#232323','#232323','#232323','#232323'"
                                                data-type="button"
                                                data-actions=''
                                                data-responsive_offset="off"
                                                data-responsive="on"
                                                data-frames='[{"delay":"1600","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;c:rgb(35,35,35)","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgb(35,35,35);bg:rgb(255,255,255);"}]'
                                                data-margintop="[0,40,30,20]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]">
                                                Shop this collection</a>
                                            <!-- end button layer -->
                                        </div>
                                        <!-- end extra layer -->
                                    </div>
                                    <!-- end column layer -->
                                </div>
                                <!-- end row layer -->
                            </div>
                            <!-- end row zone layer -->
                        </li>
                        <!-- minimum slide structure -->
                        <li data-index="rs-02" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="01" data-description="">
                            <!-- slide's main background image -->
                            <img src="images/rev-trans-tile.png" alt="dummy" class="rev-slidebg" data-bgcolor='#ffddc6'>
                            <!-- start bubble layer -->
                            <div class="tp-caption tp-no-events tp-shape tp-shapewrapper tp-bubblemorph "
                                id="slide-2-layer-01"
                                data-x="['right','right','right','right']" data-hoffset="['-100','-200','-150','-150']"
                                data-y="['middle','top','middle','middle']" data-voffset="['-150','-100','100','100']"
                                data-width="['600','500','500','400']"
                                data-height="['600','550','500','400']"
                                data-whitespace="nowrap"
                                data-type="shape"
                                data-bubblesbg="transparent"
                                data-numbubbles="6|6|6|6"
                                data-bubblesbufferx="100|50|70|50"
                                data-bubblesbuffery="100|50|70|50"
                                data-bubblesspeedx="0.25|0.25|0.25|0.25"
                                data-bubblesspeedy="0.25|0.25|0.25|0.25"
                                data-bubblesbordercolor="#eebaa3|#eebaa3|#eebaa3|#eebaa3"
                                data-bubblesbordersize="1|1|1|1"
                                data-basealign="slide"
                                data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"opacity:0;fb:30px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                data-blendmode="multiply"
                                style="z-index: 0;pointer-events:none;">
                            </div>
                            <!-- end bubble layer -->
                            <!-- start bubble layer -->
                            <div class="tp-caption  tp-no-events tp-shape tp-shapewrapper tp-bubblemorph "
                                id="slide-2-layer-02"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','-200','-100']"
                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-150','-100','0','0']"
                                data-width="['600','500','500','400']"
                                data-height="['600','550','300','400']"
                                data-whitespace="nowrap"

                                data-type="shape"
                                data-bubblesbg="transparent"
                                data-numbubbles="6|6|6|6"
                                data-bubblesbufferx="100|50|100|20"
                                data-bubblesbuffery="100|50|100|20"
                                data-bubblesspeedx="0.25|0.25|0.25|0.25"
                                data-bubblesspeedy="0.25|0.25|0.25|0.25"
                                data-bubblesbordercolor="#eebaa3|#eebaa3|#eebaa3|#eebaa3"

                                data-bubblesbordersize="1|1|1|1"
                                data-basealign="slide"
                                data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"opacity:0;fb:30px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                data-blendmode="multiply"
                                style="z-index: 0;pointer-events:none;">
                            </div>
                            <!-- end bubble layer -->
                            <!-- start row zone layer -->
                            <div id="rrzm_639" class="rev_row_zone rev_row_zone_middle">
                                <!-- start row layer -->
                                <div class="tp-caption content-row"
                                    id="slide-2-layer-03"
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                    data-width="auto"
                                    data-height="full"
                                    data-whitespace="nowrap"
                                    data-basealign="slide"
                                    data-type="row"
                                    data-columnbreak="2"
                                    data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]">
                                    <!-- start column layer -->
                                    <div class="tp-caption d-flex justify-content-center flex-column column-layer"
                                        id="slide-2-layer-04"
                                        data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','top','middle']" data-voffset="['0','0','0','0']"
                                        data-width="100%"
                                        data-height="['full','full','50%','50%']"
                                        data-whitespace="nowrap"
                                        data-basealign="slide"
                                        data-type="column"
                                        data-responsive_offset="on"
                                        data-responsive="off"
                                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-columnwidth="['50%','50%','50%','50%']"
                                        data-columnheight="['none','none','50%','50%']"
                                        data-verticalalign="middle"
                                        data-margintop="[0,0,0,0]"
                                        data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,0,0]"
                                        data-marginleft="[0,0,0,0]"
                                        data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        style=" background-image: url('https://placehold.co/2000x2000'); background-size: cover; background-position: top;">
                                        <!-- start extra layer -->
                                        <div class="wrapper-text">
                                            <!-- start text layer -->
                                            <div class="tp-caption alt-font text-uppercase title-text"
                                                id="slide-2-layer-05"
                                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['140','100','100','80']"
                                                data-lineheight="['150','90','90','80']"
                                                data-fontweight="['600','600','600','600']"
                                                data-letterspacing="['-2','-2','-2','-2']"
                                                data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                                data-width="100%"
                                                data-height="100%"
                                                data-whitespace="normal"

                                                data-basealign="slide"
                                                data-type="text"
                                                data-responsive_offset="off"
                                                data-verticalalign="middle"
                                                data-responsive="on"
                                                data-frames='[{"delay":"800","split":"chars","splitdelay":0.03,"speed":1000,"split_direction":"middletoedge","frame":"0","from":"x:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;fb:0;","ease":"Power4.easeOut"}]'
                                                data-margintop="[0,0,0,0]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[50,0,100,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[50,0,100,0]"
                                                style="word-break: initial;">
                                                New arrival
                                            </div>
                                            <!-- end text layer -->
                                        </div>
                                        <!-- end extra layer -->
                                    </div>
                                    <!-- end column layer -->
                                    <!-- start column layer -->
                                    <div class="tp-caption justify-content-center flex-column column-layer"
                                        id="slide-2-layer-06"
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','top','middle']" data-voffset="['0','0','0','0']"
                                        data-width="none"
                                        data-height="['none','none','50%','50%']"
                                        data-whitespace="nowrap"
                                        data-basealign="slide"
                                        data-type="column"
                                        data-responsive_offset="on"
                                        data-responsive="off"
                                        data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-columnwidth="['50%','50%','50%','50%']"
                                        data-columnheight="['none','none','50%','50%']"
                                        data-verticalalign="middle"
                                        data-margintop="[0,0,50,50]"
                                        data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,50,50]"
                                        data-marginleft="[0,0,0,0]"
                                        data-textAlign="['center','center','center','center']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]">
                                        <!-- start extra layer -->
                                        <div class="wrapper">
                                            <!-- start text layer -->
                                            <div class="tp-caption text-uppercase"
                                                id="slide-2-layer-07"
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['20','18','18','18']"
                                                data-lineheight="['30','30','30','30']"
                                                data-fontweight="['600','600','600','600']"
                                                data-letterspacing="['13','13','13','13']"
                                                data-color="['#16202c','#16202c','#16202c','#16202c']"
                                                data-width="auto"
                                                data-height="auto"
                                                data-whitespace="normal"
                                                data-basealign="slide"
                                                data-type="text"
                                                data-responsive_offset="off"
                                                data-responsive="on"
                                                data-frames='[{"delay":"1200","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                                data-margintop="[0,0,0,0]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]">
                                                classic jewellery
                                            </div>
                                            <!-- end text layer -->
                                            <!-- start image layer -->
                                            <div class="tp-caption tp-resizeme"
                                                id="slide-2-layer-08"
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-width="none"
                                                data-height="none"
                                                data-whitespace="nowrap"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:50px;rX:-5deg;opacity:0;fg:0;","to":"o:1;fg:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fg:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Power2.easeInOut","to":"o:1;sX:0.98;sY:0.98;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]"
                                                data-margintop="[50,30,20,10]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]">
                                                <img src="https://placehold.co/2000x2000" alt="" data-ww="['100%','100%','350','270']" data-hh="['100%','100%','350','270']" width="450" height="450">
                                            </div>
                                            <!-- end image layer -->
                                            <!-- start button layer -->
                                            <a class="tp-caption btn rev-btn d-inline-block text-uppercase bg-white shop-btn"
                                                href="demo-jewellery-store-shop.html"
                                                id="slide-2-layer-09"
                                                data-x="['center','left','left','left']" data-hoffset="['0','0','0','0']"
                                                data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['15','15','13','13']"
                                                data-lineheight="['60','60','50','50']"
                                                data-width="['280','280','250','250']"
                                                data-height="none"
                                                data-whitespace="normal"
                                                data-fontweight="['500','500','500','500']"
                                                data-letterspacing="['2','2','2','2']"
                                                data-color="['#232323','#232323','#232323','#232323'"
                                                data-type="button"
                                                data-actions=''
                                                data-responsive_offset="off"
                                                data-responsive="on"
                                                data-frames='[{"delay":"1600","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;c:rgb(35,35,35)","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgb(35,35,35);bg:rgb(255,255,255);"}]'
                                                data-margintop="[0,40,30,20]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]">
                                                Shop this collection</a>
                                            <!-- end button layer -->
                                        </div>
                                        <!-- end extra layer -->
                                    </div>
                                    <!-- end column layer -->
                                </div>
                                <!-- end row layer -->
                            </div>
                            <!-- end row zone layer -->
                        </li>
                        <!-- minimum slide structure -->
                        <li data-index="rs-03" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="01" data-description="">
                            <!-- slide's main background image -->
                            <img src="images/rev-trans-tile.png" alt="dummy" class="rev-slidebg" data-bgcolor='#ffddc6'>
                            <!-- start bubble layer -->
                            <div class="tp-caption tp-no-events tp-shape tp-shapewrapper tp-bubblemorph "
                                id="slide-3-layer-01"
                                data-x="['right','right','right','right']" data-hoffset="['-100','-200','-150','-150']"
                                data-y="['middle','top','middle','middle']" data-voffset="['-150','-100','100','100']"
                                data-width="['600','500','500','400']"
                                data-height="['600','550','500','400']"
                                data-whitespace="nowrap"
                                data-type="shape"
                                data-bubblesbg="transparent"
                                data-numbubbles="6|6|6|6"
                                data-bubblesbufferx="100|50|70|50"
                                data-bubblesbuffery="100|50|70|50"
                                data-bubblesspeedx="0.25|0.25|0.25|0.25"
                                data-bubblesspeedy="0.25|0.25|0.25|0.25"
                                data-bubblesbordercolor="#eebaa3|#eebaa3|#eebaa3|#eebaa3"
                                data-bubblesbordersize="1|1|1|1"
                                data-basealign="slide"
                                data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"delay":800,"speed":2000,"frame":"0","from":"opacity:0;fb:30px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                data-blendmode="multiply"
                                style="z-index: 0;pointer-events:none;">
                            </div>
                            <!-- end bubble layer -->
                            <!-- start bubble layer -->
                            <div class="tp-caption  tp-no-events tp-shape tp-shapewrapper tp-bubblemorph "
                                id="slide-3-layer-02"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','-200','-100']"
                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-150','-100','0','0']"
                                data-width="['600','500','500','400']"
                                data-height="['600','550','300','400']"
                                data-whitespace="nowrap"

                                data-type="shape"
                                data-bubblesbg="transparent"
                                data-numbubbles="6|6|6|6"
                                data-bubblesbufferx="100|50|100|20"
                                data-bubblesbuffery="100|50|100|20"
                                data-bubblesspeedx="0.25|0.25|0.25|0.25"
                                data-bubblesspeedy="0.25|0.25|0.25|0.25"
                                data-bubblesbordercolor="#eebaa3|#eebaa3|#eebaa3|#eebaa3"

                                data-bubblesbordersize="1|1|1|1"
                                data-basealign="slide"
                                data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"opacity:0;fb:30px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                data-blendmode="multiply"
                                style="z-index: 0;pointer-events:none;">
                            </div>
                            <!-- end bubble layer -->
                            <!-- start row zone layer -->
                            <div id="rrzm_640" class="rev_row_zone rev_row_zone_middle">
                                <!-- start row layer -->
                                <div class="tp-caption content-row"
                                    id="slide-3-layer-03"
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                    data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                    data-width="auto"
                                    data-height="full"
                                    data-whitespace="nowrap"
                                    data-basealign="slide"
                                    data-type="row"
                                    data-columnbreak="2"
                                    data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-margintop="[0,0,0,0]"
                                    data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]">
                                    <!-- start column layer -->
                                    <div class="tp-caption d-flex justify-content-center flex-column column-layer"
                                        id="slide-3-layer-04"
                                        data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','top','middle']" data-voffset="['0','0','0','0']"
                                        data-width="100%"
                                        data-height="['full','full','50%','50%']"
                                        data-whitespace="nowrap"
                                        data-basealign="slide"
                                        data-type="column"
                                        data-responsive_offset="on"
                                        data-responsive="off"
                                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-columnwidth="['50%','50%','50%','50%']"
                                        data-columnheight="['none','none','50%','50%']"
                                        data-verticalalign="middle"
                                        data-margintop="[0,0,0,0]"
                                        data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,0,0]"
                                        data-marginleft="[0,0,0,0]"
                                        data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        style=" background-image: url('https://placehold.co/2000x2000'); background-size: cover; background-position: top;">
                                        <!-- start extra layer -->
                                        <div class="wrapper-text">
                                            <!-- start text layer -->
                                            <div class="tp-caption alt-font text-uppercase title-text"
                                                id="slide-3-layer-05"
                                                data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['140','100','100','80']"
                                                data-lineheight="['150','90','90','80']"
                                                data-fontweight="['600','600','600','600']"
                                                data-letterspacing="['-2','-2','-2','-2']"
                                                data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                                data-width="100%"
                                                data-height="100%"
                                                data-whitespace="normal"

                                                data-basealign="slide"
                                                data-type="text"
                                                data-responsive_offset="off"
                                                data-verticalalign="middle"
                                                data-responsive="on"
                                                data-frames='[{"delay":"800","split":"chars","splitdelay":0.03,"speed":1000,"split_direction":"middletoedge","frame":"0","from":"x:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;fb:0;","ease":"Power4.easeOut"}]'
                                                data-margintop="[0,0,0,0]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[50,0,100,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[50,0,100,0]"
                                                style="word-break: initial;">
                                                New arrival
                                            </div>
                                            <!-- end text layer -->
                                        </div>
                                        <!-- end extra layer -->
                                    </div>
                                    <!-- end column layer -->
                                    <!-- start column layer -->
                                    <div class="tp-caption justify-content-center flex-column column-layer"
                                        id="slide-3-layer-06"
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                        data-y="['middle','middle','top','middle']" data-voffset="['0','0','0','0']"
                                        data-width="none"
                                        data-height="['none','none','50%','50%']"
                                        data-whitespace="nowrap"
                                        data-basealign="slide"
                                        data-type="column"
                                        data-responsive_offset="on"
                                        data-responsive="off"
                                        data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-columnwidth="['50%','50%','50%','50%']"
                                        data-columnheight="['none','none','50%','50%']"
                                        data-verticalalign="middle"
                                        data-margintop="[0,0,50,50]"
                                        data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,50,50]"
                                        data-marginleft="[0,0,0,0]"
                                        data-textAlign="['center','center','center','center']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]">
                                        <!-- start extra layer -->
                                        <div class="wrapper">
                                            <!-- start text layer -->
                                            <div class="tp-caption text-uppercase"
                                                id="slide-3-layer-07"
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['20','18','18','18']"
                                                data-lineheight="['30','30','30','30']"
                                                data-fontweight="['600','600','600','600']"
                                                data-letterspacing="['13','13','13','13']"
                                                data-color="['#16202c','#16202c','#16202c','#16202c']"
                                                data-width="auto"
                                                data-height="auto"
                                                data-whitespace="normal"
                                                data-basealign="slide"
                                                data-type="text"
                                                data-responsive_offset="off"
                                                data-responsive="on"
                                                data-frames='[{"delay":"1200","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;","ease":"Power3.easeInOut"}]'
                                                data-margintop="[0,0,0,0]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]">
                                                classic jewellery
                                            </div>
                                            <!-- end text layer -->
                                            <!-- start image layer -->
                                            <div class="tp-caption tp-resizeme"
                                                id="slide-3-layer-08"
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                                data-width="none"
                                                data-height="none"
                                                data-whitespace="nowrap"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:50px;rX:-5deg;opacity:0;fg:0;","to":"o:1;fg:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fg:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Power2.easeInOut","to":"o:1;sX:0.98;sY:0.98;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]"
                                                data-margintop="[50,30,20,10]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]">
                                                <img src="https://placehold.co/2000x2000" alt="" data-ww="['100%','100%','350','270']" data-hh="['100%','100%','350','270']" width="450" height="450">
                                            </div>
                                            <!-- end image layer -->
                                            <!-- start button layer -->
                                            <a class="tp-caption btn rev-btn d-inline-block text-uppercase bg-white shop-btn"
                                                href="demo-jewellery-store-shop.html"
                                                id="slide-3-layer-09"
                                                data-x="['center','left','left','left']" data-hoffset="['0','0','0','0']"
                                                data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
                                                data-fontsize="['15','15','13','13']"
                                                data-lineheight="['60','60','50','50']"
                                                data-width="['280','280','250','250']"
                                                data-height="none"
                                                data-whitespace="normal"
                                                data-fontweight="['500','500','500','500']"
                                                data-letterspacing="['2','2','2','2']"
                                                data-color="['#232323','#232323','#232323','#232323'"
                                                data-type="button"
                                                data-actions=''
                                                data-responsive_offset="off"
                                                data-responsive="on"
                                                data-frames='[{"delay":"1600","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;fb:0;c:rgb(35,35,35)","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgb(35,35,35);bg:rgb(255,255,255);"}]'
                                                data-margintop="[0,40,30,20]"
                                                data-marginright="[0,0,0,0]"
                                                data-marginbottom="[0,0,0,0]"
                                                data-marginleft="[0,0,0,0]"
                                                data-textAlign="['center','center','center','center']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]">
                                                Shop this collection</a>
                                            <!-- end button layer -->
                                        </div>
                                        <!-- end extra layer -->
                                    </div>
                                    <!-- end column layer -->
                                </div>
                                <!-- end row layer -->
                            </div>
                            <!-- end row zone layer -->
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </section>
    <!-- end banner slider -->
    <!-- start section -->
    <section class="border-bottom pt-45px pb-45px">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2" data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <!-- start features box item -->
                <div class="col icon-with-text-style-01 md-mb-25px">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-25px">
                            <i class="ti-truck icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="fs-19 fw-500 d-block alt-font text-dark-gray">Free shipping</span>
                            <p class="lh-24">On order over $199</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-01 md-mb-25px">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-25px">
                            <i class="ti-headphone icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="fs-19 fw-500 d-block alt-font text-dark-gray">Online support</span>
                            <p class="lh-24">Customer service</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-01 md-mb-25px">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-25px">
                            <i class="ti-reload icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="fs-19 fw-500 d-block alt-font text-dark-gray">30 Days return</span>
                            <p class="lh-24">If goods have problems</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-01">
                    <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                        <div class="feature-box-icon me-25px">
                            <i class="ti-credit-card icon-large text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="fs-19 fw-500 d-block alt-font text-dark-gray">Secure payment</span>
                            <p class="lh-24">100% secure payment</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center mb-4" data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col-xl-5 col-lg-6 col-md-8 text-center last-paragraph-no-margin">
                    <h3 class="fw-500 ls-minus-1px text-dark-gray mb-10px">Shop by categories</h3>
                    <p>Lorem ipsum dolor amet consectetur adipiscing dictum placerat diam in vestibulum vivamus in eros.</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12">
                    @if($categories->count() > 0)
                    <ul class="portfolio-wrapper grid-loading shop-category-02 shop-grid grid grid-3col xxl-grid-3col md-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 500, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @foreach($categories as $category)
                        <!-- start shop item -->
                        <li class="grid-item">
                            <div class="category-box bg-dark-gray">
                                <div class="category-image">
                                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://placehold.co/600x477' }}" alt="{{ $category->name }}">
                                </div>
                                <div class="category-title absolute-middle-left">
                                    <h3 class="text-white alt-font fw-600 mb-0 text-shadow-large">{{ $category->name }}</h3>
                                </div>
                                <div class="category-hover-content d-flex flex-column align-items-center justify-content-center bg-base-color p-40px lg-p-25px">
                                    <h3 class="title text-dark-gray alt-font fw-600 position-relative z-index-1 ls-minus-1px">{{ $category->name }}<span class="absolute-middle-center text-light-orange z-index-minus-1 fs-150 opacity-6">{{ strtoupper(substr($category->name, 0, 1)) }}</span></h3>
                                    <a class="fs-14 fw-500 text-dark-gray text-uppercase position-absolute z-index-1 bottom-25px ls-05px" href="{{ url('/shop?category=' . $category->slug) }}">View collection</a>
                                </div>
                            </div>
                        </li>
                        <!-- end shop item -->
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 tab-style-04">
                    <ul class="nav nav-tabs fs-32 alt-font border-0 justify-content-center mb-4 ls-minus-05px">
                        <li class="nav-item"><a data-bs-toggle="tab" href="#tab_five1" class="nav-link active">New arrivals<span class="tab-border bg-dark-gray"></span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_five2">Best sellers<span class="tab-border bg-dark-gray"></span></a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_five3">Featured products<span class="tab-border bg-dark-gray"></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- start tab content -->
                        <div class="tab-pane fade in active show" id="tab_five1">
                            <ul class="shop-modern shop-wrapper grid-loading grid grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [15, 0], "translateX": [-15, 0], "opacity": [0,1], "duration": 500, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                                <li class="grid-sizer"></li>
                                @forelse($newArrivals as $product)
                                @php
                                $defaultVariant = $product->variants->first();
                                $price = $defaultVariant ? $defaultVariant->price : 0;
                                $salePrice = $defaultVariant && $defaultVariant->sale_price ? $defaultVariant->sale_price : null;
                                $primaryImage = $product->images->where('is_primary', true)->first() ?? $product->images->first();
                                @endphp
                                <!-- start shop item -->
                                <li class="grid-item">
                                    <div class="shop-box mb-10px">
                                        <div class="shop-image mb-25px">
                                            <a href="{{ url('/product/' . $product->slug) }}">
                                                <img src="{{ $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://placehold.co/600x765' }}" alt="{{ $product->name }}">
                                                <span class="lable new">New</span>
                                            </a>
                                            <div class="shop-buttons-wrap">
                                                <a href="{{ url('/product/' . $product->slug) }}" class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-cart">
                                                    <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                                </a>
                                            </div>
                                            <div class="shop-hover d-flex justify-content-center">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/product/' . $product->slug) }}" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="shop-footer text-center">
                                            <a href="{{ url('/product/' . $product->slug) }}" class="text-dark-gray fs-19 fw-500">{{ $product->name }}</a>
                                            <div class="price">
                                                @if($salePrice)
                                                <del>₹{{ number_format($price, 2) }}</del>₹{{ number_format($salePrice, 2) }}
                                                @else
                                                ₹{{ number_format($price, 2) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end shop item -->
                                @empty
                                <li class="col-12">
                                    <div class="text-center py-5">
                                        <p class="fs-18 text-medium-gray">No products available</p>
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five2">
                            <ul class="shop-modern shop-wrapper grid grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                                <li class="grid-sizer"></li>
                                @forelse($featuredProducts as $product)
                                @php
                                $defaultVariant = $product->variants->first();
                                $price = $defaultVariant ? $defaultVariant->price : 0;
                                $salePrice = $defaultVariant && $defaultVariant->sale_price ? $defaultVariant->sale_price : null;
                                $primaryImage = $product->images->where('is_primary', true)->first() ?? $product->images->first();
                                @endphp
                                <!-- start shop item -->
                                <li class="grid-item">
                                    <div class="shop-box mb-10px">
                                        <div class="shop-image mb-25px">
                                            <a href="{{ url('/product/' . $product->slug) }}">
                                                <img src="{{ $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://placehold.co/600x765' }}" alt="{{ $product->name }}">
                                                <span class="lable new">Featured</span>
                                            </a>
                                            <div class="shop-buttons-wrap">
                                                <a href="{{ url('/product/' . $product->slug) }}" class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-cart">
                                                    <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                                </a>
                                            </div>
                                            <div class="shop-hover d-flex justify-content-center">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/product/' . $product->slug) }}" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="shop-footer text-center">
                                            <a href="{{ url('/product/' . $product->slug) }}" class="text-dark-gray fs-19 fw-500">{{ $product->name }}</a>
                                            <div class="price">
                                                @if($salePrice)
                                                <del>₹{{ number_format($price, 2) }}</del>₹{{ number_format($salePrice, 2) }}
                                                @else
                                                ₹{{ number_format($price, 2) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end shop item -->
                                @empty
                                <li class="col-12">
                                    <div class="text-center py-5">
                                        <p class="fs-18 text-medium-gray">No featured products available</p>
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five3">
                            <ul class="shop-modern shop-wrapper grid-loading grid grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                                <li class="grid-sizer"></li>
                                @forelse($featuredProducts as $product)
                                @php
                                $defaultVariant = $product->variants->first();
                                $price = $defaultVariant ? $defaultVariant->price : 0;
                                $salePrice = $defaultVariant && $defaultVariant->sale_price ? $defaultVariant->sale_price : null;
                                $primaryImage = $product->images->where('is_primary', true)->first() ?? $product->images->first();
                                @endphp
                                <!-- start shop item -->
                                <li class="grid-item">
                                    <div class="shop-box mb-10px">
                                        <div class="shop-image mb-25px">
                                            <a href="{{ url('/product/' . $product->slug) }}">
                                                <img src="{{ $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://placehold.co/600x765' }}" alt="{{ $product->name }}">
                                                <span class="lable new">Featured</span>
                                            </a>
                                            <div class="shop-buttons-wrap">
                                                <a href="{{ url('/product/' . $product->slug) }}" class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-cart">
                                                    <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                                </a>
                                            </div>
                                            <div class="shop-hover d-flex justify-content-center">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/product/' . $product->slug) }}" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="shop-footer text-center">
                                            <a href="{{ url('/product/' . $product->slug) }}" class="text-dark-gray fs-19 fw-500">{{ $product->name }}</a>
                                            <div class="price">
                                                @if($salePrice)
                                                <del>₹{{ number_format($price, 2) }}</del>₹{{ number_format($salePrice, 2) }}
                                                @else
                                                ₹{{ number_format($price, 2) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end shop item -->
                                @empty
                                <li class="col-12">
                                    <div class="text-center py-5">
                                        <p class="fs-18 text-medium-gray">No featured products available</p>
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->

    <!-- end section -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-xl-5 col-lg-6 col-md-8 text-center last-paragraph-no-margin" data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 500, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h3 class="fw-500 ls-minus-1px text-dark-gray mb-10px">Featured products</h3>
                    <p>Discover our handpicked selection of exquisite jewelry pieces that blend timeless elegance with contemporary design.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="shop-modern shop-wrapper grid-loading grid grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [15, 0], "translateX": [-15, 0], "opacity": [0,1], "duration": 500, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @forelse($featuredProducts->take(8) as $product)
                        @php
                        $defaultVariant = $product->variants->first();
                        $price = $defaultVariant ? $defaultVariant->price : 0;
                        $salePrice = $defaultVariant && $defaultVariant->sale_price ? $defaultVariant->sale_price : null;
                        $primaryImage = $product->images->where('is_primary', true)->first() ?? $product->images->first();
                        @endphp
                        <!-- start shop item -->
                        <li class="grid-item">
                            <div class="shop-box mb-10px">
                                <div class="shop-image mb-25px">
                                    <a href="{{ url('/product/' . $product->slug) }}">
                                        <img src="{{ $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://placehold.co/600x765' }}" alt="{{ $product->name }}">
                                        @if($product->is_featured)
                                        <span class="lable">Featured</span>
                                        @endif
                                    </a>
                                    <div class="shop-buttons-wrap">
                                        <a href="{{ url('/product/' . $product->slug) }}" class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-cart">
                                            <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                        </a>
                                    </div>
                                    <div class="shop-hover d-flex justify-content-center">
                                        <ul>
                                            <li>
                                                <a href="#" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/product/' . $product->slug) }}" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-footer text-center">
                                    <a href="{{ url('/product/' . $product->slug) }}" class="text-dark-gray fs-19 fw-500">{{ $product->name }}</a>
                                    <div class="price">
                                        @if($salePrice)
                                        <del>₹{{ number_format($price, 2) }}</del>₹{{ number_format($salePrice, 2) }}
                                        @else
                                        ₹{{ number_format($price, 2) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end shop item -->
                        @empty
                        <li class="col-12">
                            <div class="text-center py-5">
                                <p class="fs-18 text-medium-gray">No featured products available at the moment.</p>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- end section -->

</div>