/**
 * Filterable investment gallery block
 *
 * @package cfig
 */
const filterList = document.querySelector(".filter-items-list")
const filterSelect = document.querySelector(".filter-items-select select");
const investments = document.querySelectorAll(".investment-card");
let activeFilter; // Really simple state managment.

/**
 * Show or hide investments based on active filter item
 *
 * @param {string} filterValue Active filter value.
 */
function filterCards(filterValue) {
	[...investments].forEach((card) => {
		if (filterValue === "") {
			card.classList.remove("hidden");
		} else {
			const cats = card.dataset.investmentCategories;
			if (cats.includes(filterValue)) {
				card.classList.remove("hidden");
			} else {
				card.classList.add("hidden");
			}
		}
	});
}

/**
 * Set active filter in list or select option.
 *
 * @param {string} targetFilterValue Filter value to set as active.
 */
function setActiveFilter(targetFilterValue) {
  const width = Math.max(document.clientWidth || 0, window.innerWidth || 0);
  if (width > 1040) {
    // Deactivate existing active filter-item
    filterList.querySelector(".active").classList.remove("active");
    // Set new active filter-item
    const newActive = filterList.querySelector(`[data-filter="${targetFilterValue}"`);
    newActive.classList.add("active");
  } else {
    filterSelect.value = targetFilterValue;
  }
}

/**
 * Listen for clicks on the large view filter bar.
 *
 */
filterList.addEventListener( "click", ( event ) => {
  // Get the target filter category.
  const filterValue = event.target.getAttribute( "data-filter" );
  activeFilter = filterValue;
  setActiveFilter(activeFilter);
  filterCards(activeFilter);
});

/**
 * Listen for change on the small view filter select.
 *
 */ 
filterSelect.addEventListener( "change", ( event ) => {	
  // Get the target filter category.
  const filterValue = event.target.value;
  activeFilter = filterValue;
	setActiveFilter(activeFilter);
	filterCards(activeFilter);
});

/**
 * Activate first filter on load.
 *
 */ 
window.onload = () => {
  const width = Math.max(document.clientWidth || 0, window.innerWidth || 0);
  if (width > 1040) {
    const firstFilter = filterList.querySelector(".filter-item");
    firstFilter.classList.add("active");
    activeFilter = firstFilter.getAttribute("data-filter");
  } else {
    const firstFilter = filterSelect.querySelector("option");
    filterSelect.value = firstFilter.value;
    activeFilter = firstFilter.value;
  }
  filterCards(activeFilter);
}

/**
 * Persist active filter on window resize.
 *
 */ 
window.onresize = () => {
  setActiveFilter(activeFilter);
}