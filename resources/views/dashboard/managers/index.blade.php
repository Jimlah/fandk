@extends('layouts.dashboard')

@section('sub_content_header')
    Managers
@endsection

@section('sub_content')
    @php
    $heads = ['ID', 'Name', 'Branch', 'Created At', 'Action'];
    @endphp

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($managers as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>
                    <a
                        href="{{ route('managers.show', $row->id) }}">{{ $row->firstname . ' ' . $row->lastname }}</a><br>
                    <span>{{ $row->user->email }}</span>
                </td>
                <td>{{ $row->branch->name }}</td>
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
