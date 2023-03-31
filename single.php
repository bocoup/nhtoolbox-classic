<?php get_header()?>

<?php

if(get_query_var('show-case-studies')):
    $show_case_studies = get_query_var('show-case-studies');
    if($show_case_studies == 'true'):
        get_template_part( 'template-parts/case-study-hero' );
        get_template_part( 'template-parts/case-study-main' );
    else:
        get_template_part( 'template-parts/strategy-hero' );
        get_template_part( 'template-parts/strategy-main' );
    endif;
else:
    get_template_part( 'template-parts/strategy-hero' );
    get_template_part( 'template-parts/strategy-main' );
endif;

?>
    


<?php
    get_template_part( 'template-parts/related-tools' );
?>
	    

<?php get_footer()?>