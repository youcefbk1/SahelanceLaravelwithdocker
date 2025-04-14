<div class="input--group">
    <input type="search" class="form--control form--control--sm datepicker-here" name="date" value="{{ request()->date }}" data-range="true" data-multiple-dates-separator=" - " data-language="en" placeholder="@lang('Start Date - End Date')" autocomplete="off">
    <button type="submit" class="btn btn--sm btn--icon btn--base">
        <i class="ti ti-search"></i>
    </button>
</div>

@push('page-style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/page/datepicker.css') }}">
@endpush

@push('page-script-lib')
    <script src="{{ asset('assets/admin/js/page/datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/page/datepicker.en.js') }}"></script>
@endpush

@push('page-script')
    <script>
        (function ($) {
            "use strict";

            let datePickerHere = $('.datepicker-here')

            datePickerHere.on('input keyup keydown keypress', function () {
                return false;
            });

            if (!datePickerHere.val()) {
                datePickerHere.datepicker();
            }
        })(jQuery);
    </script>
@endpush
