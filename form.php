<?php
if ($_POST) {
    $errors = array();
    if (empty($_POST['nom'])) {
        $errors['nom1'] = "Veuillez renseigner votre nom";
    }


    if (empty($_POST['prenom'])) {
        $errors['prenom1'] = "Veuillez renseigner votre prénom";
    }

    $isEmailValid = filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL);
    if ($isEmailValid === false) {
        $errors['courriel1'] = "Veuillez renseigner une adresse e-mail valide";
    }


    if (empty($_POST['message'])) {
        $errors['message1'] = "Veuillez renseigner votre message";
    }


    if (0 == count($errors)) {
        unset($_POST);
    }


}
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">


    <link rel="stylesheet" href="style.css"/>

    <title>Formulaire</title>
</head>
<body>

<h1 class="text-center">Contactez-Nous</h1>
<form action="" method="post" novalidate>
    <?php
    if (isset($errors) && count($errors) == 0) {
        ?>
        <div class="centered">
            Votre message a été envoyé.
        </div>
        <?php
    }
    ?>
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>"/>
        <p><?php if (isset($errors['nom1'])) echo $errors['nom1'];
            ?></p>
    </div>


    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom"
               value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom']; ?>"/>
        <p><?php if (isset($errors['prenom1'])) echo $errors['prenom1'];
            ?></p>

    </div>

    <div>
        <label for="courriel">Courriel :</label>
        <input type="email" id="courriel" name="courriel"
               value="<?php if (isset($_POST['email'])) echo $_POST['courriel']; ?> "/>
        <p><?php if (isset($errors['courriel1'])) echo $errors['courriel1'];
            ?></p>

    </div>

    <div>
        <label for="tel">Téléphone:</label>
        <input type="tel" pattern="\d+" id="tel" name="tel"
               value="<?php if (isset($_POST['tel'])) echo $_POST['tel']; ?>"/>
        <p><?php if (isset($errors['tel1'])) echo $errors['tel1'];
            ?></p>
    </div>


    <div>
        <label for="choix">Objet:</label>
        <select name="choix">
            <option value="choix0">Acheter un MacBook</option>
            <option value="choix1">Manger des Pommes</option>
            <option value="choix2">Boire une bière</option>
            <option value="choix3">Rencontrer Elon Musk</option>
            <option value="choix4">Vendre ses Chaussons</option>
        </select>
    </div>

    <div>
        <label for="message">Message :</label>
        <textarea id="message" name="message"><?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea>
        <p><?php if (isset($errors['message1'])) echo $errors['message1'];
            ?></p>

    </div>

    <div class="button">
        <button type="submit">Envoyer</button>
    </div>
</form>
</body>
</html>