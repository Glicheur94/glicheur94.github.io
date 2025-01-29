const tableauminuscule  = ["a","z","e","r","t","y","u","i","o","p","q","s","d","f","g","h","j","k","l","m","w","x","c","v","b","n"];

const tableaumajuscule  = ["A","Z","E","R","T","Y","U","I","O","P","Q","S","D","F","G","H","J","K","L","M","W","X","C","V","B","N"];

const tableaunumero     = [1,2,3,4,5,6,7,8,9,0];

const tableausymbole    = ["$","%","^","&","!","@","#",":",";","'",",",".",">","/","*","-",",","|","?","~","_","=","+"];


function generateur() {
  /* creation d'une variable vide qui sera le futur password */
  let newPass         = [];
  let message         = '';

  /* Récupérer ce qui a été coché ou saisi */
  const abcLower      = document.querySelector('[name="abc_lower"]').checked;
  const abcUpper      = document.querySelector('[name="abc_Upper"]').checked;
  const digits        = document.querySelector('[name="abc_digits"]').checked;
  const special       = document.querySelector('[name="abc_special"]').checked;
  const taille        = document.getElementById('taille').value;
  
  /* Controler que la taille a été saisie. Si ce n'est pas le cas mettre un message d'erreur */
  if( !abcLower && !abcUpper && !digits && !special ){
    message          += "- Cochez une case.";
  }

  if( taille.length < 1 ){
    message          += "\r"+"- Veuillez renseignez une taille svp.";
  } else if(parseInt(taille) < 6){
    message          += "\r"+"- Pour plus de sécurité veuillez renseignez une taille supérieure à 6.";
  }

  if( message.length > 1 ){
    alert(message);
    return;
  } 

  /* Générer la chaine de caractères selon les options choisies */
  if( abcLower ){newPass.push(...tableauminuscule);}
  if( abcUpper ){newPass.push(...tableaumajuscule);}
  if( digits ){newPass.push(...tableaunumero);}
  if( special ){newPass.push(...tableausymbole);}
  shuffle(newPass);
  newPass = newPass.slice(0, taille);

  /* Afficher la zone masquée avec le nouveau password */
  document.querySelector('#newPassword').value = newPass.join('');


  /* Generation de la force */
  let force           = "TRÉS FAIBLE 🟡";
  if( taille >= 0 ){
    force             = "FAIBLE 🔴";
  }
  if( taille >= 6 ){
    force             = "MOYEN 🟠";
  }
  if( taille >= 12 ){
    force             = "BON 🟢";
  }

  if( taille >= 12 ){
    force             = "EXCELLENT 🔵";
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

function copie(){

  const text = document.querySelector('#newPassword').value;

  navigator.clipboard.writeText(text).then(function() {
   alert('votre mot de passe à été copié !! ');
  }, function(err) {
    alert('Une erreur s est produite votre mot de passe n a pas pu etre copié : ', err);
  });
}
