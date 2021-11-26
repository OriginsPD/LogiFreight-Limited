@component('mail::message')
# Good Day Mr/Ms {{ $details['username'] }}

We Would like to inform you that your package Status As Been Update
and your Package is now on route to {{ $details['status'] }}

## Once Your Package Arrives An Email Will Be Sent to Inform Your Of
## When and Were You May Pick It Up

### You may pick up your package at our main office between the days of
## --------------------------------------------------------------
##               Monday - Friday 9:00 am - 8:00 pm
##               Saturday 10:00 am - 5:00 pm
## --------------------------------------------------------------

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

### We would like to take the time to Thank You For using Our Services


Thanks,<br>
{{ config('app.name') }}
@endcomponent
