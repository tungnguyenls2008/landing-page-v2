@inject('Utilities','App\Http\Utils\Utilities')
<?php
$en = $Utilities->processHighlightText($about->content, $about->highlight);
$ar = $Utilities->processHighlightText($about->content_ar, $about->highlight_ar);
?>
<div data-anchor="page2" class="pp-scrollable section section-2">
    <div class="scroll-wrap">
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <div class="vertical-title text-dark hidden-xs hidden-sm">
                        <span>{{ app()->getLocale() == 'en' ? $about->sidebar : $about->sidebar_ar }}</span></div>
                    <div class="boxed">
                        <div class="container">
                            <div class="intro">
                                <div class="row">
                                    <div class="col-md-5 col-lg-5">
                                        <p class="subtitle-top text-dark">{{ app()->getLocale() == 'en' ? $about->header : $about->header_ar }}</p>
                                        <h2 class="title-uppercase pre-line">{{ app()->getLocale() == 'en' ? $en['first'] : $ar['first'] }}<span class="text-primary">{{ app()->getLocale() == 'en' ? $en['middle'] : $ar['middle'] }}</span>{{app()->getLocale() == 'en' ? $en['last'] : $ar['last']}}</h2>
                                        {!!  app()->getLocale() == 'en' ? $about->description : $about->description_ar  !!}
                                    </div>
                                    <div class="col-md-6 col-lg-5 col-md-offset-1 col-lg-offset-2">
                                        <div class="progress-bars">
                                            @foreach($skills as $skill)
                                                <div class="clearfix">
                                                    <div class="number pull-left">{{ app()->getLocale() == 'en' ? $skill->title : $skill->title_ar }}</div>
                                                    <div class="number pull-right">{{$skill->amount}}%</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{$skill->amount}}%"
                                                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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
