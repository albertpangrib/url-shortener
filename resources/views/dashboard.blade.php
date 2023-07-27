<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form action="{{ route('url.store') }}" method="POST">

                        @csrf

                        <label class="text-lg font-semibold" for="url">
                            Shorten URL!
                        </label>
                        <div class="mb-4 flex gap-2">
                            <input id="url" name="original" type="url"
                                class="rounded-lg bg-gray-100 border-white/50 w-full" placeholder="Paste the link">
                            <button
                                class="px-4 py-2 rounded-lg bg-red-400 hover:scale-105 active:scale-95 transition duration-300">
                                Shorten!
                            </button>
                        </div>
                        @error('original')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="pt-12 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <h1 class="font-semibold text-lg">Your Urls</h1>

                    <x-table-urls />



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
