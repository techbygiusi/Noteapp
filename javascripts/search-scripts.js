function filterScripts() {
    var input = document.getElementById('search-bar');
    var filter = input.value.toLowerCase();
    var ul = document.getElementById('script-list');
    var li = ul.getElementsByTagName('li');

    for (var i = 0; i < li.length; i++) {
        var scriptName = li[i].textContent || li[i].innerText;
        if (scriptName.toLowerCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}