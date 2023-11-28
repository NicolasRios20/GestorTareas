
function openModalCreateTasks(){
    $.ajax({
        url: '/users/optionUsers',
        method: 'GET',
        success: function (data) {
            $('#user_assigned').html(data)
        },
        error: function (error) {
            console.log(error);
        },
    })
}

function createTasks() {
    let formData = $('#createTasksForm').serialize();
    $.ajax({
        url: 'tasks/createTasks',
        method: 'POST',
        data: formData,
        success: function (data) {
            console.log(data);
            iziToast.success({
                backgroundColor: '#212129',
                theme: 'dark',
                progressBarColor: "#337ab7",
                title: "Éxito",
                message: "¡Tarea creada!",
                position: "topRight",
            });
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
