
function pendingOrders(idWorker, baseUrl) {

    $.ajax({
        type: "GET",
        url: baseUrl + "worker/getOrdersByAjax/" + idWorker + "/pending",
        success: function (data) {
            var dades = JSON.parse(data);
            $('#pending-ord').html('');
            $('#pending-ord').DataTable({
                data: dades,
                columns: [
                    {title: "Id Orden"},
                    {title: "Código de orden"},
                    {title: "Descripción de orden"},
                    {title: "Prioridad"},
                    {title: "Fecha"},
                    {title: "Ejecuciones necesarias"},
                    {title: "Código robot"},
                    {title: "Nombre robot"},
                    {title: "Estado del robot"},
                    {title: "Opciones"}
                ],
                "language": {
                    "url": "public/datatables/json/" + lang + ".json"
                },
                "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "Todos"]]

            });
        },
        error: function (err) {
            console.log(err);
        },
        beforeSend: function () {
            $('#pending-ord').html('cargando');
        }
    });

}
function initOrders(idWorker, baseUrl) {

    $.ajax({
        type: "GET",
        url: baseUrl + "worker/getOrdersByAjax/" + idWorker + "/initiated",
        success: function (data) {
            var dades = JSON.parse(data);
            $('#init-ord').html('');

            $('#init-ord').DataTable({
                data: dades,
                columns: [
                    {title: "Id Orden"},
                    {title: "Código de orden"},
                    {title: "Descripción de orden"},
                    {title: "Prioridad"},
                    {title: "Fecha"},
                    {title: "Ejecuciones necesarias"},
                    {title: "Código robot"},
                    {title: "Nombre robot"},
                    {title: "Estado del robot"},
                    {title: "Opciones"}
                ],
                "language": {
                    "url": "public/datatables/json/" + lang + ".json"
                },
                "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "Todos"]]

            });
        },
        error: function (err) {
            console.log(err);
        },
        beforeSend: function () {
            $('#init-ord').html('cargando');
        }
    });
}
function completedOrders(idWorker, baseUrl) {

    $.ajax({
        type: "GET",
        url: baseUrl + "worker/getOrdersByAjax/" + idWorker + "/completed",
        success: function (data) {
            var dades = JSON.parse(data);
            $('#completed-ord').html('');

            $('#completed-ord').DataTable({
                data: dades,
                columns: [
                    {title: "Id Orden"},
                    {title: "Código de orden"},
                    {title: "Descripción de orden"},
                    {title: "Prioridad"},
                    {title: "Fecha"},
                    {title: "Ejecuciones necesarias"},
                    {title: "Código robot"},
                    {title: "Nombre robot"},
                    {title: "Estado del robot"},
                ],
                "language": {
                    "url": "public/datatables/json/" + lang + ".json"
                },
                "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "Todos"]]

            });
        },
        error: function (err) {
            console.log(err);
        },
        beforeSend: function () {
            $('#completed-ord').html('cargando');
        }
    });
}
function uncompletedOrders(idWorker, baseUrl) {

    $.ajax({
        type: "GET",
        url: baseUrl + "worker/getOrdersByAjax/" + idWorker + "/uncompleted",
        success: function (data) {
            var dades = JSON.parse(data);
            $('#uncompleted-ord').html('');

            $('#uncompleted-ord').DataTable({
                data: dades,
                columns: [
                    {title: "Id Orden"},
                    {title: "Código de orden"},
                    {title: "Descripción de orden"},
                    {title: "Prioridad"},
                    {title: "Fecha"},
                    {title: "Ejecuciones necesarias"},
                    {title: "Código robot"},
                    {title: "Nombre robot"},
                    {title: "Estado del robot"},
                ],
                "language": {
                    "url": "public/datatables/json/" + lang + ".json"
                },
                "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "Todos"]]

            });
        },
        error: function (err) {
            console.log(err);
        },
        beforeSend: function () {
            $('#uncompleted-ord').html('cargando');
        }
    });
}
function cancelledOrders(idWorker, baseUrl) {

    $.ajax({
        type: "GET",
        url: baseUrl + "worker/getOrdersByAjax/" + idWorker + "/cancelled",
        success: function (data) {
            var dades = JSON.parse(data);
            $('#cancelled-ord').html('');

            $('#cancelled-ord').DataTable({
                data: dades,
                columns: [
                    {title: "Id Orden"},
                    {title: "Código de orden"},
                    {title: "Descripción de orden"},
                    {title: "Prioridad"},
                    {title: "Fecha"},
                    {title: "Ejecuciones necesarias"},
                    {title: "Código robot"},
                    {title: "Nombre robot"},
                    {title: "Estado del robot"},
                    {title: "Opciones"}
                ],
                "language": {
                    "url": "public/datatables/json/" + lang + ".json"
                },
                "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "Todos"]]

            });
        },
        error: function (err) {
            console.log(err);
        },
        beforeSend: function () {
            $('#cancelled-ord').html('cargando');
        }
    });
}

function setCompletedTime(idOrder) {
    $('#order-id-comp').html(idOrder);
    $('#completedModal').modal('toggle');
}

function specifyIssue(idOrder) {
    $('#order-id-can').html(idOrder);
    $('#cancelledModal').modal('toggle');
}

function executeOrder(idOrd, status, idWork, baseUrl) {
    $.ajax({
        type: "get",
        url: "http://testservice.xyz/v1/orders/updateExecute/" + idOrd + "/" + status + "/" + idWork,
        crossDomain: true,
        async: false,
        success: function (data) {
            $('#confirmModal>div>div').attr('class', 'alert alert-success');
            $('#confirmModal>div>div').html(data.message);
            $('#pending-ord').DataTable().destroy();
            pendingOrders(idWork, baseUrl);
            $('#init-ord').DataTable().destroy();
            initOrders(idWork, baseUrl);
            setTimeout(function () {
                $('#confirmModal').modal('toggle');
            }, 1000);
        },
        error: function (err) {
            $('#confirmModal>div>div').attr('class', 'alert alert-danger');
            $('#confirmModal>div>div').html(err.message);
            console.log(err);
            setTimeout(function () {
                $('#confirmModal').modal('toggle');
            }, 1000);
        },
        beforeSend: function () {
            $('#confirmModal>div>div').html('cargando...');
            $('#confirmModal').modal('toggle');
        }
    });
}

function completeOrder(idWork, baseUrl) {
    var completedTime = $('#completed-time').val();
    if (completedTime.trim().length == 0) {
        $('#completedModal .modal-body').prepend('<p class="alert alert-danger">Por favor introduzca una hora válida.</p>')
    } else {
        var orderId = $('#order-id-comp').html();
        var statusId = 3;
        var today = new Date();
        var year = today.getFullYear().toString();
        var month = (today.getMonth() + 1).toString();
        if (month.length == 1) {
            month = "0" + month;
        }
        var day = today.getDate().toString();
        var datetimeToSend = year + "-" + month + "-" + day + " " + completedTime;
        $('#completedModal').modal('toggle');
        $.ajax({
            type: "get",
            url: "http://testservice.xyz/v1/orders/completedByTask/" + orderId + "/" + statusId,
            data: {"dataExtra": datetimeToSend},
            crossDomain: true,
            async: false,
            success: function (data) {
                $('#confirmModal>div>div').attr('class', 'alert alert-success');
                $('#confirmModal>div>div').html(data.message);
                $('#init-ord').DataTable().destroy();
                initOrders(idWork, baseUrl);
                $('#completed-ord').DataTable().destroy();
                completedOrders(idWork, baseUrl);
                setTimeout(function () {
                    $('#confirmModal').modal('toggle');
                }, 1000);
            },
            error: function (err) {
                $('#confirmModal>div>div').attr('class', 'alert alert-danger');
                $('#confirmModal>div>div').html(err.message);
                console.log(err);
                setTimeout(function () {
                    $('#confirmModal').modal('toggle');
                }, 1000);
            },
            beforeSend: function () {
                $('#confirmModal>div>div').attr('class', 'alert');
                $('#confirmModal>div>div').html('cargando...');
                $('#confirmModal').modal('toggle');
            }
        });

    }
}

function cancelOrder(idWork, baseUrl) {
    var justification = $('#cancel-justification').val();
    if (justification.trim().length == 0) {
        $('#cancelledModal .modal-body').prepend('<p class="alert alert-danger">Por favor introduzca una justificación válida.</p>')
    } else {
        var orderId = $('#order-id-can').html();
        var statusId = 5;
        $('#cancelledModal').modal('toggle');
        $.ajax({
            type: "get",
            url: "http://testservice.xyz/v1/orders/completedByTask/" + orderId + "/" + statusId,
            data: {"dataExtra": justification},
            async: false,
            crossDomain: true,
            success: function (data) {
                $('#confirmModal>div>div').attr('class', 'alert alert-success');
                $('#confirmModal>div>div').html(data.message);
                $('#init-ord').DataTable().destroy();
                initOrders(idWork, baseUrl);
                $('#cancelled-ord').DataTable().destroy();
                cancelledOrders(idWork, baseUrl);
                setTimeout(function () {
                    $('#confirmModal').modal('toggle');
                }, 1000);
            },
            error: function (err) {
                $('#confirmModal>div>div').attr('class', 'alert alert-danger');
                $('#confirmModal>div>div').html(err.message);
                console.log(err);
                setTimeout(function () {
                    $('#confirmModal').modal('toggle');
                }, 1000);
            },
            beforeSend: function () {
                $('#confirmModal>div>div').attr('class', 'alert');
                $('#confirmModal>div>div').html('cargando...');
                $('#confirmModal').modal('toggle');
            }
        });


    }
}

function setOrderPending(idOrd, status, idWork, baseUrl) {
    $.ajax({
        type: "get",
        url: "http://testservice.xyz/v1/orders/changeOrderStatus/" + idOrd + "/" + status,
        crossDomain: true,
        async: false,
        success: function (data) {
            $('#confirmModal>div>div').attr('class', 'alert alert-success');
            $('#confirmModal>div>div').html(data.message);
            $('#cancelled-ord').DataTable().destroy();
            cancelledOrders(idWork, baseUrl);
            $('#pending-ord').DataTable().destroy();
            pendingOrders(idWork, baseUrl);
            setTimeout(function () {
                $('#confirmModal').modal('toggle');
            }, 1000);
        },
        error: function (err) {
            $('#confirmModal>div>div').attr('class', 'alert alert-danger');
            $('#confirmModal>div>div').html(err.message);
            console.log(err);
            setTimeout(function () {
                $('#confirmModal').modal('toggle');
            }, 1000);
        },
        beforeSend: function () {
            $('#confirmModal>div>div').html('cargando...');
            $('#confirmModal').modal('toggle');
        }
    });
}