<div data-anchor="page6" class="pp-scrollable section section-4">
    <div class="scroll-wrap">
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <div class="vertical-title text-dark hidden-xs hidden-sm"><span>{{ app()->getLocale() == 'en' ? $client_layout->sidebar : $client_layout->sidebar_ar }}</span></div>
                    <div class="boxed">
                        <div class="container">
                            <div class="intro overflow-hidden">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-partners">
                                            @foreach($clients as $client)
                                                <div class="col-partner">
                                                    <div class="partner-inner"><img alt="{{ $client->name }}" src="{{ asset('images/clients/' . $client->image) }}"></div>
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
