@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between items-center py-4 px-2 mb-4">
    <div class="left">
        Leaves
    </div>

    <div class="right">
    <a class="py-2 px-2 bg-blue-darker text-white no-underline font-thin text-lg rounded" href="/leaves/create">
        Apply Leave
    </a>
    </div>
    </div>

    <div class="flex justify-between items-center py-2 bg-grey-lighter mb-2 w-full">
            <div>
                Reason 
            </div>

            <div>
                Date From
            </div>

            <div>
                Date To
            </div>

            <div>
                Days 
            </div>
        </div>
    <div class="flex  justify-between w-full">
        @foreach ($leaves as $leave)
            <div class="flex justify-between items-center py-2 bg-grey-lighter w-full">
                <div>
                    {{ $leave->reason }}
                </div>

                <div>
                    {{ $leave->date_from }}
                </div>

                <div>
                    {{ $leave->date_to }}
                </div>

                <div>
                    {{ $leave->days }} days
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
