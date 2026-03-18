<section class="py-5">

    <div class="row h-100">

        <div class="col-5 p-4 d-flex justify-content-center align-items-center">
            
            <img src="Public/assets/img/login.jpg" alt="" class="w-100">
        </div>
        <div class="col-7 d-flex flex-column align-items-center justify-content-center ">
             <?php
                if(isset($_SESSION["error"])){
            ?>
                <div class="alert alert-danger w-50 text-center"><?= $_SESSION["error"]; ?></div>
            <?php
                    unset($_SESSION["error"]);
                }
            ?>

            <h3>Inscription</h3>

            <a href="/blog/login" class="border border-success px-5 py-1 text-decoration-none text-success mt-2">Je suis deja membre</a>
            <hr class="bg-black w-50">

            <form action="registerValidator" method="POST" class="mt-3 w-50">
                <label for="email" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" placeholder="pseudo" class="form-control">
                <label for="email" class="form-label mt-3">Email</label>
                <input type="email" name="email" placeholder="exemple@email.com" class="form-control">
                <label for="password" class="form-label mt-3">Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                <small id="passwordHelpBlock" class="form-text text-muted">Votre mot de passe doit comporter minimum 8 caractères, 1 majuscule, 1 minuscule et 1 caractère spéciale</small>

                <label for="password" class="form-label mt-3">Confirmer le mot de passe</label>
                <input type="password" name="confirm-password" placeholder="Mot de passe" class="form-control">
                
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="checkpolitic">
                    <label class="form-check-label" for="flexCheckDefault">
                        J'accepte les conditions d'utilisation ainsi que les données collectés relative a ma personne.
                    </label>
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Connexion">
            </form>

            
        </div>

    </div>


</section>