<x-layout>
    <div id="app">
        <flight-panel :companies="{{$companies}}" :cities="{{$cities}}"/>
        <panel/>
    </div>
    @push('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
    @endpush
</x-layout>