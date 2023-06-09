var menuToggler = document.querySelector(".menu-toggler");

var navNav = document.querySelector(".navbar-nav");
menuToggler.addEventListener("click", function(){
    navNav.classList.toggle("active");
});

var navBar = document.querySelector(".navbar");



window.addEventListener("scroll", function(){
    if(this.scrollY > 0){
        navBar.classList.add("scrolled");
    }
    else{
        navBar.classList.remove("scrolled");
    }
});

// local reviews data
const reviews = [
  {
    id: 1,
    name: "Ruta Zelalem",
    job: "Customer",
    text:
      "Best product i have ever bought",
  },
  {
    id: 2,
    name: "Addisu Gebyaw",
    job: "customer",
    text:
      "The coffee beans are one of the best that we has bought. Specialy the sidama cofee was great",
  },
  {
    id: 3,
    name: "Ananiya Legesse",
    job: "intern",
    text:
      "Not only the coffee but also the delivery time was the best i have seen",
  },
  {
    id: 4,
    name: "Meklit Teshome",
    job: "the boss",
    text:
      "The best coffee with a resonable price",
  },
];
// select items

const author = document.getElementById("author");
const job = document.getElementById("job");
const info = document.getElementById("info");

const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");

// set starting item
let currentItem = 0;

// load initial item
window.addEventListener("DOMContentLoaded", function () {
  const item = reviews[currentItem];
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;
});

// show person based on item
function showPerson(person) {
  const item = reviews[person];
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;
}
// show next person
nextBtn.addEventListener("click", function () {
  currentItem++;
  if (currentItem > reviews.length - 1) {
    currentItem = 0;
  }
  showPerson(currentItem);
});
// show prev person
prevBtn.addEventListener("click", function () {
  currentItem--;
  if (currentItem < 0) {
    currentItem = reviews.length - 1;
  }
  showPerson(currentItem);
});
