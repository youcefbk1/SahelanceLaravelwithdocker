@extends($activeTheme . 'layouts.frontend')

@section('frontend')
<div class="job-details py-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-8 col-lg-7">
                <div class="job-details__img">
                    <img src="{{ getImage($activeThemeTrue . 'images/site/services/67864669e2df61736853097.png') }}" alt="image">
                </div>
                <div class="blog-details__txt">
                    <h2 class="blog-details__title">I make A Crowdfunding Website</h2>
                    <div class="styled-list-parent">
                        <p>
                            Looking for unique, high-quality illustrations to bring your project to life? 
                            I specialize in creating visually compelling designs that align with your brand’s vision and project requirements. 
                            With a keen eye for detail and a passion for storytelling through art, I work closely with clients to deliver illustrations 
                            that enhance the overall aesthetic and message of their content.
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            <strong>What I Offer:</strong>
                        </p>
                        <ul>
                            <li>Custom Illustrations tailored to your specific needs and style preferences.</li>
                            <li>Collaborative Approach to ensure the artwork aligns with your vision.</li>
                            <li>Revisions & Refinements based on your feedback for the perfect final result.</li>
                            <li>High-Quality Deliverables in various formats (PNG, SVG, etc.).</li>
                            <li>Timely Delivery to meet your project deadlines without compromising quality.</li>
                        </ul>
                        <p>&nbsp;</p>
                        <p>
                            <strong>Why Work With Me?</strong>
                        </p>
                        <ul>
                            <li>Proven Experience with a portfolio showcasing past illustration work.</li>
                            <li>Proficiency in design software such as Adobe Illustrator, Photoshop, or equivalent.</li>
                            <li>Adaptable Style to match different creative directions.</li>
                            <li>Strong Communication to ensure smooth collaboration.</li>
                            <li>Reliable & Deadline-Oriented so your project stays on track.</li>
                        </ul>
                        <p>&nbsp;</p>
                        <p>If you're looking for a skilled illustrator to create stunning visuals for your project, I'd love to work with you! Let’s bring your ideas to life—reach out with your project details, and I’ll be happy to discuss how I can help.

                            Looking forward to collaborating!</p>                        
                    </div>
                </div>

                
                                        <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('user.login') }}" class="btn btn--base px-3">Login to contact</a>
                    </div>
                                </div>
            <div class="col-xl-4 col-lg-5">
                <div class="post-sidebar">
                    <div class="post-sidebar__card">
                        <h3 class="post-sidebar__card__header">Service Information</h3>
                        <div class="post-sidebar__card__body">
                            <ul class="post-sidebar__job-information">
                                <li>
                                    
                                    <span class="post-sidebar__job-information__icon">
                                        <img src="{{ getImage($activeThemeTrue . 'images/site/services/6786154b863f61736840523.png') }}" alt="image">
                                    </span>
                                    <div class="post-sidebar__job-information__txt">
                                        <a href="/services/detail/freelacerpage">
                                            <span class="post-sidebar__job-information__name">Service posted by James Marshall</span>
                                        </a>
                                        <span class="post-sidebar__job-information__info">Service Code: ODD3V5NZ8435</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="post-sidebar__job-information__icon">
                                        <i class="ti ti-cash-banknote fz-2 transform-0"></i>
                                    </span>
                                    <div class="post-sidebar__job-information__txt">
                                        <span class="post-sidebar__job-information__name">You will pay for this service</span>
                                        <span class="post-sidebar__job-information__info">$7,000.00</span>
                                    </div>
                                </li>
                                
                                <li>
                                    <span class="post-sidebar__job-information__icon">
                                        <i class="ti ti-calendar-month fz-2 transform-0"></i>
                                    </span>
                                    <div class="post-sidebar__job-information__txt">
                                        <span class="post-sidebar__job-information__name">Published Date</span>
                                        <span class="post-sidebar__job-information__info">14-01-2025 05:11 AM</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-sidebar__card">
                        <h3 class="post-sidebar__card__header">Share</h3>
                        <div class="post-sidebar__card__body">
                            <div class="input--group mb-4">
                                <input type="text" class="form--control" id="shareLink" value="" readonly="">
                                <button type="button" class="btn btn--base share-link__copy px-3">
                                    <i class="ti ti-copy"></i>
                                </button>
                            </div>
                            <ul class="social-list">
                                <li class="social-list__item">
                                    <a href="#" class="social-list__link flex-center" target="_blank">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="social-list__item">
                                    <a href="#" class="social-list__link flex-center" target="_blank">
                                        <i class="ti ti-brand-x"></i>
                                    </a>
                                </li>
                                <li class="social-list__item">
                                    <a href="#" class="social-list__link flex-center" target="_blank">
                                        <i class="ti ti-brand-linkedin"></i>
                                    </a>
                                </li>
                                <li class="social-list__item">
                                    <a href="#" class="social-list__link flex-center" target="_blank">
                                        <i class="ti ti-brand-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection