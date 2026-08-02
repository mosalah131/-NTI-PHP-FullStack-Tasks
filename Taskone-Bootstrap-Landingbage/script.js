document.addEventListener('DOMContentLoaded', function() {
    const welcomeBtn = document.getElementById('welcomeBtn');

    if (welcomeBtn) {
        welcomeBtn.addEventListener('click', function() {
            alert('Welcome! Your custom Bootstrap Landing Page is fully functional. 🚀');
        });
    }
});