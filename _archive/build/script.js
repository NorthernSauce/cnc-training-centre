const searchInput = document.querySelector("#hub-search");
const filterButtons = Array.from(document.querySelectorAll(".filter"));
const cards = Array.from(document.querySelectorAll(".resource"));
const emptyState = document.querySelector("#empty-state");
const header = document.querySelector(".site-header");
const menuToggle = document.querySelector(".menu-toggle");

let activeFilter = "all";

function updateResources() {
  const query = searchInput.value.trim().toLowerCase();
  let visibleCount = 0;

  cards.forEach(function (card) {
    const tags = card.dataset.tags.split(" ");
    const text = (card.textContent + " " + tags.join(" ")).toLowerCase();
    const matchesFilter = activeFilter === "all" || tags.includes(activeFilter);
    const matchesQuery = query.length === 0 || text.includes(query);
    const show = matchesFilter && matchesQuery;

    card.classList.toggle("hidden", !show);
    if (show) visibleCount += 1;
  });

  emptyState.hidden = visibleCount > 0;
}

filterButtons.forEach(function (btn) {
  btn.addEventListener("click", function () {
    filterButtons.forEach(function (b) { b.classList.remove("active"); });
    btn.classList.add("active");
    activeFilter = btn.dataset.filter;
    updateResources();
  });
});

searchInput.addEventListener("input", updateResources);

if (menuToggle && header) {
  menuToggle.addEventListener("click", function () {
    var open = header.classList.toggle("nav-open");
    menuToggle.setAttribute("aria-expanded", String(open));
  });
}

// Mega menu: full-width stage with click + hover triggers
const megaItems = Array.from(document.querySelectorAll(".nav-item.has-mega"));
const megaStage = document.querySelector(".mega-stage");
const megaPanels = Array.from(document.querySelectorAll(".mega-panel"));
let megaCloseTimer = null;

function closeAllMegas() {
  megaItems.forEach(function (item) {
    item.classList.remove("open");
    const trigger = item.querySelector(".nav-trigger");
    if (trigger) trigger.setAttribute("aria-expanded", "false");
  });
  megaPanels.forEach(function (p) {
    p.classList.remove("is-active");
    p.setAttribute("aria-hidden", "true");
  });
  if (megaStage) megaStage.classList.remove("is-open");
}

function openMega(item) {
  const target = item.dataset.megaTrigger;
  if (!target) return;
  megaItems.forEach(function (i) {
    i.classList.remove("open");
    const t = i.querySelector(".nav-trigger");
    if (t) t.setAttribute("aria-expanded", "false");
  });
  megaPanels.forEach(function (p) {
    const match = p.dataset.megaPanel === target;
    p.classList.toggle("is-active", match);
    p.setAttribute("aria-hidden", match ? "false" : "true");
  });
  item.classList.add("open");
  const trigger = item.querySelector(".nav-trigger");
  if (trigger) trigger.setAttribute("aria-expanded", "true");
  if (megaStage) megaStage.classList.add("is-open");
}

megaItems.forEach(function (item) {
  const trigger = item.querySelector(".nav-trigger");
  if (!trigger) return;

  trigger.addEventListener("click", function (e) {
    e.stopPropagation();
    const isOpen = item.classList.contains("open");
    if (isOpen) closeAllMegas();
    else openMega(item);
  });

  item.addEventListener("mouseenter", function () {
    clearTimeout(megaCloseTimer);
    if (window.matchMedia("(hover: hover)").matches && window.innerWidth > 900) {
      openMega(item);
    }
  });

  item.addEventListener("mouseleave", function () {
    clearTimeout(megaCloseTimer);
    megaCloseTimer = setTimeout(closeAllMegas, 220);
  });
});

if (megaStage) {
  megaStage.addEventListener("mouseenter", function () { clearTimeout(megaCloseTimer); });
  megaStage.addEventListener("mouseleave", function () {
    clearTimeout(megaCloseTimer);
    megaCloseTimer = setTimeout(closeAllMegas, 220);
  });
}

document.addEventListener("click", function (e) {
  if (!e.target.closest(".nav-item.has-mega") && !e.target.closest(".mega-stage")) {
    closeAllMegas();
  }
});

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    closeAllMegas();
    if (header) {
      header.classList.remove("nav-open");
      if (menuToggle) menuToggle.setAttribute("aria-expanded", "false");
    }
  }
});
