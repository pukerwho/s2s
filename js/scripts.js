let headerClass = document.querySelector('.header');
let welcomeClass = document.querySelector('.welcome');
let archiveClass = document.querySelector('.archive');
let singleClass = document.querySelector('.single');
let blogClass = document.querySelector('.blog');
let orderClass = document.querySelector('.order');
let worksClass = document.querySelector('.works');
let contactPageClass = document.querySelector('.page-template-tpl_contact');
let aboutPageClass = document.querySelector('.page-template-tpl_about');
let portfolioPageClass = document.querySelector('.page-template-tpl_portfolio');
let servicesItems = document.querySelectorAll('.services_item');

let headerClassHeight = headerClass.offsetHeight;
var widthScreen = document.body.clientWidth;

let worksDistance = 0;
if (worksClass) {
  worksDistance = window.pageYOffset + worksClass.getBoundingClientRect().top - 250;  
}

let arrayClasses = [welcomeClass, archiveClass, singleClass, blogClass, contactPageClass, aboutPageClass, portfolioPageClass];
for (arrayClass of arrayClasses) {
  if (arrayClass) {
    arrayClass.style.marginTop = headerClassHeight + 'px';  
  }
}


function fixedHeader(currentScroll) {
  if (currentScroll > 20) {
    headerClass.classList.add('shadow-xl', 'header_scroll');
  } else {
    headerClass.classList.remove('shadow-xl', 'header_scroll');
  }
}

function showOrder(currentScroll) {
  if (currentScroll > 500 & currentScroll < worksDistance) {
    if (orderClass) {
      orderClass.classList.add('show');  
    }
  } else {
    if (orderClass) {
      orderClass.classList.remove('show');  
    }
    
  }
}

window.addEventListener('scroll', function(){
  currentScroll = pageYOffset;
  fixedHeader(currentScroll);
  showOrder(currentScroll);
});

//MOBILE MENU
let mobileMenuToggle = document.querySelector('.header_toggle');
let mobileMenu = document.querySelector('.mobile-menu');

mobileMenuToggle.addEventListener('click', function(){
  mobileMenuToggle.classList.toggle('active');
  mobileMenu.classList.toggle('active');
});

//Modal Open
let bgModal = document.querySelector('.modal_bg');
let modalsClickId = document.querySelectorAll('.modal_click_js');

for (modalClickId of modalsClickId) {
  if (modalClickId) {
    modalClickId.addEventListener('click', function(){
      modalThisId = this.dataset.modalId;
      console.log(modalThisId);
      let modal = document.querySelector(".modal[data-modal-id='" + modalThisId + "'");
        modal.classList.add('open');
        bgModal.classList.add('open');
    });
  }
}

//Modal Close
let modalCloseBtns = document.querySelectorAll('.modal .close_btn');
let allModals = document.querySelectorAll('.modal');
document.addEventListener('click', function(e){
  if(e.target.classList.value === 'modal_bg open') {
    bgModal.classList.remove('open');
    for (allModal of allModals) {
      allModal.classList.remove('open');  
    }
  }
});

//SWIPER
var swiperMainWelcome = function() {
  var swiperWelcome = new Swiper('.swiper-welcome-container', {
    slidesPerView: 1,
    centeredSlides: true,
    effect: 'fade',
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-welcome-pagination',
    },
  })
}

swiperMainWelcome();

//SWIPER PORTFOLIO ARCHITECT
var swiperPortfolioArchitect = function() {
  var swiperPortfolioArch = new Swiper('.swiper-container-architect', {
    slidesPerView: 1,
    centeredSlides: true,
    centeredSlidesBounds: true,
    spaceBetween: 30,
    // slidesOffsetBefore: -90,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    
  })
}

swiperPortfolioArchitect();

//SWIPER PORTFOLIO DESIGN
var swiperPortfolioDesign = function() {
  var swiperPortfolioDsgn = new Swiper('.swiper-container-design', {
    slidesPerView: 1,
    centeredSlides: true,
    centeredSlidesBounds: true,
    spaceBetween: 30,
    // slidesOffsetBefore: -90,
    loop: true,
    autoplay: {
      delay: 6000,
    },
    
  })
}

swiperPortfolioDesign();

//SWIPER PORTFOLIO OBJECT
var swiperPortfolioObject = function() {
  var swiperPortfolioObj = new Swiper('.swiper-container-object', {
    slidesPerView: 3,
    centeredSlides: true,
    centeredSlidesBounds: true,
    spaceBetween: 30,
    // slidesOffsetBefore: -90,
    loop: true,
    autoplay: {
      delay: 4500,
    },
    
  })
}

swiperPortfolioObject();



//Services Height
for (servicesItem of servicesItems) {
  if (servicesItem) {
    let servicesItemFullWidth = servicesItem.offsetWidth;
    servicesItemWidth = (servicesItemFullWidth/3) - 20;
    servicesItem.style.height = servicesItemFullWidth + 'px';  
  }
}

//Успешно отправлена форма КОНТАКТЫ
let contactSuccess = document.querySelector('.contact_success');
const scriptURL = ''
const contact_form = document.forms['contact']
if (contact_form) {
  contact_form.addEventListener('submit', e => {
    e.preventDefault()
    let this_form = contact_form
    let data = new FormData(contact_form)
    fetch(scriptURL, { method: 'POST', mode: 'cors', body: data})
      .then(response => showSuccessMessage(data, this_form))
      .catch(error => console.error('Error!', error.message))
  })  
}

function showSuccessMessage(data, this_form){
  this_form.reset();
  contactSuccess.style.display = "block";
}

//COUNTER START
// Class counter
function Counter(data) {
  var _default = {
    fps: 20,
    from: 0,
    time: 2000,
  }
  
  for (var attr in _default) {
    if (typeof data[attr] === 'undefined') {
      data[attr] = _default[attr];
    }
  }
  
  if (typeof data.to === 'undefined')
    return;
  
  data.fps = typeof data.fps === 'undefined' ? 20 : parseInt(data.fps);
  data.from = typeof data.from === 'undefined' ? 0 : parseFloat(data.from);
  
  var frames = data.time / data.fps,
      inc = (data.to - data.from) / frames,
      val = data.from;
  
  if (typeof data.start === 'function') {
    data.start(data.from, data)
  }
  var interval = setInterval(function() {
    frames--;
    val += inc;
    
    if (val >= data.to) {
      if (typeof data.complete === 'function') {
        console.log('complete');
        data.complete(data.to, data)
      }
      console.log(interval);
      clearInterval(interval);
    } else if (typeof data.progress === 'function') {
      data.progress(val, data)
    }
  }, data.fps);
}

// Auto-counter from HTML API
var counters = document.getElementsByClassName('count'),
    print = function(val, data) {
      val = Math.round(val);
      data.element.innerHTML = val;
    }

// Creates the counter
function startCount(entry) {
  entry.forEach(change => {
    if (change.isIntersecting) {
      for (var i = 0, l = counters.length; i < l; i++) {
        // Loads from HTML dataset
        var data = {};
        for (var attr in counters[i].dataset) {
          data[attr] = counters[i].dataset[attr];
        }
        
        // Save element and callbacks
        data.element = counters[i];
        data.start = print;
        data.progress = print;
        data.complete = print;
        
        new Counter(data);
      }
    }
  });
}

let optionsCount = {
  threshold: [0.5] }
let observerCount = new IntersectionObserver(startCount, optionsCount);
let counts = document.querySelectorAll('.count');

for (let count of counts) {
  observerCount.observe(count);
}  

//COUNTER END

//ANIMATION START
var controller = new ScrollMagic.Controller();
//Анимация Welcome
let welcomeItem = document.querySelectorAll('.welcome_btn > div');
var welcome_array = Array.prototype.slice.call(welcomeItem);
welcome_array.forEach(function(item){
  var scene = new ScrollMagic.Scene({triggerElement: item,  duration: 850, offset: 0, ease: Linear.easeNone})
  .setTween(item, {top: -120, rotation: -20, opacity: 0})
  .addTo(controller);
});
