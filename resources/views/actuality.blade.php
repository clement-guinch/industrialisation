@extends(Auth::user() ? 'layouts.admin' : 'layouts.app')

@section('content')
    <!-- {{-- <img src="https://pbs.twimg.com/media/D0gmMgxW0AAM-YQ.jpg:large" alt="" class="background__presentation"> --}} -->

    <div class="post__page">
        <div class="post__items">

            @foreach ($posts as $post)
                <div class="post__item card border-light mb-33">
                    <div class="card-header">
                        <h5><span class="badge badge-primary">{{$post->category['name']}}</span> {{$post->title}} </h5>
                    </div>
                    <div class="card-body">
                        <!-- <h4 class="card-title">Secondary card title</h4> -->
                        <footer class="blockquote-footer">date: <cite title="Source Title"> <?= date_format($post->created_at, "Y-m-d")?></cite></footer>
                        <p class="card-text">{{$post->content}}</p>
                        <p></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
            
@endsection
@section('scripts')
@parent

@endsection