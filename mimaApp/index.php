


<?php get_template_part('template-parts/header'); ?>


    <!-- Main Content -->
    <main class="container my-5 pt-5">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </main>

   <?php get_template_part('template-parts/footer'); ?>

</body>
</html>

