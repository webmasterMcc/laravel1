<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <div class="space-y-4">
    
      
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
            <div>
                <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
            </div>
        </a>
        <button id="btnReturn" class="bg-violet-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">return</button>
      <script src="{{ asset('js/job.js')}}"></script>

</div>
</x-layout>
