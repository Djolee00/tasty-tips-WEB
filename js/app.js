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
