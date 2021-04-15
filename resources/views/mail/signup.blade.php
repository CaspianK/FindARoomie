@component('mail::message')
# {{__("We are happy to see you a part of our community, :name", ['name' => $data['name']])}}!

{{__("We hope FindARoomie will help you to solve your problems at the time
and find new friends! Post your own room or find one right now!")}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
{{__("Show me them Rooms")}}
@endcomponent

{{__("Have a happy stay,")}}<br>
{{ config('app.name') }}
@endcomponent
