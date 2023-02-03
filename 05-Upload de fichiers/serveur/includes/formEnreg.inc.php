<?php
    function afficherFormEnreg($chemin){
        echo <<<FORMENREG
            <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrer film</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="$chemin" method="POST" enctype="multipart/form-data" class="row g-3" onSubmit="return validerFormEnreg();">
                        <div class="col-md-6">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control is-valid" id="titre" name="titre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="duree" class="form-label">Durée</label>
                            <input type="text" class="form-control is-valid" id="duree" name="duree" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pochette" class="form-label">Pochette</label>
                            <input type="file" class="form-control is-valid" id="pochette" name="pochette">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        FORMENREG;
    }
?>