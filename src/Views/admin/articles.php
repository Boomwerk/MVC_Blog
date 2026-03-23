<section>
    <div class="row m-0">
        <div class="col-2 bg-success d-flex flex-column align-items-center p-4 gap-4" >

            <a href="/blog/admin/dashboard" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-speedometer"></i> Dashboard</a>
            <a href="/blog/admin/articles" class="rounded bg-dark p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-file-earmark-text"></i> Mes Articles</a>
            <a href="/blog/admin/users" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-people-fill"></i> Les Utilisateurs</a>
            <a href="/blog/admin/settings" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-gear"></i> Mes Paramètres</a>
        </div>
        <div class="col-9 p-5 bg-white rounded gap-4">
            <h3>Les Articles</h3>
            <hr>
            <div>
                <a href="/blog/admin/articles/add" class="btn btn-success">Ajouter un article</a>
            </div>


            <table class="table table-striped mt-4">
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


            <nav aria-label="..." class="mt-4">
                <ul class="pagination">

                    <li class="page-item disabled">
                        <a class="page-link text-success" href="#" tabindex="-1">Précédent</a>
                    </li>

                    <li class="page-item bg-success active " style="background: green !important">
                        <a class="page-link text-white" href="#">1</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link text-success" href="#">2</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link text-success" href="#">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link text-success" href="#">Suivant</a>
                    </li>

                </ul>
            </nav>

            <hr class="my-5">

            <h3>Ajouter des catégories</h3>

             <?php
                if(isset($_SESSION["msg"]["error"])){
            ?>
                <div class="alert alert-danger w-50 text-center"><?= $_SESSION["msg"]["error"]; ?></div>
            <?php
                    unset($_SESSION["msg"]["error"]);
                }
            ?>

            <?php
                if(isset($_SESSION["msg"]["success"])){
            ?>
                <div class="alert alert-success w-50 text-center"><?= $_SESSION["msg"]["success"]; ?></div>
            <?php
                    unset($_SESSION["msg"]["success"]);
                }
            ?>

            <div>
                <form method="POST" action="/blog/admin/categories/add" enctype="multipart/form-data" class="mt-4">

                     <div class="form-group">
                        <label for="exampleFormControlInput1">Nom de la catégorie</label>

                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ma catégorie" name="title">
                    </div>
                    
                    <div class="form-group d-flex flex-column my-3">
                        <label for="exampleFormControlFile1">Image de la catégorie</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
                    </div>

                    <button class="btn btn-success mt-2">Ajouter une catégorie</button>
                </form>
            </div>

        

            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom de la catégorie</th>
                    <th scope="col">Date Création</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($variables["categories"] as $categorie){ ?>

                    
                    <tr>
                        <th scope="row"><?= $categorie["id"]; ?></th>
                        <td><?= $categorie["name"]; ?></td>
                        <td><?= $categorie["created_at"] ?></td>
                        <td><img src="<?=  $categorie["img"] ?>" alt="" width="60px"></td>
                        <td>
                            <a href="" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </td>

                    </tr>

                    <?php } ?>
                    
                </tbody>
            </table>

            <nav aria-label="..." class="mt-4">
                <ul class="pagination">

                    <li class="page-item disabled">
                        <a class="page-link text-success" href="#" tabindex="-1">Précédent</a>
                    </li>

                    <li class="page-item bg-success active " >
                        <a class="page-link text-white" href="#">1</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link text-success" href="#">2</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link text-success" href="#">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link text-success" href="#">Suivant</a>
                    </li>

                </ul>
            </nav>
                
            
        </div>    

    </div>



</section>