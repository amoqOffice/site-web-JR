<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ !$edit ? route('redaction.store') : route('redaction.update', $redaction->id) }}" method="POST">
                    @csrf
                    
					<div class="row">
                        <!-- Champ titre -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Titre <span class :</label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="titre" value="{{ $redaction->titre ?? old('titre') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <label> Description <span class :</label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="description" value="{{ $redaction->description ?? old('description') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">                        <!-- Champ lieu -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Lieu <span class :</label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="lieu" value="{{ $redaction->lieu ?? old('lieu') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <label> Image <span class :</label>
                                <input class="form-control form-control-sm" type="file" placeholder required name="image" value="{{ $redaction->image ?? old('image') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">                        <!-- Champ type -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Type de redaction <span class :</label>
                                <input class="form-control form-control-sm" type="file" placeholder required name="type" value="{{ $redaction->type ?? old('type') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ date_publication -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Date de Publication <span class :</label>
                                <input class="form-control form-control-sm" type="date" placeholder required name="date_publication" value="{{ $redaction->date_publication ?? old('date_publication') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">                        <!-- Champ is_published -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Statut de publication <span class :</label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="is_published" value="{{ $redaction->is_published ?? old('is_published') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <!-- Champ audio_path -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Audio de la redaction :</label>
                                <input class="form-control form-control-sm" type="file" placeholder required name="audio_path" value="{{ $redaction->audio_path ?? old('audio_path') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

                    <div class="text-right pt-2">
                        <a href="{{ route('redaction.index') }}" class="btn btn-sm btn-danger  btn-navs"><i class="fa fa-close"></i> Fermer</a>
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
