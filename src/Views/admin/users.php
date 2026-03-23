<section>
    <div class="row m-0">
        <div class="col-2 bg-success d-flex flex-column align-items-center p-4 gap-4" style="height:100vh">

            <a href="/blog/admin/dashboard" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-speedometer"></i> Dashboard</a>
            <a href="/blog/admin/articles" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-file-earmark-text"></i> Mes Articles</a>
            <a href="/blog/admin/users" class="rounded bg-dark p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-people-fill"></i> Les Utilisateurs</a>
            <a href="/blog/admin/settings" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-gear"></i> Mes Paramètres</a>
        </div>
        <div class="col-9 p-5 bg-white rounded gap-4">

           <div>
                <a href="" class="btn btn-success">Ajouter un article</a>
            </div>


            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Date Création</th>
                    <th scope="col">Date Mise à jour</th>
                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < 8; $i++){ ?>

                    
                    <tr>
                        <th scope="row">1</th>
                        <td>titre de l'article</td>
                        <td>il etait une fois zebi la mouche ...</td>
                        <td>PHP</td>
                        <td>19/03/2026</td>
                        <td>19/03/2026</td>
                        <td>
                            <a href="" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                    <?php } ?>
                    
                </tbody>
            </table>

            <nav aria-label="...">
                <ul class="pagination">

                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Précédent</a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>

                </ul>
            </nav>
            
            
        </div>

    </div>
</section>