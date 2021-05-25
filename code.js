function selectcategorie() {

    var x = document.getElementById("category").value;

    $.ajax({
        url: "shocategorie.php",
        method: "POST",
        data: {
            id: x
        },
        success: function (data) {
            $("#cate").html(data);
        }
    })
}