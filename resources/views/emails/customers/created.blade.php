@component('mail::message')
    # Account Creation

    hello {{ $customer->firstname }},

    Thank you for registering with us. You have been assigned a customer account for on of the company's branch
    ({{ $customer->branch->name }} ).

    Your account details are as follows:

    Email: {{ $customer->user->email }}
    Password: {{ $customer->lastname }}

    please change your password after you login.

    @component('mail::button', ['url' => 'http://localhost:8000/login'])
        Login
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}

@endcomponent
