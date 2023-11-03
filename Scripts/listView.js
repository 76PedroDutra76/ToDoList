
document.querySelectorAll('.item').forEach(item => {
    item.addEventListener('dragstart', dragStart);
    item.addEventListener('dragend', dragEnd);
});

document.querySelector('.area1').addEventListener('dragover', dragOverArea1);
document.querySelector('.area1').addEventListener('dragleave', dragOutArea1);
document.querySelector('.area1').addEventListener('drop', dropArea1);

document.querySelector('.area2').addEventListener('dragover', dragOverArea2);
document.querySelector('.area2').addEventListener('dragleave', dragOutArea2);
document.querySelector('.area2').addEventListener('drop', dropArea2);

document.querySelector('.area3').addEventListener('dragover', dragOverArea3);
document.querySelector('.area3').addEventListener('dragleave', dragOutArea3);
document.querySelector('.area3').addEventListener('drop', dropArea3);

document.querySelector('.area4').addEventListener('dragover', dragOverArea4);
document.querySelector('.area4').addEventListener('dragleave', dragOutArea4);
document.querySelector('.area4').addEventListener('drop', dropArea4);




//functions dos itens
function dragStart(e) {
    e.currentTarget.classList.add('dragging');
}

function dragEnd(e) {
    e.currentTarget.classList.remove('dragging');
}

//functions das áreas

//area1
function dragOverArea1(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-hover1');

}
function dragOutArea1(e) {
    e.currentTarget.classList.remove('drag-hover1');
}
function dropArea1(e) {
    e.currentTarget.classList.remove('drag-hover1');
    let dragItem = document.querySelector('.item.dragging');
    e.currentTarget.appendChild(dragItem);

    console.log(dragItem);

    let id = $(dragItem).attr('id')

    areaUpdateTask(id, 4);
}

//area2
function dragOverArea2(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-hover2');

}
function dragOutArea2(e) {
    e.currentTarget.classList.remove('drag-hover2');
}
function dropArea2(e) {
    e.currentTarget.classList.remove('drag-hover2');
    let dragItem = document.querySelector('.item.dragging');
    e.currentTarget.appendChild(dragItem);

    console.log(dragItem);

    let id = $(dragItem).attr('id')

    areaUpdateTask(id, 3);
}

//area3
function dragOverArea3(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-hover3');

}
function dragOutArea3(e) {
    e.currentTarget.classList.remove('drag-hover3');
}
function dropArea3(e) {
    e.currentTarget.classList.remove('drag-hover3');
    let dragItem = document.querySelector('.item.dragging');
    e.currentTarget.appendChild(dragItem);

    console.log(dragItem);
    
    let id = $(dragItem).attr('id')

    areaUpdateTask(id, 2);
}

//area4
function dragOverArea4(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-hover4');

}
function dragOutArea4(e) {
    e.currentTarget.classList.remove('drag-hover4');
}
function dropArea4(e) {
    e.currentTarget.classList.remove('drag-hover4');
    let dragItem = document.querySelector('.item.dragging');
    e.currentTarget.appendChild(dragItem);

    console.log(dragItem);

    let id = $(dragItem).attr('id')

    areaUpdateTask(id, 1);

}

console.log(BASE_URL);

function areaUpdateTask(id, newPriority){
    $.ajax({
        url: `${BASE_URL}Tasks/updatePriorityAjax/`,
        type: 'GET',
        data: `id=${id}&priority=${newPriority}`,
        // data: {id:id, priority:newPriority},
        contentType: false,
        processData: false,
        success: function(json){
            // teste = JSON.parse(json);
            console.log(json);
        },
        error: function(error) {
            console.log(error);
        }
    })
}

function setPriorityValue(priority){
    console.log(priority);
    $('#priorityModal').val('').val(priority);
}

function scrollVisible(classe){
    $(`.${classe}`).css({'overflow': 'auto'})
}
function scrollInvisible(classe){
    $(`.${classe}`).css('overflow','hidden')
}