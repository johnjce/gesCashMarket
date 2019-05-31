function isUserMediaSupport() {
    return !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
}

function _getUserMedia() {
    return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
}

const $video = document.querySelector("#video"),
    $canvas = document.querySelector("#canvas"),
    $buttonCapture = document.querySelector("#buttonCapture"),
    $state = document.querySelector("#state"),
    $deviceList = document.querySelector("#deviceList");

const setDeviceList = () => {
    navigator
        .mediaDevices
        .enumerateDevices()
        .then(function (devices) {
            const videoDevice = [];
            devices.forEach(function (dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    videoDevice.push(dispositivo);
                }
            });

            if (videoDevice.length > 0) {
                videoDevice.forEach(dispositivo => {
                    const option = document.createElement("option");
                    option.value = dispositivo.deviceId;
                    option.text = dispositivo.label;
                    $deviceList.appendChild(option);
                });
            }
        });
}

function enableSubmit() {
    $("#buttonCapture").removeAttr("disabled");
}

function disableSubmit() {
    $("#buttonCapture").attr("disabled", "disabled");
}

function checkInput(idInput) {
    return $(idInput).val() != "" ? true : false;
}

(function () {
    if (!isUserMediaSupport()) {
        alert("Su navegador no acepta la captura de imagenes.");
        $state.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
        return;
    }


    let stream;

    navigator
        .mediaDevices
        .enumerateDevices()
        .then(function (devices) {
            const videoDevice = [];

            devices.forEach(function (dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    videoDevice.push(dispositivo);
                }
            });

            if (videoDevice.length > 0) {
                showStream(videoDevice[0].deviceId);
            }
        });



    const showStream = idDeDispositivo => {
        _getUserMedia(
            {
                video: {
                    deviceId: idDeDispositivo,
                    width: 300, 
                    height: 200
                }
            },
            function (streamObtenido) {
                setDeviceList();

                $deviceList.onchange = () => {
                    if (stream) {
                        stream.getTracks().forEach(function (track) {
                            track.stop();
                        });
                    }
                    showStream($deviceList.value);
                }

                stream = streamObtenido;

                $video.srcObject = stream;
                $video.play();
                
                $("#addCustomerForm *").on("change keydown", function () {
                    if (checkInput("#nombres") &&
                        checkInput("#apellidos") &&
                        checkInput("#dni") &&
                        checkInput("#telefono") &&
                        checkInput("#domicilio")) {
                        enableSubmit();
                    } else {
                        disableSubmit();
                    }
                });

                $buttonCapture.addEventListener("click", function () {
                    event.preventDefault();
                    $video.pause();
                    let contexto = $canvas.getContext("2d");
                    $canvas.width = $video.videoWidth;
                    $canvas.height = $video.videoHeight;
                    contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                    let dniPicture = $canvas.toDataURL();

                    $state.innerHTML = "Guardando. Por favor, espera...";
                    var email = "Sin email";
                    if($("#email").val() != "") email = $("#email").val();
                    var posting = $.post("./index.php?controller=Customer&action=save", {
                        "id": $("#IDCL").val(),
                        "nombres": $("#nombres").val(),
                        "apellidos": $("#apellidos").val(),
                        "dni": $("#dni").val(),
                        "telefono": $("#telefono").val(),
                        "domicilio": $("#domicilio").val(),
                        "email": email,
                        "img_dni": encodeURIComponent(dniPicture)
                    });
                    posting.done(function (data) {
                        $("#IDCL").val("");
                        $("#nombres").val("");
                        $("#apellidos").val("");
                        $("#dni").val("");
                        $("#telefono").val("");
                        $("#domicilio").val("");
                        $("#email").val("");
                        $state.innerHTML = `Guardado con éxito.`;
                    });
                    posting.fail(function (data) {
                        $state.innerHTML = `Algo fallo, intentelo de nuevo.`;
                    });

                    $video.play();
                });
            }, function (error) {
                $state.innerHTML = "No se puede acceder a la cámara, o no le diste permiso.";
            });
    }
})();