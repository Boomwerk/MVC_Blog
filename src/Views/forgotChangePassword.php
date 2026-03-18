<section>

    <div class="row">

        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="/blog/Public/assets/img/forgotpass.jpg" alt="image d'une personne essayant de retrouvé son mot de passe." class="w-75">
        </div>
        <div class="col-4 d-flex flex-column justify-content-center align-items-center">
            <?php
                if(isset($_SESSION["error"])){
            ?>
                <div class="alert alert-danger w-50 text-center"><?= $_SESSION["error"]; ?></div>
            <?php
                    unset($_SESSION["error"]);
                }
            ?>

            <?php
                if(isset($_SESSION["success"])){
            ?>
                <div class="alert alert-success w-50 text-center"><?= $_SESSION["success"]; ?></div>
            <?php
                    unset($_SESSION["success"]);
                }
            ?>

            <h1>Mot de passe oublier ? </h1>
            <form action="/blog/forgotPassword/changePassword" method="POST" class="mt-5 w-75">

                <label for="password" class="form-label mt-3">Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                <small id="passwordHelpBlock" class="form-text text-muted">Votre mot de passe doit comporter minimum 8 caractères, 1 majuscule, 1 minuscule et 1 caractère spéciale</small>
                <div>
                    <label for="password" class="form-label mt-3">Confirmer le mot de passe</label>
                    <input type="password" name="confirm-password" placeholder="Mot de passe" class="form-control">
                </div>
                
                <input type="submit" class="btn btn-success mt-3 w-100" value="Retrouver mon mot de passe">
            </form>

            <a href="/blog/login" class="text-decoration-none text-success mt-4">Retour vers Connexion</a>

        </div>

    </div>


</section>