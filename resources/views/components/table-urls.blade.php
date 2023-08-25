<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    No
                </th>
                <th scope="col" class="px-6 py-3 w-72">
                    Original
                </th>
                <th scope="col" class="px-6 py-3">
                    Link
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $a=1
            @endphp
            @forelse ($urls as $url)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $a++ }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $url->original }}
                    </td>
                    <td class="px-6 py-4">
                        <button class="copy-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" class="w-4 h-4 m-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                              </svg>
                        </button>
                        <a href="{{ url($url->uid) }}" target="_blank"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ url($url->uid) }}</a>
                        </td>
                    <td class="px-6 py-4 text-right">
                        <form method="POST" action="{{ route('url.destroy', $url->uid) }}">
                            @csrf
                            @method('delete')
                            <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('details.show', ['uid' => $url->uid]) }}" class="font-medium text-blue-800 dark:text-blue-600 hover:underline">Details</a>
                    </td>
                </tr>

            @empty

                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        You have no shorten urls.
                    </th>

                </tr>
            @endforelse
        </tbody>
    </table>
</div>
