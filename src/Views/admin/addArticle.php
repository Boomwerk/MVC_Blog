<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<section>
    <div class="row m-0">
        <div class="col-2 bg-success d-flex flex-column align-items-center p-4 gap-4" >

            <a href="/blog/admin/dashboard" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-speedometer"></i> Dashboard</a>
            <a href="/blog/admin/articles" class="rounded bg-dark p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-file-earmark-text"></i> Mes Articles</a>
            <a href="/blog/admin/users" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-people-fill"></i> Les Utilisateurs</a>
            <a href="/blog/admin/settings" class="rounded p-2 fw-bold text-decoration-none text-white w-100 text-center" ><i class="bi bi-gear"></i> Mes Paramètres</a>
        </div>
        <div class="col-9 p-5 bg-white rounded gap-4">
           <div class="row">
            <div class="col-6">
                <h1>Ajouter un article</h1>

                <form class="mt-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre de l'article</label>
                        <input type="text" class="form-control" placeholder="Mon article">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Catégorie du blog</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="editor" rows="14"></textarea>
                    </div>

                    <button class="btn btn-success mt-4">Publier</button>
                </form>
            </div>
            <div class="col-6">
                <h3>Mise en page</h3>
                <div class="w-100">
                    <label class="form-label">Preview</label>
                    <div id="preview" class="border rounded p-3 bg-light" style="min-height: 500px;"></div>
                </div>
                
            </div>

           </div>
            
        </div>

    </div>
</section>

<script>
    const editor = document.getElementById('editor');
    const preview = document.getElementById('preview');

    editor.addEventListener('input', () => {
        const markdown = editor.value;
        preview.innerHTML = marked.parse(markdown);
    });
</script>

