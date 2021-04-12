let box = document.getElementById('nav-btn'),
    btn = document.querySelector('.hambergur-menu');

btn.addEventListener('click', function () {
  box.classList.toggle('transform');
}, false);

if (matchMedia) {
  const mq = window.matchMedia("(max-width: 900px)");
  mq.addListener(WidthChange);
  WidthChange(mq);

}

function WidthChange(mq) {
    if (mq.matches) {
      let toggleBtn = document.querySelector(".nav-link a.dropdown-toggle");
      let toggleBtn2 = document.querySelector(".dropdown-link a.dropdown-toggle");
      if ( toggleBtn != null) {
      
      toggleBtn.addEventListener('click', (event) => {
        let element = event.target;
        element.classList.toggle('is-active')
        var next = element.nextElementSibling
        next.classList.toggle('is-active')
      })
    }
    
    if ( toggleBtn2 != null) {
        toggleBtn2.addEventListener('click', (event) => {
          let element = event.target;
          element.classList.toggle('is-active')
          var next = element.nextElementSibling
          next.classList.toggle('is-active')
        })
      }
    }    
}
  
  var coll = document.getElementsByClassName("collapsible");
  var i;
  
  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = document.querySelector(".nav-link-search"); ;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }


var coll2 = document.getElementsByClassName("collapsible2");

for (i = 0; i < coll2.length; i++) {
  coll2[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}