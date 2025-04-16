<<<<<<< HEAD
let currentColumn = '';

function openForm(columnId) {
  currentColumn = columnId;
  document.getElementById('taskFormModal').style.display = 'flex';
  document.getElementById('targetColumn').value = columnId;
  document.getElementById('taskFormModal').setAttribute('aria-hidden', 'false');
}

function closeForm() {
  document.getElementById('taskFormModal').style.display = 'none';
  document.getElementById('taskForm').reset();
  document.getElementById('taskFormModal').setAttribute('aria-hidden', 'true');
}

function addTask(e) {
  e.preventDefault();

  const taskName = document.getElementById('taskName').value.trim();
  const priority = document.getElementById('priority').value;
  const columnId = document.getElementById('targetColumn').value;

  if (!taskName) {
    alert('Please enter a task name.');
    return;
  }

  const taskCard = document.createElement('div');
  taskCard.className = 'task-card';
  taskCard.setAttribute('draggable', 'true');
  taskCard.innerHTML = `
  <span>${taskName}</span>
  <span class="priority ${priority}">${priority}</span>
  <button class="delete-task" title="Delete Task">🗑️</button>`;

    taskCard.querySelector('.delete-task').addEventListener('click', () => {
        taskCard.remove();
    });
  

  addDragEvents(taskCard);
  document.getElementById(columnId).appendChild(taskCard);
  closeForm();
}

// Drag-and-drop handlers
function addDragEvents(element) {
  element.addEventListener('dragstart', dragStart);
  element.addEventListener('dragend', dragEnd);
}

function dragStart(e) {
  e.dataTransfer.setData('text/plain', e.target.outerHTML);
  e.dataTransfer.effectAllowed = 'move';
  e.target.classList.add('dragging');
}

function dragEnd(e) {
  e.target.classList.remove('dragging');
}

// Handle drop zones
document.querySelectorAll('.task-list').forEach(list => {
  list.addEventListener('dragover', e => e.preventDefault());

  list.addEventListener('drop', function(e) {
    e.preventDefault();
    const data = e.dataTransfer.getData('text/plain');
    const temp = document.createElement('div');
    temp.innerHTML = data;

    const newTask = temp.firstChild;
    addDragEvents(newTask);

    const oldDragging = document.querySelector('.dragging');
    if (oldDragging) oldDragging.remove();

    this.appendChild(newTask);
  });
});

// Sidebar toggle
document.addEventListener('DOMContentLoaded', () => {
  document.querySelector('.hamburger').addEventListener('click', toggleSidebar);
});

function toggleSidebar() {
  const sidebar = document.querySelector('.sidebar');
  const main = document.querySelector('main');

  sidebar.classList.toggle('hidden');
  main.classList.toggle('full-width');
}

document.addEventListener('DOMContentLoaded', () => {
    const darkToggle = document.getElementById('darkModeToggle');
  
    // Load dark mode preference from localStorage
    if (localStorage.getItem('darkMode') === 'enabled') {
      document.body.classList.add('dark-mode');
    }
  
    darkToggle.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      
      // Save user preference
      if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
      } else {
        localStorage.setItem('darkMode', 'disabled');
      }
    });
  });

  function handleLogout() {
    alert("You have been logged out.");
    // TODO: Replace with actual logout logic like redirect or clearing auth
    // window.location.href = "login.html"; 
  }
  
  
=======
// Daniel Ahmed CSCI 426
const form = document.getElementById('loginForm');

form.addEventListener('submit', function(e) {
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  if (!email || !email.includes('@')) {
    alert("Please enter a valid email address.");
    e.preventDefault();
    return;
  }

  if (!password || password.length < 6) {
    alert("Password must be at least 6 characters long.");
    e.preventDefault();
    return;
  }
});
>>>>>>> 9fe00eef97826a471091ccdaf16b92a8160d028e
