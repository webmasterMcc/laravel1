<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
   
    <div class="space-y-4">
        @foreach ($jobs as $job)
          
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">
                        @isset( $job->employer->name )
                        {{ $job->employer->name  }}
                        @endisset
                    </div>
                    <div>
                        <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                    </div>
                </a>
          
        @endforeach
        </div>
        <div> 
            {{ $jobs->links() }}
        </div>
</x-layout>