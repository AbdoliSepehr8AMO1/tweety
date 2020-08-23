<div class="border border-gray-300 rounded-lg">

        <!-- if we have tweets show them and if we dont show no tweets yet -->
    @forelse ($tweets as $tweet)f
        @include('_tweet')
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}
</div>
