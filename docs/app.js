const activities = [
  { name: 'Natation', category: 'sport', icon: '🏊', description: 'Améliorez votre endurance dans une ambiance conviviale.', manager: 'Michel Provencher', places: 7, capacity: 20 },
  { name: 'Badminton', category: 'sport', icon: '🏸', description: 'Un sport accessible pour bouger et rencontrer d’autres étudiants.', manager: 'Daniel Lefebvre', places: 15, capacity: 24 },
  { name: 'Randonnée', category: 'plein-air', icon: '🥾', description: 'Prenez l’air et découvrez les sentiers autour de Trois-Rivières.', manager: 'Catherine Pelletier', places: 10, capacity: 18 },
  { name: 'Kayak', category: 'plein-air', icon: '🛶', description: 'Une activité en plein air pour sortir du quotidien.', manager: 'Josée Côté', places: 14, capacity: 20 },
  { name: 'Vélo', category: 'sport', icon: '🚲', description: 'Explorez la ville et ses environs au rythme du groupe.', manager: 'Jean-Yves Surroy', places: 22, capacity: 30 },
  { name: 'Échecs', category: 'réflexion', icon: '♟', description: 'Développez votre stratégie autour d’une partie amicale.', manager: 'Émilie Simard', places: 11, capacity: 16 }
];

const grid = document.querySelector('#activity-grid');
const search = document.querySelector('#activity-search');
const filter = document.querySelector('#activity-filter');
const empty = document.querySelector('#empty-state');
const dialog = document.querySelector('#registration-dialog');
const dialogTitle = document.querySelector('#dialog-title');
const form = document.querySelector('#registration-form');
const success = document.querySelector('#form-success');

function renderActivities() {
  const term = search.value.trim().toLowerCase();
  const selected = filter.value;
  const visible = activities.filter(activity => {
    const matchesTerm = `${activity.name} ${activity.description} ${activity.manager}`.toLowerCase().includes(term);
    return matchesTerm && (selected === 'all' || activity.category === selected);
  });
  grid.innerHTML = visible.map(activity => `
    <article class="activity-card">
      <div class="activity-icon" aria-hidden="true">${activity.icon}</div>
      <h3>${activity.name}</h3>
      <p>${activity.description}</p>
      <div class="activity-meta"><span>Responsable<br><b>${activity.manager}</b></span><span>Inscrits<br><b>${activity.places}/${activity.capacity}</b></span></div>
      <button class="card-button" type="button" data-activity="${activity.name}">S’inscrire à cette activité →</button>
    </article>`).join('');
  empty.hidden = visible.length > 0;
  grid.querySelectorAll('[data-activity]').forEach(button => button.addEventListener('click', () => openRegistration(button.dataset.activity)));
}

function openRegistration(activity) {
  dialogTitle.textContent = `Rejoindre ${activity}`;
  form.hidden = false;
  success.hidden = true;
  form.reset();
  dialog.showModal();
}

search.addEventListener('input', renderActivities);
filter.addEventListener('change', renderActivities);
document.querySelector('#dialog-close').addEventListener('click', () => dialog.close());
dialog.addEventListener('click', event => { if (event.target === dialog) dialog.close(); });
form.addEventListener('submit', event => { event.preventDefault(); form.hidden = true; success.hidden = false; });

const themeToggle = document.querySelector('#theme-toggle');
const savedTheme = localStorage.getItem('loisir-theme');
if (savedTheme === 'dark') document.body.classList.add('dark');
function updateThemeLabel() {
  const dark = document.body.classList.contains('dark');
  themeToggle.innerHTML = dark ? '☀ <span>Clair</span>' : '☾ <span>Sombre</span>';
  themeToggle.setAttribute('aria-label', dark ? 'Activer le thème clair' : 'Activer le thème sombre');
}
themeToggle.addEventListener('click', () => { document.body.classList.toggle('dark'); localStorage.setItem('loisir-theme', document.body.classList.contains('dark') ? 'dark' : 'light'); updateThemeLabel(); });
updateThemeLabel();
renderActivities();
