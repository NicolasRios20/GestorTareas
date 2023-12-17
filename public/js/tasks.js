
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
        }
    })
}

function getdescriptionTask(idTasks) {
    $.ajax({
        url: 'tasks/getTask',
        method: 'POST',
        data: {'id_task': idTasks},
        success: function(response) {
            console.log(response.dataTask.description);
            $('#descriptionTasksText').text(response.dataTask.description);
            $('#descriptionTasks').modal('toggle');
        },
        error: function(error) {
            iziToast.error({
                backgroundColor: '#212129',
                theme: 'dark',
                progressBarColor: "#337ab7",
                title: "Érror",
                message: "¡Ocurrio un error intente de nuevo!",
                position: "topRight",
            });
        }

    })
}

function openModalProgress(idTasks) {
    $('#idTaskProgress').val(idTasks)
    $('#modalProgress').modal('toggle')
}

function addPercentage() {
    let formanData = $('#formAddPercentage').serialize()
    $.ajax({
        url: 'tasks/addPercentage',
        method: 'POST',
        data: formanData,
        success: function(response){
            let data = response.data
            let idTasks = data.id_task
            $("#stateTasks" + idTasks).removeClass(function (index, className) {
                return (className.match(/(^|\s)bg-\S+/g) || []).join(' ');
            }).addClass('bg-' + data.state_color);
            $("#stateTasks" + idTasks).text(data.state);
            $("#progressBar" + idTasks).text(data.percentage);
            $('#progressBar'  +idTasks).css("width", data.percentage + '%');
            console.log('porcentaje => ' + response.data.percentage);
        },error: function(error){
            console.log(error);
        }
    })
}
