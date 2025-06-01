import './bootstrap';
// Navbar Toggle
document.addEventListener('DOMContentLoaded', function() {
    const navbarShowBtn = document.getElementById('navbar-show-btn');
    const navbarCloseBtn = document.getElementById('navbar-close-btn');
    const navbarCollapse = document.getElementById('navbar-collapse');
    
    if (navbarShowBtn && navbarCloseBtn && navbarCollapse) {
        navbarShowBtn.addEventListener('click', () => {
            navbarCollapse.classList.add('show');
        });
        
        navbarCloseBtn.addEventListener('click', () => {
            navbarCollapse.classList.remove('show');
        });
    }
    
    // Video Play Button
    const playBtn = document.getElementById('play-btn');
    const video = document.querySelector('#video video');
    
    if (playBtn && video) {
        playBtn.addEventListener('click', () => {
            if (video.paused) {
                video.play();
                playBtn.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                video.pause();
                playBtn.innerHTML = '<i class="fas fa-play"></i>';
            }
        });
    }
});