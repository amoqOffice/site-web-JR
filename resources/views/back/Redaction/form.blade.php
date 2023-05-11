@php
    $data = [(object)[
            'text' => 'Admin',
            'link' => route('back.home'),
            'css_class' => 'text-primary',
        ], (object)[
            'text' => 'Rédaction',
            'link' => '#',
            'css_class' => 'cursor-default',
        ]
    ];
    $content = 'Rédaction';
@endphp
@widget('breadcrumb', compact('data', 'content'))

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h4 class="card-title light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form
                    action="{{ !$edit ? route('back.redaction.store') : route('back.redaction.update', $redaction->id) }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <!-- Champ titre -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Titre <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="text" placeholder required
                                    name="titre" value="{{ $redaction->titre ?? old('titre') }}"
                                    {{ $show ? 'disabled' : '' }}>
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
                                    {{ $redaction->description ?? old('description') }} 
                                </textarea>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Champ audio path -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Audio de la Rédaction :</label>
                                <input class="form-control form-control-sm" type="file" placeholder required
                                    name="audio_path" value="{{ $redaction->audio_path ?? old('audio_path') }}"
                                    {{ $show ? 'disabled' : '' }}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Image associée <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="file" placeholder required
                                    name="image" value="{{ $redaction->image ?? old('image') }}"
                                    {{ $show ? 'disabled' : '' }}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Champ date_publication -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Date de Publication <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="date" placeholder required
                                    name="date_publication"
                                    value="{{ $redaction->date_publication ?? date('Y-m-d') ?? old('date_publication') }}"
                                    {{ $show ? 'disabled' : '' }}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ type redaction -->
                        <div class="col-md-6">
                            <div class="form-group form-control-sm">
                                <label> Type de Rédaction</label>
                                <select class="form-control" name="type" {{ $show ? 'disabled' : '' }}>
                                    <option value="enseignement">Enseignement</option>
                                    <option value="article">Article</option>
                                </select>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- Lieu --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Lieu <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="text" placeholder required
                                    name="lieu" value="{{ $redaction->lieu ?? old('lieu') }}"
                                    {{ $show ? 'disabled' : '' }}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Catégorie de la rédaction -->
                        <div class="col-md-6">
                            <div class="form-group form-control-sm">
                                <label> Catégorie de la Rédaction</label>
                                <select class="form-control" name="categorie" {{ $show ? 'disabled' : '' }}>
                                    <option value="enseignement">Enseignement</option>
                                    <option value="article">Article</option>
                                </select>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Champ is_published -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input name="is_published" class="form-check-input" type="checkbox"
                                        {{ ($redaction->is_published ?? old('is_published')) ? 'checked':'' }}
                                        id="defaultCheck1" {{ $show ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="defaultCheck1">
                                        Publier la rédaction ?
                                    </label>
                                </div>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                    </div>

                    <div class="text-right pt-2">
                        <a href="{{ route('back.redaction.index') }}" class="btn btn-sm btn-danger  btn-navs"><i
                                class="fa fa-close"></i> Fermer</a>
                        @if (!$show)
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


	{{-- <script type="text/javascript" src="C:\Users\JESUS-REVIENT\Documents\WYSYWIG TEST\tinymce\tinymce.min.js"></script>
	<script>
		tinymce.init({
            selector: '#myText'
        });
	</script> --}}
@endsection
