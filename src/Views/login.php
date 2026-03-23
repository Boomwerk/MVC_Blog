<section style="height:600px">

   

    <div class="row w-100 py-5">

        <div class="col-5 p-4 d-flex justify-content-center align-items-center">
            <img src="Public/assets/img/login.jpg" alt="" class="w-100">
        </div>
        <div class="col-7 d-flex flex-column align-items-center justify-content-center ">
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

            <h3>Connectez-vous sans limite</h3>

            <a href="/blog/register" class="border border-success px-5 py-1 text-decoration-none mt-2 text-success">Je souhaite m'inscrire</a>
            <hr class="bg-black w-50 mt-4">

            <form action="loginValidator" method="POST" class="mt-3 w-50">

                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" placeholder="exemple@email.com" class="form-control">
                <label for="password" class="form-label mt-3">Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                <input type="submit" class="btn btn-success mt-3" value="Connexion">
            </form>

            <hr class="bg-black w-50 mt-4">

            <div>
                <p>Mot de passe oublier ? <a href="/blog/forgotPassword" class="text-decoration-none text-success">Cliquez ici</a></p>
            </div>
        </div>

    </div>


</section>