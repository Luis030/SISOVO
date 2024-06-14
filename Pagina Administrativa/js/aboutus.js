window.onload = () => {
    
        const abrirabout = document.getElementById('aboutus');
        const overlay = document.getElementById('overlay');
        const cerrarabout = document.getElementById('cerrarabout');
      
        abrirabout.addEventListener('click', function() {
          overlay.style.display = 'block';
          document.body.style.overflow = 'hidden';
        });
      
        cerrarabout.addEventListener('click', function() {
          overlay.style.display = 'none';
          document.body.style.overflow = 'auto';
        });
      
}