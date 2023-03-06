window.onload = function randomizeItems(items)
{   
    var x = document.getElementById('divList').style.display = 'block';
    var x = document.getElementById('divLoading').style.display = 'none';
    window.scrollTo(0, 0);

    var ul = document.querySelector('ul');
for (var i = ul.children.length; i >= 0; i--) {
    ul.appendChild(ul.children[Math.random() * i | 0]);
}
 
}
