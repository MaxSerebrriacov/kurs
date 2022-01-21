window.addEventListener('load', main, false);
setInterval(main, 1000);

function main()
{
var img1 = document.getElementById('img');
img1.innerHTML = "";
img1.innerHTML += '<img src=img/graph.png><br>';
img1.innerHTML += '<img src=img/graph2.png>';
}
