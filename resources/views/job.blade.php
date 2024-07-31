<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>
    <button id="btnReturn" class="bg-violet-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">return</button>
    <script src="{{ asset('js/job.js')}}"></script>
</x-layout>
