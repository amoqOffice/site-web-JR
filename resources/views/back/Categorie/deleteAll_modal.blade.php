<div class="modal fade" id="deleteAllElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer les éléments sélectionnés</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Etes-vous sûr de vouloir tout supprimer <span data-ids="" class="elements"></span>?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="#" class="btn btn-danger btn-delete-elements"><i class="fa fa-trash"></i> Supprimer</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(".btn-delete-elements").click(function () {
        $(this).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "post",
            url: "{{ route('back.categorie.destroyAll') }}",
            data: {ids: $(".elements").data("ids")},
            success: function (response) {
                $("#deleteAllElement").modal('hide')

                toastr["success"]("Elements supprimés avec succès")

                location.reload();
            }
        });
    });

</script>
