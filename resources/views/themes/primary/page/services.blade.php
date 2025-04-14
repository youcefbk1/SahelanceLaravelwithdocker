@extends($activeTheme . 'layouts.frontend')

@section('frontend')

<div class="job-list py-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                <div class="post-sidebar job-list__sidebar scroll">
                    <div class="post-sidebar__card border-0 p-0 d-lg-none bg-transparent">
                        <button type="button" class="btn btn--sm btn--base close-sidebar">
                            <i class="ti ti-x"></i> Close                            </button>
                    </div>

                    <div class="post-sidebar__card">
                        <h3 class="post-sidebar__card__header">Search</h3>
                        <div class="post-sidebar__card__body">
                            <form class="input--group">
                                <input type="text" class="form--control form--control--sm" name="title" value="" placeholder="Search">
                                <button class="btn btn--sm btn--base px-2" type="submit"><i class="ti ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="post-sidebar__card">
                        <h3 class="post-sidebar__card__header">Sort By Rate</h3>
                        <div class="post-sidebar__card__body">
                            <select class="select2 select2-container select2-container--default" dir="ltr" style="width: 318px;" data-search="false" tabindex="-1" aria-hidden="true">
                                <option value="" selected="">Default</option>
                                <option value="low-to-high">Low to High</option>
                                <option value="high-to-low">High to Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="post-sidebar__card">
                        <h3 class="post-sidebar__card__header">Filter By Time</h3>
                        <div class="post-sidebar__card__body">
                            <select class="select2 select2-container select2-container--default" dir="ltr" style="width: 318px;" data-search="false" tabindex="-1" aria-hidden="true">
                                <option value="" selected="">All</option>
                                <option value="today">Today</option>
                                <option value="weekly">This Week</option>
                                <option value="monthly">This Month</option>
                            </select>
                        </div>
                    </div>
                    <div class="post-sidebar__card">
                        <h3 class="post-sidebar__card__header">Services Categories</h3>
                        <div class="post-sidebar__card__body">
                                                                <ul class="job-list__category">
                                    <li class="job-list__category__item">
                                        <a href="#" class="job-list__category__link">All</a>
                                    </li>

                                    
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                App Development
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="game-development" id="game-development">
                                                                <label class="form-check-label" for="game-development">
                                                                    Game Development
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                Data Collection
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="market-research" id="market-research">
                                                                <label class="form-check-label" for="market-research">
                                                                    Market Research
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                Design &amp; Illustration
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="digital-illustration" id="digital-illustration">
                                                                <label class="form-check-label" for="digital-illustration">
                                                                    Digital Illustration
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="motion-graphics" id="motion-graphics">
                                                                <label class="form-check-label" for="motion-graphics">
                                                                    Motion Graphics
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                Digital Marketing
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="search-engine-optimization" id="search-engine-optimization">
                                                                <label class="form-check-label" for="search-engine-optimization">
                                                                    Search Engine Optimization
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="social-media-marketing" id="social-media-marketing">
                                                                <label class="form-check-label" for="social-media-marketing">
                                                                    Social Media Marketing
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                Music
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="sound-engineering" id="sound-engineering">
                                                                <label class="form-check-label" for="sound-engineering">
                                                                    Sound Engineering
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="theme-music" id="theme-music">
                                                                <label class="form-check-label" for="theme-music">
                                                                    Theme Music
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                Web Development
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="back-end-development" id="back-end-development">
                                                                <label class="form-check-label" for="back-end-development">
                                                                    Back-End Development
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="devops-deployment" id="devops-deployment">
                                                                <label class="form-check-label" for="devops-deployment">
                                                                    DevOps &amp; Deployment
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="front-end-development" id="front-end-development">
                                                                <label class="form-check-label" for="front-end-development">
                                                                    Front-End Development
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                                <li class="job-list__category__item">
                                            <a class="job-list__category__link has-sub" role="button">
                                                Writing &amp; Translation
                                            </a>

                                                                                                <ul class="job-list__category__submenu">
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="editing-and-proofreading" id="editing-and-proofreading">
                                                                <label class="form-check-label" for="editing-and-proofreading">
                                                                    Editing and Proofreading
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                                <li>
                                                            <div class="form--check">
                                                                <input type="checkbox" class="form-check-input" value="localization" id="localization">
                                                                <label class="form-check-label" for="localization">
                                                                    Localization
                                                                </label>
                                                            </div>
                                                        </li>
                                                                                                        </ul>
                                                                                        </li>
                                                                        </ul>
                                                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="job-list__filter d-lg-none">
                    <button type="button" class="btn btn--sm btn--base show-sidebar">
                        <i class="ti ti-adjustments-horizontal"></i> Filter                        </button>
                </div>
                <div class="row g-4 justify-content-lg-start justify-content-center">
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/67864669e2df61736853097.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="/services/detail">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Jan 14, 2025</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">I make A Crowdfunding Website</a>
    </h3>
    <span class="job-card__price">$7,000.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/678645d71b23b1736852951.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Jan 14, 2025</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">Content writing for an affiliate website</a>
    </h3>
    <span class="job-card__price">$500.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/6785392832f951736784168.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Jan 13, 2025</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">Virtual Assistant for E-commerce Store</a>
    </h3>
    <span class="job-card__price">$2,000.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/6785384e26de11736783950.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Jan 13, 2025</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">SEO Specialist for Tech Startup</a>
    </h3>
    <span class="job-card__price">$900.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/678537e1c32f51736783841.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Jan 13, 2025</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">Content Writer for Travel Blog</a>
    </h3>
    <span class="job-card__price">$200.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/66ebe143046911726734659.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Sep 19, 2024</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">Design Illustration for a Creative Proje...</a>
    </h3>
    <span class="job-card__price">$12,000.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/66ebcca3ebd681726729379.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Sep 19, 2024</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">UI/UX Designer for Web and Mobile Applic...</a>
    </h3>
    <span class="job-card__price">$14,000.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/66ebbea9df28a1726725801.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Sep 19, 2024</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">Frontend Developer for Web Applica...</a>
    </h3>
    <span class="job-card__price">$13,000.00 </span>
</div>
</div>
                        </div>
                                                <div class="col-xxl-4 col-sm-6 col-xsm-9">
                            <div class="job-card">
<div class="job-card__thumb">
    <img src="{{ getImage($activeThemeTrue . 'images/site/services/66ebbd6b151f61726725483.png') }}" alt="image">
</div>
<div class="job-card__apply-btn bg-img" data-background-image="https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg" style="background-image: url(&quot;https://script.tonatheme.com/tonajob/demo/assets/themes/primary//images/apply-btn-bg.svg&quot;);">
    <a href="#">
        <i class="ti ti-arrow-narrow-right"></i>
    </a>
</div>
<div class="job-card__txt">
    <div class="job-card__badge">
        <span class="badge badge--base gap-1"><i class="ti ti-circle-dot fz-3 transform-1"></i> Available</span>
        <span class="badge badge--info gap-1"><i class="ti ti-calendar-month fz-3 transform-1"></i> Sep 19, 2024</span>
    </div>
    <h3 class="job-card__title">
        <a href="#">Backend Developer for Web Applica...</a>
    </h3>
    <span class="job-card__price">$15,000.00</span>
</div>
</div>
                        </div>
                    
                                        </div>
            </div>
        </div>
    </div>
</div>

@endsection