<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Original
                </th>
                <th scope="col" class="px-6 py-3">
                    Link
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($urls as $url)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $url->uid }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $url->original }}
                    </td>
                    <td class="px-6 py-4">
                            <div class="flex gap-2">
                                    <a href="{{ url($url->uid) }}" target="_blank"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ url($url->uid) }}</a>
                                            <button onclick="copyToClipboard('{{ url($url->uid) }}')"
                                                    class="px-5 py-1 rounded-lg bg-green-400 hover:scale-105 active:scale-95 transition duration-300 font-medium text-white-600 focus:outline-none"
                                                    style="color: white; font-weight: bold;">
                                                        Copy
                                            </button>
                            </div>
                    </td>
<script>
        function copyToClipboard(text) {
        const input = document.createElement('input');
        input.setAttribute('value', text);
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);

        // Tampilkan pesan berhasil saat URL berhasil disalin ke clipboard
        const copyMessage = document.createElement('div');
        copyMessage.textContent = 'URL copied to clipboard!';
        copyMessage.style.position = 'fixed';
        copyMessage.style.top = '48%';
        copyMessage.style.left = '50%';
        copyMessage.style.transform = 'translate(-50%, -50%)';
        copyMessage.style.backgroundColor = '#4CAF50';
        copyMessage.style.padding = '0.5% 1%';
        copyMessage.style.color = 'white';
        copyMessage.style.borderRadius = '8px';
        copyMessage.style.zIndex = '9999';

        document.body.appendChild(copyMessage);

        // Hilangkan pesan setelah beberapa detik
        setTimeout(() => {
            document.body.removeChild(copyMessage);
        }, 2000); // Hilangkan pesan setelah 2 detik (2000 milidetik)
    }
</script>
                    <td class="px-6 py-4">
                        {{ $url->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form method="POST" action="{{ route('url.destroy', $url->uid) }}">
                            @csrf
                            @method('delete')
                            <button class="px-4 py-2 rounded-lg bg-red-700 hover:scale-105 active:scale-95 transition duration-300 font-medium text-white-600 focus:outline-none"
                                    style="color: white; font-weight: bold;">
                                Delete
                            </button>
                        </form>
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
