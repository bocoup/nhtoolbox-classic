document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  
    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {
  
        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);
  
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
  
      });
    });

    const url = window.location.href;
    let filterButtons = document.getElementsByClassName("filter-button");
    for (filterButton of filterButtons){
      filterButton.onclick = function(e) {
        const queryValue = e.target.id.split(" Button")[0];
        if(queryValue === "all") {
          location.href = "/";
        }
        else {
          if(e.target.classList.contains("is-active")){
            if(url.includes(","+queryValue)){
              location.href = location.href.replace(","+queryValue, "");
            }
            else if(url.includes(queryValue+",")){
              location.href = location.href.replace(queryValue+",", "");
            }
            else{
              location.href = location.href.replace(queryValue, "");
            }
          }
          else {
            if(url.endsWith("=")){
              location.href+=queryValue;
            }
            else if(url.indexOf("issues-addressed") > -1) {
              location.href += "," + queryValue;
            }
            else{
              location.href += "?issues-addressed=" + queryValue;
            }
          }
        }
      }
    }

    if(url.indexOf("issues-addressed") > -1 && !url.endsWith("issues-addressed=")) {
      let filters = url.split("issues-addressed=")[1].split(",");
      for (filterButton of filterButtons){
        const filterButtonValue = filterButton.id.split(" Button")[0];
        if(filters.includes(filterButtonValue)){
          filterButton.classList.add("is-active");
          filterButton.ariaLabel = "turn " + filterButtonValue + " filter off";
        }
        else {
          if(filterButtonValue == "all"){
            filterButton.classList.remove("is-active");
            filterButton.ariaLabel = "clear all filters.";
          }
          else {
            filterButton.classList.remove("is-active");
            filterButton.ariaLabel = "turn " + filterButtonValue + " filter on";
          }
        }
      }
    }
    else {
      let allButton = document.getElementById("all Button");
      allButton.ariaLabel = "clear filters button. all filters are currently cleared.";
      allButton.classList.add("is-active");
    }
  
});