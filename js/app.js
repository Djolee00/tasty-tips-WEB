/**
 * 
 * @param {*} selector - css class
 * @returns first element which has that css class (specified in selector)
 */
const getElement = (selector) => {

  const element = document.querySelector(selector);
  if(element) return element;
  throw Error(`Please double check your class names, there is no
               ${selector} class`);

}



const links = getElement('.nav-links');
const navBtnDOM = getElement('.nav-btn');

/**
 * fucntion to add class on nav-links when menu bar button is clicked
 * (this is used when site is not in full screen)
 */
navBtnDOM.addEventListener('click',() => {
  links.classList.toggle('show-links');
});


/**
 * setting current year, I don't want to be hardcoded in HTML page
 */
const date = getElement('#date');
const currentYear = new Date().getFullYear();
date.textContent = currentYear;



function setOverlay(active) {
  const overlay = document.querySelector('#background-overlay');
  if (active) {
      overlay.classList.add('active');
  } else {
      overlay.classList.remove('active')
  }
}

function closeModals() {
  setOverlay(false);
  setAddNewRecipeModal(false);
  // setEditUserDataModal(false);
  // setDeleteAdModal(false);
  // setDeleteProfileModal(false);
  // setEditAdModal(false);
}

/**
 * showing modal for adding recipe
 */

const addNewRecipe = () => {
  console.log("Sdasd");
  setOverlay(true);
  setAddNewRecipeModal(true);
  return false;
}

function setAddNewRecipeModal(active) {
  const modal = document.querySelector('#addNewRecipeModal');
  if (active) {
      modal.classList.add('active');
  } else {
      modal.classList.remove('active')
  }
}

