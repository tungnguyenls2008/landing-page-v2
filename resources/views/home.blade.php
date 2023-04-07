@inject('Utilities','App\Http\Utils\Utilities')
<?php
$en = $Utilities->processHighlightText($home->content, $home->highlight);
$ar = $Utilities->processHighlightText($home->content_ar, $home->highlight_ar);
?>
<style>
    .pulse-button {
        position: relative;
        font-size: 1.3em;
        font-weight: light;
        font-family: 'Trebuchet MS', sans-serif;
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 0px;
        color: white;
        border: none;
        border-radius: 0%;
        background: #000000;
        cursor: pointer;
        box-shadow: 0 0 0 0 rgba(101, 55, 143, 0.25);
        -webkit-animation: pulse 1.7s infinite;
    }

    .pulse-button:hover {
        -webkit-animation: none;
    }

    @-webkit-keyframes pulse {
        0% {
            -moz-transform: scale(0.95);
            -ms-transform: scale(0.95);
            -webkit-transform: scale(0.95);
            transform: scale(0.95);
        }
        70% {
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
            box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
        }
        100% {
            -moz-transform: scale(0.95);
            -ms-transform: scale(0.95);
            -webkit-transform: scale(0.95);
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
        }
    }
</style>
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
                                        <h1 class="display-2 text-white"
                                            style="text-shadow: 2px 0 #000000, -2px 0 #000000, 0 2px #000000, 0 -2px #000000,
               1px 1px #000000, -1px -1px #000000, 1px -1px #000000, -1px 1px #000000;"
                                        >{{ app()->getLocale() == 'en' ? $en['first'] : $ar['first'] }}
                                            <span class="text-primary">{{ app()->getLocale() == 'en' ? $en['middle'] : $ar['middle'] }}</span>{{app()->getLocale() == 'en' ? $en['last'] : $ar['last']}}
                                        </h1>
                                        <div style="width: max-content">
                                            <a class="btn btn-warning pulse-button"
                                               href="{{asset('docs/NGUYEN-DUC-TUNG-vie.pdf')}}"
                                               target="_blank">@lang('Curriculum Vitae') (VIE)</a>&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-warning pulse-button"
                                               href="{{asset('docs/NGUYEN-DUC-TUNG-eng.pdf')}}"
                                               target="_blank">@lang('Curriculum Vitae') (ENG)</a>
                                        </div>
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
