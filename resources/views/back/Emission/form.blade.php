@php
    $data = [(object)[
            'text' => 'Admin',
            'link' => route('back.home'),
            'css_class' => 'text-primary',
        ], (object)[
            'text' => 'Emission',
            'link' => '#',
            'css_class' => 'cursor-default',
        ]
    ];
    $content = 'Emission';
@endphp
@widget('breadcrumb', compact('data', 'content'))

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h4 class="card-title"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ !$edit ? route('back.emission.store') : route('back.emission.update', $emission->id) }}" method="POST">
                    @csrf
                    
					<div class="row">
                        <!-- Champ nom -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Nom <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="nom" value="{{ $emission->nom ?? old('nom') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Description <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-sm" id="textarea_description" name="description" rows="4"
                                    cols="50" {{ $show ? 'disabled' : '' }}>
                                    {{ $emission->description ?? old('description') }} 
                                </textarea>
                                {{-- <input class="form-control form-control-sm" type="text" placeholder required name="description" value="{{ $emission->description ?? old('description') }}" {{ ($show) ? 'disabled' : ''}}> --}}
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ image -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Image <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="file" placeholder required name="image" value="{{ $emission->image ?? old('image') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

                    <div class="text-right pt-2">
                        <a href="{{ route('back.emission.index') }}" class="btn btn-sm btn-danger  btn-navs"><i class="fa fa-close"></i> Fermer</a>
                        @if(!$show)
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-floppy-o"></i> Enregistrer
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('assets\back\js\plugins\tinymce\tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#textarea_description'
        });
    </script>
@endsection