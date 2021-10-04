@extends('layouts.dashboard')

@section('sub_content_header')
    Branches
@endsection

@section('sub_content')
    @php
    $heads = ['ID', 'Name', 'Customer Count', 'Complaints Count', 'Created At', 'Action'];
    @endphp

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($branches as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->customer_count }}</td>
                <td>{{ $row->complaints_count }}</td>
                <td>{{ $row->created_at }}</td>
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
