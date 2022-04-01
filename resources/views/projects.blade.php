<div data-anchor="page3" class="pp-scrollable text-white section section-3">
    <div class="scroll-wrap">
        <div class="bg-changer">
            @foreach($works as $work)
                <div class="section-bg" style="background-image:url({{ asset('images/works/' . $work->image) }});"></div>
            @endforeach
        </div>
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <div class="vertical-title hidden-xs hidden-sm"><span>{{ app()->getLocale() == 'en' ? $work_layout->sidebar : $work_layout->sidebar_ar }}</span></div>
                    <div class="boxed">
                        <div class="container">
                            <div class="intro">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="title-uppercase text-white">{{ app()->getLocale() == 'en' ? $work_layout->header : $work_layout->header_ar }}</h2>
                                        <div class="row-project-box row">
                                            @foreach($works as $work)
                                                <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                                                    <a href="{{ app()->getLocale() == 'en' ? $work->description : $work->description_ar }}" class="project-box" target="_blank">
                                                        <div class="project-box-inner">
                                                            <h5>{{ app()->getLocale() == 'en' ? $work->project_name : $work->project_name_ar }}</h5>
                                                            <div class="project-category">{{ app()->getLocale() == 'en' ? $work->category->name : $work->category->name_ar }}</div>
{{--                                                            <div ><p>{{ app()->getLocale() == 'en' ? $work->description : $work->description_ar }}</p></div>--}}
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
{{--                                        <a href="#" class="h5 link-arrow text-white">view all projects <i class="icon icon-chevron-right"></i></a>--}}
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
