function openModalEditUsers(identification) {
    $.ajax({
        url: window.location.href + "/getUser", // Reemplaza con la URL de tu recurso modal
        method: "POST",
        data: { identification },
        success: function (data) {
            let user = data.dataUser;
            $("#identification").val(user.identification);
            $("#name").val(user.name);
            $("#email").val(user.email);
            $("#rol").val(user.rol);
            $("#staticBackdrop").modal("show");
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function editUser() {
    let formData = $("#editUserForm").serialize();
    $.ajax({
        type: "POST",
        url: window.location.href + "/updateUsers",
        data: formData,
        success: function (response) {
            console.log(response);
            $("#staticBackdrop").modal("hide");
            iziToast.success({
                backgroundColor: '#212129',
                theme: 'dark',
                progressBarColor: "#337ab7",
                title: "Éxito",
                message: "¡los Datos De Usuario Fueron Actualizados!",
                position: "topRight",
            });
            setTimeout(function() {
                location.reload();
            }, 5000);
        },
        error: function (error) {
            iziToast.error({
                backgroundColor: '#212129',
                theme: 'dark',
                progressBarColor: "#337ab7",
                title: "Érror",
                message: "¡los Datos No Fueron Actualizados!",
                position: "topRight",
            });
        },
    });
}
