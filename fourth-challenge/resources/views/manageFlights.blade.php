<x-layout>
    <div id="app">
        <example-component :companies="{{$companies}}" :cities="{{$cities}}"/>
    </div>
    @push('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
    @endpush
</x-layout>