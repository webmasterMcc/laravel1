<x-layout>
    <x-slot:heading>Home page</x-slot:heading>
   
    <div class="relative isolate bg-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
            <form action="{{ route('jobform-submit') }}"  method="POST" class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
                @csrf
                <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <x-input name="title" id="title"  Label="title"  placeholder='title' />
                        </div>
                        <div>
                            <x-input name="salary" id="salary"   Label="salary"  placeholder="salary" />
                        </div>
                    </div>
                    <div class="mt-8 flex">
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            create user
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            @isset($jobForm)   
            @dump($jobForm)
            @endisset
</x-layout>