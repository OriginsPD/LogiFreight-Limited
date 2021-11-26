@component('mail::message')
# Good Day Mr/Ms. {{ $details['username'] }}

## We would like to inform you that your package as arrived
## You may pick up your package at our main office between the days of
## --------------------------------------------------------------

## Tracking Number# {{ $details['TrackIn'] }}
## Internal Tracking Number# {{ $details['TrackIn'] }}

## --------------------------------------------------------------
## Monday - Friday 9:00 am - 8:00 pm
## Saturday 10:00 am - 5:00 pm

@component('mail::button', ['url' => ''])
View Invoice
@endcomponent

## We would like to take the time to Thank You For using Our Services

Thanks,<br>
{{ config('app.name') }}
@endcomponent
