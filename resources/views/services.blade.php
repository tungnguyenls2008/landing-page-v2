@inject('Utilities','App\Http\Utils\Utilities')
<?php
$en = $Utilities->processHighlightText($service_layout->content, $service_layout->highlight);
$ar = $Utilities->processHighlightText($service_layout->content_ar, $service_layout->highlight_ar);
?>
<div data-anchor="page4" class="pp-scrollable section section-4">
    <div class="scroll-wrap">
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <div class="vertical-title text-dark hidden-xs hidden-sm"><span>{{ app()->getLocale() == 'en' ? $service_layout->sidebar : $service_layout->sidebar_ar }}</span></div>
                    <div class="boxed">
                        <div class="container">
                            <div class="intro">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5">
                                        <p class="subtitle-top text-dark pre-line">{{ app()->getLocale() == 'en' ? $service_layout->header : $service_layout->header_ar }}</p>
                                        <h2 class="title-uppercase">{{ app()->getLocale() == 'en' ? $en['first'] : $ar['first'] }}<span class="text-primary">{{ app()->getLocale() == 'en' ? $en['middle'] : $ar['middle'] }}</span>{{app()->getLocale() == 'en' ? $en['last'] : $ar['last']}}</h2>
                                        <ul class="service-list">
                                            @foreach($services as $service)
                                                <li><a href="">0{{$loop->iteration}}. {{ app()->getLocale() == 'en' ? $service->name : $service->name_ar}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-5 col-md-offset-1 col-lg-offset-2">
                                        <div class="dots-image-2">
                                            <img alt="" class="img-responsive" src="{{ asset('images/me/' . $service_layout->img) }}">
                                            <div class="dots"></div>
{{--                                            <div class="experience-info">--}}
{{--                                                <div class="number">4</div>--}}
{{--                                                <div class="text">Years<br>Experience<br>Working</div>--}}
{{--                                            </div>--}}
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
