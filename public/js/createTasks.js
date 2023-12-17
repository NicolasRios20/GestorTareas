function createTasks() {
    var formulario = document.getElementById('createTasks');
    var datosFormData = new FormData(formulario);
    console.log('Datos FormData:', datosFormData);
    $.ajax({
        url: 'tasks/createTasks',
        method: 'POST',
        data: formData,
        succes: function (data) {
            iziToast.success({
                backgroundColor: '#212129',
                theme: 'dark',
                progressBarColor: "#337ab7",
                title: "Éxito",
                message: "¡Tarea creada!",
                position: "topRight",
            });
            console.log(data);
        },
        error: function (error) {
            console.log(error);
            iziToast.error({
                backgroundColor: '#212129',
                theme: 'dark',
                progressBarColor: "#337ab7",
                title: "Érror",
                message: "¡No se creo la tarea intente de nuevo!",
                position: "topRight",
            });
            console.log(error);
        }
    })
}
