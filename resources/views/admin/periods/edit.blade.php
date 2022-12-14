<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Periods
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.periods.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">⤶  Periods table</a>
            </div>
        </div>
    </div>

{{-- @extends('admin.periods.index')
@section('content') --}}
    <div class="container bg-gray-100 m-3 p-8 rounded-lg">
        {{-- update form --}}
        <div id="edit_period" class="flex relative z-0 mb-6 w-full group my-5">
            <form action="{{ route('admin.periods.update',$period->id) }}" method="post">
                @method('PUT')
                @csrf
                <input class=" bg-blue-300 border-0 border-b-2 rounded" value="{{ $period->period_time }}"  type="text" name="period_time" autofocus id="period_time" class=" block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="ex: 9:00 - 10:00" >
                <button id='update' type="submit"  class="px-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-auto py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
                @error('period_time')
                <span class="text-red-500 text-sm error-text tel_number_error">
                    {{ $message }}
                </span>
                @enderror
            </form>
        </div>
        {{-- end update --}}
    </div>
{{-- @endsection --}}
</x-admin-layout>

