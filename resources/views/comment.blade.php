@extends(Auth::user() ? 'layouts.admin' : 'layouts.app')

@section('styles')
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
@endsection

@section('content')

  <?php
    // var_dump($user->name);
    // var_dump($user->email);
    // dd($comments)
    // $comments_primary = 
  ?>
  <p>Commentaire</p>
  <div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      @foreach ($comments as $comment)

          <div class="list-group" style="margin-bottom:25px;">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$comment->user['name']}}</h5>
                <small class="text-muted"><?= date_format($comment->created_at, "Y-m-d")?></small>
              </div>
              <p class="mb-1">{{$comment->content}}</p>
              <small class="text-muted">
                <span class="icon icon--reply"></span>
              </small>
            </a>
          </div>

          @foreach ($comment->comments as $response)
            <div class="list-group" style="margin-bottom:25px; margin-left:50px">
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">{{$comment->user['name']}}</h5>
                  {{-- <small class="text-muted">3 days ago</small> --}}
                </div>
                <p class="mb-1">{{$comment->content}}</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
              </a>
            </div>
          @endforeach
      @endforeach
    </div>
  </div>



    
  <form action="{{ route("admin.comments.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <input type="text" id="name" name="content" class="form-control" required>
    </div>
    <div>
        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
    </div>
</form>

@endsection

@section('scripts')
  @parent
  <script src="{{ asset('js/swiper.js') }}"></script>
  <script src="https://unpkg.com/swiper/js/swiper.js"></script>
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
@endsection
