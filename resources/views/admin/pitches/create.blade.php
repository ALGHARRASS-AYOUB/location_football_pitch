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
                    Menus
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">⤶  menus table</a>
            </div>
        </div>
    </div>


    <div class="container bg-gray-100 m-3 p-8 rounded-lg">
        <form enctype="multipart/form-data" action="{{ route('admin.menus.store') }}" method="POST">
            @csrf
            {{-- <div class="grid md:grid-cols-2 md:gap-6"> --}}
                <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            {{-- </div> --}}
        </div>

                    {{-- <div class="grid md:grid-cols-2 md:gap-6"> --}}
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="price" id="price" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                            <label for="price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price DH</label>
                        {{-- </div> --}}
                    </div>


            <div class="grid md:grid-cols-2 md:gap-6 mt-8 mb-4">
                <div class="relative z-0 mb-6 w-full group">
                <input name="image" id="image" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  id="image" type="file">
                <label for="image" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload the image here !</label>
            </div>
        </div>

        {{-- <div class="grid md:grid-cols-2 md:gap-6 mt-8 mb-4">
        <select id="option" name="option" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            <option selected class="">choose a category</option>
            @foreach ($categories as $category )
                <option>
                    {{ $category->name }}
                </option>
            @endforeach

        </select>
    </div>--}}

            <button id="dropdown-menu-btn" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Categories<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->
            <div id="dropdown-menu" class="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700">
                <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                    @foreach ($categories as $category )
                    <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input name="categories[]" id="checkbox-item-{{ $category->id }}" type="checkbox" value="{{ $category->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-{{ $category->id }}" class="ml-2 bg-opa w-full text-sm font-medium text-black-900 rounded dark:text-gray-300">{{ $category->name }}</label>
                    </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <script>
                let dropdownBtn = document.getElementById('dropdown-menu-btn');
                let menuContent = document.getElementById('dropdown-menu');
                dropdownBtn.addEventListener('click',()=>{
                   if(menuContent.className==="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700"){
                    menuContent.className="absolute bg-gray-200 bg-opacity-90 rounded--2lx z-10 w-60 bg-white shadow dark:bg-gray-100";
                   } else {
                    menuContent.className="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700";
                   }
                })
                </script>




            {{-- <div class="grid md:grid-cols-2 md:gap-6"> --}}
            <div class="relative z-0 mb-6 w-full group my-4">
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required="" placeholder="Description..."></textarea>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                {{-- </div> --}}
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

</x-admin-layout>

