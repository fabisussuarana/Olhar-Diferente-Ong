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
    // Evita que ocorra o scroll padrão, sem o efeito suave
      event.preventDefault();

      // pegando o valor do atributo href dos links
      const href = event.currentTarget.getAttribute('href');
      
      // usando esse valor de href para selecionar as sections
      const section = document.querySelector(href);
      
      // scroll
      section.scrollIntoView({
        // scroll fica suave
        behavior: 'smooth',
        // alinha no começo da section
        block: 'start', 
      })
    }
  
    linksInternos.forEach((link) => {
      link.addEventListener('click', scrollToSection);
    });
  }
  
  initScrollSuave();