
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    
	<title>Phpto Gallery</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="robots" content="index,follow">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
	<link rel="stylesheet" href="../common/css/bootstrap.min.css">
	<style>

        .gallery-body{
            background-color:#f3f3f3;
        }
        .gl-h2{
            text-align:center;
        }
  
		.mb60{
			margin-bottom: 60px;
		}	
		.swiper-container{
			text-align: center;
		}
		.swiper-container .swiper-slide img{
			max-width: 80%;
			width: 70%;
            height: auto;
            overflow:hidden;
		}
		.prettyprint{
			border: none;
			background: #fafafa;
			color: #697d86;
		}
		#thumbs {
	        height: 20%;
	        box-sizing: border-box;
	        padding: 10px 0;
	    }
	    #thumbs .swiper-slide {
	        width: 20%;
	        height: 100%;
	        opacity: 0.2;
	        cursor: pointer;
	    }
	    #thumbs .swiper-slide-active {
	        opacity: 1;
        }
        
        .swiper-slide.caption {
            font-size:60px;
            text-align:center;
            color:#595857;
        }
        .swiper-slide .mask {
            width:			100%;
            height:			100%;
            position:		absolute;
            top:			0;
            left:			0;
            opacity:		0;	/* マスクを表示しない */
            -webkit-transition:	all 0.6s ease;
            transition:		all 0.6s ease;
        }
        .swiper-slide:hover .mask {
            opacity:		1;	/* マスクを表示する */
            padding-top:		80px;	/* ホバーで下にずらす */
        }
	</style>
</head>
<body class="gallery-body">


	<div id="page">
		
		<div id="contents">
			<div class="jumbotron">
				<div class="container">
                    <h2 class="gl-h2">Photograph gallery</h2>
				</div>
			</div>
			<div class="container">

				<div id="slider" class="swiper-container" >
					<div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="images/profile-top-imag.JPG" alt="">
                            <div class="mask">
                                <div class="caption">Oman Nizwa</div>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <img src="images/gallery.png" alt="">
                            <div class="mask">
                                <div class="caption">Iran Esfahan</div>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <img src="images/oman.JPG" alt="">
                            <div class="mask">
                                <div class="caption">Oman Musqat</div>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <img src="images/iran.jpg" alt="">
                            <div class="mask">
                                <div class="caption">Iran Esfahan</div>
                            </div>
                        </div>
						<div class="swiper-slide">
                            <img src="images/Palestina.jpg" alt="">
                            <div class="mask">
                                <div class="caption">Palestina</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/ezypt-pyramid.JPG" alt="">
                            <div class="mask">
                                <div class="caption">Ezypt Cairo</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/dubai.jpeg" alt="">
                            <div class="mask">
                                <div class="caption">UAE Dubai</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/operahouse.jpeg" alt="">
                            <div class="mask">
                                <div class="caption">Oman Musqat</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/sultan.jpeg" alt="">
                            <div class="mask">
                                <div class="caption">Oman Musqat</div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/souq.jpg" alt="">
                            <div class="mask">
                                <div class="caption">Oman Matra</div>
                            </div>
                        </div>
					</div>
					<div class="swiper-button-prev swiper-button-white"></div>
					<div class="swiper-button-next swiper-button-white"></div>
				</div>

				<div id="thumbs" class="swiper-container mb60">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="images/profile-top-imag.JPG" alt=""></div>
						<div class="swiper-slide"><img src="images/gallery.png" alt=""></div>
						<div class="swiper-slide"><img src="images/oman.JPG" alt=""></div>
						<div class="swiper-slide"><img src="images/iran.jpg" alt=""></div>
						<div class="swiper-slide"><img src="images/Palestina.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/ezypt-pyramid.JPG" alt=""></div>
                        <div class="swiper-slide"><img src="images/dubai.jpeg" alt=""></div>
                        <div class="swiper-slide"><img src="images/operahouse.jpeg" alt=""></div>
                        <div class="swiper-slide"><img src="images/sultan.jpeg" alt=""></div>
                        <div class="swiper-slide"><img src="images/souq.jpg" alt=""></div>
					</div>
				</div>

				<div class="mb60">
				<pre class="linenums prettyprint"></pre></div>
            </div>
            <a class="btn btn-primary" href="index.php" role="button">トップページに戻る</a>

		
    </div><!-- #page -->
    

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
	<script>
		var slider = new Swiper ('#slider', {
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev'
		})
		var thumbs = new Swiper('#thumbs', {
			centeredSlides: true,
			spaceBetween: 10,
			slidesPerView: "auto",
			touchRatio: 0.2,
			slideToClickedSlide: true
		});
		slider.params.control = thumbs;
		thumbs.params.control = slider;
	</script>
</body>
</html>