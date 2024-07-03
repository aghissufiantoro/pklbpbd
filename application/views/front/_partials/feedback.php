<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<style>
    #testimonial_area {
        padding: 1% 0;
    }
    .box-area {
        padding: 30px;
        position: relative;
        display: block;
        background: #fcfcfc;
        color: #000;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 40px 0;
    }
    .box-area h5 {
        font-size: 16px;
        font-weight: 700;
        color: #f17122;
        margin-top: 30px;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .box-area span {
        color: #262626;
        display: block;
        font-size: 13px;
        margin: 0 0 10px;
        font-weight: 400;
    }
    .box-area .content {
        color: #262626;
    }
    .box-area .img-area {
        width: 90px;
        height: 90px;
        position: absolute;
        top: -40px;
        left: 0;
        bottom: 0;
        margin: 0 auto;
        right: 0;
        z-index: 1;
        border: 5px solid #fff;
        border-radius: 50%;
        box-shadow: 0 5px 4px rgba(0, 0, 0, 0.5);
    }
    .box-area .img-area  {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }

    #testimonial_area .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
    }

    #testimonial_area .owl-prev, #testimonial_area .owl-next {
        width: 40px;
        height: 40px;
        line-height: 40px;
        color: #000000;
        border-radius: 50%;
        text-align: center;
        background: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        position: absolute;
    }


    #testimonial_area .owl-prev {
        left: -50px;
    }

    #testimonial_area .owl-next {
        right: -50px;
    }

    @media only screen and (max-width: 991px) {
        .owl-nav {
            display: none;
        }
    }

    @media only screen and (max-width: 767px) {
        .box-area {
            text-align: center;
        }
        .owl-nav {
            display: none;
        }
    }

    .read-more, .read-less {
        color: #f17122;
        cursor: pointer;
        text-decoration: underline;
    }
    .revieww {
        background-color: #ffffff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        width: 100%; /* Make the width responsive */
        max-width: 1430px; /* Set a max width */
        margin: 0 auto; /* Center the container */
    }
</style>
<div class="container-fluid pt-5 revieww" >
<section id="testimonial_area" class="section_padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="display-5 mb-1">Review</h1>
				<div class="testmonial_slider_area text-center owl-carousel ">
					<?php if (!empty($reviews)): ?>
						<?php foreach ($reviews as $review): ?>
							<div class="box-area">
								<h5><?= htmlspecialchars($review->nama, ENT_QUOTES, 'UTF-8') ?></h5>
								<div class="rating">
									<?php for ($i = 1; $i <= 5; $i++): ?>
										<i class='bx <?= $i <= $review->rating ? 'bxs-star' : 'bx-star' ?>' style='color: #ffcd00;'></i>
									<?php endfor; ?>
								</div>
								<p class="content">
									<span class="short-text"><?= htmlspecialchars(substr($review->isi_review, 0, 100), ENT_QUOTES, 'UTF-8') ?></span>
									<span class="long-text" style="display:none;"><?= htmlspecialchars($review->isi_review, ENT_QUOTES, 'UTF-8') ?></span>
									<?php if (strlen($review->isi_review) > 100): ?>
										<a href="#" class="read-more">Read more</a>
										<a href="#" class="read-less" style="display:none;">Read less</a>
									<?php endif; ?>
								</p>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p style="text-align: center; color: #000000;">Jadilah yang pertama mengisi survey!</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

<script>
    $(".testmonial_slider_area").owlCarousel({
        autoplay: true,
        slideSpeed:1000,
        items : 3,
        loop: true,
        nav:true,
        navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
        margin: 30,
        dots: true,
        responsive:{
            320:{
                items:1
            },
            767:{
                items:2
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    $(document).on('click', '.read-more', function(e) {
        e.preventDefault();
        $(this).siblings('.short-text').hide();
        $(this).siblings('.long-text').show();
        $(this).hide();
        $(this).siblings('.read-less').show();
    });

    $(document).on('click', '.read-less', function(e) {
        e.preventDefault();
        $(this).siblings('.short-text').show();
        $(this).siblings('.long-text').hide();
        $(this).hide();
        $(this).siblings('.read-more').show();
    });

</script>














<!--<style>-->
<!--    .container-xxl.py-5 {-->
<!--        display: block;-->
<!--        justify-content: center;-->
<!--        padding: 50px;-->
<!--    }-->
<!---->
<!--    .review-box {-->
<!--        background-color: #ffffff;-->
<!--        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);-->
<!--        border-radius: 15px;-->
<!--    }-->
<!---->
<!--    .review-container {-->
<!--        width: 100%;-->
<!--        display: flex;-->
<!--        flex-wrap: wrap;-->
<!--        gap: 20px;-->
<!--        padding: 20px;-->
<!--        position: relative;-->
<!--        overflow: hidden;-->
<!--    }-->
<!---->
<!--    .review {-->
<!--        flex: 0 0 calc(50% - 20px);-->
<!--        background-color: #ffffff;-->
<!--        border-radius: 10px;-->
<!--        padding: 25px;-->
<!--        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);-->
<!--        transition: transform 0.2s ease, box-shadow 0.2s ease;-->
<!--        cursor: pointer;-->
<!--        color: #333;-->
<!--        opacity: 0;-->
<!--        position: absolute;-->
<!--        transition: opacity 1s ease;-->
<!--    }-->
<!---->
<!--    .review.active {-->
<!--        opacity: 1;-->
<!--        position: relative;-->
<!--    }-->
<!---->
<!--    .review-header {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        align-items: center;-->
<!--        margin-bottom: 10px;-->
<!--    }-->
<!---->
<!--    .short-review {-->
<!--        display: block;-->
<!--    }-->
<!---->
<!--    .full-review {-->
<!--        display: none;-->
<!--    }-->
<!---->
<!--    .review.expanded .short-review {-->
<!--        display: none;-->
<!--    }-->
<!---->
<!--    .review.expanded .full-review {-->
<!--        display: block;-->
<!--    }-->
<!---->
<!--    .rating {-->
<!--        display: flex;-->
<!--    }-->
<!---->
<!--    .rating .bx {-->
<!--        font-size: 24px;-->
<!--        color: #ffdd00;-->
<!--    }-->
<!--</style>-->
<!--</head>-->
<!--<body>-->
<!--<div class="container-xxl py-5 review-box">-->
<!--	<h2 style="text-align: center; margin-bottom: 30px; color: #000000;">Survey Kepuasan</h2>-->
<!---->
<!--	<div class="review-container">-->
<!--		--><?php //if (!empty($reviews)): ?>
<!--			--><?php //foreach ($reviews as $index => $review): ?>
<!--				--><?php
//				$fullReview = htmlspecialchars($review->isi_review, ENT_QUOTES, 'UTF-8');
//				$words = explode(' ', $review->isi_review);
//				$shortReview = implode(' ', array_slice($words, 0, 15)) . (count($words) > 15 ? '...' : '');
//				$shortReview = htmlspecialchars($shortReview, ENT_QUOTES, 'UTF-8');
//				?>
<!--				<div class="review" onclick="toggleReview(this)">-->
<!--					<div class="review-header">-->
<!--						<h4>--><?php //= htmlspecialchars($review->nama, ENT_QUOTES, 'UTF-8') ?><!--</h4>-->
<!--						<div class="rating">-->
<!--							--><?php //for ($i = 1; $i <= 5; $i++): ?>
<!--								<i class='bx --><?php //= $i <= $review->rating ? 'bxs-star' : 'bx-star' ?><!--' style='color: #ffdd00;'></i>-->
<!--							--><?php //endfor; ?>
<!--						</div>-->
<!--					</div>-->
<!--					<p class="short-review">--><?php //= $shortReview ?><!--</p>-->
<!--					<p class="full-review">--><?php //= $fullReview ?><!--</p>-->
<!--				</div>-->
<!--			--><?php //endforeach; ?>
<!--		--><?php //else: ?>
<!--			<p style="text-align: center; color: #000000;">Jadilah yang pertama mengisi survey!</p>-->
<!--		--><?php //endif; ?>
<!--	</div>-->
<!--</div>-->
<!---->
<!--<script>-->
<!--    function toggleReview(element) {-->
<!--        element.classList.toggle('expanded');-->
<!--    }-->
<!---->
<!--    const reviews = document.querySelectorAll('.review');-->
<!--    const reviewsPerPage = 6;-->
<!--    let currentStartIndex = 0;-->
<!---->
<!--    function showReviews(startIndex) {-->
<!--        reviews.forEach((review, index) => {-->
<!--            review.classList.remove('active');-->
<!--            if (index >= startIndex && index < startIndex + reviewsPerPage) {-->
<!--                review.classList.add('active');-->
<!--            }-->
<!--        });-->
<!--    }-->
<!---->
<!--    function showNextBatch() {-->
<!--        currentStartIndex = (currentStartIndex + reviewsPerPage) % reviews.length;-->
<!--        showReviews(currentStartIndex);-->
<!--    }-->
<!---->
<!--    setInterval(showNextBatch, 30000); // mengganti review setiap 30 detik-->
<!---->
<!--    showReviews(0);-->
<!--</script>-->