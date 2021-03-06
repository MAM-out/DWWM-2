<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="https://www.afpa.fr/afpa-theme/1.18.2/images/afpa/favicon.ico">
        <title>Jarditou foufou</title>
    </head>
    



<body>
    <div class="container">

        <!--HEADER----------------------------------->
            <div class="row  mx-auto">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8  d-none d-sm-block"> 
                    <div class="pb-2"><img src="public\img\jarditou_logo.jpg" alt="Logo Jarditou" title="Logo Jarditou" width="300"> </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4  d-none d-sm-block align-self-center">
                    <div class="p-3"><h1 class="text-right">Tout le jardin</h1></div>
                </div> 
            </div>
            <!--MENU-->
            <div class="row mx-auto">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Jarditou.com</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
               
                        
                       

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            <a class="nav-link" href="index.html">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="tableau.html">Tableau</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Votre promotion">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                        </form>
                        </div>
                    </nav>
                </div>
            </div>    
            <!---->
            <div class="row mx-auto">
                <div class="col-12">
                        <img src="public\img\promotion.jpg" class="img-fluid" alt="Banniere promo" title="Banniere promo">
                </div>
            </div>


        <!--MAIN----------------------------------->

        <div class="row mx-auto">
            <div class="col-12 mt-2"> 
                <small id="stars" class="form-text text-muted">* Champs obligatoires</small>
                <h2>Vos coordonnées</h2>
                    <div>
        <!--FORMULAIRE 1 / téléchargement fichier----------------------------->

        <div class="uk-container">
            <?php
            // si on a cliquer sur le bouton envoyer (si on a la valeur du bouton envoyé en post)
            if (isset($_POST['submit'])) {
                // on définis les type de fichiers acceptés
                $aMimeTypes = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');
                /**
                 *  On extrait le type du fichier via l'extension FILE_INFO  
                 */
                   // création d'une nouvelle ressource fileinfo dans laquelle nous indiquons l'info recherchée  
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // on récupère le type MIME du fichier et on le stock dans une variable
                $mimetype = finfo_file($finfo, $_FILES['file']['tmp_name']);
             
                finfo_close($finfo);
                //si le type de fichier est correct
                if (in_array($mimetype, $aMimeTypes)) {
                    // récupération de l'extension du fichier et stockage dans une variable
                    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
               // stockage du chemein de destintaion dans une variable
                    $upload_dir = '../assets/img/';
                    // renommage du fichier, facultatif, selon le besoin
                    $_FILES['file']['name'] = 1;
                    // indication du chemin + nom de fichier pour le déplacement
                    $upload_file = $upload_dir . $_FILES['file']['name'] . '.' . $extension;
                       // autaorisation pour l'écriture
                       chmod($_FILES['file']['tmp_name'], 0750);
                       //déplacement du fichier
                       move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
                       // message de confirmation
        ?>
        <p>Upload correct</p>
        <?php
                    } else {
                    // Le type n'est pas autorisé, donc ERREUR
                    ?>
                    <p>Type de fichier non autorisé</p>
                        <?php
                }
            } else {
                ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Upload de fichier</legend>
                        <div class="uk-margin">
                            <label for="file">Sélectionnez un ficher</label>
                            <input type="file" class="uk-input" name="file" id="file" placeholder="Sélectionnez ...">
                        </div>
                        <div class="uk-margin">
                            <input type="submit" class="waves-effect waves-light btn" name="submit" id="submit" value="Envoyer">
                        </div>
                    </fieldset>
                </form>
                <?php
            }
            ?>
        </div>

        <!--FORMULAIRE 2 / envoi des données utilisateur----------------------------->

             <form action="http://bienvu.net/script.php" method="post">

                    <div class="form-group"><label for="nom">Votre nom* <br></label><input type="text" name="nom" id="nom" placeholder="Votre nom" class="form-control" required>
                    <div id="avnom" class="rouge"></div></div><span class="rouge">  </span><br>
            
                    <div class="form-group"><label for="prénom">Votre prénom*<br> </label><input type="text" name="prenom" id="prenom" placeholder="Votre prénom" class="form-control" required>
                    <div id="avprénom" class="rouge"></div></div><span class="rouge">  </span><br>
                    
                    
                    <div class="form-group"><label for="sexe">Sexe*  </label><br><input type="radio" name="sexe" value="Féminin"> Féminin <input type="radio" name="sexe" value="Masculin" required> Masculin </div><span class="rouge"> </span><br>
                    
                    <div class="form-group"><label for="date de naissance">Date de Naissance*<br></label><input type="text" name="datenaissance" id="datenaissance" value="jj/mm/aaaa" class="form-control" required>
                    <div id="avdate"class="rouge"></div></div><span class="rouge">  </span><br>
                
                    <div class="form-group"><label for="code postal">Code postal<br> </label><input type="text" name="codepostal" id="codepostal" class="form-control">
                    <div id="avcodepostal" class="rouge"></div></div><span class="rouge">  </span><br>
                    
                    <div class="form-group"><label for="adresse">Adresse<br> </label><input type="text" name="adresse" id="adresse" class="form-control"></div><br>
                
                    <div class="form-group"><label for="ville">Ville<br> </label><input type="text" name="ville" id="ville" class="form-control" ></div><br>
                
                    <div class="form-group"><label for="email">Email*<br> </label><input type="text" name="email" id="addmail" value="xxx.xxxx@xxxxx.xx" onFocus="if (this.value=='xxx.xxxx@xxxxx.xx')" class="form-control" required>
                    <div id="avmail" class="rouge"></div></div><span class="rouge">  </span>
            
                </fieldset><br>
                <fieldset><div class="form-group">
                    <legend><b>Votre demande</b></legend>
                <label for="sujet">Sujet*<br> </label><select name="sujet" size="1" class="form-control" placeholder="Veuillez sélectionner un sujet" required>
                    <option>Mes commandes</option>
                    <option>Question sur un produit</option>
                    <option>Réclamation</option>
                    <option>Autre</option>
                    </select></div><br>
                    <div class="form-group"><label for="question">Votre question*<br> </label><textarea name="question" id="question"  class="form-control"></textarea><span class="rouge">  </span>
                   
                    </fieldset><br>


                <input type="checkbox" name="acceptation" value="acceptation" required> J'accepte le traitement informatique de ce formulaire.</div><br>
            <button type="submit" class="btn btn-secondary btn-lg">Envoyer</button>   <button type="reset" class="btn btn-secondary btn-lg">Annuler</button>
            </form>
       <!--FOOTER----------------------------------->

<div class="row ">
    <div class="col-12 ">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark rounded mb-3 mt-3" id="menu">
            <div class="d-none d-sm-block">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Mentions légales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Horaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Plan du site</a>
                    </li>
                </ul>
            </div>    
        </nav>
    </div>
</div>
</div>

<script src="public\js\verif-form.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>