<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Crud Web</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    <link rel="stylesheet" href="/css/fontawesome-free/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
   
    <link rel="stylesheet" href="/css/datatables-bs4/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/datatables-responsive/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/datatables-buttons/buttons.bootstrap4.min.css">
 
    <link rel="stylesheet" href="/css/main/adminlte.min.css">
   
    <link rel="stylesheet" href="/css/custom/app.css">
</head>

<body class="container-fluid" onload="initialyze()">
    <div class="wrapper">
    
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        
                        <div class="card">
                            <div class="card-header">
                                <h2>Menu de tarefas - crie sua tarefa</h2>
                            </div>
                           
                          
                            <div class="card-body">
                                <form id="task-form">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Título da tua tarefa:</strong>
                                                <input type="text" name="title" id="titleInput" class="form-control" placeholder="Jogar bola">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Descrição da tarefa:</strong>
                                                <input type="text" name="description" id="descriptionInput" class="form-control" placeholder="Arena brisa da serra">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button class="btn btn-primary mt-3" onclick="saveTasks()">SALVAR TAREFA</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           
                        <div class="card">
                           
                           <div class="card-header">
                               <h2>Lista de tarefas disponiveis</h2>
                           </div>
                          
                           <div class="card-body">

                                <div class="form-inline">
                                    <input type="hidden" id="task-id">
                                    <label for="task-description" class="col-form-label mr-3">Pesquisar por Descrição:</label>
                                    <input type="text" class="form-control" id="task-description" required>
                                    <button type="button" class="btn btn-primary" onclick="search()">Pesquisa</button>
                                </div>

                               <table id="tasks-table" class="table table-bordered table-striped table-sm">
                                   <thead>
                                       <tr>   
                                           <th>ID Tarefa</th>
                                           <th>Título Tarefa</th>
                                           <th>Descrição Tarefa</th>
                                           <th>Ações da tarefa</th>
                                       </tr>
                                   </thead>
                                   <tbody>

                                   </tbody>
                               
                               </table>
                           </div>
                         
                       </div>

                        </div>
                     
                        <div class="modal fade" id="editionModal" tabindex="-1" role="dialog" aria-labelledby="editionModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editionModalLabel">Edite sua tarefa</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="hidden" id="task-id">
                                                <label for="task-title" class="col-form-label">Título da tarefa:</label>
                                                <input type="text" class="form-control" id="task-title" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" id="task-id">
                                                <label for="task-description" class="col-form-label">Descrição da tarefa:</label>
                                                <input type="text" class="form-control" id="task-description" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary" onclick="edit()">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
            </div>
            
        </section>
       
    </div>
   

   
    <aside class="control-sidebar control-sidebar-dark">
      
    </aside>
    
    </div>
   
    <div class="social-footer">
        <a href="https://www.github.com/tiagoeuzebiocordeiro">Github</a>
        <br>
        <a href="https://github.com/tiagoeuzebiocordeiro/crud-spring">Exemplo de CRUD com Spring Boot</a>
    </div>
   
    <script src="/js/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
    <script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
  
    <script src="/js/datatables/jquery.dataTables.min.js"></script>
    <script src="/js/datatables-bs4/dataTables.bootstrap4.min.js"></script>
    <script src="/js/datatables-responsive/dataTables.responsive.min.js"></script>
    <script src="/js/datatables-responsive/responsive.bootstrap4.min.js"></script>
    <script src="/js/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="/js/datatables-buttons/buttons.bootstrap4.min.js"></script>
    <script src="/js/datatables-buttons/buttons.html5.min.js"></script>
    <script src="/js/datatables-buttons/buttons.print.min.js"></script>
    <script src="/js/datatables-buttons/buttons.colVis.min.js"></script>
    <script src="/js/jszip/jszip.min.js"></script>
    <script src="/js/pdfmake/pdfmake.min.js"></script>
    <script src="/js/pdfmake/vfs_fonts.js"></script>
   
    <script src="/js/main/adminlte.min.js"></script>
   
    <script>
        $(function() {
            $("#tasks-table").DataTable({
                "searching": false,
                "paging": false,
                "info": false,
                "ordering": false,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                lengthMenu: [5, 10],
                "language": {

                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ à _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Mostrando _MENU_ resultados por página",
                    "sLoadingRecords": "Carregando",
                    "sProcessing": "Processando",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Procure sua tarefa",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }

                }

            }).buttons().container().appendTo('#tasks-table_wrapper .col-md-6:eq(0)');

        });
    </script>

    <script type="text/javascript">
        function initialyze() {
            getTasks();
        }

        function getTasks() {
            $.ajax({
                type: "GET",
                url: "/todolist",
                success: function(data) {
                    console.log(data);
                    var table = document.getElementsByTagName('tbody')[0];
                    if (data.length > 0) {
                        table.innerHTML = "";
                        for (var i = 0; i < data.length; i++) {
                            try {
                                const row = table.insertRow(i);
                                const cell1 = row.insertCell(0);
                                const cell2 = row.insertCell(1);
                                const cell3 = row.insertCell(2);
                                const cell4 = row.insertCell(3);
                                cell1.innerHTML = data[i].id;
                                cell2.innerHTML = data[i].title;
                                cell3.innerHTML = data[i].description;
                                cell4.innerHTML = `<button class="btn btn-primary" onclick="openEditModal(${data[i].id},'${data[i].title}','${data[i].description}')">Editar</button>
                                                   <button class="btn btn-danger" onclick="deleteTask(${data[i].id});">Excluir</button>`;
                            } catch (error) {
                                console.log(error);
                            }
                        }
                    }
                },
                error: function(error) {
                    alert(`Error ${error}`);
                }
            })
        }

        function saveTasks() {
            const title = document.getElementById('titleInput').value;
            const description = document.getElementById('descriptionInput').value;

            if (title != '' && description != '') {

                $.ajax({
                    type: "POST",
                    url: "/todolist",
                    data: {
                        title: title,
                        description: description,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                        getTasks();
                    },
                    error: function(error) {
                        alert(`Error ${error}`);
                    }
                })

                document.getElementById('titleInput').value = "";
                document.getElementById('descriptionInput').value = "";

            } else {

                alert('Preecha os campos de Título e Descrição da tarefa.');

                $("#task-form").submit(function(e) {
                    e.preventDefault();
                });

            }

        }

        function deleteTask(id) {
            $.ajax({
                type: "DELETE",
                url: `/todolist/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                    alert(`Error ${error}`);
                }
            })
        }

        function openEditModal(id, title, description, deadline) {
            $('#editionModal').modal('show');
            $('#task-id').val(id);
            $('#task-title').val(title);
            $('#task-description').val(description);
        }

        function edit() {
            var id = $('#task-id').val();
            var title = $('#task-title').val();
            var description = $('#task-description').val();
            $.ajax({
                type: "PUT",
                url: `/todolist/${id}`,
                data: {
                    title: title,
                    description: description,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    getTasks();
                    $('#close-modal').click();
                },
                error: function(error) {
                    alert(`Error ${error}`);
                }
            })
        }
    </script>
</body>

</html>