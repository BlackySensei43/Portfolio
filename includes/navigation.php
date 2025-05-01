<nav class="side-nav" id="sideNav">
    <ul>
        <li><a href="index.php?page=profile" <?php echo $page === 'profile' ? 'class="active"' : ''; ?>><i class="fas fa-user"></i> Profile</a></li>
        <li><a href="index.php?page=experience" <?php echo $page === 'experience' ? 'class="active"' : ''; ?>><i class="fas fa-briefcase"></i> Experience</a></li>
        <li><a href="index.php?page=projects" <?php echo $page === 'projects' ? 'class="active"' : ''; ?>><i class="fas fa-code"></i> Projects</a></li>
        <li><a href="index.php?page=courses-skills" <?php echo $page === 'courses-skills' ? 'class="active"' : ''; ?>><i class="fas fa-graduation-cap"></i> Courses & Skills</a></li>
    </ul>
</nav>