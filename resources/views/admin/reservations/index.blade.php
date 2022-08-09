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
                    Reservations
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">new Reservation</a>
            </div>
        </div>
    </div>

   {{-- table information  --}}
   <div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="py-3 px-6">
                    First Name
                </th>
                <th scope="col" class="py-3 px-6">
                   Last Name
                </th>

                <th scope="col" class="py-3 px-6">
                    Email
                </th>

                <th scope="col" class="py-3 px-6">
                    Telephone Number
                </th>
                <th scope="col" class="py-3 px-6">
                    Date of Reservation
                </th>
                <th scope="col" class="py-3 px-6">
                    Meal
                </th>
                <th scope="col" class="py-3 px-6">
                    Number of Guests
                </th>
                <th scope="col" class="py-3 px-6">
                    Table
                </th>
                  <th scope="col" class="py-3 px-6">
                    Options
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                    {{ $reservation->first_name }}
                </td>

                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->last_name }}
                </td>

                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->email }}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->tel_number  }}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->res_date  }}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->meal  }}
                </td>


                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->guests_number  }}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->table->name  }}
                </td>
                </td>


                {{-- options --}}
                <td scope="row" class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.reservations.edit',$reservation->id) }}" class="px-4 py-2 bg-green-600 hover:bg-green-900 rounded-lg text-white"  data-modal-toggle="update-modal" >Edit</a>
                        <form action="{{ route('admin.reservations.destroy',$reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')" class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-900 text-white">
                        @csrf
                        @method('DELETE')
                        <button type="submit" >Delete</button>
                        </form>
                    </div>
                </td>
                {{-- endoption --}}
            </tr>
            @endforeach
            </tbody>
    </table>
</div>

</x-admin-layout>

