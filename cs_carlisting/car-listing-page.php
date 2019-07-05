<?php get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="car-container">

            <input id="searchCars" type="text" placeholder="Search..">

            <?php
            if ($terms = get_terms(array('post_type' => 'taxonomy', 'orderby' => 'DATE'))) :
                echo ' <div class="carfilters">
                     <label><input type="checkbox" rel="all" checked /> All </label> ';
                foreach ($terms as $term) :
                    echo ' <label class="' .  $term->name . ' "><input type="checkbox" rel="' . $term->name . '">' . $term->name . '</label>';
                endforeach;
                echo '</div>';
            endif;
            ?>

            <div class="car-wrap-container">

                <?php
                if (get_query_var('paged')) $paged = get_query_var('paged');
                if (get_query_var('page')) $paged = get_query_var('page');

                $query = new WP_Query(array('post_type' => 'car',  'paged' => $paged));
                if ($query->have_posts()) :
                    ?>

                    <?php while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="car-card all <?php echo classCars(); ?> ">
                            <div class="entry">
                                <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                            </div>
                            <div class="car-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                            <div class="car-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="car-tags">
                                <?php echo carLinksTags(); ?>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>There are no cars on listing
                    <?php endif; ?>
            </div>
        </div>
</div>
</main>



<?php
get_footer();
