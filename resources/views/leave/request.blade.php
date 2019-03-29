@component('mail::message')
# Leave Request from {{ $user->name }}

{{ $user->name }} is requesting {{ $leave->days }} days of leave <br> from  {{ $leave->date_from }} to {{ $leave->date_to }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
