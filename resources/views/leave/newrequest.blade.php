@component('mail::message')
# New Leave

Your Leave request has been sent for approval to {{ $manager->name }}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
