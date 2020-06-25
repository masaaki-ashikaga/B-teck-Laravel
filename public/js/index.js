//Radioボタン
const all =document.getElementById('all');
const working = document.getElementById('working');
const completed = document.getElementById('completed');

//Task Element
const tasks = document.querySelectorAll('.tasks');
const completedTasks = document.querySelectorAll('.completedTask');
const workingTasks = document.querySelectorAll('.workingTask');

//Method
document.getElementById('task-form').addEventListener('click',() => {
    if(all.checked){
        tasks.forEach(task => task.style.display = 'table-row');
    } else if(completed.checked){
        completedTasks.forEach(task => task.closest('.tasks').style.display = 'table-row');
        workingTasks.forEach(task => task.closest('.tasks').style.display = 'none');
    } else if(working.checked){
        completedTasks.forEach(task => task.closest('.tasks').style.display = 'none');
        workingTasks.forEach(task => task.closest('.tasks').style.display = 'table-row');
    }
});