document.getElementById('textarea').onkeyup = function () {
  document.getElementById('count').innerHTML = (500 - this.value.length);
};
