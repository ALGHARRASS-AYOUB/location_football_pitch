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
                    pitches
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.pitches.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">new pitch</a>
            </div>
        </div>
    </div>
    <div class="m-2 p-2 bg-blue-600 text-yellow-200">TOTAL PITCHES  : <h6 class="text-white font-bold ">{{ $pitches_number}}</h6></div>

      {{-- table information  --}}
      <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Location
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Places
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Price [DH]
                    </th>
                      <th scope="col" class="py-3 px-6">
                        Options
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pitches as $pitch)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pitch->id }}
                    </td>


                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pitch->name }}
                    </td>

                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pitch->location }}
                    </td>

                    <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                        {{ $pitch->status  }}
                    </td>

                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pitch->places  }}
                    </td>

                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pitch->price  }}
                    </td>


                    {{-- options --}}
                    <td scope="row" class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.pitches.edit',$pitch->id) }}" class="px-4 py-1 bg-green-600 hover:bg-green-900 rounded-lg text-white" >Edit</a>
                            <form action="{{ route('admin.pitches.destroy',$pitch->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')" class="px-4 py-1 rounded-lg bg-red-600 hover:bg-red-900 text-white">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" >Delete</button>
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

