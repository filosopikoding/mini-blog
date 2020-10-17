<div class="pt-5">
  <p>Categories:  <a href="#">Food</a>, <a href="#">Travel</a>  Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
</div>

<div class="pt-5">
  <h3 class="mb-5">{{ $post->comments->count() }} Comments</h3>

  <ul class="comment-list" id="comment-post">
    @foreach ($post->comments as $comment)
    <li class="comment">
      <div class="vcard">
        <img src="{{ asset('miniblog/images/person_'.$comment->id.'.jpg') }}" alt="Image placeholder">
      </div>
      <div class="comment-body">
        <h3>{{ $comment->name }}</h3>
        <div class="meta">{{ $comment->created_at }}</div>
        <p>{{ $comment->comment }}</p>
      </div>
    </li>
    @endforeach
  </ul>
  <!-- END comment-list -->
  
  <div class="comment-form-wrap pt-5 pb-5">
    @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <h3 class="mb-5">Leave a comment</h3>
    <form action="/posts/comment/{{ $post->slug }}" method="post" class="p-5 bg-light">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" id="name" name="name">
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" class="form-control" id="email" name="email">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website">
        @error('website')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
        @error('comment')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <input type="submit" value="Post Comment" class="btn btn-primary">
      </div>

    </form>
  </div>
</div>