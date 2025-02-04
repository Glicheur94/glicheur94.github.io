<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🎀 Generate Password!</title>

  <meta>

  <?php require_once(header.html); ?>

  <header role="banner"><a href="/GeneratePassword/index.html">HOME</a></header>
  <header role="banner"><a href="/GeneratePassword/HTML/login.html">LOGIN</a></header>



  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4276044547379358"
    crossorigin="anonymous"></script>


</head>

<body>

  <header>
    <style>
      h1 {
        color: blue;
        font-family: verdana;
        font-size: 200%;
      }

      p {
        color: red;
        font-family: courier;
        font-size: 120%;
      }

      body {
        text-align: center;
      }

      .vertical-line {
        border-left: 2px solid #000;
        display: inline-block;
        height: 130px;
        margin: 0 20px;
      }
    </style>





  </header>
  <br>
  <table border="1" align="center" width="100%"></table>

  <!---<img src="Cours BTS 2eme année\SLAM\IMAGE\images.jpeg" alt="Générateur de mot de passe"-->


  <h1><i>Generator an Password Random !!!💻 </i></h1>

  <p> Create strong and unique random passwords to ensure the security of your web account ;) </p>

  <br>
  <div>
    <h2>🔒 Password generated : </h2>
    <input type="text" size="70" min="1" max="50" placeholder="Nombre de caractère" name="caractere" id="newPassword">
    <button id="generateButton2" type="button" onclick="copie()" id="Copier">📝 Copied</button>
    <br><br>

    |<input type="checkbox" name="abc_lower" />abc

    |<input type="checkbox" name="abc_Upper" />ABC

    |<input type="checkbox" name="abc_digits" />123

    |<input type="checkbox" name="abc_special" />&#]=
    |
    <br>

    <h2>📕 Password length : </h2>
    <input type="number" min="0" max="50" placeholder="Number" font-size="200%" id="taille">

    <div class="mb-8">
      <label class="block text-gray-300 mb-2">Longueur du mot de passe:</label>
    </div>

    <h2>🛡️ Password strength : </h2>
    <input type="text" placeholder="Password strength" id="force">

    <br>
    <br>
    <button id="generateButton" type="button" id="generateur" onclick="generateur()"> 🎲 Password generated</button>
    <br><br>

  </div>


  <script>

    function generateur() {

      const tableauminuscule = ["a", "z", "e", "r", "t", "y", "u", "i", "o", "p", "q", "s", "d", "f", "g", "h", "j", "k", "l", "m", "w", "x", "c", "v", "b", "n"];

      const tableaumajuscule = ["A", "Z", "E", "R", "T", "Y", "U", "I", "O", "P", "Q", "S", "D", "F", "G", "H", "J", "K", "L", "M", "W", "X", "C", "V", "B", "N"];

      const tableaunumero = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];

      const tableausymbole = ["$", "%", "^", "&", "!", "@", "#", ":", ";", "'", ",", ".", ">", "/", "*", "-", ",", "|", "?", "~", "_", "=", "+"];

      /* creation d'une variable vide qui sera le futur password */
      let newPass = [];
      let message = '';

      /* Récupérer ce qui a été coché ou saisi */
      const abcLower = document.querySelector('[name="abc_lower"]').checked;
      const abcUpper = document.querySelector('[name="abc_Upper"]').checked;
      const digits = document.querySelector('[name="abc_digits"]').checked;
      const special = document.querySelector('[name="abc_special"]').checked;
      const taille = document.getElementById('taille').value;

      /* Controler que la taille a été saisie. Si ce n'est pas le cas mettre un message d'erreur */
      if (!abcLower && !abcUpper && !digits && !special) {
        message += "- Cochez une case.";
      }

      if (taille.length < 1) {
        message += "\r" + "- Veuillez renseignez une taille svp.";
      } else if (parseInt(taille) < 6) {
        message += "\r" + "- Pour plus de sécurité veuillez renseignez une taille supérieure à 6.";
      }

      if (message.length > 1) {
        alert(message);
        return;
      }

      /* Générer la chaine de caractères selon les options choisies */
      if (abcLower) { newPass.push(...tableauminuscule); }
      if (abcUpper) { newPass.push(...tableaumajuscule); }
      if (digits) { newPass.push(...tableaunumero); }
      if (special) { newPass.push(...tableausymbole); }
      shuffle(newPass);
      newPass = newPass.slice(0, taille);

      /* Afficher la zone masquée avec le nouveau password */
      document.querySelector('#newPassword').value = newPass.join('');


      /* Generation de la force */
      let force = "TRÉS FAIBLE 🟡";
      if (taille >= 0) {
        force = "FAIBLE 🔴";
      }
      if (taille >= 8) {
        force = "MOYEN 🟠";
      }
      if (taille >= 12) {
        force = "BON 🟢";
      }

      /* Affichage de la force */
      document.querySelector('#force').value = force;
    }

    function shuffle(array) {
      let currentIndex = array.length;

      // While there remain elements to shuffle...
      while (currentIndex != 0) {

        // Pick a remaining element...
        let randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        // And swap it with the current element.
        [array[currentIndex], array[randomIndex]] = [
          array[randomIndex], array[currentIndex]];
      }
    }

  </script>
  <script>
    function copie() {

      const text = document.querySelector('#newPassword').value;

      navigator.clipboard.writeText(text).then(function () {
        alert('votre mot de passe à été copié !! ');
      }, function (err) {
        alert('Une erreur s est produite votre mot de passe n a pas pu etre copié : ', err);
      });
    }
  </script>

  <div class="container">
    <div class="anla">
      <h1
        class="text-center mt-12 mb-12 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
        Qu'est ce qui fait la force d'un mot de passe ? 🛡️</h1>
      <div class="flex justify-center gap-10">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
          <img class="w-full"
            src="https://www.artionet.ch/Htdocs/Images/IF_Content_770/6387.jpg?puid=f7582db2-bdae-4168-b04d-e421a2eaee00"
            alt="Sunset in the mountains">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Sa longueur 📏</div>
            <p class="text-gray-700 text-base">
              Plus un mot de passe est long et plus il est sûr. Un mot de passe fort devrait comporter au moins 10
              caractères.
            </p>
          </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
          <img class="w-full" src="https://www.keepersecurity.com/blog/wp-content/uploads/2024/06/blog@2x-6.png"
            alt="Sunset in the mountains">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Sa complexité 🔐</div>
            <p class="text-gray-700 text-base">
              Les mots de passe forts utilisent une combinaison de lettres, chiffres, majuscules, minuscules et symboles
              pour former une série imprévisible de caractères ne ressemblant pas à des mots ou à des noms.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
      <img class="w-full"
        src="https://www.internetmatters.org/connecting-safely-online/wp-content/uploads/sites/2/2020/06/CYP-passwords-usernames.png"
        alt="Sunset in the mountains">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Son caractère unique </div>
        <p class="text-gray-700 text-base">
          Un mot de passe fort devrait être propre à chaque compte afin de réduire la vulnérabilité en cas de piratage.
        </p>
      </div>
    </div>
  </div>
  </div>
  <footer>

    <!--Appel du footer-->

  </footer>
</body>

</html>


</body>

</html>