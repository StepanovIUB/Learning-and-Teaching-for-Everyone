<?php
//include 'function.php';
?>

    <!-- Demo styles -->
    <style>
    .swiper-container {
	margin-top: 0px;
        width: 440px;
        height: 300px;
    }
    .swiper-slide, .swiper-slide > img {
	width: 440px;
        text-align: center;
        font-size: 18px;
        background: none;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    @media screen and (max-width: 500px) {
    	.swiper-container {
		margin-top: 50px;
		width: 100%;
		height: 360px;
	}
	.swiper-slide {
		width: 100%;
	}
	.swiper-slide img {
		width: 100%;
	}
    }
    </style>

    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
		<?php
		//$com_num = $_GET['comnum'];
		class_detail_right();
		?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <!-- Swiper JS -->
    <script src="js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30
    });
    </script>


    <div class="com_info" style="text-align:center">
    	<?php
	print "<div class='show_avail'><a href='javascript:show_avail();'>SHOW<br>Availability</a></div>";
	if ($key == Null) {
		print "<div class='show_avail'><a href='insert_cart.php?comnum=".$_GET['comnum']."'>Add Cart</a></div>";
	}
	?>
    </div>
    <div class="edit">
		<?php
		if ($_SESSION['id'] == 'omnius') {
			print "<a href='edit.php?comnum=".$com_num."'>Edit</a>";
		}
		?>
    </div>
<?php
include 'footer.php';
?>
