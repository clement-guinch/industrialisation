@extends(Auth::user() ? 'layouts.admin' : 'layouts.app')

@section('content')

    <div class="album__page">
        <div class="album__items">

            {{-- @foreach ($posts as $post) --}}
                <img class="album__item" src="https://via.placeholder.com/289x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/279x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/269x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/179x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/229x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/299x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/219x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/209x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/199x450" alt="placeholderimage">
                <img class="album__item" src="https://via.placeholder.com/239x450" alt="placeholderimage">
            {{-- @endforeach --}}
        </div>
    </div>


@endsection
