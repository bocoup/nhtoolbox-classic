<section aria-label="Housing Strategies" class="hero housing-strategies-section">
  <div class="hero-body">
    <h1>Housing Strategies</h1>
    <hr class="housing-strategies-separator" aria-hidden="true"/>
    <h2 id="strategies">Filter by Issues Addressed</h2>
    <div>
        <a id="all Button" role="button" class="button filter-button">All</a> <?php
            $categories = get_categories( array(
                'orderby'             => 'name',
                'order'               => 'ASC',
                'child_of'            => 0,
                'current_category'    => 0,
                'depth'               => 0,
                'echo'                => 1,
                'exclude'             => '',
                'exclude_tree'        => '',
                'feed'                => '',
                'feed_image'          => '',
                'feed_type'           => '',
                'hide_empty'          => 0,
                'hide_title_if_empty' => false,
                'hierarchical'        => true
            ) );
            foreach($categories as $category) {
                if($category->name != "Uncategorized"):
                    $filter_id = $category->slug . " Button";
                    echo '<a aria-label="turn '. $category->name  .' filter on" id="'.$filter_id.'" role="button" class="button filter-button">' . $category->name . '</a>';
                endif;
            }
        ?>
    </div>

<?php 

$tax_query = array();
if(get_query_var('issues-addressed')):
    $filtered_categories = get_query_var('issues-addressed');
    $filtered_categories_array = explode(",", $filtered_categories);
    $filtered_categories_array = array_map(function($filtered_category) {
        $converted = array();
        $converted['taxonomy'] = 'category';
        $converted['field'] = 'slug';
        $converted['terms'] = array($filtered_category);
        return $converted;
    }, $filtered_categories_array);
    //var_dump($filtered_categories_array);
    $tax_query = array(
        'relation' => 'AND',
        $filtered_categories_array
    );
endif;



$args = array(
    'post_type'=> 'post',
    'orderby'    => 'title',
    'post_status' => 'publish',
    'order'    => 'ASC',
    'posts_per_page' => 100,
    'tax_query' => $tax_query
    );
    $result = new WP_Query( $args );
    if ( $result-> have_posts() ) : ?>
    <div class="columns is-multiline is-centered">
    <?php while ( $result->have_posts() ) : $result->the_post(); ?>
        <div class="column is-4">
            <div class="strategy-card">
                <div class="columns">
                    <div class="column is-6-card">
                        <?php
                            $graphic_design = get_field("graphic_design");
                            if( !empty( $graphic_design ) ): 
                                $thumb = $graphic_design['sizes']['large']; ?>
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($graphic_design['alt']); ?>" />
                        <?php endif; ?> 
                    </div>
                    <div class="column is-6-card">
                        <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>   
                        <p class="excerpt"><?php the_excerpt(); ?></p> 
                    </div>
                </div>
                <hr class="strategy-card-separator" aria-hidden="true"/>
                    <div class="strategy-categories">
                    <?php
                        $categories = get_the_category(); 
                        foreach ( $categories as $cat ): 
                    ?>
                            <span class="button category-button">
                                <?php echo $cat->name; ?>
                        </span>
                        
                        <?php endforeach; ?>
                        </div>
            </div>
        </div>
        
        
    
    <?php endwhile; ?>
    </div>
    <?php else: ?>
        <h3 class="no-results">No results</h3>
    <?php endif; wp_reset_postdata(); ?>


  </div>
</section>

