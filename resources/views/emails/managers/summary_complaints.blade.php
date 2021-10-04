@component('mail::message')
    # Complaint Summary

    dear {{ $branch->manager->firstname }},


    @component('mail::table')
        | Branch | Total Complaint | Total Resolved | Total Pending |
        | :-------------: | :-------------: | :-------------: | :-------------: |
        | {{ $branch->name }} | {{ $branch->complaints_count }} | {{ $branch->resolved_complaints }} |{{ $branch->pending_complaints }} |
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
