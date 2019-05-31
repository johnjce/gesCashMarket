$("#inputSearch").on("keyup", function () {
    var value = $("#inputSearch").val();
    var posting = $.post("./index.php?controller=Customer&action=search", { "value": value });
    posting.done(function (data) {
        var jdata = JSON.parse(data);
        if (jdata.nombres != null) {
            document.querySelector('#clientsResult').innerHTML = jdata.nombres + " " + jdata.apellidos + "-" + jdata.dni;
            document.querySelector('#clientsResult').innerHTML += "<input type=\"hidden\" id=\"IDCL\" value=\"" + jdata.IDCL + "\"/>";
            return;
        }
        var x = "";
        for (i in jdata) {
            x += jdata[i].nombres + " " + jdata[i].apellidos + "-" + jdata[i].dni + "<br/>";
        }
        document.querySelector('#clientsResult').innerHTML = x;
    });
    posting.fail(function (data) {
        document.querySelector('#clientsResult').innerHTML = `Algo fallo, intentelo de nuevo.`;
    });
});