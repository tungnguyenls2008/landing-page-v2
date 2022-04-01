@inject('Utilities','App\Http\Utils\Utilities')
<?php
$en = $Utilities->processHighlightText($home->content, $home->highlight);
$ar = $Utilities->processHighlightText($home->content_ar, $home->highlight_ar);
?>
<div data-anchor="page1" class="pp-scrollable text-white section section-1">
    <div class="scroll-wrap">
        <div class="section-bg" style="background-image:url({{ asset('images/bg/' . $general->home_bg) }});"></div>
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <div class="vertical-title hidden-xs hidden-sm">
                        <span>{{ app()->getLocale() == 'en' ? $home->sidebar : $home->sidebar_ar }}</span></div>
                    <div class="boxed">
                        <div class="container">
                            <div class="intro">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <p class="subtitle-top pre-line">{{ app()->getLocale() == 'en' ? $home->header : $home->header_ar }}</p>
                                        <h1 class="display-2 text-white pre-line">{{ app()->getLocale() == 'en' ? $en['first'] : $ar['first'] }}<span class="text-primary">{{ app()->getLocale() == 'en' ? $en['middle'] : $ar['middle'] }}</span>{{app()->getLocale() == 'en' ? $en['last'] : $ar['last']}}</h1>
                                        <div class="hr-bottom"></div>
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
