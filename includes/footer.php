<footer>
    <div class="footer-content">
        <div class="footer-social">
            <a href="https://www.linkedin.com/in/ahmed-madkour-b21239361/" target="_blank" aria-label="LinkedIn Profile">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/BlackySensei43" target="_blank" aria-label="GitHub Profile">
                <i class="fab fa-github"></i>
            </a>
            <a href="mailto:AhmedMadkour.business@gmail.com" aria-label="Email Contact">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
        
        <div class="footer-nav">
            <a href="index.php?page=profile">Profile</a>
            <a href="index.php?page=experience">Experience</a>
            <a href="index.php?page=projects">Projects</a>
            <a href="index.php?page=courses-skills">Skills</a>
        </div>
        
        <div class="footer-info">
            <p>&copy; <?php echo date('Y'); ?> Ahmed Madkour. All rights reserved.</p>
            <p>Web Developer | Data Developer | Cloud Computing Developer</p>
        </div>
    </div>
</footer>

<script>
// Add smooth scrolling to all links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Dark mode toggle (if implemented)
const darkModeToggle = document.querySelector('.dark-mode-toggle');
if (darkModeToggle) {
    darkModeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', 
            document.body.classList.contains('dark-mode')
        );
    });
}

// Initialize dark mode from localStorage
if (localStorage.getItem('darkMode') === 'true') {
    document.body.classList.add('dark-mode');
}
</script>
</body>
</html>