
<link rel="stylesheet" type="text/css" href="{{ asset('candidate/assets/themes/light/plugins/pricing-table/css/component.css') }}"/>

<section class="pb_section bg-light pb_slant-white" id="section-pricing">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center mb-5">
                <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Pricing</strong></h5>
                <h2>Choose Your Organization Plan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Pricing Plans Container -->
                <div class="pricing-plans-container mt-5 d-md-flex d-block">
                    <!-- Plan -->
                    <div class="pricing-plan mb-5">
                        <h3>Basic Plan</h3>
                        <p class="margin-top-10">Great option for average organizations seeking basic features.</p>
                        <div class="pricing-plan-label billed-monthly-label" style="display: none"><strong>$10</strong>/ monthly</div>
                        <div class="pricing-plan-label billed-yearly-label" style="display: block"><strong>$109.99</strong>/ yearly</div>
                        <div class="pricing-plan-features mb-4">
                            <strong>Basic Features</strong>
                            <ul>
                                <li>35 Assessments</li>
                                <li>50 Questions / Assessment</li>
                                <li>Image Resource Available</li>
                            </ul>
                        </div>
                        <a href="#organization" class="button btn btn-primary btn-block margin-top-20">Buy Now</a>
                    </div>
                    <!-- Plan -->
                    <div class="pricing-plan mb-5 mt-md-0 recommended">
                        <div class="recommended-badge">Most Popular</div>
                        <h3>Business Plan</h3>
                        <p class="margin-top-10">For large organizations with all available features and more.</p>
                        <div class="pricing-plan-label billed-monthly-label" style="display: none"><strong>$13</strong>/ monthly</div>
                        <div class="pricing-plan-label billed-yearly-label" style="display: block"><strong>$149.99</strong>/ yearly</div>
                        <div class="pricing-plan-features mb-4">
                            <strong>Business Features</strong>
                            <ul>
                                <li>Unlimited Assessments</li>
                                <li>200 Questions / Assessment</li>
                                <li>Image & Video Resource Available</li>
                            </ul>
                        </div>
                        <a href="#organization" class="button btn btn-default btn-block margin-top-20">Buy Now</a>
                    </div>
                    <!-- Plan -->
                    <div class="pricing-plan mb-5">
                        <h3>Free Plan</h3>
                        <p class="margin-top-10">Getting familiar with our services and offers made easy for businesses.</p>
                        <div class="pricing-plan-label billed-monthly-label" style="display: none"><strong>$0</strong>/ monthly</div>
                        <div class="pricing-plan-label billed-yearly-label" style="display: block"><strong>$0</strong>/ yearly</div>
                        <div class="pricing-plan-features mb-4">
                            <strong>Free Features</strong>
                            <ul>
                                <li>5 Assessments</li>
                                <li>10 Questions / Assessment</li>
                                <li>No Image or Video Resource Available</li>
                            </ul>
                        </div>
                        <a href="{{ route('register') }}#organization" class="button btn btn-primary btn-block margin-top-20">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>