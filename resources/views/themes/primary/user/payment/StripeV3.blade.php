<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ __($pageTitle) }}</title>
    </head>

    <body>
        @php
            $publishable_key = $data->stripeJSAcc->publishable_key;
            $sessionId       = $data->session->id;
        @endphp

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            "use strict"

            let stripe = Stripe('{{ $publishable_key }}')

            stripe.redirectToCheckout({
                sessionId: '{{ $sessionId }}'
            })
        </script>
    </body>
</html>
