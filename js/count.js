// Permet d'afficher le nombre de caractères restants avec un nombre de caractère de 500 au maximum
document.getElementById('textarea').onkeyup = function () {
  document.getElementById('count').innerHTML = (500 - this.value.length);
};
