@extends('back.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/back/plugins/datatables/datatables.min.css') }}">
@endsection

@section('content')
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
        <div class="col-sm-12">
            @include('back.Redaction.delete_modal')
            @include('back.Redaction.deleteAll_modal')
            <div class="form-group text-LEFT">
                <a href="{{ route('back.redaction.create') }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> Faire une Rédaction </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-dark"> Liste des Rédactions </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Type de Redaction</th>
                                    <th>Date de Publication</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($redactions as $redaction)
                                <tr>
                                    <td>{{ $redaction->titre }}</td>
                                    <td>{{ ucfirst($redaction->type) }}</td>
                                    <td class="text-right">{{ date('d/m/Y', strtotime($redaction->date_publication)) }}</td>
                                    <td><span class="badge {{ $redaction->is_published ? "bg-success-light px-1" : "bg-danger-light" }}"><i class="fa {{ $redaction->is_published ? "fa-check" : "fa-close" }} text-{{ $redaction->is_published ? "success" : "danger" }}"></i></span></td>
                                    <td>
                                        <a href="{{ route('back.redaction.show', $redaction->id) }}"
                                            class="mr-2 text-success" title="Voir"><i class="fa fa-eye"></i> Voir
                                        </a>
                                        <a href="{{ route('back.redaction.edit', $redaction->id) }}"
                                            class="mr-2 text-warning" title="Modifier"><i class="fa fa-pencil-square-o "></i>
                                                Modifier
                                        </a>
                                        <a href="#" class="text-danger"
                                            data-nom="{{ $redaction->nom }}" data-id="{{ $redaction->id }}"
                                            data-toggle="modal" data-target="#deleteElement" title="Supprimer">
                                            <i class="fa fa-trash"></i> Supprimer</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables/datatables.min.js') }}"></script>
    <script>
        window.history.pushState('data', 'index', '{{ route('back.redaction.index') }}')

        // $('#table').excelTableFilter();

        // Cache le bouton btn-delete-all
        $(".btn-delete-all").hide();

        // Affiche ou cache btn-delete-all
        function show_hide_delete_all(counterCheckbox) {
            if (counterCheckbox >= 2) {
                $(".btn-delete-all").show();
                $('.btn-delete').removeClass('visible').addClass('invisible');
            } else {
                $(".btn-delete-all").hide();
                $('.btn-delete').removeClass('invisible').addClass('visible');
            }
        }

        // Affiche le bouton de suppresion multiple si plus de 2 éléments sont selectionné
        var counterCheckbox = 0
        $(".checkbox-child").click(function(e) {
            if ($(this).is(":checked")) {
                counterCheckbox++
                $(this).closest('tr').addClass('bg-primary-light')
            } else {
                counterCheckbox--
                $(this).closest('tr').removeClass('bg-primary-light')
            }

            show_hide_delete_all(counterCheckbox)
        });

        // Sélectionner tout les checkbox
        var state = false
        // var counterCheckbox2 = 0
        $('.checkbox-parent').click(function() {
            state = !state

            if (state) {

                $(this).parent().addClass('bg-primary-light');
                $('.checkbox-child').not(this).prop('checked', this.checked);
                //add primary background to tr checked
                $('.checkbox-child').closest('tr').addClass('bg-primary-light')

                // Reccupère le nombre de checkbox-child checké
                counterCheckbox = $('tbody td .checkbox-child').filter(':checked').length

            } else {
                $(this).parent().removeClass('bg-primary-light');
                $('.checkbox-child').not(this).prop('checked', this.checked);
                //delete primary background to tr unchecked
                $('.checkbox-child').closest('tr').removeClass('bg-primary-light')

                // Reccupère le nombre de checkbox-child non-checké
                counterCheckbox = $('tbody td .checkbox-child').filter(':checked').length
            }

            show_hide_delete_all(counterCheckbox)
        })

        // Affiche les lignes selectionnées si le bouton delete est cliqué
        $('.btn-delete-all').click(function(e) {
            var ids = [];

            $("table input[type=checkbox]:checked").each(function() {
                ids.push($(this).closest("tr").find("td:eq(1)").data('id'));

                // console.log(ids)

                $('.elements').data('ids', ids);
            })
        });

        //Envoie le nom et l'id de l'élément à delete_modal
        var idElement
        $(".btn-delete").click(function() {
            idElement = $(this).data('id')
            nomElement = $(this).data('nom')

            $(".nomElement").text(nomElement);
            $(".nomElement").data('id', idElement);
        });
    </script>
@endsection
