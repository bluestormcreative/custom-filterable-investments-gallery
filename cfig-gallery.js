/**
 * Filterable investment gallery block
 */
const filterContainer = document.querySelector(".filter-items");
const investments = document.querySelectorAll(".investment-card");

// Activate first filter on load.
const firstFilter = filterContainer.querySelector(".filter-item");
firstFilter.classList.add( "active" );
const filterValue = firstFilter.getAttribute("data-filter");

function filterCards(filterValue) {
	// Show or hide investments based on active filter item.
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

// Listen for clicks on the filter bar. 
filterContainer.addEventListener( "click", ( event ) => {		
  // Deactivate existing active 'filter-item'
  filterContainer.querySelector( ".active" ).classList.remove( "active" );

  // Activate new 'filter-item'
  event.target.classList.add( "active" );

  // Get the target filter category.
  const filterValue = event.target.getAttribute( "data-filter" );

  filterCards(filterValue);
});

filterCards(filterValue);