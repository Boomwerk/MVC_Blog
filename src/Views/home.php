<section class="container gap-2">
    <div class="row">
        <div class="col-lg-8 p-2">
            <img src="https://picsum.photos/400/200" alt="" class="w-100 rounded">
        
            <div class="d-flex mt-2">
                <p class="d-flex align-items-center bg-black text-white rounded p-1 m-0" style="font-size:12px">PHP</p>
                <p class="m-0"> 12/04/2026</p>
            </div>
            <h5 class="m-0"><u>[TUTO] test de titre pour les tuto eh vasi</u></h5>
        </div>
        
        <div class="col-lg-4 gap-2">
            <h5>Recent articles</h5>

            <?php for($i=0; $i<4; $i++){?>

                <div class="d-flex gap-2 mt-2">
                    <img src="https://picsum.photos/200/100" alt="" style="width:100px; height:100px; object-fit:cover rounded">
                    <div class="d-flex flex-column">
                        <div class="d-flex gap-1 align-items-center">
                            <p class="d-flex align-items-center bg-black text-white rounded p-1 m-0" style="font-size:12px">PHP</p>
                            <p class="m-0" style="font-size:12px">12/12/2026</p>
                        </div>
                        <p class="h6"><u>[TUTO] test de titre pour les tuto eh vasi</u></p>
                        <div>

                        </div>
                    </div>

                </div>
            <?php } ?>
            

            <div class="d-flex justify-content-end">
                <a href="" class="border border-sm rounded text-decoration-none text-black p-1">Voir plus d'articles</a>

            </div>

         

          

        </div>
    </div>
    
   
    

</section>

<section class="mt-5 bg-success rounded p-4">
    <h2 class="text-center text-white">Les Catégories</h2>

    <div class="row gap-2 d-flex justify-content-center flex-wrap">
        <div class="col-3 d-flex justify-content-center align-items-center p-4">
            
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/3840px-PHP-logo.svg.png" alt="" style="width:150px">
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center p-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/960px-Unofficial_JavaScript_logo_2.svg.png" alt="" style="width:150px">
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center p-4">
            <img src="https://upload.wikimedia.org/wikipedia/fr/6/62/MySQL.svg" alt="" style="width:150px">
        </div><div class="col-3 d-flex justify-content-center align-items-center p-4">
            <img src="Public/assets/img/htmlcss.png" alt="" style="width:150px">
        </div><div class="col-3 d-flex justify-content-center align-items-center p-4">
            <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/symfony-icon.png" alt="" style="width:150px">
        </div><div class="col-3 d-flex justify-content-center align-items-center p-4">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/3840px-React-icon.svg.png" alt="" style="width:150px">
        </div>

    </div>
</section>