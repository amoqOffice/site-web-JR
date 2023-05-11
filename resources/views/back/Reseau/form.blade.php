@php
    $data = [(object)[
            'text' => 'Admin',
            'link' => route('back.home'),
            'css_class' => 'text-primary',
        ], (object)[
            'text' => 'Réseaux sociaux',
            'link' => '#',
            'css_class' => 'cursor-default',
        ]
    ];
    $content = 'Réseaux sociaux';
@endphp
@widget('breadcrumb', compact('data', 'content'))

<div class="row">
    <div class="col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h4 class="card-title"> {{ $title }} </h4>
            </div>
            <div class="card-body">
                <form action="{{ !$edit ? route('back.reseau.store') : route('back.reseau.update', $reseau->id) }}" method="POST">
                    @csrf
                    
					<div class="row">
                        <!-- Champ nom -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Nom du Reseau social <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="nom" value="{{ $reseau->nom ?? old('nom') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

					<div class="row">
                        <!-- Champ page_link -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Lien de la page <span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" type="text" placeholder required name="page_link" value="{{ $reseau->page_link ?? old('page_link') }}" {{ ($show) ? 'disabled' : ''}}>
                                {{-- @error('')
                                    <span class="invalid-feedback">
                                        {{ $errors->first('') }}
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
					</div>

                    <div class="text-right pt-2">
                        <a href="{{ route('back.reseau.index') }}" class="btn btn-sm btn-danger  btn-navs"><i class="fa fa-close"></i> Fermer</a>
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
