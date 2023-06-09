<div class="modal fade" id="deleteElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un Element</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Etes-vous sûr de supprimer cet Element <span data-id="" class="nomElement"></span>?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="#" class="btn btn-danger btn-delete-element"><i class="fa fa-trash"></i> Supprimer</a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/back/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/back/js/bootstrap.min.js') }}"></script>
<script>
    $(".btn-delete-element").click(function () {
        $(this).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "post",
            url: "{{ route('back.categorie.destroy') }}",
            data: {id: $(".nomElement").data("id")},
            success: function (response) {
                console.log(response)
                $("#deleteElement").modal('hide')

                toastr["success"]("Element "+response+" supprimé avec succès")

                location.reload();
            }
        });
    });
</script>
