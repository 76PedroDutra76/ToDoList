<main>
    <section>
        <div class="container pt-4">
            <div class="row gap-5 d-flex justify-content-between scrollX flex-nowrap">

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-style text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-normal" id="exampleModalLabel">Adicionar Task</h1>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action='<?= BASE_URL . "Tasks/addTask/" ?>' method="POST" class="p-4" autocomplete="off">
                                    <input type="hidden" name="priority" id="priorityModal">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label text-normal">Título da Task:</label>
                                        <input type="text" class="form-control text-normal text-dark" name="titulo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label text-normal">Texto da Task:</label>
                                        <textarea class="form-control text-normal text-dark" name="text"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btns text-normal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="areas-header">
                        <div class="div-title div-title4 mb-2">
                            <h3 class=" text-normal">Urgente</h3>
                        </div>

                        <div class="rounded-2 mb-2 add-card">
                            <button type="button" class="rounded-2 btns btns-add-card" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="setPriorityValue(4)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-plus-lg text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                        </div>

                        <div class="areas area1" onmouseover="scrollVisible('area1')" onmouseout="scrollInvisible('area1')">
                            <?php foreach ($tasks_urgent as $task) : ?>
                                <div class="card mb-2 mt-2 item" draggable="true" style="max-width: 18rem;" id="<?= $task['idTask'] ?>">
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $task['idTask'] ?>">
                                        <h3 class="card-title text-normal" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $task['tituloTask'] ?></h3>
                                        <p class="card-text text-center text-normal"><?= mb_strimwidth($task['textTask'], 0, 25, "...") ?></p>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $task['idTask'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-style text-white">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-center text-break text-normal" id="exampleModalLabel"><?= $task['tituloTask'] ?></h1>
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="card-text text-center text-break text-normal"><?= $task['textTask'] ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-flex justify-content-center align-items-center gap-3">
                                                    <div class="dropdown rounded-2 mb-3">

                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu drop-style text-normal">
                                                            <form action="<?= BASE_URL . "Tasks/editTaskPriority/" . $task['idTask'] ?>" method="POST">
                                                                <p class="text-normal text-center">Mudar Prioridade da Task</p>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="4" id="firstRadio" <?= $task['priority'] == 4 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="firstRadio">Urgente</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="3" id="secondRadio" <?= $task['priority'] == 3 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="secondRadio">Muito Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="2" id="thirdRadio" <?= $task['priority'] == 2 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="thirdRadio">Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="1" id="fourthRadio" <?= $task['priority'] == 1 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="fourthRadio">Padrão</label>
                                                                    </li>
                                                                    <li><Button type="submit" class="btn btn-success">Confirmar</Button></li>
                                                                </ul>
                                                            </form>
                                                        </ul>

                                                        <button type="button" class="btn text-white" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                        <form action='<?= BASE_URL . "Tasks/editTask/" . $task['idTask'] ?>' method="POST" class="dropdown-menu p-4" autocomplete="off">
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Título</label>
                                                                <input type="text" class="form-control" placeholder="Título" name="titulo" value="<?= $task['tituloTask'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Task</label>
                                                                <textarea type="text" class="form-control text-break" placeholder="Task" name="text"><?= $task['textTask'] ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                                        </form>
                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu text-normal">
                                                            <p class="text-normal text-center">Tem certeza que deseja apagar essa task?</p>
                                                            <li><button class="dropdown-item btn btn-success text-normal" type="button">Cancelar</button></li>
                                                            <li class="flex"><a class="dropdown-item btn btn-danger text-normal" href="<?= BASE_URL . "Tasks/delTask?delete=" . $task['idTask']; ?>">Apagar</a></li>
                                                        </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="col text-center">
                    <div class="areas-header">
                        <div class="div-title div-title3 mb-2">
                            <h3 class=" text-normal">Muito Importante</h3>
                        </div>

                        <div class="rounded-2 mb-2 add-card">
                            <button type="button" class="rounded-2 btns btns-add-card" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="setPriorityValue(3)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-plus-lg text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                        </div>

                        <div class="areas area2" onmouseover="scrollVisible('area2')" onmouseout="scrollInvisible('area2')">
                            <?php foreach ($tasks_very_important as $task) : ?>
                                <div class="card mb-2 mt-2 item" draggable="true" style="max-width: 18rem;" id="<?= $task['idTask'] ?>">
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $task['idTask'] ?>">
                                        <h3 class="card-title text-normal" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $task['tituloTask'] ?></h3>
                                        <p class="card-text text-center text-normal"><?= mb_strimwidth($task['textTask'], 0, 25, "...") ?></p>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $task['idTask'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-style text-white">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-center text-break text-normal" id="exampleModalLabel"><?= $task['tituloTask'] ?></h1>
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="card-text text-center text-break text-normal"><?= $task['textTask'] ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-flex justify-content-center align-items-center gap-3">
                                                    <div class="dropdown rounded-2 mb-3">

                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu drop-style text-normal">
                                                            <form action="<?= BASE_URL . "Tasks/editTaskPriority/" . $task['idTask'] ?>" method="POST">
                                                                <p class="text-normal text-center">Mudar Prioridade da Task</p>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="4" id="firstRadio" <?= $task['priority'] == 4 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="firstRadio">Urgente</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="3" id="secondRadio" <?= $task['priority'] == 3 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="secondRadio">Muito Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="2" id="thirdRadio" <?= $task['priority'] == 2 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="thirdRadio">Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="1" id="fourthRadio" <?= $task['priority'] == 1 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="fourthRadio">Padrão</label>
                                                                    </li>
                                                                    <li><Button type="submit" class="btn btn-success">Confirmar</Button></li>
                                                                </ul>
                                                            </form>
                                                        </ul>

                                                        <button type="button" class="btn text-white" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                        <form action='<?= BASE_URL . "Tasks/editTask/" . $task['idTask'] ?>' method="POST" class="dropdown-menu p-4" autocomplete="off">
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Título</label>
                                                                <input type="text" class="form-control" placeholder="Título" name="titulo" value="<?= $task['tituloTask'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Task</label>
                                                                <textarea type="text" class="form-control text-break" placeholder="Task" name="text"><?= $task['textTask'] ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                                        </form>
                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu text-normal">
                                                            <p class="text-normal text-center">Tem certeza que deseja apagar essa task?</p>
                                                            <li><button class="dropdown-item btn btn-success text-normal" type="button">Cancelar</button></li>
                                                            <li class="flex"><a class="dropdown-item btn btn-danger text-normal" href="<?= BASE_URL . "Tasks/delTask?delete=" . $task['idTask']; ?>">Apagar</a></li>
                                                        </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="areas-header">
                        <div class="div-title div-title2 mb-2">
                            <h3 class=" text-normal">Importante</h3>
                        </div>

                        <div class="rounded-2 mb-2 add-card">
                            <button type="button" class="rounded-2 btns btns-add-card" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="setPriorityValue(2)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-plus-lg text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                        </div>

                        <div class="areas area3" onmouseover="scrollVisible('area3')" onmouseout="scrollInvisible('area3')">
                            <?php foreach ($tasks_important as $task) : ?>
                                <div class="card mb-2 mt-2 item" draggable="true" style="max-width: 18rem;" id="<?= $task['idTask'] ?>">
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $task['idTask'] ?>">
                                        <h3 class="card-title text-normal" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $task['tituloTask'] ?></h3>
                                        <p class="card-text text-center text-normal"><?= mb_strimwidth($task['textTask'], 0, 25, "...") ?></p>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $task['idTask'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-style text-white">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-center text-break text-normal" id="exampleModalLabel"><?= $task['tituloTask'] ?></h1>
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="card-text text-center text-break text-normal"><?= $task['textTask'] ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-flex justify-content-center align-items-center gap-3">
                                                    <div class="dropdown rounded-2 mb-3">

                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu drop-style text-normal">
                                                            <form action="<?= BASE_URL . "Tasks/editTaskPriority/" . $task['idTask'] ?>" method="POST">
                                                                <p class="text-normal text-center">Mudar Prioridade da Task</p>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="4" id="firstRadio" <?= $task['priority'] == 4 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="firstRadio">Urgente</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="3" id="secondRadio" <?= $task['priority'] == 3 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="secondRadio">Muito Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="2" id="thirdRadio" <?= $task['priority'] == 2 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="thirdRadio">Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="1" id="fourthRadio" <?= $task['priority'] == 1 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="fourthRadio">Padrão</label>
                                                                    </li>
                                                                    <li><Button type="submit" class="btn btn-success">Confirmar</Button></li>
                                                                </ul>
                                                            </form>
                                                        </ul>

                                                        <button type="button" class="btn text-white" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                        <form action='<?= BASE_URL . "Tasks/editTask/" . $task['idTask'] ?>' method="POST" class="dropdown-menu p-4" autocomplete="off">
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Título</label>
                                                                <input type="text" class="form-control" placeholder="Título" name="titulo" value="<?= $task['tituloTask'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Task</label>
                                                                <textarea type="text" class="form-control text-break" placeholder="Task" name="text"><?= $task['textTask'] ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                                        </form>
                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu text-normal">
                                                            <p class="text-normal text-center">Tem certeza que deseja apagar essa task?</p>
                                                            <li><button class="dropdown-item btn btn-success text-normal" type="button">Cancelar</button></li>
                                                            <li class="flex"><a class="dropdown-item btn btn-danger text-normal" href="<?= BASE_URL . "Tasks/delTask?delete=" . $task['idTask']; ?>">Apagar</a></li>
                                                        </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="areas-header">
                        <div class="div-title div-title1 mb-2">
                            <h3 class=" text-normal">Padrão</h3>
                        </div>

                        <div class="rounded-2 mb-2 add-card">
                            <button type="button" class="rounded-2 btns btns-add-card" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="setPriorityValue(1)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-plus-lg text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                        </div>

                        <div class="areas area4" onmouseover="scrollVisible('area4')" onmouseout="scrollInvisible('area4')">
                            <?php foreach ($tasks_default as $task) : ?>
                                <div class="card mb-2 mt-2 item" draggable="true" style="max-width: 18rem;" id="<?= $task['idTask'] ?>">
                                    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal<?= $task['idTask'] ?>">
                                        <h3 class="card-title text-normal" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $task['tituloTask'] ?></h3>
                                        <p class="card-text text-center text-normal"><?= mb_strimwidth($task['textTask'], 0, 25, "...") ?></p>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $task['idTask'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-style text-white">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-center text-break text-normal" id="exampleModalLabel"><?= $task['tituloTask'] ?></h1>
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="card-text text-center text-break text-normal"><?= $task['textTask'] ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-flex justify-content-center align-items-center gap-3">
                                                    <div class="dropdown rounded-2 mb-3">

                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu drop-style text-normal">
                                                            <form action="<?= BASE_URL . "Tasks/editTaskPriority/" . $task['idTask'] ?>" method="POST">
                                                                <p class="text-normal text-center">Mudar Prioridade da Task</p>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="4" id="firstRadio" <?= $task['priority'] == 4 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="firstRadio">Urgente</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="3" id="secondRadio" <?= $task['priority'] == 3 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="secondRadio">Muito Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="2" id="thirdRadio" <?= $task['priority'] == 2 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="thirdRadio">Importante</label>
                                                                    </li>
                                                                    <li class="list-group-item text-normal bg-transparent border-0">
                                                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="1" id="fourthRadio" <?= $task['priority'] == 1 ? 'checked': '' ?>>
                                                                        <label class="form-check-label" for="fourthRadio">Padrão</label>
                                                                    </li>
                                                                    <li><Button type="submit" class="btn btn-success">Confirmar</Button></li>
                                                                </ul>
                                                            </form>
                                                        </ul>

                                                        <button type="button" class="btn text-white" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                        <form action='<?= BASE_URL . "Tasks/editTask/" . $task['idTask'] ?>' method="POST" class="dropdown-menu p-4" autocomplete="off">
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Título</label>
                                                                <input type="text" class="form-control" placeholder="Título" name="titulo" value="<?= $task['tituloTask'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label text-normal">Task</label>
                                                                <textarea type="text" class="form-control text-break" placeholder="Task" name="text"><?= $task['textTask'] ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                                        </form>
                                                        <button class="btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu text-normal">
                                                            <p class="text-normal text-center">Tem certeza que deseja apagar essa task?</p>
                                                            <li><button class="dropdown-item btn btn-success text-normal" type="button">Cancelar</button></li>
                                                            <li class="flex"><a class="dropdown-item btn btn-danger text-normal" href="<?= BASE_URL . "Tasks/delTask?delete=" . $task['idTask']; ?>">Apagar</a></li>
                                                        </ul>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>