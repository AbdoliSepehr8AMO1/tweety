<!-- x-app uses the layout app.blade.php this is a new way of including files -->
<x-app>
    <div>
        @include ('_publish-tweet-panel')

        @include ('_timeline')
    </div>
</x-app>
