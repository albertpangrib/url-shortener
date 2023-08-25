<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(isset($url))
                    <table class="table-auto ml-3 mt-3">
                        <label class="text-lg font-semibold" for="url">
                            Detail Information of "{{ $url->uid }}" Path
                        </label>
                        <tbody>
                          <tr class="bg-slate-200">
                            <td class="px-2 py-1.5">
                                <b>Original Link</b>
                            </td>
                            <td class="pl-10">:</td>
                            <td class="pr-6">{{ $url->original }}</td>
                          </tr>
                          <tr>
                            <td class="px-2 py-1.5">
                                <b>Shortened Link</b>
                            </td>
                            <td class="pl-10">:</td>
                            <td>
                                <a href="{{ url($url->uid) }}" target="_blank"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ url($url->uid) }}</a>
                            </td>
                          </tr>
                          <tr class="bg-slate-200">
                            <td class="px-2 py-1.5">
                                <b>Clicked</b>
                            </td>
                            <td class="pl-10">:</td>
                            <td>{{ $url->clicks }}</td>
                          </tr>
                          <tr>
                            <td class="px-2 py-1.5">
                                <b>Created at</b>
                            </td>
                            <td class="pl-10 pr-3">:</td>
                            <td>{{ $url->created_at->diffForHumans() }}</td>
                          </tr>
                        </tbody>
                      </table>
                    @else
                        <p>URL not found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="pt-12 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <h1 class="font-semibold text-lg">Visitor Log(s) of "{{ $url->uid }}" Path</h1>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        IP Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Country
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        City
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Accessed At
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                @endphp
                                @forelse ($logs as $log)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $a++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $log->ip_address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $log->country }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $log->city }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $log->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            This shortened link haven't accessed yet.
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
