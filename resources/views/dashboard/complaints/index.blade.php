@extends('layouts.dashboard')

@section('sub_content_header')
    Complaints
@endsection

@section('sub_content')
    @php
    $heads = ['ID', 'Name', 'title', 'reviewed', 'Created At', 'Action'];
    @endphp

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($complaints as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>
                    <a
                        href="{{ route('customers.show', $row->customer->id) }}">{{ $row->customer->firstname . ' ' . $row->customer->lastname }}</a><br>
                    <span>{{ $row->customer->user->email }}</span>
                </td>
                <td>
                    <a href="{{ route('complaints.show', $row->id) }}">{{ $row->title }}</a>
                </td>
                <td>{{ $row->reviewed === 1 ? 'Yes' : 'No' }}</td>
                <td>{{ $row->created_at->format('y-m-d') }}</td>
                <td>
                    <nobr>
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@endsection
