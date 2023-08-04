@foreach (App\Services\TranslatableService::getTranslatableInputs(App\Models\Business::class) as $name => $data)
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
    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
@endforeach

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

    @if (isset($row))
        @include('backend.partials._imageDetails', ['row' => $row]);
    @else
        @include('backend.partials._imageDetails');
    @endif

</div>
