@foreach (App\Services\TranslatableService::getTranslatableInputs(App\Models\Employee::class) as $name => $data)
<div class="col-md-6 mb-4">

    <label for="fullName">{{ translate(''.$name) }}
        @if (str_contains($data['validations'], 'required'))
            <span class="text-danger">*</span>
        @endif
    </label>

    @if ($data['is_textarea'])
        @include('backend.partials._textarea', [
            'name' => "$name",
            'data' => $data,
        ])
    @else
        @include('backend.partials._input', [
            'name' => "$name",
            'data' => $data,
        ])
    @endif

    {{-- <span id="{{ $name }}" class="text-danger">{{ $errors->first($name) }} </span> --}}
</div>
@endforeach

<div class="col-md-12">

    <div class="form-group">
        <label for="twitter_link" class="form-label">
            Twitter Link
        </label>
        <input type="text" class="form-control" name="twitter_link" value="{{ old('twitter_link', $row['twitter_link'] ?? '') }}">
    </div>

    <div class="form-group mt-3">
        <label for="facebook_link" class="form-label">
            Facebook Link
        </label>
        <input type="text" class="form-control" name="facebook_link" value="{{ old('facebook_link', $row['facebook_link'] ?? '') }}">
    </div>

    <div class="form-group mt-3">
        <label for="instagram_link" class="form-label">
            Instagram Link
        </label>
        <input type="text" class="form-control" name="instagram_link" value="{{ old('instagram_link', $row['instagram_link'] ?? '') }}">
    </div>

</div>



<div class="col-md-12">
    <label for="image" class="form-label">{{ translate('image') }}
        <span class="text-danger">*</span>
    </label>
    {{-- file-upload-multiple --}}
    <input type="file" class="form-control" name="image" data-allow-reorder="true"
        data-max-file-size="3MB" data-max-files="3">
    @error('image')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    @include('backend.partials._imageDetails');

    {{-- @include('backend.partials._seotools'); --}}

</div>
