<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h1>J'ignore pourquoi mais je n'arrive pas à inclure mon formulaire... </h1>

<form action="http://localhost/bibliotheque/addarticle" method="POST">

    <div>
        <label for="title">Titre :</label>
       <input type="text" id="title" name="title" />
    </div>

    <div>
        <label for="summary">Text :</label>
       <input type="text" id="summary" name="summary" />
    </div>

    <div>
        <label for="n_isbn">isbn :</label>
       <input type="number" id="n_isbn" name="n_isbn" />
    </div>
    
    <div class="button">
       <button type="submit">Envoyer</button>
    </div>       

</form>

</body>

</html>