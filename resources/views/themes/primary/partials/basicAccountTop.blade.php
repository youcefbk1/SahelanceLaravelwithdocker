<div class="account__top d-flex justify-content-between align-items-center">
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ getImage(getFilePath('logoFavicon') . '/logo_dark.png') }}" alt="logo">
        </a>
    </div>
    <a href="{{ route('home') }}" class="back-to-home">
        <i class="ti ti-home fz-1 transform-0"></i>
    </a>
</div>
