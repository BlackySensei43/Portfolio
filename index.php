<?php
session_start();

// Sanitize input page parameter
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'profile';
$allowedPages = ['profile', 'experience', 'projects', 'courses-skills'];
$page = in_array($page, $allowedPages) ? $page : 'profile';

// Configure error reporting for development/production
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('error_log', 'error.log');

try {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <?php include 'includes/navigation.php'; ?>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <?php
            $pagePath = "pages/{$page}.php";
            if (file_exists($pagePath)) {
                include $pagePath;
            } else {
                throw new Exception("Page not found");
            }
            ?>
        </main>
    </div>

    <?php include 'includes/footer.php';
} catch (Exception $e) {
    // Log error and display user-friendly message
    error_log($e->getMessage());
    ?>
    <div class="error-container">
        <h1><i class="fas fa-exclamation-triangle"></i> Oops!</h1>
        <p>Something went wrong. Please try again later.</p>
        <a href="index.php" class="error-home-link">
            <i class="fas fa-home"></i> Return to Home
        </a>
    </div>
    <?php
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.querySelector('.sidebar');
        
        if (menuButton && sidebar) {
            // Initial state setup
            if (window.innerWidth <= 768) {
                menuButton.style.display = 'block';
                menuButton.querySelector('.close-icon').style.display = 'none';
            }

            menuButton.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                menuButton.classList.toggle('active');
                
                // Toggle icons
                const menuIcon = menuButton.querySelector('.menu-icon');
                const closeIcon = menuButton.querySelector('.close-icon');
                if (sidebar.classList.contains('active')) {
                    menuIcon.style.display = 'none';
                    closeIcon.style.display = 'block';
                } else {
                    menuIcon.style.display = 'block';
                    closeIcon.style.display = 'none';
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!sidebar.contains(e.target) && 
                    !menuButton.contains(e.target) && 
                    window.innerWidth <= 768 &&
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                    menuButton.classList.remove('active');
                    menuButton.querySelector('.menu-icon').style.display = 'block';
                    menuButton.querySelector('.close-icon').style.display = 'none';
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    menuButton.style.display = 'none';
                    sidebar.classList.remove('active');
                    menuButton.classList.remove('active');
                } else {
                    menuButton.style.display = 'block';
                    if (sidebar.classList.contains('active')) {
                        menuButton.querySelector('.menu-icon').style.display = 'none';
                        menuButton.querySelector('.close-icon').style.display = 'block';
                    } else {
                        menuButton.querySelector('.menu-icon').style.display = 'block';
                        menuButton.querySelector('.close-icon').style.display = 'none';
                    }
                }
            });
        }
    });
</script>
</body>
</html>