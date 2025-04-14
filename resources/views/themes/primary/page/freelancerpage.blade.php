@extends($activeTheme . 'layouts.frontend')

@section('frontend')
<div class="user-profile py-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="user-profile__img">
                    <img src="{{ getImage($activeThemeTrue . 'images/site/services/6786154b863f61736840523.png') }}" alt="freelancer">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="custom--card">
                    <div class="card-body">
                        <h3 class="user-profile__name">James Marshall</h3>
                        <span class="user-profile__username">@james</span>
                        <ul class="user-profile__list">
                            <li>Role: <span>Mobile App Developer</span></li>
                            <li>Joining Date: <span>Jan 29, 2024</span></li>
                            <li>Country: <span>United States</span></li>
                            <li>Jobs Completed: <span>1</span></li>

                            
                            <li>Rating: <span>5/5 <small class="text--muted">(1)</small></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="custom--card">
                    <div class="card-header">
                        <h3 class="title">Skills</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                                                                <span class="badge badge--secondary fs-16 fw-medium">Swift</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Kotlin</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Java</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Dart</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">JavaScript</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Flutter</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">React Native</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Xcode</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Android Studio</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Material Design</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">RESTful APIs</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Git</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Firebase</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Realm</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">App Store Submission</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Google Play Submission</span>
                                                                <span class="badge badge--secondary fs-16 fw-medium">Debugging</span>
                                                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="custom--card">
                    <div class="card-header">
                        <h3 class="title">About Me</h3>
                    </div>
                    <div class="card-body">
                        <p>I am a passionate and experienced Mobile App Developer specializing in creating high-quality mobile applications for both iOS and Android platforms. With a strong foundation in Swift, Kotlin, and Java, I build fast, reliable, and scalable native applications. I also have expertise in cross-platform development using frameworks like Flutter and React Native, enabling me to deliver versatile solutions that work seamlessly across multiple devices.</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="custom--card">
                    <div class="card-header">
                        <h3 class="title">Reviews</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-4 justify-content-center">
                            <div class="col-xxl-8 col-xl-7 col-lg-6">
                                <div class="user-profile__reviews">
                                    
                                                                                <div class="user-profile__review">
    <div class="user-profile__review__img">
        <img src="{{ getImage($activeThemeTrue . 'images/site/services/6786190a31aa21736841482.png') }}" alt="User">
    </div>
    <div class="user-profile__review__txt">
        <h5 class="user-profile__review__name">Alverta Fay</h5>
        <span class="user-profile__review__country">United States</span>
        <div class="user-profile__review__star rating-list">
            <div class="rating-list__item">
                                        <i class="ti ti-star-filled rated"></i>
                                        <i class="ti ti-star-filled rated"></i>
                                        <i class="ti ti-star-filled rated"></i>
                                        <i class="ti ti-star-filled rated"></i>
                                        <i class="ti ti-star-filled rated"></i>
                
                                </div>
            <span class="rating-list__text">(5)</span>
        </div>
        <p class="user-profile__review__desc">Absolutely amazing! Exceeded my expectations in every way. Highly professional, responsive, and delivers top-notch quality. Highly recommend</p>
    </div>
</div>
                                                                        </div>

                                                                </div>
                            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                                                                        
                                    <div class="user-profile__review-overview">
                                        <span class="user-profile__review-overview__name">5 Stars</span>
                                        <div class="custom--progress progress" role="progressbar" aria-label="Rating" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="user-profile__review-overview__count">(1)</span>
                                    </div>
                                                                        
                                    <div class="user-profile__review-overview">
                                        <span class="user-profile__review-overview__name">4 Stars</span>
                                        <div class="custom--progress progress" role="progressbar" aria-label="Rating" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%"></div>
                                        </div>
                                        <span class="user-profile__review-overview__count">(0)</span>
                                    </div>
                                                                        
                                    <div class="user-profile__review-overview">
                                        <span class="user-profile__review-overview__name">3 Stars</span>
                                        <div class="custom--progress progress" role="progressbar" aria-label="Rating" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%"></div>
                                        </div>
                                        <span class="user-profile__review-overview__count">(0)</span>
                                    </div>
                                                                        
                                    <div class="user-profile__review-overview">
                                        <span class="user-profile__review-overview__name">2 Stars</span>
                                        <div class="custom--progress progress" role="progressbar" aria-label="Rating" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%"></div>
                                        </div>
                                        <span class="user-profile__review-overview__count">(0)</span>
                                    </div>
                                                                        
                                    <div class="user-profile__review-overview">
                                        <span class="user-profile__review-overview__name">1 Star</span>
                                        <div class="custom--progress progress" role="progressbar" aria-label="Rating" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 0%"></div>
                                        </div>
                                        <span class="user-profile__review-overview__count">(0)</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection