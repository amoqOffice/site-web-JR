<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header bg-primary">
                <h4 class="card-title text-center text-light"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ !$edit ? route('enseignement.store') : route('enseignement.update', $enseignement->id) }}" method="POST">
                    @csrf

					<div class="row">
                        <!-- Champ titre -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Titre :</label>
                                <input class="form-control form-control-sm" type="text" placeholder="Cliquer pour entrer votre texte" required name="titre" value="{{ $enseignement->titre ?? old('titre') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <label> Description :</label>
                                <input class="form-control form-control-sm" type="text" placeholder="Laissez un bref résumé de l'Enseignement pour votre auditoire" required name="description" value="{{ $enseignement->description ?? old('description') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ lieu -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Lieu :</label>
                                <input class="form-control form-control-sm" type="text" placeholder="Préciser le lieu où cet enseignement a été donné" required name="lieu" value="{{ $enseignement->lieu ?? old('lieu') }}" {{ ($show) ? 'disabled' : ''}}>
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
                                <label> Image de couverture (1280x720) :</label>
                                <input class="form-control form-control-sm" type="text" placeholder="Ajouter une image" required name="image" value="{{ $enseignement->image ?? old('image') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

                    <div class="text-right pt-2">
                        <a href="{{ route('enseignement.index') }}" class="btn btn-sm btn-danger  btn-navs"><i class="fa fa-close"></i> Fermer</a>
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
