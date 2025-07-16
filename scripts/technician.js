function updateSummary() {
  const statuses = ['Assigned', 'In Progress', 'Completed'];
  statuses.forEach(status => {
    const count = document.querySelectorAll(`.task-card[data-status="${status}"]`).length;
    document.getElementById(`${status.toLowerCase().replace(' ', '')}-count`).textContent = `${status}: ${count}`;
  });
}

function startTask(btn) {
  const card = btn.closest('.task-card');
  card.dataset.status = 'In Progress';
  const badge = card.querySelector('.badge');
  badge.className = 'badge in-progress';
  badge.textContent = 'In Progress';
  updateSummary();
}

function completeTask(btn) {
  const card = btn.closest('.task-card');
  card.dataset.status = 'Completed';
  const badge = card.querySelector('.badge');
  badge.className = 'badge completed';
  badge.textContent = 'Completed';
  updateSummary();
}

document.getElementById('searchInput').addEventListener('input', function () {
  const filter = this.value.toLowerCase();
  const cards = document.querySelectorAll('.task-card');
  cards.forEach(card => {
    const status = card.dataset.status.toLowerCase();
    card.style.display = status.includes(filter) ? 'block' : 'none';
  });
});

window.onload = updateSummary;
