@auth

<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('tweets.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-secondary"> Share </button>
        </div>
    </form>
</div>

@endauth

@guest
    <h4>Login Share your ideas</h4>
@endguest

