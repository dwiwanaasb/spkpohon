const keyword = document.getElementById('keyword');
const contentTable = document.getElementById('content-table');

keyword.addEventListener('keyup', function () {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            contentTable.innerHTML = xhr.responseText;
        }
    };

    xhr.open('GET', '../../ajax/ajaxNilaiPreferensi.php?keyword=' + keyword.value, true);
    xhr.send();
});
