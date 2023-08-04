@foreach (App\Services\TranslatableService::getTranslatableInputs(App\Models\Service::class) as $name => $data)
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

<div class="col-md-6">
    <label for="price">{{translate('price')}} <span class="text-danger">*</span> </label>
    <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $row['price'] ?? '') }}">
    @error('price')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="col-xxl-12 col-md-6 mb-4">
    <label for="category">{{translate('services')}}</label>
    <select id="select-category" name="service_detail[]" multiple placeholder="Select a services..."
        autocomplete="off">
        @foreach ($service_details as $service_detail)
            <option value="{{ $service_detail->id }}" > {{ $service_detail->getTranslation('name', app()->getLocale()) }}
            </option>
        @endforeach
    </select>
    @error('service_detail.*')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label for="image" class="form-label">{{ translate('image') }}
        <span class="text-danger">*</span>
    </label>
    {{-- file-upload-multiple --}}
    <input type="file" class="form-control" name="image" data-allow-reorder="true"
        data-max-file-size="3MB" data-max-files="3">
    @error('image')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror

    {{-- @include('backend.partials._imageDetails'); --}}

    {{-- @include('backend.partials._seotools'); --}}

</div>



@push('scripts')
    <script>
        new TomSelect("#select-category");
        new TomSelect("#input-tags", {
            persist: false,
            createOnBlur: true,
            create: true
        });

    </script>

@endpush
