function abreMenu(){
    const btn = document.getElementById('btn-js');
    
    function toggleMenu(){
        const nav = document.getElementById('nav');
        nav.classList.toggle('active');
    }
    
    btn.addEventListener('click', toggleMenu);
}

abreMenu();


function initScrollSuave(){
    const linksInternos = document.querySelectorAll('.link-interno-js a[href^="#"]');
  
    function scrollToSection(event){
    
      event.preventDefault();

      const href = event.currentTarget.getAttribute('href');
      const section = document.querySelector(href);
      
      section.scrollIntoView({
        behavior: 'smooth',
        block: 'start', 
      })
    }
  
    linksInternos.forEach((link) => {
      link.addEventListener('click', scrollToSection);
    });
  }
  
  initScrollSuave();