@csrf
<div class="mb-3">
    <label for="title">@lang('Title')</label>
    <input id="title" name="title" class="form-control bg-light shadow-sm border-0" required
        value="{{ old('title', $post->title)}}">
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="description">@lang('Description')</label>
    <textarea name="description" class="form-control bg-light shadow-sm border-0" required>{{ old('description', $post->description) }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3">
    <input type="file" name="file" {{ $required }}>
</div>
<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary text-white btn-lg">@lang( $btnText )</button>
    <a class="btn btn-link text-decoration-none" href="{{ route('home') }}">@lang("Back")</a>
</div>