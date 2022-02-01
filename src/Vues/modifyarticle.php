<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action='<?="http://localhost/forum/modifyarticle/$sId"?>' method="POST">

    <div>
        <label for="title">Titre :</label>
       <input type="text" id="title" name="title" value="<?=$oArticle->getTitle()?>" />
    </div>

    <div>
        <label for="text">Text :</label>
       <input type="text" id="text" name="text" value="<?=$oArticle->getSummary()?>" />
    </div>

    <div>
        <label for="isbn">isbn :</label>
       <input type="number" id="isbn" name="isbn" value="<?=$oArticle->getN_isbn()?>" />
    </div>
    
    <div class="button">
       <button type="submit">Envoyer</button>
    </div>       

</fom>


</body>

</html>