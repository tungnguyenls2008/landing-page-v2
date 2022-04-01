<div data-anchor="page7" class="pp-scrollable text-white section section-6">
    <div class="scroll-wrap">
        <div class="section-bg" style="background-image:url({{ asset('images/bg/' . $general->review_bg) }});"></div>
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <div class="vertical-title hidden-xs hidden-sm"><span>{{ app()->getLocale() == 'en' ? $review_layout->sidebar : $review_layout->sidebar_ar }}</span></div>
                    <div class="boxed">
                        <div class="container">
                            <div class="intro">
                                <div class="row">
                                    <div class="col-md-6 col-lg-5">
                                        <span class="icon-quote ion-quote"></span>
                                        <h2 class="title-uppercase text-white">{{ app()->getLocale() == 'en' ? $review_layout->content : $review_layout->content_ar }}</h2>
                                    </div>
                                    <div class="col-md-5 col-lg-5  col-md-offset-1 col-lg-offset-2">
                                        <div class="review-carousel owl-carousel">
                                            @foreach($reviews as $review)
                                                <div class="review-carousel-item">
                                                    <div class="text">
                                                        <p class="pre-line">{{ app()->getLocale() == 'en' ? $review->content : $review->content_ar }}</p>
                                                    </div>
                                                    <div class="review-author">
                                                        <div class="author-name">{{ app()->getLocale() == 'en' ? $review->client_name : $review->client_name_ar }}</div>
                                                        <i>{{ app()->getLocale() == 'en' ? $review->client_job : $review->client_job_ar }}</i>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
