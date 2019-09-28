
// Changes the label to show the file selected.

$(document).ready(function(){
    $('#uploadFile').on('change', function(){
        var el = document.getElementById('uploadFile').value;
        el = el.split('\\');
        var fileName = el[2];
        document.getElementById('fileLabel').innerHTML = fileName;
    })
})